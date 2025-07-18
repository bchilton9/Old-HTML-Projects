<?php




/**
* parses a WSDL file, allows access to it's data, other utility methods
* 
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @version  $Id: class.wsdl.php 6 2006-05-08 17:11:35Z tsigo $
* @access public 
*/
class wsdl extends nusoap_base {
	// URL or filename of the root of this WSDL
    var $wsdl; 
    // define internal arrays of bindings, ports, operations, messages, etc.
    var $schemas = array();
    var $currentSchema;
    var $message = array();
    var $complexTypes = array();
    var $messages = array();
    var $currentMessage;
    var $currentOperation;
    var $portTypes = array();
    var $currentPortType;
    var $bindings = array();
    var $currentBinding;
    var $ports = array();
    var $currentPort;
    var $opData = array();
    var $status = '';
    var $documentation = false;
    var $endpoint = ''; 
    // array of wsdl docs to import
    var $import = array(); 
    // parser vars
    var $parser;
    var $position = 0;
    var $depth = 0;
    var $depth_array = array();
	// for getting wsdl
	var $proxyhost = '';
    var $proxyport = '';
	var $proxyusername = '';
	var $proxypassword = '';
	var $timeout = 0;
	var $response_timeout = 30;

    /**
     * constructor
     * 
     * @param string $wsdl WSDL document URL
	 * @param string $proxyhost
	 * @param string $proxyport
	 * @param string $proxyusername
	 * @param string $proxypassword
	 * @param integer $timeout set the connection timeout
	 * @param integer $response_timeout set the response timeout
     * @access public 
     */
    function wsdl($wsdl = '',$proxyhost=false,$proxyport=false,$proxyusername=false,$proxypassword=false,$timeout=0,$response_timeout=30){
        $this->wsdl = $wsdl;
        $this->proxyhost = $proxyhost;
        $this->proxyport = $proxyport;
		$this->proxyusername = $proxyusername;
		$this->proxypassword = $proxypassword;
		$this->timeout = $timeout;
		$this->response_timeout = $response_timeout;
        
        // parse wsdl file
        if ($wsdl != "") {
            $this->debug('initial wsdl URL: ' . $wsdl);
            $this->parseWSDL($wsdl);
        }
        // imports
        // TODO: handle imports more properly, grabbing them in-line and nesting them
        	$imported_urls = array();
        	$imported = 1;
        	while ($imported > 0) {
        		$imported = 0;
        		// Schema imports
        		foreach ($this->schemas as $ns => $list) {
        			foreach ($list as $xs) {
						$wsdlparts = parse_url($this->wsdl);	// this is bogusly simple!
			            foreach ($xs->imports as $ns2 => $list2) {
			                for ($ii = 0; $ii < count($list2); $ii++) {
			                	if (! $list2[$ii]['loaded']) {
			                		$this->schemas[$ns]->imports[$ns2][$ii]['loaded'] = true;
			                		$url = $list2[$ii]['location'];
									if ($url != '') {
										$urlparts = parse_url($url);
										if (!isset($urlparts['host'])) {
											$url = $wsdlparts['scheme'] . '://' . $wsdlparts['host'] . 
													substr($wsdlparts['path'],0,strrpos($wsdlparts['path'],'/') + 1) .$urlparts['path'];
										}
										if (! in_array($url, $imported_urls)) {
						                	$this->parseWSDL($url);
					                		$imported++;
					                		$imported_urls[] = $url;
					                	}
									} else {
										$this->debug("Unexpected scenario: empty URL for unloaded import");
									}
								}
							}
			            } 
        			}
        		}
        		// WSDL imports
				$wsdlparts = parse_url($this->wsdl);	// this is bogusly simple!
	            foreach ($this->import as $ns => $list) {
	                for ($ii = 0; $ii < count($list); $ii++) {
	                	if (! $list[$ii]['loaded']) {
	                		$this->import[$ns][$ii]['loaded'] = true;
	                		$url = $list[$ii]['location'];
							if ($url != '') {
								$urlparts = parse_url($url);
								if (!isset($urlparts['host'])) {
									$url = $wsdlparts['scheme'] . '://' . $wsdlparts['host'] . 
											substr($wsdlparts['path'],0,strrpos($wsdlparts['path'],'/') + 1) .$urlparts['path'];
								}
								if (! in_array($url, $imported_urls)) {
				                	$this->parseWSDL($url);
			                		$imported++;
			                		$imported_urls[] = $url;
			                	}
							} else {
								$this->debug("Unexpected scenario: empty URL for unloaded import");
							}
						}
					}
	            } 
			}
        // add new data to operation data
        foreach($this->bindings as $binding => $bindingData) {
            if (isset($bindingData['operations']) && is_array($bindingData['operations'])) {
                foreach($bindingData['operations'] as $operation => $data) {
                    $this->debug('post-parse data gathering for ' . $operation);
                    $this->bindings[$binding]['operations'][$operation]['input'] = 
						isset($this->bindings[$binding]['operations'][$operation]['input']) ? 
						array_merge($this->bindings[$binding]['operations'][$operation]['input'], $this->portTypes[ $bindingData['portType'] ][$operation]['input']) :
						$this->portTypes[ $bindingData['portType'] ][$operation]['input'];
                    $this->bindings[$binding]['operations'][$operation]['output'] = 
						isset($this->bindings[$binding]['operations'][$operation]['output']) ?
						array_merge($this->bindings[$binding]['operations'][$operation]['output'], $this->portTypes[ $bindingData['portType'] ][$operation]['output']) :
						$this->portTypes[ $bindingData['portType'] ][$operation]['output'];
                    if(isset($this->messages[ $this->bindings[$binding]['operations'][$operation]['input']['message'] ])){
						$this->bindings[$binding]['operations'][$operation]['input']['parts'] = $this->messages[ $this->bindings[$binding]['operations'][$operation]['input']['message'] ];
					}
					if(isset($this->messages[ $this->bindings[$binding]['operations'][$operation]['output']['message'] ])){
                   		$this->bindings[$binding]['operations'][$operation]['output']['parts'] = $this->messages[ $this->bindings[$binding]['operations'][$operation]['output']['message'] ];
                    }
					if (isset($bindingData['style'])) {
                        $this->bindings[$binding]['operations'][$operation]['style'] = $bindingData['style'];
                    }
                    $this->bindings[$binding]['operations'][$operation]['transport'] = isset($bindingData['transport']) ? $bindingData['transport'] : '';
                    $this->bindings[$binding]['operations'][$operation]['documentation'] = isset($this->portTypes[ $bindingData['portType'] ][$operation]['documentation']) ? $this->portTypes[ $bindingData['portType'] ][$operation]['documentation'] : '';
                    $this->bindings[$binding]['operations'][$operation]['endpoint'] = isset($bindingData['endpoint']) ? $bindingData['endpoint'] : '';
                } 
            } 
        }
    }

    /**
     * parses the wsdl document
     * 
     * @param string $wsdl path or URL
     * @access private 
     */
    function parseWSDL($wsdl = '')
    {
        if ($wsdl == '') {
            $this->debug('no wsdl passed to parseWSDL()!!');
            $this->setError('no wsdl passed to parseWSDL()!!');
            return false;
        }
        
        // parse $wsdl for url format
        $wsdl_props = parse_url($wsdl);

        if (isset($wsdl_props['scheme']) && ($wsdl_props['scheme'] == 'http' || $wsdl_props['scheme'] == 'https')) {
            $this->debug('getting WSDL http(s) URL ' . $wsdl);
        	// get wsdl
	        $tr = new soap_transport_http($wsdl);
			$tr->request_method = 'GET';
			$tr->useSOAPAction = false;
			if($this->proxyhost && $this->proxyport){
				$tr->setProxy($this->proxyhost,$this->proxyport,$this->proxyusername,$this->proxypassword);
			}
			$tr->setEncoding('gzip, deflate');
			$wsdl_string = $tr->send('', $this->timeout, $this->response_timeout);
			//$this->debug("WSDL request\n" . $tr->outgoing_payload);
			//$this->debug("WSDL response\n" . $tr->incoming_payload);
			$this->appendDebug($tr->getDebug());
			// catch errors
			if($err = $tr->getError() ){
				$errstr = 'HTTP ERROR: '.$err;
				$this->debug($errstr);
	            $this->setError($errstr);
				unset($tr);
	            return false;
			}
			unset($tr);
			$this->debug("got WSDL URL");
        } else {
            // $wsdl is not http(s), so treat it as a file URL or plain file path
        	if (isset($wsdl_props['scheme']) && ($wsdl_props['scheme'] == 'file') && isset($wsdl_props['path'])) {
        		$path = isset($wsdl_props['host']) ? ($wsdl_props['host'] . ':' . $wsdl_props['path']) : $wsdl_props['path'];
        	} else {
        		$path = $wsdl;
        	}
            $this->debug('getting WSDL file ' . $path);
            if ($fp = @fopen($path, 'r')) {
                $wsdl_string = '';
                while ($data = fread($fp, 32768)) {
                    $wsdl_string .= $data;
                } 
                fclose($fp);
            } else {
            	$errstr = "Bad path to WSDL file $path";
            	$this->debug($errstr);
                $this->setError($errstr);
                return false;
            } 
        }
        $this->debug('Parse WSDL');
        // end new code added
        // Create an XML parser.
        $this->parser = xml_parser_create(); 
        // Set the options for parsing the XML data.
        // xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, 0); 
        // Set the object for the parser.
        xml_set_object($this->parser, $this); 
        // Set the element handlers for the parser.
        xml_set_element_handler($this->parser, 'start_element', 'end_element');
        xml_set_character_data_handler($this->parser, 'character_data');
        // Parse the XML file.
        if (!xml_parse($this->parser, $wsdl_string, true)) {
            // Display an error message.
            $errstr = sprintf(
				'XML error parsing WSDL from %s on line %d: %s',
				$wsdl,
                xml_get_current_line_number($this->parser),
                xml_error_string(xml_get_error_code($this->parser))
                );
            $this->debug($errstr);
			$this->debug("XML payload:\n" . $wsdl_string);
            $this->setError($errstr);
            return false;
        } 
		// free the parser
        xml_parser_free($this->parser);
        $this->debug('Parsing WSDL done');
		// catch wsdl parse errors
		if($this->getError()){
			return false;
		}
        return true;
    } 

    /**
     * start-element handler
     * 
     * @param string $parser XML parser object
     * @param string $name element name
     * @param string $attrs associative array of attributes
     * @access private 
     */
    function start_element($parser, $name, $attrs)
    {
        if ($this->status == 'schema') {
            $this->currentSchema->schemaStartElement($parser, $name, $attrs);
            $this->appendDebug($this->currentSchema->getDebug());
            $this->currentSchema->clearDebug();
        } elseif (ereg('schema$', $name)) {
        	$this->debug('Parsing WSDL schema');
            // $this->debug("startElement for $name ($attrs[name]). status = $this->status (".$this->getLocalPart($name).")");
            $this->status = 'schema';
            $this->currentSchema = new xmlschema('', '', $this->namespaces);
            $this->currentSchema->schemaStartElement($parser, $name, $attrs);
            $this->appendDebug($this->currentSchema->getDebug());
            $this->currentSchema->clearDebug();
        } else {
            // position in the total number of elements, starting from 0
            $pos = $this->position++;
            $depth = $this->depth++; 
            // set self as current value for this depth
            $this->depth_array[$depth] = $pos;
            $this->message[$pos] = array('cdata' => ''); 
            // get element prefix
            if (ereg(':', $name)) {
                // get ns prefix
                $prefix = substr($name, 0, strpos($name, ':')); 
                // get ns
                $namespace = isset($this->namespaces[$prefix]) ? $this->namespaces[$prefix] : ''; 
                // get unqualified name
                $name = substr(strstr($name, ':'), 1);
            } 

            if (count($attrs) > 0) {
                foreach($attrs as $k => $v) {
                    // if ns declarations, add to class level array of valid namespaces
                    if (ereg("^xmlns", $k)) {
                        if ($ns_prefix = substr(strrchr($k, ':'), 1)) {
                            $this->namespaces[$ns_prefix] = $v;
                        } else {
                            $this->namespaces['ns' . (count($this->namespaces) + 1)] = $v;
                        } 
                        if ($v == 'http://www.w3.org/2001/XMLSchema' || $v == 'http://www.w3.org/1999/XMLSchema' || $v == 'http://www.w3.org/2000/10/XMLSchema') {
                            $this->XMLSchemaVersion = $v;
                            $this->namespaces['xsi'] = $v . '-instance';
                        } 
                    } //  
                    // expand each attribute
                    $k = strpos($k, ':') ? $this->expandQname($k) : $k;
                    if ($k != 'location' && $k != 'soapAction' && $k != 'namespace') {
                        $v = strpos($v, ':') ? $this->expandQname($v) : $v;
                    } 
                    $eAttrs[$k] = $v;
                } 
                $attrs = $eAttrs;
            } else {
                $attrs = array();
            } 
            // find status, register data
            switch ($this->status) {
                case 'message':
                    if ($name == 'part') {
			            if (isset($attrs['type'])) {
		                    $this->debug("msg " . $this->currentMessage . ": found part $attrs[name]: " . implode(',', $attrs));
		                    $this->messages[$this->currentMessage][$attrs['name']] = $attrs['type'];
            			} 
			            if (isset($attrs['element'])) {
		                    $this->debug("msg " . $this->currentMessage . ": found part $attrs[name]: " . implode(',', $attrs));
			                $this->messages[$this->currentMessage][$attrs['name']] = $attrs['element'];
			            } 
        			} 
        			break;
			    case 'portType':
			        switch ($name) {
			            case 'operation':
			                $this->currentPortOperation = $attrs['name'];
			                $this->debug("portType $this->currentPortType operation: $this->currentPortOperation");
			                if (isset($attrs['parameterOrder'])) {
			                	$this->portTypes[$this->currentPortType][$attrs['name']]['parameterOrder'] = $attrs['parameterOrder'];
			        		} 
			        		break;
					    case 'documentation':
					        $this->documentation = true;
					        break; 
					    // merge input/output data
					    default:
					        $m = isset($attrs['message']) ? $this->getLocalPart($attrs['message']) : '';
					        $this->portTypes[$this->currentPortType][$this->currentPortOperation][$name]['message'] = $m;
					        break;
					} 
			    	break;
				case 'binding':
				    switch ($name) {
				        case 'binding': 
				            // get ns prefix
				            if (isset($attrs['style'])) {
				            $this->bindings[$this->currentBinding]['prefix'] = $prefix;
					    	} 
					    	$this->bindings[$this->currentBinding] = array_merge($this->bindings[$this->currentBinding], $attrs);
					    	break;
						case 'header':
						    $this->bindings[$this->currentBinding]['operations'][$this->currentOperation][$this->opStatus]['headers'][] = $attrs;
						    break;
						case 'operation':
						    if (isset($attrs['soapAction'])) {
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation]['soapAction'] = $attrs['soapAction'];
						    } 
						    if (isset($attrs['style'])) {
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation]['style'] = $attrs['style'];
						    } 
						    if (isset($attrs['name'])) {
						        $this->currentOperation = $attrs['name'];
						        $this->debug("current binding operation: $this->currentOperation");
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation]['name'] = $attrs['name'];
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation]['binding'] = $this->currentBinding;
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation]['endpoint'] = isset($this->bindings[$this->currentBinding]['endpoint']) ? $this->bindings[$this->currentBinding]['endpoint'] : '';
						    } 
						    break;
						case 'input':
						    $this->opStatus = 'input';
						    break;
						case 'output':
						    $this->opStatus = 'output';
						    break;
						case 'body':
						    if (isset($this->bindings[$this->currentBinding]['operations'][$this->currentOperation][$this->opStatus])) {
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation][$this->opStatus] = array_merge($this->bindings[$this->currentBinding]['operations'][$this->currentOperation][$this->opStatus], $attrs);
						    } else {
						        $this->bindings[$this->currentBinding]['operations'][$this->currentOperation][$this->opStatus] = $attrs;
						    } 
						    break;
					} 
					break;
				case 'service':
					switch ($name) {
					    case 'port':
					        $this->currentPort = $attrs['name'];
					        $this->debug('current port: ' . $this->currentPort);
					        $this->ports[$this->currentPort]['binding'] = $this->getLocalPart($attrs['binding']);
					
					        break;
					    case 'address':
					        $this->ports[$this->currentPort]['location'] = $attrs['location'];
					        $this->ports[$this->currentPort]['bindingType'] = $namespace;
					        $this->bindings[ $this->ports[$this->currentPort]['binding'] ]['bindingType'] = $namespace;
					        $this->bindings[ $this->ports[$this->currentPort]['binding'] ]['endpoint'] = $attrs['location'];
					        break;
					} 
					break;
			} 
		// set status
		switch ($name) {
			case 'import':
			    if (isset($attrs['location'])) {
                    $this->import[$attrs['namespace']][] = array('location' => $attrs['location'], 'loaded' => false);
                    $this->debug('parsing import ' . $attrs['namespace']. ' - ' . $attrs['location'] . ' (' . count($this->import[$attrs['namespace']]).')');
				} else {
                    $this->import[$attrs['namespace']][] = array('location' => '', 'loaded' => true);
					if (! $this->getPrefixFromNamespace($attrs['namespace'])) {
						$this->namespaces['ns'.(count($this->namespaces)+1)] = $attrs['namespace'];
					}
                    $this->debug('parsing import ' . $attrs['namespace']. ' - [no location] (' . count($this->import[$attrs['namespace']]).')');
				}
				break;
			//wait for schema
			//case 'types':
			//	$this->status = 'schema';
			//	break;
			case 'message':
				$this->status = 'message';
				$this->messages[$attrs['name']] = array();
				$this->currentMessage = $attrs['name'];
				break;
			case 'portType':
				$this->status = 'portType';
				$this->portTypes[$attrs['name']] = array();
				$this->currentPortType = $attrs['name'];
				break;
			case "binding":
				if (isset($attrs['name'])) {
				// get binding name
					if (strpos($attrs['name'], ':')) {
			    		$this->currentBinding = $this->getLocalPart($attrs['name']);
					} else {
			    		$this->currentBinding = $attrs['name'];
					} 
					$this->status = 'binding';
					$this->bindings[$this->currentBinding]['portType'] = $this->getLocalPart($attrs['type']);
					$this->debug("current binding: $this->currentBinding of portType: " . $attrs['type']);
				} 
				break;
			case 'service':
				$this->serviceName = $attrs['name'];
				$this->status = 'service';
				$this->debug('current service: ' . $this->serviceName);
				break;
			case 'definitions':
				foreach ($attrs as $name => $value) {
					$this->wsdl_info[$name] = $value;
				} 
				break;
			} 
		} 
	} 

	/**
	* end-element handler
	* 
	* @param string $parser XML parser object
	* @param string $name element name
	* @access private 
	*/
	function end_element($parser, $name){ 
		// unset schema status
		if (/*ereg('types$', $name) ||*/ ereg('schema$', $name)) {
			$this->status = "";
			$this->schemas[$this->currentSchema->schemaTargetNamespace][] = $this->currentSchema;
        	$this->debug('Parsing WSDL schema done');
		} 
		if ($this->status == 'schema') {
			$this->currentSchema->schemaEndElement($parser, $name);
		} else {
			// bring depth down a notch
			$this->depth--;
		} 
		// end documentation
		if ($this->documentation) {
			//TODO: track the node to which documentation should be assigned; it can be a part, message, etc.
			//$this->portTypes[$this->currentPortType][$this->currentPortOperation]['documentation'] = $this->documentation;
			$this->documentation = false;
		} 
	} 

	/**
	 * element content handler
	 * 
	 * @param string $parser XML parser object
	 * @param string $data element content
	 * @access private 
	 */
	function character_data($parser, $data)
	{
		$pos = isset($this->depth_array[$this->depth]) ? $this->depth_array[$this->depth] : 0;
		if (isset($this->message[$pos]['cdata'])) {
			$this->message[$pos]['cdata'] .= $data;
		} 
		if ($this->documentation) {
			$this->documentation .= $data;
		} 
	} 
	
	function getBindingData($binding)
	{
		if (is_array($this->bindings[$binding])) {
			return $this->bindings[$binding];
		} 
	}
	
	/**
	 * returns an assoc array of operation names => operation data
	 * 
	 * @param string $bindingType eg: soap, smtp, dime (only soap is currently supported)
	 * @return array 
	 * @access public 
	 */
	function getOperations($bindingType = 'soap')
	{
		$ops = array();
		if ($bindingType == 'soap') {
			$bindingType = 'http://schemas.xmlsoap.org/wsdl/soap/';
		}
		// loop thru ports
		foreach($this->ports as $port => $portData) {
			// binding type of port matches parameter
			if ($portData['bindingType'] == $bindingType) {
				//$this->debug("getOperations for port $port");
				//$this->debug("port data: " . $this->varDump($portData));
				//$this->debug("bindings: " . $this->varDump($this->bindings[ $portData['binding'] ]));
				// merge bindings
				if (isset($this->bindings[ $portData['binding'] ]['operations'])) {
					$ops = array_merge ($ops, $this->bindings[ $portData['binding'] ]['operations']);
				}
			}
		} 
		return $ops;
	} 
	
	/**
	 * returns an associative array of data necessary for calling an operation
	 * 
	 * @param string $operation , name of operation
	 * @param string $bindingType , type of binding eg: soap
	 * @return array 
	 * @access public 
	 */
	function getOperationData($operation, $bindingType = 'soap')
	{
		if ($bindingType == 'soap') {
			$bindingType = 'http://schemas.xmlsoap.org/wsdl/soap/';
		}
		// loop thru ports
		foreach($this->ports as $port => $portData) {
			// binding type of port matches parameter
			if ($portData['bindingType'] == $bindingType) {
				// get binding
				//foreach($this->bindings[ $portData['binding'] ]['operations'] as $bOperation => $opData) {
				foreach(array_keys($this->bindings[ $portData['binding'] ]['operations']) as $bOperation) {
					if ($operation == $bOperation) {
						$opData = $this->bindings[ $portData['binding'] ]['operations'][$operation];
					    return $opData;
					} 
				} 
			}
		} 
	}
	
	/**
    * returns an array of information about a given type
    * returns false if no type exists by the given name
    *
	*	 typeDef = array(
	*	 'elements' => array(), // refs to elements array
	*	'restrictionBase' => '',
	*	'phpType' => '',
	*	'order' => '(sequence|all)',
	*	'attrs' => array() // refs to attributes array
	*	)
    *
    * @param $type string
    * @param $ns string
    * @return mixed
    * @access public
    * @see xmlschema
    */
	function getTypeDef($type, $ns) {
		if ((! $ns) && isset($this->namespaces['tns'])) {
			$ns = $this->namespaces['tns'];
			$this->debug("type namespace forced to $ns");
		}
		if (isset($this->schemas[$ns])) {
			$this->debug("have schema for namespace $ns");
			for ($i = 0; $i < count($this->schemas[$ns]); $i++) {
				$xs = &$this->schemas[$ns][$i];
				$t = $xs->getTypeDef($type);
				$this->appendDebug($xs->getDebug());
				$xs->clearDebug();
				if ($t) {
					if (!isset($t['phpType'])) {
						// get info for type to tack onto the element
						$uqType = substr($t['type'], strrpos($t['type'], ':') + 1);
						$ns = substr($t['type'], 0, strrpos($t['type'], ':'));
						$etype = $this->getTypeDef($uqType, $ns);
						if ($etype) {
							$this->debug("found type $etype for [element] $type");
							if (isset($etype['phpType'])) {
								$t['phpType'] = $etype['phpType'];
							}
							if (isset($etype['elements'])) {
								$t['elements'] = $etype['elements'];
							}
						}
					}
					return $t;
				}
			}
		} else {
			$this->debug("do not have schema for namespace $ns");
		}
		return false;
	}

    /**
    * prints html description of services
    *
    * @access private
    */
    function webDescription(){
		$b = '
		<html><head><title>NuSOAP: '.$this->serviceName.'</title>
		<style type="text/css">
		    body    { font-family: arial; color: #000000; background-color: #ffffff; margin: 0px 0px 0px 0px; }
		    p       { font-family: arial; color: #000000; margin-top: 0px; margin-bottom: 12px; }
		    pre { background-color: silver; padding: 5px; font-family: Courier New; font-size: x-small; color: #000000;}
		    ul      { margin-top: 10px; margin-left: 20px; }
		    li      { list-style-type: none; margin-top: 10px; color: #000000; }
		    .content{
			margin-left: 0px; padding-bottom: 2em; }
		    .nav {
			padding-top: 10px; padding-bottom: 10px; padding-left: 15px; font-size: .70em;
			margin-top: 10px; margin-left: 0px; color: #000000;
			background-color: #ccccff; width: 20%; margin-left: 20px; margin-top: 20px; }
		    .title {
			font-family: arial; font-size: 26px; color: #ffffff;
			background-color: #999999; width: 105%; margin-left: 0px;
			padding-top: 10px; padding-bottom: 10px; padding-left: 15px;}
		    .hidden {
			position: absolute; visibility: hidden; z-index: 200; left: 250px; top: 100px;
			font-family: arial; overflow: hidden; width: 600;
			padding: 20px; font-size: 10px; background-color: #999999;
			layer-background-color:#FFFFFF; }
		    a,a:active  { color: charcoal; font-weight: bold; }
		    a:visited   { color: #666666; font-weight: bold; }
		    a:hover     { color: cc3300; font-weight: bold; }
		</style>
		<script language="JavaScript" type="text/javascript">
		<!--
		// POP-UP CAPTIONS...
		function lib_bwcheck(){ //Browsercheck (needed)
		    this.ver=navigator.appVersion
		    this.agent=navigator.userAgent
		    this.dom=document.getElementById?1:0
		    this.opera5=this.agent.indexOf("Opera 5")>-1
		    this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom && !this.opera5)?1:0;
		    this.ie6=(this.ver.indexOf("MSIE 6")>-1 && this.dom && !this.opera5)?1:0;
		    this.ie4=(document.all && !this.dom && !this.opera5)?1:0;
		    this.ie=this.ie4||this.ie5||this.ie6
		    this.mac=this.agent.indexOf("Mac")>-1
		    this.ns6=(this.dom && parseInt(this.ver) >= 5) ?1:0;
		    this.ns4=(document.layers && !this.dom)?1:0;
		    this.bw=(this.ie6 || this.ie5 || this.ie4 || this.ns4 || this.ns6 || this.opera5)
		    return this
		}
		var bw = new lib_bwcheck()
		//Makes crossbrowser object.
		function makeObj(obj){
		    this.evnt=bw.dom? document.getElementById(obj):bw.ie4?document.all[obj]:bw.ns4?document.layers[obj]:0;
		    if(!this.evnt) return false
		    this.css=bw.dom||bw.ie4?this.evnt.style:bw.ns4?this.evnt:0;
		    this.wref=bw.dom||bw.ie4?this.evnt:bw.ns4?this.css.document:0;
		    this.writeIt=b_writeIt;
		    return this
		}
		// A unit of measure that will be added when setting the position of a layer.
		//var px = bw.ns4||window.opera?"":"px";
		function b_writeIt(text){
		    if (bw.ns4){this.wref.write(text);this.wref.close()}
		    else this.wref.innerHTML = text
		}
		//Shows the messages
		var oDesc;
		function popup(divid){
		    if(oDesc = new makeObj(divid)){
			oDesc.css.visibility = "visible"
		    }
		}
		function popout(){ // Hides message
		    if(oDesc) oDesc.css.visibility = "hidden"
		}
		//-->
		</script>
		</head>
		<body>
		<div class=content>
			<br><br>
			<div class=title>'.$this->serviceName.'</div>
			<div class=nav>
				<p>View the <a href="'.(isset($GLOBALS['PHP_SELF']) ? $GLOBALS['PHP_SELF'] : $_SERVER['PHP_SELF']).'?wsdl">WSDL</a> for the service.
				Click on an operation name to view it&apos;s details.</p>
				<ul>';
				foreach($this->getOperations() as $op => $data){
				    $b .= "<li><a href='#' onclick=\"popup('$op')\">$op</a></li>";
				    // create hidden div
				    $b .= "<div id='$op' class='hidden'>
				    <a href='#' onclick='popout()'><font color='#ffffff'>Close</font></a><br><br>";
				    foreach($data as $donnie => $marie){ // loop through opdata
						if($donnie == 'input' || $donnie == 'output'){ // show input/output data
						    $b .= "<font color='white'>".ucfirst($donnie).':</font><br>';
						    foreach($marie as $captain => $tenille){ // loop through data
								if($captain == 'parts'){ // loop thru parts
								    $b .= "&nbsp;&nbsp;$captain:<br>";
					                //if(is_array($tenille)){
								    	foreach($tenille as $joanie => $chachi){
											$b .= "&nbsp;&nbsp;&nbsp;&nbsp;$joanie: $chachi<br>";
								    	}
					        		//}
								} else {
								    $b .= "&nbsp;&nbsp;$captain: $tenille<br>";
								}
						    }
						} else {
						    $b .= "<font color='white'>".ucfirst($donnie).":</font> $marie<br>";
						}
				    }
					$b .= '</div>';
				}
				$b .= '
				<ul>
			</div>
		</div></body></html>';
		return $b;
    }

	/**
	* serialize the parsed wsdl
	*
	* @param $debug mixed whether to put debug=1 in endpoint URL
	* @return string , serialization of WSDL
	* @access public 
	*/
	function serialize($debug = 0)
	{
		$xml = '<?xml version="1.0" encoding="ISO-8859-1"?><definitions';
		foreach($this->namespaces as $k => $v) {
			$xml .= " xmlns:$k=\"$v\"";
		} 
		// 10.9.02 - add poulter fix for wsdl and tns declarations
		if (isset($this->namespaces['wsdl'])) {
			$xml .= " xmlns=\"" . $this->namespaces['wsdl'] . "\"";
		} 
		if (isset($this->namespaces['tns'])) {
			$xml .= " targetNamespace=\"" . $this->namespaces['tns'] . "\"";
		} 
		$xml .= '>'; 
		// imports
		if (sizeof($this->import) > 0) {
			foreach($this->import as $ns => $list) {
				foreach ($list as $ii) {
					if ($ii['location'] != '') {
						$xml .= '<import location="' . $ii['location'] . '" namespace="' . $ns . '" />';
					} else {
						$xml .= '<import namespace="' . $ns . '" />';
					}
				}
			} 
		} 
		// types
		if (count($this->schemas)>=1) {
			$xml .= '<types>';
			foreach ($this->schemas as $ns => $list) {
				foreach ($list as $xs) {
					$xml .= $xs->serializeSchema();
				}
			}
			$xml .= '</types>';
		} 
		// messages
		if (count($this->messages) >= 1) {
			foreach($this->messages as $msgName => $msgParts) {
				$xml .= '<message name="' . $msgName . '">';
				if(is_array($msgParts)){
					foreach($msgParts as $partName => $partType) {
						// print 'serializing '.$partType.', sv: '.$this->XMLSchemaVersion.'<br>';
						if (strpos($partType, ':')) {
						    $typePrefix = $this->getPrefixFromNamespace($this->getPrefix($partType));
						} elseif (isset($this->typemap[$this->namespaces['xsd']][$partType])) {
						    // print 'checking typemap: '.$this->XMLSchemaVersion.'<br>';
						    $typePrefix = 'xsd';
						} else {
						    foreach($this->typemap as $ns => $types) {
						        if (isset($types[$partType])) {
						            $typePrefix = $this->getPrefixFromNamespace($ns);
						        } 
						    } 
						    if (!isset($typePrefix)) {
						        die("$partType has no namespace!");
						    } 
						} 
						$typeDef = $this->getTypeDef($this->getLocalPart($partType), $typePrefix);
						if ($typeDef['typeClass'] == 'element') {
							$elementortype = 'element';
						} else {
							$elementortype = 'type';
						}
						$xml .= '<part name="' . $partName . '" ' . $elementortype . '="' . $typePrefix . ':' . $this->getLocalPart($partType) . '" />';
					}
				}
				$xml .= '</message>';
			} 
		} 
		// bindings & porttypes
		if (count($this->bindings) >= 1) {
			$binding_xml = '';
			$portType_xml = '';
			foreach($this->bindings as $bindingName => $attrs) {
				$binding_xml .= '<binding name="' . $bindingName . '" type="tns:' . $attrs['portType'] . '">';
				$binding_xml .= '<soap:binding style="' . $attrs['style'] . '" transport="' . $attrs['transport'] . '"/>';
				$portType_xml .= '<portType name="' . $attrs['portType'] . '">';
				foreach($attrs['operations'] as $opName => $opParts) {
					$binding_xml .= '<operation name="' . $opName . '">';
					$binding_xml .= '<soap:operation soapAction="' . $opParts['soapAction'] . '" style="'. $opParts['style'] . '"/>';
					if (isset($opParts['input']['encodingStyle']) && $opParts['input']['encodingStyle'] != '') {
						$enc_style = ' encodingStyle="' . $opParts['input']['encodingStyle'] . '"';
					} else {
						$enc_style = '';
					}
					$binding_xml .= '<input><soap:body use="' . $opParts['input']['use'] . '" namespace="' . $opParts['input']['namespace'] . '"' . $enc_style . '/></input>';
					if (isset($opParts['output']['encodingStyle']) && $opParts['output']['encodingStyle'] != '') {
						$enc_style = ' encodingStyle="' . $opParts['output']['encodingStyle'] . '"';
					} else {
						$enc_style = '';
					}
					$binding_xml .= '<output><soap:body use="' . $opParts['output']['use'] . '" namespace="' . $opParts['output']['namespace'] . '"' . $enc_style . '/></output>';
					$binding_xml .= '</operation>';
					$portType_xml .= '<operation name="' . $opParts['name'] . '"';
					if (isset($opParts['parameterOrder'])) {
					    $portType_xml .= ' parameterOrder="' . $opParts['parameterOrder'] . '"';
					} 
					$portType_xml .= '>';
					if(isset($opParts['documentation']) && $opParts['documentation'] != '') {
						$portType_xml .= '<documentation>' . htmlspecialchars($opParts['documentation']) . '</documentation>';
					}
					$portType_xml .= '<input message="tns:' . $opParts['input']['message'] . '"/>';
					$portType_xml .= '<output message="tns:' . $opParts['output']['message'] . '"/>';
					$portType_xml .= '</operation>';
				} 
				$portType_xml .= '</portType>';
				$binding_xml .= '</binding>';
			} 
			$xml .= $portType_xml . $binding_xml;
		} 
		// services
		$xml .= '<service name="' . $this->serviceName . '">';
		if (count($this->ports) >= 1) {
			foreach($this->ports as $pName => $attrs) {
				$xml .= '<port name="' . $pName . '" binding="tns:' . $attrs['binding'] . '">';
				$xml .= '<soap:address location="' . $attrs['location'] . ($debug ? '?debug=1' : '') . '"/>';
				$xml .= '</port>';
			} 
		} 
		$xml .= '</service>';
		return $xml . '</definitions>';
	} 
	
	/**
	 * serialize a PHP value according to a WSDL message definition
	 * 
	 * TODO
	 * - multi-ref serialization
	 * - validate PHP values against type definitions, return errors if invalid
	 * 
	 * @param string $ type name
	 * @param mixed $ param value
	 * @return mixed new param or false if initial value didn't validate
	 */
	function serializeRPCParameters($operation, $direction, $parameters)
	{
		$this->debug('in serializeRPCParameters with operation '.$operation.', direction '.$direction.' and '.count($parameters).' param(s), and xml schema version ' . $this->XMLSchemaVersion); 
		
		if ($direction != 'input' && $direction != 'output') {
			$this->debug('The value of the \$direction argument needs to be either "input" or "output"');
			$this->setError('The value of the \$direction argument needs to be either "input" or "output"');
			return false;
		} 
		if (!$opData = $this->getOperationData($operation)) {
			$this->debug('Unable to retrieve WSDL data for operation: ' . $operation);
			$this->setError('Unable to retrieve WSDL data for operation: ' . $operation);
			return false;
		}
		$this->debug('opData:');
		$this->appendDebug($this->varDump($opData));

		// Get encoding style for output and set to current
		$encodingStyle = 'http://schemas.xmlsoap.org/soap/encoding/';
		if(($direction == 'input') && isset($opData['output']['encodingStyle']) && ($opData['output']['encodingStyle'] != $encodingStyle)) {
			$encodingStyle = $opData['output']['encodingStyle'];
			$enc_style = $encodingStyle;
		}

		// set input params
		$xml = '';
		if (isset($opData[$direction]['parts']) && sizeof($opData[$direction]['parts']) > 0) {
			
			$use = $opData[$direction]['use'];
			$this->debug('have ' . count($opData[$direction]['parts']) . ' part(s) to serialize');
			if (is_array($parameters)) {
				$parametersArrayType = $this->isArraySimpleOrStruct($parameters);
				$this->debug('have ' . count($parameters) . ' parameter(s) provided as ' . $parametersArrayType . ' to serialize');
				foreach($opData[$direction]['parts'] as $name => $type) {
					$this->debug('serializing part "'.$name.'" of type "'.$type.'"');
					// Track encoding style
					if (isset($opData[$direction]['encodingStyle']) && $encodingStyle != $opData[$direction]['encodingStyle']) {
						$encodingStyle = $opData[$direction]['encodingStyle'];			
						$enc_style = $encodingStyle;
					} else {
						$enc_style = false;
					}
					// NOTE: add error handling here
					// if serializeType returns false, then catch global error and fault
					if ($parametersArrayType == 'arraySimple') {
						$p = array_shift($parameters);
						$this->debug('calling serializeType w/indexed param');
						$xml .= $this->serializeType($name, $type, $p, $use, $enc_style);
					} elseif (isset($parameters[$name])) {
						$this->debug('calling serializeType w/named param');
						$xml .= $this->serializeType($name, $type, $parameters[$name], $use, $enc_style);
					} else {
						// TODO: only send nillable
						$this->debug('calling serializeType w/null param');
						$xml .= $this->serializeType($name, $type, null, $use, $enc_style);
					}
				}
			} else {
				$this->debug('no parameters passed.');
			}
		}
		$this->debug("serializeRPCParameters returning: $xml");
		return $xml;
	} 
	
	/**
	 * serialize a PHP value according to a WSDL message definition
	 * 
	 * TODO
	 * - multi-ref serialization
	 * - validate PHP values against type definitions, return errors if invalid
	 * 
	 * @param string $ type name
	 * @param mixed $ param value
	 * @return mixed new param or false if initial value didn't validate
	 */
	function serializeParameters($operation, $direction, $parameters)
	{
		$this->debug('in serializeParameters with operation '.$operation.', direction '.$direction.' and '.count($parameters).' param(s), and xml schema version ' . $this->XMLSchemaVersion); 
		
		if ($direction != 'input' && $direction != 'output') {
			$this->debug('The value of the \$direction argument needs to be either "input" or "output"');
			$this->setError('The value of the \$direction argument needs to be either "input" or "output"');
			return false;
		} 
		if (!$opData = $this->getOperationData($operation)) {
			$this->debug('Unable to retrieve WSDL data for operation: ' . $operation);
			$this->setError('Unable to retrieve WSDL data for operation: ' . $operation);
			return false;
		}
		$this->debug('opData:');
		$this->appendDebug($this->varDump($opData));
		
		// Get encoding style for output and set to current
		$encodingStyle = 'http://schemas.xmlsoap.org/soap/encoding/';
		if(($direction == 'input') && isset($opData['output']['encodingStyle']) && ($opData['output']['encodingStyle'] != $encodingStyle)) {
			$encodingStyle = $opData['output']['encodingStyle'];
			$enc_style = $encodingStyle;
		}
		
		// set input params
		$xml = '';
		if (isset($opData[$direction]['parts']) && sizeof($opData[$direction]['parts']) > 0) {
			
			$use = $opData[$direction]['use'];
			$this->debug("use=$use");
			$this->debug('got ' . count($opData[$direction]['parts']) . ' part(s)');
			if (is_array($parameters)) {
				$parametersArrayType = $this->isArraySimpleOrStruct($parameters);
				$this->debug('have ' . $parametersArrayType . ' parameters');
				foreach($opData[$direction]['parts'] as $name => $type) {
					$this->debug('serializing part "'.$name.'" of type "'.$type.'"');
					// Track encoding style
					if(isset($opData[$direction]['encodingStyle']) && $encodingStyle != $opData[$direction]['encodingStyle']) {
						$encodingStyle = $opData[$direction]['encodingStyle'];			
						$enc_style = $encodingStyle;
					} else {
						$enc_style = false;
					}
					// NOTE: add error handling here
					// if serializeType returns false, then catch global error and fault
					if ($parametersArrayType == 'arraySimple') {
						$p = array_shift($parameters);
						$this->debug('calling serializeType w/indexed param');
						$xml .= $this->serializeType($name, $type, $p, $use, $enc_style);
					} elseif (isset($parameters[$name])) {
						$this->debug('calling serializeType w/named param');
						$xml .= $this->serializeType($name, $type, $parameters[$name], $use, $enc_style);
					} else {
						// TODO: only send nillable
						$this->debug('calling serializeType w/null param');
						$xml .= $this->serializeType($name, $type, null, $use, $enc_style);
					}
				}
			} else {
				$this->debug('no parameters passed.');
			}
		}
		$this->debug("serializeParameters returning: $xml");
		return $xml;
	} 
	
	/**
	 * serializes a PHP value according a given type definition
	 * 
	 * @param string $name , name of type (part)
	 * @param string $type , type of type, heh (type or element)
	 * @param mixed $value , a native PHP value (parameter value)
	 * @param string $use , use for part (encoded|literal)
	 * @param string $encodingStyle , use to add encoding changes to serialisation
	 * @param boolean $unqualified , a kludge for what should be form handling
	 * @return string serialization
	 * @access public 
	 */
	function serializeType($name, $type, $value, $use='encoded', $encodingStyle=false, $unqualified=false)
	{
		$this->debug("in serializeType: $name, $type, $use, $encodingStyle, " . ($unqualified ? "unqualified" : "qualified"));
		$this->debug("value:");
		$this->appendDebug($this->varDump($value));
		if($use == 'encoded' && $encodingStyle) {
			$encodingStyle = ' SOAP-ENV:encodingStyle="' . $encodingStyle . '"';
		}

		// if a soap_val has been supplied, let its type override the WSDL
    	if (is_object($value) && get_class($value) == 'soapval') {
    		// TODO: get attributes from soapval?
    		if ($value->type_ns) {
    			$type = $value->type_ns . ':' . $value->type;
		    	$forceType = true;
		    	$this->debug("in serializeType: soapval overrides type to $type");
    		} elseif ($value->type) {
	    		$type = $value->type;
		    	$forceType = true;
		    	$this->debug("in serializeType: soapval overrides type to $type");
	    	} else {
	    		$forceType = false;
		    	$this->debug("in serializeType: soapval does not override type");
	    	}
	    	$attrs = $value->attributes;
	    	$value = $value->value;
	    	$this->debug("in serializeType: soapval overrides value to $value");
	    	if ($attrs) {
	    		foreach ($attrs as $n => $v) {
	    			$value['!' . $n] = $v;
	    		}
		    	$this->debug("in serializeType: soapval provides attributes");
		    }
        } else {
        	$forceType = false;
        }

		$xml = '';
		if (strpos($type, ':')) {
			$uqType = substr($type, strrpos($type, ':') + 1);
			$ns = substr($type, 0, strrpos($type, ':'));
			$this->debug("got a prefixed type: $uqType, $ns");
			if ($this->getNamespaceFromPrefix($ns)) {
				$ns = $this->getNamespaceFromPrefix($ns);
				$this->debug("expanded prefixed type: $uqType, $ns");
			}

			if($ns == $this->XMLSchemaVersion || $ns == 'http://schemas.xmlsoap.org/soap/encoding/'){
				$this->debug('type namespace indicates XML Schema or SOAP Encoding type');
				if ($unqualified  && $use == 'literal') {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
				if (is_null($value)) {
					if ($use == 'literal') {
						// TODO: depends on nillable
						$xml = "<$name$elementNS/>";
					} else {
						$xml = "<$name$elementNS xsi:nil=\"true\"/>";
					}
					$this->debug("serializeType returning: $xml");
					return $xml;
				}
		    	if ($uqType == 'boolean' && !$value) {
					$value = 'false';
				} elseif ($uqType == 'boolean') {
					$value = 'true';
				} 
				if ($uqType == 'string' && gettype($value) == 'string') {
					$value = $this->expandEntities($value);
				}
				if (($uqType == 'long' || $uqType == 'unsignedLong') && gettype($value) == 'double') {
					$value = sprintf("%.0lf", $value);
				}
				// it's a scalar
				// TODO: what about null/nil values?
				// check type isn't a custom type extending xmlschema namespace
				if (!$this->getTypeDef($uqType, $ns)) {
					if ($use == 'literal') {
						if ($forceType) {
							$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">$value</$name>";
						} else {
							$xml = "<$name$elementNS>$value</$name>";
						}
					} else {
						$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>$value</$name>";
					}
					$this->debug("serializeType returning: $xml");
					return $xml;
				}
				$this->debug('custom type extends XML Schema or SOAP Encoding namespace (yuck)');
			} else if ($ns == 'http://xml.apache.org/xml-soap') {
				if ($uqType == 'Map') {
					$contents = '';
					foreach($value as $k => $v) {
						$this->debug("serializing map element: key $k, value $v");
						$contents .= '<item>';
						$contents .= $this->serialize_val($k,'key',false,false,false,false,$use);
						$contents .= $this->serialize_val($v,'value',false,false,false,false,$use);
						$contents .= '</item>';
					}
					if ($use == 'literal') {
						if ($forceType) {
							$xml = "<$name xsi:type=\"" . $this->getPrefixFromNamespace('http://xml.apache.org/xml-soap') . ":$uqType\">$contents</$name>";
						} else {
							$xml = "<$name>$contents</$name>";
						}
					} else {
						$xml = "<$name xsi:type=\"" . $this->getPrefixFromNamespace('http://xml.apache.org/xml-soap') . ":$uqType\"$encodingStyle>$contents</$name>";
					}
					$this->debug("serializeType returning: $xml");
					return $xml;
				}
			}
		} else {
			$this->debug("No namespace for type $type");
			$ns = '';
			$uqType = $type;
		}
		if(!$typeDef = $this->getTypeDef($uqType, $ns)){
			$this->setError("$type ($uqType) is not a supported type.");
			$this->debug("$type ($uqType) is not a supported type.");
			return false;
		} else {
			$this->debug("typedef:");
			$this->appendDebug($this->varDump($typeDef));
		}
		$phpType = $typeDef['phpType'];
		$this->debug("serializeType: uqType: $uqType, ns: $ns, phptype: $phpType, arrayType: " . (isset($typeDef['arrayType']) ? $typeDef['arrayType'] : '') ); 
		// if php type == struct, map value to the <all> element names
		if ($phpType == 'struct') {
			if (isset($typeDef['typeClass']) && $typeDef['typeClass'] == 'element') {
				$elementName = $uqType;
				if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
					$elementNS = " xmlns=\"$ns\"";
				} else {
					$elementNS = " xmlns=\"\"";
				}
			} else {
				$elementName = $name;
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if (is_null($value)) {
				if ($use == 'literal') {
					// TODO: depends on nillable
					$xml = "<$elementName$elementNS/>";
				} else {
					$xml = "<$elementName$elementNS xsi:nil=\"true\"/>";
				}
				$this->debug("serializeType returning: $xml");
				return $xml;
			}
			$elementAttrs = $this->serializeComplexTypeAttributes($typeDef, $value, $ns, $uqType);
			if ($use == 'literal') {
				if ($forceType) {
					$xml = "<$elementName$elementNS$elementAttrs xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">";
				} else {
					$xml = "<$elementName$elementNS$elementAttrs>";
				}
			} else {
				$xml = "<$elementName$elementNS$elementAttrs xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>";
			}

			$xml .= $this->serializeComplexTypeElements($typeDef, $value, $ns, $uqType, $use, $encodingStyle);
			$xml .= "</$elementName>";
		} elseif ($phpType == 'array') {
			if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
				$elementNS = " xmlns=\"$ns\"";
			} else {
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if (is_null($value)) {
				if ($use == 'literal') {
					// TODO: depends on nillable
					$xml = "<$name$elementNS/>";
				} else {
					$xml = "<$name$elementNS xsi:nil=\"true\"/>";
				}
				$this->debug("serializeType returning: $xml");
				return $xml;
			}
			if (isset($typeDef['multidimensional'])) {
				$nv = array();
				foreach($value as $v) {
					$cols = ',' . sizeof($v);
					$nv = array_merge($nv, $v);
				} 
				$value = $nv;
			} else {
				$cols = '';
			} 
			if (is_array($value) && sizeof($value) >= 1) {
				$rows = sizeof($value);
				$contents = '';
				foreach($value as $k => $v) {
					$this->debug("serializing array element: $k, $v of type: $typeDef[arrayType]");
					//if (strpos($typeDef['arrayType'], ':') ) {
					if (!in_array($typeDef['arrayType'],$this->typemap['http://www.w3.org/2001/XMLSchema'])) {
					    $contents .= $this->serializeType('item', $typeDef['arrayType'], $v, $use);
					} else {
					    $contents .= $this->serialize_val($v, 'item', $typeDef['arrayType'], null, $this->XMLSchemaVersion, false, $use);
					} 
				}
			} else {
				$rows = 0;
				$contents = null;
			}
			// TODO: for now, an empty value will be serialized as a zero element
			// array.  Revisit this when coding the handling of null/nil values.
			if ($use == 'literal') {
				$xml = "<$name$elementNS>"
					.$contents
					."</$name>";
			} else {
				$xml = "<$name$elementNS xsi:type=\"".$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/').':Array" '.
					$this->getPrefixFromNamespace('http://schemas.xmlsoap.org/soap/encoding/')
					.':arrayType="'
					.$this->getPrefixFromNamespace($this->getPrefix($typeDef['arrayType']))
					.":".$this->getLocalPart($typeDef['arrayType'])."[$rows$cols]\">"
					.$contents
					."</$name>";
			}
		} elseif ($phpType == 'scalar') {
			if (isset($typeDef['form']) && ($typeDef['form'] == 'qualified')) {
				$elementNS = " xmlns=\"$ns\"";
			} else {
				if ($unqualified) {
					$elementNS = " xmlns=\"\"";
				} else {
					$elementNS = '';
				}
			}
			if ($use == 'literal') {
				if ($forceType) {
					$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\">$value</$name>";
				} else {
					$xml = "<$name$elementNS>$value</$name>";
				}
			} else {
				$xml = "<$name$elementNS xsi:type=\"" . $this->getPrefixFromNamespace($ns) . ":$uqType\"$encodingStyle>$value</$name>";
			}
		}
		$this->debug("serializeType returning: $xml");
		return $xml;
	}
	
	/**
	 * serializes the attributes for a complexType
	 *
	 * @param array $typeDef
	 * @param mixed $value , a native PHP value (parameter value)
	 * @param string $ns the namespace of the type
	 * @param string $uqType the local part of the type
	 * @return string serialization
	 * @access public 
	 */
	function serializeComplexTypeAttributes($typeDef, $value, $ns, $uqType) {
		$xml = '';
		if (isset($typeDef['attrs']) && is_array($typeDef['attrs'])) {
			$this->debug("serialize attributes for XML Schema type $ns:$uqType");
			if (is_array($value)) {
				$xvalue = $value;
			} elseif (is_object($value)) {
				$xvalue = get_object_vars($value);
			} else {
				$this->debug("value is neither an array nor an object for XML Schema type $ns:$uqType");
				$xvalue = array();
			}
			foreach ($typeDef['attrs'] as $aName => $attrs) {
				if (isset($xvalue['!' . $aName])) {
					$xname = '!' . $aName;
					$this->debug("value provided for attribute $aName with key $xname");
				} elseif (isset($xvalue[$aName])) {
					$xname = $aName;
					$this->debug("value provided for attribute $aName with key $xname");
				} elseif (isset($attrs['default'])) {
					$xname = '!' . $aName;
					$xvalue[$xname] = $attrs['default'];
					$this->debug('use default value of ' . $xvalue[$aName] . ' for attribute ' . $aName);
				} else {
					$xname = '';
					$this->debug("no value provided for attribute $aName");
				}
				if ($xname) {
					$xml .=  " $aName=\"" . $xvalue[$xname] . "\"";
				}
			} 
		} else {
			$this->debug("no attributes to serialize for XML Schema type $ns:$uqType");
		}
		if (isset($typeDef['extensionBase'])) {
			$ns = $this->getPrefix($typeDef['extensionBase']);
			$uqType = $this->getLocalPart($typeDef['extensionBase']);
			if ($this->getNamespaceFromPrefix($ns)) {
				$ns = $this->getNamespaceFromPrefix($ns);
			}
			if ($typeDef = $this->getTypeDef($uqType, $ns)) {
				$this->debug("serialize attributes for extension base $ns:$uqType");
				$xml .= $this->serializeComplexTypeAttributes($typeDef, $value, $ns, $uqType);
			} else {
				$this->debug("extension base $ns:$uqType is not a supported type");
			}
		}
		return $xml;
	}

	/**
	 * serializes the elements for a complexType
	 *
	 * @param array $typeDef
	 * @param mixed $value , a native PHP value (parameter value)
	 * @param string $ns the namespace of the type
	 * @param string $uqType the local part of the type
	 * @param string $use , use for part (encoded|literal)
	 * @param string $encodingStyle , use to add encoding changes to serialisation
	 * @return string serialization
	 * @access public 
	 */
	function serializeComplexTypeElements($typeDef, $value, $ns, $uqType, $use='encoded', $encodingStyle=false) {
		$xml = '';
		if (isset($typeDef['elements']) && is_array($typeDef['elements'])) {
			$this->debug("serialize elements for XML Schema type $ns:$uqType");
			if (is_array($value)) {
				$xvalue = $value;
			} elseif (is_object($value)) {
				$xvalue = get_object_vars($value);
			} else {
				$this->debug("value is neither an array nor an object for XML Schema type $ns:$uqType");
				$xvalue = array();
			}
			// toggle whether all elements are present - ideally should validate against schema
			if (count($typeDef['elements']) != count($xvalue)){
				$optionals = true;
			}
			foreach ($typeDef['elements'] as $eName => $attrs) {
				if (!isset($xvalue[$eName])) {
					if (isset($attrs['default'])) {
						$xvalue[$eName] = $attrs['default'];
						$this->debug('use default value of ' . $xvalue[$eName] . ' for element ' . $eName);
					}
				}
				// if user took advantage of a minOccurs=0, then only serialize named parameters
				if (isset($optionals) && !isset($xvalue[$eName])){
					// do nothing
					$this->debug("no value provided for complexType element $eName, so serialize nothing");
				} else {
					// get value
					if (isset($xvalue[$eName])) {
					    $v = $xvalue[$eName];
					} else {
					    $v = null;
					}
					if (isset($attrs['form'])) {
						$unqualified = ($attrs['form'] == 'unqualified');
					} else {
						$unqualified = false;
					}
					// TODO: if maxOccurs > 1 (not just unbounded), then allow serialization of an array
					if (isset($attrs['maxOccurs']) && $attrs['maxOccurs'] == 'unbounded' && isset($v) && is_array($v) && $this->isArraySimpleOrStruct($v) == 'arraySimple') {
						$vv = $v;
						foreach ($vv as $k => $v) {
							if (isset($attrs['type'])) {
								// serialize schema-defined type
							    $xml .= $this->serializeType($eName, $attrs['type'], $v, $use, $encodingStyle, $unqualified);
							} else {
								// serialize generic type
							    $this->debug("calling serialize_val() for $v, $eName, false, false, false, false, $use");
							    $xml .= $this->serialize_val($v, $eName, false, false, false, false, $use);
							}
						}
					} else {
						if (isset($attrs['type'])) {
							// serialize schema-defined type
						    $xml .= $this->serializeType($eName, $attrs['type'], $v, $use, $encodingStyle, $unqualified);
						} else {
							// serialize generic type
						    $this->debug("calling serialize_val() for $v, $eName, false, false, false, false, $use");
						    $xml .= $this->serialize_val($v, $eName, false, false, false, false, $use);
						}
					}
				}
			} 
		} else {
			$this->debug("no elements to serialize for XML Schema type $ns:$uqType");
		}
		if (isset($typeDef['extensionBase'])) {
			$ns = $this->getPrefix($typeDef['extensionBase']);
			$uqType = $this->getLocalPart($typeDef['extensionBase']);
			if ($this->getNamespaceFromPrefix($ns)) {
				$ns = $this->getNamespaceFromPrefix($ns);
			}
			if ($typeDef = $this->getTypeDef($uqType, $ns)) {
				$this->debug("serialize elements for extension base $ns:$uqType");
				$xml .= $this->serializeComplexTypeElements($typeDef, $value, $ns, $uqType, $use, $encodingStyle);
			} else {
				$this->debug("extension base $ns:$uqType is not a supported type");
			}
		}
		return $xml;
	}

	/**
	* adds an XML Schema complex type to the WSDL types
	*
	* @param name
	* @param typeClass (complexType|simpleType|attribute)
	* @param phpType: currently supported are array and struct (php assoc array)
	* @param compositor (all|sequence|choice)
	* @param restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
	* @param elements = array ( name = array(name=>'',type=>'') )
	* @param attrs = array(
	* 	array(
	*		'ref' => "http://schemas.xmlsoap.org/soap/encoding/:arrayType",
	*		"http://schemas.xmlsoap.org/wsdl/:arrayType" => "string[]"
	* 	)
	* )
	* @param arrayType: namespace:name (http://www.w3.org/2001/XMLSchema:string)
	* @see xmlschema
	* 
	*/
	function addComplexType($name,$typeClass='complexType',$phpType='array',$compositor='',$restrictionBase='',$elements=array(),$attrs=array(),$arrayType='') {
		if (count($elements) > 0) {
	    	foreach($elements as $n => $e){
	            // expand each element
	            foreach ($e as $k => $v) {
		            $k = strpos($k,':') ? $this->expandQname($k) : $k;
		            $v = strpos($v,':') ? $this->expandQname($v) : $v;
		            $ee[$k] = $v;
		    	}
	    		$eElements[$n] = $ee;
	    	}
	    	$elements = $eElements;
		}
		
		if (count($attrs) > 0) {
	    	foreach($attrs as $n => $a){
	            // expand each attribute
	            foreach ($a as $k => $v) {
		            $k = strpos($k,':') ? $this->expandQname($k) : $k;
		            $v = strpos($v,':') ? $this->expandQname($v) : $v;
		            $aa[$k] = $v;
		    	}
	    		$eAttrs[$n] = $aa;
	    	}
	    	$attrs = $eAttrs;
		}

		$restrictionBase = strpos($restrictionBase,':') ? $this->expandQname($restrictionBase) : $restrictionBase;
		$arrayType = strpos($arrayType,':') ? $this->expandQname($arrayType) : $arrayType;

		$typens = isset($this->namespaces['types']) ? $this->namespaces['types'] : $this->namespaces['tns'];
		$this->schemas[$typens][0]->addComplexType($name,$typeClass,$phpType,$compositor,$restrictionBase,$elements,$attrs,$arrayType);
	}

	/**
	* adds an XML Schema simple type to the WSDL types
	*
	* @param name
	* @param restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
	* @param typeClass (simpleType)
	* @param phpType: (scalar)
	* @see xmlschema
	* 
	*/
	function addSimpleType($name, $restrictionBase='', $typeClass='simpleType', $phpType='scalar') {
		$restrictionBase = strpos($restrictionBase,':') ? $this->expandQname($restrictionBase) : $restrictionBase;

		$typens = isset($this->namespaces['types']) ? $this->namespaces['types'] : $this->namespaces['tns'];
		$this->schemas[$typens][0]->addSimpleType($name, $restrictionBase, $typeClass, $phpType);
	}

	/**
	* adds an element to the WSDL types
	*
	* @param name
	* @param array $attrs attributes that must include name and type
	* @see xmlschema
	*/
	function addElement($attrs) {
		$typens = isset($this->namespaces['types']) ? $this->namespaces['types'] : $this->namespaces['tns'];
		$this->schemas[$typens][0]->addElement($attrs);
	}

	/**
	* register a service with the server
	* 
	* @param string $methodname 
	* @param string $in assoc array of input values: key = param name, value = param type
	* @param string $out assoc array of output values: key = param name, value = param type
	* @param string $namespace optional The namespace for the operation
	* @param string $soapaction optional The soapaction for the operation
	* @param string $style (rpc|document) optional The style for the operation
	* @param string $use (encoded|literal) optional The use for the parameters (cannot mix right now)
	* @param string $documentation optional The description to include in the WSDL
	* @access public 
	*/
	function addOperation($name, $in = false, $out = false, $namespace = false, $soapaction = false, $style = 'rpc', $use = 'encoded', $documentation = ''){
		if ($style == 'rpc' && $use == 'encoded') {
			$encodingStyle = 'http://schemas.xmlsoap.org/soap/encoding/';
		} else {
			$encodingStyle = '';
		}

		if ($style == 'document') {
			$elements = array();
			foreach ($in as $n => $t) {
				$elements[$n] = array('name' => $n, 'type' => $t);
			}
			$this->addComplexType($name . 'RequestType', 'complexType', 'struct', 'all', '', $elements);
			$this->addElement(array('name' => $name, 'type' => $name . 'RequestType'));
			$in = array('parameters' => 'tns:' . $name);

			$elements = array();
			foreach ($out as $n => $t) {
				$elements[$n] = array('name' => $n, 'type' => $t);
			}
			$this->addComplexType($name . 'ResponseType', 'complexType', 'struct', 'all', '', $elements);
			$this->addElement(array('name' => $name . 'Response', 'type' => $name . 'ResponseType'));
			$out = array('parameters' => 'tns:' . $name . 'Response');
		}

		// get binding
		$this->bindings[ $this->serviceName . 'Binding' ]['operations'][$name] =
		array(
		'name' => $name,
		'binding' => $this->serviceName . 'Binding',
		'endpoint' => $this->endpoint,
		'soapAction' => $soapaction,
		'style' => $style,
		'input' => array(
			'use' => $use,
			'namespace' => $namespace,
			'encodingStyle' => $encodingStyle,
			'message' => $name . 'Request',
			'parts' => $in),
		'output' => array(
			'use' => $use,
			'namespace' => $namespace,
			'encodingStyle' => $encodingStyle,
			'message' => $name . 'Response',
			'parts' => $out),
		'namespace' => $namespace,
		'transport' => 'http://schemas.xmlsoap.org/soap/http',
		'documentation' => $documentation); 
		// add portTypes
		// add messages
		if($in)
		{
			foreach($in as $pName => $pType)
			{
				if(strpos($pType,':')) {
					$pType = $this->getNamespaceFromPrefix($this->getPrefix($pType)).":".$this->getLocalPart($pType);
				}
				$this->messages[$name.'Request'][$pName] = $pType;
			}
		} else {
            $this->messages[$name.'Request']= '0';
        }
		if($out)
		{
			foreach($out as $pName => $pType)
			{
				if(strpos($pType,':')) {
					$pType = $this->getNamespaceFromPrefix($this->getPrefix($pType)).":".$this->getLocalPart($pType);
				}
				$this->messages[$name.'Response'][$pName] = $pType;
			}
		} else {
            $this->messages[$name.'Response']= '0';
        }
		return true;
	} 
}

?>