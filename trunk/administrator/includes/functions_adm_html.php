<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

/// ----- HEADER ADMIN -----  ///

function htm_admin_header()
{
	global $language_adm;
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title><?php echo $language_adm['lien_haut_title']; ?></title>

<link href="style/structure_adm.css" type="text/css" rel="stylesheet" />
<link href="style/style_adm.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="style/spectrum.css" />
<link href="style/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function autoCompOff(){
     var nodeList = document.getElementsByTagName("input");
     for(item in nodeList) {
  nodeList[item].setAttribute("autocomplete","off");
     };
}
window.onload = function(){
if((navigator.userAgent.toLowerCase().match('safari')) || 
(navigator.userAgent.toLowerCase().match('chrome'))){
         autoCompOff();
     }
};
</script>

</head>

<body>

<div id="haut_adm">

	<div id="haut_adm_left"><p class="p_txt_head_adm"><?php echo $language_adm['texte_haut']; ?></p></div>
	
	<div id="haut_adm_right">
		<?php 
		
			if(check_valid_all()) 
			{
				echo '<li class="li_head_adm"><a href="admin.php">'. $language_adm['lien_haut_index'] .'</a></li>
				<li class="li_head_adm"><a href="'. URL .'" onclick="window.open(this.href); return false;">'. $language_adm['lien_haut_vu'] .'</a>
				<li class="li_head_adm"><a href="logout.php">'. $language_adm['lien_haut_dec'] .'</a>';
			}
		
		?>
	</div>
	
</div>

<?php
}

/// ----- FORMULAIRE DE CONNEXION -----  ///

function display_password_form($e)
{
	global $language_adm;
	
?>

<div id="haut_con_adm">

	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_con_tit']; ?></li>
	</ul>

</div>

<form method="post" action="index.php">

<div id="fond_con_adm">

	<?php
	
		if(!empty($e) && $e == 1) echo '<div class="form_left_adm_con"></div><div class="form_right_input_adm_con"><p><span class="error">'. $language_adm['page_con_error'] .'</span></p></div>';
	
	?>

	<div class="form_left_adm_con"><?php echo $language_adm['page_con_log']; ?> : </div>
	<div class="form_right_adm_con"><input class="input_con" type="text" class="input_middle" name="user" value="" /></div>

	<div class="form_left_adm_con"><?php echo $language_adm['page_con_pas']; ?> : </div>
	<div class="form_right_adm_con"><input class="input_con" type="password" class="input_middle" name="pass" value="" /></div>
	
	<div class="form_left_adm_con"></div>
	<div class="form_right_adm_con"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>

	<div class="form_left_adm_con"></div>
	<div class="form_right_adm_con"><ul><li><a class="lien" href="pass_form.php" ><?php echo $language_adm['page_con_for_pass']; ?></a><li><ul></div>
	
</div>

</form>

<?php
}

/// ----- FORMULAIRE DE REINITIALISATION DU MOT DE PASSE -----  ///

function htm_forgot_password_center($e)
{
	global $language_adm;
	
?>

<div id="haut_con_adm">

	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_for_pass_tit']; ?></li>
	</ul>

</div>

<form method="post" action="pass_form.php">

<div id="fond_con_adm">

	<?php
	
		if(!empty($e) && $e == 1) echo '<div class="form_left_adm_con"></div><div class="form_right_input_adm_con"><p><span class="error">'. $language_adm['page_for_pass_error'] .'</span></p></div>';
	
	?>
	
	<div class="form_left_adm_con"><?php echo $language_adm['page_for_pass_log']; ?> :</div>
	<div class="form_right_adm_con"><input type="text" class="input_con" name="user" value="" /></div>
	
	<div class="form_left_adm_con"><?php echo $language_adm['page_for_pass_ema']; ?> :</div>
	<div class="form_right_adm_con"><input type="text" class="input_con" name="email" value="" /></div>
	
	<div class="form_left_adm_con"></div>
	<div class="form_right_adm_con"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
</div>

</form>

<?php
}

/// ----- PAGE DE RENVOI DU MOT DE PASSE REUSSI -----  ///

function display_pass_text($texte_info, $texte)
{
	
?>	

<div id="haut_con_adm">
	
	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $texte_info; ?></li>
	</ul>
	
</div>
	
<div id="fond_con_adm">
	<p class="p_note"><?php echo $texte; ?></p>
</div>
	

<?php
}

/// ----- FOOTER -----  ///

function htm_admin_footer()
{
	global $language_adm;
	
?>

<div id="bas_adm"></div>

<script type="text/javascript" src="js_adm/functions_js_adm.js"></script>
<script src="js_adm/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js_adm/bgrins/spectrum.js" type="text/javascript"></script>
<script src="js_adm/custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var color_title = "<?php echo $language_adm["color_title"]; ?>";
	var color_bg_menus = "<?php echo $language_adm["color_bg_menus"]; ?>";
	var color_txt_menus = "<?php echo $language_adm["color_txt_menus"]; ?>";
	var color_bg_smenus = "<?php echo $language_adm["color_bg_smenus"]; ?>";
	var color_txt_smenus = "<?php echo $language_adm["color_txt_smenus"]; ?>";
	var color_bg_header = "<?php echo $language_adm["color_bg_header"]; ?>";
	var color_txt_button = "<?php echo $language_adm["color_txt_button"]; ?>";
</script>
<script src="js_adm/ajax_admin.js" type="text/javascript"></script>

</body>
</html>

<?php
}

/// ----- PAGE INFO -----  ///

function display_text($texte_info, $texte)
{
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $texte_info; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		<p class="p_note"><?php echo $texte; ?></p>
	</div>

</div>

<?php
}

/// ----- MENUS DE GAUCHE -----  ///
	
function htm_menu()
{
	global $language_adm, $total_att, $total_val, $total_ref, $total_conf, $total_sau,
	$total_att_membre, $total_val_membre, $total_ref_membre, $total_conf_membre,
	$total_att_pro, $total_val_pro, $total_ref_pro, $total_conf_pro, $total_ach;
	
?>

<div id="corps_admin">

<div id="menu_left">

	<!-- MENU DES COMPTES ADMINISTRATEUR -->
	
	<?php if(check_super_admin()){ ?>
	
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 1){ ?>
		
		<div id="get_menu1">
		
			<div class="menus_haut"> 
				
				<div class="img_fl">
					<img onclick="Menu1(2, '<?php echo $language_adm['com_adm_info']; ?>', '<?php echo $language_adm['com_adm_n1']; ?>', '<?php echo $language_adm['com_adm_n2']; ?>', '<?php echo $language_adm['com_adm_n3']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
					
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['com_adm_info']; ?></li>
				</ul>
				
			</div>
			
			<div class="menus_fond">
			
				<ul class="ul_menu">
					<li><a href="compte_adm.php?c=1&amp;menu=1" ><?php echo $language_adm['com_adm_n1']; ?></a></li>
					<li><a href="compte_adm.php?c=2&amp;menu=1" ><?php echo $language_adm['com_adm_n2']; ?></a></li>
					<li><a href="compte_adm.php?c=3&amp;menu=1" ><?php echo $language_adm['com_adm_n3']; ?></a></li>
				</ul>
				
			</div>
			
		</div>
		
		<?php } else { ?>
	 
		<div id="get_menu1">
	 
			<div class="menus_haut">
			
				<div class="img_fl">
					<img onclick="Menu1(1, '<?php echo $language_adm['com_adm_info']; ?>', '<?php echo $language_adm['com_adm_n1']; ?>', '<?php echo $language_adm['com_adm_n2']; ?>', '<?php echo $language_adm['com_adm_n3']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['com_adm_info']; ?></li>
				</ul>
				
			</div>
		
		</div>
	 
	<?php }} ?>
	
	<!-- MENU TEMPLATE -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 25){ ?>
		
		<div id="get_menu25">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu25(2, '<?php echo $language_adm['temp_info']; ?>', '<?php echo $language_adm['temp_img']; ?>', '<?php echo $language_adm['temp_struct']; ?>', '<?php echo $language_adm['temp_style']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['temp_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="temp_img.php?menu=25"><?php echo $language_adm['temp_img']; ?></a></li>
					<li><a href="temp_style.php?menu=25&amp;type=1"><?php echo $language_adm['temp_struct']; ?></a></li>
					<li><a href="temp_style.php?menu=25&amp;type=2"><?php echo $language_adm['temp_style']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu25">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu25(1, '<?php echo $language_adm['temp_info']; ?>', '<?php echo $language_adm['temp_img']; ?>', '<?php echo $language_adm['temp_struct']; ?>', '<?php echo $language_adm['temp_style']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['temp_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU PARAMETRES GENERALES -->
	
	<?php if(check_super_admin()){ ?>
	  
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 2){ ?>
		
		<div id="get_menu2">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu2(2, '<?php echo $language_adm['param_gen']; ?>', '<?php echo $language_adm['param_gen_mod']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['param_gen']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="param_generaux.php?menu=2" ><?php echo $language_adm['param_gen_mod']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu2">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu2(1, '<?php echo $language_adm['param_gen']; ?>', '<?php echo $language_adm['param_gen_mod']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['param_gen']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU REGIONS ET DEPARTEMENTS -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 3){ ?>
		
		<div id="get_menu3">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu3(2, '<?php echo $language_adm['reg_adm_info']; ?>', '<?php echo $language_adm['reg_mod']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['reg_adm_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="regions.php?menu=3"><?php echo $language_adm['reg_mod']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu3">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu3(1, '<?php echo $language_adm['reg_adm_info']; ?>', '<?php echo $language_adm['reg_mod']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['reg_adm_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU CATEGORIES ET SOUS CATEGORIES -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 4){ ?>
		
		<div id="get_menu4">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu4(2, '<?php echo $language_adm['cat_adm_info']; ?>', '<?php echo $language_adm['cat_mod']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['cat_adm_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="categories.php?menu=4"><?php echo $language_adm['cat_mod']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu4">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu4(1, '<?php echo $language_adm['cat_adm_info']; ?>', '<?php echo $language_adm['cat_mod']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['cat_adm_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU OPTION DE SOUS-CATEGORIE -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 5){ ?>
		
		<div id="get_menu5">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu5(2, '<?php echo $language_adm['cat_opts_adm_info']; ?>', '<?php echo $language_adm['cat_opt_comment']; ?>', '<?php echo $language_adm['cat_opt_dis']; ?>', '<?php echo $language_adm['cat_opts_link1']; ?>', '<?php echo $language_adm['cat_opts_link2']; ?>', '<?php echo $language_adm['cat_opt']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['cat_opts_adm_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="options_cat_note.php?menu=5"><?php echo $language_adm['cat_opt_comment']; ?></a></li>
					<li><a href="options_cat_disc.php?menu=5"><?php echo $language_adm['cat_opt_dis']; ?></a></li>
					<li><a href="option_liste.php?l=1&amp;menu=5"><?php echo $language_adm['cat_opts_link1']; ?></a></li>
					<li><a href="option_liste.php?l=2&amp;menu=5"><?php echo $language_adm['cat_opts_link2']; ?></a></li>
					<li><a href="options_cat.php?menu=5"><?php echo $language_adm['cat_opt']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu5">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu5(1, '<?php echo $language_adm['cat_opts_adm_info']; ?>', '<?php echo $language_adm['cat_opt_comment']; ?>', '<?php echo $language_adm['cat_opt_dis']; ?>', '<?php echo $language_adm['cat_opts_link1']; ?>', '<?php echo $language_adm['cat_opts_link2']; ?>', '<?php echo $language_adm['cat_opt']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['cat_opts_adm_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU CHAMPS FORMULAIRE -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 26){ ?>
		
		<div id="get_menu26">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu26(2, '<?php echo $language_adm['champ_form_info']; ?>', '<?php echo $language_adm['champ_form_act']; ?>', '<?php echo $language_adm['champ_form_edit']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['champ_form_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="champs_act.php?menu=26"><?php echo $language_adm['champ_form_act']; ?></a></li>
					<li><a href="champs.php?menu=26"><?php echo $language_adm['champ_form_edit']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu26">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu26(1, '<?php echo $language_adm['champ_form_info']; ?>', '<?php echo $language_adm['champ_form_act']; ?>', '<?php echo $language_adm['champ_form_edit']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['champ_form_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DES ANNONCES -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 6){ ?>
		
		<div id="get_menu6">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu6(2, '<?php echo $language_adm['mod_ann_info']; ?>', '<?php echo $language_adm['mod_ann_att'] . ' ('. $total_att .')'; ?>', '<?php echo $language_adm['mod_ann_val'] . ' ('. $total_val .')'; ?>', '<?php echo $language_adm['mod_ann_exp_sup']; ?>', '<?php echo $language_adm['mod_ann_ref'] . ' ('. $total_ref .')'; ?>', '<?php echo $language_adm['mod_ann_ref_sup']; ?>', '<?php echo $language_adm['mod_ann_conf'] . ' ('. $total_conf .')'; ?>', '<?php echo $language_adm['mod_ann_conf_sup']; ?>', '<?php echo $language_adm['mod_ann_sau'] . ' ('. $total_sau .')'; ?>', '<?php echo $language_adm['mod_ann_exp_ret']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ann_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="ann_gest_att.php?menu=6"><?php echo $language_adm['mod_ann_att'] . ' ('. $total_att .')'; ?></a></li>
					<li><a href="ann_gest_val.php?menu=6"><?php echo $language_adm['mod_ann_val'] . ' ('. $total_val .')'; ?></a></li>
					<li><a href="ann_gest_ref.php?menu=6"><?php echo $language_adm['mod_ann_ref'] . ' ('. $total_ref .')'; ?></a></li>
					<li><a href="ann_gest_conf.php?menu=6"><?php echo $language_adm['mod_ann_conf'] . ' ('. $total_conf .')'; ?></a></li>
					<li><a href="ann_gest_del.php?menu=6"><?php echo $language_adm['mod_ann_sau'] . ' ('. $total_sau .')'; ?></a></li>
					<li><a href="ann_exp_ret.php?menu=6"><?php echo $language_adm['mod_ann_exp_ret']; ?></a></li>
					<li><a href="ann_sup_ref.php?menu=6"><?php echo $language_adm['mod_ann_ref_sup']; ?></a></li>
					<li><a href="ann_sup_conf.php?menu=6"><?php echo $language_adm['mod_ann_conf_sup']; ?></a></li>
					<li><a href="ann_sup_exp.php?menu=6"><?php echo $language_adm['mod_ann_exp_sup']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu6">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu6(1, '<?php echo $language_adm['mod_ann_info']; ?>', '<?php echo $language_adm['mod_ann_att'] . ' ('. $total_att .')'; ?>', '<?php echo $language_adm['mod_ann_val'] . ' ('. $total_val .')'; ?>', '<?php echo $language_adm['mod_ann_exp_sup']; ?>', '<?php echo $language_adm['mod_ann_ref'] . ' ('. $total_ref .')'; ?>', '<?php echo $language_adm['mod_ann_ref_sup']; ?>', '<?php echo $language_adm['mod_ann_conf'] . ' ('. $total_conf .')'; ?>', '<?php echo $language_adm['mod_ann_conf_sup']; ?>', '<?php echo $language_adm['mod_ann_sau'] . ' ('. $total_sau .')'; ?>', '<?php echo $language_adm['mod_ann_exp_ret']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ann_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DES COMPTES -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 7){ ?>
		
		<div id="get_menu7">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu7(2, '<?php echo $language_adm['comptes_info']; ?>', '<?php echo $language_adm['comptes_att_membre'] . ' ('. $total_att_membre .')'; ?>', '<?php echo $language_adm['comptes_val_membre'] . ' ('. $total_val_membre .')'; ?>', '<?php echo $language_adm['comptes_ref_membre'] . ' ('. $total_ref_membre .')' ; ?>' , '<?php echo $language_adm['comptes_conf_membre'] . ' ('. $total_conf_membre .')' ; ?>', '<?php echo $language_adm['comptes_att_pro'] . ' ('. $total_att_pro .')'; ?>', '<?php echo $language_adm['comptes_val_pro'] . ' ('. $total_val_pro .')'; ?>', '<?php echo $language_adm['comptes_ref_pro'] . ' ('. $total_ref_pro .')'; ?>', '<?php echo $language_adm['comptes_conf_pro'] . ' ('. $total_conf_pro .')'; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['comptes_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="acc_gest_att.php?menu=7&amp;type=1"><?php echo $language_adm['comptes_att_membre'] . ' ('. $total_att_membre .')'; ?></a></li>
					<li><a href="acc_gest_val.php?menu=7&amp;type=1"><?php echo $language_adm['comptes_val_membre'] . ' ('. $total_val_membre .')'; ?></a></li>
					<li><a href="acc_gest_ref.php?menu=7&amp;type=1"><?php echo $language_adm['comptes_ref_membre'] . ' ('. $total_ref_membre .')' ; ?></a></li>
					<li><a href="acc_gest_conf.php?menu=7&amp;type=1"><?php echo $language_adm['comptes_conf_membre'] . ' ('. $total_conf_membre .')' ; ?></a></li>
					<li><a href="acc_gest_att.php?menu=7&amp;type=2"><?php echo $language_adm['comptes_att_pro'] . ' ('. $total_att_pro .')'; ?></a></li>
					<li><a href="acc_gest_val.php?menu=7&amp;type=2"><?php echo $language_adm['comptes_val_pro'] . ' ('. $total_val_pro .')'; ?></a></li>
					<li><a href="acc_gest_ref.php?menu=7&amp;type=2"><?php echo $language_adm['comptes_ref_pro'] . ' ('. $total_ref_pro .')'; ?></a></li>
					<li><a href="acc_gest_conf.php?menu=7&amp;type=2"><?php echo $language_adm['comptes_conf_pro'] . ' ('. $total_conf_pro .')'; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu7">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu7(1, '<?php echo $language_adm['comptes_info']; ?>', '<?php echo $language_adm['comptes_att_membre'] . ' ('. $total_att_membre .')'; ?>', '<?php echo $language_adm['comptes_val_membre'] . ' ('. $total_val_membre .')'; ?>', '<?php echo $language_adm['comptes_ref_membre'] . ' ('. $total_ref_membre .')' ; ?>', '<?php echo $language_adm['comptes_conf_membre'] . ' ('. $total_conf_membre .')' ; ?>', '<?php echo $language_adm['comptes_att_pro'] . ' ('. $total_att_pro .')'; ?>', '<?php echo $language_adm['comptes_val_pro'] . ' ('. $total_val_pro .')'; ?>', '<?php echo $language_adm['comptes_ref_pro'] . ' ('. $total_ref_pro .')'; ?>', '<?php echo $language_adm['comptes_conf_pro'] . ' ('. $total_conf_pro .')'; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['comptes_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DES VITRINES -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 27){ ?>
		
		<div id="get_menu27">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu27(2, '<?php echo $language_adm['vitrines_info']; ?>', '<?php echo $language_adm['vitrines_act']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['vitrines_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="vit_gest.php?menu=27"><?php echo $language_adm['vitrines_act']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu27">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu27(1, '<?php echo $language_adm['vitrines_info']; ?>', '<?php echo $language_adm['vitrines_act']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['vitrines_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DES ACHATS EN ATTENTE -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 30){ ?>
		
		<div id="get_menu30">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu30(2, '<?php echo $language_adm['achat_info']; ?>', '<?php echo $language_adm['achat_att'] .' ('. $total_ach .')'; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['achat_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="achat_att.php?menu=30"><?php echo $language_adm['achat_att'] .' ('. $total_ach .')'; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu30">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu30(1, '<?php echo $language_adm['achat_info']; ?>', '<?php echo $language_adm['achat_att'] .' ('. $total_ach .')'; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['achat_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DE LA BLACKLIST -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 8){ ?>
		
		<div id="get_menu8">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu8(2, '<?php echo $language_adm['mod_blacklist_info']; ?>', '<?php echo $language_adm['mod_blacklist_ret']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_blacklist_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="blacklist.php?menu=8"><?php echo $language_adm['mod_blacklist_ret']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu8">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu8(1, '<?php echo $language_adm['mod_blacklist_info']; ?>', '<?php echo $language_adm['mod_blacklist_ret']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_blacklist_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DU FILTRAGE MAIL -->
	
	<?php if(check_valid_all()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 29){ ?>
		
		<div id="get_menu29">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu29(2, '<?php echo $language_adm['mod_filtre_mail_info']; ?>', '<?php echo $language_adm['mod_filtre_mail_link']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_filtre_mail_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="filtre_mail.php?menu=29"><?php echo $language_adm['mod_filtre_mail_link']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu29">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu29(1, '<?php echo $language_adm['mod_filtre_mail_info']; ?>', '<?php echo $language_adm['mod_filtre_mail_link']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_filtre_mail_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DES MODULES DE PAIEMENT -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 9){ ?>
		
		<div id="get_menu9">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu9(2, '<?php echo $language_adm['mod_pay_info']; ?>', '<?php echo $language_adm['mod_pay_paypal']; ?>', '<?php echo $language_adm['mod_pay_allopass']; ?>', '<?php echo $language_adm['mod_pay_atos']; ?>', '<?php echo $language_adm['mod_pay_cheque']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pay_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="pay_pa.php?menu=9"><?php echo $language_adm['mod_pay_paypal']; ?></a></li>
					<li><a href="pay_allopass.php?menu=9"><?php echo $language_adm['mod_pay_allopass']; ?></a></li>
					<li><a href="pay_atos.php?menu=9"><?php echo $language_adm['mod_pay_atos']; ?></a></li>
					<li><a href="pay_cheque.php?menu=9"><?php echo $language_adm['mod_pay_cheque']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu9">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu9(1, '<?php echo $language_adm['mod_pay_info']; ?>', '<?php echo $language_adm['mod_pay_paypal']; ?>', '<?php echo $language_adm['mod_pay_allopass']; ?>', '<?php echo $language_adm['mod_pay_atos']; ?>', '<?php echo $language_adm['mod_pay_cheque']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pay_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DU PAIEMENT DES ANNONCES -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 10){ ?>
		
		<div id="get_menu10">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu10(2, '<?php echo $language_adm['mod_pay_ann']; ?>', '<?php echo $language_adm['mod_pay_ann_edit']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pay_ann']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="pay_ann.php?menu=10"><?php echo $language_adm['mod_pay_ann_edit']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu10">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu10(1, '<?php echo $language_adm['mod_pay_ann']; ?>', '<?php echo $language_adm['mod_pay_ann_edit']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pay_ann']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DES OTPIONS VISUELLES -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 11){ ?>
		
		<div id="get_menu11">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu11(2, '<?php echo $language_adm['opt_visu_info']; ?>', '<?php echo $language_adm['opt_visu_tete']; ?>', '<?php echo $language_adm['opt_visu_une']; ?>', '<?php echo $language_adm['opt_visu_urg']; ?>', '<?php echo $language_adm['opt_visu_enc']; ?>', '<?php echo $language_adm['opt_visu_tete_v']; ?>', '<?php echo $language_adm['opt_visu_une_v']; ?>', '<?php echo $language_adm['opt_visu_enc_v']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_visu_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="visu_opt.php?num=1&amp;menu=11"><?php echo $language_adm['opt_visu_tete']; ?></a></li>
					<li><a href="visu_opt.php?num=2&amp;menu=11"><?php echo $language_adm['opt_visu_une']; ?></a></li>
					<li><a href="visu_opt.php?num=3&amp;menu=11"><?php echo $language_adm['opt_visu_urg']; ?></a></li>
					<li><a href="visu_opt.php?num=4&amp;menu=11"><?php echo $language_adm['opt_visu_enc']; ?></a></li>
					<li><a href="visu_opt.php?num=5&amp;menu=11"><?php echo $language_adm['opt_visu_tete_v']; ?></a></li>
					<li><a href="visu_opt.php?num=6&amp;menu=11"><?php echo $language_adm['opt_visu_une_v']; ?></a></li>
					<li><a href="visu_opt.php?num=7&amp;menu=11"><?php echo $language_adm['opt_visu_enc_v']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu11">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu11(1, '<?php echo $language_adm['opt_visu_info']; ?>', '<?php echo $language_adm['opt_visu_tete']; ?>', '<?php echo $language_adm['opt_visu_une']; ?>', '<?php echo $language_adm['opt_visu_urg']; ?>', '<?php echo $language_adm['opt_visu_enc']; ?>', '<?php echo $language_adm['opt_visu_tete_v']; ?>', '<?php echo $language_adm['opt_visu_une_v']; ?>', '<?php echo $language_adm['opt_visu_enc_v']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_visu_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DE L'OPTION PHOTOS -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 12){ ?>
		
		<div id="get_menu12">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu12(2, '<?php echo $language_adm['opt_photo_info']; ?>', '<?php echo addslashes($language_adm['opt_photo']); ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_photo_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="photo_opt.php?menu=12"><?php echo $language_adm['opt_photo']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu12">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu12(1, '<?php echo $language_adm['opt_photo_info']; ?>', '<?php echo addslashes($language_adm['opt_photo']); ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_photo_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DE L'OPTION VIDEO -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 13){ ?>
		
		<div id="get_menu13">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu13(2, '<?php echo $language_adm['opt_video_info']; ?>', '<?php echo $language_adm['opt_video']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_video_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="video_opt.php?menu=13"><?php echo $language_adm['opt_video']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu13">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu13(1, '<?php echo $language_adm['opt_video_info']; ?>', '<?php echo $language_adm['opt_video']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['opt_video_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU PACKS COMPTES -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 14){ ?>
		
		<div id="get_menu14">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu14(2, '<?php echo $language_adm['abo_comptes_info']; ?>', '<?php echo $language_adm['abo_compte_par']; ?>', '<?php echo $language_adm['abo_compte_pro']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['abo_comptes_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="packs_comptes.php?num=1&amp;menu=14"><?php echo $language_adm['abo_compte_par']; ?></a></li>
					<li><a href="packs_comptes.php?num=2&amp;menu=14"><?php echo $language_adm['abo_compte_pro']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu14">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu14(1, '<?php echo $language_adm['abo_comptes_info']; ?>', '<?php echo $language_adm['abo_compte_par']; ?>', '<?php echo $language_adm['abo_compte_pro']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['abo_comptes_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU ABONNEMENTS VITRINE -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 15){ ?>
		
		<div id="get_menu15">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu15(2, '<?php echo $language_adm['abo_bout_info']; ?>', '<?php echo $language_adm['abo_bout_edit']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['abo_bout_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="packs_vitrine.php?menu=15"><?php echo $language_adm['abo_bout_edit']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu15">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu15(1, '<?php echo $language_adm['abo_bout_info']; ?>', '<?php echo $language_adm['abo_bout_edit']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['abo_bout_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU CODE DE REDUCTION -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 28){ ?>
		
		<div id="get_menu28">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu28(2, '<?php echo $language_adm['code_reduc']; ?>', '<?php echo $language_adm['link_code_reduc']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['code_reduc']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="reduc.php?menu=28"><?php echo $language_adm['link_code_reduc']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu28">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu28(1, '<?php echo $language_adm['code_reduc']; ?>', '<?php echo $language_adm['link_code_reduc']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['code_reduc']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU GESTION DES FACTURES -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 16){ ?>
		
		<div id="get_menu16">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu16(2, '<?php echo $language_adm['gest_fact_info']; ?>', '<?php echo $language_adm['gest_fact_gest']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['gest_fact_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="factures.php?menu=16"><?php echo $language_adm['gest_fact_gest']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu16">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu16(1, '<?php echo $language_adm['gest_fact_info']; ?>', '<?php echo $language_adm['gest_fact_gest']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['gest_fact_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU MISE A JOUR -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 17){ ?>
		
		<div id="get_menu17">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu17(2, '<?php echo $language_adm['gest_cache_info']; ?>', '<?php echo $language_adm['gest_cache_nb_ann']; ?>', '<?php echo $language_adm['gest_cache_opt_ann']; ?>', '<?php echo $language_adm['gest_cache_opt_vitrine']; ?>', '<?php echo $language_adm['gest_cache_packs']; ?>', '<?php echo $language_adm['gest_cache_abo']; ?>', '<?php echo $language_adm['gest_cache_relance']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['gest_cache_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="up_nombre_ann.php?menu=17"><?php echo $language_adm['gest_cache_nb_ann']; ?></a></li>
					<li><a href="opt_visu_ann_exp.php?menu=17"><?php echo $language_adm['gest_cache_opt_ann']; ?></a></li>
					<li><a href="opt_visu_vit_exp.php?menu=17"><?php echo $language_adm['gest_cache_opt_vitrine']; ?></a></li>
					<li><a href="opt_pack_acc.php?menu=17"><?php echo $language_adm['gest_cache_packs']; ?></a></li>
					<li><a href="opt_pack_vit.php?menu=17"><?php echo $language_adm['gest_cache_abo']; ?></a></li>
					<li><a href="opt_relance.php?menu=17"><?php echo $language_adm['gest_cache_relance']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu17">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu17(1, '<?php echo $language_adm['gest_cache_info']; ?>', '<?php echo $language_adm['gest_cache_nb_ann']; ?>', '<?php echo $language_adm['gest_cache_opt_ann']; ?>', '<?php echo $language_adm['gest_cache_opt_vitrine']; ?>', '<?php echo $language_adm['gest_cache_packs']; ?>', '<?php echo $language_adm['gest_cache_abo']; ?>', '<?php echo $language_adm['gest_cache_relance']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['gest_cache_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU NEWSLETTER -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 31){ ?>
		
		<div id="get_menu31">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu31(2, '<?php echo $language_adm['mod_newsletter']; ?>', '<?php echo $language_adm['mod_newsletter_link1']; ?>', '<?php echo $language_adm['mod_newsletter_link2']; ?>', '<?php echo $language_adm['mod_newsletter_link3']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_newsletter']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="newsletter.php?type=1&amp;menu=31"><?php echo $language_adm['mod_newsletter_link1']; ?></a></li>
					<li><a href="newsletter.php?type=2&amp;menu=31"><?php echo $language_adm['mod_newsletter_link2']; ?></a></li>
					<li><a href="newsletter.php?type=3&amp;menu=31"><?php echo $language_adm['mod_newsletter_link3']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu31">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu31(1, '<?php echo $language_adm['mod_newsletter']; ?>', '<?php echo $language_adm['mod_newsletter_link1']; ?>', '<?php echo $language_adm['mod_newsletter_link2']; ?>', '<?php echo $language_adm['mod_newsletter_link3']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_newsletter']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DE LA PASSERELLE XML -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 18){ ?>
		
		<div id="get_menu18">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu18(2, '<?php echo $language_adm['pass_xml_info']; ?>', '<?php echo $language_adm['pass_xml_imp']; ?>', '<?php echo $language_adm['pass_xml_exp']; ?>', '<?php echo $language_adm['pass_xml_mod']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['pass_xml_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="xml_import.php?menu=18"><?php echo $language_adm['pass_xml_imp']; ?></a></li>
					<li><a href="xml_export.php?menu=18"><?php echo $language_adm['pass_xml_exp']; ?></a></li>
					<li><a href="xml_modele.php?menu=18"><?php echo $language_adm['pass_xml_mod']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu18">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu18(1, '<?php echo $language_adm['pass_xml_info']; ?>', '<?php echo $language_adm['pass_xml_imp']; ?>', '<?php echo $language_adm['pass_xml_exp']; ?>', '<?php echo $language_adm['pass_xml_mod']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['pass_xml_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU D'EDITION DES MAILS AUTOMATIQUES -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 19){ ?>
		
		<div id="get_menu19">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu19(2, '<?php echo $language_adm['mod_ema_auto_info']; ?>', '<?php echo $language_adm['mod_ema_auto_con1']; ?>', '<?php echo $language_adm['mod_ema_auto_con2']; ?>', '<?php echo $language_adm['mod_ema_auto_con3']; ?>', '<?php echo $language_adm['mod_ema_auto_con4']; ?>', '<?php echo $language_adm['mod_ema_auto_con5']; ?>', '<?php echo $language_adm['mod_ema_auto_con6']; ?>', '<?php echo $language_adm['mod_ema_auto_con7']; ?>', '<?php echo $language_adm['mod_ema_auto_con8']; ?>', '<?php echo $language_adm['mod_ema_auto_con9']; ?>', '<?php echo $language_adm['mod_ema_auto_con10']; ?>', '<?php echo $language_adm['mod_ema_auto_con11']; ?>', '<?php echo $language_adm['mod_ema_auto_con12']; ?>', '<?php echo $language_adm['mod_ema_auto_con13']; ?>', '<?php echo $language_adm['mod_ema_auto_con14']; ?>', '<?php echo $language_adm['mod_ema_auto_con15']; ?>', '<?php echo $language_adm['mod_ema_auto_con16']; ?>', '<?php echo $language_adm['mod_ema_auto_con17']; ?>', '<?php echo $language_adm['mod_ema_auto_con18']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ema_auto_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="mail_auto.php?l=1&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con1']; ?></a></li>
					<li><a href="mail_auto.php?l=2&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con2']; ?></a></li>
					<li><a href="mail_auto.php?l=3&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con3']; ?></a></li>
					<li><a href="mail_auto.php?l=4&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con4']; ?></a></li>
					<li><a href="mail_auto.php?l=5&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con5']; ?></a></li>
					<li><a href="mail_auto.php?l=6&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con6']; ?></a></li>
					<li><a href="mail_auto.php?l=7&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con7']; ?></a></li>
					<li><a href="mail_auto.php?l=8&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con8']; ?></a></li>
					<li><a href="mail_auto.php?l=9&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con9']; ?></a></li>
					<li><a href="mail_auto.php?l=10&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con10']; ?></a></li>
					<li><a href="mail_auto.php?l=11&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con11']; ?></a></li>
					<li><a href="mail_auto.php?l=12&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con12']; ?></a></li>
					<li><a href="mail_auto.php?l=13&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con13']; ?></a></li>
					<li><a href="mail_auto.php?l=14&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con14']; ?></a></li>
					<li><a href="mail_auto.php?l=15&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con15']; ?></a></li>
					<li><a href="mail_auto.php?l=16&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con16']; ?></a></li>
					<li><a href="mail_auto.php?l=17&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con17']; ?></a></li>
					<li><a href="mail_auto.php?l=18&amp;menu=19"><?php echo $language_adm['mod_ema_auto_con18']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu19">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu19(1, '<?php echo $language_adm['mod_ema_auto_info']; ?>', '<?php echo $language_adm['mod_ema_auto_con1']; ?>', '<?php echo $language_adm['mod_ema_auto_con2']; ?>', '<?php echo $language_adm['mod_ema_auto_con3']; ?>', '<?php echo $language_adm['mod_ema_auto_con4']; ?>', '<?php echo $language_adm['mod_ema_auto_con5']; ?>', '<?php echo $language_adm['mod_ema_auto_con6']; ?>', '<?php echo $language_adm['mod_ema_auto_con7']; ?>', '<?php echo $language_adm['mod_ema_auto_con8']; ?>', '<?php echo $language_adm['mod_ema_auto_con9']; ?>', '<?php echo $language_adm['mod_ema_auto_con10']; ?>', '<?php echo $language_adm['mod_ema_auto_con11']; ?>', '<?php echo $language_adm['mod_ema_auto_con12']; ?>', '<?php echo $language_adm['mod_ema_auto_con13']; ?>', '<?php echo $language_adm['mod_ema_auto_con14']; ?>', '<?php echo $language_adm['mod_ema_auto_con15']; ?>', '<?php echo $language_adm['mod_ema_auto_con16']; ?>', '<?php echo $language_adm['mod_ema_auto_con17']; ?>', '<?php echo $language_adm['mod_ema_auto_con18']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ema_auto_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU D'EDITION DES CONTACTS -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 20){ ?>
		
		<div id="get_menu20">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu20(2, '<?php echo $language_adm['mod_ema_cont_info']; ?>', '<?php echo $language_adm['mod_ema_cont_ges']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ema_cont_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="mails_contact.php?menu=20"><?php echo $language_adm['mod_ema_cont_ges']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu20">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu20(1, '<?php echo $language_adm['mod_ema_cont_info']; ?>', '<?php echo $language_adm['mod_ema_cont_ges']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_ema_cont_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU D'EDITION DES PAGES -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 21){ ?>
		
		<div id="get_menu21">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu21(2, '<?php echo $language_adm['mod_page_info']; ?>', '<?php echo $language_adm['mod_page_edit']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_page_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="pages.php?menu=21"><?php echo $language_adm['mod_page_edit']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu21">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu21(1, '<?php echo $language_adm['mod_page_info']; ?>', '<?php echo $language_adm['mod_page_edit']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_page_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DES PUBLICITES -->
	
	<?php if(check_super_admin() || check_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 22){ ?>
		
		<div id="get_menu22">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu22(2, '<?php echo $language_adm['mod_pub_info']; ?>', '<?php echo $language_adm['mod_pub_fond']; ?>', '<?php echo $language_adm['mod_pub_header']; ?>', '<?php echo $language_adm['mod_pub_listing']; ?>', '<?php echo $language_adm['mod_pub_annonces']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pub_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="pub_fond.php?menu=22"><?php echo $language_adm['mod_pub_fond']; ?></a></li>
					<li><a href="pub_header.php?menu=22"><?php echo $language_adm['mod_pub_header']; ?></a></li>
					<li><a href="pub.php?p=2&amp;menu=22"><?php echo $language_adm['mod_pub_listing']; ?></a></li>
					<li><a href="pub.php?p=3&amp;menu=22"><?php echo $language_adm['mod_pub_annonces']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu22">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu22(1, '<?php echo $language_adm['mod_pub_info']; ?>', '<?php echo $language_adm['mod_pub_fond']; ?>', '<?php echo $language_adm['mod_pub_header']; ?>', '<?php echo $language_adm['mod_pub_listing']; ?>', '<?php echo $language_adm['mod_pub_annonces']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['mod_pub_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DE MISE EN MAINTENANCE -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 23){ ?>
		
		<div id="get_menu23">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu23(2, '<?php echo $language_adm['maint_info']; ?>', '<?php echo $language_adm['maint_edit']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['maint_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="maintenance.php?menu=23"><?php echo $language_adm['maint_edit']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu23">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu23(1, '<?php echo $language_adm['maint_info']; ?>', '<?php echo $language_adm['maint_edit']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['maint_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
	<!-- MENU DE SAUVEGARDE -->
	
	<?php if(check_super_admin()){ ?>
	 
		<?php if(isset($_GET['menu']) && $_GET['menu'] == 24){ ?>
		
		<div id="get_menu24">
	      
			<div class="menus_haut">
			 
				<div class="img_fl">
					<img onclick="Menu24(2, '<?php echo $language_adm['sauv_info']; ?>', '<?php echo $language_adm['sauv_exp']; ?>')" style="cursor:pointer" src="images/fl_haut.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['sauv_info']; ?></li>
				</ul>
			 
			</div>
		
			<div class="menus_fond">
			 
				<ul class="ul_menu">
					<li><a href="sauvegarde.php?menu=24"><?php echo $language_adm['sauv_exp']; ?></a></li>
				</ul>
			 
			</div>
		
		</div>
	 
	<?php } else { ?>
	 
		<div id="get_menu24">
	     
			<div class="menus_haut">
			   
				<div class="img_fl">
					<img onclick="Menu24(1, '<?php echo $language_adm['sauv_info']; ?>', '<?php echo $language_adm['sauv_exp']; ?>')" style="cursor:pointer" src="images/fl_bas.png" alt="" />
				</div>
				
				<ul class="ul_barre_adm">
					<li class="li_barre_adm"><?php echo $language_adm['sauv_info']; ?></li>
				</ul>
				
			</div>
		 
		</div>
	 
	<?php }} ?>
	
</div>

<?php
}

/// ----- PADS ACCUEIL -----  ///

function display_home_pads()
{
	global $language_adm, $total_att, $total_val, $total_ref, $total_conf, $total_att_membre, $total_val_membre, $total_att_pro, $total_val_pro, $total_ach;
	
	$pads = '';
	
	$pads .= '
	<span class="pads_wrap">
		
		<a href="ann_gest_att.php?menu=6">
			<span class="pads">			
				<span>'. $total_att .'</span><br />'. $language_adm["mod_ann_att"] .'			
			</span>
		</a>
		<a href="ann_gest_val.php?menu=6">
			<span class="pads">				
				<span>'. $total_val .'</span><br />'. $language_adm["mod_ann_val"] .'				
			</span>
		</a>
		<a href="ann_gest_ref.php?menu=6">
			<span class="pads">			
				<span>'. $total_ref .'</span><br />'. $language_adm["mod_ann_ref"] .'			
			</span>
		</a>
		<a href="ann_gest_conf.php?menu=6">
			<span class="pads">				
				<span>'. $total_conf .'</span><br />'. $language_adm["mod_ann_conf"] .'				
			</span>
		</a>
		<a href="acc_gest_att.php?menu=7&type=1">
			<span class="pads">			
				<span>'.$total_att_membre.'</span><br />'.$language_adm["comptes_att_membre"].'			
			</span>
		</a>
		<a href="acc_gest_att.php?menu=7&type=2">
			<span class="pads">			
				<span>'.$total_att_pro.'</span><br />'.$language_adm["comptes_att_pro"].'		
			</span>
		</a>
		<a href="acc_gest_val.php?menu=7&type=1">
			<span class="pads">			
				<span>'.$total_val_membre.'</span><br />'.$language_adm["comptes_val_membre"].'			
			</span>
		</a>
		<a href="acc_gest_val.php?menu=7&type=2">
			<span class="pads">			
				<span>'.$total_val_pro.'</span><br />'.$language_adm["comptes_val_pro"].'			
			</span>
		</a>
		<a href="achat_att.php?menu=30">
			<span class="pads">			
				<span>'.$total_ach.'</span><br />'.$language_adm["achat_att"].'			
			</span>
		</a>
	</span>';
	
	return $pads;
}

/// ----- PAGE DU LISTING DES COMPTES ADMINISTRATEUR -----  ///

function htm_admin_compte_center($comptes, $c)
{
	global $language_adm;
	
	$num = count($comptes);

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_compte_adm_info'] .' '. $c; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_center">
			<a href="compte_crea.php?c=<?php echo $c; ?>&amp;menu=1"><?php echo $language_adm['page_compte_adm_crea_lien'] .' '. $c; ?></a>
		</p>
		
		<?php
	        
			if($num != 0) echo '<ul class="ul_center">';
			
			for($i = 0; $i < $num; $i++)
			{
				$id = (int) $comptes[$i]['id_adm'];
				$name = stripslashes(htmlspecialchars($comptes[$i]['login'], ENT_QUOTES));
				
				echo '<li class="li_center">'. ($i + 1) .' - '. $name .' &nbsp;<a class="lien_g" href="compte_mod.php?id='. $id .'&amp;c='. $c .'&amp;menu=1">'. $language_adm['page_compte_adm_mod_lien'] .'</a>';
				
				if($id != 1) 
				echo ' / <a class="lien_sup" href="compte_sup.php?id='. $id .'&amp;c='. $c .'&amp;menu=1" OnClick=" return confirm(\''. $language_adm['page_compte_adm_supp'] .'\');">'. $language_adm['page_compte_adm_supp_lien'] .'</a>';
				
				echo '</li>';
			}
			
			if($num != 0) echo '</ul>';
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION DE COMPTES ADMINISTRATEUR -----  ///
	
function htm_creer_compte_center($c, $e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_crea_compte_adm_info'] .' '. $c; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="compte_crea.php?c=<?php echo $c; ?>&amp;menu=1">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error7'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error8'] .'</span></p></div>';
		if(!empty($e) && $e == 9) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error9'] .'</span></p></div>';
		if(!empty($e) && $e == 10) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_crea_compte_adm_error10'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_crea_compte_adm_log']; ?> :</div>
		<div class="form_right"><input type="hidden" name="c" value="<?php echo $c; ?>" /><input class="input_con" type="text" name="login" value="<?php if(isset($_POST['login'])) echo $_POST['login']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_crea_compte_adm_pas1']; ?> :</div>
		<div class="form_right"><input type="password" class="input_con" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></div>
     
		<div class="form_left"><?php echo $language_adm['page_crea_compte_adm_pas2']; ?> :</div>
		<div class="form_right"><input type="password" class="input_con" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></div>
        
		<div class="form_left"><?php echo $language_adm['page_crea_compte_adm_ema1']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']; ?>" /></div>
	 
		<div class="form_left"><?php echo $language_adm['page_crea_compte_adm_ema2']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email2" value="<?php if(isset($_POST['email2'])) echo $_POST['email2']; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}
	
/// ----- PAGE DE MODIFICATION DES COMPTES ADMINISTRATEUR -----  ///
	
function htm_modifier_center($infos, $id, $e)
{
	global $language_adm;
	
	$user = stripslashes(htmlspecialchars($infos[0], ENT_QUOTES));
	$email = stripslashes(htmlspecialchars($infos[1], ENT_QUOTES));
	$id = (int) $id;

?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_compte_adm_info'] .' '. $user; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="compte_mod.php?id=<?php echo $id; ?>&amp;menu=1">
	
	<div class="menus_r_fond">
	
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error7'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error8'] .'</span></p></div>';
		if(!empty($e) && $e == 9) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error9'] .'</span></p></div>';
		if(!empty($e) && $e == 10) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error10'] .'</span></p></div>';
		if(!empty($e) && $e == 11) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_compte_adm_error11'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_anc_pass']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="text" class="input_con" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_log']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user']; else echo $user; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_pas1']; ?> :</div>
		<div class="form_right"><input type="password" class="input_con" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_pas2']; ?> :</div>
		<div class="form_right"><input type="password" class="input_con" name="pass3" value="<?php if(isset($_POST['pass3'])) echo $_POST['pass3']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_ema1']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']; else echo $email; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_compte_adm_ema2']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email2" value="<?php if(isset($_POST['email2'])) echo $_POST['email2']; else echo $email; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div> 
		
	</div>
	
	</form>

</div>

<?php 
}

/// ----- PAGE DE MODIFICATION DES IMAGES -----  ///

function htm_temp_img($e)
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_img_adm_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error1'] .'</span></p></div>';
			if(!empty($e) && $e == 2) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error2'] .'</span></p></div>';
			if(!empty($e) && $e == 3) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_img_adm_error'] .'</span></p></div>';

		?>
		
		<div class="form_left_2"></div>
		<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_img']; ?></div>
	 
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=1">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/logo.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_1']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_1']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=2">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/watermark.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_2']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_2']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=64">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/top_header.png" width="10" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_64']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_64']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=3">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/barre_liens.png" width="300" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_3']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_3']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=4">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_depot.png" width="160" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_4']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_4']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=5">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_envoye.png" width="120" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_5']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_5']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=6">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_majeur.png" width="143" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_6']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_6']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=7">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_mod_annonce.png" width="143" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_7']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_7']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=8">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_modifier.png" width="120" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_8']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_8']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=9">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_parcourir.png" width="84" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_9']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_9']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=10">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_search.png" width="175" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_10']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_10']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=11">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_sent_annonce.png" width="143" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_11']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_11']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=12">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bouton_valider.png" width="120" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_12']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_12']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=13">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/top_menu_search.png" width="208" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_13']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_13']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=14">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/middle_menu_search.png" width="208" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_14']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_14']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=15">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bottom_menu_search.png" width="208" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_15']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_15']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=16">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_center.png" width="10" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_16']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_16']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=17">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_center_v.png" width="10" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_17']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_17']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=18">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_left.png" width="15" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_18']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_18']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=19">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_right.png" width="21" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_19']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_19']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=20">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_right2.png" width="36" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_20']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_20']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=21">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_right_v.png" width="21" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_21']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_21']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=22">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/bt_info_right_v2.png" width="36" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_22']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_22']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=23">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_ann_une.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_23']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_23']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=24">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_vit_une.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_24']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_24']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=25">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing1.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_25']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_25']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=26">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing3.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_26']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_26']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=27">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing2.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_27']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_27']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=28">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing4.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_28']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_28']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=29">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing5.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_29']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_29']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=30">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing6.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_30']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_30']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=65">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing7.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_65']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_65']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=66">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_listing8.png" width="150" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_66']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_66']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=31">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/logo_urgent.png" width="69" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_31']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_31']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=32">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/no_photo1.png" width="50" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_32']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_32']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=33">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/no_photo2.png" width="70" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_33']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_33']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=34">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/no_photo3.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_34']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_34']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=35">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/no_photo5.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_35']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_35']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=36">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/img_info_pub.png" width="208" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_36']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_36']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=37">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fond_pub_texte.png" width="100" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_37']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_37']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=38">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/pub_fond_ann.png" width="120" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_38']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_38']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=39">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/top_header_fl.png" width="12" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_39']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_39']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=40">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fleche_u.png" width="17" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_40']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_40']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=41">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/fleche.png" width="10" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_41']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_41']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=42">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/upload_photo.png" width="60" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_42']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_42']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=43">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/radio1.png" width="14" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_43']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_43']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=44">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/radio2.png" width="14" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_44']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_44']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=45">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/check1.png" width="14" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_45']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_45']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=46">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/check2.png" width="14" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_46']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_46']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=47">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/geo_vit.png" width="20" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_47']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_47']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=48">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_bout.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_48']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_48']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=49">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_enc.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_49']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_49']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=50">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_ent.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_50']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_50']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=51">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_env.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_51']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_51']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=52">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_geo.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_52']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_52']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=53">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_imp.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_53']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_53']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=54">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_mod.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_54']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_54']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=55">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_rem.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_55']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_55']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=56">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_sel.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_56']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_56']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=57">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_sig.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_57']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_57']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=58">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_sir.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_58']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_58']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=59">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_sup.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_59']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_59']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=60">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_sup_sel.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_60']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_60']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=61">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_tel.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_61']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_61']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=62">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_une.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_62']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_62']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
		<form enctype="multipart/form-data" method="post" action="temp_img.php?menu=25&amp;img=63">
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><img src="../images/icone_urg.png" width="28" alt="" /></div>
			
			<div class="form_left_2"><?php echo $language_adm['page_mod_img_adm_63']; ?> :</div>
			<div class="form_right_2"><input type="file" class="input_file" name="img" /></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2 txt_info"><?php echo $language_adm['page_mod_img_adm_info_63']; ?></div>
			
			<div class="form_left_2"></div>
			<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /><br /><br /></div>
		</form>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION DE LA STRUCTURE ET DU STYLE -----  ///

function htm_temp_style($type, $edition, $ok)
{
	global $language_adm;
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($type == 1) echo $language_adm['temp_style_info1'];
			if($type == 2) echo $language_adm['temp_style_info2'];
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
			if(!empty($ok)) echo '<div class="form_left_3" valign="top"></div><div class="form_right_3"><span class="ok">'. $language_adm['temp_style_ok'] .'</span></div>';
		?>
		
		<div class="form_left_3" valign="top"></div>
		<div class="form_right_3"><textarea cols="100" rows="40" class="textarea" name="style" value=""><?php echo $edition; ?></textarea></div>
		
		<div class="form_left_3"></div>
		<div class="form_right_3"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION DES PARAMETRES GENERAUX -----  ///
	
function htm_mod_param_gen($e)
{
	global $language_adm, $param_gen;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_param_gen_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="param_generaux.php?menu=2">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error7'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error8'] .'</span></p></div>';
		if(!empty($e) && $e == 9) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error9'] .'</span></p></div>';
		if(!empty($e) && $e == 10) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error10'] .'</span></p></div>';
		if(!empty($e) && $e == 11) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error11'] .'</span></p></div>';
		if(!empty($e) && $e == 12) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error12'] .'</span></p></div>';
		if(!empty($e) && $e == 13) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error13'] .'</span></p></div>';
		if(!empty($e) && $e == 14) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error14'] .'</span></p></div>';
		if(!empty($e) && $e == 15) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error15'] .'</span></p></div>';
		if(!empty($e) && $e == 16) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error16'] .'</span></p></div>';
		if(!empty($e) && $e == 17) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_param_gen_error17'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_name']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $param_gen['name']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_pays']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="pays" value="<?php if(isset($_POST['pays'])) echo $_POST['pays']; else echo $param_gen['pays']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_m_auto']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="mail_rep" value="<?php if(isset($_POST['mail_rep'])) echo $_POST['mail_rep']; else echo $param_gen['mail_rep']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_title']; ?> :</div>
		<div class="form_right"><input class="input_long" type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; else echo $param_gen['title']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_desc']; ?> :</div>
		<div class="form_right"><textarea type="text" cols="51" rows="3" class="textarea" name="desc"><?php if(isset($_POST['desc'])) echo $_POST['desc']; else echo $param_gen['desc']; ?></textarea></div>
     
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_devise']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="devise" value="<?php if(isset($_POST['devise'])) echo $_POST['devise']; else echo $param_gen['devise']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_fb']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_fb" name="active_fb" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_fb'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_fb'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_fb'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_fb'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_fb" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_fb_id']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="id_fb" value="<?php if(isset($_POST['id_fb'])) echo $_POST['id_fb']; else echo $param_gen['id_fb']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_fb_key']; ?> :</div>
		<div class="form_right"><input class="input_con" type="password" name="key_fb" value="<?php if(isset($_POST['key_fb'])) echo $_POST['key_fb']; else echo $param_gen['key_fb']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_filtr_mail']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_filtre" name="active_filtre" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_filtre'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_filtre'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_filtre'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_filtre'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_filtre" alt="" />
		</div>
		
		<div id="conteneurRadio2">
		 
			<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_acc']; ?> :</div>
			<div class="form_right_radio conteneurRadio" >
				<input type="radio" id="acc1" name="actif_acc" onclick="turnImgRadio(this, 2);" value="1" <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 1) echo 'checked = "checked"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 1) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 1) echo 'src="images/radio2.png"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_acc1" alt="" />
			</div>
			
			<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_acc_1']; ?> :</div>
			<div class="form_right_radio conteneurRadio">
				<p style="float: left">
					<input type="radio" id="acc2" name="actif_acc" onclick="turnImgRadio(this, 2);" value="2" <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 2) echo 'checked = "checked"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 2) echo 'checked = "checked"'; ?> />
					<img <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 2) echo 'src="images/radio2.png"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 2) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_acc2" alt="" />
				</p>
				<p class="p_note_form"><?php echo $language_adm['page_mod_param_gen_act_acc_info_1']; ?></p>
			</div>
			
			<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_acc_1']; ?> :</div>
			<div class="form_right_radio conteneurRadio">
				<p style="float: left">
					<input type="radio" id="acc3" name="actif_acc" onclick="turnImgRadio(this, 2);" value="3" <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 3) echo 'checked = "checked"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 3) echo 'checked = "checked"'; ?> />
					<img <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 3) echo 'src="images/radio2.png"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 3) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_acc3" alt="" />
				</p>
				<p class="p_note_form"><?php echo $language_adm['page_mod_param_gen_act_acc_info_2']; ?></p>
			</div>
			
			<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_acc_2']; ?> :</div>
			<div class="form_right_radio conteneurRadio" >
				<input type="radio" id="acc4" name="actif_acc" onclick="turnImgRadio(this, 2);" value="4" <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 4) echo 'checked = "checked"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 4) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['actif_acc']) AND $_POST['actif_acc'] == 4) echo 'src="images/radio2.png"'; elseif (!isset($_POST['name']) && $param_gen['actif_acc'] == 4) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_acc4" alt="" />
			</div>
		
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_bout']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_bout" name="active_bout" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_bout'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_bout'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_bout'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_bout'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_bout" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_ech']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_ech" name="active_ech" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_ech'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_ech'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_ech'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_ech'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_ech" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_don']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_don" name="active_don" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_don'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_don'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_don'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_don'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_don" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_une']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_une" name="active_une" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_une'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_une'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_une'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_une'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_une" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_act_vit']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="active_vit" name="active_vit" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['active_vit'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['active_vit'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['active_vit'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['active_vit'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_active_vit" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_nb_ann']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_ann" value="<?php if(isset($_POST['nb_ann'])) echo $_POST['nb_ann']; else echo $param_gen['nb_ann']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_nb_bout']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_bout" value="<?php if(isset($_POST['nb_bout'])) echo $_POST['nb_bout']; else echo $param_gen['nb_bout']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_ann_val']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="ann_val" value="<?php if(isset($_POST['ann_val'])) echo $_POST['ann_val']; else echo $param_gen['ann_val']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_auto_ann']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="auto_ann" name="auto_ann" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['auto_ann'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['auto_ann'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['auto_ann'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['auto_ann'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_auto_ann" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_auto_acc']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="auto_acc" name="auto_acc" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['auto_acc'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['auto_acc'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['auto_acc'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['auto_acc'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_auto_acc" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_not']; ?> :</div>
		<div class="form_right_checkbox">
			<p style="float: left">
				<input type="checkbox" class="input_checkbox" id="notif" name="notif" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['notif'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['notif'] == 1) echo 'checked="checked"'; ?> />
				<img <?php if (!empty($_POST['notif'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['notif'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_notif" alt="" />
			</p>
			<p class="p_note_form"><?php echo $language_adm['page_mod_param_gen_not_info']; ?></p>
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_not_email']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email_notif" value="<?php if(isset($_POST['email_notif'])) echo $_POST['email_notif']; else echo $param_gen['email_notif']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_1']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="flux_gl" name="flux_gl" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['flux_gl'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['flux_gl'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['flux_gl'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['flux_gl'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_flux_gl" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_nb_1']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_flux_gl" value="<?php if(isset($_POST['nb_flux_gl'])) echo $_POST['nb_flux_gl']; else echo $param_gen['nb_flux_gl']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_2']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="flux_bout" name="flux_bout" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['flux_bout'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['flux_bout'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['flux_bout'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['flux_bout'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_flux_bout" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_nb_2']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_flux_bout" value="<?php if(isset($_POST['nb_flux_bout'])) echo $_POST['nb_flux_bout']; else echo $param_gen['nb_flux_bout']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_auto_fact']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="auto_fact" name="auto_fact" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['auto_fact'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $param_gen['auto_fact'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['auto_fact'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $param_gen['auto_fact'] == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_auto_fact" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_nom_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nom_ent" value="<?php if(isset($_POST['nom_ent'])) echo $_POST['nom_ent']; else echo $param_gen['nom_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_add_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="add_ent" value="<?php if(isset($_POST['add_ent'])) echo $_POST['add_ent']; else echo $param_gen['add_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_cod_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="cod_ent" value="<?php if(isset($_POST['cod_ent'])) echo $_POST['cod_ent']; else echo $param_gen['cod_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_vil_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="vil_ent" value="<?php if(isset($_POST['vil_ent'])) echo $_POST['vil_ent']; else echo $param_gen['vil_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_sir_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="sir_ent" value="<?php if(isset($_POST['sir_ent'])) echo $_POST['sir_ent']; else echo $param_gen['sir_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_tva_ent']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="tva_ent" value="<?php if(isset($_POST['tva_ent'])) echo $_POST['tva_ent']; else echo $param_gen['tva_ent']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_param_gen_flux_tva_taux']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="tva_taux" value="<?php if(isset($_POST['tva_taux'])) echo $_POST['tva_taux']; else echo $param_gen['tva_taux']; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA LISTE DES REGIONS ET DES DEPARTEMENTS -----  ///

function htm_regions_center()
{
	global $language_adm, $cache_regions, $cache_departements;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_list_reg_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	
		<p class="p_center">
			<a class="lien_g" href="regions_crea.php?menu=3"><?php echo $language_adm['page_list_reg_ajouter_reg']; ?></a>
		</p>
		
		<?php
			
			for($i = 0; $i < count($cache_regions); $i++)
			{
				$id = (int) $cache_regions[$i]['id_reg'];
				$name = stripslashes(htmlspecialchars($cache_regions[$i]['nom_reg'], ENT_QUOTES));
		     
				echo '<ul class="ul_center"><li>'. ($i + 1) .' -  '. $name .' &nbsp;-&nbsp; 
				<a class="lien_g" href="regions_mod.php?id='. $id .'&amp;menu=3">'. $language_adm['page_list_reg_mod'] .'</a> /
				<a class="lien_g" href="regions_deplace.php?id='. $id .'&amp;l=1&amp;m=1">'. $language_adm['page_list_reg_mont'] .'</a> /
				<a class="lien_g" href="regions_deplace.php?id='. $id .'&amp;l=1&amp;m=2">'. $language_adm['page_list_reg_dec'] .'</a> /
				<a class="lien_sup" href="regions_sup.php?id='. $id .'" OnClick="return confirm(\''. $language_adm['page_list_reg_sup_r'] .'\');">'. $language_adm['page_list_reg_sup'] .'</a></li></ul>';
				
				if(isset($cache_departements['0']) && count($cache_departements['0']) != 0) echo '<ul class="ul_center2">';
				
				$r = 0;
				
				for($j = 0; $j < count($cache_departements); $j++)
				{
					$id_dep = (int) $cache_departements[$j]['id_dep'];
					$id_reg = (int) $cache_departements[$j]['id_reg'];
					$name_dep = stripslashes(htmlspecialchars($cache_departements[$j]['nom_dep'], ENT_QUOTES));
                 
					if($id == $id_reg) 
					{
						echo '<li class="li_center">'. ($r + 1) .' - '. $name_dep .' &nbsp;-&nbsp; 
						<a class="lien_sup" href="regions_dep_sup.php?id1='. $id .'&amp;id2='. $id_dep .'" OnClick="return confirm(\''. $language_adm['page_list_reg_sup_r'] .'\');">'. $language_adm['page_list_reg_sup'] .'</a> /
						<a class="lien_g" href="regions_dep_mod.php?id='. $id_dep .'&amp;menu=3">'. $language_adm['page_list_reg_mod'] .'</a> /
						<a class="lien_g" href="regions_deplace.php?id='. $id .'&amp;id2='. $id_dep .'&amp;l=2&amp;m=1">'. $language_adm['page_list_reg_mont'] .'</a> /
						<a class="lien_g" href="regions_deplace.php?id='. $id .'&amp;id2='. $id_dep .'&amp;l=2&amp;m=2">'. $language_adm['page_list_reg_dec'] .'</a></li>';
						$r++;
					}
				}
                
				if(isset($cache_departements['0']) && count($cache_departements['0']) != 0) echo '</ul>';
				
				echo '<ul class="ul_center2"><li><a class="lien_g2" href="regions_dep_crea.php?id='. $id .'&amp;menu=3">'. $language_adm['page_list_reg_ajouter_dep'] .'</a></li></ul>';
				
			}
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UNE REGION -----  ///

function htm_creer_region_center()
{
	global $language_adm;

?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_crea_reg_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="regions_crea.php?menu3">
	
	<div class="menus_r_fond">
	 
		<div class="form_left"><?php echo $language_adm['page_crea_reg_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="name" value="" /></div>
     
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
      
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE REGION -----  ///

function htm_modifier_region_center($id)
{
	global $language_adm, $cache_regions;
	
	$id = (int) $id;
	$reg_name = '';
	
	foreach($cache_regions as $v)
	{
		if($v['id_reg'] == $id)
		$reg_name = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}	
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	  
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_reg_info'] .' - '. $reg_name; ?></li>
		</ul>
	 
	</div>
	
	<form method="post" action="regions_mod.php?menu=3">
	
	<div class="menus_r_fond">
	 
		<div class="form_left"><?php echo $language_adm['page_mod_reg_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="text" class="input_con" name="name" value="<?php echo $reg_name ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
      
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UN DEPARTEMENT -----  ///

function htm_creer_departement_center($id)
{
	global $language_adm;
	
	$id = (int) $id;

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_crea_dep_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="regions_dep_crea.php?id=<?php echo $id; ?>&amp;menu=3">
	
	<div class="menus_r_fond">
	 
		<div class="form_left"><?php echo $language_adm['page_crea_dep_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="name" value="" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}
	
/// ----- PAGE DE MODIFICATION D'UN DEPARTEMENT -----  ///

function htm_modifier_departement_center($id)
{
	global $language_adm, $cache_departements;
	
	$id = (int) $id;	
	$dep_name = '';
	
	foreach($cache_departements as $v)
	{
		if($v['id_dep'] == $id)
		$dep_name = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}	
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_dep_info'] .' - '. $dep_name; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="regions_dep_mod.php">
	
	<div class="menus_r_fond">
	
		<div class="form_left"><?php echo $language_adm['page_mod_dep_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="text" class="input_con" name="name" value="<?php echo $dep_name; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>

	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA LISTE DES CATEGORIES ET SOUS-CATEGORIES -----  ///

function htm_categories_center()
{
	global $language_adm, $cache_categories;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_list_cat_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	
		<p class="p_center">
			<a class="lien_g" href="categories_crea.php?menu=4"><?php echo $language_adm['page_list_cat_ajouter_cat']; ?></a>
		</p>
		
		<?php
			
			for($i = 0; $i < count($cache_categories); $i++ )
			{
				$id1 = (int) $cache_categories[$i]['id_cat'];
				$par_cat = (int) $cache_categories[$i]['par_cat'];
				$cat_name = stripslashes(htmlspecialchars($cache_categories[$i]['nom_cat'], ENT_QUOTES));
				
				if($par_cat == 0)
				{
					echo '<ul class="ul_center"><li>'. ($i + 1) .' -  '. $cat_name.' &nbsp;-&nbsp; 
					<a class="lien_g" href="categories_mod.php?id='. $id1 .'&amp;menu=4">'. $language_adm['page_list_cat_mod'] .'</a> /
					<a class="lien_g" href="categories_deplace.php?id1='. $id1 .'&l=1&m=1">'. $language_adm['page_list_cat_mont'] .'</a> /
					<a class="lien_g" href="categories_deplace.php?id1='. $id1 .'&l=1&m=2">'. $language_adm['page_list_cat_dec'] .'</a> /
					<a class="lien_sup" href="categories_sup.php?id='. $id1 .'" OnClick="return confirm(\''. $language_adm['page_list_cat_sup_r'] .'\');">'. $language_adm['page_list_cat_sup'] .'</a></li></ul>';
				}
				
				$sous_categories = $cache_categories;
				
				if(count($sous_categories) != 0 && $par_cat == 0) echo '<ul class="ul_center2">';
				
				$c = 0;
				
				for($j = 0; $j < count($sous_categories); $j++)
				{
					$id2 = (int) $sous_categories[$j]['id_cat'];
					$par_sous_cat = (int) $sous_categories[$j]['par_cat'];
					$sous_name = stripslashes(htmlspecialchars($sous_categories[$j]['nom_cat'], ENT_QUOTES));	
                 
					if($par_sous_cat == $id1) 
					{
						echo '<li class="li_center">'. ($c + 1) .' - '. $sous_name .' &nbsp;-&nbsp; 
						<a class="lien_sup" href="categories_sou_sup.php?id1='. $id1 .'&id2='. $id2 .'" OnClick="return confirm(\''. $language_adm['page_list_cat_sup_r'] .'\');">'. $language_adm['page_list_cat_sup'] .'</a> /
						<a class="lien_g" href="categories_sou_mod.php?id='. $id2 .'&amp;menu=4">'. $language_adm['page_list_cat_mod'] .'</a> /
						<a class="lien_g" href="categories_deplace.php?id1='. $id1 .'&id2='. $id2 .'&l=2&m=1">'. $language_adm['page_list_cat_mont'] .'</a> /
						<a class="lien_g" href="categories_deplace.php?id1='. $id1 .'&id2='. $id2 .'&l=2&m=2">'. $language_adm['page_list_cat_dec'] .'</a></li>';
						$c ++;
					}
				}
                
				if(count($sous_categories) != 0 && $par_cat == 0) echo '</ul>';
				
				if($par_cat == 0)
				echo '<ul class="ul_center2"><li><a class="lien_g2" href="categories_sou_crea.php?id='. $id1 .'&amp;menu=4">'. $language_adm['page_list_cat_ajouter_sou_cat'] .'</a></li></ul>';
			}
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UNE CATEGORIE -----  ///

function htm_creer_categorie_center()
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_crea_cat_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="categories_crea.php?menu=3">
	
	<div class="menus_r_fond">
	 
		<div class="form_left"><?php echo $language_adm['page_crea_cat_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="name" value="" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE CATEGORIE -----  ///

function htm_modifier_categorie_center($id)
{
	global $language_adm, $cache_categories;
	
	$id = (int) $id;
	$cat_name = '';

	foreach($cache_categories as $v)
	{
		if($v['id_cat'] == $id)
		$cat_name = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
	}

?>		

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_cat_info'] .' - '. $cat_name; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="categories_mod.php?menu=4">
	
	<div class="menus_r_fond">
	
		<div class="form_left"><?php echo $language_adm['page_mod_cat_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="text" class="input_con" name="name" value="<?php echo $cat_name; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UNE SOUS-CATEGORIE -----  ///

function htm_creer_sous_categorie_center($id)
{
	global $language_adm;
	
	$id = (int) $id;
	
?>	
	
<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_crea_sous_cat_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="categories_sou_crea.php?id=<?php echo $id; ?>&amp;menu=4">
	
	<div class="menus_r_fond">
	  
		<div class="form_left"><?php echo $language_adm['page_crea_sous_cat_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="name" value="" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE SOUS-CATEGORIE -----  ///

function htm_modifier_sous_categorie_center($id)
{
	global $language_adm, $cache_categories;
	
	$id = (int) $id;
	$cat_name = '';

	foreach($cache_categories as $v)
	{
		if($v['id_cat'] == $id)
		$cat_name = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
	}

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_sous_cat_info'] .' - '. $cat_name; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="categories_sou_mod.php?menu=4">
	
	<div class="menus_r_fond">
	  
		<div class="form_left"><?php echo $language_adm['page_mod_sous_cat_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="text" class="input_con" name="name" value="<?php echo $cat_name; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'AJOUT D'UNE NOTE DANS LE FORMULAIRE DE DEPOT POUR UNE SOUS-CATEGORIE -----  ///

function htm_option_categorie_note($e)
{
	global $language_adm, $cache_categories;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_note_cat_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="options_cat_note.php?menu=5">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_not_erreur'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_not_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_note(0, $cache_categories); ?></div>
		
		<div id="get_note">
		
			<div class="form_left"><?php echo $language_adm['page_not_txt']; ?> :</div>
			<div class="form_right"><textarea type="text" class="textarea" cols="50" rows="3" name="note" /></textarea></div>
		
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
        
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'APPLICATION D'UN DISCLAIMER SUR  UNE SOUS-CATEGORIE -----  ///

function htm_option_categorie_disc($e)
{
	global $language_adm, $cache_categories;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_disc_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="options_cat_disc.php?menu=5">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_disc_erreur'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_opts_cat']; ?> :</div>
		<div class="form_right"><input type="hidden" name="valide" value="1" /><?php if(is_array($cache_categories)) display_adm_categories_disc(0, $cache_categories); ?></div>
     
		<div id="get_disc">
		
			<div class="form_left"><?php echo $language_adm['page_disc_txt']; ?> :</div>
			<div class="form_right_checkbox">
				<input type="checkbox" class="input_checkbox" id="disc" name="disc" value="1" onclick="turnImgCheck(this);" />
				<img <?php echo 'src="images/check1.png"'; ?> id="img_check_disc" alt="" />
			</div>
		
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES -----  ///

function htm_option($l)
{
	global $language_adm, $cache_options_cat;
	
	$l = (int) $l;
	
?>

<td width="15"></td>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
				if($l == 1) echo $language_adm['page_opts_num_info'];
				if($l == 2) echo $language_adm['page_opts_don_info'];
			?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		
		<p class="p_center">
			<?php
				if($l == 1) echo '<a class="lien_g" href="option_crea.php?l='. $l .'&amp;menu=5">'. $language_adm['page_opts_num_link'] .'</a>';
				if($l == 2) echo '<a class="lien_g" href="option_crea.php?l='. $l .'&amp;menu=5">'. $language_adm['page_opts_don_link'] .'</a>';
			?>
		</p>
		
		<?php
		
			if(is_array($cache_options_cat))
			{
				$i = 1;
				
				if(count($cache_options_cat) != 0) echo '<ul class="ul_center">';
				
				foreach($cache_options_cat as $row)
				{
					$id = (int) $row['id_opt'];
					$opt_name = stripslashes(htmlspecialchars($row['nom_opt'], ENT_QUOTES));
					$opt_uni = stripslashes(htmlspecialchars($row['uni_opt'], ENT_QUOTES));
					$type = (int) $row['type'];
					
					if($type == $l)
					{
						echo '<li class="li_center">'. $i .' - '. $opt_name;
						
						if(!empty($opt_uni))
						echo ' / <strong>'. $language_adm['page_opts_num_unite'] .'</strong> : '. $opt_uni;
						
						echo '&nbsp; - &nbsp;<a class="lien_g" href="option_cat_mod.php?id='. $id .'&amp;l='. $l .'&amp;menu=5">'. $language_adm['page_opts_num_mod'] .'</a>';
						
						if($l == 1) echo ' / <a class="lien_g" href="option_val.php?id='. $id .'&amp;l='. $l .'&amp;menu=5">'. $language_adm['page_opts_num_list'] .'</a>';
						if($l == 2) echo ' / <a class="lien_g" href="option_val.php?id='. $id .'&amp;l='. $l .'&amp;menu=5">'. $language_adm['page_opts_don_list'] .'</a>';
						
						echo ' / <a class="lien_sup" href="option_cat_sup.php?id='. $id .'&amp;l='. $l .'" onClick="return confirm(\''. $language_adm['page_opts_num_mod_conf'] .'\');">'. $language_adm['page_opts_num_sup'] .'</a>';
						
						echo '</li>';
						$i++;
					}
				}
				if(count($cache_options_cat) != 0) echo '</ul>';
			}
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES -----  ///

function htm_option_crea($l, $e)
{
	global $language_adm;
	
	$l = (int) $l;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
				if($l == 1) echo $language_adm['page_opts_crea_num_info'];
				if($l == 2) echo $language_adm['page_opts_crea_don_info'];
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="option_crea.php?l=<?php echo $l; ?>&amp;menu=5">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_crea_num_error'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left">
			<?php 
				if($l == 1) echo $language_adm['page_opts_crea_num_nom'];
				if($l == 2) echo $language_adm['page_opts_crea_don_nom'];
			?> 
		:</div>
		<div class="form_right"><input type="text" class="input_con" name="nom" /></div>

		
		<?php
		if($l == 1)
		{
		?>
		<div class="form_left"><?php echo $language_adm['page_opts_crea_num_uni']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="uni" /> &nbsp;<span class="txt_info"><?php echo $language_adm['page_opts_crea_num_opt']; ?></span></div>
		<?php
		}
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE CREATION DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES -----  ///

function htm_option_mod($id, $l, $e)
{
	global $language_adm, $cache_options_cat;
	
	$id = (int) $id;
	$l = (int) $l;
	$nom_opt = '';
	$uni_opt = '';
	
	foreach($cache_options_cat as $row)
	{
		if($row['id_opt'] == $id)
		{
			$nom_opt = stripslashes(htmlspecialchars($row['nom_opt'], ENT_QUOTES));
			$uni_opt = stripslashes(htmlspecialchars($row['uni_opt'], ENT_QUOTES));
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_opts_mod_info'] .' '. $nom_opt; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_crea_num_error'] .'</span></p></div>';
		
		?>
     
		<div class="form_left">
		<?php 
			if($l == 1) echo $language_adm['page_opts_crea_num_nom'];
			if($l == 2) echo $language_adm['page_opts_crea_don_nom'];
		?> 
		:</div>
		<div class="form_right"><input type="text" class="input_con" name="nom" value="<?php if(!empty($nom_opt)) echo $nom_opt; ?>" /></div>
		
		<?php
		if($l == 1)
		{
		?>
		<div class="form_left"><?php echo $language_adm['page_opts_crea_num_uni']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="uni" value="<?php if(!empty($uni_opt)) echo $uni_opt; ?>" /> <span class="txt_info"><?php echo $language_adm['page_opts_crea_num_opt']; ?></span></div>
		<?php
		}
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE CREATION DES VALEURS DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES -----  ///

function htm_option_crea_val($id, $l, $e)
{
	global $language_adm, $cache_select_valeurs, $cache_select_donnees;
	
	$id = (int) $id;
	$l = (int) $l;
	
	if($l == 1)
	$vals = $cache_select_valeurs;
	
	else $vals = $cache_select_donnees;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
				if($l == 1) echo $language_adm['page_opts_crea_val_info1'];
				if($l == 2) echo $language_adm['page_opts_crea_val_info2'];
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
		if(!empty($e) && $e == 1)
		{
			if($l == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_crea_val_error1'] .'</span></p></div>';
			if($l == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_crea_val_error2'] .'</span></p></div>';
		}
		
		?>
		
		<div class="form_left">
			<?php 
				if($l == 1) echo $language_adm['page_opts_crea_val_nom1'];
				if($l == 2) echo $language_adm['page_opts_crea_val_nom2'];
			?> 
		:</div>
		<div class="form_right"><input type="text" class="input_con" name="val" /></div>
	
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
		<?php
		
			if(is_array($vals))
			{
				$i = 1;
				
				if(count($vals) != 0) echo '<ul class="ul_center">';
				
				foreach($vals as $row)
				{
					$id_val = ($l == 2) ? (int) $row['id_sel'] : (int) $row['valeur'];
					$sel_nom = stripslashes(htmlspecialchars($row['sel_nom'], ENT_QUOTES));
					$val = stripslashes(htmlspecialchars($row['valeur'], ENT_QUOTES));
					$id_opt = (int) $row['id_opt'];
					
					if($id_opt == $id && preg_match("#max#", $sel_nom) == false)
					{
						echo '<li class="li_center">'. $i .' - '. $val;
						echo '&nbsp; - &nbsp;<a class="lien_g" href="option_val_mod.php?id='. $id .'&amp;l='. $l .'&amp;v='. $id_val .'&amp;menu=5">'. $language_adm['page_opts_crea_val_mod'] .'</a>';
						echo ' / <a class="lien_sup" href="option_val_sup.php?id='. $id .'&amp;l='. $l .'&amp;v='. $id_val .'" onClick="return confirm(\''. $language_adm['page_opts_crea_val_conf'] .'\');">'. $language_adm['page_opts_crea_val_sup'] .'</a>';
						echo '</li>';
						$i++;
					}
				}
				if(count($vals) != 0) echo '</ul>';
			}
			
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATIN DES VALEURS DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES -----  ///

function htm_valeur_mod($id, $l, $v, $e)
{
	global $language_adm, $cache_select_valeurs, $cache_select_donnees;
	
	$l =(int) $l;
	$nom_val = '';
	
	if($l == 2)
	{
		$info_val = $cache_select_donnees;
	
		foreach($info_val as $row)
		{
			if($row['id_sel'] == $v)
			$nom_val = stripslashes(htmlspecialchars($row['valeur'], ENT_QUOTES));
		}
	}
	else $nom_val = $v;
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
				echo $language_adm['page_opts_val_info'] .' '. $nom_val;
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_crea_num_error'] .'</span></p></div>';
		
		?>
		
		<div class="form_left">
			<?php 
				echo $language_adm['page_opts_val_nom'];
			?> 
		:</div>
		<div class="form_right"><input type="text" class="input_con" name="nom" value="<?php if(!empty($nom_val)) echo $nom_val; ?>" /></div>
	 
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'APPLICATION DES OPTIONS DE VALEUR NUMERIQUE OU DE DONNEES AUX CATEGORIES-----  ///

function htm_option_categorie_center($e)
{
	global $language_adm, $cache_categories, $cache_options_cat;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_opts_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="options_cat.php?menu=5">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opts_error'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_opts_cat']; ?> :</div>
		<div class="form_right"><input type="hidden" name="valide" value="1" /><?php if(is_array($cache_categories)) display_adm_categories_opts(0, $cache_categories); ?></div>
	 
		<div class="form_left"></div>
		<div class="form_right"><span class="txt_info"><?php echo $language_adm['page_opts_info1']; ?></span></div>
		
		<div id="get_opts">
		
		<div class="form_left"><?php echo $language_adm['page_opts_pri']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="0" name="options_val[]" value="0" onclick="turnImgCheck(this);" />
			<img <?php echo 'src="images/check1.png"'; ?> id="img_check_0" alt="" />
		</div>
		
		<?php
			if(is_array($cache_options_cat))
			{
				foreach($cache_options_cat as $row)
				{
					$id = (int) $row['id_opt'];
					$opt_name = stripslashes(htmlspecialchars($row['nom_opt'], ENT_QUOTES));
					$type = (int) $row['type'];
					
					if($type == 1)
					{
					?>
					<div class="form_left"><?php echo $language_adm['page_opts_all'] .' '. $opt_name; ?> :</div>
					<div class="form_right_checkbox">
						<input type="checkbox" class="input_checkbox" id="<?php echo $id; ?>" name="options_val[]" value="<?php echo $id; ?>" onclick="turnImgCheck(this);" />
						<img <?php echo 'src="images/check1.png"'; ?> id="img_check_<?php echo $id; ?>" alt="" />
					</div>
					<?php
					}
				}
			}
		?>
		
		<?php
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
					$opt_name = stripslashes(htmlspecialchars($row['nom_opt'], ENT_QUOTES));
					$type = (int) $row['type'];
					
					if($type == 2)
					{
					?>
					<div class="form_left"><?php echo $language_adm['page_opts_all'] .' '. $opt_name; ?> :</div>
					<div class="form_right_checkbox">
						<input type="checkbox" class="input_checkbox" id="<?php echo $id; ?>" name="options_val[]" value="<?php echo $id; ?>" onclick="turnImgCheck(this);" />
						<img <?php echo 'src="images/check1.png"'; ?> id="img_check_<?php echo $id; ?>" alt="" />
					</div>
					<?php
					}
				}
			}
		?>
		
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'ACTIVATION/DESACTIVATION DES CHAMPS DU FORMULAIRE -----  ///

function htm_champs_act()
{
	global $language_adm, $cache_param_champs;
	
	$act_siret = (int) $cache_param_champs['act_siret'];
	$act_vil = (int) $cache_param_champs['act_vil'];
	$act_code_pos = (int) $cache_param_champs['act_code_pos'];
	$act_tel = (int) $cache_param_champs['act_tel'];
	$act_prix = (int) $cache_param_champs['act_prix'];

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_champs_act_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<div class="form_left"><?php echo $language_adm['page_champs_act_sir']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_siret" name="act_siret" value="1" onclick="turnImgCheck(this);" <?php if ($act_siret == 1) echo 'checked="checked"'; ?> />
			<img <?php if ($act_siret == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_act_siret" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_act_cod']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_code_pos" name="act_code_pos" value="1" onclick="turnImgCheck(this);" <?php if ($act_code_pos == 1) echo 'checked="checked"'; ?> />
			<img <?php if ($act_code_pos == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_act_code_pos" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_act_vil']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_vil" name="act_vil" value="1" onclick="turnImgCheck(this);" <?php if ($act_vil == 1) echo 'checked="checked"'; ?> />
			<img <?php if ($act_vil == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_act_vil" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_act_tel']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_tel" name="act_tel" value="1" onclick="turnImgCheck(this);" <?php if ($act_tel == 1) echo 'checked="checked"'; ?> />
			<img <?php if ($act_tel == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_act_tel" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_act_pri']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_prix" name="act_prix" value="1" onclick="turnImgCheck(this);" <?php if ($act_prix == 1) echo 'checked="checked"'; ?> />
			<img <?php if ($act_prix == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_act_prix" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input type="hidden" name="valid" value="1" /><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES CHAMPS DU FORMULAIRE -----  ///

function htm_champs()
{
	global $language_adm, $cache_champs;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_champs_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		
		<p class="p_center"><?php  echo '<a href="champs_crea.php?menu=26">'. $language_adm['page_champs_crea'] .'</a>'; ?></p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_champs as $v)
			if(!empty($v['id_champ'])) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_champs as $v)
			{
				$id_champ = (int) $v['id_champ'];
				$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
				$numeric = (int) $v['numeric'];
				$type = (int) $v['type'];
				
				echo '<li class="li_center">'. $i .' - '. $nom .' (';
				
				if($numeric == 1)
				echo $language_adm['page_champs_num'] .'/';
				
				if($type == 0)
				echo $language_adm['page_champs_fac'];
				
				else echo $language_adm['page_champs_obl'];
				
				echo ') &nbsp;<a class="lien_g" href="champs_mod.php?id='. $id_champ .'&amp;menu=26">'. $language_adm['page_champs_mod'] .'</a>
				/ <a class="lien_sup" href="champs_sup.php?id='. $id_champ .'" onclick="return confirm(\''. $language_adm['page_champs_sup'] .' ?\');">'. $language_adm['page_champs_sup'] .'</a></li>';
				$i++;
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
			
	</div>

</div>

<?php
}


/// ----- PAGE DE CREATION D'UN CHAMP -----  ///

function htm_champs_crea($e)
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_champs_crea_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_champs_crea_error'] .'</span></p></div>';
	
		?>
		
		<div class="form_left"><?php echo $language_adm['page_champs_crea_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nom" value=""></div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_crea_num']; ?></div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="numeric" name="numeric" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['numeric'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['numeric'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_numeric" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_crea_type']; ?></div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="type" name="type" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['type'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['type'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_type" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UN CHAMP -----  ///

function htm_champs_mod($id, $e)
{
	global $language_adm, $cache_champs;
	
	$id = (int) $id;
	$nom = '';
	$numeric = '';
	$type = '';
	
	foreach($cache_champs as $v)
	{
		if($v['id_champ'] == $id)
		{
			$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
			$numeric = (int) $v['numeric'];
			$type = (int) $v['type'];
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_pages_mod_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_champs_mod_error'] .'</span></p></div>';
	
		?>
		
		<div class="form_left"><?php echo $language_adm['page_champs_mod_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="text" class="input_con" name="nom" value="<?php echo $nom ?>"></div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_mod_num']; ?></div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="numeric" name="numeric" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['numeric'])) echo 'checked="checked"'; elseif (!isset($_POST['nom']) && $numeric == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['numeric'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['nom']) && $numeric == 1) echo 'src="images/check2.png"';  else echo 'src="images/check1.png"'; ?> id="img_check_numeric" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_champs_mod_type']; ?></div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="type" name="type" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['type'])) echo 'checked="checked"'; elseif (!isset($_POST['nom']) && $type == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['type'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['nom']) && $type == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_type" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA GESTION DES ANNONCES -----  ///

function htm_validation_annonce_center($type, $array, $annonces, $page, $max_page)
{	
	global $language_adm, $cache_regions, $cache_categories, $param_gen;
	
	$id_ann_search = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : '';
	$email_ann_search = (!empty($array['email'])) ? $array['email'] : '';
	$cat_search = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg_search = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
		
			if(isset($_GET['id_compte']))
			echo $language_adm['page_ann_val_info5'] . $_GET['id_compte'];
			
			else
			{
				if($type == 1) echo $language_adm['page_ann_val_info1'];
				if($type == 2) echo $language_adm['page_ann_val_info2'];
				if($type == 3) echo $language_adm['page_ann_val_info3'];
				if($type == 4) echo $language_adm['page_ann_val_info6'];
				if($type == 0) echo $language_adm['page_ann_val_info4'];
			}
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="get" action="">
	
	<div class="menus_r_fond">
	 
		
		<?php if(!isset($_GET['id_compte']))
		{
		?>
		<div id="recherche">
			<div class="recherche_l"><input type="text" class="input_sma" name="id_ann" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input']); ?>')" value="<?php if(!empty($id_ann_search)) echo $id_ann_search; else echo $language_adm['page_ann_val_input'] ?>" /></div>
			<div class="recherche_l"><input type="text" class="input_con" name="email" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input2']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input2']); ?>')" value="<?php if(!empty($email_ann_search)) echo $email_ann_search; else echo $language_adm['page_ann_val_input2'] ?>" /></div>
			<div class="recherche_l"><?php if(is_array($cache_categories)) display_adm_categories_search($cat_search, $cache_categories, $language_adm['search_cat']); ?></div>
			<div class="recherche_l"><?php if(is_array($cache_regions)) display_adm_regions_search($reg_search, $cache_regions, $language_adm['search_reg']); ?><input type="hidden" name="menu" value="6" /></div>
			<div id="recherche_l_submit"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_rechercher']; ?>" /></div>
		</div>
		<?php
		}
		?>
		
		</form>
	 
		<?php
			
			if(is_array($annonces))
			{
				$i = 1;	
				
				foreach($annonces as $row)
				{
					$id_ann = htmlspecialchars($row['id_ann'], ENT_QUOTES);
					$titre = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
					$id_reg = stripslashes(htmlspecialchars($row['id_reg'], ENT_QUOTES));
					$id_cat = stripslashes(htmlspecialchars($row['id_cat'], ENT_QUOTES));
					$code_pos = stripslashes(htmlspecialchars($row['code_pos'], ENT_QUOTES));
					$ville = stripslashes(htmlspecialchars($row['ville'], ENT_QUOTES));
					$soc = stripslashes(htmlspecialchars($row['nom_societe'], ENT_QUOTES));
					$sir = stripslashes(htmlspecialchars($row['siret'], ENT_QUOTES));
					$prix = (float) $row['prix'];
					$prix = number_format($prix, 2, ',', ' '); 
					$tel = htmlspecialchars($row['tel'], ENT_QUOTES);
					$ip = htmlspecialchars($row['ip'], ENT_QUOTES);
					$email = htmlspecialchars($row['email'], ENT_QUOTES);
					$video = htmlspecialchars($row['video'], ENT_QUOTES);
					$ann = nl2br(stripslashes(htmlspecialchars($row['ann'], ENT_QUOTES)));
					$ann_doubl = stripslashes(htmlspecialchars($row['ann'], ENT_QUOTES));
					$images = get_images($id_ann);
					$doublons = get_doublons($id_ann, $id_reg, $code_pos, $titre, $ann_doubl);
					$nom_cat = '';
					$nom_reg = '';
					
					foreach($cache_categories as $v)
					{
						if($v['id_cat'] == $id_cat)
						$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
					}
				 
					foreach($cache_regions as $v)
					{
						if($v['id_reg'] == $id_reg) 
						$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
					}
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
	                
					echo '<p class="p_title"><strong>'. $i .' - '. $titre .'</strong></p>';
					
					if((count($images) != 0) || !empty($video))
					echo '<p class="p_photos">';
					
					if((count($images) != 0))
					{
						foreach ($images as $v)
						echo '<img src="../images/vignettes/'. $v['nom'] .'" width="108" height="100"> ';
					}
					
					if(!empty($video))
					{
						if(preg_match("#^http://www.youtube.com/watch\?v#", $video))
						{
							$type_vid = 1;
							$video = str_replace('http://www.youtube.com/watch?v=', '', $video);
						}
						elseif(preg_match("#^http://www.dailymotion.com/video/#", $video))
						{
							$type_vid = 2;
							$video = str_replace('http://www.dailymotion.com/video/', '', $video);
						}
						else $type_vid = 0;
						
						if($type_vid == 1)
						echo '<object type="application/x-shockwave-flash" width="108" height="100" data="http://www.youtube.com/v/'. $video .'&hl=fr_FR&fs=1&"><param name="movie" value="http://www.youtube.com/v/'. $video .'&hl=fr_FR&fs=1&" /><param name="allowfullscreen" value="true" /></object>';
			
						elseif($type_vid == 2)
						echo '<object type="application/x-shockwave-flash" width="515" height="300" data="http://www.dailymotion.com/swf/video/'. $video .'?width=&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=0&additionalInfos=0&autoPlay=0&hideInfos=0"><param name="movie" value="http://www.dailymotion.com/swf/video/'. $video .'?width=&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=0&additionalInfos=0&autoPlay=0&hideInfos=0"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param></object>';
					}
					
					if((count($images) != 0) || !empty($video))
					echo '</p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_ann_val_id'] .' : </strong>'. $id_ann;
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_cat'] .' :</strong> '. $nom_cat .' &nbsp; <strong>'. $language_adm['page_ann_val_reg'] .' : </strong>'. $nom_reg;
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_cod'] .' : </strong>'. $code_pos;

					if(!empty($ville))
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_vil'] .' : </strong>'. $ville .'</p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_ann_val_ema'] .' : </strong>'. $email;
					
					if(!empty($tel)) echo ' &nbsp; <strong>'. $language_adm['page_ann_val_tel'] .' : </strong>'. $tel;
					if($prix != 0) echo ' &nbsp; <strong>'. $language_adm['page_ann_val_pri'] .' : </strong>'. $prix .' '. $param_gen['devise'];
					
					if(!empty($soc))
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_soc'] .' : </strong>'. $soc;

					if(!empty($sir))
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_sir'] .' : </strong>'. $sir;
					
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_ip'] .' : </strong>'. $ip .' &nbsp; <a class="lien_g" href="http://www.geoiptool.com/?IP='. $ip .'" target="_blank">'. $language_adm['page_ann_val_geo_ip'] .'</a></p>';
					
					echo '<p class="p_texte">'. $ann .'</p>';
					
				 	
					if(!empty($doublons))
					{
						echo '<p class="p_doublons">'. $language_adm['page_ann_val_doubl'] .' : <br />';
						
						foreach ($doublons as $v)
						echo $language_adm['page_ann_val_doubl_n'] .' : '. $v['id_ann'] .'<br />';
						
						echo '</p>';
					}
					
					if($type == 1)
					{
					?>
						<form method="get" action="ann_refus.php">
							
								<a class="col_1" href="ann_valid.php?id=<?php echo $id_ann; ?>"><?php echo $language_adm['page_ann_val_val']; ?></a>
								<a class="col_1" href="ann_modif.php?id=<?php echo $id_ann; ?>&amp;menu=6"><?php echo $language_adm['page_ann_val_mod']; ?></a>
						
								<input class="col_1" type="submit" value="<?php echo $language_adm['page_ann_val_ref']; ?>"/>
								
								<input type="hidden" name="id" value="<?php echo $id_ann; ?>" />
								
								<textarea cols="70" rows="1" class="textarea_col" name="msg" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" value=""><?php echo $language_adm['page_ann_val_ref_msg']; ?></textarea>

								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>modif" name="modif" value="1" checked="checked" onclick="turnImgCheck(this);" />
									<img src="images/check2.png" id="img_check_<?php echo $id_ann; ?>modif" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_modif'] .'</span>'; ?>
								</div>
								
								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>email" name="email" value="<?php echo $email; ?>" onclick="turnImgCheck(this);" />
									<img src="images/check1.png" id="img_check_<?php echo $id_ann; ?>email" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_ban'] .'</span>'; ?>
								</div>
					
							</form>
					<?php
					}
					if($type == 2)
					{
						if(isset($_GET['id_compte']))
						{
						?>
							<form method="get" action="ann_refus.php">
							
								<a class="col_1" href="ann_modif.php?id=<?php echo $id_ann; ?>&amp;id_compte=<?php echo $_GET['id_compte']; ?>&amp;menu=7"><?php echo $language_adm['page_ann_val_mod']; ?></a>
						
								<input class="col_1" type="submit" value="<?php echo $language_adm['page_ann_val_ref']; ?>"/>
								
								<input type="hidden" name="id" value="<?php echo $id_ann; ?>" />
								
								<textarea cols="70" rows="1" class="textarea_col" name="msg" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" value=""><?php echo $language_adm['page_ann_val_ref_msg']; ?></textarea>

								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>modif" name="modif" value="1" checked="checked" onclick="turnImgCheck(this);" />
									<img src="images/check2.png" id="img_check_<?php echo $id_ann; ?>modif" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_modif'] .'</span>'; ?>
								</div>
								
								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>email" name="email" value="<?php echo $email; ?>" onclick="turnImgCheck(this);" />
									<img src="images/check1.png" id="img_check_<?php echo $id_ann; ?>email" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_ban'] .'</span>'; ?>
								</div>
					
							</form>
						<?php
						}
						else
						{
						?>
							<form method="get" action="ann_refus.php">
							
								<a class="col_2" href="ann_modif.php?id=<?php echo $id_ann; ?>&amp;menu=6"><?php echo $language_adm['page_ann_val_mod']; ?></a>
						
								<input class="col_2" type="submit" value="<?php echo $language_adm['page_ann_val_ref']; ?>"/>
								
								<input type="hidden" name="id" value="<?php echo $id_ann; ?>" />
								
								<textarea cols="70" rows="1" class="textarea_col" name="msg" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" value=""><?php echo $language_adm['page_ann_val_ref_msg']; ?></textarea>

								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>modif" name="modif" value="1" checked="checked" onclick="turnImgCheck(this);" />
									<img src="images/check2.png" id="img_check_<?php echo $id_ann; ?>modif" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_modif'] .'</span>'; ?>
								</div>
								
								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>email" name="email" value="<?php echo $email; ?>" onclick="turnImgCheck(this);" />
									<img src="images/check1.png" id="img_check_<?php echo $id_ann; ?>email" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_ban'] .'</span>'; ?>
								</div>
					
							</form>
						<?php
						}
					}
					if($type == 3 || $type == 4)
					{
						echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_3" href="ann_valid.php?id='. $id_ann .'">'. $language_adm['page_ann_val_val'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="ann_modif.php?id='. $id_ann .'&amp;menu=6">'. $language_adm['page_ann_val_mod'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="ann_refus.php?id='. $id_ann .'&amp;email='. $email .'" onClick="return confirm(\''. addslashes($language_adm['page_ann_val_ban']) .' ?\');">'. $language_adm['page_ann_val_ban'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="ann_supp.php?id='. $id_ann .'&amp;menu=6" onclick="return confirm(\''. $language_adm['page_ann_val_sup'] .' ?\');">'. $language_adm['page_ann_val_sup'] .'</a></li>
						</ul>';
					}
					if($type == 0)
					{
					?>
						<form method="get" action="ann_refus.php">
							
								<a class="col_4" href="ann_valid.php?id=<?php echo $id_ann; ?>"><?php echo $language_adm['page_ann_val_val']; ?></a>
								<a class="col_4" href="ann_modif.php?id=<?php echo $id_ann; ?>&amp;menu=6"><?php echo $language_adm['page_ann_val_mod']; ?></a>
						
								<input class="col_4" type="submit" value="<?php echo $language_adm['page_ann_val_ref']; ?>"/>
								
								<input type="hidden" name="id" value="<?php echo $id_ann; ?>" />
								
								<textarea cols="70" rows="1" class="textarea_col" name="msg" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_ref_msg']); ?>')" value=""><?php echo $language_adm['page_ann_val_ref_msg']; ?></textarea>

								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>modif" name="modif" value="1" checked="checked" onclick="turnImgCheck(this);" />
									<img src="images/check2.png" id="img_check_<?php echo $id_ann; ?>modif" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_modif'] .'</span>'; ?>
								</div>
								
								<div class="check_col">
									<input type="checkbox" class="input_checkbox" id="<?php echo $id_ann; ?>email" name="email" value="<?php echo $email; ?>" onclick="turnImgCheck(this);" />
									<img src="images/check1.png" id="img_check_<?php echo $id_ann; ?>email" alt="" />
								</div>
								
								<div class="check_col">
									<?php echo '<span class="p_infos">'. $language_adm['page_ann_val_ban'] .'</span>'; ?>
								</div>
					
							</form>
					<?php
					}
					
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($annonces)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_ann_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				if($type == 1) $url = 'ann_gest_att.php?menu=6';
				if($type == 2) $url = 'ann_gest_val.php?menu=6';
				if($type == 3) $url = 'ann_gest_ref.php?menu=6';
				if($type == 4) $url = 'ann_gest_del.php?menu=6';
				if($type == 0) $url = 'ann_gest_conf.php?menu=6';
				
				if(!empty($id_ann_search)) $url .= '&amp;id_ann='. $id_ann_search;
				if(!empty($cat_search)) $url .= '&amp;cat='. $cat_search;
				if(!empty($reg_search)) $url .= '&amp;reg='. $reg_search;
				if(!empty($email_ann_search)) $url .= '&amp;email='. $email_ann_search;
				if(!empty($_GET['id_compte'])) $url .= '&amp;id_compte='. (int) $_GET['id_compte'] .'&email_compte='. stripslashes(htmlspecialchars($_GET['email_compte'], ENT_QUOTES));
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language_adm['page_ann_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language_adm['page_ann_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language_adm['page_ann_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE ANNONCE -----  ///

function htm_modif_ann($annonce, $images, $e)
{
	global $language_adm, $cache_regions, $cache_departements, $cache_categories, $cache_param_champs;
	
	foreach($annonce as $row)	
	{
		$id_ann = (int) $row['id_ann'];
		$id_reg = (int) $row['id_reg'];
		$id_dep = (int) $row['id_dep'];
		$id_cat = (int) $row['id_cat'];
		$email = stripslashes(htmlspecialchars($row['email'], ENT_QUOTES));
		$code_pos = stripslashes(htmlspecialchars($row['code_pos'], ENT_QUOTES));
		$ville = stripslashes(htmlspecialchars($row['ville'], ENT_QUOTES));
		$type =(int) $row['type'];
		$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
		$tel = stripslashes(htmlspecialchars($row['tel'], ENT_QUOTES));
		$titre = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
		$ann = stripslashes(htmlspecialchars($row['ann'], ENT_QUOTES));
		$prix = (float) $row['prix'];
		$tel_cache = (int) $row['tel_cache'];
		$tete = (int) $row['tete'];
		$tete_jour = (int) $row['jour_tete'];
		$tete_date = (int) $row['time_tete'];
		$tete_date = date('d/m/Y', $tete_date);
		$urg = (int) $row['urg'];
		$urg_jour = (int) $row['jour_urg'];
		$urg_date = (int) $row['time_urg'];
		$urg_date = date('d/m/Y', $urg_date);
		$enc = (int) $row['enc'];
		$enc_jour = (int) $row['jour_enc'];
		$enc_date = (int) $row['time_enc'];
		$enc_date = date('d/m/Y', $enc_date);
		$une = (int) $row['une'];
		$une_jour = (int) $row['jour_une'];
		$une_date = (int) $row['time_une'];
		$une_date = date('d/m/Y', $une_date);
		$nom_societe = stripslashes(htmlspecialchars($row['nom_societe'], ENT_QUOTES));
		$siret = stripslashes(htmlspecialchars($row['siret'], ENT_QUOTES));
		$video = stripslashes(htmlspecialchars($row['video'], ENT_QUOTES));
	}
	
	$aff = '';

	foreach($cache_departements as $row)
	{
		if($row['id_reg'] == $id_reg)
		$aff = '1';
	}

?>	
	
<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_ann_info'] .' n°'. $id_ann; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
		
		<?php
	    
		$count = count($images);
		
		if(($count != 0))
		{
			echo '<div class="form_left_2"></div><div class="form_right">';
			
			if($count < 5)
			{
				for($i = 0; $i < $count; $i++)
				echo '<img src="../images/photos/'. $images[$i]['nom'] .'" width="50" height="35"> ';
				
				echo '</div>';
				
				echo '<div class="form_left_2"></div><div class="form_right">';
				
				for($i = 0; $i < $count; $i++)
				echo '<a href="ann_supp_photo.php?nom='. $images[$i]['nom'] .'&amp;id='. $id_ann .'"><img src="images/retirer.gif" width="50" height="10"></a> ';
				
				echo '</div>';
			}
			else
			{
				for($i = 0; $i < 5; $i++)
				echo '<img src="../images/photos/'. $images[$i]['nom'] .'" width="50" height="35"> ';
				
				echo '</div>';
				
				echo '<div class="form_left_2"></div><div class="form_right">';
				
				for($i = 0; $i < 5; $i++)
				echo '<a href="ann_supp_photo.php?nom='. $images[$i]['nom'] .'&amp;id='. $id_ann .'"><img src="images/retirer.gif" width="50" height="10"></a> ';
				
				echo '</div>';
			}
		}
		if(($count > 5))
		{
			echo '<div class="form_left_2"></div><div class="form_right">';
			
			for($i = 5; $i < $count; $i++)
			echo '<img src="../images/photos/'. $images[$i]['nom'] .'" width="50" height="35"> ';
			
			echo '</div>';
			
			echo '<div class="form_left_2"></div><div class="form_right">';
			
			for($i = 5; $i < $count; $i++)
			echo '<a href="ann_supp_photo.php?nom='. $images[$i]['nom'] .'&amp;id='. $id_ann .'"><img src="images/retirer.gif" width="50" height="10"></a> ';
			
			echo '</div>';
		}
		
		if(!empty($video))
		{
			if(preg_match("#^http://www.youtube.com/watch\?v#", $video))
			{
				$type_vid = 1;
				$video = str_replace('http://www.youtube.com/watch?v=', '', $video);
			}
			elseif(preg_match("#^http://www.dailymotion.com/video/#", $video))
			{
				$type_vid = 2;
				$video = str_replace('http://www.dailymotion.com/video/', '', $video);
			}
			else $type_vid = 0;
			
			if($type_vid == 1)
			echo '<div class="form_left_2"></div><div class="form_right_2"><object type="application/x-shockwave-flash" width="280" height="200" data="http://www.youtube.com/v/'. $video .'&hl=fr_FR&fs=1&"><param name="movie" value="http://www.youtube.com/v/'. $video .'&hl=fr_FR&fs=1&" /><param name="allowfullscreen" value="true" /></object></div>';

			elseif($type_vid == 2)
			echo '<div class="form_left_2"></div><div class="form_right_2"><object type="application/x-shockwave-flash" width="280" height="200" data="http://www.dailymotion.com/swf/video/'. $video .'?width=&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=0&additionalInfos=0&autoPlay=0&hideInfos=0"><param name="movie" value="http://www.dailymotion.com/swf/video/'. $video .'?width=&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=0&additionalInfos=0&autoPlay=0&hideInfos=0"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param></object></div>';
		
			echo '<div class="form_left_2"></div><div class="form_right_2"><a href="ann_supp_video.php?id='. $id_ann .'" class="txt_info">'. $language_adm['page_mod_supp_video'] .'</a></div>';
		}
		
		if(!empty($e) && $e == 1) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error7'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error8'] .'</span></p></div>';
		if(!empty($e) && $e == 9) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error9'] .'</span></p></div>';
		if(!empty($e) && $e == 10) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error10'] .'</span></p></div>';
		if(!empty($e) && $e == 11) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error11'] .'</span></p></div>';
		if(!empty($e) && $e == 12) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error12'] .'</span></p></div>';
		if(!empty($e) && $e == 13) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error13'] .'</span></p></div>';
		if(!empty($e) && $e == 14) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error14'] .'</span></p></div>';
		if(!empty($e) && $e == 15) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error15'] .'</span></p></div>';
		if(!empty($e) && $e == 16) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error16'] .'</span></p></div>';
		if(!empty($e) && $e == 17) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_mod_ann_error17'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_tit']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_long" name="tit" value="<?php if(isset($_POST['tit'])) echo htmlspecialchars($_POST['tit']); else echo $titre; ?>" /></div>
		
		<div class="form_left_2" valign="top"><?php echo $language_adm['page_mod_ann_ann']; ?> :</div>
		<div class="form_right_2"><textarea cols="60" rows="10" class="textarea" name="ann" value=""><?php if(isset($_POST['ann'])) echo htmlspecialchars($_POST['ann']); else echo $ann; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_reg']; ?> :</div>
		<div class="form_right_2"><?php if(is_array($cache_categories)) display_adm_regions_search($id_reg, $cache_regions, $language_adm['page_mod_ann_reg']); ?></div>
		
		<div id="get_departements">
		
			<?php
			if($aff == 1)
			{
			?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_dep']; ?> :</div>
			<div class="form_right_2"><?php if(is_array($cache_categories)) display_adm_departements_search($id_dep, $id_reg, $cache_departements, $language_adm['page_mod_ann_dep']); ?></div>
			<?php
			}
			?>
			
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_cat']; ?> :</div>
		<div class="form_right_2"><?php if(is_array($cache_categories)) display_adm_categories_search($id_cat, $cache_categories, $language_adm['page_mod_ann_cat']); ?></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_email']; ?> :</div>
		<div class="form_right_2"><input class="input_con" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); else echo $email; ?>" /></div>
		
		<?php
		if(!empty($nom_societe))
		{
		?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_ent']; ?> :</div>
			<div class="form_right_2"><input class="input_con" name="nom_societe" value="<?php if(isset($_POST['nom_societe'])) echo htmlspecialchars($_POST['nom_societe']); else echo $nom_societe; ?>" /></div>
			
			<?php
			if($cache_param_champs['act_siret'] == 1)
			{
			?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_sir']; ?> :</div>
			<div class="form_right_2"><input class="input_con" name="siret" value="<?php if(isset($_POST['siret'])) echo htmlspecialchars($_POST['siret']); else echo $siret; ?>" /></div>
		<?php
			}
		}
		?>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_nom']; ?> :</div>
		<div class="form_right_2"><input class="input_con" name="nom" value="<?php if(isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); else echo $nom; ?>" /></div>
		
		
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_code_pos']; ?> :</div>
			<div class="form_right_2"><input class="input_con" name="code_pos" value="<?php if(isset($_POST['code_pos'])) echo htmlspecialchars($_POST['code_pos']); else echo $code_pos; ?>" /></div>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_vil'] == 1)
		{
		?>
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_vil']; ?> :</div>
		<div class="form_right_2"><input class="input_con" name="vil" value="<?php if(isset($_POST['vil'])) echo htmlspecialchars($_POST['vil']); else echo $ville; ?>" /></div>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_tel'] == 1)
		{
		?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_tel']; ?> :</div>
			<div class="form_right_2"><input class="input_con" name="tel" value="<?php if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); else echo $tel; ?>" /></div>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_prix'] == 1)
		{
		?>
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_prix']; ?> :</div>
			<div class="form_right_2"><input class="input_sma" name="prix" value="<?php if(isset($_POST['prix'])) echo htmlspecialchars($_POST['prix']); elseif(!empty($prix)) echo $prix; ?>" /></div>
		<?php
		}
		?>
		
		<div id="conteneurRadio2">
		 
			<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_typ']; ?> :</div>
			<div class="form_right_radio conteneurRadio" >
			<span class="txt_info">
			
				<div style="float: left;">
				<input type="radio" id="type1" name="type" onclick="turnImgRadio(this, 2);" value="1" <?php if (isset($_POST['type']) AND $_POST['type'] == 1) echo 'checked = "checked"'; elseif (!isset($_POST['tit']) && $type == 1) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['type']) AND $_POST['type'] == 1) echo 'src="images/radio2.png"'; elseif (!isset($_POST['tit']) && $type == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_type1" alt="" />
				</div>
				<div style="float: left; padding: 3px 10px 0 3px;"><label for="type1"><?php echo $language_adm['page_mod_ann_form_typ1']; ?></label></div>
				
				<div style="float: left;">
				<input type="radio" id="type2" name="type" onclick="turnImgRadio(this, 2);" value="2" <?php if (isset($_POST['type']) AND $_POST['type'] == 2) echo 'checked = "checked"'; elseif (!isset($_POST['tit']) && $type == 2) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['type']) AND $_POST['type'] == 2) echo 'src="images/radio2.png"'; elseif (!isset($_POST['tit']) && $type == 2) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_type2" alt="" />
				</div>
				<div style="float: left; padding: 3px 10px 0 3px;"><label for="type2"><?php echo $language_adm['page_mod_ann_form_typ2']; ?></label></div>
			
				<div style="float: left;">
				<input type="radio" id="type3" name="type" onclick="turnImgRadio(this, 2);" value="3" <?php if (isset($_POST['type']) AND $_POST['type'] == 3) echo 'checked = "checked"'; elseif (!isset($_POST['tit']) && $type == 3) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['type']) AND $_POST['type'] == 3) echo 'src="images/radio2.png"'; elseif (!isset($_POST['tit']) && $type == 3) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_type3" alt="" />
				</div>
				<div style="float: left; padding: 3px 10px 0 3px;"><label for="type3"><?php echo $language_adm['page_mod_ann_form_typ3']; ?></label></div>
				
				<div style="float: left;">
				<input type="radio" id="type4" name="type" onclick="turnImgRadio(this, 2);" value="4" <?php if (isset($_POST['type']) AND $_POST['type'] == 4) echo 'checked = "checked"'; elseif (!isset($_POST['tit']) && $type == 4) echo 'checked = "checked"'; ?> />
				<img <?php if (isset($_POST['type']) AND $_POST['type'] == 4) echo 'src="images/radio2.png"'; elseif (!isset($_POST['tit']) && $type == 4) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_type4" alt="" />
				</div>
				<div style="float: left; padding: 3px 10px 0 3px;"><label for="type4"><?php echo $language_adm['page_mod_ann_form_typ4']; ?></label></div>
			
			</span>
			</div>
		
		</div>
	
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_mont']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_mont" name="opt_mont" value="1" <?php if(!empty($tete) || isset($_POST['opt_mont'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($tete) || isset($_POST['opt_mont'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_mont" alt="" />
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_mont_j']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="jour_mont" value="<?php if(isset($_POST['jour_mont'])) echo htmlspecialchars($_POST['jour_mont']); elseif(!empty($tete_jour)) echo $tete_jour; else echo '0'; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="date_tete" value="<?php if(isset($_POST['date_tete'])) echo htmlspecialchars($_POST['date_tete']); elseif(!empty($tete_date)) echo $tete_date; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_une']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_une" name="opt_une" value="1" <?php if(!empty($une) || isset($_POST['opt_une'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($une) || isset($_POST['opt_une'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_une" alt="" />
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_une_j']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="jour_une" value="<?php if(isset($_POST['jour_une'])) echo htmlspecialchars($_POST['jour_une']); elseif(!empty($une_jour)) echo $une_jour; else echo '0'; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="date_une" value="<?php if(isset($_POST['date_une'])) echo htmlspecialchars($_POST['date_une']); elseif(!empty($une_date)) echo $une_date; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_urg']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_urg" name="opt_urg" value="1" <?php if(!empty($urg) || isset($_POST['opt_urg']))  echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($urg) || isset($_POST['opt_urg'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_urg" alt="" />
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_urg_j']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="jour_urg" value="<?php if(isset($_POST['jour_urg'])) echo htmlspecialchars($_POST['jour_urg']); elseif(!empty($urg_jour)) echo $urg_jour; else echo '0'; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="date_urg" value="<?php if(isset($_POST['date_urg'])) echo htmlspecialchars($_POST['date_urg']); elseif(!empty($urg_date)) echo $urg_date; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_enc']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_enc" name="opt_enc" value="1" <?php if(!empty($enc) || isset($_POST['opt_enc'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($enc) || isset($_POST['opt_enc']))  echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_enc" alt="" />
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_enc_j']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="jour_enc" value="<?php if(isset($_POST['jour_enc'])) echo htmlspecialchars($_POST['jour_enc']); elseif(!empty($enc_jour)) echo $enc_jour; else echo '0'; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_sma" name="date_enc" value="<?php if(isset($_POST['date_enc'])) echo htmlspecialchars($_POST['date_enc']); elseif(!empty($enc_date)) echo $enc_date; ?>" /></div>
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA GESTION DES COMPTES -----  ///

function htm_validation_compte_center($type, $type_acc, $array, $comptes, $page, $max_page)
{	
	global $language_adm, $cache_regions, $cache_categories, $param_gen;
	
	$id_compte_search = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : '';
	$email_compte_search = (!empty($array['email'])) ? htmlspecialchars($array['email'], ENT_QUOTES) : '';
	$cat_search = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg_search = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($type == 1) echo $language_adm['page_acc_val_info1'];
			if($type == 2) echo $language_adm['page_acc_val_info2'];
			if($type == 3) echo $language_adm['page_acc_val_info3'];
			if($type == 4) echo $language_adm['page_acc_val_info4'];
			if($type == 5) echo $language_adm['page_acc_val_info5'];
			if($type == 6) echo $language_adm['page_acc_val_info6'];
			if($type == 7) echo $language_adm['page_acc_val_info7'];
			if($type == 8) echo $language_adm['page_acc_val_info8'];
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="get" action="">
	
	<div class="menus_r_fond">
	 
		<div id="recherche">
			<div class="recherche_l"><input type="text" class="input_sma" name="id_compte" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_input']); ?>')" value="<?php if(!empty($id_compte_search)) echo $id_compte_search; else echo $language_adm['page_acc_val_input'] ?>" /></div>
			<div class="recherche_l"><input type="text" class="input_con" name="email" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_mail']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_mail']); ?>')" value="<?php if(!empty($email_compte_search)) echo $email_compte_search; else echo $language_adm['page_acc_val_mail'] ?>" /></div>
			<div class="recherche_l"><?php if(is_array($cache_categories)) display_adm_categories_search($cat_search, $cache_categories, $language_adm['search_cat']); ?></div>
			<div class="recherche_l"><?php if(is_array($cache_regions)) display_adm_regions_search($reg_search, $cache_regions, $language_adm['search_reg']); ?><input type="hidden" name="menu" value="7" /><input type="hidden" name="type" value="<?php echo $type_acc; ?>" /></div>
			<div id="recherche_l_submit"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_rechercher']; ?>" /></div>
		</div>
	 
		<?php
			
			if(is_array($comptes))
			{
				$i = 1;	
				
				foreach($comptes as $row)
				{
					$id_compte = htmlspecialchars($row['id_compte'], ENT_QUOTES);
					$id_reg = stripslashes(htmlspecialchars($row['id_reg'], ENT_QUOTES));
					$id_cat = stripslashes(htmlspecialchars($row['id_cat'], ENT_QUOTES));
					$ent = stripslashes(htmlspecialchars($row['nom_ent'], ENT_QUOTES));
					$sir = stripslashes(htmlspecialchars($row['siret'], ENT_QUOTES));
					$civilite = stripslashes(htmlspecialchars($row['civilite'], ENT_QUOTES));
					$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
					$prenom = stripslashes(htmlspecialchars($row['prenom'], ENT_QUOTES));
					$add = stripslashes(htmlspecialchars($row['adresse'], ENT_QUOTES)); 
					$code_pos = stripslashes(htmlspecialchars($row['code_pos'], ENT_QUOTES));
					$vil = stripslashes(htmlspecialchars($row['ville'], ENT_QUOTES));
					$tel = stripslashes(htmlspecialchars($row['tel'], ENT_QUOTES));
					$ip = htmlspecialchars($row['ip'], ENT_QUOTES);
					$email = htmlspecialchars($row['email'], ENT_QUOTES);
				
					$nom_cat = '';
					$nom_reg = '';
					
					foreach($cache_categories as $v)
					{
						if($v['id_cat'] == $id_cat)
						$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
					}
				 
					foreach($cache_regions as $v)
					{
						if($v['id_reg'] == $id_reg) 
						$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
					}
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
	                
					echo '<p class="p_title"><strong>'. $i .' - '. $ent .'</strong></p>';
					
					echo '<p class="p_infos"><strong>'.  $language_adm['page_acc_val_id'] .' : </strong>'. $id_compte;
					
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_civ'] .' :</strong> '. $civilite .' &nbsp; <strong>'. $language_adm['page_acc_val_nom'] .' : </strong>'. $nom .' &nbsp; <strong>'. $language_adm['page_acc_val_pre'] .' : </strong>'. $prenom;
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_cat'] .' :</strong> '. $nom_cat .' &nbsp; <strong>'. $language_adm['page_acc_val_reg'] .' : </strong>'. $nom_reg;
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_cod'] .' : </strong>'. $code_pos;
					
					if(!empty($vil))
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_vil'] .' : </strong>'. $vil .'</p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_acc_val_ema'] .' : </strong>'. $email;
					
					if(!empty($tel)) echo ' &nbsp; <strong>'. $language_adm['page_acc_val_tel'] .' : </strong>'. $tel;
					
					if(!empty($ent))
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_soc'] .' : </strong>'. $ent;

					if(!empty($sir))
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_sir'] .' : </strong>'. $sir;
				
					
					echo ' &nbsp; <strong>'. $language_adm['page_acc_val_ip'] .' : </strong>'. $ip .' &nbsp; <a class="lien_g" href="http://www.geoiptool.com/?IP='. $ip .'" target="_blank">'. $language_adm['page_acc_val_geo_ip'] .'</a></p>';
				 	
					if($type == 1 || $type == 4)
					{
						echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_1" href="acc_valid.php?id='. $id_compte .'">'. $language_adm['page_acc_val_val'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="acc_modif.php?id='. $id_compte .'&amp;menu=7">'. $language_adm['page_acc_val_mod'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="acc_refus.php?id='. $id_compte .'" onClick="return confirm(\''. $language_adm['page_acc_val_ref'] .' ?\');">'. $language_adm['page_acc_val_ref'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="acc_refus.php?id='. $id_compte .'&amp;email='. $email .'" onclick="return confirm(\''. addslashes($language_adm['page_acc_val_sup_ban']) .' ?\');">'. $language_adm['page_acc_val_sup_ban'] .'</a></li>
						</ul>';
					}
					if($type == 2 || $type == 5)
					{
						echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_2" href="acc_modif.php?id='. $id_compte .'&amp;menu=7">'. $language_adm['page_acc_val_mod'] .'</a></li>
						<li class="li_contenu"><a class="col_2" href="acc_refus.php?id='. $id_compte .'" onClick="return confirm(\''. $language_adm['page_acc_val_ref'] .' ?\');">'. $language_adm['page_acc_val_ref'] .'</a></li>
						<li class="li_contenu"><a class="col_2" href="acc_refus.php?id='. $id_compte .'&amp;email='. $email .'" onclick="return confirm(\''. addslashes($language_adm['page_acc_val_sup_ban']) .' ?\');">'. $language_adm['page_acc_val_sup_ban'] .'</a></li>
						<li class="li_contenu"><a class="col_2" href="ann_gest_val.php?id_compte='. $id_compte .'&amp;email_compte='. $email .'&amp;menu=7">'. $language_adm['page_acc_ann'] .'</a></li>
						</ul>';
					}
					if($type == 3 || $type == 6)
					{
						echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_3" href="acc_valid.php?id='. $id_compte .'">'. $language_adm['page_acc_val_val'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="acc_modif.php?id='. $id_compte .'&amp;menu=7">'. $language_adm['page_acc_val_mod'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="acc_refus.php?id='. $id_compte .'&amp;email='. $email .'" onClick="return confirm(\''. addslashes($language_adm['page_acc_val_ban']) .' ?\');">'. $language_adm['page_acc_val_ban'] .'</a></li>
						<li class="li_contenu"><a class="col_3" href="acc_supp.php?id='. $id_compte .'&amp;menu=7" onclick="return confirm(\''. $language_adm['page_ann_val_sup'] .' ?\');">'. $language_adm['page_acc_val_sup'] .'</a></li>
						</ul>';
					}
					if($type == 7 || $type == 8)
					{
						echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_4" href="acc_valid.php?id='. $id_compte .'">'. $language_adm['page_acc_val_val'] .'</a></li>
						<li class="li_contenu"><a class="col_4" href="acc_modif.php?id='. $id_compte .'&amp;menu=7">'. $language_adm['page_acc_val_mod'] .'</a></li>
						<li class="li_contenu"><a class="col_4" href="acc_refus.php?id='. $id_compte .'" onClick="return confirm(\''. $language_adm['page_acc_val_ref'] .' ?\');">'. $language_adm['page_acc_val_ref'] .'</a></li>
						<li class="li_contenu"><a class="col_4" href="acc_refus.php?id='. $id_compte .'&amp;email='. $email .'" onclick="return confirm(\''. addslashes($language_adm['page_acc_val_sup_ban']) .' ?\');">'. $language_adm['page_acc_val_sup_ban'] .'</a></li>
						</ul>';
					}
					
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($comptes)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_ann_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				if($type == 1) $url = 'acc_gest_att.php?menu=7&amp;type=1';
				if($type == 2) $url = 'acc_gest_val.php?menu=7&amp;type=1';
				if($type == 3) $url = 'acc_gest_ref.php?menu=7&amp;type=1';
				if($type == 4) $url = 'acc_gest_att.php?menu=7&amp;type=2';
				if($type == 5) $url = 'acc_gest_val.php?menu=7&amp;type=2';
				if($type == 6) $url = 'acc_gest_ref.php?menu=7&amp;type=2';
				if($type == 7) $url = 'acc_gest_conf.php?menu=7&amp;type=1';
				if($type == 8) $url = 'acc_gest_conf.php?menu=7&amp;type=2';
				
				if(!empty($id_compte_search)) $url .= '&amp;id_compte='. $id_compte_search;
				if(!empty($email_compte_search)) $url .= '&amp;email='. $email_compte_search;
				if(!empty($cat_search)) $url .= '&amp;cat='. $cat_search;
				if(!empty($reg_search)) $url .= '&amp;reg='. $reg_search;
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language_adm['page_ann_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language_adm['page_ann_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language_adm['page_ann_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UN COMPTE -----  ///

function htm_modif_acc($compte, $e)
{
	global $language_adm, $cache_regions, $cache_departements, $cache_categories, $cache_param_champs;
	
	foreach($compte as $row)	
	{
		$id_compte = (int) $row['id_compte'];
		$id_reg = (int) $row['id_reg'];
		$id_dep = (int) $row['id_dep'];
		$id_cat = (int) $row['id_cat'];
		$nom_societe = stripslashes(htmlspecialchars($row['nom_ent'], ENT_QUOTES));
		$siret = stripslashes(htmlspecialchars($row['siret'], ENT_QUOTES));
		$civ = stripslashes(htmlspecialchars($row['civilite'], ENT_QUOTES));
		$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
		$prenom = stripslashes(htmlspecialchars($row['prenom'], ENT_QUOTES));
		$add = stripslashes(htmlspecialchars($row['adresse'], ENT_QUOTES));
		$code_pos = stripslashes(htmlspecialchars($row['code_pos'], ENT_QUOTES));
		$ville = stripslashes(htmlspecialchars($row['ville'], ENT_QUOTES));
		$tel = stripslashes(htmlspecialchars($row['tel'], ENT_QUOTES));
		$email = stripslashes(htmlspecialchars($row['email'], ENT_QUOTES));
	}
	
	$aff = '';

	foreach($cache_departements as $row)
	{
		if($row['id_reg'] == $id_dep)
		$aff = '1';
	}

?>	
	
<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_acc_info'] .' n°'. $id_compte; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
		
		<?php
	    
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error7'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error8'] .'</span></p></div>';
		if(!empty($e) && $e == 9) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error9'] .'</span></p></div>';
		if(!empty($e) && $e == 10) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_acc_error10'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_mod_acc_reg']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_regions_search($id_reg, $cache_regions, $language_adm['page_mod_ann_reg']); ?></div>
		
		<div id="get_departements">
		
			<?php
			if($aff == 1)
			{
			?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_dep']; ?> :</div>
			<div class="form_right"><?php if(is_array($cache_categories)) display_adm_departements_search($id_dep, $id_reg, $cache_departements, $language_adm['page_mod_ann_dep']); ?></div>
			<?php
			}
			?>
			
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_acc_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_search($id_cat, $cache_categories, $language_adm['page_mod_ann_cat']); ?></div>
		
		<?php
		if(!empty($nom_societe))
		{
		?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_ent']; ?> :</div>
			<div class="form_right"><input class="input_con" name="nom_societe" value="<?php if(isset($_POST['nom_societe'])) echo htmlspecialchars($_POST['nom_societe']); else echo $nom_societe; ?>" /></div>
			
			<?php
			if($cache_param_champs['act_siret'] == 1)
			{
			?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_sir']; ?> :</div>
			<div class="form_right"><input class="input_con" name="siret" value="<?php if(isset($_POST['siret'])) echo htmlspecialchars($_POST['siret']); else echo $siret; ?>" /></div>
		<?php
			}
		}
		?>
		
		<p class="form_left"><label for="civ"><?php echo $language_adm['page_mod_acc_civ']; ?> :</label></p>
		
		<p class="form_right">
			<select id="civ" name="civ" class="select_civ">
				<option value="<?php echo $language_adm['page_mod_acc_civ1']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language_adm['page_mod_acc_civ1']) echo 'selected="selected"'; elseif($civ ==  $language_adm['page_mod_acc_civ1']) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_mod_acc_civ1']; ?></option>
				<option value="<?php echo $language_adm['page_mod_acc_civ2']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language_adm['page_mod_acc_civ2']) echo 'selected="selected"'; elseif($civ ==  $language_adm['page_mod_acc_civ2']) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_mod_acc_civ2']; ?></option>
				<option value="<?php echo $language_adm['page_mod_acc_civ3']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language_adm['page_mod_acc_civ3']) echo 'selected="selected"'; elseif($civ ==  $language_adm['page_mod_acc_civ3']) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_mod_acc_civ3']; ?></option>
			</select>
		</p>
		
		<div class="form_left"><?php echo $language_adm['page_mod_acc_nom']; ?> :</div>
		<div class="form_right"><input class="input_con" name="nom" value="<?php if(isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); else echo $nom; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_acc_prenom']; ?> :</div>
		<div class="form_right"><input class="input_con" name="prenom" value="<?php if(isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']); else echo $prenom; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_acc_add']; ?> :</div>
		<div class="form_right"><input class="input_con" name="add" value="<?php if(isset($_POST['add'])) echo htmlspecialchars($_POST['add']); else echo $add; ?>" /></div>
		
		
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_code_pos']; ?> :</div>
			<div class="form_right"><input class="input_con" name="code_pos" value="<?php if(isset($_POST['code_pos'])) echo htmlspecialchars($_POST['code_pos']); else echo $code_pos; ?>" /></div>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_vil'] == 1)
		{
		?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_vil']; ?> :</div>
			<div class="form_right"><input class="input_con" name="vil" value="<?php if(isset($_POST['vil'])) echo htmlspecialchars($_POST['vil']); else echo $ville; ?>" /></div>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_tel'] == 1)
		{
		?>
			<div class="form_left"><?php echo $language_adm['page_mod_acc_tel']; ?> :</div>
			<div class="form_right"><input class="input_con" name="tel" value="<?php if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); else echo $tel; ?>" /></div>
		<?php
		}
		?>
		
		<div class="form_left"><?php echo $language_adm['page_mod_acc_email']; ?> :</div>
		<div class="form_right"><input class="input_con" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); else echo $email; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA GESTION DES VITRINES -----  ///

function htm_validation_vitrines_center($array, $vitrines, $page, $max_page)
{	
	global $language_adm, $cache_regions, $cache_categories, $param_gen;
	
	$id_compte_search = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : '';
	$cat_search = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg_search = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_vit_val_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="get" action="">
	
	<div class="menus_r_fond">
	 
		<div id="recherche">
			<div class="recherche_l"><input type="text" class="input_sma" name="id_compte" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_vit_val_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_vit_val_input']); ?>')" value="<?php if(!empty($id_compte_search)) echo $id_compte_search; else echo $language_adm['page_vit_val_input'] ?>" /></div>
			<div class="recherche_l"><?php if(is_array($cache_categories)) display_adm_categories_search($cat_search, $cache_categories, $language_adm['search_cat']); ?></div>
			<div class="recherche_l"><?php if(is_array($cache_regions)) display_adm_regions_search($reg_search, $cache_regions, $language_adm['search_reg']); ?><input type="hidden" name="menu" value="27" /></div>
			<div id="recherche_l_submit"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_rechercher']; ?>" /></div>
		</div>
	 
		<?php
			
			if(is_array($vitrines))
			{
				$i = 1;	
				
				foreach($vitrines as $row)
				{
					$id_vitrine = (int) $row['id_boutique'];
					$tit = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
					$desc = stripslashes(htmlspecialchars($row['description'], ENT_QUOTES));
					$hor = stripslashes(htmlspecialchars($row['horaires'], ENT_QUOTES));
					$web = stripslashes(htmlspecialchars($row['site_web'], ENT_QUOTES));
					$logo = stripslashes(htmlspecialchars($row['nom_logo'], ENT_QUOTES));
					$id_compte = (int) $row['id_compte'];
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
	                
					echo '<p class="p_title"><strong>'. $i .' - '. $tit .'</strong></p>';
					
					if(!empty($logo))
					echo '<p class="p_photos"><img src="../images/logos/'. $logo .'" width="90" height="65"></p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_vit_val_acc'] .' :</strong> '. $id_compte;
					echo ' &nbsp; <strong>'. $language_adm['page_vit_val_hor'] .' : </strong>'. $hor;
					echo ' &nbsp; <strong>'. $language_adm['page_vit_val_web'] .' : </strong>'. $web .'</p>';
					echo '<p class="p_texte">'. $desc .'</p>';
					
					echo '<ul id="ul_contenu"><li class="li_contenu"><a class="col_1" href="vit_modif.php?id='. $id_vitrine .'&amp;menu=27">'. $language_adm['page_vit_val_mod'] .'</a></li></ul>';
					
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($vitrines)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_vit_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				$url = 'vit_gest.php?menu=27';
	
				if(!empty($id_compte_search)) $url .= '&amp;id_compte='. $id_compte_search;
				if(!empty($cat_search)) $url .= '&amp;cat='. $cat_search;
				if(!empty($reg_search)) $url .= '&amp;reg='. $reg_search;
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language_adm['page_vit_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language_adm['page_vit_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language_adm['page_vit_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE VITRINE -----  ///

function htm_modif_vit($vitrine, $e)
{
	global $language_adm;
	
	foreach($vitrine as $row)	
	{
		$id_vitrine = (int) $row['id_boutique'];
		$tit = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
		$desc = stripslashes(htmlspecialchars($row['description'], ENT_QUOTES));
		$hor = stripslashes(htmlspecialchars($row['horaires'], ENT_QUOTES));
		$web = stripslashes(htmlspecialchars($row['site_web'], ENT_QUOTES));
		$logo = stripslashes(htmlspecialchars($row['nom_logo'], ENT_QUOTES));
		$tete = (int) $row['tete'];
		$jour_tete = (int) $row['jour_tete'];
		$date_tete = (int) $row['time_tete'];
		$date_tete = date('d/m/Y', $date_tete);
		$enc = (int) $row['enc'];
		$jour_enc = (int) $row['jour_enc'];
		$date_enc = (int) $row['time_enc'];
		$date_enc = date('d/m/Y', $date_enc);
		$une = (int) $row['une'];
		$jour_une = (int) $row['jour_une'];
		$date_une = (int) $row['time_une'];
		$date_une = date('d/m/Y', $date_une);
	}

?>	
	
<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_mod_vit_info'] .' n°'. $id_vitrine; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
		
		<?php
	    
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error4'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error5'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_vit_error6'] .'</span></p></div>';
		if(!empty($e) && $e == 17) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_mod_ann_error17'] .'</span></p></div>';
		
		if(!empty($logo))
		{
			echo '<div class="form_left"></div><div class="form_right"><img src="../images/logos/'. $logo .'" width="50" height="35"></div>';
			echo '<div class="form_left"></div><div class="form_right"><a href="vit_supp_logo.php?nom='. $logo .'&amp;id='. $id_vitrine .'"><img src="images/retirer.gif" width="50" height="10"></a></div>';
		}
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_tit']; ?> :</div>
		<div class="form_right"><input class="input_con" name="tit" value="<?php if(isset($_POST['tit'])) echo htmlspecialchars($_POST['tit']); else echo $tit; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_desc']; ?> :</div>
		<div class="form_right"><input class="input_con" name="desc" value="<?php if(isset($_POST['desc'])) echo htmlspecialchars($_POST['desc']); else echo $desc; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_hor']; ?> :</div>
		<div class="form_right"><input class="input_con" name="hor" value="<?php if(isset($_POST['hor'])) echo htmlspecialchars($_POST['hor']); else echo $hor; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_web']; ?> :</div>
		<div class="form_right"><input class="input_con" name="web" value="<?php if(isset($_POST['web'])) echo htmlspecialchars($_POST['web']); else echo $web; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_form_opt_mont']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_mont" name="opt_mont" value="1" <?php if(!empty($tete) || isset($_POST['opt_mont'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($tete) || isset($_POST['opt_mont'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_mont" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_mont_j']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="jour_mont" value="<?php if(isset($_POST['jour_mont'])) echo htmlspecialchars($_POST['jour_mont']);  elseif(!empty($jour_tete)) echo $jour_tete; else echo '0'; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="date_tete" value="<?php if(isset($_POST['date_tete'])) echo htmlspecialchars($_POST['date_tete']); elseif(!empty($date_tete)) echo $date_tete; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_form_opt_une']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_une" name="opt_une" value="1" <?php if(!empty($une) || isset($_POST['opt_une'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($une) || isset($_POST['opt_une'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_une" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_une_j']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="jour_une" value="<?php if(isset($_POST['jour_une'])) echo htmlspecialchars($_POST['jour_une']);  elseif(!empty($jour_une)) echo $jour_une; else echo '0'; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="date_une" value="<?php if(isset($_POST['date_une'])) echo htmlspecialchars($_POST['date_une']); elseif(!empty($date_une)) echo $date_une; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_vit_form_opt_enc']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="opt_enc" name="opt_enc" value="1" <?php if(!empty($enc) || isset($_POST['opt_enc'])) echo 'checked="checked"'; ?> onclick="turnImgCheck(this);" />
			<img <?php if(!empty($enc) || isset($_POST['opt_enc']))  echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_opt_enc" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_enc_j']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="jour_enc" value="<?php if(isset($_POST['jour_enc'])) echo htmlspecialchars($_POST['jour_enc']);  elseif(!empty($jour_enc)) echo $jour_enc; else echo '0'; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_mod_ann_form_opt_date']; ?> :</div>
		<div class="form_right"><input type="text" class="input_sma" name="date_enc" value="<?php if(isset($_POST['date_enc'])) echo htmlspecialchars($_POST['date_enc']); elseif(!empty($date_enc)) echo $date_enc; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE SUPPRESSION D'UNE ADRESSE EMAIL BANNIE -----  ///

function htm_blacklist($e)
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_ban_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">

	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_ban_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_ban_error2'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_ban_email']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email" value="<?php if(!empty($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PARAMETRES PAYPAL -----  ///

function formulaire_param_paypal($e)
{
	global $language_adm, $cache_pay_paypal;
	
	$actif = $cache_pay_paypal['act_paypal'];
	$email = $cache_pay_paypal['email_paypal'];
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_param_paypal_info'];?></li>
	</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_ban_error1'] .'</span></p></div>';
		
		?>
	
		<div class="form_left"><?php echo $language_adm['page_param_paypal_act']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_paypal" name="act_paypal" value="1" <?php if($actif == 1) echo 'checked="checked"'; ?>  onclick="turnImgCheck(this);" />
			<img <?php if($actif == 1) echo 'src="images/check2.png"'; else  echo 'src="images/check1.png"'; ?> id="img_check_act_paypal" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_devise']; ?> :</div>
		<div class="form_right">
			<select class="input_select" name="devise">
				<option value="EUR" <?php if($cache_pay_paypal['devise'] == 'EUR') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d1']; ?></option>
				<option value="USD" <?php if($cache_pay_paypal['devise'] == 'USD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d2']; ?></option>
				<option value="CHF" <?php if($cache_pay_paypal['devise'] == 'CHF') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d3']; ?></option>
				<option value="GBP" <?php if($cache_pay_paypal['devise'] == 'GBP') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d4']; ?></option>
				<option value="CAD" <?php if($cache_pay_paypal['devise'] == 'CAD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d5']; ?></option>
				<option value="JPY" <?php if($cache_pay_paypal['devise'] == 'JPY') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d6']; ?></option>
				<option value="MXN" <?php if($cache_pay_paypal['devise'] == 'MXN') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d7']; ?></option>
				<option value="AUD" <?php if($cache_pay_paypal['devise'] == 'AUD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d9']; ?></option>  
				<option value="NZD" <?php if($cache_pay_paypal['devise'] == 'NZD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d10']; ?></option>  
				<option value="NOK" <?php if($cache_pay_paypal['devise'] == 'NOK') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d11']; ?></option>  
				<option value="BRL" <?php if($cache_pay_paypal['devise'] == 'BRL') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d12']; ?></option>  
				<option value="TWD" <?php if($cache_pay_paypal['devise'] == 'TWD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d15']; ?></option>  
				<option value="SEK" <?php if($cache_pay_paypal['devise'] == 'SEK') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d16']; ?></option>  
				<option value="DKK" <?php if($cache_pay_paypal['devise'] == 'DKK') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d17']; ?></option>  
				<option value="SGD" <?php if($cache_pay_paypal['devise'] == 'SGD') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d19']; ?></option>  
			</select>
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_param_paypal_ema']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email_paypal" value="<?php if(!empty($_POST['email_paypal'])) echo htmlspecialchars($_POST['email_paypal']); else echo $email; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PARAMETRES ALLOPASS -----  ///

function formulaire_param_allopass()
{
	global $language_adm, $param_gen, $cache_pay_allopass;
	
	$actif = $cache_pay_allopass['act_allopass'];
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_param_allopass_info'];?></li>
	</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_act']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_allopass" name="act_allopass" value="1" <?php if($actif == 1) echo 'checked="checked"'; ?>  onclick="turnImgCheck(this);" />
			<img <?php if($actif == 1) echo 'src="images/check2.png"'; else  echo 'src="images/check1.png"'; ?> id="img_check_act_allopass" alt="" />
		</div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_cod']; ?> :</div>
		<div class="form_right_2"><input class="input_con" name="code_securite" value="<?php echo $cache_pay_allopass['code_securite']; ?>" /></div>
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><span class="txt_info"><?php echo $language_adm['page_param_allopass_note'];?></span></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script1'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script1" value=""><?php echo $cache_pay_allopass['script1']; ?></textarea></div>
	
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script2'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script2" value=""><?php echo $cache_pay_allopass['script2']; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script3'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script3" value=""><?php echo $cache_pay_allopass['script3']; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script4'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script4" value=""><?php echo $cache_pay_allopass['script4']; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script5'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script5" value=""><?php echo $cache_pay_allopass['script5']; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script6'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script6" value=""><?php echo $cache_pay_allopass['script6']; ?></textarea></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_param_allopass_script7'] .' '. $param_gen['devise']; ?> :</div>
		<div class="form_right_2"><textarea cols="55" rows="4" class="textarea" name="script7" value=""><?php echo $cache_pay_allopass['script7']; ?></textarea></div>
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PARAMETRES ATOS -----  ///

function formulaire_param_atos($e)
{
	global $language_adm, $cache_pay_atos;
	
	$actif = $cache_pay_atos['act_atos'];
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_param_atos_info'];?></li>
	</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_param_atos_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_param_atos_error2'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_param_atos_act']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_atos" name="act_atos" value="1" <?php if($actif == 1) echo 'checked="checked"'; ?>  onclick="turnImgCheck(this);" />
			<img <?php if($actif == 1) echo 'src="images/check2.png"'; else  echo 'src="images/check1.png"'; ?> id="img_check_act_atos" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_marchand']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="id_marchand" value="<?php echo $cache_pay_atos['id_marchand']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_pays']; ?> :</div>
		<div class="form_right">
			<select class="input_select" name="pays">
				<option value="fr" <?php if($cache_pay_atos['pays'] == 'fr') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p1']; ?></option>
				<option value="be" <?php if($cache_pay_atos['pays'] == 'be') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p2']; ?></option>
				<option value="en" <?php if($cache_pay_atos['pays'] == 'en') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p3']; ?></option>
				<option value="it" <?php if($cache_pay_atos['pays'] == 'it') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p4']; ?></option>
				<option value="es" <?php if($cache_pay_atos['pays'] == 'es') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p5']; ?></option>
				<option value="de" <?php if($cache_pay_atos['pays'] == 'de') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_p6']; ?></option>
			</select>
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_devise']; ?> :</div>
		<div class="form_right">
			<select class="input_select" name="devise">
				<option value="978" <?php if($cache_pay_atos['devise'] == '978') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d1']; ?></option>
				<option value="840" <?php if($cache_pay_atos['devise'] == '840') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d2']; ?></option>
				<option value="756" <?php if($cache_pay_atos['devise'] == '756') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d3']; ?></option>
				<option value="826" <?php if($cache_pay_atos['devise'] == '826') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d4']; ?></option>
				<option value="124" <?php if($cache_pay_atos['devise'] == '124') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d5']; ?></option>
				<option value="392" <?php if($cache_pay_atos['devise'] == '392') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d6']; ?></option>
				<option value="484" <?php if($cache_pay_atos['devise'] == '484') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d7']; ?></option>
				<option value="949" <?php if($cache_pay_atos['devise'] == '949') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d8']; ?></option>  
				<option value="036" <?php if($cache_pay_atos['devise'] == '036') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d9']; ?></option>  
				<option value="554" <?php if($cache_pay_atos['devise'] == '554') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d10']; ?></option>  
				<option value="578" <?php if($cache_pay_atos['devise'] == '578') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d11']; ?></option>  
				<option value="986" <?php if($cache_pay_atos['devise'] == '986') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d12']; ?></option>  
				<option value="032" <?php if($cache_pay_atos['devise'] == '032') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d13']; ?></option>  
				<option value="116" <?php if($cache_pay_atos['devise'] == '116') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d14']; ?></option>  
				<option value="901" <?php if($cache_pay_atos['devise'] == '901') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d15']; ?></option>  
				<option value="752" <?php if($cache_pay_atos['devise'] == '752') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d16']; ?></option>  
				<option value="208" <?php if($cache_pay_atos['devise'] == '208') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d17']; ?></option>  
				<option value="410" <?php if($cache_pay_atos['devise'] == '410') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d18']; ?></option>  
				<option value="702" <?php if($cache_pay_atos['devise'] == '702') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d19']; ?></option>  
				<option value="953" <?php if($cache_pay_atos['devise'] == '953') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d20']; ?></option>  
				<option value="952" <?php if($cache_pay_atos['devise'] == '952') echo 'selected="selected"'; ?>><?php echo $language_adm['page_param_atos_d21']; ?></option>   
			</select>
		</div>
	
		<div class="form_left"><?php echo $language_adm['page_param_atos_fi1']; ?> :</div>
		<div class="form_right"><input type="file" class="input_file" name="file1" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_fi2']; ?> :</div>
		<div class="form_right"><input type="file" class="input_file" name="file2" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_param_atos_fi3']; ?> :</div>
		<div class="form_right"><input type="file" class="input_file" name="file3" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PARAMETRES PAYPAL -----  ///

function formulaire_param_cheque($e)
{
	global $language_adm, $cache_pay_cheque;
	
	$actif_cheque = $cache_pay_cheque['act_cheque'];
	$actif = $cache_pay_cheque['actif'];
	$texte = $cache_pay_cheque['texte'];
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
	<ul class="ul_barre_adm">
		<li class="li_barre_adm"><?php echo $language_adm['page_param_cheque_info'];?></li>
	</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left_3"></div><div class="form_right_3"><p><span class="error">'. $language_adm['page_param_cheque_err'] .'</span></p></div>';
		
		?>
	
		<div class="form_left_3"></div>
		<div class="form_right_checkbox">
			<p style="float: left">
			<input type="checkbox" class="input_checkbox" id="act_cheque" name="act_cheque" value="1" <?php if($actif_cheque == 1) echo 'checked="checked"'; ?>  onclick="turnImgCheck(this);" />
			<img <?php if($actif_cheque == 1) echo 'src="images/check2.png"'; else  echo 'src="images/check1.png"'; ?> id="img_check_act_cheque" alt="" />
			</p>
			<p class="p_note_form_2"><?php echo $language_adm['page_param_cheque_act']; ?></p>
		</div>
		
		<div class="form_left_3"></div>
		<div class="form_right_checkbox">
		<p style="float: left">
			<input type="checkbox" class="input_checkbox" id="htm_cheque" name="htm_cheque" value="1" <?php if($actif == 1) echo 'checked="checked"'; ?>  onclick="turnImgCheck(this);" />
			<img <?php if($actif == 1) echo 'src="images/check2.png"'; else  echo 'src="images/check1.png"'; ?> id="img_check_htm_cheque" alt="" />
			</p>
			<p class="p_note_form_2"><?php echo $language_adm['page_pages_crea_edit']; ?></p>
		</div>
		
		<div class="form_left_3" valign="top"></div>
		<div class="form_right_3 txt_info"><?php echo $language_adm['page_param_cheque_note']; ?></div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_pages_crea_texte']; ?> :</div>
		<div class="form_right_3"><textarea cols="90" rows="30" class="textarea" name="texte" value=""><?php if(!empty($_POST['texte'])) echo htmlspecialchars($_POST['texte']); else echo $texte; ?></textarea></div>
		
		<div class="form_left_3"></div>
		<div class="form_right_3"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE PAIEMENT DES ANNONCES -----  ///

function htm_pay_ann()
{
	global $language_adm, $cache_categories;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_pay_ann_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_pay_ann_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_opts_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_pay_ann(0, $cache_categories); ?></div>
		
		<div id="get_pay_ann">
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_par" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_pro" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par_m']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_par_mod" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro_m']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_pro_mod" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_par_r']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_par_ren" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_pro_r']; ?> :</div>
			<div class="form_right"><input class="input_con" type="text" name="prix_pro_ren" value="" /></div>
			
			<div class="form_left"><?php echo $language_adm['page_pay_ann_prix_tout']; ?> :</div>
			<div class="form_right_checkbox">
				<input type="checkbox" class="input_checkbox" id="all" name="all" value="1" onclick="turnImgCheck(this);" />
				<img <?php echo 'src="images/check1.png"'; ?> id="img_check_all" alt="" />
			</div>
		
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES OPTIONS VISUELLES -----  ///

function htm_options_visuelles($num)
{
	global $language_adm, $cache_options_visuelles, $param_gen; 

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($num == 1) echo $language_adm['page_opt_visu_info1'];
			if($num == 2) echo $language_adm['page_opt_visu_info2']; 
			if($num == 3) echo $language_adm['page_opt_visu_info3'];
			if($num == 4) echo $language_adm['page_opt_visu_info4'];
			if($num == 5) echo $language_adm['page_opt_visu_info5']; 
			if($num == 6) echo $language_adm['page_opt_visu_info6'];
			if($num == 7) echo $language_adm['page_opt_visu_info7'];
			
			?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_center">
			<?php 
			
			if($num == 1) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea1'] .'</a>';
			if($num == 2) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea2'] .'</a>'; 
			if($num == 3) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea3'] .'</a>';
			if($num == 4) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea4'] .'</a>';
			if($num == 5) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea5'] .'</a>'; 
			if($num == 6) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea6'] .'</a>';
			if($num == 7) echo '<a href="visu_opt_crea.php?num='. $num .'&amp;menu=11">'. $language_adm['page_opt_visu_crea7'] .'</a>';			
			
			?>
		</p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == $num) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_options_visuelles as $v)
			{
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = number_format($v['prix'], 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($num == $type)
				{
					echo '<li class="li_center">'. $i .' - '. $language_adm['page_opt_visu_crea_jour'] .' : '. $jour .' &nbsp;'. $language_adm['page_opt_visu_crea_prix'] .' : '. $prix .' '. $param_gen['devise'] .'
					&nbsp;<a class="lien_g" href="visu_opt_mod.php?id='. $id .'&amp;num='. $type .'&amp;menu=11">'. $language_adm['page_opt_visu_mod'] .'</a> /
					<a class="lien_sup" href="visu_opt_sup.php?id='. $id .'&amp;num='. $type .'&amp;menu=11" OnClick=" return confirm(\''. $language_adm['page_opt_visu_sup'] .' ?\');">'. $language_adm['page_opt_visu_sup'] .'</a>
					</li>';
					$i++;
				}
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'OPTIONS VISUELLES -----  ///
	
function htm_creer_visu_options($num, $e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($num == 1) echo $language_adm['page_opt_visu_crea_info1'];
			if($num == 2) echo $language_adm['page_opt_visu_crea_info2']; 
			if($num == 3) echo $language_adm['page_opt_visu_crea_info3']; 
			if($num == 4) echo $language_adm['page_opt_visu_crea_info4'];	
			if($num == 5) echo $language_adm['page_opt_visu_crea_info5']; 
			if($num == 6) echo $language_adm['page_opt_visu_crea_info6']; 
			if($num == 7) echo $language_adm['page_opt_visu_crea_info7'];	
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error3'] .'</span></p></div>';
		
		?>
		
		<?php
		if($num == 1 || $num == 5)
		{
		?>
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_opt_visu_crea1_note']; ?></p></div>
		<?php
		}
		?>
		
		<div class="form_left"><?php echo $language_adm['page_opt_visu_crea_jour']; ?> :</div>
		<div class="form_right"><input type="hidden" name="num" value="<?php echo $num; ?>" /><input class="input_con" type="text" name="jour" value="<?php if(isset($_POST['jour'])) echo $_POST['jour']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_visu_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'OPTIONS VISUELLES -----  ///
	
function htm_modifier_visu_options($id, $num, $e)
{
	global $language_adm, $cache_options_visuelles;
	
	$jour = '';
	$prix = '';
	
	foreach($cache_options_visuelles as $v)
	{
		if($v['id'] == $id)
		{
			$jour = (int) $v['jour'];
			$prix = (float) $v['prix'];
		}
	}
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($num == 1) echo $language_adm['page_opt_visu_mod_info1'];
			if($num == 2) echo $language_adm['page_opt_visu_mod_info2']; 
			if($num == 3) echo $language_adm['page_opt_visu_mod_info3'];
			if($num == 4) echo $language_adm['page_opt_visu_mod_info4'];
			if($num == 5) echo $language_adm['page_opt_visu_mod_info5']; 
			if($num == 6) echo $language_adm['page_opt_visu_mod_info6'];
			if($num == 7) echo $language_adm['page_opt_visu_mod_info7'];			
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_visu_crea_error3'] .'</span></p></div>';
		
		?>
		
		<?php
		if($num == 1 || $num == 5)
		{
		?>
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_opt_visu_crea1_note']; ?></p></div>
		<?php
		}
		?>
		
		<div class="form_left"><?php echo $language_adm['page_opt_visu_crea_jour']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input class="input_con" type="text" name="jour" value="<?php if(isset($_POST['jour'])) echo $_POST['jour']; else echo $jour; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_visu_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; else echo number_format($prix, 2, '.', ''); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE L'OPTION PHOTOS  -----  ///

function htm_option_photos($e)
{
	global $language_adm, $cache_option_photos;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_opt_photo_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_photo_error'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_opt_photo_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_photo_nb_grat']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="nb_photo_gratuite" value="<?php echo $cache_option_photos['nb_photo_gratuite']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_photo_nb_max']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="nb_photo_max" value="<?php echo $cache_option_photos['nb_photo_max']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_photo_prix']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="prix_photo" value="<?php echo number_format($cache_option_photos['prix_photo'], 2, '.', ''); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE L'OPTION VIDEO  -----  ///

function htm_option_video($e)
{
	global $language_adm, $cache_option_video;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_opt_video_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_opt_video_error'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_opt_video_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_opt_video_act']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="act_video" name="act_video" value="1" onclick="turnImgCheck(this);" <?php if($cache_option_video['actif'] == 1) echo 'checked="checked"'; ?> />
			<img <?php if($cache_option_video['actif'] == 1) echo 'src="images/check2.png"'; echo 'src="images/check1.png"'; ?> id="img_check_act_video" alt="" />
		</div>
			
		<div class="form_left"><?php echo $language_adm['page_opt_video_prix']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="prix_video" value="<?php echo number_format($cache_option_video['prix_video'], 2, '.', ''); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PACKS COMPTES -----  ///

function htm_abo_comptes($num)
{
	global $language_adm, $cache_packs_comptes, $param_gen; 

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($num == 1) echo $language_adm['page_abo_comptes_info1'];
			if($num == 2) echo $language_adm['page_abo_comptes_info2']; 
			
			?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_center">
			<?php 
			
			if($num == 1) echo '<a href="packs_comptes_crea.php?num='. $num .'&amp;menu=14">'. $language_adm['page_abo_comptes_crea1'] .'</a>';
			if($num == 2) echo '<a href="packs_comptes_crea.php?num='. $num .'&amp;menu=14">'. $language_adm['page_abo_comptes_crea2'] .'</a>'; 		
			
			?>
		</p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_packs_comptes as $v)
			if($v['type'] == $num) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_packs_comptes as $v)
			{
				$id_pack = (int) $v['id_pack'];
				$nb_annonce = (int) $v['nb_annonce'];
				$nb_jour = (int) $v['nb_jour'];
				$prix = number_format($v['prix'], 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($nb_annonce == 0)
				$nb_annonce = $language_adm['page_abo_comptes_zero'];
				
				if($nb_jour == 0)
				$nb_jour = $language_adm['page_abo_comptes_zero'];
				
				if($num == $type)
				{
					echo '<li class="li_center">'. $i .' - '. $language_adm['page_abo_comptes_crea_ann'] .' : '. $nb_annonce .' &nbsp;'. $language_adm['page_abo_comptes_crea_jour'] .' : '. $nb_jour .' &nbsp;'. $language_adm['page_abo_comptes_crea_prix'] .' : '. $prix .' '. $param_gen['devise'] .'
					&nbsp;<a class="lien_g" href="packs_comptes_mod.php?id='. $id_pack .'&amp;num='. $type .'&amp;menu=14">'. $language_adm['page_abo_comptes_mod'] .'</a> /
					<a class="lien_sup" href="packs_comptes_sup.php?id='. $id_pack .'&amp;num='. $type .'&amp;menu=14" OnClick=" return confirm(\''. $language_adm['page_abo_comptes_sup'] .' ?\');">'. $language_adm['page_abo_comptes_sup'] .'</a>
					</li>';
					$i++;
				}
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION DES PACKS COMPTES -----  ///
	
function htm_creer_abo_comptes($num, $e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($num == 1) echo $language_adm['page_abo_comptes_crea_info1'];
			if($num == 2) echo $language_adm['page_abo_comptes_crea_info2'];			
			
			?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error3'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_abo_comptes_crea_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_ann']; ?> :</div>
		<div class="form_right"><input type="hidden" name="num" value="<?php echo $num; ?>" /><input class="input_con" type="text" name="nb_annonce" value="<?php if(isset($_POST['nb_annonce'])) echo $_POST['nb_annonce']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_jour']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_jour" value="<?php if(isset($_POST['nb_jour'])) echo $_POST['nb_jour']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION DES PACKS COMPTES -----  ///
	
function htm_modifier_abo_comptes($id, $num, $e)
{
	global $language_adm, $cache_packs_comptes;
	
	$nb_annonces = '';
	$nb_jour = '';
	$prix = '';
	
	foreach($cache_packs_comptes as $v)
	{
		if($v['id_pack'] == $id)
		{
			$nb_annonce = (int) $v['nb_annonce'];
			$nb_jour = (int) $v['nb_jour'];
			$prix = (float) $v['prix'];
		}
	}
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_abo_comptes_mod_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error3'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_ann']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input class="input_con" type="text" name="nb_annonce" value="<?php if(isset($_POST['nb_annonce'])) echo $_POST['nb_annonce']; else echo $nb_annonce; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_jour']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_jour" value="<?php if(isset($_POST['nb_jour'])) echo $_POST['nb_jour']; else echo $nb_jour; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; else echo number_format($prix, 2, '.', ''); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PACKS VITRINE -----  ///

function htm_abo_vitrine()
{
	global $language_adm, $cache_packs_vitrine, $param_gen; 

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_abo_vitrine_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_center"><?php  echo '<a href="packs_vitrine_crea.php?menu=15">'. $language_adm['page_abo_vitrine_crea'] .'</a>'; ?></p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_packs_vitrine as $v)
			if(!empty($v['id_pack'])) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_packs_vitrine as $v)
			{
				$id_pack = (int) $v['id_pack'];
				$nb_jour = (int) $v['nb_jour'];
				$prix = number_format($v['prix'], 2, ',', ' ');
				
				if($nb_jour == 0)
				$nb_jour = $language_adm['page_abo_vitrine_zero'];
				
				echo '<li class="li_center">'. $i .' - '. $language_adm['page_abo_vitrine_crea_jour'] .' : '. $nb_jour .' &nbsp;'. $language_adm['page_abo_vitrine_crea_prix'] .' : '. $prix .' '. $param_gen['devise'] .'
				&nbsp;<a class="lien_g" href="packs_vitrine_mod.php?id='. $id_pack .'&amp;menu=15">'. $language_adm['page_abo_vitrine_mod'] .'</a> /
				<a class="lien_sup" href="packs_vitrine_sup.php?id='. $id_pack .'&amp;menu=15" OnClick=" return confirm(\''. $language_adm['page_abo_vitrine_sup'] .' ?\');">'. $language_adm['page_abo_vitrine_sup'] .'</a>
				</li>';
				$i++;
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION DES PACKS VITRINE -----  ///
	
function htm_creer_abo_vitrine($e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_abo_vitrine_crea_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_vitrine_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_vitrine_crea_error2'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_abo_vitrine_crea_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_jour']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nb_jour" value="<?php if(isset($_POST['nb_jour'])) echo $_POST['nb_jour']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION DES PACKS VITRINE -----  ///
	
function htm_modifier_abo_vitrine($id, $e)
{
	global $language_adm, $cache_packs_vitrine;
	
	$nb_jour = '';
	$prix = '';
	
	foreach($cache_packs_vitrine as $v)
	{
		if($v['id_pack'] == $id)
		{
			$nb_jour = (int) $v['nb_jour'];
			$prix = (float) $v['prix'];
		}
	}
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_abo_comptes_mod_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_abo_comptes_crea_error3'] .'</span></p></div>';
		
		?>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_jour']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="text" class="input_con" name="nb_jour" value="<?php if(isset($_POST['nb_jour'])) echo $_POST['nb_jour']; else echo $nb_jour; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_abo_comptes_crea_prix']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; else echo number_format($prix, 2, '.', ''); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA GESTION DES FACTURES -----  ///

function htm_validation_factures($array, $factures, $page, $max_page)
{	
	global $language_adm, $param_gen;
	
	$id_compte_search = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : '';
	$id_ann_search = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : '';
	$jour = (!empty($array['jour'])) ? $array['jour'] : '';
	$mois = (!empty($array['mois'])) ? $array['mois'] : '';
	$annee = (!empty($array['annee'])) ? $array['annee'] : '';
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_fact_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="get" action="">
	
	<div class="menus_r_fond">
	 
		<div id="recherche">
			<div class="recherche_l"><input type="text" class="input_sma" name="id_ann" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_ann_val_input']); ?>')" value="<?php if(!empty($id_ann_search)) echo $id_ann_search; else echo $language_adm['page_ann_val_input'] ?>" /></div>
			<div class="recherche_l"><input type="text" class="input_sma" name="id_compte" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_acc_val_input']); ?>')" value="<?php if(!empty($id_compte_search)) echo $id_compte_search; else echo $language_adm['page_acc_val_input'] ?>" /></div>
			<div class="recherche_l">
				<select name="jour" class="input_sma_date2">
					<option value="0"><?php echo $language_adm['page_fact_title3']; ?></option>
					<option value="01" <?php if(!empty($jour) && $jour == 01) echo "selected"; ?>>01</option>
					<option value="02" <?php if(!empty($jour) && $jour == 02) echo "selected"; ?>>02</option>
					<option value="03" <?php if(!empty($jour) && $jour == 03) echo "selected"; ?>>03</option>
					<option value="04" <?php if(!empty($jour) && $jour == 04) echo "selected"; ?>>04</option>
					<option value="05" <?php if(!empty($jour) && $jour == 05) echo "selected"; ?>>05</option>
					<option value="06" <?php if(!empty($jour) && $jour == 06) echo "selected"; ?>>06</option>
					<option value="07" <?php if(!empty($jour) && $jour == 07) echo "selected"; ?>>07</option>
					<option value="08" <?php if(!empty($jour) && $jour == 08) echo "selected"; ?>>08</option>
					<option value="09" <?php if(!empty($jour) && $jour == 09) echo "selected"; ?>>09</option>
					<option value="10" <?php if(!empty($jour) && $jour == 10) echo "selected"; ?>>10</option>
					<option value="11" <?php if(!empty($jour) && $jour == 11) echo "selected"; ?>>11</option>
					<option value="12" <?php if(!empty($jour) && $jour == 12) echo "selected"; ?>>12</option>
					<option value="13" <?php if(!empty($jour) && $jour == 13) echo "selected"; ?>>13</option>
					<option value="14" <?php if(!empty($jour) && $jour == 14) echo "selected"; ?>>14</option>
					<option value="15" <?php if(!empty($jour) && $jour == 15) echo "selected"; ?>>15</option>
					<option value="16" <?php if(!empty($jour) && $jour == 16) echo "selected"; ?>>16</option>
					<option value="17" <?php if(!empty($jour) && $jour == 17) echo "selected"; ?>>17</option>
					<option value="18" <?php if(!empty($jour) && $jour == 18) echo "selected"; ?>>18</option>
					<option value="19" <?php if(!empty($jour) && $jour == 19) echo "selected"; ?>>19</option>
					<option value="20" <?php if(!empty($jour) && $jour == 20) echo "selected"; ?>>20</option>
					<option value="21" <?php if(!empty($jour) && $jour == 21) echo "selected"; ?>>21</option>
					<option value="22" <?php if(!empty($jour) && $jour == 22) echo "selected"; ?>>22</option>
					<option value="23" <?php if(!empty($jour) && $jour == 23) echo "selected"; ?>>23</option>
					<option value="24" <?php if(!empty($jour) && $jour == 24) echo "selected"; ?>>24</option>
					<option value="25" <?php if(!empty($jour) && $jour == 25) echo "selected"; ?>>25</option>
					<option value="26" <?php if(!empty($jour) && $jour == 26) echo "selected"; ?>>26</option>
					<option value="27" <?php if(!empty($jour) && $jour == 27) echo "selected"; ?>>27</option>
					<option value="28" <?php if(!empty($jour) && $jour == 28) echo "selected"; ?>>28</option>
					<option value="29" <?php if(!empty($jour) && $jour == 29) echo "selected"; ?>>29</option>
					<option value="30" <?php if(!empty($jour) && $jour == 30) echo "selected"; ?>>30</option>
					<option value="31" <?php if(!empty($jour) && $jour == 31) echo "selected"; ?>>31</option>
				</select>
				
				<select name="mois" class="input_sma_date2">
					<option value="0"><?php echo $language_adm['page_fact_title4']; ?></option>
					<option value="01" <?php if(!empty($mois) && $mois == 01) echo "selected"; ?>>01</option>
					<option value="02" <?php if(!empty($mois) && $mois == 02) echo "selected"; ?>>02</option>
					<option value="03" <?php if(!empty($mois) && $mois == 03) echo "selected"; ?>>03</option>
					<option value="04" <?php if(!empty($mois) && $mois == 04) echo "selected"; ?>>04</option>
					<option value="05" <?php if(!empty($mois) && $mois == 05) echo "selected"; ?>>05</option>
					<option value="06" <?php if(!empty($mois) && $mois == 06) echo "selected"; ?>>06</option>
					<option value="07" <?php if(!empty($mois) && $mois == 07) echo "selected"; ?>>07</option>
					<option value="08" <?php if(!empty($mois) && $mois == 08) echo "selected"; ?>>08</option>
					<option value="09" <?php if(!empty($mois) && $mois == 10) echo "selected"; ?>>09</option>
					<option value="10" <?php if(!empty($mois) && $mois == 11) echo "selected"; ?>>10</option>
					<option value="11" <?php if(!empty($mois) && $mois == 12) echo "selected"; ?>>11</option>
					<option value="12" <?php if(!empty($mois) && $mois == 13) echo "selected"; ?>>12</option>
				</select>
				
				<select name="annee" class="input_sma_date2">
					<option value="0"><?php echo $language_adm['page_fact_title5']; ?></option>
					<option value="2009" <?php if(!empty($annee) && $annee == 2009) echo "selected"; ?>>2009</option>
					<option value="2010" <?php if(!empty($annee) && $annee == 2010) echo "selected"; ?>>2010</option>
					<option value="2011" <?php if(!empty($annee) && $annee == 2011) echo "selected"; ?>>2011</option>
					<option value="2012" <?php if(!empty($annee) && $annee == 2012) echo "selected"; ?>>2012</option>
					<option value="2013" <?php if(!empty($annee) && $annee == 2013) echo "selected"; ?>>2013</option>
					<option value="2014" <?php if(!empty($annee) && $annee == 2014) echo "selected"; ?>>2014</option>
					<option value="2015" <?php if(!empty($annee) && $annee == 2015) echo "selected"; ?>>2015</option>
					<option value="2016" <?php if(!empty($annee) && $annee == 2016) echo "selected"; ?>>2016</option>
					<option value="2017" <?php if(!empty($annee) && $annee == 2017) echo "selected"; ?>>2017</option>
					<option value="2018" <?php if(!empty($annee) && $annee == 2018) echo "selected"; ?>>2018</option>
					<option value="2019" <?php if(!empty($annee) && $annee == 2019) echo "selected"; ?>>2019</option>
					<option value="2020" <?php if(!empty($annee) && $annee == 2020) echo "selected"; ?>>2020</option>
				</select>
			</div>
			<div id="recherche_l_submit"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_rechercher']; ?>" /></div>
		</div>
	 
		<?php
			
			if(is_array($factures))
			{
				$i = 1;	
				
				foreach($factures as $row)
				{
					$id_compte = (int) $row['id_compte'];
					$id_ann = (int) $row['id_ann'];
					$id_facture = (!empty($id_compte)) ? $id_compte : $id_ann;
					$url = htmlspecialchars($row['url'], ENT_QUOTES);
					$numero = (int) $row['numero'];
					$prix = (float) $row['prix'];
					$prix_tva = (empty($row['prix_tva'])) ? (float) $row['prix_tva'] : 0;
					$prix_total = $prix + $prix_tva;
					
					$prix_aff = number_format($prix, 2, ',', ' ');
					$prix_tva_aff = number_format($prix_tva, 2, ',', ' ');
					$prix_total = number_format($prix_total, 2, ',', ' '); 
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
	                
					if(!empty($id_compte))
					echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_fact_title1'] . $id_compte .'</strong></p>';
					
					else echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_fact_title2'] . $id_ann .'</strong></p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_fact_prix'] .' :</strong> '. $prix_aff .' '. $param_gen['devise'];
					echo ' &nbsp; <strong>'. $language_adm['page_fact_prix_tva'] .' : </strong>'. $prix_tva_aff .' '. $param_gen['devise'];
					echo ' &nbsp; <strong>'. $language_adm['page_fact_prix_total'] .' : </strong>'. $prix_total .' '. $param_gen['devise'] .'</p>';
		
					echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_1" href="'. URL .'/'. $url .'/'. $id_facture .'-'. $numero .'.php" onclick="window.open(this.href); return false;">'. $language_adm['page_fact_vu'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="factures_supp.php?id_ann='. $id_ann .'&amp;id_compte='. $id_compte .'&amp;numero='. $numero .'&amp;menu=16" onClick="return confirm(\''. $language_adm['page_fact_supp'] .' ?\');">'. $language_adm['page_fact_supp'] .'</a></li>
						</ul>';
					
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($factures)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_ann_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				$url = 'factures.php?menu=16';
				
				if(!empty($id_ann_search)) $url .= '&amp;id_ann='. $id_ann_search;
				if(!empty($id_compte_search)) $url .= '&amp;id_compte='. $id_compte_search;
				if(!empty($jour)) $url .= '&amp;jour='. $jour;
				if(!empty($mois)) $url .= '&amp;mois='. $mois;
				if(!empty($annee)) $url .= '&amp;annee='. $annee;
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'&amp;menu=16" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'&amp;menu=16" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'&amp;menu=16" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'&amp;menu=16" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'&amp;menu=16" class="lien_pagination">< '. $language_adm['page_ann_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'&amp;menu=16" class="lien_pagination">'. $language_adm['page_ann_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'&amp;menu=16" class="lien_pagination">'. $language_adm['page_ann_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'IMPORTATION D'ANNONCE EN XML -----  ///

function htm_import_xml($e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_xml_import_info']; ?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_xml_import_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_xml_import_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_xml_import_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_xml_import_error4'] .'</span></p></div>';
		
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_xml_import_file']; ?> :</div>
		<div class="form_right"><input type="file" class="input_file" name="xml" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE RECUPERATION D'UN FICHIER D'ANNONCE EN XML -----  ///

function htm_export_xml()
{
	global $language_adm, $cache_regions, $cache_categories;

?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_xml_export_info']; ?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="xml_file.php">
	
	<div class="menus_r_fond">
	 
		<div class="form_left"><?php echo $language_adm['page_xml_export_file']; ?> :</div>
		<div class="form_right">
			
			<select name="jour" class="input_sma_date">
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			
			<select name="mois" class="input_sma_date">
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			
			<select name="annee" class="input_sma_date">
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
			</select>
				
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_xml_export_reg']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_regions)) display_adm_regions_search(0, $cache_regions, $language_adm['search_reg']); ?></div>
		
		<div id="get_departements_all">
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_xml_export_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_search(0, $cache_categories, $language_adm['search_cat']); ?></div>
		
		<div class="form_left"><?php echo $language_adm['page_xml_export_key']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="xml_key" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_xml_export_value']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_xml_export_value']); ?>')" value="<?php echo $language_adm['page_xml_export_value']; ?>"/></div>
		
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_xml_export_note']; ?></p></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>

	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DU MODELE DU FICHIER XML -----  ///

function htm_modele_xml()
{
	global $language_adm;

?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_xml_modele_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_note">
			<?php echo $language_adm['page_xml_modele_txt']; ?><br /><br />
			<a class="lien_g" href="../xml/exemple.xml" target="_blank"><?php echo $language_adm['page_xml_modele_link']; ?></a>
		</p>
		
	</div>

</div>

<?php
}

/// ----- PAGE D'EDITION DES MAILS AUTOMATIQUES -----  ///

function htm_email_center($l, $e)
{
	global $language_adm, $cache_mails_auto;
	
	$l = (int) $l;
	
	$nom = '';
	$email = '';
	$titre = '';
	$message = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == $l)
		{
			$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
			$email = stripslashes(htmlspecialchars($v['email'], ENT_QUOTES));
			$titre = stripslashes(htmlspecialchars($v['titre'], ENT_QUOTES));
			$message = stripslashes(htmlspecialchars($v['message'], ENT_QUOTES));
		}
	}
	
?>


<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			
			<?php 
			
			if(!empty($l) && $l == 1) echo $language_adm['page_ema_auto_info1'];
			if(!empty($l) && $l == 2) echo $language_adm['page_ema_auto_info2'];
			if(!empty($l) && $l == 3) echo $language_adm['page_ema_auto_info3'];
			if(!empty($l) && $l == 4) echo $language_adm['page_ema_auto_info4'];
			if(!empty($l) && $l == 5) echo $language_adm['page_ema_auto_info5'];
			if(!empty($l) && $l == 6) echo $language_adm['page_ema_auto_info6'];
			if(!empty($l) && $l == 7) echo $language_adm['page_ema_auto_info7'];
			if(!empty($l) && $l == 8) echo $language_adm['page_ema_auto_info8'];
			if(!empty($l) && $l == 9) echo $language_adm['page_ema_auto_info9'];
			if(!empty($l) && $l == 10) echo $language_adm['page_ema_auto_info10'];
			if(!empty($l) && $l == 11) echo $language_adm['page_ema_auto_info11'];
			if(!empty($l) && $l == 12) echo $language_adm['page_ema_auto_info12'];
			if(!empty($l) && $l == 13) echo $language_adm['page_ema_auto_info13'];
			if(!empty($l) && $l == 14) echo $language_adm['page_ema_auto_info14'];
			if(!empty($l) && $l == 15) echo $language_adm['page_ema_auto_info15'];
			if(!empty($l) && $l == 16) echo $language_adm['page_ema_auto_info16'];
			if(!empty($l) && $l == 17) echo $language_adm['page_ema_auto_info17'];
			if(!empty($l) && $l == 18) echo $language_adm['page_ema_auto_info18'];
			
			?>
			
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_ema_auto_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_ema_auto_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_ema_auto_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_ema_auto_error4'] .'</span></p></div>';
	
		?>
	 
		<div class="form_left_2"><?php echo $language_adm['page_ema_auto_nom']; ?> :</div>
		<div class="form_right_2"><input type="hidden" name="l" value="<?php echo $l; ?>"><input type="text" class="input_con" name="nom" value="<?php echo $nom; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_ema_auto_ema']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_con" name="email" value="<?php echo $email; ?>" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_ema_auto_tit']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_con" name="titre" value="<?php echo $titre; ?>" /></div>
		
		<?php 
		if($l == 1)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note1']; ?></p></div>
		<?php
		}
		if($l == 2)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note2']; ?></p></div>
		<?php
		}
		if($l == 3 || $l == 4 || $l == 5)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note3']; ?></p></div>
		<?php
		}
		if($l == 6)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note4']; ?></p></div>
		<?php
		}
		if($l == 7 || $l == 8 || $l == 16 || $l == 17 || $l == 18)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note5']; ?></p></div>
		<?php
		}
		if($l == 9 || $l == 10)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note6']; ?></p></div>
		<?php
		}
		if($l == 11 || $l == 12 || $l == 13)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note7']; ?></p></div>
		<?php
		}
		if($l == 14)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note8']; ?></p></div>
		<?php
		}
		if($l == 15)
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_ema_auto_note9']; ?></p></div>
		<?php
		}
		?>
		
		<div class="form_left_2" valign="top"><?php echo $language_adm['page_ema_auto_mes']; ?> :</div>
		<div class="form_right_2"><textarea cols="90" rows="20" class="textarea" name="message" value=""><?php echo $message; ?></textarea></div>
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES CONTACTS -----  ///

function htm_mails_contact()
{
	global $language_adm, $cache_mails_contact;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_ema_cont_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		
		<p class="p_center"><?php  echo '<a href="mails_contact_crea.php?menu=20">'. $language_adm['page_gest_ema_cont_crea'] .'</a>'; ?></p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_mails_contact as $v)
			if(!empty($v['id_contact'])) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_mails_contact as $v)
			{
				$id_contact = (int) $v['id_contact'];
				$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
				$email = stripslashes(htmlspecialchars($v['email'], ENT_QUOTES));
				
				echo '<li class="li_center">'. $i .' - '. $nom .'
				&nbsp;<a class="lien_g" href="mails_contact_mod.php?id='. $id_contact .'&amp;menu=20">'. $language_adm['page_gest_ema_cont_mod'] .'</a>
				/ <a class="lien_sup" href="mails_contact_sup.php?id='. $id_contact .'" onclick="return confirm(\''. $language_adm['page_gest_ema_cont_sup'] .' ?\');">'. $language_adm['page_gest_ema_cont_sup'] .'</a></li>';
				$i++;
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
			
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UN CONTACT -----  ///

function htm_creer_contact($e)
{
	global $language_adm;

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_ema_cont_crea_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_ema_cont_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_ema_cont_crea_error2'] .'</span></p></div>';
	
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_gest_ema_cont_crea_nom']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="nom" value="<?php if(!empty($_POST['nom'])) echo htmlspecialchars($_POST['nom']); ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_gest_ema_cont_crea_email']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email" value="<?php if(!empty($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UN CONTACT -----  ///

function htm_modifier_contact_center($id, $e)
{
	global $language_adm, $cache_mails_contact;
	
	$id = (int) $id;
	$nom = '';
	$email = '';

	foreach($cache_mails_contact as $v)
	{
		if($v['id_contact'] == $id)
		{
			$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
			$email = stripslashes(htmlspecialchars($v['email'], ENT_QUOTES));
		}
	}

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_ema_cont_mod_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_ema_cont_mod_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_ema_cont_mod_error2'] .'</span></p></div>';
	
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_gest_ema_cont_mod_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="text" class="input_con" name="nom" value="<?php if(!empty($_POST['nom'])) echo htmlspecialchars($_POST['nom']); else echo $nom; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_gest_ema_cont_mod_email']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="email" value="<?php if(!empty($_POST['email'])) echo htmlspecialchars($_POST['email']); else echo $email; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PAGES -----  ///

function htm_pages()
{
	global $language_adm, $cache_pages;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_pages_info']; ?></li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		
		<p class="p_center"><?php  echo '<a href="pages_crea.php?menu=21">'. $language_adm['page_pages_crea'] .'</a>'; ?></p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_pages as $v)
			if(!empty($v['id_page'])) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_pages as $v)
			{
				$id_page = (int) $v['id_page'];
				$titre = stripslashes(htmlspecialchars($v['titre'], ENT_QUOTES));
				
				echo '<li class="li_center">'. $i .' - '. $titre .'
				&nbsp;<a class="lien_g" href="pages_mod.php?id='. $id_page .'&amp;menu=21">'. $language_adm['page_pages_mod'] .'</a>
				/ <a class="lien_sup" href="pages_sup.php?id='. $id_page .'" onclick="return confirm(\''. $language_adm['page_pages_sup'] .' ?\');">'. $language_adm['page_pages_sup'] .'</a></li>';
				$i++;
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
			
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UNE PAGE -----  ///

function htm_pages_crea($e)
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_pages_crea_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left_3"></div><div class="form_right_3"><p><span class="error">'. $language_adm['page_pages_crea_error'] .'</span></p></div>';
	
		?>
		
		<div class="form_left_3"></div>
		<div class="form_right_checkbox">
			<p style="float: left">
			<input type="checkbox" class="input_checkbox" id="edition" name="edition" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['edition'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['edition'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_edition" alt="" />
			</p>
			<p class="p_note_form_2"><?php echo $language_adm['page_pages_crea_edit']; ?></p>
		</div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_pages_crea_titre']; ?> :</div>
		<div class="form_right_3"><input type="text" class="input_con" name="titre" value="<?php if(!empty($_POST['titre'])) echo htmlspecialchars($_POST['titre']); ?>"></div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_pages_crea_texte']; ?> :</div>
		<div class="form_right_3"><textarea cols="130" rows="35" class="textarea" name="texte" value=""><?php if(!empty($_POST['texte'])) echo htmlspecialchars($_POST['texte']); ?></textarea></div>
		
		<div class="form_left_3"></div>
		<div class="form_right_3"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE PAGE -----  ///

function htm_pages_mod($id, $e)
{
	global $language_adm, $cache_pages;
	
	$id = (int) $id;
	$titre = '';
	$texte = '';
	$edition = '';
	
	foreach($cache_pages as $v)
	{
		if($v['id_page'] == $id)
		{
			$titre = stripslashes(htmlspecialchars($v['titre'], ENT_QUOTES));
			$texte = stripslashes(htmlspecialchars($v['texte'], ENT_QUOTES));
			$edition = (int) $v['edition'];
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_pages_mod_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left_3"></div><div class="form_right_3"><p><span class="error">'. $language_adm['page_pages_mod_error'] .'</span></p></div>';
	
		?>
		
		<div class="form_left_3"></div>
		<div class="form_right_checkbox">
			<p style="float: left">
			<input type="checkbox" class="input_checkbox" id="edition" name="edition" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['edition'])) echo 'checked="checked"'; elseif (!isset($_POST['titre']) && $edition == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['edition'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['titre']) && $edition == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_edition" alt="" />
			</p>
			<p class="p_note_form_2"><?php echo $language_adm['page_pages_crea_edit']; ?></p>
		</div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_pages_mod_titre']; ?> :</div>
		<div class="form_right_3"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="text" class="input_con" name="titre" value="<?php if(!empty($_POST['titre'])) echo htmlspecialchars($_POST['titre']); else echo $titre; ?>"></textarea></div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_pages_mod_texte']; ?> :</div>
		<div class="form_right_3"><textarea cols="130" rows="35" class="textarea" name="texte" value=""><?php if(!empty($_POST['texte'])) echo htmlspecialchars($_POST['texte']); else echo $texte; ?></textarea></div>
		
		<div class="form_left_3"></div>
		<div class="form_right_3"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA PUB DE FOND -----  ///

function htm_pub_fond($e)
{
	global $language_adm, $cache_publicites;
	
	$id = '';
	$image = '';
	$url = '';
	
	foreach($cache_publicites as $v)
	{
		if($v['type'] == 4)
		{
			$id = $v['id_pub'];
			$image = $v['image'];
			$url = $v['url'];
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_pub_fond_info']; ?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error1'] .'</span></p></div>';
			if(!empty($e) && $e == 2) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error2'] .'</span></p></div>';
			if(!empty($e) && $e == 3) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error3'] .'</span></p></div>';

		?>
	 
		<?php 
		if(!empty($id))
		{
		?>
			<div class="form_left_2"></div>
			<div class="form_right_2"><a href="pub_fond_supp.php?id=<?php echo $id; ?>&img=<?php echo $image; ?>" class="txt_info"><?php echo $language_adm['page_gest_pub_fond_supp']; ?></a></div>
		<?php
		}
		else
		{
		?>
		<div class="form_left_2"><?php echo $language_adm['page_gest_pub_acc_img']; ?> :</div>
		<div class="form_right_2"><input type="hidden" name="type" value="4" /><input type="file" class="input_file" name="pub" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_gest_pub_acc_url']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_long" name="url" value="<?php if(!empty($_POST['url'])) echo htmlspecialchars($_POST['url']); else echo $url; ?>" /></div>
		
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		<?php
		}
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE LA PUB HEADER -----  ///

function htm_pub_header($e)
{
	global $language_adm, $cache_publicites;
	
	$image = '';
	$url = '';
	$script = '';
	
	foreach($cache_publicites as $v)
	{
		if($v['type'] == 1)
		{
			$image = $v['image'];
			$url = $v['url'];
			$script = $v['script'];
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_pub_acc_info']; ?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	  
		<?php
		
			if(!empty($e) && $e == 1) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error1'] .'</span></p></div>';
			if(!empty($e) && $e == 2) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error2'] .'</span></p></div>';
			if(!empty($e) && $e == 3) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error3'] .'</span></p></div>';
			if(!empty($e) && $e == 4) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error4'] .'</span></p></div>';
			if(!empty($e) && $e == 5) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error5'] .'</span></p></div>';
			if(!empty($e) && $e == 6) echo '<div class="form_left_2"></div><div class="form_right_2"><p><span class="error">'. $language_adm['page_gest_pub_acc_error6'] .'</span></p></div>';

		?>
	 
		<div class="form_left_2"><?php echo $language_adm['page_gest_pub_acc_img']; ?> :</div>
		<div class="form_right_2"><input type="hidden" name="id" value="1" /><input type="hidden" name="img" value="<?php echo $image; ?>" /><input type="file" class="input_file" name="pub" /></div>
		
		<div class="form_left_2"><?php echo $language_adm['page_gest_pub_acc_url']; ?> :</div>
		<div class="form_right_2"><input type="text" class="input_long" name="url" value="<?php if(!empty($_POST['url'])) echo htmlspecialchars($_POST['url']); else echo $url; ?>" /></div>
		
		<div class="form_left_2"></div>
		<div class="form_right_2"><p class="txt_info"><?php echo $language_adm['page_gest_pub_acc_note']; ?></p></div>
     
		<div class="form_left_2"><?php echo $language_adm['page_gest_pub_acc_script']; ?> :</div>
		<div class="form_right_2"><textarea type="text" cols="51" rows="6" class="textarea" name="script"><?php if(!empty($_POST['script'])) echo htmlspecialchars($_POST['script']); else echo $script; ?></textarea></div>
     
		<div class="form_left_2"></div>
		<div class="form_right_2"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES PUBLICITES -----  ///

function htm_pub($p)
{
	global $language_adm, $cache_regions, $cache_departements, $cache_categories, $cache_publicites;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($p == 2) echo $language_adm['page_gest_pub_list_info1'];
			else echo $language_adm['page_gest_pub_list_info2'];
			
			?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
		
		<p class="p_center">
		<?php  
		
		echo '<a href="pub_crea.php?p='. $p .'&amp;type=1&amp;menu=22">'. $language_adm['page_gest_pub_list_aj_logo'] .'</a> &nbsp;
		<a href="pub_crea.php?p='. $p .'&amp;type=2&amp;menu=22">'. $language_adm['page_gest_pub_list_aj_text'] .'</a> &nbsp;
		<a href="pub_crea.php?p='. $p .'&amp;type=3&amp;menu=22">'. $language_adm['page_gest_pub_list_aj_script'] .'</a>'; 
		
		?>
		</p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_publicites as $v)
			if(!empty($v['id_pub']) && $v['type'] == $p) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_publicites as $v)
			{
				$id_pub = (int) $v['id_pub'];
				$id_cat = (int) $v['id_cat'];
				$id_reg = (int) $v['id_reg'];
				$id_dep = (int) $v['id_dep'];
				$nom = stripslashes(htmlspecialchars($v['nom'], ENT_QUOTES));
				$texte = stripslashes(htmlspecialchars($v['text'], ENT_QUOTES));
				$script = stripslashes(htmlspecialchars($v['script'], ENT_QUOTES));
				$image = $v['image'];
				
				$nom_reg = '';
				
				foreach($cache_regions as $row)
				if($row['id_reg'] == $id_reg) $nom_reg = stripslashes(htmlspecialchars($row['nom_reg'], ENT_QUOTES));
				
				$nom_dep = '';
				
				foreach($cache_departements as $row)
				if($row['id_dep'] == $id_dep) $nom_dep = stripslashes(htmlspecialchars($row['nom_dep'], ENT_QUOTES));
				
				$nom_cat = '';
				
				foreach($cache_categories as $row)
				if($row['id_cat'] == $id_cat) $nom_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
				
				if($v['type'] == $p)
				{
					echo '<li class="li_center">'. $i .' - '. $nom .' / ';
					
					if(empty($texte) && empty($script)) 
					echo $language_adm['page_gest_pub_list_type1'] .' ';
						
					elseif(!empty($texte)) 
					echo $language_adm['page_gest_pub_list_type2'] .' ';
						
					else echo $language_adm['page_gest_pub_list_type3'] .' ';
					
					if($id_reg == 0) 
					echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_reg'] .' :</strong> '. $language_adm['page_gest_pub_list_all'];
					
					else echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_reg'] .' :</strong> '. $nom_reg;
					
					if($id_dep == 0) 
					echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_dep'] .' :</strong> '. $language_adm['page_gest_pub_list_all_dep'];
					
					else echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_dep'] .' :</strong> '. $nom_dep;
					
					if($id_cat == 0) 
					echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_cat'] .' :</strong> '. $language_adm['page_gest_pub_list_all'];
						
					else echo ' &nbsp;<strong>'. $language_adm['page_gest_pub_list_cat'] .' :</strong> '. $nom_cat;
					
					echo ' &nbsp;<a class="lien_g" href="pub_mod.php?id='. $id_pub .'&amp;p='. $p .'&amp;img='. $image .'&amp;menu=22">'. $language_adm['page_gest_pub_list_mod'] .'</a>
					/ <a class="lien_sup" href="pub_sup.php?id='. $id_pub .'&amp;p='. $p .'&amp;img='. $image .'" onclick="return confirm(\''. $language_adm['page_gest_pub_list_sup'] .' ?\');">'. $language_adm['page_gest_pub_list_sup'] .'</a></li>';
					$i++;
				}
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
			
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION D'UNE PUB -----  ///

function htm_pub_crea($p, $type, $id_reg, $id_dep, $id_cat, $e)
{
	global $language_adm, $cache_regions, $cache_departements, $cache_categories;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php 
			
			if($p == 2 && $type == 1) echo $language_adm['page_gest_pub_catf1_info1'];
			if($p == 2 && $type == 2) echo $language_adm['page_gest_pub_catf2_info1'];
			if($p == 2 && $type == 3) echo $language_adm['page_gest_pub_catf3_info1'];
			if($p == 3 && $type == 1) echo $language_adm['page_gest_pub_catf1_info2'];
			if($p == 3 && $type == 2) echo $language_adm['page_gest_pub_catf2_info2'];
			if($p == 3 && $type == 3) echo $language_adm['page_gest_pub_catf3_info2'];
			
			?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf2_error'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf3_error'] .'</span></p></div>';
		
		?>
		
		<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf1_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="type" value="<?php echo $p ?>" /><input type="text" class="input_con" name="nom" value="<?php if(!empty($_POST['nom'])) echo htmlspecialchars($_POST['nom']); ?>"></div>
		
		<?php
		if($type == 1 || $type == 2)
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf1_url']; ?> :</div>
			<div class="form_right"><input type="text" class="input_con" name="url" value="<?php if(!empty($_POST['url'])) echo htmlspecialchars($_POST['url']); ?>"></div>
			
			<div class="form_left">
			<?php 
			
			if($p == 2 && $type == 1) echo $language_adm['page_gest_pub_catf1_img1'] .' :'; 
			if($p == 3 && $type == 1) echo $language_adm['page_gest_pub_catf1_img2'] .' :';
			if($type == 2) echo $language_adm['page_gest_pub_catf2_img'] .' :'; 
			
			?>
			</div>
			<div class="form_right"><input type="file" class="input_file" name="pub" /></div>
		<?php
		}
		?>
		
		<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_reg']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_regions_search($id_reg, $cache_regions, $language_adm['search_reg']); ?></div>
		
		<div id="get_departements_all">
		
			<?php
			if($id_reg != 0)
			{
				$aff = 0;
				
				foreach($cache_departements as $v)
				{
					if($v['id_reg'] == $id_reg)
					$aff = 1;
				}
				
				if($aff == 1)
				{
				?>
					<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_dep']; ?> :</div>
					<div class="form_right"><?php if(is_array($cache_categories)) display_adm_departements_search($id_dep, $id_reg, $cache_departements, $language_adm['search_dep']); ?></div>
				<?php
				}
			}
			?>
			
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_search($id_cat, $cache_categories, $language_adm['search_cat']); ?></div>
		
		<?php
		if($type == 2)
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_pages_crea_texte']; ?> :</div>
			<div class="form_right"><textarea cols="40" rows="4" class="textarea" name="text" value=""><?php if(!empty($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></textarea></div>
		<?php
		}
		if($type == 3)
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf3_script']; ?> :</div>
			<div class="form_right"><textarea cols="40" rows="4" class="textarea" name="script" value=""><?php if(!empty($_POST['script'])) echo htmlspecialchars($_POST['script']); ?></textarea></div>
		<?php
		}
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION D'UNE PUB -----  ///

function htm_pub_mod($id, $p, $id_reg, $id_dep, $id_cat, $e)
{
	global $language_adm, $cache_regions, $cache_departements, $cache_categories, $cache_publicites;
	
	$nom = '';
	$url = '';
	$image = '';
	$texte = '';
	$script = '';
	
	foreach($cache_publicites as $v)
	{
		if($v['id_pub'] == $id)
		{
			if(empty($_POST['nom']))
			{
				$id_reg = (int) $v['id_reg'];
				$id_dep = (int) $v['id_dep'];
				$id_cat = (int) $v['id_cat'];
			}
			
			$nom = $v['nom'];
			$url = $v['url'];
			$image = $v['image'];
			$text = stripslashes(htmlspecialchars($v['text'], ENT_QUOTES));
			$script = stripslashes(htmlspecialchars($v['script'], ENT_QUOTES));
		}
	}
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_gest_pub_mod_info']; ?></li>
		</ul>
	
	</div>
	
	<form enctype="multipart/form-data" method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 3) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_acc_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 4) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 5) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error2'] .'</span></p></div>';
		if(!empty($e) && $e == 6) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf1_error3'] .'</span></p></div>';
		if(!empty($e) && $e == 7) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf2_error'] .'</span></p></div>';
		if(!empty($e) && $e == 8) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_gest_pub_catf3_error'] .'</span></p></div>';
		
		?>
		
		<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf1_nom']; ?> :</div>
		<div class="form_right"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="img" value="<?php echo $image; ?>" /><input type="text" class="input_con" name="nom" value="<?php if(!empty($_POST['nom'])) echo htmlspecialchars($_POST['nom']); else echo $nom; ?>"></div>
		
		<?php
		if(!empty($url))
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf1_url']; ?> :</div>
			<div class="form_right"><input type="text" class="input_con" name="url" value="<?php if(!empty($_POST['url'])) echo htmlspecialchars($_POST['url']); else echo $url; ?>"></div>
			
			<div class="form_left">
			<?php 
			
			if($p == 2 && empty($texte)) echo $language_adm['page_gest_pub_catf1_img1'] .' :'; 
			if($p == 3 && empty($texte)) echo $language_adm['page_gest_pub_catf1_img2'] .' :';
			if(!empty($texte)) echo $language_adm['page_gest_pub_catf2_img'] .' :'; 
			
			?>
			</div>
			<div class="form_right"><input type="file" class="input_file" name="pub" /></div>
		<?php
		}
		?>
		
		<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_reg']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_regions_search($id_reg, $cache_regions, $language_adm['search_reg']); ?></div>
		
		<div id="get_departements_all">
		
			<?php
			if($id_reg != 0)
			{
			?>
			<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_dep']; ?> :</div>
			<div class="form_right"><?php if(is_array($cache_categories)) display_adm_departements_search($id_dep, $id_reg, $cache_departements, $language_adm['search_dep']); ?></div>
			<?php
			}
			?>
			
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_gest_pub_catf1_cat']; ?> :</div>
		<div class="form_right"><?php if(is_array($cache_categories)) display_adm_categories_search($id_cat, $cache_categories, $language_adm['search_cat']); ?></div>
		
		<?php
		if(!empty($text))
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_pages_crea_texte']; ?> :</div>
			<div class="form_right"><textarea cols="40" rows="4" class="textarea" name="text" value=""><?php if(!empty($_POST['text'])) echo htmlspecialchars($_POST['text']); else echo $text; ?></textarea></div>
		<?php
		}
		if(!empty($script))
		{
		?>
			<div class="form_left" valign="top"><?php echo $language_adm['page_gest_pub_catf3_script']; ?> :</div>
			<div class="form_right"><textarea cols="40" rows="4" class="textarea" name="script" value=""><?php if(!empty($_POST['script'])) echo htmlspecialchars($_POST['script']); else echo $script; ?></textarea></div>
		<?php
		}
		?>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MISE EN MAINTENANCE -----  ///

function htm_maintenance($e)
{
	global $language_adm, $cache_maintenance;
	
	$actif = (int) $cache_maintenance['actif'];
	$ip = $_SERVER['REMOTE_ADDR'];

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_maint_info']; ?></li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_maint_error'] .'</span></p></div>';
	
		?>
	 
		<div class="form_left"><?php echo $language_adm['page_maint_actif']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="actif" name="actif" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['actif'])) echo 'checked="checked"'; elseif (!isset($_POST['ip']) && $actif == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['actif'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['ip']) && $actif == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_actif" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><p class="txt_info"><?php echo $language_adm['page_maint_note']; ?></p></div>
		
		<div class="form_left"><?php echo $language_adm['page_maint_ip']; ?> :</div>
		<div class="form_right"><input type="text" class="input_con" name="ip" value="<?php echo $ip; ?>" /></div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DES CODES DE REDUCTION -----  ///

function htm_code_reduc()
{
	global $language_adm, $cache_code_reduc, $param_gen; 

?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php echo $language_adm['page_code_reduc_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<p class="p_center">
			<?php echo '<a href="reduc_crea.php?menu=28">'. $language_adm['page_code_reduc_crea'] .'</a>'; ?>
		</p>
		
		<?php
	        
			$aff = '';
			
			foreach($cache_code_reduc as $v)
			if(!empty($v['type'])) $aff = 1;
			
			if($aff == 1) echo '<ul class="ul_center">';
			
			$i = 1;
			
			foreach($cache_code_reduc as $v)
			{
				$id = (int) $v['id'];
				$prix = number_format($v['prix'], 2, ',', ' ');
				$code = htmlspecialchars($v['code']);
				$type = (int) $v['type'];
				
				echo '<li class="li_center">'. $i .' - '. $language_adm['page_code_reduc_crea_val'] .' : '. $prix .'  - '. $language_adm['page_code_reduc_crea_code'] .' : '. $code .' - '. $language_adm['page_code_reduc_crea_type'] .' : ';
				
				if($type == 1)
				echo $language_adm['page_code_reduc_crea_type1'];
				
				else echo $language_adm['page_code_reduc_crea_type2'];
				
				echo '&nbsp;<a class="lien_g" href="reduc_mod.php?id='. $id .'&amp;menu=28">'. $language_adm['page_opt_visu_mod'] .'</a> /
				<a class="lien_sup" href="reduc_sup.php?id='. $id .'&amp;menu=28" OnClick=" return confirm(\''. $language_adm['page_opt_visu_sup'] .' ?\');">'. $language_adm['page_opt_visu_sup'] .'</a>
				</li>';
				$i++;
			}
			
			if($aff == 1) echo '</ul>';
			
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE CREATION DES CODES DE REDUCTION -----  ///
	
function htm_creer_code_reduc($e)
{
	global $language_adm;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php echo $language_adm['page_code_reduc_crea_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_code_reduc_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_code_reduc_crea_error2'] .'</span></p></div>';
		
		?>

		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_prix']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_code']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="code" value="<?php if(isset($_POST['code'])) echo $_POST['code']; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_type']; ?> :</div>
		<div class="form_right">
			<select name="type" class="input_select">
				<option value="1" <?php if(isset($_POST['type']) && $_POST['type'] == 1) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_code_reduc_crea_type1']; ?></option>
				<option value="2" <?php if(isset($_POST['type']) && $_POST['type'] == 2) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_code_reduc_crea_type2']; ?></option>
			</select>
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val1']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val1" name="val1" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val1'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val1'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val1" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val2']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val2" name="val2" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val2'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val2'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val2" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val3']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val3" name="val3" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val3'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val3'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val3" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val4']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val4" name="val4" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val4'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val4'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val4" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val5']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val5" name="val5" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val5'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val5'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val5" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val6']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val6" name="val6" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val6'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val6'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val6" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DE MODIFICATION DES CODES DE REDUCTION -----  ///
	
function htm_modifier_code_reduc($id, $e)
{
	global $language_adm, $cache_code_reduc;
	
	$prix = '';
	$code = '';
	$type = '';
	$val1 = '';
	$val2 = '';
	$val3 = '';
	$val4 = '';
	$val5 = '';
	$val6 = '';
	
	foreach($cache_code_reduc as $v)
	{
		if($v['id'] == $id)
		{
			$prix = (float) $v['prix'];
			$code = $v['code'];
			$type = (int) $v['type'];
			$val1 = (int) $v['val1'];
			$val2 = (int) $v['val2'];
			$val3 = (int) $v['val3'];
			$val4 = (int) $v['val4'];
			$val5 = (int) $v['val5'];
			$val6 = (int) $v['val6'];
		}
	}
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php echo $language_adm['page_opt_visu_mod_info1']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	 
		<?php
		
		if(!empty($e) && $e == 1) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_code_reduc_crea_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left"></div><div class="form_right"><p><span class="error">'. $language_adm['page_code_reduc_crea_error2'] .'</span></p></div>';		
		?>
	
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_prix']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix']; else echo $prix; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_code']; ?> :</div>
		<div class="form_right"><input class="input_con" type="text" name="code" value="<?php if(isset($_POST['code'])) echo $_POST['code']; else echo $code; ?>" /></div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_type']; ?> :</div>
		<div class="form_right">
			<select name="type" class="input_select">
				<option value="1" <?php if(isset($_POST['type']) && $_POST['type'] == 1) echo 'selected="selected"'; elseif($type == $language_adm['page_code_reduc_crea_type1']) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_code_reduc_crea_type1']; ?></option>
				<option value="2" <?php if(isset($_POST['type']) && $_POST['type'] == 2) echo 'selected="selected"'; elseif($type == $language_adm['page_code_reduc_crea_type1']) echo 'selected="selected"'; ?> ><?php echo $language_adm['page_code_reduc_crea_type2']; ?></option>
			</select>
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val1']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val1" name="val1" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val1'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val1 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val1'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val1 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val1" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val2']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val2" name="val2" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val2'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val2 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val2'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val2 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val2" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val3']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val3" name="val3" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val3'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val3 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val3'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val3 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val3" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val4']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val4" name="val4" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val4'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val4 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val4'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val4 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val4" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val5']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val5" name="val5" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val5'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val5 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val5'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val5 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val5" alt="" />
		</div>
		
		<div class="form_left"><?php echo $language_adm['page_code_reduc_crea_val6']; ?> :</div>
		<div class="form_right_checkbox">
			<input type="checkbox" class="input_checkbox" id="val6" name="val6" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['val6'])) echo 'checked="checked"'; elseif (!isset($_POST['name']) && $val6 == 1) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['val6'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['name']) && $val6 == 1) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_val6" alt="" />
		</div>
		
		<div class="form_left"></div>
		<div class="form_right"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_modifier']; ?>" /></div>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE DU FILTRAGE MAIL -----  ///

function htm_filtrage_mail($mails, $page, $max_page)
{	
	global $language_adm, $param_gen;
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm"><?php echo $language_adm['page_filtre_mail_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<div class="menus_r_fond">
	 
		<?php
			
			if(is_array($mails))
			{
				$i = 1;	
				
				foreach($mails as $row)
				{
					$id_mail =(int) $row['id_mail'];
					$id_ann =(int) $row['id_ann'];
					$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
					$email = stripslashes(htmlspecialchars($row['email'], ENT_QUOTES));
					$email_annonceur = stripslashes(htmlspecialchars($row['email_annonceur'], ENT_QUOTES));
					$message = nl2br(stripslashes(htmlspecialchars($row['message'], ENT_QUOTES)));
					$date = (int) $row['date'];
					$ip = htmlspecialchars($row['ip'], ENT_QUOTES);
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
	                
					echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_filtre_mail_ann'] .' '. $id_ann .'</strong></p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_filtre_nom'] .' :</strong> '. $nom .' &nbsp; <strong>'. $language_adm['page_filtre_email'] .' : </strong>'. $email;
					echo ' &nbsp; <strong>'. $language_adm['page_filtre_email_ann'] .' : </strong>'. $email_annonceur;
					echo ' &nbsp; <strong>'. $language_adm['page_ann_val_ip'] .' : </strong>'. $ip .' &nbsp; <a class="lien_g" href="http://www.geoiptool.com/?IP='. $ip .'" target="_blank">'. $language_adm['page_ann_val_geo_ip'] .'</a></p>';

					echo '<p class="p_texte">'. $message .'</p>';
					
				 	
					echo '<ul id="ul_contenu">
						<li class="li_contenu"><a class="col_1" href="filtre_mail_val.php?id='. $id_ann .'&amp;id_mail= '. $id_mail .'">'. $language_adm['page_ann_val_val'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="filtre_mail_ref.php?id_mail='. $id_mail .'" onClick="return confirm(\''. $language_adm['page_ann_val_ref'] .' ?\');">'. $language_adm['page_ann_val_ref'] .'</a></li>
						<li class="li_contenu"><a class="col_1" href="filtre_mail_ref.php?id_mail='. $id_mail .'&amp;email='. $email .'" onclick="return confirm(\''. addslashes($language_adm['page_ann_val_sup_ban']) .' ?\');">'. $language_adm['page_ann_val_sup_ban'] .'</a></li>
						</ul>';
					
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($mails)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_ann_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				$url = 'filtre_mail.php?menu=29';
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language_adm['page_ann_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language_adm['page_ann_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language_adm['page_ann_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>

</div>

<?php
}

/// ----- PAGE DE LA GESTION DES ACHATS -----  ///

function htm_validation_achat_center($array, $achats, $page, $max_page)
{	
	global $language_adm, $cache_regions, $cache_categories, $param_gen;
	
	$id_achat_search = (!empty($array['id_achat'])) ? (int) $array['id_achat'] : '';
	$email_search = (!empty($array['email'])) ? htmlspecialchars($array['email'], ENT_QUOTES) : '';
	
?>	

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<li class="li_barre_adm">
			<?php echo $language_adm['page_achat_info']; ?>
			</li>
		</ul>
	
	</div>
	
	<form method="get" action="">
	
	<div class="menus_r_fond">
	 
		<div id="recherche">
			<div class="recherche_l"><input type="text" class="input_con" name="id_achat" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_achat_input']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_achat_input']); ?>')" value="<?php if(!empty($id_achat_search)) echo $id_achat_search; else echo $language_adm['page_achat_input'] ?>" /></div>
			<div class="recherche_l"><input type="text" class="input_con" name="email" onfocus="InputCon(this, '<?php echo addslashes($language_adm['page_achat_email']); ?>')" onblur="InputCon(this, '<?php echo addslashes($language_adm['page_achat_email']); ?>')" value="<?php if(!empty($email_search)) echo $email_search; else echo $language_adm['page_achat_email'] ?>" /><input type="hidden" name="menu" value="7" /></div>
			<div id="recherche_l_submit"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_rechercher']; ?>" /></div>
		</div>
	 
		<?php
			
			if(is_array($achats))
			{
				$i = 1;	
				
				foreach($achats as $row)
				{
					$id_achat = htmlspecialchars($row['id_achat'], ENT_QUOTES);
					$type_achat = htmlspecialchars($row['type_achat'], ENT_QUOTES);
					$id_ann = htmlspecialchars($row['id_ann'], ENT_QUOTES);
					$id_compte = htmlspecialchars($row['id_compte'], ENT_QUOTES);
					$id_boutique = htmlspecialchars($row['id_boutique'], ENT_QUOTES);
					$prix = (float) $row['prix'];
					$prix_tva = (float) $row['prix_tva'];
					$prix_total = $prix + $prix_tva;
					$date = (int) $row['time'];
					$email_ann = htmlspecialchars($row['email_ann'], ENT_QUOTES);
					$email = htmlspecialchars($row['email'], ENT_QUOTES);
					$nom_ann = htmlspecialchars($row['nom_ann'], ENT_QUOTES);
					$nom_ent = htmlspecialchars($row['nom_ent'], ENT_QUOTES);
					$nom = htmlspecialchars($row['nom'], ENT_QUOTES);
					$prenom = htmlspecialchars($row['prenom'], ENT_QUOTES);
					$v_compte = htmlspecialchars($row['v_compte'], ENT_QUOTES);
					
					$prix = number_format($prix, 2, ',', ' '); 
					$prix_tva = number_format($prix_tva, 2, ',', ' '); 
					$prix_total = number_format($prix_total, 2, ',', ' '); 
					
					// Gestion de la date
	
					$now = time();
					$date_now = date('d', $now);
					$moi_now = date('m', $now);
					$date_ann = date('d', $date);
					$moi_ann = date('m', $date);
					
					if(($date_now == $date_ann) && ($moi_now - $moi_ann == 0))
					{
						$hour = date('G', $date);
						$min = date('i', $date);
						$hour .= 'h'.$min;
						$day = $language_adm['page_achat_date_auj'] .' ';
					}
					elseif(($date_now - $date_ann == 1) && ($moi_now - $moi_ann == 0 ) )
					{
						$hour = date('G', $date);
						$min = date('i', $date);
						$hour .= 'h'.$min;
						$day = $language_adm['page_achat_date_hier'] .' ';
					}
					else
					{
						$month = date('d/m', $date);
						$hour = date('G', $date);
						$min = date('i', $date);
						$hour .= 'h'.$min;
						$day = '';
					}
					
					$day = htmlspecialchars($day, ENT_QUOTES);
					$hour = htmlspecialchars($hour, ENT_QUOTES);
					
					?>
					
					<div class="bloc_contenu">
					
					<?php
					
					if(!empty($id_ann))
					echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_achat_ann'] .''. $id_ann .'</strong></p>';
					
					elseif(!empty($id_compte))
					echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_achat_compte'] .''. $id_compte .'</strong></p>';
					
					elseif(!empty($id_boutique))
					echo '<p class="p_title"><strong>'. $i .' - '. $language_adm['page_achat_boutique'] .''. $id_boutique .'</strong></p>';
					
					if(!empty($day)) 
					echo '<p class="p_infos">'. $day .' '. $language_adm['page_achat_heur'] .' '. $hour .'</p>';
					
					else echo '<p class="p_infos">'. $language_adm['page_achat_date'] .' '. $month .' '. $language_adm['page_achat_heur'] .' '. $hour .'</p>';
					
					echo '<p class="p_infos"><strong>'. $language_adm['page_achat_prix'] .' :</strong> '. $prix .' '. $param_gen['devise'] .' 
					&nbsp; <strong>'. $language_adm['page_achat_tva'] .' : </strong>'. $prix_tva .' '. $param_gen['devise'] .'
					&nbsp; <strong>'. $language_adm['page_achat_prix_t'] .' : </strong>'. $prix_total .' '. $param_gen['devise'];
							
					echo ' &nbsp; <strong>'. $language_adm['page_achat_input'] .' :</strong> '. $id_achat;
					
					if($type_achat == 1)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_type'] .' :</strong> '. $language_adm['page_achat_type_1'] .'</p>';
					
					elseif($type_achat == 2)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_type'] .' :</strong> '. $language_adm['page_achat_type_2'] .'</p>';
					
					elseif($type_achat == 3)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_type'] .' :</strong> '. $language_adm['page_achat_type_3'] .'</p>';
					
					elseif($type_achat == 4)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_type'] .' :</strong> '. $language_adm['page_achat_type_4'] .'</p>';
					
					elseif($type_achat == 5)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_type'] .' :</strong> '. $language_adm['page_achat_type_5'] .'</p>';
					
					if($id_compte > 0 || $id_boutique > 0 || $v_compte > 0)
					{
						if(!empty($nom_ent))
						echo '<p class="p_infos"><strong>'. $language_adm['page_achat_nom_ent'] .' :</strong> '. $nom_ent;
						
						else echo '<p class="p_infos"><strong>'. $language_adm['page_achat_nom'] .' :</strong> '. $nom .' '. $prenom;
					}
					else echo '<p class="p_infos"><strong>'. $language_adm['page_achat_nom'] .' :</strong> '. $nom_ann;
					
					if($id_compte > 0 || $id_boutique > 0)
					echo ' &nbsp; <strong>'. $language_adm['page_achat_email'] .' :</strong> '. $email .'</p>';
					
					else echo ' &nbsp; <strong>'. $language_adm['page_achat_email'] .' :</strong> '. $email_ann .'</p>';
					
					echo '<ul id="ul_contenu">
					<li class="li_contenu"><a class="col_1" href="achat_valid.php?id='. $id_achat .'&amp;menu=30">'. $language_adm['page_ann_val_val'] .'</a></li>
					<li class="li_contenu"><a class="col_1" href="achat_supp.php?id='. $id_achat .'&amp;menu=30" onclick="return confirm(\''. $language_adm['page_ann_val_sup'] .' ?\');">'. $language_adm['page_ann_val_sup'] .'</a></li>
					</ul>';
			
					$i++;
					
					?>
					</div>
					<?php
				}
			}
			
			if(empty($achats)) echo '<div class="bloc_contenu"><p class="p_no_result">'. $language_adm['page_ann_val_no_result'] .'</p></div>';
			
			else
			{
				echo '<div id="pagination">';
				
				$url = 'achat_att.php?menu=30';
				
				if(!empty($id_achat_search)) $url .= '&amp;id_achat='. $id_achat_search;
				if(!empty($email_search) && $email_search != $language_adm['page_achat_email']) $url .= '&amp;email='. $email_search;
				
				$nav = ' ';
				
				$num = floor($page/6);
	         
				if($num == 0)
				$inf = ($num * 6) + 1;
			  
				else $inf = ($num * 6);
				
				$sup = ($num + 1) * 6;
			 
				if($sup < $max_page)
				{
					for ($i = $inf ; $i <= $sup; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
					$nav .= '<span class="lien_pagination"> ... </span> &nbsp;';
				}
				else
				{
					for ($i = $inf ; $i <= $max_page; $i++)
					{
						if($page == $i)
						$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
					 
						else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
					}
				}	
				
				if($page > 1)
				{
					$page_num = $page - 1 ;
					$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language_adm['page_ann_val_page_prec'] .'</a>';
				} 
				else $prev = '';
			 
				if($page < $max_page)
				{
					$page_num = ($page + 1);
					$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language_adm['page_ann_val_page_suiv'] .' ></a>&nbsp;';
					$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language_adm['page_ann_val_page_dern'] .'</a>&nbsp;';
				}
				else
				{
					$next = '&nbsp;';
					$last = '&nbsp;';
				}	  
				
				echo $prev . $nav . $next . $last .'</div>';
			}
		?>
		
	</div>
	
	</form>

</div>

<?php
}

/// ----- PAGE D'ENVOI D'UNE NEWSLETTER -----  ///

function htm_newsletter($type, $e)
{
	global $language_adm;
	
?>

<div id="menu_right">

	<div class="menus_r_haut">
	
		<ul class="ul_barre_adm">
			<?php if($type == 1) echo '<li class="li_barre_adm">'. $language_adm['page_newsletter_info1'] .'</li>'; ?>
			<?php if($type == 2) echo '<li class="li_barre_adm">'. $language_adm['page_newsletter_info2'] .'</li>'; ?>
			<?php if($type == 3) echo '<li class="li_barre_adm">'. $language_adm['page_newsletter_info3'] .'</li>'; ?>
		</ul>
	
	</div>
	
	<form method="post" action="">
	
	<div class="menus_r_fond">
	
		<?php
	 
		if(!empty($e) && $e == 1) echo '<div class="form_left_3"></div><div class="form_right_3"><p><span class="error">'. $language_adm['page_newsletter_error1'] .'</span></p></div>';
		if(!empty($e) && $e == 2) echo '<div class="form_left_3"></div><div class="form_right_3"><p><span class="error">'. $language_adm['page_newsletter_error2'] .'</span></p></div>';
	
		?>
		
		<div class="form_left_3"></div>
		<div class="form_right_checkbox">
			<p style="float: left">
			<input type="checkbox" class="input_checkbox" id="edition" name="edition" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_POST['edition'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['edition'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_edition" alt="" />
			</p>
			<p class="p_note_form_2"><?php echo $language_adm['page_pages_crea_edit']; ?></p>
		</div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_newsletter_sujet']; ?> :</div>
		<div class="form_right_3"><input type="text" class="input_con" name="sujet" value="<?php if(!empty($_POST['sujet'])) echo htmlspecialchars($_POST['sujet']); ?>"></div>
		
		<div class="form_left_3" valign="top"><?php echo $language_adm['page_newsletter_msg']; ?> :</div>
		<div class="form_right_3"><textarea cols="90" rows="30" class="textarea" name="message" value=""><?php if(!empty($_POST['message'])) echo htmlspecialchars($_POST['message']); ?></textarea></div>
		
		<div class="form_left_3"></div>
		<div class="form_right_3"><input class="submit" type="submit" value="<?php echo $language_adm['bt_link_valider']; ?>" /></div>
	
	</div>
	
	</form>

</div>

<?php
}