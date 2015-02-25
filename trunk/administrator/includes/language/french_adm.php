<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

$language_adm = array(

'error_bdd_connect'				=>	'Impossible de se connecter à la base de données - <a href="install">Cliquez-ici</a> pour installer votre site.<br /><br />
									Contactez l\'administrateur <a href="http://www.script-pag.com">Script PAG</a> en cas de problème.',
									
///////////////////////////////////
//Liens barre haut et bas de l'administration
//////////////////////////////////

'texte_haut'							=>	'- Administration',
'lien_haut_title'						=>	'Administration Script PAG',
'lien_haut_index'						=>	'Accueil / Aide ?',
'lien_haut_vu'							=>	'Voir le site',
'lien_haut_dec'							=>	'Déconnexion',

///////////////////////////////////
//Texte du menu de gestion des couleurs
//////////////////////////////////

'color_title' 							=> "Gestion des couleurs de l'interface d'administration",
'color_bg_menus' 						=> "Fond menus",
'color_txt_menus' 						=> "Textes menus",
'color_bg_smenus' 						=> "Fond sous-menus",
'color_txt_smenus' 						=> "Textes sous-menus",
'color_bg_header' 						=> "Bandeau haut",
'color_txt_button' 						=> "Valeur par défaut",

///////////////////////////////////
//Page de connexion à l'administration
//////////////////////////////////

'page_con_tit'							=>	'Connexion',
'page_con_log'							=>	'Login',
'page_con_pas'							=>	'Mot de passe',
'page_con_error'						=>	'Le login ou le mot de passe est incorrect',
'page_con_submit'						=>	'Connexion',
'page_con_for_pass'						=>	'Mot de passe oublié ?',

///////////////////////////////////
//Page du fomulaire du mot de passe oublié
//////////////////////////////////

'page_for_pass_tit'						=>	'Mot de passe oublié',
'page_for_pass_log'						=>	'Login',
'page_for_pass_ema'						=>	'Adresse Email',
'page_for_pass_error'					=>	'Le login ou l\'adresse email est incorrect',

///////////////////////////////////
//Email d'envoi du mot de passe
//////////////////////////////////

'email_for_pass_tit'					=>  'Votre nouveau mot de passe administrateur',
'email_for_pass_msg'					=>  'Voici votre nouveau mot de passe',

///////////////////////////////////
//Email d'envoi du mot de passe réussi
//////////////////////////////////

'email_for_pass_re'						=>  'Mot de passe envoyé',
'email_for_pass_re_msg'					=>  'Votre nouveau mot de passe vient de vous être envoyé',

///////////////////////////////////
//Liens boutons
//////////////////////////////////

'bt_link_valider'						=>	'Valider',
'bt_link_modifier'						=>	'Modifier',
'bt_link_rechercher'					=>	'Rechercher',

///////////////////////////////////
//Menu des modules d'administration
//////////////////////////////////

'com_adm_info'							=>	'Comptes administrateurs',
'com_adm_n1'							=>	'Comptes administrateurs niveau 1',
'com_adm_n2'							=>	'Comptes administrateurs niveau 2',
'com_adm_n3'							=>	'Comptes administrateurs niveau 3',
'temp_info'								=>	'Template',
'temp_img'								=>	'Edition des images',
'temp_struct'							=>	'Edition de la structure',
'temp_style'							=>	'Edition du style',
'param_gen'								=>	'Paramètres généraux',
'param_gen_mod'							=>	'Modifier les paramètres généraux',
'reg_adm_info'							=>	'Régions et départements',
'reg_mod'								=>	'Edition des régions et des départements',
'cat_adm_info'							=>	'Catégories et sous-catégories',
'cat_mod'								=>	'Edition des catégories et des sous-catégories',
'cat_opts_adm_info'						=>	'Options de sous-catégorie',
'cat_opt_comment'						=>	'Ajouter une note au formulaire de dépôt',
'cat_opt_dis'							=>	'Appliquer un disclaimer',
'cat_opts_link1'						=>	'Editer des options de valeurs numériques',
'cat_opts_link2'						=>	'Editer des options de données',
'cat_opt'								=>	'Appliquer des options aux sous-catégories',
'champ_form_info'						=>	'Champs du formulaire',
'champ_form_act'						=>	'Activer/désactiver des champs',
'champ_form_edit'						=>	'Editer des champs',
'mod_ann_info'							=>	'Gestion des annonces',
'mod_ann_att'							=>	'Annonces en attente de validation',
'mod_ann_val'							=>	'Annonces validées',
'mod_ann_exp_sup'						=>	'Supprimer les annonces rétirées ou expirées',
'mod_ann_ref'							=>	'Annonces refusées',
'mod_ann_conf'							=>	'Annonces non confirmées',
'mod_ann_sau'							=>	'Annonces retirées ou expirées',
'mod_ann_exp_ret'						=>	'Retirer du site les annonces expirées',
'mod_ann_ref_sup'						=>	'Supprimer les annonces refusées',
'mod_ann_conf_sup'						=>	'Supprimer les ann. non confirmées (+ de 48h)',
'mod_ann_ban'							=>	'Retirer une adresse email bannie',
'comptes_info'							=>	'Gestion des comptes',
'comptes_att_membre'					=>	'Comptes membre en attente de validation',
'comptes_val_membre'					=>	'Comptes membre validés',
'comptes_ref_membre'					=>	'Comptes membre Refusés',
'comptes_conf_membre'					=>	'Comptes membre non confirmés',
'comptes_att_pro'						=>	'Comptes pro en attente de validation',
'comptes_val_pro'						=>	'Compte pro validés',
'comptes_ref_pro'						=>	'Comptes pro Refusés',
'comptes_conf_pro'						=>	'Comptes pro non confirmés',
'vitrines_info'							=>	'Gestion des vitrines',
'vitrines_act'							=>	'Vitrines en ligne',
'achat_info'							=>	'Achats en attente de paiement',
'achat_att'								=>	'Achats en attente de paiement',
'mod_blacklist_info'					=>	'Gestion de la Blacklist',
'mod_blacklist_ret'						=>	'Retirer une adresse email bannie',
'mod_filtre_mail_info'					=>	'Filtrage mail',
'mod_filtre_mail_link'					=>	'Gestion des mails en attente d’envoi',
'mod_pay_info'							=>	'Modules de paiement',
'mod_pay_paypal'						=>	'Paypal',
'mod_pay_allopass'						=>	'Allopass',
'mod_pay_atos'							=>	'SIPS Atos (banque)',
'mod_pay_cheque'						=>	'Chèque, virement... (paiement non auto.)',
'mod_pay_ann'							=>	'Paiement des annonces',
'mod_pay_ann_edit'						=>	'Editer les prix par sous-catégories',
'opt_visu_info'							=>	'Options visuelles',
'opt_visu_tete'							=>	'Editer des options annonce en tête',
'opt_visu_une'							=>	'Editer des options annonce premium',
'opt_visu_urg'							=>	'Editer des options annonce urgente',
'opt_visu_enc'							=>	'Editer des options annonce encadrée',
'opt_visu_tete_v'						=>	'Editer des options vitrine en tête',
'opt_visu_une_v'						=>	'Editer des options vitrine premium',
'opt_visu_enc_v'						=>	'Editer des options vitrine encadrée',
'opt_photo_info'						=>	'Option photos',
'opt_photo'								=>	'Editer l’option photos',
'opt_video_info'						=>	'Option vidéo',
'opt_video'								=>	'Editer l’option vidéo',
'abo_comptes_info'						=>	'Packs abonnement comptes',
'abo_compte_par'						=>	'Editer des packs pour comptes particulier',
'abo_compte_pro'						=>	'Editer des packs pour comptes pro',
'abo_bout_info'							=>	'Abonnements vitrine',
'abo_bout_edit'							=>	'Editer des abonnements pour vitrine',
'code_reduc'							=>	'Code de réduction',
'link_code_reduc'						=>	'Editer des codes de réduction',
'gest_fact_info'						=>	'Gestion des factures',
'gest_fact_gest'						=>	'Gérer les factures',
'gest_cache_info'						=>	'Mise à jour',
'gest_cache_nb_ann'						=>	'Mettre à jour le nombre d’annonce',
'gest_cache_opt_ann'					=>	'Mettre à jour les options des annonces',
'gest_cache_opt_vitrine'				=>	'Mettre à jour les options des vitrines',
'gest_cache_packs'						=>	'Mettre à jour les packs des comptes',
'gest_cache_abo'						=>	'Mettre à jour les abonnements des vitrines',
'mod_newsletter'						=>	'Newsletter',
'mod_newsletter_link1'					=>	'Envoyer une newsletter aux annonceurs',
'mod_newsletter_link2'					=>	'Envoyer une newsletter aux comptes membre',
'mod_newsletter_link3'					=>	'Envoyer une newsletter aux comptes PRO',
'gest_cache_relance'					=>	'Envoyer les relances',
'pass_xml_info'							=>	'Passerelle XML',
'pass_xml_imp'							=>	'Importer des annonces',
'pass_xml_exp'							=>	'Récupérer un fichier pour l’exportation',
'pass_xml_mod'							=>	'Fichier modèle XML',
'mod_ema_auto_info'						=>	'Edition des mails automatiques',
'mod_ema_auto_con1'						=>	'Réception d’une annonce',
'mod_ema_auto_con2'						=>	'Annonce validée',
'mod_ema_auto_con3'						=>	'Annonce refusée',
'mod_ema_auto_con4'						=>	'Annonce non confirmée',
'mod_ema_auto_con5'						=>	'Annonce expirée',
'mod_ema_auto_con6'						=>	'Réception d’un compte',
'mod_ema_auto_con7'						=>	'Compte validée',
'mod_ema_auto_con8'						=>	'Compte refusé',
'mod_ema_auto_con9'						=>	'Paiement d’une annonce',
'mod_ema_auto_con10'					=>	'Paiement d’option visuelle annonce',
'mod_ema_auto_con11'					=>	'Paiement d’option visuelle vitrine',
'mod_ema_auto_con12'					=>	'Paiement d’un pack compte',
'mod_ema_auto_con13'					=>	'Paiement d’un abonnement vitrine',
'mod_ema_auto_con14'					=>	'Relance de renouvellement',
'mod_ema_auto_con15'					=>	'Relance d’option visuelle annonce',
'mod_ema_auto_con16'					=>	'Relance d’option visuelle vitrine',
'mod_ema_auto_con17'					=>	'Relance d’un pack compte',
'mod_ema_auto_con18'					=>	'Relance d’un abonnement vitrine',
'mod_ema_cont_info'						=>	'Formulaire de contact',
'mod_ema_cont_ges'						=>	'Edition des contacts',
'mod_page_info'							=>	'Pages',
'mod_page_edit'							=>	'Edition des pages',
'mod_pub_info'							=>	'Publicité',
'mod_pub_fond'							=>	'Fond publicitaire',
'mod_pub_header'						=>	'Pub header',
'mod_pub_listing'						=>	'Pub pages du listing',
'mod_pub_annonces'						=>	'Pub pages des annonces',
'maint_info'							=>	'Mise en maintenance',
'maint_edit'							=>	'Mettre le site en maintenance',
'sauv_info'								=>	'Sauvegarde',
'sauv_exp'								=>	'Effectuer une sauvegarde du site',

///////////////////////////////////
//Page d'accueil de l'administration
//////////////////////////////////

'page_acc_info'							=>	'Accueil / Aide ?',
'page_acc_welcom'						=>	'Bonjour et bienvenue dans l\'administration de votre site.<br /><br />
											<strong>INFORMATION</strong><br /><br />
											Afin de gérer au mieu votre site, nous vous conseillons de prendre connaissance des informations qui figurent sur cette page.<br /><br />
											<strong>MODULE "MISE A JOUR"</strong><br /><br />
											Le module "mise à jour", vous permet de mettre à jour le nombre total d\'annonces présente sur votre site, le nombre total d\'annonce par région
											pour la carte du pays qui figure en page d\'accueil, les options, les packs et les abonnements relatifs aux annonces, aux vitrines et aux
											comptes, et d\'envoyer les relances.<br /><br />
											Ces mises à jour non automatique du nombre d\'annonce, des options, des packs, des abonnements..., permet de réduire le nombre de connexion et de requête à votre base de données.
											Cela optimise la vitesse d\'exécution de vos pages et offre ainsi une ergonomie optimal à vos utilisateurs. Il y a cependant
											un moyen de rendre automatique ces mise à jour (voir "TACHES AUTOMATISEES").<br /><br />
											<strong>TACHES AUTOMATISÉES</strong><br /><br />
											Les tâches automatisées (ou tâches cron) son des tâches programmées, exécutées par votre serveur. Plus précisément, une tâche automatisée va exécuter 
											un fichier de votre site à un moment choisi, par exemple tous les jours à 2H00. Cela évite donc l\'intervention d\'un humain pour mettre à jour votre site internet.<br /><br />
											Généralement, nous avons besoin d\'un serveur dédié pour effectuer ces tâches. Cela dit, certains hébergeurs proposent cette option en hébergement mutualisé.<br /><br />
											<strong>Voici ci-dessous la liste des fichiers que vous programmer en tâches automatisées :</strong><br /><br />
											<strong>cron/cron_nb_ann.php :</strong> Met à jour le nombre d\'annonce du site => A éxécuter en fonction de l\'activiter de votre site 
											(toutes les 10 minutes par exemple pour un site qui reçois beaucoup d\'annonce)<br /><br />
											<strong>cron/cron_expired.php :</strong> Retire les annonces expirées => A éxecuter une fois par jour<br /><br />
											<strong>cron/cron_unvalidate.php :</strong> Supprime les annonces non confirmées depuis plus de 48 heures => A éxecuter une fois par jour<br /><br />
											<strong>cron/cron_expired_visu_ann.php :</strong> Met à jour les options visuelles des annonces => a éxecuter une fois par jour<br /><br />
											<strong>cron/cron_expired_visu_vit.php :</strong> Met à jour les options visuelles des vitrines => a éxecuter une fois par jour<br /><br />
											<strong>cron/cron_expired_pack_acc.php :</strong> Met à jour les packs des comptes => a éxecuter une fois par jour<br /><br />
											<strong>cron/cron_expired_pack_vit.php :</strong> Met à jour les abonnements des vitrines => a éxecuter une fois par jour<br /><br />
											<strong>cron/cron_relance.php :</strong> Envoi les relances => a éxecuter une fois par jour<br /><br />
											<strong>MOTEUR DE RECHERCHE "RAPIDE"</strong><br /><br />
											Pour utiliser le moteur de recherche "rapide", vous devez être en mesure de pouvoir configurer votre serveur mysql. 
											Sinon, les mots clés de moins de 4 caractères ne pourront pas être pris en compte.
											Attention, vous devrez également avoir un minimum de 3 annonces. Idem pour les vitrines.<br /><br />
											- Dans le fichier my.cnf ou my.ini, ajouter la ligne "ft_min_word_len = 1" en dessous de [mysqld].<br />
											- Redémarrez ensuite votre serveur mysql et recréez les index FULLTEXT.<br />
											- Pour terminer, déplacez le dossier "engine" dans le dossier "includes".<br /><br />',

///////////////////////////////////
//Page comptes admnistrateurs
//////////////////////////////////

'page_compte_adm_info'					=>	'Comptes administrateurs - Compte administrateur niveau',
'page_compte_adm_supp'					=>	'Supprimer ?',
'page_compte_adm_supp_lien'				=>	'Supprimer',
'page_compte_adm_mod_lien'				=>	'Modifier',
'page_compte_adm_crea_lien'				=>	'Créer un nouveau compte administrateur niveau',

///////////////////////////////////
//Page de création des comptes admnistrateurs
//////////////////////////////////

'page_crea_compte_adm_info'				=>	'Comptes administrateurs - Création compte administrateur niveau',
'page_crea_compte_adm_log'				=>	'Login',
'page_crea_compte_adm_pas1'				=>	'Mot de passe',
'page_crea_compte_adm_pas2'				=>	'Confirmer le mot de passe',
'page_crea_compte_adm_ema1'				=>	'Adresse Email',
'page_crea_compte_adm_ema2'				=>	'Confirmer l\'adresse Email',
'page_crea_compte_adm_submit'			=>	'Créer',
'page_crea_compte_adm_error1'			=>	'Vous avez oublié le login',
'page_crea_compte_adm_error2'			=>	'Votre login doit contenir entre 3 et 20 caractères',
'page_crea_compte_adm_error3'			=>	'Ce login est déjà existant',
'page_crea_compte_adm_error4'			=>	'Vous avez oublié le mot de passe',
'page_crea_compte_adm_error5'			=>	'Votre mot de passe doit contenir entre 5 et 20 caractères',
'page_crea_compte_adm_error6'			=>	'Les mots de passe ne sont pas identiques',
'page_crea_compte_adm_error7'			=>	'Vous avez oublié l\'adresse email',
'page_crea_compte_adm_error8'			=>	'L\'adresse email est invalide',
'page_crea_compte_adm_error9'			=>	'Cette adresse email est déjà utilisée',
'page_crea_compte_adm_error10'			=>	'Les deux adresses email ne sont pas identiques',

///////////////////////////////////
//Page de modification des comptes admnistrateurs
//////////////////////////////////

'page_mod_compte_adm_info'				=>	'Comptes administrateurs - Modification compte administrateur',
'page_mod_compte_adm_anc_pass'			=>	'Ancien mot de passe',
'page_mod_compte_adm_log'				=>	'Nouveau login',
'page_mod_compte_adm_pas1'				=>	'Nouveau mot de passe',
'page_mod_compte_adm_pas2'				=>	'Confirmer le mot de passe',
'page_mod_compte_adm_ema1'				=>	'Nouvelle adresse Email',
'page_mod_compte_adm_ema2'				=>	'Confirmer l\'adresse Email',
'page_mod_compte_adm_submit'			=>	'Modifier',
'page_mod_compte_adm_error1'			=>	'l\'ancien mot de passe est incorrect',
'page_mod_compte_adm_error2'			=>	'Vous devez entrer un login',
'page_mod_compte_adm_error3'			=>	'Ce login est déjà utilisé',
'page_mod_compte_adm_error4'			=>	'Votre login doit contenir entre 3 et 20 caractères',
'page_mod_compte_adm_error5'			=>	'Vous devez entrer un mot de passe',
'page_mod_compte_adm_error6'			=>	'Votre mot de passe doit contenir entre 5 et 20 caractères',
'page_mod_compte_adm_error7'			=>	'Les mots de passe ne sont pas identiques',
'page_mod_compte_adm_error8'			=>	'Vous devez entrer une adresse email',
'page_mod_compte_adm_error9'			=>	'L\'adresse email est invalide',
'page_mod_compte_adm_error10'			=>	'Cette adresse email est déjà utilisée',
'page_mod_compte_adm_error11'			=>	'Les deux adresses email ne sont pas identiques',

///////////////////////////////////
//Page de confirmation de modification d'un compte admnistrateur
//////////////////////////////////

'page_mod_compte_re_info'			=>	'Comptes administrateurs - compte modifié',
'page_mod_compte_re'				=>	'Le compte administrateur a été modifié avec succès',

///////////////////////////////////
//Page de changements des images
//////////////////////////////////

'page_mod_img_adm_info'					=>	'Template - Edition des images',
'page_mod_img_adm_info_img'				=>	'Une fois votre nouvelle image uploadée, appuyez sur les touches CTRL+R de votre clavier, 
											afin qu\'elle s\'affiche en remplacement de l\'encienne.',
'page_mod_img_adm_1'					=>	'Logo',
'page_mod_img_adm_info_1'				=>	'Image PNG 222x90',
'page_mod_img_adm_2'					=>	'Watermark',
'page_mod_img_adm_info_2'				=>	'Image PNG 100x30',
'page_mod_img_adm_3'					=>	'Barre du haut',
'page_mod_img_adm_info_3'				=>	'Image PNG 720x45',
'page_mod_img_adm_4'					=>	'Bouton déposer une annonce',
'page_mod_img_adm_info_4'				=>	'Image PNG 224x45',
'page_mod_img_adm_5'					=>	'Bouton envoyer',
'page_mod_img_adm_info_5'				=>	'Image PNG 120x21',
'page_mod_img_adm_6'					=>	'Bouton confirmer être majeur',
'page_mod_img_adm_info_6'				=>	'Image PNG 143x23',
'page_mod_img_adm_7'					=>	'Bouton modifier votre annonce',
'page_mod_img_adm_info_7'				=>	'Image PNG 143x23',
'page_mod_img_adm_8'					=>	'Bouton modifier',
'page_mod_img_adm_info_8'				=>	'Image PNG 120x21',
'page_mod_img_adm_9'					=>	'Bouton parcourir',
'page_mod_img_adm_info_9'				=>	'Image PNG 84x23',
'page_mod_img_adm_10'					=>	'Bouton lancer votre recherche',
'page_mod_img_adm_info_10'				=>	'Image PNG 175x24',
'page_mod_img_adm_11'					=>	'Bouton envoyer votre annonce',
'page_mod_img_adm_info_11'				=>	'Image PNG 143x23',
'page_mod_img_adm_12'					=>	'Bouton valider',
'page_mod_img_adm_info_12'				=>	'Image PNG 120x21',
'page_mod_img_adm_13'					=>	'Image haut de la recherche',
'page_mod_img_adm_info_13'				=>	'Image PNG 208x10',
'page_mod_img_adm_14'					=>	'Image fond de la recherche',
'page_mod_img_adm_info_14'				=>	'Image PNG 208x10',
'page_mod_img_adm_15'					=>	'Image bas de la recherche',
'page_mod_img_adm_info_15'				=>	'Image PNG 208x10',
'page_mod_img_adm_16'					=>	'Image fond info 1',
'page_mod_img_adm_info_16'				=>	'Image PNG 10x20',
'page_mod_img_adm_17'					=>	'Images fond info 2',
'page_mod_img_adm_info_17'				=>	'Image PNG 10x20',
'page_mod_img_adm_18'					=>	'Images fond info left',
'page_mod_img_adm_info_18'				=>	'Image PNG 15x20',
'page_mod_img_adm_19'					=>	'Images fond info right',
'page_mod_img_adm_info_19'				=>	'Image PNG 21x20',
'page_mod_img_adm_20'					=>	'Images fond info right 2',
'page_mod_img_adm_info_20'				=>	'Image PNG 36x20',
'page_mod_img_adm_21'					=>	'Images fond info right v',
'page_mod_img_adm_info_21'				=>	'Image PNG 21x20',
'page_mod_img_adm_22'					=>	'Images fond info right v 2',
'page_mod_img_adm_info_22'				=>	'Image PNG 36x20',
'page_mod_img_adm_23'					=>	'Fond des annonces premium',
'page_mod_img_adm_info_23'				=>	'Image PNG 183x179',
'page_mod_img_adm_24'					=>	'Fond des vitrine premium',
'page_mod_img_adm_info_24'				=>	'Image PNG 183x179',
'page_mod_img_adm_25'					=>	'Fond des annonces',
'page_mod_img_adm_info_25'				=>	'Image PNG 705x125',
'page_mod_img_adm_26'					=>	'Fond des annonces 2',
'page_mod_img_adm_info_26'				=>	'Image PNG 705x125',
'page_mod_img_adm_27'					=>	'Fond encadré des annonces',
'page_mod_img_adm_info_27'				=>	'Image PNG 705x125',
'page_mod_img_adm_28'					=>	'Fond encadré des annonces 2',
'page_mod_img_adm_info_28'				=>	'Image PNG 705x125',
'page_mod_img_adm_29'					=>	'Fond des vitrines',
'page_mod_img_adm_info_29'				=>	'Image PNG 705x125',
'page_mod_img_adm_30'					=>	'Fond des vitrines 2',
'page_mod_img_adm_info_30'				=>	'Image PNG 705x125',
'page_mod_img_adm_31'					=>	'Logo urgent',
'page_mod_img_adm_info_31'				=>	'Image PNG 69x17',
'page_mod_img_adm_32'					=>	'Sans photo premium',
'page_mod_img_adm_info_32'				=>	'Image PNG 100x70',
'page_mod_img_adm_33'					=>	'Sans photo listing',
'page_mod_img_adm_info_33'				=>	'Image PNG 150x105',
'page_mod_img_adm_34'					=>	'Sans photo page annonce',
'page_mod_img_adm_info_34'				=>	'Image PNG 600x350',
'page_mod_img_adm_35'					=>	'Sans logo page vitrine',
'page_mod_img_adm_info_35'				=>	'Image PNG 220x154',
'page_mod_img_adm_36'					=>	'Fond info pub listing',
'page_mod_img_adm_info_36'				=>	'Image PNG 208x21',
'page_mod_img_adm_37'					=>	'Fond pub texte listing',
'page_mod_img_adm_info_37'				=>	'Image PNG 208x65',
'page_mod_img_adm_38'					=>	'Fond pub texte annonce',
'page_mod_img_adm_info_38'				=>	'Image PNG 234x65',
'page_mod_img_adm_39'					=>	'Fleche haut',
'page_mod_img_adm_info_39'				=>	'Image PNG 12x11',
'page_mod_img_adm_40'					=>	'Fleche recherche',
'page_mod_img_adm_info_40'				=>	'Image PNG 17x10',
'page_mod_img_adm_41'					=>	'Fleche premium',
'page_mod_img_adm_info_41'				=>	'Image PNG 10x10',
'page_mod_img_adm_42'					=>	'Upload photo',
'page_mod_img_adm_info_42'				=>	'Image PNG 60x40',
'page_mod_img_adm_43'					=>	'Radio 1',
'page_mod_img_adm_info_43'				=>	'Image PNG 14x15',
'page_mod_img_adm_44'					=>	'Radio 2',
'page_mod_img_adm_info_44'				=>	'Image PNG 14x15',
'page_mod_img_adm_45'					=>	'Checkbox 1',
'page_mod_img_adm_info_45'				=>	'Image PNG 14x15',
'page_mod_img_adm_46'					=>	'Checkbox 2',
'page_mod_img_adm_info_46'				=>	'Image PNG 14x15',
'page_mod_img_adm_47'					=>	'Icone géolocalisation vitrine',
'page_mod_img_adm_info_47'				=>	'Image PNG 20x15',
'page_mod_img_adm_48'					=>	'Icone boutique',
'page_mod_img_adm_info_48'				=>	'Image PNG 28x20',
'page_mod_img_adm_49'					=>	'Icone encadrée',
'page_mod_img_adm_info_49'				=>	'Image PNG 28x20',
'page_mod_img_adm_50'					=>	'Icone entreprise',
'page_mod_img_adm_info_50'				=>	'Image PNG 28x20',
'page_mod_img_adm_51'					=>	'Icone contact mail',
'page_mod_img_adm_info_51'				=>	'Image PNG 28x20',
'page_mod_img_adm_52'					=>	'Icone géolocalisation',
'page_mod_img_adm_info_52'				=>	'Image PNG 28x20',
'page_mod_img_adm_53'					=>	'Icone imprimer',
'page_mod_img_adm_info_53'				=>	'Image PNG 28x20',
'page_mod_img_adm_54'					=>	'Icone modifier',
'page_mod_img_adm_info_54'				=>	'Image PNG 28x20',
'page_mod_img_adm_55'					=>	'Icone remonter',
'page_mod_img_adm_info_55'				=>	'Image PNG 28x20',
'page_mod_img_adm_56'					=>	'Icone sélection',
'page_mod_img_adm_info_56'				=>	'Image PNG 28x20',
'page_mod_img_adm_57'					=>	'Icone signalement',
'page_mod_img_adm_info_57'				=>	'Image PNG 28x20',
'page_mod_img_adm_58'					=>	'Icone n° entreprise',
'page_mod_img_adm_info_58'				=>	'Image PNG 28x20',
'page_mod_img_adm_59'					=>	'Icone supprimer',
'page_mod_img_adm_info_59'				=>	'Image PNG 28x20',
'page_mod_img_adm_60'					=>	'Icone supprimer sélection',
'page_mod_img_adm_info_60'				=>	'Image PNG 28x20',
'page_mod_img_adm_61'					=>	'Icone téléphone',
'page_mod_img_adm_info_61'				=>	'Image PNG 28x20',
'page_mod_img_adm_62'					=>	'Icone premium',
'page_mod_img_adm_info_62'				=>	'Image PNG 28x20',
'page_mod_img_adm_63'					=>	'Icone urgent',
'page_mod_img_adm_info_63'				=>	'Image PNG 28x20',
'page_mod_img_adm_64'					=>	'Image du fond haut site',
'page_mod_img_adm_info_64'				=>	'Image PNG 10x27',
'page_mod_img_adm_65'					=>	'Fond encadré des vitrines',
'page_mod_img_adm_info_65'				=>	'Image PNG 705x125',
'page_mod_img_adm_66'					=>	'Fond encadré des vitrines 2',
'page_mod_img_adm_info_66'				=>	'Image PNG 705x125',
'page_mod_img_adm_error'				=>	'L\'extention n\'est pas autorisée, uniquement PNG',

///////////////////////////////////
//Page de modification du style
//////////////////////////////////

'temp_style_info1'						=>	'Template - Edition de la structure',
'temp_style_info2'						=>	'Template - Edition du style',
'temp_style_ok'							=>	'Modification du style effectuée avec succès',

///////////////////////////////////
//Page de modification des paramètres généraux
//////////////////////////////////

'page_mod_param_gen_info'				=>	'Paramètres généraux - Modifier les paramètres généraux',
'page_mod_param_gen_name'				=>	'Nom de votre site',
'page_mod_param_gen_pays'				=>	'Pays de géolocalisation',
'page_mod_param_gen_m_auto'				=>	'Email de réponse aux mails automatiques',
'page_mod_param_gen_title'				=>	'Titre de votre site',
'page_mod_param_gen_desc'				=>	'Description de votre site',
'page_mod_param_gen_devise'				=>	'Devise de votre site',
'page_mod_param_gen_fb'					=>	'Activer Facebook connect',
'page_mod_param_gen_fb_id'				=>	'App id Facebook',
'page_mod_param_gen_fb_key'				=>	'App key Facebook',
'page_mod_param_gen_filtr_mail'			=>	'Activer le filtrage mail (contact annonceur)',
'page_mod_param_gen_act_acc'			=>	'Désactiver les comptes',
'page_mod_param_gen_act_acc_1'			=>	'Activer les comptes membre et PRO',
'page_mod_param_gen_act_acc_info_1'		=>	'(Avec inscription membre obligatoire)',
'page_mod_param_gen_act_acc_info_2'		=>	'(Avec inscription membre non obligatoire)',
'page_mod_param_gen_act_acc_2'			=>	'Activer les comptes PRO uniquement',
'page_mod_param_gen_act_bout'			=>	'Activer les boutiques PRO',
'page_mod_param_gen_act_ech'			=>	'Activer les "Echanges"',
'page_mod_param_gen_act_don'			=>	'Activer les "Dons"',
'page_mod_param_gen_act_une'			=>	'Activer l\'affichage des annonces premium',
'page_mod_param_gen_act_vit'			=>	'Activer l\'affichage des vitrines premium',
'page_mod_param_gen_nb_ann'				=>	'Nombre d\'annonce par page',
'page_mod_param_gen_nb_ann'				=>	'Nombre d\'annonce par page',
'page_mod_param_gen_nb_bout'			=>	'Nombre de boutique par page',
'page_mod_param_gen_ann_val'			=>	'Validité des annonces en nombre de jour',
'page_mod_param_gen_auto_ann'			=>	'Validation automatique des annonces',
'page_mod_param_gen_auto_acc'			=>	'Validation automatique des comptes',
'page_mod_param_gen_not'				=>	'Recevoir une notification par mail',
'page_mod_param_gen_not_info'			=>	'(lorsque de nouvelles annonces ou comptes doivent être validés)',
'page_mod_param_gen_not_email'			=>	'Email pour la notification',
'page_mod_param_gen_flux_1'				=>	'Activer le flux RSS du site',
'page_mod_param_gen_flux_nb_1'			=>	'Nombre d\'annonce sur le flux RSS',
'page_mod_param_gen_flux_2'				=>	'Activer le flux RSS des boutiques',
'page_mod_param_gen_flux_nb_2'			=>	'Nombre d\'annonce par flux RSS',
'page_mod_param_gen_auto_fact'			=>	'Activer la facturation automatique (PDF)',
'page_mod_param_gen_flux_nom_ent'		=>	'Nom d\'entreprise',
'page_mod_param_gen_flux_add_ent'		=>	'Adresse',
'page_mod_param_gen_flux_cod_ent'		=>	'Code postal',
'page_mod_param_gen_flux_vil_ent'		=>	'Ville',
'page_mod_param_gen_flux_sir_ent'		=>	'N° d\'entreprise',
'page_mod_param_gen_flux_tva_ent'		=>	'TVA (Facultatif)',
'page_mod_param_gen_flux_tva_taux'		=>	'Taux TVA en % (Facultatif)',
'page_mod_param_gen_error1'				=>	'Vous avez oublié le nom de votre site',
'page_mod_param_gen_error2'				=>	'Vous avez oublié le pays de géolocalisation',
'page_mod_param_gen_error3'				=>	'Entrer un email de réponse aux mails automatiques',
'page_mod_param_gen_error4'				=>	'L\'adresse email de réponse n\'est pas valide',
'page_mod_param_gen_error5'				=>	'Vous devez entrer le titre de votre site',
'page_mod_param_gen_error6'				=>	'Vous devez entrer une devise',
'page_mod_param_gen_error7'				=>	'Le nombre d\'annonce par page n\'est pas valide',
'page_mod_param_gen_error8'				=>	'Le nombre de boutique par page n\'est pas valide',
'page_mod_param_gen_error9'				=>	'Le nombre de jour de validité des annonces n\'est pas valide',
'page_mod_param_gen_error10'			=>	'L\'email pour la notification n\'est pas valide',
'page_mod_param_gen_error11'			=>	'Le nombre d\'annonce pour le flux n\'est pas valide',
'page_mod_param_gen_error12'			=>	'Le nombre d\'annonce pour les flux n\'est pas valide',
'page_mod_param_gen_error13'			=>	'Le nom d\'entreprise ne peut pas être vide',
'page_mod_param_gen_error14'			=>	'L\'adresse de l\'entreprise ne peut pas être vide',
'page_mod_param_gen_error15'			=>	'Le code postal de l\'entreprise ne peut pas être vide',
'page_mod_param_gen_error16'			=>	'La ville de l\'entreprise ne peut pas être vide',
'page_mod_param_gen_error17'			=>	'Le n° d\'entreprise ne peut pas être vide',

///////////////////////////////////
//Page (reussi) de modification des paramètre généraux
//////////////////////////////////

'page_mod_param_gen_re_info'			=>	'Paramètres généraux - Paramètres généraux modifiés',
'page_mod_param_gen_re'					=>	'Le paramètres généraux ont été modifiés avec succès',

///////////////////////////////////
//Page du listing des régions
//////////////////////////////////

'page_list_reg_info'					=>	'Régions et département - Edition des régions et des départements',
'page_list_reg_ajouter_reg'				=>	'Ajouter une région',
'page_list_reg_ajouter_dep'				=>	'Ajouter un Département',
'page_list_reg_sup'						=>	'Supprimer',
'page_list_reg_sup_r'					=>	'Supprimer ?',
'page_list_reg_mod'						=>	'Modifier',
'page_list_reg_mont'					=>	'Monter',
'page_list_reg_dec'						=>	'Descendre',

///////////////////////////////////
//Page de création d'une région
//////////////////////////////////

'page_crea_reg_info'					=>	'Régions et département - Créer une région',
'page_crea_reg_nom'						=>	'Nom de la région',

///////////////////////////////////
//Page de modification d'une région
//////////////////////////////////

'page_mod_reg_info'						=>	'Régions et département - Modifier la région',
'page_mod_reg_nom'						=>	'Nouveau nom de la région',

///////////////////////////////////
//Page de création d'un département
//////////////////////////////////

'page_crea_dep_info'					=>	'Régions et département - Créer un département',
'page_crea_dep_nom'						=>	'Nom du département',

///////////////////////////////////
//Page de modification d'un département
//////////////////////////////////

'page_mod_dep_info'						=>	'Régions et département - Modifier le département',
'page_mod_dep_nom'						=>	'Nouveau nom du département',

///////////////////////////////////
//Page du listing des catégories
//////////////////////////////////

'page_list_cat_info'					=>	'Catégorie et sous-catégories - Editions des catégories et des sous-catégories',
'page_list_cat_ajouter_cat'				=>	'Ajouter une catégorie',
'page_list_cat_ajouter_sou_cat'			=>	'Ajouter une sous catégorie',
'page_list_cat_sup'						=>	'Supprimer',
'page_list_cat_sup_r'					=>	'Supprimer ?',
'page_list_cat_mod'						=>	'Modifier',
'page_list_cat_mont'					=>	'Monter',
'page_list_cat_dec'						=>	'Descendre',

///////////////////////////////////
//Page de création d'une catégorie
//////////////////////////////////

'page_crea_cat_info'					=>	'Catégorie et sous-catégories - Créer une catégorie',
'page_crea_cat_nom'						=>	'Nom de la catégorie',

///////////////////////////////////
//Page de modification d'une catégorie
//////////////////////////////////

'page_mod_cat_info'						=>	'Catégorie et sous-catégories - Modifier la catégorie',
'page_mod_cat_nom'						=>	'Nouveau nom de la catégorie',

///////////////////////////////////
//Page de création d'une  sous catégorie
//////////////////////////////////

'page_crea_sous_cat_info'				=>	'Catégorie et sous-catégories - Créer une sous catégorie',
'page_crea_sous_cat_nom'				=>	'Nom de la catégorie',

///////////////////////////////////
//Page de modification d'une sous catégorie
//////////////////////////////////

'page_mod_sous_cat_info'				=>	'Catégorie et sous-catégories - Modifier la sous catégorie',
'page_mod_sous_cat_nom'					=>	'Nouveau nom de la catégorie',

///////////////////////////////////
//Selects des catégories
//////////////////////////////////

'select_cat'							=>	'Choisissez la sous-catégorie',

///////////////////////////////////
//Page d'ajout d'une note 
//////////////////////////////////

'page_note_cat_info'					=>	'Option de sous-catégorie - Ajouter une note au formulaire de dépôt',
'page_not_cat'							=>	'Choisissez la sous-catégorie',
'page_not_txt'							=>	'Note',
'page_not_erreur'						=>	'Ce n\'est pas une sous-catégorie',

///////////////////////////////////
//Page (reussi) d'ajout d'une note
//////////////////////////////////

'page_note_cat_re_info'					=>	'Option de sous-catégorie - Note ajoutée ou modifiée',
'page_note_cat_re'						=>	'La note a été ajoutée ou modifiée avec succès',

///////////////////////////////////
//Page disclaimer
//////////////////////////////////

'page_disc_info'						=>	'Option de sous-catégorie - Appliquer un disclaimer',
'page_disc_cat'							=>	'Choisissez la sous-catégorie',
'page_disc_txt'							=>	'Appliquer ou retirer le disclaimer',
'page_disc_erreur'						=>	'Ce n\'est pas une sous-catégorie',

///////////////////////////////////
//Page (reussi) d'pplication d'un disclaimer
//////////////////////////////////

'page_disc_cat_re_info'					=>	'Option de sous-catégorie - Disclaimer appliqué ou retiré',
'page_disc_cat_re'						=>	'Le disclaimer a été appliqué ou retiré avec succès',

///////////////////////////////////
//Page d'options numériques
//////////////////////////////////

'page_opts_num_info'					=>	'Option de sous-catégorie - Options de valeurs numériques',
'page_opts_num_link'					=>	'Ajouter une option de valeur numérique',
'page_opts_num_unite'					=>	'Unité',
'page_opts_num_sup'						=>	'Supprimer',
'page_opts_num_mod'						=>	'Modifier',
'page_opts_num_mod_conf'				=>	'Supprimer ?',
'page_opts_num_list'					=>	'Liste des valeurs',

///////////////////////////////////
//Page de création d'options numérique
//////////////////////////////////

'page_opts_crea_num_info'				=>	'Options de sous-catégorie - Créer une option de valeurs numériques',
'page_opts_crea_num_nom'				=>	'Nom de l\'option (Ex: Surface)',
'page_opts_crea_num_uni'				=>	'Unité de l\'option (Ex: m²)',
'page_opts_crea_num_opt'				=>	'(Facultatif)',
'page_opts_crea_num_error'				=>	'Vous devez entrer un nom',

///////////////////////////////////
//Page d'options  "de données"
//////////////////////////////////

'page_opts_don_info'					=>	'Options de sous-catégorie - Options de données',
'page_opts_don_link'					=>	'Ajouter une option de données',
'page_opts_don_list'					=>	'Liste des données',

///////////////////////////////////
//Page de création d'options de "données"
//////////////////////////////////

'page_opts_crea_don_info'				=>	'Options de sous-catégorie - Créer une option de données',
'page_opts_crea_don_nom'				=>	'Nom de l\'option (Ex: Carburant)',

///////////////////////////////////
//Page de modification d'une options
//////////////////////////////////

'page_opts_mod_info'					=>	'Options de sous-catégorie - Modifier l\'option',

///////////////////////////////////
//Page de création de valeur d'option
//////////////////////////////////

'page_opts_crea_val_info1'				=>	'Options de sous-catégorie - Ajouter des valeurs numériques',
'page_opts_crea_val_info2'				=>	'Options de sous-catégorie - Ajouter des données',
'page_opts_crea_val_nom1'				=>	'Nouvelle valeur',
'page_opts_crea_val_nom2'				=>	'Nouvelle donnée',
'page_opts_crea_val_error1'				=>	'Vous devez entrer une valeur',
'page_opts_crea_val_error2'				=>	'Vous devez entrer une donnée',
'page_opts_crea_val_sup'				=>	'Supprimer',
'page_opts_crea_val_mod'				=>	'Modifier',
'page_opts_crea_val_conf'				=>	'Supprimer ?',

///////////////////////////////////
//Page de modification d'une valeur d'option
//////////////////////////////////

'page_opts_val_info'					=>	'Options de sous-catégorie - Modifier la valeur',
'page_opts_val_nom'						=>	'Nom de la valeur',

///////////////////////////////////
//Page du formulaire des options de recherche
//////////////////////////////////

'page_opts_info'						=>	'Options de sous-catégorie - Appliquer des options aux sous-catégories',
'page_opts_cat'							=>	'Choix de la sous-catégorie',
'page_opts_info1'						=>	'<strong>Option de</strong> valeurs numérique',
'page_opts_info2'						=>	'<strong>Option de</strong> données',
'page_opts_pri'							=>	'Option Prix',
'page_opts_all'							=>	'Option',
'page_opts_error'						=>	'Ce n\'est pas une sous-catégories',

///////////////////////////////////
//Page options de recherche reussi
//////////////////////////////////

'page_opts_re_info'						=>	'Options de sous-catégorie - Options modifiées',
'page_opts_re'							=>	'Les options ont été modifiées avec succès',

///////////////////////////////////
//Page d'activation/désactivation des champs
//////////////////////////////////

'page_champs_act_info'					=>	'Champs du formulaire - Activer/désactiver des champs',
'page_champs_act_sir'					=>	'Activer siret',
'page_champs_act_cod'					=>	'Activer code postal',
'page_champs_act_vil'					=>	'Activer ville',
'page_champs_act_tel'					=>	'Activer téléphone',
'page_champs_act_pri'					=>	'Aciver prix',

///////////////////////////////////
// Page de confirmation d'activation/désactivation des champs du formulaire
//////////////////////////////////

'page_champs_act_re_info'				=>	'Champs du formulaire - Activation modifiées',
'page_champs_act_re'					=>	'L\'activation des champs a été modifiée avec succès',

///////////////////////////////////
//Page des champs du fomulaire
//////////////////////////////////

'page_champs_info'						=>	'Champs du formulaire - Editer des champs',
'page_champs_crea'						=>	'Créer un champ',
'page_champs_num'						=>	'Numérique',
'page_champs_fac'						=>	'Facultatif',
'page_champs_obl'						=>	'Obligatoire',
'page_champs_mod'						=>	'Modifier',
'page_champs_sup'						=>	'Supprimer',

///////////////////////////////////
//Page de création d'un champs du fomulaire
//////////////////////////////////

'page_champs_crea_info'					=>	'Champs du formulaire - Créer un champ',
'page_champs_crea_nom'					=>	'Nom du champ',
'page_champs_crea_num'					=>	'Champ numérique',
'page_champs_crea_type'					=>	'Champ obligatoire',
'page_champs_crea_error'				=>	'Vous devez entrer un nom',

///////////////////////////////////
//Page de modification d'un champs du fomulaire
//////////////////////////////////

'page_champs_mod_info'					=>	'Champs du formulaire - Modifier le champ',
'page_champs_mod_nom'					=>	'Nom du champ',
'page_champs_mod_num'					=>	'Champ numérique',
'page_champs_mod_type'					=>	'Champ obligatoire',
'page_champs_mod_error'					=>	'Vous devez entrer un nom',

///////////////////////////////////
//select de recherche
//////////////////////////////////

'search_cat'							=>	'Toutes catégories',
'search_reg'							=>	'Toutes régions',
'search_dep'							=>	'Tous départements',

///////////////////////////////////
//Pages de la gestion des annonces
//////////////////////////////////

'page_ann_val_info1'					=>	'Gestion des annonces - Annonces en attente de validation',
'page_ann_val_info2'					=>	'Gestion des annonces - Annonces validées',
'page_ann_val_info3'					=>	'Gestion des annonces - Annonces refusées',
'page_ann_val_info4'					=>	'Gestion des annonces - Annonces non confirmées',
'page_ann_val_info5'					=>	'Gestion des annonces - Annonces du compte n°',
'page_ann_val_info6'					=>	'Gestion des annonces - Annonces supprimées ou expirées',
'page_ann_val_input'					=>	'Id de l\'annonce',
'page_ann_val_input2'					=>	'Email de l\'annonce',
'page_ann_val_cat'						=>	'Sous-catégorie',
'page_ann_val_reg'						=>	'Région',
'page_ann_val_cod'						=>	'Code postal',
'page_ann_val_id'						=>	'Identifiant de l\'annonce',
'page_ann_val_vil'						=>	'Ville',
'page_ann_val_ema'						=>	'Email',
'page_ann_val_tel'						=>	'Tel',
'page_ann_val_pri'						=>	'Prix',
'page_ann_val_soc'						=>	'Société',
'page_ann_val_sir'						=>	'Siret',
'page_ann_val_ip'						=>	'Adresse ip',
'page_ann_val_geo_ip'					=>	'Géolocaliser l\'ip',
'page_ann_val_doubl'					=>	'Cette annonce contient un ou plusieurs doublons',
'page_ann_val_doubl_n'					=>	'Annonce n°',
'page_ann_val_val'						=>	'Valider',
'page_ann_val_mod'						=>	'Modifier',
'page_ann_val_modif'					=>	'Modification possible',
'page_ann_val_ref_msg'					=>	'Motif du refus',
'page_ann_val_modif_msg'				=>	'Vous pouvez modifier votre annonce à l\'url suivante :',
'page_ann_val_ref'						=>	'Refuser',
'page_ann_val_sup'						=>	'Supprimer',
'page_ann_val_sup_ban'					=>	'Refuser + annir l\'email',
'page_ann_val_ban'						=>	'Bannir l\'email',
'page_ann_val_no_result'				=>	'Pas de résultat',
'page_ann_val_page_prec'				=>	'Page précédente',
'page_ann_val_page_suiv'				=>	'Page suivante',
'page_ann_val_page_dern'				=>	'Dernière page',

///////////////////////////////////
//Page de confirmation de l'annonce supprimée
//////////////////////////////////

'page_mod_ann_sup_re_info'				=>	'Gestion des annonces - Annonce supprimée',
'page_mod_ann_sup_re'					=>	'L\'annonce a été supprimée avec succès',

///////////////////////////////////
//Page de confirmation des annonces expirée retirée du site
//////////////////////////////////

'page_mod_exp_ret_re_info'				=>	'Gestion des annonces - Annonce expirées retirées',
'page_mod_exp_ret_re'					=>	'Les annonces expirées ont été retirées du site avec succès',

///////////////////////////////////
//Page de confirmation des annonces expirée supprimée
//////////////////////////////////

'page_mod_exp_sup_re_info'				=>	'Gestion des annonces - Annonce retirées ou expirées supprimées',
'page_mod_exp_sup_re'					=>	'Les annonces retirées ou expirées ont été supprimées avec succès',

///////////////////////////////////
//Page de confirmation des annonces refusée supprimée
//////////////////////////////////

'page_mod_ref_sup_re_info'				=>	'Gestion des annonces - Annonce refusées supprimées',
'page_mod_ref_sup_re'					=>	'Les annonces refusées ont été supprimées avec succès',

///////////////////////////////////
//Page de confirmation des annonces non confirmées supprimée
//////////////////////////////////

'page_mod_unv_sup_re_info'				=>	'Gestion des annonces - Annonce non confirmées supprimées',
'page_mod_unv_sup_re'					=>	'Les annonces non confirmées ont été supprimées avec succès',

///////////////////////////////////
//Page de modification d'une annonce
//////////////////////////////////

'page_mod_ann_info'						=>	'Gestion des annonces - Modifier l\'annonce',
'page_mod_supp_video'					=>	'Supprimer la vidéo',
'page_mod_ann_tit'						=>	'Titre de l\'annonce',
'page_mod_ann_ann'						=>	'Texte de l\'annonce',
'page_mod_ann_reg'						=>	'Région',
'page_mod_ann_dep'						=>	'Département',
'page_mod_ann_cat'						=>	'Sous-catégorie',
'page_mod_ann_email'					=>	'Email',
'page_mod_ann_ent'						=>	'Non d\'entreprise',
'page_mod_ann_sir'						=>	'N° d\'entreprise',
'page_mod_ann_nom'						=>	'Nom',
'page_mod_ann_code_pos'					=>	'Code postal',
'page_mod_ann_vil'						=>	'Ville',
'page_mod_ann_tel'						=>	'Tel',
'page_mod_ann_tel_cache'				=>	'Numéro caché',
'page_mod_ann_prix'						=>	'Prix',
'page_mod_ann_form_typ'					=>  'Type d\'annonce',
'page_mod_ann_form_typ1'				=>  'Offre',
'page_mod_ann_form_typ2'				=>  'Recherche',
'page_mod_ann_form_typ3'				=>  'Echange',
'page_mod_ann_form_typ4'				=>  'Don',
'page_mod_ann_form_opt_mont'			=>	'Remonter l\'annonce',
'page_mod_ann_form_opt_mont_j'			=>	'Nombre jour remonter',
'page_mod_ann_form_opt_une'				=>	'Annonce premium',
'page_mod_ann_form_opt_une_j'			=>	'Nombre jour premium',
'page_mod_ann_form_opt_urg'				=>	'Logo urgent',
'page_mod_ann_form_opt_urg_j'			=>	'Nombre jour urgent',
'page_mod_ann_form_opt_enc'				=>	'Annonce encadrée',
'page_mod_ann_form_opt_enc_j'			=>	'Nombre jour encadrée',
'page_mod_ann_form_opt_date'			=>	'A compter du',
'page_mod_ann_submit'					=>	'Modifier',
'page_mod_ann_sup'						=>	'Supprimer cette annonce',
'page_mod_ann_error1'					=>	'Le titre ne peut pas être vide',
'page_mod_ann_error2'					=>	'Le texte de l\'annonce ne peut pas être vide',
'page_mod_ann_error3'					=>	'Voud devez sélectionner une région',
'page_mod_ann_error4'					=>	'Voud devez sélectionner un département',
'page_mod_ann_error5'					=>	'Voud devez sélectionner une sous-catégories',
'page_mod_ann_error6'					=>	'l\'adresse email est invalide',
'page_mod_ann_error7'					=>	'Vous devez mettre un nom d\'entreprise',
'page_mod_ann_error8'					=>	'Voud devez mettre un numéro d\'entreprise',
'page_mod_ann_error9'					=>	'Le nom ne peut être vide',
'page_mod_ann_error10'					=>	'le code postal ne peut être vide',
'page_mod_ann_error11'					=>	'La ville ne peut être vide',
'page_mod_ann_error12'					=>	'Vous devez mettre un numéro de téléphone',
'page_mod_ann_error13'					=>	'Vous devez mettre un nombre de jour remonter',
'page_mod_ann_error14'					=>	'Vous devez mettre un nombre de jour premium',
'page_mod_ann_error15'					=>	'Vous devez mettre un nombre de jour urgent',
'page_mod_ann_error16'					=>	'Vous devez mettre un nombre de jour encadrée',
'page_mod_ann_error17'					=>	'Un format date est invalide',

///////////////////////////////////
//Page de confirmation de l'annonce modifiée
//////////////////////////////////

'page_mod_ann_re_info'					=>	'Gestion des annonces - Annonce modifiée',
'page_mod_ann_re'						=>	'L\'annonce a été modifiée avec succés.',

///////////////////////////////////
//Pages de la gestion des comptes
//////////////////////////////////

'page_acc_val_info1'					=>	'Gestion des comptes - Comptes membre en attente de validation',
'page_acc_val_info2'					=>	'Gestion des comptes - Comptes membre validés',
'page_acc_val_info3'					=>	'Gestion des comptes - Comptes membre refusés',
'page_acc_val_info4'					=>	'Gestion des comptes - Comptes pro en attente de validation',
'page_acc_val_info5'					=>	'Gestion des comptes - Comptes pro validés',
'page_acc_val_info6'					=>	'Gestion des comptes - Comptes pro refusés',
'page_acc_val_info7'					=>	'Gestion des comptes - Comptes membre non confirmés',
'page_acc_val_info8'					=>	'Gestion des comptes - Comptes pro non confirmés',
'page_acc_val_input'					=>	'Id du compte',
'page_acc_val_mail'						=>	'Email du compte',
'page_acc_val_id'						=>	'Identifiant du compte',
'page_acc_val_cat'						=>	'Sous-catégorie',
'page_acc_val_civ'						=>	'Civilité',
'page_acc_val_nom'						=>	'Nom',
'page_acc_val_pre'						=>	'Prénom',
'page_acc_val_reg'						=>	'Région',
'page_acc_val_cod'						=>	'Code postal',
'page_acc_val_vil'						=>	'Ville',
'page_acc_val_ema'						=>	'Email',
'page_acc_val_tel'						=>	'Tel',
'page_acc_val_soc'						=>	'Société',
'page_acc_val_sir'						=>	'Siret',
'page_acc_val_ip'						=>	'Adresse ip',
'page_acc_val_geo_ip'					=>	'Géolocaliser l\'ip',
'page_acc_val_val'						=>	'Valider',
'page_acc_val_mod'						=>	'Modifier',
'page_acc_val_ref'						=>	'Refuser',
'page_acc_val_sup'						=>	'Supprimer',
'page_acc_val_sup_ban'					=>	'Refuser + bannir l\'email',
'page_acc_val_ban'						=>	'Bannir l\'email',
'page_acc_ann'							=>	'Annonces du compte',
'page_acc_val_no_result'				=>	'Pas de résultat',
'page_acc_val_page_prec'				=>	'Page précédente',
'page_acc_val_page_suiv'				=>	'Page suivante',
'page_acc_val_page_dern'				=>	'Dernière page',

///////////////////////////////////
//Page de confirmation du compte supprimé
//////////////////////////////////

'page_mod_acc_sup_re_info'				=>	'Gestion des comptes - Compte supprimée',
'page_mod_acc_sup_re'					=>	'Le compte a été supprimé avec succès',

///////////////////////////////////
//Page de modification d'un compte
//////////////////////////////////

'page_mod_acc_info'						=>	'Gestion des compte - Modifier le compte',
'page_mod_acc_reg'						=>	'Région',
'page_mod_acc_dep'						=>	'Département',
'page_mod_acc_cat'						=>	'Sous-catégorie',
'page_mod_acc_ent'						=>	'Non d\'entreprise',
'page_mod_acc_sir'						=>	'N° d\'entreprise',
'page_mod_acc_civ'						=>	'Civilite',
'page_mod_acc_civ1'						=>	'M',
'page_mod_acc_civ2'						=>	'Mme',
'page_mod_acc_civ3'						=>	'Melle',
'page_mod_acc_nom'						=>	'Nom',
'page_mod_acc_prenom'					=>	'Prenom',
'page_mod_acc_add'						=>	'Adresse',
'page_mod_acc_code_pos'					=>	'Code postal',
'page_mod_acc_vil'						=>	'Ville',
'page_mod_acc_tel'						=>	'Tel',
'page_mod_acc_email'					=>	'Email',
'page_mod_acc_error1'					=>	'Voud devez sélectionner une région',
'page_mod_acc_error2'					=>	'Voud devez sélectionner un département',
'page_mod_acc_error3'					=>	'Voud devez sélectionner une sous-catégories',
'page_mod_acc_error4'					=>	'Vous devez mettre un nom d\'entreprise',
'page_mod_acc_error5'					=>	'Voud devez mettre un numéro d\'entreprise',
'page_mod_acc_error6'					=>	'Le nom ne peut être vide',
'page_mod_acc_error7'					=>	'le code postal ne peut être vide',
'page_mod_acc_error8'					=>	'La ville ne peut être vide',
'page_mod_acc_error9'					=>	'Vous devez mettre un numéro de téléphone',
'page_mod_acc_error10'					=>	'l\'adresse email est invalide',

///////////////////////////////////
//Page de confirmation du compte modifié
//////////////////////////////////

'page_mod_acc_re_info'					=>	'Gestion des compte - Compte modifié',
'page_mod_acc_re'						=>	'Le compte a été modifié avec succés.',

///////////////////////////////////
//Pages de la gestion des vitines
//////////////////////////////////

'page_vit_val_info'						=>	'Gestion des vitrines - Vitrines en ligne',
'page_vit_val_input'					=>	'Id du compte',
'page_vit_val_acc'						=>	'Cette vitrine est rattachée au compte n°',
'page_vit_val_hor'						=>	'Horaires',
'page_vit_val_web'						=>	'Site web',
'page_vit_val_mod'						=>	'Modifier',
'page_vit_val_no_result'				=>	'Pas de résultat',
'page_vit_val_page_prec'				=>	'Page précédente',
'page_vit_val_page_suiv'				=>	'Page suivante',
'page_vit_val_page_dern'				=>	'Dernière page',

///////////////////////////////////
//Page de modification d'une vitrine
//////////////////////////////////

'page_mod_vit_info'						=>	'Gestion des vitrine - Modifier la vitrine',
'page_mod_vit_tit'						=>	'Titre',
'page_mod_vit_desc'						=>	'Description',
'page_mod_vit_hor'						=>	'Horaires',
'page_mod_vit_web'						=>	'Site_web',
'page_mod_vit_form_opt_mont'			=>	'Remonter la vitrine',
'page_mod_vit_form_opt_une'				=>	'Vitrine premium',
'page_mod_vit_form_opt_enc'				=>	'Vitrine encadrée',
'page_mod_vit_error1'					=>	'Le titre ne peut être vide',
'page_mod_vit_error2'					=>	'La description ne peut être vide',
'page_mod_vit_error3'					=>	'Les horaires ne peuvent être vide',
'page_mod_vit_error4'					=>	'Vous devez mettre un nombre de jour remonter',
'page_mod_vit_error5'					=>	'Vous devez mettre un nombre de jour premium',
'page_mod_vit_error6'					=>	'Vous devez mettre un nombre de jour encadrée',

///////////////////////////////////
//Page de confirmation de la vitrine modifiée
//////////////////////////////////

'page_mod_vit_re_info'					=>	'Gestion des vitrines - Vitrine modifiée',
'page_mod_vit_re'						=>	'La vitrine a été modifiée avec succés.',

///////////////////////////////////
//Page de gestion des ip bannies
//////////////////////////////////

'page_ban_info'							=>	'Gestion de la blacklist - Retirer une adresse email bannie',
'page_ban_email'						=>	'Adresse email',
'page_ban_error1'						=>	'l\'adresse email n\'est pas valide',
'page_ban_error2'						=>	'Cette adresse email n\'est pas bannies',

///////////////////////////////////
//Page de confirmation de l'email bannie retirée
//////////////////////////////////

'page_ban_re_info'						=>	'Gestion de la blacklist - Adresse email retirée',
'page_ban_re'							=>	'L\'adresse email a été retirée avec succès.',


///////////////////////////////////
//Page des paramètres Paypal
//////////////////////////////////

'page_param_paypal_info'				=>	'Modules de paiement - Paypal',
'page_param_paypal_act'					=>	'Activer le module Paypal',
'page_param_paypal_ema'					=>	'Email de votre compte Paypal',
'page_param_paypal_error1'				=>	'L\'adresse email est invalide',

///////////////////////////////////
//Page de confirmation des paramètres Paypal
//////////////////////////////////

'page_paypal_re_info'					=>	'Modules de paiement - Paramètres Paypal',
'page_paypal_re'						=>	'Les paramètres Paypal ont été mis à jour avec succès.',


///////////////////////////////////
//Page des paramètres Allopass
//////////////////////////////////

'page_param_allopass_info'				=>	'Modules de paiement - Paramètres Allopass',
'page_param_allopass_act'				=>	'Activer le module Allopass',
'page_param_allopass_cod'				=>	'Code de sécurité',
'page_param_allopass_note'				=>	'Le code de sécurité est à choisir par vous même. C\'est le nom du dossier de l\'API de paiement Allopass que vous devez
											retranscrire dans l\'url d\'accès au produit.<br /><br />
											Ajouter des scripts en fonction du prix à régler par le client.<br />
											<strong>Url d\'accès au produit :</strong><br /> '. URL .'/includes/payment/code de securité/api.php<br />
											<strong>Url d\'achat :</strong><br /> '. URL .'/payment.php',
'page_param_allopass_script1'			=>	'Entre 1 et 3',
'page_param_allopass_script2'			=>	'Entre 4 et 6',
'page_param_allopass_script3'			=>	'Entre 7 et 10',
'page_param_allopass_script4'			=>	'Entre 11 et 14',
'page_param_allopass_script5'			=>	'Entre 15 et 18',
'page_param_allopass_script6'			=>	'Entre 19 et 22',
'page_param_allopass_script7'			=>	'+ de 22',

///////////////////////////////////
//Page de confirmation des paramètres Allopass
//////////////////////////////////

'page_allopass_re_info'					=>	'Modules de paiement - Paramètres Allopass',
'page_allopass_re'						=>	'Les paramètres Allopass ont été mis à jour avec succès.',

///////////////////////////////////
//Page des paramètres Atos
//////////////////////////////////

'page_param_atos_info'					=>	'Modules de paiement - Paramètres Atos',
'page_param_atos_act'					=>	'Activer le module SIPS Atos',
'page_param_atos_marchand'				=>	'Id marchand',
'page_param_atos_pays'					=>	'Pays',
'page_param_atos_devise'				=>	'Devise',
'page_param_atos_fi1'					=>	'Certificat',
'page_param_atos_fi2'					=>	'Paramètre fournisseur',
'page_param_atos_fi3'					=>	'Paramètre marchand',
'page_param_atos_submit'				=>	'Valider',
'page_param_atos_p1'					=>	'France',
'page_param_atos_p2'					=>	'Belgique',
'page_param_atos_p3'					=>	'Royaume-Uni',
'page_param_atos_p4'					=>	'Italie',
'page_param_atos_p5'					=>	'Espagne',
'page_param_atos_p6'					=>	'Allemagne',
'page_param_atos_d1'					=>	'Euro',
'page_param_atos_d2'					=>	'Dollar Américain',
'page_param_atos_d3'					=>	'Franc Suisse',
'page_param_atos_d4'					=>	'Livre Sterling',
'page_param_atos_d5'					=>	'Dollar Canadien',
'page_param_atos_d6'					=>	'Yen',
'page_param_atos_d7'					=>	'Peso Mexicain',
'page_param_atos_d8'					=>	'Nouvelle Livre Turque',
'page_param_atos_d9'					=>	'Dollar Australien',
'page_param_atos_d10'					=>	'Dollar Néo-Zélandais',
'page_param_atos_d11'					=>	'Couronne Norvégienne',
'page_param_atos_d12'					=>	'Real Brésilien',
'page_param_atos_d13'					=>	'Peso Argentin',
'page_param_atos_d14'					=>	'Riel',
'page_param_atos_d15'					=>	'Dollar de Taiwan',
'page_param_atos_d16'					=>	'Couronne Suédoise',
'page_param_atos_d17'					=>	'Couronne Danoise',
'page_param_atos_d18'					=>	'Won',
'page_param_atos_d19'					=>	'Dollar de Singapour',
'page_param_atos_d20'					=>	'Franc Polynésien',
'page_param_atos_d21'					=>	'Franc CFA',
'page_param_atos_error1'				=>	'Veuillez entrer un id marchand',
'page_param_atos_error2'				=>	'Erreur de téléchargement des fichiers',

///////////////////////////////////
//Page de confirmation des paramètres Allopass
//////////////////////////////////

'page_atos_re_info'						=>	'Modules de paiement - Paramètres Atos',
'page_atos_re'							=>	'Les paramètres Atos ont été mis à jour avec succès.',

///////////////////////////////////
//Page de paiement des annonces
//////////////////////////////////

'page_pay_ann_info'						=>	'Paiement des annonces - Editer les prix par sous-catégories',
'page_pay_ann_note'						=>	'0 = Gratuit',
'page_pay_ann_prix_par'					=>	'Prix particulier',
'page_pay_ann_prix_pro'					=>	'Prix professionnel',
'page_pay_ann_prix_par_m'				=>	'Prix modification particulier',
'page_pay_ann_prix_pro_m'				=>	'Prix modification professionnel',
'page_pay_ann_prix_par_r'				=>	'Prix renouvellement particulier',
'page_pay_ann_prix_pro_r'				=>	'Prix renouvellement professionnel',
'page_pay_ann_prix_tout'				=>	'Appliquer à toutes les sous-catégories',

///////////////////////////////////
//Page de confirmation du paiement des annonces
//////////////////////////////////

'page_pay_ann_re_info'					=>	'Paiement des annonces - Prix édités',
'page_pay_ann_re'						=>	'Les prix du paiement des annonces ont été édités avec succès.',

///////////////////////////////////
//Page des options visuelles
//////////////////////////////////

'page_opt_visu_info1'					=>	'Options visuelles - Editer des options annonce en tête',
'page_opt_visu_info2'					=>	'Options visuelles - Editer des options annonce premium',
'page_opt_visu_info3'					=>	'Options visuelles - Editer des options annonce urgente',
'page_opt_visu_info4'					=>	'Options visuelles - Editer des options annonce encadrée',
'page_opt_visu_info5'					=>	'Options visuelles - Editer des options vitrine en tête',
'page_opt_visu_info6'					=>	'Options visuelles - Editer des options vitrine premium',
'page_opt_visu_info7'					=>	'Options visuelles - Editer des options vitrine encadrée',
'page_opt_visu_crea1'					=>	'Créer une option annonce en tête',
'page_opt_visu_crea1_note'				=>	'Remonter en tête tous les jours pendant "Nombre de jour"',
'page_opt_visu_crea2'					=>	'Créer une option annonce premium',
'page_opt_visu_crea3'					=>	'Créer une option annonce urgente',
'page_opt_visu_crea4'					=>	'Créer une option annonce encadrée',
'page_opt_visu_crea5'					=>	'Créer une option vitrine en tête',
'page_opt_visu_crea6'					=>	'Créer une option vitrine premium',
'page_opt_visu_crea7'					=>	'Créer une option vitrine encadrée',
'page_opt_visu_mod'						=>	'Modifier',
'page_opt_visu_sup'						=>	'supprimer',

///////////////////////////////////
//Page de création d'options visuelles
//////////////////////////////////

'page_opt_visu_crea_info1'				=>	'Options visuelles - Créer une option annonce en tête',
'page_opt_visu_crea_info2'				=>	'Options visuelles - Créer une option annonce premium',
'page_opt_visu_crea_info3'				=>	'Options visuelles - Créer une option annonce urgente',
'page_opt_visu_crea_info4'				=>	'Options visuelles - Créer une option annonce encadrée',
'page_opt_visu_crea_info5'				=>	'Options visuelles - Créer une option vitrine en tête',
'page_opt_visu_crea_info6'				=>	'Options visuelles - Créer une option vitrine premium',
'page_opt_visu_crea_info7'				=>	'Options visuelles - Créer une option vitrine encadrée',
'page_opt_visu_crea_jour'				=>	'Nombre de jour',
'page_opt_visu_crea_prix'				=>	'Prix',
'page_opt_visu_crea_error1'				=>	'Vous devez entrer un jour',
'page_opt_visu_crea_error2'				=>	'Vous devez entrer un prix',
'page_opt_visu_crea_error3'				=>	'Ce n\'est pas un nombre',

///////////////////////////////////
//Page de modification d'options visuelles
//////////////////////////////////

'page_opt_visu_mod_info1'				=>	'Options visuelles - Modifier une option annonce en tête',
'page_opt_visu_mod_info2'				=>	'Options visuelles - Modifier une option annonce premium',
'page_opt_visu_mod_info3'				=>	'Options visuelles - Modifier une option annonce urgente',
'page_opt_visu_mod_info4'				=>	'Options visuelles - Modifier une option annonce encadrée',
'page_opt_visu_mod_info5'				=>	'Options visuelles - Modifier une option vitrine en tête',
'page_opt_visu_mod_info6'				=>	'Options visuelles - Modifier une option vitrine premium',
'page_opt_visu_mod_info7'				=>	'Options visuelles - Modifier une option vitrine encadrée',

///////////////////////////////////
//Page de l'opion photos
//////////////////////////////////

'page_opt_photo_info'					=>	'Option photos - Editer l\'option photos',
'page_opt_photo_note'					=>	'L\'uplaod est limité à 10 photos au total',
'page_opt_photo_nb_grat'				=>	'Nombre de photos gratuites',
'page_opt_photo_nb_max'					=>	'Nombre de photos payantes',
'page_opt_photo_prix'					=>	'Prix de la photo payante',
'page_opt_photo_error'					=>	'Ce n\'est pas un nombre',

///////////////////////////////////
//Page de confirmation de la mise à jour de l'option photos
//////////////////////////////////

'page_opt_photo_re_info'				=>	'Option photos - Option photos mise à jour',
'page_opt_photo_re'						=>	'L\'options photos a été mise à jour avec succès.',

///////////////////////////////////
//Page de l'opion video
//////////////////////////////////

'page_opt_video_info'					=>	'Option video - Editer l\'option video',
'page_opt_video_note'					=>	'0 = Gratuit / Vidéo Youtube ou Dailymotion',
'page_opt_video_act'					=>	'Activer l\'option vidéo',
'page_opt_video_prix'					=>	'Prix de l\'ajout d\'une vidéo',
'page_opt_video_error'					=>	'Ce n\'est pas un nombre',

///////////////////////////////////
//Page de confirmation de la mise à jour de l'option photos
//////////////////////////////////

'page_opt_video_re_info'				=>	'Options video - Option video mise à jour',
'page_opt_video_re'						=>	'L\'options vidéo a été mise à jour avec succès.',

///////////////////////////////////
//Page des packs comptes
//////////////////////////////////

'page_abo_comptes_info1'				=>	'Packs abonnement comptes - Editer des packs pour comptes particulier',
'page_abo_comptes_info2'				=>	'Packs abonnement comptes - Editer des packs pour comptes pro',
'page_abo_comptes_crea1'				=>	'Créer un pack particulier',
'page_abo_comptes_crea2'				=>	'Créer un pack pro',
'page_abo_comptes_zero'					=>	'Illimité',
'page_abo_comptes_mod'					=>	'Modifier',
'page_abo_comptes_sup'					=>	'supprimer',

///////////////////////////////////
//Page de création des packs comptes
//////////////////////////////////

'page_abo_comptes_crea_info1'			=>	'Packs abonnement comptes - Créer un pack particulier',
'page_abo_comptes_crea_info2'			=>	'Packs abonnement comptes - Créer un pack pro',
'page_abo_comptes_crea_note'			=>	'0 Nombre d\'annonce = annonces illimitées<br />
											 0 Nombre de jour = Durée illimitée<br /><br />
	                                         Vous pouvez par exemple créer un pack de 50 annonces, à utiliser sous 30 jours.',
'page_abo_comptes_crea_ann'				=>	'Nombre d\'annonce',
'page_abo_comptes_crea_jour'			=>	'Nombre de jour',
'page_abo_comptes_crea_prix'			=>	'Prix du pack',
'page_abo_comptes_crea_error1'			=>	'Ce n\'est pas un nombre',
'page_abo_comptes_crea_error2'			=>	'Mettre au moins un nombre d\'annonce ou de jour',
'page_abo_comptes_crea_error3'			=>	'Le prix ne peut être 0',

///////////////////////////////////
//Page de modification des packs comptes
//////////////////////////////////

'page_abo_comptes_mod_info'				=>	'Packs abonnement comptes - Modifier un pack comptes',

///////////////////////////////////
//Page des packs vitrine
//////////////////////////////////

'page_abo_vitrine_info'					=>	'Abonnements vitrine - Editer des abonnements pour vitrine',
'page_abo_vitrine_crea'					=>	'Créer un abonnement',
'page_abo_vitrine_zero'					=>	'Illimité',
'page_abo_vitrine_mod'					=>	'Modifier',
'page_abo_vitrine_sup'					=>	'supprimer',

///////////////////////////////////
//Page de création des packs vitrine
//////////////////////////////////

'page_abo_vitrine_crea_info'			=>	'Abonnements vitrine - Créer un abonnement',
'page_abo_vitrine_crea_note'			=>	'0 Nombre de jour = Durée illimitée',
'page_abo_vitrine_crea_jour'			=>	'Nombre de jour',
'page_abo_vitrine_crea_prix'			=>	'Prix de l\'abonnement',
'page_abo_vitrine_crea_error1'			=>	'Ce n\'est pas un nombre',
'page_abo_vitrine_crea_error2'			=>	'Le prix ne peut être 0',

///////////////////////////////////
//Page des factures
//////////////////////////////////

'page_fact_info'						=>	'Gestion des factures - Gérer les factures',
'page_fact_title1'						=>	'Facture du compte n°',
'page_fact_title2'						=>	'Facture de l\'annonce n°',
'page_fact_title3'						=>	'Jour',
'page_fact_title4'						=>	'Mois',
'page_fact_title5'						=>	'Année',
'page_fact_prix'						=>	'Prix',
'page_fact_prix_tva'					=>	'Prix TVA',
'page_fact_prix_total'					=>	'Prix total',
'page_fact_vu'							=>	'Voir la facture',
'page_fact_supp'						=>	'Supprimer la facture',

///////////////////////////////////
//Page de confirmation de la facture supprimée
//////////////////////////////////

'page_fact_sup_re_info'				=>	'Gestion des factures - Facture supprimée',
'page_fact_sup_re'					=>	'La facture a été supprimée avec succès',

///////////////////////////////////
//Page de modification des packs vitrine
//////////////////////////////////

'page_abo_vitrine_mod_info'				=>	'Abonnements vitrine - Modifier un abonnement vitrine',

///////////////////////////////////
//Page de confirmation de la mise à jour du nombre d'annonce
//////////////////////////////////

'page_nb_ann_re_info'					=>	'Mise à jour - Nombre d\'annonce mis à jour',
'page_nb_ann_re'						=>	'Le nombre d\'annonce a été mis à jour avec succès.',

///////////////////////////////////
//Page de confirmation de la mise à jour des options visuelles annonce
//////////////////////////////////

'page_opt_visu_ann_re_info'				=>	'Mise à jour - Options visuelles annonces mise à jour',
'page_opt_visu_ann_re'					=>	'Les options visuelles annonce ont été mise à jour avec succès.',

///////////////////////////////////
//Page de confirmation de la mise à jour des options visuelles vitrine
//////////////////////////////////

'page_opt_visu_vit_re_info'				=>	'Mise à jour - Options visuelles vitrine mise à jour',
'page_opt_visu_vit_re'					=>	'Les options visuelles vitrine ont été mise à jour avec succès.',

///////////////////////////////////
//Page de confirmation de la mise à jour des packs compte
//////////////////////////////////

'page_opt_pack_acc_re_info'				=>	'Mise à jour - Packs compte mis à jour',
'page_opt_pack_acc_re'					=>	'Les packs compte ont été mis à jour avec succès.',

///////////////////////////////////
//Page de confirmation de la mise à jour des packs vitrine
//////////////////////////////////

'page_opt_pack_vit_re_info'				=>	'Mise à jour - Packs vitrine mis à jour',
'page_opt_pack_vit_re'					=>	'Les packs vitrine ont été mis à jour avec succès.',

///////////////////////////////////
//Page de confirmation de l'envoi des relance
//////////////////////////////////

'page_opt_rel_ann_re_info'				=>	'Mise à jour - Envoi des relances',
'page_opt_rel_ann_re'					=>	'Les relances ont été envoyées avec succès.',

///////////////////////////////////
//Page d'importation des annonces xml
//////////////////////////////////

'page_xml_import_info'					=>	'Passerelle XML - Importer des annonces',
'page_xml_import_file'					=>	'Fichier XML',
'page_xml_import_error1'				=>	'L\'extension n\'est pas autorisée, uniquement xml',
'page_xml_import_error2'				=>	'Echec lors de l\'ouverture du fichier',
'page_xml_import_error3'				=>	'Le fichier est vide ou comporte des erreurs',
'page_xml_import_error4'				=>	'Des informations sont manquantes dans votre fichier.',
'page_xml_import_count'					=>	'annonces ont été insérées',

///////////////////////////////////
//Page de confirmation de la mise à jour de l'option photos
//////////////////////////////////

'page_xml_import_re_info'				=>	'Passerelle XML - Fichier traité',
'page_xml_import_re'					=>	'Le fichier xml a été traité avec succès.',

///////////////////////////////////
//Page d'exportation des annonces
//////////////////////////////////

'page_xml_export_info'					=>	'Passerelle XML - Récupérer un fichier XML',
'page_xml_export_file'					=>	'Obtenir les annonces à partir du',
'page_xml_export_reg'					=>	'Région',
'page_xml_export_dep'					=>	'Département',
'page_xml_export_cat'					=>	'Catégories',
'page_xml_export_key'					=>	'Clé xml',
'page_xml_export_value'					=>	'PAG_',
'page_xml_export_note'					=>	'Votre clé xml doit toujours être la même pour l\'exportation vers un site. Vous pouvez modifier votre clé xml, uniquement si l\'exportation est destinée à un autre site.',

///////////////////////////////////
//Page modèle XML
//////////////////////////////////

'page_xml_modele_info'					=>	'Passerelle XML - Fichier modèle XML',
'page_xml_modele_txt'					=>	'Voici ci-dessous le fichier d\'exemple pour l\'importation des annonces en xml. Si une agence souhaite exporter des annonces vers votre site, 
											communiquez lui ce fichier.',
'page_xml_modele_link'					=>	URL .'/xml/exemple.xml',

///////////////////////////////////
//Page d'edition des mails automatiques
//////////////////////////////////

'page_ema_auto_info1'					=>	'Edition des mails automatiques - Réception d\'une annonce à valider',
'page_ema_auto_info2'					=>	'Edition des mails automatiques - Annonce validée',
'page_ema_auto_info3'					=>	'Edition des mails automatiques - Annonce refusée',
'page_ema_auto_info4'					=>	'Edition des mails automatiques - Annonce non confirmée depuis 48 heures',
'page_ema_auto_info5'					=>	'Edition des mails automatiques - Annonce expirée',
'page_ema_auto_info6'					=>	'Edition des mails automatiques - Réception d\'un compte à valider',
'page_ema_auto_info7'					=>	'Edition des mails automatiques - Compte validé',
'page_ema_auto_info8'					=>	'Edition des mails automatiques - Compte refusé',
'page_ema_auto_info9'					=>	'Edition des mails automatiques - Paiement d\'une annonce',
'page_ema_auto_info10'					=>	'Edition des mails automatiques - Paiement des option visuelle annonce',
'page_ema_auto_info11'					=>	'Edition des mails automatiques - Paiement des option visuelle vitrine',
'page_ema_auto_info12'					=>	'Edition des mails automatiques - Paiement d\'un pack compte',
'page_ema_auto_info13'					=>	'Edition des mails automatiques - Paiement d\'un abonnement vitrine',
'page_ema_auto_info14'					=>	'Edition des mails automatiques - Relance de renouvellement',
'page_ema_auto_info15'					=>	'Edition des mails automatiques - Relance des option visuelle annonce',
'page_ema_auto_info16'					=>	'Edition des mails automatiques - Relance des option visuelle vitrine',
'page_ema_auto_info17'					=>	'Edition des mails automatiques - Relance d\'un pack compte',
'page_ema_auto_info18'					=>	'Edition des mails automatiques - Relance d\'un abonnement vitrine',
'page_ema_auto_nom'						=>	'Nom de l\'expéditeur',
'page_ema_auto_ema'						=>	'Adresse email',
'page_ema_auto_tit'						=>	'Titre',
'page_ema_auto_note1'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />
											&lt;url&gt; = Url du lien de validation',
'page_ema_auto_note2'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />
											&lt;url&gt; = Url de l\'annonce',
'page_ema_auto_note3'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />',
'page_ema_auto_note4'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;url&gt; = Url du lien de validation',
'page_ema_auto_note5'					=>	'&lt;br /&gt; = 1 saut de ligne<br />',
'page_ema_auto_note6'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />
											&lt;url&gt; = Url de l\'annonce<br />
											&lt;facture&gt; = Url de la facture',
'page_ema_auto_note7'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;facture&gt; = Url de la facture',
'page_ema_auto_note8'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />
											&lt;url&gt; = Url de renouvellement',
'page_ema_auto_note9'					=>	'&lt;br /&gt; = 1 saut de ligne<br />
											&lt;titre&gt; = Titre de l\'annonce<br />
											&lt;url&gt; = Url de l\'annonce',
'page_ema_auto_mes'						=>	'Message',
'page_ema_auto_error1'					=>	'Le nom de l\'expéditeur ne peut être vide',
'page_ema_auto_error2'					=>	'L\'adresse email est invalide',
'page_ema_auto_error3'					=>	'Le titre ne peut être vide',
'page_ema_auto_error4'					=>	'Le message ne peut être vide',

///////////////////////////////////
//Page d'edition des mails automatiques (confirmation)
//////////////////////////////////

'page_ema_auto_re_info'					=>	'Edition des mails automatiques - Mail modifié',
'page_ema_auto_re'						=>	'Le mail automatique a été modifié avec succès.',

///////////////////////////////////
//Page des contact
//////////////////////////////////

'page_gest_ema_cont_info'				=>	'Formulaire de contact - Edition des contacts',
'page_gest_ema_cont_mod'				=>	'Modifier',
'page_gest_ema_cont_sup'				=>	'Supprimer',
'page_gest_ema_cont_crea'				=>	'Créer un contact',

///////////////////////////////////
//Page de création d'un contact
//////////////////////////////////

'page_gest_ema_cont_crea_info'			=>	'Formulaire de contact - créer un contact',
'page_gest_ema_cont_crea_nom'			=>	'Nom du contact',
'page_gest_ema_cont_crea_email'			=>	'Email du contact',
'page_gest_ema_cont_crea_error1'		=>	'Vous avez oublié le nom',
'page_gest_ema_cont_crea_error2'		=>	'l\'adresse email est invalide',

///////////////////////////////////
//Page de modifcation d'un contact
//////////////////////////////////

'page_gest_ema_cont_mod_info'			=>	'Formulaire de contact - Modifier le contact',
'page_gest_ema_cont_mod_nom'			=>	'Nom du contact',
'page_gest_ema_cont_mod_email'			=>	'Email du contact',
'page_gest_ema_cont_mod_error1'			=>	'Le nom ne peut pas être vide',
'page_gest_ema_cont_mod_error2'			=>	'l\'adresse email est invalide',

///////////////////////////////////
//Page des pages
//////////////////////////////////

'page_pages_info'						=>	'Pages - Edition des pages',
'page_pages_crea'						=>	'Créer une page',
'page_pages_mod'						=>	'Modifier',
'page_pages_sup'						=>	'Supprimer',

///////////////////////////////////
//Page de création d'une page
//////////////////////////////////

'page_pages_crea_info'					=>	'Pages - Créer une page',
'page_pages_crea_edit'					=>	'Edition en HTML',
'page_pages_crea_titre'					=>	'Titre',
'page_pages_crea_texte'					=>	'Texte',
'page_pages_crea_error'					=>	'Vous devez entrer un titre',

///////////////////////////////////
//Page de modification d'une page
//////////////////////////////////

'page_pages_mod_info'					=>	'Pages - Modifier la page',
'page_pages_mod_edit'					=>	'Edition en HTML',
'page_pages_mod_titre'					=>	'Titre',
'page_pages_mod_texte'					=>	'Texte',
'page_pages_mod_error'					=>	'Vous devez entrer un titre',

///////////////////////////////////
//Page fond publicitaire
//////////////////////////////////

'page_gest_pub_fond_info'				=>	'Publicité - Fond publicitaire',
'page_gest_pub_fond_supp'				=>	'Supprimer la pub actuelle',

///////////////////////////////////
//Page pub fond (confirmation)
//////////////////////////////////

'page_gest_pub_fond_re'					=>	'Le fond publicitaire a été inséré succès.',

///////////////////////////////////
//Page pub header
//////////////////////////////////

'page_gest_pub_acc_info'				=>	'Publicité - Pub header',
'page_gest_pub_acc_img'					=>	'Image',
'page_gest_pub_acc_url'					=>	'Url',
'page_gest_pub_acc_note'				=>	'Vous pouvez uploader une bannière en communiqant son url,<br /> ou ajouter directement un script.',
'page_gest_pub_acc_script'				=>	'Script',
'page_gest_pub_acc_error4'				=>	'Vous devez entrer une url ou un script',
'page_gest_pub_acc_error5'				=>	'Vous devez choisir etre une bannière ou un script',
'page_gest_pub_acc_error6'				=>	'L\'url doit commencer par http:// ou https://',

///////////////////////////////////
//Erreurs des uploads
//////////////////////////////////

'page_gest_pub_acc_error1'				=>	'Une erreur est survenue lors du téléchargement',
'page_gest_pub_acc_error2'				=>	'Votre fichier ne doit pas dépasser 3GO',
'page_gest_pub_acc_error3'				=>	'L\'extension n\'est pas autorisée, seulement jpg, jpeg, gif ou png',

///////////////////////////////////
//Page pub header (confirmation)
//////////////////////////////////

'page_gest_pub_acc_re_info'				=>	'Publicité - Pub header modifiée',
'page_gest_pub_acc_re'					=>	'La pub header a été modifiée avec succès.',

///////////////////////////////////
//Page des publicites
//////////////////////////////////

'page_gest_pub_list_info1'				=>	'Publicité - Pub pages du listing',
'page_gest_pub_list_info2'				=>	'Publicité - Pub pages des annonces',
'page_gest_pub_list_aj_logo'			=>	'Créer une pub bannière',
'page_gest_pub_list_aj_text'			=>	'Créer une pub texte',
'page_gest_pub_list_aj_script'			=>	'Créer une pub script',
'page_gest_pub_list_type1'				=>	'<strong>Type</strong> : Bannière',
'page_gest_pub_list_type2'				=>	'<strong>Type</strong> : Texte',
'page_gest_pub_list_type3'				=>	'<strong>Type</strong> : Script',
'page_gest_pub_list_cat'				=>	'Cat.',
'page_gest_pub_list_reg'				=>	'Rég.',
'page_gest_pub_list_dep'				=>	'Dép.',
'page_gest_pub_list_all'				=>	'Toutes',
'page_gest_pub_list_all_dep'			=>	'Tous',
'page_gest_pub_list_mod'				=>	'Modifier',
'page_gest_pub_list_sup'				=>	'Supprimer',

///////////////////////////////////
//Page de création d'une pub logo
//////////////////////////////////

'page_gest_pub_catf1_info1'				=>	'Publicité - Pub pages du listing - Créer une pub bannière',
'page_gest_pub_catf1_info2'				=>	'Gestion des publicités - Pub pages des annonces - créer une pub bannière',
'page_gest_pub_catf1_img1'				=>	'Image de la pub (largeur 183px)',
'page_gest_pub_catf1_img2'				=>	'Image de la pub (largeur 200px)',
'page_gest_pub_catf1_nom'				=>	'Nom de la pub',
'page_gest_pub_catf1_url'				=>	'Url de la pub',
'page_gest_pub_catf1_cat'				=>	'Catégorie',
'page_gest_pub_catf1_reg'				=>	'Région',
'page_gest_pub_catf1_dep'				=>	'Département',
'page_gest_pub_catf1_error1'			=>	'Vous devez entrer un nom',
'page_gest_pub_catf1_error2'			=>	'Vous devez entrer une url',
'page_gest_pub_catf1_error3'			=>	'L\'url doit commencer par http:// ou https://',

///////////////////////////////////
//Page de creation d'une pub texte
//////////////////////////////////

'page_gest_pub_catf2_info1'				=>	'Publicité - Pub pages du listing - Créer une pub texte',
'page_gest_pub_catf2_info2'				=>	'Gestion des publicités - Pub pages des annonces - créer une pub texte',
'page_gest_pub_catf2_img'				=>	'Image d\'un petit logo (30x30)',
'page_gest_pub_catf2_text'				=>	'Petit texte de la pub',
'page_gest_pub_catf2_error'				=>	'Vous devez entrer un texte',

///////////////////////////////////
//Page de creation d'une pub script
//////////////////////////////////

'page_gest_pub_catf3_info1'				=>	'Publicité - Pub pages du listing - Créer une pub script',
'page_gest_pub_catf3_info2'				=>	'Gestion des publicités - Pub pages des annonces - créer une pub script',
'page_gest_pub_catf3_script'			=>	'Script',
'page_gest_pub_catf3_error'				=>	'Vous devez entrer un script',

///////////////////////////////////
//Page de modification d'une pub
//////////////////////////////////

'page_gest_pub_mod_info'				=>	'Publicité - Modifier la pub',

///////////////////////////////////
//Page de la mise en maintenance
//////////////////////////////////

'page_maint_info'						=>	'Mise en maintenance - Mettre le site en maintenance',
'page_maint_actif'						=>	'Activer la maintenance',
'page_maint_ip'							=>	'Adresse ip',
'page_maint_note'						=>	'Cette adresse ip sera la seule à pouvoir accèder au site.',
'page_maint_error'						=>	'Vous devez enter une adresse ip',

///////////////////////////////////
//Page de la mise en maintenance (confirmation)
//////////////////////////////////

'page_maint_re_info'					=>	'Mise en maintenance - Mise en maintenance modifiée',
'page_maint_re'							=>	'La Mise en maintenance a été modifiée avec succès.',

///////////////////////////////////
//Page de la sauvegarde
//////////////////////////////////

'page_sauv_info'						=>	'Sauvegarde - Effectuer une sauvegarde du site',
'page_sauv_text'						=>	'Il est important d\'effectuer régulièrement une sauvegarde du site. Un problème pourrait survenir sur votre serveur et, vous faire
											perdre toutes vos données.<br /></br />
											<strong>SAUVEGARDE DES FICHIERS</strong><br /><br />
											Gardez toujours une sauvegarde des fichiers source de votre site sur le disque dur de votre ordinateur.<br /><br />
											Vous devez ensuite effectuer une sauvegarde régulière des dossiers suivants :<br />
											- images/logos<br />
											- images/photos<br />
											- images/pub<br />
											- images/vignettes<br />
											- Tous les fichiers du cache<br /><br />
											Pour effectuer cette sauvegarde, connectez-vous à votre serveur par ftp, et uploadez ces dossiers sur votre ordinateur.<br /><br />
											<strong>SAUVEGARDE DE LA BASE DE DONNÉES</strong><br /><br />
											Procédez également à des sauvegardes régulières de votre base de données. Il existe 
											différentes façons de sauvegarder sa base de données. Vous trouverez toutes les informations nécéssaires sur le web.',
											
///////////////////////////////////
//Page des codes de réduction
//////////////////////////////////

'page_code_reduc_info'					=>	'Codes de réduction - Editer des codes de réduction',
'page_code_reduc_crea'					=>	'Créer un code de réduction',
'page_code_reduc_crea_val'				=>	'Valeur',
'page_code_reduc_crea_type'				=>	'Type',
'page_code_reduc_crea_val1'				=>	'Valide pour le dépôt d\'annonce',
'page_code_reduc_crea_val2'				=>	'Valide pour la modification d\'annonce',
'page_code_reduc_crea_val3'				=>	'Valide pour les options visuelles annonce',
'page_code_reduc_crea_val4'				=>	'Valide pour les options visuelles vitrine',
'page_code_reduc_crea_val5'				=>	'Valide pour les packs compte',
'page_code_reduc_crea_val6'				=>	'Valide pour les abonnements vitrine',
'page_code_reduc_crea_type1'			=>	'Somme à déduire',
'page_code_reduc_crea_type2'			=>	'Pourcentage à déduire',

///////////////////////////////////
//Page de création des codes de réduction
//////////////////////////////////

'page_code_reduc_crea_info'				=>	'Codes de réduction - Créer un code de réduction',
'page_code_reduc_crea_prix'				=>	'Valeur (prix ou pourcentage)',
'page_code_reduc_crea_code'				=>	'Code de réduction',
'page_code_reduc_crea_type'				=>	'Type',
'page_code_reduc_crea_type1'			=>	'Somme à déduire',
'page_code_reduc_crea_type2'			=>	'Pourcentage à déduire',
'page_code_reduc_crea_error1'			=>	'Vous devez entrer une valeur',
'page_code_reduc_crea_error2'			=>	'Ce n\'est pas un nombre',

///////////////////////////////////
//Pages filtrage mails
//////////////////////////////////

'page_filtre_mail_info'					=>	'Gestion des mails en attente d\'envoi - mails en attente d\'envoi',
'page_filtre_mail_ann'					=>	'Envoi vers l\'annonce n°',
'page_filtre_nom'						=>	'Nom de l\'expéditeur',
'page_filtre_email'						=>	'Email de l\'expéditeur',
'page_filtre_email_ann'					=>	'Email de l\'annonceur',

///////////////////////////////////
//Envoi du mail
//////////////////////////////////

'page_env_msg_mail_title'		=>	'Une personne vous contacte au sujet de votre annonce',
'page_env_msg_mail_nom'			=>	'<br /><br />Nom de la personne :',
'page_env_msg_mail_tel'			=>	'<br />Numéro de téléphone :',
'page_env_msg_mail_corps'		=>	'Bonjour,<br /><br />
									 Une personne vous contacte au sujet de votre annonce',
'page_env_msg_mail_msg'			=>	'<br /><br /><strong>Voici son message :</strong><br /><br />',
'page_env_msg_mail_msg_rep'		=>	'<br /><br />Pour répondre à cette personne, répondez directement à ce mail via votre messagerie, son email sera ajouté automatiquement comme destinataire.',

///////////////////////////////////
//Pages des achats
//////////////////////////////////

'page_achat_info'						=>	'Achats en attente de paiement',
'page_achat_input'						=>	'Référence de l\'achat',
'page_achat_nom_ent'					=>	'Nom de l\'entreprise',
'page_achat_nom'						=>	'Nom du client',
'page_achat_email'						=>	'Email du client',
'page_achat_date_auj'					=>	'Aujourd\'hui',
'page_achat_date_hier'					=>	'Hier',
'page_achat_date'					 	=>	'Le',
'page_achat_heur'					 	=>	'à',
'page_achat_type'						=>	'Type d\'achat',
'page_achat_type_1'						=>	'Annonce',
'page_achat_type_2'						=>	'Options visuelles annonce',
'page_achat_type_3'						=>	'Pack compte',
'page_achat_type_4'						=>	'Abonnement vitrine',
'page_achat_type_5'						=>	'Options visuelles vitrine',
'page_achat_ann'						=>	'Achat sur l\'annonce n°',
'page_achat_compte'						=>	'Achat sur le compte n°',
'page_achat_boutique'					=>	'Achat sur la boutique n°',
'page_achat_prix'						=>	'Prix',
'page_achat_tva'						=>	'TVA',
'page_achat_prix_t'						=>	'Prix total',

///////////////////////////////////
//Factures
//////////////////////////////////

'fact_num_ent'					=>	'Numéro d\'entreprise',
'fact_tva'						=>	'N° de TVA',
'fact_no_tva'					=>	'Pas de TVA',
'fact_num'						=>	'Facture N°',
'fact_add'						=>	'Adresse non communiquée',
'fact_lieu1'					=>	'A',
'fact_lieu2'					=>	'le',
'fact_nom1'						=>	'Annonce',
'fact_nom2'						=>	'Options visuelles annonce',
'fact_nom3'						=>	'Options visuelles vitrine',
'fact_nom4'						=>	'Pack compte',
'fact_nom5'						=>	'Abonnement vitrine',
'fact_tva2'						=>	'TVA',
'fact_total'					=>	'Total',
'fact_net'						=>	'Net à payer',
'fact_prod'						=>	'PRODUIT',
'fact_prix'						=>	'PRIX',

///////////////////////////////////
//Page des paramètres paiement chèque, virement...
//////////////////////////////////

'page_param_cheque_info'		=>	'Modules de paiement - Chèque, virement... (paiement non auto.)',
'page_param_cheque_act'			=>	'Activer le module',
'page_param_cheque_note'		=>	'Communiquez ici la démarche à effectuer, pour vous faire parvenir un
								réglement par chèque, virement bancaire, ou toute autre solution de
								paiement non automatique.<br /><br />
								<strong>Pensez à demander la référence de l\'achat</strong>',
'page_param_cheque_err'			=>	'Le texte ne peut pas être vide',

///////////////////////////////////
//Page de confirmation des paramètres paiement non auto.
//////////////////////////////////

'page_cheque_re_info'			=>	'Modules de paiement - Chèque, virement... (paiement non auto.)',
'page_cheque_re'				=>	'Les paramètres ont été mis à jour avec succès.',

///////////////////////////////////
//Mail alerte
//////////////////////////////////

'mail_alerte_send_suj'			=>	'Une annonce correspond à votre alerte',
'mail_alerte_send_texte'		=>	'Bonjour, <br/><br />
									Voici une annonce qui correspond à votre alerte :',
'mail_alerte_send_texte2'		=>	'<br/><br />Vous pouvez supprimer vote alerte en cliquant sur le lien suivant',

///////////////////////////////////
//Page de la newsletter
//////////////////////////////////

'page_newsletter_info1'			=>	'Newsletter - Envoyer une newsletter aux annonceurs',
'page_newsletter_info2'			=>	'Newsletter - Envoyer une newsletter aux comptes membre',
'page_newsletter_info3'			=>	'Newsletter - Envoyer une newsletter aux comptes PRO',
'page_newsletter_sujet'			=>	'Sujet',
'page_newsletter_msg'			=>	'Message',
'page_newsletter_error1'		=>	'Vous devez entrer un sujet',
'page_newsletter_error2'		=>	'Vous devez entrer un message',
'page_newsletter_ok'			=>	'Votre newsletter a été envoyée avec succès',

);