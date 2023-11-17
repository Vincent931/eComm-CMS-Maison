<?php session_start();
require 'boutique0.php';
require 'texte1.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head-js-ch.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center;color:blue">Email Campaign sur LISTING</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			 <p style="width:950px;margin:auto;text-align:left">Pensez à augmenter vos valeurs PHP: upload_max_filesize =, max_execution_time =, set_time_limit =, max_input_time =</p>
			 <br>
      <p style="width:950px;margin:auto;text-align:left"><?php $chaine="<a href=\"https://monsite/exemple.fr\"> On Clic </a> ";echo htmlentities($chaine); ?> et image <?php $chaine="<img src=\"https://monsite.com/publicimgs/exemple.jpg\"/>";echo htmlentities($chaine); ?> autorisés. Effacez ;border-radius:10px/10px;border:1px solid black pour obtenir une image sans bord arrondies dans les coins. Les images doivent faire 300px maximum pour passer sur les emails de smartphone. <a href="https://resizeimage.net/" style="text-decoration:underline;color:blue">Redimensionner une image ici</a></p><br>
      <p style="width:600px;margin:auto;text-align:left;color:blue">exemple:</p><br>
      <p style="width:600px;margin:auto;text-align:left"><?php $chaine="<div style=\"text-align:left;margin:auto\">";echo htmlentities($chaine);?><br>
      <p style="width:600px;margin:auto;text-align:left"><?php $chaine="<br><br>";echo htmlentities($chaine);?></p>
      <p style="width:600px;margin:auto;text-align:left"><?php $chaine="<img src=\"https://monsite.com/publicimgs/exemple.png\" style=\"width:300px;text-align:center;margin:auto\"/><br><br>";echo htmlentities($chaine);?></p>
      <p style="width:600px;margin:auto;text-align:left"><?php $chaine="<p style=\"width:600px;text-align:left;margin:auto\"/>BLA BLA BLA BLA BLA</p><br><br>";echo htmlentities($chaine);?></p>
      <p style="width:600px;margin:auto;text-align:left"><?php $chaine="</div>";echo htmlentities($chaine);?><br>
      	<form method="post" id="list-campaign" name="list-campaign" action="campagne-mail-listing.php">
			<p><label for="all">TOUS </label><input type="radio" name="valeur" id="all" value="all"/><label for="test">TEST </label><input type="radio" name="valeur" id="test" value="test" checked/></p>
			<p><input id="grey_color" type="submit" value="Envoyer la Campagne"/><p>
		</form><br><br>
      <?php 
      $req20=$bdd1->query('SELECT * FROM campagne_listing');
      $exist=$req20->rowCount();
      if($exist>0){
      $mail=$req20->fetch();
      $mail_contenu=$mail['contenu'];
      $subject=$mail['subject'];
      $adresse=$mail['email_addr'];
      $mdp=$mail['motdepasse'];
      $serveur_mail=$mail['serveur_mail'];
      }
       require 'bank-img-vid-mp3-12.php';?>
       <br><br>
<form method="post" name="ch_form" id="ch_form" action="campagne-listing.list.php"> 
<br>
<div style="width:700px;margin:auto;text-align:right">
<p><label for="subject">Titre de sujet </label>
<input type="text" name="subject" id="subject" value="<?php if(isset($subject)){echo $subject;}?>"/></p>
<br>
<p><label for="serveur_mail">Serveur de mail (exemple: mail.yhgbnbhvjvv.fr) </label>
<input type="text" name="serveur_mail" id="serveur_mail" value="<?php if(isset($serveur_mail)){echo $serveur_mail;}?>"/></p>
<p><label for="adresse">Adresse Email (exemple: contact@yhgbnbhvjvv.fr) </label>
<input type="text" name="adresse" id="adresse" value="<?php if(isset($adresse)){echo $adresse;}?>"/></p>
<p><label for="mdp">motdepasse </label>
<input type="text" name="mdp" id="mdp" value="<?php if(isset($mdp)){echo $mdp;}?>"/></p>
<br>
</div>
<fieldset style="width:950px;background:#8DC8FC;margin:auto">
	<?php require 'editeur-rep-mails-campagne.php'; ?>
</br>
  	<textarea style="width:950px; height:400px" rows="32" cols="90" name="message" id="message" wrap="virtual" onmouseover="this.focus();"><?php if(isset($mail_contenu)){echo $mail_contenu;}?></textarea>
</fieldset>
<p><input style="margin:auto;display:block" type="submit" value="Configurer l'Email"/></p>
</form>
		
		</div>
      <br><br><br><br><br>
	</body>
</html>