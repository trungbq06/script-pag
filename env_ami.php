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
	if($k != 'connect' && $k != 'email_con' && $k != 'prenom' && $k != 'valid_admin' && $k != 'disc' && $k != 'nb_ann_selection')
	unset($_SESSION[$k]);
}

///////////////////////////////////
//Titre, description, mots clés et info de la page 
//////////////////////////////////

$title = $language['txt_info_env_ami_title'];
$description = '';
$words = '';
$info_page = $language['txt_info_env_ami_title'];
$texte = $language['txt_info_env_ami'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
display_text($texte);
htm_footer();