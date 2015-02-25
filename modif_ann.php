<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Vérfication de l'utilisateur
//////////////////////////////////

if(!isset($_SESSION['valid_id']))
redirect('index.php');

///////////////////////////////////
//Optenir la valeur des champs
//////////////////////////////////

if(!isset($_POST['nom']))
{
	$conn = db_connect();
	$images = get_images($_SESSION['valid_id']);
	$infos = get_annonce($_SESSION['valid_id']);
	$opts = get_annonce_infos_opts($_SESSION['valid_id']);
	$champs = get_annonce_infos_champs($_SESSION['valid_id']);
	$conn = null;
	
	$_SESSION['cod'] = $infos[0]['code_pos'];
	$_SESSION['vil'] = $infos[0]['ville'];
	$_SESSION['cat'] = $infos[0]['id_cat'];
	$_SESSION['sta'] = $infos[0]['status'];
	$_SESSION['ent'] = $infos[0]['nom_societe'];
	$_SESSION['sir'] = $infos[0]['siret'];
	$_SESSION['nom'] = $infos[0]['nom'];
	$_SESSION['tel'] = $infos[0]['tel'];
	$_SESSION['tel_cache'] = $infos[0]['tel_cache'];
	$_SESSION['tit'] = $infos[0]['titre'];
	$_SESSION['ann'] = $infos[0]['ann'];
	$_SESSION['pri'] = $infos[0]['prix'];
	$_SESSION['compte'] = $infos[0]['id_compte'];
	$_SESSION['video'] = $infos[0]['video'];
	
	//Images
	
	if(isset($_SESSION['photo']))
	unset($_SESSION['photo']);
	
	if(is_array($images))
	{
		$i = 0;
		
		foreach($images as $v)
		{
			$i++;
			$_SESSION['photo'][$i] = $v['nom'];
		}
		$_SESSION['photo']['count'] = $i;
		$_SESSION['photo']['count_all'] = $i;
	}

	//Options
	
	if(is_array($opts))
	{
		foreach($opts as $row)
		{
			$id_opt = (int) $row['id_opt'];
			
			foreach($cache_form as $v)
			{
				if($v['id_cat'] == $_SESSION['cat'] && $v['id_opt'] == $id_opt)
				$id_for = $v['id_for'];
			}
			
			if(!empty($id_for))
			{
				$for_name = 'form'. $id_for;
				$_SESSION[$for_name] = $row['val_for'];
			}
		}
	}
	
	if(is_array($champs))
	{
		foreach($champs as $v)
		{
			$id_champ = $v['id_champ'];
			
			$for_champ = 'champ'. $id_champ;
			$_SESSION[$for_champ] = $v['valeur'];
		}
	}
}

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['nom']))
{
	$cat = (int) $_SESSION['cat'];
	
	if ($cat != 0)
	{
		foreach ($cache_form as $row)
		{
			$k = $row['id_for'];
			$name = "form". $k;
		 
			if($row['type'] == 1 && $row['id_cat'] == $cat)
			{
				if (empty($_POST[$name]) || preg_match("#^[0-9]+$#", $_POST[$name]) != true)
				$error[$name] = 1;
			}
			
			if($row['type'] == 2 && $row['id_cat'] == $cat)
			{
				if (empty($_POST[$name]))
				$error[$name] = 1;
			}
		}
	}  
	
	foreach($cache_champs as $v)
	{
		$id_champ = (int) $v['id_champ'];
		$nom = htmlspecialchars($v['nom']);
		$numeric = (int) $v['numeric'];
		$type = (int) $v['type']; 
		
		if($numeric == 1)
		{
			if($type == 1)
			{
				if(empty($_POST[$id_champ]) || preg_match("#^[0-9]+$#", $_POST[$id_champ]) != true)
				$error[$id_champ] = 1;
			}
			else
			{
				if(!empty($_POST[$id_champ]) && preg_match("#^[0-9]+$#", $_POST[$id_champ]) != true)
				$error[$id_champ] = 1;
			}
		}
		else
		{
			if($type == 1)
			{
				if(empty($_POST[$id_champ]))
				$error[$id_champ] = 1;
			}
		}
	}
	
	if(!isset($_SESSION['connect']) && $_SESSION['sta'] == 2)
	{
		if(empty($_POST['ent']))
		$error['ent'] = 1;
		
		if($cache_param_champs['act_siret'] == 1)
		{
			if (empty($_POST['sir']))
			$error['sir'] = 1;
		}
	}
	
	if($cache_param_champs['act_code_pos'] == 1)
	{
		if (empty($_POST['cod']))
		$error['cod'] = 1;
	}
	
	if($cache_param_champs['act_vil'] == 1)
	{
		if (empty($_POST['vil']))
		$error['vil'] = 1;
	}
	
	if (empty($_POST['nom']))
	$error['nom'] = 1;
	
	if($cache_param_champs['act_tel'] == 1)
	{
		if (empty($_POST['tel']))
		$error['tel'] = 1;
	}
	
	if (empty($_POST['tit']))
	$error['tit'] = 1;
	
	if (empty($_POST['ann']))
	$error['ann'] = 1;
	
	if(isset($_POST['youtube']))
	{
		if(!empty($_POST['youtube']) && preg_match("#^http://www.youtube.com/watch\?v#", $_POST['youtube']) != true)
		$error['youtube'] = 1;
		
		if(!empty($_POST['dailymotion']) && preg_match("#^http://www.dailymotion.com/video/#", $_POST['dailymotion']) != true)
		$error['dailymotion'] = 1;
	}
	
	if($cache_param_champs['act_prix'] == 1)
	{
		if(!empty($_POST['pri']) && (preg_match("#^[0-9]+?[,.]?([0-9]+)?$#", $_POST['pri']) != true))
		$error['pri'] = 1;
	}
	
	if(!empty($_POST['promo']))
	{
		$error_code = 0;
		$code = htmlspecialchars($_POST['promo']);
		
		foreach($cache_code_reduc as $v)
		{
			if($v['code'] == $code  && $v['val2'] == 1)
			{
				$error_code = 1;
			}
		}
		
		if($error_code == 0)
		$error['code'] = 1;
	}
}

if(isset($_POST['nom']) && empty($error))
{
	$prix = 0;
	
	if($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1)
	{
		//Prix de la modification
		
		$prix_ann = 0;
		
		foreach($cache_categories as $v)
		{
			if($v['id_cat'] == $_SESSION['cat'])
			{
				if($_SESSION['sta'] == 1)
				$prix_ann = (float) $v['prix_par_mod'];
				
				else $prix_ann = (float) $v['prix_pro_mod'];
			}
		}
		
		//Prix des photos
		
		$prix_photo = 0;
		
		if(isset($_SESSION['photo']['count']))
		{
			if($_SESSION['photo']['count'] > $_SESSION['photo']['count_all'])
			{
				if($_SESSION['photo']['count'] > $cache_option_photos['nb_photo_gratuite'])
				$prix_photo = ($_SESSION['photo']['count'] - $_SESSION['photo']['count_all']) * $cache_option_photos['prix_photo'];
			}
		}
		
		if($prix_photo < 0)
		$prix_photo = 0;
		
		//Prix de la vidéo
		
		$prix_video = 0;
		
		if(empty($_SESSION['video']))
		{
			if(!empty($_POST['youtube']) || !empty($_POST['dailymotion']))
			$prix_video = (float) $cache_option_video['prix_video'];
		}
		
		//Prix total
		
		$prix = $prix_ann + $prix_photo + $prix_video;
	}
	
	//Réduction
	
	if(!empty($_POST['promo']))
	{
		$code = htmlspecialchars($_POST['promo']);
		
		$prix_code = '';
		$type_code = '';
		
		foreach($cache_code_reduc as $v)
		{
			if($v['code'] == $code)
			{
				$prix_code = (float) $v['prix'];
				$type_code = (int) $v['type'];
			}
		}
		
		if($type_code == 1)
		$prix = $prix - $prix_code;
		
		else
		{
			$prix_red = $prix * $prix_code / 100;
			$prix = $prix - $prix_red;
		}
	}
	
	if($prix > 0)
	$etat = 5;
	
	elseif($param_gen['auto_ann'] == 1)
	$etat = 2;
	
	else $etat = 1;
	
	$conn = db_connect();
	update($_POST, $_SESSION['valid_id'], $etat);
	
	//Redirection vers la page de paiement
	
	if($prix > 0)
	{
		$_SESSION['prix'] = $prix;
		$_SESSION['item'] = $language['annonce_page_paiement'];
		
		$prix_tva = (!empty($param_gen['tva_taux'])) ? $prix * $param_gen['tva_taux'] / 100 : 0;
		
		$id_achat = register_achat(1, $_SESSION['valid_id'], 0, 0, 0, 0, 0, time(), $prix, $prix_tva);
		$conn = null;
		
		$_SESSION['id'] = $id_achat;
		unset($_SESSION['valid_id']);
		
		redirect('payment.php');
	}
	
	///////////////////////////////////
	//Envoi du mail de notification
	//////////////////////////////////

	if($param_gen['notif'] == 1)
	{
		$nb_ann = count_ann_mail();

		if($nb_ann == 1)
		send_notif_ann();
	}
	
	$conn = null;
	
	///////////////////////////////////
	//Detruire la session
	//////////////////////////////////

	foreach($_SESSION as $k => $v)					
	{    		
		if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'valid_admin' && $k != 'nb_ann_selection' && $k != 'id' && $k != 'prix' && $k != 'item')
		unset($_SESSION[$k]);
	}
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_mod_re'];
	$description = $language['description_page_mod_re'];
	$words = $language['mot_cles_page_mod_re'];
	$info_page = $language['infos_page_mod_re'];

	///////////////////////////////////
	//Texte info de la page
	//////////////////////////////////
	
	if($param_gen['auto_ann'] == 1)
	$texte = $language['page_mod_re_auto'];
	
	else $texte = $language['page_mod_re'];

	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////
		
	htm_header($title, $description, $words);
	display_index_text($info_page);
	display_text($texte);
	htm_footer();
}
else
{

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_formulaire_mod'];
$description = $language['description_formulaire_mod'];
$words = $language['mot_cles_formulaire_mod'];
$info_page = $language['infos_formulaire_mod'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
htm_formulaire_modif($error);	
htm_footer();
}