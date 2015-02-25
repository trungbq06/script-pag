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
//Vérifier les données
//////////////////////////////////

if(isset($_POST['prix']))
{
	if(empty($_POST['prix']))
	$error = 1;

	elseif(preg_match("#^[0-9.]+$#", $_POST['prix']) != true)
	$error = 2;

	if (!empty($error)) 
	$conn = null;
}
else $conn = null;

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(!empty($_POST['prix']) && empty($error))
{
	modify_code_reduc($_POST, $id);
	creer_cache_code_reduc();
	$conn = null;
	
	redirect('reduc.php?menu=28');
}
else
{
	htm_admin_header();
	htm_menu();
	htm_modifier_code_reduc($id, $error);
	htm_admin_footer();
}