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
			<h2 style="text-align:center">Effacer le PDF</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br></br>
      <h4 style="width:800px; margin:auto">Pour des raisons de codage, le nom du pdf sera conservé dans la Base jusqu'à ce que vous en chargiez un autre, ceci peut provoquer des erreurs de téléchargement, préparez un PDF au plus tôt. le PDF est enregister dans le publicimgs/ répertoire</h4>
<?php $req=$bdd->query('SELECT * FROM pdf');
$donnees=$req->fetch();
  ?>
  <p><img style="width:200px" src="../publicimgs/pdf_icon.png"/><p></br>
  <p>Nom du PDF : <?php echo $donnees['nom']; ?></p>
  <p>Description : <?php echo $donnees['description'];?><p>
  <a id="grey_color" href="effacer-pdf.post.php?id=<?php echo urlencode($donnees['id']); ?>">Effacer</a></p>
  </br>

    </div>
      <br><br><br><br><br>
  </body>
</html>