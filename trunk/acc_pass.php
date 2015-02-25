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
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

$conn = db_connect();

if(isset($_POST['email']))
{
	if(!verify_compte_pass($_POST['email']))
	$error = 1;
}

///////////////////////////////////
//Vérification et envoye du nouveau mot de passe
//////////////////////////////////

if(isset($_POST['email']) && empty($error))
{
	$password = generate_password();
	
	modify_compte_pass($_POST['email'], $password);
	send_compte_password($_POST['email'], $password);
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
$conn = null;

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
display_compte_pass($error);
htm_footer();
}