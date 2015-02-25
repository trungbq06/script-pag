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

if(!empty($_GET['id']))
$id = (int) $_GET['id'];

else redirect('index.php');

///////////////////////////////////
//Vérifier et obtenir les informations de l'annonce
//////////////////////////////////

$conn = db_connect();
$row = get_annonce($id);
	
if(!is_array($row))
redirect('index.php');

elseif(is_array($row))
{
	$now = time();
	$limit = (int) ($param_gen['ann_val'] * 24 * 3600) - (6 * 24 * 3600);
	$date = $row[0]['date'];
	
	if(($now - $date) <= $limit)
	redirect('index.php');
}

///////////////////////////////////
//Validation de la relance
//////////////////////////////////

if(!empty($_POST['id_ann']))
{
	if(!empty($_POST['prix']))
	{
		$_SESSION['prix'] = (float) $_POST['prix'];
		$_SESSION['item'] = $language['page_relance_pay'];
		
		$prix_tva = (!empty($param_gen['tva_taux'])) ? $_SESSION['prix'] * $param_gen['tva_taux'] / 100 : 0;
		
		$id_achat = register_achat(1, $id, 0, 0, 0, 0, 0, time(), $_SESSION['prix'], $prix_tva);
		$_SESSION['id'] = $id_achat;
		
		$conn = null;
		
		redirect('payment.php');
	}
	else 
	{
		update_relance($id);
		
		$title = $language['page_relance_conf'];
		$description = '';
		$words = '';
		$info_page = $language['page_relance_conf'];
		$texte = $language['page_relance_info_conf'] .' '. $param_gen['ann_val'] .' '. $language['page_relance_conf_jour'];
		
		///////////////////////////////////
		//Inclusion des fonctions html
		//////////////////////////////////
		
		htm_header($title, $description, $words);
		display_index_text($info_page);
		display_text($texte);
		htm_footer();
		
		$conn = null;
	}
}
else
{
	$conn = null;

	///////////////////////////////////
	//Titre, description, mots clés et info de la page 
	//////////////////////////////////

	$title = $language['page_relance_info'];
	$description = '';
	$words = '';
	$info_page = $language['page_relance_info'];
		
	///////////////////////////////////
	//Inclusion des fonctions html
	//////////////////////////////////

	htm_header($title, $description, $words);
	display_index_text($info_page);		
	relance_ann($row);
	htm_footer();
}