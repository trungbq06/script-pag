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
//Validation de la page
//////////////////////////////////

if(!empty($_GET['id_page']))
$id = (int) $_GET['id_page'];

else redirect('index.php');

///////////////////////////////////
//Infos de la page
//////////////////////////////////

foreach($cache_pages as $v)
{
	if($id == $v['id_page'])
	{
		$titre = htmlspecialchars($v['titre'], ENT_QUOTES);
		$texte = stripslashes($v['texte']);
		$edition = htmlspecialchars($v['edition'], ENT_QUOTES);
		
		if($edition == 0)
		$texte = nl2br(htmlspecialchars($texte, ENT_QUOTES));
	}
}

if(!isset($titre)) 
redirect('index.php');

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $titre;
$description = '';
$words = '';
$info_page = $titre;
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();