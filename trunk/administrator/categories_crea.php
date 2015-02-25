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

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	
	if(!empty($_POST['name']))
	{
		creer_categorie($name);
		creer_cache_categories();
		$conn = null;
		
		redirect("categories.php?menu=4");
	} 
}
	
///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_creer_categorie_center();
htm_admin_footer();