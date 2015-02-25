<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
///////////////////////////////////////////////////////////////////////////////////////////

############################################################

$language = array(

///////////////////////////////////
//Message install 
//////////////////////////////////

'error_install_file'			=>	'Script PAG est un produit <strong>SOUS LICENCE</strong>, 
									toute utilisation illégale pourra entrainer des poursuites judiciaire. Sans licence, vous prenez le risque d\'être condamné en justice et 
									d\'être désindexé des moteurs de recherche. Si vous n\'avez pas de licence, vous devez en faire l\'acquisition
									sur notre site internet <a href="http://www.script-pag.com">www.script-pag.com</a>.<br /><br />
									Pour terminer votre installation :<br />
									SUPPRIMEZ LE DOSSIER install A LA RACINE DE VOTRE SITE',
'error_admin_file'				=>	'RENOMMEZ LE DOSSIER admin PAR UN NOM DE VOTRE CHOIX (dans le fichier robot.txt, remplacez le mot "admin" par votre nouveau nom)',
'error_cron_file'				=>	'RENOMMEZ LE DOSSIER cron PAR UN NOM DE VOTRE CHOIX (dans le fichier robot.txt, remplacez le mot "cron" par votre nouveau nom)',
'error_bdd_connect'				=>	'Impossible de se connecter à la base de données - <a href="install">Cliquez-ici</a> pour installer votre site.<br /><br />
									Contactez l\'administrateur <a href="http://www.script-pag.com">Script PAG</a> en cas de problème.',

///////////////////////////////////
//Liens barre haut du site
//////////////////////////////////

'lien_compte'					=>	'Espace membre',
'lien_compte_pro'				=>	'Espace PRO',
'lien_bienvenue'				=>	'Bienvenue',
'lien_boutiques'				=>	'Les vitrines des PRO',
'lien_accueil'					=>	'Accueil',
'lien_offres'					=>	'Les offres',
'lien_recherches'				=>	'Les recherches',
'lien_echanges'					=>	'Les échanges',
'lien_dons'						=>	'Les dons',
'lien_alert'					=>	'Alerte email',
'lien_selection'				=>	'Mes annonces sélectionnées',

///////////////////////////////////
//Textes annonces premium
//////////////////////////////////

'txt_premium'					=>	'Ici votre annonce premium',
'lien_premium'					=>	'En savoir plus',
'title_plus_premium'			=>  'Annonce Premium',
'title_plus_premium_1'			=>  'Comment fonctionne l\'annonce Premium ?',
'txt_plus_premium_1'			=>  'L\'annonce <strong>premium</strong> permet de garantir à votre annonce une bonne visibilité. En effet, en choisissant cette option,
									vous apparaissez dans le menu du haut. Votre annonce ressort en fonction de la recherche de l\'utilisateur.',
'title_plus_premium_2'			=>  'Comment mettre mon annonce en Premium ?',
'txt_plus_premium_2'			=>  'Pour mettre votre annonce en <strong>Premium</strong>, allez sur la page de votre annonce et cliquez sur le lien "Annonce premium".',

///////////////////////////////////
//Value et Selects de la recherche
//////////////////////////////////

'select_categories'				=>	'Toutes catégories',
'select_regions'				=>	'Toutes régions',
'select_departements'			=>	'Tous départements',
'value_recherche'				=>	'Tapez votre recherche',
'value_code_postal'				=>	'Code postal (ex:35000)',
'input_chercher'				=>	'Chercher',
'uniquement'					=>	'Uniquement dans',
'checkbox_chercher_titre'		=>	'Titre',
'checkbox_chercher_urgent'		=>	'Urgentes',
'checkbox_chercher_offres'		=>	'Offres',
'checkbox_chercher_recherches'	=>	'Recherches',
'checkbox_chercher_echanges'	=>	'Échanges',
'checkbox_chercher_dons'		=>	'Dons',
'checkbox_chercher_photo'		=>	'Avec photo',
'checkbox_chercher_video'		=>	'Avec vidéo',

///////////////////////////////////
//Nombre d'annonce
//////////////////////////////////

'nombre_annonce'				=>	'<span class="vert_1">annonces</span> sur tout le site !',

///////////////////////////////////
//Infos et Liens bas du site
//////////////////////////////////

'texte_copyright'				=>	'Copyright &copy;',
'texte_creation'				=>	'/ <a href="http://www.script-pag.com" class="lien_foot" onclick="window.open(this.href); return false;">Script PAG</a>
									Créé par <a href="http://www.elina-web.com" class="lien_foot" onclick="window.open(this.href); return false;">Elina WEB</a>',
'lien_contact'					=>	'Nous contacter',
 
///////////////////////////////////
//Titre, description ,mots clés et info de la page  d'accueil
//////////////////////////////////
 
'titre_acceuil'					=>	'Petites annonces gratuites sur internet.',
'description_acceuil'			=>	'Déposer et consulter des petites annonces (Véhicules, immobilier, emploi, mode, multimedia ...)',
'mot_cles_accueil'				=>	'annonces, annonce, petites annonces, petites annonce, petite annonce, annonce auto, annonce immobilier',
'infos_page_accueil'			=>	'Partager ce site sur',
'infos_page_flux'				=>	'Flux rss',

///////////////////////////////////
//Texte de l'info bulle
//////////////////////////////////

'texte_ann_bulle'			 	=>	'annonces',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  du formulaire de dépôt d'annonce
//////////////////////////////////
 
'titre_formulaire'				=>	'Déposer une petite annonce.',
'description_formulaire'		=>	'',
'mot_cles_formulaire'			=>	'',
'infos_page_formulaire'			=>	'Déposer une petite annonce',

///////////////////////////////////
//Page  du formulaire de dépôt d'annonce
//////////////////////////////////

'form_message_bannissement'		=>	'Vous n\'êtes plus autorisé à déposer des annonces',
'form_message_erreur'			=>	'Les champs marqués en rouge sont oubliés ou incorrects',
'form_message_fb_erreur'		=>	'Vous devez remplir le formulaire pour pouvoir déposer des annonces',
'form_message_reduc'			=>	'Ce code de réduction n\'est pas valide',
'form_pho'						=>	'Photo(s)',
'form_info_pho1'				=>	'(optionnel) &nbsp; GIF, JPG, JPEG ou PNG',
'form_info_pho2'				=>	'Vous pouvez télécharger',
'form_info_pho3'				=>  'photo(s) GRATUITEMENT',
'form_info_pho4'				=>  '+',
'form_info_pho5'				=>  'payante(s)',
'form_info_pho6'				=>  'Le prix de la photo supplémentaire est de :',
'form_info_pho7'				=>	'En fonction de la taille de votre image, le téléchargement peut prendre plusieurs minutes.',
'form_info_pho8'				=>  '(Les photos déjà payées ne seront pas comptabilisées)',
'form_erreur_extention'			=>	'L\'extension de votre fichier n\'est pas autorisée.',
'form_erreur_size'			    =>	'Le poids de votre fichier est trop lourd.',
'form_erreur_upload'			=>	'Une erreur s\'est produite lors du téléchargement.',
'form_erreur_nb_photo'			=>	'Vous avez atteint le nombre maximum de photo',
'form_reg'						=>	'Région',
'form_reg_select'				=>	'Choisissez la région',
'form_dep'						=>	'Départements',
'form_dep_select'				=>	'Choisissez le département',
'form_cat'						=>	'Catégorie',
'form_cat_select'				=>	'Choisissez la catégorie',
'form_prix_par'					=>	'Dans cette catégories, le prix de l\'annonce pour les particuliers est de :',
'form_prix_par_free'			=>	'Dans cette catégories, l\'annonce pour les particuliers est GRATUITE',
'form_prix_pro'					=>	'Dans cette catégories, le prix de l\'annonce pour les professionnels est de :',
'form_prix_pro_free'			=>	'Dans cette catégories, l\'annonce pour les professionnels est GRATUITE',
'form_propart'					=>	'Vous êtes',
'form_part'						=>	'Particulier',
'form_pro'						=>	'Professionnel',
'form_pro_compte'				=>	'/ <strong>Professionnel</strong> vous devez créer un <a href="acc_crea.php?type=2" class="vert bold">Compte PRO</a>',
'form_par_compte'				=>	'<strong>Particulier</strong> pour simplifier la gestion de vos annonces, vous pouvez créer un <a href="acc_crea.php?type=1" class="vert bold">Compte membre</a>',
'form_nom_ent'					=>	'Nom de votre entreprise',
'form_num_sir'					=>	'N° Entreprise',
'form_cod'						=>	'Votre code postal',
'form_cod_info'					=>	'(ex : 75000)',
'form_vil'						=>	'Votre ville',
'form_typ_opt'					=>	'Type',
'form_typ_opt1'					=>	'Vente',
'form_typ_opt2'					=>	'Location',
'form_typ'						=>	'Type d\'annonce',
'form_typ1'						=>	'Offre',
'form_typ2'						=>	'Recherche',
'form_typ3'						=>	'Echange',
'form_typ4'						=>	'Don',
'form_nom'						=>	'Votre nom',
'form_ema'						=>	'Votre email',
'form_info_ema'					=>	'Votre email ne sera pas visible par les utilisateurs du site.<br />
									Ils pourront vous contacter en utilisant un formulaire prévu à cet effet.',
'form_tel'						=>	'Votre numéro de téléphone',
'form_cache_tel'				=>	'Cacher votre numéro dans l\'annonce',
'form_tit'						=>	'Titre de votre annonce',
'form_ann'						=>	'Votre annonce',
'form_youtube'					=>	'Vidéo Youtube',
'form_dailymotion'				=>	'Ou vidéo Dailymotion',
'form_video_fac'				=>	'(facultatif)',
'form_video_prix'				=>	'Prix :',
'form_pri'						=>	'Prix',
'form_pri_info'					=>	'(optionnel)',
'form_pas'						=>	'Mot de passe',
'form_pas2'						=>	'Confirmation du mot de passe',
'form_promo'					=>	'Code de réduction',
'form_tete'						=>	'<strong>OPTION "<span class="orange">ANNONCE EN TÊTE</span>"</strong>',
'form_tete_none'				=>	'Pas d\'option en tête',
'form_opt_tete'					=>	'Mon annonce remonte <span class="orange"><strong>en tête</strong></span> tous les jours pendant :</span>',
'form_une'						=>	'<strong>OPTION "<span class="jaune">PREMIUM</span>"</strong>',
'form_une_none'					=>	'Pas d\'option premium',
'form_opt_une'					=>	'Mon annonce <span class="jaune"><strong>premium</strong></span> pendant :',
'form_urg'						=>	'<strong>OPTION "<span class="rouge">LOGO URGENT</span>"</strong>',
'form_urg_none'					=>	'Pas d\'option logo urgent',
'form_opt_urg'					=>	'<span class="rouge"><strong>Logo urgent</strong></span> sur mon annonce pendant :',
'form_enc'						=>	'<strong>OPTION "<span class="vert_fluo">ANNONCE ENCADRÉES"</strong>',
'form_enc_none'					=>	'Pas d\'option annonce encadrées',
'form_opt_enc'					=>	'Mon annonce <span class="vert_fluo"><strong>Encadrée</strong></span> pendant :',
'form_opt_jour'					=>	'Jour(s)',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme la mise en ligne de l'annonce
//////////////////////////////////
 
'titre_page_conf'				=>	'Mise en ligne réussie',
'description_page_conf'			=>	'',
'mot_cles_page_conf'			=>	'',
'infos_page_conf'				=>	'Mise en ligne réussie',

///////////////////////////////////
//Page  qui confirme la mise en ligne de l'annonce
//////////////////////////////////

'txt_info_page_conf1'			=>	'Votre annonce a bien été prise en compte. Un email vous a été envoyé pour la confirmer.<br />
									Si vous ne recevez pas l\'email dans les 15 minutes qui suivent, veuillez vérifier dans votre "Courrier indésirable".<br /><br />
									<a class="tahoma bold vert" href="depot_form.php">Déposer une nouvelle annonce</a>',
'txt_info_page_conf2'			=>	'Votre annonce a été mise en ligne avec succès.<br /><br />
									<a class="tahoma bold vert" href="depot_form.php">Déposer une nouvelle annonce</a>',
						
///////////////////////////////////
//Mail de notification d'annonce à valider
//////////////////////////////////

'mail_notif_ann_title'			=>	'Vous avez des annonces à valider',
'mail_notif_ann_text'			=>	'Bonjour,<br /><br />Vous avez des annonces en attente de validation dans votre administration Script PAG.',

///////////////////////////////////
//Titre, description, mots clés et info de la page de paiement de l'annonce
//////////////////////////////////
 
'titre_page_paiement'			=>	'Page de paiement',
'description_page_paiement'		=>	'',
'mot_cles_page_paiement'		=>	'',
'infos_page_paiement'			=>	'Page de paiement',

///////////////////////////////////
//Page de paiement de l'annonce
//////////////////////////////////

'annonce_page_paiement'			=>	'Mise en ligne de votre annonce',
'prix_page_paiement'			=>	'Prix',
'prix_tva_page_paiement'		=>	'Tva',
'prix_total_page_paiement'		=>	'Prix total à régler',
'prix_ref_page_paiement'		=>	'Référence de l\'achat',
'choix_page_paiement'			=>	'Choisissez votre moyen de paiement :',
'item1_page_paiement'           =>  'Publication de votre annonce',
'item2_page_paiement'           =>  'Votre annonce en tête de liste :',
'item3_page_paiement'           =>  'Votre annonce premium :',
'item4_page_paiement'           =>  'Logo urgent sur votre annonce :',
'item5_page_paiement'           =>  'Votre annonce encadrée :',
'item6_page_paiement'           =>  'Votre vitrine en tête de liste',
'item7_page_paiement'           =>  'Votre vitrine premium :',
'item8_page_paiement'           =>  'Votre vitrine encadrée :',
'item9_page_paiement'           =>  'Pack compte :',
'item10_page_paiement'          =>  'Abonnement vitrine :',

///////////////////////////////////
//Titre, description, mots clés et info de la page de paiement annulé
//////////////////////////////////
 
'titre_page_paiement_annule'			=>	'Paiement annulé',
'description_page_paiement_annule'		=>	'',
'mot_cles_page_paiement_annule'			=>	'',
'infos_page_paiement_annule'			=>	'Paiement annulé',

///////////////////////////////////
//Page de paiement annulé
//////////////////////////////////

'page_paiement_annule_texte'			=>	'Votre paiement a été annulé',

///////////////////////////////////
//Titre, description, mots clés et info de la page de paiement validé
//////////////////////////////////
 
'titre_page_paiement_valide'			=>	'Paiement validé',
'description_page_paiement_valide'		=>	'',
'mot_cles_page_paiement_valide'			=>	'',
'infos_page_paiement_valide'			=>	'Paiement validé',

///////////////////////////////////
//Page de paiement validé
//////////////////////////////////

'page_paiement_valide_texte'	=>	'Votre paiement a été validé avec succès. Un mail vous a été envoyé sur votre boite email.',

///////////////////////////////////
//Titre, description, mots clés et info de la page de paiement gratuit validé
//////////////////////////////////
 
'titre_page_paiement_valide_free'			=>	'Commande validée',
'description_page_paiement_valide_free'		=>	'',
'mot_cles_page_paiement_valide_free'		=>	'',
'infos_page_paiement_valide_free'			=>	'Commande validée',

///////////////////////////////////
//Page de paiement gratuit validé
//////////////////////////////////

'page_paiement_valide_texte_free'	=>	'Votre commande a été traitée avec succès.',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  de confirmation de l'annonce
//////////////////////////////////
 
'titre_page_confirmer'			=>	'Confirmation de votre annonce',
'description_page_confirmer'	=>	'',
'mot_cles_page_confirmer'		=>	'',
'infos_page_confirmer'			=>	'Confirmation de votre annonce',

///////////////////////////////////
//Page  de confirmation de l'annonce
//////////////////////////////////

'annonce_page_confirmer_msg1'	=>	'Merci pour votre annonce, notre équipe la validera sous réserve qu\'elle respecte nos règles de diffusion',
'annonce_page_confirmer_msg2'	=>	'Cette annonce a déjà été confirmée ou n\'existe pas',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  offre
//////////////////////////////////
 
'titre_page_offre'				=>	'Les offres',
'description_page_offre'		=>	'',
'mot_cles_page_offre'			=>	'',
'infos_page_offre'				=>	'Les offres',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  recherche
//////////////////////////////////
 
'titre_page_recherche'			=>	'Les recherches',
'description_page_recherche'	=>	'',
'mot_cles_page_recherche'		=>	'',
'infos_page_recherche'			=>	'Les recherches',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  echange
//////////////////////////////////
 
'titre_page_echange'			=>	'Les échanges',
'description_page_echange'		=>	'',
'mot_cles_page_echange'			=>	'',
'infos_page_echange'			=>	'Les échanges',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  don
//////////////////////////////////
 
'titre_page_don'				=>	'Les dons',
'description_page_don'			=>	'',
'mot_cles_page_don'				=>	'',
'infos_page_don'				=>	'Les dons',

///////////////////////////////////
//Pages des recherches
//////////////////////////////////
 
'not_ann'						=>	'Aucune annonce ne correspond à votre recherche',
'all_lien_ann'					=>	'Toutes les annonces',
'all_lien_a'					=>	'à',
'all_lien_sur'					=>	'sur',
'all_lien_par'					=>	'Particulier',
'all_lien_pro'					=>	'Professionnel',
'page_prec'					 	=>	'page précédente',
'page_suiv'					 	=>	'page suivante',
'page_dern'					 	=>	'dernière page',
'tri_prix'					 	=>	'Trier par prix',
'tri_date'					 	=>	'Trier par date',

///////////////////////////////////
//Pages des recherches (listing des annonces)
//////////////////////////////////

'auj_ann'					 	=>	'Aujourd\'hui',
'hier_ann'					 	=>	'Hier',
'date_ann'					 	=>	'Déposée le',
'heur_ann'					 	=>	'à',
'pho_ann1'					 	=>	'Photo',
'pho_ann2'					 	=>	'Photos',
'zone_pub'						=>	'Publicité',
'no_prix'						=>	'Pas de prix',
'pro_ann'						=>	'(PRO)',
'type_ann'						=>	'Type',
'type_ann_1'					=>	'Offre',
'type_ann_2'					=>	'Recherche',
'type_ann_3'					=>	'Échange',
'type_ann_4'					=>	'Don',
'video_ann'						=>	'Cette annonce contient une vidéo',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  de recherche par région
//////////////////////////////////
 
'titre_page_rec_reg'			=>	'Petites annonces',
'description_page_rec_reg'		=>	'',
'mot_cles_page_rec_reg'			=>	'',
'infos_page_rec_reg'			=>	'Région',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  de recherche 
//////////////////////////////////
 
'titre_page_rec'				=>	'Petites Annonces',
'description_page_rec'			=>	'',
'mot_cles_page_rec'				=>	'',
'infos_page_rec'				=>	'',

///////////////////////////////////
//Page de l'annonce affichée
//////////////////////////////////
 
'page_ann_info'					=>	'Partager cette annonce sur',
'page_ann_depot'				=>	'Annonce déposée par',
'page_ann_date'					=>	'le',
'page_ann_retour'				=>	'Retour aux résultats',
'page_ann_video'				=>	'Cette annonce contient une vidéo',
'page_ann_video_link'			=>	'Cliquez ici pour voir la vidéo',
'page_ann_info_g'				=>  'Informations générales',
'page_ann_info_detail'			=>  'Détail de l\'annonce',
'page_ann_info_contact'			=>  'Contact annonceur',
'page_ann_info_gestion'			=>  'Gestion de l\'annonce',
'page_ann_info_stat'			=>  'Statistiques de l\'annonce',
'page_ann_prix'					=>	'Prix',
'page_ann_ville'				=>	'Ville',
'page_ann_pro'					=>	'Annonce d\'un professionnel.',
'page_ann_pro_nom'				=>	'Nom',
'page_ann_pro_sir'				=>	'N° ent.',
'page_ann_type'					=>	'Type',
'page_ann_type1'				=>	'Vente',
'page_ann_type2'				=>	'Location',
'page_ann_kms'					=>	'Kms',
'page_ann_annee'				=>	'Année',
'page_ann_cylindree'			=>	'Cylindrée',
'page_ann_surface'				=>	'Surface',
'page_ann_piece'				=>	'Pièce(s)',
'page_ann_capacite'				=>	'Capacité',
'page_ann_env_ami'				=>	'Envoyer l\'annonce à un ami',
'page_ann_txt_menu_mail'		=>	'Envoyer un message',
'page_ann_txt_menu_ann_vend'	=>	'Toutes ses annonces',
'page_ann_txt_menu_tel'			=>	'Tel',
'page_ann_txt_menu_bout'		=>	'Vitrine du PRO',
'page_ann_txt_menu_ger'			=>	'Gérer votre annonce',
'page_ann_txt_menu_mod'			=>	'Modifier l\'annonce',
'page_ann_txt_menu_sup'			=>	'Retirer l\'annonce',
'page_ann_txt_menu_rem'			=>	'Annonce en Tête',
'page_ann_txt_menu_une'			=>	'Annonce Premium',
'page_ann_txt_menu_urg'			=>	'Annonce Urgente',
'page_ann_txt_menu_enc'			=>	'Annonce Encadrée',
'page_ann_txt_menu_visit'		=>  'Nombre de vues',
'page_ann_txt_menu_visit_l'		=>  'Dernière visite le',
'page_ann_txt_menu_ref'			=>  'Référence',
'page_ann_txt_menu_act'			=>	'Actions sur l\'annonce',
'page_ann_txt_menu_fav'			=>	'Ajouter à ma sélection',
'page_ann_txt_menu_imp'			=>	'Imprimer l\'annonce',
'page_ann_txt_menu_geo'			=>	'Géolocaliser l\'annonce',
'page_ann_txt_menu_sig'			=>	'Signaler l\'annonce',
'page_ann_nom'					=>	'Votre nom',
'page_ann_email'				=>	'Email de votre ami(e)',
'page_ann_alert_nom'			=>	'Vous avez oublié votre nom',
'page_ann_alert_email'			=>	'Vous avez oublié l\'Email',
'page_ann_alert_email_val'		=>	'L\'Email est invalide',
'page_ann_mail_title'		 	=>	'Un de vos amis veut vous faire connaître une annonce susceptible de vous intéresser',
'page_ann_mail_msg'		 		=>	'Bonjour,<br /><br />
									 Un de vos amis veut vous faire connaître une annonce susceptible de vous intéresser.<br><br>',
'page_ann_mail_lien'		 	=>	'Cliquez ici pour voir cette annonce',
'page_ann_mail_nom'		 		=>	'Nom de votre ami(e)',
'page_ann_mail_signature'		=>	'<a href="'. URL .'">'. URL .'</a><br>Petites annonces gratuites',

///////////////////////////////////
//Page  qui confirme l'envoi à un ami
//////////////////////////////////

'txt_info_env_ami_title'		=>	'Envoi réussi',
'txt_info_env_ami'				=>	'L\'annonce a été envoyée avec succès à votre ami(e)<br /><br />
									<a class="tahoma bold vert" href="javascript:history.back();">Retour à l\'annonce</a>',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  des annonces sélectionnées
//////////////////////////////////
 
'titre_page_selection'			=>	'Mes annonces sélectionnées',
'description_page_selection'	=>	'',
'mot_cles_page_selection'		=>	'',
'infos_page_selection'			=>	'Mes annonces sélectionnées',

///////////////////////////////////
//Page  des annonces sélectionnées
//////////////////////////////////
 
'page_no_selection'				=>	'Vous n\'avez aucune annonce dans votre sélection',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  d'envoi d'un mail à l'annonceur
//////////////////////////////////
 
'titre_page_env_msg'			=>	'Envoyer un message à',
'description_page_env_msg'		=>	'',
'mot_cles_page_env_msg'			=>	'',
'infos_page_env_msg'			=>	'Envoyer un message à',

///////////////////////////////////
//Page  d'envoi d'un mail à l'annonceur
//////////////////////////////////
 
'page_env_msg_nom'				=>	'Votre nom',
'page_env_msg_email'			=>	'Votre email',
'page_env_msg_tel'				=>	'Votre numéro de téléphone',
'page_env_msg_tel_info'			=>	'(optionnel)',
'page_env_msg_mes'				=>	'Votre message',
'page_env_msg_bot'				=>	'Anti robot',
'page_env_msg_error1'			=>	'Vous avez oublié votre nom',
'page_env_msg_error2'			=>	'Votre adresse email est manquante ou invalide',
'page_env_msg_error3'			=>	'Vous avez oulbié votre message',
'page_env_msg_error4'			=>	'Le code Anti-Robots est incorrect',
'page_env_msg_mail_title'		=>	'Une personne vous contacte au sujet de votre annonce',
'page_env_msg_mail_nom'			=>	'<br /><br />Nom de la personne :',
'page_env_msg_mail_tel'			=>	'<br />Numéro de téléphone :',
'page_env_msg_mail_corps'		=>	'Bonjour,<br /><br />
									 Une personne vous contacte au sujet de votre annonce',
'page_env_msg_mail_msg'			=>	'<br /><br /><strong>Voici son message :</strong><br /><br />',
'page_env_msg_mail_msg_rep'		=>	'<br /><br />Pour répondre à cette personne, répondez directement à ce mail via votre messagerie, son email sera ajouté automatiquement comme destinataire.',
'page_env_msg_ban'				=>	'Vous n\'êtes plus autorisé à envoyer des messages',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme l'envoi du mail à l'annonceur
//////////////////////////////////
 
'titre_page_env_msg_re'			=>	'Message envoyé',
'description_page_env_msg_re'	=>	'',
'mot_cles_page_env_msg_re'		=>	'',
'infos_page_env_msg_re'			=>	'Message envoyé',

///////////////////////////////////
//Page  qui confirme l'envoi du mail à l'annonceur
//////////////////////////////////

'page_env_msg_mail_reussi'		=>	'Votre message a été envoyer à l\'annonceur.',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  de contact
//////////////////////////////////
 
'titre_page_contact'			=>	'Formulaire de contact',
'description_page_contact'		=>	'',
'mot_cles_page_contact'			=>	'',
'infos_page_contact'			=>	'Formulaire de contact',

///////////////////////////////////
//Page de contact
//////////////////////////////////

'page_env_cont_nom'				=>	'Votre nom',
'page_env_cont_email'			=>	'Votre email',
'page_env_cont_tel'				=>	'Votre numéro de téléphone',
'page_env_cont_tel_info'		=>	'(optionnel)',
'page_env_cont_cont'			=>	'Contacter',
'page_env_cont_suj'				=>	'Sujet du message',
'page_env_cont_suj_ann_sig'		=>	'Annonce n°',
'page_env_cont_mes'				=>	'Votre message',
'page_env_cont_mes_ann_sig'		=>	'Cette annonce présente un contenu suspect ou illégale.',
'page_env_cont_bot'				=>	'Anti robots',
'page_env_cont_error1'			=>	'Vous avez oublié votre nom',
'page_env_cont_error2'			=>	'Votre adresse email est manquante ou invalide',
'page_env_cont_error3'			=>	'Vous avez oublié le sujet du message',
'page_env_cont_error4'			=>	'Vous avez oublié votre message',
'page_env_cont_error5'			=>	'Le code Anti-Robots est incorrect',
'page_env_cont_tel_mail'		=>	'Tel',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme l'envoi du mail de contact
//////////////////////////////////
 
'titre_page_env_cont_re'		=>	'Message envoyé',
'description_page_env_cont_re'	=>	'',
'mot_cles_page_env_cont_re'		=>	'',
'infos_page_env_cont_re'		=>	'Message envoyé',

///////////////////////////////////
//Page  qui confirme l'envoi du mail de contact
//////////////////////////////////

'page_env_cont_mail_reussi'		=>	'Votre message a bien été envoyé, nous y répondrons dans les plus brefs délais.',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  du saisi du mot de passe pour supprimer ou modifier l'annonce
//////////////////////////////////
 
'titre_page_pass_mod'			=>	'Entrez votre mot de passe',
'description_page_pass_mod'		=>	'',
'mot_cles_page_pass_mod'		=>	'',
'infos_page_pass_mod'			=>	'Entrez votre mot de passe',

///////////////////////////////////
//Page  du saisi du mot de passe pour supprimer ou modifier l'annonce
//////////////////////////////////

'page_pass_mod_pass'			=>	'Votre mot de passe',
'page_pass_mod_oub'				=>	'Mot de passe oublié ?',
'page_pass_mod_error'			=>	'Le mot de passe est incorrect',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  de modification de l'annonce
//////////////////////////////////
 
'titre_formulaire_mod'			=>	'Modification de votre annonce',
'description_formulaire_mod'	=>	'',
'mot_cles_formulaire_mod'		=>	'',
'infos_formulaire_mod'			=>	'Modification de votre annonce',

///////////////////////////////////
//Page  de modification de l'annonce
//////////////////////////////////
 
//INFOS IDENTIQUES A CELLES DE LA PAGE DE DEPOT D'ANNONCES

'modification_ann_pay'			=>	'Le prix de la modification de votre annonce est de',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme la modification de l'annonce
//////////////////////////////////
 
'titre_page_mod_re'				=>	'Modifications effectuées',
'description_page_mod_re'		=>	'',
'mot_cles_page_mod_re'			=>	'',
'infos_page_mod_re'				=>	'Modifications effectuées',

///////////////////////////////////
//Page  qui confirme la modification de l'annonce
//////////////////////////////////

'page_mod_re'					=>	'Votre annonce a bien été modifiée, notre équipe la validera sous réserve qu\'elle respecte nos règles de diffusion.',
'page_mod_re_auto'				=>	'Votre annonce a été modifiée avec succés.',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme la suppression de l'annonce
//////////////////////////////////
 
'titre_page_supp_ann'			=>	'Suppression de votre annonce',
'description_page_supp_ann'		=>	'',
'mot_cles_page_supp_ann'		=>	'',
'infos_page_supp_ann'			=>	'Suppression de votre annonce',

///////////////////////////////////
//Page  qui confirme la suppression de l'annonce
//////////////////////////////////

'page_supp_ann'					=>	'Votre annonce a été supprimée avec succès',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  du saisi de l'email pour l'envoi du mot de passe
//////////////////////////////////
 
'titre_page_env_pass'			=>	'Entrez votre adresse email',
'description_page_env_pass'		=>	'',
'mot_cles_page_env_pass'		=>	'',
'infos_page_env_pass'			=>	'Entrez votre adresse email',

///////////////////////////////////
//Page  du saisi du saisi de l'email pour l'envoi du mot de passe
//////////////////////////////////

'page_env_pass_ema'				=>	'Votre adresse email',
'page_env_pass_error'			=>	'L\'adresse email est incorrect',

///////////////////////////////////
//Mail du mot de passe envoyé
//////////////////////////////////

'mail_env_pass_title'			=>	'Votre mot de passe de l\'annonce',
'mail_env_pass_msg'				=>	'Bonjour,<br /><br />
		                             Voici le mot de passe de votre annonce',

///////////////////////////////////
//Titre,  description , mots clés et info de la page  qui confirme l'envoi du mot de passe
//////////////////////////////////
 
'titre_page_env_pass_re'		=>	'Mot de passe envoyé',
'description_page_env_pass_re'	=>	'',
'mot_cles_page_env_pass_re'		=>	'',
'infos_page_env_pass_re'		=>	'Mot de passe envoyé',

///////////////////////////////////
//Page  qui confirme l'envoi du mot de passe
//////////////////////////////////

'page_env_pass_reussi'			=>	'Votre mot de passe vient de vous être envoyé dans votre boite email, 
									si vous ne le recevez pas d\'ici quelques minutes, vérifiez vos mails indésirables.',

///////////////////////////////////
//Text disclaimer
//////////////////////////////////

'texte_disc'					=>	'Cette annonce est réservée aux adultes, vous devez confirmer être majeur pour pouvoir la visualiser.<br /><br /> 
									<a href="confirmer_maj.php"><img src="images/bouton_majeur.png" alt="" /></a>',

///////////////////////////////////
//Titre, description, mots clés et info de la page  info comptes
//////////////////////////////////
 
'titre_page_info_acc'			=>	'Info comptes',
'description_page_info_acc'		=>	'',
'mot_cles_page_info_acc'		=>	'',
'infos_page_info_acc'			=>	'Info comptes',
'texte_page_info_acc'			=>	'Il est nécéssaire d\'avoir un <strong>compte membre</strong> ou un <strong>compte PRO</strong> pour déposer des petites annonces sur le site.<br /><br /> 
									Vous êtes un <strong>Particulier</strong> ? Créez votre <a href="acc_crea.php?type=1" class="vert bold">Compte Membre</a>
									ou connectez-vous <a href="acc_conn.php?type=1" class="vert bold">Connexion compte membre</a><br />
									Vous êtes un <strong>Professionnel</strong> ? Créez votre <a href="acc_crea.php?type=2" class="vert bold">Compte PRO</a>
									ou connectez-vous <a href="acc_conn.php?type=2" class="vert bold">Connexion compte PRO</a>',
		
///////////////////////////////////
//Titre,  description , mots clés et info de la page  de création de comptes
//////////////////////////////////
 
'titre_conn_acc1'				=>	'Connexion compte membre',
'titre_conn_acc2'				=>	'Connexion compte PRO',
'description_conn_acc'			=>	'',
'mot_cles_conn_acc'				=>	'',
'infos_conn_acc1'				=>	'Connexion compte membre',
'infos_conn_acc2'				=>	'Connexion compte Pro',

///////////////////////////////////
//Page de connexion
//////////////////////////////////

'compte_con_email'				=>	'Adresse email',
'compte_con_pass'				=>	'Mot de passe',
'compte_con_error1'				=>	'Mauvais mot de passe ou adresse email',
'compte_con_error2'				=>	'Mauvais mot de passe ou adresse email',
'compte_con_error3'				=>	'L\'adresse email est invalide',
'compte_con_error4'				=>	'Vous devez entrer un mot de passe',
'compte_con_not1'				=>	'Pas encore de compte ? Créez votre compte membre',
'compte_con_not2'				=>	'Pas encore de compte ? Créez votre compte PRO',

///////////////////////////////////
//Page de création de comptes
//////////////////////////////////
 
'compte1_acc'					=>	'Compte membre',
'compte2_acc'					=>	'Compte PRO',
'compte1_crea'					=>	'Créez votre compte membre',
'compte2_crea'					=>	'Créez votre compte PRO',
'compte_form_civ'				=>	'Votre civilité',
'compte_form_civ1'				=>	'M',
'compte_form_civ2'				=>	'Mme',
'compte_form_civ3'				=>	'Melle',
'compte_form_prenom'			=>	'Votre prénom',
'compte_form_nom'				=>	'Votre nom',
'compte_form_reg'				=>	'Votre région',
'compte_form_cat'				=>	'Votre sous-catégorie principale',
'compte_form_add'				=>	'Votre adresse',
'compte_form_cod'				=>	'Votre code postal',
'compte_form_vil'				=>	'Votre ville',
'compte_form_civ'				=>	'Votre civilité',
'compte_form_tel'				=>	'Votre numéro de téléphone',
'compte_form_ema'				=>	'Votre email',
'compte_form_pas'				=>	'Mot de passe',
'compte_form_pas2'				=>	'Comfirmation du mot de passe',
'compte_conf_cgu'				=>  'Je reconnais avoir lu et accepter les <a href="Page-3-Infos-legales-et-CGU.htm" class="vert bold" onclick="window.open(this.href); return false;">CGU</a>',
'compte_ema_ban'				=>	'Vous n\'êtes plus autorisé à créer de compte',
'compte_ema_doub'				=>	'Un compte avec cette adresse email existe déjà',
'compte_err_cgu'				=>	'Vous devez accepter les CGU',

///////////////////////////////////
//Page de création du compte réussi
//////////////////////////////////

'compte_reussi_title'			=>	'Création de votre compte',
'compte_reussi_desc'			=>	'',
'compte_reussi_key'				=>	'',
'compte_reussi_info'			=>	'Création de votre compte',
'compte_reussi_msg1'			=>	'Votre compte a été créé avec succès, un mail pour le valider vient de vous être envoyé dans votre boite email.<br /> 
									Si vous ne le recevez pas d\'ici quelques minutes, vérifiez vos mails indésirables.',
'compte_reussi_msg2'			=>	'Votre compte a été créé avec succès, vous pouvez vous connecter.',

///////////////////////////////////
//Mail d'envoi d'un nouveau mot de passe
//////////////////////////////////

'mail_compte_new_pass_title'	=>	'Nouveau mot de passe de votre compte '. $param_gen['name'],
'mail_compte_new_pass_msg'		=>	'Bonjour,<br /><br />Voici votre nouveau mot de passe : ',
'mail_compte_new_pass_sig'		=>  '<br /><br />Petites annonces <br />'. $param_gen['name'],

///////////////////////////////////
//Page de confirmation du compte
//////////////////////////////////

'compte_conf_title'				=>	'Confirmation de votre compte',
'compte_conf_desc'				=>	'',
'compte_conf_key'				=>	'',
'compte_conf_info'				=>	'Confirmation de votre compte',
'compte_conf_msg1'				=>	'Votre compte a été confirmé avec succès. Notre équipe le validera sous réserve d\'acceptation dans un délai de 24 heures.',
'compte_conf_msg2'				=>	'Ce compte n\'existe pas ou a déjà été validé',

///////////////////////////////////
//Mail de notification de compte à valider
//////////////////////////////////

'mail_notif_acc_title'			=>	'Vous avez des comptes à valider',
'mail_notif_acc_text'			=>	'Bonjour,<br /><br />Vous avez des comptes en attente de validation dans votre administration Script PAG.',

///////////////////////////////////
//Page depot réussi
//////////////////////////////////

'compte_info_page_con'			=>	'Merci pour votre annonce, notre équipe la validera sous réserve qu\'elle respecte nos règles de diffusion.<br /><br />
									<a class="tahoma bold vert" href="depot_form.php">Déposer une nouvelle annonce</a>',

///////////////////////////////////
//Header du tableau de bord
//////////////////////////////////

'compte_accueil_bord'			=>  'Bienvenue sur votre tableau de bord',
'value_recherche_bord'      	=> 	'Chercher dans mes annonces',
'compte_lien_bord1'				=>	'Tableau de bord',
'compte_lien_bord2'				=>	'Déposer une annonce',
'compte_lien_bord3'				=>	'Informations personnelles',
'compte_lien_bord4'				=>	'Ma vitrine PRO',
'compte_lien_bord5'				=>	'Déconnexion',

///////////////////////////////////
//Page Tabeau de bord du compte
//////////////////////////////////

'compte_bord_title'				=>	'Tableau de bord',
'compte_bord_desc'				=>	'',
'compte_bord_key'				=>	'',
'compte_bord_info'				=>	'Tableau de bord',
'compte_bord_msg'				=>	'Vous n\'avez encore aucune annonce. Retrouvez ici toutes les annonces que vous mettrez en ligne.',
'compte_bord_no'				=>	'Aucune de vos annonces ne correspond à cette recherche',
'compte_bord_fact'				=>	'Toutes mes factures',
'compte_bord_pack_ann1'			=>	'Il vous reste <strong>',
'compte_bord_pack_ann2'			=>	'annonce(s)</strong><br /> dans votre pack',
'compte_bord_pack_jour1'		=>	'Le pack expire dans <strong>',
'compte_bord_pack_jour2'		=>	'jour(s)</strong>',

///////////////////////////////////
//Page Tabeau de bord facture
//////////////////////////////////

'compte_bord_fact_title'		=>	'Toutes mes factures',
'compte_bord_fact_info'			=>	'Toutes mes factures',
'compte_bord_fact_fact'			=>	'Facture n°',

///////////////////////////////////
//Page Tabeau de bord "données personnelles"
//////////////////////////////////

'compte_bord_pers_title'		=>	'Informations personnelles',
'compte_bord_pers_desc'			=>	'',
'compte_bord_pers_key'			=>	'',
'compte_bord_pers_info'			=>	'Informations personnelles',
'compte_bord_pers_pas1'			=>	'Nouveau mot de passe',
'compte_bord_pers_pas_note'		=>	'(Facultatif)',
'compte_bord_pers_pas2'			=>	'Confirmation',

///////////////////////////////////
//Page de confirmation de modification des infos personnelles
//////////////////////////////////

'compte_reussi_mod_title'		=>	'Informations personnelles modifiées',
'compte_reussi_mod_desc'		=>	'',
'compte_reussi_mod_key'			=>	'',
'compte_reussi_mod_info'		=>	'Informations personnelles modifiées',
'compte_reussi_mod_msg'			=>	'Vos informations personnelles ont été modifiées avec succès.',

///////////////////////////////////
//Page du formulaire de la fiche vitrine
//////////////////////////////////

'compte_fiche_bout_title'		=>	'Fiche vitrine',
'compte_fiche_bout_desc'		=>	'',
'compte_fiche_bout_key'			=>	'',
'compte_fiche_bout_info'		=>	'Fiche vitrine',
'compte_fiche_bout_mod1'		=>	'Ajouter ou modifier le logo',
'compte_fiche_bout_mod2'		=>	'Créer ou modifier la fiche vitrine',
'compte_fiche_bout_tit'			=>	'Titre de votre vitrine',
'compte_fiche_bout_des'			=>	'Description de votre vitrine',
'compte_fiche_bout_hor'			=>	'Vos horaires d\'ouverture',
'compte_fiche_bout_des'			=>	'Description de votre vitrine',
'compte_fiche_bout_web'			=>	'Votre site internet',
'compte_fiche_bout_web_info'	=>	'(Facultatif)',
'compte_fiche_info_pack1'		=>	'Il vous reste <strong>',
'compte_fiche_info_pack2'		=>	'jour(s)</strong> d\'abonnement pour votre vitrine.',

///////////////////////////////////
//Page de création de la fiche vitrine réussi
//////////////////////////////////

'compte_reussi_fiche_title'		=>	'Fiche vitrine',
'compte_reussi_fiche_desc'		=>	'',
'compte_reussi_fiche_key'		=>	'',
'compte_reussi_fiche_info'		=>	'Fiche vitrine',
'compte_reussi_fiche_msg'		=>	'Votre fiche vitrine a été créée ou modifiée avec succès.',

///////////////////////////////////
//Textes vitrines premium
//////////////////////////////////

'txt_vit_premium'					=>	'Ici votre vitrine premium',
'lien_vit_premium'					=>	'En savoir plus',
'title_vit_plus_premium'			=>  'Vitrine Premium',
'title_vit_plus_premium_1'			=>  'Comment fonctionne la vitrine Premium ?',
'txt_vit_plus_premium_1'			=>  'La vitrine <strong>premium</strong> permet de garantir à votre vitrine une bonne visibilité. En effet, en choisissant cette option,
										vous apparaissez dans le menu du haut. Votre vitrine ressort en fonction de la recherche de l\'utilisateur.',
'title_vit_plus_premium_2'			=>  'Comment mettre ma vitrine en Premium ?',
'txt_vit_plus_premium_2'			=>  'Pour mettre votre vitrine en <strong>Premium</strong>, allez sur la page de votre vitrine et cliquez sur le lien "Vitrine premium".',

///////////////////////////////////
//Page listing des vitrines
//////////////////////////////////

'search_bout_title'				=>	'Les vitrines PRO',
'search_bout_desc'				=>	'',
'search_bout_key'				=>	'',
'search_bout_info'				=>	'Les vitrines PRO',
'value_recherche_boutique'		=>	'Rechercher une vitrine',
'all_lien_ann_boutique'			=>  'Toutes les vitrines',
'nombre_boutique'				=>	'<span class="vert bold">vitrines</span> sur tout le site !',
'not_boutique'					=>	'Aucune vitrine ne correspond à votre recherche',
'nb_ann_boutique'				=>	'annonce',
'nb_ann_boutique_plu'			=>	'annonces',

///////////////////////////////////
//Page des vitrines
//////////////////////////////////

'page_bout_title'				=>	'vitrine',
'page_bout_info'				=>	'Partager cette vitrine sur',
'page_bout_add'					=>	'<strong>Adresse :</strong>',
'page_bout_sir'					=>	'<strong>N° ent :</strong>',
'page_bout_geo'					=>	'Géolocaliser la vitrine',
'page_bout_tel'					=>	'<strong>Tel :</strong>',
'page_bout_hor'					=>	'<strong>Horaires d\'ouverture :</strong>',
'page_bout_rss'					=>	'Flux rss de la vitrine',
'page_bout_web'					=>	'<strong>Site internet :</strong>',
'page_bout_all_ann'				=>	'Annonces de la vitrine',
'page_bout_not_ann'				=>	'Il n\'y en encore aucune annonce dans cette vitrine',
'page_bout_rem'					=>	'Vitrine en Tête',
'page_bout_une'					=>	'Vitrine Premium',
'page_bout_enc'					=>	'Vitrine Encadrée',
'page_bout_c_tete'				=>	'<strong>OPTION "<span class="orange">VITRINE EN TÊTE</span>"</strong>',
'page_bout_opt_tete'			=>	'Ma vitrine remonte <span class="orange"><strong>en tête</strong></span> tous les jours pendant :</span>',
'page_bout_opt_une'				=>	'Ma vitrine <span class="jaune"><strong>premium</strong></span> pendant :',
'page_bout_c_enc'				=>	'<strong>OPTION "<span class="vert_fluo">VITRINE ENCADRÉES"</strong>',
'page_bout_opt_enc'				=>	'Ma vitrine <span class="vert_fluo"><strong>Encadrée</strong></span> pendant :',

///////////////////////////////////
//Page maintenance
//////////////////////////////////

'page_maint_title'				=>	'Site en maintenance',
'page_maint_info'				=>	'Notre site est actuellement en cours de maintenance. Merci de revenir plus tard.',

///////////////////////////////////
//Page d'achat d'options pour une annonce ou une vitrine
//////////////////////////////////

'pay_ann_opts_title'			=>	'Choix de l\'option',

///////////////////////////////////
//Page d'achat de pack compte
//////////////////////////////////

'pay_pack_acc_title'			=>	'Choix du pack',
'pay_pack_acc_info'				=>	'<strong>Vous devez acheter un pack pour pouvoir déposer des annonces.</strong>',
'pay_pack_acc1'					=>	'Pack de',
'pay_pack_acc2'					=>	'annonces pendant',
'pay_pack_acc3'					=>	'Pack annonce illimitées pendant :',
'pay_pack_acc4'					=>	'jours',
'pay_pack_acc5'					=>	'une période illimitée',

///////////////////////////////////
//Page d'achat d'abonnement vitrine
//////////////////////////////////

'pay_pack_vit_title'			=>	'Choix de l\'abonnement',
'pay_pack_vit_info'				=>	'<strong>Vous devez acheter un abonnement pour pouvoir mettre en ligne votre vitrine.</strong>',
'pay_pack_vit1'					=>	'Abonnement pour une période de',
'pay_pack_vit2'					=>	'jours',
'pay_pack_vit3'					=>	'Abonnement pour une période illimtée',

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
//Page de relance
//////////////////////////////////

'page_relance_info'				=>	'Relance de votre annonce',
'page_relance_prix'				=>	'Le prix de relance de votre annonce est de',
'page_relance_prix_free'		=>	'La relance de votre annonce est gratuite.',
'page_relance_pay'				=>	'Relance d\'une annonce',
'page_relance_conf'				=>	'Annonce relancée',
'page_relance_info_conf'		=>	'Votre annonce a été relancée avec succès pour une période de',
'page_relance_conf_jour'		=>	'jours.',

///////////////////////////////////
//Mail de notification de mail à valider
//////////////////////////////////

'mail_notif_mail_title'			=>	'Vous avez des mails à valider',
'mail_notif_mail_text'			=>	'Bonjour,<br /><br />Vous avez des mails en attente d\'envoi dans votre administration Script PAG.',

///////////////////////////////////
//Titre, description, mots clés et info de la page de l'alerte email
//////////////////////////////////
 
'titre_page_alert'				=>	'Alerte email',
'description_page_alert'		=>	'',
'mot_cles_page_alert'			=>	'',
'infos_page_alert'				=>	'Créer une alerte email',

///////////////////////////////////
//Page de l'alerte email
//////////////////////////////////

'page_alert_info'				=>	'Recevez les annonces qui correspondent à votre recherche',
'page_alert_email'				=>	'Votre adresse email',
'page_alert_reg'				=>	'Régions',
'page_alert_dep'				=>	'Départements',
'page_alert_cat'				=>	'Catégories',
'page_alert_word1'				=>	'Mot clé n°1',
'page_alert_word2'				=>	'Mot clé n°2',
'page_alert_word3'				=>	'Mot clé n°3',
'page_alert_error1'				=>	'Adresse email invalide',
'page_alert_error2'				=>	'Vous devez choisir une région',
'page_alert_error3'				=>	'Vous devez choisir un département',
'page_alert_error4'				=>	'Vous devez choisir une catégorie',
'page_alert_error5'				=>	'Vous devez entrer au minimum 1 mot clé',

///////////////////////////////////
//Titre, description, mots clés et info de la page qui confirme la création de l'alerte email
//////////////////////////////////
 
'titre_page_alert_re'			=>	'Alerte email enregistrée',
'description_page_alert_re'		=>	'',
'mot_cles_page_alert_re'		=>	'',
'infos_page_alert_re'			=>	'Alerte email enregistrée',

///////////////////////////////////
//Page qui confirme la création de l'alerte
//////////////////////////////////

'page_env_alert_reussi'			=>	'Votre alerte email a été enregistrée avec succès.',

///////////////////////////////////
//Mail alerte
//////////////////////////////////

'mail_alerte_send_suj'			=>	'Une annonce correspond à votre alerte',
'mail_alerte_send_texte'		=>	'Bonjour, <br/><br />
									Voici une annonce qui correspond à votre alerte :',
'mail_alerte_send_texte2'		=>	'<br/><br />Vous pouvez supprimer vote alerte en cliquant sur le lien suivant',

///////////////////////////////////
//Titre, description, mots clés et info de la page qui supprime l'alerte
//////////////////////////////////
 
'titre_page_alert_sup'			=>	'Alerte supprimée',
'description_page_alert_sup'	=>	'',
'mot_cles_page_alert_sup'		=>	'',
'infos_page_alert_sup'			=>	'Alerte supprimée',

///////////////////////////////////
//Page  qui confirme l'envoi du mail de contact
//////////////////////////////////

'page_env_alert_sup_reussi'			=>	'Votre alerte email a été supprimée avec succès.',

///////////////////////////////////
//Titre, description, mots clés et info de la page des annonces d'un vendeur 
//////////////////////////////////
 
'titre_page_vendeur'			=>	'Les annonces du vendeur',
'description_page_vendeur'		=>	'',
'mot_cles_page_vendeur'			=>	'',
'infos_page_vendeur'			=>	'Les annonces du vendeur',

///////////////////////////////////
//Mail de confirmation de création d'un compte
//////////////////////////////////

'send_mail_crea_compte_tit'		=>	'Confirmation de votre compte',
'send_mail_crea_compte_msg'		=>	'Bonjour,<br /><br />
									Nous vous remercions d\'avoir créer un compte sur notre site internet.<br />
									Vous pouvez vous-y connecter avec votre adresse email et votre mot de passe.',

);