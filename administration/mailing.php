<?php session_start(); 
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php require 'head-js-ch.php';
?>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">MAILING</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
			</div></br>
			<h4>Mailing</h4>
			<p style="text-align:left;margin:auto;width:650px">Ajouter les adresses et remplissez le texte d'email ainsi que le sujet, mettez à jour, lorsque vous choisissez "Envoyer les Emails", la campagne démarre, penser à effacer du Listing les adresses dont vous avez l'état à non, faîtes plutôt vos campagnes aux heures creuses afin de ne pas surcharger le serveur, rappellez vous que vous pouvez vous faire bloquer par votre hébergeur si vous êtes signalé comme <a style="color:blue" href="https://faq.o2switch.fr/lesplus-site/serveur-sortant-smtp">spammeur</a>. Evitez d'envoyer plus de 40 mails à la fois.</p>
<?php require 'bank-img-vid-mp3-8.php'; 
if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
$req = $bdd1->query('SELECT * FROM campagne ');
$donnees = $req->fetch();
?>
<form method="post" id="ch_form1" name="ch_form1" action="campagne-mail.php">
			<p><input type="hidden" name="campaign" id="campaign" value="<?php echo $donnees['contenu'];?>"/>
			<input id="grey_color" type="submit" value="Envoyer les Emails"/><p>
</form>
<p style="margin:auto;width:650px;height:1px;background-color:violet">
<form style="margin:auto;width:800px" method="post" action="mailing-charger-image.php" enctype="multipart/form-data">
			<p><label style="color:violet" for="subject">Sujet des Emails </label><input type="text" name="subject" id="subject" value="<?php echo $donnees['subject']; ?>"/></p>
      <div style="display:inline-block"><span style="margin-top:10px;margin-bottom:5px;padding:5px;background-color:#EFD5AB;display:block">Saut Ligne</span>
      <a style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="javascript:AddText('','<br>','');">br</a>
    </div>
    <div style="display:inline-block">
      <span style="display:block"><input id="voir" type="button" name="voir" value="image"/></span>
      <input style="display:block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none" id="cacher" type="button" name="cacher" value="CACHER"/>
   </div>
			<p><label style="color:blue" for="contenu">Contenu de l'Email</label></p>
<!--<textarea style="width:950px; height:900px" rows="32" cols="90" name="message" id="message" wrap="virtual" onmouseover="this.focus();"><?php echo $mail_init;?></textarea>-->
			<p><textarea cols="80" rows="14" name="contenu" id="contenu" wrap="virtual" onmouseover="this.focus();"><?php echo htmlspecialchars($donnees['contenu']); ?></textarea></p>		
			<p style="text-align:left;margin:auto;width:650px">Téléchargez l'image de Campagne uniquement ici, (width:300px obligatoire pour Responsive-Email)</p>
	<div style="display:inline-block; margin-right:20px;margin-left:auto">
				<?php if(isset($donnees['image'])AND !empty($donnees['image'])){ echo '<img style="width:150px" src="../publicimgs/'.$donnees['image'].'"/>';}?>
	</div>
	<div style="display:inline-block; margin-right:auto;margin-left:20px;vertical-align:top">
          <p><label for="image">Image (.jpg ou .png) | Max= 2Mo</label>
          <input type="file" name="image" id="image"/></p>
          <p><label for="nameF">Nom à donner à cette image (avec le .jpg ou le .png)</label>
          <input type="text" name="nameF" id="nameF" value="<?php echo $donnees['image'];?>"/></p>
    </div>
          <p style="text-align:center"><input type="submit" name="submit" value="Charger donnees d'Email"/></p>
</form>
		<br>
		<p style="margin:auto;width:650px;height:1px;background-color:violet">
		
<div style="margin-left:auto;margin-right:20px;display:inline-block;vertical-align:top">
	<h3>Comptes</h3>
<?php $i=0;
$req1=$bdd->query('SELECT * FROM compte');
while($donnees1=$req1->fetch()){
	$i++;
	echo '<p>'.'Email N°'.$i.' : '.'<span style="color:green">'.$donnees1['mail'].'</span>'.'</p>';
	echo '<p>'.'Newsletter (Accepte les Emails) : '.'<span style="color:violet">'.$donnees1['journalise'].'</span>'.'</p>';
	echo '<p>'.'<a style="color:blue;text-decoration:underline" href="journalise.php?email='.urlencode($donnees1['mail']).'">Repasser à l\'état "Newsletter::oui"'.'</a>'.'</p>';
	echo '<p>'.'<a style="color:blue;text-decoration:underline" href="adresses-campagne.php?email='.urlencode($donnees1['mail']).'">Ajouter à la liste'.'</a>'.'</p>'.'<br>';
}		
?>
</div>
<div style="margin-left:20px;margin-right:auto;display:inline-block;vertical-align:top">
	<h3 style="color:blue">Listing de campagne</h3>
	<?php $j=0;
$req2=$bdd1->query('SELECT * FROM adresses');
while($donnees2=$req2->fetch()){
	$j++;
	echo '<p>'.'Listing N°'.$j.' : '.'<span style="color:green">'.$donnees2['email'].'</span>'.'</p>';
	echo '<p>'.'<a style="color:blue" href="campagne-erase.php?email='.urlencode($donnees2['email']).'">Effacer du listing'.'</a>'.'</p>'.'<br>';
}		
?>
</div>

		</div>
      <br><br><br><br><br>
	</body>
</html>