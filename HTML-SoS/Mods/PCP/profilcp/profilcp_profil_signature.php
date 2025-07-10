<?php
/***************************************************************************
 *							profilcp_profil_signature.php
 *							-----------------------------
 *	begin				: 08/05/2003
 *	copyright			: Ptirhiik
 *	email				: admin@rpgnet-fr.com
 *
 *	version				: 1.0.3 - 17/10/2003
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
if ( !empty($setmodules) )
{
	if ($board_config['allow_sig'])
	{
		pcp_set_sub_menu('profil', 'signature', 30, __FILE__, 'profilcp_signature_shortcut', 'profilcp_signature_pagetitle' );
	}
	return;
}

// check access
if ( ($userdata['user_id'] != $view_userdata['user_id']) && (!is_admin($userdata) || ($level_prior[get_user_level($userdata)] <= $level_prior[get_user_level($view_userdata)])) ) return;

//
// template file
$template->set_filenames(array(
	'body' => 'profilcp/profil_signature_body.tpl')
);

if ($submit || $preview)
{
	$signature = str_replace( '<br />', "\n", trim(str_replace("\'", "''", $HTTP_POST_VARS['message'])) );
	$signature_bbcode_uid = $view_userdata['user_sig_bbcode_uid'];
	if ( $signature != '' )
	{
		if ( strlen($signature) > $board_config['max_sig_chars'] )
		{
			$error = true;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Signature_too_long'];
		}
		if ( $signature_bbcode_uid == '' )
		{
			$signature_bbcode_uid = ( $view_userdata['user_allowbbcode'] ) ? make_bbcode_uid() : '';
		}
		$signature = prepare_message($signature, $view_userdata['user_allowhtml'], $view_userdata['user_allowbbcode'], $view_userdata['user_allowsmile'], $signature_bbcode_uid);

		$view_userdata['user_sig'] = $signature;
		$view_userdata['user_sig_bbcode_uid'] = $signature_bbcode_uid; 
	}
	if ( $error )
	{
		message_die(GENERAL_ERROR, $error_msg);
	}
	if (!$error && !$preview)
	{
		$sql = "UPDATE " . USERS_TABLE . " 
				SET
					user_sig = '" . $signature . "',
					user_sig_bbcode_uid = '" . $signature_bbcode_uid . "' 
				WHERE
					user_id = " . $view_userdata['user_id'];
		if ( !$result = $db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update user table', '', __LINE__, __FILE__, $sql);
		}
	}
}
if (!$submit)
{
	$template->assign_vars(array(
		'L_SIGNATURE'			=> $lang['Signature'],
		'L_SIGNATURE_EXPLAIN'	=> sprintf($lang['Signature_explain'], $board_config['max_sig_chars']),
		'L_SIG_PREVIEW'			=> $lang['profilcp_sig_preview'],

		'L_SUBMIT'				=> $lang['Submit'],
		'L_PREVIEW'				=> $lang['Preview'],
		'L_RESET'				=> $lang['Reset'],

		'L_BBCODE_B_HELP'		=> $lang['bbcode_b_help'], 
		'L_BBCODE_I_HELP'		=> $lang['bbcode_i_help'], 
		'L_BBCODE_U_HELP'		=> $lang['bbcode_u_help'], 
		'L_BBCODE_Q_HELP'		=> $lang['bbcode_q_help'], 
		'L_BBCODE_C_HELP'		=> $lang['bbcode_c_help'], 
		'L_BBCODE_L_HELP'		=> $lang['bbcode_l_help'], 
		'L_BBCODE_O_HELP'		=> $lang['bbcode_o_help'], 
		'L_BBCODE_P_HELP'		=> $lang['bbcode_p_help'], 
		'L_BBCODE_W_HELP'		=> $lang['bbcode_w_help'], 
		'L_BBCODE_A_HELP'		=> $lang['bbcode_a_help'], 
		'L_BBCODE_S_HELP'		=> $lang['bbcode_s_help'], 
		'L_BBCODE_F_HELP'		=> $lang['bbcode_f_help'], 
		'L_EMPTY_MESSAGE'		=> $lang['Empty_message'],

		'L_FONT_COLOR'			=> $lang['Font_color'], 
		'L_COLOR_DEFAULT'		=> $lang['color_default'], 
		'L_COLOR_DARK_RED'		=> $lang['color_dark_red'], 
		'L_COLOR_RED'			=> $lang['color_red'], 
		'L_COLOR_ORANGE'		=> $lang['color_orange'], 
		'L_COLOR_BROWN'			=> $lang['color_brown'], 
		'L_COLOR_YELLOW'		=> $lang['color_yellow'], 
		'L_COLOR_GREEN'			=> $lang['color_green'], 
		'L_COLOR_OLIVE'			=> $lang['color_olive'], 
		'L_COLOR_CYAN'			=> $lang['color_cyan'], 
		'L_COLOR_BLUE'			=> $lang['color_blue'], 
		'L_COLOR_DARK_BLUE'		=> $lang['color_dark_blue'], 
		'L_COLOR_INDIGO'		=> $lang['color_indigo'], 
		'L_COLOR_VIOLET'		=> $lang['color_violet'], 
		'L_COLOR_WHITE'			=> $lang['color_white'], 
		'L_COLOR_BLACK'			=> $lang['color_black'], 

		'L_FONT_SIZE'			=> $lang['Font_size'], 
		'L_FONT_TINY'			=> $lang['font_tiny'], 
		'L_FONT_SMALL'			=> $lang['font_small'], 
		'L_FONT_NORMAL'			=> $lang['font_normal'], 
		'L_FONT_LARGE'			=> $lang['font_large'], 
		'L_FONT_HUGE'			=> $lang['font_huge'],

		'L_BBCODE_CLOSE_TAGS'	=> $lang['Close_Tags'],
		'L_STYLES_TIP'			=> $lang['Styles_tip'],
		)
	);

	$signature_bbcode_uid	= $view_userdata['user_sig_bbcode_uid'];
	$signature				= $view_userdata['user_sig'];
	$preview_sig			= prepare_signature( $signature, $view_userdata );

	$signature				= ($signature_bbcode_uid != '') ? preg_replace("/:(([a-z0-9]+:)?)$signature_bbcode_uid\]/si", ']', $signature) : $signature;

	$html_status			= ( $view_userdata['user_allowhtml'] && $board_config['allow_html'] ) ? $lang['HTML_is_ON'] : $lang['HTML_is_OFF'];
	$bbcode_status			= ( $view_userdata['user_allowbbcode'] && $board_config['allow_bbcode']  ) ? $lang['BBCode_is_ON'] : $lang['BBCode_is_OFF'];
	$smilies_status			= ( $view_userdata['user_allowsmile'] && $board_config['allow_smilies']  ) ? $lang['Smilies_are_ON'] : $lang['Smilies_are_OFF'];

	// Generate smilies listing for page output
	generate_smilies('inline', PAGE_POSTING);

	$template->assign_vars(array(
		'MESSAGE'			=> str_replace('<br />', "\n", $signature),
		'SIG_PREVIEW'		=> $preview_sig,
		'HTML_STATUS'		=> $html_status,
		'BBCODE_STATUS'		=> sprintf($bbcode_status, '<a href="' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'),
		'SMILIES_STATUS'	=> $smilies_status,
		)
	);

	$template->assign_vars(array(
		'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
		'S_PROFILCP_ACTION'	=> append_sid("profile.$phpEx"),
		)
	);

	// page
	$template->pparse('body');
}

?>