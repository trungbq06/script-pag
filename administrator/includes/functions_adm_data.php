<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////////////////////
///Fonction de redirection d'une page
//////////////////////////////////

function redirect($location)
{
	//echo '<script language="javascript">document.location.href = \''.$location.'\'</script>';
	header('location: '. $location);
	exit();
}

///////////////////////////////////
///Fonction de vérification de l'adresse email
//////////////////////////////////

function valid_email($address)
{
	$str = "#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#";
	$result = preg_match($str, $address);
	
	if($result) return true;
	
	else return false;
}

///////////////////////////////////
///Connexion super admin (niveau 1)
//////////////////////////////////

function check_super_admin()
{
	global $valid_admin;
	
	if(isset($_SESSION['valid_admin']) && $valid_admin == 1) return true;
	
	else return false;
}
	
///////////////////////////////////
///Connexion admin (niveau 2)
//////////////////////////////////

function check_admin()
{
	global $valid_admin;
	
	if(isset($_SESSION['valid_admin']) && $valid_admin == 2) return true;
	
	else return false;
}

///////////////////////////////////
///Connexion admin (niveau 3)
//////////////////////////////////

function check_valid_all()
{
	global $valid_admin;
	
	if(isset($_SESSION['valid_admin'])) return true;

	else return false;
}