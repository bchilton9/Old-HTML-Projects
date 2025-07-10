<?php
/***************************************************************************
 *						lang_extend_pcp_management.php [French]
 *						---------------------------------------
 *	begin				: 08/10/2003
 *	copyright			: Ptirhiik
 *	email				: ptirhiik@clanmckeen.com
 *
 *	version				: 0.0.3 - 18/10/2003
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
	$lang['Lang_extend_pcp_management'] = 'Gestion du Profile Control Panel';

	// menu
	$lang['PCP_management'] = 'P.C.P.';
	$lang['PCP_00_tableslinked'] = 'Tables li�es';
	$lang['PCP_01_valueslist'] = 'Listes de valeurs';
	$lang['PCP_02_classesfields'] = 'Classes';
	$lang['PCP_03_userfields'] = 'Zones';
	$lang['PCP_04_usermaps'] = 'Cartographie';

	// objects
	$lang['PCP_tableslinked'] = 'Tables li�es';
	$lang['PCP_tableslinked_explain'] = 'Vous pouvez ici g�rer la d�finition des tables utilis�es par le Profile Control Panel pour les listes de valeurs, ainsi que pour les listes de membres.';

	$lang['PCP_valueslist'] = 'D�finition des listes de valeurs';
	$lang['PCP_valueslist_explain'] = 'Vous pouvez g�rer ici la d�finition des listes de valeurs utilis�es par le Profile Control Panel.';

	$lang['PCP_classesfields'] = 'Classes';
	$lang['PCP_classesfields_explain'] = 'Vous pouvez ici g�rer la d�finition des classes utilis�s par les zones du Profile Control Panel.';

	$lang['PCP_userfields'] = 'Zones';
	$lang['PCP_userfields_explain'] = 'Vous pouvez ici g�rer la d�finition des zones utilis�es par le Profile Control Panel.';

	$lang['PCP_usermaps'] = 'Cartographie';
	$lang['PCP_usermaps_explain'] = 'Vous pouvez ici g�rer les cartes des zones utilis�es par le Profile Control Panel et l\'affichage des sujets et des messages priv�s.';

	// fields
	$lang['PCP_field_name'] = 'Nom de la zone';
	$lang['PCP_field_name_explain'] = 'Renseignez ici le nom symbolique de la zone utilis� par les scripts php et les tables.';
	$lang['PCP_field_name_short'] = 'Zone';
	$lang['PCP_field_desc'] = 'Description';
	$lang['PCP_field_image'] = 'Image';
	$lang['PCP_field_class'] = 'Classe';
	$lang['PCP_field_type'] = 'Type';
	$lang['PCP_field_get_mode'] = 'Mode de saisie';
	$lang['PCP_field_functions'] = 'Fonctions';
	$lang['PCP_field_maps_usage'] = 'Utilis� dans les cartes';

	$lang['PCP_field_sql_actions'] = 'actions SQL';
	$lang['PCP_field_add'] = 'Ajouter une zone';

	// fields edit
	$lang['PCP_userfields_edit'] = 'Edition des zones';
	$lang['PCP_userfields_edit_explain'] = 'Ici vous pouvez g�rer la d�finition d\'une zone.';

	$lang['PCP_field_definition_part'] = 'D�finition de base';
	$lang['PCP_field_output_part'] = 'Affichage';
	$lang['PCP_field_input_part'] = 'Saisie';
	$lang['PCP_field_buddylist_part'] = 'Liste de membres';

	$lang['PCP_field_lang_key'] = 'Libell� de la zone';
	$lang['PCP_field_lang_key_explain'] = 'Renseignez ici le libell� qui sera affich�e devant la zone. Vous pouvez utiliser du texte, ou une cl� du tableau $lang[] (cf. <i>votre_langue</i>/lang_main.php)';
	$lang['PCP_field_lang_key_short'] = 'Libell�';
	$lang['PCP_field_explain'] = 'Explication sur la zone';
	$lang['PCP_field_explain_explain'] = 'Renseignez ici le libell� long servant d\'explication � la zone. Vous pouvez utiliser du texte, ou une cl� du tableau $lang[] (cf. <i>votre_langue</i>/lang_main.php)';
	$lang['PCP_field_image_explain'] = 'Renseignez ici une URI (URL locale) ou une cl� du tableau $image[] (see <i>votre_template</i>/<i>votre_template</i>.cfg).';
	$lang['PCP_field_title'] = 'Titre de l\'image';
	$lang['PCP_field_title_explain'] = 'Texte affich� dans la bulle apparaissant sous le curseur de la souris lorsque ce dernier passe sur l\'image. Vous pouvez utiliser du texte, ou une cl� du tableau $lang[] (cf. <i>votre_langue</i>/lang_main.php)';
	$lang['PCP_field_class_explain'] = 'D�termine sous quelles conditions le contenue de la zone est affich�e. Utilisez "g�n�rique" si aucune condition n\'est requise.';
	$lang['PCP_field_type_explain'] = 'Renseignez ici la nature de la zone.';

	$lang['PCP_field_sql_def'] = 'D�finition SQL';
	$lang['PCP_field_sql_def_explain'] = 'La d�finition SQL d\'une zone sera utilis�e comme expression de cette zone dans les listes de membres.';

	$lang['PCP_field_get_mode_explain'] = 'Renseignez ici la fa�on dont la zone sera propos�e � la saisie. Si vous utilisez des fonctions personnalis�es pour la saisie et le contr�le, ne renseignez pas cette partie.';
	$lang['PCP_field_values_list'] = 'Liste de valeurs';
	$lang['PCP_field_values_list_explain'] = 'Renseignez ici le nom de la liste de valeurs utilis�e pour cette zone. Une liste de valeurs est requise pour les modes de saisie commen�ant par LIST_.';
	$lang['PCP_field_default'] = 'Valeur par d�faut';
	$lang['PCP_field_default_explain'] = 'Renseignez ici la valeur initiale de la zone.';
	$lang['PCP_field_auth'] = 'Niveau d\'autorisation';
	$lang['PCP_field_auth_explain'] = 'Renseignez ici le niveau minimal d\'autorisation n�cessaire pour que cette zone soit propos�e en saisie.';
	$lang['PCP_field_get_func'] = 'Fonction de saisie';
	$lang['PCP_field_get_func_explain'] = 'Renseignez ici le nom de la fonction personnalis�e qui sera utilis�e pour la saisie de cette zone.';
	$lang['PCP_field_chk_func'] = 'Fonction de contr�le';
	$lang['PCP_field_chk_func_explain'] = 'Renseignez ici le nom de la fonction personnalis�e qui sera utilis�e pour le contr�le de saisie de cette zone.';
	$lang['PCP_field_dsp_func'] = 'Fonction d\'affichage';
	$lang['PCP_field_dsp_func_explain'] = 'Renseignez ici le nom de la fonction personnalis�e qui sera utilis�e pour l\'affichage de cette zone.';
	$lang['PCP_field_link'] = 'Lien';
	$lang['PCP_field_link_explain'] = 'Renseignez ici la d�finition du lien qui sera utilis� pour cette zone sur le texte et/ou l\'image. Vous pouvez utilisez les valeurs figuratives [cst.*], [view.*] et [user.*] pour renseigner les param�tres du programme appel�. Ex.:<br />&lt;a href="./profile.[php]?mode=viewprofile&[cst.POST_USERS_URL]=[view.user_id]" class="gen"&gt;%s&lt;/a&gt;';

	$lang['PCP_field_leg'] = 'Afficher le libell�';
	$lang['PCP_field_leg_explain'] = 'Choisissez "Oui" pour afficher le libell� de la zone sur les �crans.';
	$lang['PCP_field_leg_short'] = 'Lib';
	$lang['PCP_field_txt'] = 'Afficher le texte';
	$lang['PCP_field_txt_explain'] = 'Choisissez "Oui" pour afficher la valeur sous forme de texte de la zone sur les �crans.';
	$lang['PCP_field_txt_short'] = 'Txt';
	$lang['PCP_field_img'] = 'Afficher l\'image';
	$lang['PCP_field_img_explain'] = 'Choisissez "Oui" pour afficher la valeur sous forme d\'image (lorsque d�finie) de la zone sur les �crans.';
	$lang['PCP_field_img_short'] = 'Img';
	$lang['PCP_field_use_link'] = 'Utiliser le lien';
	$lang['PCP_field_use_link_explain'] = 'Choisissez "Oui" pour ajouter le lien (lorsque d�fini) � l\'image et/ou au texte de la zone sur les �crans.';
	$lang['PCP_field_use_link_short'] = 'Lnk';
	$lang['PCP_field_crlf'] = 'Retour � la ligne pour le texte';
	$lang['PCP_field_crlf_explain'] = 'Choisissez "Oui" pour que le texte apparaisse au-dessous de l\'image.';
	$lang['PCP_field_style'] = 'Formatage (style)';
	$lang['PCP_field_style_explain'] = 'Expression HTML pour formatter l\'affichage de la valeur texte ou image. Une instruction <i><a href="http://fr2.php.net/manual/fr/function.sprintf.php">sprintf(style, valeur)</a></i> sera alors utilis�e, l\'utilisation de %s dans la d�finition du formatage est donc n�cessaire.<br />Ex.: &lt;i&gt;%s&lt/i&gt; affichera la valeur de la zone en italique.';
	$lang['PCP_field_input_id'] = 'Nom de la zone de configuration';
	$lang['PCP_field_input_id_explain'] = 'Nom de la zone �cran dans un contexte de saisie, �galement nom de la zone de configuration dans la table config lorsque requis.';
	$lang['PCP_field_user_only'] = 'N\'est pas une zone de configuration';
	$lang['PCP_field_user_only_explain'] = 'Choisissez "Oui" pour emp�cher une entr�e dans la table de configuration d\'�tre cr��e pour cette zone. Vous pouvez utilisez ce r�glage pour les zones n\'apparaissant que dans la table des utilisateurs ou pour une zone calcul�e (zone syst�me).';
	$lang['PCP_field_system'] = 'Zone syst�me';
	$lang['PCP_field_system_explain'] = 'Choisissez "Oui" pour forcer la zone � appara�tre sur les �crans de saisie lorsque celle-ci n\'est ni une zone de la table utilisateurs, ni une entr�e de configuration. La d�finition des fonctions personnalis�es de saisie et de contr�le sera alors obligatoire. Utilisez cette possibilit� pour des liens ou des boutons de contr�les, ou encore pour des zones sp�ciales, par exemple en provenances d\'autres tables.';
	$lang['PCP_field_ind'] = 'Adresse de l\'option';
	$lang['PCP_field_ind_explain'] = 'Pour les listes de membres : Correspond � l\'adresse (n� de caract�re) de la zone d\'option utilisateur (user_list_option).';
	$lang['PCP_field_dft'] = 'Coch� par d�faut';
	$lang['PCP_field_dft_explain'] = 'Pour les listes de membres : choix initial de la zone.';
	$lang['PCP_field_rqd'] = 'Forcer la s�lection';
	$lang['PCP_field_rqd_explain'] = 'Pour les listes de membres : force la s�lection de la zone.';
	$lang['PCP_field_hidden'] = 'Ajouter la zone en invisible';
	$lang['PCP_field_hidden_explain'] = 'Pour les listes de membres : cela ajoutera la zone a la requ�te SQL sans pour autant qu\'il n\'apparaisse dans la liste des zones s�lectionnables pour les listes.';

	$lang['PCP_system_values'] = 'Liste des valeurs symboliques syst�me disponibles';

	$lang['PCP_userfields_field_pick_up'] = 'Choisissez une zone';
	$lang['PCP_userfields_lang_key_pick_up'] = 'Choisissez une cl� de langue';

	// fields delete
	$lang['PCP_userfields_delete'] = 'Supprimer une zone';

	// SQL actions
	$lang['PCP_SQL_create_field'] = 'Cliquez %sici%s pour cr�er la zone dans la table des utilisateurs.<br /><br />';
	$lang['PCP_SQL_modify_field'] = 'Cliquez %sici%s pour modifier la d�finition de la zone dans la table des utilisateurs.<br /><br />';
	$lang['PCP_SQL_delete_field'] = 'Supprimer la zone de la table des utilisateurs ?';

	$lang['PCP_SQL_create_field_title'] = 'Cr�er une zone dans la table des utilisateurs';
	$lang['PCP_SQL_edit_field_title'] = 'Modifier la d�finition d\'une zone dans la table des utilisateurs';
	
	$lang['PCP_SQL_field_name'] = 'Zone';
	$lang['PCP_SQL_field_name_explain'] = 'Nom de la colonne de la table.';
	$lang['PCP_SQL_field_type'] = 'Type';
	$lang['PCP_SQL_field_type_explain'] = 'Type de la colonne de la table.';
	$lang['PCP_SQL_field_length'] = 'Longueur';
	$lang['PCP_SQL_field_length_explain'] = 'Longueur de la colonne de la table.';
	$lang['PCP_SQL_field_unsigned'] = 'Non sign�e';
	$lang['PCP_SQL_field_unsigned_explain'] = 'Pour les colonnes num�riques uniquement.';
	$lang['PCP_SQL_null'] = 'Null autoris�';
	$lang['PCP_SQL_default'] = 'Valeur par d�faut';
	$lang['PCP_SQL_null_value'] = 'NULL';

	// tables linked
	$lang['PCP_tableslinked_name_short'] = 'Noms';
	$lang['PCP_tableslinked_name'] = 'Nom de la table li�e';
	$lang['PCP_tableslinked_name_explain'] = 'Ce nom identifiera la d�finition de la table li�e dans les diff�rentes d�finitions SQL des zones utilis�es par le Profile Control Panel, entour� par [].<br />(ex.: la table des utilisateurs sera identifi�e par [USERS])';
	$lang['PCP_tableslinked_id_short'] = 'Id';
	$lang['PCP_tableslinked_id'] = 'Identifiant SQL';
	$lang['PCP_tableslinked_id_explain'] = 'Identifiant SQL, utilis� dans les requ�tes SQL.<br />(ex.: "u" est habituellement l\'identifiant pour la table des utilisateurs)';
	$lang['PCP_tableslinked_join'] = 'SQL join';
	$lang['PCP_tableslinked_join_explain'] = 'Expression FROM utilis�e dans les requ�tes SQL.<hr />&raquo;&nbsp;Utilisez [cst.<i>constante d�signant la table</i>] pour d�signer le nom r�el de la table.<br />(ex.: [cst.USERS_TABLE] pour d�signer phpbb_users).<hr />&raquo;&nbsp;Utilisez [<i>nom de la table li�e</i>] pour d�signer l\'identifiant SQL.<br />(ex.: [USERS].username)<hr />Exemple: [cst.USERS_TABLE] AS [USERS].';
	$lang['PCP_tableslinked_where'] = 'SQL where';
	$lang['PCP_tableslinked_where_explain'] = 'Expression WHERE utilis�e dans les requ�tes SQL.<br />Utilisez [<i>Nom de la table li�e</i>] pour d�signer un identifiant SQL.<br />(ex.: [USERS].username <> \'\')';
	$lang['PCP_tableslinked_order'] = 'SQL order by';
	$lang['PCP_tableslinked_order_explain'] = 'Expression ORDER BY utilis�e dans les requ�tes SQL.<br />Utilisez [<i>Nom de la table li�e</i>] pour d�signer un identifiant SQL.<br />(ex.: [USERS].username)';
	$lang['PCP_tableslinked_sql_desc'] = 'Expression SQL';

	$lang['PCP_tableslinked_add'] = 'Ajouter une nouvelle table li�e';

	// tables linked edit
	$lang['PCP_tableslinked_linked_edit'] = 'Editer une table li�e';
	$lang['PCP_tableslinked_linked_edit_explain'] = 'Vous pouvez ici modifier ou supprimer la d�finition d\'une table li�e.';

	// values list
	$lang['PCP_valueslist_name'] = 'Nom';
	$lang['PCP_valueslist_name_explain'] = 'Renseignez ici le nom sous lequel sera identifi�e la liste de valeurs.';
	$lang['PCP_valueslist_func'] = 'Fonction';
	$lang['PCP_valueslist_func_explain'] = 'Renseignez ici le nom de la fonction personnalis�e servant � construire la liste des valeurs.';
	$lang['PCP_valueslist_table'] = 'Table';
	$lang['PCP_valueslist_table_explain'] = 'Nom de la table li�e utilis�e pour construire la liste de valeurs.';
	$lang['PCP_valueslist_values'] = 'Valeurs';

	$lang['PCP_valueslist_item_val'] = 'Valeur';
	$lang['PCP_valueslist_item_txt'] = 'Texte';
	$lang['PCP_valueslist_item_img'] = 'Image';

	$lang['PCP_valueslist_add'] = 'Ajouter une nouvelle liste de valeurs';

	// values list edit
	$lang['PCP_valueslist_edit'] = 'Editer une liste de valeurs';
	$lang['PCP_valueslist_edit_explain'] = 'Vous pouvez ici �diter ou supprimer une liste de valeurs.';
	$lang['PCP_valueslist_keyfield'] = 'Zone Cl�';
	$lang['PCP_valueslist_keyfield_explain'] = 'Cette zone contient la valeur de chaque entr�e de liste.';
	$lang['PCP_valueslist_txtfield'] = 'Zone Texte';
	$lang['PCP_valueslist_txtfield_explain'] = 'Cette zone contient le texte � afficher pour chaque entr�e de la liste.';
	$lang['PCP_valueslist_imgfield'] = 'Zone Image';
	$lang['PCP_valueslist_imgfield_explain'] = 'Cette zone contient l\'image � afficher pour chaque entr�e de la liste.';

	$lang['PCP_valueslist_add_item'] = 'Ajouter une nouvelle entr�e';
	$lang['PCP_valueslist_del_item'] = 'Supprimer la s�lection';

	// classes fields
	$lang['PCP_classesfields_name'] = 'Nom de la classe';
	$lang['PCP_classesfields_name_explain'] = 'Renseignez ici le nom identifiant la classe d\'une zone.';
	$lang['PCP_classesfields_config'] = 'Zone de configuration';
	$lang['PCP_classesfields_config_explain'] = 'Renseignez ici le nom de la zone g�r�e par l\'administrateur du forum pour autoriser ou non l\'utilisation des zones relevant de cette classe par les utilisateurs.';
	$lang['PCP_classesfields_admin'] = 'Zone d\'administration';
	$lang['PCP_classesfields_admin_explain'] = 'Renseignez ici le nom de la zone g�r�e par les administrateurs d\'utilisateur pour autoriser ou non l\'utilisation des zones relevant de cette classe par un utilisateur particulier.';
	$lang['PCP_classesfields_user'] = 'Zone utilisateur';
	$lang['PCP_classesfields_user_explain'] = 'Renseignez ici le nom de la zone g�r�e par l\'utilisateur dans ses pr�f�rences pour afficher ou non ou uniquement � ses amis les zones relevant de cette classe.';
	$lang['PCP_classesfields_sql_def'] = 'D�finition SQL';
	$lang['PCP_classesfields_sql_def_explain'] = 'Renseignez ici la d�finition SQL utilis�e dans les listes de membres de la zone classe.';

	$lang['PCP_classesfields_add'] = 'Ajouter une nouvelle classe';

	// classes fields edit
	$lang['PCP_classesfields_edit'] = 'Editer une classe';
	$lang['PCP_classesfields_edit_explain'] = 'Vous pouvez ici �diter ou supprimer une classe de zones.';

	// usermaps
	$lang['PCP_usermaps_root'] = 'Racine';

	$lang['PCP_usermaps_name'] = 'Nom de la carte';
	$lang['PCP_usermaps_name_explain'] = 'Renseignez ici le nom identifiant la carte.';
	$lang['PCP_usermaps_split'] = 'Nouvelle colonne';
	$lang['PCP_usermaps_split_explain'] = 'Choisissez "Oui" pour que la carte apparaisse dans une nouvelle colonne.';
	$lang['PCP_usermaps_sub'] = 'Carte fille';
	$lang['PCP_usermaps_add'] = 'Ajouter une nouvelle carte';
	$lang['PCP_usermaps_custom'] = 'Programme utilis�';
	$lang['PCP_usermaps_custom_explain'] = 'Indiquez ici si vous voulez utiliser un programme sp�cifique pour afficher cette carte.';
	$lang['PCP_custom_none'] = 'Programme sp�cifique';
	$lang['PCP_custom_input'] = 'Programme standard de saisie';
	$lang['PCP_custom_output'] = 'Programme standard d\'affichage';

	$lang['PCP_usermaps_fields'] = 'Zones';

	// usermaps edit
	$lang['PCP_usermaps_edit'] = 'Editer une carte';
	$lang['PCP_usermaps_edit_explain'] = 'Vous pouvez ici �diter ou supprimer une carte.';
	$lang['PCP_usermaps_title'] = 'Titre de la carte';
	$lang['PCP_usermaps_title_explain'] = 'Le titre de la carte est utilis� dans les affichages, par exemple dans les menus pr�f�rences. Vous pouvez utiliser un texte, ou une entr�e du tableau $lang[], ou encore une liste de zones titres.';
	$lang['PCP_usermaps_parent'] = 'Carte m�re';
	$lang['PCP_usermaps_parent_explain'] = 'Renseignez ici � quelle carte cette carte est rattach�e.';

	$lang['PCP_usermaps_add_titlefield'] = 'Ajouter une nouvelle zone titre';
	$lang['PCP_usermaps_add_field'] = 'Ajouter une nouvelle zone';

	// usermaps field edit
	$lang['PCP_usermaps_title_edit'] = 'Editer une zone titre';
	$lang['PCP_usermaps_title_edit_explain'] = 'Vous pouvez ici �diter ou supprimer une zone de titre.';
	$lang['PCP_usermaps_field_edit'] = 'Editer une zone';
	$lang['PCP_usermaps_field_edit_explain'] = 'Vous pouvez ici �diter ou supprimer une zone de la carte.';

	// error msgs
	$lang['PCP_err_field_already_exists'] = 'Cette zone existe d�j�.';
	$lang['PCP_err_field_name_not_valid'] = 'Le nom de la zone n\'est pas valide.';
	$lang['PCP_err_field_lang_key_missing'] = 'La cl� de langue est absente.';
	$lang['PCP_err_field_class_unknown'] = 'Classe inconnue.';
	$lang['PCP_err_field_type_unknown'] = 'Type inconnu.';
	$lang['PCP_err_field_get_mode_unknown'] = 'Mode de saisie inconnu.';
	$lang['PCP_err_field_values_list_unknown'] = 'Liste de valeurs inconnue.';
	$lang['PCP_err_field_auth_unknown'] = 'Niveau d\'autorisation inconnu.';

	$lang['PCP_err_field_values_list_missing'] = 'Le nom d\'une liste de valeur doit �tre fourni si vous utilisez un mode de saisie commen�ant par LIST_.';
	$lang['PCP_err_field_values_list_presents'] = 'Vous ne pouvez pas utiliser une liste de valeurs si le mode de saisie ne commence pas par LIST_.';
	$lang['PCP_err_field_get_mode_presents'] = 'Vous ne pouvez pas choisir un mode de saisie si vous utilisez des fonctions personnalis�es de saisie et de contr�le.';
	$lang['PCP_err_field_dsp_func_not_valid'] = 'Le nom de la fonction d\'affichage n\'est pas valide.';
	$lang['PCP_err_field_dsp_func_unknown'] = 'La fonction d\'affichage est inconnue.';
	$lang['PCP_err_field_get_func_not_valid'] = 'Le nom de la fonction de saisie n\'est pas valide.';
	$lang['PCP_err_field_chk_func_not_valid'] = 'Le nom de la fonction de contr�le n\'est pas valide.';
	$lang['PCP_err_field_get_chk_func_missing'] = 'Vous devez fournir les noms des fonctions de saisie et de contr�le.';

	$lang['PCP_err_sql_delete_not_allow'] = 'Vous ne pouvez pas supprimer cette colonne de la table des utilisateurs.';
	$lang['PCP_err_sql_edit_not_allow'] = 'Vous ne pouvez pas cr�er ou modifier cette colonne dans la table des utilisateurs.';
	$lang['PCP_err_sql_decimal_not_allow'] = 'Vous ne pouvez pas renseigner le nombre de d�cimales sans utiliser le type "d�cimal".';
	$lang['PCP_err_sql_decimal_too_high'] = 'Le nombre de d�cimal ne peut pas �tre plus grand ou �gal � la taille de la zone.';
	$lang['PCP_err_sql_length_missing'] = 'La taille de la zone est absente.';
	$lang['PCP_err_sql_unsigned_not_allow'] = 'Non sign� n\'est autoris� que pour les zones num�riques.';
	$lang['PCP_err_sql_default_null_not_allow'] = 'La valeur par d�faut ne peut �tre NULL si la colonne n\'accepte pas la valeur NULL.';
	$lang['PCP_err_sql_failed'] = 'La requ�te SQL a �chou� :';

	$lang['PCP_err_tableslinked_already_exists'] = 'Le nom de la table li�e existe d�j�.';
	$lang['PCP_err_tableslinked_name_not_valid'] = 'Le nom de la table li�e n\'est pas valide.';
	$lang['PCP_err_tableslinked_sql_id_not_valid'] = 'L\'identifiant SQL n\'est pas valide.';
	$lang['PCP_err_tableslinked_sql_join_missing'] = 'L\'expression FROM de la table li�e est vide.';

	$lang['PCP_err_valueslist_already_exists'] = 'Le nom de la liste de valeurs existe d�j�.';
	$lang['PCP_err_valueslist_name_not_valid'] = 'Le nom de la liste de valeurs n\'est pas valide.';
	$lang['PCP_err_valueslist_func_not_valid'] = 'Le nom de la fonction de construction de la liste n\'est pas valide.';
	$lang['PCP_err_valueslist_no_data'] = 'Liste de valeurs vide.';

	$lang['PCP_err_classesfields_already_exists'] = 'Le nom de la classe existe d�j�.';
	$lang['PCP_err_classesfields_name_not_valid'] = 'Le nom de la classe n\'est pas valide.';
	$lang['PCP_err_classesfields_config_field_not_valid'] = 'Le nom de la zone de configuration n\'est pas valide.';
	$lang['PCP_err_classesfields_admin_not_valid'] = 'Le nom de la zone d\'administration n\'est pas valide.';
	$lang['PCP_err_classesfields_user_not_valid'] = 'Le nom de la zone utilisateur n\'est pas valide.';

	$lang['PCP_err_usermaps_already_exists'] = 'Le nom de la carte existe d�j�.';
	$lang['PCP_err_usermaps_name_not_valid'] = 'Le nom de la carte n\'est pas valide.';
	$lang['PCP_err_usermaps_not_empty'] = 'Il reste des cartes rattach�es � celle-ci. Rattachez ces cartes � une autre carte avant de supprimer celle-ci.';
	$lang['PCP_err_usermaps_field_already_in_map'] = 'Cette zone existe d�j� dans cette carte.';

	// global message, return path
	$lang['PCP_field_created'] = 'La d�finition de la zone a �t� cr��e.<br /><br />%sCliquez %sici%s pour retourner � la liste des zones.';
	$lang['PCP_field_modified'] = 'La d�finition de la zone a �t� modifi�e.<br /><br />%sCliquez %sici%s pour retourner � la liste des zones.';
	$lang['PCP_field_delete'] = 'Etes-vous s�r de vouloir supprimer la d�finition de la zone <b>%s</b> ?';
	$lang['PCP_field_deleted'] = 'La d�finition de la zone a �t� supprim�e.<br /><br />Cliqez %sici%s pour retourner � la liste des zones.';

	$lang['PCP_sql_field_created'] = 'La colonne a �t� cr��e dans la table des utilisateurs.<br /><br />Cliquez %sici%s pour retourner � la liste des zones.';
	$lang['PCP_sql_field_modified'] = 'La colonne a �t� modifi�e dans la table des utilisateurs.<br /><br />Cliquez %sici%s pour retourner � la liste des zones.';
	$lang['PCP_sql_field_deleted'] = 'La colonne a �t� supprim�e de la table des utilisateurs.<br /><br />Cliquez %sici%s pour retourner � la liste des zones.';
	$lang['PCP_sql_field_deleted_short'] = 'La colonne a �t� supprim�e de la table des utilisateurs.';

	$lang['PCP_tableslinked_created'] = 'La d�finition de la table li�e a �t� cr��e.<br /><br />Cliquez %sici%s pour retourner � la liste des tables li�es.';
	$lang['PCP_tableslinked_modified'] = 'La d�finition de la table li�e a �t� modifi�e.<br /><br />Cliquez %sici%s pour retourner � la liste des tables li�es.';
	$lang['PCP_tableslinked_deleted'] = 'La d�finition de la table li�e a �t� supprim�e.<br /><br />Cliquez %sici%s pour retourner � la liste des tables li�es.';

	$lang['PCP_valueslist_created'] = 'La d�finition de la liste de valeurs a �t� cr��e.<br /><br />Cliquez %sici%s pour retourner � la liste des listes de valeurs.';
	$lang['PCP_valueslist_modified'] = 'La d�finition de la liste de valeurs a �t� modifi�e.<br /><br />Cliquez %sici%s pour retourner � la liste des listes de valeurs.';
	$lang['PCP_valueslist_deleted'] = 'La d�finition de la liste de valeurs a �t� supprim�e.<br /><br />Cliquez %sici%s pour retourner � la liste des listes de valeurs.';

	$lang['PCP_classesfields_created'] = 'La d�finition de la classe a �t� cr��e.<br /><br />Cliquez %sici%s pour retourner � la liste des classes.';
	$lang['PCP_classesfields_modified'] = 'La d�finition de la classe a �t� modifi�e.<br /><br />Cliquez %sici%s pour retourner � la liste des classes.';
	$lang['PCP_classesfields_deleted'] = 'La d�finition de la classe a �t� supprim�e.<br /><br />Cliquez %sici%s pour retourner � la liste des classes.';

	$lang['PCP_usermaps_created'] = 'La d�finition de la carte a �t� cr��e.<br /><br />Cliquez %sici%s pour retourner � la liste des cartes.';
	$lang['PCP_usermaps_modified'] = 'La d�finition de la carte a �t� modifi�e.<br /><br />Cliquez %sici%s pour retourner � la liste des cartes.';
	$lang['PCP_usermaps_deleted'] = 'La d�finition de la carte a �t� supprim�e.<br /><br />Cliquez %sici%s pour retourner � la liste des cartes.';

	// generic
	$lang['PCP_config_values'] = 'Valeurs de configuration';
	$lang['PCP_view_user_values'] = 'Zones de l\'utilisateur regard�';
	$lang['PCP_user_values'] = 'Zones de l\'utilisateur agissant';

	$lang['Refresh'] = 'R�-afficher';
	$lang['Create'] = 'Cr�er';
	$lang['Suggest'] = 'Sugg�rer';
	$lang['More'] = 'Plus...';

	$lang['Auth_GUEST'] = 'Tout le monde';
	$lang['Auth_USER'] = 'Utilisateurs enregistr�s';
	$lang['Auth_ADMIN'] = 'Administrateurs d\'utilisateurs';
	$lang['Auth_BOARD_ADMIN'] = 'Administrateurs du forum';

	$lang['Up'] = '^';
	$lang['Down'] = 'v';

	$lang['Linefeed'] = '---';
}

?>