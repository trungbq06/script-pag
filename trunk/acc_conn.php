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
//Validation du type
//////////////////////////////////

if (isset($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if ($type != 1 && $type != 2)
	$type = 1;
}
else $type = 1;

///////////////////////////////////
//On vérifie si l'utilisateur n'est pas déjà connecté
//////////////////////////////////

if(isset($_SESSION['connect']))
redirect('acc_bord.php');

///////////////////////////////////
//Verifier si les comptes membre sont activés
//////////////////////////////////

if($param_gen['actif_acc'] < 2)	
redirect('index.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';
	
///////////////////////////////////
//Validation des données
//////////////////////////////////

if(isset($_POST['email_con']))
{
	if (empty($_POST['email_con']) || !valid_email($_POST['email_con']))
	$error = 1;
	
	elseif (empty($_POST['password']))
	$error = 2;
}

///////////////////////////////////
//Validation de la connexion
//////////////////////////////////

if(isset($_POST['email_con']) && empty($error))
{
	$conn = db_connect();
	
	if(verify_compte($_POST['email_con'], $_POST['password'], $type))
	{
		$_SESSION['connect'] = $type;
		$_SESSION['email_con'] = $_POST['email_con'];
		redirect('acc_bord.php');
	}
	else $error = 3;
	
	$conn = null;
}

///////////////////////////////////
//Titre,  description , mots clés et info de la page 
//////////////////////////////////

$title = ($type == 1) ? $language['titre_conn_acc1'] : $language['titre_conn_acc2'];
$description = $language['description_conn_acc'];
$words = $language['mot_cles_conn_acc'];
$info_page = ($type == 1) ? $language['infos_conn_acc1'] : $language['infos_conn_acc2'];
	
///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_header($title, $description, $words);
display_index_text($info_page);
htm_connexion($type, $error);
htm_footer();