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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'offset_une_reg' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation de l'id la région
//////////////////////////////////	

if(isset($_GET['region']))
{
	$reg = (int) $_GET['region'];
	
	if($reg <= 0)
	$reg = 1;
}	
else $reg = 1;

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

$nb_ann = get_nb_annonce_reg($reg, $tri);

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
//Obtenir le nom de la région
//////////////////////////////////

$nom_reg = '';

foreach($cache_regions as $v)
{
	if($reg == $v['id_reg'])
	$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
}

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
	
$annonces_array = get_annonces_reg($reg, $f, $offset, $limit, $tri, 0);

///////////////////////////////////
//Obtenir les annonces à la une
//////////////////////////////////

if($param_gen['active_une'] == 1)
{
	if(isset($_SESSION['offset_une_reg']) && $_SESSION['offset_une_reg'] + 5 >= $nb_une)
	$_SESSION['offset_une_reg'] = 0;

	elseif(isset($_SESSION['offset_une_reg']))
	$_SESSION['offset_une_reg'] = $_SESSION['offset_une_reg'] + 5;
		
	else $_SESSION['offset_une_reg'] = 0;
		
	$search_array_une = get_annonces_reg($reg, $f, $_SESSION['offset_une_reg'], 5, $tri, 1);
}

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_rec_reg'] .' '. $nom_reg .' - '. $param_gen['name'];
$description = $language['description_page_rec_reg'];
$words = $language['mot_cles_page_rec_reg'];
$info_page = $nom_reg;

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////
	
htm_header($title, $description, $words);
if($param_gen['active_une'] == 1) htm_top_ads($search_array_une);
display_reg_infos($reg, $f, $limit, $page_num, $info_page, $nb_ann);

if($total != 0)
{	
	if($f == 0)
	{
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, '', '', '', '');
	}
	
	elseif($f == 1 && $total_par != 0)
	{
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 1 ,$tri);
		display_all($annonces_array);
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, '', '', '', '');
	}
	
	elseif($f == 2 && $total_pro != 0)
	{
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 1 ,$tri);
		display_all($annonces_array);
		display_reg_links($reg, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub($reg, '', '', '', '');
	}
	
	else 
	{
		display_text_no($language['not_ann']);
		right_pub($reg, '', '', '', '');
	}
}

else 
{
	display_text_no($language['not_ann']);	
	right_pub($reg, '', '', '', '');
}

htm_categories();
htm_footer();