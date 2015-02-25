<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////
//Envoi de l'email pour confirmer l'annonce
///////////////////

function send_confirm($id, $array)
{
	global $cache_mails_auto;
	
	$email = stripslashes($array['ema']);
	$titre = stripslashes($array['tit']);

	$nom_mail = '';
	$email_mail = '';
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 1)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url = URL .'/confirmer_ann.php?code='. $id .'&email='. $email;
	
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

///////////////////
//Envoi de l'email de notification d'annonce à valider
///////////////////

function send_notif_ann()
{
	global $language, $param_gen;
	
	$email = $param_gen['email_notif'];
	$titre = $language['mail_notif_ann_title'];
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $titre;
	$message_mail = $language['mail_notif_ann_text'];
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoi de l'email pour confirmer le compte
///////////////////

function send_confirm_acc($type, $email)
{
	global $cache_mails_auto;
	
	$email = $email;
	
	foreach($cache_mails_auto as $v)
	{
		if($v['type'] == 6)
		{
			$nom_mail = stripslashes($v['nom']);
			$email_mail = stripslashes($v['email']);
			$titre_mail = stripslashes($v['titre']);
			$message_mail = stripslashes($v['message']);
		}
	}
	
	$url = URL .'/confirmer_acc.php?email='. $email .'&code='. $type;

	$message_mail = str_replace('<url>', $url, $message_mail);
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoi de l'email pour confirmer le compte
///////////////////

function send_valid_acc($type, $email)
{
	global $language, $param_gen;
	
	$email = $email;
	
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	$titre_mail = $language['send_mail_crea_compte_tit'];
	$message_mail = $language['send_mail_crea_compte_msg'] .'<br /><br />';
	$message_mail .= $param_gen['name'] .'<br />'. URL;
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
}

///////////////////
//Envoie du mail à l'annonceur
///////////////////

function send_message($array, $row)
{
	global $language;

	$email = stripslashes($row[0]['email']);
	$titre = stripslashes($row[0]['titre']);
	$nom_mail = $array['mes_nom'];
	$email_mail = $array['mes_ema'];
	$tel = $array['mes_tel'];
	
	$titre_mail = $language['page_env_msg_mail_title'] .' "'. $titre .'".';
	
	$message_mail = $language['page_env_msg_mail_corps'] .' "'. $titre .'"'. $language['page_env_msg_mail_msg'];
	$message_mail .= nl2br($array['mes']);
	$message_mail .= $language['page_env_msg_mail_nom'] .' '. $nom_mail;
	
	if(!empty($tel) )
	$message_mail .= $language['page_env_msg_mail_tel'] .' '. $tel;
	
	$message_mail .= $language['page_env_msg_mail_msg_rep'];

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";

	mail($email, $titre_mail, $message_mail, $header);
	return true;	
}

///////////////////
//Envoyer le rapel du mot de passe
////////////////////

function send_password($id, $email, $password)
{
	global $conn, $language, $param_gen;
	
	$bdd = $conn;
	
	$sql = "SELECT titre FROM ". PREFIX ."annonces_search WHERE id_ann = :id_ann AND etat = :etat";	 
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('etat', 2, PDO::PARAM_STR);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	$titre = htmlspecialchars($result['titre']);
	
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $language['mail_env_pass_title'] .' "'. $titre .'"';
	$message_mail = $language['mail_env_pass_msg'] .' "'. $titre .'" : '. $password;

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";

	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoye de l'annonce à un ami
///////////////////

function send_envoyer($name, $email, $row, $url)
{
	global $language, $param_gen;

	$email = $email;
	$titre = $row;
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $language['page_ann_mail_title'];
	$message_mail = $language['page_ann_mail_msg'] .'<a href="'. $url .'">'. $language['page_ann_mail_lien'] .'</a><br><br>'.
					$language['page_ann_mail_nom'] .' : '. $name .'<br /><br />'. $language['page_ann_mail_signature'];

	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";

	mail($email, $titre_mail, $message_mail, $header);
	return true;
	return true;	
}

///////////////////
//Envoi de l'email de notification de compte à valider
///////////////////

function send_notif_acc()
{
	global $language, $param_gen;
	
	$email = $param_gen['email_notif'];
	$titre = $language['mail_notif_acc_title'];
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $titre;
	$message_mail = $language['mail_notif_acc_text'];
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoye d'un nouveau mot de passe
////////////////////

function send_compte_password($email, $password)
{
	global $language, $param_gen;
	
	$email = $email;
	$titre = $language['mail_compte_new_pass_title'];
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $titre;
	$message_mail = $language['mail_compte_new_pass_msg'] . $password;
	$message_mail .= $language['mail_compte_new_pass_sig'];
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";

	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoie du mail de contact
///////////////////

function send_contact($array)
{
	global $language, $cache_mails_contact;
	
	$tel = $array['con_tel'];
	$contact = $array['contact'];
	$nom_mail = $array['con_nom'];
	$email_mail = $array['con_ema'];
	$titre_mail = $array['con_tit'];
	
	foreach($cache_mails_contact as $v)
	{
		if($v['id_contact'] == $contact)
		$email = stripslashes($v['email']);
	}
	
	$message_mail = nl2br($array['con_mes']);
	
	if(!empty($tel))
	$message_mail .= '<br /><br />'. $language['page_env_cont_tel_mail'] .' : '. $tel;
	
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
//Envoi du mail qui informe de la suppression d'options visuelles vitrine expirées
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
//Envoi de l'email de notification de mails à valider
///////////////////

function send_notif_mail()
{
	global $language, $param_gen;
	
	$email = $param_gen['email_notif'];
	$titre = $language['mail_notif_mail_title'];
	$nom_mail = $param_gen['name'];
	$email_mail = $param_gen['mail_rep'];
	
	$titre_mail = $titre;
	$message_mail = $language['mail_notif_mail_text'];
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre_mail, $message_mail, $header);
	return true;
}

///////////////////
//Envoi de l'alerte
///////////////////

function send_alerte($email, $titre, $id_ann, $id_alerte)
{
	global $language, $param_gen;
	
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
	
	$titre = $language['mail_alerte_send_suj'];
	$message_mail = $language['mail_alerte_send_texte'] .'<br />' . $url_annonce;
	$message_mail .= $language['mail_alerte_send_texte2'] .' : <br />'. $url_delete;
	
	//Entête du mail
	
	$header = "From: ". $nom_mail ." <". $email_mail.">\n";
	$header .= "Reply-To: ". $email_mail ."\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: binary";
	
	mail($email, $titre, $message_mail, $header);
	return true;
}