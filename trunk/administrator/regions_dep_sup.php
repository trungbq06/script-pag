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
//Valider l'id du département et de la région
//////////////////////////////////

if(!empty($_GET['id1']) && !empty($_GET['id2']))
{
	$id1 = (int) $_GET['id1'];
	$id2 = (int) $_GET['id2'];

	delete_departement($id1, $id2);
	creer_cache_departements();
	$conn = null;
	
	redirect("regions.php?menu=3");
}	
else redirect("admin.php");