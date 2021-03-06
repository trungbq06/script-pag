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
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['email_paypal']))
{
	if(empty($_POST['email_paypal']) || !valid_email($_POST['email_paypal']))
	$error = 1;
}
	
///////////////////////////////////
//Mettre à jour les paramètre Paypal
//////////////////////////////////

if(!empty($_POST['email_paypal']) && empty($error))
{
	creer_cache_paypal($_POST);
	
	$texte_info = $language_adm['page_paypal_re_info'];
	$texte = $language_adm['page_paypal_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	formulaire_param_paypal($error);
	htm_admin_footer();
}