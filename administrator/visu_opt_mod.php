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
	
	if($num != 1 && $num != 2 && $num != 3 && $num != 4 && $num != 5 && $num != 6 && $num != 7)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['jour']))
{
	if(empty($_POST['jour']))
	$error = 1;
	
	elseif(empty($_POST['prix']))
	$error = 2;
	
	elseif(preg_match("#^[0-9]+$#", $_POST['jour']) != true || preg_match("#^[0-9.]+$#", $_POST['prix']) != true)
	$error = 3;

	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(!empty($_POST['jour']) && empty($error))
{
	modify_visu_opt($_POST);
	creer_cache_options_visuelles();
	$conn = null;
	
	redirect('visu_opt.php?num='. $num .'&menu=11');
}
else
{
	htm_admin_header();
	htm_menu();
	htm_modifier_visu_options($id, $num, $error);
	htm_admin_footer();
}