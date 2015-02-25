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
///Paramètres et ouverture des sessions
//////////////////////////////////

ini_set('session.use_cookies', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.use_trans_sid', '0');
ini_set('url_rewriter.tags', ''); 

session_start();

///////////////////////////////////
///Inclusions des fichiers de fonction
//////////////////////////////////

require_once('configuration.php');
require_once('cache/all_cache.php');
require_once('functions_data.php'); 
require_once('functions_form.php');
require_once('functions_html.php');
require_once('functions_mysql.php');
require_once('functions_mail.php');
require_once('functions_search.php');
require_once('language/french.php');

///////////////////////////////////
///Récupération du nombre d'annonce à la sélection
//////////////////////////////////

if(!isset($_SESSION['nb_ann_selection']))
{
	$conn = db_connect();
	$_SESSION['nb_ann_selection'] = get_selected_number();
	$conn = null;
}

///////////////////////////////////
///Site en maintenance
//////////////////////////////////

if($cache_maintenance['actif'] == 1)
{
	if($_SERVER['REMOTE_ADDR'] != $cache_maintenance['ip'])
	redirect('maintenance.php');
}