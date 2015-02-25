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
redirect( "logout.php" );

///////////////////////////////////
//Validation de la region
//////////////////////////////////
	
if(!empty($_GET['id']) || !empty($_POST['id']))
$id = (!empty($_GET['id'])) ? (int) $_GET['id'] : (int) $_POST['id'];
	
else redirect("admin.php");

///////////////////////////////////
//Modification de la région
//////////////////////////////////

if(!empty($_POST['id']) && !empty($_POST['name']))
{
	$id = (int) $_POST['id'];
	$name = $_POST['name'];
	
	modify_region($id, $name);
	creer_cache_regions();
	$conn = null;
	
	redirect("regions.php?menu=3");
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////
	
htm_admin_header();
htm_menu();
htm_modifier_region_center($id);
htm_admin_footer();