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
//Validation de l'id du champ
//////////////////////////////////

if(!empty($_GET['id']))
$id = (int) $_GET['id'];
	
else redirect("admin.php");

///////////////////////////////////
//Supprimer le champ
//////////////////////////////////

delete_champ($id);
creer_cache_champs();
$conn = null;
	
///////////////////////////////////
//Redirection
//////////////////////////////////

redirect('champs.php?menu=26');