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
//Vérifier les données
//////////////////////////////////

if(isset($_POST['name']))
{
	if(empty($_POST['name']))
	$error = 1;
	
	elseif(empty($_POST['pays']))
	$error = 2;

	elseif(empty($_POST['mail_rep']))
	$error = 3;
	
	elseif(!valid_email($_POST['mail_rep']))
	$error = 4;
	
	elseif(empty($_POST['title']))
	$error = 5;
	
	elseif(empty($_POST['devise']))
	$error = 6;

	elseif(empty($_POST['nb_ann']) || $_POST['nb_ann'] == 0)
	$error = 7;
	
	elseif(empty($_POST['nb_bout']) || $_POST['nb_bout'] == 0)
	$error = 8;
	
	elseif(empty($_POST['ann_val']) || $_POST['ann_val'] == 0)
	$error = 9;
	
	elseif(!valid_email($_POST['email_notif']))
	$error = 10;
	
	elseif(empty($_POST['nb_flux_gl']) || $_POST['nb_flux_gl'] == 0)
	$error = 11;
	
	elseif(empty($_POST['nb_flux_bout']) || $_POST['nb_flux_bout'] == 0)
	$error = 12;
	
	elseif(!empty($_POST['auto_fact']) && empty($_POST['nom_ent']))
	$error = 13;
	
	elseif(!empty($_POST['auto_fact']) && empty($_POST['add_ent']))
	$error = 14;
	
	elseif(!empty($_POST['auto_fact']) && empty($_POST['cod_ent']))
	$error = 15;
	
	elseif(!empty($_POST['auto_fact']) && empty($_POST['vil_ent']))
	$error = 16;
	
	elseif(!empty($_POST['auto_fact']) && empty($_POST['sir_ent']))
	$error = 17;
}

///////////////////////////////////
//Créer le nouveau compte administrateur et inclusion des fonctions html
//////////////////////////////////

if(!empty($_POST['name']) && empty($error))
{
	creer_cache_param_gen($_POST);
	
	$texte_info = $language_adm['page_mod_param_gen_re_info'];
	$texte = $language_adm['page_mod_param_gen_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_mod_param_gen($error);
	htm_admin_footer();
}