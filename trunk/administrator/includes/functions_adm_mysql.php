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
	global $language_adm;
	
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

///////////////////////////////////
///Vérification du login et du mot de passe de l'administrateur
///////////////////////////////////

function verify_user($username, $password)
{
	global $conn;
	
	$bdd = $conn;
	
	$password = md5($password);
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE login = :username AND password = :password";
	$req = $bdd->prepare($sql);

	$req->bindValue('username', $username, PDO::PARAM_STR);
	$req->bindValue('password', $password, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return false;
	
	else return true;
}

///////////////////////////////////
///Obtenir le statu de l'administrateur
//////////////////////////////////

function get_statut($username, $password)
{
	global $conn;
	
	$bdd = $conn;
	
	$password = md5($password);
	
	$sql = "SELECT statut FROM ". PREFIX ."admin WHERE login = :username AND password = :password";
	$req = $bdd->prepare($sql);

	$req->bindValue('username', $username, PDO::PARAM_STR);
	$req->bindValue('password', $password, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	$statut = $reponse['statut'];
	return $statut;
}

////////////////////////////////
//Verifier le compte pour l'envoi du mot de passe
////////////////////////////////

function verify_forgot_email($email, $user)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE login = :user AND email = :email";
	$req = $bdd->prepare($sql);

	$req->bindValue('user', $user, PDO::PARAM_STR);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return false;
	
	else return true;
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
//Modifier le mot de passe
////////////////////////////////

function update_password($email , $user, $password)
{
	global $conn;
	
	$bdd = $conn;
	
	$password = md5($password);
	
	$sql = "UPDATE ". PREFIX ."admin SET password = :password WHERE login = :user AND email = :email";
	$req = $bdd->prepare($sql);

	$req->bindValue('password', $password, PDO::PARAM_STR);
	$req->bindValue('user', $user, PDO::PARAM_STR);
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Création d'un compte administrateur
/////////////////////////////////

function creer_compte($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$password = md5($array['pass1']);

	$sql = "INSERT INTO ". PREFIX ."admin values('', :login, :email, :password, :c)";
	$req = $bdd->prepare($sql);

	$req->bindValue('login', $array['login'], PDO::PARAM_STR);
	$req->bindValue('email', $array['email1'], PDO::PARAM_STR);
	$req->bindValue('password', $password, PDO::PARAM_STR);
	$req->bindValue('c', $array['c'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();

	return true;
}

////////////////////////////////
//Obtenir les comptes des administrateurs
////////////////////////////////

function get_comptes($c)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_adm, login FROM ". PREFIX ."admin WHERE statut = :c";
	$req = $bdd->prepare($sql);

	$req->bindValue('c', $c, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

////////////////////////////////
//Obtenir les infos du compte administrateur
////////////////////////////////

function get_user_info($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT login, email FROM ". PREFIX ."admin WHERE id_adm = :id_adm";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_adm', $id, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	if(empty($reponse))
	redirect("admin.php");
	
	$login = $reponse['login'];
	$email = $reponse['email'];
	
	$result = array($login, $email);
	return $result;
}

///////////////////////////////////
///Vérifier si le login est déjà utilisé
//////////////////////////////////

function verify_compte_login($login)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE login = :login";
	$req = $bdd->prepare($sql);

	$req->bindValue('login', $login, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return true;
	
	else return false;
}			

///////////////////////////////////
///Vérifier si l'email est déjà utilisée
//////////////////////////////////
	
function verify_email($email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE email = :email"; 
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return true;
	
	else return false;
}

////////////////////////////////
//Vérifier l'ancien mot de passe du compte administrateur
/////////////////////////////////

function verifiy_password($id, $pass)	
{
	global $conn;
	
	$bdd = $conn;
	
	$password = md5($pass);
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE id_adm = :id_adm AND password = :password"; 
	$req = $bdd->prepare($sql);

	$req->bindValue('id_adm', $id, PDO::PARAM_INT);
	$req->bindValue('password', $password, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return false;

	else return true;
}

////////////////////////////////
//Vérifier si le login n'est pas utilisé par un autre administrateur
//////////////////////////////////

function verify_login($id, $login)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE id_adm != :id_adm AND login = :login"; 
	$req = $bdd->prepare($sql);

	$req->bindValue('id_adm', $id, PDO::PARAM_INT);
	$req->bindValue('login', $login, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return true;

	else return false;
}

////////////////////////////////
//Vérifier que l'email n'est pas utilisée par un autre administrateur
//////////////////////////////////
	
function verify_modify_email($id, $email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."admin WHERE email = :email AND id_adm != :id_adm"; 
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->bindValue('id_adm', $id, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(empty($reponse))
	return true;

	else return false;
}	

////////////////////////////////
//Modifier le compte administrateur
//////////////////////////////////

function update_user($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$password1 = (md5($array['pass1']));
	$password2 = (md5($array['pass2']));

	$sql = "UPDATE ". PREFIX ."admin SET login = :login, email = :email, password = :password2 WHERE id_adm = :id_adm AND password = :password1";
	$req = $bdd->prepare($sql);

	$req->bindValue('login', $array['user'], PDO::PARAM_STR);
	$req->bindValue('email', $array['email1'], PDO::PARAM_STR);
	$req->bindValue('password2', $password2, PDO::PARAM_STR);
	$req->bindValue('id_adm', $array['id'], PDO::PARAM_INT);
	$req->bindValue('password1', $password1, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
    return true;
}

////////////////////////////////
//Supprimer un compte administrateur
/////////////////////////////////

function delete_user($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."admin WHERE id_adm = :id_adm"; 
	$req = $bdd->prepare($sql);

	$req->bindValue('id_adm', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();

	return true;		
}

////////////////////////////////
//Mise en cache des paramètres généraux
/////////////////////////////////

function creer_cache_param_gen($array)
{
	$name = htmlspecialchars($array['name'], ENT_QUOTES);
	$pays = htmlspecialchars($array['pays'], ENT_QUOTES);
	$mail_rep = htmlspecialchars($array['mail_rep'], ENT_QUOTES);
	$title = htmlspecialchars($array['title'], ENT_QUOTES);
	$desc = htmlspecialchars($array['desc'], ENT_QUOTES);
	$devise = htmlspecialchars($array['devise'], ENT_QUOTES);
	$active_fb = (!empty($array['active_fb'])) ? (int) ($array['active_fb']) : 0;
	$id_fb = htmlspecialchars($array['id_fb'], ENT_QUOTES);
	$key_fb = htmlspecialchars($array['key_fb'], ENT_QUOTES);
	$active_filtre = (!empty($array['active_filtre'])) ? (int) ($array['active_filtre']) : 0;
	$actif_acc = (int) ($array['actif_acc']);
	$active_bout = (!empty($array['active_bout'])) ? (int) ($array['active_bout']) : 0;
	$active_ech = (!empty($array['active_ech'])) ? (int) ($array['active_ech']) : 0;
	$active_don = (!empty($array['active_don'])) ? (int) ($array['active_don']) : 0;
	$active_une = (!empty($array['active_une'])) ? (int) ($array['active_une']) : 0;
	$active_vit = (!empty($array['active_vit'])) ? (int) ($array['active_vit']) : 0;
	$nb_ann = (int) $array['nb_ann'];
	$nb_bout =(int) $array['nb_bout'];
	$ann_val = (int) $array['ann_val'];
	$auto_ann = (!empty($array['auto_ann'])) ? (int) ($array['auto_ann']) : 0;
	$auto_acc = (!empty($array['auto_acc'])) ? (int) ($array['auto_acc']) : 0;
	$notif = (!empty($array['notif'])) ? (int) ($array['notif']) : 0;
	$email_notif = htmlspecialchars($array['email_notif'], ENT_QUOTES);
	$flux_gl = (!empty($array['flux_gl'])) ? (int) ($array['flux_gl']) : 0;
	$nb_flux_gl = (int) $array['nb_flux_gl'];
	$flux_bout = (!empty($array['flux_bout'])) ? (int) ($array['flux_bout']) : 0;
	$nb_flux_bout = (int) $array['nb_flux_bout'];
	$auto_fact = (!empty($array['auto_fact'])) ? (int) ($array['auto_fact']) : 0;
	$nom_ent = htmlspecialchars($array['nom_ent'], ENT_QUOTES);
	$add_ent = htmlspecialchars($array['add_ent'], ENT_QUOTES);
	$cod_ent = htmlspecialchars($array['cod_ent'], ENT_QUOTES);
	$vil_ent = htmlspecialchars($array['vil_ent'], ENT_QUOTES);
	$sir_ent = htmlspecialchars($array['sir_ent'], ENT_QUOTES);
	$tva_ent = htmlspecialchars($array['tva_ent'], ENT_QUOTES);
	$tva_taux = htmlspecialchars($array['tva_taux'], ENT_QUOTES);
	$tva_taux = str_replace(',', '.', $tva_taux);
	
$param_gen = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètres généraux
////////////////////////////////// '. "\n" .' 
$param_gen = array( '. "\n" .'
\'name\'            =>	\''. $name .'\',
\'pays\'            =>	\''. $pays .'\',
\'mail_rep\'        =>	\''. $mail_rep .'\',
\'title\'           =>	\''. $title .'\',
\'desc\'            =>	\''. $desc .'\',
\'devise\'          =>	\''. $devise .'\',
\'active_fb\'    	=>	\''. $active_fb .'\',
\'id_fb\'    		=>	\''. $id_fb .'\',
\'key_fb\'    		=>	\''. $key_fb .'\',
\'active_filtre\'    =>	\''. $active_filtre .'\',
\'actif_acc\'       =>	\''. $actif_acc .'\',
\'active_bout\'     =>	\''. $active_bout .'\',
\'active_ech\'      =>	\''. $active_ech .'\',
\'active_don\'      =>	\''. $active_don .'\',
\'active_une\'      =>	\''. $active_une .'\',
\'active_vit\'      =>	\''. $active_vit .'\',
\'nb_ann\'          =>	\''. $nb_ann .'\',
\'nb_bout\'         =>	\''. $nb_bout .'\',
\'ann_val\'         =>	\''. $ann_val .'\',
\'auto_ann\'        =>	\''. $auto_ann .'\',
\'auto_acc\'        =>	\''. $auto_acc .'\',
\'notif\'           =>	\''. $notif .'\',
\'email_notif\'     =>	\''. $email_notif .'\',
\'flux_gl\'         =>	\''. $flux_gl .'\',
\'nb_flux_gl\'      =>	\''. $nb_flux_gl .'\',
\'flux_bout\'       =>	\''. $flux_bout .'\',
\'nb_flux_bout\'    =>	\''. $nb_flux_bout .'\',
\'auto_fact\'       =>	\''. $auto_fact .'\',
\'nom_ent\'         =>	\''. $nom_ent .'\',
\'add_ent\'         =>	\''. $add_ent .'\',
\'cod_ent\'         =>	\''. $cod_ent .'\',
\'vil_ent\'         =>	\''. $vil_ent .'\',
\'sir_ent\'         =>	\''. $sir_ent .'\',
\'tva_ent\'         =>	\''. $tva_ent .'\',
\'tva_taux\'         =>	\''. $tva_taux .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_param_gen.php', $param_gen);	

	return true;
}

////////////////////////////////
//Créer une région région
//////////////////////////////////

function creer_region($name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."regions values('', :name, (SELECT * FROM (SELECT IFNULL(MAX(pos_reg), 0) FROM ". PREFIX ."regions WHERE pos_reg IS NOT NULL) departements) + 1)";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des régions
/////////////////////////////////

function creer_cache_regions()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."regions ORDER BY pos_reg";
	$req = $bdd->prepare($sql);

	$req->execute();

	$result = result_to_array($req);
	
$cache_regions = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Régions
////////////////////////////////// '. "\n" .' 
$cache_regions = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_reg = (int) $v['id_reg'];
		$nom_reg = addslashes($v['nom_reg']);
		$pos_reg = addslashes($v['pos_reg']);
		
$cache_regions .= ''. "\n" .''. $i .'=>
array(
\'id_reg\' => \''. $id_reg .'\',
\'nom_reg\' => \''. $nom_reg .'\',
\'pos_reg\' => \''. $pos_reg .'\',
),';

		$i++;
	}
	
$cache_regions .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_regions.php', $cache_regions);	

	return true;
}

////////////////////////////////
//Modifier une région
//////////////////////////////////

function modify_region($id, $name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."regions SET nom_reg = :name WHERE id_reg = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Monter ou descendre une région
//////////////////////////////////

function deplace_region($id, $m)
{
	global $conn;
	
	$bdd = $conn;
	
	if ($m == 1)
	{
		$sql1 = "UPDATE ". PREFIX ."regions SET pos_reg = (pos_reg + 1) WHERE pos_reg = (SELECT * FROM (SELECT pos_reg FROM ". PREFIX ."regions WHERE id_reg = :id) departements) - 1";
		$sql2 = "UPDATE ". PREFIX ."regions SET pos_reg = (pos_reg - 1) WHERE id_reg = :id AND pos_reg != 1";
	}
	elseif($m == 2)
	{
		$sql1 = "UPDATE ". PREFIX ."regions SET pos_reg = (pos_reg - 1) WHERE pos_reg = (SELECT * FROM (SELECT pos_reg FROM ". PREFIX ."regions WHERE id_reg = :id) departements) + 1";	
		$sql2 = "UPDATE ". PREFIX ."regions SET pos_reg = (pos_reg + 1) WHERE id_reg = :id";		
	}
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer une région
//////////////////////////////////

function delete_region($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql1 = "DELETE FROM ". PREFIX ."regions WHERE id_reg = :id";	
	$sql2 = "UPDATE ". PREFIX ."regions SET pos_reg = (pos_reg - 1) WHERE id_reg > :id";
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer les départements de la région
//////////////////////////////////

function delete_departements($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "DELETE FROM ". PREFIX ."departements WHERE id_reg = :id";		
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor(); 
	
	return true;
}

////////////////////////////////
//Créer un département
//////////////////////////////////

function creer_departement($id, $name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."departements values('', :id, :name, (SELECT * FROM (SELECT IFNULL(MAX(pos_dep), 0) FROM ". PREFIX ."departements WHERE id_reg = :id OR pos_dep IS NULL) regions) + 1)";	
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;	
}

////////////////////////////////
//Mise en cache des départements
/////////////////////////////////

function creer_cache_departements()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."departements ORDER BY id_reg, pos_dep";
	$req = $bdd->prepare($sql);

	$req->execute();

	$result = result_to_array($req);
	
$cache_departements = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Départements
////////////////////////////////// '. "\n" .' 
$cache_departements = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_dep = (int) $v['id_dep'];
		$id_reg = (int) $v['id_reg'];
		$nom_dep = addslashes($v['nom_dep']);
		$pos_dep = addslashes($v['pos_dep']);
		
$cache_departements .= ''. "\n" .''. $i .'=>
array(
\'id_dep\' => \''. $id_dep .'\',
\'id_reg\' => \''. $id_reg .'\',
\'nom_dep\' => \''. $nom_dep .'\',
\'pos_dep\' => \''. $pos_dep .'\',
),';

		$i++;
	}
	
$cache_departements .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_departements.php', $cache_departements);	

	return true;
}

////////////////////////////////
//Modifier le département
//////////////////////////////////	

function modify_departement($id, $name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."departements SET nom_dep = :name WHERE id_dep = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Monter ou descendre un département
//////////////////////////////////

function deplace_departement($id1, $id2, $m)
{
	global $conn;
	
	$bdd = $conn;
	
	if($m == 1)
	{
		$sql1 = "UPDATE ". PREFIX ."departements SET pos_dep = (pos_dep + 1) WHERE id_reg = :id1 AND pos_dep = (SELECT * FROM (SELECT pos_dep FROM ". PREFIX ."departements WHERE id_reg = :id1 AND id_dep = :id2) regions) - 1";
		$sql2 = "UPDATE ". PREFIX ."departements SET pos_dep = (pos_dep - 1) WHERE id_reg = :id1 AND id_dep = :id2 AND pos_dep != 1";
	}
	elseif($m == 2)
	{
		$sql1 = "UPDATE ". PREFIX ."departements SET pos_dep = (pos_dep - 1) WHERE id_reg = :id1 AND pos_dep = (SELECT * FROM (SELECT pos_dep FROM ". PREFIX ."departements WHERE id_reg = :id1 AND id_dep = :id2) regions) + 1";
		$sql2 = "UPDATE ". PREFIX ."departements SET pos_dep = (pos_dep + 1) WHERE id_reg = :id1 AND id_dep = :id2";		  
	}
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}
		
////////////////////////////////
//Supprimer un département
//////////////////////////////////

function delete_departement($id1, $id2)
{
	global $conn;
	
	$bdd = $conn;

	$sql1 = "DELETE FROM ". PREFIX ."departements WHERE id_dep = :id2 AND id_reg = :id1";
	$sql2 = "UPDATE ". PREFIX ."departements SET pos_dep = (pos_dep - 1) WHERE id_dep > :id2 AND id_reg = :id1";
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Créer une catégorie
///////////////////////////////////

function creer_categorie($name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."categories values('', :name, '0', '', (SELECT * FROM (SELECT IFNULL(MAX(pos_cat), 0) FROM ". PREFIX ."categories WHERE par_cat = 0) regions) + 1, '', '', '', '', '', '', '')";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des catégories
/////////////////////////////////

function creer_cache_categories()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."categories ORDER BY par_cat, pos_cat";
	$req = $bdd->prepare($sql);

	$req->execute();

	$result = result_to_array($req);
	
$cache_categories = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Catégories
////////////////////////////////// '. "\n" .' 
$cache_categories = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_cat = (int) $v['id_cat'];
		$nom_cat = addslashes($v['nom_cat']);
		$par_cat = (int) $v['par_cat'];
		$com_cat = addslashes($v['com_cat']);
		$pos_cat = (int) $v['pos_cat'];
		$disc = (int) $v['disc'];
		$prix_par = (float) $v['prix_par'];
		$prix_pro = (float) $v['prix_pro'];
		$prix_par_mod = (float) $v['prix_par_mod'];
		$prix_pro_mod = (float) $v['prix_pro_mod'];
		$prix_par_ren = (float) $v['prix_par_ren'];
		$prix_pro_ren = (float) $v['prix_pro_ren'];
		
$cache_categories .= ''. "\n" .''. $i .'=>
array(
\'id_cat\' => \''. $id_cat .'\',
\'nom_cat\' => \''. $nom_cat .'\',
\'par_cat\' => \''. $par_cat .'\',
\'com_cat\' => \''. $com_cat .'\',
\'pos_cat\' => \''. $pos_cat .'\',
\'disc\' => \''. $disc .'\',
\'prix_par\' => \''. $prix_par .'\',
\'prix_pro\' => \''. $prix_pro .'\',
\'prix_par_mod\' => \''. $prix_par_mod .'\',
\'prix_pro_mod\' => \''. $prix_pro_mod .'\',
\'prix_par_ren\' => \''. $prix_par_ren .'\',
\'prix_pro_ren\' => \''. $prix_pro_ren .'\',
),';

		$i++;
	}
	
$cache_categories .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_categories.php', $cache_categories);	

	return true;
}

////////////////////////////////
//Modifier une catégorie
///////////////////////////////////

function modify_categorie($id, $name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."categories SET nom_cat = :name WHERE id_cat = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Monter ou descendre une catégorie
///////////////////////////////////

function deplace_categorie($id, $m)
{
	global $conn;
	
	$bdd = $conn;
	
	if($m == 1)
	{
		$sql1 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat + 1) WHERE pos_cat = (SELECT * FROM (SELECT pos_cat FROM ". PREFIX ."categories WHERE par_cat = 0 AND id_cat = :id) regions) - 1";
		$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat - 1) WHERE id_cat = :id AND par_cat = 0 AND pos_cat != 1";
	}
	elseif($m == 2)
	{
		$sql1 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat - 1) WHERE pos_cat = (SELECT * FROM (SELECT pos_cat FROM ". PREFIX ."categories WHERE par_cat = 0 AND id_cat = :id) regions) + 1";	  		
		$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat + 1) WHERE id_cat = :id AND par_cat = 0";
	}
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer une catégorie
///////////////////////////////////

function delete_categorie($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql1 = "DELETE FROM ". PREFIX ."categories WHERE id_cat = :id";	
	$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat - 1) WHERE id_cat > :id AND par_cat = 0";
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer toutes les sous catégories d'une catégorie
///////////////////////////////////

function delete_sous_categories($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."categories WHERE par_cat = :id";		
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor(); 
	
	return true;
}

////////////////////////////////
//Créer une sous catégorie
///////////////////////////////////

function creer_sous_categorie($id, $name)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."categories values('', :name, :id, '', (SELECT * FROM (SELECT IFNULL(MAX(pos_cat), 0) FROM ". PREFIX ."categories WHERE par_cat = :id) regions) + 1, '', '', '', '', '', '', '')";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Modifier une sous catégorie
///////////////////////////////////	

function modify_sous_categorie($id, $name)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "UPDATE ". PREFIX ."categories SET nom_cat = :name WHERE id_cat = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Monter ou descendre une sous catégorie
///////////////////////////////////

function deplace_sous_categorie($id1, $id2, $m)
{
	global $conn;
	
	$bdd = $conn;
	
	if ($m == 1)
	{
		$sql1 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat + 1) WHERE par_cat = :id1 AND pos_cat = (SELECT * FROM (SELECT pos_cat FROM ". PREFIX ."categories WHERE par_cat = :id1 AND id_cat = :id2) regions) - 1";
		$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat - 1) WHERE par_cat = :id1 AND id_cat = :id2 AND pos_cat != 1";
	}
	elseif($m == 2)
	{
		$sql1 = "UPDATE ". PREFIX ."categories SET pos_cat =(pos_cat - 1) WHERE  par_cat = :id1 AND pos_cat = (SELECT * FROM (SELECT pos_cat FROM ". PREFIX ."categories WHERE par_cat = :id1 AND id_cat = :id2) regions) + 1";		  
		$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat + 1) WHERE par_cat = :id1 AND id_cat = :id2";
	}
	
	$req = $bdd->prepare($sql1);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer une sous catégorie
///////////////////////////////////

function delete_sous_categorie($id1, $id2)
{
	global $conn;
	
	$bdd = $conn;

	$sql1 = "DELETE FROM ". PREFIX ."categories WHERE id_cat = :id2 AND par_cat = :id1";
	$sql2 = "UPDATE ". PREFIX ."categories SET pos_cat = (pos_cat - 1) WHERE id_cat > :id2 AND par_cat = :id1";

	$req = $bdd->prepare($sql1);

	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$req = $bdd->prepare($sql2);

	$req->bindValue('id2', $id2, PDO::PARAM_INT);
	$req->bindValue('id1', $id1, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();	
	
	return true;
}

////////////////////////////////
//Créer la note d'une catégorie pour le formulaire de dépôt
///////////////////////////////////

function crea_comment($id, $com)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."categories SET com_cat = :com WHERE id_cat = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('com', $com, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();	

	return true;    	
}

////////////////////////////////
//Appliquer un disclaimer
////////////////////////////////

function attribuer_disc($disc, $cat)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."categories SET disc = :disc WHERE id_cat = :cat";
	$req = $bdd->prepare($sql);

	$req->bindValue('disc', $disc, PDO::PARAM_INT);
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();

	return true;	
}

////////////////////////////////
//Créer une option de catégories
///////////////////////////////////

function crea_option($array, $l)
{
	global $conn;
	
	$bdd = $conn;
	
	$uni = (!empty($array['uni'])) ? $array['uni'] : '';
	
	$sql = "INSERT INTO ". PREFIX ."options_cat VALUES('', :nom, :uni, :l)";
	$req = $bdd->prepare($sql);

	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('uni', $uni, PDO::PARAM_STR);
	$req->bindValue('l', $l, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des options de sous-catégories
/////////////////////////////////

function creer_cache_options_cat()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."options_cat ORDER BY id_opt";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_options_cat = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Options de sous-catégories
////////////////////////////////// '. "\n" .' 
$cache_options_cat = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_opt = (int) $v['id_opt'];
		$nom_opt = addslashes($v['nom_opt']);
		$uni_opt = addslashes($v['uni_opt']);
		$type = (int) $v['type'];
		
$cache_options_cat .= ''. "\n" .''. $i .'=>
array(
\'id_opt\' => \''. $id_opt .'\',
\'nom_opt\' => \''. $nom_opt .'\',
\'uni_opt\' => \''. $uni_opt .'\',
\'type\' => \''. $type .'\',
),';

		$i++;
	}
	
$cache_options_cat .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_options_cat.php', $cache_options_cat);	

	return true;
}

////////////////////////////////
//Modifier une option de catégories
///////////////////////////////////

function mod_option($array, $id, $l)
{
	global $conn;
	
	$bdd = $conn;
	
	$nom_min = $array['nom'] .' min';
	$nom_max = $array['nom'] .' max';
	$uni = (!empty($array['uni'])) ? $array['uni'] : '';
	
	if($l == 1)
	{
		$sql = "UPDATE ". PREFIX ."select_valeurs SET sel_nom = :nom_min WHERE sel_nom = CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' min') AND id_opt = :id";
		$req = $bdd->prepare($sql);
		$req->bindValue('nom_min', $nom_min, PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."select_valeurs SET sel_nom = :nom_max WHERE sel_nom = CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' max') AND id_opt = :id";
		$req = $bdd->prepare($sql);
		$req->bindValue('nom_max', $nom_max, PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."search_valeurs SET sel_nom = :nom_min WHERE sel_nom = CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' min') AND id_opt = :id";
		$req = $bdd->prepare($sql);
		$req->bindValue('nom_min', $nom_min, PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."search_valeurs SET sel_nom = :nom_max WHERE sel_nom = CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' max') AND id_opt = :id";
		$req = $bdd->prepare($sql);
		$req->bindValue('nom_max', $nom_max, PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	else
	{
		$sql = "UPDATE ". PREFIX ."select_donnees SET sel_nom = :nom WHERE id_opt = :id";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "UPDATE ". PREFIX ."search_donnees SET sel_nom = :nom WHERE id_opt = :id";
		$req = $bdd->prepare($sql);
		
		$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	$sql = "UPDATE ". PREFIX ."options_cat SET nom_opt = :nom, uni_opt = :uni WHERE id_opt = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('uni', $uni, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."form SET nom_for = :nom, uni_for = :uni WHERE id_opt = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('uni', $uni, PDO::PARAM_STR);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des selects valeurs
/////////////////////////////////

function creer_cache_select_valeurs()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_sel, sel_nom, valeur, id_opt FROM ". PREFIX ."select_valeurs ORDER BY sel_nom, valeur";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_select_valeurs = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Select valeurs
////////////////////////////////// '. "\n" .' 
$cache_select_valeurs = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_sel = (int) $v['id_sel'];
		$sel_nom = addslashes($v['sel_nom']);
		$valeur = (int) $v['valeur'];
		$id_opt = (int) $v['id_opt'];
		
$cache_select_valeurs .= ''. "\n" .''. $i .'=>
array(
\'id_sel\' => \''. $id_sel .'\',
\'sel_nom\' => \''. $sel_nom .'\',
\'valeur\' => \''. $valeur .'\',
\'id_opt\' => \''. $id_opt .'\',
),';

		$i++;
	}
	
$cache_select_valeurs .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_select_valeurs.php', $cache_select_valeurs);	

	return true;
}

////////////////////////////////
//Mise en cache des selects données
/////////////////////////////////

function creer_cache_select_donnees()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."select_donnees ORDER BY id_sel";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_select_donnees = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Select donnees
////////////////////////////////// '. "\n" .' 
$cache_select_donnees = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_sel = (int) $v['id_sel'];
		$sel_nom = addslashes($v['sel_nom']);
		$valeur = addslashes($v['valeur']);
		$id_opt = (int) $v['id_opt'];
		
$cache_select_donnees .= ''. "\n" .''. $i .'=>
array(
\'id_sel\' => \''. $id_sel .'\',
\'sel_nom\' => \''. $sel_nom .'\',
\'valeur\' => \''. $valeur .'\',
\'id_opt\' => \''. $id_opt .'\',
),';

		$i++;
	}
	
$cache_select_donnees .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_select_donnees.php', $cache_select_donnees);	

	return true;
}

////////////////////////////////
//Mise en cache de search valeurs
/////////////////////////////////

function creer_cache_search_valeurs()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."search_valeurs ORDER BY id_sea";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_search_valeurs = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Search valeurs
////////////////////////////////// '. "\n" .' 
$cache_search_valeurs = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_sea = (int) $v['id_sea'];
		$id_cat =(int) $v['id_cat'];
		$sel_nom = addslashes($v['sel_nom']);
		$id_opt = (int) $v['id_opt'];
		
$cache_search_valeurs .= ''. "\n" .''. $i .'=>
array(
\'id_sea\' => \''. $id_sea .'\',
\'id_cat\' => \''. $id_cat .'\',
\'sel_nom\' => \''. $sel_nom .'\',
\'id_opt\' => \''. $id_opt .'\',
),';

		$i++;
	}
	
$cache_search_valeurs .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_search_valeurs.php', $cache_search_valeurs);	

	return true;
}

////////////////////////////////
//Mise en cache de search données
/////////////////////////////////

function creer_cache_search_donnees()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."search_donnees ORDER BY id_sea";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_search_donnees = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Search donnees
////////////////////////////////// '. "\n" .' 
$cache_search_donnees = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_sea = (int) $v['id_sea'];
		$id_cat =(int) $v['id_cat'];
		$sel_nom = addslashes($v['sel_nom']);
		$id_opt = (int) $v['id_opt'];
		
$cache_search_donnees .= ''. "\n" .''. $i .'=>
array(
\'id_sea\' => \''. $id_sea .'\',
\'id_cat\' => \''. $id_cat .'\',
\'sel_nom\' => \''. $sel_nom .'\',
\'id_opt\' => \''. $id_opt .'\',
),';

		$i++;
	}
	
$cache_search_donnees .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_search_donnees.php', $cache_search_donnees);	

	return true;
}

////////////////////////////////
//Mise en cache de form
/////////////////////////////////

function creer_cache_form()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."form ORDER BY id_for";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_form = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Form
////////////////////////////////// '. "\n" .' 
$cache_form = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_for = (int) $v['id_for'];
		$id_cat =(int) $v['id_cat'];
		$nom_for = addslashes($v['nom_for']);
		$uni_for = addslashes($v['uni_for']);
		$id_opt = (int) $v['id_opt'];
		$type = (int) $v['type'];
		
$cache_form .= ''. "\n" .''. $i .'=>
array(
\'id_for\' => \''. $id_for .'\',
\'id_cat\' => \''. $id_cat .'\',
\'nom_for\' => \''. $nom_for .'\',
\'uni_for\' => \''. $uni_for .'\',
\'id_opt\' => \''. $id_opt .'\',
\'type\' => \''. $type .'\',
),';

		$i++;
	}
	
$cache_form .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_form.php', $cache_form);	

	return true;
}

////////////////////////////////
//Supprimer une options de catégorie
///////////////////////////////////
 
function delete_option($id, $l)
{
	global $conn;
	
	$bdd = $conn;
	
	if($l == 1)
	{
		$sql = "DELETE FROM ". PREFIX ."select_valeurs WHERE id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."search_valeurs WHERE id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	else
	{
		$sql = "DELETE FROM ". PREFIX ."select_donnees WHERE id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
		
		$sql = "DELETE FROM ". PREFIX ."search_donnees WHERE id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	$sql = "DELETE FROM ". PREFIX ."options_cat WHERE id_opt = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."form WHERE id_opt = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."annonces_valeurs WHERE id_opt = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Créer une valeur numérique
///////////////////////////////////

function crea_valeur($array, $id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."select_valeurs VALUES('', CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' min'), :val, :id),";
	$sql .= "('', CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), ' max'), :val, :id)";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->bindValue('val', $array['val'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Créer une donnée
///////////////////////////////////

function crea_donnee($array, $id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."select_donnees VALUES('', (SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :id), :val, :id)";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->bindValue('val', $array['val'], PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Modifier une valeur d'option de catégories
///////////////////////////////////

function mod_valeur($array, $id, $l, $v)
{
	global $conn;
	
	$bdd = $conn;
	
	if($l == 1)
	{
		$sql = "UPDATE ". PREFIX ."select_valeurs SET valeur = :nom WHERE valeur = :v AND id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('nom', $array['nom'], PDO::PARAM_INT);
		$req->bindValue('v', $v, PDO::PARAM_INT);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	else
	{
		$sql = "UPDATE ". PREFIX ."select_donnees SET valeur = :nom WHERE id_sel = :v";
		$req = $bdd->prepare($sql);

		$req->bindValue('nom', $array['nom'], PDO::PARAM_INT);
		$req->bindValue('v', $v, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	return true;
}

////////////////////////////////
//Supprimer une option de sous-catégorie
///////////////////////////////////

function delete_valeur($id, $l, $v)
{
	global $conn;
	
	$bdd = $conn;
	
	if($l == 1)
	{
		$sql = "DELETE FROM ". PREFIX ."select_valeurs WHERE valeur = :v AND id_opt = :id";
		$req = $bdd->prepare($sql);

		$req->bindValue('v', $v, PDO::PARAM_INT);
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	else
	{
		$sql = "DELETE FROM ". PREFIX ."select_donnees WHERE id_sel = :v";
		$req = $bdd->prepare($sql);

		$req->bindValue('v', $v, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	return true;
}

////////////////////////////////
//Mise à jour de l'application des option aux sous-catégories 
////////////////////////////////

function attribuer_options($options_val, $options_don, $cat)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."search_valeurs WHERE id_cat = :cat";
	$req = $bdd->prepare($sql);

	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."search_donnees WHERE id_cat = :cat";
	$req = $bdd->prepare($sql);

	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."form WHERE id_cat = :cat";
	$req = $bdd->prepare($sql);

	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	if(is_array($options_val))
	{
		foreach($options_val as $row)
		{
			if($row == 0)
			{
				$sql = "INSERT INTO ". PREFIX ."search_valeurs VALUES('', :cat, 'Prix min', '0')";
				$req = $bdd->prepare($sql);

				$req->bindValue('cat', $cat, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
				
				$sql = "INSERT INTO ". PREFIX ."search_valeurs VALUES('', :cat, 'Prix max', '0')";
				$req = $bdd->prepare($sql);

				$req->bindValue('cat', $cat, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
			}
			else
			{
				$sql = "INSERT INTO ". PREFIX ."search_valeurs VALUES('', :cat, CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), ' min'), :row)";
				$req = $bdd->prepare($sql);

				$req->bindValue('cat', $cat, PDO::PARAM_INT);
				$req->bindValue('row', $row, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
				
				$sql = "INSERT INTO ". PREFIX ."search_valeurs VALUES('', :cat, CONCAT((SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), ' max'), :row)";
				$req = $bdd->prepare($sql);

				$req->bindValue('cat', $cat, PDO::PARAM_INT);
				$req->bindValue('row', $row, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
				
				$sql ="INSERT INTO ". PREFIX ."form VALUES('' , :cat, (SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), (SELECT uni_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), (SELECT id_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), (SELECT type FROM ". PREFIX ."options_cat WHERE id_opt = :row)) ";
				$req = $bdd->prepare($sql);

				$req->bindValue('cat', $cat, PDO::PARAM_INT);
				$req->bindValue('row', $row, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
			}
		}
	}
	
	if(is_array($options_don))
	{
		foreach($options_don as $row)
		{
			$sql = "INSERT INTO ". PREFIX ."search_donnees VALUES('', :cat, (SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), :row) ";
			$req = $bdd->prepare($sql);

			$req->bindValue('cat', $cat, PDO::PARAM_INT);
			$req->bindValue('row', $row, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
			
			$sql ="INSERT INTO ". PREFIX ."form VALUES('' , :cat, (SELECT nom_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), '', (SELECT id_opt FROM ". PREFIX ."options_cat WHERE id_opt = :row), (SELECT type FROM ". PREFIX ."options_cat WHERE id_opt = :row))";
			$req = $bdd->prepare($sql);

			$req->bindValue('cat', $cat, PDO::PARAM_INT);
			$req->bindValue('row', $row, PDO::PARAM_INT);
			$req->execute();
			$req->closeCursor();
		}
	}

	return true;	
}

////////////////////////////////
//Mise en cache des paramètres des champs
/////////////////////////////////

function creer_cache_param_champs($array)
{
	$act_siret = (!empty($array['act_siret'])) ? (int) $array['act_siret'] : 0;
	$act_vil = (!empty($array['act_vil'])) ? (int) $array['act_vil'] : 0;
	$act_code_pos = (!empty($array['act_code_pos'])) ? (int) $array['act_code_pos'] : 0;
	$act_tel = (!empty($array['act_tel'])) ? (int) $array['act_tel'] : 0;
	$act_prix = (!empty($array['act_prix'])) ? (int) $array['act_prix'] : 0;
	
$param_champs = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètre des champs
////////////////////////////////// '. "\n" .' 
$cache_param_champs = array( '. "\n" .'
\'act_siret\'      =>	\''. $act_siret .'\',
\'act_vil\'        =>	\''. $act_vil .'\',
\'act_code_pos\'   =>	\''. $act_code_pos .'\',
\'act_tel\'        =>	\''. $act_tel .'\',
\'act_prix\'       =>	\''. $act_prix .'\',
);';
	
	file_put_contents('../includes/cache/cache_param_champs.php', $param_champs);	

	return true;
}

///////////////////////////////////
//Création d'un champ
//////////////////////////////////
	
function creer_champ($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$numeric = (!empty($array['numeric'])) ? (int) $array['numeric'] : 0;
	$type = (!empty($array['type'])) ? (int) $array['type'] : 0;
	
	$sql = "INSERT INTO ". PREFIX ."champs values('', :nom, :numeric, :type)";
	$req = $bdd->prepare($sql);

	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('numeric', $numeric, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des champs
/////////////////////////////////

function creer_cache_champs()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."champs ORDER BY id_champ";
	$req = $bdd->prepare($sql);

	$req->execute(); 

	$result = result_to_array($req);
	
$cache_champs = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Champs
////////////////////////////////// '. "\n" .' 
$cache_champs = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_champ = (int) $v['id_champ'];
		$nom = addslashes($v['nom']);
		$numeric = (int) $v['num'];
		$type = (int) $v['type'];
		
$cache_champs .= ''. "\n" .''. $i .'=>
array(
\'id_champ\'  => \''. $id_champ .'\',
\'nom\'       => \''. $nom .'\',
\'numeric\'   => \''. $numeric .'\',
\'type\'      => \''. $type .'\',
),';

		$i++;
	}
	
$cache_champs .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_champs.php', $cache_champs);	

	return true;
}

////////////////////////////////
//Modifier le champ
//////////////////////////////////

function update_champ($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$numeric = (!empty($array['numeric'])) ? (int) $array['numeric'] : 0;
	$type = (!empty($array['type'])) ? (int) $array['type'] : 0;
	
	$sql = "UPDATE ". PREFIX ."champs SET nom = :nom, num = :numeric, type = :type WHERE id_champ = :id_champ";
	$req = $bdd->prepare($sql);

	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('numeric', $numeric, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->bindValue('id_champ', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;					
}

///////////////////////////////////
//Supprimer un champ
//////////////////////////////////

function delete_champ($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."champs WHERE id_champ = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."annonces_champ WHERE id_champ = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Obtenir le nombre d'annonce
////////////////////////////////

function get_nb_ann_gest($etat)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) as total FROM ". PREFIX ."annonces_search WHERE etat = :etat";		
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', $etat, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$total = $reponse['total'];
	return $total;
}

////////////////////////////////
//Obtenir le nombre d'annonces
////////////////////////////////
	
function get_annonces_gest_nb($etat, $array) 
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_ann = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : 0;
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
	$condition = '';
	$condition .= (!empty($id_ann)) ? " AND s.id_ann = :id_ann" : '';
	$condition .= (!empty($cat)) ? " AND s.id_cat = :cat" : '';
	$condition .= (!empty($reg)) ? " AND s.id_reg = :reg" : '';
	$condition .= (isset($_GET['id_compte'])) ? " AND (s.id_compte = :id_compte || a.email = :email_compte)" : '';
	$condition .= (!empty($array['email']) && $array['email'] != $language_adm['page_ann_val_input2']) ? " AND a.email = :email" : '';
	
	$sql = "SELECT COUNT(*) AS id_ann FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	WHERE s.etat = :etat ". $condition ."";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	
	if(!empty($id_ann))
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	
	if(!empty($array['cat']))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($array['reg']))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	if(isset($_GET['id_compte']))
	{
		$req->bindValue('id_compte', $_GET['id_compte'], PDO::PARAM_INT);
		$req->bindValue('email_compte', $array['email_compte'], PDO::PARAM_INT);
	}
	
	if(!empty($array['email']) && $array['email'] != $language_adm['page_ann_val_input2'])
	$req->bindValue('email', $array['email'], PDO::PARAM_INT);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	$result = $reponse['id_ann'];
	return $result;	
}

////////////////////////////////
//Obtenir les annonces
////////////////////////////////
	
function get_annonces_gest($etat, $array, $offset, $limit) 
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_ann = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : 0;
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$limit = (int) $limit;
	$offset = (int) $offset;
	
	$condition = '';
	$condition .= (!empty($id_ann)) ? " AND s.id_ann = :id_ann" : '';
	$condition .= (!empty($cat)) ? " AND s.id_cat = :cat" : '';
	$condition .= (!empty($reg)) ? " AND s.id_reg = :reg" : '';
	$condition .= (!empty($array['email']) && $array['email'] != $language_adm['page_ann_val_input2']) ? " AND a.email = :email" : '';
	$condition .= (isset($_GET['id_compte'])) ? " AND (s.id_compte = :id_compte || a.email = :email_compte)" : '';
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_cat, s.code_pos, s.type, s.titre, s.ann, s.prix, a.email, a.ville, a.tel, a.ip, sc.nom_societe, sc.siret, v.video 
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_societe sc ON s.id_ann = sc.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.etat = :etat ". $condition ." ORDER BY s.date DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);

	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	
	if(!empty($id_ann))
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	
	if(!empty($array['cat']))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($array['reg']))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	if(!empty($array['email']) && $array['email'] != $language_adm['page_ann_val_input2'])
	$req->bindValue('email', $array['email'], PDO::PARAM_INT);
	
	if(isset($_GET['id_compte']))
	{
		$req->bindValue('id_compte', $_GET['id_compte'], PDO::PARAM_INT);
		$req->bindValue('email_compte', $array['email_compte'], PDO::PARAM_INT);
	}
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	
	$req->execute();

	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Obtenir les images de l'annonce
////////////////////////////////

function get_images($id)
{
	global $conn;
	
	$bdd = $conn;	
	
	$sql = "SELECT nom FROM ". PREFIX ."annonces_images WHERE id_ann = :id ORDER BY id_ima";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

////////////////////////////////
//Obtenir les doublons de l'annonce
////////////////////////////////

function get_doublons($id_ann, $id_reg, $code_pos, $titre, $ann)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT id_ann FROM ". PREFIX ."annonces_search WHERE etat = :etat AND id_reg = :id_reg AND code_pos = :code_pos AND (titre = :titre OR ann = :ann) AND id_ann != :id_ann ORDER BY id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_reg', $id_reg, PDO::PARAM_INT);
	$req->bindValue('code_pos', $code_pos, PDO::PARAM_STR);
	$req->bindValue('titre', $titre, PDO::PARAM_STR);
	$req->bindValue('ann', $ann, PDO::PARAM_STR);
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

////////////////////////////////
//Validation d'une annonce
////////////////////////////////

function valider_annonce($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$date = time();

	$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat, date = :date WHERE id_ann = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('date', $date, PDO::PARAM_INT);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."boutiques 
	SET nb_ann = (SELECT COUNT(*) FROM ". PREFIX ."annonces_search WHERE etat = :etat
	AND id_compte = (SELECT id_compte FROM ". PREFIX ."annonces_search WHERE id_ann = :id))
	WHERE id_compte = (SELECT id_compte FROM ". PREFIX ."annonces_search WHERE id_ann = :id)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	//Envoyer les alertes email
	
	$sql = "SELECT id_reg, id_dep, id_cat, titre FROM ". PREFIX ."annonces_search WHERE id_ann = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$sql = "SELECT id_alert, email FROM ". PREFIX ."alert WHERE id_reg > :id_reg AND id_dep = :id_dep AND id_cat = :id_cat";

	$keywords = trim(htmlspecialchars($reponse['titre'], ENT_QUOTES));
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
	
	$req->bindValue('id_reg', $reponse['id_reg'], PDO::PARAM_INT);
	$req->bindValue('id_dep', $reponse['id_dep'], PDO::PARAM_INT);
	$req->bindValue('id_cat', $reponse['id_cat'], PDO::PARAM_INT);
	$req->execute();
	
	while($row = $req->fetch())
	{
		$email = stripslashes($row['email']);
		$id_alerte = $row['id_alert'];
		
		send_alerte($email, $reponse['titre'], $id, $id_alerte);
	}
	
	$req->closeCursor();
	
	return true;
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
			
			$flux = fopen('../'. $result[0]['rss'] .'/'. $url_aff .'-'. $result[0]['id_compte'] .'.xml', 'w');
			
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
		
		$flux = fopen('../rss/'. $url_aff .'.xml', 'w');
		
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

////////////////////////////////
//Refus d'une annonce
////////////////////////////////

function refuser_annonce($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "UPDATE ". PREFIX ."annonces_search SET etat = :etat WHERE id_ann = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 3, PDO::PARAM_INT);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."boutiques 
	SET nb_ann = (SELECT COUNT(*) FROM ". PREFIX ."annonces_search WHERE etat = :etat
	AND id_compte = (SELECT id_compte FROM ". PREFIX ."annonces_search WHERE id_ann = :id))
	WHERE id_compte = (SELECT id_compte FROM ". PREFIX ."annonces_search WHERE id_ann = :id)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}	

////////////////////////////////
//Blacklister l'email
////////////////////////////////

function blacklist_email($email)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "INSERT INTO ". PREFIX ."blacklist VALUES(:email)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;	
}	

////////////////////////////////
//Mise en cache des emails blacklistés
/////////////////////////////////

function creer_cache_blacklist()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT email FROM ". PREFIX ."blacklist";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_blacklist = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Régions
////////////////////////////////// '. "\n" .' 
$blacklist = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$email = addslashes($v['email']);
		
$cache_blacklist .= ''. "\n" .''. $i .'=>
array(
\'email\' => \''. $email .'\',
),';

		$i++;
	}
	
$cache_blacklist .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_blacklist.php', $cache_blacklist);	

	return true;
}

////////////////////////////////
//Supprimer l'annonce
////////////////////////////////

function delete_annonce($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$images = get_images($id);

	if(is_array($images))
	{
		foreach ($images as $v)
		{
			if(preg_match('#^https?://#', $v['nom']) == false)
			{
				$del = "../images/photos/". $v['nom'];
				unlink($del);
			
				$del = "../images/vignettes/". $v['nom'];
				unlink($del);
			}
		}
	}

	$sql = "DELETE FROM ". PREFIX ."annonces WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
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
	
	return true;	
}

////////////////////////////////
//Obtenir l'annonce
////////////////////////////////
	
function get_annonce($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, a.email, s.code_pos, a.ville, s.type, a.nom, a.tel, s.titre, s.ann, s.prix, a.tel_cache,
	o.tete, o.jour_tete, o.time_tete, o.urg, o.jour_urg, o.time_urg, o.enc, o.jour_enc, o.time_enc, o.une, o.jour_une, o.time_une, sc.nom_societe, sc.siret, v.video
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_options o ON s.id_ann = o.id_ann
	LEFT JOIN ". PREFIX ."annonces_societe sc ON s.id_ann = sc.id_ann
	LEFT JOIN ". PREFIX ."annonces_video v ON s.id_ann = v.id_ann
	WHERE s.id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Supprimer une image
////////////////////////////////

function delete_image($name, $id)
{
	global $conn;
	
	$bdd = $conn;
	
	if(preg_match('#^https?://#', $name) == false)
	{
		$del = "../images/photos/". $name;
		unlink($del);
	
		$del = "../images/vignettes/". $name;
		unlink($del);
	}

	$sql = "DELETE FROM ". PREFIX ."annonces_images WHERE nom = :name";
	$req = $bdd->prepare($sql);

	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."annonces SET n_photo = n_photo - 1 WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET photo = IF((SELECT n_photo FROM ". PREFIX ."annonces WHERE id_ann = :id_ann) = 0, 0, 1) WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;		
}	

////////////////////////////////
//Supprimer une vidéo
////////////////////////////////

function delete_video($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."annonces_video WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET video = :video WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('video', 0, PDO::PARAM_INT);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;		
}

////////////////////////////////
//Modifier l'annonce
////////////////////////////////

function modify_ann($id, $array)
{
	global $conn;
	
	$bdd = $conn;
	
	$dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$ent = (!empty($array['nom_societe'])) ? $array['nom_societe'] : '';
	$sir = (!empty($array['siret'])) ? $array['siret'] : '';
	$cod = (!empty($array['code_pos'])) ? $array['code_pos'] : '';
	$vil = (!empty($array['vil'])) ? $array['vil'] : '';
	$tel = (!empty($array['tel'])) ? $array['tel'] : '';
	$pri = (!empty($array['prix'])) ? $array['prix'] : 0;
	
	$sql = "UPDATE ". PREFIX ."annonces SET email = :email, ville = :ville, nom = :nom, tel = :tel  WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('email', $array['email'], PDO::PARAM_STR);
	$req->bindValue('ville', $vil, PDO::PARAM_STR);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET id_reg = :id_reg, id_dep = :id_dep, id_cat = :id_cat, code_pos = :code_pos, type = :type, titre = :titre, ann = :ann, prix = :prix WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('id_dep', $dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $array['cat'], PDO::PARAM_INT);
	$req->bindValue('code_pos', $cod, PDO::PARAM_STR);
	$req->bindValue('type', $array['type'], PDO::PARAM_INT);
	$req->bindValue('titre', $array['tit'], PDO::PARAM_STR);
	$req->bindValue('ann', $array['ann'], PDO::PARAM_STR);
	$req->bindValue('prix', $pri, PDO::PARAM_STR);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	if(!empty($ent))
	{
		$sql = "UPDATE ". PREFIX ."annonces_societe SET nom_societe = :ent, siret = :sir WHERE id_ann = :id_ann";
		$req = $bdd->prepare($sql);

		$req->bindValue('ent', $ent, PDO::PARAM_STR);
		$req->bindValue('sir', $sir, PDO::PARAM_STR);
		$req->bindValue('id_ann', $id, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
	
	$time = time();
	
	// Remontée
	
	$mont = (!empty($array['opt_mont'])) ? 1 : 0;
	$jour_mont = (!empty($array['jour_mont'])) ? $array['jour_mont'] : 0;
	$date_mont = (!empty($array['date_tete'])) ? $array['date_tete'] : 0;
	
	$date_mont = explode('/', $date_mont);
	$date_mont = mktime(0, 0, 0, $date_mont[1], $date_mont[0], $date_mont[2]);
	
	// A la une
	
	$une = (!empty($array['opt_une'])) ? 1 : 0;
	$jour_une = (!empty($array['jour_une'])) ? $array['jour_une'] : 0;
	$date_une = (!empty($array['date_une'])) ? $array['date_une'] : 0;
	
	$date_une = explode('/', $date_une);
	$date_une = mktime(0, 0, 0, $date_une[1], $date_une[0], $date_une[2]);
	
	// Urgent
	
	$urg = (!empty($array['opt_urg'])) ? 1 : 0;
	$jour_urg = (!empty($array['jour_urg'])) ? $array['jour_urg'] : 0;
	$date_urg = (!empty($array['date_urg'])) ? $array['date_urg'] : 0;
	
	$date_urg = explode('/', $date_urg);
	$date_urg = mktime(0, 0, 0, $date_urg[1], $date_urg[0], $date_urg[2]);
	
	// Encadrée
	
	$enc = (!empty($array['opt_enc'])) ? 1 : 0;
	$jour_enc = (!empty($array['jour_enc'])) ? $array['jour_enc'] : 0;
	$date_enc = (!empty($array['date_enc'])) ? $array['date_enc'] : 0;
	
	$date_enc = explode('/', $date_enc);
	$date_enc = mktime(0, 0, 0, $date_enc[1], $date_enc[0], $date_enc[2]);
	
	$sql = "INSERT INTO ". PREFIX ."annonces_options VALUES(:id_ann, :mont, :jour_mont, :date_mont, :urg, :jour_urg, :date_urg, :enc, :jour_enc, :date_enc, :une, :jour_une, :date_une)
	ON DUPLICATE KEY UPDATE tete = :mont, jour_tete = :jour_mont, time_tete = :date_mont, urg = :urg, jour_urg = :jour_urg, time_urg = :date_urg, enc = :enc, jour_enc = :jour_enc, time_enc = :date_enc, une = :une, jour_une = :jour_une, time_une = :date_une";
	$req = $bdd->prepare($sql);

	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->bindValue('mont', $mont, PDO::PARAM_INT);
	$req->bindValue('jour_mont', $jour_mont, PDO::PARAM_INT);
	$req->bindValue('date_mont', $date_mont, PDO::PARAM_INT);
	$req->bindValue('urg', $urg, PDO::PARAM_INT);
	$req->bindValue('jour_urg', $jour_urg, PDO::PARAM_INT);
	$req->bindValue('date_urg', $date_urg, PDO::PARAM_INT);
	$req->bindValue('enc', $enc, PDO::PARAM_INT);
	$req->bindValue('jour_enc', $jour_enc, PDO::PARAM_INT);
	$req->bindValue('date_enc', $date_enc, PDO::PARAM_INT);
	$req->bindValue('une', $une, PDO::PARAM_INT);
	$req->bindValue('jour_une', $jour_une, PDO::PARAM_INT);
	$req->bindValue('date_une', $date_une, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."annonces_search SET urg = :urg, une = :une WHERE id_ann = :id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('urg', $urg, PDO::PARAM_INT);
	$req->bindValue('une', $une, PDO::PARAM_INT);
	$req->bindValue('id_ann', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;		
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
//Supprimer les annonces refusées
////////////////////

function delete_refus_annonces()
{
	global $conn, $param_gen;
	
	$bdd = $conn;
	
	$sql = "SELECT id_ann FROM ". PREFIX ."annonces_search WHERE etat = :etat";
	$req_delete = $bdd->prepare($sql);

	$req_delete->bindValue('etat', 3, PDO::PARAM_INT);
	$req_delete->execute();
	
	while($row = $req_delete->fetch())
	{
		$id = (int) $row['id_ann'];
		
		$images = get_images($id);

		if(is_array($images))
		{
			foreach ($images as $image_name)
			{
				if(preg_match('#^https?://#', $image_name['nom']) == false)
				{
					$del = "../images/photos/". $image_name['nom'];
					unlink($del);
				
					$del = "../images/vignettes/". $image_name['nom'];
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
					$del = "../images/photos/". $image_name['nom'];
					unlink($del);
				
					$del = "../images/vignettes/". $image_name['nom'];
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

///////////////////
//Supprimer les annonces retirées ou expirées
////////////////////

function delete_exp_annonces()
{
	global $conn, $param_gen;
	
	$bdd = $conn;
	
	$sql = "SELECT id_ann FROM ". PREFIX ."annonces_search WHERE etat = :etat";
	$req_delete = $bdd->prepare($sql);

	$req_delete->bindValue('etat', 4, PDO::PARAM_INT);
	$req_delete->execute();
	
	while($row = $req_delete->fetch())
	{
		$id = (int) $row['id_ann'];
		
		$images = get_images($id);

		if(is_array($images))
		{
			foreach ($images as $image_name)
			{
				if(preg_match('#^https?://#', $image_name['nom']) == false)
				{
					$del = "../images/photos/". $image_name['nom'];
					unlink($del);
				
					$del = "../images/vignettes/". $image_name['nom'];
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
	}
	
	$req_delete->closeCursor();
	
	return true;	
}


////////////////////////////////
//Obtenir le nombre de compte
////////////////////////////////

function get_nb_acc_gest($etat, $type)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT count(*) as total FROM ". PREFIX ."comptes WHERE etat = :etat AND type = :type";		
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$total = $reponse['total'];
	return $total;
}

////////////////////////////////
//Obtenir le nombre de comptes
////////////////////////////////
	
function get_comptes_gest_nb($etat, $type, $array) 
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$email = (!empty($array['email']) && $array['email'] != $language_adm['page_acc_val_mail']) ? $array['email'] : '';
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
	$condition = '';
	$condition .= (!empty($id_compte)) ? " AND id_compte = :id_compte" : '';
	$condition .= (!empty($email)) ? " AND email = :email" : '';
	$condition .= (!empty($cat)) ? " AND id_cat = :cat" : '';
	$condition .= (!empty($reg)) ? " AND id_reg = :reg" : '';
	
	$sql = "SELECT COUNT(*) AS id_compte FROM ". PREFIX ."comptes WHERE etat = :etat AND type = :type ". $condition ."";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($email))
	$req->bindValue('email', $email, PDO::PARAM_STR);
	
	if(!empty($cat))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($reg))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	$result = $reponse['id_compte'];
	return $result;	
}

////////////////////////////////
//Obtenir les comptes
////////////////////////////////
	
function get_comptes_gest($etat, $type, $array, $offset, $limit) 
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$email = (!empty($array['email']) && $array['email'] != $language_adm['page_acc_val_mail']) ? $array['email'] : '';
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$limit = (int) $limit;
	$offset = (int) $offset;
	
	$condition = '';
	$condition .= (!empty($id_compte)) ? " AND id_compte = :id_compte" : '';
	$condition .= (!empty($email)) ? " AND email = :email" : '';
	$condition .= (!empty($cat)) ? " AND id_cat = :cat" : '';
	$condition .= (!empty($reg)) ? " AND id_reg = :reg" : '';
	
	$sql = "SELECT id_compte, id_reg, id_cat, email, nom_ent, siret, civilite, nom, prenom, adresse, code_pos, ville, tel, email, ip
	FROM ". PREFIX ."comptes WHERE etat = :etat AND type = :type ". $condition ." ORDER BY id_compte DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', $etat, PDO::PARAM_INT);
	$req->bindValue('type', $type, PDO::PARAM_INT);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($email))
	$req->bindValue('email', $email, PDO::PARAM_STR);
	
	if(!empty($cat))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($reg))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	
	$req->execute();

	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Validation d'un compte
////////////////////////////////

function valider_compte($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "UPDATE ". PREFIX ."comptes SET etat = :etat WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Refus d'un compte
////////////////////////////////

function refuser_compte($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "UPDATE ". PREFIX ."comptes SET etat = :etat WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 3, PDO::PARAM_INT);
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Supprimer le compte
////////////////////////////////

function delete_compte($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT nom_logo FROM ". PREFIX ."boutiques WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	if(!empty($reponse['nom_logo']))
	{
		$del = "../images/logos/". $reponse['nom_logo'];
		unlink($del);
	}

	$sql = "DELETE FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "DELETE FROM ". PREFIX ."boutiques WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;	
}

////////////////////////////////
//Obtenir l'annonce
////////////////////////////////
	
function get_compte($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "SELECT id_compte, id_reg, id_dep, id_cat, nom_ent, siret, civilite, nom, prenom, adresse, code_pos, ville, tel, email
	FROM ". PREFIX ."comptes WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
	
	else return $result;	
}

////////////////////////////////
//Modifier le compte
////////////////////////////////

function modify_acc($id, $array)
{
	global $conn;
	
	$bdd = $conn;
	
	$dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$ent = (!empty($array['nom_societe'])) ? $array['nom_societe'] : '';
	$sir = (!empty($array['siret'])) ? $array['siret'] : '';
	$cod = (!empty($array['code_pos'])) ? $array['code_pos'] : '';
	$vil = (!empty($array['vil'])) ? $array['vil'] : '';
	$tel = (!empty($array['tel'])) ? $array['tel'] : '';

	$sql = "UPDATE ". PREFIX ."comptes SET id_reg = :reg, id_dep = :dep, id_cat = :cat, nom_ent = :ent, siret = :sir, civilite = :civ, nom = :nom, prenom = :prenom, adresse = :add, code_pos = :cod, ville = :vil, tel = :tel, email = :email WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('dep', $dep, PDO::PARAM_INT);
	$req->bindValue('cat', $array['cat'], PDO::PARAM_INT);
	$req->bindValue('ent', $ent, PDO::PARAM_STR);
	$req->bindValue('sir', $sir, PDO::PARAM_STR);
	$req->bindValue('civ', $array['civ'], PDO::PARAM_STR);
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('prenom', $array['prenom'], PDO::PARAM_STR);
	$req->bindValue('add', $array['add'], PDO::PARAM_STR);
	$req->bindValue('cod', $cod, PDO::PARAM_STR);
	$req->bindValue('vil', $vil, PDO::PARAM_STR);
	$req->bindValue('tel', $tel, PDO::PARAM_STR);
	$req->bindValue('email', $array['email'], PDO::PARAM_STR);
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."boutiques SET id_reg = :reg, id_dep = :dep, id_cat = :cat WHERE id_compte = :id_compte";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('reg', $array['reg'], PDO::PARAM_INT);
	$req->bindValue('dep', $dep, PDO::PARAM_INT);
	$req->bindValue('cat', $array['cat'], PDO::PARAM_INT);
	$req->bindValue('id_compte', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Obtenir le nombre de vitrine
////////////////////////////////
	
function get_vitrines_gest_nb($etat, $array) 
{
	global $conn;
	
	$bdd = $conn;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	
	$condition = "";
	$condition .= (!empty($id_compte)) ? " WHERE b.id_compte = :id_compte" : "  WHERE b.id_compte > 0";
	$condition .= (!empty($cat)) ? " AND c.id_cat = :cat" : "";
	$condition .= (!empty($reg)) ? " AND c.id_reg = :reg" : "";
	
	$sql = "SELECT COUNT(*) AS id_boutique 
	FROM ". PREFIX ."boutiques b
	LEFT JOIN ". PREFIX ."comptes c ON b.id_compte = c.id_compte ". $condition ."";
	$req = $bdd->prepare($sql);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($cat))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($reg))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	$result = $reponse['id_boutique'];
	return $result;	
}

////////////////////////////////
//Obtenir les vitrines
////////////////////////////////
	
function get_vitrines_gest($etat, $array, $offset, $limit) 
{
	global $conn;
	
	$bdd = $conn;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$limit = (int) $limit;
	$offset = (int) $offset;
	
	$condition = "";
	$condition .= (!empty($id_compte)) ? " WHERE b.id_compte = :id_compte" : " WHERE b.id_compte > 0";
	$condition .= (!empty($cat)) ? " AND c.id_cat = :cat" : "";
	$condition .= (!empty($reg)) ? " AND c.id_reg = :reg" : "";
	
	$sql = "SELECT b.id_boutique, b.titre, b.description, b.horaires, b.site_web, b.nom_logo, b.id_compte
	FROM ". PREFIX ."boutiques b
	LEFT JOIN ". PREFIX ."comptes c ON b.id_compte = c.id_compte
	". $condition ." ORDER BY b.date DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($cat))
	$req->bindValue('cat', $cat, PDO::PARAM_INT);
	
	if(!empty($reg))
	$req->bindValue('reg', $reg, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	
	$req->execute();

	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Obtenir la vitrine
////////////////////////////////
	
function get_vitrine($id)
{
	global $conn;
	
	$bdd = $conn;

	$sql = "SELECT v.id_boutique, v.titre, v.description, v.horaires, v.site_web, v.nom_logo, o.tete, o.jour_tete, o.time_tete, o.enc, o.jour_enc, o.time_enc, o.une, o.jour_une, o.time_une
	FROM ". PREFIX ."boutiques v
	LEFT JOIN ". PREFIX ."boutiques_options o ON v.id_boutique = o.id_boutique
	WHERE v.id_boutique = :id_boutique";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	
	if(empty($result))
	return false;
	
	else return $result;
}

////////////////////////////////
//Supprimer le logo
////////////////////////////////

function delete_logo($name)
{
	global $conn;
	
	$bdd = $conn;
	
	$del = "../images/logos/". $name;
	unlink($del);

	$sql = "UPDATE ". PREFIX ."boutiques SET nom_logo = '' WHERE nom_logo = :name";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('name', $name, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;		
}

////////////////////////////////
//Modifier la vitrine
////////////////////////////////

function modify_vit($id, $array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."boutiques SET titre = :tit, description = :desc, horaires = :hor, site_web = :web WHERE id_boutique = :id_boutique";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('tit', $array['tit'], PDO::PARAM_STR);
	$req->bindValue('desc', $array['desc'], PDO::PARAM_STR);
	$req->bindValue('hor', $array['hor'], PDO::PARAM_STR);
	$req->bindValue('web', $array['web'], PDO::PARAM_STR);
	$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$time = time();
	
	// Remonté
	
	$mont = (!empty($array['opt_mont'])) ? 1 : 0;
	$jour_mont = (!empty($array['jour_mont'])) ? $array['jour_mont'] : 0;
	$date_mont = (!empty($array['date_tete'])) ? $array['date_tete'] : 0;
	
	$date_mont = explode('/', $date_mont);
	$date_mont = mktime(0, 0, 0, $date_mont[1], $date_mont[0], $date_mont[2]);
	
	// A la une
	
	$une = (!empty($array['opt_une'])) ? 1 : 0;
	$jour_une = (!empty($array['jour_une'])) ? $array['jour_une'] : 0;
	
	$date_une = (!empty($array['date_une'])) ? $array['date_une'] : 0;
	
	$date_une = explode('/', $date_une);
	$date_une = mktime(0, 0, 0, $date_une[1], $date_une[0], $date_une[2]);
	
	// Encadrée
	
	$enc = (!empty($array['opt_enc'])) ? 1 : 0;
	$jour_enc = (!empty($array['jour_enc'])) ? $array['jour_enc'] : 0;
	
	$date_enc = (!empty($array['date_enc'])) ? $array['date_enc'] : 0;
	
	$date_enc = explode('/', $date_enc);
	$date_enc = mktime(0, 0, 0, $date_enc[1], $date_enc[0], $date_enc[2]);
	
	$sql = "INSERT INTO ". PREFIX ."boutiques_options VALUES(:id_boutique, :mont, :jour_mont, :date_mont, :enc, :jour_enc, :date_enc, :une, :jour_une, :date_une)
	ON DUPLICATE KEY UPDATE tete = :mont, jour_tete = :jour_mont, time_tete = :date_mont, enc = :enc, jour_enc = :jour_enc, time_enc = :date_enc, une = :une, jour_une = :jour_une, time_une = :date_une";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
	$req->bindValue('mont', $mont, PDO::PARAM_INT);
	$req->bindValue('jour_mont', $jour_mont, PDO::PARAM_INT);
	$req->bindValue('date_mont', $date_mont, PDO::PARAM_INT);
	$req->bindValue('enc', $enc, PDO::PARAM_INT);
	$req->bindValue('jour_enc', $jour_enc, PDO::PARAM_INT);
	$req->bindValue('date_enc', $date_enc, PDO::PARAM_INT);
	$req->bindValue('une', $une, PDO::PARAM_INT);
	$req->bindValue('jour_une', $jour_une, PDO::PARAM_INT);
	$req->bindValue('date_une', $date_une, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	$sql = "UPDATE ". PREFIX ."boutiques SET une = :une WHERE id_boutique = :id_boutique";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('une', $une, PDO::PARAM_INT);
	$req->bindValue('id_boutique', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;		
}

///////////////////////////////////
///Vérifier si l'email est bannie
//////////////////////////////////
	
function verify_email_ban($email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT email FROM ". PREFIX ."blacklist WHERE email = :email"; 
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	if(empty($reponse))
	return false;
	
	else return true;
}

///////////////////////////////////
///Supprimer l'email bannie
//////////////////////////////////
	
function delete_email_ban($email)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."blacklist WHERE email = :email"; 
	$req = $bdd->prepare($sql);
	
	$req->bindValue('email', $email, PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();

	return true;
}

////////////////////////////////
//Mise en cache des paramètres Paypal
/////////////////////////////////

function creer_cache_paypal($array)
{
	$act_paypal = (!empty($array['act_paypal'])) ? (int) $array['act_paypal'] : 0;
	$devise = $array['devise'];
	$email_paypal = addslashes($array['email_paypal']);
	
$param_paypal = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètres Paypal
////////////////////////////////// '. "\n" .' 
$cache_pay_paypal = array( '. "\n" .'
\'act_paypal\'       =>	\''. $act_paypal .'\',
\'devise\'           =>	\''. $devise .'\',
\'email_paypal\'     =>	\''. $email_paypal .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_pay_paypal.php', $param_paypal);	

	return true;
}

////////////////////////////////
//Mise en cache des paramètres Allopass
/////////////////////////////////

function creer_cache_allopass($array)
{
	global $cache_pay_allopass;
	
	$act_allopass = (!empty($array['act_allopass'])) ? (int) $array['act_allopass'] : 0;
	$code_securite = $array['code_securite'];
	$script1 = $array['script1'];
	$script1 = str_replace('\'', '"', $script1);
	$script2 = $array['script2'];
	$script2 = str_replace('\'', '"', $script2);
	$script3 = $array['script3'];
	$script3 = str_replace('\'', '"', $script3);
	$script4 = $array['script4'];
	$script4 = str_replace('\'', '"', $script4);
	$script5 = $array['script5'];
	$script5 = str_replace('\'', '"', $script5);
	$script6 = $array['script6'];
	$script6 = str_replace('\'', '"', $script6);
	$script7 = $array['script7'];
	$script7 = str_replace('\'', '"', $script7);
	
	rename('../includes/payment/'. $cache_pay_allopass['code_securite'], '../includes/payment/'. $code_securite);
	
$param_allopass = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètres Allopass
////////////////////////////////// '. "\n" .' 
$cache_pay_allopass = array( '. "\n" .'
\'act_allopass\'  =>	\''. $act_allopass .'\',
\'code_securite\' =>	\''. $code_securite .'\',
\'script1\'       =>	\''. $script1 .'\',
\'script2\'       =>	\''. $script2 .'\',
\'script3\'       =>	\''. $script3 .'\',
\'script4\'       =>	\''. $script4 .'\',
\'script5\'       =>	\''. $script5 .'\',
\'script6\'       =>	\''. $script6 .'\',
\'script7\'       =>	\''. $script7 .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_pay_allopass.php', $param_allopass);	

	return true;
}

////////////////////////////////
//Mise en cache des paramètres Atos
/////////////////////////////////

function creer_cache_atos($array)
{
	$act_atos = (!empty($array['act_atos'])) ? (int) $array['act_atos'] : 0;
	$id_marchand = $array['id_marchand'];
	$pays = $array['pays'];
	$devise = $array['devise'];
	
$param_atos = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètres Atos
////////////////////////////////// '. "\n" .' 
$cache_pay_atos = array( '. "\n" .'
\'act_atos\'      =>	\''. $act_atos .'\',
\'id_marchand\'   =>	\''. $id_marchand .'\',
\'pays\'          =>	\''. $pays .'\',
\'devise\'        =>	\''. $devise .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_pay_atos.php', $param_atos);	

	return true;
}

////////////////////////////////
//Mise a jour du moyen de paiement Atos
/////////////////////////////////

function update_atos($info, $array)
{
	$dir = getcwd();
	$dir = explode(DIRECTORY_SEPARATOR, $dir);
	unset($dir[count($dir) - 1]);
	$dir = implode('/', $dir);

$update_path_atos = '<?php
$c_merchant_id = \''. $info['id_marchand'] .'\';
$c_merchant_country = \''. $info['pays'] .'\';
$c_currency_code = \''. $info['devise'] .'\';
$c_pathfile = \''. $dir .'/includes/payment/atos/param/pathfile\';
$c_path_bin_req = \''. $dir .'/includes/payment/atos/bin/request\';
$c_path_bin_rep = \''. $dir .'/includes/payment/atos/bin/response\';

////////////////////////////////////////////////////////////////////////////////';
	
	file_put_contents('../includes/payment/atos/param/param.php', $update_path_atos);	
	
$update_param_atos = 'DEBUG!NO!
D_LOGO!'. URL .'/includes/payment/atos/logo/!
F_CERTIFICATE!'. $dir .'/includes/payment/atos/param/certif!
F_PARAM!'. $dir .'/includes/payment/atos/param/parmcom!
F_DEFAULT!'. $dir .'/includes/payment/atos/param/'. $array['file2']['name'] .'';
	
	file_put_contents('../includes/payment/atos/sample/pathfile', $update_param_atos);
	
	move_uploaded_file($array['file1']['tmp_name'], '../includes/payment/atos/param/' . basename($array['file1']['name']));
	move_uploaded_file($array['file2']['tmp_name'], '../includes/payment/atos/param/' . basename($array['file2']['name']));
	move_uploaded_file($array['file3']['tmp_name'], '../includes/payment/atos/param/' . basename($array['file3']['name']));
	
	return true;
}

////////////////////////////////
//Mise en cache des paramètres de paiement par chèque
/////////////////////////////////

function creer_cache_cheque($array)
{
	$act_cheque = (!empty($array['act_cheque'])) ? (int) $array['act_cheque'] : 0;
	$actif = (!empty($array['htm_cheque'])) ? (int) $array['htm_cheque'] : 0;
	
	$texte = addslashes($array['texte']);
	
$param_cheque = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Paramètres Chèque; virement...
////////////////////////////////// '. "\n" .' 
$cache_pay_cheque = array( '. "\n" .'
\'act_cheque\'     	=>	\''. $act_cheque .'\',
\'actif\'        	=>	\''. $actif .'\',
\'texte\'     		=>	\''. $texte .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_pay_cheque.php', $param_cheque);	

	return true;
}

////////////////////////////////
//Modifier la paiement des annonces par sous-catégories
///////////////////////////////////

function update_pay_ann($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$all = (!empty($array['all'])) ? (int) $array['all'] : 0;
	
	if($all == 1)
	$sql = "UPDATE ". PREFIX ."categories SET prix_par = :prix_par, prix_pro = :prix_pro, prix_par_mod = :prix_par_mod, prix_pro_mod = :prix_pro_mod, prix_par_ren = :prix_par_ren, prix_pro_ren = :prix_pro_ren";
	
	else $sql = "UPDATE ". PREFIX ."categories SET prix_par = :prix_par, prix_pro = :prix_pro, prix_par_mod = :prix_par_mod, prix_pro_mod = :prix_pro_mod, prix_par_ren = :prix_par_ren, prix_pro_ren = :prix_pro_ren WHERE id_cat = :id_cat";
	
	$req = $bdd->prepare($sql);
	
	$req->bindValue('prix_par', $array['prix_par'], PDO::PARAM_STR);
	$req->bindValue('prix_pro', $array['prix_pro'], PDO::PARAM_STR);
	$req->bindValue('prix_par_mod', $array['prix_par_mod'], PDO::PARAM_STR);
	$req->bindValue('prix_pro_mod', $array['prix_pro_mod'], PDO::PARAM_STR);
	$req->bindValue('prix_par_ren', $array['prix_par_ren'], PDO::PARAM_STR);
	$req->bindValue('prix_pro_ren', $array['prix_pro_ren'], PDO::PARAM_STR);
	
	if($all == 0)
	$req->bindValue('id_cat', $array['cat'], PDO::PARAM_INT);
	
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Creation d'une option visuelle
///////////////////////////////////

function create_visu_opt($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."options_visuelles VALUES('', :jour, :prix, :num)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('jour', $array['jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('num', $array['num'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des options visuelles
/////////////////////////////////

function creer_cache_options_visuelles()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."options_visuelles ORDER BY type, jour";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_opts_visu = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Options visuelles
////////////////////////////////// '. "\n" .' 
$cache_options_visuelles = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id = (int) $v['id'];
		$jour = (int) $v['jour'];
		$prix = (float) $v['prix'];
		$type = (int) $v['type'];
		
$cache_opts_visu .= ''. "\n" .''. $i .'=>
array(
\'id\'      => \''. $id .'\',
\'jour\'    => \''. $jour .'\',
\'prix\'    => \''. $prix .'\',
\'type\'    => \''. $type .'\',
),';

		$i++;
	}
	
$cache_opts_visu .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_options_visuelles.php', $cache_opts_visu);	

	return true;
}

////////////////////////////////
//Modification d'une option visuelle
///////////////////////////////////

function modify_visu_opt($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."options_visuelles SET jour = :jour, prix = :prix WHERE id = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('jour', $array['jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('id', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Suppression d'une option visuelle
///////////////////////////////////

function delete_visu_opt($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."options_visuelles WHERE id = :id";
	$req = $bdd->prepare($sql);

	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache de l'option photos
/////////////////////////////////

function creer_cache_option_photos($array)
{
	$nb_photo_gratuite = (int) $array['nb_photo_gratuite'];
	$nb_photo_max = (int) $array['nb_photo_max'];
	$prix_photo = (float) $array['prix_photo'];
	
$option_photos = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Option photos
////////////////////////////////// '. "\n" .' 
$cache_option_photos = array( '. "\n" .'
\'nb_photo_gratuite\'   =>	\''. $nb_photo_gratuite .'\',
\'nb_photo_max\'        =>	\''. $nb_photo_max .'\',
\'prix_photo\'          =>	\''. $prix_photo .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_option_photos.php', $option_photos);	

	return true;
}

////////////////////////////////
//Mise en cache de l'option video
/////////////////////////////////

function creer_cache_option_video($array)
{
	$actif = (!empty($array['act_video'])) ? (int) $array['act_video'] : 0;
	$prix_video = (float) $array['prix_video'];
	
$option_video = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Option vidéo
////////////////////////////////// '. "\n" .' 
$cache_option_video = array( '. "\n" .'
\'actif\'           =>	\''. $actif .'\',
\'prix_video\'      =>	\''. $prix_video .'\', '. "\n" .'
);';
	
	file_put_contents('../includes/cache/cache_option_video.php', $option_video);	

	return true;
}

////////////////////////////////
//Creation d'un pack compte
///////////////////////////////////

function create_abo_comptes($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."packs_comptes VALUES('', :nb_annonce, :nb_jour, :prix, :num)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nb_annonce', $array['nb_annonce'], PDO::PARAM_INT);
	$req->bindValue('nb_jour', $array['nb_jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('num', $array['num'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des packs comptes
/////////////////////////////////

function creer_cache_packs_comptes()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."packs_comptes ORDER BY type, nb_annonce, nb_jour";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_packs_comptes = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Packs comptes
////////////////////////////////// '. "\n" .' 
$cache_packs_comptes = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_pack = (int) $v['id_pack'];
		$nb_annonce = (int) $v['nb_annonce'];
		$nb_jour = (int) $v['nb_jour'];
		$prix = (float) $v['prix'];
		$type = (int) $v['type'];
		
$cache_packs_comptes .= ''. "\n" .''. $i .'=>
array(
\'id_pack\'      => \''. $id_pack .'\',
\'nb_annonce\'   => \''. $nb_annonce .'\',
\'nb_jour\'      => \''. $nb_jour .'\',
\'prix\'         => \''. $prix .'\',
\'type\'         => \''. $type .'\',
),';

		$i++;
	}
	
$cache_packs_comptes .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_packs_comptes.php', $cache_packs_comptes);	

	return true;
}

////////////////////////////////
//Modification d'un pack comptes
///////////////////////////////////

function modify_abo_comptes($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."packs_comptes SET nb_annonce = :nb_annonce, nb_jour = :nb_jour, prix = :prix WHERE id_pack = :id_pack";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nb_annonce', $array['nb_annonce'], PDO::PARAM_INT);
	$req->bindValue('nb_jour', $array['nb_jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('id_pack', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Suppression d'un pack comptes
///////////////////////////////////

function delete_abo_comptes($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."packs_comptes WHERE id_pack = :id_pack";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_pack', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Creation d'un pack vitrine
///////////////////////////////////

function create_abo_vitrine($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."packs_vitrine VALUES('', :nb_jour, :prix)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nb_jour', $array['nb_jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des packs vitrine
/////////////////////////////////

function creer_cache_packs_vitrine()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."packs_vitrine ORDER BY nb_jour";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_packs_vitrine = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Packs vitrine
////////////////////////////////// '. "\n" .' 
$cache_packs_vitrine = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_pack = (int) $v['id_pack'];
		$nb_jour = (int) $v['nb_jour'];
		$prix = (float) $v['prix'];
		
$cache_packs_vitrine .= ''. "\n" .''. $i .'=>
array(
\'id_pack\'      => \''. $id_pack .'\',
\'nb_jour\'      => \''. $nb_jour .'\',
\'prix\'         => \''. $prix .'\',
),';

		$i++;
	}
	
$cache_packs_vitrine .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_packs_vitrine.php', $cache_packs_vitrine);	

	return true;
}

////////////////////////////////
//Modification d'un pack vitrine
///////////////////////////////////

function modify_abo_vitrine($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."packs_vitrine SET nb_jour = :nb_jour, prix = :prix WHERE id_pack = :id_pack";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nb_jour', $array['nb_jour'], PDO::PARAM_INT);
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('id_pack', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Suppression d'un pack vitrine
///////////////////////////////////

function delete_abo_vitrine($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."packs_vitrine WHERE id_pack = :id_pack";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_pack', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Obtenir le nombre de facture
///////////////////////////////////

function get_nb_factures($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$id_ann = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : 0;
	
	$condition = '';
	
	if(!empty($array['jour']) || !empty($array['mois']) || !empty($array['annee']))
	{
		$date = 'factures/'. $array['annee'] .'/'. $array['mois'] .'/'. $array['jour'];
		$condition .= " WHERE url = :url";
	}
	else $condition .= " WHERE url != ''";
	
	if(!empty($id_compte)) $condition .= " AND id_compte = :id_compte";
	if(!empty($id_ann)) $condition .= " AND id_ann = :id_ann";
	
	$sql = "SELECT COUNT(*) as numero FROM ". PREFIX ."factures ". $condition ."";
	$req = $bdd->prepare($sql);
	
	if(isset($date))
	$req->bindValue('url', $date, PDO::PARAM_STR);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($id_ann))
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$result = $reponse['numero'];
	return $result;
}

////////////////////////////////
//Obtenir les factures
///////////////////////////////////

function get_factures($array, $offset, $limit)
{
	global $conn;
	
	$bdd = $conn;
	
	$offset = (int) $offset;
	$limit = (int) $limit;
	
	$id_compte = (!empty($array['id_compte'])) ? (int) $array['id_compte'] : 0;
	$id_ann = (!empty($array['id_ann'])) ? (int) $array['id_ann'] : 0;
	
	$condition = '';
	
	if(!empty($array['jour']) || !empty($array['mois']) || !empty($array['annee']))
	{
		$date = 'factures/'. $array['annee'] .'/'. $array['mois'] .'/'. $array['jour'];
		$condition .= " WHERE url = :url";
	}
	else $condition .= " WHERE url != ''";
	
	if(!empty($id_compte)) $condition .= " AND id_compte = :id_compte";
	if(!empty($id_ann)) $condition .= " AND id_ann = :id_ann";
	
	$sql = "SELECT id_compte, id_ann, url, numero, prix, prix_tva FROM ". PREFIX ."factures ". $condition ." ORDER BY prix LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	if(isset($date))
	$req->bindValue('url', $date, PDO::PARAM_INT);
	
	if(!empty($id_compte))
	$req->bindValue('id_compte', $id_compte, PDO::PARAM_INT);
	
	if(!empty($id_ann))
	$req->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;
}

////////////////////////////////
//Supprimer la facture
///////////////////////////////////

function delete_facture($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."factures WHERE numero = :numero";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('numero', $array['numero'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
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

///////////////////////////////////
//Insertion des annonces XML
//////////////////////////////////

function insert_ann_xml($xml)
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$str = '';
	$id_ann = '';
	
	$array_donnees = array('id_reg', 'id_dep', 'id_cat', 'email', 'password', 'code_pos', 'ville', 'statut', 'societe', 'siret', 'type', 'nom', 'tel', 'titre', 'texte', 'prix', 'tel_cache', 'xml_key');
	
	$count = 0;
	
	foreach($xml->annonces as $row)
	{
		$i = 0;
		
		// Vérification des données
		
		foreach($array_donnees as $key)
		{
			$error = (!isset($row->$key)) ? 1 : 0;
			
			if($error == 1)
			break;
			
			$i++;
		}
		
		// Insertion des annonces
		
		if($error == 0) 
		{
			$id_reg = (int) $row->id_reg;
			$id_dep = (int) $row->id_dep;
			$id_cat =  (int) $row->id_cat;
			$email = ($row->email);
			$password = ($row->password);
			$code_pos = ($row->code_pos);
			$ville = ($row->ville);
			$statut = (int) $row->statut;
			$societe = ($row->societe);
			$siret = ($row->siret);
			$type = (int) $row->type;
			$nom = ($row->nom);
			$tel = ($row->tel);
			$titre = ($row->titre);
			$texte = ($row->texte);
			$prix = (float) $row->prix;
			$time = time();
			$tel_cache = ($row->tel_cache);
			$ip = $_SERVER['REMOTE_ADDR'];
			$xml_key = ($row->xml_key);
			$photo1 = (!empty($row->photo1)) ? ($row->photo1) : '';
			$photo2 = (!empty($row->photo2)) ? ($row->photo2) : '';
			$photo3 = (!empty($row->photo3)) ? ($row->photo3) : '';
			$photo4 = (!empty($row->photo4)) ? ($row->photo4) : '';
			$photo5 = (!empty($row->photo5)) ? ($row->photo5) : '';
			$photo6 = (!empty($row->photo6)) ? ($row->photo6) : '';
			$photo7 = (!empty($row->photo7)) ? ($row->photo7) : '';
			$photo8 = (!empty($row->photo8)) ? ($row->photo8) : '';
			$photo9 = (!empty($row->photo9)) ? ($row->photo9) : '';
			$photo10 = (!empty($row->photo10)) ? ($row->photo10) : '';
			
			$n_photo = 0;
			
			for($i = 1; $i <= 10; $i++)
			{
				$nom_ph ='';

				if(!empty($photo1) && $i == 1) $nom_ph = $photo1;
				elseif(!empty($photo2) && $i == 2) $nom_ph = $photo2;
				elseif(!empty($photo3) && $i == 3) $nom_ph = $photo3;
				elseif(!empty($photo4) && $i == 4) $nom_ph = $photo4;
				elseif(!empty($photo5) && $i == 5) $nom_ph = $photo5;
				elseif(!empty($photo6) && $i == 6) $nom_ph = $photo6;
				elseif(!empty($photo7) && $i == 7) $nom_ph = $photo7;
				elseif(!empty($photo8) && $i == 8) $nom_ph = $photo8;
				elseif(!empty($photo9) && $i == 9) $nom_ph = $photo9;
				elseif(!empty($photo10) && $i == 10) $nom_ph = $photo10;
				
				if(!empty($nom_ph))
				$n_photo++;
			}
			
			$sql = "INSERT INTO ". PREFIX ."annonces (email, password, ville, nom, tel, tel_cache, ip, n_photo, last_visit, xml_key) VALUES
			(:email, :password, :ville, :nom, :tel, :tel_cache, :ip, :n_photo, NOW(), :xml_key)
			ON DUPLICATE KEY UPDATE email = VALUES(email), ville = VALUES(ville), nom = VALUES(nom), tel = VALUES(tel), tel_cache = VALUES(tel_cache), n_photo = VALUES(n_photo)";
			$req = $bdd->prepare($sql);
	
			$req->bindValue('email', $email, PDO::PARAM_STR);
			$req->bindValue('password', $password, PDO::PARAM_STR);
			$req->bindValue('ville', $ville, PDO::PARAM_STR);
			$req->bindValue('nom', $nom, PDO::PARAM_STR);
			$req->bindValue('tel', $tel, PDO::PARAM_STR);
			$req->bindValue('tel_cache', $tel_cache, PDO::PARAM_STR);
			$req->bindValue('ip', $ip, PDO::PARAM_STR);
			$req->bindValue('n_photo', $n_photo, PDO::PARAM_INT);
			$req->bindValue('xml_key', $xml_key, PDO::PARAM_STR);
			$req->execute();
			
			$id = $bdd->lastInsertId();
			
			$req->closeCursor();
			
			if(!empty($id))
			{
				if($n_photo > 0)
				$ph = 1;
				
				$sql = "INSERT INTO ". PREFIX ."annonces_search (id_ann, id_reg, id_dep, id_cat, code_pos, status, type, titre, ann, prix, etat, date, photo) VALUES";
				$sql .= "(:id_ann, :id_reg, :id_dep, :id_cat, :code_pos, :statut, :type, :titre, :texte, :prix, :etat, :time, :photo)";
				$sql .= " ON DUPLICATE KEY UPDATE id_reg = VALUES(id_reg), id_dep = VALUES(id_dep), id_cat = VALUES(id_cat), code_pos = VALUES(code_pos), titre = VALUES(titre), ann = VALUES(ann), prix = VALUES(prix)";
				$req = $bdd->prepare($sql);
		
				$req->bindValue('id_ann', $id, PDO::PARAM_INT);
				$req->bindValue('id_reg', $id_reg, PDO::PARAM_INT);
				$req->bindValue('id_dep', $id_dep, PDO::PARAM_INT);
				$req->bindValue('id_cat', $id_cat, PDO::PARAM_INT);
				$req->bindValue('code_pos', $code_pos, PDO::PARAM_STR);
				$req->bindValue('statut', $statut, PDO::PARAM_INT);
				$req->bindValue('type', $type, PDO::PARAM_INT);
				$req->bindValue('titre', $titre, PDO::PARAM_STR);
				$req->bindValue('texte', $texte, PDO::PARAM_STR);
				$req->bindValue('prix', $prix, PDO::PARAM_STR);
				$req->bindValue('etat', 2, PDO::PARAM_INT);
				$req->bindValue('time', $time, PDO::PARAM_INT);
				$req->bindValue('photo', $ph, PDO::PARAM_INT);
				$req->execute();
				$req->closeCursor();
				
				if($societe != '')
				{
					$sql_soc = "INSERT INTO ". PREFIX ."annonces_societe (id_ann, nom_societe, siret) VALUES";
					$sql_soc .= "(:id_ann, :societe, :siret) ON DUPLICATE KEY UPDATE nom_societe = VALUES(nom_societe), siret = VALUES(siret)";
					$req = $bdd->prepare($sql_soc);
					
					$req->bindValue('id_ann', $id, PDO::PARAM_INT);
					$req->bindValue('societe', $societe, PDO::PARAM_STR);
					$req->bindValue('siret', $siret, PDO::PARAM_STR);
					$req->execute();
					$req->closeCursor();
				}
				
				for($i = 1; $i <= 10; $i++)
				{
					$nom ='';
					
					if(!empty($photo1) && $i == 1) $nom = $photo1;
					elseif(!empty($photo2) && $i == 2) $nom = $photo2;
					elseif(!empty($photo3) && $i == 3) $nom = $photo3;
					elseif(!empty($photo4) && $i == 4) $nom = $photo4;
					elseif(!empty($photo5) && $i == 5) $nom = $photo5;
					elseif(!empty($photo6) && $i == 6) $nom = $photo6;
					elseif(!empty($photo7) && $i == 7) $nom = $photo7;
					elseif(!empty($photo8) && $i == 8) $nom = $photo8;
					elseif(!empty($photo9) && $i == 9) $nom = $photo9;
					elseif(!empty($photo10) && $i == 10) $nom = $photo10;
					
					if(!empty($nom))
					{
						$sql_img = "INSERT INTO ". PREFIX ."annonces_images (id_ann, nom) VALUES (:id_ann, :nom)
						ON DUPLICATE KEY UPDATE nom = VALUES(nom)";
						$req = $bdd->prepare($sql_img);
	
						$req->bindValue('id_ann', $id, PDO::PARAM_INT);
						$req->bindValue('nom', $nom, PDO::PARAM_STR);
						$req->execute();
						$req->closeCursor();
					}
				}
			}
			$count++;
		}
		else 
		{
			$error = 4;
			break;
		}
	}
	
	if(!empty($id_ann))
	creat_flux($id_ann);
	
	return $error;
}

///////////////////////////////////
//Récupération du fichier XML
//////////////////////////////////

function xml_file($date, $array) 
{
	global $conn;
	
	$bdd = $conn;

	$id_dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$xml_key = htmlspecialchars($array['xml_key']);
	
	$condition = '';
	
	if(!empty($array['reg'])) $condition .= " AND s.id_reg = :id_reg";
	if(!empty($array['dep'])) $condition .= " AND s.id_dep = :id_dep";
	if(!empty($array['cat'])) $condition .= " AND s.id_cat = :id_cat";
	
	$sql = "SELECT s.id_ann, s.id_reg, s.id_dep, s.id_cat, a.email, a.password, s.code_pos, a.ville, s.status, s.type, a.nom, a.tel, s.titre, s.ann, s.prix, a.tel_cache, sc.nom_societe, sc.siret
	FROM ". PREFIX ."annonces_search s
	LEFT JOIN ". PREFIX ."annonces a ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_societe sc ON s.id_ann = sc.id_ann
	WHERE s.etat = :etat ". $condition ." AND s.date > :date ORDER BY s.id_ann";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('etat', 2, PDO::PARAM_INT);
	
	if(!empty($array['reg']))
	$req->bindValue('id_reg', $array['reg'], PDO::PARAM_INT);
	
	if(!empty($array['dep']))
	$req->bindValue('id_dep', $id_dep, PDO::PARAM_INT);
	
	if(!empty($array['cat']))
	$req->bindValue('id_cat', $array['cat'], PDO::PARAM_INT);
	
	$req->bindValue('date', $date, PDO::PARAM_INT);
	$req->execute();

	echo "<?xml version='1.0' encoding=\"UTF-8\"?>
			<Script_PAG_XML>";
	
	while ($donnees = $req->fetch()) 
	{
		$id_ann = (int) $donnees['id_ann'];
		$id_reg = (int) $donnees['id_reg'];
		$id_dep = (int) $donnees['id_dep'];
		$id_cat = (int) $donnees['id_cat'];
		$email = htmlspecialchars($donnees['email']);
		$password = htmlspecialchars($donnees['password']);
		$code_pos = htmlspecialchars($donnees['code_pos']);
		$ville = htmlspecialchars($donnees['ville']);
		$status = (int) $donnees['status'];
		$type = (int) $donnees['type'];
		$nom = htmlspecialchars($donnees['nom']);
		$tel = htmlspecialchars($donnees['tel']);
		$titre = htmlspecialchars($donnees['titre']);
		$ann = htmlspecialchars($donnees['ann']);
		$prix = (float) $donnees['prix'];
		$tel_cache = htmlspecialchars($donnees['tel_cache']);
		$nom_societe = htmlspecialchars($donnees['nom_societe']);
		$siret = htmlspecialchars($donnees['siret']);
		
		?>
			
			<annonces>
				<id_reg><?php echo $id_reg; ?></id_reg>
				<id_dep><?php echo $id_dep; ?></id_dep>
				<id_cat><?php echo $id_cat; ?></id_cat>
				<email><?php echo $email; ?></email>
				<password><?php echo $password; ?></password>
				<code_pos><?php echo $code_pos; ?></code_pos>
				<ville><?php echo $ville; ?></ville>
				<statut><?php echo $status; ?></statut>
				<societe><?php echo $nom_societe; ?></societe>
				<siret><?php echo $siret; ?></siret>
				<type><?php echo $type; ?></type>
				<nom><?php echo $nom; ?></nom>
				<tel><?php echo $tel; ?></tel>
				<titre><?php echo $titre; ?></titre>
				<texte><?php echo $ann; ?></texte>
				<prix><?php echo $prix; ?></prix>
				<tel_cache><?php echo $tel_cache; ?></tel_cache>
		<?php
		
			$sql = "SELECT nom FROM ". PREFIX ."annonces_images WHERE id_ann = :id_ann ORDER BY id_ima";
			$req2 = $bdd->prepare($sql);
	
			$req2->bindValue('id_ann', $id_ann, PDO::PARAM_INT);
			$req2->execute();
			
			$i = 1;
			
			while ($donnees2 = $req2->fetch())
			{
				$nom_image = htmlspecialchars($donnees2['nom']);
				
				if(preg_match('#^https?://#', $nom_image) == true)
				echo '<photo'. $i .'>'. $nom_image .'</photo'. $i .'>';
				
				else echo '<photo'. $i .'>'. URL .'/images/photos/'. $nom_image .'</photo'. $i .'>';
				
				$i++;
			}
			
			$req2->closeCursor();
			
		?>
			<xml_key><?php echo $xml_key . $id_ann; ?></xml_key>
			</annonces>
		<?php
	}
	echo "</Script_PAG_XML>";
	
	$req->closeCursor();
}

////////////////////////////////
//Modification du mail automatique
//////////////////////////////////

function update_email($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."mails_auto SET nom = :nom, email = :email, titre = :titre, message = :message WHERE type = :l";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('email', $array['email'], PDO::PARAM_STR);
	$req->bindValue('titre', $array['titre'], PDO::PARAM_STR);
	$req->bindValue('message', $array['message'], PDO::PARAM_STR);
	$req->bindValue('l', $array['l'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;	
}

////////////////////////////////
//Mise en cache des mails automatiques
/////////////////////////////////

function creer_cache_mails_auto()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."mails_auto ORDER BY type";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_mails_auto = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Mails auto
////////////////////////////////// '. "\n" .' 
$cache_mails_auto = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_email = (int) $v['id_email'];
		$nom = addslashes($v['nom']);
		$email = addslashes($v['email']);
		$titre = addslashes($v['titre']);
		$message = addslashes($v['message']);
		$type = (int) $v['type'];
		
$cache_mails_auto .= ''. "\n" .''. $i .'=>
array(
\'id_email\'  => \''. $id_email .'\',
\'nom\'       => \''. $nom .'\',
\'email\'     => \''. $email .'\',
\'titre\'     => \''. $titre .'\',
\'message\'   => "'. $message .'",
\'type\'       => \''. $type .'\',
),';

		$i++;
	}
	
$cache_mails_auto .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_mails_auto.php', $cache_mails_auto);	

	return true;
}

///////////////////////////////////
//Création d'un contact
//////////////////////////////////
	
function creer_contact($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "INSERT INTO ". PREFIX ."mails_contact values('', :nom, :email)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('email', $array['email'], PDO::PARAM_STR);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des contacts
/////////////////////////////////

function creer_cache_mails_contact()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."mails_contact ORDER BY id_contact";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_mails_contact = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Mails contact
////////////////////////////////// '. "\n" .' 
$cache_mails_contact = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_contact = (int) $v['id_contact'];
		$nom = addslashes($v['nom']);
		$email = addslashes($v['email']);
		
$cache_mails_contact .= ''. "\n" .''. $i .'=>
array(
\'id_contact\'  => \''. $id_contact .'\',
\'nom\'         => \''. $nom .'\',
\'email\'       => \''. $email .'\',
),';

		$i++;
	}
	
$cache_mails_contact .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_mails_contact.php', $cache_mails_contact);	

	return true;
}
	
///////////////////////////////////
//Modification d'un contact
//////////////////////////////////
	
function update_contact($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "UPDATE ". PREFIX ."mails_contact SET nom = :nom, email = :email WHERE id_contact = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('nom', $array['nom'], PDO::PARAM_STR);
	$req->bindValue('email', $array['email'], PDO::PARAM_STR);
	$req->bindValue('id', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}	
	
///////////////////////////////////
//Supprimer un contact
//////////////////////////////////

function delete_contact($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."mails_contact WHERE id_contact = :id";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}	

///////////////////////////////////
//Création d'une page
//////////////////////////////////
	
function creer_page($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$edition = (!empty($array['edition'])) ? (int) $array['edition'] : 0;
	
	$sql = "INSERT INTO ". PREFIX ."pages values('', :titre, :texte, :edition)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('titre', $array['titre'], PDO::PARAM_STR);
	$req->bindValue('texte', $array['texte'], PDO::PARAM_STR);
	$req->bindValue('edition', $edition, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des contacts
/////////////////////////////////

function creer_cache_pages()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."pages ORDER BY id_page";
	$req = $bdd->prepare($sql);
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_pages = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Mails pages
////////////////////////////////// '. "\n" .' 
$cache_pages = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_page = (int) $v['id_page'];
		$titre = addslashes($v['titre']);
		$texte = addslashes($v['texte']);
		$edition = (int) $v['edition'];
		
$cache_pages .= ''. "\n" .''. $i .'=>
array(
\'id_page\'  => \''. $id_page .'\',
\'titre\'    => \''. $titre .'\',
\'texte\'    => "'. $texte .'",
\'edition\'  => \''. $edition .'\',
),';

		$i++;
	}
	
$cache_pages .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_pages.php', $cache_pages);	

	return true;
}

////////////////////////////////
//Modifier la page
//////////////////////////////////

function update_page($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$edition = (!empty($array['edition'])) ? (int) $array['edition'] : 0;
	
	$sql = "UPDATE ". PREFIX ."pages SET titre = :titre, texte =:texte, edition = :edition WHERE id_page = :id_page";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('titre', $array['titre'], PDO::PARAM_STR);
	$req->bindValue('texte', $array['texte'], PDO::PARAM_STR);
	$req->bindValue('edition', $edition, PDO::PARAM_INT);
	$req->bindValue('id_page', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;					
}

///////////////////////////////////
//Supprimer une page
//////////////////////////////////

function delete_page($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."pages WHERE id_page = :id_page";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_page', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

///////////////////////////////////
//Création d'une pub
//////////////////////////////////
	
function creer_pub($array, $image)
{
	global $conn;
	
	$bdd = $conn;
	
	$id_cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$id_reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$id_dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$nom = (!empty($array['nom'])) ? $array['nom'] : '';
	$image = (!empty($image)) ? $image : '';
	$url = (!empty($array['url'])) ? $array['url'] : '';
	$text = (!empty($array['text'])) ? $array['text'] : '';
	$script = (!empty($array['script'])) ? $array['script'] : '';
	
	$sql = "INSERT INTO ". PREFIX ."publicites values('', :id_cat, :id_reg, :id_dep, :nom, :image, :url, :text, '$script', :type)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_reg', $id_reg, PDO::PARAM_INT);
	$req->bindValue('id_dep', $id_dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $id_cat, PDO::PARAM_INT);
	$req->bindValue('nom', $nom, PDO::PARAM_STR);
	$req->bindValue('image', $image, PDO::PARAM_STR);
	$req->bindValue('url', $url, PDO::PARAM_STR);
	$req->bindValue('text', $text, PDO::PARAM_STR);
	$req->bindValue('type', $array['type'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des pub
/////////////////////////////////

function creer_cache_publicites()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."publicites ORDER BY id_pub";
	$req = $bdd->prepare($sql); 
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_publicites = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Publicites
////////////////////////////////// '. "\n" .' 
$cache_publicites = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id_pub = (int) $v['id_pub'];
		$id_cat = (int) $v['id_cat'];
		$id_reg = (int) $v['id_reg'];
		$id_dep = (int) $v['id_dep'];
		$nom = addslashes($v['nom']);
		$image = $v['image'];
		$url = $v['url'];
		$text = addslashes($v['text']);
		$script = $v['script'];
		$script = str_replace('\'', '"', $script);
		$type = (int) $v['type'];
		
$cache_publicites .= ''. "\n" .''. $i .'=>
array(
\'id_pub\'    => \''. $id_pub .'\',
\'id_cat\'    => \''. $id_cat .'\',
\'id_reg\'    => \''. $id_reg .'\',
\'id_dep\'    => \''. $id_dep .'\',
\'nom\'       => \''. $nom .'\',
\'image\'     => \''. $image .'\',
\'url\'       => \''. $url .'\',
\'text\'      => \''. $text .'\',
\'script\'    => \''. $script .'\',
\'type\'      => \''. $type .'\',
),';

		$i++;
	}
	
$cache_publicites .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_publicites.php', $cache_publicites);	

	return true;
}

////////////////////////////////
//Modifier la pub
//////////////////////////////////

function update_pub($array, $image)
{
	global $conn;
	
	$bdd = $conn;
	
	$id_cat = (!empty($array['cat'])) ? (int) $array['cat'] : 0;
	$id_reg = (!empty($array['reg'])) ? (int) $array['reg'] : 0;
	$id_dep = (!empty($array['dep'])) ? (int) $array['dep'] : 0;
	$nom = (!empty($array['nom'])) ? $array['nom'] : '';
	$url = (!empty($array['url'])) ? $array['url'] : '';
	$text = (!empty($array['text'])) ? $array['text'] : '';
	$script = (!empty($array['script'])) ? $array['script'] : '';
	
	$sql = "UPDATE ". PREFIX ."publicites SET id_cat = :id_cat, id_reg = :id_reg, id_dep = :id_dep, nom = :nom, image = :image, url = :url, text = :text, script = '$script' WHERE id_pub = :id_pub";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_reg', $id_reg, PDO::PARAM_INT);
	$req->bindValue('id_dep', $id_dep, PDO::PARAM_INT);
	$req->bindValue('id_cat', $id_cat, PDO::PARAM_INT);
	$req->bindValue('nom', $nom, PDO::PARAM_STR);
	$req->bindValue('image', $image, PDO::PARAM_STR);
	$req->bindValue('url', $url, PDO::PARAM_STR);
	$req->bindValue('text', $text, PDO::PARAM_STR);
	$req->bindValue('id_pub', $array['id'], PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;					
}

///////////////////////////////////
//Supprimer la pub
//////////////////////////////////

function delete_pub($id, $image)
{
	global $conn;
	
	$bdd = $conn;
	
	if(!empty($image)) 
	unlink("../images/pub/$image");
	
	$sql = "DELETE FROM ". PREFIX ."publicites WHERE id_pub = :id_pub";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_pub', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache de la maintenance
/////////////////////////////////

function creer_cache_maintenance($array)
{
	$actif = (!empty($array['actif'])) ? (int) $array['actif'] : 0;
	$ip = addslashes($array['ip']);
	
$param_maintenance = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Maintenance
////////////////////////////////// '. "\n" .' 
$cache_maintenance = array( '. "\n" .'
\'actif\'      =>	\''. $actif .'\',
\'ip\'         =>	\''. $ip .'\',
);';
	
	file_put_contents('../includes/cache/cache_maintenance.php', $param_maintenance);	

	return true;
}

///////////////////
//Supprimer les options visuelles annonce expirées
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

////////////////////////////////
//Creation d'un code de réduction
///////////////////////////////////

function create_code_reduc($array)
{
	global $conn;
	
	$bdd = $conn;
	
	$type = (int) $array['type'];
	$val1 = (isset($array['val1'])) ? (int) $array['val1'] : 0;
	$val2 = (isset($array['val2'])) ? (int) $array['val2'] : 0;
	$val3 = (isset($array['val3'])) ? (int) $array['val3'] : 0;
	$val4 = (isset($array['val4'])) ? (int) $array['val4'] : 0;
	$val5 = (isset($array['val5'])) ? (int) $array['val5'] : 0;
	$val6 = (isset($array['val6'])) ? (int) $array['val6'] : 0;
	
	$sql = "INSERT INTO ". PREFIX ."code_reduc VALUES('', :prix, :code, :type, :val1, :val2, :val3, :val4, :val5, :val6)";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('code', $array['code'], PDO::PARAM_STR);
	$req->bindValue('type', $array['type'], PDO::PARAM_INT);
	$req->bindValue('val1', $val1, PDO::PARAM_INT);
	$req->bindValue('val2', $val2, PDO::PARAM_INT);
	$req->bindValue('val3', $val3, PDO::PARAM_INT);
	$req->bindValue('val4', $val4, PDO::PARAM_INT);
	$req->bindValue('val5', $val5, PDO::PARAM_INT);
	$req->bindValue('val6', $val6, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Mise en cache des codes de réductions
/////////////////////////////////

function creer_cache_code_reduc()
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT * FROM ". PREFIX ."code_reduc ORDER BY prix";
	$req = $bdd->prepare($sql); 
	
	$req->execute();

	$result = result_to_array($req);
	
$cache_code_reduc = '<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// '. "\n" .'
############################################################ '. "\n" .'
///////////////////////////////////
//Codes de réduction
////////////////////////////////// '. "\n" .' 
$cache_code_reduc = array(';
	
	$i = 0;
	
	foreach($result as $v)
	{
		$id = (int) $v['id_code'];
		$prix = (float) $v['prix'];
		$code = $v['code'];
		$type = (int) $v['type'];
		$val1 = (int) $v['val1'];
		$val2 = (int) $v['val2'];
		$val3 = (int) $v['val3'];
		$val4 = (int) $v['val4'];
		$val5 = (int) $v['val5'];
		$val6 = (int) $v['val6'];
		
$cache_code_reduc .= ''. "\n" .''. $i .'=>
array(
\'id\'      => \''. $id .'\',
\'prix\'    => \''. $prix .'\',
\'code\'    => \''. $code .'\',
\'type\'    => \''. $type .'\',
\'val1\'    => \''. $val1 .'\',
\'val2\'    => \''. $val2 .'\',
\'val3\'    => \''. $val3 .'\',
\'val4\'    => \''. $val4 .'\',
\'val5\'    => \''. $val5 .'\',
\'val6\'    => \''. $val6 .'\',
),';

		$i++;
	}
	
$cache_code_reduc .= ''. "\n" .');';
	
	file_put_contents('../includes/cache/cache_code_reduc.php', $cache_code_reduc);	

	return true;
}

////////////////////////////////
//Modification d'un code de réduction
///////////////////////////////////

function modify_code_reduc($array, $id)
{
	global $conn;
	
	$bdd = $conn;
	
	$val1 = (isset($array['val1'])) ? (int) $array['val1'] : 0;
	$val2 = (isset($array['val2'])) ? (int) $array['val2'] : 0;
	$val3 = (isset($array['val3'])) ? (int) $array['val3'] : 0;
	$val4 = (isset($array['val4'])) ? (int) $array['val4'] : 0;
	$val5 = (isset($array['val5'])) ? (int) $array['val5'] : 0;
	$val6 = (isset($array['val6'])) ? (int) $array['val6'] : 0;
	
	$sql = "UPDATE ". PREFIX ."code_reduc SET prix = :prix, code = :code, type = :type, val1 = :val1, val2 = :val2, val3 = :val3, val4 = :val4, val5 = :val5, val6 = :val6 WHERE id_code = :id_code";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('prix', $array['prix'], PDO::PARAM_STR);
	$req->bindValue('code', $array['code'], PDO::PARAM_STR);
	$req->bindValue('type', $array['type'], PDO::PARAM_INT);
	$req->bindValue('val1', $val1, PDO::PARAM_INT);
	$req->bindValue('val2', $val2, PDO::PARAM_INT);
	$req->bindValue('val3', $val3, PDO::PARAM_INT);
	$req->bindValue('val4', $val4, PDO::PARAM_INT);
	$req->bindValue('val5', $val5, PDO::PARAM_INT);
	$req->bindValue('val6', $val6, PDO::PARAM_INT);
	$req->bindValue('id_code', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Suppression d'un code de réduction
///////////////////////////////////

function delete_code_reduc($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."code_reduc WHERE id_code = :id_code";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_code', $id, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
	
	return true;
}

////////////////////////////////
//Obtenir le nombre d'annonces
////////////////////////////////
	
function get_email_filtre_nb() 
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT COUNT(id_mail) AS total FROM ". PREFIX ."filtre_mails";
	$req = $bdd->prepare($sql);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();

	$result = $reponse['total'];
	return $result;	
}

////////////////////////////////
//Obtenir les mails du filtrage
////////////////////////////////
	
function get_email_filtre($offset, $limit) 
{
	global $conn;
	
	$bdd = $conn;
	
	$limit = (int) $limit;
	$offset = (int) $offset;
	
	$sql = "SELECT id_mail, id_ann, nom, email, email_annonceur, message, ip, date FROM ". PREFIX ."filtre_mails ORDER BY date DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('offset', $offset, PDO::PARAM_INT);
	$req->bindValue('limit', $limit, PDO::PARAM_INT);
	$req->execute();

	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Obtenir le mail à envoyer
////////////////////////////////
	
function get_email_filtre_send($id_mail) 
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "SELECT nom, email, tel, message FROM ". PREFIX ."filtre_mails WHERE id_mail = :id_mail";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_mail', $id_mail, PDO::PARAM_INT);
	$req->execute();

	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Suppréssion du mail
////////////////////////////////
	
function delete_filtre_mail($id_mail) 
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."filtre_mails WHERE id_mail = :id_mail";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_mail', $id_mail, PDO::PARAM_INT);
	$req->execute();
	$req->closeCursor();
}

////////////////////////////////
//Obtenir le nombre d'achat
////////////////////////////////

function get_nb_achats($array)
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_achat = (!empty($array['id_achat'])) ? (int) $array['id_achat'] : 0;
	$email = (!empty($array['email']) && $array['email'] != $language_adm['page_achat_email']) ? $array['email'] : '';
		
	$condition = (!empty($id_achat)) ? " id_achat = :id_achat" : " a.id_achat != :id_achat";
	$condition .= (!empty($email)) ? " AND (i.email = :email OR c.email = :email)" : '';
	
	$sql = "SELECT count(*) as total FROM ". PREFIX ."achat a
	LEFT JOIN ". PREFIX ."annonces i ON i.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_search s ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."boutiques b ON b.id_boutique = a.id_boutique
	LEFT JOIN ". PREFIX ."comptes c ON c.id_compte = a.id_compte OR c.id_compte = b.id_compte OR c.id_compte = s.id_compte
	WHERE ". $condition ."";		
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	
	if(!empty($email))
	$req->bindValue('email', $email, PDO::PARAM_STR);
	
	$req->execute();
	
	$reponse = $req->fetch();
	
	$req->closeCursor();
	
	$total = $reponse['total'];
	return $total;
}

////////////////////////////////
//Obtenir les achats
////////////////////////////////
	
function get_achats_gest($array, $offset, $limit) 
{
	global $conn, $language_adm;
	
	$bdd = $conn;
	
	$id_achat = (!empty($array['id_achat'])) ? (int) $array['id_achat'] : 0;
	$email = (!empty($array['email']) && $array['email'] != $language_adm['page_achat_email']) ? $array['email'] : '';
	
	$limit = (int) $limit;
	$offset = (int) $offset;
	
	$condition = (!empty($id_achat)) ? " a.id_achat = :id_achat" : ' a.id_achat != :id_achat';
	$condition .= (!empty($email)) ? " AND (i.email = :email OR c.email = :email)" : '';
	
	$sql = "SELECT a.id_achat, a.type_achat, a.id_ann, a.id_compte, a.id_boutique, a.time, a.prix, a.prix_tva, i.email as email_ann, i.nom as nom_ann, s.id_compte as v_compte, c.nom_ent, c.nom, c.prenom, c.email
	FROM ". PREFIX ."achat a
	LEFT JOIN ". PREFIX ."annonces i ON i.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."annonces_search s ON s.id_ann = a.id_ann
	LEFT JOIN ". PREFIX ."boutiques b ON b.id_boutique = a.id_boutique
	LEFT JOIN ". PREFIX ."comptes c ON c.id_compte = a.id_compte OR c.id_compte = b.id_compte OR c.id_compte = s.id_compte
	WHERE ". $condition ." ORDER BY time DESC LIMIT :offset, :limit";
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_achat', $id_achat, PDO::PARAM_INT);
	
	if(!empty($email))
	$req->bindValue('email', $email, PDO::PARAM_STR);
	
	$req->bindValue(':offset', $offset, PDO::PARAM_INT);
	$req->bindValue(':limit', $limit, PDO::PARAM_INT);
	$req->execute();
	
	$result = result_to_array($req);
	return $result;	
}

////////////////////////////////
//Supprimer l'achat
////////////////////////////////

function delete_achat($id)
{
	global $conn;
	
	$bdd = $conn;
	
	$sql = "DELETE FROM ". PREFIX ."achat WHERE id_achat = :id_achat";		
	$req = $bdd->prepare($sql);
	
	$req->bindValue('id_achat', $id, PDO::PARAM_INT);
	$req->execute();
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
	global $conn, $language_adm, $param_gen;
	
	$bdd = $conn;
	
	//Url et fichier de la facture
	
	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	$url = 'factures/'. $annee .'/'. $mois .'/'. $jour;
	
	if($param_gen['auto_fact'] == 1)
	{
		if(!is_dir('../'. $url))
		{
			mkdir('../'. $url, 0777, true);
			chmod('../factures/'. $annee, 0777);
			chmod('../factures/'. $annee .'/'. $mois, 0777);
			chmod('../factures/'. $annee .'/'. $mois .'/'. $jour, 0705);
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
			$add = addslashes($language_adm['fact_add']);
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
		$nom_produit = $language_adm['fact_nom1'];
		send_payment_1($email, $id, $id_ann, $url, $numero, $titre);
	}
		
	if($type == 2)
	{
		$nom_produit = $language_adm['fact_nom2'];
		send_payment_2($email, $id, $id_ann, $url, $numero, $titre);
	}
	
	if($type == 3)
	{
		$nom_produit = $language_adm['fact_nom4'];
		send_payment_3($email, $id, $url, $numero);
	}
	
	if($type == 4)
	{
		$nom_produit = $language_adm['fact_nom5'];
		send_payment_4($email, $id, $url, $numero);
	}
	
	if($type == 5)
	{
		$nom_produit = $language_adm['fact_nom3'];
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
	
		$nom_tva = (!empty($param_gen['tva_ent']) && !empty($param_gen['tva_taux'])) ? $param_gen['tva_ent'] : $language_adm['fact_no_tva'];
	
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
$pdf->Cell(0, 3, \''. utf8_decode($language_adm['fact_lieu1']) .' '. utf8_decode($vil_ent) .' '. utf8_decode($language_adm['fact_lieu2']) .' : '. $date .'\', 0, 1, \'R\');
$pdf->Ln(10);

$pdf->Cell(0, 3, \''. utf8_decode($language_adm['fact_tva']) .' : '. utf8_decode($nom_tva) .'\', 0, 1);
$pdf->Cell(100, 3, \'\', 0, 0);
$pdf->Cell(90, 3, \''. utf8_decode($language_adm['fact_num']) .''. $numero .'\', 0, 0, \'R\');
$pdf->Ln(10);

$pdf->SetFont(\'Arial\', \'B\', 8);

$pdf->Cell(100, 5,\''. utf8_decode($language_adm['fact_prod']) .'\', 1, 0, \'C\');
$pdf->Cell(45, 5, \''. utf8_decode($language_adm['fact_prix']) .'\', 1, 1, \'C\');

$pdf->SetFont(\'Arial\', \'\', 8);

$pdf->Cell(100, 5, \''. utf8_decode($nom_produit) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language_adm['fact_tva2']) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix_tva) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language_adm['fact_total']) .'\', 1, 0);
$pdf->Cell(45, 5, \''. utf8_decode($prix_total) .' '. $devise .'\', 1, 1, \'R\');

$pdf->Cell(100, 5, \''. utf8_decode($language_adm['fact_net']) .'\', 1, 0);
$pdf->Cell(45, 5, \'0,00 '. $devise .'\', 1, 1, \'R\');

$pdf->Output();';
	
		file_put_contents('../'. $url .'/'. $id .'-'. $numero .'.php', $texte);
	}
}

///////////////////
//Envoyer la newsletter
////////////////////

function newsletter($array, $type)
{
	global $conn;
	
	$bdd = $conn;
	
	$format = (!empty($array['edition'])) ? (int) $array['edition'] : 0;
	$sujet = htmlspecialchars($array['sujet'], ENT_QUOTES);
	
	if(!empty($format))
	$message_mail = $array['message'];
	
	else $message_mail = htmlspecialchars($array['message'], ENT_QUOTES);
	
	if($type == 1)
	$sql = "SELECT DISTINCT email FROM ". PREFIX ."annonces";
	
	if($type == 2)
	$sql = "SELECT DISTINCT email FROM ". PREFIX ."comptes WHERE type = 1";
	
	if($type == 3)
	$sql = "SELECT DISTINCT email FROM ". PREFIX ."comptes WHERE type = 2";
	
	$req_delete = $bdd->prepare($sql);

	$req_delete->execute();
	
	while($row = $req_delete->fetch())
	{		
		$email = stripslashes($row['email']);
		
		send_newsletter($email, $format, $sujet, $message_mail);
	}
	
	$req_delete->closeCursor();
	
	return true;	
}
