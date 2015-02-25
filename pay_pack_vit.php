<?php 
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par l'entreprise ZUPPARDO : Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//On vérifie que le membre ou  le PRO est connecté
//////////////////////////////////

if(!isset($_SESSION['connect']))
redirect('index.php');

///////////////////////////////////
//Validation de l'identifiant du compte
//////////////////////////////////

if(!empty($_GET['compte']))
$id = (int) $_GET['compte'];

else redirect('index.php');

///////////////////////////////////
//Validation des pack
//////////////////////////////////

$aff = 0;
	
foreach($cache_packs_vitrine as $v)
{
	if(!empty($v['id_pack']))
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
		if($v['code'] == $code && $v['val6'] == 1)
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

if(!empty($_POST['opt_type1']) && empty($error))
{
	$prix_pack = 0;
	$jour = 0;
	
	if(!empty($_POST['opt_type1']))
	{
		foreach($cache_packs_vitrine as $v)
		{
			if($v['id_pack'] == $_POST['opt_type1'])
			{
				$prix_pack = (float) $v['prix'];
				$jour = (int) $v['nb_jour'];
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
		$prix_pack = $prix_pack - $prix_code;
		
		else
		{
			$prix_red = $prix_pack * $prix_code / 100;
			$prix_pack = $prix_pack - $prix_red;
		}
	}

	if($prix_pack > 0)
	{
		$_SESSION['prix'] = $prix_pack;
		$_SESSION['item'] = $language['item10_page_paiement'];
		
		$prix_tva = (!empty($param_gen['tva_taux'])) ? $prix_pack * $param_gen['tva_taux'] / 100 : 0;
		
		$conn = db_connect();
		$id_achat = register_achat(4, 0, $id, 0, $jour, 0, 0, time(), $prix_pack, $prix_tva);
		$conn = null;
		
		$_SESSION['id'] = $id_achat;
		
		redirect('payment.php');
	}
	else
	{
		$conn = db_connect();
		$id_achat = register_achat(4, 0, $id, 0, $jour, 0, 0, time(), '', '');
		payment_free($id_achat);
		$conn = null;
		
		redirect('pay_free.php');
	}
}
	
///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['pay_pack_vit_title'];
$description = '';
$words = '';
$info_page = $language['pay_pack_vit_title'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_bord($title, $description, $words);
display_index_text($info_page);		
pay_pack_vit($error);
htm_footer();