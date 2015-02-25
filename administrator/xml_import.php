<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Vérifier si le super admin ou  admin niveau 2 est connecté
//////////////////////////////////
	
if(!empty($_SESSION['valid_admin']))
$valid_admin = $_SESSION['valid_admin'];

if(!check_super_admin())
redirect( "logout.php" );
	
///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////
	
$error = '';
	
///////////////////////////////////
//Téléchargement du fichier XML
//////////////////////////////////

if(isset($_FILES['xml']) AND $_FILES['xml']['error'] == 0)
{
    if ($_FILES['xml']['size'] <= 1073741824*3) // Verifier la taille du fichier 5GO MAX
    {
		$extensions_autorisees = array('xml');  // Les extentions autorisées
		$extension_telechargees = strtolower(substr(strrchr($_FILES['xml']['name'], '.'), 1) );  // Récupération de l'extention
		
        if (in_array($extension_telechargees, $extensions_autorisees))
        {
			$nom_fichier = $_FILES['xml']['name'];
			
            move_uploaded_file($_FILES['xml']['tmp_name'], 'temp/' . basename($nom_fichier)); // Valilation est stockage du fichier
			
			if(file_exists('temp/'. $nom_fichier)) 
			{
				if(is_object($xml = @simplexml_load_file('temp/'. $nom_fichier)))
				{
					$error = insert_ann_xml($xml);
					unlink('temp/'. $nom_fichier);
					$conn = null;
					
					if(empty($error)) 
					{
						$texte_info = $language_adm['page_xml_import_re_info'];
						$texte = $language_adm['page_xml_import_re'];
						
						htm_admin_header();
						htm_menu();
						display_text($texte_info, $texte);
						htm_admin_footer();
					}
				}
				else $error = 3;
			} 
			else 
			{
				$error = 2;
			}
		}
		else $error = 1;
    }
	else $error = 2;
}
elseif(isset($_FILES['xml']) AND $_FILES['xml']['error'] != 0)
$error = 1;


///////////////////////////////////
//Inclusion des fonction html
//////////////////////////////////

if(!isset($texte_info))
{
	htm_admin_header();
	htm_menu();
	htm_import_xml($error);
	htm_admin_footer();
}