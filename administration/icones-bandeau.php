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
			<h2 style="text-align:center">Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
			<div style="width:600px;margin:auto;text-align:left">
			<p>1- Pour changer la photo présente sur la page contact <span style="color: blue">cochez Contact</span></p>
			<p>2- Pour changer l'icône visible sur les onglets de navigateur <span style="color: blue">cochez Icône</span> (~ 50px x 50px)</p>
			<p>3- Pour changer le Logo présent sur les factures <span style="color: blue">cochez Label Facture</span></p>
			<p>4- Pour changer le Bandeau visible dans les e-mails (tous les cients de messagerie ne l'affichent pas) <span style="color: blue">cochez Bandeau</span> (~ 400px x 180px { L x H })</p>
			<p>5- Pour changer l'icône Caddie préente sur le lien Panier <span style="color: blue">cochez Caddie</span> (~ 50px x 50px )</p>
			<p>6- Pour changer l'icône Monnaie <span style="color: blue">cochez Monnaie</span> (~ 50px x 50px )</p>
			<p>7- Pour changer l'icône Précisions cochez <span style="color: blue">Précisions</span> ( ~ 50px x 50px )</p>
			<p>8- Pour changer l'icône maison ou Accueil cochez <span style="color: blue">Accueil</span> ( ~ 50px x 50px )</p><br>
			<p>Pensez à <span style="color: red">effacer vos cookies</span> entre les affichages d'images !!!</p>
			</div>
			<form class="form_icons" action="ch-icons.php" method="post" enctype="multipart/form-data">
				<p>Quelle image interne changez-vous?</p>
				<div class="icones_ch">

		        <label for="contact">1-Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="changerImage" id="contact" value="contact"/></br>

				<label for="icone">2-Icône (png)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="icone" value="icone"/></br>

				<label for="labelF">3-Label Facture</label>&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="labelF"  value="labelF"/></br>

				<label for="bandeau">4-Bandeau</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="bandeau" value="bandeau"/></br>

				<label for="panier">5-Caddie</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="panier" value="caddie"/></br>
				
				<label for="panier2">6-Monnaie</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="panier2" value="monnaie"/></br>

				<label for="comments">7-Precisions</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="changerImage" id="comments" value="comments"/></br>

		        <label for="accueil">8-Accueil</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="changerImage" id="accueil" value="accueil"/></br></br>
		        <br><br>
				<p><label for="image">Sélectionnez image (<span style="color: red">.jpg pour 1, .png pour 2,3,4,5,6,7,8</span>) </label><br><br>
		        <input type="file" name="image" id="image"/></p>

		        <p><label for="description">Description de l'image</label>
		        <input type="text" name="description" id="description"/></p>

      			<input type="submit" value="Charger-image"/>
				</div>
			</form>

			
	</div>
    <br><br><br><br><br>
</body>
</html>