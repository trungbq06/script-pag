<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

////////////////////////////////
//Connexion a la base de donnée
////////////////////////////////

function db_connect()
{
	global $language;
	
	try
	{
		$set_utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); // Transactions UFT8
		
		$bdd = new PDO('mysql:host='. HOSTNAME .';dbname='. DB_NAME, DB_USERNAME, DB_PASSWORD, $set_utf8);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch(Exception $error)
	{
		die('<html><meta http-equiv="content-type" content="text/html; charset=utf-8" />'. $language['error_bdd_connect'] .'</html>');
	}
	
	return $bdd;
}

////////////////////////////////
//Rassembler un resultat mysql dans un tableau
////////////////////////////////

function result_to_array($req)
{
	$res_array = array();
	
	for ($count = 0; $row = $req->fetch(); $count++)
	$res_array[$count] = $row;
	
	$req->closeCursor();

	return $res_array;
}

////////////////////////////////
//Generer un mot de passe aléatoire sécurisé
////////////////////////////////

function generate_password()
{
	$password = '';
	
	srand((double)microtime() * 1000000);
		
	$chaine = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHJKLMNOPQRSTUVWXYZ";
	$num = rand(6, 16);	
	
	for($i = 0; $i < $num; $i++) 
	$password .= $chaine[rand(0, 59)];

	$password = md5($password);
	$password = substr($password, 0, rand(6, 16));
	
	return $password;
}
	
////////////////////////////////
//Enregistrement de l'annonce dans la base de données
////////////////////////////////

function register($array, $pass, $etat)
{
	global $conn, $cache_form, $cache_champs, $cache_options_visuelles, $param_gen;
	
	$bdd = $conn;
	
	//Préparation des variables de l'annonce
	
	$dep = (isset($array['dep'])) ? (int) $array['dep'] : '';
	$cod = (isset($array['cod'])) ? $array['cod'] : '';
	$vil = (isset($array['vil'])) ? $array['vil'] : '';
	$tel = (isset($array['tel'])) ? $array['tel'] : '';
	$sta = (int) $array['sta'];
	$cat = (int) $array['cat'];
	$tel_cache = (!empty($array['tel_cache'])) ? $array['tel_cache'] : 'N';
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	
	$photo = (isset($_SESSION['photo']['count']) && $_SESSION['photo']['count'] > 0) ? 1 : 0;
	$nb_photo = (isset($_SESSION['photo']['count'])) ? (int) $_SESSION['photo']['count'] : 0;
	
	$video = (!empty($array['youtube']) || !empty($array['dailymotion'])) ? 1 : 0;
	
	$pri = (!empty($array['pri'])) ? str_replace(',' ,'.', $array['pri']) : 0;
	$pri = (float) $pri;
	
	$time = time();
	$xml_key = md5(uniqid(rand(), true));
	
	//Préparation des variables des options
	
	$tet = 0;
	$jour_tet = 0;
	$time_tet = 0;
	
	if(!empty($array['opt_type1']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $array['opt_type1'])
			{
				$tet = 1;
				$jour_tet = (int) $v['jour'];
				$time_tet = time();
			}
		}
	}
	
	$une = 0;
	$jour_une = 0;
	$time_une = 0;
	
	if(!empty($array['opt_type2']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type2'])
			{
				$une = 1;
				$jour_une = (int) $v['jour'];
				$time_une = time();
			}
		}
	}
	
	$urg = 0;
	$jour_urg = 0;
	$time_urg = 0;
	
	if(!empty($array['opt_type3']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type3'])
			{
				$urg = 1;
				$jour_urg = (int) $v['jour'];
				$time_urg = time();
			}
		}
	}
	
	$enc = 0;
	$jour_enc = 0;
	$time_enc = 0;
	
	if(!empty($array['opt_type4']))
	{
		foreach($cache_options_visuelles as $v)
		{
			if($v['id'] == $_POST['opt_type4'])
			{
				$enc = 1;
				$jour_enc = (int) $v['jour'];
				$time_enc = time();
			}
		}
	}

	//Enregistrement de l'annonce
	
	$sql = "INSERT INTO ". PREFIX ."annonces_search VALUES('', :id_reg, :id_dep, :id_cat, :code_postal, :statut, :type, :titre, :texte, :prix, :etat, :time, :id_compte, :photo, :video, :urg, :une)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('id_dep', $dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $array['cat'], PDO::PARAM_INT);
	$req->bindValue('code_postal', $cod, PDO::PARAM_STR);
	$req->bindValue('statut', $array['sta'], PDO::PARAM_INT);
	$req->bindValue('type', $array['typ'], PDO::PARAM_INT);
	$req->bindValue('titre', $array['tit'], PDO::PARAM_STR);
	$req->bindValue('texte', $array['ann'], PDO::PARAM_STR);
	$req->bindValue('prix', $pri, PDO::PARAM_STR);
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->bindValue('time', $time, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->bindValue('photo', $photo, PDO::PARAM_INT);
	$req->bindValue('video', $video, PDO::PARAM_INT);
	$req->bindValue('urg', $urg, PDO::PARAM_INT);
	$req->bindValue('une', $une, PDO::PARAM_INT);
	
	$req->execute();
	
	$id = $bdd->lastInsertId();
	
	$req->closeCursor();
	
	//Enregitrement des infos de l'annonce
	
	$sql = "INSERT INTO ". PREFIX ."annonces VALUES(:id_ann, :email, :password, :ville, :nom, :tel, :tel_cache, :ip, :nb_photo, :nb_visit, NOW(), :xml_key)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('email', $array['ema'], PDO::PARAM_STR);
	$req->bindValue('password', $pass, PDO::PARAM_STR);
	$req->bindValue('ville', $vil, PDO::PARAM_STR);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	$req->bindValue('tel_cache', $tel_cache, PDO::PARAM_STR);
	$req->bindValue('ip', $array['ip'], PDO::PARAM_STR);
	$req->bindValue('nb_photo', $nb_photo, PDO::PARAM_INT);
	$req->bindValue('nb_visit', 0, PDO::PARAM_INT);
	$req->bindValue('xml_key', $xml_key, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	//Enregistrement des photos
	
	if(isset($_SESSION['photo']['count']) AND $_SESSION['photo']['count'] > 0)
	{
		$sql = "INSERT INTO ". PREFIX ."annonces_images VALUES('', :id_ann, :nom) ON DUPLICATE KEY UPDATE id_ann = VALUES(id_ann)";
		$req = $bdd->prepare($sql);
		
		for($i = 1; $i <= 10; $i++)
		{
			if(isset($_SESSION['photo'][$i])) 
			{
				$name = $_SESSION['photo'][$i];
				
				$req->bindValue('id_ann', $id, PDO::PARAM_INT);
				$req->bindValue('nom', $name, PDO::PARAM_STR);
				$req->execute();
			}
		}
		$req->closeCursor();
	}
	
	//Enregistrement des informations entreprise
	
	if($sta == 2)
	{
		$ent = (isset($array['ent'])) ? $array['ent'] : '';
		$sir = (isset($array['sir'])) ? $array['sir'] : '';
		
		$sql = "INSERT INTO ". PREFIX ."annonces_societe VALUES(:id_ann, :nom_ent, :siret)";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('nom_ent', $ent, PDO::PARAM_STR);
		$req->bindValue('siret', $sir, PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	//Enregistrement des options de catégories
	
	$sql = "INSERT INTO ". PREFIX ."annonces_valeurs VALUES(:id_opt, :id_ann, :valeur)";
	$req = $bdd->prepare($sql);
	
	foreach($cache_form as $v)
	{
		if($v['id_cat'] == $cat)
		{
			$form_name = 'form'. $v['id_for'];
			$valeur = $array[$form_name];
			
			$req->bindValue('id_opt', $v['id_opt'], PDO::PARAM_INT);
			$req->bindValue('id_ann', $id, PDO::PARAM_INT);
			$req->bindValue('valeur', $valeur, PDO::PARAM_STR);
			$req->execute();
		}
	}
	
	$req->closeCursor();
	
	//Enregistrement des champs
	
	$sql = "INSERT INTO ". PREFIX ."annonces_champ VALUES(:id_ann, :id_champ, :valeur)";
	$req = $bdd->prepare($sql);
	
	foreach($cache_champs as $v)
	{
		$id_champ = (int) $v['id_champ'];
		$valeur = $array[$id_champ];
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('id_champ', $id_champ, PDO::PARAM_INT);
		$req->bindValue('valeur', $valeur, PDO::PARAM_STR);
		$req->execute();
	}
	
	$req->closeCursor();
	
	//Enregistrement de la vidéo
	
	if(!empty($array['youtube']) || !empty($array['dailymotion']))
	{
		$video = (!empty($array['youtube'])) ? $array['youtube'] : $array['dailymotion'];
		
		$sql = "INSERT INTO ". PREFIX ."annonces_video VALUES(:id_ann, :video)";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('video', $video, PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	//Enregistrement des options
	
	if(!empty($array['opt_type1']) || !empty($array['opt_type2']) || !empty($array['opt_type3']) || !empty($array['opt_type4']))
	{
		$sql = "INSERT INTO ". PREFIX ."annonces_options VALUES(:id_ann, :tete, :jour_tete, :time_tete, :urg, :jour_urg, :time_urg, :enc, :jour_enc, :time_enc, :une, :jour_une, :time_une)";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('tete', $tet, PDO::PARAM_INT);
		$req->bindValue('jour_tete', $jour_tet, PDO::PARAM_INT);
		$req->bindValue('time_tete', $time_tet, PDO::PARAM_INT);
		$req->bindValue('urg', $urg, PDO::PARAM_INT);
		$req->bindValue('jour_urg', $jour_urg, PDO::PARAM_INT);
		$req->bindValue('time_urg', $time_urg, PDO::PARAM_INT);
		$req->bindValue('enc', $enc, PDO::PARAM_INT);
		$req->bindValue('jour_enc', $jour_enc, PDO::PARAM_INT);
		$req->bindValue('time_enc', $time_enc, PDO::PARAM_INT);
		$req->bindValue('une', $une, PDO::PARAM_INT);
		$req->bindValue('jour_une', $jour_une, PDO::PARAM_INT);
		$req->bindValue('time_une', $time_une, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	//Mise à jour des annonces d'un pack compte
	
	if(isset($_SESSION['connect']))
	{
		$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);
		
		$sql = "UPDATE ". PREFIX ."comptes_packs SET annonce = IF(annonce = 0, 0, annonce - 1) WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $membre[0]['id_compte'], PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques SET nb_ann = nb_ann + 1 WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $membre[0]['id_compte'], PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	//Envoyer les alertes email
	
	if($param_gen['auto_ann'] == 1)
	{
		$sql = "SELECT id_alert, email FROM ". PREFIX ."alert WHERE id_reg = :id_reg AND id_dep = :id_dep AND id_cat = :id_cat";
		
		$keywords = trim(htmlspecialchars($array['tit'], ENT_QUOTES));
		$str = array('+', '&#039;', '(');
		$str_replace = array(' ', ' ', ' ');
		$keywords_replace = str_replace($str, $str_replace, $keywords);
		$explode = explode(' ', $keywords_replace);
		$num = count($explode);
		
		if($num >= 1)
		{
			$sql .= " AND CONCAT_WS(' ', keywords) REGEXP '[[:<:]]$explode[0][[:>:]]'";
			
			for($i = 1; $i < $num; $i++)
			{
				if(empty($explode[$i]))
				$sql .= "";
				 
				else $sql .= " OR CONCAT_WS(' ', keywords) REGEXP '[[:<:]]$explode[$i][[:>:]]'";
			}
		}
		
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
		$req->bindValue('id_dep', $dep, PDO::PARAM_INT);
		$req->bindValue('id_cat', $array['cat'], PDO::PARAM_INT);
		$req->execute();
		
		while($row = $req->fetch())	
		{
			$email = stripslashes($row['email']);
			$id_alerte = $row['id_alert'];
			
			send_alerte($email, $array['tit'], $id, $id_alerte);
		}
		
		$req->closeCursor();
	}
	
	return $id;
}

////////////////////////////////
//Creation du flux rss du site et du PRO
////////////////////////////////

function creat_flux($id)
{
	global $conn, $param_gen;
	
	$bdd = $conn;
	
	$id = (int) $id;
	
	if($param_gen['flux_bout'] == 1)
	{
		$sql = "SELECT s.id_ann, s.titre, s.ann, s.id_compte, i.nom, c.nom_ent, c.rss, c.type 
		FROM ". PREFIX ."annonces_search s
		LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
		LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = s.id_ann)
		LEFT JOIN ". PREFIX ."comptes c ON s.id_compte = c.id_compte
		WHERE s.id_compte = (SELECT id_compte FROM ". PREFIX ."annonces_search WHERE id_ann = :id_ann) AND s.etat = :etat ORDER BY s.date DESC LIMIT 0, :limit";
		$req = $bdd->prepare($sql);
		
		$limit = (int) $param_gen['nb_flux_bout'];
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->bindValue('limit', $limit, PDO::PARAM_INT);
		$req->execute();
		
		$result = $req->fetchAll();
		
		if(!empty($result) && $result[0]['id_compte'] != 0 && $result[0]['type'] == 2)
		{
			// Url rewriting
				
			$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
			$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
			
			$url_ann =  htmlspecialchars($result[0]['nom_ent']);
			$url_ann = str_replace($accent, $sans_accent, $url_ann);
			
			$url = array();
		 
			for ($i = 0; $i < strlen($url_ann); $i++) 
			array_push($url, $url_ann[$i]);
			
			$url_aff = '';
			
			foreach($url as $url_ann)
			{
				if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
				$url_ann = str_replace($url_ann, '-', $url_ann);
				
				$url_aff .= $url_ann;
			}

			// Flux PRO
			
			$flux = fopen($result[0]['rss'] .'/'. $url_aff .'-'. $result[0]['id_compte'] .'.xml', 'w');
			
			$texte = '<?xml version="1.0" encoding="utf-8"?>
	<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
	<title>'. $param_gen['name'] .' - '. htmlspecialchars($result[0]['nom_ent']) .'</title>
	<link>'. URL .'/'. $result[0]['rss'] .'/'. $url_aff .'-'. $result[0]['id_compte'] .'.xml</link>';

			foreach($result as $donnees)
			{
				// Url rewriting
				
				$url_ann = htmlspecialchars($donnees['titre']);
				$url_ann = str_replace($accent, $sans_accent, $url_ann);
				
				$url = array();
			 
				for ($i = 0; $i < strlen($url_ann); $i++) 
				array_push($url, $url_ann[$i]);
				
				$url_aff = '';
				
				foreach($url as $url_ann)
				{
					if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
					$url_ann = str_replace($url_ann, '-', $url_ann);
					
					$url_aff .= $url_ann;
				}			
				
				$texte .= '
	<item>
	<title>'. htmlspecialchars($donnees['titre']) .'</title>
	<link>'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm</link>
	<guid isPermaLink="true">'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm</guid>
	<description>'. htmlspecialchars($donnees['ann']) .'</description>';
							
				if(!empty($donnees['nom']))
				$texte .= '<content:encoded><![CDATA[ <a href="'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm"><img src="'. URL .'/images/vignettes/'. $donnees['nom'] .'" align="left" style="margin: 0 5px 5px 0;" border="0" border="0"></a> '. htmlspecialchars($donnees['ann']) .' ]]></content:encoded>';
				
				else $texte .= '<content:encoded><![CDATA[ <a href="'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm"><img src="'. URL .'/images/no_photo2.png" align="left" style="margin: 0 5px 5px 0;" border="0"></a> '. htmlspecialchars($donnees['ann']) .' ]]></content:encoded>';
				
				$texte .= '
	</item>';
			}
			
			$texte .= '
	</channel>
	</rss>';
			
			fputs($flux, $texte); 
			fclose($flux);
		}
		$req->closeCursor();
	}
	
	// Flux site
	
	if($param_gen['flux_gl'] == 1)
	{
		// Url rewriting
			
		$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
		$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
		
		$url_ann = $param_gen['name'];
		$url_ann = str_replace($accent, $sans_accent, $url_ann);
		
		$url = array();
	 
		for ($i = 0; $i < strlen($url_ann); $i++) 
		array_push($url, $url_ann[$i]);
		
		$url_aff = '';
		
		foreach($url as $url_ann)
		{
			if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
			$url_ann = str_replace($url_ann, '-', $url_ann);
			
			$url_aff .= $url_ann;
		}
		
		$sql = "SELECT s.id_ann, s.titre, s.ann, i.nom 
		FROM ". PREFIX ."annonces_search s
		LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = s.id_ann) 
		WHERE s.etat = :etat ORDER BY s.date DESC LIMIT 0, :limit";
		$req = $bdd->prepare($sql);
		
		$limit = (int) $param_gen['nb_flux_gl'];
		
		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->bindValue('limit', $limit, PDO::PARAM_INT);
		$req->execute();
		
		$flux = fopen('rss/'. $url_aff .'.xml', 'w');
		
		$texte = '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
	<title>'. $param_gen['name'] .'</title>
	<link>'. URL .'/rss/'. $param_gen['name'] .'.xml</link>';
		
		while($donnees = $req->fetch())
		{
			// Url rewriting
		
			$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
			$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
			
			$url_ann = htmlspecialchars($donnees['titre']);
			$url_ann = str_replace($accent, $sans_accent, $url_ann);
			
			$url = array();
		 
			for ($i = 0; $i < strlen($url_ann); $i++) 
			array_push($url, $url_ann[$i]);
			
			$url_aff = '';
			
			foreach($url as $url_ann)
			{
				if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
				$url_ann = str_replace($url_ann, '-', $url_ann);
				
				$url_aff .= $url_ann;
			}			
			
			$texte .= '
<item>
<title>'. htmlspecialchars($donnees['titre']) .'</title>
<link>'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm</link>
<guid isPermaLink="true">'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm</guid>
<description>'. htmlspecialchars($donnees['ann']) .'</description>';
						
			if(!empty($donnees['nom']))
			$texte .= '<content:encoded><![CDATA[ <a href="'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm"><img src="'. URL .'/images/vignettes/'. $donnees['nom'] .'" align="left" style="margin: 0 5px 5px 0;" border="0"></a> '. htmlspecialchars($donnees['ann']) .' ]]></content:encoded>';
			
			else
			$texte .= '<content:encoded><![CDATA[ <a href="'. URL .'/'. $url_aff .'-'. $donnees['id_ann'] .'.htm"><img src="'. URL .'/images/no_photo2.png" align="left" style="margin: 0 5px 5px 0;" border="0"></a> '. htmlspecialchars($donnees['ann']) .' ]]></content:encoded>';
			
			$texte .= '
</item>';
		}
		
		$texte .= '
</channel>
</rss>';
		
		fputs($flux, $texte); 
		fclose($flux);
		
		$req->closeCursor();
	}
	
	return true;
}

///////////////////
//Confirmation de l'annonce
///////////////////

function confirm_ann($id, $email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."annonces a
	LEFT JOIN ". PREFIX ."annonces_search s ON a.id_ann = s.id_ann
	WHERE a.id_ann = :id_ann AND a.email = :email AND s.etat = :etat";
	$req = $bdd->prepare($sql);
		
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('etat', 0, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	if(!empty($result))
	{
		$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('etat', 1, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		return true;
	}
	else return false;		 
}

////////////////////////////////	
//Comptez le nombre d'annonce pour l'envoi du mail de notification
////////////////////////////////

function count_ann_mail()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) AS nb_ann FROM ". PREFIX ."annonces_search WHERE etat = :etat";				  
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 1, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	return $result['nb_ann'];
}

///////////////////
//Obtenir le nombre d'annonce du vendeur
///////////////////

function get_nb_annonce_vendeur($id, $tri)
{
	global $conn;
	
	$bdd = $conn;
	
	$prix_req = ($tri == 2) ? " AND s.prix > :prix" : "";
	
	$sql = "SELECT count(*) AS total 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE a.email = (SELECT email FROM ". PREFIX ."annonces WHERE id_ann = :id_ann) AND s.etat = :etat". $prix_req;
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	
	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	return $result;
}

///////////////////
//Obtenir les annonces d'un vendeur
///////////////////

function get_all_vendeur($id, $offset, $limit, $tri)
{
	global $conn;
	
	$bdd = $conn;
	
	$prix_req = ($tri == 2) ? " AND s.prix > :prix" : "";
	$order_req = ($tri == 2) ? " ORDER BY s.prix ASC" : " ORDER BY s.date DESC";

	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.type, s.titre, s.ann, s.prix, s.date, s.urg, o.enc, a.nom, a.ville, a.n_photo, i.nom AS nom_image, v.video 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = s.id_ann)
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.etat = :etat AND a.email = (SELECT email FROM ". PREFIX ."annonces WHERE id_ann = :id_ann) ". $prix_req . $order_req ." LIMIT :offset, :limit";

	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);

	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
} 

////////////////////////////////	
//Obtenir le nombre d'annonce total, particulier ou professionnel d'une région
////////////////////////////////

function get_nb_annonce_reg($id, $tri)
{
	global $conn;
	
	$bdd = $conn;
	
	$prix_req = ($tri == 2) ? " AND prix > :prix" : "";
	
	$sql = "SELECT status, une FROM ". PREFIX ."annonces_search WHERE etat = :etat AND id_reg = :id_reg". $prix_req;
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_reg', $id, PDO::PARAM_INT);
	
	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les annonces et les annonces à la une de la page de recherche par région
///////////////////

function get_annonces_reg($id, $f, $offset, $limit, $tri, $une)
{
	global $conn;
	
	$bdd = $conn;
	
	$f = (int) $f;
	$tri = (int) $tri;
	$une = (int) $une;
	
	$status_req = ($f == 1 || $f == 2) ? " AND s.status = :status" : "";
	$prix_req = ($tri == 2) ? " AND s.prix > :prix" : "";
	$une_req = ($une == 1) ? " AND s.une = :une" : "";
	$order_req = ($tri == 2) ? " ORDER BY s.prix ASC" : " ORDER BY s.date DESC";
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.type, s.titre, s.ann, s.prix, s.date, s.urg, o.enc, a.ville, a.n_photo, i.nom AS nom_image, v.video 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = s.id_ann)
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.etat = :etat AND s.id_reg = :id_reg ". $status_req . $prix_req . $une_req . $order_req ." LIMIT :offset, :limit";

	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_reg', $id, PDO::PARAM_INT);
	
	if($f == 1 || $f == 2)
	$req->bindValue('status', $f, PDO::PARAM_INT);
	
	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	if($une == 1)
	$req->bindValue('une', 1, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir le nombre d'annonce pro ou particulier en fonction du type
///////////////////

function get_nb_annonce_type($type, $tri)
{
	global $conn; 
	
	$bdd = $conn;
	
	$type_req = ($type != 0) ? " AND type = :type" : "";
	$prix_req = ($tri == 2) ? " AND prix > :prix" : "";
	
	$sql = "SELECT status, une FROM ". PREFIX ."annonces_search WHERE etat = :etat ". $type_req . $prix_req;
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	
	if($type != 0)
	$req->bindValue('type', $type, PDO::PARAM_INT);
	
	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	$req->execute();

	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les annonces et les annonces à la une de la recherche par type
///////////////////

function get_annonces_type($type, $f, $offset, $limit, $tri, $une)
{
	global $conn;
	
	$bdd = $conn;
	
	$type = (int) $type;
	$tri = (int) $tri;
	$une = (int) $une;
	
	$type_req = ($type != 0) ? " AND s.type = :type" : "";
	$status_req = ($f == 1 || $f == 2) ? " AND s.status = :status" : "";
	$prix_req = ($tri == 2) ? " AND s.prix > :prix" : "";
	$une_req = ($une == 1) ? " AND s.une = :une" : "";
	$order_req = ($tri == 2) ? " ORDER BY s.prix ASC" : " ORDER BY s.date DESC";

	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.type, s.titre, s.ann, s.prix, s.date, s.urg, o.enc, a.ville, a.n_photo, i.nom AS nom_image, v.video 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = s.id_ann)
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.etat = :etat ". $type_req . $status_req . $prix_req . $une_req . $order_req ." LIMIT :offset, :limit";

	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	
	if($type != 0)
	$req->bindValue('type', $type, PDO::PARAM_INT);
	
	if($f == 1 || $f == 2)
	$req->bindValue('status', $f, PDO::PARAM_INT);
	
	if($tri == 2)
	$req->bindValue('prix', 0, PDO::PARAM_INT);
	
	if($une == 1)
	$req->bindValue('une', 1, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
} 	

///////////////////
//Obtenir le résulat de la recherche
///////////////////

function make_sql($array, $array_keywords)
{
	global $conn, $language, $cache_search_valeurs;
	
	$bdd = $conn;

	$code_pos = (!empty($array['zip_code']) AND $array['zip_code'] != $language['value_code_postal']) ? $bdd->quote($array['zip_code']) : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$cat = (!empty($array['cat'])) ? htmlspecialchars($array['cat']) : 0;
	$cat_sql = (!empty($array['cat'])) ? (int) $array['cat'] : 0;

	$condition = " s.etat = 2";
	$condition .= (!empty($reg)) ? " AND s.id_reg = $reg" : "";
	$condition .= (!empty($dep)) ? " AND s.id_dep = $dep" : "";
	
	if(!empty($cat) && !is_numeric($cat))
	{
		$select_id_cat = "SELECT id_cat FROM ". PREFIX ."categories WHERE par_cat = (SELECT MIN(id_cat) FROM ". PREFIX ."categories WHERE par_cat = :par_cat AND nom_cat = :nom_cat)";
		$req = $bdd->prepare($select_id_cat);
		
		$req->bindValue('par_cat', 0, PDO::PARAM_INT);
		$req->bindValue('nom_cat', $cat, PDO::PARAM_STR);
		$req->execute();
		
		$result = $req->fetchAll();
		
		$req->closeCursor();
		
		$i = 0;
		
		if(!empty($result))
		{
			$condition .= " AND (";
			
			foreach($result as $id_cat)
			{
				if($i == 0)
				$condition .= "s.id_cat = ". (int) $id_cat[0] ."";
				
				else $condition .= " OR s.id_cat = ". (int) $id_cat[0] ."";
				
				$i++;
			}
			
			$condition .= ")";
		}
		else $condition .= " AND s.id_cat = $cat_sql";
	}
	elseif($cat != 0) 
	$condition .= " AND s.id_cat = $cat_sql";
	
	$condition .= (!empty($code_pos)) ? " AND s.code_pos = $code_pos" : "";
	
	//Les annonces offres uniquement
	
	if(!empty($array['offres']))
	$condition .= " AND s.type IN (1";
	
	//Les annonces recherches uniquement
	
	if(!empty($array['recherches']) && !empty($array['offres']))
	$condition .= ", 2";
	
	elseif(!empty($array['recherches']))
	$condition .= " AND s.type IN (2";
	
	//Les annonces echanges uniquement
	
	if(!empty($array['echanges']) && (!empty($array['offres']) || !empty($array['recherches'])))
	$condition .= ", 3";
	
	elseif(!empty($array['echanges']))
	$condition .= " AND s.type IN (3";
	
	//Les annonces dons uniquement
	
	if(!empty($array['dons']) && (!empty($array['offres']) || !empty($array['recherches']) || !empty($array['echanges'])))
	$condition .= ", 4";
	
	elseif(!empty($array['dons']))
	$condition .= " AND s.type IN (4";
	
	//Fermeture de la condition
	
	if(!empty($array['offres']) || !empty($array['recherches']) || !empty($array['echanges']) || !empty($array['dons']))
	$condition .= ")";
	
	//Condition avec mots clé
	
	if(file_exists('includes/engine/search_a_optimized.php'))
	{
		require_once('includes/engine/search_a_optimized.php');
	}
	else
	{
		if(!empty($array['titre']) && is_array($array_keywords))
		{
			$num = count($array_keywords);
		 
			$condition .= " AND CONCAT_WS(' ', s.titre) REGEXP '[[:<:]]$array_keywords[0][[:>:]]'";		
			
			if($num != 1)
			{
				for($i = 1; $i < $num; $i++)
				{
					if(empty($array_keywords[$i]))
					$condition .= "";
					 
					else $condition .= " AND CONCAT_WS(' ', s.titre) REGEXP '[[:<:]]$array_keywords[$i][[:>:]]'";
				}
			}
		}
		elseif(is_array($array_keywords))
		{
			$num = count($array_keywords);
		 
			$condition .= " AND CONCAT_WS(' ', s.titre, s.ann) REGEXP '[[:<:]]$array_keywords[0][[:>:]]'";		
			
			if($num != 1)
			{
				for($i = 1; $i < $num; $i++)
				{
					if(empty($array_keywords[$i]))
					$condition .= "";
					 
					else $condition .= " AND CONCAT_WS(' ', s.titre, s.ann) REGEXP '[[:<:]]$array_keywords[$i][[:>:]]' ";
				}
			}	
		}
	}
	
	// Recherche avec l'option par prix
	
	foreach($cache_search_valeurs as $v)
	{
		$id_cat = (int) $v['id_cat'];
		$sel_nom = htmlspecialchars($v['sel_nom']);
		$id_opt = (int) $v['id_opt'];
		
		if($id_cat == $cat && preg_match("#max$#", $sel_nom) == false)
		{
			$sel1 = (isset($array['sel'. $id_opt .'_1'])) ? (int) $array['sel'. $id_opt .'_1'] : 0;
			$sel2 = (isset($array['sel'. $id_opt .'_2'])) ? (int) $array['sel'. $id_opt .'_2'] : 0;
			$_SESSION['search']['sel'. $id_opt .'_1'] = $sel1;
			$_SESSION['search']['sel'. $id_opt .'_2'] = $sel2;
			
			if($id_opt == 0)
			{
				if($sel1 != 0 && $sel2 != 0)
				$condition .=" AND s.prix BETWEEN $sel1 AND $sel2";
				
				elseif($sel1 == 0 && $sel2 != 0)
				$condition .=" AND s.prix <= $sel2";
				
				elseif($sel1 != 0 && $sel2 == 0)
				$condition .=" AND s.prix >= $sel1";
			}
		}
	}
	
	//Requête
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.type, s.titre, s.ann, s.prix, s.date, s.urg, o.enc, a.ville, a.n_photo, i.nom AS nom_image, v.video 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = a.id_ann)
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE ". $condition;
	
	$sql_count = "SELECT s.status, s.une FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE ". $condition;

	$result = array('sql' => $sql, 'sql_count' => $sql_count);
	return $result;
}		

///////////////////
//Obtenir le résulat des options de la recherche
///////////////////

function make_options($array)
{
	global $conn, $cache_search_valeurs, $cache_search_donnees;
	
	$bdd = $conn;
	
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	
	$options = '';
	
	//Annonces urgentes et/ou avec photo
	
	$options .= (!empty($array['urgentes'])) ? " AND s.urg = 1" : "";
	$options .= (!empty($array['photo'])) ? " AND s.photo = 1" : "";
	$options .= (!empty($array['video'])) ? " AND s.video = 1" : "";
	
	// Recherche avec options de valeurs
	
	foreach($cache_search_valeurs as $v)
	{
		$id_cat = (int) $v['id_cat'];
		$sel_nom = htmlspecialchars($v['sel_nom']);
		$id_opt = (int) $v['id_opt'];
		
		if($id_cat == $cat && preg_match("#max$#", $sel_nom) == false)
		{
			$sel1 = (isset($array['sel'. $id_opt .'_1'])) ? (int) $array['sel'. $id_opt .'_1'] : 0;
			$sel2 = (isset($array['sel'. $id_opt .'_2'])) ? (int) $array['sel'. $id_opt .'_2'] : 0;
			$_SESSION['search']['sel'. $id_opt .'_1'] = $sel1;
			$_SESSION['search']['sel'. $id_opt .'_2'] = $sel2;
			
			if($id_opt != 0)
			{
				if($sel1 != 0 && $sel2 != 0)
				$options .=" AND (SELECT val_for FROM ". PREFIX ."annonces_valeurs WHERE id_opt = $id_opt AND id_ann = s.id_ann) BETWEEN $sel1 AND $sel2";
				
				elseif($sel1 == 0 && $sel2 != 0)
				$options .=" AND (SELECT val_for FROM ". PREFIX ."annonces_valeurs WHERE id_opt = $id_opt AND id_ann = s.id_ann) <= $sel2";
				
				elseif($sel1 != 0 && $sel2 == 0)
				$options .=" AND (SELECT val_for FROM ". PREFIX ."annonces_valeurs WHERE id_opt = $id_opt AND id_ann = s.id_ann) >= $sel1";
			}
		}
	}
	
	// Recherche avec options de données
	
	$num = 1;
	
	foreach($cache_search_donnees as $v)
	{
		$num = ($num%2) ? 1 : 2;
		
		$id_cat = (int) $v['id_cat'];
		$id_opt = (int) $v['id_opt'];
		
		if($id_cat == $cat)
		{
			if(isset($array['sel'. $id_opt .'_'. $num]))
			{
				$sel = $array['sel'. $id_opt .'_'. $num];
				$sel_sql = $bdd->quote($array['sel'. $id_opt .'_'. $num]);
			}
			else $sel = 0;
			
			$_SESSION['search']['sel'. $id_opt .'_'. $num] = $sel;
		
			if(!empty($sel))
			$options .= " AND (SELECT val_for FROM ". PREFIX ."annonces_valeurs WHERE id_opt = $id_opt AND id_ann = s.id_ann) = $sel_sql";
		
			$num++;
		}
	}
	
	return $options;
}

///////////////////
//Obtenir le nombre d'annonce de la page de recherche
///////////////////

function get_nb_annonces_search($sql, $options, $tri)
{
	global $conn;
	
	$bdd = $conn;
	
	$tri = ($tri == 2) ? " AND s.prix > 0" : "";
	
	$sql = $sql . $options . $tri;
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	return $result;
}
 
///////////////////
//Obtenir les annonces de la page de recherche
///////////////////

function get_annonces_search($sql, $options, $f, $offset, $limit, $tri, $une)
{
	global $conn;
	
	$bdd = $conn;
	
	$offset = (int) $offset;
	$limit = (int) $limit;
	$tri = (int) $tri;
	$une = (int) $une;
	$f = (int) $f;
	
	$condition = ($tri == 2) ? " AND s.prix > 0" : "";
	$condition .= ($f == 1 || $f == 2) ? " AND s.status = $f" : "";
	$une = ($une == 1) ? " AND s.une = 1" : "";
	$order = ($tri == 2) ? " ORDER BY s.prix ASC" : " ORDER BY s.date DESC";
	
	$sql = $sql . $condition . $une . $options . $order  ." LIMIT $offset, $limit";
	$req = $bdd->prepare($sql);
	
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les information de l'annonce affichée
///////////////////

function get_annonce($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.type AS type_ann, s.titre, s.ann, s.prix, s.date, s.id_compte, a.email, a.ville, a.nom, a.tel, a.tel_cache, a.n_photo, a.n_visit, DATE_FORMAT(last_visit, '%d/%m') AS last_v, DATE_FORMAT(last_visit, '%H:%i') AS last_h, sc.nom_societe, sc.siret, o.tete, o.une, o.urg, o.enc, v.video, i.nom AS nom_image, b.id_boutique, b.titre AS titre_bout, com.type 
	FROM ". PREFIX ."annonces_search s 
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_societe sc ON s.id_ann = sc.id_ann
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	LEFT JOIN ". PREFIX ."boutiques b ON s.id_compte = b.id_compte
	LEFT JOIN ". PREFIX ."comptes com ON s.id_compte = com.id_compte
	WHERE s.id_ann = :id_ann AND s.etat IN(2, 3)";
	
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
	
	else return $result;
}

////////////////////////////////
//Mettre à jour les stats de l'annonce
////////////////////////////////

function update_stats($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."annonces SET n_visit = n_visit + 1, last_visit = NOW() WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

////////////////////////////////
//Obtenir les images de l'annonce
////////////////////////////////

function get_images($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT nom FROM ". PREFIX ."annonces_images WHERE id_ann = :id_ann ORDER BY id_ima";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les options de l'annonce affichée
///////////////////

function get_annonce_infos_opts($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT v.id_opt, v.val_for, o.nom_opt, o.uni_opt
	FROM ". PREFIX ."annonces_valeurs v 
	LEFT JOIN ". PREFIX ."options_cat o ON v.id_opt = o.id_opt
	WHERE v.id_ann = :id_ann ORDER BY v.id_opt";
	
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result; 		
}

///////////////////
//Obtenir les champs de l'annonce affichée
///////////////////

function get_annonce_infos_champs($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_champ, valeur FROM ". PREFIX ."annonces_champ WHERE id_ann = :id_ann ORDER BY id_champ";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Vérification de l'email de l'annonce
////////////////////

function verify_email($id, $email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."annonces a
	LEFT JOIN ". PREFIX ."annonces_search s ON a.id_ann = s.id_ann
	WHERE a.id_ann = :id_ann AND a.email = :email AND s.etat = :etat";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('etat', 2, PDO::PARAM_STR);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($result))
	return false;

	else return true;
}

///////////////////
//Optenir le mot de passe de l'annonce
////////////////////

function get_password($id, $email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT a.password FROM ". PREFIX ."annonces a
	LEFT JOIN ". PREFIX ."annonces_search s ON a.id_ann = s.id_ann
	WHERE a.id_ann = :id_ann AND a.email = :email AND s.etat = :etat";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('etat', 2, PDO::PARAM_STR);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	return $result['password'];
}

///////////////////
//Vérification du mot de passe de l'annonce
////////////////////

function verify_annonce($id, $pass)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT a.id_ann FROM ". PREFIX ."annonces a
	LEFT JOIN ". PREFIX ."annonces_search s ON a.id_ann = s.id_ann
	WHERE a.id_ann = :id_ann AND a.password = :password AND (s.etat = :etat_v || s.etat = :etat_r)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('password', $pass, PDO::PARAM_STR);
	$req->bindValue('etat_v', 2, PDO::PARAM_INT);
	$req->bindValue('etat_r', 3, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($result))
	return false;

	else return true;		
}

///////////////////
//Modification de l'annonce
////////////////////

function update($array, $id, $etat)
{
	global $conn, $cache_form, $cache_champs;
	
	$bdd = $conn;
	
	$ent = (isset($array['ent'])) ? $array['ent'] : '';
	$sir = (isset($array['sir'])) ? $array['sir'] : '';
	$cod = (isset($array['cod'])) ? $array['cod'] : '';
	$vil = (isset($array['vil'])) ? $array['vil'] : '';
	$tel = (isset($array['tel'])) ? $array['tel'] : '';
	
	$photo = (isset($_SESSION['photo']['count']) && $_SESSION['photo']['count'] > 0) ? 1 : 0;
	$nb_photo = (isset($_SESSION['photo']['count'])) ? (int) $_SESSION['photo']['count'] : 0;
	
	$video = (!empty($array['youtube']) || !empty($array['dailymotion'])) ? 1 : 0;
		
	$tel_cache = (!empty($array['tel_cache'])) ? $array['tel_cache'] : $tel_cache = 'N';
	
	if(isset($array['pri']))
	{
		$pri = str_replace(',' ,'.', $array['pri']);
		$pri = (float) $pri;
	}
	else $pri = 0;

	//Modification de l'annonce
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET code_pos = :code_postal, titre = :titre, ann = :texte, prix = :prix, etat = :etat, photo = :photo, video = :video WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('code_postal', $cod, PDO::PARAM_STR);
	$req->bindValue('titre', $array['tit'], PDO::PARAM_STR);
	$req->bindValue('texte', $array['ann'], PDO::PARAM_STR);
	$req->bindValue('prix', $pri, PDO::PARAM_STR);
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->bindValue('photo', $photo, PDO::PARAM_STR);
	$req->bindValue('video', $video, PDO::PARAM_STR);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	//Modification des infos de l'annonce
	
	$sql = "UPDATE ". PREFIX ."annonces SET ville = :ville, nom = :nom, tel = :tel, tel_cache = :tel_cache, n_photo = :n_photo WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('ville', $vil, PDO::PARAM_STR);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	$req->bindValue('tel_cache', $tel_cache, PDO::PARAM_STR);
	$req->bindValue('n_photo', $nb_photo, PDO::PARAM_INT);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	//Modification des photos
	
	if(isset($_SESSION['photo']['count']) AND $_SESSION['photo']['count'] > 0)
	{
		$sql = "DELETE FROM ". PREFIX ."annonces_images WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "INSERT INTO ". PREFIX ."annonces_images VALUES('', :id_ann, :nom) ON DUPLICATE KEY UPDATE id_ann = VALUES(id_ann)";
		$req = $bdd->prepare($sql);
		
		for($i = 1; $i <= 10; $i++)
		{
			if(isset($_SESSION['photo'][$i])) 
			{
				$name = $_SESSION['photo'][$i];
				
				$req->bindValue('id_ann', $id, PDO::PARAM_INT);
				$req->bindValue('nom', $name, PDO::PARAM_STR);
				$req->execute();
			}
		}
		
		$req->closeCursor();
	}
	
	//Modification de la vidéo
	
	if(!empty($array['youtube']) || !empty($array['dailymotion']))
	{
		if(!empty($array['youtube']))
		$video = $array['youtube'];
		
		else $video = $array['dailymotion'];
		
		$sql = "INSERT INTO ". PREFIX ."annonces_video VALUES(:id_ann, :video) ON DUPLICATE KEY UPDATE video = VALUES(video)";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->bindValue('video', $video, PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	//Modification des informations entreprise
	
	if(!empty($ent))
	{
		$sql = "UPDATE ". PREFIX ."annonces_societe SET nom_societe = :nom_ent, siret = :siret WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('nom_ent', $ent, PDO::PARAM_STR);
		$req->bindValue('siret', $sir, PDO::PARAM_STR);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	//Modification des options de catégories
	
	$sql = "DELETE FROM ". PREFIX ."annonces_valeurs WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	foreach($cache_form as $v)
	{
		if($v['id_cat'] == $_SESSION['cat'])
		{
			$form_name = 'form'. $v['id_for'];
			$valeur = $array[$form_name];
			
			$sql = "INSERT INTO ". PREFIX ."annonces_valeurs VALUES(:id_opt, :id_ann, :valeur)";
			$req = $bdd->prepare($sql);
		
			$req->bindValue('id_opt', $v['id_opt'], PDO::PARAM_INT);
			$req->bindValue('id_ann', $id, PDO::PARAM_INT);
			$req->bindValue('valeur', $valeur, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
		}
	}

	//Modification des champs
	
	$sql = "DELETE FROM ". PREFIX ."annonces_champ WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();

	foreach($cache_champs as $v)
	{
		$id_champ = (int) $v['id_champ'];
		$valeur = $array[$id_champ];
		
		if(!empty($valeur))
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_champ VALUES(:id_ann, :id_champ, :valeur)";
			$req = $bdd->prepare($sql);
		
			$req->bindValue('id_ann', $id, PDO::PARAM_INT);
			$req->bindValue('id_champ', $id_champ, PDO::PARAM_INT);
			$req->bindValue('valeur', $valeur, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
	}
	
	return true;
}

///////////////////
//Supprimer une annonce
////////////////////

function delete_annonce($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', 4, PDO::PARAM_INT);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	if(isset($_SESSION['connect']))
	{
		$membre = get_info_membre($_SESSION['connect'], $_SESSION['email_con']);
		
		$sql = "UPDATE ". PREFIX ."boutiques SET nb_ann = nb_ann - 1 WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $membre[0]['id_compte'], PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}

	return true;
}

///////////////////
//Supprimer les images d'une annonce
////////////////////

function delete_images($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$images = get_images($id);

	if(is_array($images))
	{
		foreach ($images as $image_name)
		{
			if(preg_match('#^https?://#', $image_name['nom']) == false)
			{
				$del = "images/photos/". $image_name['nom'];
				unlink($del);
			
				$del = "images/vignettes/". $image_name['nom'];
				unlink($del);
			}
		}
	}
	
	$sql = "DELETE FROM ". PREFIX ."annonces_images WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Vérifier un doublon d'adresse email
///////////////////////////////////

function doublon_email($email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT email FROM ". PREFIX ."comptes WHERE email = :email";
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();	
	
	if(empty($result))
	return false;
 
	else return true;
}

////////////////////////////////
//Créé le compte membre ou le compte PRO
///////////////////////////////////

function crea_compte($array, $type, $etat)
{
	global $conn;
	
	$bdd = $conn;
	
	$type = (int) $type;
	
	if($type == 2)
	{
		$annee = date('Y');
		$mois = date('m');
		$jour = date('d');
	
		$dossier_rss = 'rss/'. $annee .'/'. $mois .'/'. $jour;
	
		if(!is_dir($dossier_rss))
		{
			mkdir($dossier_rss, 0777, true);
			chmod('rss/'. $annee, 0777);
			chmod('rss/'. $annee .'/'. $mois, 0777);
			chmod('rss/'. $annee .'/'. $mois .'/'. $jour, 0777);
		}
	}
	else $dossier_rss = '';
	
	$dep = (isset($array['dep'])) ? (int) $array['dep'] : '';
	$cat = (isset($array['cat'])) ? (int) $array['cat'] : '';
	$ent = (isset($array['ent'])) ? $array['ent'] : '';
	$sir = (isset($array['sir'])) ? $array['sir'] : '';
	$cod = (isset($array['cod'])) ? $array['cod'] : '';
	$vil = (isset($array['vil'])) ? $array['vil'] : '';
	$tel = (isset($array['tel'])) ? $array['tel'] : '';
	$pas = md5($array['pas']);
	
	$sql = "INSERT INTO ". PREFIX ."comptes VALUES('', :reg, :dep, :cat, :nom_ent, :siret, :civilite, :nom, :prenom, :adresse, :code_postal, :ville, :tel, :email, :password, :dossier_rss, :ip, NOW(), :type, :etat)";
	$req = $bdd->prepare($sql);

	$req->bindValue('reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('dep', $dep, PDO::PARAM_INT);
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	$req->bindValue('nom_ent', $ent, PDO::PARAM_INT);
	$req->bindValue('siret', $sir, PDO::PARAM_INT);
	$req->bindValue('civilite', $array['civ'], PDO::PARAM_INT);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_INT);
	$req->bindValue('prenom', $array['prenom'], PDO::PARAM_INT);
	$req->bindValue('adresse', $array['add'], PDO::PARAM_INT);
	$req->bindValue('code_postal', $cod , PDO::PARAM_INT);
	$req->bindValue('ville', $vil, PDO::PARAM_INT);
	$req->bindValue('tel', $tel, PDO::PARAM_INT);
	$req->bindValue('email', $array['ema'], PDO::PARAM_INT);
	$req->bindValue('password', $pas, PDO::PARAM_INT);
	$req->bindValue('dossier_rss', $dossier_rss, PDO::PARAM_INT);
	$req->bindValue('ip', $array['ip'], PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->execute();
	
	if($type == 2)
	{
		$id_compte = $bdd->lastInsertId();
		$req->closeCursor();
		
		// Url rewriting
				
		$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
		$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
		
		$url_ann =  htmlspecialchars($ent);
		$url_ann = str_replace($accent, $sans_accent, $url_ann);
		
		$url = array();
	 
		for ($i = 0; $i < strlen($url_ann); $i++) 
		array_push($url, $url_ann[$i]);
		
		$url_aff = '';
		
		foreach($url as $url_ann)
		{
			if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
			$url_ann = str_replace($url_ann, '-', $url_ann);
			
			$url_aff .= $url_ann;
		}			
		
		$flux = fopen($dossier_rss .'/'. $url_aff .'-'. $id_compte .'.xml', 'w');
		
		$texte = '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
</channel>
</rss>';
		
		fputs($flux, $texte); 
		fclose($flux);
	}
}

////////////////////////////////
//Gestion de la connexion avec Facebook
///////////////////////////////////

function facebook_conn($array, $type)
{
	global $conn;
	
	$bdd = $conn;
	
	$type = (int) $type;
	
	if($type == 2)
	{
		$annee = date('Y');
		$mois = date('m');
		$jour = date('d');
	
		$dossier_rss = 'rss/'. $annee .'/'. $mois .'/'. $jour;
	
		if(!is_dir($dossier_rss))
		{
			mkdir($dossier_rss, 0777, true);
			chmod('rss/'. $annee, 0777);
			chmod('rss/'. $annee .'/'. $mois, 0777);
			chmod('rss/'. $annee .'/'. $mois .'/'. $jour, 0777);
		}
	}
	else $dossier_rss = '';
	
	$email = $array['email'];
	
	$sql = "SELECT adresse, email, type FROM ". PREFIX ."comptes WHERE email = :email";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $email, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	$req->closeCursor();
	
	if(!empty($result['email']))
	{
		if(!empty($result['adresse']))
		$r['url'] = 1;
		
		else $r['url'] = 2;
		
		$r['type'] = $result['type'];
	}
	else
	{
		$r['url'] = 2;
		$r['type'] = 0;
		
		$pas = generate_password();
		$pas = md5($pas);
		$ip = $_SERVER['REMOTE_ADDR'];
	
		$sql = "INSERT INTO ". PREFIX ."comptes VALUES('', '', '', '', '', '', :civilite, :nom, :prenom, '', '', '', '', :email, :password, :dossier_rss, :ip, NOW(), :type, :etat)";
		$req = $bdd->prepare($sql);

		$req->bindValue('civilite', 'M', PDO::PARAM_STR);
		$req->bindValue('nom', $array['first_name'], PDO::PARAM_STR);
		$req->bindValue('prenom', $array['last_name'], PDO::PARAM_STR);
		$req->bindValue('email', $email, PDO::PARAM_STR);
		$req->bindValue('password', $pas, PDO::PARAM_STR);
		$req->bindValue('dossier_rss', $dossier_rss, PDO::PARAM_STR);
		$req->bindValue('ip', $ip, PDO::PARAM_STR);
		$req->bindValue('type', $type, PDO::PARAM_INT);
		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->execute();
	
		if($type == 2)
		{
			$id_compte = $bdd->lastInsertId();
			$req->closeCursor();
			
			// Url rewriting
					
			$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
			$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
			
			$url_ann =  htmlspecialchars($array['first_name']);
			$url_ann = str_replace($accent, $sans_accent, $url_ann);
			
			$url = array();
		 
			for ($i = 0; $i < strlen($url_ann); $i++) 
			array_push($url, $url_ann[$i]);
			
			$url_aff = '';
			
			foreach($url as $url_ann)
			{
				if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
				$url_ann = str_replace($url_ann, '-', $url_ann);
				
				$url_aff .= $url_ann;
			}			
			
			$flux = fopen($dossier_rss .'/'. $url_aff .'-'. $id_compte .'.xml', 'w');
			
			$texte = '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
</channel>
</rss>';
		
			fputs($flux, $texte); 
			fclose($flux);
		}
	}
	
	return $r;
}

///////////////////
//Confirmation du compte
///////////////////

function confirm_acc($email, $id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_compte FROM ". PREFIX ."comptes WHERE email = :email AND etat = :etat AND type = :type";
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('etat', 0, PDO::PARAM_INT);
	$req->bindValue('type', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	if(!empty($result))
	{
		$sql = "UPDATE ". PREFIX ."comptes SET etat = :etat WHERE email = :email AND type = :type";
		$req = $bdd->prepare($sql);

		$req->bindValue('etat', 1, PDO::PARAM_INT);
		$req->bindValue('email', $email, PDO::PARAM_STR);
		$req->bindValue('type', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		return true;
	}
	else return false;	 
}

////////////////////////////////	
//Comptez le nombre d'annonce pour l'envoi du mail de notification
////////////////////////////////

function count_acc_mail()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) AS nb_acc FROM ". PREFIX ."comptes WHERE etat = :etat";				  
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', 1, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	return $result['nb_acc'];
}

///////////////////
//Vérifier le compte pour la connexion
///////////////////

function verify_compte($email, $pass, $type)
{
	global $conn;
	
	$bdd = $conn;
	
	$pass = md5($pass);
	
	$sql = "SELECT COUNT(*) AS nb FROM ". PREFIX ."comptes WHERE etat = :etat AND type = :type AND email = :email AND password = :password";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('password', $pass, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if($reponse['nb'] > 0)
	return true;
	
	else return false;
}

///////////////////
//Vérifier le compte pour l'envoi d'un mot de passe
///////////////////

function verify_compte_pass($email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT COUNT(*) AS nb FROM ". PREFIX ."comptes WHERE etat = :etat AND email = :email";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if($reponse['nb'] > 0)
	return true;
	
	else return false;
}

///////////////////
//Modifier le mot de passe
///////////////////

function modify_compte_pass($email, $password)
{
	global $conn;
	
	$bdd = $conn;
	
	$pass = md5($password);
	
	$sql = "UPDATE ". PREFIX ."comptes SET password = :password WHERE etat = :etat AND email = :email";	 
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('password', $pass, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();

	return true;
}

////////////////////////////////
//Obtenir les informations du membre connecté
///////////////////////////////////

function get_info_membre($type, $email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT c.id_compte, c.id_reg, c.id_dep, c.id_cat, c.nom_ent, c.siret, c.civilite, c.nom, c.prenom, c.adresse, c.code_pos, c.ville, c.tel, c.email, c.rss, p.id_compte AS pack, p.jour as nb_jour, p.annonce as nb_annonce, p.limit_1, p.limit_2, p.time, pv.id_compte as pack_vitrine, pv.jour as jour_pack_vitrine, pv.limit_1 as limit_pack_vitrine, pv.time as time_pack_vitrine, f.id_compte as facture 
	FROM ". PREFIX ."comptes c 
	LEFT JOIN ". PREFIX ."comptes_packs p ON c.id_compte = p.id_compte
	LEFT JOIN ". PREFIX ."boutiques_packs pv ON c.id_compte = pv.id_compte
	LEFT JOIN ". PREFIX ."factures f ON c.id_compte = f.id_compte
	WHERE etat = :etat AND email = :email AND type = :type";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->execute();	
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
 
	else return $result;
}

///////////////////
//Obtenir le nombre d'annonce de la page de recherche du tableau de bord
///////////////////

function get_nb_annonces_bord($sql, $id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$id_compte = (int) $id_compte;
	
	$sql = $sql ." AND (s.id_compte = $id_compte || a.email = :email)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $_SESSION['email_con'], PDO::PARAM_INT);
	
	$req->execute();
	
	$nb_search = result_to_array($req);
	
	$sql = "SELECT COUNT(*) AS global FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON a.id_ann = s.id_ann
	WHERE etat = 2 AND (s.id_compte = $id_compte || a.email = :email)";				
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $_SESSION['email_con'], PDO::PARAM_INT);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$result = array('total' => $nb_search, 'global' => $reponse['global']);
	return $result;
}

///////////////////
//Obtenir les annonces de la page de recherche du tableau de bord
///////////////////

function get_search_annonces_bord($sql, $offset, $limit, $id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$offset = (int) $offset;
	$limit = (int) $limit;
	$id_compte = (int) $id_compte;
	
	$sql = $sql ." AND (s.id_compte = $id_compte || a.email = :email) ORDER BY s.date DESC LIMIT $offset, $limit"; 
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $_SESSION['email_con'], PDO::PARAM_INT);
	
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

////////////////////////////////
//Obtenir les factures du membre connecté
///////////////////////////////////

function get_factures($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_compte, url, numero, prix, prix_tva FROM ". PREFIX ."factures WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
 
	else return $result;
}

///////////////////
//Modifier les infos du compte
///////////////////

function modify_infos_compte($array, $id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$dep = (isset($array['dep'])) ? $array['dep'] : $dep = 0;
	$cat = (isset($array['cat'])) ? $array['cat'] : $cat = 0;
	$cod = (isset($array['cod'])) ? $array['cod'] : '';
	$vil = (isset($array['vil'])) ? $array['vil'] : '';
	$tel = (isset($array['tel'])) ? $array['tel'] : '';
	
	$nom_ent = (isset($array['nom_ent'])) ? $array['nom_ent'] : '';
	$siret = (isset($array['siret'])) ? $array['siret'] : '';
	
	$sql_nom_ent = (isset($array['nom_ent'])) ? ' nom_ent = :nom_ent,' : '';
	$sql_siret = (isset($array['siret'])) ? ' siret = :siret,' : '';
	
	if(!empty($array['new_pas']))
	{
		$pas = md5($array['new_pas']);
		$condition = "password = :password,";
	}
	else $condition = "";
	
	$sql = "UPDATE ". PREFIX ."comptes SET id_reg = :id_reg, id_dep = :id_dep, id_cat = :id_cat, ". $sql_nom_ent . $sql_siret ." civilite = :civilite, nom = :nom, prenom = :prenom, adresse = :adresse, code_pos = :code_postal, ville = :ville, tel = :tel, ". $condition ." ip = :ip WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('id_dep', $dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $cat, PDO::PARAM_INT);
	
	if(!empty($sql_nom_ent))
	$req->bindValue('nom_ent', $nom_ent, PDO::PARAM_INT);
	
	if(!empty($sql_siret))
	$req->bindValue('siret', $siret, PDO::PARAM_INT);
	
	$req->bindValue('civilite', $array['civ'], PDO::PARAM_STR);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('prenom', $array['prenom'], PDO::PARAM_STR);
	$req->bindValue('adresse', $array['add'], PDO::PARAM_STR);
	$req->bindValue('code_postal', $cod, PDO::PARAM_STR);
	$req->bindValue('ville', $vil, PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	
	if(!empty($array['new_pas']))
	$req->bindValue('password', $pas, PDO::PARAM_STR);
	
	$req->bindValue('ip', $array['ip'], PDO::PARAM_STR);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."boutiques SET id_reg = :id_reg, id_dep = :id_dep, id_cat = :id_cat WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('id_dep', $dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $cat, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

///////////////////
//Création ou modification de la boutique
///////////////////

function crea_fiche_boutique($array, $id_vitrine, $id_compte, $logo)
{
	global $conn;
	
	$bdd = $conn;
	
	$id_vitrine = (!empty($id_vitrine)) ? (int) $id_vitrine : '';
	$web = (!empty($array['web'])) ? $array['web'] : $web = '';
	
	$date = time();
	
	$sql = "INSERT INTO ". PREFIX ."boutiques VALUES(:id_vitrine,
	(SELECT id_reg FROM ". PREFIX ."comptes WHERE id_compte = :id_compte), 
	(SELECT id_dep FROM ". PREFIX ."comptes WHERE id_compte = :id_compte), 
	(SELECT id_cat FROM ". PREFIX ."comptes WHERE id_compte = :id_compte), 
	(SELECT nom_ent FROM ". PREFIX ."comptes WHERE id_compte = :id_compte),
	:titre, :description, :horaires, :site_web, :logo, :id_compte, :date, :une,
	IF((SELECT id_compte FROM ". PREFIX ."boutiques_packs WHERE id_compte = :id_compte) > 0, 1, 0),
	(SELECT COUNT(*) FROM ". PREFIX ."annonces_search WHERE etat = 2 AND id_compte = :id_compte))
	ON DUPLICATE KEY UPDATE titre = VALUES(titre), description = VALUES(description), horaires = VALUES(horaires), site_web = VALUES(site_web)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_vitrine', $id_vitrine, PDO::PARAM_INT);
	$req->bindValue('titre', $array['tit'], PDO::PARAM_STR);
	$req->bindValue('description', $array['des'], PDO::PARAM_STR);
	$req->bindValue('horaires', $array['hor'], PDO::PARAM_STR);
	$req->bindValue('site_web', $web, PDO::PARAM_STR);
	$req->bindValue('logo', $logo, PDO::PARAM_STR);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->bindValue('date', $date, PDO::PARAM_STR);
	$req->bindValue('une', 0, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Obtenir les informations de la fiche
///////////////////////////////////

function get_info_fiche($id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_boutique, titre, description, horaires, site_web, nom_logo, id_compte FROM ". PREFIX ."boutiques WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
 
	else return $result;
}

///////////////////
//Obtenir le résulat de recherche des vitrines
///////////////////

function make_sql_vitrine($array, $array_keywords)
{
	global $conn, $language;
	
	$bdd = $conn;
	
	$reg = (!empty($array['reg'])) ?(int) $array['reg'] : 0;
	$dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$cat = (!empty($array['cat'])) ? htmlspecialchars($array['cat']) : 0;
	$cat_sql = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	
	$condition = '';
	
	//Régions, départements et catégorties
	
	$condition .= ($reg != 0) ? " b.id_reg = $reg" : " b.id_reg > 0";
	$condition .= ($dep != 0) ? " AND b.id_dep = $dep" : "";
	
	if(!empty($cat) && !is_numeric($cat))
	{
		$select_id_cat = "SELECT id_cat FROM ". PREFIX ."categories WHERE par_cat = (SELECT MIN(id_cat) FROM ". PREFIX ."categories WHERE par_cat = :par_cat AND nom_cat = :nom_cat)";
		$req = $bdd->prepare($select_id_cat);
		
		$req->bindValue('par_cat', 0, PDO::PARAM_INT);
		$req->bindValue('nom_cat', $cat, PDO::PARAM_STR);
		$req->execute();
		
		$result = $req->fetchAll();
		
		$req->closeCursor();
		
		$i = 0;
		
		if(!empty($result))
		{
			$condition .= " AND (";
			
			foreach($result as $id_cat)
			{
				if($i == 0)
				$condition .= "b.id_cat = ". (int) $id_cat[0] ."";
				
				else $condition .= " OR b.id_cat = ". (int) $id_cat[0] ."";
				
				$i++;
			}
			
			$condition .= ")";
		}
		else $condition .= " AND b.id_cat = $cat_sql";
	}
	elseif($cat != 0) 
	$condition .= " AND b.id_cat = $cat_sql";
	
	//Préparation des mots clés pour la requête
	
	if(file_exists('includes/engine/search_v_optimized.php'))
	{
		require_once('includes/engine/search_v_optimized.php');
	}
	else
	{
		if (is_array($array_keywords))
		{
			$num = count($array_keywords);
			
			$condition .= " AND CONCAT_WS(' ', b.nom_ent, b.titre, b.description) REGEXP '[[:<:]]$array_keywords[0][[:>:]]'";		
			
			if($num != 1)
			{
				for($i = 1; $i < $num; $i++)
				{
					if(empty($array_keywords[$i]))
					$condition .= "";
					 
					else $condition .= " AND CONCAT_WS(' ', b.nom_ent, b.titre, b.description) REGEXP '[[:<:]]$array_keywords[$i][[:>:]]' ";
				}
			}
		}
	}

	//Requête
	
	$sql = "SELECT b.id_boutique, b.id_reg, b.id_dep, b.id_cat, b.nom_ent, b.titre, b.nom_logo, b.id_compte, b.nb_ann, o.enc, o.une, c.code_pos, c.ville, p.id_compte as abonnement
	FROM ". PREFIX ."boutiques b
	LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
	LEFT JOIN ". PREFIX ."comptes c ON b.id_compte = c.id_compte 
	LEFT JOIN ". PREFIX ."boutiques_packs p ON b.id_compte = p.id_compte
	WHERE ". $condition;
	
	$sql_count = "SELECT b.id_boutique, b.une FROM ". PREFIX ."boutiques b
	WHERE ". $condition;

	$result = array('sql' => $sql, 'sql_count' => $sql_count);
	return $result;
}

///////////////////
//Obtenir le nombre de vitrine de la page de recherche
///////////////////

function get_nb_vitrine($sql)
{
	global $conn, $cache_packs_vitrine;
	
	$bdd = $conn;
	
	$aff = 0;

	foreach($cache_packs_vitrine as $v)
	{
		if(!empty($v['id_pack']))
		$aff = 1;
	}
	
	$abonnement = ($aff == 1) ? " AND pack = 1" : "";
	
	$sql = $sql . $abonnement;
	$req = $bdd->prepare($sql);
	
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les vitrines
///////////////////

function get_vitrines_search($sql, $offset, $limit, $une)
{
	global $conn, $cache_packs_vitrine;
	
	$bdd = $conn;
	
	$offset = (int) $offset;
	$limit = (int) $limit;
	$une = (int) $une;
	
	$aff = 0;

	foreach($cache_packs_vitrine as $v)
	{
		if(!empty($v['id_pack']))
		$aff = 1;
	}
	
	$une = ($une == 1) ? " AND b.une = 1" : "";
	$abonnement = ($aff == 1) ? " AND b.pack = 1" : "";
	
	$sql = $sql . $une . $abonnement ." ORDER BY b.date DESC LIMIT $offset, $limit";
	$req = $bdd->prepare($sql);

	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Obtenir les information de la vitrine affichée
///////////////////

function get_vitrine_infos($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT b.titre, b.description, b.horaires, b.site_web, b.nom_logo, b.id_compte, o.tete, o.enc, o.une, c.id_reg, c.id_dep, c.nom_ent, c.siret, c.adresse, c.code_pos, c.ville, c.tel, c.rss
	FROM ". PREFIX ."boutiques b
	LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
	LEFT JOIN ". PREFIX ."comptes c ON b.id_compte = c.id_compte
	WHERE b.id_boutique = :id_boutique GROUP BY b.id_boutique";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
	
	else return $result;
}

///////////////////
//Obtenir le nombre d'annonce de la boutique
///////////////////

function get_nb_annonces_page_vitrine($id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT COUNT(id_ann) AS nb_ann FROM ". PREFIX ."annonces_search WHERE etat = :etat AND id_compte = :id_compte";				
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->execute();

	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	return $reponse['nb_ann'];
}

///////////////////
//Obtenir les annonces de la boutique
///////////////////

function get_search_annonces_vitrine($offset, $limit, $id_compte)
{
	global $conn;
	
	$bdd = $conn;
	
	$offset = (int) $offset;
	$limit = (int) $limit;
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, s.code_pos, s.status, s.titre, s.ann, s.type, s.prix, s.date, a.ville, a.n_photo, o.urg, o.enc, o.une, i.nom AS nom_image, v.video
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_images i ON s.id_ann = i.id_ann AND i.id_ima = (SELECT MIN(id_ima) FROM ". PREFIX ."annonces_images WHERE id_ann = a.id_ann)
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.etat = :etat AND s.id_compte = :id_compte GROUP BY s.id_ann ORDER BY s.date DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

///////////////////
//Retirer les annonces expirées
////////////////////

function delete_expired_annonces()
{
	global $conn, $param_gen;
	
	$bdd = $conn;
	
	$now = time();
	$limit = (int) ($param_gen['ann_val'] * 24 * 3600);
		
	$sql = "SELECT s.id_ann, s.titre, a.email
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE ($now - s.date) >= :limit AND s.etat = :etat";
	$req_delete = $bdd->prepare($sql);

	$req_delete->bindValue('limit', $limit, PDO::PARAM_INT);
	$req_delete->bindValue('etat', 2, PDO::PARAM_INT);
	$req_delete->execute();
	
	while($row = $req_delete->fetch())
	{
		$id = (int) $row['id_ann'];
		$titre = stripslashes($row['titre']);		
		$email = stripslashes($row['email']);
		     	
		$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('etat', 4, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_expired($email, $titre);
	}
	
	$req_delete->closeCursor();
	
	return true;	
}


///////////////////
//Supprimer les annonces non validées dans les temps
////////////////////

function delete_unvalidate_annonces()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	$limit = (int) (2 * 24 * 3600);
	
	$sql = "SELECT s.id_ann, s.titre, a.email
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE ($now - s.date) >= :limit AND s.etat = :etat";
	$req_delete = $bdd->prepare($sql);

	$req_delete->bindValue('limit', $limit, PDO::PARAM_INT);
	$req_delete->bindValue('etat', 0, PDO::PARAM_INT);
	$req_delete->execute();

	while($row = $req_delete->fetch())	
	{
		$id = (int) $row['id_ann'];
		$titre = stripslashes($row['titre']);		
		$email = stripslashes($row['email']);
			
		$images = get_images($id);

		if(is_array($images))
		{
			foreach ($images as $image_name)
			{
				if(preg_match('#^https?://#', $image_name['nom']) == false)
				{
					$del = "images/photos/". $image_name['nom'];
					unlink($del);
				
					$del = "images/vignettes/". $image_name['nom'];
					unlink($del);
				}
			}
		}
	
		$sql = "DELETE FROM ". PREFIX ."annonces_champ WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_images WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_options WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_search WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_societe WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_valeurs WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."annonces_video WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
     	
		$sql = "DELETE FROM ". PREFIX ."annonces WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_unvalidate($email, $titre);
	}
	
	$req_delete->closeCursor();
	
	return true;	
}

////////////////////////////////
//Enregistrement de l'achat
////////////////////////////////

function register_achat($type_achat, $id_ann, $id_compte, $id_boutique, $jour, $annonce, $type_opt, $time, $prix, $prix_tva)
{
	global $conn;
	
	$bdd = $conn;
	
	//Achat pour une annonce
	
	if(!empty($id_ann))
	{
		$sql = "INSERT INTO ". PREFIX ."achat VALUES ('', :type_achat, :id_ann, '0', '0', :jour, '0', :type_opt, :time, :prix, :prix_tva)";
		$req = $bdd->prepare($sql);

		$req->bindValue('type_achat', $type_achat, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
		$req->bindValue('jour', $jour, PDO::PARAM_INT);
		$req->bindValue('type_opt', $type_opt, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->bindValue('prix', $prix, PDO::PARAM_STR);
		$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
		$req->execute();
	}
	
	//Achat pour un compte
	
	if(!empty($id_compte))
	{
		$sql = "INSERT INTO ". PREFIX ."achat VALUES('', :type_achat, '0', :id_compte, '0', :jour, :annonce, '0', :time, :prix, :prix_tva)";
		$req = $bdd->prepare($sql);

		$req->bindValue('type_achat', $type_achat, PDO::PARAM_INT);
		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->bindValue('jour', $jour, PDO::PARAM_INT);
		$req->bindValue('annonce', $annonce, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->bindValue('prix', $prix, PDO::PARAM_STR);
		$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
		$req->execute();
	}
	
	//Achat pour une vitrine
	
	if(!empty($id_boutique))
	{
		$sql = "INSERT INTO ". PREFIX ."achat VALUES('', :type_achat, '0', '0', :id_boutique, :jour, '0', :type_opt, :time, :prix, :prix_tva)";
		$req = $bdd->prepare($sql);

		$req->bindValue('type_achat', $type_achat, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
		$req->bindValue('jour', $jour, PDO::PARAM_INT);
		$req->bindValue('type_opt', $type_opt, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->bindValue('prix', $prix, PDO::PARAM_STR);
		$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
		$req->execute();
	}
	
	$id_achat = $bdd->lastInsertId();
	
	$req->closeCursor();
	
	return $id_achat;
}

////////////////////////////////
//Traitement du paiement
////////////////////////////////

function payment($id_achat)
{
	global $conn;
	
	$bdd = $conn;
	
	$time = time();
	
	$sql = "SELECT type_achat, id_ann, id_compte, id_boutique, type_opt, prix, prix_tva FROM ". PREFIX ."achat WHERE id_achat = :id_achat";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	$prix = (float) $result['prix'];
	$prix_tva = (float) $result['prix_tva'];
	
	//Paiement d'une annonce
	
	if($result['type_achat'] == 1)
	{
		$id_ann = (int) $result['id_ann'];
		
		$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat, date = :time WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		crea_facture($id_ann, $result['type_achat'], $prix, $prix_tva);
	}
	
	//Paiement d'une option visuelle pour annonce
	
	if($result['type_achat'] == 2)
	{
		$id_ann = (int) $result['id_ann'];
		$type_opt = (int) $result['type_opt'];
		
		if($type_opt == 1)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, tete, jour_tete, time_tete) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE tete = 1, jour_tete = jour_tete + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_tete = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_ann, $result['type_achat'], $prix, $prix_tva);
		}
		if($type_opt == 2)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, une, jour_une, time_une) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE une = 1, jour_une = jour_une + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_une = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."annonces_search SET une = :une WHERE id_ann = :id_ann";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('une', 1, PDO::PARAM_INT);
			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_ann, $result['type_achat'], $prix, $prix_tva);
		}
		if($type_opt == 3)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, urg, jour_urg, time_urg) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE urg = 1, jour_urg = jour_urg + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_urg = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."annonces_search SET urg = :urg WHERE id_ann = :id_ann";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('urg', 1, PDO::PARAM_INT);
			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_ann, $result['type_achat'], $prix, $prix_tva);
		}
		if($type_opt == 4)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, enc, jour_enc, time_enc) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE enc = 1, jour_enc = jour_enc + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_enc = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_ann, $result['type_achat'], $prix, $prix_tva);
		}
	}
	
	//Paiement d'une option visuelle pour vitrine
	
	if($result['type_achat'] == 5)
	{
		$id_boutique = (int) $result['id_boutique'];
		$type_opt = (int) $result['type_opt'];
		
		if($type_opt == 5)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, tete, jour_tete, time_tete) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE tete = 1, jour_tete = jour_tete + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_boutique, $result['type_achat'], $prix, $prix_tva);
		}
		if($type_opt == 6)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, une, jour_une, time_une) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE une = 1, jour_une = jour_une + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."boutiques SET une = :une WHERE id_boutique = :id_boutique";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('une', 1, PDO::PARAM_INT);
			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_boutique, $result['type_achat'], $prix, $prix_tva);
		}
		if($type_opt == 7)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, enc, jour_enc, time_enc) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE enc = 1, jour_enc = jour_enc + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			crea_facture($id_boutique, $result['type_achat'], $prix, $prix_tva);
		}
	}
	
	//Paiement d'un pack compte
	
	if($result['type_achat'] == 3)
	{
		$id_compte = (int) $result['id_compte'];
		
		$sql = "INSERT INTO ". PREFIX ."comptes_packs (id_compte, jour, annonce, limit_1, limit_2, time) 
		VALUES(:id_compte, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
		ON DUPLICATE KEY UPDATE annonce = annonce + (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_1 = (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_2 = (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		crea_facture($id_compte, $result['type_achat'], $prix, $prix_tva);
	}
	
	//Paiement d'un pack vitrine
	
	if($result['type_achat'] == 4)
	{
		$id_compte = (int) $result['id_compte'];
		
		$sql = "INSERT INTO ". PREFIX ."boutiques_packs (id_compte, jour, limit_1, time) VALUES(:id_compte, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
		ON DUPLICATE KEY UPDATE jour = jour + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_1 = (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques SET pack = :pack WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('pack', 1, PDO::PARAM_INT);
		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		crea_facture($id_compte, $result['type_achat'], $prix, $prix_tva);
	}
	
	$sql = "DELETE FROM ". PREFIX ."achat WHERE id_achat = :id_achat";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

////////////////////////////////
//Création de la facture
////////////////////////////////

function crea_facture($id, $type, $prix, $prix_tva)
{
	global $conn, $language, $param_gen;
	
	$bdd = $conn;
	
	//Url et fichier de la facture
	
	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	$url = 'factures/'. $annee .'/'. $mois .'/'. $jour;
	
	if($param_gen['auto_fact'] == 1)
	{
		if(!is_dir('../../../'. $url))
		{
			mkdir('../../../'. $url, 0777, true);
			chmod('../../../factures/'. $annee, 0777);
			chmod('../../../factures/'. $annee .'/'. $mois, 0777);
			chmod('../../../factures/'. $annee .'/'. $mois .'/'. $jour, 0705);
		}
	}
	
	//Création de la facture
	
	if($type == 1 || $type == 2)
	{
		$sql = "SELECT id_compte, titre FROM ". PREFIX ."annonces_search WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		
		$reponse = $req->fetch();
		
		$req->closeCursor();
		
		$id_compte = $reponse['id_compte'];
		$titre = $reponse['titre'];  
		$titre = stripslashes($titre);
		
		if($id_compte > 0)
		{
			if($param_gen['auto_fact'] == 1)
			{
				$sql = "INSERT INTO ". PREFIX ."factures VALUES(:id_compte, 0, :url, (SELECT * FROM (SELECT IFNULL(MAX(numero), 0) FROM ". PREFIX ."factures) departements) + 1, :prix, :prix_tva)";
				$req = $bdd->prepare($sql);

				$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
				$req->bindValue('url', $url, PDO::PARAM_STR);
				$req->bindValue('prix', $prix, PDO::PARAM_STR);
				$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
				$req->execute();
				$req->closeCursor();
			}
			
			$sql = "SELECT nom_ent, nom, prenom, adresse, code_pos, ville, email FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
			$req->execute();
			
			$result = $req->fetch();
		
			$req->closeCursor();
			
			$nom_ent = (!empty($result['nom_ent'])) ? addslashes($result['nom_ent']) : addslashes($result['nom']) .' '. addslashes($result['prenom']);
			$add = addslashes($result['adresse']);
			$code_pos = addslashes($result['code_pos']);
			$ville = addslashes($result['ville']);
			$email = addslashes($result['email']);
			
			$id_ann = (int) $id;
			$id = (int) $id_compte;
		}
		else
		{
			if($param_gen['auto_fact'] == 1)
			{
				$sql = "INSERT INTO ". PREFIX ."factures VALUES('0', :id, :url, (SELECT * FROM (SELECT IFNULL(MAX(numero), 0) FROM ". PREFIX ."factures) departements) + 1, :prix, :prix_tva)";
				$req = $bdd->prepare($sql);

				$req->bindValue('id', $id, PDO::PARAM_INT);
				$req->bindValue('url', $url, PDO::PARAM_STR);
				$req->bindValue('prix', $prix, PDO::PARAM_STR);
				$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
				$req->execute();
				$req->closeCursor();
			}
			
			$sql = "SELECT s.code_pos, a.ville, a.nom, a.email, sc.nom_societe 
			FROM ". PREFIX ."annonces_search s
			LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
			LEFT JOIN ". PREFIX ."annonces_societe sc ON s.id_ann = sc.id_ann
			WHERE s.id_ann = :id_ann";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id, PDO::PARAM_INT);
			$req->execute();
			
			$result = $req->fetch();
			
			$req->closeCursor();
			
			$nom_ent = (!empty($result['nom_societe'])) ? addslashes($result['nom_societe']) : addslashes($result['nom']);
			$add = addslashes($language['fact_add']);
			$code_pos = $result['code_pos'];
			$ville = addslashes($result['ville']);
			$email = addslashes($result['email']);
			
			$id_ann = (int) $id;
		}
	}
	elseif($type == 5)
	{	
		$sql = "SELECT id_compte FROM ". PREFIX ."boutiques WHERE id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		
		$result = $req->fetch();
		
		$req->closeCursor();
		
		$id_compte = $result['id_compte'];
		
		if($param_gen['auto_fact'] == 1)
		{
			$sql = "INSERT INTO ". PREFIX ."factures VALUES(:id_compte, 0, :url, (SELECT * FROM (SELECT IFNULL(MAX(numero), 0) FROM ". PREFIX ."factures) departements) + 1, :prix, :prix_tva)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
			$req->bindValue('url', $url, PDO::PARAM_STR);
			$req->bindValue('prix', $prix, PDO::PARAM_STR);
			$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
		}
		
		$sql = "SELECT nom_ent, nom, prenom, adresse, code_pos, ville, email FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->execute();
		
		$result = $req->fetch();
		
		$req->closeCursor();
		
		$nom_ent = (!empty($result['nom_ent'])) ? addslashes($result['nom_ent']) : addslashes($result['nom']) .' '. addslashes($result['prenom']);
		$add = addslashes($result['adresse']);
		$code_pos = addslashes($result['code_pos']);
		$ville = addslashes($result['ville']);
		$email = addslashes($result['email']);
		
		$id = (int) $id_compte;
	}
	else
	{
		if($param_gen['auto_fact'] == 1)
		{
			$sql = "INSERT INTO ". PREFIX ."factures VALUES(:id, 0, :url, (SELECT * FROM (SELECT IFNULL(MAX(numero), 0) FROM ". PREFIX ."factures) departements) + 1, :prix, :prix_tva)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id', $id, PDO::PARAM_INT);
			$req->bindValue('url', $url, PDO::PARAM_STR);
			$req->bindValue('prix', $prix, PDO::PARAM_STR);
			$req->bindValue('prix_tva', $prix_tva, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
		}
		
		$sql = "SELECT nom_ent, nom, prenom, adresse, code_pos, ville, email FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id, PDO::PARAM_INT);
		$req->execute();
		
		$result = $req->fetch();
		
		$req->closeCursor();
		
		$nom_ent = (!empty($result['nom_ent'])) ? addslashes($result['nom_ent']) : addslashes($result['nom']) .' '. addslashes($result['prenom']);
		$add = addslashes($result['adresse']);
		$code_pos = addslashes($result['code_pos']);
		$ville = addslashes($result['ville']);
		$email = addslashes($result['email']);
	}
	
	//Recupération du numéro de facture
	
	if($param_gen['auto_fact'] == 1)
	{
		$sql = "SELECT MAX(numero) as numero FROM ". PREFIX ."factures";
		$req = $bdd->prepare($sql);
		
		$req->execute();

		$reponse = $req->fetch();
		
		$req->closeCursor();
	
		$numero = $reponse['numero'];
	}
	else $numero = 0;
	
	//Envoi du mail de l'achat
	
	if($type == 1)
	{
		$nom_produit = $language['fact_nom1'];
		send_payment_1($email, $id, $id_ann, $url, $numero, $titre);
	}
		
	if($type == 2)
	{
		$nom_produit = $language['fact_nom2'];
		send_payment_2($email, $id, $id_ann, $url, $numero, $titre);
	}
	
	if($type == 3)
	{
		$nom_produit = $language['fact_nom4'];
		send_payment_3($email, $id, $url, $numero);
	}
	
	if($type == 4)
	{
		$nom_produit = $language['fact_nom5'];
		send_payment_4($email, $id, $url, $numero);
	}
	
	if($type == 5)
	{
		$nom_produit = $language['fact_nom3'];
		send_payment_5($email, $id, $url, $numero);
	}
	
	//Création du fichier pdf de la facture
	
	if($param_gen['auto_fact'] == 1)
	{
		$date = date("d/m/Y");
		$prix_total = $prix + $prix_tva;
	
		$prix = number_format($prix, 2, ',', ' ');
		$prix_tva = number_format($prix_tva, 2, ',', ' ');
		$prix_total = number_format($prix_total, 2, ',', ' ');
	
		$nom_tva = (!empty($param_gen['tva_ent']) && !empty($param_gen['tva_taux'])) ? $param_gen['tva_ent'] : $language['fact_no_tva'];
	
		$devise = ($param_gen['devise'] == '€') ? $devise = 'euro(s)' : $param_gen['devise'];
		
		$vil_ent = $param_gen['vil_ent'];
		$vil_ent = str_replace('&#039;', '\'', $vil_ent);
		$vil_ent = str_replace('&amp;', '&', $vil_ent);
		$vil_ent = addslashes($vil_ent);
	
		$texte = '<?php
		  
require_once(\'../../../../pdf/fpdf.php\');
$pdf = new FPDF();

$pdf->AddPage();

$pdf->Cell(0, 3, \''. utf8_decode($nom_ent) .'\', 0, 1, \'R\');
$pdf->Cell(0, 3, \''. utf8_decode($add) .'\', 0, 1, \'R\');
$pdf->Cell(0, 3, \''. utf8_decode($code_pos) .' '. utf8_decode($ville) .'\', 0, 1, \'R\');
$pdf->Cell(0, 3, \'\', 0, 1, \'R\');
$pdf->Cell(0, 3, \''. utf8_decode($language['fact_lieu1']) .' '. utf8_decode($vil_ent) .' '. utf8_decode($language['fact_lieu2']) .' : '. $date .'\', 0, 1, \'R\');
$pdf->Ln(10);

$pdf->Cell(0, 3, \''. utf8_decode($language['fact_tva']) .' : '. utf8_decode($nom_tva) .'\', 0, 1);
$pdf->Cell(100, 3, \'\', 0, 0);
$pdf->Cell(90, 3, \''. utf8_decode($language['fact_num']) .''. $numero .'\', 0, 0, \'R\');
$pdf->Ln(10);

$pdf->SetFont(\'Arial\', \'B\', 8);

$pdf->Cell(100, 5,\''. utf8_decode($language['fact_prod']) .'\', 1, 0, \'C\');
$pdf->Cell(45, 5, \''. utf8_decode($language['fact_prix']) .'\', 1, 1, \'C\');

$pdf->SetFont(\'Arial\', \'\', 8);

$pdf->Cell(100, 5, \''. utf8_decode($nom_produit) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language['fact_tva2']) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix_tva) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language['fact_total']) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix_total) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language['fact_net']) .'\', 1, 0);
$pdf->Cell(45, 5, \'0,00 '. $devise .'\', 1, 1, \'R\');

$pdf->Output();';
	
		file_put_contents('../../../'. $url .'/'. $id .'-'. $numero .'.php', $texte);
	}
}

////////////////////////////////
//Traitement du paiement gratuit
////////////////////////////////

function payment_free($id_achat)
{
	global $conn;
	
	$bdd = $conn;
	
	$time = time();
	
	$sql = "SELECT type_achat, id_ann, id_compte, id_boutique, type_opt, prix, prix_tva FROM ". PREFIX ."achat WHERE id_achat = :id_achat";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	$req->execute();
	
	$result = $req->fetch();
	
	$req->closeCursor();
	
	$prix = (float) $result['prix'];
	$prix_tva = (float) $result['prix_tva'];
	
	//Paiement d'une annonce
	
	if($result['type_achat'] == 1)
	{
		$id_ann = (int) $result['id_ann'];
		
		$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat, date = :time WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	//Paiement d'une option visuelle pour annonce
	
	if($result['type_achat'] == 2)
	{
		$id_ann = (int) $result['id_ann'];
		$type_opt = (int) $result['type_opt'];
		
		if($type_opt == 1)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, tete, jour_tete, time_tete) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE tete = 1, jour_tete = jour_tete + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_tete = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
		if($type_opt == 2)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, une, jour_une, time_une) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE une = 1, jour_une = jour_une + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_une = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."annonces_search SET une = :une WHERE id_ann = :id_ann";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('une', 1, PDO::PARAM_INT);
			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
		if($type_opt == 3)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, urg, jour_urg, time_urg) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE urg = 1, jour_urg = jour_urg + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_urg = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."annonces_search SET urg = :urg WHERE id_ann = :id_ann";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('urg', 1, PDO::PARAM_INT);
			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
		if($type_opt == 4)
		{
			$sql = "INSERT INTO ". PREFIX ."annonces_options (id_ann, enc, jour_enc, time_enc) VALUES(:id_ann, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE enc = 1, jour_enc = jour_enc + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), time_enc = :time";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
	}
	
	//Paiement d'une option visuelle pour vitrine
	
	if($result['type_achat'] == 5)
	{
		$id_boutique = (int) $result['id_boutique'];
		$type_opt = (int) $result['type_opt'];
		
		if($type_opt == 5)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, tete, jour_tete, time_tete) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE tete = 1, jour_tete = jour_tete + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
		if($type_opt == 6)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, une, jour_une, time_une) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE une = 1, jour_une = jour_une + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql = "UPDATE ". PREFIX ."boutiques SET une = :une WHERE id_boutique = :id_boutique";
			$req = $bdd->prepare($sql);
			
			$req->bindValue('une', 1, PDO::PARAM_INT);
			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
		if($type_opt == 7)
		{
			$sql = "INSERT INTO ". PREFIX ."boutiques_options (id_boutique, enc, jour_enc, time_enc) VALUES(:id_boutique, 1, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
			ON DUPLICATE KEY UPDATE enc = 1, jour_enc = jour_enc + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
			$req = $bdd->prepare($sql);

			$req->bindValue('id_boutique', $id_boutique, PDO::PARAM_INT);
			$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
			$req->bindValue('time', $time, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
	}
	
	//Paiement d'un pack compte
	
	if($result['type_achat'] == 3)
	{
		$id_compte = (int) $result['id_compte'];
		
		$sql = "INSERT INTO ". PREFIX ."comptes_packs (id_compte, jour, annonce, limit_1, limit_2, time) 
		VALUES(:id_compte, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
		ON DUPLICATE KEY UPDATE annonce = annonce + (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_1 = (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_2 = (SELECT annonce FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	//Paiement d'un pack vitrine
	
	if($result['type_achat'] == 4)
	{
		$id_compte = (int) $result['id_compte'];
		
		$sql = "INSERT INTO ". PREFIX ."boutiques_packs (id_compte, jour, limit_1, time) VALUES(:id_compte, (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), :time)
		ON DUPLICATE KEY UPDATE jour = jour + (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat), limit_1 = (SELECT jour FROM ". PREFIX ."achat WHERE id_achat = :id_achat)";
		$req = $bdd->prepare($sql);

		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
		$req->bindValue('time', $time, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques SET pack = :pack WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('pack', 1, PDO::PARAM_INT);
		$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	$sql = "DELETE FROM ". PREFIX ."achat WHERE id_achat = :id_achat";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

///////////////////
//Supprimer les options visuelles annonces expirée
////////////////////

function delete_opt_visu_ann()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	
	$sql = "SELECT s.id_ann, s.titre, a.email 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	WHERE (o.tete = 1 AND ((o.jour_tete * 24 * 3600) + o.time_tete) <= :now)
	OR (o.urg = 1 AND ((o.jour_urg * 24 * 3600) + o.time_urg) <= :now)
	OR (o.enc = 1 AND ((o.jour_enc * 24 * 3600) + o.time_enc) <= :now)
	OR (o.une = 1 AND ((o.jour_une * 24 * 3600) + o.time_une) <= :now)
	AND s.etat = :etat";
	$req_update = $bdd->prepare($sql);

	$req_update->bindValue('now', $now, PDO::PARAM_INT);
	$req_update->bindValue('etat', 2, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())
	{
		$id = (int) $row['id_ann'];
		$titre = stripslashes($row['titre']);	
		$email = stripslashes($row['email']);
		
		$sql = "UPDATE ". PREFIX ."annonces_options SET tete = 0, jour_tete = 0 WHERE (tete = 1 AND ((jour_tete * 24 * 3600) + time_tete) <= $now) AND id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."annonces_search s
		LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
		SET s.urg = 0 WHERE (o.urg = 1 AND ((o.jour_urg * 24 * 3600) + o.time_urg) <= $now) AND s.id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."annonces_options SET urg = 0, jour_urg = 0 WHERE (urg = 1 AND ((jour_urg * 24 * 3600) + time_urg) <= $now) AND id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."annonces_options SET enc = 0, jour_enc = 0 WHERE (enc = 1 AND ((jour_enc * 24 * 3600) + time_enc) <= $now) AND id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."annonces_search s
		LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
		SET s.une = 0 WHERE (o.une = 1 AND ((o.jour_une * 24 * 3600) + o.time_une) <= $now) AND s.id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."annonces_options SET une = 0, jour_une = 0 WHERE (une = 1 AND ((jour_une * 24 * 3600) + time_une) <= $now) AND id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_expired_opt_visu_ann($id, $email, $titre);
	}
	
	$req_update->closeCursor();
	
	return true;	
}

///////////////////
//Remonter les annonces
////////////////////

function remonter_ann()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	
	$sql = "SELECT s.id_ann 
	FROM ". PREFIX ."annonces_search s 
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	WHERE o.tete = :tete AND s.etat = :etat";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('tete', 1, PDO::PARAM_INT);
	$req_update->bindValue('etat', 2, PDO::PARAM_INT);
	$req_update->execute();
	
	while($row = $req_update->fetch())
	{
		$id = (int) $row['id_ann'];
		
		$sql = "UPDATE ". PREFIX ."annonces_search s
		LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
		SET s.date = :now WHERE o.tete = :tete AND s.id_ann = :id_ann";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('tete', 1, PDO::PARAM_INT);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}	
	
	$req_update->closeCursor();
	
	return true;	
}

///////////////////
//Supprimer les options visuelles vitrine expirées
////////////////////

function delete_opt_visu_vit()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();

	$sql = "SELECT c.email, b.id_boutique FROM ". PREFIX ."boutiques b 
	LEFT JOIN ". PREFIX ."comptes c ON b.id_compte = c.id_compte
	LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
	WHERE (o.tete = 1 AND ((o.jour_tete * 24 * 3600) + o.time_tete) <= :now)
	OR (o.enc = 1 AND ((o.jour_enc * 24 * 3600) + o.time_enc) <= :now)
	OR (o.une = 1 AND ((o.jour_une * 24 * 3600) + o.time_une) <= :now)";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('now', $now, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())	
	{
		$id = (int) $row['id_boutique'];		
		$email = stripslashes($row['email']);
		
		$sql = "UPDATE ". PREFIX ."boutiques_options SET tete = 0, jour_tete = 0 WHERE (tete = 1 AND ((jour_tete * 24 * 3600) + time_tete) <= :now) AND id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques_options SET enc = 0, jour_enc = 0 WHERE (enc = 1 AND ((jour_enc * 24 * 3600) + time_enc) <= :now) AND id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques b
		LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
		SET b.une = 0 WHERE (o.une = 1 AND ((o.jour_une * 24 * 3600) + o.time_une) <= :now) AND b.id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."boutiques_options SET une = 0, jour_une = 0 WHERE (une = 1 AND ((jour_une * 24 * 3600) + time_une) <= :now) AND id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_expired_opt_visu_vit($email);
	}	
	
	$req_update->closeCursor();
	
	return true;	
}

///////////////////
//Remonter les vitrines
////////////////////

function remonter_vit()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	
	$sql = "SELECT b.id_boutique FROM ". PREFIX ."boutiques b 
	LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
	WHERE o.tete = :tete";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('tete', 1, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())
	{
		$id = (int) $row['id_boutique'];
		
		$sql = "UPDATE ". PREFIX ."boutiques b
		LEFT JOIN ". PREFIX ."boutiques_options o ON b.id_boutique = o.id_boutique
		SET b.date = :now WHERE o.tete = :tete AND b.id_boutique = :id_boutique";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('now', $now, PDO::PARAM_INT);
		$req->bindValue('tete', 1, PDO::PARAM_INT);
		$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	$req_update->closeCursor();
}

///////////////////
//Supprimer les packs compte expirés
////////////////////

function delete_pack_acc()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	
	$sql = "SELECT c.id_compte, c.email FROM ". PREFIX ."comptes c 
	LEFT JOIN ". PREFIX ."comptes_packs p ON c.id_compte = p.id_compte
	WHERE (p.limit_1 != 0 AND ((p.jour * 24 * 3600) + p.time) <= :now)
	OR (p.limit_2 != 0 AND p.annonce = 0)";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('now', $now, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())
	{
		$id = (int) $row['id_compte'];		
		$email = stripslashes($row['email']);
		
		$sql = "DELETE FROM ". PREFIX ."comptes_packs WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_expired_pack_acc($email);
	}
	
	$req_update->closeCursor();
	
	return true;
}

///////////////////
//Supprimer les abonnements vitrine expirés
////////////////////

function delete_pack_vit()
{
	global $conn;
	
	$bdd = $conn;
	
	$now = time();
	
	$sql = "SELECT c.id_compte, c.email FROM ". PREFIX ."comptes c 
	LEFT JOIN ". PREFIX ."boutiques_packs p ON c.id_compte = p.id_compte
	WHERE (p.limit_1 != 0 AND ((p.jour * 24 * 3600) + p.time) <= :now)";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('now', $now, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())	
	{
		$id = (int) $row['id_compte'];		
		$email = stripslashes($row['email']);
		
		$sql = "UPDATE ". PREFIX ."boutiques SET pack = 0 WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."boutiques_packs WHERE id_compte = :id_compte";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('id_compte', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		send_expired_pack_vit($email);
	}
	
	$req_update->closeCursor();
	
	return true;	
}

///////////////////
//Relancer les annonces qui expirent dans les 7 jours
////////////////////

function relance()
{
	global $conn, $param_gen;
	
	$bdd = $conn;
	
	$now = time();
	$limit = (int) ($param_gen['ann_val'] * 24 * 3600) - (6 * 24 * 3600);

	$sql = "SELECT s.id_ann, s.titre, a.email 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE (:now - s.date) >= :limit AND s.etat = :etat";
	$req_update = $bdd->prepare($sql);
	
	$req_update->bindValue('now', $now, PDO::PARAM_INT);
	$req_update->bindValue('limit', $limit, PDO::PARAM_INT);
	$req_update->bindValue('etat', 2, PDO::PARAM_INT);
	$req_update->execute();

	while($row = $req_update->fetch())	
	{
		$id = (int) $row['id_ann'];
		$titre = stripslashes($row['titre']);		
		$email = stripslashes($row['email']);
		
		send_relance($id, $email, $titre);
	}
	
	$req_update->closeCursor();
	
	return true;	
}

///////////////////
//Modification d'une annonce relancée gratuitement
////////////////////

function update_relance($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$time = time();
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET date = :time WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('time', $time, PDO::PARAM_INT);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

////////////////////////////////	
//Mise en cache du nombre d'annonce
////////////////////////////////

function get_nb_ann()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) AS total FROM ". PREFIX ."annonces_search WHERE etat = :etat";				  
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$total = $reponse['total'];
	
	$cache_nombre_annonce = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Nombre d\'annonce
////////////////////////////////// '. "\n" .' 
$cache_nombre_annonce = array( '. "\n" .'
\'total\'    => \''. $total .'\','. "\n" .''; 

	for($i = 1; $i <= 26; $i++)
	{
		$sql = "SELECT count(*) AS total FROM ". PREFIX ."annonces_search WHERE etat = :etat AND id_reg = :id_reg";
		$req = $bdd->prepare($sql);
	
		$req->bindValue('etat', 2, PDO::PARAM_INT);
		$req->bindValue('id_reg', $i, PDO::PARAM_INT);
		$req->execute();
		
		$reponse = $req->fetch();
		
		$req->closeCursor();
		
		$total = $reponse['total'];
		
		$cache_nombre_annonce .= '\'reg_'. $i .'\'    => \''. $total .'\','. "\n" .'';
	}
	
$cache_nombre_annonce .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_nombre_annonce.php', $cache_nombre_annonce);
	
	return true;
}

///////////////////
//Insertion du filtre mail
///////////////////

function insert_send_message($array, $id_ann, $email_annonceur)
{
	global $conn;
	
	$bdd = $conn;
	
	$date = time();
	
	$nom = $array['mes_nom'];
	$email = $array['mes_ema'];
	$tel = $array['mes_tel'];
	$message = $array['mes'];
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$sql = "INSERT INTO ". PREFIX ."filtre_mails VALUES('', :id_ann, :nom, :email, :tel, :email_annonceur, :message, :ip, :date)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	$req->bindValue('nom', $nom, PDO::PARAM_STR);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	$req->bindValue('email_annonceur', $email_annonceur, PDO::PARAM_STR);
	$req->bindValue('message', $message, PDO::PARAM_STR);
	$req->bindValue('ip', $ip, PDO::PARAM_STR);
	$req->bindValue('date', $date, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;		 
}

////////////////////////////////	
//Comptez le nombre de mail pour l'envoi du mail de notification
////////////////////////////////

function count_mail_mail()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) AS nb_mail FROM ". PREFIX ."filtre_mails";			  
	$req = $bdd->prepare($sql);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$nb_mail = $reponse['nb_mail'];
	
	return $nb_mail;
}

///////////////////
//Inserer une alerte
////////////////////

function insert_alert($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."alert VALUES('', :email, :reg, :dep, :cat, :keywords)";
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $array['email'], PDO::PARAM_INT);
	$req->bindValue('reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('dep', $array['dep'], PDO::PARAM_INT);
	$req->bindValue('cat', $array['cat'], PDO::PARAM_INT);
	$req->bindValue('keywords', $array['word1'] .' '. $array['word2'] .' '. $array['word3'], PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
}

///////////////////
//Supprimer une alerte
////////////////////

function delete_alert($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."alert WHERE id_alert = :id_alert";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_alert', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}