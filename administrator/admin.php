<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');
	
///////////////////////////////////
//Vérification qu'un administrateur est bien connecté
//////////////////////////////////

if(!check_valid_all())
redirect( "index.php" );
	
///////////////////////////////////
//Vérification du niveau de l'admnistrateur
//////////////////////////////////

if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

///////////////////////////////////
//Textes
//////////////////////////////////

$texte_info = $language_adm['page_acc_info'];
$texte = $language_adm['page_acc_welcom'];

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();
htm_menu();
$home_pads = display_home_pads();
$texte = $home_pads . $texte;
display_text($texte_info, $texte);
htm_admin_footer();
