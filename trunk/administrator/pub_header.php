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

if(isset($_POST['url']))
{
	if(empty($_POST['url']) && empty($_POST['script']))
	$error = 4;
	
	elseif(!empty($_POST['url']) && !empty($_POST['script']))
	$error = 5;
	
	elseif(!empty($_POST['url']) && preg_match('#^https?://#', $_POST['url']) == false)
	$error = 6;
	
	elseif(empty($_POST['script'])) 
	{
		if(isset($_FILES['pub']) && $_FILES['pub']['error'] == 0)
		{
			if ($_FILES['pub']['size'] <= 1073741824*3) // Verifier la taille du fichier 3GO MAX
			{
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');  // Les extentions autorisées
				$extension_telechargees = strtolower(substr(strrchr($_FILES['pub']['name'], '.'), 1) );  // Récupération de l'extention
				
				if (in_array($extension_telechargees, $extensions_autorisees))
				{
					if(!empty($_POST['img'])) unlink('../images/pub/'. $_POST['img']);
					
					$nom_image = 'pub_428x90.'. $extension_telechargees;
					
					move_uploaded_file($_FILES['pub']['tmp_name'], '../images/pub/' . basename($nom_image)); // Valilation est stockage du fichier
					
					$size = getimagesize('../images/pub/'. $nom_image);
					$width = $size[0];
					$height = $size[1];
					
					if($width > 728 OR $height > 90)
					{
						if($width > 728)
						$width = 728;
						
						if($height > 90)
						$height = 90;
						
						if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg') //Redimention de l'image 
						{
							$source = imagecreatefromjpeg("../images/pub/$nom_image");
							$destination = @imagecreatetruecolor($width, $height);
							
							$largeur_source = imagesx($source);
							$hauteur_source = imagesy($source);
							$largeur_destination = @imagesx($destination);
							$hauteur_destination = @imagesy($destination);
							
							@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
							
							@imagejpeg($destination, "../images/pub/$nom_image");
						}
						
						if($extension_telechargees == 'gif')
						{
							$source = imagecreatefromgif("../images/pub/$nom_image");
							$destination = @imagecreate($width, $height);
						 
							$largeur_source = imagesx($source);
							$hauteur_source = imagesy($source);
							$largeur_destination = @imagesx($destination);
							$hauteur_destination = @imagesy($destination);
						 
							@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
						 
							@imagegif($destination, "../images/pub/$nom_image");
						}
					 
						if($extension_telechargees == 'png')
						{
							$source = imagecreatefrompng("../images/pub/$nom_image"); // La photo est la source
							$destination = @imagecreatetruecolor($width, $height); // On crée la miniature vide
							
							$largeur_source = imagesx($source);
							$hauteur_source = imagesy($source);
							$largeur_destination = @imagesx($destination);
							$hauteur_destination = @imagesy($destination);
							
							@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
							
							@imagepng($destination, "../images/pub/$nom_image");
						}
					}
				}
				else $error = 3;
			}
			else $error = 2;
		}
		elseif(isset($_FILES['pub']) AND $_FILES['pub']['error'] != 0)
		$error = 1;
	}
}
else $conn = null;

///////////////////////////////////
//Application ou retrait de la note
//////////////////////////////////

if(isset($_POST['url']) && empty($error))
{
	update_pub($_POST, $nom_image);
	creer_cache_publicites();
	$conn = null;
	
	$texte_info = $language_adm['page_gest_pub_acc_re_info'];
	$texte = $language_adm['page_gest_pub_acc_re'];
	
	htm_admin_header();
	htm_menu();
	display_text($texte_info, $texte);
	htm_admin_footer();
}
else
{
	htm_admin_header();
	htm_menu();
	htm_pub_header($error);
	htm_admin_footer();
}