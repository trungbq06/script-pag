<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../all_functions.php');

$note = '';

foreach($cache_categories as $v)
{
	if($v['id_cat'] == $_POST['options'])
	$note = stripslashes(htmlspecialchars($v['com_cat'], ENT_QUOTES));
}

if (!empty($note))
echo '<p class="form_left_info"></p><p class="form_right_info">'. nl2br($note) .'</p>';
