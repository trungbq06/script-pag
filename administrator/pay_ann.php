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
//Application ou retrait de la note
//////////////////////////////////

if(isset($_POST['prix_par']))
{
	update_pay_ann($_POST);
	creer_cache_categories();
	$conn = null;
	
	$texte_info = $language_adm['page_pay_ann_re_info'];
	$texte = $language_adm['page_pay_ann_re'];
	
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
	htm_pay_ann();
	htm_admin_footer();
}