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
	
	if($result)
	return true;
	
	else return false;
}

///////////////////
//Obtenir le nombre d'annonces sélectionnées
///////////////////

function get_selected_number()
{
	global $_COOKIE;
	
	$num = 0;
	
	foreach($_COOKIE as $k => $v)
	{
		if(preg_match("#Script_PAG#", $v) == true)
		{
			$v = str_replace('Script_PAG', '', $v);
			$v = (int) $v;
		}
		else $v = 0;
		
		if($v == 0) continue;
		if($k == 'affichage') continue;

		$row = get_annonce($v);
		
		if(is_array($row))
		$num++;
	}	
	return $num;
}