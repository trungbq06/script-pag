<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin())
redirect("index.php");

///////////////////////////////////
//Mise en cache de la maintenance
//////////////////////////////////

if(!empty($_POST['valid']) && empty($error))
{
	creer_cache_param_champs($_POST);
	
	$texte_info = $language_adm['page_champs_act_re_info'];
	$texte = $language_adm['page_champs_act_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_champs_act();
	htm_admin_footer();
}