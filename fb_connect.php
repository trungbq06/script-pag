<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_functions.php');
require_once('includes/facebook/facebook.php');

///////////////////////////////////
//Validation du type de compte
//////////////////////////////////

if (isset($_GET['type']))
{
	$type = (int) $_GET['type'];
	
	if ($type != 1 && $type != 2)
	$type = 1;
}
else $type = 1;

///////////////////////////////////
//Application Facebook
//////////////////////////////////

$facebook = new Facebook(array('appId' => $param_gen['id_fb'], 'secret' => $param_gen['key_fb'], 'cookie' => true));

///////////////////////////////////
//Vérifier la session
//////////////////////////////////

$session = $facebook->getUser();

if(empty($session))
{
	$par = array();
	$par['scope'] = 'email';
	header('location:'. $facebook->getLoginUrl($par));
}
else 
{
	$user = $facebook->api('/me');
	
	$conn = db_connect();
	$r = facebook_conn($user, $type);
	$conn = null;
	
	if(!empty($r['type']))
	$_SESSION['connect'] = $r['type'];
	
	else $_SESSION['connect'] = $type;
	
	$_SESSION['email_con'] = $user['email'];
	
	if($r['url'] == 1)
	redirect('acc_bord.php');
	
	else redirect('acc_donnees.php');
}
