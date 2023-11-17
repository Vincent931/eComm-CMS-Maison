<h1>Vous êtes dans l'administration de votre site:</h1>

<h3>1/ Pensez à mettre un mot de passe, entrez cette url dans votre navigateur:</h3>

<p>https://monsite.com/administration/motdepasse.php (-remplacer monsite.com par votre nom de domaine).
ouvrez votre dossier /public_html ou celui qui contient les fichiers et dossier de votre site dans l'interface de gestion de votre serveur (cpanel)</p>
<p style="text-decoration:underline">Changer les données du _htpasswd et _htaccess :</p>
Editez le fichier contenu dans /public_html/administration nommé _htaccess et remplacez /home4/user_serveur/monsite.com/administration/.htpasswd par le chemin de votre _htpasswd sur le serveur, <a href="chemin.php">Obtenir le chemin ici</a>. Remplacer "chemin.php" par ".htpasswd", Enregistrer sous ".htaccess".</p>
<br>
<p>Remplacer le nomUser (du fichier _htpasswd) par un identifiant que vous avez choisi et entrez le mot de passe haché obtenu sur <a href="motdepasse.php">motdepasse.php</a> après ":".</p>
<br>
<p>Si il y a un soucis regarder home4/user_serveur/monsite.com/administration/.htpasswd , le chemin est surement mal stipulé regardez <a href="https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918580-protegez-un-dossier-avec-un-htaccess">ce tuto</a>, ne confondez pas serveur local et serveur distant: le mot de passe haché dépend du serveur sur lequel vous travaillez.</p>
<h3>2/ Remplissez votre contenu:</h3>
<h4>a/ Remplissez vos pages:</h4>
<p style="text-decoration:underline">Pour Néo et Confirm:</p>
<p>Page d'accueil</p>
<p>Page Contact</p>
<p>page Politique de Confidentialité</p>
<p>Page CGV</p>
<p>Page Paiement Error</p>
<p>Page Paiement OK</p>
<br>

<h4>b/ Téléchargez vos images et le PDF de la société</h4>
<p>Vérifier vos droits d'écriture pour public_html/administration/logo.png, il doit être écriture et lecture pour proprietaire, groupe et user

<h4 style="text-decoration:underline">c/ Précisez vos comptes Facebook, Google Maps, Monético ou Paypal, Twitter n'a pas besoin de compte.</h4>
<p>Si vous precisez oui pour l'affichage les liens seront affichés<p>


<h4>d/ Remplissez chaque produit, uploadez les images et précisez si c'est une promotion.</h4>
<p>Si le logo "A Saisir" ne vous convient pas sur les images des produits en promotion effacer cette image et uploadez en une avec le nom promotion (uniquement en .png) d'une largeur de 200px et d'une hauteur de 105px.</p>
<p>Télécharger les images internes rapidement (bandeau, icones etc...)</p>

<h4>e/ Lors de vos campagnes de Mails: </h4>
<p>Faîtes le de préférence la nuit lorsque les serveurs sont le moins sollicité, gardez à l'esprit que vous pouvez avoir des problèmes avec votre hébergeur si vous êtes signalé comme spammeur, de ce fait ne contactez que les personnes qui sont prêtes à recevoir vos mails.<p>
<br>
<p>Lors de l'ajout du texte pour votre mail, vous ne pouvez pas ajouter de code html ou css, juste les liens <?php echo htmlentities('<a href=""></a>'); ?> les <?php echo htmlentities('<br>');?> et les images de 300px.</p>
<p>Vos emails comportent votre bandeau, pensez à l'uploader rapidement, une image de 300px est créé en plus lors de l'upload du bandeau, n'effacez pas ce "bandeau-mail.png",
<br>
<br>
<p>Effacer les cookies du navigateur entre 2 tests, vous serez comme cela sûr de l'affichage.</p>

<h4>3/ Changer l'url de paiement pour Monético</h4>
<p>Renommer le dossier Paypal ou le dossier Monético par "paiement" (sans majuscule, c'est le paiement que vous utilisez qui doit être renommer).</p>
<p>Il vous suffit de remplir les donnees de Paypal ou Monético (validez 3 ventes de test avant de passer en production) pour encaisser vos premières ventes.</p>
<br><br>
<p>Contactez master&#64;www-1-zero.fr si il subsiste un bug</p> 

<h4>4/ a/ Changer les droits en lecture ecriture des fichiers reference.txt , compteur.txt , logo.png (dans / et dans /administration) et des dossiers /publicimgs et /download , attribuez droits d'ecriture et de lecture pour proprietaire, groupe et user. Passez par l'interface Gestionnaire de Fichiers de l'hébergeur, ces fichiers sont dans /public_html</h4>


<p>NB: Le dossier public_html de votre serveur peut être d'un autre nom (par exemple monsite), dans ce cas c'est ici que vous trouverez vos dossiers ou fichiers</p>

