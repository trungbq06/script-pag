<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////////////////////
//Afficher les régions
//////////////////////////////////

function display_regions($id, $regions)
{	
	global $language;
	
	echo '<select id="form_dep" name="reg" class="select_recherche_form" onchange="DisplayDepartements()">';
	echo '<option value="0">'. $language['form_reg_select'] .'</option>';
	
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

///////////////////////////////////
//Afficher les départements
//////////////////////////////////

function display_departements($id, $reg, $departements)
{	
	global $language;
	
	echo '<select id="form_reg" name="dep" class="select_recherche_form">';
	echo '<option value="0">'. $language['form_dep_select'] .'</option>';
	
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

///////////////////////////////////
//Afficher les categories
//////////////////////////////////

function display_categories($id, $categories)
{
	global $language;
	
	echo '<select id="options" name="cat" class="select_recherche_form" onchange="DisplayOptions(); DisplayComment(); DisplayPrix()">';
	echo '<option value="0">'. $language['form_cat_select'] .'</option>';

	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		{
			if(!empty($id) && $id == $name_cat)
			echo '<option value="0" disabled class="fond_select_categories uppercase" selected="selected">-- '. strtoupper($name_cat) .' --</option>';
			
			else echo '<option value="0" disabled class="fond_select_categories uppercase">-- '. strtoupper($name_cat) .' --</option>';
		}
		
		//Sous catégories
		
		$sous_categories = $categories;
		
		foreach($sous_categories as $row)
		{
			$id_sous_cat = (int) $row['id_cat'];
			$par_sous_cat = (int) $row['par_cat'];
			$name_sous_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));
			
			if($par_sous_cat == $id_cat) 
			{
				if($id_sous_cat == $id)
				echo '<option value="'. $id_sous_cat .'" selected="selected">'. $name_sous_cat .'</option>';
				
				else echo '<option value="'. $id_sous_cat .'">'. $name_sous_cat .'</option>';
			}
		}
	}	
	echo '</select>';
}

//////////////////////////////////////////////////
//Afficher le prix de l'annonce
//////////////////////////////////////////////////

function display_prix($cat, $array)
{
	global $language, $param_gen;
	
	$prix_par = '';
	$prix_pro = '';
	
	foreach($array as $v)
	{
		if($v['id_cat'] == $cat)
		{
			$prix_par = (float) $v['prix_par'];
			$prix_par_aff = number_format($prix_par, 2, ',', ' ');
			$prix_pro = (float) $v['prix_pro'];
			$prix_pro_aff = number_format($prix_pro, 2, ',', ' ');
		}
	}
	
	if($prix_par != 0)
	echo '<p class="form_left"></p><p class="form_right">'. $language['form_prix_par'] .' '. $prix_par_aff .' '. $param_gen['devise'] .'</p>';
	
	else echo '<p class="form_left"></p><p class="form_right">'.$language['form_prix_par_free'] .'</p>';
	
	if($prix_pro != 0)
	echo '<p class="form_left"></p><p class="form_right">'.$language['form_prix_pro'] .' '. $prix_pro_aff .' '. $param_gen['devise'] .'</p>';
	
	else echo '<p class="form_left"></p><p class="form_right">'.$language['form_prix_pro_free'] .'</p>';
}
	
//////////////////////////////////////////////////
//Afficher les options de catégories valeurs
//////////////////////////////////////////////////

function display_noms_valeurs($cat, $array, $e)
{
	global $language;
	
	foreach ($array as $row)
	{ 
		$id = (int) $row['id_for'];
		$id_cat = (int) $row['id_cat'];
		$type = (int) $row['type'];
		$form_name = 'form'. $id;
        
		if (isset($_POST[$form_name]))
		$value = stripslashes(htmlspecialchars($_POST[$form_name], ENT_QUOTES));
		
		elseif (isset($_SESSION[$form_name]))
		$value = stripslashes(htmlspecialchars($_SESSION[$form_name], ENT_QUOTES));
		
		else $value = '';
		
		$name = stripslashes(htmlspecialchars($row['nom_for'], ENT_QUOTES));
		$uni = stripslashes(htmlspecialchars($row['uni_for'], ENT_QUOTES));
		
		if($id_cat == $cat && $type == 1)
		{
			echo '<p class="form_left">';
			
			if (isset($e[$form_name]))
			echo '<span class="error">';
			
			echo '<label for="'. $name .'">'. $name .' :</label>';
			
			if (isset($e[$form_name])) 
			echo '</span>';
				
			echo '</p>';
			
			echo '<p class="form_right_select">
			<input type="text" id="'. $name .'" class="av_input" name="'. $form_name .'" value="'. $value .'" /> &nbsp;<span class="info_form">'. $uni .'</span>
			</p>';
		}
	}
}

//////////////////////////////////////////////////
//Afficher les options de catégories données
//////////////////////////////////////////////////

function display_noms_donnees($cat, $array, $e)
{
	global $language, $cache_select_donnees;
	
	foreach ($array as $row)
	{ 
		$id = (int) $row['id_for'];
		$id_cat = (int) $row['id_cat'];
		$name = stripslashes($row['nom_for']);
		$id_opt = (int) $row['id_opt'];
		$type = (int) $row['type'];
		$form_name = 'form'. $id;
		
		if($id_cat == $cat && $type == 2)
		{
			echo '<p class="form_left">';
			
			if (isset($e[$form_name]))
			echo '<span class="error">';
			
			echo '<label for="'. $name .'">'. $name .' :</label>';
			
			if (isset($e[$form_name])) 
			echo '</span>';
				
			echo '</p>';
			
			echo '<p class="form_right_select"><select id="'. $name .'" name="'. $form_name .'" class="select_form">
			<option value="0">'. $name .'</option>';
			
			foreach($cache_select_donnees as $row)
			{
				$v = stripslashes(htmlspecialchars($row['valeur'] , ENT_QUOTES));
				$id_opt_donnees = (int) $row['id_opt'];
				
				if($id_opt == $id_opt_donnees)
				{
					if(isset($_POST[$form_name]) && $_POST[$form_name] == $v)
					echo '<option value="'. $_POST[$form_name] .'" selected="selected">'. $_POST[$form_name] .'</option>';
					
					elseif(isset($_SESSION[$form_name]) && $_SESSION[$form_name] == $v)
					echo '<option value="'. $_SESSION[$form_name] .'" selected="selected">'. $_SESSION[$form_name] .'</option>';
					
					else echo '<option value="'. $v .'">'. $v .'</option>';
				}
			}
			
			echo '</select></p>';
		}
	}
}