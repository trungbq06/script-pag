<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

require_once('includes/all_adm_functions.php');

///////////////////////////////////
//Initialisation de la variable $error
//////////////////////////////////

$error = '';

///////////////////////////////////
//Validation de l'adminsitrateur et inclusion des fonctions html
//////////////////////////////////

if(isset($_POST['email']) && isset($_POST['user']))
{
	$email = $_POST['email'];
	$user = $_POST['user'];
	
	if(verify_forgot_email($email, $user))
	{
		$password = generate_password();
		
		update_password($email, $user, $password);
		send_password($email, $password);
		
		$conn = null;
		
		$texte_info = $language_adm['email_for_pass_re'];
		$texte = $language_adm['email_for_pass_re_msg'];
		
		htm_admin_header();
		display_pass_text($texte_info, $texte);
		htm_admin_footer();
	}
	else
	{
		$error = 1;
		
		$conn = null;
		
		htm_admin_header();
		htm_forgot_password_center($error);
		htm_admin_footer();
	}
}
else
{
	htm_admin_header();
	htm_forgot_password_center($error);
	htm_admin_footer();
}