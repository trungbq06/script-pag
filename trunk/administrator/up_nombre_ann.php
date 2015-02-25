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

if(!check_super_admin() && !check_admin())
redirect("logout.php");

///////////////////////////////////
//Validation de l'image de la pub
//////////////////////////////////

get_nb_ann();
$conn = null;

$texte_info = $language_adm['page_nb_ann_re_info'];
$texte = $language_adm['page_nb_ann_re'];

htm_admin_header();
htm_menu();
display_text($texte_info, $texte);
htm_admin_footer();