<?php
/***************************************************************************
 *						lang_extend_lang_extend.php [French]
 *						------------------------------------
 *	begin				: 29/09/2003
 *	copyright			: Ptirhiik
 *	email				: ptirhiik@clanmckeen.com
 *
 *	version				: 1.0.1 - 16/10/2003
 *
 ***************************************************************************/
 
/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

// admin part
if ( $lang_extend_admin )
{
	$lang['Lang_extend_lang_extend'] = 'Extension pour les packs de langues';

	$lang['Lang_extend__custom'] = 'Pack de langues personnalis�';
	$lang['Lang_extend__phpBB'] = 'Pack de langues phpBB (standard)';
	
	$lang['Languages'] = 'Langues';
	$lang['Lang_management'] = 'Gestion';
	$lang['Lang_extend'] = 'Gestion de l\'extension des langues';
	$lang['Lang_extend_explain'] = 'Ici vous pouvez ajouter ou modifier des cl�s de langues';
	$lang['Lang_extend_pack'] = 'Pack de langues';
	$lang['Lang_extend_pack_explain'] = 'Renseignez ici le nom du pack, g�n�ralement le nom du MOD auquel appartient ce pack de langue.';

	$lang['Lang_extend_entry'] = 'Cl� de langues';
	$lang['Lang_extend_entries'] = 'Cl�s de langues';
	$lang['Lang_extend_level_admin'] = 'Admin';
	$lang['Lang_extend_level_normal'] = 'Normal';

	$lang['Lang_extend_add_entry'] = 'Ajouter un nouvelle cl�';

	$lang['Lang_extend_key_main'] = 'Cl� principale';
	$lang['Lang_extend_key_main_explain'] = 'Renseignez ici la cl� de langues principale, la seule utilis�e dans la majorit� des cas.';
	$lang['Lang_extend_key_sub'] = 'Cl� secondaire';
	$lang['Lang_extend_key_sub_explain'] = 'Renseignez ici la cl� secondaire, g�n�ralement non utilis�e.';
	$lang['Lang_extend_level'] = 'Niveau de la cl� de langues';
	$lang['Lang_extend_level_explain'] = 'Le niveau admin ne peut �tre utilis� que dans le panneau d\'administration. Le niveau normal peut �tre utilis� partout.';

	$lang['Lang_extend_missing_value'] = 'Vous avez � fournir au minimum le libell� en anglais.';
	$lang['Lang_extend_key_missing'] = 'La cl� principale est absente.';
	$lang['Lang_extend_duplicate_entry'] = 'Cette cl� existe d�j� (voir le pack %s).';

	$lang['Lang_extend_update_done'] = 'Cette cl� de langue a �t� mise � jour.<br /><br />Cliquez %sici%s pour retourner � cette cl�.<br /><br />Cliquez %sici%s pour retourner � la liste des cl�s.';
	$lang['Lang_extend_delete_done'] = 'Cette cl� de langues a �t� supprim�e.<br />Notez que seules les personnalisation sont supprim�es, pas les cl�s existantes dans les packs.<br /><br />Cliquez %sici%s pour retourner � la liste des cl�s.';

	$lang['Lang_extend_search'] = 'Rechercher dans la liste des cl�s';
	$lang['Lang_extend_search_words'] = 'Mots � trouver';
	$lang['Lang_extend_search_words_explain'] = 'S�parez les mots par des espaces.';
	$lang['Lang_extend_search_all'] = 'Tous les mots';
	$lang['Lang_extend_search_one'] = 'Un parmi';
	$lang['Lang_extend_search_in'] = 'Rechercher dans';
	$lang['Lang_extend_search_in_explain'] = 'Pr�cisez o� chercher.';
	$lang['Lang_extend_search_in_key'] = 'Cl�s';
	$lang['Lang_extend_search_in_value'] = 'Valeurs';
	$lang['Lang_extend_search_in_both'] = 'Les deux';
	$lang['Lang_extend_search_all_lang'] = 'Toutes les langues install�es';

	$lang['Lang_extend_search_no_words'] = 'Vous n\'avez fournis aucun mots � rechercher.<br /><br />Cliquez %sici%s pour retourner � la liste des packs de langues.';
	$lang['Lang_extend_search_results'] = 'R�sultats de la recherche';
	$lang['Lang_extend_value'] = 'Valeur';
	$lang['Lang_extend_level_leg'] = 'Niveau';

	$lang['Lang_extend_added_modified'] = '*';
	$lang['Lang_extend_modified'] = 'Modifi�';
	$lang['Lang_extend_added'] = 'Ajout�';
}

?>