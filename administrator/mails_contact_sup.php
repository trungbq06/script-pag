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
//Validation de l'il du contact
//////////////////////////////////

if(!empty($_GET['id']))
$id = (int) $_GET['id'];
	
else redirect("admin.php");

///////////////////////////////////
//Supprimer le contact
//////////////////////////////////

delete_contact($id);
creer_cache_mails_contact();
$conn = null;
	
///////////////////////////////////
//Redirection
//////////////////////////////////

redirect('mails_contact.php?menu=20');