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
//Validation de l'id de l'annonce
//////////////////////////////////

if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect("admin.php");
}
else redirect("admin.php");

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
//Validation de la valeur
//////////////////////////////////

if(isset($_POST['val']) && empty($_POST['val']))
$error = 1;
	
///////////////////////////////////
//Création de la valeur
//////////////////////////////////

if(isset($_POST['val']) && empty($error))
{
	if($l == 1) 
	{
		crea_valeur($_POST, $id);
		creer_cache_select_valeurs();
	}
	if($l == 2)	
	{
		crea_donnee($_POST, $id);
		creer_cache_select_donnees();
	}
	$conn = null;
	
	redirect('option_val.php?id='. $id .'&l='. $l .'&menu=5');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_option_crea_val($id, $l, $error);
htm_admin_footer();