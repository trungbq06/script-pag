<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

header('Cache-Control: must-revalidate, post-check = 0, pre-check = 0');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename = Script_PAG_XML.xml');

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin  est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin())
redirect( "logout.php" );
	

$date = mktime (0, 0, 0, $_POST['mois'], $_POST['jour'], $_POST['annee']);

///////////////////////////////////
//Sauvegarder la bdd
//////////////////////////////////
	
xml_file($date, $_POST);