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

if(get_compte($id))
$compte = get_compte($id);

else redirect('admin.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['nom']))
{
	if(empty($_POST['reg']))
	$error = 1;
	
	elseif(isset($_POST['dep']) && empty($_POST['dep']))
	$error = 2;
	
	elseif(empty($_POST['cat']))
	$error = 3;
	
	elseif(isset($_POST['nom_societe']) &&empty($_POST['nom_societe']))
	$error = 4;
	
	elseif(isset($_POST['siret']) && empty($_POST['siret']))
	$error = 5;
	
	elseif(empty($_POST['nom']))
	$error = 6;
	
	elseif(isset($_POST['code_pos']) && empty($_POST['code_pos']))
	$error = 7;
	
	elseif(isset($_POST['vil']) && empty($_POST['vil']))
	$error = 8;
	
	elseif(isset($_POST['tel']) && empty($_POST['tel']))
	$error = 9;
	
	elseif(!valid_email($_POST['email']))
	$error = 10;
}

///////////////////////////////////
//Modification de l'annonce
//////////////////////////////////

if(isset($_POST['nom']) && empty($error))
{	
	modify_acc($id, $_POST);
	
	///////////////////////////////////
	//Initialisation des texte
	//////////////////////////////////

	$texte_info = $language_adm['page_mod_acc_re_info'];
	$texte = $language_adm['page_mod_acc_re'];

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
	//Inclusion des fonctioins html
	//////////////////////////////////
	
	htm_admin_header();
	htm_menu();
	htm_modif_acc($compte, $error);
	htm_admin_footer();
}


///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;