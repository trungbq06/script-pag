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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'valid_id' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Validation de l'id de l'alerte
//////////////////////////////////

if(isset($_GET['id_alert']))
{
	$id = (int) $_GET['id_alert'];
	
	if($id <= 0)
	redirect('index.php');
}

///////////////////////////////////
//Suppression de l'alerte
//////////////////////////////////

$conn = db_connect();
delete_alert($id);
$conn = null;
	
///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = $language['titre_page_alert_sup'];
$description = $language['description_page_alert_sup'];
$words = $language['mot_cles_page_alert_sup'];
$info_page = $language['infos_page_alert_sup'];

///////////////////////////////////
//Texte info de la page
//////////////////////////////////

$texte = $language['page_env_alert_sup_reussi'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////
	
htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();