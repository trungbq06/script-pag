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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'valid_id' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
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

if(isset($_POST['password']))
{
	$conn = db_connect();
	
	if(verify_annonce($id, $_POST['password']))
	$error = '';
	
	else $error = 1;
}

///////////////////////////////////
//Validation de l'id et du mot de passe de l'annonce
//////////////////////////////////

if(isset($_POST['password']) && empty($error))
{
	delete_annonce($id);
	creat_flux($id);

	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_supp_ann'];
	$description = $language['description_page_supp_ann'];
	$words = $language['mot_cles_page_supp_ann'];
	$info_page = $language['infos_page_supp_ann'];

	///////////////////////////////////
	//Texte info de la page
	//////////////////////////////////

	$texte = $language['page_supp_ann'];
		
	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////
		
	htm_header($title, $description, $words);
	display_index_text($info_page);
	display_text($texte);
	htm_footer();
}

///////////////////////////////////
//Suppression de l'annonce par un membre connecté
//////////////////////////////////

elseif(isset($_SESSION['connect'], $_SESSION['valid_id']) && $_SESSION['valid_id'] == $id)
{
	$conn = db_connect();
	
	delete_annonce($id);
	creat_flux($id);
	
	$conn = null;
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_supp_ann'];
	$description = $language['description_page_supp_ann'];
	$words = $language['mot_cles_page_supp_ann'];
	$info_page = $language['infos_page_supp_ann'];

	///////////////////////////////////
	//Texte info de la page
	//////////////////////////////////

	$texte = $language['page_supp_ann'];
		
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

if(isset($_POST['password'])) $conn = null;;

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
}