<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si un admin est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_valid_all())
redirect("logout.php");

///////////////////////////////////
//Validation de l'id de l'annonce
//////////////////////////////////

if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];

	if($id <= 0)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Validation de l'email pour le bannissement
//////////////////////////////////	

if(isset($_GET['email']))
$email = $_GET['email'];

else $email = '';

///////////////////////////////////
//Envoyer l'email de refus
//////////////////////////////////

send_refuser_acc($id);

///////////////////////////////////
// Bannir l'email
//////////////////////////////////

if(!empty($email))
{
	blacklist_email($email);
	creer_cache_blacklist();
}

///////////////////////////////////
// Supprimer l'annonce
//////////////////////////////////

refuser_compte($id);
$conn = null;
	
///////////////////////////////////
// Redirection
//////////////////////////////////

?>
<script>javascript:history.back();</script>