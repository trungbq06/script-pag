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
//Initialisation de la variable $nom_image
//////////////////////////////////

$nom_image = '';

///////////////////////////////////
//Gestion de l'erreur
//////////////////////////////////

if(isset($_FILES['pub']) && $_FILES['pub']['error'] == 0)
{
	if ($_FILES['pub']['size'] <= 1073741824*3) // Verifier la taille du fichier 3GO MAX
	{
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');  // Les extentions autorisées
		$extension_telechargees = strtolower(substr(strrchr($_FILES['pub']['name'], '.'), 1) );  // Récupération de l'extention
		
		if (in_array($extension_telechargees, $extensions_autorisees))
		{
			if(!empty($_POST['img'])) unlink('../images/pub/'. $_POST['img']);
			
			$nom_image = 'pub_fond.'. $extension_telechargees;
			
			move_uploaded_file($_FILES['pub']['tmp_name'], '../images/pub/' . basename($nom_image)); // Valilation est stockage du fichier
		}
		else $error = 3;
	}
	else $error = 2;
}
elseif(isset($_FILES['pub']) AND $_FILES['pub']['error'] != 0)
$error = 1;

///////////////////////////////////
//Application ou retrait de la note
//////////////////////////////////

if(isset($_POST['url']) && empty($error))
{
	$conn = db_connect();
	creer_pub($_POST, $nom_image);
	creer_cache_publicites();
	$conn = null;
	
	$texte_info = $language_adm['page_gest_pub_fond_info'];
	$texte = $language_adm['page_gest_pub_fond_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_pub_fond($error);
	htm_admin_footer();
}