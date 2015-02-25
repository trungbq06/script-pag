<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../includes/all_functions.php');

///////////////////////////////////
//Supprimer les options visuelles annonce expirées
//////////////////////////////////

$conn = db_connect();
delete_opt_visu_vit();
remonter_vit();
$conn = null;