///////////////////////////////////////////////////////////////////////////////////////////
//Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
//Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

//############################################################

////////////////////////////////
//Fonctions affichage des régions et de l'info bulle sur la carte
////////////////////////////////

function MapReg(id_reg)
{
	document.getElementById('map_region').style.background = 'url(images/map/carte'+ id_reg +'.png) no-repeat';
}

function MapRegBulle(nom_reg, nb_ann, texte, e)
{
	if (!e) var e = window.event;
	
	var obj = document.getElementById('bulle');
	
	obj.style.display = 'block';
	obj.innerHTML = '<span class="tx_reg_bulle">'+ nom_reg +'</span><br /><span class="tx_bulle">'+ nb_ann +'</span> <span class="tx_bulle">'+ texte +'</span>';
	
	var st = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
	
	if (navigator.userAgent.toLowerCase().indexOf('safari') >= 0) st = 0; 
	
	if (e.pageX || e.pageY) {
		posx = e.pageX;
		posy = e.pageY;
	}
	else if (e.clientX || e.clientY) {
		posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		posy = e.clientY + document.body.scrollTop 	+ document.documentElement.scrollTop;
	}
	
	var leftPos = posx - 40;
	
	if (leftPos < 0) leftPos = 0;
	
	obj.style.left = leftPos + 'px';
	obj.style.top = posy - obj.offsetHeight - 3 + 'px';
}

function MapRegSup()
{
	document.getElementById('map_region').style.background = 'none';
	document.getElementById('bulle').style.display = 'none';
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

////////////////////////////////
//Fonction affichage des checkbox
////////////////////////////////

function turnImgCheck(objCheck)
{
	var img = document.getElementById('img_check_' + objCheck.id);
	var t = img.src.split('/');
	img.src = (t[t.length-1] == 'check2.png') ? 'images/check1.png' : 'images/check2.png';
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
//Fonction affichage du nom d'entreprise et siret pour les professionnel
////////////////////////////////

function GetPro(val, nom_ent, num_sir, sir)
{
	if (val == 2 && sir == 0) document.getElementById('get_pro').innerHTML = '<p class="form_left"><label for="ent">'+ nom_ent +' :</label></p><p class="form_right_select"><input type="text" id="ent" class="long_input" name="ent" value=""></p>';
	
	else if (val == 2 && sir == 1) document.getElementById('get_pro').innerHTML = '<p class="form_left"><label for="ent">'+ nom_ent +' :</label></p><p class="form_right_select"><input type="text" id="ent" class="long_input" name="ent" value=""></p>' +
	'<p class="form_left"><label for="sir">'+ num_sir +' :</label></p><p class="form_right_select"><input type="text" id="sir" class="long_input" name="sir" value=""></p>';
	
	else document.getElementById('get_pro').innerHTML = '';
}

////////////////////////////////
//Fonction hauteur de l'iframe
////////////////////////////////

function calcHeight()
{
	var the_height = document.getElementById('uploadFrame').contentWindow.document.body.scrollHeight;
	document.getElementById('uploadFrame').height=the_height;
	return;
}

////////////////////////////////
//Fonction affichage de l'image de telechargement
////////////////////////////////

function AffImg(val)
{
	if (val == 2) document.getElementById('aff_img').innerHTML = '<p class="form_left"></p><p class="form_right"><span class="orange">TÉLÉCHARGEMENT EN COURS</span> <img src="images/upload.gif" alt="" /></p>';
	
	else document.getElementById('aff_img').innerHTML = '';
}

////////////////////////////////
//Fonction affichage des départements pour la recherche
////////////////////////////////

function GetDepartements() 
{
	var get_departements = document.getElementById('get_departements');
	var value_dep = document.getElementById('dep').value;
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

	xhr_object.open("POST", "./includes/display/search_departements.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_departements.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "dep=" + value_dep;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des options pour la recherche
////////////////////////////////

function GetOptions() 
{
	var get_options = document.getElementById('get_options');
	var value_opt = document.getElementById('opt').value;
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

	xhr_object.open("POST", "./includes/display/search_options.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			get_options.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "opt=" + value_opt;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des départements pour le dépot d'une annonce
////////////////////////////////

function DisplayDepartements()
{
	var display_departements = document.getElementById('display_departements');
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

	xhr_object.open("POST", "./includes/display/form_departements.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			display_departements.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "form_dep=" + value_dep;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage du prix de l'annonce
////////////////////////////////

function DisplayPrix() 
{
	var display_prix = document.getElementById('display_prix');
	var value_prix = document.getElementById('options').value;
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

	xhr_object.open("POST", "./includes/display/form_prix.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			display_prix.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "options=" + value_prix;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des options pour le dépot d'une annonce
////////////////////////////////

function DisplayOptions() 
{
	var options_form = document.getElementById('options_form');
	var value_opt = document.getElementById('options').value;
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

	xhr_object.open("POST", "./includes/display/form_options.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			options_form.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "options=" + value_opt;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage du commentaire dans le formulaire
////////////////////////////////

function DisplayComment() 
{
	var commentaire_form = document.getElementById('commentaire');
	var value_opt = document.getElementById('options').value;
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

	xhr_object.open("POST", "./includes/display/form_comment.php", true);

	xhr_object.onreadystatechange = function() 
	{
		if (xhr_object.readyState == 4) 
		{
			commentaire_form.innerHTML = xhr_object.responseText;
		}
	}

	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "options=" + value_opt;
	xhr_object.send(data);
}

////////////////////////////////
//Fonction affichage des photos
////////////////////////////////

function photos(photo, tableau, num, type)
{
	var photos = tableau;
	num = num + 1;
		
	for (i = 0; i < photos.length; i++)
	{ 
		if(i == 0)
		tab = '"'+ photos[i] +'"';
		
		else tab += ', "'+ photos[i] +'"';
		
		if(photo == photos[i])
		num = i;
	} 
	
	tab = '[' + tab +']';
	
	if(type == 1)
	{
		document.getElementById('bloc_photo_ann').innerHTML = '<img src="images/photos/'+ photo +'" id="photo" alt="" onclick=\'photos("", '+ tab +', '+ num +', 2)\' />';
	}
	else
	{
		if(num == i) num = 0;
		
		document.getElementById('bloc_photo_ann').innerHTML = '<img src="images/photos/'+ photos[num] +'" id="photo" alt="" onclick=\'photos("", '+ tab +', '+ num +', 2)\' />';
	}
}

////////////////////////////////
//Fonction affichage des photos
////////////////////////////////

function photos_xml(photo, tableau, num, type)
{
	var photos = tableau;
	num = num + 1;
		
	for (i = 0; i < photos.length; i++)
	{ 
		if(i == 0)
		tab = '"'+ photos[i] +'"';
		
		else tab += ', "'+ photos[i] +'"';
		
		if(photo == photos[i])
		num = i;
	} 
	
	tab = '[' + tab +']';
	
	if(type == 1)
	{
		document.getElementById('bloc_photo_ann').innerHTML = '<img src="'+ photo +'" id="photo" alt="" style="max-width: 677px; max-height: 480px;" onclick=\'photos_xml("", '+ tab +', '+ num +', 2)\' />';
	}
	else
	{
		if(num == i) num = 0;
		
		document.getElementById('bloc_photo_ann').innerHTML = '<img src="'+ photos[num] +'" id="photo" alt="" style="max-width: 677px; max-height: 480px;" onclick=\'photos_xml("", '+ tab +', '+ num +', 2)\' />';
	}
}

////////////////////////////////
//Fonction affichage de la vidéo
////////////////////////////////

function GetVideo(num, video)
{
	if (num == 1) document.getElementById('video').innerHTML = '<div id="bloc_photo_ann">' +
	'<iframe src="http://www.youtube.com/embed/'+video+'" width="669" height="380" border="0"></iframe>' +
	'</div>';
	
	else if (num == 2) document.getElementById('video').innerHTML = '<div id="bloc_photo_ann">' +
	'<iframe src="http://www.dailymotion.com/embed/video/'+video+'" width="669" height="380" border="0"></iframe>' +
	'</div>';
	
	else document.getElementById('video').innerHTML = '';
}