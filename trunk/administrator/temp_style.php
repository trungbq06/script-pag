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

if(!check_super_admin() && !check_admin())
redirect("logout.php");

///////////////////////////////////
//Validation du type
//////////////////////////////////
	
if(!empty($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if($type != 1 && $type != 2)
	redirect('admin.php');
}

else redirect('admin.php');

///////////////////////////////////
//Initialisation de la variable ok
//////////////////////////////////

$ok = '';

///////////////////////////////////
//Modification de la page
//////////////////////////////////  

if(isset($_POST['style'])) 
{
	if($type == 1)
	file_put_contents('../style/structure.css', $_POST['style']);
	
	if($type == 2)
	file_put_contents('../style/style.css', $_POST['style']);
	
	$ok = 1;
}

///////////////////////////////////
//Récupération du style
//////////////////////////////////

if($type == 1)
$edition = file_get_contents('../style/structure.css');

if($type == 2)
$edition = file_get_contents('../style/style.css');

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////	
	
htm_admin_header();
htm_menu();
htm_temp_style($type, $edition, $ok);
htm_admin_footer();