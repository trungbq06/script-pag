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
//Récupérer les infos du mail et de l'annonce
//////////////////////////////////

$row_ann = get_annonce($id);
$row_mail = get_email_filtre_send($id_mail);
	
if(!is_array($row_ann))
redirect('index.php');

///////////////////////////////////
//Confirmer l'annonce
//////////////////////////////////

send_message($row_mail, $row_ann);
delete_filtre_mail($id_mail);
$conn = null;
	
///////////////////////////////////
//Redirection
//////////////////////////////////
	
?>
<script>javascript:history.back();</script>