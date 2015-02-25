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
//Initialisation de la variable $error et $nom_image
//////////////////////////////////

$error = '';
$nom_image = '';

///////////////////////////////////
//Validation du type de pub
//////////////////////////////////

if(!empty($_GET['p']))
{
	$p = (int) $_GET['p'];
	
	if($p != 2 && $p !=3)
	redirect('admin.php');
}
else redirect('admin.php');

if(!empty($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if($type != 1 && $type != 2 && $type != 3)
	redirect('admin.php');
}
else redirect('admin.php');

///////////////////////////////////
//Validation de la région
//////////////////////////////////

if(!empty($_POST['reg']))
$id_reg = (int) $_POST['reg'];
	
else $id_reg = 0;

///////////////////////////////////
//Validation du département
//////////////////////////////////

if(!empty($_POST['dep']))
$id_dep = (int) $_POST['dep'];
	
else $id_dep = 0;

///////////////////////////////////
//Validation de la catégorie
//////////////////////////////////

if(!empty($_POST['cat']))
$id_cat = (int) $_POST['cat'];
	
else $id_cat = 0;

///////////////////////////////////
//Valider la pub
//////////////////////////////////

if(isset($_POST['nom']))
{
	if(empty($_POST['nom']))
	$error = 4;
	
	elseif(isset($_POST['url']) && empty($_POST['url']))
	$error = 5;
	
	elseif(isset($_POST['url']) && preg_match('#^https?://#', $_POST['url']) == false)
	$error = 6;
	
	elseif(isset($_POST['text']) && empty($_POST['text']))
	$error = 7;
	
	elseif(isset($_POST['script']) && empty($_POST['script']))
	$error = 8;
	
	elseif(empty($_POST['script'])) 
	{
		if(!empty($_POST['img'])) unlink('../images/pub/'. $_POST['img']);
		
		if(isset($_FILES['pub']) && $_FILES['pub']['error'] == 0)
		{
			if ($_FILES['pub']['size'] <= 1073741824*3) // Verifier la taille du fichier 3GO MAX
			{
				$caracteres = array(2, 'y', 9, 'a', 9, 'j', 5, 'i', 7, 'd', 3, 'b', 2, 's', 6, 'm', 8, 'h', 1, 'e', 9, 't', 2, 'r', 4, 'z',
							6, 'f', 4, 'p', 7, 'n', 1, 's', 'q', 3, 'd', 2, 'v', 0, 'd', 0, 's', 6, 'i', 7, 'm', 9, 'q', 4, 't', 3,
							'q', 2, 'd', 'o', 9, 'd', 'g', 9, 5, 'i', 7, 'v', 3, 2, 6, 's', 8, 1, 'z', 9, 2, 4, 'e', 6, 4, 7, 1, 'v');
        
				$caracteres_aleatoires = array_rand($caracteres, 10); //Généartion d'un code aléatoire pour le nom des photos
				$code = '';
			 
				foreach($caracteres_aleatoires as $i)
				{
					$code .= $caracteres[$i];
				}
				
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');  // Les extentions autorisées
				$extension_telechargees = strtolower(substr(strrchr($_FILES['pub']['name'], '.'), 1) );  // Récupération de l'extention
				
				if (in_array($extension_telechargees, $extensions_autorisees))
				{
					$nom_image = $code .'.'. $extension_telechargees;
					
					move_uploaded_file($_FILES['pub']['tmp_name'], '../images/pub/' . basename($nom_image)); // Valilation est stockage du fichier
					
					$size = getimagesize('../images/pub/'. $nom_image);
					$width = $size[0];
					$height = $size[1];
					
					if(($p == 2 && $type == 1 && $width > 183) || ($p == 3 && $type == 1 && $width > 200) || ($type == 2 && $width > 30))
					{
						if($p == 2 && $type == 1)
						{
							$red_height = $width / 183;
							$height = $height / $red_height;
							$width = 183;
						}
						elseif($p == 3 && $type == 1)
						{
							$red_height = $width / 200;
							$height = $height / $red_height;
							$width = 200;
						}
						else
						{
							$height = 30;
							$width = 30;
						}
						
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

///////////////////////////////////
//Création de la page
//////////////////////////////////

if(!empty($_POST['nom']) && empty($error))
{
	creer_pub($_POST, $nom_image);
	creer_cache_publicites();
	$conn = null;
	
	redirect('pub.php?p='. $p .'&menu=22');
}
else $conn = null;

///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////	
	
htm_admin_header();
htm_menu();
htm_pub_crea($p, $type, $id_reg, $id_dep, $id_cat, $error);
htm_admin_footer();