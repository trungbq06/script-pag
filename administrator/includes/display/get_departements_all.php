<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../../includes/configuration.php'); 
require_once('../../../includes/cache/all_cache.php');
require_once('../functions_adm_display.php');
require_once('../language/french_adm.php');

$aff = '';

foreach($cache_departements as $row)
{
	if($row['id_reg'] == $_POST['form_dep'])
	$aff = '1';
}

if($aff == 1)
{
?>
<div class="form_left"><?php echo $language_adm['page_xml_export_dep']; ?> :</div>
<div class="form_right"><?php display_adm_departements_search(0, $_POST['form_dep'], $cache_departements, $language_adm['search_dep']); ?></div>
<?php
}