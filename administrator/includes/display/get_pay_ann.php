<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../../includes/configuration.php'); 
require_once('../../../includes/cache/all_cache.php');
require_once('../language/french_adm.php');

$prix_par = '';
$prix_pro = '';
$prix_par_mod = '';
$prix_pro_mod = '';
$prix_par_ren = '';
$prix_pro_ren = '';

foreach($cache_categories as $v)
{
	if($v['id_cat'] == $_POST['form_pay_ann'])
	{
		$prix_par = number_format($v['prix_par'], 2, '.', '');
		$prix_pro = number_format($v['prix_pro'], 2, '.', ''); 
		$prix_par_mod = number_format($v['prix_par_mod'], 2, '.', '');
		$prix_pro_mod = number_format($v['prix_pro_mod'], 2, '.', ''); 
		$prix_par_ren = number_format($v['prix_par_ren'], 2, '.', '');
		$prix_pro_ren = number_format($v['prix_pro_ren'], 2, '.', '');
	}
}

?>
<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_par" value="<?php echo $prix_par; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_pro" value="<?php echo $prix_pro; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par_m']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_par_mod" value="<?php echo $prix_par_mod; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro_m']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_pro_mod" value="<?php echo $prix_pro_mod; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par_r']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_par_ren" value="<?php echo $prix_par_ren; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro_r']; ?> :</div>
<div class="form_right"><input class="input_con" type="text" name="prix_pro_ren" value="<?php echo $prix_pro_ren; ?>" /></div>

<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_tout']; ?> :</div>
<div class="form_right_checkbox">
	<input type="checkbox" class="input_checkbox" id="all" name="all" value="1" onclick="turnImgCheck(this);" />
	<img <?php echo 'src="images/check1.png"'; ?> id="img_check_all" alt="" />
</div>