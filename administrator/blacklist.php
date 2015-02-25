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

if(!check_valid_all())
redirect("logout.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['email']))
{
	if(empty($_POST['email']) || !valid_email($_POST['email']))
	$error = 1;
	
	elseif(!verify_email_ban($_POST['email']))
	$error = 2;
	
	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Suppression de l'email bannie
//////////////////////////////////

if(!empty($_POST['email']) && empty($error))
{
	delete_email_ban($_POST['email']);
	creer_cache_blacklist();
	$conn = null;
	
	$texte_info = $language_adm['page_ban_re_info'];
	$texte = $language_adm['page_ban_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_blacklist($error);
	htm_admin_footer();
}