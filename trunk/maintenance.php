<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////////////////////
///Inclusions des fichiers de fonction
//////////////////////////////////

require_once('includes/configuration.php');
require_once('includes/cache/all_cache.php');
require_once('includes/functions_html.php');
require_once('includes/language/french.php');

///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['page_maint_title'];
$description = '';
$words = '';
$info_page = $language['page_maint_title'];
$texte = $language['page_maint_info'];

///////////////////////////////////
//Initialisatoin de la variable du nombre d'annonce 
//////////////////////////////////

$_SESSION['nb_ann_selection'] = 0;
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();