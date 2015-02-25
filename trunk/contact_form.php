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
//Signalement d'annonce
//////////////////////////////////

if(isset($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	$conn = db_connect();
	$row = get_annonce($id);
	$conn = null;
}
else $row = '';

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['con_nom']))
{
	if(empty($_POST['con_nom']))
	$error['con_nom'] = 1;
	
	if(!valid_email($_POST['con_ema']))
	$error['con_ema'] = 1;
	
	if(empty($_POST['con_tit']))
	$error['con_tit'] = 1;
	
	if(empty($_POST['con_mes']))
	$error['con_mes'] = 1;
	
	$cod = strtoupper($_POST['code']);
	
	if(empty($cod) || md5($cod) != $_SESSION['captcha'])
	$error['con_cod'] = 1;
}

if(!empty($_POST['con_nom']) && empty($error))
{
	send_contact($_POST);
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_env_cont_re'];
	$description = $language['description_page_env_cont_re'];
	$words = $language['mot_cles_page_env_cont_re'];
	$info_page = $language['infos_page_env_cont_re'];

	$texte = $language['page_env_cont_mail_reussi'];
		
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

$title = $language['titre_page_contact'];
$description = $language['description_page_contact'];
$words = $language['mot_cles_page_contact'];
$info_page = $language['infos_page_contact'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_form_contact($row, $error);
htm_footer();
}