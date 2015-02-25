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
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['id_marchand']))
{
	if(empty($_POST['id_marchand']))
	$error = 1;
	
	elseif($_FILES['file1']['error'] != 0 || $_FILES['file2']['error'] != 0 || $_FILES['file3']['error'] != 0)
	$error = 2;
}

///////////////////////////////////
//Mettre à jour les paramètre Atos
//////////////////////////////////

if(!empty($_POST['id_marchand']) && empty($error))
{
	creer_cache_atos($_POST);
	update_atos($_POST, $_FILES);
	
	$texte_info = $language_adm['page_atos_re_info'];
	$texte = $language_adm['page_atos_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	formulaire_param_atos($error);
	htm_admin_footer();
}