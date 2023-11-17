<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
$_SESSION['count']=0;
$_SESSION['count1']=0;
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
			<p>Vous pouvez a jouter un paiement par chèque avec bon de commande </p>
			<br>
			<h4>Par Chèque</h4>
			<?php $req3=$bdd1->query('SELECT * FROM cheque');
			$donnees3=$req3->fetch();?>
				<form method="post" action="cheque-ch.list.php" style="width:600px;margin:auto;text-align:right">
				<p>Utilisez le paiement par chèque: <label for="oui">oui</label><input type="radio" name="exist" id="oui" value="oui" <?php if (isset($donnees3['exist']) AND ($donnees3['exist']=='oui')){echo 'checked';}?>/><label for="non">non</label><input type="radio" name="exist" id="non" value="non" <?php if (isset($donnees3['exist']) AND ($donnees3['exist']=='non')){echo 'checked';}?>/></p>
				<p><label for="prenom">Prénom </label><input type="text" name="prenom" id="prenom" value="<?php if (isset($donnees3['prenom'])){echo $donnees3['prenom'];}?>"/></p>
				<p><label for="nom">Nom </label><input type="text" name="nom" id="nom" value="<?php if (isset($donnees3['nom'])){echo $donnees3['nom'];}?>"/></p>
				<p><label for="societe">Société </label><input type="text" name="societe" id="societe" value="<?php if (isset($donnees3['societe'])){echo $donnees3['societe'];}?>"/></p>
				<p><label for="adresse1">Adresse1 </label><input type="text" name="adresse1" id="adresse2" value="<?php if (isset($donnees3['adresse1'])){echo $donnees3['adresse1'];}?>"/></p>
				<p><label for="adresse2">Adresse2 </label><input type="text" name="adresse2" id="adresse2" value="<?php if (isset($donnees3['adresse2'])){echo $donnees3['adresse2'];}?>"/></p>
				<p><label for="CP">Code Postal </label><input type="text" name="CP" id="CP" value="<?php if (isset($donnees3['CP'])){echo $donnees3['CP'];}?>"/></p>
				<p><label for="ville"> Ville </label><input type="text" name="ville" id="ville" value="<?php if (isset($donnees3['ville'])){echo $donnees3['ville'];}?>"/></p>
				<p><label for="pays">Pays </label><input type="text" name="pays" id="pays" value="<?php if (isset($donnees3['pays'])){echo $donnees3['pays'];}?>"/></p>
				<p><label for="RCS">N° RCS </label><input type="text" name="RCS" id="RCS" value="<?php if (isset($donnees3['RCS'])){echo $donnees3['RCS'];}?>"/></p>
    			<p><label for="ville_RCS">Ville d'enregistrement du RCS </label><input type="text" name="ville_RCS" id="ville_RCS" value="<?php if (isset($donnees3['ville_RCS'])){echo $donnees3['ville_RCS'];}?>"/></p>
				<p style="text-align:center"><input class="grey_color" type="submit" value="Envoyer" /></p>
			</form>	
		</div>
      <br><br><br><br><br