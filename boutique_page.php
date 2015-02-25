<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Validation de l'id de l'annonce
//////////////////////////////////

if(isset($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id == 0)
	redirect('index.php');
}
else redirect('index.php');

///////////////////////////////////
//Connexion à la base de données
//////////////////////////////////

$conn = db_connect();
	
///////////////////////////////////
//Vérifier et obtenir les informations de a vitrine
//////////////////////////////////

$row = get_vitrine_infos($id);
	
if(!is_array($row))
redirect('index.php');
	
///////////////////////////////////
//Page des annonces
//////////////////////////////////
	
$page_num = 1;
	
if (isset($_GET['page']))
{
	$page_num = (int) $_GET['page'];
	
	if ($page_num <= 0)
	$page_num = 1;
}	

///////////////////////////////////
//Obtenir le nombre totale d'annonce de la vitrine
//////////////////////////////////

$nb_ann = get_nb_annonces_page_vitrine($row[0]['id_compte']);

///////////////////////////////////
//Obtenir le nombre de résultats par page
//////////////////////////////////

$limit = (int) $param_gen['nb_ann'];

$max_page = ceil($nb_ann/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;

///////////////////////////////////
//Obtenir les annonces
//////////////////////////////////
	
$search_array = get_search_annonces_vitrine($offset, $limit, $row[0]['id_compte']);

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['page_bout_info'] .' - '. $row[0]['titre'];
$description = $row[0]['description'];
$words = '';
$info_page = $language['page_bout_info'];
$texte = $language['page_bout_not_ann'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text_index($info_page);
display_vitrine($id, $row);

if($nb_ann != 0)
{
	display_search_infos_page_vitrine($limit, $page_num, $nb_ann);
	display_search_links_page_vitrine($id, $max_page, $page_num, $limit, 1);
	display_all($search_array);
	display_search_links_page_vitrine($id, $max_page, $page_num, $limit, 2);
	search_vitrines('', '', '', '');
}
else 
{
	display_text_no($texte);
	search_vitrines('', '', '', '');
}

htm_footer();