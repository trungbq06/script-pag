<?php 
	$contenuXml = $_REQUEST["contenuXml"];
	$contenuXml = stripcslashes($contenuXml);
	
	$file= fopen("../style/adm_colors.xml", "w");		
	fwrite($file, $contenuXml);
	
	fclose($file);
?>