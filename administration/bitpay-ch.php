<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Configurer Bitpay</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<p>Vous pouvez ajouter les paiements en cryptos avec Bitpay <a style="color:blue;text-decoration:underline" target="_blank" href="https://bitpay.com/">ici</a></p>
			<br>
			<h4>Bitpay</h4>
			<p style="width:600px;margin:auto; text-align:left">Créez votre compte, téléchargez un svg de votre logo,(situé dans https://monsite.com/publicimgs/nomlogo.svg), ajoutez votre compte bancaire sur le site, lancez https://monsite.com/bitpay/vendor/test/, entrez le pairing-code et son Label sur le dashbord bitpay et dans ce formulaire, puis demander un compte marchand sur <a href="https://bitpay.com/request-help/wizard">https://bitpay.com/request-help/wizard</a>, Précisez l'adresse du svg et demander un merchant account, vous aurez une réponse dans les jours qui suivent.</p><?php $intitule="svg"; 
			$req2=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
			$req2->execute(array($intitule));
			$donnees2=$req2->fetch();?>
			<form style="text-align:right;margin:auto;width:600px" method="post" action="charger-svg.php" enctype="multipart/form-data">
				<?php if(isset($donnees2['nom']) AND !empty($donnees2['nom'])){
					echo '<p>'.'<img style="width:120px;text-align:center;matgin:auto" src="../publicimgs/'.$donnees2['nom'].'"'.'</p>';
				}?>
	          <p><label for="image">Image (.svg) | Max= 2Mo</label>
	          <input type="file" name="image" id="image"/></p>
	          <p><label for="nameF">Nom à donner à cette image (sans le .svg)</label>
	          <?php $long=strlen($donnees2['nom'])-4;?>
	          <input type="text" name="nameF" id="nameF" value="<?php echo substr($donnees2['nom'], 0, $long);?>"/></p>
	          <p><label for="description">Description de l'image</label>
	          <input type="text" name="description" id="description" value="<?php echo $donnees2['description'];?>"/></p>
	          <p style="text-align:right"><input type="submit" name="submit" value="Charger"/></p>
	        </form>
			<?php $req=$bdd->query('SELECT * FROM bitpay');
			$donnees=$req->fetch();
			?>
			<form method="post" action="bitpay-config.php" style="text-align:right;width:600px; margin:auto">
				<p>Utilisez Bitpay (vous devez avoir créé votre compte)
					<input type="radio" name="exist" value="oui" id="oui" <?php if($donnees['exist']=="oui"){echo "checked";}?>/><label for="oui">Oui</label>
					<input type="radio" name="exist" value="non" id="non" <?php if($donnees['exist']!="oui"){echo "checked";}?>/><label for="non">Non</label>
				</p>
				<p>
					<label for="passW">Mot de Passe (lettres et chiffres uniquement):</label>
					<input type="text" name="passW" id="passW" value="<?php echo $donnees['passW'];?>"/>
				</p>
				<p>
					<label for="pairing_code">Pairing code:</label>
					<input type="text" name="pairing_code" id="pairing_code" value="<?php echo $donnees['pairing_code'];?>"/>
				</p>
				<p>
					<label for="label">Label</label>
					<input type="text" name="label" id="label" value="<?php echo $donnees['label'];?>"/>
				</p>
				<p>
					<label for="nom_doss">Donnez un nom de dossier pour sauver les clés (ex: sgqhvbcdhedjlnsxazsa)</label>
					<input type="text" name="nom_doss" id="nom_doss" value="<?php echo $donnees['nom_doss'];?>"/>
				</p>
				<p>
					<input type="submit" value="Envoyer"/>
				</p>
		</div>
      <br><br><br><br><br>
	</body>
</html>