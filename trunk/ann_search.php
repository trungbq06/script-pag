<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Validation des mots clés
//////////////////////////////////

if(!empty($_GET['keywords']) && $_GET['keywords'] != $language['value_recherche'])
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

///////////////////////////////////
//Validation du code postal
//////////////////////////////////

if(!empty($_GET['zip_code']) AND $_GET['zip_code'] != $language['value_code_postal'])
$code_pos = trim(htmlspecialchars($_GET['zip_code'], ENT_QUOTES));

else $code_pos = '';

///////////////////////////////////
//Validation de l'id de la catégorie
//////////////////////////////////
	
if(isset($_GET['cat']))
$cat = htmlspecialchars($_GET['cat']);

else $cat = 0;
	
///////////////////////////////////
//Validation de l'id de la région
//////////////////////////////////

if(isset($_GET['reg']))
$reg = (int) $_GET['reg'];

else $reg = 0;
	
///////////////////////////////////
//Validation de l'id du département
//////////////////////////////////

if(isset($_GET['dep']) )
$dep = (int) $_GET['dep'];
	
else $dep = 0;

///////////////////////////////////
//Connexion à la base de données
//////////////////////////////////

$conn = db_connect();

///////////////////////////////////
//Préparation de la requête
//////////////////////////////////

$sql = make_sql($_GET, $array_keywords);
$options = make_options($_GET);

///////////////////////////////////
//Validation du choix particulier ou professionnel
//////////////////////////////////

if (isset($_GET['f'])) 
{
	$f = (int) $_GET['f'];
	
	if ($f != 1 && $f != 2)
	$f = 0;	
}
else $f = 0;

///////////////////////////////////
//Validation du tri par date ou par prix
////////////////////////////////// 

if (isset($_GET['tri']))
{
	$tri = (int) $_GET['tri'];
	
	if ($tri != 1 && $tri != 2)
	$tri = 1;	
}
else $tri = 1;

///////////////////////////////////
//Validation de la page
//////////////////////////////////
	
if (isset($_GET['page']))
{
	$page_num = (int) $_GET['page'];
	
	if ($page_num <= 0)
	$page_num = 1;
}
else $page_num = 1;
	
///////////////////////////////////
//Enregistrement des données en session pour la recherche par page
//////////////////////////////////

if(!empty($_GET['l']))
{
	$l = (int) $_GET['l'];
		
	if($l != 1)
	$l = 0;
}
else $l = 0;

if($l == 1 && !isset($_SESSION['old_sql']))
redirect('index.php');

elseif($l == 0)
{
	$_SESSION['old_sql'] = $sql['sql'];
	$_SESSION['old_sql_count'] = $sql['sql_count'];
	$_SESSION['old_options'] = $options;
	$_SESSION['old_keywords'] = $keywords;
	$_SESSION['old_reg'] = $reg;
	$_SESSION['old_dep'] = $dep;
	$_SESSION['old_cat'] = $cat;
	$_SESSION['old_code_pos'] = $code_pos;
	$_SESSION['old_titre'] = (isset($_GET['titre'])) ? (int) $_GET['titre'] : '';
	$_SESSION['old_urgentes'] = (isset($_GET['urgentes'])) ? (int) $_GET['urgentes'] : '';
	$_SESSION['old_offres'] = (isset($_GET['offres'])) ? (int) $_GET['offres'] : '';
	$_SESSION['old_recherches'] = (isset($_GET['recherches'])) ? (int) $_GET['recherches'] : '';
	$_SESSION['old_echanges'] = (isset($_GET['echanges'])) ? (int) $_GET['echanges'] : '';
	$_SESSION['old_dons'] = (isset($_GET['dons'])) ? (int) $_GET['dons'] : '';
	$_SESSION['old_photo'] = (isset($_GET['photo'])) ? (int) $_GET['photo'] : '';
	$_SESSION['old_video'] = (isset($_GET['video'])) ? (int) $_GET['video'] : '';
}
elseif($l == 1)
{
	$sql['sql'] = $_SESSION['old_sql'];
	$sql['sql_count'] = $_SESSION['old_sql_count'];
	$options = $_SESSION['old_options'];
	$keywords = $_SESSION['old_keywords'];
	$reg = $_SESSION['old_reg'];
	$dep = $_SESSION['old_dep'];
	$cat = $_SESSION['old_cat'];
	$code_pos = $_SESSION['old_code_pos'];
}

///////////////////////////////////
//Obtenir le nombre totale d'annonce, pro ou particulier
//////////////////////////////////

$nb_ann = get_nb_annonces_search($sql['sql_count'], $options, $tri);

$total_par = 0; 
$total_pro = 0;
$nb_une = 0;

foreach($nb_ann as $v)
{
	if($v['status'] == 1)
	$total_par++;
	
	if($v['status'] == 2)
	$total_pro++;
	
	if($f == 1 || $f == 2)
	{
		if($v['une'] == 1 && $v['status'] == $f)
		$nb_une++;
	}
	else
	{
		if($v['une'] == 1)
		$nb_une++;
	}
}

$nb_ann['par'] = $total_par;
$nb_ann['pro'] = $total_pro;
$total = $total_par + $total_pro;

///////////////////////////////////
//Obtenir le nombre de résultats par page
//////////////////////////////////

$limit = (int) $param_gen['nb_ann'];

if ($f == 1)
$max_page = ceil($total_par/$limit);

elseif ($f == 2)
$max_page = ceil($total_pro/$limit);

else $max_page = ceil($total/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;

///////////////////////////////////
//Obtenir les annonces
//////////////////////////////////
	
$search_array = get_annonces_search($sql['sql'], $options, $f, $offset, $limit, $tri, 0);

///////////////////////////////////
//Obtenir les annonces à la une
//////////////////////////////////

if($param_gen['active_une'] == 1)
{
	if(isset($_SESSION['offset_une']) && $_SESSION['offset_une'] + 5 >= $nb_une)
	$_SESSION['offset_une'] = 0;

	elseif(isset($_SESSION['offset_une']))
	$_SESSION['offset_une'] = $_SESSION['offset_une'] + 5;
		
	else $_SESSION['offset_une'] = 0;
		
	$search_array_une = get_annonces_search($sql['sql'], $options, $f, $_SESSION['offset_une'], 5, $tri, 1);
}

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$nom_cat = '';
$nom_reg = '';
$nom_dep = '';

foreach($cache_categories as $v)
{
	if($cat == $v['id_cat'])
	$nom_cat = $v['nom_cat'];
}
foreach($cache_regions as $v)
{
	if($reg == $v['id_reg'])
	$nom_reg = $v['nom_reg'];
}
foreach($cache_departements as $v)
{
	if($dep == $v['id_dep'])
	$nom_dep = $v['nom_dep'];
}

$title = $language['titre_page_rec'] .' '. $nom_cat .' '. $nom_reg.' '. $nom_dep .' - '. $param_gen['name'];
$description = $language['description_page_rec'];
$words = $language['mot_cles_page_rec'];

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
if($param_gen['active_une'] == 1) htm_top_ads($search_array_une);	
display_search_infos($f, $limit, $page_num, $nb_ann);

if($total != 0)
{
	if($f == 0)
	{
		display_search_links($f, $max_page, $page_num, $limit, 1, $tri);
		display_all($search_array);
		display_search_links($f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, $dep, $cat, $keywords, $code_pos);
	}
	
	elseif($f == 1 && $total_par != 0)
	{
		display_search_links($f, $max_page, $page_num, $limit, 1, $tri);
		display_all($search_array);
		display_search_links($f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, $dep, $cat, $keywords, $code_pos);
	}
	
	elseif($f == 2 && $total_pro != 0)
	{
		display_search_links($f, $max_page, $page_num, $limit, 1, $tri);
		display_all($search_array);
		display_search_links($f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, $dep, $cat, $keywords, $code_pos);
	}
	
	else 
	{
		display_text_no($language['not_ann']);
		right_pub($reg, $dep, $cat, $keywords, $code_pos);
	}
}

else 
{
	display_text_no($language['not_ann']);
	right_pub($reg, $dep, $cat, $keywords, $code_pos);
}

////////////////////////////////
//Fermeture de connexion a la base de donnée
////////////////////////////////

htm_categories();
htm_footer();