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
//Validation de la supression du compte adminsitrateur
//////////////////////////////////

if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	delete_visu_opt($id);
	creer_cache_options_visuelles();
	$conn = null;
	
	redirect('visu_opt.php?num='. $num .'&menu=11');
}
else redirect("admin.php");