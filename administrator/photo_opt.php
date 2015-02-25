<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');
$conn = null;

///////////////////////////////////
//Vérifier si le super admin est connecté
//////////////////////////////////

if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin() && !check_admin())
redirect("index.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';
	
///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['nb_photo_gratuite']))
{
	if(preg_match("#^[0-9]+$#", $_POST['nb_photo_gratuite']) != true || preg_match("#^[0-9]+$#", $_POST['nb_photo_max']) != true || preg_match("#^[0-9.]+$#", $_POST['prix_photo']) != true)
	$error = 1;
}

///////////////////////////////////
//Application ou retrait de la note
//////////////////////////////////

if(isset($_POST['nb_photo_gratuite']) && empty($error))
{
	creer_cache_option_photos($_POST);
	
	$texte_info = $language_adm['page_opt_photo_re_info'];
	$texte = $language_adm['page_opt_photo_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_option_photos($error);
	htm_admin_footer();
}