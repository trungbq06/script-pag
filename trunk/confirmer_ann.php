<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Validation du code
//////////////////////////////////

if(!empty($_GET['code']))
$id = (int) $_GET['code']; 	

else redirect('index.php');

///////////////////////////////////
//Validation de l'email
//////////////////////////////////

if(!empty($_GET['email']))
$email = $_GET['email']; 	

else redirect('index.php');

///////////////////////////////////
//Confirmation de l'annonce
//////////////////////////////////

$conn = db_connect();

if(confirm_ann($id, $email))
$texte = $language['annonce_page_confirmer_msg1'];

else $texte = $language['annonce_page_confirmer_msg2'];

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
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_confirmer'];
$description = $language['description_page_confirmer'];
$words = $language['mot_cles_page_confirmer'];
$info_page = $language['infos_page_confirmer'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();