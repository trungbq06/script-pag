<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin est connecté
//////////////////////////////////

if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin() && !check_admin())
redirect("index.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['nb_jour']))
{
	if(preg_match("#^[0-9]+$#", $_POST['nb_jour']) != true || preg_match("#^[0-9.]+$#", $_POST['prix']) != true)
	$error = 1;
	
	elseif(empty($_POST['prix']))
	$error = 2;

	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(isset($_POST['nb_jour']) && empty($error))
{
	create_abo_vitrine($_POST);
	creer_cache_packs_vitrine();
	$conn = null;
	
	redirect('packs_vitrine.php?menu=15');
}
else
{
	htm_admin_header();
	htm_menu();
	htm_creer_abo_vitrine($error);
	htm_admin_footer();
}