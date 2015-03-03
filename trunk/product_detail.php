<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

$conn = db_connect();

///////////////////////////////////
//Obtenir l'id du compte connecté
//////////////////////////////////

$membre = (isset($_SESSION['connect'])) ? get_info_membre($_SESSION['connect'], $_SESSION['email_con']) : '';

$nom_cat = '';
$nom_reg = '';
$nom_dep = '';

foreach($cache_categories as $v)
{
	if($row[0]['id_cat'] == $v['id_cat'])
	$nom_cat = $v['nom_cat'];
}
foreach($cache_regions as $v)
{
	if($row[0]['id_reg'] == $v['id_reg'])
	$nom_reg = $v['nom_reg'];
}
foreach($cache_departements as $v)
{
	if($row[0]['id_dep'] == $v['id_dep'])
	$nom_dep = $v['nom_dep'];
}

$title = $nom_cat .' '. $row[0]['titre'] .' '. $nom_reg .' '. $nom_dep .' - '. $param_gen['name'];
$description = $row[0]['ann'];
$words = '';
$info_page = $language['page_ann_info'];

///////////////////////////////////
//Renvoie vers la page de réussite d'envoie à un ami
//////////////////////////////////

if(isset($_POST['name']) && isset($_POST['email']) 
							 && !empty($_POST['name']) 
							 && !empty($_POST['email']) 
							 && $_POST['name'] != $language['page_ann_nom'] 
							 && $_POST['email'] != $language['page_ann_email'] 
							 && valid_email($_POST['email']))
{
	send_envoyer($_POST['name'], $_POST['email'], $row[0]['titre'], 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	redirect('env_ami.php');
}

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header_acc($title, $description, $words);
display_product_detail($membre);
htm_footer();

///////////////////////////////////
//Vérifier les information pour l'envoie à un ami
//////////////////////////////////

if((isset($_POST['name']) && empty($_POST['name'])) || (isset($_POST['name']) && $_POST['name'] == $language['page_ann_nom']))
echo '<SCRIPT language=javascript>alert("'. $language['page_ann_alert_nom'] .'");</script>';
	
elseif((isset($_POST['email']) && empty($_POST['email'])) || (isset($_POST['email']) && $_POST['email'] == $language['page_ann_email']))
echo '<SCRIPT language=javascript>alert("'. $language['page_ann_alert_email'] .'");</script>';
	
elseif(isset($_POST['email']) && !valid_email($_POST['email']))
echo '<SCRIPT language=javascript>alert("'. $language['page_ann_alert_email_val'] .'");</script>';