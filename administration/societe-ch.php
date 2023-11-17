<?php session_start();
require 'boutique0.php';
require 'texte1.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
<?php 
$req=$bdd1->query('SELECT * FROM societe');
$ste=$req->fetch();
$IP=$ste['IP'];
$dossier=$ste['dossier'];
$nom=$ste['nom'];
$sigle=$ste['sigle'];
$mail=$ste['mail'];
$urls=$ste['urls'];
$url=$ste['url'];
$serveur_mail=$ste['serveur_mail'];
$mdp=$ste['mdp'];
$adresse1=$ste['adresse1'];
$adresse2=$ste['adresse2'];
$CP=$ste['CP'];
$ville=$ste['ville'];
$pays=$ste['pays'];
$RCS=$ste['RCS'];
$ville_RCS=$ste['ville_RCS'];
?>
<p>Ne mettez pas d'accents, évitez les caractères spéciaux (#"') et entrez les valeurs les plus simples en général, ne changez pas le nom du dossier téléchargement une fois créé !</p>
<form method="post" action ="societe-ch.list.php">
    <input style="margin:auto;display:block" type="submit" value="Envoyer"/></br>
    <label style="margin:auto;display:block" for="IP">Votre Adresse IP (ex:123.123.123.123 ou 2001:0620:0000:0000:0211:24FF:FE80:C12C
)</label></br>
    <input style="margin:auto;display:block" type="text" name="IP" id="IP" value="<?php echo $IP;?>"/></br>
    <label style="margin:auto;display:block" for="dossier">Nom du dossier de téléchargement (ex:tfvdezcdjnrfhkbhkcrebchkrbhkbckhb)</label></br>
    <input style="margin:auto;display:block" type="text" name="dossier" id="dossier" value="<?php echo $dossier;?>"/></br> 
    <label style="margin:auto;display:block" for="nom">Nom de la société</label></br>
    <input style="margin:auto;display:block" type="text" name="nom" id="nom" value="<?php echo $nom;?>"/></br>
    <label style="margin:auto;display:block" for="sigle">Sigle de la société (7-8 mots max conseillé)</label></br>
    <input style="margin:auto;display:block" type="text" name="sigle" id="sigle" value="<?php echo $sigle;?>"/></br>
    <label style="margin:auto;display:block" for="RCS">N° RCS</label></br>
    <input style="margin:auto;display:block" type="text" name="RCS" id="RCS" value="<?php echo $RCS;?>"/></br>
    <label style="margin:auto;display:block" for="ville_RCS">Ville d'enregistrement du RCS</label></br>
    <input style="margin:auto;display:block" type="text" name="ville_RCS" id="ville_RCS" value="<?php echo $ville_RCS;?>"/></br>
		<label style="margin:auto;display:block" for="mail">Mail professionnel du type exemple@monSite.fr ou exemple@monSite.com etc...</label></br>
    <input style="margin:auto;display:block" type="text" name="mail" id="mail" value="<?php echo $mail;?>"/></br>
    <label style="margin:auto;display:block" for="urls">URL simplifiée du site du type monSite.fr ou monSite.com etc...</label></br>
    <input style="margin:auto;display:block" type="text" name="urls" id="urls" value="<?php echo $urls;?>"/></br>
    <label style="margin:auto;display:block" for="url">URL du site du type https://monSite.fr ou https://monSite.com etc...</label></br>
    <input style="margin:auto;display:block" type="text" name="url" id="url" value="<?php echo $url;?>"/></br>
    <label style="margin:auto;display:block" for="serveur_mail">Serveur de Mail du type mail.monsite.fr ou mail.monsite.com etc...</label></br>
    <input style="margin:auto;display:block" type="text" name="serveur_mail" id="serveur_mail" value="<?php echo $serveur_mail;?>"/></br>
    <label style="margin:auto;display:block" for="mdp">Mot de passe de Messagerie, (pas de #"')</label></br>
    <input style="margin:auto;display:block" type="text" name="mdp" id="mdp" value="<?php echo $mdp;?>"/></br>
		<p>Entrez l'adresse Postale du Siège (apparaissant sur factures)</p>
    <label style="margin:auto;display:block" for="adresse1">Adresse</label></br>
    <input style="margin:auto;display:block" type="text" name="adresse1" id="adresse1" value="<?php echo $adresse1;?>"/></br>
    <label style="margin:auto;display:block" for="adresse2">Complément d'adresse</label></br>
    <input style="margin:auto;display:block" type="text" name="adresse2" id="adresse2" value="<?php echo $adresse2;?>"/></br>
    <label style="margin:auto;display:block" for="CP">CP</label></br>
    <input style="margin:auto;display:block" type="text" name="CP" id="CP" value="<?php echo $CP;?>"/></br>
    <label style="margin:auto;display:block" for="ville">Ville</label></br>
    <input style="margin:auto;display:block" type="text" name="ville" id="ville" value="<?php echo $ville;?>"/></br>
    <label style="margin:auto;display:block" for="pays">Pays</label></br>
    <input style="margin:auto;display:block" type="text" name="pays" id="pays" value="<?php echo $pays;?>"/></br>
  </form>
  <br><br>
  <form method="post" action="dossier-ch.php">
    <p>= Changer le nom du dossier Téléchargement ici <span style="color:red">(attention ts les fichiers téléchargements seront perdus)</span></p>
    <input style="margin:auto;display:block" type="submit" value="Changer"/></br>
    <label style="margin:auto;display:block" for="dossier">Nom du dossier de téléchargement (ex: 5r1zvre8487rgf2d5czdcz5F54Rced1ced1241FvvGGVVv)</label></br>
    <input style="margin:auto;display:block" type="text" name="dossier" id="dossier" value="<?php echo $dossier;?>"/></br>
  </form>

      <br><br><br><br><br>
      <div>
	</body>
</html>