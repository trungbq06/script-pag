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
//Validation de l'id de la régions
//////////////////////////////////
	
if(!empty($_GET['id']))
$id = (int) $_GET['id'];
	
else redirect("admin.php");

///////////////////////////////////
//Validation de l'id du type  (1  = region  / 2 = departement)
//////////////////////////////////	

if(!empty($_GET['l']))
{
	$l = (int) $_GET['l'];
	
	if($l !=1 && $l != 2)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Validation de l'action  (1 = Monter / 2 = Decendre)
//////////////////////////////////
	
if(!empty($_GET['m']))
{
	$m = (int) $_GET['m'];
	
	if($m !=1 && $m != 2 )
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Effectuer l'opération de monter ou descendre
//////////////////////////////////	
	
if($l == 1)
{
	deplace_region($id, $m);
	creer_cache_regions();
	$conn = null;
	
	redirect("regions.php?menu=3");
}
elseif($l == 2)
{
	if(!empty($_GET['id2']))
	$id2 = (int) $_GET['id2'];

	else redirect("admin.php");

	deplace_departement($id, $id2, $m);
	creer_cache_departements();
	$conn = null;
	
	redirect("regions.php?menu=3");
}