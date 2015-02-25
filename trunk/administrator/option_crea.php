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

if(!check_super_admin() && !check_admin())
redirect("index.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';
	
///////////////////////////////////
//Validation du type de l'option
//////////////////////////////////
	
if(!empty($_GET['l']))
{
	$l = (int) $_GET['l'];
	
	if($l != 1 && $l !=2)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Validation du nom
//////////////////////////////////

if(isset($_POST['nom']) && empty($_POST['nom']))
$error = 1;

///////////////////////////////////
//Création de l'option
//////////////////////////////////

if(isset($_POST['nom']) && empty($error))
{
	crea_option($_POST, $l);
	creer_cache_options_cat();
	$conn = null;
	
	redirect('option_liste.php?l='. $l .'&menu=5');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_option_crea($l, $error);
htm_admin_footer();