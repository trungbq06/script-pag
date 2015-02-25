<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../../includes/configuration.php'); 
require_once('../../../includes/cache/all_cache.php');
require_once('../language/french_adm.php');

$note = '';

foreach($cache_categories as $v)
{
	if($v['id_cat'] == $_POST['form_note'])
	$note = stripslashes(htmlspecialchars($v['com_cat'], ENT_QUOTES));
}

?>
<div class="form_left"><?php echo $language_adm['page_not_txt']; ?> :</div>
<div class="form_right"><textarea type="text" class="textarea" cols="50" rows="3" name="note" /><?php echo $note; ?></textarea></div>
