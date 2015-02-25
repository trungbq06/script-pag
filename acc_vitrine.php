<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Detruire la session
//////////////////////////////////

foreach($_SESSION as $k => $v)					
{    		
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'logo_vitrine' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//On vérifie que le PRO est connecté
//////////////////////////////////

if(!isset($_SESSION['connect']))
redirect('index.php');
	
///////////////////////////////////
//Obtenir les infos du membre connecté
//////////////////////////////////

$conn = db_connect();
$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);

///////////////////////////////////
//Obtenir les infos de la fiche boutique
//////////////////////////////////

$fiche = get_info_fiche($membre[0]['id_compte']);

///////////////////////////////////
//On verifie s'il y a des pack et si le membre a un pack
//////////////////////////////////

$id_compte = (int) $membre[0]['id_compte'];
$pack = (int) $membre[0]['pack_vitrine'];
$aff = 0;

foreach($cache_packs_vitrine as $v)
{
	if(!empty($v['id_pack']))
	$aff = 1;
}

if($aff == 1 && empty($pack))
redirect('pay_pack_vit.php?compte='. $id_compte);

///////////////////////////////////
//Verifier si les vitrines sont activées 
//////////////////////////////////

if($param_gen['active_bout'] == 0)	
redirect('index.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['tit']))
{
	if (empty($_POST['tit']))
	$error['tit'] = 1;
	
	if (empty($_POST['des']))
	$error['des'] = 1;
	
	if (empty($_POST['hor']))
	$error['hor'] = 1;
}

///////////////////////////////////
//Création de la fichier vitrine
//////////////////////////////////

if(isset($_POST['tit']) && empty($error))
{
	$logo = (isset($_SESSION['logo_vitrine'])) ? $_SESSION['logo_vitrine'] : '';
	
	crea_fiche_boutique($_POST, $fiche[0]['id_boutique'], $membre[0]['id_compte'], $logo);
	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['compte_reussi_fiche_title'];
	$description = $language['compte_reussi_fiche_desc'];
	$words = $language['compte_reussi_fiche_key'];
	$info_page = $language['compte_reussi_fiche_info'];
	$texte = $language['compte_reussi_fiche_msg'];

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

$title = $language['compte_fiche_bout_title'];
$description = $language['compte_fiche_bout_desc'];
$words = $language['compte_fiche_bout_key'];
$info_page = $language['compte_fiche_bout_info'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_bord($title, $description, $words);
display_text_bord($info_page);
htm_fiche_boutique_compte($error, $fiche, $membre);
htm_footer();
}