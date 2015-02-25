<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par l'entreprise ZUPPARDO : Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style/structure.css" type="text/css" rel="stylesheet" />
<link href="style/style.css" type="text/css" rel="stylesheet" />

<body style="background: none;">
 
<?php

///////////////////////////////////
//Téléchargement des photos
//////////////////////////////////

if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
	if ($_FILES['photo']['size'] <= 1073741824*4) // Verifier la taille du fichier 4GO MAX
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
		$extension_telechargees = strtolower(substr(strrchr($_FILES['photo']['name'], '.') ,1) );  // Récupération de l'extention
		
        if (in_array($extension_telechargees, $extensions_autorisees))
        {
			$nom_image = $code .'.'. $extension_telechargees;
			
			$annee = date('Y');
			$mois = date('m');
			$jour = date('d');
			
			$dossier_photos = 'images/photos/'. $annee .'/'. $mois .'/'. $jour;
			$dossier_vignettes = 'images/vignettes/'. $annee .'/'. $mois .'/'. $jour;
			
			$nom_image_register = $annee .'/'. $mois .'/'. $jour .'/'. $nom_image;
			
			if(!is_dir($dossier_photos))
			{
				mkdir($dossier_photos, 0777, true); 
				chmod('images/photos/'. $annee, 0777);
				chmod('images/photos/'. $annee .'/'. $mois, 0777);
				chmod('images/photos/'. $annee .'/'. $mois .'/'. $jour, 0777);
			}
		
			if(!is_dir($dossier_vignettes))
			{
				mkdir($dossier_vignettes, 0777, true);
				chmod('images/vignettes/'. $annee, 0777);
				chmod('images/vignettes/'. $annee .'/'. $mois, 0777);
				chmod('images/vignettes/'. $annee .'/'. $mois .'/'. $jour, 0777);
			}
			
			move_uploaded_file($_FILES['photo']['tmp_name'], $dossier_photos .'/' . basename($nom_image)); // Vilation est stockage du fichier
			
			$size = getimagesize($dossier_photos .'/'. $nom_image);
			$width = $size[0];
			$height = $size[1];
			
			if(($width > 677 && $width >= $height) OR ($height > 480 && $height > $width))
			{
				if($width > 677 && $width >= $height)
				{
					$red_height = $width / 677;
					$height = $height / $red_height;
					$width = 677;
				}
				
				if($height > 480 && $height > $width)
				{
					$red_width = $height / 480;
					$width = $width / $red_width;
					$height = 480;
				}
				
				if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg') //Redimention de l'image 
				{
					$source = imagecreatefromjpeg($dossier_photos ."/$nom_image");
					$destination = @imagecreatetruecolor($width, $height);
					
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					@imagejpeg($destination, $dossier_photos ."/$nom_image");
				}
			 	
				if($extension_telechargees == 'gif')
				{
					$source = imagecreatefromgif($dossier_photos ."/$nom_image");
					$destination = @imagecreate($width, $height);
                 
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
                 
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                 
					@imagegif($destination, $dossier_photos ."/$nom_image");
				}
		     
				if($extension_telechargees == 'png')
				{
					$source = imagecreatefrompng($dossier_photos ."/$nom_image"); // La photo est la source
					$destination = imagecreatetruecolor($width, $height); // On crée la miniature vide
					
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					@imagepng($destination, $dossier_photos ."/$nom_image");
				}
				
				// Watermark
				
				if(file_exists('images/watermark.png'))
				{
					if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefromjpeg($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagejpeg($destination, $dossier_photos ."/$nom_image");
					}
					if($extension_telechargees == 'gif')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefromgif($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagegif($destination, $dossier_photos ."/$nom_image");
					}
					if($extension_telechargees == 'png')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefrompng($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagepng($destination, $dossier_photos ."/$nom_image");
					}
				}
			}
			else
			{
				if(file_exists('images/watermark.png'))
				{
					if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefromjpeg($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagejpeg($destination, $dossier_photos ."/$nom_image");
					}
					if($extension_telechargees == 'gif')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefromgif($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagegif($destination, $dossier_photos ."/$nom_image");
					}
					if($extension_telechargees == 'png')
					{
						$source = imagecreatefrompng("images/watermark.png"); 
						$destination = @imagecreatefrompng($dossier_photos ."/$nom_image");
						
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						$largeur_destination = @imagesx($destination);
						$hauteur_destination = @imagesy($destination);
						
						$destination_x = 2;
						$destination_y = 2;
						
						@imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);
						
						@imagepng($destination, $dossier_photos ."/$nom_image");
					}
				}
			}
			
			// Enregistrement vignette
			
			if(($width > 150 && $width >= $height) OR ($height > 105 && $height > $width))
			{
				if($width > 150 && $width >= $height)
				{
					$red_height = $width / 150;
					$height = $height / $red_height;
					$width = 150;
				}
				
				if($height > 105 && $height > $width)
				{
					$red_width = $height / 105;
					$width = $width / $red_width;
					$height = 105;
				}
				
				if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg') //Redimention de l'image 
				{
					$source = @imagecreatefromjpeg($dossier_photos ."/$nom_image");
					$destination = imagecreatetruecolor($width, $height);
					
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					imagejpeg($destination, $dossier_vignettes ."/$nom_image");
				}
			 	
				if($extension_telechargees == 'gif')
				{
					$source = @imagecreatefromgif($dossier_photos ."/$nom_image");
					$destination = imagecreate($width, $height);
                 
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
                 
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                 
					imagegif($destination, $dossier_vignettes ."/$nom_image");
				}
		     
				if($extension_telechargees == 'png')
				{
					$source = @imagecreatefrompng($dossier_photos ."/$nom_image"); // La photo est la source
					$destination = imagecreatetruecolor($width, $height); // On crée la miniature vide
					
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					imagepng($destination, $dossier_vignettes ."/$nom_image");
				}
			}
			else
			{
				if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg') //Redimention de l'image 
				{
					$source = @imagecreatefromjpeg($dossier_photos ."/$nom_image");
					$destination = imagecreatetruecolor($width, $height);
					
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					imagejpeg($destination, $dossier_vignettes ."/$nom_image");
				}
			 	
				if($extension_telechargees == 'gif')
				{
					$source = @imagecreatefromgif($dossier_photos ."/$nom_image");
					$destination = imagecreate($width, $height);
                 
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
                 
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                 
					imagegif($destination, $dossier_vignettes ."/$nom_image");
				}
		     
				if($extension_telechargees == 'png')
				{
					$source = @imagecreatefrompng($dossier_photos ."/$nom_image"); // La photo est la source
					$destination = imagecreatetruecolor($width, $height); // On crée la miniature vide
					
					$largeur_source = @imagesx($source);
					$hauteur_source = @imagesy($source);
					$largeur_destination = imagesx($destination);
					$hauteur_destination = imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					imagepng($destination, $dossier_vignettes ."/$nom_image");
				}
			}
        }
		else $e = '<span class="error">'. $language['form_erreur_extention'] .'</span><br />';
    }
	else $e = '<span class="error">'. $language['form_erreur_size'] .'</span><br />';
}

if (isset($_FILES['photo']) AND $_FILES['photo']['error'] != 0)
$e = '<span class="error">'. $language['form_erreur_upload'] .'</span><br />';

///////////////////////////////////
//Enregistrement du nom des images dans des session
//////////////////////////////////

$nb_photo_payantes = ($cache_option_photos['prix_photo'] != 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1)) ? (int) $cache_option_photos['nb_photo_max'] : 0;
$nb_photo = (int) $cache_option_photos['nb_photo_gratuite'] + $nb_photo_payantes;
$prix_photo = (float) $cache_option_photos['prix_photo'];
$prix_photo = number_format($prix_photo, 2, ',', ' ');

if(isset($nom_image))
{
	if(!isset($_SESSION['photo']['1']) && $nb_photo >= 1)
	$_SESSION['photo']['1'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['2']) && $nb_photo >= 2)
	$_SESSION['photo']['2'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['3']) && $nb_photo >= 3)
	$_SESSION['photo']['3'] = $nom_image_register;
	
	elseif(!isset($_SESSION['photo']['4']) && $nb_photo >= 4)
	$_SESSION['photo']['4'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['5']) && $nb_photo >= 5)
	$_SESSION['photo']['5'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['6']) && $nb_photo >= 6)
	$_SESSION['photo']['6'] = $nom_image_register;
	
	elseif(!isset($_SESSION['photo']['7']) && $nb_photo >= 7)
	$_SESSION['photo']['7'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['8']) && $nb_photo >= 8)
	$_SESSION['photo']['8'] = $nom_image_register;

	elseif(!isset($_SESSION['photo']['9']) && $nb_photo >= 9)
	$_SESSION['photo']['9'] = $nom_image_register;
	
	elseif(!isset($_SESSION['photo']['10']) && $nb_photo >= 10)
	$_SESSION['photo']['10'] = $nom_image_register;
	
	else $e = '<span class="error">'. $language['form_erreur_nb_photo'] .'</span><br />';
	
	//Comptage des photos
	
	if(isset($_SESSION['photo']['count']))
		$_SESSION['photo']['count'] = $_SESSION['photo']['count'] + 1;
	
	else $_SESSION['photo']['count'] = 1;
	
}
	
if(isset($e))
{
?>

<p class="form_left"> </p>
<p class="form_right_info"><?php echo $e; ?></p>

<?php
}
?>
<p class="form_left"></p>
<p class="form_right_photo">
<?php
	
	if($nb_photo >= 1)
	{
		if(isset($_SESSION['photo']['1']))
		echo '<img src="images/photos/'. $_SESSION['photo']['1'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
 
	if($nb_photo >= 2)
	{
		if(isset($_SESSION['photo']['2']))
		echo '<img src="images/photos/'. $_SESSION['photo']['2'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
 
	if($nb_photo >= 3)
	{
		if(isset($_SESSION['photo']['3']))
		echo '<img src="images/photos/'. $_SESSION['photo']['3'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 4)
	{
		if(isset($_SESSION['photo']['4']))
		echo '<img src="images/photos/'. $_SESSION['photo']['4'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 5)
	{
		if(isset($_SESSION['photo']['5']))
		echo '<img src="images/photos/'. $_SESSION['photo']['5'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 6)
	{
		if(isset($_SESSION['photo']['6']))
		echo '<img src="images/photos/'. $_SESSION['photo']['6'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 7)
	{
		if(isset($_SESSION['photo']['7']))
		echo '<img src="images/photos/'. $_SESSION['photo']['7'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 8)
	{
		if(isset($_SESSION['photo']['8']))
		echo '<img src="images/photos/'. $_SESSION['photo']['8'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 9)
	{
		if(isset($_SESSION['photo']['9']))
		echo '<img src="images/photos/'. $_SESSION['photo']['9'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
	
	if($nb_photo >= 10)
	{
		if(isset($_SESSION['photo']['10']))
		echo '<img src="images/photos/'. $_SESSION['photo']['10'] .'" width="60" height="40" alt="" /> ';
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	}
?>
</p>
<p class="form_left"> </p>
<p class="form_right_info">
<?php

	
	if($nb_photo >= 1)
	{
		if(isset($_SESSION['photo']['1']))
		echo '<a href="upload_delete.php?id=1"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
 
	if($nb_photo >= 2)
	{
		if(isset($_SESSION['photo']['2']))
		echo '<a href="upload_delete.php?id=2"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
 
	if($nb_photo >= 3)
	{
		if(isset($_SESSION['photo']['3']))
		echo '<a href="upload_delete.php?id=3"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 4)
	{
		if(isset($_SESSION['photo']['4']))
		echo '<a href="upload_delete.php?id=4"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 5)
	{
		if(isset($_SESSION['photo']['5']))
		echo '<a href="upload_delete.php?id=5"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 6)
	{
		if(isset($_SESSION['photo']['6']))
		echo '<a href="upload_delete.php?id=6"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 7)
	{
		if(isset($_SESSION['photo']['7']))
		echo '<a href="upload_delete.php?id=7"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 8)
	{
		if(isset($_SESSION['photo']['8']))
		echo '<a href="upload_delete.php?id=8"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 9)
	{
		if(isset($_SESSION['photo']['9']))
		echo '<a href="upload_delete.php?id=9"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
	
	if($nb_photo >= 10)
	{
		if(isset($_SESSION['photo']['10']))
		echo '<a href="upload_delete.php?id=10"><img src="images/delete.png" width="60" height="10" alt="" /></a> ';
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	}
 
?>
</p>