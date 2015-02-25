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
	if($k != 'valid_admin' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation du type
//////////////////////////////////

if (isset($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if ($type !=1 && $type != 2)
	$type = 1;
}
else $type = 1;

///////////////////////////////////
//On vérifie si l'utilisateur n'est pas déjà connecté
//////////////////////////////////

if(isset($_SESSION['connect']))
redirect('compte_bord.php');

///////////////////////////////////
//Verifier si les comptes membre sont activés
//////////////////////////////////

if($param_gen['actif_acc'] < 2)	
redirect('index.php');

///////////////////////////////////
//Validation de la region
//////////////////////////////////
	
if (!empty($_POST['reg']))
$reg = (int) $_POST['reg'];
	
else $reg = 0;

///////////////////////////////////
//Validation du département
//////////////////////////////////

if (!empty($_POST['dep']))
$dep = (int) $_POST['dep'];
	
else $dep = 0;
	
///////////////////////////////////
//Validation de la catégorie
//////////////////////////////////

if (!empty($_POST['cat']))
$cat = (int) $_POST['cat'];

else $cat = 0;

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';
	
///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['nom']))
{
	if($type == 2)
	{
		if(empty($_POST['ent']))
		$error['ent'] = 1;
		
		if($cache_param_champs['act_siret'] == 1)
		{
			if(empty($_POST['sir']))
			$error['sir'] = 1;
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
	
	if($type == 2 && $cat == 0)
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
	
	foreach($blacklist as $v)
	{
		if($v['email'] == $_POST['ema'])
		$error['ban'] = 1;
	}
	
	if (!valid_email($_POST['ema']))
	$error['ema'] = 1;
	
	$conn = db_connect();
	
	if (doublon_email($_POST['ema']))
	$error['ema_doub'] = 1;
	
	if (empty($_POST['pas']) OR $_POST['pas'] != $_POST['pas2'])
	$error['pas'] = 1;
	
	if(!isset($_POST['cgu']))
	$error['cgu'] = 1;
}

///////////////////////////////////
//Création du compte
//////////////////////////////////

if(isset($_POST['nom']) && empty($error))
{
	if($param_gen['auto_acc'] == 1)
	$etat = 2;
	
	else $etat = 0;
	
	crea_compte($_POST, $type, $etat);
	$conn = null;
	
	if($param_gen['auto_acc'] == 0)
	send_confirm_acc($type, $_POST['ema']);
	
	else send_valid_acc($type, $_POST['ema']);
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['compte_reussi_title'];
	$description = $language['compte_reussi_desc'];
	$words = $language['compte_reussi_key'];
	$info_page = $language['compte_reussi_info'];
	
	if($param_gen['auto_acc'] == 0)
	$texte = $language['compte_reussi_msg1'];
	
	else $texte = $language['compte_reussi_msg2'];

	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////

	htm_header($title, $description, $words);
	display_index_text($info_page);
	display_text($texte);
	htm_footer();
}
else
{
///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = ($type == 1) ? $language['compte1_crea'] : $language['compte2_crea'];
$description = '';
$words = '';
$info_page = ($type == 1) ? $language['compte1_crea'] : $language['compte2_crea'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
htm_crea_compte($reg, $cat, $dep, $type, $error);
htm_footer();
}