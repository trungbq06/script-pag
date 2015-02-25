<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// 

############################################################ 

///////////////////////////////////
//Mails auto
////////////////////////////////// 
 
$cache_mails_auto = array(
0=>
array(
'id_email'  => '1',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Confirmer votre annonce ',
'message'   => "Bonjour,<br /><br />
Nous avons bien reçu votre annonce \"<titre>\".<br /><br />
Merci de confirmer cette annonce en cliquant sur  le lien suivant :<br />
<a href=\"<url>\"><url></a>
<br /><br />
Une fois confirmée, notre équipe la validera sous réserve d\\\'acceptation dans un délai de 24h.
<br /><br />
Petites annonces sur internet.",
'type'       => '1',
),
1=>
array(
'id_email'  => '2',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Validation de votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Votre annonce \"<titre>\" a bien été mise en ligne par notre équipe sur notre site.<br />
Elle restera en ligne pendant 2 mois, période durant laquelle vous pouvez la modifier ou la supprimer en allant directement sur votre annonce, dans la rubrique \"Gérer votre annonce\".
<br><br>
Votre annonce est visible à l\'url suivante :<br /> 
<a href=\"<url>\"><url></a>
<br /><br />
Petites annonces sur internet.",
'type'       => '2',
),
2=>
array(
'id_email'  => '3',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Votre annonce \"<titre>\" refusée',
'message'   => "Bonjour<br /><br />
Votre annonce \"<titre>\" n\'a pas été retenue car elle ne respecte pas nos règles de diffusion.<br /><br />
<msg_refus>
<modif>
Petites annonces sur internet.",
'type'       => '3',
),
3=>
array(
'id_email'  => '4',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Nous vous informons que votre annonce \"<titre>\" n\'est plus valide car vous ne l\'avez pas confirmée dans les 48 heures.
<br /><br />
Petites annonces sur internet.",
'type'       => '4',
),
4=>
array(
'id_email'  => '5',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Expiration de votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Nous vous annonçons que votre annonce \"<titre>\" a été supprimée de notre site car elle est arrivée à expiration.
<br /><br />
Petites annonces sur internet.",
'type'       => '5',
),
5=>
array(
'id_email'  => '6',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Confirmer votre compte',
'message'   => "Bonjour,<br /><br />
Merci de confirmer votre compte en cliquant sur  le lien suivant :<br />
<a href=\"<url>\"><url></a>
<br /><br />
Une fois confirmé, notre équipe le validera sous réserve d\'acceptation dans un délai de 24h.
<br /><br />
Petites annonces sur internet.",
'type'       => '6',
),
6=>
array(
'id_email'  => '7',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Validation de votre compte',
'message'   => "Bonjour,<br /><br />
Votre compte a été validé avec succès par notre équipe. Vous pouvez dorénavant vous y connecter.
<br /><br />
Petites annonces sur internet.",
'type'       => '7',
),
7=>
array(
'id_email'  => '8',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Refus de votre compte',
'message'   => "Bonjour,<br /><br />
Votre compte a été refusé.<br /><br />
Petites annonces sur internet.",
'type'       => '8',
),
8=>
array(
'id_email'  => '9',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Paiement de votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Merci de votre achat pour l\'annonce \"<titre>\".<br /><br/>
Votre annonce est visible à l\'url suivante :<br />
<a href=\"<url>\"><url></a><br /><br />
Votre facture est disponible à cette adresse :<br />
<a href=\"<facture>\"><facture></a><br /<br />
Petites annonces sur internet.",
'type'       => '9',
),
9=>
array(
'id_email'  => '10',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Achat d\'option pour votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Merci de votre achat pour l\'annonce \"<titre>\".<br /><br/>
Votre facture est disponible à cette adresse :<br />
<a href=\"<facture>\"><facture></a><br /><br />
Pour rappel, votre annonce est visible à l\'url suivante :<br />
<a href=\"<url>\"><url></a><br /><br />
Petites annonces sur internet.",
'type'       => '10',
),
10=>
array(
'id_email'  => '11',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Achat d\'option pour votre vitrine',
'message'   => "Bonjour,<br /><br />
Merci de votre achat pour  votre vitrine.<br /><br />
Votre facture est disponible à cette adresse :<br />
<a href=\"<facture>\"><facture></a><br /<br />
Petites annonces sur internet.",
'type'       => '11',
),
11=>
array(
'id_email'  => '12',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Achat d\'un pack compte',
'message'   => "Bonjour,<br /><br />
Merci d\'avoir fait l\'achat d\'un pack compte sur notre site.<br /><br/>
Votre facture est disponible à cette adresse :<br />
<a href=\"<facture>\"><facture></a><br /<br />
Petites annonces sur internet.",
'type'       => '12',
),
12=>
array(
'id_email'  => '13',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Achat d\'un abonnement vitrine',
'message'   => "Bonjour,<br /><br />
Merci d\'avoir fait l\'achat d\'un abonnement vitrine sur notre site.<br /><br/>
Votre facture est disponible à cette adresse :<br />
<a href=\"<facture>\"><facture></a><br /><br />
Petites annonces sur internet.",
'type'       => '13',
),
13=>
array(
'id_email'  => '14',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Renouveler votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Nous vous rapelons que votre annonce \"<titre>\" expire dans moins de 7 jours.<br /><br/>
Cliquez sur le lien suivant pour la renouveler :<br />
<a href=\"<url>\"><url></a><br /><br />
Petites annonces sur internet.",
'type'       => '14',
),
14=>
array(
'id_email'  => '15',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Options visuelles de votre annonce \"<titre>\"',
'message'   => "Bonjour,<br /><br />
Des options visuelles de votre annonce \"<titre>\" ont expirées.<br /><br />
Vous pouvez les renouveler depuis la page de votre annonce accessible à l\'url suivante :<br />
<a href=\"<url>\"><url></a><br /><br />
Petites annonces sur internet.",
'type'       => '15',
),
15=>
array(
'id_email'  => '16',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Option visuelle de votre vitrine',
'message'   => "Bonjour,<br /><br />
Des options visuelles de votre vitrine ont expirées.
<br /><br />
Vous pouvez renouveler ces options directement depuis la page de votre vitrine.<br /><br />
Petites annonces sur internet.",
'type'       => '16',
),
16=>
array(
'id_email'  => '17',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Expiration du pack de votre compte',
'message'   => "Bonjour,<br /><br />
Le pack de votre compte est éxpiré. Pour le renouveler, connectez-vous à votre compte et cliquez sur \"Déposer une annonce\".<br /><br />
Petites annonces sur internet.",
'type'       => '17',
),
17=>
array(
'id_email'  => '18',
'nom'       => 'Script PAG',
'email'     => 'support@script-pag.com',
'titre'     => 'Expiration de l\'abonneme de votre vitrine',
'message'   => "Bonjour,<br /><br />
L\'abonnement de votre vitrine est éxpiré, par conséquent votre vitrine n\'est plus visible sur notre site. Pour le renouveler, connectez-vous à votre compte et cliquez sur \"Ma vitrine PRO\".<br /><br />
Petites annonces sur internet.",
'type'       => '18',
),
);