<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

////////////////////////////////
//Affichage du select des catégories pour l'ajout d'une note dans le formulaire de dépôt
////////////////////////////////

function display_adm_categories_note($id, $categories)
{
	global $language_adm;

	echo '<select id="form_note" name="cat" class="input_select" onchange="GetNote();">';
	echo '<option value="0">'. $language_adm['select_cat'] .'</option>';	
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		echo '<option value="0" disabled class="select_cat uppercase">-- '. strtoupper($name_cat) .' --</option>';
		
		//Sous catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id == $id_sous_cat)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}
	echo '</select>';
}

////////////////////////////////
//Affichage du select des catégories pour l'application d'un disclaimer
////////////////////////////////

function display_adm_categories_disc($id, $categories)
{
	global $language_adm;

	echo '<select id="form_disc" name="cat" class="input_select" onchange="GetDisc();">';
	echo '<option value="0">'. $language_adm['select_cat'] .'</option>';	
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		echo '<option value="0" disabled class="select_cat uppercase">-- '. strtoupper($name_cat) .' --</option>';
		
		//Sous catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id == $id_sous_cat)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}
	echo '</select>';
}

////////////////////////////////
//Affichage du select des catégories pour l'application des options aux sous-catégories
////////////////////////////////

function display_adm_categories_opts($id, $categories)
{
	global $language_adm;

	echo '<select id="form_opts" name="cat" class="input_select" onchange="GetOpts();">';
	echo '<option value="0">'. $language_adm['select_cat'] .'</option>';	
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		echo '<option value="0" disabled class="select_cat uppercase">-- '. strtoupper($name_cat) .' --</option>';
		
		//Sous-catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id == $id_sous_cat)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}
	echo '</select>';
}

////////////////////////////////
//Optenir le select des catégories
////////////////////////////////

function display_adm_categories_search($id, $categories, $language)
{
	echo '<select name="cat" class="input_select_sma">';
	echo '<option value="0">'. $language .'</option>';	
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		echo '<option value="0" disabled class="select_cat uppercase">-- '. strtoupper($name_cat) .' --</option>';
		
		//Sous catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id == $id_sous_cat)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}	
	echo '</select>';
}

////////////////////////////////
//Optenir le select des régions
////////////////////////////////

function display_adm_regions_search($id, $regions, $language)
{	
	echo '<select id="form_dep" name="reg" class="input_select_sma" onchange="GetDepartements(); GetDepartementsAll()";>
	<option value="0">'. $language .'</option>';

	foreach ($regions as $row)
	{
		$id_reg = (int) $row['id_reg'];
		$nom_reg = stripslashes(htmlspecialchars($row['nom_reg'], ENT_QUOTES));			  			
	
		if ($id_reg == $id)
		echo '<option value="'. $id_reg .'" selected="selected">'. $nom_reg .'</option>';
	 
		else echo '<option value="'. $id_reg .'">'. $nom_reg .'</option>';
	}	
	echo '</select>';			
}

////////////////////////////////
//Optenir le select des departements
////////////////////////////////

function display_adm_departements_search($id, $reg, $departements, $language)
{	
	echo '<select name="dep" class="input_select_sma">
	<option value="0">'. $language .'</option>';

	foreach ($departements as $row)
	{
		$id_dep = (int) $row['id_dep'];
		$id_reg = (int) $row['id_reg'];
		$nom_dep = stripslashes(htmlspecialchars($row['nom_dep'], ENT_QUOTES));			  			
	
		if($id_reg == $reg)
		{
			if ($id_dep == $id)
			echo '<option value="'. $id_dep .'" selected="selected">'. $nom_dep.'</option>';
	 
			else echo '<option value="'. $id_dep .'">'. $nom_dep .'</option>';
		}
	}	
	echo '</select>';			
}

////////////////////////////////
//Affichage du select des catégories pour le paiement des annonces
////////////////////////////////

function display_adm_categories_pay_ann($id, $categories)
{
	global $language_adm;

	echo '<select id="form_pay_ann" name="cat" class="input_select" onchange="GetPayAnn();">';
	echo '<option value="0">'. $language_adm['select_cat'] .'</option>';	
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		echo '<option value="0" disabled class="select_cat uppercase">-- '. strtoupper($name_cat) .' --</option>';
		
		//Sous catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id == $id_sous_cat)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}
	echo '</select>';
}