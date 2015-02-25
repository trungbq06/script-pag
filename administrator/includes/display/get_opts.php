<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../../includes/configuration.php'); 
require_once('../../../includes/cache/all_cache.php');
require_once('../language/french_adm.php');

$checked[] = array();
$checked2[] = array();
	
foreach($cache_search_valeurs as $row)
{
	if($row['id_cat'] == $_POST['form_opts'])
	$checked[] = $row['id_opt'];
}

foreach($cache_search_donnees as $row2)
{
	if($row2['id_cat'] == $_POST['form_opts'])
	$checked2[] = $row2['id_opt'];
}

?>

<div class="form_left"><?php echo $language_adm['page_opts_pri']; ?> :</div>
<div class="form_right_checkbox">
	<input type="checkbox" class="input_checkbox" id="0" name="options_val[]" value="0" onclick="turnImgCheck(this);" <?php if(in_array(0, $checked)) echo 'checked="checked"'; ?> />
	<img <?php if(in_array(0, $checked)) echo 'src="../images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_0" alt="" />
</div>

<?php
	
if(is_array($cache_options_cat))
{
	foreach($cache_options_cat as $row)
	{
		$id = (int) $row['id_opt'];
		$opt_name = htmlspecialchars($row['nom_opt'], ENT_QUOTES);
		$type = (int) $row['type'];
	 
		if($type == 1)
		{
		?>
		<div class="form_left"><?php echo $language_adm['page_opts_all'] .' '. $opt_name; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="<?php echo $id; ?>" name="options_val[]" value="<?php echo $id; ?>" onclick="turnImgCheck(this);" <?php if(in_array($id, $checked)) echo 'checked="checked"'; ?> />
			<img <?php if(in_array($id, $checked)) echo 'src="../images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_<?php echo $id; ?>" alt="" />
		</div>
		<?php
		}
	}
}
if(is_array($cache_options_cat))
{
	$aff = '';

	foreach($cache_options_cat as $row)
	{
		if($row['type'] == 2)
		$aff = '1';
	}
	
	if(!empty($aff))
	{
	?>
	<div class="form_left"></div>
	<div class="form_right"><span class="txt_info"><?php echo $language_adm['page_opts_info2']; ?></span></div>
	<?php
	}
	
	foreach($cache_options_cat as $row)
	{
		$id = (int) $row['id_opt'];
		$opt_name = htmlspecialchars($row['nom_opt'], ENT_QUOTES);
		$type = (int) $row['type'];
	 
		if($type == 2)
		{
		?>
		<div class="form_left"><?php echo $language_adm['page_opts_all'] .' '. $opt_name; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="<?php echo $id; ?>" name="options_don[]" value="<?php echo $id; ?>" onclick="turnImgCheck(this);" <?php if(in_array($id, $checked2)) echo 'checked="checked"'; ?> />
			<img <?php if(in_array($id, $checked2)) echo 'src="../images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_<?php echo $id; ?>" alt="" />
		</div>
		<?php
		}
	}
}