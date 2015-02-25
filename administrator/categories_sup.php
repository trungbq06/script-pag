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
//Validation de la catégorie
//////////////////////////////////
	
if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	delete_categorie($id);
	delete_sous_categories($id);
	creer_cache_categories();
	$conn = null;
	
	redirect("categories.php?menu=4");
}
else redirect("admin.php");