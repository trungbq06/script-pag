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
			
			$dossier_logos = 'images/logos/'. $annee .'/'. $mois .'/'. $jour;
			
			$nom_image_register = $annee .'/'. $mois .'/'. $jour .'/'. $nom_image;
			
			if(!is_dir($dossier_logos))
			{
				mkdir($dossier_logos, 0777, true);
				chmod('images/logos/'. $annee, 0777);
				chmod('images/logos/'. $annee .'/'. $mois, 0777);
				chmod('images/logos/'. $annee .'/'. $mois .'/'. $jour, 0777);
			}
			
			move_uploaded_file($_FILES['photo']['tmp_name'], $dossier_logos .'/'. basename($nom_image)); // Vilation est stockage du fichier
			
			$size = getimagesize($dossier_logos .'/'. $nom_image);
			$width = $size[0];
			$height = $size[1];
			
			if(($width > 220 && $width >= $height) OR ($height > 165 && $height > $width))
			{
				if($width > 220 && $width >= $height)
				{
					$red_height = $width / 220;
					$height = $height / $red_height;
					$width = 220;
				}
				
				if($height > 165 && $height > $width)
				{
					$red_width = $height / 165;
					$width = $width / $red_width;
					$height = 165;
				}
				
				if($extension_telechargees == 'jpg' OR $extension_telechargees == 'jpeg') //Redimention de l'image 
				{
					$source = imagecreatefromjpeg($dossier_logos ."/$nom_image");
					$destination = @imagecreatetruecolor($width, $height);
					
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					@imagejpeg($destination, $dossier_logos ."/$nom_image");
				}
			 	
				if($extension_telechargees == 'gif')
				{
					$source = imagecreatefromgif($dossier_logos ."/$nom_image");
					$destination = @imagecreate($width, $height);
                 
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
                 
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
                 
					@imagegif($destination, $dossier_logos ."/$nom_image");
				}
		     
				if($extension_telechargees == 'png')
				{
					$source = imagecreatefrompng($dossier_logos ."/$nom_image"); // La photo est la source
					$destination = @imagecreatetruecolor($width, $height); // On crée la miniature vide
					
					$largeur_source = imagesx($source);
					$hauteur_source = imagesy($source);
					$largeur_destination = @imagesx($destination);
					$hauteur_destination = @imagesy($destination);
					
					@imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
					
					@imagepng($destination, $dossier_logos ."/$nom_image");
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
//Obtenir les infos du membre connecté
//////////////////////////////////

$conn = db_connect();

$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);
$id_compte = (int) $membre[0]['id_compte'];

///////////////////////////////////
//Enregistrement du nom des images dans des session
//////////////////////////////////

if(isset($nom_image))
{
	if(!isset($_SESSION['logo_vitrine']))
	$_SESSION['logo_vitrine'] = $nom_image_register;
	
	$sql = "UPDATE ". PREFIX ."boutiques SET nom_logo = :nom_logo WHERE id_compte = :id_compte";
	$req = $conn->prepare($sql);
	
	$req->bindValue('nom_logo', $nom_image_register, PDO::PARAM_STR);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

$conn = null;

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
		if(isset($_SESSION['logo_vitrine']))
		echo '<img src="images/logos/'. $_SESSION['logo_vitrine'] .'" width="60" height="40" alt="" /> ';
		
		else echo '<img src="images/upload_photo.png" width="60" height="40" alt="" /> ';
	?>
</p>
	
<p class="form_left"></p>
<p class="form_right_info">
	<?php
		
		if(isset($_SESSION['logo_vitrine']))
		echo '<a href="upload_delete3.php?id=1&amp;id_compte='. $id_compte .'"><img src="images/retirer.gif" width="60" height="10" alt="" /></a> ';
		
		else echo '<img src="images/photo.png" width="60" height="10" alt="" /> ';
	?>
</p>