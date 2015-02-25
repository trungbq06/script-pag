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

if(!check_super_admin())
redirect( "logout.php" );
	
///////////////////////////////////
//Validation de l'id de la page
//////////////////////////////////

if(!empty($_GET['id']))
$id = (int) $_GET['id'];
	
else redirect("admin.php");

///////////////////////////////////
//Supprimer la page
//////////////////////////////////

delete_page($id);
creer_cache_pages();
$conn = null;
	
///////////////////////////////////
//Redirection
//////////////////////////////////

redirect('pages.php?menu=21');