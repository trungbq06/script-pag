<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

////////////////////////////////////
//Vérifier si un admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin() && !check_admin())
redirect("logout.php");

///////////////////////////////////
//Validation de l'id de la pub
//////////////////////////////////

if(!empty($_GET['id']))
$id = (int) $_GET['id'];

else redirect('admin.php');

///////////////////////////////////
//Validation de l'image de la pub
//////////////////////////////////

if(isset($_GET['img']))
$image = $_GET['img'];

///////////////////////////////////
//Suppression de la pub
//////////////////////////////////

delete_pub($id, $image);
creer_cache_publicites();

redirect('pub_fond.php?menu=22');