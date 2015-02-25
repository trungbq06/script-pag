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
//Validation du niveau d'administration
//////////////////////////////////

if(!empty($_GET['num']))
{
	$num = (int) $_GET['num'];
	
	if($num != 1 && $num != 2)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_abo_comptes($num);
htm_admin_footer();