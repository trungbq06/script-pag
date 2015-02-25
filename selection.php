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
//Validation de l'annonce à ajouter
//////////////////////////////////

if(!empty($_GET['id']) && $_GET['action'] == 1)
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect('index.php');

	else
	{
		$cookie_name = 'cook'. $id;
		setcookie($cookie_name, 'Script_PAG'. $id, time()+(365 * 24 * 60 * 60));
		redirect('selection.php');
	}
}

///////////////////////////////////
//Validation de l'annonce à supprimer
//////////////////////////////////

if(!empty($_GET['id']) && $_GET['action'] == 2)
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect('index.php');
		
	else
	{
		$cookie_name = 'cook'. $id;
		setcookie($cookie_name, '', 1);
		redirect('selection.php');
	}
}

///////////////////////////////////
//Obtenir le nombre d'annonce sélectionnée
//////////////////////////////////

$conn = db_connect();
$_SESSION['nb_ann_selection'] = get_selected_number();

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_selection'];
$description = $language['description_page_selection'];
$words = $language['mot_cles_page_selection'];
$info_page = $language['infos_page_selection'];

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////
	
htm_header($title, $description, $words);
display_index_text_sel($info_page);

if($_SESSION['nb_ann_selection'] > 0)
display_selection($_COOKIE, 2);

else display_text($language['page_no_selection']);
$conn = null;

htm_footer();