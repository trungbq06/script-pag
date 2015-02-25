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

///////////////////////////////////
//Obtenir les facture
//////////////////////////////////

$id = (int) $membre[0]['id_compte'];

$factures = get_factures($id);

if(!is_array($factures))
redirect('index.php');

///////////////////////////////////
//Fermeture de la connexion à la base de données
//////////////////////////////////

$conn = null;

///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['compte_bord_fact_title'];
$description = '';
$words = '';
$info_page = $language['compte_bord_fact_info'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_bord($title, $description, $words);
display_text_bord($info_page);
display_factures($factures);
htm_footer();