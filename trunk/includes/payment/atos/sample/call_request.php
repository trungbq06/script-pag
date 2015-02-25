<!--
-------------------------------------------------------------
 Topic	 : Exemple PHP traitement de la requ�te de paiement
 Version : P600

 		Dans cet exemple, on affiche un formulaire HTML
		de connection � l'internaute.

-------------------------------------------------------------
-->

<!--	Affichage du header html	-->
 <?php

	require_once('param.php');
 
	//		Affectation des param�tres obligatoires

	$parm="merchant_id=$c_merchant_id";
	$parm="$parm merchant_country=$c_merchant_country";
	$parm="$parm amount=". $prix * 100;
	$parm="$parm currency_code=$c_currency_code";


	// Initialisation du chemin du fichier pathfile (� modifier)
	    //   ex :
	    //    -> Windows : $parm="$parm pathfile=c:\\repertoire\\pathfile";
	    //    -> Unix    : $parm="$parm pathfile=/home/repertoire/pathfile";
	    
	$parm="$parm pathfile=$c_pathfile";

	//		Si aucun transaction_id n'est affect�, request en g�n�re
	//		un automatiquement � partir de heure/minutes/secondes
	//		R�f�rez vous au Guide du Programmeur pour
	//		les r�serves �mises sur cette fonctionnalit�
	//
	//		$parm="$parm transaction_id=123456";



	//		Affectation dynamique des autres param�tres
	// 		Les valeurs propos�es ne sont que des exemples
	// 		Les champs et leur utilisation sont expliqu�s dans le Dictionnaire des donn�es
	//
			$parm="$parm normal_return_url=".URL."/pay_valide.php";
			$parm="$parm cancel_return_url=".URL."/pay_annule.php";
			$parm="$parm automatic_response_url=".URL."/includes/payment/atos/sample/call_autoresponse.php"; 
			$parm="$parm language=fr";
			$parm="$parm payment_means=CB,1,VISA,1,MASTERCARD,1";
	//		$parm="$parm header_flag=no";
	//		$parm="$parm capture_day=";
	//		$parm="$parm capture_mode=";
	//		$parm="$parm bgcolor=";
	//		$parm="$parm block_align=";
	//		$parm="$parm block_order=";
	//		$parm="$parm textcolor=";
	//		$parm="$parm receipt_complement=";
	//		$parm="$parm caddie=mon_caddie";
	//		$parm="$parm customer_id=";
	//		$parm="$parm customer_email=";
	//		$parm="$parm customer_ip_address=";
	//		$parm="$parm data=";
	//		$parm="$parm return_context=";
	//		$parm="$parm target=";
			$parm="$parm order_id=$id";


	//		Les valeurs suivantes ne sont utilisables qu'en pr�-production
	//		Elles n�cessitent l'installation de vos fichiers sur le serveur de paiement
	//
	// 		$parm="$parm normal_return_logo=";
	// 		$parm="$parm cancel_return_logo=";
	// 		$parm="$parm submit_logo=";
	// 		$parm="$parm logo_id=";
	// 		$parm="$parm logo_id2=";
	// 		$parm="$parm advert=";
	// 		$parm="$parm background_id=";
	// 		$parm="$parm templatefile=";


	//		insertion de la commande en base de donn�es (optionnel)
	//		A d�velopper en fonction de votre syst�me d'information

	// Initialisation du chemin de l'executable request (� modifier)
	// ex :
	// -> Windows : $path_bin = "c:\\repertoire\\bin\\request";
	// -> Unix    : $path_bin = "/home/repertoire/bin/request";
	//

	$path_bin = "$c_path_bin_req";


	//	Appel du binaire request

	$result=exec("$path_bin $parm");

	//	sortie de la fonction : $result=!code!error!buffer!
	//	    - code=0	: la fonction g�n�re une page html contenue dans la variable buffer
	//	    - code=-1 	: La fonction retourne un message d'erreur dans la variable error

	//On separe les differents champs et on les met dans une variable tableau

	$tableau = explode ("!", "$result");

	//	r�cup�ration des param�tres

	$code = $tableau[1];
	$error = $tableau[2];
	$message = $tableau[3];

	//  analyse du code retour

  if (( $code == "" ) && ( $error == "" ) )
 	{
  	print ("<BR><CENTER>erreur appel request</CENTER><BR>");
  	print ("executable request non trouve $path_bin");
 	}

	//	Erreur, affiche le message d'erreur

	else if ($code != 0){
		print ("<center><b><h2>Erreur appel API de paiement.</h2></center></b>");
		print ("<br><br><br>");
		print (" message erreur : $error <br>");
	}

	//	OK, affiche le formulaire HTML
	else {
		print ("<br><br>");
		
		# OK, affichage du mode DEBUG si activ�
		print (" $error <br>");
		
		print (" $message <br>");
	}