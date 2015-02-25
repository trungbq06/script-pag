<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../../includes/configuration.php');
require_once('../../../includes/cache/all_cache.php');
require_once('../language/french_adm.php');

$disc = '';

foreach($cache_categories as $v)
{
	if($v['id_cat'] == $_POST['form_disc'])
	$disc = (int) $v['disc'];
}

?>
<div class="form_left"><?php echo $language_adm['page_disc_txt']; ?> :</div>
<div class="form_right_checkbox">
	<input type="checkbox" class="input_checkbox" id="disc" name="disc" value="1" onclick="turnImgCheck(this);" <?php if($disc == 1) echo 'checked="checked"'; ?> />
	<img <?php if($disc == 1) echo 'src="../images/check2.png"'; else echo 'src="../images/check1.png"'; ?> id="img_check_disc" alt="" />
</div>