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
//Valider le type
//////////////////////////////////

if(isset($_GET['type']))
$type = (int) $_GET['type'];

else $type = 1;

///////////////////////////////////
//Valider la page
//////////////////////////////////

if(isset($_POST['sujet']))
{
	if(empty($_POST['sujet']))
	$error = 1;
	
	elseif(empty($_POST['message']))
	$error = 2;
}

///////////////////////////////////
//Création de la page
//////////////////////////////////

if(!empty($_POST['sujet']) && empty($error))
{
	newsletter($_POST, $type);
	$conn = null;
		
	if($type == 1)
	$texte_info = $language_adm['page_newsletter_info1'];
	
	if($type == 2)
	$texte_info = $language_adm['page_newsletter_info2'];
	
	if($type == 3)
	$texte_info = $language_adm['page_newsletter_info3'];
	
	$texte = $language_adm['page_newsletter_ok'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else 
{
	$conn = null;
	
	///////////////////////////////////
	//Inclusion des fonction html
	//////////////////////////////////	
		
	htm_admin_header();
	htm_menu();
	htm_newsletter($type, $error);
	htm_admin_footer();
}