<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces d�velopp� par Script PAG
///Script PAG tout droits r�serv�. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

session_start();

///////////////////////////////////
//Chemain absolu vers le dossier
//////////////////////////////////

if (!defined('ABSPATH')) 
	define('ABSPATH', dirname(__FILE__) . '/');
	
 
///////////////////////////////////
//Cr�ation d'une chaine de caract�res al�atoire
//////////////////////////////////

function getCode($length) 
{
	$chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
	$rand_str = '';
	
	for($i=0; $i<$length; $i++) 
	{
		$rand_str .= $chars{ mt_rand( 0, strlen($chars)-1 ) };
	}
	return $rand_str;
}
 
///////////////////////////////////
//Stockage de la chaine dans une variable
//////////////////////////////////

$theCode = getCode(5);
 
///////////////////////////////////
//Cryptage de la chaine dans une variable de session
//////////////////////////////////
 
$_SESSION['captcha'] = md5($theCode);
 
///////////////////////////////////
//Cr�ation de l'image
//////////////////////////////////
 
$char1 = substr($theCode,0,1);
$char2 = substr($theCode,1,1);
$char3 = substr($theCode,2,1);
$char4 = substr($theCode,3,1);
$char5 = substr($theCode,4,1);
 
$fonts = glob('images/captcha/caracteres.ttf');
 
$image = imagecreatefrompng('images/captcha/img.png');
 
$colors = array (imagecolorallocate($image, 0,0,0));
 
function random($tab) 
{
  return $tab[array_rand($tab)];
}

imagettftext($image, 28, -10,   0, 37, random($colors), ABSPATH .'/'. random($fonts), $char1);
imagettftext($image, 28,  20,  37, 37, random($colors), ABSPATH .'/'. random($fonts), $char2);
imagettftext($image, 28, -35,  55, 37, random($colors), ABSPATH .'/'. random($fonts), $char3);
imagettftext($image, 28,  25, 100, 37, random($colors), ABSPATH .'/'. random($fonts), $char4);
imagettftext($image, 28, -15, 120, 37, random($colors), ABSPATH .'/'. random($fonts), $char5);
 
 
///////////////////////////////////
//Ent�te pour le fichier php
//////////////////////////////////

header('Content-Type: image/png');
 
///////////////////////////////////
//Cr�ation de l'image
//////////////////////////////////

imagepng($image);
 
///////////////////////////////////
//Suppression de l'image
//////////////////////////////////
 
imagedestroy($image);