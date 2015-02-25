<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si un admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
	$valid_admin = $_SESSION['valid_admin'];

if(!check_valid_all())
redirect("logout.php");

//////////////////////////////////
//Supprimer les annonces expirées
//////////////////////////////////

delete_unvalidate_annonces();

///////////////////////////////////
//Initialisation des textes
//////////////////////////////////

$texte_info = $language_adm['page_mod_unv_sup_re_info'];
$texte = $language_adm['page_mod_unv_sup_re'];

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();
htm_menu();
display_text($texte_info, $texte);
htm_admin_footer();