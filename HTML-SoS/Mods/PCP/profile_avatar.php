<?php
/***************************************************************************
 *                            profile_avatar.php
 *                            ------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_avatar.php,v 1.8.2.16 2002/12/21 19:09:57 psotfx Exp $
 *
 *	begin				: 08/05/2003
 *	revision			: 1.0.0
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

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

//
// Start session management
//
$nb_per_row = 4;
$userdata = session_pagestart($user_ip, PAGE_SEARCH);
init_userprefs($userdata);

if (isset($HTTP_POST_VARS['avatargallery'])) $category = trim(htmlspecialchars($HTTP_POST_VARS['avatarcategory']));

//
// set the page title and include the page header
//
$gen_simple_header = TRUE;
$page_title = $lang['Avatar_gallery'];
include ($phpbb_root_path . 'includes/page_header.'.$phpEx);
$template->set_filenames(array(
	'body' => 'profilcp/avatar_body.tpl')
);

// get the avatar categories
$dir = @opendir($phpbb_root_path . $board_config['avatar_gallery_path']);
$avatar_images = array();
while( $file = @readdir($dir) )
{
	if( $file != '.' && $file != '..' && !is_file($phpbb_root_path . $board_config['avatar_gallery_path'] . '/' . $file) && !is_link($phpbb_root_path . $board_config['avatar_gallery_path'] . '/' . $file) )
	{
		$sub_dir = @opendir($phpbb_root_path . $board_config['avatar_gallery_path'] . '/' . $file);
		$avatar_row_count = 0;
		$avatar_col_count = 0;
		while( $sub_file = @readdir($sub_dir) )
		{
			if( preg_match('/(\.gif$|\.png$|\.jpg|\.jpeg)$/is', $sub_file) )
			{
				$avatar_images[$file][$avatar_row_count][$avatar_col_count] = $file . '/' . $sub_file; 
				$avatar_name[$file][$avatar_row_count][$avatar_col_count] = ucfirst(str_replace("_", " ", preg_replace('/^(.*)\..*$/', '\1', $sub_file)));
				$avatar_col_count++;
				if( $avatar_col_count == $nb_per_row )
				{
					$avatar_row_count++;
					$avatar_col_count = 0;
				}
			}
		}
	}
}
@closedir($dir);

@ksort($avatar_images);
@reset($avatar_images);
if( empty($category) ) list($category, ) = each($avatar_images);

@reset($avatar_images);
$s_categories = '<select name="avatarcategory">';
while( list($key) = each($avatar_images) )
{
	$selected = ( $key == $category ) ? ' selected="selected"' : '';
	if( count($avatar_images[$key]) )
	{
		$s_categories .= '<option value="' . $key . '"' . $selected . '>' . ucfirst($key) . '</option>';
	}
}
$s_categories .= '</select>';

$s_colspan = 0;
for($i = 0; $i < count($avatar_images[$category]); $i++)
{
	$template->assign_block_vars("avatar_row", array());
	$s_colspan = max($s_colspan, count($avatar_images[$category][$i]));
	for($j = 0; $j < count($avatar_images[$category][$i]); $j++)
	{
		$template->assign_block_vars('avatar_row.avatar_column', array(
			'AVATAR_IMAGE' => $phpbb_root_path . $board_config['avatar_gallery_path'] . '/' . $avatar_images[$category][$i][$j],
			'AVATAR_NAME' => $avatar_name[$category][$i][$j],
			'AVATAR_FILE' => $avatar_images[$category][$i][$j],
			)
		);
	}
}

$s_hidden_vars = '<input type="hidden" name="sid" value="' . $session_id . '" />';
$template->assign_vars(array(
	'L_AVATAR_GALLERY' => $lang['Avatar_gallery'],
	'L_CATEGORY' => $lang['Select_category'],
	'L_GO' => $lang['Go'],
	'L_CLOSE_WINDOW' => $lang['Close_window'],

	'S_CATEGORY_SELECT' => $s_categories,
	'S_AVATAR_SELECT_ACTION' => append_sid("profile_avatar.$phpEx"),
	'S_HIDDEN_FIELDS' => $s_hidden_vars,
	)
);

//
// footer
//
$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>