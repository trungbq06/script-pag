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
//Validation de l'id de l'annonce
//////////////////////////////////

if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Validation du type de l'option
//////////////////////////////////
	
if(!empty($_GET['l']))
{
	$l = (int) $_GET['l'];
	
	if($l != 1 && $l !=2)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Validation de la valeur de l'option
//////////////////////////////////
	
if(isset($_GET['v']))
	$v = (int) $_GET['v'];

else redirect("admin.php");

///////////////////////////////////
//Suppression de l'option et ces valeurs
//////////////////////////////////

delete_valeur($id, $l, $v);

if($l == 1) 
creer_cache_select_valeurs();

if($l == 2)	
creer_cache_select_donnees();

$conn = null;
	
///////////////////////////////////
//Validation de l'id de l'annonce
//////////////////////////////////

redirect('option_val.php?id='. $id .'&l='. $l .'&menu=5');