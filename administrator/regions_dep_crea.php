<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin ou  admin niveau 2 est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin() && !check_admin())
redirect("logout.php");
	
///////////////////////////////////
//Validation de l'id de la régions
//////////////////////////////////
	
if(empty($_GET['id']))
redirect("admin.php");

else $id = (int) $_GET['id'];
	
///////////////////////////////////
//Création du département
//////////////////////////////////

if(!empty($_POST['name']))
{
	$name = $_POST['name'];
	
	creer_departement($id, $name);
	creer_cache_departements();
	$conn = null;
	
	redirect("regions.php?menu=3");
}

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_creer_departement_center($id);
htm_admin_footer();