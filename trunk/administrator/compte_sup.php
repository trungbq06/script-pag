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

if(!check_super_admin())
redirect("index.php");

///////////////////////////////////
//Valider le niveau administrateur
//////////////////////////////////

if(!empty($_GET['c']))
{
	$c = (int) $_GET['c'];
	
	if($c != 1 && $c != 2 && $c != 3)
	redirect("admin.php");
}
else redirect("admin.php");
	
///////////////////////////////////
//Validation de la supression du compte adminsitrateur
//////////////////////////////////

if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id != 1)
	{
		$conn = db_connect();
		delete_user($id);
		$conn = null;
		
		redirect('compte_adm.php?c='. $c .'&menu=1');
	}
	else redirect("admin.php");
}
else redirect("admin.php");
