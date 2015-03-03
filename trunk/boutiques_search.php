<?php
/////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////

############################################################

require_once('includes/all_functions.php');

//Validation des mots clés
if(!empty($_GET['keywords']) && $_GET['keywords'] != $language['value_recherche_boutique'])
{
	$keywords = trim(htmlspecialchars($_GET['keywords'], ENT_QUOTES));
	$str = array('+', '&#039;', '(');
	$str_replace = array(' ', ' ', ' ');
	$keywords_replace = str_replace($str, $str_replace, $keywords);
	$array_keywords = explode(' ', $keywords_replace);
}
else
{
	$keywords = '';
	$array_keywords = '';
}

//Validation de l'id de la catégorie
if(isset($_GET['cat']))
$cat = htmlspecialchars($_GET['cat']);

else $cat = 0;
	
//Validation de l'id de la région
if(isset($_GET['reg']))
	$reg = (int) $_GET['reg'];
else $reg = 0;
	
//Validation de l'id du département
if(isset($_GET['dep']) )
	$dep = (int) $_GET['dep'];	
else $dep = 0;

//Validation de la page
if (isset($_GET['page']))
{
	$page_num = (int) $_GET['page'];
	
	if ($page_num <= 0)
	$page_num = 1;
}
else $page_num = 1;

//Connexion à la base de données
$conn = db_connect();

//Récupération de la requête
$sql = make_sql_vitrine($_GET, $array_keywords);	

//Enregistrement des données en session pour la recherche par page
if(!empty($_GET['l']) )
{
	$l = (int) $_GET['l'];
		
	if($l != 1)
	  $l = 0;
}
else $l = 0;

if($l == 1 && !isset($_SESSION['sql_vitrine']))
redirect('index.php');

elseif($l == 0)
{
	$_SESSION['sql_vitrine'] = $sql;
	$_SESSION['keywords_vitrine'] = $keywords;
	$_SESSION['reg_vitrine'] = $reg;
	$_SESSION['dep_vitrine'] = $dep;
	$_SESSION['cat_vitrine'] = $cat;
}
elseif($l == 1)
{
	$sql = $_SESSION['sql_vitrine'];
	$keywords = $_SESSION['keywords_vitrine'];
	$reg = $_SESSION['reg_vitrine'];
	$dep = $_SESSION['dep_vitrine'];
	$cat = $_SESSION['cat_vitrine'];
}


//Obtenir le nombre totale de boutique
$get_nb_vitrine = get_nb_vitrine($sql['sql_count']);

$nb_vitrine = 0;
$nb_une = 0;

foreach($get_nb_vitrine as $v)
{
	$nb_vitrine++;
	
	if($v['une'] == 1)
	$nb_une++;
}
	
//Nombre d'annonce à afficher par page
$limit = (int) $param_gen['nb_bout'];
	
//Obtenir le nombre de résultats par page
$max_page = ceil($nb_vitrine/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;
	
//Obtenir les vitrines
$search_array = get_vitrines_search($sql['sql'], $offset, $limit, 0);

//Obtenir les vitrine à la une
if($param_gen['active_vit'] == 1)
{
	if(isset($_SESSION['offset_une']) && $_SESSION['offset_une'] + 5 >= $nb_une)
	$_SESSION['offset_une'] = 0;

	elseif(isset($_SESSION['offset_une']))
	$_SESSION['offset_une'] = $_SESSION['offset_une'] + 5;
		
	else $_SESSION['offset_une'] = 0;
		
	$search_array_une = get_vitrines_search($sql['sql'], $_SESSION['offset_une'], 5, 1);
}

//Titre,  description , mots clés et info de la page 
$title = $language['search_bout_title'];
$description = $language['search_bout_desc'];
$words = $language['search_bout_key'];
$info_page = $language['search_bout_info'];
$texte = $language['not_boutique'];

//Inclusion des fonctions html
htm_header_acc($title, $description, $words);

if($param_gen['active_vit'] == 1) {
	// htm_top_vitrines($search_array_une);
}

// display_search_vitrines_infos($limit, $page_num, $nb_vitrine);

if($nb_vitrine != 0)
{
	display_search_links_vitrines($max_page, $page_num, $limit, 1);
	display_all_vitrines($search_array);
	display_search_links_vitrines($max_page, $page_num, $limit, 2);
	search_vitrines($keywords, $reg, $dep, $cat);
}
else 
{
	display_text_no($texte);
	search_vitrines($keywords, $reg, $dep, $cat);
}


//Fermeture de la connexion à la base de données
$conn = null;

htm_categories();
htm_footer();