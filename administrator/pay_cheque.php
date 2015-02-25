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

if(!check_super_admin())
redirect("index.php");

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Valider la page
//////////////////////////////////

if(isset($_POST['texte']))
{
	if(empty($_POST['texte']))
	$error = 1;
}

///////////////////////////////////
//Mettre à jour les paramètre Atos
//////////////////////////////////

if(!empty($_POST['texte']) && empty($error))
{
	creer_cache_cheque($_POST);
	
	$texte_info = $language_adm['page_cheque_re_info'];
	$texte = $language_adm['page_cheque_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	formulaire_param_cheque($error);
	htm_admin_footer();
}