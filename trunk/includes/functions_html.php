<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

/// ----- HEADER ACCUEIL -----  ///

function htm_header_acc($title, $description, $words)
{
	global $language, $param_gen, $cache_publicites, $cache_nombre_annonce;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php if(!empty($title)) echo $title; ?></title>

<meta name="Description" content="<?php if (!empty($description)) echo $description; ?>" />
<meta name="Keywords" lang="fr" content="<?php if (!empty($words)) echo $words; ?>" />
<meta name="Robots" content="all" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<link rel="stylesheet" type="text/css" href="style/screen.css" />
<link rel="stylesheet" type="text/css" href="style/structure.css" />
<link rel="stylesheet" type="text/css" href="style/style.css" />

</head>

<body>

<div id="mast">
	<div>
		<h1><img src="img/logo.png" width="318" height="100" alt="MegaDeals - petites annonces faciles et gratuites" /></h1>
		<div class="info">
			<?php
			if(empty($_SESSION['connect']))
			{
				if($param_gen['actif_acc'] == 2 || $param_gen['actif_acc'] == 3) {
					echo '<p><a href="acc_conn.php?type=1">Login Member</a></p>';
				}
				if($param_gen['actif_acc'] > 1) {
					echo '<p><a href="acc_conn.php?type=2">Login PRO</a></p>';
				}
			}
			else 
			{
				echo '<p><a href="acc_bord.php">My Account</a></p>';
				echo '<p><a href="acc_logout.php">LogOut</a></p>';
			}
			?>
			<div class="publisher">
				<a href="#" class="btnStyle">Publier une annonce gratuite</a>
			</div>
		</div>
	</div>
</div>

<div id="main-global">
	<div id="nav">
		<ul>
			<li><span>home</span></li>
			<li><a href="#">all wanted</a></li>
			<li><a href="#">all swaps</a></li>
			<li><a href="#">all donations</a></li>
			<li><a href="#">online shop</a></li>
			<li><a href="#">Help</a></li>
		</ul>
	</div>
	
	<form action="#" method="post" class="searchFrm">
		<input type="text" id="inpSearch" value="We have 3456 900 annonces for you" />
		<input type="text" id="inpPstCode" value="Postcode or location" />
		<input type="submit" value="" />
		<select name="distance" id="distance">
			<option value="0">0 km</option>
			<option value="1">5 km</option>
			<option value="2">10 km</option>
			<option value="3">15 km</option>
			<option value="4">20 km</option>
		</select>
		<ul class="listPays">
			<li><a href="javascript:;">Alsace</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Aquitaine</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Auvergne</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Basse-Normandie</a></li>
			<li><a href="javascript:;">Bourgogne</a></li>
			<li><a href="javascript:;">Bretagne</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Centre</a></li>
			<li><a href="javascript:;">Champagne-Ardenne</a></li>
			<li><a href="javascript:;">Corse</a></li>
			<li><a href="javascript:;">Franche-Comté</a></li>
			<li><a href="javascript:;">Haute-Normandie</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Île-de-France</a></li>
			<li><a href="javascript:;">Languedoc-Roussillon</a></li>
			<li><a href="javascript:;">Limousin</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Lorraine</a></li>
			<li><a href="javascript:;">Midi-Pyrénées</a></li>
			<li><a href="javascript:;">Nord-Pas-de-Calais</a></li>
			<li><a href="javascript:;">Pays-de-la-Loire</a></li>
			<li><a href="javascript:;">Picardie</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">Poitou-Charentes</a></li>
			<li><a href="javascript:;">P.A.C.A.</a></li>
			<li><a href="javascript:;">Rhône-Alpes</a></li>
			
			<li class="otherLink"><a href="#">Guadeloupe</a></li>
			<li><a href="javascript:;">Martinique</a></li>
			<li><a href="javascript:;">Guyane</a></li>
			<li><a href="javascript:;">Réunion</a>
				<ul>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum dolores lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum lor</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum lorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
					<li><a href="javascript:;">City lorem ipsumlorem</a></li>
					<li><a href="javascript:;">City lorem ipsum</a></li>
				</ul>
			</li>
		</ul>
	</form>
</div>

<?php
/*
$image = '';
$url = '';

foreach($cache_publicites as $v)
{
	if($v['type'] == 4)
	{
		$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
		$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
	}
}

if(!empty($image)) echo '<a id="fond" style=\'background: url("images/pub/'. $image .'") center top;\' href="'. $url .'" onclick="window.open(this.href); return false;"></a><a href="'. $url .'"><p style="height: 170px;"></p></a>';
*/
?>
<!--
<div id="fond_site_1">
<div id="fond_site_2">

<?php 
/*
	if(is_dir('install')) echo '<div><span class="error">'. $language['error_install_file'] .'</span></div>'; 
	if(is_dir('admin')) echo '<div><span class="error">'. $language['error_admin_file'] .'</span></div>'; 
	if(is_dir('cron')) echo '<div><span class="error">'. $language['error_cron_file'] .'</span></div>';
*/
?>

<div id="haut_site">

	<div id="haut_site_logo">
		<p><a href="<?php echo URL; ?>"><img src="images/logo.png" alt="<?php if(!empty($title)) echo stripslashes(htmlspecialchars($title, ENT_QUOTES)); ?>" /></a></p>
	</div>
	
	<div id="haut_site_pub">
		<?php
			/*
			$image = '';
			$url = '';
			$script = '';
			
			foreach($cache_publicites as $v)
			{
				if($v['id_pub'] == 1)
				{
					$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
					$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
					$script = $v['script'];
				}
			}
			
			if (!empty($script))
			echo $script;
			
			else echo '<p><a href="'. $url .'" onclick="window.open(this.href); return false;"><img src="images/pub/'. $image .'" alt="" /></a></p>';
			*/
		?>
	</div>
	
</div>

<div id="barre_liens_fond">

	<div id="barre_liens">
		<ul class="ul_barre">
			<li class="li_barre"><a href="<?php// echo URL; ?>"><?php// echo $language['lien_accueil']; ?></a></li>
			<li class="li_barre"><strong><a href="ann_type.php?type=1"><?php echo $language['lien_offres']; ?></a></strong></li>
			<li class="li_barre"><a href="ann_type.php?type=2"><?php// echo $language['lien_recherches']; ?></a></li>
			<?php// if($param_gen['active_ech'] == 1) echo '<li class="li_barre"><a href="ann_type.php?type=3">'. $language['lien_echanges'] .'</a></li>'; ?>
			<?php// if($param_gen['active_don'] == 1) echo '<li class="li_barre"><a href="ann_type.php?type=4">'. $language['lien_dons'] .'</a></li>'; ?>
			<?php// if($param_gen['actif_acc'] > 1 && $param_gen['active_bout'] == 1) echo '<li class="li_barre"><a href="boutiques_search.php">'. $language['lien_boutiques'] .'</a></li>'; ?>
		</ul>
	</div>
	
	<div id="barre_liens_depot">
		<a href="<?php// if($param_gen['actif_acc'] == 2 && !isset($_SESSION['connect'])) echo 'acc_info.php'; else echo 'deposer-une-annonce.htm'; ?>"><img src="images/bouton_depot.png" alt="" /></a>
	</div>
	
</div>
-->
<?php
}


/// ----- HEADER PRINCIPAL -----  ///

function htm_header($title, $description, $words)
{
	global $language, $param_gen, $cache_publicites, $cache_nombre_annonce;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php if(!empty($title)) echo htmlspecialchars($title); ?></title>

<meta name="Description" content="<?php if (!empty($description)) echo htmlspecialchars($description); ?>" />
<meta name="Keywords" lang="fr" content="<?php if (!empty($words)) echo $words; ?>" />
<meta name="Robots" content="all" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<link rel="stylesheet" type="text/css" href="style/screen.css" />

<script type="text/javascript">
function autoCompOff(){
     var nodeList = document.getElementsByTagName("input");
     for(item in nodeList) {
  nodeList[item].setAttribute("autocomplete","off");
     };
}
window.onload = function(){
if((navigator.userAgent.toLowerCase().match('safari')) || 
(navigator.userAgent.toLowerCase().match('chrome'))){
         autoCompOff();
     }
};
</script>

</head>

<body>

<div id="top_header">

	<div id="menu_top_header">
	
		<ul id="left_top_header">
			<?php 

			if(empty($_SESSION['connect']))
			{
				if($param_gen['actif_acc'] == 2 || $param_gen['actif_acc'] == 3) echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_conn.php?type=1">'. $language['lien_compte'] .'</a></li>';
				if($param_gen['actif_acc'] > 1) echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_conn.php?type=2">'. $language['lien_compte_pro'] .'</a></li>'; 
			}
			else 
			{
				echo '<li class="li_top_header"><span class="" />'. $language['lien_bienvenue'] .' '. $_SESSION['prenom'] .'</span></li>';
				echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_bord.php">'. $language['compte_lien_bord1'] .'</a></li>';
				echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_logout.php">'. $language['compte_lien_bord5'] .'</a></li>';
			}
						
			?>
		</ul>
		
		<div id="right_top_header">
			<p id="p_top_header"><span class="vert_1"><?php echo $cache_nombre_annonce['total']; ?></span> <?php echo $language['nombre_annonce']; ?></p>
		</div>
	
	</div>

</div>

<?php

$image = '';
$url = '';

foreach($cache_publicites as $v)
{
	if($v['type'] == 4)
	{
		$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
		$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
	}
}

if(!empty($image)) echo '<a id="fond" style=\'background: url("images/pub/'. $image .'") center top;\' href="'. $url .'" onclick="window.open(this.href); return false;"></a><a href="'. $url .'"><p style="height: 170px;"></p></a>';

?>

<div id="fond_site_1">
<div id="fond_site_2">

<?php 

	if(is_dir('install')) echo '<div><span class="error">'. $language['error_install_file'] .'</span></div>'; 
	if(is_dir('admin')) echo '<div><span class="error">'. $language['error_admin_file'] .'</span></div>'; 
	if(is_dir('cron')) echo '<div><span class="error">'. $language['error_cron_file'] .'</span></div>';

?>

<div id="haut_site">

	<div id="haut_site_logo">
		<p><a href="<?php echo URL; ?>"><img src="images/logo.png" alt="<?php if(!empty($title)) echo stripslashes(htmlspecialchars($title, ENT_QUOTES)); ?>" /></a></p>
	</div>
	
	<div id="haut_site_pub">
		<?php
		
			$image = '';
			$url = '';
			$script = '';
			
			foreach($cache_publicites as $v)
			{
				if($v['id_pub'] == 1)
				{
					$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
					$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
					$script = $v['script'];
				}
			}
			
			if (!empty($script))
			echo $script;
			
			else echo '<p><a href="'. $url .'" onclick="window.open(this.href); return false;"><img src="images/pub/'. $image .'" alt="" /></a></p>';
			
		?>
	</div>
	
</div>

<div id="barre_liens_fond">

	<div id="barre_liens">
		<ul class="ul_barre">
			<li class="li_barre"><a href="<?php echo URL; ?>"><?php echo $language['lien_accueil']; ?></a></li>
			<li class="li_barre"><strong><a href="ann_type.php?type=1"><?php echo $language['lien_offres']; ?></a></strong></li>
			<li class="li_barre"><a href="ann_type.php?type=2"><?php echo $language['lien_recherches']; ?></a></li>
			<?php if($param_gen['active_ech'] == 1) echo '<li class="li_barre"><a href="ann_type.php?type=3">'. $language['lien_echanges'] .'</a></li>'; ?>
			<?php if($param_gen['active_don'] == 1) echo '<li class="li_barre"><a href="ann_type.php?type=4">'. $language['lien_dons'] .'</a></li>'; ?>
			<?php if($param_gen['actif_acc'] > 1 && $param_gen['active_bout'] == 1) echo '<li class="li_barre"><a href="boutiques_search.php">'. $language['lien_boutiques'] .'</a></li>'; ?>
		</ul>
	</div>
	
	<div id="barre_liens_depot">
		<a href="<?php if($param_gen['actif_acc'] == 2 && !isset($_SESSION['connect'])) echo 'acc_info.php'; else echo 'deposer-une-annonce.htm'; ?>"><img src="images/bouton_depot.png" alt="" /></a>
	</div>
	
</div>

<?php
}

/// ----- ANNONCES PREMIUM -----  ///

function htm_top_ads($array)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_categories;
	
?>

<div id="menu_an_premium">

<?php

if(is_array($array))
{
	foreach ($array as $row)
	{
		$id = (int) $row['id_ann'];
		$titre = stripslashes(htmlspecialchars($row['titre']));
		$prix = (float) $row['prix'];
		$prix = number_format($prix, 2, ',', ' ');
		$id_reg = (int) $row['id_reg'];
		$id_dep = (int) $row['id_dep'];
		$id_cat = (int) $row['id_cat'];

		$nom_reg = '';
		$nom_dep = '';
		$nom_cat = '';
		$disc = '';
		
		foreach($cache_regions as $v)
		{
			if($id_reg == $v['id_reg'])
			$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
		}
		
		foreach($cache_departements as $v)
		{
			if($id_dep == $v['id_dep'])
			$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
		}
		
		foreach($cache_categories as $v)
		{
			if($id_cat == $v['id_cat'])
			{
				$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
				$disc = (int) $v['disc'];
			}
		}
		
		$nom_image = stripslashes(htmlspecialchars($row['nom_image'], ENT_QUOTES));
		
		// Url rewriting
		
		$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ', '&#039;');
		$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n', '');      
		
		$url_ann = $nom_reg .'-'. $nom_dep .'-'. $nom_cat .'-'. $titre;
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
		
		// Taille du titre
		
		if (strlen($titre) > 21)
		{
			$titre = substr($titre, 0, 21);
			$pos = strrpos($titre, ' ');
		 
			if($pos)
			$titre = substr($titre, 0, $pos);
			
			$titre .= "...";
		}
		
		if($disc == 0 || isset($_SESSION['disc']))
		{
		?>
	 
		<div class="fond_ann_premium">
		
		<?php 
			
			echo '<div class="bloc_photo_premium">';
			
			if(!empty($nom_image) && preg_match('#^https?://#', $nom_image) == true)
			{
				echo '<a href ="'. $url_aff .'-'. $id .'.htm"><img src="'. $nom_image .'" style="max-width: 100px; max-height:70px;" alt="" /></a>';
			}
			elseif(!empty($nom_image) && file_exists('images/vignettes/'. $nom_image))
			{ 
				$size = getimagesize('images/vignettes/'. $nom_image);
				
				if($size[0] < 100 && $size[1] < 70)
				echo '<a href="'. $url_aff .'-'. $id .'.htm"><img src="images/vignettes/'. $nom_image .'" alt="" /></a>';
				
				elseif($size[0] > $size[1])
				echo '<a href ="'. $url_aff .'-'. $id .'.htm"><img src="images/vignettes/'. $nom_image .'" width="100" height="70" alt="" /></a>';
				
				elseif($size[0] <= $size[1])
				echo '<a href ="'. $url_aff .'-'. $id .'.htm"><img src="images/vignettes/'. $nom_image .'" height="70" alt="" /></a>';
			}
			else echo '<a href ="'. $url_aff .'-'. $id .'.htm"><img src="images/no_photo1.png" alt="" /></a>';
			
			echo '</div>';
			
			echo '<div class="bloc_titre_premium">';
			
			echo '<p><a href="'. $url_aff .'-'. $id .'.htm" class="lien_titre_premium">'. $titre .'</a><br /><span class="txt_info_premium">';
			
			if(empty($nom_dep)) 
			echo $nom_reg .'<br /></span>';
				
			else echo $nom_dep .'<br /></span>';
			
			if($prix != 0)
			echo '<span class="prix_premium"><strong>'. $prix .' '. $param_gen['devise'] .'</strong></span></p>';
			
			else echo '<span class="prix_premium"><strong>'. $language['no_prix'] .'</strong></span></p>';
			
			echo '</div>'; 
			
		?>
		
		</div>
		
		<?php
		}
		else
		{
		?>
		<div class="fond_ann_premium">

			<p class="p_disc_ads txt_info"><?php echo $language['texte_disc']; ?></p>
		
		</div>
		<?php
		}
	}
}

for($count_ann = count($array); $count_ann < 5;	$count_ann++)
{
?>

<div class="fond_ann_premium">

	<p class="p_no_premium  vert">
		<?php echo $language['txt_premium']; ?>
	</p>
	
	<p style="padding-top: 3px;">
		<img src="images/fleche.png" alt="" /><a href="javascript:;" onclick="window.open('plus_premium.php', 'PREMIUM', 'scrollbars = no, width = 560, height = 360')" class="lien_plus_premium violet_1"><?php echo $language['lien_premium']; ?></a>
	</p>
	
</div>

<?php 
}
?>

</div>
	
<?php
}

/// ----- INFO PAGE INDEX ET ANNONCES -----  ///
	
function display_index_text_index($info_page)
{
	global $language, $param_gen;
	
	// Url rewriting du flux
			
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
	
	$url_flux = $param_gen['name'];
	$url_flux = str_replace($accent, $sans_accent, $url_flux);
	
	$url = array();
 
	for ($i = 0; $i < strlen($url_flux); $i++) 
	array_push($url, $url_flux[$i]);
	
	$url_aff = '';
	
	foreach($url as $url_flux)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_flux) != true)
		$url_flux = str_replace($url_flux, '-', $url_flux);
		
		$url_aff .= $url_flux;
	}
	
?>
<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right"></div>
	
	<div class="bloc_reseaux">
		<p>
			<a onclick="window.open(this.href); return false;" rel="nofollow" href="http://www.facebook.com/share.php?u=<?php echo 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"><img src="images/small_facebook.png" alt="" /></a>&nbsp;
			<a onclick="window.open(this.href); return false;" rel="nofollow" href="http://twitter.com/share?url=<?php echo 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"><img src="images/small_twitter.png" alt="" /></a>&nbsp;
			<g:plusone size="medium"></g:plusone>
		</p>
	</div>
	
	<?php
	if($param_gen['flux_gl'] == 1)
	{
	?>
	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $language['infos_page_flux']; ?>		
		</p>
	</div>
	<div class="bt_info_right"></div>
	
	<div class="bloc_reseaux">
		<p>
			<a onclick="window.open(this.href); return false;" rel="nofollow" href="rss/<?php echo $url_aff ?>.xml"><img src="images/small_rss.png" alt="" /></a>&nbsp;
		</p>
	</div>
	<?php
	}
	?>
	
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>)
		</p>
	</div>

</div>
<?php
}

/// ----- CARTE + RECHERCHE-----  ///

function display_index_center()
{
	global $language, $cache_nombre_annonce, $cache_regions, $cache_departements, $cache_categories, $param_gen, $cache_param_champs;

?>

<div id="bloc_center">
<div id="middle_bloc_center">
	
	<div id="carte-main">
		<div id="carte">
		<div id="bulle"></div>

			<p id="map_region">
				<map name="FranceMap" id="france">
					<area alt="" onmouseover="MapReg(1); MapRegBulle('Alsace', '<?php echo $cache_nombre_annonce['reg_1']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="320,77,334,79,325,95,325,105,321,112,322,118,321,138,315,140,314,140,304,125,304,120,308,117,308,111,311,106,308,101,313,88,304,83,305,80,307,78,319,81,319,80" href="Petites-annonces-1-Alsace.htm" />
					<area alt="" onmouseover="MapReg(2); MapRegBulle('Aquitaine', '<?php echo $cache_nombre_annonce['reg_2']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="148,266,149,271,141,278,118,283,115,295,120,298,123,306,106,326,86,313,82,315,82,314,85,308,75,304,75,303,76,303,92,253,96,253,92,248,97,219,105,231,109,227,109,228,124,236,124,234,125,234,124,232,130,230,143,212,144,212,147,218,154,219,157,223,158,224,158,233,163,245,159,253,151,266" href="Petites-annonces-2-Aquitaine.htm" />
					<area alt="" onmouseover="MapReg(3); MapRegBulle('Auvergne', '<?php echo $cache_nombre_annonce['reg_3']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="193,226,190,207,195,201,193,201,194,195,187,183,194,175,205,171,222,173,231,187,223,204,231,219,229,227,241,226,244,233,228,250,223,245,219,247,216,242,214,242,208,248,204,253,199,243,198,243,198,244,191,254,182,255,182,254,182,237" href="Petites-annonces-3-Auvergne.htm" />
					<area alt="" onmouseover="MapReg(4); MapRegBulle('Basse Normandie', '<?php echo $cache_nombre_annonce['reg_4'] ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="99,54,100,66,127,71,137,66,139,87,143,87,152,107,149,108,147,114,138,109,137,103,127,106,123,99,100,99,93,101,90,97,95,94,95,93,91,93,89,86,90,70,85,66,84,53,86,53" href="Petites-annonces-4-Basse-Normandie.htm" />
					<area alt="" onmouseover="MapReg(5); MapRegBulle('Bourgogne', '<?php echo $cache_nombre_annonce['reg_5']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="268,137,270,147,263,163,268,166,267,182,265,182,255,180,252,192,242,189,239,193,231,194,229,190,232,183,222,172,209,174,207,160,202,150,202,133,208,125,208,124,204,117,206,109,217,108,221,117,225,118,227,125,235,125,249,121,254,128,255,133" href="Petites-annonces-5-Bourgogne.htm" />
					<area alt="" onmouseover="MapReg(6); MapRegBulle('Bretagne', '<?php echo $cache_nombre_annonce['reg_6']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="82,96,91,97,92,102,101,100,102,109,102,120,94,128,90,127,90,129,86,129,85,132,74,133,72,138,57,138,57,133,51,131,52,134,47,135,42,126,42,125,41,125,39,128,39,127,37,124,23,120,23,117,23,118,20,124,17,123,10,112,19,111,20,108,15,104,20,104,23,106,23,105,21,101,18,100,19,99,17,99,9,100,8,95,9,93,18,89,29,88,30,92,39,91,39,87,41,86,51,85,51,88,53,86,61,99,68,93,77,96,79,99,80,99,80,97,79,94,81,93,81,92,82,92" href="Petites-annonces-6-Bretagne.htm" />
					<area alt="" onmouseover="MapReg(7); MapRegBulle('Centre', '<?php echo $cache_nombre_annonce['reg_7']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="177,105,179,112,189,110,192,116,190,118,199,118,204,117,207,125,201,135,204,136,202,147,206,168,193,176,194,176,194,175,195,177,194,180,186,184,158,187,141,161,135,164,129,153,133,138,137,139,150,121,148,121,150,119,148,110,153,101,149,96,166,86,167,86" href="Petites-annonces-7-Centre.htm" />
					<area alt="" onmouseover="MapReg(8); MapRegBulle('Champ. Ardenne', '<?php echo $cache_nombre_annonce['reg_8']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="250,51,254,51,261,59,259,59,257,59,253,81,255,84,252,90,255,97,266,107,273,115,278,125,273,133,264,138,256,133,254,131,255,128,245,120,229,124,214,105,215,91,220,71,223,70,230,58,235,45,241,45,250,37,250,38" href="Petites-annonces-8-Champagne-Ardenne.htm" />
					<area alt="" onmouseover="MapReg(9); MapRegBulle('Corse', '<?php echo $cache_nombre_annonce['reg_9']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="337,301,340,301,340,303,338,361,336,361,326,353,329,350,324,349,324,341,320,341,323,336,318,330,321,327,317,324,320,317,334,309,337,310" href="Petites-annonces-9-Corse.htm" />
					<area alt="" onmouseover="MapReg(10); MapRegBulle('Franche Comté', '<?php echo $cache_nombre_annonce['reg_10']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="283,120,293,124,298,123,307,129,310,138,306,144,307,149,279,189,274,187,271,188,268,186,269,173,267,169,269,165,263,161,270,149,270,134,273,133,274,128" href="Petites-annonces-10-Franche-Comte.htm" />
					<area alt="" onmouseover="MapReg(11); MapRegBulle('Haute Normandie', '<?php echo $cache_nombre_annonce['reg_11']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="140,86,137,65,132,61,137,53,166,42,172,49,173,72,165,81,162,92,148,95" href="Petites-annonces-11-Haute-Normandie.htm" />
					<area alt="" onmouseover="MapReg(12); MapRegBulle('Ile de France', '<?php echo $cache_nombre_annonce['reg_12']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="208,79,208,83,216,89,214,92,215,92,215,91,216,93,217,100,216,100,214,106,205,109,203,115,192,117,186,109,179,111,178,107,173,104,174,100,169,96,169,88,166,81,173,76,188,76,196,81" href="Petites-annonces-12-Ile-de-France.htm" />
					<area alt="" onmouseover="MapReg(13); MapRegBulle('Lan. Roussillon', '<?php echo $cache_nombre_annonce['reg_13']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="208,293,208,288,212,288,218,279,215,275,215,272,212,271,206,250,216,243,216,244,218,247,224,247,235,267,248,267,255,280,240,300,240,301,239,300,237,297,224,304,221,309,215,309,208,318,210,342,198,343,197,346,189,343,178,345,172,338,183,332,180,329,176,331,176,326,177,317,171,311,170,309,171,309,174,304,196,303,196,302,198,295,198,294,203,292" href="Petites-annonces-13-Languedoc-Roussillon.htm" />
					<area alt="" onmouseover="MapReg(14); MapRegBulle('Limousin', '<?php echo $cache_nombre_annonce['reg_14']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="192,225,188,225,184,231,174,242,169,239,164,239,159,233,160,226,157,224,154,217,143,211,151,201,148,193,150,189,173,184,185,185,194,195,194,204,189,210" href="Petites-annonces-14-Limousin.htm" />
					<area alt="" onmouseover="MapReg(15); MapRegBulle('Lorraine', '<?php echo $cache_nombre_annonce['reg_15']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="262,58,265,62,274,60,277,63,284,61,292,63,299,74,303,72,306,75,316,73,320,76,320,80,318,80,306,78,304,84,306,83,308,87,312,92,310,96,307,98,308,105,310,109,303,126,287,121,285,122,283,120,276,122,273,115,274,112,253,91,253,72,257,66,257,59" href="Petites-annonces-15-Lorraine.htm" />
					<area alt="" onmouseover="MapReg(16); MapRegBulle('Midi Pyrenées', '<?php echo $cache_nombre_annonce['reg_16']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="164,240,172,244,180,242,183,247,186,256,192,255,198,244,199,244,199,245,209,262,209,270,215,275,213,277,214,277,217,281,215,285,207,287,207,292,196,294,197,302,195,302,174,304,169,309,172,313,176,317,175,330,181,333,174,337,166,333,162,334,141,325,141,326,140,326,140,330,129,331,120,331,114,319,123,301,121,296,116,292,120,283,125,283,129,279,135,280,136,278,143,278,150,266,153,266,177,321,178,323,177,323" href="Petites-annonces-16-Midi-Pyrenees.htm" />
					<area alt="" onmouseover="MapReg(17); MapRegBulle('Nord Pas de Calais', '<?php echo $cache_nombre_annonce['reg_17']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="188,2,193,2,193,3,194,3,195,11,200,16,208,13,212,23,221,31,230,30,233,33,229,49,226,48,224,44,224,45,225,45,223,46,213,44,206,47,205,44,190,41,189,37,170,30,170,23,172,24,170,9" href="Petites-annonces-17-Nord-Pas-de-Calais.htm" />
					<area alt="" onmouseover="MapReg(18); MapRegBulle('Pays de la Loire', '<?php echo $cache_nombre_annonce['reg_18']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="102,101,109,104,123,101,130,107,136,104,139,110,150,116,147,131,133,137,125,157,113,157,111,160,110,160,103,162,110,185,100,185,93,187,71,163,76,157,71,150,76,147,76,146,63,147,62,145,62,143,74,138,76,132,85,132,89,127,96,128,102,118" href="Petites-annonces-18-Pays-de-la-Loire.htm" />
					<area alt="" onmouseover="MapReg(19); MapRegBulle('Picardie', '<?php echo $cache_nombre_annonce['reg_19']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="189,38,189,41,209,48,225,46,228,50,234,45,234,54,229,68,221,69,220,72,222,78,219,78,217,87,217,88,204,78,189,76,173,76,174,51,172,51,173,48,165,40,177,32,182,37" href="Petites-annonces-19-Picardie.htm" />
					<area alt="" onmouseover="MapReg(20); MapRegBulle('Poitou Charentes', '<?php echo $cache_nombre_annonce['reg_20']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="128,155,134,163,144,164,151,179,156,183,156,186,148,193,147,200,150,202,123,235,117,236,113,228,107,226,93,210,98,200,97,188,112,184,108,167,104,163,105,162,112,161,117,157,125,159" href="Petites-annonces-20-Poitou-Charentes.htm" />
					<area alt="" onmouseover="MapReg(21); MapRegBulle('Pro. Al. Cote Azur', '<?php echo $cache_nombre_annonce['reg_21']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="308,309,295,315,273,310,267,304,264,305,258,302,257,305,249,301,242,301,241,301,241,299,246,297,257,279,251,267,256,270,265,268,269,271,275,273,279,267,273,261,277,259,277,261,277,260,278,258,276,255,296,244,296,240,292,237,295,234,301,233,302,233,302,234,307,242,314,246,316,249,312,264,325,272,333,270,335,272,329,285,307,304" href="Petites-annonces-21-Provence-Alpes-Cote-Azur.htm" />
					<area alt="" onmouseover="MapReg(22); MapRegBulle('Rhone Alpes', '<?php echo $cache_nombre_annonce['reg_22']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="277,253,277,260,272,264,279,268,278,270,274,274,265,270,265,267,233,265,229,251,245,230,241,226,237,225,232,227,231,219,225,214,227,191,239,194,244,190,251,190,251,193,253,193,258,181,264,181,270,188,276,187,281,189,286,183,288,186,283,194,289,194,292,185,305,183,305,192,311,201,306,207,316,227,299,235,293,234,292,237,296,243,280,253" href="Petites-annonces-22-Rhone-Alpes.htm" />
					<area alt="" onmouseover="MapReg(23); MapRegBulle('Guadeloupe', '<?php echo $cache_nombre_annonce['reg_23']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="20,343,22,356,11,359,10,356,6,339,9,335,11,336,20,340,26,333,24,327,26,325,28,326,31,327,32,335,42,340,42,342,30,345,39,359,45,363,45,365,38,368,36,365,37,363" href="Petites-annonces-23-Guadeloupe.htm" />
					<area alt="" onmouseover="MapReg(24); MapRegBulle('Martinique', '<?php echo $cache_nombre_annonce['reg_24']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="9,268,30,284,29,287,37,306,34,306,17,303,16,298,24,295,6,270,31,278,32,281,30,281" href="Petites-annonces-24-Martinique.htm" />
					<area alt="" onmouseover="MapReg(25); MapRegBulle('Guyane', '<?php echo $cache_nombre_annonce['reg_25']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="9,202,40,219,41,224,24,250,12,249,7,251,3,249,9,230,2,212,37,218,36,220" href="Petites-annonces-25-Guyane.htm" />
					<area alt="" onmouseover="MapReg(26); MapRegBulle('Réunion', '<?php echo $cache_nombre_annonce['reg_26']; ?>', '<?php echo $language['texte_ann_bulle'] ?>', event)" onmouseout="MapRegSup();" shape="poly" coords="39,182,2,162,6,154,12,150,29,152,41,171" href="Petites-annonces-26-Reunion.htm" />
				</map>
				<img usemap="#FranceMap" src="images/map/map_blank.png" width="621" height="680" alt="" />
			</p>
		</div>
		<div class="clear"></div>
		<ul>
			<li>Alsace</li>
			<li>Aquitaine</li>
			<li>Auvergne</li>
			<li>Basse-Normandie</li>
			<li>Bourgogne</li>
			<li>Bretagne</li>
			<li>Centre</li>
			<li>Champagne-Ardenne</li>
			<li>Corse</li>
			<li>Franche-Comté</li>
			<li>Haute-Normandie</li>
			<li>lle-de-France</li>
			<li>Languedoc-Roussillon</li>
		</ul>
		
		<ul>
			<li>Limousin</li>
			<li>Lorraine</li>
			<li>Midi-Pyrénées</li>
			<li>Nord-Pas-de-Calais</li>
			<li>Pays-de-la-Loire</li>
			<li>Picardie</li>
			<li>Poitou-Charentes</li>
			<li>Provence-Alpes-Cote-Azur</li>
			<li>Rhône-Alpes</li>
			<li></li>
			<li>Guadeloupe</li>
			<li>Martinique</li>
			<li>Guyane</li>
			<li>Réunion</li>
		</ul>
		
	</div>
	
	
	<!--<div id="corps_recherche">
	<form method="get" action="ann_search.php">
	
	<div id="top_menu_recherche"></div>
	
	<div id="middle_menu_recherche">
		
		<input type="text" class="input_recherche" name="keywords" onfocus="InputCon(this, '<?php echo $language['value_recherche']; ?>')" onblur="InputCon(this, '<?php echo $language['value_recherche']; ?>')" value="<?php echo $language['value_recherche']; ?>" />
		
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
		<input type="text" class="input_recherche" name="zip_code" onfocus="InputCon(this, '<?php echo $language['value_code_postal']; ?>')" onblur="InputCon(this, '<?php echo $language['value_code_postal']; ?>')" value="<?php echo $language['value_code_postal']; ?>" />
		<?php
		}
		?>
	  
	  
		<?php 
			
			display_search_regions(0, $cache_regions); //Afficher les régions 
			
			echo '<div id="get_departements"></div>';
			
			display_search_categories(0, $cache_categories); //Afficher les categories
			
			echo '<div id="get_options"></div>';
			
			?>
			
			<p class="p_recherche_unique"><img src="images/fleche_u.png" alt="" /><?php echo $language['uniquement'];  ?></p>
			
			<div id="left_checkbox_recherche">
			
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="titre" name="titre" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_titre" alt="" /> 
					&nbsp;<label for="titre"><?php echo $language['checkbox_chercher_titre']; ?></label>
				</p>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="offres" name="offres" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_offres" alt="" /> 
					&nbsp;<label for="offres"><?php echo $language['checkbox_chercher_offres']; ?></label>
				</p>
				
				<?php
				if($param_gen['active_ech'] == 1)
				{
				?>
					<p class="p_checkbox_recherche">
						<input type="checkbox" class="input_checkbox" id="echanges" name="echanges" value="1" onclick="turnImgCheck(this);" />
						<img src="images/check1.png" id="img_check_echanges" alt="" /> 
						&nbsp;<label for="echanges"><?php echo $language['checkbox_chercher_echanges']; ?></label>
					</p>
				<?php
				}
				?>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="photo" name="photo" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_photo" alt="" /> 
					&nbsp;<label for="photo"><?php echo $language['checkbox_chercher_photo']; ?></label>
				</p>
			
			</div>
			
			<div id="right_checkbox_recherche">
			
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="urgentes" name="urgentes" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_urgentes" alt="" /> 
					&nbsp;<label for="urgentes"><?php echo $language['checkbox_chercher_urgent']; ?></label>
				</p>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="recherches" name="recherches" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_recherches" alt="" /> 
					&nbsp;<label for="recherches"><?php echo $language['checkbox_chercher_recherches']; ?></label>
				</p>
				
				<?php
				if($param_gen['active_don'] == 1)
				{
				?>
					<p class="p_checkbox_recherche">
						<input type="checkbox" class="input_checkbox" id="dons" name="dons" value="1" onclick="turnImgCheck(this);" />
						<img src="images/check1.png" id="img_check_dons" alt="" /> 
						&nbsp;<label for="dons"><?php echo $language['checkbox_chercher_dons']; ?></label>
					</p>
				<?php
				}
				?>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="video" name="video" value="1" onclick="turnImgCheck(this);" />
					<img src="images/check1.png" id="img_check_video" alt="" /> 
					&nbsp;<label for="video"><?php echo $language['checkbox_chercher_video']; ?></label>
				</p>
			
			</div>
			
			<input id="submit_recherche" type="image" src="images/bouton_search.png" value="" />
			
	</div>
	
	<div id="bottom_menu_recherche"></div>

	</form>
	</div>-->
	
	<div class="produitCont">
		<ul>
			<li>
				<a href="#"><img src="img/illus-cat-1.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-2.jpg" width="75" height="58" />
				<span>Buffet</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-3.jpg" width="75" height="58" />
				<span>Lorem ipsum dolores lorem</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-4.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<ul>
			<li>
				<a href="#"><img src="img/illus-cat-1.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-2.jpg" width="75" height="58" />
				<span>Buffet</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-3.jpg" width="75" height="58" />
				<span>Lorem ipsum dolores lorem</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-4.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<ul>
			<li>
				<a href="#"><img src="img/illus-cat-1.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-2.jpg" width="75" height="58" />
				<span>Buffet</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-3.jpg" width="75" height="58" />
				<span>Lorem ipsum dolores lorem</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-4.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<ul>
			<li>
				<a href="#"><img src="img/illus-cat-1.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-2.jpg" width="75" height="58" />
				<span>Buffet</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-3.jpg" width="75" height="58" />
				<span>Lorem ipsum dolores lorem</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#"><img src="img/illus-cat-4.jpg" width="75" height="58" />
				<span>Lorem ipsum</span><span class="onglet"></span></a>
				<div class="layer">
					<ul>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="#">Appliances</a></li>
								<li><a href="#">Audio &amp; Stereo</a></li>
								<li><a href="#">Baby &amp; Kids Stuff</a></li>
								<li><a href="#">Cameras, Camcorders
								&amp; Studio Equipment</a></li>
								<li><a href="#">Christmas Decorations</a></li>
								<li><a href="#">Clothes, Footwear &amp;
								Accessories</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	
</div>
</div>

<div class="clear"></div>

<?php
}

/// ----- LIENS CATEGORIE -----  ///

function htm_categories()
{
	global $language, $cache_categories;
	
?>

<div id="bloc_categories_1">
<div id="bloc_categories_2">

<?php
	
	$a1 = 0;
	$a2 = 1;
	
	foreach ($cache_categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$nom_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
		
		if($a1%5 == 0) echo '<div style="clear: both;">';
		
		if($par_cat == 0)
		{
			echo '<ul class="ul_categories">';
			
			if($a2 != 1 && $a2%5 == 0) echo '<li class="li_title_categories_2">'. $row['nom_cat'] .'</li>';
			
			else echo '<li class="li_title_categories">'. $row['nom_cat'] .'</li>';
		}
		
		$sous_categories = $cache_categories;
			
		foreach ($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$nom_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				// Url rewriting
			 
				$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
				$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
				
				$url_cat = $row['nom_cat'];
				$url_cat = str_replace($accent, $sans_accent, $url_cat);
				
				$url = array();
			 
				for ($i = 0; $i < strlen($url_cat); $i++) 
				array_push($url, $url_cat[$i]);
				
				$url_aff = '';
				
				foreach($url as $url_cat)
				{
					if(preg_match('#^[a-zA-Z0-9]$#', $url_cat) != true)
					$url_cat = str_replace($url_cat, '-', $url_cat);
					
					$url_aff .= $url_cat;
				} 
				
				echo '<li class="li_categories"><a href="Categorie-'. $id_sous_cat .'-'. $url_aff .'.htm">'. $nom_sous_cat .'</a></li>';
			}
		}
		if($par_cat == 0) echo '</ul>';
		if($a1%5 == 0) echo '</div>';
		$a1++; 
		$a2++;
	}
?>
	
</div>
</div>

<?php
}
	
/// ----- FOOTER -----  ///
	
function htm_footer()
{
	global $language, $cache_pages, $param_gen;
?>

<div id="foot-nav">
	
	<p><strong>Categories:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a ligula ac mauris consequat auctor. Curabitur volutpat pellentesque mi, ac cursus mauris scelerisque nec. Nam mollis vestibulum lectus ac fermentum.</p>
	<div class="blkCont">
		<p>Infos légales Qui sommes-nous ? Contact Leboncoin recrute ! Publicité Professionnels de l'immobilier Mobile Règles de diffusions Conditions Générales de Vente Ajouter à mes favoris Plan du site Vos cookies Partenaire : Prêt d'Union</p>
		<div class="shareLinks">
			<img src="img/titre-share.png" width="95" height="44" />
			<ul>
				<li><a href="#" class="linkFbook">Facebook</a></li>
				<li><a href="#" class="linkTwitter">Twitter</a></li>
				<li><a href="#" class="linkGgplus">Facebook</a></li>
				<li><a href="#" class="linkPinterest">linkPinterest</a></li>
			</ul>
		</div>
	</div>
	<div class="foot">
		<img src="img/logo-foot.png" width="206" height="41" alt="Megadeals" />
		<ul>
			<li>
				<ul>
					<li><a href="#">Help & Contact</a></li>
					<li><a href="#">My mega.deals</a></li>
					<li><a href="#">About mega.deals</a></li>
				</ul>
			</li>
			<li>
				<ul>
					<li><a href="#">Help & Contact</a></li>
					<li><a href="#">My mega.deals</a></li>
					<li><a href="#">About mega.deals</a></li>
				</ul>
			</li>
		</ul>
		<img class="ggPlay" src="img/google-play.png" width="167" height="55" />
	</div>
</div>

<script type="text/javascript" src="js/functions_js.js"></script>

<script type="text/javascript">
  window.___gcfg = {lang: 'fr'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>
</html>

<?php
}

/// ----- FORMULAIRE DE DEPOT -----  ////
	
function htm_formulaire($cat, $reg, $dep, $membre, $e)
{
	global $language, $param_gen, $cache_categories, $cache_regions, $cache_departements, $cache_form, $cache_param_champs,
	$cache_champs, $cache_option_photos, $cache_option_video, $cache_options_visuelles, $cache_pay_paypal, $cache_pay_allopass, $cache_pay_atos, $cache_pay_cheque, $cache_code_reduc;
	
	$pack = 0;
	
	if(is_array($membre))
	{
		$m_id_compte = stripslashes(htmlspecialchars($membre[0]['id_compte']));
		$m_id_cat = stripslashes(htmlspecialchars($membre[0]['id_cat']));
		$m_nom_ent = stripslashes(htmlspecialchars($membre[0]['nom_ent']));
		$m_siret = stripslashes(htmlspecialchars($membre[0]['siret']));
		$m_nom = stripslashes(htmlspecialchars($membre[0]['nom']));
		$m_prenom = stripslashes(htmlspecialchars($membre[0]['prenom']));
		$m_adresse = stripslashes(htmlspecialchars($membre[0]['adresse']));
		$m_code_pos = stripslashes(htmlspecialchars($membre[0]['code_pos']));
		$m_ville = stripslashes(htmlspecialchars($membre[0]['ville']));
		$m_tel = stripslashes(htmlspecialchars($membre[0]['tel']));
		$m_email = stripslashes(htmlspecialchars($membre[0]['email']));
		$pack = (int) $membre[0]['pack'];
	}
	
	if(isset($_SESSION['ann_reg']) && !isset($_POST['nom']))
	$reg = (int) $_SESSION['ann_reg'];
	
	if(isset($_SESSION['ann_dep']) && !isset($_POST['nom']))
	$dep = (int) $_SESSION['ann_dep'];
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<?php

$nb_photo_payantes = ($cache_option_photos['prix_photo'] != 0) ? (int) $cache_option_photos['nb_photo_max'] : 0;
$nb_photo = (int) $cache_option_photos['nb_photo_gratuite'] + $nb_photo_payantes;
$prix_photo = (float) $cache_option_photos['prix_photo'];
$prix_photo = number_format($prix_photo, 2, ',', ' ');

if($nb_photo != 0)
{
?>

<form id="uploadForm" enctype="multipart/form-data" target="uploadFrame" name="upload" method="post" action="upload.php">

	<div id="corps_upload">
	
		<?php 
			
			if (isset($e['ban']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_bannissement'] .'</span></div>';
		  
			elseif (isset($e['code']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
			
			elseif (!empty($e))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></div>';
		
		?>
		
		<div class="form_left">
			<label for="pho"><?php echo $language['form_pho']; ?> :</label>
	    </div>
		
		<div class="form_right_small">
			<input type="file" class="input_file" name="photo" onchange="javascript: document.getElementById('file_name').value = this.value; upload.submit(); AffImg(2);" />
			<input type="text" id="file_name" class="input_photos" />
		</div>
		
		<div class="f_left"><img src="images/bouton_parcourir.png" alt="" /></div>
		<div class="f_left_2 info_form"><?php echo $language['form_info_pho1']; ?></div>

		<div class="form_left"></div>
		<div class="form_right_info">
			<?php 
				echo '<strong>'. $language['form_info_pho2'] .' '. $cache_option_photos['nb_photo_gratuite'] .' '. $language['form_info_pho3']; 
				
				if($nb_photo_payantes > 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1))
				echo ' '. $language['form_info_pho4'] .' '. $cache_option_photos['nb_photo_max'] .' '. $language['form_info_pho5'];
				
				echo '<br />'. $language['form_info_pho7'] .'</strong>';
				
				if($nb_photo_payantes > 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1))
				echo '<br /><br />'. $language['form_info_pho6'] .' '. $prix_photo .' '. $param_gen['devise'];
			?>
		</div>
		
		<div id="aff_img"></div>
		
		<div class="form_left"></div>
		
		<iframe id="uploadFrame" width="690" height="1" name="uploadFrame" scrolling="no" onload="calcHeight(); AffImg(1)" frameborder="0" src="upload.php"></iframe>
	
	</div>

</form>

<?php
}
else echo '<div id="corps_upload"></div>';
?>
	
<form method="post" action="">

	<div id="corps_form">
	
		<?php
		
		if($nb_photo == 0)
		{
			if (isset($e['ban']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_bannissement'] .'</span></div>';
		  
			elseif (!empty($e))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></div>';
		}
		?>
		
		<?php $ip = $_SERVER['REMOTE_ADDR']; echo '<input type="hidden" name="ip" value="'. $ip .'" />'; ?>
		
		<div class="form_left">
			<?php if (isset($e['reg'])) echo '<span class="error">'; ?><label for="form_dep"><?php echo $language['form_reg']; ?> :</label><?php if (isset($e['reg'])) echo '</span>'; ?>
		</div>
		
		<div class="form_right_select"><?php display_regions($reg, $cache_regions); ?></div>
		
		<div id="display_departements">
			<?php
			
				if ($reg != 0)
				{
					$aff = 0;
					
					foreach($cache_departements as $v)
					{
						if($v['id_reg'] == $reg)
						$aff = 1;
					}
					
					if($aff == 1)
					{
						if (isset($e['dep']))
						echo '<p class="form_left"><span class="error"><label for="form_reg">'. $language['form_dep'] .' :</label></span></p><p class="form_right_select">';
						
						else echo '<p class="form_left">'. $language['form_dep'] .' :</p><p class="form_right_select">';
					 
						display_departements($dep, $reg, $cache_departements);
						
						echo '</p>';
					}
				}
				
			?>
		</div>
	  
		<p class="form_left">
			<?php if (isset($e['cat'])) echo '<span class="error">'; ?><label for="options"><?php echo $language['form_cat']; ?> :</label><?php if (isset($e['cat'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select"><?php display_categories($cat, $cache_categories); ?></p>
		
		<?php
		if($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)
		{
			if(empty($pack))
			{
			?>
				<div id="display_prix"><?php if($cat != 0) display_prix($cat, $cache_categories); ?></div>
			<?php
			}
		}
		?>
				
		<div id="options_form">
			<?php
               if($cat != 0)
				{
					display_noms_valeurs($cat, $cache_form, $e);
					display_noms_donnees($cat, $cache_form, $e);
				}
			?>
		</div>
		
		<?php
		
		foreach($cache_champs as $v)
		{	
			$id_champ = (int) $v['id_champ'];
			$nom = htmlspecialchars($v['nom']);
			$type = (int) $v['type'];
			
			?>
			<p class="form_left">
				<?php if (isset($e[$id_champ])) echo '<span class="error">'; ?><label for="<?php echo $id_champ; ?>"><?php echo $nom; ?> :</label><?php if (isset($e[$id_champ])) echo '</span>'; ?>
			</p>
			<p class="form_right_select">
				<input type="text" id="<?php echo $id_champ; ?>" class="small_input" name="<?php echo $id_champ; ?>" value="<?php if (!empty($_POST[$id_champ])) echo htmlspecialchars($_POST[$id_champ]); ?>" /> 
				<?php if($type == 0) echo '&nbsp;<span class="info_form">'. $language['form_video_fac'] .'</span>'; ?>
			</p>
			<?php
		}
		?>
		
		<?php
		if(!isset($_SESSION['connect']))
		{
		?>
		<p class="form_left"><?php echo $language['form_propart']; ?> :</p>
		
		<div class="conteneurRadio" id="conteneurRadio1">
			<p class="form_right">
				<input type="radio" id="sta1" name="sta" checked="checked" onclick="turnImgRadio(this, 1); GetPro(1, '', '', '0');" value="1" />
				<img <?php if (isset($_POST['sta']) AND $_POST['sta'] == 2) echo 'src="images/radio1.png"'; elseif (!isset($_POST['nom']) && isset($_SESSION['ann_sta'])) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_sta1" alt="" />
				<label for="sta1"><?php echo $language['form_part']; ?></label>&nbsp;
				
				<?php
				if($param_gen['actif_acc'] > 1)
				echo $language['form_pro_compte'];
				
				else
				{
				?>
					<input type="radio" id="sta2" name="sta" <?php if (isset($_POST['sta']) AND $_POST['sta'] == 2) echo 'checked = "checked"'; elseif (!isset($_POST['nom']) && isset($_SESSION['ann_sta'])) echo 'checked = "checked"'; ?> onclick="turnImgRadio(this, 1);  GetPro(2, '<?php echo $language['form_nom_ent']; ?>', '<?php echo $language['form_num_sir']; ?>', '<?php echo $cache_param_champs['act_siret']; ?>');" value="2" />
					<img <?php if (isset($_POST['sta']) AND $_POST['sta'] == 2) echo 'src="images/radio2.png"'; elseif (!isset($_POST['nom']) && isset($_SESSION['ann_sta'])) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_sta2" alt="" />
					<label for="sta2"><?php echo $language['form_pro']; ?></label>
				<?php
				}
				?>
			</p>
		</div>
		<?php
			if($param_gen['actif_acc'] == 3)
			{
			?>
				<p class="form_left"></p>
				<p class="form_right"><?php echo $language['form_par_compte']; ?></p>
			<?php
			}
		} 
		
		if(isset($_SESSION['connect']))
		echo '<input type="hidden" name="sta" value="'. $_SESSION['connect'] .'" /><input type="hidden" name="id_compte" value="'. $m_id_compte .'" />'; 
		?>
		
		<?php
		if (!isset($_SESSION['connect']))
		{
		?>
		<div id="get_pro">
			<?php	
			if((!empty($_POST['sta']) && $_POST['sta'] == 2) || (!isset($_POST['nom']) && isset($_SESSION['ann_sta'])))
			{
			?>
				<p class="form_left">
					<?php if (isset($e['ent'])) echo '<span class="error">'; ?><label for="ent"><?php echo $language['form_nom_ent']; ?> :</label><?php if (isset($e['ent'])) echo '</span>'; ?>
				</p>
				
				<p class="form_right_select">
					<input type="text" id="ent" class="long_input" name="ent" value="<?php if (isset($_POST['ent'])) echo htmlspecialchars($_POST['ent']); elseif (!empty($_SESSION['ann_ent'])) echo htmlspecialchars($_SESSION['ann_ent']); ?>" />
				</p>
				
				<?php 
				if($cache_param_champs['act_siret'] == 1)
				{
				?>
					<p class="form_left">
						<?php if (isset($e['sir'])) echo '<span class="error">'; ?><label for="sir"><?php echo $language['form_num_sir']; ?> :</label><?php if (isset($e['sir'])) echo '</span>'; ?>
					</p>
					
					<p class="form_right_select">
						<input type="text" id="sir" class="long_input" name="sir" value="<?php if (isset($_POST['sir'])) echo htmlspecialchars($_POST['sir']); elseif (!empty($_SESSION['ann_sir'])) echo htmlspecialchars($_SESSION['ann_sir']); ?>" />
					</p>
				<?php
				}
			}
			?>
		</div>
		
		<?php
		}
		elseif(isset($_SESSION['connect']) && $_SESSION['connect'] == 2)
		{
		?>
			<p class="form_left">
				<?php echo $language['form_nom_ent']; ?> :
			</p>
			
			<p class="form_right_bord">
				<?php echo $m_nom_ent; ?>
				<input type="hidden" name="ent" value="<?php echo $m_nom_ent; ?>" />
			</p>
			
			<p class="form_left">
				<label for="sir"><?php echo $language['form_num_sir']; ?> :
			</p>
			
			<p class="form_right_bord">
				<?php echo $m_siret; ?>
				<input type="hidden" name="sir" value="<?php echo $m_siret; ?>" />
			</p>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['cod'])) echo '<span class="error">'; ?><label for="cod"><?php echo $language['form_cod']; ?> :</label><?php if (isset($e['cod'])) echo '</span>'; ?>
			</p>
			<p class="form_right_select">
				<input type="text" id="cod" class="small_input" name="cod" value="<?php if (isset($_POST['cod'])) echo htmlspecialchars($_POST['cod']); elseif(isset($_SESSION['connect'])) echo $m_code_pos; elseif (!empty($_SESSION['ann_cod'])) echo htmlspecialchars($_SESSION['ann_cod']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_cod_info']; ?></span>
			</p>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_vil'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['vil'])) echo '<span class="error">'; ?><label for="vil"><?php echo $language['form_vil']; ?> :</label><?php if (isset($e['vil'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="vil" class="av_input" name="vil" value="<?php if (isset($_POST['vil'])) echo htmlspecialchars($_POST['vil']); elseif(isset($_SESSION['connect'])) echo $m_ville; elseif (!empty($_SESSION['ann_vil'])) echo htmlspecialchars($_SESSION['ann_vil']); ?>" />
			</p>
		<?php
		}
		?>
		
		<p class="form_left"><?php echo $language['form_typ']; ?> :</p>
		
		<div class="conteneurRadio" id="conteneurRadio2">
		
			<p class="form_right">
				<input name="typ" id="typ1" onclick="turnImgRadio(this, 2);" value="1" type="radio" checked /><label for="typ1">
				<img <?php if (isset($_POST['typ']) AND $_POST['typ'] != 1) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_typ1" alt="" />
				<?php echo $language['form_typ1']; ?></label>&nbsp;
				
				<input name="typ" id="typ2" onclick="turnImgRadio(this, 2);" value="2" type="radio" <?php if (isset($_POST['typ']) AND $_POST['typ'] == 2) echo 'checked="checked"'; ?> />
				<img <?php if (isset($_POST['typ']) AND $_POST['typ'] == 2) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_typ2" alt="" />
				<label for="typ2"><?php echo $language['form_typ2']; ?></label>&nbsp;
				
				<?php
				if($param_gen['active_ech'] == 1)
				{
				?>
					<input name="typ" id="typ3" onclick="turnImgRadio(this, 2);" value="3" type="radio" <?php if (isset($_POST['typ']) AND $_POST['typ'] == 3) echo 'checked="checked"'; ?> />
					<img <?php if (isset($_POST['typ']) AND $_POST['typ'] == 3) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_typ3" alt="" />
					<label for="typ3"><?php echo $language['form_typ3']; ?></label>&nbsp;
				<?php
				}
				
				if($param_gen['active_don'] == 1)
				{
				?>
					<input name="typ" id="typ4" onclick="turnImgRadio(this, 2);" value="4" type="radio" <?php if (isset($_POST['typ']) AND $_POST['typ'] == 4) echo 'checked="checked"'; ?> />
					<img <?php if (isset($_POST['typ']) AND $_POST['typ'] == 4) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_typ4" alt="" />
					<label for="typ4"><?php echo $language['form_typ4']; ?></label>&nbsp;
				<?php
				}
				?>
			</p>
		
		</div>
		
		<p class="form_left">
			<?php if (isset($e['nom'])) echo '<span class="error">'; ?><label for="nom"><?php echo $language['form_nom']; ?> :</label><?php if (isset($e['nom'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="nom" class="av_input" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); elseif(isset($_SESSION['connect'])) echo $m_nom; elseif (!empty($_SESSION['ann_nom'])) echo htmlspecialchars($_SESSION['ann_nom']); ?>" />
		</p>
		
		<?php
		if(!isset($_SESSION['connect']))
		{
		?>
			<p class="form_left">
				<?php if (isset($e['ema'])) echo '<span class="error">'; ?><label for="ema"><?php echo $language['form_ema']; ?> :</label><?php if (isset($e['ema'])) echo '</span>'; ?>
			</p>
			<p class="form_right_select">
				<input type="text" id="ema" class="av_input" name="ema" value="<?php if (isset($_POST['ema'])) echo htmlspecialchars($_POST['ema']); elseif (!empty($_SESSION['ann_ema'])) echo htmlspecialchars($_SESSION['ann_ema']); ?>" />
			</p>
		<?php
		}
		else
		{
		?>
			<p class="form_left"><?php echo $language['form_ema']; ?> : </p>
			<p class="form_right_bord">
				<?php echo $m_email; ?>
				<input type="hidden" name="ema" value="<?php echo $m_email; ?>" />
			</p>
		<?php
		}
		?>
		
		<p class="form_left_info"></p>
		
		<p class="form_right_info"><?php echo $language['form_info_ema']; ?></p>
		
		
		<?php
		if($cache_param_champs['act_tel'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['tel'])) echo '<span class="error">'; ?><label for="tel"><?php echo $language['form_tel']; ?> :</label><?php if (isset($e['tel'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="tel" class="av_input" name="tel" value="<?php if (isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); elseif(isset($_SESSION['connect'])) echo $m_tel; elseif (!empty($_SESSION['ann_tel'])) echo htmlspecialchars($_SESSION['ann_tel']); ?>" />
				&nbsp;<span class="info_form"><label for="tel_cache"><?php echo $language['form_cache_tel']; ?></label></span> 
				
				<input type="checkbox" class="input_checkbox" id="tel_cache" name="tel_cache" value="Y" onclick="turnImgCheck(this)" <?php if (!empty($_POST['tel_cache'])) echo 'checked="checked"'; elseif (!isset($_POST['nom']) && isset($_SESSION['ann_tel_cache'])) echo 'checked="checked"';  ?> />
				<img <?php if (!empty($_POST['tel_cache'])) echo 'src="images/check2.png"'; elseif (!isset($_POST['nom']) && isset($_SESSION['ann_tel_cache'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_tel_cache" alt="" />
			</p>
		<?php
		}
		?>
		
		<p class="form_left">
			<?php if (isset($e['tit'])) echo '<span class="error">'; ?><label for="tit"><?php echo $language['form_tit']; ?> :</label><?php if (isset($e['tit'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="tit" class="long_input" name="tit" value="<?php if (!empty($_POST['tit'])) echo htmlspecialchars($_POST['tit']); ?>" />
		</p>
		
		<div id="commentaire">
		<?php
			if ($cat != 0)
			{
				$note = '';

				foreach($cache_categories as $v)
				{
					if($v['id_cat'] == $cat)
					$note = stripslashes(htmlspecialchars($v['com_cat'], ENT_QUOTES));
				}
				
				if (!empty($note))
			    {
					echo '<p class="form_left_info"></p>';
					echo '<p class="form_right_info">'. nl2br($note) .'</p>';
				}
			}
		?>
		</div>
		
		<p class="form_left">
			<?php if (isset($e['ann'])) echo '<span class="error">'; ?><label for="ann"><?php echo $language['form_ann']; ?> :</label><?php if (isset($e['ann'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_textarea">
			<textarea id="ann" class="textarea" cols="60" rows="10" name="ann"><?php if (!empty($_POST['ann'])) echo htmlspecialchars($_POST['ann']); ?></textarea>
		</p>
		
		<?php
		
			if($cache_option_video['actif'] == 1)
			{
				if($cache_option_video['prix_video'] != 0)
				{
					$prix = (float) $cache_option_video['prix_video'];
					$prix = number_format($prix, 2, ',', ' ');
				}
				else $prix = 0;
			?>
				<p class="form_left">
					<?php if (isset($e['youtube'])) echo '<span class="error">'; ?><label for="youtube"><?php echo $language['form_youtube']; ?> :</label><?php if (isset($e['youtube'])) echo '</span>'; ?>
				</p>
				<p class="form_right_select">
					<input type="text" id="youtube" class="long_input" name="youtube" value="<?php if (!empty($_POST['youtube'])) echo htmlspecialchars($_POST['youtube']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_video_fac']; if($prix != 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)) echo ' '. $language['form_video_prix'] .' '. $prix .' '. $param_gen['devise']; ?></span>
				</p>
				
				<p class="form_left">
					<?php if (isset($e['dailymotion'])) echo '<span class="error">'; ?><label for="dailymotion"><?php echo $language['form_dailymotion']; ?> :</label><?php if (isset($e['dailymotion'])) echo '</span>'; ?>
				</p>
				<p class="form_right_select">
					<input type="text" id="dailymotion" class="long_input" name="dailymotion" value="<?php if (!empty($_POST['dailymotion'])) echo htmlspecialchars($_POST['dailymotion']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_video_fac']; if($prix != 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)) echo ' '. $language['form_video_prix'] .' '. $prix .' '. $param_gen['devise']; ?></span>
				</p>
			<?php
			}
		?>
		
		<?php
		if($cache_param_champs['act_prix'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['pri'])) echo '<span class="error">'; ?><label for="pri"><?php echo $language['form_pri']; ?> :</label><?php if (isset($e['pri'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="pri" class="small_input" name="pri" value="<?php if (!empty($_POST['pri'])) echo htmlspecialchars($_POST['pri']); ?>" /> &nbsp;<span class="info_form"><?php echo $param_gen['devise']; ?> &nbsp;<?php echo $language['form_pri_info']; ?></span>
			</p>
		<?php
		}
		?>
		
		<?php
		
		if(!isset($_SESSION['connect']))
		{
		?>
			<p class="form_left">
				<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="pas"><?php echo $language['form_pas']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="password" id="pas" class="small_input" name="pas" value="<?php if (!empty($_POST['pas'])) echo htmlspecialchars($_POST['pas']); ?>" />
			</p>
			
			<p class="form_left">
				<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="pas2"><?php echo $language['form_pas2']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="password" id="pas2" class="small_input" name="pas2" value="<?php if (!empty($_POST['pas2'])) echo htmlspecialchars($_POST['pas2']); ?>" />
			</p>
		<?php
		}
		?>
		
		<?php
		
			$aff = 0;
			
			foreach($cache_code_reduc as $v)
			{
				if($v['val1'] == 1)
				{
					$aff = 1;
				}
			}
		
		if($aff == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><?php echo $language['form_promo']; ?> :</label><?php if (isset($e['code'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
			</p>
		<?php
		}
		?>
		
		<?php
 
		if($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)
		{
		
			//OPTION REMONTER EN TETE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 1) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left"></p><p class="form_right_option">'. $language['form_tete'] .'</p>';
			
			?>
			<div class="conteneurRadio" id="conteneurRadio3">
				<p class="form_left"></p>
				<p class="form_right">
					<input type="radio" id="opt_type1_1" name="opt_type1" onclick="turnImgRadio(this, 3);" value="0" checked="checked" />
					<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] != 0) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_opt_type1_1" alt="" />
					<label for="opt_type1_1"><?php echo $language['form_tete_none']; ?></label>&nbsp;
				</p>
			<?php
			
			$i = 2;
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 1)
				{
				?>
					<p class="form_left"></p>
					<p class="form_right">
						<input type="radio" id="opt_type1_<?php echo $i; ?>" name="opt_type1" onclick="turnImgRadio(this, 3);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type1_<?php echo $i; ?>" alt="" />
						<label for="opt_type1_<?php echo $i; ?>"><?php echo $language['form_opt_tete'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				}
				$i++;
			}
			
			echo '</div>';
			}
			
			//OPTION A LA UNE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 2) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left"></p><p class="form_right_option">'. $language['form_une'] .'</p>';
			
			?>
			<div class="conteneurRadio" id="conteneurRadio4">
				<p class="form_left"></p>
				<p class="form_right">
					<input type="radio" id="opt_type2_1" name="opt_type2" onclick="turnImgRadio(this, 4);" value="0" checked="checked" />
					<img <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] != 0) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_opt_type2_1" alt="" />
					<label for="opt_type2_1"><?php echo $language['form_une_none']; ?></label>&nbsp;
				</p>
			<?php
			
			$i = 2;
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 2)
				{
				?>
					<p class="form_left"></p>
					<p class="form_right">
						<input type="radio" id="opt_type2_<?php echo $i; ?>" name="opt_type2" onclick="turnImgRadio(this, 4);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type2_<?php echo $i; ?>" alt="" />
						&nbsp;<label for="opt_type2_<?php echo $i; ?>"><?php echo $language['form_opt_une'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				} 
				$i++;
			}
			
			echo '</div>';
			}
			
			//OPTION LOGO URGENT
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 3) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left"></p><p class="form_right_option">'. $language['form_urg'] .'</p>';
			
			?>
			<div class="conteneurRadio" id="conteneurRadio5">
				<p class="form_left"></p>
				<p class="form_right">
					<input type="radio" id="opt_type3_1" name="opt_type3" onclick="turnImgRadio(this, 5);" value="0" checked="checked" />
					<img <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] != 0) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_opt_type3_1" alt="" />
					<label for="opt_type3_1"><?php echo $language['form_urg_none']; ?></label>&nbsp;
				</p>
			<?php
			
			$i = 2;
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 3)
				{
				?>
					<p class="form_left"></p>
					<p class="form_right">
						<input type="radio" id="opt_type3_<?php echo $i; ?>" name="opt_type3" onclick="turnImgRadio(this, 5);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type3_<?php echo $i; ?>" alt="" />
						&nbsp;<label for="opt_type3_<?php echo $i; ?>"><?php echo $language['form_opt_urg'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				}
				$i++;
			}
			
			echo '</div>';
			}
			
			//OPTION ANNONCE ENCADREE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 4) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left"></p><p class="form_right_option">'. $language['form_enc'] .'</p>';
			
			?>
			<div class="conteneurRadio" id="conteneurRadio6">
				<p class="form_left"></p>
				<p class="form_right">
					<input type="radio" id="opt_type4_1" name="opt_type4" onclick="turnImgRadio(this, 6);" value="0" checked="checked" />
					<img <?php if (isset($_POST['opt_type4']) AND $_POST['opt_type4'] != 0) echo 'src="images/radio1.png"'; else echo 'src="images/radio2.png"'; ?> id="img_radio_opt_type4_1" alt="" />
					<label for="opt_type4_1"><?php echo $language['form_enc_none']; ?></label>&nbsp;
				</p>
			<?php
			
			$i = 2;
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				
				if($type == 4)
				{
				?>
					<p class="form_left"></p>
					<p class="form_right">
						<input type="radio" id="opt_type4_<?php echo $i; ?>" name="opt_type4" onclick="turnImgRadio(this, 6);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type4']) AND $_POST['opt_type4'] == $id) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type4']) AND $_POST['opt_type4'] == $id) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type4_<?php echo $i; ?>" alt="" /> 
						&nbsp;<label for="opt_type4_<?php echo $i; ?>"><?php echo $language['form_opt_enc'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				} 
				$i++;
			}
			
			echo '</div>';
			}
		}
		?>
		
		<p class="form_left"></p>
		<p class="form_right_option"><input type="image" src="images/bouton_sent_annonce.png" value="" /></p>
</div>

</form>

</div>
</div>
<?php
}

/// ----- BARRE INFO LISTING VENDEUR -----  /// 

function display_vendeur_infos($id, $f, $limit, $page_num, $info_page, $nb_ann) 
{
	global $language;
	
	$f = (int) $f;
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$info_page = stripslashes(htmlspecialchars($info_page, ENT_QUOTES));
	$total = (int) $nb_ann['total'];
	
?>
<div id="barre_info">
	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right"></div>

	<div id="bloc_info_right">
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>) 
		</p>
	</div>
</div>

<div id="corps_info_ann">
	<span id="corps_info_ann2">
		<a class="<?php if ($f == 0) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'?>" href="ann_vendeur.php?id=<?php echo $id; ?>"><?php echo $language['all_lien_ann']; ?> :</a>
        <?php
			
			$deb = ($page_num * $limit) - $limit + 1;
			$fin = $limit * $page_num;
			
			if ($f != 1 && $f != 2)
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' à '. $fin .' sur  '. $total .' &nbsp;</span>';
			
			else echo '<span class="txt_info_nb_ann">&nbsp; '. $total .' &nbsp;</span>'; 	
		?>
	</span>
</div>
<?php	
}

/// ----- PAGINATION LISTING VENDEUR -----  ///  

function display_vendeur_links($id, $f, $max_page, $page, $limit, $pos, $tri) 
{
	global $language;
	
	$f = (int) $f;
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	$tri = (int) $tri;

	$nav = ' ';

	$url = 'ann_vendeur.php?id='. $id;
	if ($f == 1 || $f == 2)
	$url .= '&amp;f='. $f;
	if ($tri == 2)
	$url .= '&amp;tri='. $tri;
	$url_tri = 'ann_vendeur.php?id='. $id;
	if($f == 1 || $f == 2)
	$url_tri .= '&amp;f='. $f;
	
?>

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
	
	<?php
		
		$num = floor($page/10);
	  
		if($num == 0)
		$inf = ($num * 10) + 1;
		
		else $inf = ($num * 10);
	  
		$sup = ($num + 1) * 10;
		
		if ($sup < $max_page) 
		{
			for ($i = $inf ; $i <= $sup; $i++) 
			{
				if ($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
				
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
			$nav .= '... ';
		} 
		else 
		{
			for ($i = $inf ; $i <= $max_page; $i++) 
			{
				if ($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
				
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}
		if ($page > 1) 
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
		
		if ($page < $max_page) 
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'&amp;page='. $max_page.'" class="lien_pagination">'. $language['page_dern'] .'</a>&nbsp; ';
		} else 
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		echo $prev.$nav.$next.$last;
		
		if ($pos == 1) 
		{
			if($tri == 2)
			echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=1" class="lien_affich">'. $language['tri_date'] .'</a>';
			
			else echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=2" class="lien_affich">'. $language['tri_prix'] .'</a>';
		}
	?>
	
</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>

<?php
}

/// ----- BARRE INFO LISTING REGIONS -----  ///

function display_reg_infos($reg, $f, $limit, $page_num, $info_page, $nb_ann)
{
	global $language;
	
	$reg = (int) $reg;
	$f = (int) $f;
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$info_page = $info_page;
	$par = (int) $nb_ann['par'];
	$pro = (int) $nb_ann['pro']; 
	$total = $par + $pro;
	
?>

<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $language['select_categories']; ?>
		</p>
	</div>
	<div class="bt_info_right_v"></div>
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>) 
		</p>
	</div>

</div>

<div id="corps_info_ann">

	<a class="<?php if ($f == 0) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_reg.php?region=<?php echo $reg; ?>"><?php echo $language['all_lien_ann']; ?> :</a>

	<?php
	 
		$deb = ($page_num * $limit) - $limit + 1;
		$fin = $limit * $page_num;
		
		if ($f != 1 && $f != 2)
		echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .'  '. $total .' &nbsp;</span>';
     
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $total .' &nbsp;</span>'; 
		
	?>

	<a class="<?php if ($f == 1) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_reg.php?region=<?php echo $reg; ?>&amp;f=1"><?php echo $language['all_lien_par']; ?> :</a>

	<?php 
	 
		if ($f == 1) 
		{
			if ($par != 0)
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb. ' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
		 
		    else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
		}
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $par .' &nbsp;</span>';
		
	?>

	<a class="<?php if ($f == 2) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_reg.php?region=<?php echo $reg; ?>&amp;f=2"><?php echo $language['all_lien_pro']; ?> :</a>

	<?php
		
		if($f == 2)
		{
			if ($pro != 0)
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $pro .' &nbsp;</span>';
		 
		    else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '.$pro .' &nbsp;</span>';
		}
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $pro .' &nbsp;</span>';
     
	?>

</div>
<?php	
}

/// ----- PAGINATION LISTING REGIONS -----  ///

function display_reg_links($reg, $f, $max_page, $page, $limit, $pos, $tri)
{
	global $language;
	
	$reg = (int) $reg;
	$f = (int) $f;
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	$tri = (int) $tri;
	
	$nav = ' ';
	
	$url = 'ann_reg.php?region='. $reg;
	
	if($f == 1 || $f == 2)
	$url .= '&amp;f='. $f;

	if ($tri == 2)
	$url .= '&amp;tri='. $tri;

	$url_tri = 'ann_reg.php?region='. $reg;
	
	if($f == 1 || $f == 2)
	$url_tri .= '&amp;f='. $f;

?>

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
     
	<?php
	  
		$num = floor($page/10);
	 
		if($num == 0)
		$inf = ($num * 10) + 1;
	  
		else $inf = ($num * 10);
		
		$sup = ($num + 1) * 10;
	 
		if($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'region='. $reg .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'region='. $reg .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		 
			$nav .="... ";
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}	
		
		if($page > 1)
		{
			$page_num = $page - 1 ;
			$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
	 
		if($page < $max_page )
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language['page_dern'] .'</a>&nbsp; ';
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
		
		if($pos == 1)
		{
			if($tri == 2)
			echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=1" class="lien_affich">'. $language['tri_date'] .'</a>';
			
			else echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=2" class="lien_affich">'. $language['tri_prix'] .'</a>';
		}
	   
	?>
	
</div>
	
<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>
	
<?php
}

/// ----- BARRE INFO LISTING TYPE -----  ///

function display_type_infos($type, $f, $limit, $page_num, $info_page, $nb_ann)
{
	global $language;
	
	$type = (int) $type;
	$f = (int) $f;
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$info_page = stripslashes(htmlspecialchars($info_page, ENT_QUOTES));
	$par = (int) $nb_ann['par'];
	$pro = (int) $nb_ann['pro']; 
	$total = $par + $pro;
	
?>
<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $language['select_regions']; ?>
		</p>
	</div>
	<div class="bt_info_right_v2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $language['select_categories']; ?>
		</p>
	</div>
	<div class="bt_info_right_v"></div>

	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>) 
		</p>
	</div>

</div>

<div id="corps_info_ann">

	<a class="<?php if ($f == 0) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'?>" href="ann_type.php?type=<?php echo $type; ?>"><?php echo $language['all_lien_ann']; ?> :</a>

	<?php
	
		$deb = ($page_num * $limit) - $limit + 1;
		$fin = $limit * $page_num;
		
		if ($f != 1 && $f != 2)
		echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .'  '. $total .' &nbsp;</span>';
     
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $total .' &nbsp;</span>'; 
		
	?>
	
	<a class="<?php if ($f == 1) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_type.php?type=<?php echo $type; ?>&amp;f=1"><?php echo $language['all_lien_par']; ?> :</a>

	<?php 
	 
		if ($f == 1) 
		{
			if ($par != 0)
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb. ' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
		 
		    else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
		}
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $par .' &nbsp;</span>';
		
	?>
	
	<a class="<?php if ($f == 2) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_type.php?type=<?php echo $type; ?>&amp;f=2"><?php echo $language['all_lien_pro']; ?> :</a>

	<?php
		
		if( $f == 2 )
		{
			if ($pro != 0)
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $pro .' &nbsp;</span>';
		 
		    else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '.$pro .' &nbsp;</span>';
		}
		else echo '<span class="txt_info_nb_ann">&nbsp; '. $pro .' &nbsp;</span>';
     
	?>

</div>
<?php	
}

/// ----- PAGINATION LISTING TYPE -----  ///

function display_type_links($type, $f, $max_page, $page, $limit, $pos, $tri)
{
	global $language;
	
	$type = (int) $type;
	$f = (int) $f;
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	$tri = (int) $tri;

	$nav = ' ';

	$url = 'ann_type.php?type='. $type;
	
	if ($f == 1 || $f == 2)
	$url .= '&amp;f='. $f;

	if ($tri == 2)
	$url .= '&amp;tri='. $tri;

	$url_tri = 'ann_type.php?type='. $type;
	
	if($f == 1 || $f == 2)
	$url_tri .= '&amp;f='. $f;
	
?>

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
 
	<?php
	  
		$num = floor($page/10);
	  
		if($num == 0)
		$inf = ($num * 10) + 1;
	 
		else $inf = ($num * 10);
	  
		$sup = ($num + 1) * 10;
	   
		if ($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if ($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		 
			$nav .= '... ';
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if ($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}
		
		if ($page > 1)
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
	 
		if ($page < $max_page)
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'&amp;page='. $max_page.'" class="lien_pagination">'. $language['page_dern'] .'</a>&nbsp; ';
			 
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
	 
		if ($pos == 1)
		{
			if($tri == 2)
			echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=1" class="lien_affich">'. $language['tri_date'] .'</a>';
			
			else echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=2" class="lien_affich">'. $language['tri_prix'] .'</a>';
		}
	  
	?>
 
</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>

<?php
}

/// ----- BARRE INFO LISTING RECHERCHE -----  ///

function display_search_infos($f, $limit, $page_num, $nb_ann)
{
	global $language, $cache_regions, $cache_departements, $cache_categories;
	
	$f = (int) $f;
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$par = (int) $nb_ann['par'];
	$pro = (int) $nb_ann['pro']; 
	$total = $par + $pro;

	$reg = (!empty($_SESSION['old_reg'])) ? (int) $_SESSION['old_reg'] : 0;
	$dep = (!empty($_SESSION['old_dep'])) ? (int) $_SESSION['old_dep'] : 0;
	$cat = (!empty($_SESSION['old_cat'])) ? stripslashes($_SESSION['old_cat']) : 0;
	
	$nom_reg = '';
	$nom_dep = '';
	$nom_cat = '';

	foreach($cache_regions as $v)
	{
		if($reg == $v['id_reg'])
		$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}
	
	foreach($cache_departements as $v)
	{
		if($dep == $v['id_dep'])
		$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}
	
	foreach($cache_categories as $v)
	{
		if($cat == $v['id_cat'])
		$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
	}

?>

<div id="barre_info">

	<?php
	 
		$txt_reg = (!empty($nom_reg)) ? $nom_reg : $language['select_regions'];
		$txt_dep = (!empty($nom_dep)) ? $nom_dep : $language['select_departements'];
		
		if(!empty($nom_cat)) 
		$txt_cat = $nom_cat;
		
		elseif(!empty($cat))
		$txt_cat = $cat;
		
		else $txt_cat = $language['select_categories'];
		
	?>
	
	<div class="bt_info_left"></div>
		<div class="bt_info_center">
			<p class="p_barre_info_left">
				<?php echo $txt_reg; ?>
			</p>
		</div>
	<div class="bt_info_right2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $txt_dep; ?>
		</p>
	</div>
	<div class="bt_info_right_v2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $txt_cat; ?>
		</p>
	</div>
	<div class="bt_info_right_v"></div>
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>) 
		</p>
	</div>

</div>

<div id="corps_info_ann">

		<a class="<?php if ($f == 0) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_search.php?l=1"><?php echo $language['all_lien_ann']; ?> :</a>
     
		<?php
	     
			$deb = ($page_num * $limit) - $limit + 1;
			$fin = $limit * $page_num;
		  
			if ($f != 1 && $f != 2)
				echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .'  '. $total .' &nbsp;</span>';
          
			else echo '<span class="txt_info_nb_ann">&nbsp; '. $total .' &nbsp;</span>'; 
		  
		?>
		
		<a class="<?php if ($f == 1) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_search.php?l=1&amp;f=1"><?php echo $language['all_lien_par']; ?> :</a>
     
		<?php 
	 
			if($f == 1) 
			{
				if ($par != 0)
					echo '<span class="txt_info_nb_ann">&nbsp; '. $deb. ' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
		     
				else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $par .' &nbsp;</span>';
			}
			else echo '<span class="txt_info_nb_ann">&nbsp; '. $par .' &nbsp;</span>';
		 
		?>
		
		<a class="<?php if ($f == 2) echo 'lien_info_ann_sel'; else echo 'lien_info_ann'; ?>" href="ann_search.php?l=1&amp;f=2"><?php echo $language['all_lien_pro']; ?> :</a>
     
		<?php
		  
			if($f == 2)
			{
				if ($pro != 0)
				echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '. $pro .' &nbsp;</span>';
		     
				else echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .' '.$pro .' &nbsp;</span>';
			}
			else echo '<span class="txt_info_nb_ann">&nbsp; '. $pro .' &nbsp;</span>';
         
		?>
		
</div>
<?php
}

/// ----- PAGINATION LISTING RECHERCHE -----  ///
	
function display_search_links($f, $max_page, $page, $limit, $pos, $tri)
{
	global $language;
	
	$f = (int) $f;
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	$tri = (int) $tri;
	
	$nav = ' ';
	
	$url = 'ann_search.php?l=1';
	
	if ($f == 1 || $f == 2)
	$url .= '&amp;f='. $f;

	if ($tri == 2)
	$url .= '&amp;tri='. $tri;

	$url_tri = 'ann_search.php?l=1';
	
	if($f == 1 || $f == 2)
	$url_tri .= '&amp;f='. $f;

?>	

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
 
	<?php
	  
		$num = floor($page/10);
	 
		if($num == 0)
		$inf = ($num * 10) + 1;
	 
		else $inf = ($num * 10);
	 
		$sup = ($num + 1) * 10;
	 
		if($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
			
			$nav .="... ";
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'&amp;page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href= "'. $url .'&amp;page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}	
		
		if($page > 1)
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
		
		if($page < $max_page)
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'&amp;page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'&amp;page='. $max_page .'" class="lien_pagination">'. $language['page_dern'] .' ></a>&nbsp; ';
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
	 
		if($pos == 1)
		{ 
			if ($tri == 2)
			echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=1" class="lien_affich">'. $language['tri_date'] .'</a>';
		 
			else echo '<a href="'. $url_tri .'&amp;page='. $page .'&amp;tri=2" class="lien_affich">'. $language['tri_prix'] .'</a>';
		 
		}
		
	?>
	
</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>
	
<?php 
}

/// ----- LINSTING DES ANNONCES -----  ///

function display_all($array)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_categories;
	
foreach ($array as $row)
{
	$id = (int) $row['id_ann'];
	$id_reg = (int) $row['id_reg'];
	$id_dep = (int) $row['id_dep'];
	$id_cat = (int) $row['id_cat'];
	
	$nom_reg = '';
	
	foreach($cache_regions as $v)
	{
		if($id_reg == $v['id_reg'])
		$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}
	
	$nom_dep = '';
	
	foreach($cache_departements as $v)
	{
		if($id_dep == $v['id_dep'])
		$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}
	
	$nom_cat = '';
	$disc = '';
	
	foreach($cache_categories as $v)
	{
		if($id_cat == $v['id_cat'])
		{
			$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
			$disc = (int) $v['disc'];
		}
	}
	
	$titre = stripslashes(htmlspecialchars($row['titre']));
	$ann = stripslashes(htmlspecialchars($row['ann']));
	$cod_pos = htmlspecialchars($row['code_pos'], ENT_QUOTES);
	$ville = htmlspecialchars($row['ville'], ENT_QUOTES);
	$status = (int) $row['status'];
	$type =(int) $row['type'];
	$date = (int) $row['date'];
	$prix = (float) $row['prix'];
	$prix = number_format($prix, 2, ',', ' ');
	$urgent = (int) $row['urg'];
	$encadre = (int) $row['enc'];
	$nom_image = htmlspecialchars($row['nom_image'], ENT_QUOTES);
	$video = htmlspecialchars($row['video'], ENT_QUOTES);
	$nb_photo = htmlspecialchars($row['n_photo'], ENT_QUOTES);
	
	$nom_photo = ($nb_photo > 0) ? $language['pho_ann2'] : $language['pho_ann1'];
	
	// Url rewriting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ', '&#039;');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n', '-');      
	
	$url_ann = $nom_reg .'-'. $nom_dep .'-'. $nom_cat .'-'. $titre;
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
	
	// Taille du titre
	
	if (strlen($titre) > 42)
	{
		$titre = substr($titre, 0, 42);
		$pos = strrpos($titre, ' ');
		
		if($pos)
		$titre = substr($titre, 0, $pos);
		
		$titre .= "...";
	}
	
	// Taille de la ville
	
	if (strlen($ville) > 20)
	{
		$ville = substr($ville, 0, 20);
		$pos_vil = strrpos($ville, ' ');
		
		if($pos_vil)
		$ville = substr($ville, 0, $pos_vil);
		
		$ville .= "...";
	}
	
	// Taille du texte de l'info bulle
	
	if (strlen($ann) > 42)
	{
		$ann = substr($ann, 0, 200);
		$pos = strrpos($ann, ' ');
		
		if($pos)
		$ann = substr($ann, 0, $pos);
		
		$ann .= "...";
	}
	
	// Gestion de la date
	
	$now = time();
	$date_now = date('d', $now);
	$moi_now = date('m', $now);
	$date_ann = date('d', $date);
	$moi_ann = date('m', $date);
	
	if(($date_now == $date_ann) && ($moi_now - $moi_ann == 0))
	{
		$hour = date('G', $date);
		$min = date('i', $date);
		$hour .= 'h'.$min;
		$day = $language['auj_ann'] .' ';
	}
	elseif( ($date_now - $date_ann == 1) && ($moi_now - $moi_ann == 0 ) )
	{
		$hour = date('G', $date);
		$min = date('i', $date);
		$hour .= 'h'.$min;
		$day = $language['hier_ann'] .' ';
	}
	else
	{
		$month = date('d/m', $date);
		$hour = date('G', $date);
		$min = date('i', $date);
		$hour .= 'h'.$min;
		$day = '';
	}
	
	$day = htmlspecialchars($day, ENT_QUOTES);
	$hour = htmlspecialchars($hour, ENT_QUOTES);
?>

<?php
if($disc == 1 && !isset($_SESSION['disc']))
{
?>

<div class="fond_ann_listing_1">
<p class="p_disc txt_info"><?php echo $language['texte_disc']; ?></p>
</div>

<?php
}
else
{
?>

<div <?php if($encadre == 1) echo 'class="fond_ann_listing_2"'; else echo 'class="fond_ann_listing_1"'; ?> >

<?php 
	
	// Bloc lien

	if($encadre == 1)
	echo '<a href="'. $url_aff .'-'. $id .'.htm" class="bloc_lien_listing_2" title="'. $ann .'"><p class="p_titre_listing">'. $titre .'</p>';
	
	else echo '<a href="'. $url_aff .'-'. $id .'.htm" class="bloc_lien_listing_1" title="'. $ann .'"><p class="p_titre_listing">'. $titre .'</p>';
	
	// Adresse
	
	echo '<div class="bloc_adresse_listing">';
	
	if(empty($nom_dep)) 
	echo '<p class="p_adresse_listing">'. $nom_reg .'<br />';
		
	else echo '<p class="p_adresse_listing">'. $nom_dep .'<br />';
	
	echo $cod_pos .' '. $ville .'</p>';
	
	if($prix != 0)
	echo '<p class="p_prix_listing"><strong>'. $prix .' '. $param_gen['devise'] .'</strong></p>';
	
	if($urgent == 1)
	echo '<p class="bloc_logo_urgent"><img src="images/logo_urgent.png" alt="" /></p>';
	
	echo '</div>';
	
	// Catégorie
	
	echo '<div class="bloc_categorie_listing"><p class="p_categorie_listing">';
	
	if($type == 1) echo ' '. $language['type_ann_1']. ' / ';
	if($type == 2) echo ' '. $language['type_ann_2']. ' / ';
	if($type == 3) echo ' '. $language['type_ann_3']. ' / ';
	if($type == 4) echo ' '. $language['type_ann_4']. ' / ';
	
	echo $nom_cat;
	
	if($status == 2) echo ' <strong>'. $language['pro_ann'] .'</strong>';
	
	if(!empty($video)) echo '<br /><br /><span class="orange">'. $language['video_ann'] .'</span>';
	
	echo '</p></div>';
	
	// Bloc photo
	
	echo '<div class="bloc_photo_listing">';
	
	if(!empty($nom_image) && preg_match('#^https?://#', $nom_image) == true)
	{
		echo '<img src="'. $nom_image .'" style="max-width: 150px; max-height: 105px;" alt="" />';
	}
	elseif(!empty($nom_image) && file_exists('images/vignettes/'.$nom_image))
	{ 
		$size = getimagesize('images/vignettes/'. $nom_image);
		
		if($size[0] < 150 && $size[1] < 105)
		echo '<img src="images/vignettes/'. $nom_image .'" alt="" />';
		
		elseif($size[0] > $size[1])
		echo '<img src="images/vignettes/'. $nom_image .'" width="150" height="105" alt="" />';
		
		elseif($size[0] <= $size[1])
		echo '<img src="images/vignettes/'. $nom_image .'" height="105" alt="" />';
	}
	else echo '<img src="images/no_photo2.png" alt="" />';
	
	echo '</div>';
	
	// Date
	
	echo '<div class="bloc_date_listing"><p class="p_date_listing">';
	
	if(!empty($day)) 
	echo $day .'<br />'. $language['heur_ann'] .' '. $hour;
	
	else echo $language['date_ann'] .' '. $month .'<br />'. $language['heur_ann'] .' '. $hour; 
	
	echo '<br /><br /><strong>'. $nb_photo .'</strong> '. $nom_photo;
	
	echo '</p></div>';
	
	echo '</a></div>';
	
}
}
?>

<?php	
}

/// ----- MENU DE RECHERCHE ET DE PUB -----  ///

function right_pub($reg, $dep, $cat, $mots_search, $code_pos)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_categories, $cache_publicites, $cache_param_champs;

?>

<div id="corps_recherche">

<form method="get" action="ann_search.php">
	
	<div id="top_menu_recherche"></div>
	
	<div id="middle_menu_recherche">
		
		<input type="text" class="input_recherche" name="keywords" onfocus="InputCon(this, '<?php echo $language['value_recherche']; ?>')" onblur="InputCon(this, '<?php echo $language['value_recherche']; ?>')" value="<?php if(!empty($mots_search)) echo $mots_search; elseif(!empty($_GET['keywords'])) echo htmlspecialchars($_GET['keywords']); else echo $language['value_recherche']; ?>" />
		
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
		<input type="text" class="input_recherche" name="zip_code" onfocus="InputCon(this, '<?php echo $language['value_code_postal']; ?>')" onblur="InputCon(this, '<?php echo $language['value_code_postal']; ?>')" value="<?php if(!empty($code_pos)) echo $code_pos; elseif(!empty($_GET['zip_code'])) echo htmlspecialchars($_GET['zip_code']); else echo $language['value_code_postal']; ?>" />
		<?php
		}
		?>
	  
	  
		<?php 
			
			display_search_regions($reg, $cache_regions); //Afficher les régions 
			
			echo '<div id="get_departements">';
			
			$aff = 0;
					
			foreach($cache_departements as $v)
			{
				if($v['id_reg'] == $reg)
				$aff = 1;
			}
			
			if($aff == 1)
			{
				if(!empty($reg)) display_search_departements($dep, $reg, $cache_departements);
			}
			
			echo '</div>';
			
			display_search_categories($cat, $cache_categories); //Afficher les categories
			
			echo '<div id="get_options">';
			
			if(!empty($cat)) display_search_options($cat); 
			
			echo '</div>';
			
			?>
			
			<p class="p_recherche_unique"><img src="images/fleche_u.png" alt="" /><?php echo $language['uniquement']; ?></p>
			
			<div id="left_checkbox_recherche">
			
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="titre" name="titre" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_titre'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_titre'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_titre" alt="" /> 
					&nbsp;<label for="titre"><?php echo $language['checkbox_chercher_titre']; ?></label>
				</p>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="offres" name="offres" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_offres'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_offres'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_offres" alt="" /> 
					&nbsp;<label for="offres"><?php echo $language['checkbox_chercher_offres']; ?></label>
				
				<?php
				if($param_gen['active_ech'] == 1)
				{
				?>
					<p class="p_checkbox_recherche">
						<input type="checkbox" class="input_checkbox" id="echanges" name="echanges" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_echanges'])) echo 'checked="checked"'; ?> />
						<img <?php if (!empty($_SESSION['old_echanges'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_echanges" alt="" /> 
						&nbsp;<label for="echanges"><?php echo $language['checkbox_chercher_echanges']; ?></label>
					</p>
				<?php
				}
				?>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="photo" name="photo" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_photo'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_photo'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_photo" alt="" /> 
					&nbsp;<label for="photo"><?php echo $language['checkbox_chercher_photo']; ?></label>
				</p>
			
			</div>
			
			<div id="right_checkbox_recherche">
			
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="urgentes" name="urgentes" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_urgentes'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_urgentes'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_urgentes" alt="" /> 
					&nbsp;<label for="urgentes"><?php echo $language['checkbox_chercher_urgent']; ?></label>
				</p>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="recherches" name="recherches" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_recherches'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_recherches'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_recherches" alt="" /> 
					&nbsp;<label for="recherches"><?php echo $language['checkbox_chercher_recherches']; ?></label>
				</p>
				
				<?php
				if($param_gen['active_don'] == 1)
				{
				?>
					<p class="p_checkbox_recherche">
						<input type="checkbox" class="input_checkbox" id="dons" name="dons" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_dons'])) echo 'checked="checked"'; ?> />
						<img <?php if (!empty($_SESSION['old_dons'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_dons" alt="" /> 
						&nbsp;<label for="dons"><?php echo $language['checkbox_chercher_dons']; ?></label>
					</p>
				<?php
				}
				?>
				
				<p class="p_checkbox_recherche">
					<input type="checkbox" class="input_checkbox" id="video" name="video" value="1" onclick="turnImgCheck(this);" <?php if (!empty($_SESSION['old_video'])) echo 'checked="checked"'; ?> />
					<img <?php if (!empty($_SESSION['old_video'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_video" alt="" /> 
					&nbsp;<label for="video"><?php echo $language['checkbox_chercher_video']; ?></label>
				</p>
			
			</div>
			
			<input id="submit_recherche" type="image" src="images/bouton_search.png" value="" />
			
	</div>
	
	<div id="bottom_menu_recherche"></div>

</form>

<?php

$aff = '';

foreach($cache_publicites as $v)
{
	if(($v['id_reg'] == 0 || $v['id_reg'] == $reg) && $v['type'] == 2)
	$aff = '1';
	
	elseif(($v['id_dep'] == 0 || $v['id_dep'] == $dep) && $v['type'] == 2)
	$aff = '1';
	
	elseif(($v['id_cat'] == 0 || $v['id_cat'] == $cat) && $v['type'] == 2)
	$aff = '1';
}


if($aff == 1)
{
	echo '<div id="img_info_pub"><p id="p_img_info_une">'. $language['zone_pub'] .'</p></div>';
	
	foreach($cache_publicites as $row)
	{	
		$id_reg = (int) $row['id_reg'];
		$id_dep = (int) $row['id_dep'];
		$id_cat = (int) $row['id_cat'];
		$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
		$image = stripslashes(htmlspecialchars($row['image'], ENT_QUOTES));
		$url = stripslashes(htmlspecialchars($row['url'], ENT_QUOTES));
		$text = stripslashes(htmlspecialchars($row['text'], ENT_QUOTES));
		$script = $row['script'];
		$type = (int) $row['type'];
	   
		if((($id_reg == 0 || $id_reg == $reg) && ($id_dep == 0 || $id_dep == $dep) && ($id_cat == 0 || $id_cat == $cat)) && $type == 2)
		{
			if(!empty($text))
			{
				echo '<div class="bloc_pub_texte_listing">';
				echo '<div class="logo_pub_texte_listing"><a href="'. $url .'" target="_blank"><img src="images/pub/'. $image .'" width="50" alt="'. $nom .'" /></a></div>';
				echo '<p class="p_pub_text_listing"><a href="'. $url .'" target="_blank">'. $text .'</a></p>';
				echo '</div>';
			}
				
			if(empty($text) && empty($script))
			echo '<a href="'. $url .'" target="_blank"><img src="images/pub/'. $image .'" width="208" alt="'. $nom .'" /></a><div class="espace_pub"></div>';
		 
			if(!empty($script))
			echo '<div class="pub_script">'. $script .'</div><div class="espace_pub"></div>';
		}
	}
}
?>

</div>

</div>
</div>
<?php
}

/// ----- PAGE DE RECHERCHE SANS RESULTATS -----  ///
	
function display_text_no($texte)
{
	global $language;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">
<div id="corps_listing">

	<p class="p_center">
		<span class="txt_info"><?php echo $texte ?></span>
	</p>
	
</div>
<?php
}

/// ----- PAGE D'UNE ANNONCE -----  ///	

function display_annonce($id, $row, $images, $opts, $champs, $membre)
{
	global $language, $param_gen, $cache_options_visuelles, $cache_publicites, $cache_champs, $cache_categories;	
	
	if(is_array($membre))
	{
		$m_id_compte = $membre[0]['id_compte'];
		$email_compte = $membre[0]['email'];
	}
	
	$id = (int) $id;
	$id_cat = (int) $row[0]['id_cat'];
	$id_reg = (int) $row[0]['id_reg'];
	$id_dep = (int) $row[0]['id_dep'];
	$titre = stripslashes(htmlspecialchars($row[0]['titre'], ENT_QUOTES));	
	$ann = nl2br(stripslashes(htmlspecialchars($row[0]['ann'], ENT_QUOTES)));
	$nom = stripslashes(htmlspecialchars($row[0]['nom'], ENT_QUOTES));
	$status = (int) $row[0]['status'];
	$prix = (float) $row[0]['prix'];
	$prix = number_format($prix, 2, ',', ' '); 
	$code = htmlspecialchars($row[0]['code_pos'], ENT_QUOTES);
	$ville = htmlspecialchars($row[0]['ville'], ENT_QUOTES);
	$email = htmlspecialchars($row[0]['email'], ENT_QUOTES);
	$tel = htmlspecialchars($row[0]['tel'], ENT_QUOTES);
	$date = (int) $row[0]['date'];
	$tel_cache = htmlspecialchars($row[0]['tel_cache'], ENT_QUOTES);
	$video = $row[0]['video'];
	$id_compte = (int) $row[0]['id_compte'];
	$id_bout = (int) $row[0]['id_boutique'];
	$titre_bout = stripslashes(htmlspecialchars($row[0]['titre_bout'], ENT_QUOTES));
	$time = date('d/m/y', $date);
	$time = htmlspecialchars($time, ENT_QUOTES);
	$tet = (int) $row[0]['tete'];
	$une = (int) $row[0]['une'];
	$urg = (int) $row[0]['urg'];
	$enc = (int) $row[0]['enc'];
	$nb_visit = (int) $row[0]['n_visit'];
	$last_visit = htmlspecialchars($row[0]['last_v']);
	$last_h = htmlspecialchars($row[0]['last_h']);
	
	//Info dislaimer
	
	$disc = '';
	
	foreach($cache_categories as $v)
	{
		if($v['id_cat'] == $id_cat)
		$disc = (int) $v['disc'];
	}
	
	//Format siret et nom d'entreprise pour les annonces de professionnels
	
	if($status == 2)
	{
		$sir = htmlspecialchars($row[0]['siret'], ENT_QUOTES);
		$ent = stripslashes(htmlspecialchars($row[0]['nom_societe'], ENT_QUOTES));;
	}
	
	// Taille du titre
	
	if(strlen( $titre) > 35)
	{
		$titre = substr($titre, 0, 35);
		$titre .= "...";
	}
	
	//Si l'annonce appartient au membre connecté
	
	if(isset($_SESSION['connect']) && ($id_compte == $m_id_compte || $email == $email_compte))
	{
		$_SESSION['valid_id'] = $id;
		
		if(isset($_SESSION['photo_mod']))
		unset($_SESSION['photo_mod']);
	}
	
	// Url rewrinting

	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
 
	$url_bout = $titre_bout;
	$url_bout = str_replace($accent, $sans_accent, $url_bout);
	
	$url = array();
  
	for($i = 0; $i < strlen($url_bout); $i++) 
	{
	   array_push($url, $url_bout[$i]); 
	}
 
	$url_aff = '';
	
	foreach($url as $url_bout)
	{
		if(preg_match('#^[a-zA-Z0-9]$#', $url_bout) != true)
		$url_bout = str_replace($url_bout, '-', $url_bout);
	
		$url_aff .= $url_bout;
	}
	
	// Vérifier s'il s'agit d'une annonce d'un compte et le type de compte
	
	$type_acc = stripslashes(htmlspecialchars($row[0]['type'], ENT_QUOTES));
	
?>

<?php
if($disc == 1 && !isset($_SESSION['disc']))
{
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<p class="p_center">
		<span class="txt_info"><?php echo $language['texte_disc']; ?></span>
	</p>
	
</div>
</div>
<?php
}
else
{
?>
<div id="bloc_center">
<div id="middle_bloc_center">

<form method="post" action="<?php echo 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

<div id="bloc_titre_ann">
	<div id="bt_result"></div><p id="retour"><a href="javascript:history.back()"><?php echo $language['page_ann_retour']; ?></a></p>
	<h2 class="vert"><?php echo $titre; ?></h2>
</div>

<div id="bloc_depot_ann">
	<p class="p_info_ligne">	
		<?php echo $language['page_ann_depot']; ?>   
		<a href="env_msg.php?id=<?php echo $id;?>" class="vert"><?php echo $nom; ?></a> 
		<?php echo $language['page_ann_date'] .' '. $time; ?> 
	</p>
</div>

<?php
	
	if(count($images) != 0) // Images annonce
	{
		$tableau_js = '[';
			
		for($i = 0; $i < count($images); $i++)
		{
			if($i == 0)
			$tableau_js .= '"'. $images[$i][0] .'"';
			
			else $tableau_js .= ', "'. $images[$i][0] .'"';
		}
		
		$tableau_js .= ']';
		
		echo '<div id="bloc_vignettes_ann">';
		
		foreach($images as $v)
		{
			if(!empty($v[0]) && preg_match('#^https?://#', $v[0]) == true)
			{
				echo '<div class="bloc_vignette_ann"><img onclick=\'photos_xml("'. $v[0] .'", '. $tableau_js .', 0, 1)\' src="'. $v[0] .'" style="max-width: 64px; max-height: 50px; cursor:pointer" alt="" /></div>';
			}
			elseif(file_exists('images/vignettes/'. $v[0]))
			{
				$size = getimagesize('images/vignettes/'. $v[0]);
				
				echo '<img src="images/photos/'. $v[0] .'" al="" style="display: none" />';
				
				if($size[0] < 64 && $size[1] < 50)
				echo '<div class="bloc_vignette_ann"><img onclick=\'photos("'. $v[0] .'", '. $tableau_js .', 0, 1)\' src="images/vignettes/'. $v[0] .'" style="cursor:pointer" alt="" /></div>';
				
				elseif($size[0] > $size[1])
				echo '<div class="bloc_vignette_ann"><img onclick=\'photos("'. $v[0] .'", '. $tableau_js .', 0, 1)\' src="images/vignettes/'. $v[0] .'" width="64" height="50" style="cursor:pointer" alt="" /></div>';
				
				elseif($size[0] <= $size[1])
				echo '<div class="bloc_vignette_ann"><img onclick=\'photos("'. $v[0] .'", '. $tableau_js .', 0, 1)\' src="images/vignettes/'. $v[0] .'" height="50" style="cursor:pointer" alt="" /></div>';
			}
		}
		
		echo '</div>';
		
		// Grande image
		
		if(!empty($images[0][0]) && preg_match('#^https?://#', $images[0][0]) == true)
		{
			echo '<div id="bloc_photo_ann"><img src="'. $images[0][0] .'" style="max-width: 677px; max-height: 480px;" id="photo" alt="" onclick=\'photos_xml("", '. $tableau_js .', 0, 2)\' /></div>';
		}
		elseif(file_exists('images/photos/'. $images[0][0]))
		{
			echo '<div id="bloc_photo_ann"><img src="images/photos/'. $images[0][0] .'" id="photo" alt="" onclick=\'photos("", '. $tableau_js .', 0, 2)\' /></div>';
		}
		else echo '<div id="bloc_photo_ann"><img src="images/no_photo3.png" alt="" /></div>';
	}
	else echo '<div id="bloc_photo_ann"><img src="images/no_photo3.png" alt="" /></div>';
	
?>

<?php
if(!empty($video))
{
	if(preg_match("#^http://www.youtube.com/watch\?v#", $video))
	{
		$type = 1;
		$video = str_replace('http://www.youtube.com/watch?v=', '', $video);
	}
	elseif(preg_match("#^https://www.youtube.com/watch\?v#", $video))
	{
		$type = 1;
		$video = str_replace('https://www.youtube.com/watch?v=', '', $video);
	}
	elseif(preg_match("#^http://www.dailymotion.com/video/#", $video))
	{
		$type = 2;
		$video = str_replace('http://www.dailymotion.com/video/', '', $video);
	}
	elseif(preg_match("#^https://www.dailymotion.com/video/#", $video))
	{
		$type = 2;
		$video = str_replace('https://www.dailymotion.com/video/', '', $video);
	}
	else $type = 0;
?>
<div id="bloc_video">
	<p class="p_video"><?php echo $language['page_ann_video'] ?> <a style="cursor:pointer" onclick="GetVideo('<?php echo $type; ?>', '<?php echo $video; ?>');" class="orange"><?php echo $language['page_ann_video_link'] ?></a></p>
</div>
<?php
}
?>

<div id="video"></div>

<div id="bloc_infos_ann">

	<div id="bloc_info_ann_left">

		<p class="p_top_info_ann vert"><?php echo $language['page_ann_info_g']; ?></p>
		
		<?php
			
			if($prix != 0)
			echo '<p class="p_prix_info_ann"><span class="vert">'. $language['page_ann_prix'] .' :</span> '. $prix .' '. $param_gen['devise'] .'</p>';
		
		?>
		
		<?php
			
			if(!empty($code) || !empty($ville))
			echo '<p class="p_middle_info_ann"><span class="vert">'. $language['page_ann_ville'] .' : </span>'. $code .' '. $ville .'</p>';
				
			if(is_array($opts))
			{
				foreach($opts as $row)
				echo '<p class="p_middle_info_ann"><span class="vert">'. htmlspecialchars($row['nom_opt']) .' : </span> '. htmlspecialchars($row['val_for']) .' '. htmlspecialchars($row['uni_opt']) .'</p>';
			}
			
			if(is_array($champs))
			{
				foreach($champs as $v)
				{
					$id_champ = (int) $v['id_champ'];
					
					foreach($cache_champs as $row)
					{
						if($id_champ == $row['id_champ'])
						$nom_champ = htmlspecialchars($row['nom']);
					}
					
					if(!empty($nom_champ))
					echo '<p class="p_middle_info_ann"><span class="vert">'. $nom_champ .' : </span> '. htmlspecialchars($v['valeur']) .'</p>';
				}
			}
			
		?>

	</div>
		
	<div id="bloc_info_ann_right">
		<p class="p_top_info_ann vert"><?php echo $language['page_ann_info_detail']; ?></p>
		<p class="p_ann_info_ann"><?php echo $ann; ?></p>
	</div>

	<div id="bloc_contact_ann">

		<p class="p_top_info_ann vert"><?php echo $language['page_ann_info_contact']; ?></p>
		
		<div class="bloc_contact_ann">
			
			<?php 
				
				if($status == 2)
					echo '<img src="images/icone_ent.png" alt="" /> <span class="txt_info">'. $ent .'</span>';
				
				else echo '<img src="images/icone_ent.png" alt="" /> <span class="txt_info">'. $nom .'</span>';
				
			?>
	 
		</div>
		
		<?php 
		if(empty($titre_bout))
		{
		?>
		<div class="bloc_contact_ann">
			<img src="images/icone_ven.png" alt="" /> <a href="ann_vendeur.php?id=<?php echo $id;?>" class="lien_menu_ann"><?php echo $language['page_ann_txt_menu_ann_vend']; ?></a>
		</div>
		<?php
		}
		?>
		
		<?php 
		if($status == 2 && !empty($sir))
		{
		?>
		<div class="bloc_contact_ann">
			<img src="images/icone_sir.png" alt="" /> <span class="txt_info"><?php echo $language['page_ann_pro_sir'] .' : '. $sir; ?></span>
		</div>
		<?php
		}
		?>
		
		<div class="bloc_contact_ann">
			<img src="images/icone_env.png" alt="" /> <a href="env_msg.php?id=<?php echo $id;?>" class="lien_menu_ann"><?php echo $language['page_ann_txt_menu_mail']; ?></a>
		</div>
		
		<?php 
		if(!empty($tel) && $tel_cache=='N')
		{
		?>
		<div class="bloc_contact_ann">
			<img src="images/icone_tel.png" alt="" /> <span class="txt_info"><?php echo $language['page_ann_txt_menu_tel'] .' : '; ?><img src="tel.php?tel=<?php echo $tel; ?>" alt="" /></span>
		</div>
		<?php
		}
		?>
		
		<?php 
		if(!empty($titre_bout))
		{
		?>
		<div class="bloc_contact_ann">
			<img src="images/icone_bout.png" alt="" /> <a href="<?php echo 'Boutique-'. $id_bout .'-'. $url_aff .'.htm'; ?>"><?php echo $language['page_ann_txt_menu_bout']; ?></a>
		</div>
		<?php
		}
		?>
		
		<p class="p_gest_info_ann vert"><?php echo $language['page_ann_info_gestion']; ?></p>
		
		<?php
		
		if(isset($_SESSION['connect']) && ($id_compte == $m_id_compte || $email == $email_compte))
		{
		?>
		<div class="bloc_contact_ann"><img src="images/icone_mod.png" alt="" /> <a href="modif_ann.php"><?php echo $language['page_ann_txt_menu_mod']; ?></a></div>
		<div class="bloc_contact_ann"><img src="images/icone_sup.png" alt="" /> <a href="supp_ann.php?id=<?php echo $id;?>"><?php echo $language['page_ann_txt_menu_sup']; ?></a></div>
		<?php
		}
		elseif($type_acc == 1)
		{
		?>
		<div class="bloc_contact_ann"><img src="images/icone_mod.png" alt="" /> <a href="acc_conn.php?type=1"><?php echo $language['page_ann_txt_menu_mod']; ?></a></div>
		<div class="bloc_contact_ann"><img src="images/icone_sup.png" alt="" /> <a href="acc_conn.php?type=1"><?php echo $language['page_ann_txt_menu_sup']; ?></a></div>
		<?php
		}
		elseif($type_acc == 2)
		{
		?>
		<div class="bloc_contact_ann"><img src="images/icone_mod.png" alt="" /> <a href="acc_conn.php?type=2"><?php echo $language['page_ann_txt_menu_mod']; ?></a></div>
		<div class="bloc_contact_ann"><img src="images/icone_sup.png" alt="" /> <a href="acc_conn.php?type=2"><?php echo $language['page_ann_txt_menu_sup']; ?></a></div>
		<?php
		}
		else
		{
		?>
		<div class="bloc_contact_ann"><img src="images/icone_mod.png" alt="" /> <a href="modif_pass.php?id=<?php echo $id;?>"><?php echo $language['page_ann_txt_menu_mod']; ?></a></div>
		<div class="bloc_contact_ann"><img src="images/icone_sup.png" alt="" /> <a href="supp_ann.php?id=<?php echo $id;?>"><?php echo $language['page_ann_txt_menu_sup']; ?></a></div>
		<?php
		} 
		
		$etat_tet = '';
		$etat_une = '';
		$etat_urg = '';
		$etat_enc = '';
		
		foreach($cache_options_visuelles as $v)
		{
			if($v['type'] == 1)
			$etat_tet = 1;
			
			if($v['type'] == 2)
			$etat_une = 1;
			
			if($v['type'] == 3)
			$etat_urg = 1;
			
			if($v['type'] == 4)
			$etat_enc = 1;
		}
		
		if($etat_tet == 1 && $tet == 0)
		echo '<div class="bloc_contact_ann"><img src="images/icone_rem.png" alt="" /> <a href="pay_ann_opts.php?annonce='. $id .'&amp;id_opt=1" class="lien_menu_ann">'. $language['page_ann_txt_menu_rem'] .'</a></div>';
		
		if($etat_une == 1 && $une == 0)
		echo '<div class="bloc_contact_ann"><img src="images/icone_une.png" alt="" /> <a href="pay_ann_opts.php?annonce='. $id .'&amp;id_opt=2" class="lien_menu_ann">'. $language['page_ann_txt_menu_une'] .'</a></div>';

		if($etat_urg == 1 && $urg == 0)
		echo '<div class="bloc_contact_ann"><img src="images/icone_urg.png" alt="" /> <a href="pay_ann_opts.php?annonce='. $id .'&amp;id_opt=3" class="lien_menu_ann">'. $language['page_ann_txt_menu_urg'] .'</a></div>';

		if($etat_enc == 1 && $enc == 0)
		echo '<div class="bloc_contact_ann"><img src="images/icone_enc.png" alt="" /> <a href="pay_ann_opts.php?annonce='. $id .'&amp;id_opt=4" class="lien_menu_ann">'. $language['page_ann_txt_menu_enc'] .'</a></div>';
		
		?>
		
		<p class="p_gest_info_ann vert"><?php echo $language['page_ann_info_stat']; ?></p>
		<div class="bloc_contact_ann"><img src="images/icone_vis.png" alt="" /> <span class="txt_info"><?php echo $language['page_ann_txt_menu_visit'] .' : '. $nb_visit; ?></span></div>
		<div class="bloc_contact_ann"><img src="images/icone_las.png" alt="" /> <span class="txt_info"><?php echo $language['page_ann_txt_menu_visit_l'] .' : '. $last_visit .' '. $language['heur_ann'] .' '. $last_h; ?></span></div>
		<div class="bloc_contact_ann"><img src="images/icone_ref.png" alt="" /> <span class="txt_info"><?php echo $language['page_ann_txt_menu_ref'] .' : '. $id; ?></span></div>
		
		<?php
		
		// Espace PUB
		
		$aff = '';

		foreach($cache_publicites as $v)
		{
			if(($v['id_reg'] == 0 || $v['id_reg'] == $id_reg) && $v['type'] == 3)
			$aff = '1';
			
			elseif(($v['id_dep'] == 0 || $v['id_dep'] == $id_dep) && $v['type'] == 3)
			$aff = '1';
			
			elseif(($v['id_cat'] == 0 || $v['id_cat'] == $id_cat) && $v['type'] == 3)
			$aff = '1';
		}
		
		if($aff == 1) echo '<div id="bloc_pub">';

		foreach($cache_publicites as $row)
		{	
			$reg = (int) $row['id_reg'];
			$dep = (int) $row['id_dep'];
			$cat = (int) $row['id_cat'];
			$nom = stripslashes(htmlspecialchars($row['nom'], ENT_QUOTES));
			$image = stripslashes(htmlspecialchars($row['image'], ENT_QUOTES));
			$url = stripslashes(htmlspecialchars($row['url'], ENT_QUOTES));
			$text = stripslashes(htmlspecialchars($row['text'], ENT_QUOTES));
			$script = $row['script'];
			$type = (int) $row['type'];
		   
			if((($reg == 0 || $reg == $id_reg) && ($dep == 0 || $dep == $id_dep) && ($cat == 0 || $cat == $id_cat)) && $type == 3)
			{
				if(!empty($text))
				{
					echo '<div class="bloc_pub_ann">';
					echo '<p class="p_pub_ann_img"><a href="'. $url .'" target="_blank"><img src="images/pub/'. $image .'" width="50" alt="'. $nom .'" /></a></p>';
					echo '<p class="p_pub_ann_txt"><a href="'. $url .'" target="_blank">'. $text .'</a></p>';
					echo '</div><div class="espace_pub"></div>';
				}
				
				if(empty($text) && empty($script))
				echo '<a href="'. $url .'" target="_blank"><img src="images/pub/'. $image .'" width="234" alt="'. $nom .'" /></a><div class="espace_pub"></div>';
			 
				if(!empty($script))
				echo $script .'<div class="espace_pub"></div>';
			}
		}
		
		if($aff == 1) echo '</div>';
		
		?>

</div>

<div id="bloc_envoye_ann">
	<div class="bouton_left">
		<span class="txt_info"><?php echo $language['page_ann_env_ami']; ?> :</span>&nbsp;
		<input type="hidden" name="id" value="<?php echo $id;?>" />
		<input type="text" class="av_input" name="name" onfocus="InputCon(this, '<?php echo $language['page_ann_nom']; ?>')" onblur="InputCon(this, '<?php echo $language['page_ann_nom']; ?>')" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']); else echo $language['page_ann_nom']; ?>" />
		<input type="text" class="av_input" name="email" onfocus="InputCon(this, '<?php echo $language['page_ann_email']; ?>')" onblur="InputCon(this, '<?php echo $language['page_ann_email']; ?>')" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); else echo $language['page_ann_email']; ?>" />&nbsp; 
	</div>
	<div class="bouton_left">&nbsp;<input id="searchbutton" type="image" src="images/bouton_envoye.png" /></div>
</div>

</div>

<div id="bloc_action_ann">

	<?php
	 
		$geo_ville = $ville;
		$geo_ville = str_replace($accent, $sans_accent, $geo_ville);
		
	?>
	
	<div class="bloc_action_ann">
		<img src="images/icone_sel.png" alt="" /> <a href="selection.php?id=<?php echo $id;?>&amp;action=1"><?php echo $language['page_ann_txt_menu_fav']; ?></a>
	</div>
	
	<div class="bloc_action_ann">
		<img src="images/icone_imp.png" alt="" /> <a style="cursor:pointer" onclick="window.print()"><?php echo $language['page_ann_txt_menu_imp']; ?></a>
	</div>
	
	<div class="bloc_action_ann">
		<img src="images/icone_geo.png" alt="" /> <a href="geo_google.php?ville=<?php echo $geo_ville .'+'. $param_gen['pays']; ?>" onclick="window.open(this.href); return false;"><?php echo $language['page_ann_txt_menu_geo']; ?></a>
	</div>
	
	<div class="bloc_action_ann">
		<img src="images/icone_sig.png" alt="" /> <a href="contact.htm?id=<?php echo $id; ?>"><?php echo $language['page_ann_txt_menu_sig']; ?></a>
	</div>

</div>

</form>

</div>
</div>
<?php
}
}

/// ----- PAGE D'ACHAT D'OPTION POUR UNE ANNONCE -----  ///
	
function pay_ann_opts($id_opt, $error)
{
	global $language, $param_gen, $cache_options_visuelles, $cache_code_reduc;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<form method="post" action="">
	<div id="corps">

		<?php 
			
			if (!empty($error))
			echo '<div class="form_left_opts"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
		
		?>
		
		<?php 

		//OPTION REMONTER EN TETE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 1 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['form_tete'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio3">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 1)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type1_<?php echo $i; ?>" name="opt_type1" onclick="turnImgRadio(this, 3);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type1_<?php echo $i; ?>" alt="" />
						<label for="opt_type1_<?php echo $i; ?>"><?php echo $language['form_opt_tete'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				}
			}
			
			echo '</div>';
			}
			
			//OPTION A LA UNE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 2 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['form_une'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio4">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 2)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type2_<?php echo $i; ?>" name="opt_type2" onclick="turnImgRadio(this, 4);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type2']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type2']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type2_<?php echo $i; ?>" alt="" />
						&nbsp;<label for="opt_type2_<?php echo $i; ?>"><?php echo $language['form_opt_une'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				} 
			}
			
			echo '</div>';
			}
			
			//OPTION LOGO URGENT
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 3 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['form_urg'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio5">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 3)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type3_<?php echo $i; ?>" name="opt_type3" onclick="turnImgRadio(this, 5);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type3']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type3']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type3_<?php echo $i; ?>" alt="" />
						&nbsp;<label for="opt_type3_<?php echo $i; ?>"><?php echo $language['form_opt_urg'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				}
			}
			
			echo '</div>';
			}
			
			//OPTION ANNONCE ENCADREE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 4 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['form_enc'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio6">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 4)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type4_<?php echo $i; ?>" name="opt_type4" onclick="turnImgRadio(this, 6);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type4']) AND $_POST['opt_type4'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type4']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type4']) AND $_POST['opt_type4'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type4']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type4_<?php echo $i; ?>" alt="" /> 
						&nbsp;<label for="opt_type4_<?php echo $i; ?>"><?php echo $language['form_opt_enc'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				} 
			}
			
			echo '</div>';
			}
		?>
		
		
		<?php
		
			$aff = 0;
			
			foreach($cache_code_reduc as $v)
			{
				if($v['val3'] == 1)
				{
					$aff = 1;
				}
			}
		
		if($aff == 1)
		{
		?>
			<p class="form_left_opts">
			</p>
			
			<p class="form_right_select" style="margin-top: 5px;">
				<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><span class="txt_info"><?php echo $language['form_promo']; ?> :</span></label><?php if (isset($e['code'])) echo '</span>'; ?>
				<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
			</p>
		<?php
		}
		?>
		
		<p class="form_left_opts"></p>

		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
	</div>
	</form>
	
</div>
</div>
<?php
}

/// ----- FORMULAIRE DE CONTACT ANNONCEUR -----  ///

function display_mes_form($e)
{
	global $language;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">
	
	<?php
		
		if (isset($e['ban']))
		echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['page_env_msg_ban'] .'</span></div>';
		
		elseif (!empty($e['mes_nom']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_msg_error1'] .'</span></p>';
			
		elseif(!empty($e['mes_ema']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_msg_error2'] .'</span></p>';
		
		elseif (!empty($e['mes_mes']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_msg_error3'] .'</span></p>';
		
		elseif (!empty($e['mes_cod']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_msg_error4'] .'</span></p>';
	
	?>

	<p class="form_left"><label for="nom"><?php echo $language['page_env_msg_nom']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="nom" class="av_input" name="mes_nom" value="<?php if (!empty($_POST['mes_nom'])) echo htmlspecialchars($_POST['mes_nom']); ?>" />
	</p>
	
	<p class="form_left"><label for="mes_ema"><?php echo $language['page_env_msg_email']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="mes_ema" class="av_input" name="mes_ema" value="<?php if (!empty($_POST['mes_ema'])) echo htmlspecialchars($_POST['mes_ema']); ?>" />
	</p>
	
	<p class="form_left"><label for="mes_tel"><?php echo $language['page_env_msg_tel']; ?> :</label></p>
	
	<p class="form_right_select">
		<input type="text" id="mes_tel" class="av_input" name="mes_tel" value="<?php if (!empty($_POST['mes_tel'])) echo htmlspecialchars($_POST['mes_tel']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['page_env_msg_tel_info']; ?></span>
	</p>
	
	<p class="form_left"><label for="mes"><?php echo $language['page_env_msg_mes']; ?> :</label></p>
		
	<p class="form_right_textarea">
		<textarea id="mes" class="textarea" cols="60" rows="10" name="mes"><?php if (!empty($_POST['mes'])) echo htmlspecialchars($_POST['mes']); ?></textarea>
	</p>
	
	<p class="form_left"></p>
		
	<p class="form_right_select">
		<img src="captcha.php" width="115" height="24" alt="Captcha" id="captcha" />
	</p>
	
	<p class="form_left"><label for="code"><?php echo $language['page_env_msg_bot']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="code" class="av_input" name="code" value="<?php if (!empty($_POST['code'])) echo htmlspecialchars($_POST['code']); ?>" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_envoye.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>
<?php
}

/// ----- FORMULAIRE DE MOT DE PASSE -----  ////
	
function display_password_form($id, $e)
{
	global $language;
	
	$id = (int) $id;

?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">

	<?php
		
		if (!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_pass_mod_error'] .'</span></p>';
		
	?>

	<p class="form_left"><label for="password"><?php echo $language['page_pass_mod_pass']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="password" id="password" class="av_input" name="password" value="" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<a href="pass_form.php?id=<?php echo $id;?>" class="lien_info_ann2" ><?php echo $language['page_pass_mod_oub']; ?></a>
	</p>
	
	<p class="form_left">
	</p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_valider.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>

<?php
}

/// ----- FORMULAIRE D'ENVOI DU MOT DE PASSE -----  ///

function display_email_form($e)
{
	global $language;

?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">

	<?php
		
		if (!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_pass_error'] .'</span></p>';
		
	?>

	<p class="form_left"><label for="email"><?php echo $language['page_env_pass_ema']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="email" class="av_input" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_valider.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>

<?php
}

/// ----- FORMULAIRE DE MODIFICATION -----  ////
	
function htm_formulaire_modif($e)
{
	global $language, $param_gen, $cache_categories, $cache_form, $cache_param_champs, $cache_champs, $cache_option_photos, 
	$cache_pay_paypal, $cache_pay_allopass, $cache_pay_atos, $cache_pay_cheque, $cache_option_video, $cache_code_reduc;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<?php

$nb_photo_payantes = ($cache_option_photos['prix_photo'] != 0) ? (int) $cache_option_photos['nb_photo_max'] : 0;
$nb_photo = (int) $cache_option_photos['nb_photo_gratuite'] + $nb_photo_payantes;
$prix_photo = (float) $cache_option_photos['prix_photo'];
$prix_photo = number_format($prix_photo, 2, ',', ' ');

if($nb_photo != 0)
{
?>

<form id="uploadForm" enctype="multipart/form-data" target="uploadFrame" name="upload" method="post" action="upload.php">

	<div id="corps_upload">
	
		<?php 
			
			//Prix de la modification
		
			$prix_ann = 0;
			
			foreach($cache_categories as $v)
			{
				if($v['id_cat'] == $_SESSION['cat'])
				{
					if($_SESSION['sta'] == 1)
					$prix_ann = (float) $v['prix_par_mod'];
					
					else $prix_ann = (float) $v['prix_pro_mod'];
				}
			}
			
			$prix_ann = number_format($prix_ann, 2, '.', '');
			
			if($prix_ann > 0)
			echo '<p class="form_left"></p><p class="form_right"><strong>'. $language['modification_ann_pay'] .' '. $prix_ann .' '. $param_gen['devise'] .'</strong></p>';
			
			if (isset($e['ban']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_bannissement'] .'</span></div>';
			
			elseif (isset($e['code']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
			
			elseif (!empty($e))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></div>';
		
		?>
		
		<div class="form_left">
			<label for="pho"><?php echo $language['form_pho']; ?> :</label>
	    </div>
		
		<div class="form_right_small">
			<input type="file" class="input_file" name="photo" onchange="javascript: document.getElementById('file_name').value = this.value; upload.submit(); AffImg(2);" />
			<input type="text" id="file_name" class="input_photos" />
		</div>
		
		<div class="f_left"><img src="images/bouton_parcourir.png" alt="" /></div>
		<div class="f_left_2 info_form"><?php echo $language['form_info_pho1']; ?></div>

		<div class="form_left"></div>
		<div class="form_right_info">
			<?php 
				echo '<strong>'. $language['form_info_pho2'] .' '. $cache_option_photos['nb_photo_gratuite'] .' '. $language['form_info_pho3'] .'</strong>';; 
				
				if($nb_photo_payantes > 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1))
				echo ' <strong>'. $language['form_info_pho4'] .' '. $cache_option_photos['nb_photo_max'] .' '. $language['form_info_pho5'].' <br /></strong>'. $language['form_info_pho8'];
				
				echo '<br /><br /><strong>'. $language['form_info_pho7'] .'</strong>';
				
				if($nb_photo_payantes > 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1))
				echo '<br /><br />'. $language['form_info_pho6'] .' '. $prix_photo .' '. $param_gen['devise'];
			?>
		</div>
		
		<div id="aff_img"></div>
		
		<div class="form_left"></div>
		
		<iframe id="uploadFrame" width="690" height="1" name="uploadFrame" scrolling="no" onload="calcHeight(); AffImg(1)" frameborder="0" src="upload.php"></iframe>
	
	</div>

</form>

<?php
}
else echo '<div id="corps_upload"></div>';
?>

<form method="post" action="">

<div id="corps_form">

	<?php $ip = $_SERVER['REMOTE_ADDR']; echo '<input type="hidden" name="ip" value="'. $ip .'" />'; ?>
	
	<?php
		
		if($nb_photo == 0)
		{
			//Prix de la modification
		
			$prix_ann = 0;
			
			foreach($cache_categories as $v)
			{
				if($v['id_cat'] == $_SESSION['cat'])
				{
					if($_SESSION['sta'] == 1)
					$prix_ann = (float) $v['prix_par_mod'];
					
					else $prix_ann = (float) $v['prix_pro_mod'];
				}
			}
			
			$prix_ann = number_format($prix_ann, 2, '.', '');
			
			if($prix_ann > 0)
			echo '<p class="form_left"></p><p class="form_right"><strong>Le prix de la modification de votre annonce est de '. $prix_ann .' '. $param_gen['devise'] .'</strong></p>';
				
			if (isset($e['ban']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_bannissement'] .'</span></div>';
			
			elseif (isset($e['code']))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
			
			elseif (!empty($e))
			echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></div>';
		}
	?>
	
	<?php
	if(!isset($_SESSION['connect']) && $_SESSION['sta'] == 2)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['ent'])) echo '<span class="error">'; ?><label for="ent"><?php echo $language['form_nom_ent']; ?> :</label><?php if (isset($e['ent'])) echo '</span>'; ?>
		</p>
		<p class="form_right_select">
			<input type="text" id="ent" class="long_input" name="ent" value="<?php if (isset($_POST['ent'])) echo htmlspecialchars($_POST['ent']); elseif (!empty($_SESSION['ent'])) echo htmlspecialchars($_SESSION['ent']); ?>" />
		</p>
				
		<?php
		if($cache_param_champs['act_siret'] == 1)
		{
		?>
		<p class="form_left">
			<?php if (isset($e['sir'])) echo '<span class="error">'; ?><label for="sir"><?php echo $language['form_num_sir']; ?> :</label><?php if (isset($e['sir'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="sir" class="long_input" name="sir" value="<?php if (isset($_POST['sir'])) echo htmlspecialchars($_POST['sir']); elseif (!empty($_SESSION['sir'])) echo htmlspecialchars($_SESSION['sir']); ?>" />
		</p>
	<?php
		}
	}
	?>

	<?php
	if($cache_param_champs['act_code_pos'] == 1)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['cod'])) echo '<span class="error">'; ?><label for="cod"><?php echo $language['form_cod']; ?> :</label><?php if (isset($e['cod'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="cod" class="small_input" name="cod" value="<?php if (isset($_POST['cod'])) echo htmlspecialchars($_POST['cod']); elseif (!empty($_SESSION['cod'])) echo htmlspecialchars($_SESSION['cod']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_cod_info']; ?></span>
		</p>
	<?php
	}
	?>
	
	<?php
	if($cache_param_champs['act_vil'] == 1)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['vil'])) echo '<span class="error">'; ?><label for="vil"><?php echo $language['form_vil']; ?> :</label><?php if (isset($e['vil'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="vil" class="av_input" name="vil" value="<?php if (isset($_POST['vil'])) echo htmlspecialchars($_POST['vil']); elseif (!empty($_SESSION['vil'])) echo htmlspecialchars($_SESSION['vil']); ?>" />
		</p>
	<?php
	}
	?>
	
	<?php
	   if($_SESSION['cat'] != 0)
		{
			display_noms_valeurs($_SESSION['cat'], $cache_form, $e);
			display_noms_donnees($_SESSION['cat'], $cache_form, $e);
		}
	?>
	
	<?php
		
	foreach($cache_champs as $v)
	{	
		$id_champ = (int) $v['id_champ'];
		$for_champ = 'champ'. $id_champ;
		$nom = htmlspecialchars($v['nom']);
		$type = (int) $v['type'];
		
		?>
		<p class="form_left">
			<?php if (isset($e[$id_champ])) echo '<span class="error">'; ?><label for="<?php echo $id_champ; ?>"><?php echo $nom; ?> :</label><?php if (isset($e[$id_champ])) echo '</span>'; ?>
		</p>
		<p class="form_right_select">
			<input type="text" id="<?php echo $id_champ; ?>" class="small_input" name="<?php echo $id_champ; ?>" value="<?php if (!empty($_POST[$id_champ])) echo htmlspecialchars($_POST[$id_champ]); elseif (!empty($_SESSION[$for_champ])) echo htmlspecialchars($_SESSION[$for_champ]); ?>" /> 
			<?php if($type == 0) echo '&nbsp;<span class="info_form">'. $language['form_video_fac'] .'</span>'; ?>
		</p>
		<?php
	}
	?>
	
	<p class="form_left">
		<?php if (isset($e['nom'])) echo '<span class="error">'; ?><label for="nom"><?php echo $language['form_nom']; ?> :</label><?php if (isset($e['nom'])) echo '</span>'; ?>
	</p>

	<p class="form_right_select">
		<input type="text" id="nom" class="av_input" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); elseif (!empty($_SESSION['nom'])) echo htmlspecialchars($_SESSION['nom']); ?>" />
	</p>

	<?php
	if($cache_param_champs['act_tel'] == 1)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['tel'])) echo '<span class="error">'; ?><label for="tel"><?php echo $language['form_tel']; ?> :</label><?php if (isset($e['tel'])) echo '</span>'; ?>
		</p>
			
		<p class="form_right_select">
			<input type="text" id="tel" class="av_input" name="tel" value="<?php if (isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); elseif (!empty($_SESSION['tel'])) echo htmlspecialchars($_SESSION['tel']); ?>">
			&nbsp;<span class="info_form"><label for="tel_cache"><?php echo $language['form_cache_tel']; ?></label></span> 
			
			<input type="checkbox" class="input_checkbox" id="tel_cache" name="tel_cache" value="Y" onclick="turnImgCheck(this)" <?php if (!empty($_POST['tel_cache']) && $_POST['tel_cache'] == 'Y') echo 'checked="checked"'; elseif (!empty($_SESSION['tel_cache']) && $_SESSION['tel_cache'] == 'Y') echo 'checked="checked"'; ?> />
			<img <?php if (isset($_POST['tel_cache']) && $_POST['tel_cache'] == 'Y') echo 'src="images/check2.png"'; elseif (isset($_SESSION['tel_cache']) && $_SESSION['tel_cache'] == 'Y') echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_tel_cache" alt="" />
		</p>
	<?php
	}
	?>
	
	<p class="form_left">
		<?php if (isset($e['tit'])) echo '<span class="error">'; ?><label for="tit"><?php echo $language['form_tit']; ?> :</label><?php if (isset($e['tit'])) echo '</span>'; ?>
    </p>
	
	<p class="form_right_select">
		<input type="text" id="tit" class="long_input" name="tit" value="<?php if (isset($_POST['tit'])) echo htmlspecialchars($_POST['tit']); elseif (!empty($_SESSION['tit'])) echo htmlspecialchars($_SESSION['tit']); ?>" />
	</p>
		
	<?php
		if ($_SESSION['cat'] != 0)
		{
			$note = '';

			foreach($cache_categories as $v)
			{
				if($v['id_cat'] == $_SESSION['cat'])
				$note = stripslashes(htmlspecialchars($v['com_cat'], ENT_QUOTES));
			}
			
			if (!empty($note))
			{
				echo '<p class="form_left_info"></p>';
				echo '<p class="form_right_info">'. $note .'</p>';
			}
		}
	?>

	<p class="form_left">
		<?php if (isset($e['ann'])) echo '<span class="error">'; ?><label for="ann"><?php echo $language['form_ann']; ?> :</label><?php if (isset($e['ann'])) echo '</span>'; ?>
	</p>
	
	<p class="form_right_textarea">
		<textarea id="ann" class="textarea" cols="60" rows="10" name="ann"><?php if (isset($_POST['ann'])) echo htmlspecialchars($_POST['ann']); elseif(!empty($_SESSION['ann'])) echo htmlspecialchars($_SESSION['ann']); ?></textarea>
	</p>
	
	<?php
		
		if($cache_option_video['actif'] == 1)
		{
			if($cache_option_video['prix_video'] != 0 && empty($_SESSION['video']))
			{
				$prix = (float) $cache_option_video['prix_video'];
				$prix = number_format($prix, 2, ',', ' ');
			}
			else $prix = 0;
			
			if(preg_match("#^https?://www.youtube.com/watch\?v#", $_SESSION['video']) == true)
			$video_youtube = $_SESSION['video'];
			
			else $video_youtube = '';
			
			if(preg_match("#^https?://www.dailymotion.com/video/#", $_SESSION['video']) == true)
			$video_dailymotion = $_SESSION['video'];
			
			else $video_dailymotion = '';
		?>
			<p class="form_left">
				<?php if (isset($e['youtube'])) echo '<span class="error">'; ?><label for="youtube"><?php echo $language['form_youtube']; ?> :</label><?php if (isset($e['youtube'])) echo '</span>'; ?>
			</p>
			<p class="form_right_select">
				<input type="text" id="youtube" class="long_input" name="youtube" value="<?php if (!empty($_POST['youtube'])) echo htmlspecialchars($_POST['youtube']); else echo $video_youtube; ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_video_fac']; if($prix != 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)) echo ' '. $language['form_video_prix'] .' '. $prix .' '. $param_gen['devise']; ?></span>
			</p>
			
			<p class="form_left">
				<?php if (isset($e['dailymotion'])) echo '<span class="error">'; ?><label for="dailymotion"><?php echo $language['form_dailymotion']; ?> :</label><?php if (isset($e['dailymotion'])) echo '</span>'; ?>
			</p>
			<p class="form_right_select">
				<input type="text" id="dailymotion" class="long_input" name="dailymotion" value="<?php if (!empty($_POST['dailymotion'])) echo htmlspecialchars($_POST['dailymotion']); else echo $video_dailymotion; ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_video_fac']; if($prix != 0 && ($cache_pay_paypal['act_paypal'] == 1 || $cache_pay_allopass['act_allopass'] == 1 || $cache_pay_atos['act_atos'] == 1 || $cache_pay_cheque['act_cheque'] == 1)) echo ' '. $language['form_video_prix'] .' '. $prix .' '. $param_gen['devise']; ?></span>
			</p>
		<?php
		}
	?>
	
	<?php
	if($cache_param_champs['act_prix'] == 1)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['pri'])) echo '<span class="error">'; ?><label for="pri"><?php echo $language['form_pri']; ?> :</label><?php if (isset($e['pri'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="pri" class="small_input" name="pri" value="<?php if (isset($_POST['pri'])) echo htmlspecialchars($_POST['pri']); elseif(!empty($_SESSION['pri'])) echo htmlspecialchars($_SESSION['pri']); ?>" /> &nbsp;<span class="info_form"><?php echo $param_gen['devise']; ?> &nbsp;<?php echo $language['form_pri_info']; ?></span>
		</p>
	<?php
	}
	?>
	
	<?php
		
		$aff = 0;
		
		foreach($cache_code_reduc as $v)
		{
			if($v['val2'] == 1)
			{
				$aff = 1;
			}
		}
		
	if($aff == 1)
	{
	?>
		<p class="form_left">
			<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><?php echo $language['form_promo']; ?> :</label><?php if (isset($e['code'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
		</p>
	<?php
	}
	?>
	
	<p class="form_left"></p>
	
	<p class="form_right_select">
		<input type="image" src="images/bouton_mod_annonce.png" value="" />
	</p>

</div>

</form>

</div>
</div>

<?php
}

/// ----- LISTING SELECTIONS -----  ///
	
function display_selection($array_id, $affich)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_categories;

?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<div id="corps_listing_selection">
	
	<?php
	
	foreach($array_id as $k => $v)
	{
		if(preg_match("#Script_PAG#", $v) == true)
		{
			$v = str_replace('Script_PAG', '', $v);
			$v = (int) $v;
		}
		else $v = 0;
		
		if($v == 0) continue;
		if($k == 'affichage') continue;
		
		$array = get_annonce($v);	
		if(!is_array($array)) continue;
     
		foreach ($array as $row)
		{
			$id = htmlspecialchars($row['id_ann'], ENT_QUOTES);
			$id_reg = (int) $row['id_reg'];
			$id_dep = (int) $row['id_dep'];
			$id_cat = (int) $row['id_cat'];
			
			$nom_reg = '';
			
			foreach($cache_regions as $v)
			{
				if($id_reg == $v['id_reg'])
				$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
			}
			
			$nom_dep = '';
			
			foreach($cache_departements as $v)
			{
				if($id_dep == $v['id_dep'])
				$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
			}
			
			$nom_cat = '';
			
			foreach($cache_categories as $v)
			{
				if($id_cat == $v['id_cat'])
				$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
			}
			$titre = stripslashes(htmlspecialchars($row['titre']));
			$cod_pos = htmlspecialchars($row['code_pos'], ENT_QUOTES);
			$ville = htmlspecialchars($row['ville'], ENT_QUOTES);
			$status = htmlspecialchars($row['status'], ENT_QUOTES);
			$type = htmlspecialchars($row['type_ann'], ENT_QUOTES);
			$urgent = $row['urg'];
			$encadre = $row['enc'];
			$une = $row['une'];
			$date = htmlspecialchars($row['date'], ENT_QUOTES);
			$prix = htmlspecialchars($row['prix'], ENT_QUOTES);
			$prix = number_format($prix, 2, ',', ' ');
			$nom_image = htmlspecialchars($row['nom_image'], ENT_QUOTES);
			$video = htmlspecialchars($row['video'], ENT_QUOTES);
			$nb_photo = htmlspecialchars($row['n_photo'], ENT_QUOTES);
	
			$nom_photo = ($nb_photo > 0) ? $language['pho_ann2'] : $language['pho_ann1'];
			
			// Url rewrinting
			
			$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
			$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
		 
			$url_ann = $nom_reg .'-'. $nom_dep .'-'. $nom_cat .'-'. $titre;
			$url_ann = str_replace($accent, $sans_accent, $url_ann);
			
			$url = array();
          
			for($i = 0; $i < strlen($url_ann); $i++) 
			{
			   array_push($url, $url_ann[$i]); 
			}
         
			$url_aff = '';
			
			foreach($url as $url_ann)
			{
				if(preg_match('#^[a-zA-Z0-9]$#', $url_ann) != true)
				$url_ann = str_replace($url_ann, '-', $url_ann);
				
				$url_aff .= $url_ann;
			}
           
			// Taille du titre
			
			if( strlen($titre) > 30)
			{
				$titre = substr($titre, 0, 30);
				$pos = strrpos($titre, " ");
				
				if($pos)
				$titre = substr($titre, 0, $pos);
			 
				$titre .= "...";
			}
		}
		
		// Taille de la ville
	
		if (strlen($ville) > 20)
		{
			$ville = substr($ville, 0, 20);
			$pos_vil = strrpos($ville, ' ');
			
			if($pos_vil)
			$ville = substr($ville, 0, $pos_vil);
			
			$ville .= "...";
		}
		
		// Gestion de la date
		
		$now = time();
		$date_now = date('d', $now);
		$moi_now = date('m', $now);
		
		$date_ann = date('d', $date);
		$moi_ann = date('m', $date);
		
		if (($date_now == $date_ann) && ($moi_now - $moi_ann == 0 ))
		{
			$hour = date('G', $date);
			$min = date('i', $date);
			$hour .= 'h'.$min;
			$day = "Aujourd'hui ";	
		}
		elseif( ($date_now - $date_ann == 1) && ($moi_now - $moi_ann == 0 ) )
		{
			$hour = date('G', $date);
			$min = date('i', $date);
			$hour .= 'h'.$min;
			$day = "Hier ";
		}
		else
		{
			$month = date('d/m', $date);
			$hour = date('G', $date);
			$min = date('i', $date);
			$hour .= 'h'.$min;
			$day = '';
		}
		
		$hour = htmlspecialchars($hour, ENT_QUOTES);
		$day = htmlspecialchars($day, ENT_QUOTES);
		
	?>

	<div class="supp_selection"><a href="selection.php?id=<?php echo $id; ?>&amp;action=2"><img src="images/icone_sup_sel.png" alt=""></a></div>
	
	<div <?php if($encadre == 1) echo 'class="fond_ann_listing_2"'; else echo 'class="fond_ann_listing_1"'; ?> >
	
	<?php 
	
		// Bloc lien
		
		if($encadre == 1)
		echo '<a href="'. $url_aff .'-'. $id .'.htm" class="bloc_lien_listing_2"><p class="p_titre_listing">'. $titre .'</p>';
		
		else echo '<a href="'. $url_aff .'-'. $id .'.htm" class="bloc_lien_listing_1"><p class="p_titre_listing">'. $titre .'</p>';
		
		// Adresse
		
		echo '<div class="bloc_adresse_listing">';
		
		if(empty($nom_dep)) 
		echo '<p class="p_adresse_listing">'. $nom_reg .'<br />';
			
		else echo '<p class="p_adresse_listing">'. $nom_dep .'<br />';
		
		echo $cod_pos .' '. $ville .'</p>';
		
		if($prix != 0)
		echo '<p class="p_prix_listing"><strong>'. $prix .' '. $param_gen['devise'] .'</strong></p>';
		
		if($urgent == 1)
		echo '<p class="bloc_logo_urgent"><img src="images/logo_urgent.png" alt="" /></p>';
		
		echo '</div>';
		
		// Catégorie
		
		echo '<div class="bloc_categorie_listing"><p class="p_categorie_listing">';
		
		if($type == 1) echo ' '. $language['type_ann_1']. ' / ';
		if($type == 2) echo ' '. $language['type_ann_2']. ' / ';
		if($type == 3) echo ' '. $language['type_ann_3']. ' / ';
		if($type == 4) echo ' '. $language['type_ann_4']. ' / ';
		
		echo $nom_cat;
		
		if($status == 2) echo ' <strong>'. $language['pro_ann'] .'</strong>';
		
		if(!empty($video)) echo '<br /><br /><span class="orange">'. $language['video_ann'] .'</span>';
		
		echo '</p></div>';
		
		// Bloc photo
		
		echo '<div class="bloc_photo_listing">';
		
		if(!empty($nom_image) && preg_match('#^https?://#', $nom_image) == true)
		{
			echo '<img src="'. $nom_image .'" style="max-width: 150px; max-height: 105px;" alt="" />';
		}
		elseif(!empty($nom_image) && file_exists('images/vignettes/'.$nom_image))
		{ 
			$size = getimagesize('images/vignettes/'. $nom_image);
			
			if($size[0] < 150 && $size[1] < 105)
			echo '<img src="images/vignettes/'. $nom_image .'" alt="" />';
			
			elseif($size[0] > $size[1])
			echo '<img src="images/vignettes/'. $nom_image .'" width="150" height="105" alt="" />';
			
			elseif($size[0] <= $size[1])
			echo '<img src="images/vignettes/'. $nom_image .'" height="105" alt="" />';
		}
		else echo '<img src="images/no_photo2.png" alt="" />';
		
		echo '</div>';
		
		// Date
		
		echo '<div class="bloc_date_listing"><p class="p_date_listing">';
		
		if(!empty($day))
		echo $day .'<br />'. $language['heur_ann'] .' '. $hour;
		
		else echo $language['date_ann'] .' '. $month .'<br />'. $language['heur_ann'] .' '. $hour;
		
		echo '<br /><br /><strong>'. $nb_photo .'</strong> '. $nom_photo;
		
		echo '</p></div>';
		
		echo '</a></div>';
	}
	?>

	</div>

</div>
</div>

<?php
}

/// ----- INFO PAGE SELECTIOIN -----  ///
	
function display_index_text_sel($info_page)
{
	global $language;
	
?>
<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right"></div>
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?> (<?php echo $_SESSION['nb_ann_selection']; ?>)</a> 
		</p>
	</div>

</div>
<?php
}

/// ----- INFO PAGE GENERALE -----  ///
	
function display_index_text($info_page)
{
	global $language;
	
?>
<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
			<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right"></div>
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?> (<?php echo $_SESSION['nb_ann_selection']; ?>)</a> 
		</p>
	</div>

</div>
<?php
}

/// ----- PAGE A TEXTE -----  ///
	
function display_text($texte)
{
	global $language;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<p class="p_center">
		<span class="txt_info"><?php echo $texte ?></span>
	</p>
	
</div>
</div>
<?php
}

/// ----- FORMULAIRE DE CONNEXION -----  ///
	
function htm_connexion($type, $e)
{
	global $param_gen, $language;
	
?>

<div id="bloc_center">

<div id="middle_bloc_center">

<form method="post" action="">

	<div id="corps">

		<?php
		
		if(isset($e) && $e == 1)
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_con_error3'] .'</span></p>';
		
		if(isset($e) && $e == 2)
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_con_error4'] .'</span></p>';
		
		if(isset($e) && $e == 3)
		{
			if($type == 1)
			echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_con_error1'] .'</span></p>';
			
			else echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_con_error2'] .'</span></p>';
		}
		
		?>
		
		<p class="form_left"><label for="email_con"><?php echo $language['compte_con_email']; ?> :</label></p>
		
		<p class="form_right_select">
			<input type="text" id="email_con" class="av_input" name="email_con" value="<?php if (!empty($_POST['email_con'])) echo htmlspecialchars($_POST['email_con']); ?>" /></span>
		</p>
		
		<p class="form_left"><label for="password"><?php echo $language['compte_con_pass']; ?> :</label></p>
		
		<p class="form_right_select">
			<input type="password" id="password" class="av_input" name="password" value="<?php if (!empty($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>" /></span>
		</p>
		
		<p class="form_left"></p>
		
		<p class="form_right">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
		<?php
		if($param_gen['active_fb'] == '1')
		{
		?>
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<a href="fb_connect.php?type=<?php echo $type; ?>"><img src="images/bt_facebook.png" alt="" /></a>
		</p>
		<?php
		}
		?>
		
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<a href="acc_pass.php" class="lien_info_ann2"><?php echo $language['page_pass_mod_oub']; ?></a>
		</p>
		
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<?php
			
			if($type == 1)
			echo '<a href="acc_crea.php?type=1" class="lien_info_ann2">'. $language['compte_con_not1'] .'</a>';
			
			else echo '<a href="acc_crea.php?type=2" class="lien_info_ann2">'. $language['compte_con_not2'] .'</a>';
			
			?>
		</p>
		
	</div>

</form>

</div>
</div>
<?php
}

/// ----- FORMULAIRE DE CREATION D'UN COMPTE -----  ///
	
function htm_crea_compte($reg, $cat, $dep, $type, $e)
{
	global $language, $cache_param_champs, $cache_regions, $cache_departements, $cache_categories;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">
	
<form method="post" action="">

	<div id="corps">
		
		<?php 
			
		if (isset($e['ban']))
		echo '<div class="form_left"></div><div class="form_right"><span class="error">'. $language['compte_ema_ban'] .'</span></div>';
		
		elseif(isset($e['ema_doub']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_ema_doub'] .'</span></p>';

		elseif(isset($e['cgu']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_err_cgu'] .'</span></p>';
	
		elseif(!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></p>';
		
		$ip = $_SERVER['REMOTE_ADDR']; echo '<input type="hidden" name="ip" value="'. $ip .'" />';
		
		if ($type == 2)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['ent'])) echo '<span class="error">'; ?><label for="ent"><?php echo $language['form_nom_ent']; ?> :</label><?php if (isset($e['ent'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="ent" class="long_input" name="ent" value="<?php if (!empty($_POST['ent'])) echo htmlspecialchars($_POST['ent']); ?>" />
			</p>
			
			<?php
			if ($cache_param_champs['act_siret'] == 1)
			{
			?>
			<p class="form_left">
				<?php if (isset($e['sir'])) echo '<span class="error">'; ?><label for="sir"><?php echo $language['form_num_sir']; ?> :</label><?php if (isset($e['sir'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="sir" class="long_input" name="sir" value="<?php if (!empty($_POST['sir'])) echo htmlspecialchars($_POST['sir']); ?>" />
			</p>
			
		<?php
			}
		}
		?>
		
		<p class="form_left"><label for="civ"><?php echo $language['compte_form_civ']; ?> :</label></p>
		
		<p class="form_right_select">
			<select id="civ" name="civ" class="select_civ">
				<option value="<?php echo $language['compte_form_civ1']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ1']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ1']; ?></option>
				<option value="<?php echo $language['compte_form_civ2']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ2']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ2']; ?></option>
				<option value="<?php echo $language['compte_form_civ3']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ3']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ3']; ?></option>
			</select>
		</p>
		
		<p class="form_left">
			<?php if (isset($e['nom'])) echo '<span class="error">'; ?><label for="nom"><?php echo $language['compte_form_nom']; ?> :</label><?php if (isset($e['nom'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="nom" class="av_input" name="nom" value="<?php if (!empty($_POST['nom'])) echo htmlspecialchars($_POST['nom']); ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['prenom'])) echo '<span class="error">'; ?><label for="prenom"><?php echo $language['compte_form_prenom']; ?> :</label><?php if (isset($e['prenom'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="prenom" class="av_input" name="prenom" value="<?php if (!empty($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']); ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['reg'])) echo '<span class="error">'; ?><label for="form_dep"><?php echo $language['compte_form_reg']; ?> :</label><?php if (isset($e['reg'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select"><?php display_regions($reg, $cache_regions); ?></p>
	 
		<div id="display_departements">
			<?php
			
			if ($reg != 0)
			{
				$aff = 0;
				
				foreach($cache_departements as $v)
				{
					if($v['id_reg'] == $reg)
					$aff = 1;
				}
				
				if($aff == 1)
				{
					if (isset($e['dep']))
					echo '<p class="form_left"><span class="error"><label for="form_reg">'. $language['form_dep_select'] .' :</label></span></p><p class="form_right_select">';
					
					else echo '<p class="form_left">'. $language['form_dep_select'] .' :</p><p class="form_right_select">';
				 
					display_departements($dep, $reg, $cache_departements);
					
					echo '</p>';
				}
			}
			
			?>
		</div>
		
		<?php
		if ($type == 2)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['cat'])) echo '<span class="error">'; ?><label for="form_dep"><?php echo $language['compte_form_cat']; ?> :</label><?php if (isset($e['reg'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select"><?php display_categories($cat, $cache_categories); ?></p>
		<?php
		}
		?>
		
		<p class="form_left">
			<?php if (isset($e['add'])) echo '<span class="error">'; ?><label for="add"><?php echo $language['compte_form_add']; ?> :</label><?php if (isset($e['add'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="add" class="av_input" name="add" value="<?php if (!empty($_POST['add'])) echo htmlspecialchars($_POST['add']); ?>" />
		</p>
	 
		<?php
		if ($cache_param_champs['act_code_pos'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['cod'])) echo '<span class="error">'; ?><label for="cod"><?php echo $language['compte_form_cod']; ?> :</label><?php if (isset($e['cod'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="cod" class="small_input" name="cod" value="<?php if (!empty($_POST['cod'])) echo htmlspecialchars($_POST['cod']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_cod_info']; ?></span>
			</p>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_vil'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['vil'])) echo '<span class="error">'; ?><label for="vil"><?php echo $language['compte_form_vil']; ?> :</label><?php if (isset($e['vil'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="vil" class="av_input" name="vil" value="<?php if (!empty($_POST['vil'])) echo htmlspecialchars($_POST['vil']); ?>" />
			</p>
		<?php
		}
		?>
		
		<p class="form_left">
			<?php if (isset($e['tel'])) echo '<span class="error">'; ?><label for="tel"><?php echo $language['compte_form_tel']; ?> :</label><?php if (isset($e['tel'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="tel" class="av_input" name="tel" value="<?php if (!empty($_POST['tel'])) echo htmlspecialchars($_POST['tel']); ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['ema'])) echo '<span class="error">'; ?><label for="ema"><?php echo $language['compte_form_ema']; ?> :</label><?php if (isset($e['ema'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="ema" class="av_input" name="ema" value="<?php if (!empty($_POST['ema'])) echo htmlspecialchars($_POST['ema']); ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="pas"><?php echo $language['compte_form_pas']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="password" id="pas" class="small_input" name="pas" value="<?php if (!empty($_POST['pas'])) echo htmlspecialchars($_POST['pas']); ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="pas2"><?php echo $language['compte_form_pas2']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="password" id="pas2" class="small_input" name="pas2" value="<?php if (!empty($_POST['pas2'])) echo htmlspecialchars($_POST['pas2']); ?>" />
		</p>
		
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<input type="checkbox" class="input_checkbox" id="cgu" name="cgu" value="1" onclick="turnImgCheck(this)" <?php if (!empty($_POST['cgu'])) echo 'checked="checked"'; ?> />
			<img <?php if (!empty($_POST['cgu'])) echo 'src="images/check2.png"'; else echo 'src="images/check1.png"'; ?> id="img_check_cgu" alt="" />
			&nbsp;<span class="info_form"><label for="cgu"><?php echo $language['compte_conf_cgu']; ?></label></span> 
		</p>
		
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
</div>

</form>

</div>
</div>
<?php
}

/// ----- FORMULAIRE DU MOT PASSE POUR LES COMPTES -----  ///

function display_compte_pass($e)
{
	global $language;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">

	<?php
		
		if (!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_pass_error'] .'</span></p>';
		
	?>

	<p class="form_left"><label for="email"><?php echo $language['page_env_pass_ema']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="email" class="av_input" name="email" value="" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_valider.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>

<?php
}

/// ----- HEADER TABLEAU DE BORD -----  ///

function htm_header_bord($title, $description, $words)
{
	global $language, $param_gen, $cache_publicites, $cache_nombre_annonce;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php if(!empty($title)) echo $title; ?></title>

<meta name="Description" content="<?php if (!empty($description)) echo $description; ?>" />
<meta name="Keywords" lang="fr" content="<?php if (!empty($words)) echo $words; ?>" />
<meta name="Robots" content="all" />

<link href="style/structure.css" type="text/css" rel="stylesheet" />
<link href="style/style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
function autoCompOff(){
     var nodeList = document.getElementsByTagName("input");
     for(item in nodeList) {
  nodeList[item].setAttribute("autocomplete","off");
     };
}
window.onload = function(){
if((navigator.userAgent.toLowerCase().match('safari')) || 
(navigator.userAgent.toLowerCase().match('chrome'))){
         autoCompOff();
     }
};
</script>

</head>

<body>

<div id="top_header">

	<div id="menu_top_header">
	
		<ul id="left_top_header">
			<?php 
			
			if(empty($_SESSION['connect']))
			{
				if($param_gen['actif_acc'] == 2 || $param_gen['actif_acc'] == 3) echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_conn.php?type=1">'. $language['lien_compte'] .'</a></li>';
				if($param_gen['actif_acc'] > 1) echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_conn.php?type=2">'. $language['lien_compte_pro'] .'</a></li>'; 
			}
			else 
			{
				echo '<li class="li_top_header"><span class="" />'. $language['lien_bienvenue'] .' '. $_SESSION['prenom'] .'</span></li>';
				echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_bord.php">'. $language['compte_lien_bord1'] .'</a></li>';
				echo '<li class="li_top_header"><img src="images/top_header_fl.png" alt="" /><a href="acc_logout.php">'. $language['compte_lien_bord5'] .'</a></li>';
			}	
			?>
		</ul>
		
		<div id="right_top_header">
			<p id="p_top_header"><span class="vert_1"><?php echo $cache_nombre_annonce['total']; ?></span> <?php echo $language['nombre_annonce']; ?></p>
		</div>
	
	</div>

</div>

<?php

$image = '';
$url = '';

foreach($cache_publicites as $v)
{
	if($v['type'] == 4)
	{
		$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
		$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
	}
}

if(!empty($image)) echo '<a id="fond" style=\'background: url("images/pub/'. $image .'") center top;\' href="'. $url .'" onclick="window.open(this.href); return false;"></a><a href="'. $url .'"><p style="height: 170px;"></p></a>';

?>

<div id="fond_site_1">
<div id="fond_site_2">

<div id="haut_site">

	<div id="haut_site_logo">
		<p><a href="<?php echo URL; ?>"><img src="images/logo.png" alt="<?php if(!empty($title)) echo stripslashes(htmlspecialchars($title, ENT_QUOTES)); ?>" /></a></p>
	</div>
	
	<div id="haut_site_pub">
		<?php
		
			$image = '';
			$url = '';
			$script = '';
			
			foreach($cache_publicites as $v)
			{
				if($v['id_pub'] == 1)
				{
					$image = stripslashes(htmlspecialchars($v['image'], ENT_QUOTES));
					$url = stripslashes(htmlspecialchars($v['url'], ENT_QUOTES));
					$script = $v['script'];
				}
			}
			
			if (!empty($script))
			echo $script;
			
			else echo '<p><a href="'. $url .'" onclick="window.open(this.href); return false;"><img src="images/pub/'. $image .'" alt="" /></a></p>';
			
		?>
	</div>
	
</div>

<div id="barre_liens_fond">

	<div id="barre_liens">
		<ul class="ul_barre">
			<li class="li_barre"><a href="<?php echo URL; ?>"><?php echo $language['lien_accueil']; ?></a></li>
			<li class="li_barre"><strong><a href="acc_bord.php"><?php echo $language['compte_lien_bord1']; ?></a></a></strong></li>
			<li class="li_barre"><a href="acc_donnees.php"><?php echo $language['compte_lien_bord3']; ?></a></li>
			<?php 
			 
				if($_SESSION['connect'] == 2 && $param_gen['active_bout'] == 1) 
				echo '<li class="li_barre"><a href="acc_vitrine.php">'. $language['compte_lien_bord4'] .'</a></li>'; 
				
			?>
			<li class="li_barre"><a href="acc_logout.php"><strong><?php echo $language['compte_lien_bord5']; ?></strong></a></li>
		</ul>
	</div>
	
	<div id="barre_liens_depot">
		<a href="<?php if($param_gen['actif_acc'] > 1 && !isset($_SESSION['connect'])) echo 'acc_info.php'; else echo 'deposer-une-annonce.htm'; ?>"><img src="images/bouton_depot.png" alt="" /></a>
	</div>
	
</div>

<?php
}

/// ----- INFO PAGE TABLEAU DE BORD -----  ///
	
function display_text_bord($info_page)
{
	global $language;
	
?>
<div id="barre_info">

	<div class="bt_info_left"></div>
	<div class="bt_info_center">
		<p class="p_barre_info_left">
		<?php echo $info_page; ?>
		</p>
	</div>
	<div class="bt_info_right"></div>
	
	<div id="bloc_info_right">
		<p class="p_barre_info_right">
		</p>
	</div>

</div>
<?php
}

/// ----- PAGE D'ACHAT D'UN PACK -----  ///
	
function pay_pack_acc($error)
{
	global $language, $param_gen, $cache_packs_comptes, $cache_code_reduc;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<form method="post" action="">
	<div id="corps">

		<?php 
			
			if (!empty($error))
			echo '<div class="form_left_opts"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
		
		?>
		
		<?php 
			
			echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['pay_pack_acc_info'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio3">';
			
			foreach($cache_packs_comptes as $v)
			{
				
				$id = (int) $v['id_pack'];
				$annonce = (int) $v['nb_annonce'];
				$jour = (int) $v['nb_jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == $_SESSION['connect'])
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type1_<?php echo $i; ?>" name="opt_type1" onclick="turnImgRadio(this, 3);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type1_<?php echo $i; ?>" alt="" />
						<label for="opt_type1_<?php echo $i; ?>">
						<?php 
						
						if($annonce > 0) echo $language['pay_pack_acc1'] .' '. $annonce .' '. $language['pay_pack_acc2'];
						
						else echo $language['pay_pack_acc3'];
						
						if($jour > 0) echo ' '. $jour .' '. $language['pay_pack_acc4'];
						
						else echo ' '. $language['pay_pack_acc5'];
						
						echo ' : '. $prix  .' '. $param_gen['devise']; 
						
						?>
						</label>
					</p>
				<?php
				
				$i++;
				}
			}
			
			echo '</div>';
		?>
		
		
		<?php
		
			$aff = 0;
			
			foreach($cache_code_reduc as $v)
			{
				if($v['val5'] == 1)
				{
					$aff = 1;
				}
			}
		
		if($aff == 1)
		{
		?>
			<p class="form_left_opts">
			</p>
			
			<p class="form_right_select" style="margin-top: 5px;">
				<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><span class="txt_info"><?php echo $language['form_promo']; ?> :</span></label><?php if (isset($e['code'])) echo '</span>'; ?>
				<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
			</p>
		<?php
		}
		?>
		
		<p class="form_left_opts"></p>

		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
	</div>
	</form>
	
</div>
</div>
<?php
}

/// ----- PAGINATION LISTING TABLEAU DE BORD -----  ///
	
function display_search_links_bord($max_page, $page, $limit, $pos)
{
	global $language;
	
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	
	$nav = ' ';
	
	$url = 'acc_bord.php?l=1&amp;';

?>	

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
 
	<?php
        
		$num = floor($page/10);
	 
		if($num == 0)
		$inf = ($num * 10) + 1;
	 
		else $inf = ($num * 10);
	 
		$sup = ($num + 1 ) * 10;
	 
		if($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
			
			$nav .=" .. ";
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href= "'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}	
		
		if($page > 1)
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
		
		if( $page < $max_page )
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'page='. $max_page .'" class="lien_pagination">'. $language['page_dern'] .' ></a>&nbsp;';
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
	 
	?>
	
</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>
	
<?php 
}

/// ----- MENU RECHERCHE DU TABLEAU DE BORD -----  ///

function search_bord($keywords, $membre)
{
	global $language;
	
	$facture = (int) $membre[0]['facture'];
	$pack = (int) $membre[0]['pack'];
	$jour = (int) $membre[0]['nb_jour'];
	$annonce = (int) $membre[0]['nb_annonce'];
	$limit_1 = (int) $membre[0]['limit_1'];
	$limit_2 = (int) $membre[0]['limit_2'];
	$time_pack = (int) $membre[0]['time'];
	$time_pack = ($jour * 24 * 3600) + $time_pack;
	
	$time = time();
	
	$jour_pack = ($time_pack - $time) / (24 * 3600);
	$jour_pack = ($jour_pack > 0) ? round($jour_pack) : 0;
	
?>

<div id="corps_recherche">
<form method="get" action="acc_bord.php">
	
	
	<?php
	if(!empty($facture))
	{
	?>
		<div id="top_menu_recherche"></div>
		<div id="middle_menu_recherche"><p class="p_bord_facture"><a href="acc_fact.php"><?php echo $language['compte_bord_fact']; ?></a></p></div>
		<div id="bottom_menu_recherche"></div>
	<?php
	}
	?>
	
	<?php
	if(!empty($pack))
	{
	?>
		<div id="top_menu_recherche"></div>
		<div id="middle_menu_recherche">
			<p class="p_pack_reste">
			<?php
			
			if($limit_2 != 0)
			echo $language['compte_bord_pack_ann1'] .' '. $annonce .' '. $language['compte_bord_pack_ann2'];
			
			if($limit_1 != 0)
			echo '<br /><br />'. $language['compte_bord_pack_jour1'] .' '.  $jour_pack.' '. $language['compte_bord_pack_jour2'];
			
			?>
			</p>
		</div>
		<div id="bottom_menu_recherche"></div>
	<?php
	}
	?>
	
	<div id="top_menu_recherche"></div>
	
	<div id="middle_menu_recherche">
		
		<input type="text" class="input_recherche" name="keywords" onfocus="InputCon(this, '<?php echo $language['value_recherche_bord']; ?>')" onblur="InputCon(this, '<?php echo $language['value_recherche_bord']; ?>')" value="<?php if(!empty($keywords)) echo $keywords; else echo $language['value_recherche_bord']; ?>" />
		<input id="submit_recherche" type="image" src="images/bouton_search.png" value="" />
		
	</div>
	
	<div id="bottom_menu_recherche"></div>

</form>
</div>

</div>
</div>
<?php
}

/// ----- PAGE DE RELANCE D'UNE ANNONCE -----  ///
	
function display_factures($row)
{
	global $language, $param_gen;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<div id="corps">
	
		<?php
		
			foreach($row as $v)
			{
				$id_compte = (int) $v['id_compte'];
				$url = stripslashes(htmlspecialchars($v['url']));
				$numero = (int) $v['numero'];
				$prix = (int) $v['prix'];
				$prix_tva = (int) $v['prix_tva'];
				$prix_total = $prix + $prix_tva;
				$prix_total = number_format($prix_total, 2, ',', ' ');
				
				echo '<p class="form_left_opts"></p>';
				echo '<p class="form_right"><a class="lien_web_vit" onclick="window.open(this.href); return false;" href="'. $url .'/'. $id_compte .'-'. $numero .'.php"><strong>'. $language['compte_bord_fact_fact'] . $numero .'</strong></a> : '. $prix_total .' '. $param_gen['devise'] .'</p>';
			}
		
		?>
	
	</div>
	
</div>
</div>
<?php
}

/// ----- FORMULAIRE DE DONNEES DU COMPTE -----  ///
	
function htm_donnees_compte($reg, $dep, $cat, $type, $e, $membre)
{
	global $language, $cache_param_champs, $cache_regions, $cache_departements, $cache_categories;
	
	if(is_array($membre))
	{
		$m_id_compte = (int) $membre[0]['id_compte'];
		$m_nom_ent = stripslashes(htmlspecialchars($membre[0]['nom_ent']));
		$m_siret = stripslashes(htmlspecialchars($membre[0]['siret']));
		$m_civilite = stripslashes(htmlspecialchars($membre[0]['civilite']));
		$m_nom = stripslashes(htmlspecialchars($membre[0]['nom']));
		$m_prenom = stripslashes(htmlspecialchars($membre[0]['prenom']));
		$m_adresse = stripslashes(htmlspecialchars($membre[0]['adresse']));
		$m_code_pos = stripslashes(htmlspecialchars($membre[0]['code_pos']));
		$m_ville = stripslashes(htmlspecialchars($membre[0]['ville']));
		$m_tel = stripslashes(htmlspecialchars($membre[0]['tel']));
		$m_email = stripslashes(htmlspecialchars($membre[0]['email']));
	}
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">
	
<form method="post" action="acc_donnees.php">

	<div id="corps">
	  
		<?php 
			
		if(isset($e['ema_doub']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_ema_doub'] .'</span></p>';

		elseif(isset($e['cgu']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['compte_err_cgu'] .'</span></p>';
	
		elseif(!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></p>';
		
		if(empty($m_adresse))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['form_message_fb_erreur'] .'</span></p>';
		
		$ip = $_SERVER['REMOTE_ADDR']; echo '<input type="hidden" name="ip" value="'. $ip .'" />';
		
		if ($type == 2)
		{
		?>
			<?php if(!empty($m_nom_ent))
			{
			?>
				<p class="form_left"><?php echo $language['form_nom_ent']; ?> :</p>
				<p class="form_right_bord"><?php echo $m_nom_ent; ?></p>
			<?php
			}
			else
			{
			?>
				<p class="form_left">
					<?php if (isset($e['nom_ent'])) echo '<span class="error">'; ?><label for="nom_ent"><?php echo $language['form_nom_ent']; ?> :</label><?php if (isset($e['nom_ent'])) echo '</span>'; ?>
				</p>
				
				<p class="form_right_select">
					<input type="text" id="nom_ent" class="av_input" name="nom_ent" value="<?php if (isset($_POST['nom_ent'])) echo htmlspecialchars($_POST['nom_ent']); ?>" />
				</p>
			<?php
			}
			?>
			
			<?php
			if($cache_param_champs['act_siret'] == 1)
			{
			?>
				<?php if(!empty($m_siret))
				{
				?>
					<p class="form_left"><?php echo $language['form_num_sir']; ?> :</p>
					<p class="form_right_bord"><?php echo $m_siret; ?></p>
				<?php
				}
				else
				{
				?>
					<p class="form_left">
						<?php if (isset($e['siret'])) echo '<span class="error">'; ?><label for="siret"><?php echo $language['form_num_sir']; ?> :</label><?php if (isset($e['siret'])) echo '</span>'; ?>
					</p>
					
					<p class="form_right_select">
						<input type="text" id="siret" class="av_input" name="siret" value="<?php if (isset($_POST['siret'])) echo htmlspecialchars($_POST['siret']); ?>" />
					</p>
				<?php
				}
				?>
					
			<?php
			}
			?>
			
		<?php
		}
		?>
		
		<p class="form_left"><label for="civ"><?php echo $language['compte_form_civ']; ?> :</label></p>
		
		<p class="form_right_select">
			<select id="civ" name="civ" class="select_civ">
				<option value="<?php echo $language['compte_form_civ1']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ1']) echo 'selected="selected"'; elseif($m_civilite ==  $language['compte_form_civ1']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ1']; ?></option>
				<option value="<?php echo $language['compte_form_civ2']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ2']) echo 'selected="selected"'; elseif($m_civilite ==  $language['compte_form_civ2']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ2']; ?></option>
				<option value="<?php echo $language['compte_form_civ3']; ?>" <?php if(isset($_POST['civ']) && $_POST['civ'] == $language['compte_form_civ3']) echo 'selected="selected"'; elseif($m_civilite ==  $language['compte_form_civ3']) echo 'selected="selected"'; ?> ><?php echo $language['compte_form_civ3']; ?></option>
			</select>
		</p>
		
		<p class="form_left">
			<?php if (isset($e['nom'])) echo '<span class="error">'; ?><label for="nom"><?php echo $language['compte_form_nom']; ?> :</label><?php if (isset($e['nom'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="nom" class="av_input" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); else echo $m_nom; ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['prenom'])) echo '<span class="error">'; ?><label for="prenom"><?php echo $language['compte_form_prenom']; ?> :</label>
			<?php if (isset($e['prenom'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="prenom" class="av_input" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']); else echo $m_prenom; ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['reg'])) echo '<span class="error">'; ?><label for="form_dep"><?php echo $language['compte_form_reg']; ?> :</label><?php if (isset($e['reg'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select"><?php display_regions($reg, $cache_regions); ?></p>
	 
		<div id="display_departements">
			<?php
			
			if ($reg != 0)
			{
				$aff = 0;
				
				foreach($cache_departements as $v)
				{
					if($v['id_reg'] == $reg)
					$aff = 1;
				}
				
				if($aff == 1)
				{
					if (isset($e['dep']))
					echo '<p class="form_left"><span class="error"><label for="form_reg">'. $language['form_dep_select'] .' :</label></span></p><p class="form_right_select">';
					
					else echo '<p class="form_left">'. $language['form_dep_select'] .' :</p><p class="form_right_select">';
				 
					display_departements($dep, $reg, $cache_departements);
					
					echo '</p>';
				}
			}
			
			?>
		</div>
		
		<?php
		if ($type == 2)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['cat'])) echo '<span class="error">'; ?><label for="form_dep"><?php echo $language['compte_form_cat']; ?> :</label><?php if (isset($e['reg'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select"><?php display_categories($cat, $cache_categories); ?></p>
		<?php
		}
		?>
		
		<p class="form_left">
			<?php if (isset($e['add'])) echo '<span class="error">'; ?><label for="add"><?php echo $language['compte_form_add']; ?> :</label><?php if (isset($e['add'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="add" class="av_input" name="add" value="<?php if (isset($_POST['add'])) echo htmlspecialchars($_POST['add']); else echo $m_adresse; ?>" />
		</p>
	 
		<?php
		if($cache_param_champs['act_code_pos'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['cod'])) echo '<span class="error">'; ?><label for="cod"><?php echo $language['compte_form_cod']; ?> :</label><?php if (isset($e['cod'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="cod" class="small_input" name="cod" value="<?php if (isset($_POST['cod'])) echo htmlspecialchars($_POST['cod']); else echo $m_code_pos; ?>" /> &nbsp;<span class="info_form"><?php echo $language['form_cod_info']; ?></span>
			</p>
		<?php
		}
		?>
		
		<?php
		if($cache_param_champs['act_vil'] == 1)
		{
		?>
			<p class="form_left">
				<?php if (isset($e['vil'])) echo '<span class="error">'; ?><label for="vil"><?php echo $language['compte_form_vil']; ?> :</label><?php if (isset($e['vil'])) echo '</span>'; ?>
			</p>
			
			<p class="form_right_select">
				<input type="text" id="vil" class="av_input" name="vil" value="<?php if (isset($_POST['vil'])) echo htmlspecialchars($_POST['vil']); else echo $m_ville; ?>" />
			</p>
		<?php
		}
		?>
		
		<p class="form_left">
			<?php if (isset($e['tel'])) echo '<span class="error">'; ?><label for="tel"><?php echo $language['compte_form_tel']; ?> :</label><?php if (isset($e['tel'])) echo '</span>'; ?>
		</p>
		
		<p class="form_right_select">
			<input type="text" id="tel" class="av_input" name="tel" value="<?php if (isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); else echo $m_tel; ?>" />
		</p>
		
		<p class="form_left"><?php echo $language['compte_form_ema']; ?> :</p>
		
		<p class="form_right_bord"><?php echo $m_email; ?></p>
		
		<p class="form_left">
			<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="new_pas"><?php echo $language['compte_bord_pers_pas1']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="password" id="new_pas" class="av_input" name="new_pas" value="<?php if (isset($_POST['new_pas'])) echo htmlspecialchars($_POST['new_pas']); ?>" />&nbsp;<span class="info_form"> &nbsp;<?php echo $language['compte_bord_pers_pas_note']; ?></span>
		</p>
		
		<p class="form_left">
			<?php if (isset($e['pas'])) echo '<span class="error">'; ?><label for="new_pas2"><?php echo $language['compte_bord_pers_pas2']; ?> :</label><?php if (isset($e['pas'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="password" id="new_pas2" class="av_input" name="new_pas2" value="<?php if (isset($_POST['new_pas2'])) echo htmlspecialchars($_POST['new_pas2']); ?>" />
		</p>
		
		<p class="form_left"></p>
		
		<p class="form_right_select">
			<input type="image" src="images/bouton_modifier.png" value="" />
		</p>
		
</div>

</div>
</div>
<?php
}

/// ----- FORMULAIRE DE LA FICHE VITRINE -----  ///
	
function htm_fiche_boutique_compte($e, $fiche, $membre)
{
	global $language;
	
	if(is_array($fiche))
	{
		$f_tit = stripslashes(htmlspecialchars($fiche[0]['titre']));
		$f_des = stripslashes(htmlspecialchars($fiche[0]['description']));
		$f_hor = stripslashes(htmlspecialchars($fiche[0]['horaires']));
		$f_web = stripslashes(htmlspecialchars($fiche[0]['site_web']));
		$f_logo = stripslashes(htmlspecialchars($fiche[0]['nom_logo']));
		$id_compte = (int) $fiche[0]['id_compte'];
		
		if(!empty($f_logo))
		$_SESSION['logo_vitrine'] = $f_logo;
	}
	
	$jour = (int) $membre[0]['jour_pack_vitrine'];
	$limit = (int) $membre[0]['limit_pack_vitrine'];
	$time_pack = (int) $membre[0]['time_pack_vitrine'];
	$time_pack = ($jour * 24 * 3600) + $time_pack;
	
	$time = time();
	
	$jour_pack = ($time_pack - $time) / (24 * 3600);
	$jour_pack = ($jour_pack > 0) ? round($jour_pack) : 0;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">
	
<form id="uploadForm" target="uploadFrame" name="upload" enctype="multipart/form-data" method="post" action="upload3.php">

<div id="corps_upload">

	<?php 
		if(!empty($e))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['form_message_erreur'] .'</span></p>';
		
		if($limit != 0)
		echo '<p class="form_left"></p><p class="form_right">'. $language['compte_fiche_info_pack1'] .' '. $jour_pack .' '. $language['compte_fiche_info_pack2'] .'<br /><br /></p>';
	?>
	
	<div class="form_left"><label for="pho"><?php echo $language['compte_fiche_bout_mod1']; ?> :</label></div>
		
	<div class="form_right_small">
		<input type="file" class="input_file" name="photo" onchange="javascript: document.getElementById('file_name').value = this.value; upload.submit(); AffImg(2);" />
		<input type="text" id="file_name" class="input_photos" />
	</div>
	
	<div class="f_left"><img src="images/bouton_parcourir.png" alt="" /></div>
	<div class="f_left_2 info_form"><?php echo $language['form_info_pho1']; ?></div>
	
	<div id="aff_img"></div>
	
	<div class="form_left"></div>
	
	<div class="form_right_iframe">
		<iframe id="uploadFrame" class="iframe" width="690" height="1" name="uploadFrame" scrolling="no" onload="calcHeight(); AffImg(1)" frameborder="0" src="upload3.php"></iframe>
	</div>

</div>
	
</form>
	
<form method="post" action="">

	<div id="corps_form">
	  
		<p class="form_left">
			<?php if (isset($e['tit'])) echo '<span class="error">'; ?><label for="tit"><?php echo $language['compte_fiche_bout_tit']; ?> :</label><?php if (isset($e['tit'])) echo '</span>'; ?>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="tit" class="av_input" name="tit" value="<?php if (isset($_POST['tit'])) echo htmlspecialchars($_POST['tit']); elseif(is_array($fiche)) echo $f_tit; ?>" />
		</p>
		
		<p class="form_left">
			<?php if (isset($e['des'])) echo '<span class="error">'; ?><label for="des"><?php echo $language['compte_fiche_bout_des']; ?> :</label><?php if (isset($e['des'])) echo '</span>'; ?>
		</p>
	  
		<p class="form_right_textarea">
			<textarea id="des" class="textarea" cols="60" rows="10" name="des"><?php if(isset($_POST['des'])) echo htmlspecialchars($_POST['des']); elseif(is_array($fiche)) echo $f_des; ?></textarea>
		</p>
		
		<p class="form_left">
			<?php if (isset($e['hor'])) echo '<span class="error">'; ?><label for="hor"><?php echo $language['compte_fiche_bout_hor']; ?> :</label>
			<?php if (isset($e['hor'])) echo '</span>'; ?>
		</p>
	  
		<p class="form_right_textarea">
			<textarea id="hor" class="textarea" cols="60" rows="4" name="hor"><?php if(isset($_POST['hor'])) echo htmlspecialchars($_POST['hor']); elseif(is_array($fiche)) echo $f_hor; ?></textarea>
		</p>
		
		<p class="form_left">
			<label for="web"><?php echo $language['compte_fiche_bout_web']; ?> :</label>
	    </p>
		
		<p class="form_right_select">
			<input type="text" id="web" class="av_input" name="web" value="<?php if (isset($_POST['web'])) echo htmlspecialchars($_POST['web']); elseif(is_array($fiche)) echo $f_web; ?>" />
		</p>
		
		<p class="form_left">
		</p>
		
		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
</div>

</form>

</div>
</div>
<?php
}

/// ----- PAGE D'ACHAT D'UN ABONNEMENT -----  ///
	
function pay_pack_vit($error)
{
	global $language, $param_gen, $cache_packs_vitrine, $cache_code_reduc;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<form method="post" action="">
	<div id="corps">
	
		<?php 
			
			if (!empty($error))
			echo '<div class="form_left_opts"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
		
		?>

		<?php 
			
			echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['pay_pack_vit_info'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio3">';
			
			foreach($cache_packs_vitrine as $v)
			{
				
				$id = (int) $v['id_pack'];
				$jour = (int) $v['nb_jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				
				?>
				<p class="form_left_opts"></p>
				<p class="form_right">
					<input type="radio" id="opt_type1_<?php echo $i; ?>" name="opt_type1" onclick="turnImgRadio(this, 3);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'checked="checked"'; ?> />
					<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type1_<?php echo $i; ?>" alt="" />
					<label for="opt_type1_<?php echo $i; ?>">
					<?php
						if($jour == 0)
						echo $language['pay_pack_vit3'] .' : '. $prix  .' '. $param_gen['devise'];
						
						else echo $language['pay_pack_vit1'] .' '. $jour .' '. $language['pay_pack_vit2'] .' : '. $prix  .' '. $param_gen['devise']; 
					?>
					</label>
				</p>
				<?php
				
				$i++;
			}
			
			echo '</div>';
		?>
		
		<?php
		
			$aff = 0;
			
			foreach($cache_code_reduc as $v)
			{
				if($v['val6'] == 1)
				{
					$aff = 1;
				}
			}
		
		if($aff == 1)
		{
		?>
		<p class="form_left_opts">
		</p>
		
		<p class="form_right_select" style="margin-top: 5px;">
			<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><span class="txt_info"><?php echo $language['form_promo']; ?> :</span></label><?php if (isset($e['code'])) echo '</span>'; ?>
			<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
		</p>
		<?php
		}
		?>
		
		<p class="form_left_opts"></p>

		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
	</div>
	</form>
	
</div>
</div>
<?php
}

/// ----- ANNONCES PREMIUM -----  ///

function htm_top_vitrines($array)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_categories;
	
?>

<div id="menu_vi_premium">

<?php

if(is_array($array))
{
	foreach ($array as $row)
	{
		$id = (int) $row['id_boutique'];
		$titre = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
		$ent = stripslashes(htmlspecialchars($row['nom_ent'], ENT_QUOTES));
		$id_reg = (int) $row['id_reg'];
		$id_dep = (int) $row['id_dep'];
		$id_cat = (int) $row['id_cat'];

		$nom_reg = '';
		$nom_dep = '';
		$nom_cat = '';
		$disc = '';
		
		foreach($cache_regions as $v)
		{
			if($id_reg == $v['id_reg'])
			$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
		}
		
		foreach($cache_departements as $v)
		{
			if($id_dep == $v['id_dep'])
			$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
		}
		
		foreach($cache_categories as $v)
		{
			if($id_cat == $v['id_cat'])
			{
				$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
				$disc = (int) $v['disc'];
			}
		}
		
		$logo = stripslashes(htmlspecialchars($row['nom_logo'], ENT_QUOTES));
		
		// Url rewriting
		
		$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ', '&#039;');
		$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n', '');      
		
		$url_ann = $nom_reg .'-'. $nom_dep .'-'. $nom_cat .'-'. $titre;
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
		
		// Taille du nom d'entreprise
		
		if (strlen($ent) > 21)
		{
			$ent = substr($ent, 0, 21);
			$pos = strrpos($ent, ' ');
		 
			if($pos)
			$$ent = substr($ent, 0, $pos);
			
			$ent .= "...";
		}
		
		if($disc == 0 || isset($_SESSION['disc']))
		{
		?>
	 
		<div class="fond_ann_premium">
		
		<?php 
			
			echo '<div class="bloc_photo_premium">';
			
			if(!empty($logo) && file_exists('images/logos/'. $logo))
			{ 
				$size = getimagesize('images/logos/'. $logo);
				
				if($size[0] < 100 && $size[1] < 70)
				echo '<a href="Boutique-'. $id .'-'. $url_aff .'.htm"><img src="images/logos/'. $logo .'" alt="" /></a>';
				
				elseif($size[0] > $size[1])
				echo '<a href ="Boutique-'. $id .'-'. $url_aff .'.htm"><img src="images/logos/'. $logo .'" width="100" height="70" alt="" /></a>';
				
				elseif($size[0] <= $size[1])
				echo '<a href ="Boutique-'. $id .'-'. $url_aff .'.htm"><img src="images/logos/'. $logo .'" height="70" alt="" /></a>';
			}
			else echo '<a href ="Boutique-'. $id .'-'. $url_aff .'.htm"><img src="images/no_photo1.png" alt="" /></a>';
			
			echo '</div>';
			
			echo '<div class="bloc_titre_premium">';
			
			echo '<p><a href="Boutique-'. $id .'-'. $url_aff .'.htm" class="lien_titre_premium">'. $ent .'</a><br /><span class="txt_info_premium">';
			
			if(empty($nom_dep)) 
			echo $nom_reg .'<br /></span>';
				
			else echo $nom_dep .'<br /></span>';
			
			echo '</div>'; 
			
		?>
		
		</div>
		
		<?php
		}
		else
		{
		?>
		<div class="fond_vit_premium">

			<p class="p_disc_ads txt_info"><?php echo $language['texte_disc']; ?></p>
		
		</div>
		<?php
		}
	}
}

for($count_ann = count($array); $count_ann < 5;	$count_ann++)
{
?>

<div class="fond_vit_premium">

	<p class="p_no_premium  vert">
		<?php echo $language['txt_vit_premium']; ?>
	</p>
	
	<p style="padding-top: 3px;">
		<img src="images/fleche.png" alt="" /><a href="javascript:;" onclick="window.open('plus_premium_vit.php', 'PREMIUM', 'scrollbars = no, width = 560, height = 360')" class="lien_plus_premium violet_1"><?php echo $language['lien_vit_premium']; ?></a>
	</p>
	
</div>

<?php 
}
?>

</div>
	
<?php
}

/// ----- BARRE INFO LISTING VITRINES -----  ///

function display_search_vitrines_infos($limit, $page_num, $nb_vitrine)
{
	global $language, $cache_regions, $cache_departements, $cache_categories;
	
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$nb_vitrine = (int) $nb_vitrine;

	$reg = (!empty($_SESSION['reg_vitrine'])) ? (int) $_SESSION['reg_vitrine'] : 0;
	$dep = (!empty($_SESSION['dep_vitrine'])) ? (int) $_SESSION['dep_vitrine'] : 0;
	$cat = (!empty($_SESSION['cat_vitrine'])) ? stripslashes(htmlspecialchars($_SESSION['cat_vitrine'])) : 0;
	
	$nom_reg = '';
	$nom_dep = '';
	$nom_cat = '';

	foreach($cache_regions as $v)
	{
		if($reg == $v['id_reg'])
		$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}
	
	foreach($cache_departements as $v)
	{
		if($dep == $v['id_dep'])
		$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}
	
	foreach($cache_categories as $v)
	{
		if($cat == $v['id_cat'])
		$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
	}

?>

<div id="barre_info">

	<?php
     
		$txt_reg = (!empty($nom_reg)) ? $nom_reg : $language['select_regions'];
		$txt_dep = (!empty($nom_dep)) ? $nom_dep : $language['select_departements'];
		
		if(!empty($nom_cat)) 
		$txt_cat = $nom_cat;
		
		elseif(!empty($cat))
		$txt_cat = $cat;
		
		else $txt_cat = $language['select_categories'];
		
	?>
	
	<div class="bt_info_left"></div>
		<div class="bt_info_center">
			<p class="p_barre_info_left">
				<?php echo $txt_reg; ?>
			</p>
		</div>
	<div class="bt_info_right2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $txt_dep; ?>
		</p>
	</div>
	<div class="bt_info_right_v2"></div>
	
	<div class="bt_info_center_v">
		<p class="p_barre_info_left">
			<?php echo $txt_cat; ?>
		</p>
	</div>
	<div class="bt_info_right_v"></div>
	
	<div id="bloc_info_right">
		<p><a class="bt_alert" href="alerte.php"><?php echo $language['lien_alert']; ?></a></p>
		<p class="p_barre_info_right">
			<a href="selection.php"><?php echo $language['lien_selection']; ?></a> (<?php echo $_SESSION['nb_ann_selection']; ?>) 
		</p>
	</div>

</div>

<div id="corps_info_ann">

		<span class="lien_info_ann_sel"><?php echo $language['all_lien_ann_boutique']; ?> :</span>
     
		<?php
	     
			$deb = ($page_num * $limit) - $limit + 1;
			$fin = $limit * $page_num;
		  
			echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .'  '. $nb_vitrine .' &nbsp;</span>'; 
		  
		?>

</div>
<?php
}

/// ----- PAGINATION LISTING VITRINES -----  ///
	
function display_search_links_vitrines($max_page, $page, $limit, $pos)
{
	global $language;
	
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	
	$nav = ' ';
	
	$url = 'boutiques_search.php?l=1&amp;';

?>	

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">
     
	<?php
	  
		$num = floor($page/10);
	 
		if($num == 0)
		$inf = ($num * 10) + 1;
	 
		else $inf = ($num * 10);
	 
		$sup = ($num + 1) * 10;
	 
		if($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
			
			$nav .= "... ";
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href= "'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}	
		
		if($page > 1)
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
		
		if($page < $max_page)
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'page='. $max_page .'" class="lien_pagination">'. $language['page_dern'] .' ></a>&nbsp;';
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
	 
	?>
	
</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>
	
<?php 
}

/// ----- LINSTING DES VITRINES -----  ///

function display_all_vitrines($array)
{
	global $language, $cache_regions, $cache_departements, $cache_categories, $cache_packs_vitrine;
	
foreach ($array as $row)
{
	$id = (int) $row['id_boutique'];
	$id_reg = (int) $row['id_reg'];
	$id_dep = (int) $row['id_dep'];
	$id_cat = (int) $row['id_cat'];
	
	$nom_reg = '';
	
	foreach($cache_regions as $v)
	{
		if($id_reg == $v['id_reg'])
		$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}
	
	$nom_dep = '';
	
	foreach($cache_departements as $v)
	{
		if($id_dep == $v['id_dep'])
		$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}
	
	$nom_cat = '';
	
	foreach($cache_categories as $v)
	{
		if($id_cat == $v['id_cat'])
		$nom_cat = stripslashes(htmlspecialchars($v['nom_cat'], ENT_QUOTES));
	}
	
	$titre = stripslashes(htmlspecialchars($row['titre'], ENT_QUOTES));
	$cod_pos = stripslashes(htmlspecialchars($row['code_pos'], ENT_QUOTES));
	$ville = stripslashes(htmlspecialchars($row['ville'], ENT_QUOTES));
	$nom_ent = stripslashes(htmlspecialchars($row['nom_ent'], ENT_QUOTES));
	$nom_image = stripslashes(htmlspecialchars($row['nom_logo'], ENT_QUOTES));
	$image_name = (!empty($nom_image)) ? 'images/logos/'. $nom_image : '';
	$id_compte = (int) $row['id_compte'];
	$abonnement = (int) $row['abonnement'];
	$enc = (int) $row['enc'];
	
	// Url rewriting
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
	
	$url_ann = $nom_reg .' '. $nom_dep .' '. $nom_cat .' '. $titre;
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
	
	// Taille du titre
	
	if (strlen($titre) > 42)
	{
		$titre = substr($titre, 0, 42);
		$pos = strrpos($titre, " ");
	 
		if($pos)
		$titre = substr($titre, 0, $pos);
		
		$titre .= "...";
	}
	
	// Taille de la ville
	
	if (strlen($ville) > 20)
	{
		$ville = substr($ville, 0, 20);
		$pos_vil = strrpos($ville, ' ');
		
		if($pos_vil)
		$ville = substr($ville, 0, $pos_vil);
		
		$ville .= "...";
	}
	
	//Nombre d'annonce de la boutique
	
	$nb_annonce = (int) $row['nb_ann'];
	$text_nb_ann = ($nb_annonce <= 1) ? $language['nb_ann_boutique'] : $language['nb_ann_boutique_plu'] ;
	
?>

<div <?php if($enc == 1) echo 'class="fond_vit_listing_2"'; else echo 'class="fond_vit_listing_1"'; ?> >
	
<?php 
	
	// Bloc lien
	
	if($enc == 1)
	echo '<a href="Boutique-'. $id .'-'. $url_aff .'.htm" class="bloc_lien_listing_4"><p class="p_titre_listing">'. $nom_ent .'</p>';
	
	else echo '<a href="Boutique-'. $id .'-'. $url_aff .'.htm" class="bloc_lien_listing_3"><p class="p_titre_listing">'. $nom_ent .'</p>';
	
	// Titre
 
	echo '<div class="bloc_titre_listing_vit">';
 
	echo '<p class="p_titre_listing_vit">'. $titre .'<br />';
	
	echo '<strong>'. $nb_annonce .' '. $text_nb_ann .'</strong></p>';
	
	echo '</div>';
	
	// Adresse
 
	echo '<div class="bloc_region_listing_vit"><p class="p_region_listing_vit">';
	
	if(empty($nom_dep)) 
	echo $nom_reg .'<br />';
		
	else echo $nom_dep .'<br />';
	 
	echo $cod_pos .' '. $ville .'<br /><span class="uppercase">'. $nom_cat .'</span>';
	
	echo '</p></div>';
	
	// Bloc photo
 
	echo '<div class="bloc_photo_listing_vit">';
	
	if(!empty($nom_image) && file_exists($image_name))
	{ 
		$size = getimagesize($image_name);
		
		if($size[0] < 150 && $size[1] < 105)
		echo '<img src="'. $image_name .'" alt="" />';
		
		elseif($size[0] > $size[1])
		echo '<img src="'. $image_name .'" width="150" height="105" alt="" />';
		
		elseif($size[0] <= $size[1])
		echo '<img src="'. $image_name .'" height="105" alt="" />';
	}
	else echo '<img src="images/no_photo2.png" alt="" />';
	
	echo '</div>';
	
	echo '</a></div>';
}
?>

<?php	
}

/// ----- MENU RECHERCHE VITRINES -----  ///

function search_vitrines($keywords, $reg, $dep, $cat)
{
	global $language, $cache_regions, $cache_departements, $cache_categories;
?>

<div id="corps_recherche">
<form method="get" action="boutiques_search.php">
	
	<div id="top_menu_recherche"></div>
	
	<div id="middle_menu_recherche">
		
		<input type="text" class="input_recherche" name="keywords" onfocus="InputCon(this, '<?php echo $language['value_recherche_boutique']; ?>')" onblur="InputCon(this, '<?php echo $language['value_recherche_boutique']; ?>')" value="<?php if(!empty($keywords)) echo $keywords; else echo $language['value_recherche_boutique']; ?>" />
		
		<?php 
			
			display_search_regions($reg, $cache_regions); //Afficher les régions 
			
			echo '<div id="get_departements">';
			
			if(!empty($reg)) display_search_departements($dep, $reg, $cache_departements);
			
			echo '</div>';
			
			display_search_categories($cat, $cache_categories); //Afficher les categories
			
		?>
		
		<input id="submit_recherche" type="image" src="images/bouton_search.png" value="" />
		
	</div>
	
	<div id="bottom_menu_recherche"></div>

</form>
</div>

</div>
</div>
<?php
}

/// ----- PAGE D'UNE VITRINE -----  ///		

function display_vitrine($id, $row)
{
	global $language, $param_gen, $cache_regions, $cache_departements, $cache_options_visuelles, $cache_param_champs;	
	
	$id_compte = (int) $row[0]['id_compte'];
	$tit = stripslashes(htmlspecialchars($row[0]['titre'], ENT_QUOTES));
	$des = nl2br(stripslashes(htmlspecialchars($row[0]['description'], ENT_QUOTES)));
	$hor = stripslashes(htmlspecialchars($row[0]['horaires'], ENT_QUOTES));
	$web = stripslashes(htmlspecialchars($row[0]['site_web'], ENT_QUOTES));
	
	if(preg_match("#^http://#", $web) != true && preg_match("#^https://#", $web) != true)
	$web = 'http://'. $web;
		
	$logo = htmlspecialchars($row[0]['nom_logo']);
	$ent = stripslashes(htmlspecialchars($row[0]['nom_ent'], ENT_QUOTES));
	$sir = stripslashes(htmlspecialchars($row[0]['siret'], ENT_QUOTES));
	$add = stripslashes(htmlspecialchars($row[0]['adresse'], ENT_QUOTES));
	$cod = stripslashes(htmlspecialchars($row[0]['code_pos'], ENT_QUOTES));
	$vil = stripslashes(htmlspecialchars($row[0]['ville'], ENT_QUOTES));
	$tel = stripslashes(htmlspecialchars($row[0]['tel'], ENT_QUOTES));
	$rss = stripslashes(htmlspecialchars($row[0]['rss'], ENT_QUOTES));
	$tet = (int) $row[0]['tete'];
	$enc = (int) $row[0]['enc'];
	$une = (int) $row[0]['une'];
	$id_reg = (int) $row[0]['id_reg'];
	$id_dep = (int) $row[0]['id_dep'];
	
	$nom_reg = '';
	
	foreach($cache_regions as $v)
	{
		if($id_reg == $v['id_reg'])
		$nom_reg = stripslashes(htmlspecialchars($v['nom_reg'], ENT_QUOTES));
	}
	
	$nom_dep = '';
	
	foreach($cache_departements as $v)
	{
		if($id_dep == $v['id_dep'])
		$nom_dep = stripslashes(htmlspecialchars($v['nom_dep'], ENT_QUOTES));
	}
	
	// Taille du titre
	
	if(strlen($tit) > 38)
	{
		$tit = substr($tit, 0, 38);
		$tit .= "...";
	}
	
	//Adresse de geolocalisation
	
	$accent = array('à', 'á', 'â', 'ã', 'ä', 'å', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'ç', 'Ç', 'é', 'è', 'ê', 'ë', 'È', 'É', 'Ê', 'Ë', 'ì', 'í', 'î', 'ï', 'Ì', 'Í', 'Î', 'Ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'ù', 'ú', 'û', 'ü', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'ý', 'ÿ', 'ñ');
	$sans_accent = array('a', 'a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A', 'A', 'c', 'C', 'e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O', 'u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'y', 'y', 'y', 'n');      
 
	$geo_ville = $vil;
	$geo_ville = str_replace($accent, $sans_accent, $geo_ville);
	$geo_adresse = $add;
	$geo_adresse = str_replace($accent, $sans_accent, $geo_adresse);
	
	//Titre du flux rss
	
	$url_ann =  $ent;
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
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<div id="bloc_top_vit">

	<div id="bloc_logo_vit">
		<?php
		
		if(!empty($logo))
		{
			if(file_exists('images/logos/'. $logo))
			echo '<p><img src="images/logos/'. $logo .'" alt="" /></p>';
			
			else echo '<p><img src="images/no_photo5.png" alt="" /></p>';
		}
		else echo '<p><img src="images/no_photo5.png" alt="" /></p>';
		
		?>
	</div>

	<div id="bloc_adresse_vit">
		<p class="txt_info_vit">
			<?php 
				if($cache_param_champs['act_siret'] == 1)				
				echo $language['page_bout_sir'] .' '. $sir .'<br /><br />';
				
				echo $language['page_bout_add'] .'<br />'. $add .'<br />'. $cod .' '. $vil .'<br />'. $nom_reg .' - '. $nom_dep .'<br /><br />';
			?>
			<img src="images/geo_vit.png" alt="" /><a class="lien_geo_vit" href="geo_google.php?ville=<?php echo $geo_ville .'+'. $geo_adresse .'+'. $param_gen['pays']; ?>" onclick="window.open(this.href); return false;"><?php echo $language['page_bout_geo']; ?></a>
		</p>
	</div>
	
	<div id="bloc_horaires_vit">
		<p class="txt_info_vit">
			<?php 
				echo $language['page_bout_tel'] .' <img src="tel.php?tel='. $tel .'" alt="" /><br /><br />';
				echo $language['page_bout_hor'] .'<br />'. $hor .'<br /><br />';
				
				if($param_gen['flux_bout'] == 1)
				echo '<img src="images/rss.png" alt="" /><a onclick="window.open(this.href); return false;" class="lien_geo_vit" href="'. $rss .'/'. $url_aff .'-'. $id_compte .'.xml">'. $language['page_bout_rss'] .'</a>';
			?>
		</p>
	</div>
	
	<div id="bloc_site_vit">
		<p class="txt_info_vit">
			<?php 
				if(!empty($web)) echo $language['page_bout_web'] .'<br /><a href="'. $web .'" class="lien_web_vit" onclick="window.open(this.href); return false;">'. $web .'</a><br /><br />';
			?>
		</p>
	</div>
	
</div>

<div id="bloc_separation_vit"></div>

<div id="bloc_bottom_vit">

	<h1><?php echo $ent; ?> - <span class="vert"><?php echo $tit; ?></span></h1>
	<p id="p_desc_vit"><?php echo $des; ?></p>
	
</div>

<div id="bloc_bottom_vit_right">
<?php
	
	$etat_tet = '';
	$etat_une = '';
	$etat_urg = '';
	$etat_enc = '';

	foreach($cache_options_visuelles as $v)
	{
		if($v['type'] == 5)
		$etat_tet = 1;
		
		if($v['type'] == 6)
		$etat_une = 1;
		
		if($v['type'] == 7)
		$etat_enc = 1;
	}

	if($etat_tet == 1 && $tet == 0)
	echo '<div class="bloc_contact_ann"><img src="images/icone_rem.png" alt="" /> <a href="pay_vit_opts.php?vitrine='. $id .'&amp;id_opt=5" class="lien_menu_ann">'. $language['page_bout_rem'] .'</a></div>';

	if($etat_une == 1 && $une == 0)
	echo '<div class="bloc_contact_ann"><img src="images/icone_une.png" alt="" /> <a href="pay_vit_opts.php?vitrine='. $id .'&amp;id_opt=6" class="lien_menu_ann">'. $language['page_bout_une'] .'</a></div>';

	if($etat_enc == 1 && $enc == 0)
	echo '<div class="bloc_contact_ann"><img src="images/icone_enc.png" alt="" /> <a href="pay_vit_opts.php?vitrine='. $id .'&amp;id_opt=7" class="lien_menu_ann">'. $language['page_bout_enc'] .'</a></div>';

?>
</div>

</div>
</div>
<?php
}

/// ----- PAGE D'ACHAT D'OPTION POUR UNE VITRINE -----  ///
	
function pay_vit_opts($id_opt, $error)
{
	global $language, $param_gen, $cache_options_visuelles, $cache_code_reduc;
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<form method="post" action="">
	<div id="corps">
	
		<?php 
			
			if (!empty($error))
			echo '<div class="form_left_opts"></div><div class="form_right"><span class="error">'. $language['form_message_reduc'] .'</span></div>';
		
		?>

		<?php 

			//OPTION REMONTER EN TETE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 5 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['page_bout_c_tete'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio3">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 5)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type1_<?php echo $i; ?>" name="opt_type1" onclick="turnImgRadio(this, 3);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type1']) AND $_POST['opt_type1'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type1']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type1_<?php echo $i; ?>" alt="" />
						<label for="opt_type1_<?php echo $i; ?>"><?php echo $language['page_bout_opt_tete'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				}
			}
			
			echo '</div>';
			}
			
			//OPTION A LA UNE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 6 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['form_une'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio4">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 6)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type2_<?php echo $i; ?>" name="opt_type2" onclick="turnImgRadio(this, 4);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type2']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type2']) AND $_POST['opt_type2'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type2']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type2_<?php echo $i; ?>" alt="" />
						&nbsp;<label for="opt_type2_<?php echo $i; ?>"><?php echo $language['page_bout_opt_une'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				} 
			}
			
			echo '</div>';
			}
			
			//OPTION VITRINE ENCADREE
			
			$aff = '';
			
			foreach($cache_options_visuelles as $v)
			if($v['type'] == 7 && $v['type'] == $id_opt) $aff = 1;
			
			if($aff == 1) { echo '<p class="form_left_opts"></p><p class="form_right_option">'. $language['page_bout_c_enc'] .'</p>';
			
			$i = 1;
			
			echo '<div class="conteneurRadio" id="conteneurRadio6">';
			
			foreach($cache_options_visuelles as $v)
			{
				
				$id = (int) $v['id'];
				$jour = (int) $v['jour'];
				$prix = (float) $v['prix'];
				$prix = number_format($prix, 2, ',', ' ');
				$type = (int) $v['type'];
				
				if($type == 7)
				{
				?>
					<p class="form_left_opts"></p>
					<p class="form_right">
						<input type="radio" id="opt_type3_<?php echo $i; ?>" name="opt_type3" onclick="turnImgRadio(this, 6);" value="<?php echo $id; ?>" <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'checked="checked"'; elseif (empty($_POST['opt_type3']) && $i == 1) echo 'checked="checked"'; ?> />
						<img <?php if (isset($_POST['opt_type3']) AND $_POST['opt_type3'] == $id) echo 'src="images/radio2.png"'; elseif (empty($_POST['opt_type3']) && $i == 1) echo 'src="images/radio2.png"'; else echo 'src="images/radio1.png"'; ?> id="img_radio_opt_type3_<?php echo $i; ?>" alt="" /> 
						&nbsp;<label for="opt_type3_<?php echo $i; ?>"><?php echo $language['page_bout_opt_enc'] .' '. $jour .' '. $language['form_opt_jour'] .' : '. $prix  .' '. $param_gen['devise']; ?></label>
					</p>
				<?php
				
				$i++;
				} 
			}
			
			echo '</div>';
			}
		?>
		
		<?php
		
			$aff = 0;
			
			foreach($cache_code_reduc as $v)
			{
				if($v['val4'] == 1)
				{
					$aff = 1;
				}
			}
		
		if($aff == 1)
		{
		?>
		<p class="form_left_opts">
		</p>
		
		<p class="form_right_select" style="margin-top: 5px;">
			<?php if (isset($e['code'])) echo '<span class="error">'; ?><label for="promo"><span class="txt_info"><?php echo $language['form_promo']; ?> :</span></label><?php if (isset($e['code'])) echo '</span>'; ?>
			<input type="text" id="promo" class="av_input" name="promo" value="<?php if (!empty($_POST['promo'])) echo htmlspecialchars($_POST['promo']); ?>" /></span>
		</p>
		<?php
		}
		?>
		
		<p class="form_left_opts"></p>

		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
	</div>
	</form>
	
</div>
</div>
<?php
}

/// ----- BARRE INFO LISTING PAGE VITRINE -----  ///

function display_search_infos_page_vitrine($limit, $page_num, $nb_ann)
{
	global $language;
	
	$limit = (int) $limit;
	$page_num = (int) $page_num;
	$nb_ann = (int) $nb_ann;

?>

<div id="corps_info_ann">

	<span class="lien_info_ann_sel"><?php echo $language['page_bout_all_ann']; ?> :</span>
 
	<?php
	 
		$deb = ($page_num * $limit) - $limit + 1;
		$fin = $limit * $page_num;
	  
		echo '<span class="txt_info_nb_ann">&nbsp; '. $deb .' '. $language['all_lien_a'] .' '. $fin .' '. $language['all_lien_sur'] .'  '.  $nb_ann .' &nbsp;</span>'; 
	  
	?>

</div>
<?php
}

/// ----- PAGINATION LISTING PAGE VITRINE -----  ///
	
function display_search_links_page_vitrine($id, $max_page, $page, $limit, $pos)
{
	global $language;
	
	$id = (int) $id;
	$max_page = (int) $max_page;
	$page = (int) $page;
	$limit = (int) $limit;
	$pos = (int) $pos;
	
	$nav = ' ';
	
	$url = 'boutique_page.php?id='. $id .'&amp;';

?>	

<?php if ($pos == 1) echo '<div id="bloc_center"><div id="middle_bloc_center"><div id="corps_listing">'; ?>

<div id="bloc_pagination">

	<?php
	  
		$num = floor($page/10);
	 
		if($num == 0)
		$inf = ($num * 10) + 1;
	 
		else $inf = ($num * 10);
	 
		$sup = ($num + 1 ) * 10;
	 
		if($sup < $max_page)
		{
			for ($i = $inf ; $i <= $sup; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
			
			$nav .=" .. ";
		}
		else
		{
			for ($i = $inf ; $i <= $max_page; $i++)
			{
				if($page == $i)
				$nav .= '<a href="'. $url .'page='. $i .'" class="lien_pagination_sel">'. $i .'</a>&nbsp;';
			 
				else $nav .= '<a href= "'. $url .'page='. $i .'" class="lien_pagination">'. $i .'</a>&nbsp;';
			}
		}	
		
		if($page > 1)
		{
			$page_num = $page - 1;
			$prev = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">< '. $language['page_prec'] .'</a>';
		} 
		else $prev = '';
		
		if($page < $max_page)
		{
			$page_num = ($page + 1);
			$next = '<a href="'. $url .'page='. $page_num .'" class="lien_pagination">'. $language['page_suiv'] .' ></a>&nbsp;';
			$last = '<a href="'. $url .'page='. $max_page .'" class="lien_pagination">'. $language['page_dern'] .' ></a>&nbsp;';
		}
		else
		{
			$next = '&nbsp;';
			$last = '&nbsp;';
		}	  
		
		echo $prev.$nav.$next.$last;
	 
	?>

</div>

<?php if ($pos == 1) echo ''; ?>

<?php if ($pos == 2) echo '</div>'; ?>
	
<?php 
}

/// ----- FORMULAIRE DE CONTACT -----  ///

function display_form_contact($row, $e)
{
	global $language, $cache_mails_contact;
	
	$id_ann = (is_array($row)) ? $id_ann = $row[0]['id_ann'] : '';
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">
	
	<?php
		
		if (!empty($e['con_nom']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error1'] .'</span></p>';
			
		elseif (!empty($e['con_ema']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error2'] .'</span></p>';
		
		elseif (!empty($e['con_tit']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error3'] .'</span></p>';
		
		elseif (!empty($e['con_mes']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error4'] .'</span></p>';
		
		elseif (!empty($e['con_cod']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error5'] .'</span></p>';
		
	?>

	<p class="form_left"><label for="con_nom"><?php echo $language['page_env_cont_nom']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="con_nom" class="av_input" name="con_nom" value="<?php if (!empty($_POST['con_nom'])) echo htmlspecialchars($_POST['con_nom']); ?>" />
	</p>
	
	<p class="form_left"><label for="con_ema"><?php echo $language['page_env_cont_email']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="con_ema" class="av_input" name="con_ema" value="<?php if (!empty($_POST['con_ema'])) echo htmlspecialchars($_POST['con_ema']); ?>" />
	</p>
	
	<p class="form_left"><label for="con_tel"><?php echo $language['page_env_cont_tel']; ?> :</label></p>
	
	<p class="form_right_select">
		<input type="text" id="con_tel" class="av_input" name="con_tel" value="<?php if (!empty($_POST['con_tel'])) echo htmlspecialchars($_POST['con_tel']); ?>" /> &nbsp;<span class="info_form"><?php echo $language['page_env_cont_tel_info']; ?></span>
	</p>
	
	<p class="form_left"><label for="mes_ema"><?php echo $language['page_env_cont_cont']; ?> :</label></p>
	
	<p class="form_right_select">
		<select name="contact" class="select_contact" id="mes_ema">
			
			<?php 
				
				foreach($cache_mails_contact as $v)
				{
					$id = (int) $v['id_contact'];
					$name = htmlspecialchars($v['nom'], ENT_QUOTES); 
					
					if(!empty($_POST['contact']) && $_POST['contact'] == $id)
					echo '<option value="'. $id .'" selected="selected">'. $name .'</option>';
					
					else echo '<option value="'. $id .'">'. $name .'</option>';
				}
			 
			?>
		</select>
	</p>
	
	<p class="form_left"><label for="con_tit"><?php echo $language['page_env_cont_suj']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="con_tit" class="av_input" name="con_tit" value="<?php if (!empty($_POST['con_tit'])) echo htmlspecialchars($_POST['con_tit']); elseif(!empty($id_ann)) echo $language['page_env_cont_suj_ann_sig'] . $id_ann; ?>" />
	</p>
	
	<p class="form_left"><label for="con"><?php echo $language['page_env_cont_mes']; ?> :</label></p>
		
	<p class="form_right_textarea">
		<textarea id="con" class="textarea" cols="60" rows="10" name="con_mes"><?php if (!empty($_POST['con_mes'])) echo htmlspecialchars($_POST['con_mes']); elseif(!empty($id_ann)) echo $language['page_env_cont_mes_ann_sig']; ?></textarea>
	</p>
	
	<p class="form_left"></p>
		
	<p class="form_right_select">
		<img src="captcha.php" width="115" height="24" alt="Captcha" id="captcha" />
	</p>
	
	<p class="form_left"><label for="code"><?php echo $language['page_env_cont_bot']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="code" class="av_input" name="code" value="<?php if (!empty($_POST['code'])) echo htmlspecialchars($_POST['code']); ?>" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_envoye.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>

<?php
}

/// ----- PAGE DE RELANCE D'UNE ANNONCE -----  ///
	
function relance_ann($row)
{
	global $language, $param_gen, $cache_categories;
	
	$id_ann = (int) $row[0]['id_ann'];
	$id_cat = (int) $row[0]['id_cat'];
	$titre = stripslashes(htmlspecialchars($row[0]['titre']));
	$sta = (int) $row[0]['status'];
	
	$prix_par = '';
	$prix_pro = '';
	
	foreach($cache_categories as $v)
	{
		if($v['id_cat'] == $id_cat)
		{
			$prix_par = (float) $v['prix_par_ren'];
			$prix_par_aff = number_format($prix_par, 2, ',', ' ');
			$prix_pro = (float) $v['prix_pro_ren'];
			$prix_pro_aff = number_format($prix_pro, 2, ',', ' ');
		}
	}
	
?>
<div id="bloc_center">
<div id="middle_bloc_center">

	<form method="post" action="">
	<div id="corps">
	
		<p class="form_left_opts"><input type="hidden" name="id_ann" value="<?php echo $id_ann; ?>" /></p>
		<p class="form_right"><?php echo $language['page_relance_info'] .' <strong>"'. $titre .'"</strong>'; ?></p>
		
		<?php
		
		if($prix_par != 0 && $sta == 1)
		echo '<p class="form_left_opts"><input type="hidden" name="prix" value="'. $prix_par .'" /></p><p class="form_right">'. $language['page_relance_prix'] .' '. $prix_par_aff .' '. $param_gen['devise'] .'</p>';
	
		elseif($sta == 1) echo '<p class="form_left_opts"></p><p class="form_right">'.$language['page_relance_prix_free'] .'</p>';
	
		if($prix_pro != 0 && $sta == 2)
		echo '<p class="form_left_opts"><input type="hidden" name="prix" value="'. $prix_pro .'" /></p><p class="form_right">'.$language['page_relance_prix'] .' '. $prix_pro_aff .' '. $param_gen['devise'] .'</p>';
	
		elseif($sta == 2) echo '<p class="form_left_opts"></p><p class="form_right">'.$language['page_relance_prix_free'] .'</p>';
		
		?>

		<p class="form_left_opts"></p>
		<p class="form_right_select">
			<input type="image" src="images/bouton_valider.png" value="" />
		</p>
		
	</div>
	</form>
	
</div>
</div>
<?php
}

/// ----- PAGE DE PAIEMENT -----  ///	

function display_paiement($id, $prix, $prix_tva, $itemname)
{
	global $language, $param_gen, $cache_pay_paypal, $cache_pay_atos, $cache_pay_allopass, $cache_pay_cheque;
	
	$prix_total = number_format($prix, 2, '.', '');
	$prix_allopass = $prix;
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<div id="bloc_paiement">

	<span class="txt_info">
		<?php echo $itemname .'<br /><br />';
		
		if(!empty($prix_tva))
		{
			$prix_tva_total = number_format($prix_tva, 2, '.', '');
			
			echo $language['prix_page_paiement'] .' : '. $prix_total .' '. $param_gen['devise'] .'<br /> '. $language['prix_tva_page_paiement'] .' : '. $prix_tva_total .' '. $param_gen['devise'] .'<br /><br />';
		
			$prix_total = $prix + $prix_tva;
			$prix_allopass = $prix + $prix_tva;
		}
		
		$prix_total = number_format($prix_total, 2, '.', '');
		
		 
		echo '<strong>'. $language['prix_total_page_paiement'] .' : '. $prix_total .' '. $param_gen['devise'] .'</strong><br />'; 
		echo '<strong>'. $language['prix_ref_page_paiement'] .' : '. $id .'</strong><br /><br />';
		
		
		?>
	</span>
	
	<?php
		
		echo '<span class="txt_info">'. $language['choix_page_paiement'] .'</span><br /><br />';
		
		if($cache_pay_paypal['act_paypal'] == 1)
		{
			echo '<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				  <input type="hidden" name="cmd" value="_xclick" />
				  <input type="hidden" name="charset" value="utf-8" />
				  <input type="hidden" name="business" value="'. $cache_pay_paypal['email_paypal'] .'" />
				  <input type="hidden" name="item_name" value="'. $itemname .'" />
				  <input type="hidden" name="item_number" value="'. $id .'" />
				  <input type="hidden" name="custom" value="'. $id .'" />
				  <input type="hidden" name="currency_code" value="'. $cache_pay_paypal['devise'] .'" />
				  <input type="hidden" name="amount" value="'. $prix_total .'" />
				  <input type="hidden" name="return" value="'. URL .'/pay_valide.php" />
				  <input type="hidden" name="notify_url" value="'. URL .'/includes/payment/paypal/api.php" />
				  <input type="hidden" name="cancel_return" value="'. URL .'/pay_annule.php" />
				  <input type="image" src="images/paypal.gif" border="0" name="submit" alt="" />
				  </form>';
		}
	
		if($cache_pay_atos['act_atos'] == 1)
		{
			echo '<span class="txt_info">';
			require_once('includes/payment/atos/sample/call_request.php');
			echo '</span>';
		}
		
		if($cache_pay_allopass['act_allopass'] == 1)
		{
			$_SESSION['allopass_id'] = $id;
			
			$prix_allopass = round($prix_allopass);
			
			if($prix_allopass > 0 && $prix_allopass < 4)
			echo $cache_pay_allopass['script1'];
			
			if($prix_allopass > 3 && $prix_allopass < 7)
			echo $cache_pay_allopass['script2'];
			
			if($prix_allopass > 6 && $prix_allopass < 11)
			echo $cache_pay_allopass['script3'];
			
			if($prix_allopass > 10 && $prix_allopass < 15)
			echo $cache_pay_allopass['script4'];
			
			if($prix_allopass > 14 && $prix_allopass < 19)
			echo $cache_pay_allopass['script5'];
			
			if($prix_allopass > 18 && $prix_allopass < 23)
			echo $cache_pay_allopass['script6'];
			
			if($prix_allopass > 22)
			echo $cache_pay_allopass['script7'];
		}
		
		if($cache_pay_cheque['act_cheque'] == 1)
		{
			if($cache_pay_cheque['actif'] == 1)
			echo '<p class="txt_info">'. $cache_pay_cheque['texte'] .'</p>';
			
			else echo '<p class="txt_info">'. nl2br(htmlspecialchars($cache_pay_cheque['texte'])) .'</p>';
		}
	
	?>

</div>

</div>
</div>
<?php
}

/// ----- FORMULAIRE DE L'ALERTE EMAIL -----  ///

function display_form_alert($reg, $dep, $cat, $e)
{
	global $language, $cache_regions, $cache_departements, $cache_categories;
	
?>

<div id="bloc_center">
<div id="middle_bloc_center">

<form action="" method="post">

<div id="corps">
	
	<?php
		
		if (!empty($e['email']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_alert_error1'] .'</span></p>';
		
		elseif (!empty($e['reg']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_alert_error2'] .'</span></p>';
		
		elseif (!empty($e['dep']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_alert_error3'] .'</span></p>';
	
		elseif (!empty($e['cat']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_alert_error4'] .'</span></p>';
		
		elseif (!empty($e['words']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_alert_error5'] .'</span></p>';
		
		elseif (!empty($e['con_cod']))
		echo '<p class="form_left"></p><p class="form_right"><span class="error">'. $language['page_env_cont_error5'] .'</span></p>';
		
	?>
	
	<p class="form_left"></p>
		
	<p class="form_right"><?php echo $language['page_alert_info']; ?></p>

	<p class="form_left"><label for="email"><?php echo $language['page_alert_email']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="email" class="av_input" name="email" value="<?php if (!empty($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" />
	</p>
	
	<p class="form_left"><label for="reg"><?php echo $language['page_alert_reg']; ?> :</label></p>

	<div class="form_right_select"><?php display_regions($reg, $cache_regions); ?></div>
	
	<div id="display_departements">
		<?php
		
			if ($reg != 0)
			{
				$aff = 0;
				
				foreach($cache_departements as $v)
				{
					if($v['id_reg'] == $reg)
					$aff = 1;
				}
				
				if($aff == 1)
				{
					echo '<p class="form_left"><label for="reg">'. $language['page_alert_dep'] .' :</label></p><p class="form_right_select">';
				 
					display_departements($dep, $reg, $cache_departements);
					
					echo '</p>';
				}
			}
			
		?>
	</div>
	  
	<p class="form_left"><label for="reg"><?php echo $language['page_alert_cat']; ?> :</label></p>
	
	<div class="form_right_select"><?php display_categories($cat, $cache_categories); ?></div>
	
	<p class="form_left"><label for="word1"><?php echo $language['page_alert_word1']; ?> :</label></p>
	
	<p class="form_right_select">
		<input type="text" id="word1" class="av_input" name="word1" value="<?php if (!empty($_POST['word1'])) echo htmlspecialchars($_POST['word1']); ?>" />
	</p>
	
	<p class="form_left"><label for="word2"><?php echo $language['page_alert_word2']; ?> :</label></p>
	
	<p class="form_right_select">
		<input type="text" id="word2" class="av_input" name="word2" value="<?php if (!empty($_POST['word2'])) echo htmlspecialchars($_POST['word2']); ?>" />
	</p>
	
	<p class="form_left"><label for="word3"><?php echo $language['page_alert_word3']; ?> :</label></p>
	
	<p class="form_right_select">
		<input type="text" id="word3" class="av_input" name="word3" value="<?php if (!empty($_POST['word3'])) echo htmlspecialchars($_POST['word3']); ?>" />
	</p>
	
	<p class="form_left"></p>
		
	<p class="form_right_select">
		<img src="captcha.php" width="115" height="24" alt="Captcha" id="captcha" />
	</p>
	
	<p class="form_left"><label for="code"><?php echo $language['page_env_cont_bot']; ?> :</label></p>
		
	<p class="form_right_select">
		<input type="text" id="code" class="av_input" name="code" value="<?php if (!empty($_POST['code'])) echo htmlspecialchars($_POST['code']); ?>" />
	</p>
	
	<p class="form_left"></p>

	<p class="form_right_select">
		<input type="image" src="images/bouton_envoye.png" value="" />
	</p>
	
</div>

</form>

</div>
</div>

<?php
}