<?php 
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

header ("Content-type: image/png");

$image = htmlspecialchars($_GET['tel']);
$police = 3;
$width  = imagefontwidth($police) * strlen($image);
$height = imagefontheight($police);
$image_tel = imagecreate ($width, $height);

imagecolorallocate ($image_tel, 255, 255, 255);

$text_color = imagecolorallocate($image_tel, 55, 55, 55);

imagestring($image_tel, $police, 0, 2,  $image, $text_color);
imagepng($image_tel);

