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

if(!check_valid_all())
redirect("logout.php");

///////////////////////////////////
//Obtenir le nombre d'annonces
//////////////////////////////////	

$total = get_annonces_gest_nb(2, $_GET);

///////////////////////////////////
//Initialisation de la varaible pour le nombre d'annonce par page
//////////////////////////////////

$limit = 5;

///////////////////////////////////
//Page des annonces pour la pagination
//////////////////////////////////
	
$page_num = 1;
	
if (isset($_GET['page']))
{
	$page_num = (int) $_GET['page'];
	
	if ($page_num <= 0)
	$page_num = 1;
}

$max_page = ceil($total/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;

///////////////////////////////////
//Obtenir les annonces
//////////////////////////////////	

$annonces = get_annonces_gest(2, $_GET, $offset, $limit);
	
///////////////////////////////////
//Inclusion des fonctioins html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_validation_annonce_center(2, $_GET, $annonces, $page_num, $max_page);
$conn = null;
htm_admin_footer();