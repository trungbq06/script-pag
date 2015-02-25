<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('../all_functions.php');

if ($_POST['options'] != 0)
{
	display_noms_valeurs($_POST['options'], $cache_form, '');
	display_noms_donnees($_POST['options'], $cache_form, '');
}