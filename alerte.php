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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'captcha' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation de la région
//////////////////////////////////

if(!empty($_POST['reg']))
$reg = (int) $_POST['reg'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_reg']))
$reg = (int) $membre[0]['id_reg'];
	
else $reg = 0;

///////////////////////////////////
//Validation du département
//////////////////////////////////

if(!empty($_POST['dep']))
$dep = (int) $_POST['dep'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_dep']))
$dep = (int) $membre[0]['id_dep'];
	
else $dep = 0;

///////////////////////////////////
//Validation de la catégorie
//////////////////////////////////

if(!empty($_POST['cat']))
$cat = (int) $_POST['cat'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_cat']))
$cat = (int) $membre[0]['id_cat'];
	
else $cat = 0;

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['reg']))
{
	if(!valid_email($_POST['email']))
	$error['email'] = 1;
	
	if(empty($_POST['reg']))
	$error['reg'] = 1;
	
	if(isset($_POST['dep']) && empty($_POST['dep']))
	$error['dep'] = 1;
	
	if(empty($_POST['cat']))
	$error['cat'] = 1;
	
	if(empty($_POST['word1']) && empty($_POST['word2']) && empty($_POST['word3']))
	$error['words'] = 1;
	
	$cod = strtoupper($_POST['code']);
	
	if(empty($cod) || md5($cod) != $_SESSION['captcha'])
	$error['con_cod'] = 1;
}

if(!empty($_POST['reg']) && empty($error))
{
	$conn = db_connect();
	insert_alert($_POST);
	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_alert_re'];
	$description = $language['description_page_alert_re'];
	$words = $language['mot_cles_page_alert_re'];
	$info_page = $language['infos_page_alert_re'];

	$texte = $language['page_env_alert_reussi'];
		
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
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_alert'];
$description = $language['description_page_alert'];
$words = $language['mot_cles_page_alert'];
$info_page = $language['infos_page_alert'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_form_alert($reg, $dep, $cat, $error);
htm_footer();
}