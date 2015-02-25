<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par l'entreprise ZUPPARDO : Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');

///////////////////////////////////
//Suppression d'une image téléchargé
//////////////////////////////////

if(isset($_GET['id']))
{
	$id_compte = (int) $_GET['id_compte'];
	
	unlink('images/logos/'. $_SESSION['logo_vitrine']);
	
	$conn = db_connect();
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."boutiques SET nom_logo = '' WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();

	$conn = null;
	
	unset($_SESSION['logo_vitrine']); 
}

///////////////////////////////////
//Redirection
//////////////////////////////////

redirect('upload3.php');