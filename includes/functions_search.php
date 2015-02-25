<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

///////////////////////////////////
//Afficher les régions
//////////////////////////////////

function display_search_regions($id, $regions)
{	
	global $language;
	
	echo '<select id="dep" name="reg" class="select_recherche" onchange="GetDepartements()">';
	echo '<option value="0">'. $language['select_regions'] .'</option>';
	
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

function display_search_departements($id, $reg, $departements)
{	
	global $language;
	
	echo '<select name="dep" class="select_recherche">';
	echo '<option value="0">'. $language['select_departements'] .'</option>';

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

function display_search_categories($id, $categories)
{
	global $language;

	echo '<select id="opt" name="cat" class="select_recherche" onchange="GetOptions()">';
	echo '<option value="0">'. $language['select_categories'] .'</option>';
	
	foreach($categories as $row)
	{	
		$id_cat = (int) $row['id_cat'];
		$par_cat = (int) $row['par_cat'];
		$name_cat = stripslashes(htmlspecialchars($row['nom_cat'], ENT_QUOTES));		
       
		if($par_cat == 0) 
		{
			if(!empty($id) && $id == $name_cat)
			echo '<option value="'. $name_cat .'" class="fond_select_categories uppercase" selected="selected">-- '. strtoupper($name_cat) .' --</option>';
			
			else echo '<option value="'. $name_cat .'" class="fond_select_categories uppercase">-- '. strtoupper($name_cat) .' --</option>';
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

///////////////////////////////////
//Afficher les options de recherche
//////////////////////////////////

function display_search_options($id)
{
    global $language, $cache_search_valeurs, $cache_search_donnees;
	
    echo '<div id="option">';

	display_select($id, $cache_search_valeurs);
	
	display_select($id, $cache_search_donnees);
	
	echo '</div>';
}

///////////////////////////////////
//Afficher les options select
//////////////////////////////////

function display_select($id, $array)
{
	global $cache_select_valeurs, $cache_select_donnees;
	
	$i = 1;
	$c = 1;
	$num = 1;
	
	foreach ($array as $v)
	{
		if($num%2)
		{
			$num = 1;
		}
		else $num = 2;
		
		$id_sea = (int) $v['id_sea'];
		$id_cat = (int) $v['id_cat'];
		$sel_nom = stripslashes(htmlspecialchars($v['sel_nom'], ENT_QUOTES));
		$id_opt = (int) $v['id_opt'];
     
		if($id == $id_cat)
		{
			echo '<select name="sel'. $id_opt .'_'. $num .'" class="select_recherche">';
			echo '<option value="0">'. $sel_nom .'</option>';
			
			$valeurs = $cache_select_valeurs;
			
			foreach($valeurs as $row)
			{
				$sel_nom_val = stripslashes(htmlspecialchars($row['sel_nom'], ENT_QUOTES));
				$v = stripslashes(htmlspecialchars($row['valeur'] , ENT_QUOTES));
				
				if($sel_nom == $sel_nom_val)
				{
					if(isset($_SESSION['search']['sel'. $id_opt .'_'. $num]) && $_SESSION['search']['sel'. $id_opt .'_'. $num] != 0 && $_SESSION['search']['sel'. $id_opt .'_'. $num] == $v)
					echo '<option value="'. $v .'" selected="selected">'. $v .'</option>';
					
					else echo '<option value="'. $v .'">'. $v .'</option>';
				}
			}
			
			$valeurs = $cache_select_donnees;
				
			foreach($valeurs as $row)
			{
				$v = stripslashes(htmlspecialchars($row['valeur'] , ENT_QUOTES));
				$id_opt_don = (int) $row['id_opt'];
				
				if($id_opt == $id_opt_don)
				{
					if(isset($_SESSION['search']['sel'. $id_opt .'_'. $num]) && $_SESSION['search']['sel'. $id_opt .'_'. $num] != '0' && $_SESSION['search']['sel'. $id_opt .'_'. $num] == $v)
					echo '<option value="'. $v .'" selected="selected">'. $v .'</option>';
						
					else echo '<option value="'. $v .'">'. $v .'</option>';
				}
			}
				
			echo "</select>";
			$i++;
			$c++;
			$num++;
		}
	}	
}