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
//Valider l'id du mail
//////////////////////////////////
	
if(!empty($_GET['id_mail']))
{
	$id_mail = (int) $_GET['id_mail'];
	
	if($id_mail <= 0)
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
// Bannir l'email
//////////////////////////////////

if(!empty($email))
{
	blacklist_email($email);
	creer_cache_blacklist();
}

///////////////////////////////////
// Supprimer l'email
//////////////////////////////////

delete_filtre_mail($id_mail);
$conn = null;
	
///////////////////////////////////
// Redirection
//////////////////////////////////

?>
<script>javascript:history.back();</script>