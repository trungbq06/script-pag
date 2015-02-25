<?php 
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par l'entreprise ZUPPARDO : Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Validation de l'identifiant
//////////////////////////////////

if(!empty($_SESSION['id']))
$id = (int) $_SESSION['id'];

else redirect('index.php');
	
///////////////////////////////////
//Validation du prix
//////////////////////////////////

if(!empty($_SESSION['prix']))
$prix = (float) $_SESSION['prix'];
	
else redirect('index.php');

///////////////////////////////////
//Validation du nom du produit
//////////////////////////////////

if(!empty($_SESSION['item']))
$item = $_SESSION['item'];
	
else redirect('index.php');

///////////////////////////////////
//Prix tva
//////////////////////////////////

$prix_tva = (!empty($param_gen['tva_taux'])) ? $prix * $param_gen['tva_taux'] / 100 : 0;

///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_paiement'];
$description = '';
$words = '';
$info_page = $language['infos_page_paiement'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_paiement($id, $prix, $prix_tva, $item);		
htm_footer();