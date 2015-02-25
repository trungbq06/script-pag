<?php

///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

if(!empty($array['titre']) && is_array($array_keywords))
{
	$num = count($array_keywords);
	
	$condition .= " AND MATCH (s.titre) AGAINST ('$array_keywords[0]')";
	
	if($num != 1)
	{
		for($i = 1; $i < $num; $i++)
		{
			if(empty($array_keywords[$i]))
			$condition .= "";
			
			else $condition .= " AND MATCH (s.titre) AGAINST ('$array_keywords[$i]')";
		}
	}
}
elseif(is_array($array_keywords))
{
	$num = count($array_keywords);
	
	$condition .= " AND MATCH (s.titre, s.ann) AGAINST ('$array_keywords[0]')";

	if($num != 1)
	{
		for($i = 1; $i < $num; $i++)
		{
			if(empty($array_keywords[$i]))
			$condition .= "";
		
			else $condition .= " AND MATCH (s.titre, s.ann) AGAINST ('$array_keywords[$i]')";
		}
	}
}