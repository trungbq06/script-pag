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
	if($row['id_reg'] == $_POST['dep'])
	$aff = '1';
}

if($aff == 1)
display_search_departements(0, $_POST['dep'], $cache_departements);