<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../includes/all_functions.php');
	
///////////////////////////////////
//Supprimer les annonces non validées dans les 48 heures
//////////////////////////////////

$conn = db_connect();
get_nb_ann();
$conn = null;