///////////////////////////////////////////////////////////////////////////////////////////
//Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
//Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

//############################################################

////////////////////////////////
//Fonction affichage des menus
////////////////////////////////

function Menu1(val, nom1, nom2, nom3, nom4)
{
	if(val == 1) document.getElementById('get_menu1').innerHTML = 
	'<div class="menus_haut">' +
		'<div class="img_fl"><img onclick="Menu1(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="compte_adm.php?c=1&amp;menu=1" >'+ nom2 +'</a></li>' +
			'<li><a href="compte_adm.php?c=2&amp;menu=1" >'+ nom3 +'</a></li>' +
			'<li><a href="compte_adm.php?c=3&amp;menu=1" >'+ nom4 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu1').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu1(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu2(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu2').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu2(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="param_generaux.php?menu=2" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu2').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu2(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu3(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu3').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu3(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="regions.php?menu=3" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu3').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu3(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu4(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu4').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu4(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="categories.php?menu=4" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu4').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu4(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu5(val, nom1, nom2, nom3, nom4, nom5, nom6)
{
	if(val == 1) document.getElementById('get_menu5').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu5(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="options_cat_note.php?menu=5" >'+ nom2 +'</a></li>' +
			'<li><a href="options_cat_disc.php?menu=5" >'+ nom3 +'</a></li>' +
			'<li><a href="option_liste.php?l=1&amp;menu=5" >'+ nom4 +'</a></li>' +
			'<li><a href="option_liste.php?l=2&amp;menu=5" >'+ nom5 +'</a></li>' +
			'<li><a href="options_cat.php?menu=5" >'+ nom6 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu5').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu5(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu6(val, nom1, nom2, nom3, nom4, nom5, nom6, nom7, nom8, nom9, nom10)
{
	if(val == 1) document.getElementById('get_menu6').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu6(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\', \''+ nom10 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="ann_gest_att.php?menu=6">'+ nom2 +'</a></li>' +
			'<li><a href="ann_gest_val.php?menu=6">'+ nom3 +'</a></li>' +
			'<li><a href="ann_gest_ref.php?menu=6">'+ nom5 +'</a></li>' +
			'<li><a href="ann_gest_conf.php?menu=6">'+ nom7 +'</a></li>' +
			'<li><a href="ann_gest_del.php?menu=6">'+ nom9 +'</a></li>' +
			'<li><a href="ann_exp_ret.php?menu=6" >'+ nom10 +'</a></li>' +
			'<li><a href="ann_sup_ref.php?menu=6" >'+ nom6 +'</a></li>' +
			'<li><a href="ann_sup_conf.php?menu=6" >'+ nom8 +'</a></li>' +
			'<li><a href="ann_sup_exp.php?menu=6" >'+ nom4 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu6').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu6(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\', \''+ nom10 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu7(val, nom1, nom2, nom3, nom4, nom5, nom6, nom7, nom8, nom9)
{
	if(val == 1) document.getElementById('get_menu7').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu7(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="acc_gest_att.php?menu=7&amp;type=1" >'+ nom2 +'</a></li>' +
			'<li><a href="acc_gest_val.php?menu=7&amp;type=1" >'+ nom3 +'</a></li>' +
			'<li><a href="acc_gest_ref.php?menu=7&amp;type=1" >'+ nom4 +'</a></li>' +
			'<li><a href="acc_gest_conf.php?menu=7&amp;type=1" >'+ nom5 +'</a></li>' +
			'<li><a href="acc_gest_att.php?menu=7&amp;type=2" >'+ nom6 +'</a></li>' +
			'<li><a href="acc_gest_val.php?menu=7&amp;type=2" >'+ nom7 +'</a></li>' +
			'<li><a href="acc_gest_ref.php?menu=7&amp;type=2" >'+ nom8 +'</a></li>' +
			'<li><a href="acc_gest_conf.php?menu=7&amp;type=2" >'+ nom9 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu7').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu7(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu8(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu8').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu8(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="blacklist.php?menu=8" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu8').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu8(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu9(val, nom1, nom2, nom3, nom4, nom5)
{
	if(val == 1) document.getElementById('get_menu9').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu9(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="pay_pa.php?menu=9" >'+ nom2 +'</a></li>' +
			'<li><a href="pay_allopass.php?menu=9" >'+ nom3 +'</a></li>' +
			'<li><a href="pay_atos.php?menu=9" >'+ nom4 +'</a></li>' +
			'<li><a href="pay_cheque.php?menu=9" >'+ nom5 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu9').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu9(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu10(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu10').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu10(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="pay_ann.php?menu=10" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu10').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu10(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu11(val, nom1, nom2, nom3, nom4, nom5, nom6, nom7, nom8)
{
	if(val == 1) document.getElementById('get_menu11').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu11(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="visu_opt.php?num=1&amp;menu=11" >'+ nom2 +'</a></li>' +
			'<li><a href="visu_opt.php?num=2&amp;menu=11" >'+ nom3 +'</a></li>' +
			'<li><a href="visu_opt.php?num=3&amp;menu=11" >'+ nom4 +'</a></li>' +
			'<li><a href="visu_opt.php?num=4&amp;menu=11" >'+ nom5 +'</a></li>' +
			'<li><a href="visu_opt.php?num=5&amp;menu=11" >'+ nom6 +'</a></li>' +
			'<li><a href="visu_opt.php?num=6&amp;menu=11" >'+ nom7 +'</a></li>' +
			'<li><a href="visu_opt.php?num=7&amp;menu=11" >'+ nom8 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu11').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu11(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu12(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu12').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu12(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="photo_opt.php?menu=12" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu12').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu12(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu13(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu13').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu13(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="video_opt.php?menu=13" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu13').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu13(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu14(val, nom1, nom2, nom3)
{
	if(val == 1) document.getElementById('get_menu14').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu14(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="packs_comptes.php?num=1&amp;menu=14" >'+ nom2 +'</a></li>' +
			'<li><a href="packs_comptes.php?num=2&amp;menu=14" >'+ nom3 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu14').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu14(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu15(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu15').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu15(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="packs_vitrine.php?menu=15" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu15').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu15(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu16(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu16').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu16(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="factures.php?menu=16" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu16').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu16(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu17(val, nom1, nom2, nom3, nom4, nom5, nom6, nom7)
{
	if(val == 1) document.getElementById('get_menu17').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu17(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="up_nombre_ann.php?menu=17" >'+ nom2 +'</a></li>' +
			'<li><a href="opt_visu_ann_exp.php?menu=17" >'+ nom3 +'</a></li>' +
			'<li><a href="opt_visu_vit_exp.php?menu=17" >'+ nom4 +'</a></li>' +
			'<li><a href="opt_pack_acc.php?menu=17" >'+ nom5 +'</a></li>' +
			'<li><a href="opt_pack_vit.php?menu=17" >'+ nom6 +'</a></li>' +
			'<li><a href="opt_relance.php?menu=17" >'+ nom7 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu17').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu17(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu18(val, nom1, nom2, nom3, nom4)
{
	if(val == 1) document.getElementById('get_menu18').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu18(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="xml_import.php?menu=18" >'+ nom2 +'</a></li>' +
			'<li><a href="xml_export.php?menu=18" >'+ nom3 +'</a></li>' +
			'<li><a href="xml_modele.php?menu=18" >'+ nom4 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu18').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu18(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu19(val, nom1, nom2, nom3, nom4, nom5, nom6, nom7, nom8, nom9, nom10, nom11, nom12, nom13, nom14, nom15, nom16, nom17, nom18, nom19)
{
	if(val == 1) document.getElementById('get_menu19').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu19(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\', \''+ nom10 +'\', \''+ nom11 +'\', \''+ nom12 +'\', \''+ nom13 +'\', \''+ nom14 +'\', \''+ nom15 +'\', \''+ nom16 +'\', \''+ nom17 +'\', \''+ nom18 +'\', \''+ nom19 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="mail_auto.php?l=1&amp;menu=19" >'+ nom2 +'</a></li>' +
			'<li><a href="mail_auto.php?l=2&amp;menu=19" >'+ nom3 +'</a></li>' +
			'<li><a href="mail_auto.php?l=3&amp;menu=19" >'+ nom4 +'</a></li>' +
			'<li><a href="mail_auto.php?l=4&amp;menu=19" >'+ nom5 +'</a></li>' +
			'<li><a href="mail_auto.php?l=5&amp;menu=19" >'+ nom6 +'</a></li>' +
			'<li><a href="mail_auto.php?l=6&amp;menu=19" >'+ nom7 +'</a></li>' +
			'<li><a href="mail_auto.php?l=7&amp;menu=19" >'+ nom8 +'</a></li>' +
			'<li><a href="mail_auto.php?l=8&amp;menu=19" >'+ nom9 +'</a></li>' +
			'<li><a href="mail_auto.php?l=9&amp;menu=19" >'+ nom10 +'</a></li>' +
			'<li><a href="mail_auto.php?l=10&amp;menu=19" >'+ nom11 +'</a></li>' +
			'<li><a href="mail_auto.php?l=11&amp;menu=19" >'+ nom12 +'</a></li>' +
			'<li><a href="mail_auto.php?l=12&amp;menu=19" >'+ nom13 +'</a></li>' +
			'<li><a href="mail_auto.php?l=13&amp;menu=19" >'+ nom14 +'</a></li>' +
			'<li><a href="mail_auto.php?l=14&amp;menu=19" >'+ nom15 +'</a></li>' +
			'<li><a href="mail_auto.php?l=15&amp;menu=19" >'+ nom16 +'</a></li>' +
			'<li><a href="mail_auto.php?l=16&amp;menu=19" >'+ nom17 +'</a></li>' +
			'<li><a href="mail_auto.php?l=17&amp;menu=19" >'+ nom18 +'</a></li>' +
			'<li><a href="mail_auto.php?l=18&amp;menu=19" >'+ nom19 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu19').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu19(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\', \''+ nom6 +'\', \''+ nom7 +'\', \''+ nom8 +'\', \''+ nom9 +'\', \''+ nom10 +'\', \''+ nom11 +'\', \''+ nom12 +'\', \''+ nom13 +'\', \''+ nom14 +'\', \''+ nom15 +'\', \''+ nom16 +'\', \''+ nom17 +'\', \''+ nom18 +'\', \''+ nom19 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu20(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu20').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu20(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="mails_contact.php?menu=20">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu20').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu20(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu21(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu21').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu21(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="pages.php?menu=21">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu21').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu21(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu22(val, nom1, nom2, nom3, nom4, nom5)
{
	if(val == 1) document.getElementById('get_menu22').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu22(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="pub_fond.php?menu=22" >'+ nom2 +'</a></li>' +
			'<li><a href="pub_header.php?menu=22" >'+ nom3 +'</a></li>' +
			'<li><a href="pub.php?p=2&amp;menu=22" >'+ nom4 +'</a></li>' +
			'<li><a href="pub.php?p=3&amp;menu=22" >'+ nom5 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu22').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu22(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\', \''+ nom5 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu23(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu23').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu23(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="maintenance.php?menu=23">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu23').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu23(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu24(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu24').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu24(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="sauvegarde.php?menu=24">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu24').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu24(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu25(val, nom1, nom2, nom3, nom4)
{
	if(val == 1) document.getElementById('get_menu25').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu25(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="temp_img.php?menu=25">'+ nom2 +'</a></li>' +
			'<li><a href="temp_style.php?menu=25&amp;type=1">'+ nom3 +'</a></li>' +
			'<li><a href="temp_style.php?menu=25&amp;type=2">'+ nom4 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu25').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu25(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu26(val, nom1, nom2, nom3)
{
	if(val == 1) document.getElementById('get_menu26').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu26(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="champs_act.php?menu=26">'+ nom2 +'</a></li>' +
			'<li><a href="champs.php?menu=26">'+ nom3 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu26').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu26(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu27(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu27').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu27(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="vit_gest.php?menu=27">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu27').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu27(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu28(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu28').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu28(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="reduc.php?menu=28">'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu28').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu28(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu29(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu29').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu29(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="filtre_mail.php?menu=29" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu29').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu29(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu30(val, nom1, nom2)
{
	if(val == 1) document.getElementById('get_menu30').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu30(2, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="achat_att.php?menu=30" >'+ nom2 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu30').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu30(1, \''+ nom1 +'\', \''+ nom2 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

function Menu31(val, nom1, nom2, nom3, nom4)
{
	if(val == 1) document.getElementById('get_menu31').innerHTML = 
	'<div class="menus_haut">' + 
		'<div class="img_fl"><img onclick="Menu31(2, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_haut.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>' +
	'<div class="menus_fond">' +
		'<ul class="ul_menu">' +
			'<li><a href="newsletter.php?type=1&amp;menu=31" >'+ nom2 +'</a></li>' +
			'<li><a href="newsletter.php?type=2&amp;menu=31" >'+ nom3 +'</a></li>' +
			'<li><a href="newsletter.php?type=3&amp;menu=31" >'+ nom4 +'</a></li>' +
		'</ul>' +
	'</div>';
	
	if(val == 2) document.getElementById('get_menu31').innerHTML = 
	'<div class="menus_haut" style="margin-bottom: 5px;">' + 
		'<div class="img_fl"><img onclick="Menu31(1, \''+ nom1 +'\', \''+ nom2 +'\', \''+ nom3 +'\', \''+ nom4 +'\')" style="cursor:pointer" src="images/fl_bas.png" alt="" /></a></div>' +
		'<ul class="ul_barre_adm"><li class="li_barre_adm">'+ nom1 +'</li></ul>' +
	'</div>';
}

////////////////////////////////
//Fonction affichage des checkbox
////////////////////////////////

function turnImgCheck(objCheck)
{
	var img = document.getElementById('img_check_' + objCheck.id);
	var t = img.src.split('/');
	img.src = (t[t.length-1] == 'check2.png') ? 'images/check1.png' : 'images/check2.png';
}

////////////////////////////////
//Fonction affichage des radios
////////////////////////////////

function turnImgRadio(objRadio, num)
{
    var t_img = document.getElementById('conteneurRadio'+ num).getElementsByTagName('img');

    for (var i = 0; i < t_img.length; i++)
    {
        t_img[i].src = 'images/radio1.png';
    }
    
    var img = document.getElementById('img_radio_' + objRadio.id);
    img.src = 'images/radio2.png';
}

////////////////////
//Fonction texte intput
////////////////////

function InputCon(input, txt)
{
	if (input.value == txt) 
	{	
		input.value = '';
	}
	else if (input.value == '')
	{
		input.value = txt;
	}
}

////////////////////////////////
//Fonction affichage de la note du formulaire de dépôt pour une sous-catégorie
////////////////////////////////

function GetNote() 
{
	var get_note = document.getElementById('get_note');
	var value_note = document.getElementById('form_note').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_note.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_note.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_note=" + value_note;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage du checkbox du disclaimer
////////////////////////////////

function GetDisc() 
{
	var get_disc = document.getElementById('get_disc');
	var value_disc = document.getElementById('form_disc').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_disc.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_disc.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_disc=" + value_disc;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des checkbox des options de sous-catégories
////////////////////////////////

function GetOpts() 
{
	var get_opts = document.getElementById('get_opts');
	var value_opts = document.getElementById('form_opts').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_opts.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_opts.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_opts=" + value_opts;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage du select des département
////////////////////////////////

function GetDepartements() 
{
	var get_departements = document.getElementById('get_departements');
	var value_dep = document.getElementById('form_dep').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_departements.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_departements.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_dep=" + value_dep;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage du select des département seconde sélection
////////////////////////////////

function GetDepartementsAll() 
{
	var get_departements = document.getElementById('get_departements_all');
	var value_dep = document.getElementById('form_dep').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_departements_all.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_departements.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_dep=" + value_dep;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des prix du paiement des annonces
////////////////////////////////

function GetPayAnn() 
{
	var get_pay_ann = document.getElementById('get_pay_ann');
	var value_pay_ann = document.getElementById('form_pay_ann').value;
	var xhr_object = null;

	if (window.XMLHttpRequest) 
		xhr_object = new XMLHttpRequest();
		
	else if (window.ActiveXObject) 
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		
	else 
	{
		alert("Votre navigateur ne prend pas en charge certaines applications de notre site internet, merci de changer de navigateur pour utiliser notre site.");
		return;
	}

	xhr_object.open("POST", "./includes/display/get_pay_ann.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_pay_ann.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_pay_ann=" + value_pay_ann;
	xhr_object.send(data);
}
