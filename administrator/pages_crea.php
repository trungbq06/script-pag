<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si un admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin())
redirect("logout.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Valider la page
//////////////////////////////////

if(isset($_POST['titre']))
{
	if(empty($_POST['titre']))
	$error = 1;
}

///////////////////////////////////
//Création de la page
//////////////////////////////////

if(!empty($_POST['titre']) && empty($error))
{
	creer_page($_POST);
	creer_cache_pages();
	$conn = null;
	
	redirect('pages.php?menu=21');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////	
	
htm_admin_header();
htm_menu();
htm_pages_crea($error);
htm_admin_footer();