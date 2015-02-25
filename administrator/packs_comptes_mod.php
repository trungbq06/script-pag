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
//Valider l'id de l'option visuelle
//////////////////////////////////

if(!empty($_GET['id']))
$id = (int) $_GET['id'];

else redirect("admin.php");

///////////////////////////////////
//Valider le type de l'option visuelle
//////////////////////////////////

if(!empty($_GET['num']))
{
	$num = (int) $_GET['num'];
	
	if($num != 1 && $num != 2 && $num != 3 && $num != 4)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['nb_annonce']))
{
	if(preg_match("#^[0-9]+$#", $_POST['nb_annonce']) != true || preg_match("#^[0-9]+$#", $_POST['nb_jour']) != true || preg_match("#^[0-9.]+$#", $_POST['prix']) != true)
	$error = 1;
	
	elseif(empty($_POST['nb_annonce']) && empty($_POST['nb_jour']))
	$error = 2;
	
	elseif(empty($_POST['prix']))
	$error = 3;

	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(isset($_POST['nb_annonce']) && empty($error))
{
	modify_abo_comptes($_POST);
	creer_cache_packs_comptes();
	$conn = null;
	
	redirect('packs_comptes.php?num='. $num .'&menu=14');
}
else
{
	htm_admin_header();
	htm_menu();
	htm_modifier_abo_comptes($id, $num, $error);
	htm_admin_footer();
}