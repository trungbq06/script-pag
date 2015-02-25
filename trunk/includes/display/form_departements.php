<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../all_functions.php');

$aff = '';

foreach($cache_departements as $row)
{
	if($row['id_reg'] == $_POST['form_dep'])
	$aff = '1';
}

if($aff == 1)
{
	echo '<p class="form_left"><label for="form_reg">'. $language['form_dep'] .' :</label></p><p class="form_right_select">';

	display_departements(0, $_POST['form_dep'], $cache_departements);

	echo '</p>';
}