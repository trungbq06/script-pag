<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Validation de l'email
//////////////////////////////////

if(!empty($_GET['email']))
$email = $_GET['email']; 	

else redirect('index.php');

///////////////////////////////////
//Validation du code
//////////////////////////////////

if(!empty($_GET['code']))
$id = (int) $_GET['code']; 	

else redirect('index.php');

///////////////////////////////////
//Confirmation du compte
//////////////////////////////////

$conn = db_connect();

if(confirm_acc($email, $id))
$texte = $language['compte_conf_msg1'];

else $texte = $language['compte_conf_msg2'];

///////////////////////////////////
//Envoi du mail de notification
//////////////////////////////////

if($param_gen['notif'] == 1)
{
	$nb_acc = count_acc_mail();

	if($nb_acc == 1)
	send_notif_acc();
}

$conn = null;

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['compte_conf_title'];
$description = $language['compte_conf_desc'];
$words = $language['compte_conf_key'];
$info_page = $language['compte_conf_info'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();