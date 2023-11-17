<?php session_start(); 

require 'boutique0.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:left">Compte listé</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
<?php 
$mail=htmlspecialchars($_GET['mail']);
$req = $bdd->prepare('SELECT * FROM compte WHERE mail=? ORDER BY id ');
$req->execute(array($mail));
$donnees = $req->fetch();
{ ?>
	<div>
		<h3 style="text-decoration:underline;text-align:left"><?php echo htmlspecialchars($donnees['nom']).' - '.htmlspecialchars($donnees['prenom']); ?></h3>
			<p>Mail : <?php echo htmlspecialchars($donnees['mail']); ?></p>
			<p>Confirme : <?php echo htmlspecialchars($donnees['confirme']); ?></p>
      <p>Clé de confirmation : <?php echo htmlspecialchars($donnees['confirmkey']); ?></p>
      <h4 style="text-decoration:underline">Adresse de Facturation :</h4>
      <p>Société : <?php echo htmlspecialchars($donnees['societe']); ?></p>
      <p>Adresse : <?php echo htmlspecialchars($donnees['adresse1']); ?></p>
      <?php if(isset($donnees['adresse2'])AND !empty($donnees['adresse2'])){echo '</p>'.'Complément d\'adresse : '.htmlspecialchars($donnees['adresse2']).'</p>';} ?>
      <p>CP : <?php echo htmlspecialchars($donnees['code_postal']); ?></p>
      <p>Ville : <?php echo htmlspecialchars($donnees['ville']); ?></p>
      <?php if(isset($donnees['stateOrProvince'])AND !empty($donnees['stateOrProvince'])){echo '</p>'.'State or Province : '.htmlspecialchars($donnees['stateOrProvince']).'</p>';} ?>
      <p>Pays : <?php echo htmlspecialchars($donnees['pays_string']); ?></p>
      <h4 style="text-decoration:underline">Adresse de Livraison: </h4>
      <p><?php echo htmlspecialchars($donnees['nom_livr']).' --- '.htmlspecialchars($donnees['prenom_livr']); ?></p>
      <p>Societe : <?php echo htmlspecialchars($donnees['societe_livr']); ?></p>
      <p>Adresse : <?php echo htmlspecialchars($donnees['adresse1_livr']); ?></p>
      <?php if(isset($donnees['adresse2_livr'])AND !empty($donnees['adresse2_livr'])){echo '</p>'.'Complément d\'adresse : '.htmlspecialchars($donnees['adresse2_livr']).'</p>';} ?>
      <p>CP : <?php echo htmlspecialchars($donnees['code_postal_livr']); ?></p>
      <p>Ville : <?php echo htmlspecialchars($donnees['ville_livr']); ?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])AND !empty($donnees['stateOrProvince_livr'])){echo '</p>'.'State or Province : '.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';} ?>
      <p>Pays : <?php echo htmlspecialchars($donnees['pays_livr_string']); ?></p>
    </br>
	</div>
  <br>
<?php
} 
$req->closeCursor();
?>
	<div>
    <a id="grey_color" href="comptes.php">Retour</a>
  </div>		
		</div>
      <br><br><br><br><br>
	</body>
</html>