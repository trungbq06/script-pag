<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../../all_functions.php');

///////////////////////////////////
//Validation du paiement
//////////////////////////////////

if(isset($_SESSION['allopass_id'])) 
{
	$conn = db_connect();
	payment($_SESSION['allopass_id']);
	$conn = null;
	
	redirect(URL .'/pay_valide.php');
}
else redirect('index.php');