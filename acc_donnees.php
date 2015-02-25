<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//On vérifie que le membre ou  le PRO est connecté
//////////////////////////////////

if(!isset($_SESSION['connect']))
redirect('index.php');
	
///////////////////////////////////
//Obtenir les infos du membre connecté
//////////////////////////////////

$conn = db_connect();
$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation de la region
//////////////////////////////////
	
if (isset($_POST['reg']))
$reg = (int) $_POST['reg'];
	
else $reg = $membre[0]['id_reg'];

///////////////////////////////////
//Validation du département
//////////////////////////////////

if (isset($_POST['dep']))
$dep = (int) $_POST['dep'];
	
else $dep = $membre[0]['id_dep'];

///////////////////////////////////
//Validation de la catégorie
//////////////////////////////////

if (isset($_POST['cat']))
$cat = (int) $_POST['cat'];
	
else $cat = $membre[0]['id_cat'];

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['nom']))
{
	if($_SESSION['connect'] == 2)
	{
		if(empty($_POST['nom_ent']) && empty($membre[0]['nom_ent']))
		$error['nom_ent'] = 1;
		
		if($cache_param_champs['act_siret'] == 1)
		{
			if(empty($_POST['siret']) && empty($membre[0]['siret']))
			$error['siret'] = 1;
		}
	}
	
	if(empty($_POST['nom']))
	$error['nom'] = 1;
	
	if(empty($_POST['prenom']))
	$error['prenom'] = 1;
	
	if($reg == 0)
	$error['reg'] = 1;
	
	if(isset($_POST['dep']) && $dep == 0)
	$error['dep'] = 1;
	
	if(isset($_POST['cat']) && $cat == 0)
	$error['cat'] = 1;
	
	if(empty($_POST['add']))
	$error['add'] = 1;
	
	if($cache_param_champs['act_code_pos'] == 1)
	{
		if(isset($_POST['cod']) && empty($_POST['cod']))
		$error['cod'] = 1;
	}
	
	if($cache_param_champs['act_vil'] == 1)
	{
		if(empty($_POST['vil']))
		$error['vil'] = 1;
	}
	
	if(empty($_POST['tel']))
	$error['tel'] = 1;
	
	if (!empty($_POST['new_pas']) && $_POST['new_pas'] != $_POST['new_pas2'])
	$error['pas'] = 1;
}

///////////////////////////////////
//On créé le compte et on redirige vers la page de réussite
//////////////////////////////////

if(isset($_POST['nom']) && empty($error))
{
	modify_infos_compte($_POST, $membre[0]['id_compte']);
	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['compte_reussi_mod_title'];
	$description = $language['compte_reussi_mod_desc'];
	$words = $language['compte_reussi_mod_key'];
	$info_page = $language['compte_reussi_mod_info'];
	$texte = $language['compte_reussi_mod_msg'];

	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////

	htm_header_bord($title, $description, $words);
	display_text_bord($info_page);
	display_text($texte);
	htm_footer();
}
else
{
$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['compte_bord_pers_title'];
$description = $language['compte_bord_pers_desc'];
$words = $language['compte_bord_pers_key'];
$info_page = $language['compte_bord_pers_info'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_bord($title, $description, $words);
display_text_bord($info_page);
htm_donnees_compte($reg, $dep, $cat, $_SESSION['connect'], $error, $membre);
htm_footer();
}