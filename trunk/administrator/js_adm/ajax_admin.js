/**
	Jquery ADMIN
*/

$(document).ready( function() {
	
	var isIE = false;
	var isIEltV9 = true;
	var isHome = $("#haut_con_adm");
	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
	{ // Tabelettes et smartphones
		var largeurEcran = screen.width;
		if(largeurEcran>=768)
		{ // Tabelettes
			largeurEcran = $(window).width();
		}
	}
	else
	{
		var largeurEcran = $(window).width();
	}
	var hauteurEcran = $(window).height();
	//largeurEcran -= 25;
	
	var largeurBody = $("body").width();
	
	var largeurBlocColor = largeurEcran*50/100;
	var colorBgHeader = null;
	var last_url = window.location.href;
	
	if(navigator.userAgent.match(/msie/i))
	{
		isIE = true;
		versionNav = navigator.appVersion;
		if(versionNav.indexOf("MSIE 6.") > 0 || versionNav.indexOf("MSIE 7.") > 0 || versionNav.indexOf("MSIE 8.") > 0)
			isIEltV9 = false;
	}	
	
	// Recherche variable menu dans l'URL
	$.urlParam = function(name)
	{
    	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	    if (results==null){
	       return null;
	    }
	    else{
	       return results[1] || 0;
	    }
	}
	var info = $.urlParam('menu');	
	
	$("#menu_left .menus_haut").find("img").trigger("click");
	$("#menu_left .menus_fond").hide();
	$("#get_menu" + info + " .menus_haut").find("img").trigger("click");
	$("#get_menu" + info + " .menus_haut").css("background-color","rgba(0,0,0,0.1)");
	
	// Icones
	$("#menu_left .menus_haut").prepend("<div class='plus_icone'></div>");		
	$("#menu_left .menus_haut").prepend("<div class='adm_ico'><img src='images/ico_defaut.png' /></div>");
	$("#get_menu1 .menus_haut").find(".adm_ico").html("<img src='images/ico_admin.png' />");
	$("#get_menu2 .menus_haut").find(".adm_ico").html("<img src='images/ico_gen.png' />");
	$("#get_menu3 .menus_haut").find(".adm_ico").html("<img src='images/ico_reg.png' />");
	$("#get_menu4 .menus_haut").find(".adm_ico").html("<img src='images/ico_cat.png' />");
	$("#get_menu5 .menus_haut").find(".adm_ico").html("<img src='images/ico_cat.png' />");
	$("#get_menu6 .menus_haut").find(".adm_ico").html("<img src='images/ico_ann.png' />");
	$("#get_menu7 .menus_haut").find(".adm_ico").html("<img src='images/ico_membre.png' />");
	$("#get_menu8 .menus_haut").find(".adm_ico").html("<img src='images/ico_ann.png' />");
	$("#get_menu9 .menus_haut").find(".adm_ico").html("<img src='images/ico_pay.png' />");
	$("#get_menu10 .menus_haut").find(".adm_ico").html("<img src='images/ico_pay.png' />");
	$("#get_menu11 .menus_haut").find(".adm_ico").html("<img src='images/ico_opt.png' />");
	$("#get_menu12 .menus_haut").find(".adm_ico").html("<img src='images/ico_opt.png' />");
	$("#get_menu13 .menus_haut").find(".adm_ico").html("<img src='images/ico_opt.png' />");
	$("#get_menu14 .menus_haut").find(".adm_ico").html("<img src='images/ico_membre.png' />");
	$("#get_menu15 .menus_haut").find(".adm_ico").html("<img src='images/ico_ann.png' />");
	$("#get_menu28 .menus_haut").find(".adm_ico").html("<img src='images/ico_reduc.png' />");
	$("#get_menu16 .menus_haut").find(".adm_ico").html("<img src='images/ico_fact.png' />");
	$("#get_menu17 .menus_haut").find(".adm_ico").html("<img src='images/ico_maj.png' />");
	$("#get_menu18 .menus_haut").find(".adm_ico").html("<img src='images/ico_xml.png' />");	
	$("#get_menu19 .menus_haut").find(".adm_ico").html("<img src='images/ico_mail.png' />");
	$("#get_menu20 .menus_haut").find(".adm_ico").html("<img src='images/ico_mail.png' />");
	$("#get_menu22 .menus_haut").find(".adm_ico").html("<img src='images/ico_pub.png' />");
	$("#get_menu23 .menus_haut").find(".adm_ico").html("<img src='images/ico_maint.png' />");
	$("#get_menu24 .menus_haut").find(".adm_ico").html("<img src='images/ico_backup.png' />");
	$("#get_menu25 .menus_haut").find(".adm_ico").html("<img src='images/ico_template.png' />");
	$("#get_menu27 .menus_haut").find(".adm_ico").html("<img src='images/ico_ann.png' />");
	$("#get_menu29 .menus_haut").find(".adm_ico").html("<img src='images/ico_mail.png' />");
	$("#get_menu30 .menus_haut").find(".adm_ico").html("<img src='images/ico_pay.png' />");
	
	$("#get_menu" + info + " .menus_haut").find("div.plus_icone").css("background-position","bottom center");	
	
	// Clic Menus	
	$("#menu_left .menus_haut").click( function()
	{	
		$("#menu_left .menus_fond").slideUp("normal", function()
		{
			$("#menu_left").mCustomScrollbar("update");
		});
		$("#menu_left").find(".plus_icone").css("background-position","top center");
		
		//console.log($(this).attr("id"));
		
		if($(this).attr("id") == "menu_actif")
		{ // Actif
			$(this).removeAttr("id");
			$(this).css("background-color","transparent");
			$(this).find(".plus_icone").css("background-position","top center");
		}
		else
		{ // Inactif		
			$("#menu_left .menus_haut").css("background","transparent");
			$(this).css("background-color","rgba(0,0,0,0.1)");
			
			$(this).parent().find(".menus_fond").slideDown("normal", function()
			{
				$("#menu_left").mCustomScrollbar("update");
			});
			
			$(this).find(".plus_icone").css("background-position","bottom center");
			$("#menu_left .menus_haut").removeAttr("id");
			$(this).attr("id","menu_actif");
		}
	});
	
	// Détecter si page d'accueil	
	if(isHome.length == 0)
	{
		$("#haut_adm_right").prepend("<li class=\"li_head_adm\">&nbsp;<a href=\"#\" id=\"lien_config\"></a>&nbsp;</li>");
	}	
	
	$("#menu_left .ul_barre_adm").mouseover( function()
	{
		$(this).css("background-color","rgba(0,0,0,0.1)");
	});
	$("#menu_left .ul_barre_adm").mouseout( function()
	{
		$(this).css("background","transparent");
	});
	$(".li_head_adm a").mouseover( function()
	{
		$(this).css("color","#E6E6E6");
		$(this).css("background-color","rgba(255,255,255,0.1)");
	});	
	$(".li_head_adm a").mouseout( function()
	{
		$(this).css("background-color","rgba(255,255,255,0.2)");
	});
	$('html').click(function() {
		$("#color_bloc").slideUp("normal");
	});
	$("#lien_config").click( function(event)
	{
		$("#color_bloc").slideToggle("normal");
		event.stopPropagation();
		return false;
	});
	
	/* ***********************************************************************************************************
												CSS DYNAMIQUE JQUERY
	 *************************************************************************************************************
	*/
	
	$("#menu_left").css({
		"height":(hauteurEcran - 88)+"px"
	});
	$("#menu_left .menus_haut:last-child").css({
		"margin-bottom":"40px"
	});
	$(".li_head_adm a").css({
		"background-color":"rgba(255,255,255,0.2)"
	});
	if(isIE){
		$(".li_head_adm a").css({
			"background-color":"transparent"
		});
	}
	
	function modifCssCadreCentre()
	{
		$("#menu_right").css({
			"margin":"80px 0 0 295px",
			"padding":"0",
			"width":(largeurEcran - 320)+"px"
		});
		$(".menus_r_haut").css({
			"background":"rgba(250,250,250,0.8)",
			"border":"none",
			"border-bottom":"solid 1px #ccc"
		});
		$(".menus_r_haut .li_barre_adm").css({
			"color":"#666666",
			"font-weight":"bold"
		});
		$(".menus_r_fond").css({
			"border":"none",
			"background":"rgba(250,250,250,0.8)"
		});
		if(isIE){
			paddingRightMRfond = $("#menus_r_haut").width() - 618;
			$(".menus_r_fond").css({
				"padding-right":paddingRightMRfond
			});
		}
	}
	modifCssCadreCentre();
	
	/* ***********************************************************************************************************
											AJAX APPEL CONTENU CENTRE
	 *************************************************************************************************************
	*/
	/*
	$("body a").click( function(){
		
		var link_id = $(this).attr("id");
		
		if(link_id != "lien_config")
		{
			var lienHref = $(this).attr("href");
			last_url = lienHref;
			
			$("#menu_right").wrap("<div id=\"menu_right_wrapper\"></div>");
			$("#menu_right").remove();
			$("#menu_right_wrapper").empty();
			$("#menu_right_wrapper").load(lienHref + " #menu_right");
			$("#menu_right").animate({
				opacity:"0.4"
			});
			$("#loading").fadeIn();
		}
		
		return false
	});
	*/
	
	/* ***********************************************************************************************************
							GESTION EVENEMENTS AJAX + IMG LOADING AJOUTEE DYNAMIQUEMENT
	 *************************************************************************************************************
	*/
	// Création dans le DOM de l'image Loading
	$("#menu_right").before("<div id=\"loading\">LOADING...</div>");
	//Position dans la page
	if($("#menu_right").length > 0){
		$positionMenuRight = $("#menu_right").offset();
		$posLeftMenuRight = $positionMenuRight.left;
		$posTopMenuRight = $positionMenuRight.top;
	}else{
		$positionMenuRight = $posLeftMenuRight = $posTopMenuRight = null;
	}
	
	//Taille de l'element
	$menuRightWidth = $("#menu_right").width();
	//Calcul position du loading
	$topLoading = $posTopMenuRight - 20;
	$leftLoading = $posLeftMenuRight + ($menuRightWidth/2) - 110;
	$("#loading").css({
		"background":"rgba(0,0,0,0.1)",
		"position":"fixed",
		"letter-spacing":"2px",
		"font-size":"1em",
		"font-family":"Arial",
		"color":"#999999",
		"z-index":"50",
		"height":"25px",
		"width":"100px",
		"padding":"10px 50px 10px 60px",
		"top":$topLoading+"px",
		"left":$leftLoading+"px",
		"opacity":"0.4"
	}).hide();
	if(isIE){
		$("#loading").css({
			"background":"#eee"
		});
	}
	
	/* Gestion globale des événements Ajax sur la page */
	/*
	$("body").prepend("<div id=\"debug\"></div>");
	$("#debug").css({
		"background":"rgba(250,250,250,0.9)",
		"color":"#333",
		"position":"absolute",
		"left": ((largeurEcran/2)-200) + "px",
		"top":"0",
		"z-index":"50",
		"padding":"10px",
		"width":"400px",
		"-o-box-shadow":"0 0 5px 5px #555",
		"-webkit-box-shadow":"0 0 5px 5px #555",
		"-moz-box-shadow":"0 0 5px 5px #555",
		"box-shadow":"0 0 5px 5px #555"
	}).hide();
	
	$(document).ajaxStart(function() {
		$("#debug").empty();
		$("#debug").append("<p>Requête Ajax en cours...</p>");
		$("#debug").fadeIn("slow");
	});
	
	$(document).ajaxError(function() {
		$("#debug").append("<p>Erreur Ajax</p>");
	});
	
	$(document).ajaxSuccess(function(event, xhr, settings) {
		$("#debug").append("<p>Succès Ajax !</p>");
	});
	
	$(document).ajaxComplete(function(event, request, settings)
	{	
		modifCssCadreCentre();
		$("#menu_right").animate({
			opacity:"1"	
		});
		$("#loading").hide();
		$(".pads").css("background-color",colorBgHeader);
		$("#menu_left").mCustomScrollbar("update");
		
		
		var action_fom = $("#menu_right").find("form").attr("action");
		
		if(!action_fom)
		{
			$("#menu_right").find("form").attr("action", last_url);
			
			action_fom = $("#menu_right").find("form").attr("action");
			//alert(action_fom);
		}		
		
		//$("#debug").append("<p>Requête terminée</p>");
		//$("#debug").delay(2000).fadeOut("slow");
		
	});	
	*/
	
	/* ***********************************************************************************************************
						AJOUT DYNAMIQUE JQUERY D'ELEMENTS DANS DOM POUR CHOIX COULEURS
	 *************************************************************************************************************
	*/
	largeurBlocColor = "535";
	$("<div id=\"color_bloc\"><div class=\"title_color\">"+color_title+"</div></div>").insertAfter("#haut_adm").hide();
	$("#color_bloc").css({
		"position":"fixed",
		"z-index":"2",
		"top":"75px",
		"background":"rgba(221,221,221,0.9)",
		"color":"#444",
		"font-weight":"bold",
		"font-size":"0.8em",
		"font-family":"Arial",
		"width":largeurBlocColor+"px",
		"right": "0",
		"margin":"0"
	});
	if(isIE){
		$("#color_bloc").css({
			"background":"#eee"
		});
	}
	$("#color_bloc div.title_color").css({
		"background":"#555",
		"color":"#EEE",
		"padding":"10px",
		"text-align":"center"
	});	
	
	// Couleur des fonds menus
	$("<div id=\"colorDiv2\">"+color_bg_menus+"<br /><br /><input type='text' id=\"full2\" /></div>").appendTo("#color_bloc");
	$("#colorDiv2").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin":"7px 10px 0 10px",
		"float":"left",
		"text-align":"center"
	});
	
	// Couleur des textes des menus
	$("<div id=\"colorDiv4\">"+color_txt_menus+"<br /><br /><input type='text' id=\"full4\" /></div>").appendTo("#color_bloc");
	$("#colorDiv4").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin":"7px 10px 0 10px",
		"float":"left",
		"text-align":"center"
	});
	
	// Couleur fond des sous-menus
	$("<div id=\"colorDiv5\">"+color_bg_smenus+"<br /><br /><input type='text' id=\"full5\" /></div>").appendTo("#color_bloc");
	$("#colorDiv5").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin":"7px 10px 0 10px",
		"float":"left",
		"text-align":"center"
	});
	
	// Couleur textes des sous-menus
	$("<div id=\"colorDiv6\">"+color_txt_smenus+"<br /><br /><input type='text' id=\"full6\" /></div>").appendTo("#color_bloc");
	$("#colorDiv6").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin":"7px 10px 0 10px",
		"float":"left",
		"text-align":"center"
	});
	
	// Couleur de fond
	/*
	$("<div id=\"colorDiv\">Fond<br /><input type='text' id=\"full\" /></div>").appendTo("#color_bloc");
	$("#colorDiv").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin-top":"7px",
		"width":"30%",
		"float":"left"
	});
	*/

	// Couleur bandeu Haut et titre centre
	$("<div id=\"colorDiv3\">"+color_bg_header+"<br /><br /><input type='text' id=\"full3\" /></div>").appendTo("#color_bloc");
	$("#colorDiv3").css({
		"color":"#444",
		"font-size":"0.8em",
		"font-family":"Arial",
		"padding":"5px",
		"margin":"7px 10px 0 10px",
		"float":"left",
		"text-align":"center"
	});
	
	// Ajout d'un bouton d'initialisation
	$("<div id=\"colorDiv100\"><input type='button' value='"+color_txt_button+"' id=\"full100\" /></div>").appendTo("#color_bloc");
	$("#colorDiv100").css({
		"color":"#444",
		"width":(largeurBlocColor*90/100) + "px",
		"margin":"auto"
	});
	$("#colorDiv100 input").css({
		"width":(largeurBlocColor*90/100) + "px",
		"color":"#EEE",
		"font-size":"0.9em",
		"font-family":"Arial",
		"padding":"5px 75px",
		"background":"#555",
		"border":"none",
		"cursor":"pointer",
		"margin":"20px auto 20px auto",
		"letter-spacing":"1px"
	});
	if(isIE){
		$("#colorDiv100 input").css({
			"margin":"20px 0 7px 5px"
		});
	}
	$("#colorDiv100 input").click( function(){		
		changeCouleurs(1);
	});
	
	
	/* ***********************************************************************************************************
							GESTION DES COULEURS INTERFACE ADMINISTRATION - AJAX / PHP
	 *************************************************************************************************************
	*/
	// Objet XML en String
	function xmlToString(xmlData) {
		var xmlString;		
		if (window.ActiveXObject && isIEltV9 == false){//IE
			xmlString = xmlData.xml;
		}else{// code for Mozilla, Firefox, Opera, etc.
			xmlString = (new XMLSerializer()).serializeToString(xmlData);
		}
		return xmlString;
	} 
	// Mise a jour du fichier XML couleurs via script PHP
	function updateXml(idColor,color,reinita){
		$.ajax( {
			type: "GET",
			url: "style/adm_colors.xml",
			dataType: "xml",
			cache: false,
			success: function(data) 				
				 {
				   if(reinita == 1){ // Update xml couleurs actuelles par les couleurs par defaut
					    var defaultColor1 = $(data).find('couleurs_admin>couleur#1>defaut').text();
							$(data).find('couleurs_admin>couleur#1>actuel').text(defaultColor1);
						var defaultColor2 = $(data).find('couleurs_admin>couleur#2>defaut').text();
							$(data).find('couleurs_admin>couleur#2>actuel').text(defaultColor2);
						var defaultColor3 = $(data).find('couleurs_admin>couleur#3>defaut').text();
							$(data).find('couleurs_admin>couleur#3>actuel').text(defaultColor3);
						var defaultColor4 = $(data).find('couleurs_admin>couleur#4>defaut').text();
							$(data).find('couleurs_admin>couleur#4>actuel').text(defaultColor4);
						var defaultColor5 = $(data).find('couleurs_admin>couleur#5>defaut').text();
							$(data).find('couleurs_admin>couleur#5>actuel').text(defaultColor5);
						var defaultColor6 = $(data).find('couleurs_admin>couleur#6>defaut').text();
							$(data).find('couleurs_admin>couleur#6>actuel').text(defaultColor6);
				   }else{
						$(data).find('couleurs_admin>couleur#' + idColor + '>actuel').text(color);	
				   }
				   var xmlData = xmlToString(data);
				   if(xmlData != null){
					   	$(document).load("includes/functions_adm_colors.php",
						{
						   contenuXml : xmlData
						});
				   }
				  }
		});
	}
	
	// Gestion des couleurs en XML - Enregsitrement du fichier xml via script PHP
	function changeCouleurs(defautBool)
	 {
	   $.ajax( {
			type: "GET",
			url: "style/adm_colors.xml",
			dataType: "xml",
			cache: false,
			success: function(data) 
				 {
				   $(data).find('couleurs_admin').each(   
					 function()
					 {
						var colorTab = new Array();
						$(this).find('couleur').each(
							function()
							{
								var defaut = $(this).find('defaut').text();
								var actuel = $(this).find('actuel').text();
								var colorSelected;
								if(defautBool==1)	colorSelected = defaut;
								else	colorSelected = actuel;								
								
								var id = $(this).attr('id');								
								if(id==1){ // Couleur Fond Menus
									$("#full2").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$("#menu_left").css("background-color",color.toHexString()),
											updateXml(1,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});
									$("#menu_left").css("background-color",colorSelected);
								}else if(id==2){// Couleur Textes Menus
									$("#full4").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$("#menu_left .ul_barre_adm .li_barre_adm").css("color",color.toHexString()),
											updateXml(2,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});
									$("#menu_left .ul_barre_adm .li_barre_adm").css("color",colorSelected);
								}else if(id==3){// Couleur Fond SousMenus
									$("#full5").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$(".menus_fond").css("background-color",color.toHexString()),
											updateXml(3,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});
									$(".menus_fond").css("background-color",colorSelected);
								}else if(id==4){// Couleur Textes SousMenus
									$("#full6").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$(".menus_fond a").css("color",color.toHexString()),
											updateXml(4,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});
									$(".menus_fond a").css("color",colorSelected);
								}else if(id==5){ // Couleur Fond Body	
									$("#full").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$("body").css("background-color",color.toHexString()),
											updateXml(5,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});
									$("body").css("background-color",colorSelected);
								}else if(id==6){// Couleur Fond Bandeau Haut
									$("#full3").spectrum({
										color: colorSelected,
										showInput: true,
										className: "full-spectrum",
										showInitial: true,
										showPalette: true,
										showSelectionPalette: true,
										maxPaletteSize: 10,
										preferredFormat: "hex",
										localStorageKey: "spectrum.demo",
										move: function (color) {
											$("#haut_adm").css("border-color",color.toHexString()),
											$("#haut_adm").css("background-color",color.toHexString()),
											$(".pads").css("background-color",color.toHexString()),
											colorBgHeader = color.toHexString(),
											updateXml(6,color.toHexString(),0)
										},
										palette: [
											["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
											"rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
											["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
											"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
											["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
											"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
											"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
											"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
											"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
											"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
											"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
											"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
											"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
										]
									});									
									$("#haut_adm").css("border-color",colorSelected);
									$("#haut_adm").css("background-color",colorSelected);
									$(".pads").css("background-color",colorSelected);
									colorBgHeader = colorSelected;
								}
								
								if(defautBool==1){ // Clic bouton couleurs valeurs par défaut
									updateXml(0,0,1);
								}
							});
					  });
				  }
		});		
	  }
	changeCouleurs(0);
	
	/* ***********************************************************************************************************
													PLUGIN SCROLLBARRE
	 *************************************************************************************************************
	*/
    $(window).load(function(){
        $("#menu_left").mCustomScrollbar({
			verticalScroll:true,
			theme:"light-thick",
			autoDraggerLength: true,
			scrollButtons:{
			    enable: true
			}
		});
    });
	
	/* ***********************************************************************************************************
																	MOBILE
	 *************************************************************************************************************
	*/
	
	$("#haut_adm").append("<div id=\"mobile_button\"></div>");
	$("#mobile_button").css({
		"display": "none",
		"width": "50px",
		"height": "50px",
		"position":"absolute",
		"top":"55px",
		"left":"5px",
		"background":"url(images/mobile-button.png) no-repeat top left"
	});
	var move_pos = 0;
	$("#mobile_button").click( function()
	{
		var pos_menu = $("#menu_left").css("left");
		
		
		if(pos_menu == "0px" && move_pos == 0)
		{
			move_pos = 1;
			$("#menu_left").animate({
				left: "-=280"
			}, 500, function() {
				move_pos = 0;
			});
		}
		else if(move_pos == 0)
		{
			move_pos = 1;
			$("#menu_left").animate({
				left: "+=280"
			}, 500, function() {
				move_pos = 0;
			});
		}
		
	});
	
	function rd_mobile()
	{
		$("#haut_adm").css({
			"height":"114px",
			"background-size": "140px 38px"
		});
		$(".p_txt_head_adm").css({
			"font-size": "0.8em"
		});		
		$("#haut_adm_left").css({
			"margin":"25px 0 0 160px"
		});
		$("#haut_adm_right").css({
			"width": (largeurEcran/1.5) + "px",
			"height":"55px",
			"margin":"15px 10px 0 0"
		});
		$("#haut_adm_right li").css({
			"line-height":"26px",
			"display":"block",
			"float":"right",
			"margin":"0 0 0 7px"
		});			
		$("#menu_left").css({
			"left":"-280px",
			"top": "114px",
			"height":(hauteurEcran - 160)+"px"
		});
		$("#menu_right").css({
			"width": largeurEcran + "px",
			"margin" : "114px 0 0 0"
		});
		$("#haut_con_adm").css("margin-top", "114px");		
		$("#color_bloc").css({
			"width": (largeurEcran * 96 / 100) + "px",
			"top": "114px"
		});
		$("#color_bloc br").remove();
		$("#colorDiv2").css({
			"width": "20%",
			"min-height" : "60px"
		});
		$("#colorDiv3").css({
			"width": "20%",
			"min-height" : "60px"
		});
		$("#colorDiv4").css({
			"width": "20%",
			"min-height" : "60px"
		});
		$("#colorDiv5").css({
			"width": "20%",
			"min-height" : "60px"
		});
		$("#colorDiv6").css({
			"width": "20%",
			"min-height" : "60px"
		});
		$("#colorDiv100 input").css({
			"width": largeurBody + "px",
			"float":"left",
			"clear":"both",
			"margin-left":"20px"
		});
		$(".menus_r_haut").css("height", "auto");
		$(".li_center").css("height", "auto");
		$(".menus_r_fond").css({
			"width": largeurEcran + "px",
			"padding" : "25px 0 25px 7px"
		});
		$(".menus_r_fond div").css({
			"width": (largeurBody * 95 / 100) + "px",
			"margin" : "0",
			"padding" : "5px"
		});
		$(".menus_r_fond div textarea").css({
			"width": "90%"
		});
		$(".form_left").css("text-align", "left");
		$(".form_left_2").css("text-align", "left");
		$(".form_left_3").css("text-align", "left");		
		$(".p_center").css("padding", "0");
		$(".li_contenu").css("line-height", "30px");
		$(".pads").css({
			"width": "40%",
			"font-size" : "1.4em",
			"padding" : "10px 2% 10px 2%"
		});
		$(".pads span").css("margin-bottom", "-7px");
		$(".return").css("clear", "inherit");
		
		if(isHome.length == 0)
		{
			$("#mobile_button").css({
				"display": "block"
			});
		}
		
		$("body").css({
			"overflow-x": "hidden"
		});
	}
	if(largeurEcran < 740) // Si smartphone
	{
		rd_mobile();
	}
	
	/* ***********************************************************************************************************
											GESTION REDIMENSSIONNEMENT FENETRE
	 *************************************************************************************************************
	*/
	$(window).resize(function(){
		
		hauteurEcran = $(window).height();
		
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			largeurEcran = screen.width;
			largeurEcran -= 25;
		}
		else
		{
			largeurEcran = $(window).width();
			largeurEcran -= 25;
			$("#menu_left").mCustomScrollbar("update");
			$("#menu_left").css({
				"width":"280px",
				"position":"fixed",
				"top":"78px",
				"left":"0",
				"margin":"0",
				"padding-top":"10px",
				"padding-bottom":"20px",
				"height":(hauteurEcran - 88)+"px"
			});
			$("#menu_right").css({
				"margin":"75px 0 0 295px",
				"padding":"0",
				"width":(largeurEcran - 320)+"px"
			});	
		}		
	});
	
	$("body").show();	
	
});