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

if(!check_super_admin())
redirect("logout.php");
	
///////////////////////////////////
//Validation dde l'id de l'annonce
//////////////////////////////////

if(isset($_GET['id']))
$id = (int) $_GET['id'];

else redirect('admin.php');

//////////////////////////////////
// Supprimer l'annonce
//////////////////////////////////

delete_achat($id);
$conn = null;

///////////////////////////////////
//Redirection
//////////////////////////////////
	
?>
<script>javascript:history.back();</script>