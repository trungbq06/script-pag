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
//Validation de l'image
//////////////////////////////////

if(!empty($_GET['img']))
$img = (int) $_GET['img'];

else $img = 0;

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Initialisation de la variable $nom_image
//////////////////////////////////

$nom_image = '';

///////////////////////////////////
//Upload
//////////////////////////////////

if($img > 0)
{
	if(isset($_FILES['img']) && $_FILES['img']['error'] == 0)
	{
		if ($_FILES['img']['size'] <= 1073741824*3) // Verifier la taille du fichier 3GO MAX
		{
			$extensions_autorisees = array('png');  // Les extentions autorisées
			$extension_telechargees = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1) );  // Récupération de l'extention
			
			if (in_array($extension_telechargees, $extensions_autorisees))
			{
				if($img == 1) $nom_image = 'logo.'. $extension_telechargees;
				if($img == 2) $nom_image = 'watermark.'. $extension_telechargees;
				if($img == 3) $nom_image = 'barre_liens.'. $extension_telechargees;
				if($img == 4) $nom_image = 'bouton_depot.'. $extension_telechargees;
				if($img == 5) $nom_image = 'bouton_envoye.'. $extension_telechargees;
				if($img == 6) $nom_image = 'bouton_majeur.'. $extension_telechargees;
				if($img == 7) $nom_image = 'bouton_mod_annonce.'. $extension_telechargees;
				if($img == 8) $nom_image = 'bouton_modifier.'. $extension_telechargees;
				if($img == 9) $nom_image = 'bouton_parcourir.'. $extension_telechargees;
				if($img == 10) $nom_image = 'bouton_search.'. $extension_telechargees;
				if($img == 11) $nom_image = 'bouton_sent_annonce.'. $extension_telechargees;
				if($img == 12) $nom_image = 'bouton_valider.'. $extension_telechargees;
				if($img == 13) $nom_image = 'top_menu_search.'. $extension_telechargees;
				if($img == 14) $nom_image = 'middle_menu_search.'. $extension_telechargees;
				if($img == 15) $nom_image = 'bottom_menu_search.'. $extension_telechargees;
				if($img == 16) $nom_image = 'bt_info_center.'. $extension_telechargees;
				if($img == 17) $nom_image = 'bt_info_center_v.'. $extension_telechargees;
				if($img == 18) $nom_image = 'bt_info_left.'. $extension_telechargees;
				if($img == 19) $nom_image = 'bt_info_right.'. $extension_telechargees;
				if($img == 20) $nom_image = 'bt_info_right2.'. $extension_telechargees;
				if($img == 21) $nom_image = 'bt_info_right_v.'. $extension_telechargees;
				if($img == 22) $nom_image = 'bt_info_right_v2.'. $extension_telechargees;
				if($img == 23) $nom_image = 'fond_ann_une.'. $extension_telechargees;
				if($img == 24) $nom_image = 'fond_vit_une.'. $extension_telechargees;
				if($img == 25) $nom_image = 'fond_listing1.'. $extension_telechargees;
				if($img == 26) $nom_image = 'fond_listing3.'. $extension_telechargees;
				if($img == 27) $nom_image = 'fond_listing2.'. $extension_telechargees;
				if($img == 28) $nom_image = 'fond_listing4.'. $extension_telechargees;
				if($img == 29) $nom_image = 'fond_listing5.'. $extension_telechargees;
				if($img == 30) $nom_image = 'fond_listing6.'. $extension_telechargees;
				if($img == 31) $nom_image = 'logo_urgent.'. $extension_telechargees;
				if($img == 32) $nom_image = 'no_photo1.'. $extension_telechargees;
				if($img == 33) $nom_image = 'no_photo2.'. $extension_telechargees;
				if($img == 34) $nom_image = 'no_photo3.'. $extension_telechargees;
				if($img == 35) $nom_image = 'no_photo5.'. $extension_telechargees;
				if($img == 36) $nom_image = 'img_info_pub.'. $extension_telechargees;
				if($img == 37) $nom_image = 'fond_pub_texte.'. $extension_telechargees;
				if($img == 38) $nom_image = 'pub_fond_ann.'. $extension_telechargees;
				if($img == 39) $nom_image = 'top_header_fl.'. $extension_telechargees;
				if($img == 40) $nom_image = 'fleche_u.'. $extension_telechargees;
				if($img == 41) $nom_image = 'fleche.'. $extension_telechargees;
				if($img == 42) $nom_image = 'upload_photo.'. $extension_telechargees;
				if($img == 43) $nom_image = 'radio1.'. $extension_telechargees;
				if($img == 44) $nom_image = 'radio2.'. $extension_telechargees;
				if($img == 45) $nom_image = 'check1.'. $extension_telechargees;
				if($img == 46) $nom_image = 'check2.'. $extension_telechargees;
				if($img == 47) $nom_image = 'geo_vit.'. $extension_telechargees;
				if($img == 48) $nom_image = 'icone_bout.'. $extension_telechargees;
				if($img == 49) $nom_image = 'icone_enc.'. $extension_telechargees;
				if($img == 50) $nom_image = 'icone_ent.'. $extension_telechargees;
				if($img == 51) $nom_image = 'icone_env.'. $extension_telechargees;
				if($img == 52) $nom_image = 'icone_geo.'. $extension_telechargees;
				if($img == 53) $nom_image = 'icone_imp.'. $extension_telechargees;
				if($img == 54) $nom_image = 'icone_mod.'. $extension_telechargees;
				if($img == 55) $nom_image = 'icone_rem.'. $extension_telechargees;
				if($img == 56) $nom_image = 'icone_sel.'. $extension_telechargees;
				if($img == 57) $nom_image = 'icone_sig.'. $extension_telechargees;
				if($img == 58) $nom_image = 'icone_sir.'. $extension_telechargees;
				if($img == 59) $nom_image = 'icone_sup.'. $extension_telechargees;
				if($img == 60) $nom_image = 'icone_sup_sel.'. $extension_telechargees;
				if($img == 61) $nom_image = 'icone_tel.'. $extension_telechargees;
				if($img == 62) $nom_image = 'icone_une.'. $extension_telechargees;
				if($img == 63) $nom_image = 'icone_urg.'. $extension_telechargees;
				if($img == 64) $nom_image = 'top_header.'. $extension_telechargees;
				if($img == 65) $nom_image = 'fond_listing7.'. $extension_telechargees;
				if($img == 66) $nom_image = 'fond_listing8.'. $extension_telechargees;
				
				move_uploaded_file($_FILES['img']['tmp_name'], '../images/' . basename($nom_image)); // Valilation est stockage du fichier
			}
			else $error = 3;
		}
		else $error = 2;
	}
	elseif(isset($_FILES['pub']) AND $_FILES['pub']['error'] != 0)
	$error = 1;
}

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();
htm_menu();
htm_temp_img($error);
htm_admin_footer();