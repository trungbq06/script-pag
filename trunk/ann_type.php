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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'offset_une_type' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation du Type de la recherche
//////////////////////////////////

if (isset($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if ($type !=1 && $type != 2 && $type != 3 && $type != 4)
	$type = 1;
	
	if($type == 1) $_SESSION['offres'] = 1;
	if($type == 2) $_SESSION['recherches'] = 1;
	if($type == 3) $_SESSION['echanges'] = 1;
	if($type == 4) $_SESSION['dons'] = 1;
}
else $type = 1;

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
//Connexion à la base de données
//////////////////////////////////

$conn = db_connect();

///////////////////////////////////
//Obtenir le nombre d'annonce à la une, pro et particulier
//////////////////////////////////

$nb_ann = get_nb_annonce_type($type, $tri);

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

$annonces_array = get_annonces_type($type, $f, $offset, $limit, $tri, 0);

///////////////////////////////////
//Obtenir les annonces à la une
//////////////////////////////////

if($param_gen['active_une'] == 1)
{
	if(isset($_SESSION['offset_une_type']) && $_SESSION['offset_une_type'] + 5 >= $nb_une)
	$_SESSION['offset_une_type'] = 0;

	elseif(isset($_SESSION['offset_une_type']))
	$_SESSION['offset_une_type'] = $_SESSION['offset_une_type'] + 5;
		
	else $_SESSION['offset_une_type'] = 0;
		
	$search_array_une = get_annonces_type($type, $f, $_SESSION['offset_une_type'], 5, $tri, 1);
}

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

if ($type == 1)
{
	$title = $language['titre_page_offre'];
	$description = $language['description_page_offre'];
	$words = $language['mot_cles_page_offre'];
	$info_page = $language['infos_page_offre'];
}

if ($type == 2)
{
	$title = $language['titre_page_recherche'];
	$description = $language['description_page_recherche'];
	$words = $language['mot_cles_page_recherche'];
	$info_page = $language['infos_page_recherche'];
}

if ($type == 3)
{
	$title = $language['titre_page_echange'];
	$description = $language['description_page_echange'];
	$words = $language['mot_cles_page_echange'];
	$info_page = $language['infos_page_echange'];
}

if ($type == 4)
{
	$title = $language['titre_page_don'];
	$description = $language['description_page_don'];
	$words = $language['mot_cles_page_don'];
	$info_page = $language['infos_page_don'];
}

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
if($param_gen['active_une'] == 1) htm_top_ads($search_array_une);
display_type_infos($type, $f, $limit, $page_num, $info_page, $nb_ann);

if($total != 0)
{	
	if($f == 0)
	{
		display_type_links($type, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_type_links($type, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub('', '', '', '', '');
	}
	
	elseif($f == 1 && $total_par != 0)
	{
		display_type_links($type, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_type_links($type, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub('', '', '', '', '');
	}
	
	elseif($f == 2 && $total_pro != 0)
	{
		display_type_links($type, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_type_links($type, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub('', '', '', '', '');
	}
	
	else 
	{
		display_text_no($language['not_ann']);
		right_pub('', '', '', '', '');
	}
}

else 
{
	display_text_no($language['not_ann']);
	right_pub('', '', '', '', '');
}

htm_categories();
htm_footer();