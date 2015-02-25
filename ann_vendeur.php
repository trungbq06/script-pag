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
//Validation de l'id de l'annonce
//////////////////////////////////

$f = 0;

if(isset($_GET['id']) )
{
	$id = (int) $_GET['id'];
	
	if($id == 0)
	redirect('index.php');
}
else redirect('index.php');
	
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
//Obtenir le nombre totale d'annonce, pro ou particulier
//////////////////////////////////

$nb_ann = get_nb_annonce_vendeur($id, $tri);
$total = (int) $nb_ann['total'];

///////////////////////////////////
//Obtenir le nombre de résultats par page
//////////////////////////////////

$limit = (int) $param_gen['nb_ann'];

$max_page = ceil($total/$limit);

if ($max_page > 0 && $page_num > $max_page)
$page_num = $max_page;

$offset = ($page_num - 1) * $limit;

///////////////////////////////////
//Obtenir les annonces
//////////////////////////////////

$annonces_array = get_all_vendeur($id, $offset, $limit, $tri);

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_vendeur'] .' '. htmlspecialchars($annonces_array[0]['nom']);
$description = $language['description_page_vendeur'];
$words = $language['mot_cles_page_vendeur'];
$info_page = $language['infos_page_vendeur'] .' '. htmlspecialchars($annonces_array[0]['nom']);

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_vendeur_infos($id, $f, $limit, $page_num, $info_page, $nb_ann);

if($total != 0)
{	
	if($f == 0)
	{
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub('', '', '', '', '');
	}
	
	elseif($f == 1 && $total_par != 0)
	{
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 2, $tri);
		right_pub('', '', '', '', '');
	}
	
	elseif($f == 2 && $total_pro != 0)
	{
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 1, $tri);
		display_all($annonces_array);
		display_vendeur_links($id, $f, $max_page, $page_num, $limit, 2, $tri);
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