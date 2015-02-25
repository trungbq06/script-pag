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
//Valider le champ
//////////////////////////////////

if(isset($_POST['nom']) && empty($_POST['nom']))
$error = 1; 

///////////////////////////////////
//Création du champ
//////////////////////////////////

if(!empty($_POST['nom']) && empty($error))
{
	creer_champ($_POST);
	creer_cache_champs();
	$conn = null;
	
	redirect('champs.php?menu=26');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////	
	
htm_admin_header();
htm_menu();
htm_champs_crea($error);
htm_admin_footer();