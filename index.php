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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'offset_une_index' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Connexion à la base de données
//////////////////////////////////

if($param_gen['active_une'] == 1)
{
	$conn = db_connect();

	///////////////////////////////////
	//Obtenir le nombre totale d'annonce a la une
	//////////////////////////////////

	$nb_ann = get_nb_annonce_type(0, 0);

	$nb_une = 0;

	foreach($nb_ann as $v)
	{
		if($v['une'] == 1)
		$nb_une++;
	}
	
	///////////////////////////////////
	//Obtenir les annonces à la une
	//////////////////////////////////

	if(isset($_SESSION['offset_une_index']) && $_SESSION['offset_une_index'] + 5 >= $nb_une)
	$_SESSION['offset_une_index'] = 0;

	elseif(isset($_SESSION['offset_une_index']))
	$_SESSION['offset_une_index'] = $_SESSION['offset_une_index'] + 5;
		
	else $_SESSION['offset_une_index'] = 0;
		
	$search_array_une = get_annonces_type(0, 0, $_SESSION['offset_une_index'], 5, 0, 1);

	///////////////////////////////////
	//Fermeture de la connexion à la base de données
	//////////////////////////////////

	$conn = null;
}

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $param_gen['title'];
$description = $param_gen['desc'];
$words = $language['mot_cles_accueil'];
$info_page = $language['infos_page_accueil'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_acc($title, $description, $words);
// if($param_gen['active_une'] == 1) htm_top_ads($search_array_une);
// display_index_text_index($info_page);
display_index_center();
// htm_categories();
htm_footer();