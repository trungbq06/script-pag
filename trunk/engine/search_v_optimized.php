<?php

///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

if(is_array($array_keywords))
{
	$num = count($array_keywords);
	
	$condition .= " AND MATCH (b.nom_ent, b.titre, b.description) AGAINST ('$array_keywords[0]')";
	
	if($num != 1)
	{			
		for($i = 1; $i < $num; $i++)	
		{			
			if(empty($array_keywords[$i]))	
			$condition .= "";		
			
			else $condition .= " AND MATCH (b.nom_ent, b.titre, b.description) AGAINST ('$array_keywords[$i]')";
		}
	}
}