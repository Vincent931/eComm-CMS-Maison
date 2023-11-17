<?php session_start();
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html>
<?php require 'head.php';?>
  	<body>
      	<h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
         <h2 style="text-align:center">Produits Vendus - Acheteurs </h2>
         <tbody>
            <tr>
               <td>
                  <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
               </td>
            </tr>
        </tbody>
        <?php
if(isset($_GET['ref']) AND isset($_GET['mail']) AND !empty($_GET['ref']) AND !empty($_GET['mail'])){
$ref=urldecode($_GET['ref']);
$acheteur=urldecode($_GET['mail']);?>
        <div style="text-align:right;width:450px;margin:auto">
      		<form method="post" action="">
      			<p><label for="reduction">Réduction (du type 1.52) </label><input type="text" name="reduction" id="reduction" value="<?php if (isset($reduction) AND !empty($reduction)){echo $reduction;}?>"/>
      				<input type="submit" value="Réduire"/>
      			</p>
      		</form>
      		<form method="post" action="annul-reduction.php">
      			<input type="hidden" name="mail" id="mail" value="<?php echo $acheteur;?>"/>
      			<input type="hidden" name="ref" id="ref" value="<?php echo $ref;?>"/>
      			<p><input type="submit" value="Annuler Réductions"/></p>
      		</form>
      	</div>
<h3 style="text-align:center">Produits vendus et Totaux</h3>
	<p>Toutes les ventes directes sont à user@mail.com</p>
	<?php
    $req= $bdd->prepare('SELECT devise, ref_obj, obs_url, reduction, reference, img_type, cle_image, titre, prix, quantite, sous_total, total,  livraison, grand_total, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE reference=? AND acheteur=?');
    $req->execute(array($ref, $acheteur));  
while($donnees=$req->fetch()){
	?>
	<div class="conteneur_produita">


		<div class="bla">
<?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){ ?>		
	<img style="width:120px;height:120px;text-align:center;margin:auto" src="../publicimgs/<?php echo $donnees['cle_image'];?>">
<?php }
 if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){ ?><iframe style="width:120px;height:120px;text-align:center;margin:auto" <?php echo $donnees['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} 
	if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){ ?>
	<video style="width:120px;height:120px;text-align:center;margin:auto" src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?>
		</div>
		<div class="bla"><span style="color:blue">Vente à: <?php echo $acheteur;?> du: <?php echo htmlspecialchars($donnees['date_com']);?></span></div>
		<div class="bla">Produit: <?php echo htmlspecialchars($donnees['titre']);?></div>
		<div class="bla">Référence Objet: <?php echo htmlspecialchars($donnees['ref_obj']);?></div>
		<div class="bla">Observations: (ex:url) <a href="<?php echo htmlspecialchars($donnees['obs_url']);?>" target="_blank"><?php echo htmlspecialchars($donnees['obs_url']);?></a></div>
		<div class="bla"><?php echo htmlspecialchars($donnees['prix']);if(isset($donnees['devise']) AND $donnees['devise']!='USD'){echo ' €';} else{echo ' $';} ?></div>
		<div class="bla">quantite: <?php echo htmlspecialchars($donnees['quantite']);?></div>
		<div class="bla">sous-total: <?php echo htmlspecialchars($donnees['sous_total']);if(isset($donnees['devise']) AND $donnees['devise']!='USD'){echo ' €';} else{echo ' $';} ?></div>
      	<div class="bla">référence vente: <span style="color:blue"><?php echo htmlspecialchars($donnees['reference']);?></span></div>
<?php
	$req1= $bdd->prepare('SELECT quantite FROM produits WHERE titre=?');
	$titre=htmlspecialchars($donnees['titre']);
	$req1->execute(array($titre));
	$donnees1=$req1->fetch();
	$stock=htmlspecialchars($donnees1['quantite']);
	?>
		<div class="bla">Reste en stock: <span style="color:green"><?php echo $stock;?></span></div>
		<br>
	</div>

<?php 
$livraison= htmlspecialchars($donnees['livraison']);
$grand_total=htmlspecialchars($donnees['grand_total']);
$_SESSION['devise']=$donnees['devise'];
} 
$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=:reference');
$req3->execute(array('reference'=>$ref));
while($donnees3=$req3->fetch()){
	$_SESSION['reduction']=$donnees3['reduction'];
	$_SESSION['total']=$donnees3['total'];
}
if(isset($_POST['reduction']) AND !empty($_POST['reduction'])){
	$reduction=$_POST['reduction'];

} else {$reduction=0.00;}
$totalv=$_SESSION['total'];
$_SESSION['reduction']=number_format($_SESSION['reduction']+$reduction,2,'.','');
$grand_total=number_format($_SESSION['total']-$_SESSION['reduction'],2,'.','');
?>
<div style="margin:auto;width:400px;text-align:right">
    <p>Total = <span style="color:blue"><?php echo $totalv;if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></span></p>
	<p>Livraison = 0.00<?php if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></p>
     <?php if(isset($reduction) AND !empty($reduction)){echo '<p>'.'Réduction = '.'<span style="color:red">'.$_SESSION['reduction'];if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';}echo '</span>'.'</p>';}?>
    <p>Grand Total = <span style="color:blue"><?php echo $grand_total;if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></span></p>
	<p style="height:5px">&nbsp;</p>
	<p style="text-align:center;margin:auto"><a id="grey_color" href="valid-direct-command.php?ref=<?php echo $ref;?>&mail=<?php echo $acheteur;?>">Valider cette commande</a></p>
</div>
<?php 
$req2=$bdd->prepare('UPDATE commande SET reduction=:reduction, grand_total=:grand_total WHERE reference=:reference');
$req2->execute(array('reduction'=>$_SESSION['reduction'], 'grand_total'=>$grand_total, 'reference'=>$ref));
$req->closeCursor();
if(isset($req1)){$req1->closeCursor();}
if(isset($req2)){$req2->closeCursor();}
if(isset($req3)){$req3->closeCursor();}
?>
<p style="height:5px">&nbsp;</p>
<p style="width:400px;margin:auto"><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="<?php echo $ste['url'];?>/administration/facture-vendeur.php?mail=<?php echo urlencode($acheteur);?>&ref=<?php echo urlencode($ref);?>" alt="user" target="_blank">Editer une facture</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="<?php echo $ste['url'];?>/administration/bon-livraison.php?mail=<?php echo urlencode($acheteur);?>&ref=<?php echo urlencode($ref);?>" alt="user" target="_blank">Editer un bon de Livraison</a>
</p>
<?php
} else {echo "Un problème est survenu, contacter un développeur.";}
?>
<br><br><br><br><br>
   </body>
</html>