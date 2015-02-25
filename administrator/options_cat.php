<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin est connecté
//////////////////////////////////

if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin() && !check_admin())
redirect("index.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Gestion de l'erreur
//////////////////////////////////

if(isset($_POST['cat']) && empty($_POST['cat']))
$error = 1;

///////////////////////////////////
//Mettre à jour les options de la catégorie
//////////////////////////////////

if(!empty($_POST['valide']) && empty($error))
{
	$cat = (int) $_POST['cat'];
	$options_val = (!empty($_POST['options_val'])) ? $_POST['options_val'] : '';
	$options_don = (!empty($_POST['options_don'])) ? $_POST['options_don'] : '';
	
	attribuer_options($options_val, $options_don, $cat);
	creer_cache_search_valeurs();
	creer_cache_search_donnees();
	creer_cache_form();
	$conn = null;
	
	$texte_info = $language_adm['page_opts_re_info'];
	$texte = $language_adm['page_opts_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	$conn = null;
	htm_admin_header();
	htm_menu();
	htm_option_categorie_center($error);
	htm_admin_footer();
}