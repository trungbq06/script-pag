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

if (isset($_GET['id']))
{
	$id = (int) $_GET['id'];
	
	unlink('images/photos/'. $_SESSION['photo'][$id]);
	unlink('images/vignettes/'. $_SESSION['photo'][$id]);
	
	unset($_SESSION['photo'][$id]); 
	
	if(isset($_SESSION['photo']['count']))
	$_SESSION['photo']['count'] = $_SESSION['photo']['count'] - 1;
}

///////////////////////////////////
//Redirection 
//////////////////////////////////

redirect('upload.php');
