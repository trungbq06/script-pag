<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Vérifier l'etat des comptes
//////////////////////////////////
	
if($param_gen['actif_acc'] == 2 && !isset($_SESSION['connect']))	
redirect('acc_info.php');

///////////////////////////////////
//Obtenir les infos du membre connecté
//////////////////////////////////

$pack = 0;
$aff = 0;

if(isset($_SESSION['connect']))
{
	$conn = db_connect();
	$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);
	
	//On vérifie que les infos personnelles sont bien remplies
	
	if(empty($membre[0]['adresse']))
	redirect('acc_donnees.php');
	
	//On verifie s'il y a des pack et si le membre a un pack valide
	
	$id_compte = (int) $membre[0]['id_compte'];
	$pack = (int) $membre[0]['pack'];
	$nb_annonce = ($membre[0]['limit_2'] > 0) ? (int) $membre[0]['nb_annonce'] : 1;
	$aff = 0;
	
	foreach($cache_packs_comptes as $v)
	{
		if(!empty($v['id_pack']) && $v['type'] == $_SESSION['connect'])
		$aff = 1;
	}
	
	if($aff == 1 && (empty($pack) || $nb_annonce == 0))
	redirect('pay_pack_acc.php?compte='. $id_compte);
}
else $membre = '';

///////////////////////////////////
//Validation de la région
//////////////////////////////////

if(!empty($_POST['reg']))
$reg = (int) $_POST['reg'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_reg']))
$reg = (int) $membre[0]['id_reg'];
	
else $reg = 0;

///////////////////////////////////
//Validation du département
//////////////////////////////////

if(!empty($_POST['dep']))
$dep = (int) $_POST['dep'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_dep']))
$dep = (int) $membre[0]['id_dep'];
	
else $dep = 0;

///////////////////////////////////
//Validation de la catégorie
//////////////////////////////////

if(!empty($_POST['cat']))
$cat = (int) $_POST['cat'];

elseif(isset($_SESSION['connect']) && !empty($membre[0]['id_cat']))
$cat = (int) $membre[0]['id_cat'];
	
else $cat = 0;

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';
	
///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['nom']))
{
	if(empty($_POST['reg']))
	$error['reg'] = 1;
	
	if(isset($_POST['dep']) && empty($_POST['dep']))
	$error['dep'] = 1;
	
	if(empty($_POST['cat']))
	$error['cat'] = 1;
	
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
	
	if($_POST['sta'] == 2)
	{
		if(empty($_POST['ent']))
		$error['ent'] = 1;
		
		if($cache_param_champs['act_siret'] == 1)
		{
			if (!isset($_SESSION['connect']) && empty($_POST['sir']))
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
	
	if (!valid_email($_POST['ema']))
	$error['ema'] = 1;
	
	foreach($blacklist as $v)
	{
		if($v['email'] == $_POST['ema'])
		$error['ban'] = 1;
	}
	
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
		if(!empty($_POST['youtube']) && preg_match("#^https?://www.youtube.com/watch\?v#", $_POST['youtube']) != true)
		$error['youtube'] = 1;
		
		if(!empty($_POST['dailymotion']) && preg_match("#^https?://www.dailymotion.com/video/#", $_POST['dailymotion']) != true)
		$error['dailymotion'] = 1;
	}
	
	if($cache_param_champs['act_prix'] == 1)
	{
		if(!empty($_POST['pri']) && (preg_match("#^[0-9]+?[,.]?([0-9]+)?$#", $_POST['pri']) != true))
		$error['pri'] = 1;
	}
	
	if(isset($_POST['pas']))
	{
		if(empty($_POST['pas']) OR $_POST['pas'] != $_POST['pas2'])
		$error['pas'] = 1;
	}
	
	if(!empty($_POST['promo']))
	{
		$error_code = 0;
		$code = htmlspecialchars($_POST['promo']);
		
		foreach($cache_code_reduc as $v)
		{
			if($v['code'] == $code && $v['val1'] == 1)
			{
				$error_code = 1;
			}
		}
		
		if($error_code == 0)
		$error['code'] = 1;
	}
}

///////////////////////////////////
//Enregistrement de l'annonce 
//////////////////////////////////

if(isset($_POST['nom']) && empty($error))
{
	$prix = 0;
	
	if($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1)
	{
		//Prix des photos
		
		$prix_photo = 0;
		
		if(isset($_SESSION['photo']['count']))
		{
			if($_SESSION['photo']['count'] > $cache_option_photos['nb_photo_gratuite'])
			$prix_photo = ($_SESSION['photo']['count'] - $cache_option_photos['nb_photo_gratuite']) * $cache_option_photos['prix_photo'];
		}
		
		if($prix_photo < 0)
		$prix_photo = 0;
		
		//Prix de l'annnonce
		
		$prix_ann = 0;
		
		if($pack == 0)
		{
			foreach($cache_categories as $v)
			{
				if($v['id_cat'] == $cat)
				{
					if($_POST['sta'] == 1)
					$prix_ann = (float) $v['prix_par'];
					
					else $prix_ann = (float) $v['prix_pro'];
				}
			}
		}
		
		//Prix de la vidéo
		
		$prix_video = 0;
		
		if(!empty($_POST['youtube']) || !empty($_POST['dailymotion']))
		$prix_video = (float) $cache_option_video['prix_video'];
		
		//Prix des options
		
		$prix_options = 0;
		
		if(!empty($_POST['opt_type1']))
		{
			foreach($cache_options_visuelles as $v)
			{
				if($v['id'] == $_POST['opt_type1'])
				$prix_options = (float) $v['prix'];
			}
		}
		
		if(!empty($_POST['opt_type2']))
		{
			foreach($cache_options_visuelles as $v)
			{
				if($v['id'] == $_POST['opt_type2'])
				$prix_options = (float) $v['prix'] + $prix_options;
			}
		}
		
		if(!empty($_POST['opt_type3']))
		{
			foreach($cache_options_visuelles as $v)
			{
				if($v['id'] == $_POST['opt_type3'])
				$prix_options = (float) $v['prix'] + $prix_options;
			}
		}
		
		if(!empty($_POST['opt_type4']))
		{
			foreach($cache_options_visuelles as $v)
			{
				if($v['id'] == $_POST['opt_type4'])
				$prix_options = (float) $v['prix'] + $prix_options;
			}
		}
		
		//Prix total
		
		$prix = $prix_photo + $prix_ann + $prix_options + $prix_video;
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
	
	//Etat de l'annonce
	
	if($prix > 0)
	$etat = 5;
	
	elseif($param_gen['auto_ann'] == 1)
	$etat = 2;
	
	elseif(isset($_SESSION['connect']))
	$etat = 1;
	
	else $etat = 0;
	
	//Mot de passe de l'annonce
	
	if(isset($_POST['pas']))
	$password = $_POST['pas'];

	else $password = generate_password();
	
	//Enregistrement de l'annonce
	
	if(!isset($_SESSION['connect'])) $conn = db_connect();
	$id = register($_POST, $password, $etat);
	
	//Redirection vers la page de paiement ou de confirmation
	
	if($prix > 0)
	{
		$_SESSION['prix'] = $prix;
		$_SESSION['item'] = $language['annonce_page_paiement'];
		
		$prix_tva = (!empty($param_gen['tva_taux'])) ? $prix * $param_gen['tva_taux'] / 100 : 0;
		
		$id_achat = register_achat(1, $id, 0, 0, 0, 0, 0, time(), $prix, $prix_tva);
		$conn = null;
		
		$_SESSION['id'] = $id_achat;
		
		redirect('payment.php');
	}
	else
	{
		//Enregistrement des sessions
		
		$_SESSION['ann_reg'] = $_POST['reg'];
		
		if(isset($_POST['dep']))
		$_SESSION['ann_dep'] = $_POST['dep'];
		
		if($_POST['sta'] == 2)
		{
			$_SESSION['ann_sta'] = $_POST['sta'];
			$_SESSION['ann_ent'] = $_POST['ent'];
			
			if(isset($_POST['sir']))
			$_SESSION['ann_sir'] = $_POST['sir'];
		}
		
		if(isset($_POST['cod']))
		$_SESSION['ann_cod'] = $_POST['cod'];
		
		if(isset($_POST['vil']))
		$_SESSION['ann_vil'] = $_POST['vil'];
		
		$_SESSION['ann_nom'] = $_POST['nom'];
		$_SESSION['ann_ema'] = $_POST['ema'];
		
		if(isset($_POST['tel']))
		$_SESSION['ann_tel'] = $_POST['tel'];
		
		if(!empty($_POST['tel_cache']))
		$_SESSION['ann_tel_cache'] = $_POST['tel_cache'];
		
		//Destruction de la session des photos
		
		if(isset($_SESSION['photo']))
		unset($_SESSION['photo']);
		
		//Titre, description et mots clé de la page
		
		$title = $language['titre_page_conf'];
		$description = $language['description_page_conf'];
		$words = $language['mot_cles_page_conf'];
		$info_page = $language['infos_page_conf'];

		//Envoi du mail de notification

		if($param_gen['notif'] == 1 && $etat == 1)
		{
			$nb_ann = count_ann_mail();

			if($nb_ann == 1)
			send_notif_ann();
		}
		
		//Création du flux rss
		
		if($param_gen['auto_ann'] == 1)
		{
			$texte = $language['txt_info_page_conf2'];
			creat_flux($id);
		}
		
		elseif(isset($_SESSION['connect']))
		$texte = $language['compte_info_page_con'];

		else 
		{
			$texte = $language['txt_info_page_conf1'];
			send_confirm($id, $_POST);
		}
		
		$conn = null;
		
		//Inclusion des fonctions html
			
		if(!isset($_SESSION['connect']))
		{
			htm_header($title, $description, $words);
			display_index_text($info_page);
		}
		else 
		{
			htm_header_bord($title, $description, $words);
			display_text_bord($info_page);
		}
		
		display_text($texte);
		htm_footer();
	}
}
else
{

if(isset($_SESSION['connect'])) $conn = null;

$title = $language['titre_formulaire'];
$description = $language['description_formulaire'];
$words = $language['mot_cles_formulaire'];
$info_page = $language['infos_page_formulaire'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

if(!isset($_SESSION['connect']))
{
	htm_header($title, $description, $words);
	display_index_text($info_page);
}
else 
{
	htm_header_bord($title, $description, $words);
	display_text_bord($info_page);
}

htm_formulaire($cat, $reg, $dep, $membre, $error);
htm_footer();
}