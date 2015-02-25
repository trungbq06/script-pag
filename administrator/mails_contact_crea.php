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
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Valider le contact
//////////////////////////////////

if(isset($_POST['nom']))
{
	if(empty($_POST['nom']))
	$error = 1;
	
	elseif(!valid_email($_POST['email']))
	$error = 2;
}

///////////////////////////////////
//Création du contact
//////////////////////////////////

if(!empty($_POST['nom']) && empty($error))
{
	creer_contact($_POST);
	creer_cache_mails_contact();
	$conn = null;
	
	redirect('mails_contact.php?menu=20');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_creer_contact($error);
htm_admin_footer();