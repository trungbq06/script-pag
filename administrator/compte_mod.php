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
//Validation du compte membre
//////////////////////////////////
	
if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	$infos = get_user_info($id);
}	
else redirect("admin.php");

///////////////////////////////////
//Vérifier les données
//////////////////////////////////

if(isset($_POST['user']))
{
	if(!verifiy_password($id, $_POST['pass1']))
	$error = 1;
	
	elseif(empty($_POST['user']))
	$error = 2;

	elseif(!verify_login($id, $_POST['user']) )
	$error = 3;

	elseif(strlen($_POST['user']) < 3 || strlen($_POST['user']) > 20)
	$error = 4;
	
	elseif(empty($_POST['pass2']))
	$error = 5;
	
	elseif(strlen($_POST['pass2']) < 5 || strlen($_POST['pass2']) > 20)
	$error = 6;

	elseif($_POST['pass2'] != $_POST['pass3'])
	$error = 7;
	
	elseif(empty($_POST['email1']))
	$error = 8;
	
	elseif(!valid_email($_POST['email1']))
	$error = 9;
	
	elseif(!verify_modify_email($id, $_POST['email1']))
	$error = 10;
	
	elseif($_POST['email1'] != $_POST['email2'])
	$error = 11;
	
	if (!empty($error)) 
	$conn = null;
}

///////////////////////////////////
//Modifier le compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(!empty($_POST['user']) && empty($error))
{
	update_user($_POST);
	$conn = null;
	
	$texte_info = $language_adm['page_mod_compte_re_info'];
	$texte = $language_adm['page_mod_compte_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_modifier_center($infos, $id, $error);
	htm_admin_footer();
}