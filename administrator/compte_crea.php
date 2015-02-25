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
//Valider le niveau administrateur
//////////////////////////////////

if(!empty($_GET['c']))
{
	$c = (int) $_GET['c'];
	
	if($c != 1 && $c != 2 && $c != 3)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['login']))
{
	if(empty($_POST['login']))
	$error = 1;
	
	elseif(strlen($_POST['login']) < 3 || strlen($_POST['login']) > 20)
	$error = 2;

	elseif(!verify_compte_login($_POST['login']))
	$error = 3;
	
	elseif (empty($_POST['pass1']))
	$error = 4;
	
	elseif(strlen($_POST['pass1']) < 5 || strlen($_POST['pass1']) > 20)
	$error = 5;

	elseif($_POST['pass1'] != $_POST['pass2'])
	$error = 6;
	
	elseif (empty($_POST['email1']))
	$error = 7;
	
	elseif(!valid_email($_POST['email1']))
	$error = 8;
	
	elseif(!verify_email($_POST['email1']))
	$error = 9;

	elseif($_POST['email1'] != $_POST['email2'])
	$error = 10;
	
	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(!empty($_POST['login']) && empty($error))
{
	creer_compte($_POST);
	$conn = null;
	
	redirect('compte_adm.php?c='. $c .'&menu=1');
}
else
{
	htm_admin_header();
	htm_menu();
	htm_creer_compte_center($c, $error);
	htm_admin_footer();
}