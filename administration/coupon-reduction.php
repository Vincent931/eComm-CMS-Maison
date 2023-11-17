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
			<h2 style="text-align:center">Ajouter un Coupon Réduction</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
      <p>Entrez le minimum d'achat (tout compris même livraison) pour bénéficier du Coupon Réduction et le Code de ce coupon (disponible sur la page Recap.php si il existe)</p></br>
        <?php require 'boutique0.php';
        $req=$bdd->query('SELECT * FROM reduction');
        $donnees=$req->fetch();?>
        <form style="text-align:right;margin:auto;width:550px" method="post" action="coupon-reduction.list.php">
          <p><label for="coupon">Code du coupon</label>
          <input type="text" name="coupon" id="coupon" value="<?php echo $donnees['coupon'];?>"/></p>
          <p><label for="valeur">Valeur (ex:5.00)</label>
          <input type="text" name="valeur" id="valeur" value="<?php echo $donnees['valeur'];?>"/></p>
          <p><label for="minimum">Minimum d'achat applicable (ex:85.00)</label>
          <input type="text" name="minimum" id="minimum" value="<?php echo $donnees['minimum'];?>"/></p>
          <p style="text-align:center"><input type="submit" name="submit" value="Charger"/></p>
          <p style="text-align:center"><a href="coupon-effacer.php?id=<?php echo urlencode($donnees['id']);?>" id="grey_color">Effacer</a></p>
          </form>
</div>
  <br><br><br><br><br>
  </body>
</html>