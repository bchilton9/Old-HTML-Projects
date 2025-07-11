<?php
/***************************************************************************
 *						def_userfuncs_vlist.php
 *						-----------------------
 *	begin			: 07/10/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *
 *	version			: 1.0.0 - 10/10/2003
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
	exit;
}

//-------------------------------------------
//
//	languages installed
//
//-------------------------------------------
function get_langs_list()
{
	global $phpbb_root_path;

	// read all the language available
	$dir_lang = opendir($phpbb_root_path . './language');
	$langs = array();
	$langs_name = array();
	while ( $file_lang = readdir($dir_lang) )
	{
		if ( preg_match('#^lang_#i', $file_lang) && !is_file($phpbb_root_path . './language/' . $file_lang) && !is_link($phpbb_root_path . './language/' . $file_lang) )
		{
			$filename_lang = trim(str_replace('lang_', '', $file_lang));
			$displayname_lang = preg_replace("/^(.*?)_(.*)$/", "\\1 [ \\2 ]", $filename_lang);
			$displayname_lang = preg_replace("/\[(.*?)_(.*)\]/", "[ \\1 - \\2 ]", $displayname_lang);

			// store the result
			$langs[$filename_lang] = array( 'txt' => ucwords($displayname_lang) );
			$langs_name[] = ucwords($displayname_lang);
		}
	}
	closedir($dir_lang);
	@array_multisort($langs_name, $langs);

	return $langs;
}

//-------------------------------------------
//
//	timezone available
//
//-------------------------------------------
function get_timezones_list()
{
	global $lang;

	$tz = array('-12', '-11', '-10', '-9', '-8', '-7', '-6', '-5', '-4', '-3.5', '-3', '-2', '-1', '0', '1', '2', '3', '3.5', '4', '4.5', '5', '5.5', '6', '6.5', '7', '8', '9', '9.5', '10', '11', '12', '13' );

	$timezones = array();
	for ($i = 0; $i < count($tz); $i++)
	{
		$timezones[ $tz[$i] ] = array( 'txt' => $tz[$i], 'img' => 'tz_' . $tz[$i] );
	}

	return $timezones;
}

?>