<?php



/**
* caches instances of the wsdl class
* 
* @author   Scott Nichol <snichol@computer.org>
* @author	Ingo Fischer <ingo@apollon.de>
* @version  $Id: class.wsdlcache.php 6 2006-05-08 17:11:35Z tsigo $
* @access public 
*/
class wsdlcache {
	var $fplock;
	var $cache_lifetime;
	var $cache_dir;
	var $debug_str = '';

	/*
	* constructor
	*
	* @param string $cache_dir directory for cache-files
	* @param integer $cache_lifetime lifetime for caching-files in seconds or 0 for unlimited
	* @access public
	*/
	function wsdlcache($cache_dir='.', $cache_lifetime=0) {
		$this->fplock = array();
		$this->cache_dir = $cache_dir != '' ? $cache_dir : '.';
		$this->cache_lifetime = $cache_lifetime;
	}

	/**
	* creates the filename used to cache a wsdl instance
	*
	* @param string $wsdl The URL of the wsdl instance
	* @return string The filename used to cache the instance
	* @access protected
	*/
	function createFilename($wsdl) {
		return $this->cache_dir.'/wsdlcache-' . md5($wsdl);
	}

	/**
	* adds debug data to the class level debug string
	*
	* @param    string $string debug data
	* @access   private
	*/
	function debug($string){
		$this->debug_str .= get_class($this).": $string\n";
	}

	/**
	* gets a wsdl instance from the cache
	*
	* @param string $wsdl The URL of the wsdl instance
	* @return object The cached wsdl instance, null if the instance is not in the cache
	* @access public
	*/
	function get($wsdl) {
		$filename = $this->createFilename($wsdl);
		if ($this->obtainMutex($filename, "r")) {
			// check for expired WSDL that must be removed from the cache
 			if ($this->cache_lifetime > 0) {
				if (file_exists($filename) && (time() - filemtime($filename) > $this->cache_lifetime)) {
					unlink($filename);
					$this->debug("Expired $wsdl ($filename) from cache");
					$this->releaseMutex($filename);
					return null;
  				}
			}
			// see what there is to return
			$fp = @fopen($filename, "r");
			if ($fp) {
				$s = implode("", @file($filename));
				fclose($fp);
				$this->debug("Got $wsdl ($filename) from cache");
			} else {
				$s = null;
				$this->debug("$wsdl ($filename) not in cache");
			}
			$this->releaseMutex($filename);
			return (!is_null($s)) ? unserialize($s) : null;
		} else {
			$this->debug("Unable to obtain mutex for $filename in get");
		}
		return null;
	}

	/**
	* obtains the local mutex
	*
	* @param string $filename The Filename of the Cache to lock
	* @param string $mode The open-mode ("r" or "w") or the file - affects lock-mode
	* @return boolean Lock successfully obtained ?!
	* @access protected
	*/
	function obtainMutex($filename, $mode) {
		if (isset($this->fplock[md5($filename)])) {
			$this->debug("Lock for $filename already exists");
			return false;
		}
		$this->fplock[md5($filename)] = fopen($filename.".lock", "w");
		if ($mode == "r") {
			return flock($this->fplock[md5($filename)], LOCK_SH);
		} else {
			return flock($this->fplock[md5($filename)], LOCK_EX);
		}
	}

	/*
	* adds a wsdl instance to the cache
	*
	* @param object $wsdl_instance The wsdl instance to add
	* @return boolean WSDL successfully cached
	* @access public
	*/
	function put($wsdl_instance) {
		$filename = $this->createFilename($wsdl_instance->wsdl);
		$s = serialize($wsdl_instance);
		if ($this->obtainMutex($filename, "w")) {
			$fp = fopen($filename, "w");
			fputs($fp, $s);
			fclose($fp);
			$this->debug("Put $wsdl_instance->wsdl ($filename) in cache");
			$this->releaseMutex($filename);
			return true;
		} else {
			$this->debug("Unable to obtain mutex for $filename in put");
		}
		return false;
	}

	/**
	* releases the local mutex
	*
	* @param string $filename The Filename of the Cache to lock
	* @return boolean Lock successfully released
	* @access protected
	*/
	function releaseMutex($filename) {
		$ret = flock($this->fplock[md5($filename)], LOCK_UN);
		fclose($this->fplock[md5($filename)]);
		unset($this->fplock[md5($filename)]);
		if (! $ret) {
			$this->debug("Not able to release lock for $filename");
		}
		return $ret;
	}

	/**
	* removes a wsdl instance from the cache
	*
	* @param string $wsdl The URL of the wsdl instance
	* @return boolean Whether there was an instance to remove
	* @access public
	*/
	function remove($wsdl) {
		$filename = $this->createFilename($wsdl);
		// ignore errors obtaining mutex
		$this->obtainMutex($filename, "w");
		$ret = unlink($filename);
		$this->debug("Removed ($ret) $wsdl ($filename) from cache");
		$this->releaseMutex($filename);
		return $ret;
	}
}
?>
