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
//Validation de l'id de l'annonce
//////////////////////////////////

if(isset($_GET['id']))
$id = (int) $_GET['id'];

else redirect('admin.php');

///////////////////////////////////
//Supprimer la photo
//////////////////////////////////

delete_video($id);

///////////////////////////////////
//Redirection
//////////////////////////////////

redirect('ann_modif.php?id='. $id .'&menu=6');