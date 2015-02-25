<?php 
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par l'entreprise ZUPPARDO : Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');


///////////////////////////////////
//Validation de l'identifiant de l'annonce pour les options
//////////////////////////////////

if(!empty($_GET['vitrine']))
$id = (int) $_GET['vitrine'];

else redirect('index.php');
	
///////////////////////////////////
//Validation de l'identifiant de l'option
//////////////////////////////////

if(!empty($_GET['id_opt']))
{
	$id_opt = (int) $_GET['id_opt'];
	
	if($id_opt != 5 && $id_opt != 6 && $id_opt != 7)
	redirect('index.php');
}
else redirect('index.php');

///////////////////////////////////
//Validation de l'option
//////////////////////////////////

$aff = '';

foreach($cache_options_visuelles as $v)
{
	if($v['type'] == $id_opt)
	$aff = 1;
}

if($aff != 1)
redirect('index.php');

///////////////////////////////////
//Traitement de l'erreur du code de réduction
//////////////////////////////////

$error = '';

if(!empty($_POST['promo']))
{
	$error_code = 0;
	$code = htmlspecialchars($_POST['promo']);
	
	foreach($cache_code_reduc as $v)
	{
		if($v['code'] == $code && $v['val4'] == 1)
		{
			$error_code = 1;
		}
	}
	
	if($error_code == 0)
	$error = 1;
}

///////////////////////////////////
//Validation du choix l'option
//////////////////////////////////

if((!empty($_POST['opt_type1']) || !empty($_POST['opt_type2']) || !empty($_POST['opt_type3'])) && empty($error))
{
	$prix_options = 0;
	
	if(!empty($_POST['opt_type1']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type1'])
			{
				$prix_options = (float) $v['prix'];
				$jour = (int) $v['jour'];
				$type_opt = (int) $v['type'];
			}
		}
	}
	
	if(!empty($_POST['opt_type2']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type2'])
			{
				$prix_options = (float) $v['prix'];
				$jour = (int) $v['jour'];
				$type_opt = (int) $v['type'];
			}
		}
	}
	
	if(!empty($_POST['opt_type3']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type3'])
			{
				$prix_options = (float) $v['prix'];
				$jour = (int) $v['jour'];
				$type_opt = (int) $v['type'];
			}
		}
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
		$prix_options = $prix_options - $prix_code;
		
		else
		{
			$prix_red = $prix_options * $prix_code / 100;
			$prix_options = $prix_options - $prix_red;
		}
	}
	
	if($prix_options > 0)
	{
		$_SESSION['prix'] = $prix_options;
		
		if($type_opt == 5)
		$_SESSION['item'] = $language['item6_page_paiement'];
		
		if($type_opt == 6)
		$_SESSION['item'] = $language['item7_page_paiement'];
		
		if($type_opt == 7)
		$_SESSION['item'] = $language['item8_page_paiement'];
		
		$prix_tva = (!empty($param_gen['tva_taux'])) ? $prix_options * $param_gen['tva_taux'] / 100 : 0;
		
		$conn = db_connect();
		$id_achat = register_achat(5, 0, 0, $id, $jour, 0, $type_opt, time(), $prix_options, $prix_tva);
		$conn = null;
		
		$_SESSION['id'] = $id_achat;
		
		redirect('payment.php');
	}
	else
	{
		$conn = db_connect();
		$id_achat = register_achat(5, 0, 0, $id, $jour, 0, $type_opt, time(), '', '');
		payment_free($id_achat);
		$conn = null;
		
		redirect('pay_free.php');
	}
}
	
///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['pay_ann_opts_title'];
$description = '';
$words = '';
$info_page = $language['pay_ann_opts_title'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);		
pay_vit_opts($id_opt, $error);
htm_footer();