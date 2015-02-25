<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

// lire le formulaire provenant du système PayPal et ajouter 'cmd'
$req = 'cmd=_notify-validate';

foreach($_POST as $key => $value) 
{
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// renvoyer au système PayPal pour validation
$header .= "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Host: www.paypal.com\r\n"; 
$header .= "Connection: close\r\n\r\n";
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

require_once('../../all_functions.php');

//récupération des variables

$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$mc_gross = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$custom = $_POST['custom'];
$txn_type = $_POST['txn_type'];
	
if(!$fp)
{
	// erreur HTTP
}
else
{
	fputs ($fp, $header . $req);
	
	while (!feof($fp))
	{
		$res = fgets ($fp, 1024);
		
		if (strcmp (trim($res), "VERIFIED") == 0) 
		{
			// Vérification du statu du paiement
			if($payment_status != "Completed");
         
			// Vérification de la devise
			elseif($payment_currency != $cache_pay_paypal['devise']);
         
			// Le paiement est ok on envoi le mail et on met à jour l'annonce
			else 
			{
				$conn = db_connect();
				payment($custom);
				$conn = null;
			}
		}
	}
}
fclose ($fp);