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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation de l'id de l'annonce
//////////////////////////////////

if(isset($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect('index.php');
}
	
///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['email']))
{
	$conn = db_connect();
	
	if(verify_email($id, $_POST['email']))
	$error = '';
	
	else $error = 1;
}

///////////////////////////////////
//Validation de l'id et du mot de passe de l'annonce
//////////////////////////////////

if(isset($_POST['email']) && empty($error))
{
	$password = get_password($id, $_POST['email']);
	send_password($id, $_POST['email'], $password);

	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_env_pass_re'];
	$description = $language['description_page_env_pass_re'];
	$words = $language['mot_cles_page_env_pass_re'];
	$info_page = $language['infos_page_env_pass_re'];
	$texte = $language['page_env_pass_reussi'];
		
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

if(isset($_POST['email'])) $conn = null;;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_env_pass'];
$description = $language['description_page_env_pass'];
$words = $language['mot_cles_page_env_pass'];
$info_page = $language['infos_page_env_pass'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////
	
htm_header($title, $description, $words);
display_index_text($info_page);
display_email_form($error);
htm_footer();
}