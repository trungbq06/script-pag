<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

////////////////////////////////
//Envoyer le mot de passe
////////////////////////////////

function send_password($email, $password)
{
	global $language_adm, $param_gen;
	
	$email = stripslashes($email);
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	$titre_mail = $language_adm['email_for_pass_tit'];
	$message_mail = $language_adm['email_for_pass_msg'] .' : '. $password;
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

////////////////////////////////
//Envoi de l'email qui confirme la validation de l'annonce
////////////////////////////////

function send_valider($id)
{
	global $conn, $cache_mails_auto;
	
	$bdd = $conn;
	
	$sql = "SELECT s.titre, a.email 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE s.id_ann = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();

	if(empty($result))
	return false;
	
	$titre = stripslashes($result['titre']);
	$email = stripslashes($result['email']);
	
	// Url rewrinting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      

	$url_ann = $titre;
	$url_ann = str_replace($accent, $sans_accent, $url_ann);
	
	$url_a = array();
   
	for ($i = 0; $i < strlen($url_ann); $i++) 
	array_push($url_a, $url_ann[$i]);
	
	$url = URL .'/';
	
	foreach($url_a as $url_ann)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
		$url_ann = str_replace($url_ann, '-', $url_ann);
		
		$url .= $url_ann;
	}
	
	$url .='-'. $id .'.htm';
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 2)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<url>', $url, $message_mail);
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

////////////////////////////////
//Envoi de l'email qui confirme le refus de l'annonce
////////////////////////////////

function send_refuser($id)
{
	global $conn, $cache_mails_auto, $language_adm;
	
	$bdd = $conn;
	
	$sql = "SELECT s.titre, a.email, a.password
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE s.id_ann = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();

	if(empty($result))
	return false;
	
	$titre = stripslashes($result['titre']);
	$email = stripslashes($result['email']);
	$password = stripslashes($result['password']);
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 3)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	// Modification
	
	if(isset($_GET['modif']) && $_GET['modif'] == 1)
	$modif = '<strong>'. $language_adm['page_ann_val_modif_msg'] .'</strong><br />'. URL .'/modif_pass.php?id='. $id .'<br /><br /><strong>'. $language_adm['page_con_pas'] .' : </strong>'. $password .'<br /><br />';
	
	else $modif = '';
	
	// Motif du refus
	
	if(isset($_GET['msg']) && $_GET['msg'] != $language_adm['page_ann_val_ref_msg'])
	$refus = '<strong>'. $language_adm['page_ann_val_ref_msg'] .' :</strong><br />'. $_GET['msg'] .'<br /><br />';
	
	else $refus = '';

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<modif>', $modif, $message_mail);
	$message_mail = str_replace('<msg_refus>', $refus, $message_mail);
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

////////////////////////////////
//Envoi de l'email qui confirme la validation d'un compte
////////////////////////////////

function send_validate_acc($id)
{
	global $conn, $cache_mails_auto;
	
	$bdd = $conn;
	
	$sql = "SELECT email FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();

	if(empty($result))
	return false;
	
	$email = stripslashes($result['email']);
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 7)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

////////////////////////////////
//Envoi de l'email qui confirme le refus d'un compte
////////////////////////////////

function send_refuser_acc($id)
{
	global $conn, $cache_mails_auto;
	
	$bdd = $conn;
	
	$sql = "SELECT email FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();

	if(empty($result))
	return false;
	
	$email = stripslashes($result['email']);
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 8)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoi du mail qui informe de la suppression de l'annonce expirée
////////////////////

function send_expired($email, $titre)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 5)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
		
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
} 

///////////////////
//Envoi du mail qui informe de la suppression de l'annonce (non validée dans les temps)
////////////////////

function send_unvalidate($email, $titre)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 4)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
		
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoi du mail qui informe de la suppression d'options visuelles annonces expirées
////////////////////

function send_expired_opt_visu_ann($id, $email, $titre)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 15)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	// Url rewrinting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      

	$url_ann = $titre;
	$url_ann = str_replace($accent, $sans_accent, $url_ann);
	
	$url_a = array();
   
	for ($i = 0; $i < strlen($url_ann); $i++) 
	array_push($url_a, $url_ann[$i]);
	
	$url_annonce = URL .'/';
	
	foreach($url_a as $url_ann)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
		$url_ann = str_replace($url_ann, '-', $url_ann);
		
		$url_annonce .= $url_ann;
	}
	
	$url_annonce .='-'. $id .'.htm';

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<url>', $url_annonce, $message_mail);
		
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
} 

///////////////////
//Envoi du mail qui informe de la suppression d'options visuelles annonces expirées
////////////////////

function send_expired_opt_visu_vit($email)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 16)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
} 

///////////////////
//Envoi du mail qui informe de la suppression du pack compte
////////////////////

function send_expired_pack_acc($email)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 17)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
} 

///////////////////
//Envoi du mail qui informe de la suppression de l'abonnement vitrine
////////////////////

function send_expired_pack_vit($email)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 18)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
} 

///////////////////
//Envoi du mail de relance
////////////////////

function send_relance($id, $email, $titre)
{
	global $cache_mails_auto;
	
	// Préparation du mail
	
	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 14)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url_annonce = URL .'/relance.php?id='. $id;

	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<url>', $url_annonce, $message_mail);
		
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoie du mail à l'annonceur
///////////////////

function send_message($row_mail, $row_ann)
{
	global $language_adm;

	$email = stripslashes($row_ann[0]['email']);
	$titre = stripslashes($row_ann[0]['titre']);
	$nom_mail = htmlspecialchars($row_mail[0]['nom']);
	$email_mail = htmlspecialchars($row_mail[0]['email']);
	$message= htmlspecialchars($row_mail[0]['message']);
	$tel = htmlspecialchars($row_mail[0]['tel']);
	
	$titre_mail = $language_adm['page_env_msg_mail_title'] .' "'. $titre .'".';
	
	$message_mail = $language_adm['page_env_msg_mail_corps'] .' "'. $titre .'"'. $language_adm['page_env_msg_mail_msg'];
	$message_mail .= nl2br($message);
	$message_mail .= $language_adm['page_env_msg_mail_nom'] .' '. $nom_mail;
	
	if(!empty($tel) )
	$message_mail .= $language_adm['page_env_msg_mail_tel'] .' '. $tel;
	
	$message_mail .= $language_adm['page_env_msg_mail_msg_rep'];

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";

	mail($email, $titre_mail, $message_mail, $header);
	return true;	
}

///////////////////
//Envoi de l'email de paiement d'une annonce
///////////////////

function send_payment_1($email, $id, $id_ann, $url, $numero, $titre)
{
	global $cache_mails_auto;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 9)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	// Url rewrinting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      

	$url_ann = $titre;
	$url_ann = str_replace($accent, $sans_accent, $url_ann);
	
	$url_a = array();
   
	for ($i = 0; $i < strlen($url_ann); $i++) 
	array_push($url_a, $url_ann[$i]);
	
	$url_annonce = URL .'/';
	
	foreach($url_a as $url_ann)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
		$url_ann = str_replace($url_ann, '-', $url_ann);
		
		$url_annonce .= $url_ann;
	}
	
	$url_annonce .='-'. $id_ann .'.htm';
	$url_facture = URL .'/'. $url .'/'. $id .'-'. $numero .'.php';
	
	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<url>', $url_annonce, $message_mail);
	$message_mail = str_replace('<facture>', $url_facture, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoi de l'email de paiement d'une options visuelle pour annonce
///////////////////

function send_payment_2($email, $id, $id_ann, $url, $numero, $titre)
{
	global $cache_mails_auto;
	
	$email = $email;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 10)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	// Url rewrinting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      

	$url_ann = $titre;
	$url_ann = str_replace($accent, $sans_accent, $url_ann);
	
	$url_a = array();
   
	for ($i = 0; $i < strlen($url_ann); $i++) 
	array_push($url_a, $url_ann[$i]);
	
	$url_annonce = URL .'/';
	
	foreach($url_a as $url_ann)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
		$url_ann = str_replace($url_ann, '-', $url_ann);
		
		$url_annonce .= $url_ann;
	}
	
	$url_annonce .='-'. $id_ann .'.htm';
	$url_facture = URL .'/'. $url .'/'. $id .'-'. $numero .'.php';
	
	$titre_mail = str_replace('<titre>', $titre, $titre_mail);
	$message_mail = str_replace('<titre>', $titre, $message_mail);
	$message_mail = str_replace('<url>', $url_annonce, $message_mail);
	$message_mail = str_replace('<facture>', $url_facture, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}


///////////////////
//Envoi de l'email de paiement d'un pack compte
///////////////////

function send_payment_3($email, $id, $url, $numero)
{
	global $cache_mails_auto;
	
	$email = $email;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 12)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url = URL .'/'. $url .'/'. $id .'-'. $numero .'.php';
	
	$message_mail = str_replace('<facture>', $url, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoi de l'email de paiement d'un abonnement vitrine
///////////////////

function send_payment_4($email, $id, $url, $numero)
{
	global $cache_mails_auto;
	
	$email = $email;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 13)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url = URL .'/'. $url .'/'. $id .'-'. $numero .'.php';
	
	$message_mail = str_replace('<facture>', $url, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoi de l'email de paiement d'une options visuelle pour vitrine
///////////////////

function send_payment_5($email, $id, $url, $numero)
{
	global $cache_mails_auto;
	
	$email = $email;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 11)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url = URL .'/'. $url .'/'. $id .'-'. $numero .'.php';
	
	$message_mail = str_replace('<facture>', $url, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoi de l'alerte
///////////////////

function send_alerte($email, $titre, $id_ann, $id_alerte)
{
	global $language_adm, $param_gen;
	
	// Url rewrinting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      

	$url_ann = $titre;
	$url_ann = str_replace($accent, $sans_accent, $url_ann);
	
	$url_a = array();
   
	for ($i = 0; $i < strlen($url_ann); $i++) 
	array_push($url_a, $url_ann[$i]);
	
	$url_annonce = URL .'/';
	
	foreach($url_a as $url_ann)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
		$url_ann = str_replace($url_ann, '-', $url_ann);
		
		$url_annonce .= $url_ann;
	}
	
	$url_annonce .='-'. $id_ann .'.htm';
	
	$url_delete = URL .'/alerte_delete.php?id_alert='. $id_alerte;
	
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre = $language_adm['mail_alerte_send_suj'];
	$message_mail = $language_adm['mail_alerte_send_texte'] .'<br />' . $url_annonce;
	$message_mail .= $language_adm['mail_alerte_send_texte2'] .' : <br />'. $url_delete;
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre, $message_mail, $header);
	return true;
}

///////////////////
//Envoi de la newsletter
///////////////////

function send_newsletter($email, $format, $sujet, $message_mail)
{
	global $language_adm, $param_gen;
	
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $sujet, $message_mail, $header);
	return true;
}