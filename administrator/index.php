<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Vérification de la connexion
//////////////////////////////////

if(!empty($_POST['pass']) && !empty($_POST['user']))
{
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	$conn = db_connect();
	
	if(verify_user($username, $password))
	{
		$valid_admin = get_statut($username, $password);
		$_SESSION['valid_admin'] = $valid_admin;
		redirect("admin.php");
	}
	else $error = 1;
	
	$conn = null;
}

if(isset($_POST['pass']) && isset($_POST['user']))
{
	if(empty($_POST['pass']) || empty($_POST['user']))
	$error = 1;
}

///////////////////////////////////
//Inclusion des fonctions html
//////////////////////////////////

htm_admin_header();		
display_password_form($error);
htm_admin_footer();