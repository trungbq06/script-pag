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
//Valider l'id de l'annonce
//////////////////////////////////
	
if(!empty($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	if($id <= 0)
	redirect("admin.php");
}
else redirect("admin.php");

///////////////////////////////////
//Confirmer l'annonce
//////////////////////////////////

valider_annonce($id);
send_valider($id);
creat_flux($id);
	
///////////////////////////////////
//Envoyer l'email de validation
//////////////////////////////////
	
//send_valider($id);
$conn = null;
	
///////////////////////////////////
//Redirection
//////////////////////////////////
	
?>
<script>javascript:history.back();</script>