<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Detruire la session
//////////////////////////////////

foreach($_SESSION as $k => $v)					
{    		
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'captcha' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation de l'id de l'annonce
//////////////////////////////////
	
if(isset($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id == 0)
		redirect("index.php");
}	
else redirect("index.php");

///////////////////////////////////
//Vérifier si l'annonce est présente dans la BDD et récupérer les infos
//////////////////////////////////

$conn = db_connect();
$row = get_annonce($id);
$conn = null;
	
if(!is_array($row) )
redirect('index.php');
	
$name = stripslashes($row[0]['nom']);

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['mes_nom']))
{
	foreach($blacklist as $v)
	{
		if($v['email'] == $_POST['mes_ema'])
		$error['ban'] = 1;
	}
	
	if(empty($_POST['mes_nom']))
	$error['mes_nom'] = 1;
	
	if(!valid_email($_POST['mes_ema']))
	$error['mes_ema'] = 1;
	
	if(empty($_POST['mes']))
	$error['mes_mes'] = 1;
	
	$cod = strtoupper($_POST['code']);
	
	if(empty($cod) || md5($cod) != $_SESSION['captcha'])
	$error['mes_cod'] = 1;
}

if(!empty($_POST['mes_nom']) && empty($error))
{
	if($param_gen['active_filtre'] == 1)
	{
		$conn = db_connect();
		insert_send_message($_POST, $row[0]['id_ann'], $row[0]['email']);
		
		if($param_gen['notif'] == 1)
		{
			$nb_mail = count_mail_mail();
			
			if($nb_mail == 1)
			send_notif_mail();
		}
		
		$conn = null;
	}
	
	else send_message($_POST, $row);
	
	///////////////////////////////////
	//Titre,  description , mots clés et info de la page 
	//////////////////////////////////

	$title = $language['titre_page_env_msg_re'];
	$description = $language['description_page_env_msg_re'];
	$words = $language['mot_cles_page_env_msg_re'];
	$info_page = $language['infos_page_env_msg_re'];

	$texte = $language['page_env_msg_mail_reussi'];

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
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_env_msg'] .' '. $name;
$description = $language['description_page_env_msg'];
$words = $language['mot_cles_page_env_msg'];
$info_page = $language['infos_page_env_msg'].' '. $name;
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_mes_form($error);
htm_footer();
}