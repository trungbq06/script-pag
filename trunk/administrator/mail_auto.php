<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si un admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin())
redirect("logout.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation du mail automatique
//////////////////////////////////
	
if(!empty($_GET['l']))
$l = (int) $_GET['l'];
	
else redirect("admin.php");

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['nom']))
{
	if(empty($_POST['nom']))
	$error = 1;
	
	elseif(!valid_email($_POST['email']))
	$error = 2;
	
	elseif(empty($_POST['message']))
	$error = 3;
}
else $conn = null;

///////////////////////////////////
//Mettre à jour les mails automatiques
//////////////////////////////////	

if(!empty($_POST['nom']) && empty($error))
{
	update_email($_POST);
	creer_cache_mails_auto();
	$conn = null;
	
	$texte_info = $language_adm['page_ema_auto_re_info'];
	$texte = $language_adm['page_ema_auto_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_email_center($l, $error);
	htm_admin_footer();
}