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
			<h2 style="text-align:center">Ajouter compte</h2>
			<div id="boutons_connect">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>

			</div></br>
			
<?php
if(isset($_SESSION['message'])){echo '<h3 style="background-color:white;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}
?>

			<p>1 compte peut être ajouté manuellement</p>
			<form style="width:550px;margin:auto;text-align:right" method="POST" action="ajouter-compte.list.php">

				<p><label for="mail">e-Mail </label>
				<input type="text" name="mail" id="mail"/></p>

				<p><label for="nom">Nom </label>
				<input type="text" name="nom" id="nom"/></p>
				
				<p><label for="prenom">Prénom </label>
				<input type="text" name="prenom" id="prenom"/></p>
 				
				<p style="text-align:center"><input style="border:1px solid black;vertical-align:top;margin-top:15px" type="submit" value="Ajouter"/></p>
				
			</form>
		</div>
		  <br><br><br><br><br>
	</body>
</html>