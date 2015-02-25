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

if(!empty($_GET['id']))
$id = (int) $_GET['id'];

else redirect('admin.php');

///////////////////////////////////
//Vérifier et obtenir l'annonce
//////////////////////////////////

if(get_annonce($id))
{
	$annonce = get_annonce($id);
	$images = get_images($id);
}

else redirect('admin.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['tit']))
{
	if(empty($_POST['tit']))
	$error = 1;
	
	elseif(empty($_POST['ann']))
	$error = 2;
	
	elseif(empty($_POST['reg']))
	$error = 3;
	
	elseif(isset($_POST['dep']) && empty($_POST['dep']))
	$error = 4;
	
	elseif(empty($_POST['cat']))
	$error = 5;
	
	elseif(!valid_email($_POST['email']))
	$error = 6;
	
	elseif(isset($_POST['nom_societe']) && empty($_POST['nom_societe']))
	$error = 7;
	
	elseif(isset($_POST['siret']) && empty($_POST['siret']))
	$error = 8;
	
	elseif(empty($_POST['nom']))
	$error = 9;
	
	elseif(isset($_POST['code_pos']) && empty($_POST['code_pos']))
	$error = 10;
	
	elseif(isset($_POST['vil']) && empty($_POST['vil']))
	$error = 11;
	
	elseif(isset($_POST['tel']) && empty($_POST['tel']))
	$error = 12;
	
	elseif(isset($_POST['opt_mont']) && preg_match("#^[0-9]+$#", $_POST['jour_mont']) != true)
	$error = 13;
	
	elseif(isset($_POST['opt_une']) && preg_match("#^[0-9]+$#", $_POST['jour_une']) != true)
	$error = 14;
	
	elseif(isset($_POST['opt_urg']) && preg_match("#^[0-9]+$#", $_POST['jour_urg']) != true)
	$error = 15;
	
	elseif(isset($_POST['opt_enc']) && preg_match("#^[0-9]+$#", $_POST['jour_enc']) != true)
	$error = 16;
	
	elseif(isset($_POST['date_tete']) && preg_match("#^[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9]$#", $_POST['date_tete']) != true)
	$error = 17;
	
	elseif(isset($_POST['date_urg']) && preg_match("#^[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9]$#", $_POST['date_urg']) != true)
	$error = 17;
	
	elseif(isset($_POST['date_enc']) && preg_match("#^[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9]$#", $_POST['date_enc']) != true)
	$error = 17;
	
	elseif(isset($_POST['date_une']) && preg_match("#^[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9]$#", $_POST['date_une']) != true)
	$error = 17;
}

///////////////////////////////////
//Modification de l'annonce
//////////////////////////////////

if(isset($_POST['tit']) && empty($error))
{	
	modify_ann($id, $_POST);
	$conn = null;
	
	///////////////////////////////////
	//Initialisation des texte
	//////////////////////////////////

	$texte_info = $language_adm['page_mod_ann_re_info'];
	$texte = $language_adm['page_mod_ann_re'];

	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////

	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Inclusion des fonctioins html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_modif_ann($annonce, $images, $error);
htm_admin_footer();
}