<?php session_start();
require 'boutique0.php';
require 'texte1.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php require 'head-js-ch.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Changer email Réinitialisation de compte</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p style="width:950px;margin:auto;text-align:left">Ne mettez pas d'accents et de code HTML sauf <?php $chaine="<br>";echo htmlentities($chaine); ?> liens : <?php $chaine="<a href=\"https://monsite-exemple.fr\"> On Clic </a> ";echo htmlentities($chaine); ?> et image <?php $chaine="<img src=\"../publicimgs/exemple.jpg\"/>";echo htmlentities($chaine); ?> autorisés. Effacez ;border-radius:10px/10px;border:1px solid black pour obtenir une image sans bord arrondies dans les coins. Les images doivent faire 300px maximum pour passer sur les emails de smartphone. <a href="https://resizeimage.net/" style="text-decoration:underline;color:blue">Redimensionner une image ici</a></p><br>
      <?php 
      $req20=$bdd1->query('SELECT reinitialisation FROM mails');
      $mail=$req20->fetch();
      $mail_reinit=$mail['reinitialisation'];
       require 'bank-img-vid-mp3-7.php';?>
       <br><br>
<form method="post" name="ch_form" id="ch_form" action="mail-reinit-ch.list.php">
  <input style="margin:auto;display:block" type="submit" value="changer"/>
<br>
<fieldset style="width:950px;background:#8DC8FC;margin:auto">
	<?php require 'editeur-rep-mails.php'; ?>
</br>
  	<textarea style="width:950px; height:900px" rows="32" cols="90" name="message" id="message" wrap="virtual" onmouseover="this.focus();"><?php echo $mail_reinit;?></textarea>
</fieldset>
</form>		
		</div>
      <br><br><br><br><br>
	</body>
</html>