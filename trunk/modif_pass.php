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
//Validation de l'id et du mot de passe de l'annonce
//////////////////////////////////

if(isset($_POST['password']))
{
	$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

	$conn = db_connect();
	
	if(verify_annonce($id, $password))
	{	
		$_SESSION['valid_id'] = $id;
		$conn = null;
		
		redirect('modif_ann.php');
	}
	else 
	{
		$conn = null;
		$error = 1;
	}
}

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_pass_mod'];
$description = $language['description_page_pass_mod'];
$words = $language['mot_cles_page_pass_mod'];
$info_page = $language['infos_page_pass_mod'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_password_form($id, $error);
htm_footer();