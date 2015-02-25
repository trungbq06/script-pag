<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////////////////////
///Désactivation de register_globals
//////////////////////////////////

function unregister_globals()
{
    if (!ini_get('register_globals')) return;

    if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS']))
    die('register_global désactivé');

    $no_unset = array('GLOBALS', '_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
	$input = array_merge($_GET, $_POST, $_COOKIE, $_SERVER, $_ENV, $_FILES, isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());

    foreach ($input as $k => $v) 
	{
        if (!in_array($k, $no_unset) && isset($GLOBALS[$k]))
        unset($GLOBALS[$k]);
    }
}

unregister_globals();

///////////////////////////////////
///Désactivation des guillemets magic
//////////////////////////////////

if (get_magic_quotes_gpc()) 
{
	$input = array(&$_GET, &$_POST, &$_COOKIE, &$_ENV, &$_SERVER);

	while (list($k, $v) = each($input)) 
	{
		foreach ($v as $key => $val) 
		{
			if (!is_array($val)) 
			{
				$input[$k][$key] = stripslashes($val);
				continue;
			}
			$input[] =& $input[$k][$key];
		}
	}
	unset($input);
}

error_reporting(E_ALL);

///////////////////////////////////
///Ouverture de session
//////////////////////////////////

ini_set('session.use_trans_sid', 0);
session_start();

///////////////////////////////////
///Inclusions des fichiers de fonction
//////////////////////////////////
	
require_once('../includes/configuration.php');
require_once('../includes/cache/all_cache.php');
require_once('functions_adm_data.php');
require_once('functions_adm_display.php');
require_once('functions_adm_html.php');
require_once('functions_adm_mail.php');
require_once('functions_adm_mysql.php');
require_once('language/french_adm.php');

///////////////////////////////////
//Optenir les statistiques pour la gestion des annonces et la gestion des comptes
//////////////////////////////////

$conn = db_connect();
$total_att = get_nb_ann_gest(1);
$total_val = get_nb_ann_gest(2);
$total_ref = get_nb_ann_gest(3);
$total_sau = get_nb_ann_gest(4);
$total_conf = get_nb_ann_gest(0);
$total_att_membre = get_nb_acc_gest(1, 1);
$total_val_membre = get_nb_acc_gest(2, 1);
$total_ref_membre = get_nb_acc_gest(3, 1);
$total_conf_membre = get_nb_acc_gest(0, 1);
$total_att_pro = get_nb_acc_gest(1, 2);
$total_val_pro = get_nb_acc_gest(2, 2);
$total_ref_pro = get_nb_acc_gest(3, 2);
$total_conf_pro = get_nb_acc_gest(0, 2);
$total_ach = get_nb_achats('');