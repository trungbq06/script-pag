<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//On vérifie que le membre ou le PRO est connecté
//////////////////////////////////

if(!isset($_SESSION['connect']))
redirect('index.php');
	
///////////////////////////////////
//Obtenir les infos du membre connecté
//////////////////////////////////

$conn = db_connect();
$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);

$_SESSION['prenom'] = $membre[0]['prenom'];

///////////////////////////////////
//Validation des mots clés
//////////////////////////////////

if(!empty($_GET['keywords']) && $_GET['keywords'] != $language['value_recherche_bord'])
{
	$keywords = trim(htmlspecialchars($_GET['keywords'], ENT_QUOTES));
	$str = array('+', '&#039;');
	$str_replace = array(' ', ' ');
	$keywords_replace = str_replace($str, $str_replace, $keywords);
	$array_keywords = explode(' ', $keywords_replace);
}
else
{
	$keywords = '';
	$array_keywords = '';
}

///////////////////////////////////
//Récupération de la requête
//////////////////////////////////

$sql = make_sql($_GET, $array_keywords);	

///////////////////////////////////
//Enregistrement des données en session pour la recherche par page
//////////////////////////////////

if(!empty($_GET['l']) )
{
	$l = (int) $_GET['l'];
		
	if($l != 1)
	 $l = 0;
}
else $l = 0;

if($l == 0)
{
	$_SESSION['sql_bord'] = $sql;
	$_SESSION['keywords_bord'] = $keywords;
}
elseif($l == 1 && !isset($_SESSION['sql_bord']))
{
	redirect('index.php');
}
elseif($l == 1)
{
	$sql = $_SESSION['sql_bord'];
	$keywords = $_SESSION['keywords_bord'];
}

///////////////////////////////////
//Obtenir le nombre totale d'annonce
//////////////////////////////////

$infos = get_nb_annonces_bord($sql['sql_count'], $membre[0]['id_compte']);

$total = 0;

foreach($infos['total'] as $v)
$total++;

$global = $infos['global'];

///////////////////////////////////
//Nombre d'annonce à afficher par page
//////////////////////////////////

$limit = (int) $param_gen['nb_ann'];

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
//Obtenir le nombre de résultats par page
//////////////////////////////////

$max_page = ceil($total/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;

///////////////////////////////////
//Obtenir les annonces
//////////////////////////////////
	
$search_array = get_search_annonces_bord($sql['sql'], $offset, $limit, $membre[0]['id_compte']);
$conn = null;

///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['compte_bord_title'];
$description = $language['compte_bord_desc'];
$words = $language['compte_bord_key'];
$info_page = $language['compte_bord_info'];

if($global == 0) $texte = $language['compte_bord_msg'];
else $texte = $language['compte_bord_no'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_bord($title, $description, $words);
display_text_bord($info_page);

if($total != 0) 
{
	display_search_links_bord($max_page, $page_num, $limit, 1);
	display_all($search_array);
	display_search_links_bord($max_page, $page_num, $limit, 2);
	search_bord($keywords, $membre);
}
else 
{
	display_text_no($texte);
	search_bord($keywords, $membre);
}

htm_footer();