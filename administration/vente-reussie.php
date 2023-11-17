<?php session_start();
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$totalv="";
$livraison="";
$grand_total="";
$ref2="";
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
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
         
   <section>
      <article>
      	<tbody>
<?php
if(isset($_GET['ref']) AND isset($_GET['mail']) AND !empty($_GET['ref']) AND !empty($_GET['mail'])){
    $ref=urldecode($_GET['ref']);
    $acheteur=urldecode($_GET['mail']);
	?><h3 style="text-align:center">Produits vendus et Totaux</h3>
	<?php
    $req= $bdd->prepare('SELECT devise, ref_obj, obs_url, reduction, reference, ref2, img_type, cle_image, titre, prix, quantite, sous_total, total,  livraison, grand_total, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE reference=? AND acheteur=?');
    $req->execute(array($ref, $acheteur));  
while($donnees=$req->fetch()){
	?><table style="margin:auto;">
		<tr>
			<td colspan="3"><h5>Vente à: <?php echo $acheteur;?> du: <?php echo htmlspecialchars($donnees['date_com']);?></h5></td>
		</tr>
		<tr>
			<td><?php if(isset($donnees['img_type']) AND $donnees['img_type']=="image"){ ?>		
	<img style="width:120px;height:120px;text-align:center;margin:auto" src="../publicimgs/<?php echo $donnees['cle_image'];?>">
<?php }
 if(isset($donnees['img_type']) AND $donnees['img_type']=="youtube"){ ?><iframe style="width:120px;height:120px;text-align:center;margin:auto" <?php echo $donnees['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} 
	if(isset($donnees['img_type']) AND $donnees['img_type']=="video"){ ?>
	<video style="width:120px;height:120px;text-align:center;margin:auto" src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?></td>
		</tr>
		<?php if(isset($donnees['ref2']) AND substr($donnees['ref2'],0,5)=="click"){ ?>
		<tr>
			<td colspan="3"><h5 style="border:1px solid gray">Click & Collect</h5></td>
		</tr>
	<?php
	$ref2=$donnees['ref2'];
	} 
	?>
		<tr>
			<td colspan="3">Produit: <?php echo htmlspecialchars($donnees['titre']);?></td>
		</tr>
		<tr>
			<td colspan="3">Référence Objet: <?php echo htmlspecialchars($donnees['ref_obj']);?></td>
		</tr>
		<tr>
			<td colspan="3">Observations: (ex:url) <a href="<?php echo htmlspecialchars($donnees['obs_url']);?>" target="_blank"><?php echo htmlspecialchars($donnees['obs_url']);?></a></td>
		</tr>
		<tr>
			<td><?php echo htmlspecialchars($donnees['prix']);if(isset($donnees['devise']) AND $donnees['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
		</tr>
		<tr>
			<td>quantite: <?php echo htmlspecialchars($donnees['quantite']);?></td>
		</tr>
		<tr>
			<td>sous-total: <?php echo htmlspecialchars($donnees['sous_total']);if(isset($donnees['devise']) AND $donnees['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
      	</tr>
      	<tr>
      	<td>référence vente: <?php echo htmlspecialchars($donnees['reference']);?></td>
		</tr>

	<?php 
	$req1= $bdd->prepare('SELECT quantite FROM produits WHERE titre=?');
	$titre=$donnees['titre'];
	$req1->execute(array($titre));
	$exist=$req1->rowCount();
	if($exist>0){
	$donnees1=$req1->fetch();
	$stock=htmlspecialchars($donnees1['quantite']);
	?>
	<tr>
		<td colspan="3">Reste en stock: <?php echo $stock;?></td>
	</tr>
	</br/>
	</table>
<?php } ?>
<?php $totalv=htmlspecialchars($donnees['total']);
$livraison= htmlspecialchars($donnees['livraison']);
if(isset($donnees['reduction']) AND !empty($donnees['reduction'])){$reduction=htmlspecialchars($donnees['reduction']);}
$grand_total=htmlspecialchars($donnees['grand_total']);
$_SESSION['devise']=$donnees['devise'];
} ?>
<table style="margin:auto">
    <tr>
		<td>Total = <?php echo $totalv;if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
	</tr>
    <tr>
        <td>Livraison = <?php echo $livraison; if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
    </tr>
     <?php if(isset($reduction) AND !empty($reduction)){echo '<tr>'.
        '<td>'.'Réduction = '.$reduction;if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';}echo '</td>'.
    '</tr>';}?>
    <tr>
        <td>Grand Total = <?php echo $grand_total;if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
    </tr>
    <?php if(isset($ref2) AND substr($ref2,0,5)=="click"){ ?>
		<tr>
			<td>Click & Collect = <?php echo "5.00";if(isset($_SESSION['devise']) AND $_SESSION['devise']!='USD'){echo ' €';} else{echo ' $';} ?></td>
		</tr>
	<?php } ?>
	</br>
	<tr><td>&nbsp;</td>
	</tr>
	<?php if(isset($ref2) AND substr($ref2,0,5)=="click" AND (substr($ref2,0,13)!="clickpaytotal" AND (substr($ref2,0,17)!="clickpaytotalpayé"))){ ?>
	<tr>
		<td><a id="grey_color" href="valid-command.php?ref=<?php echo $ref;?>&mail=<?php echo $acheteur;?>">Valider cette commande (5.00€)</a> (!!! Vérifiez si crédité !!! )</td>
	</tr>
<?php } elseif((substr($ref2,0,5)=="click") AND (substr($ref2,0,17)=="clickpaytotal")){
?>
	<tr>
		<td><a id="grey_color" href="valid-command.php?ref=<?php echo $ref;?>&mail=<?php echo $acheteur;?>&paytotal=total">Valider cette commande (TOTAL)</a> (!!! Vérifiez si crédité !!! )</td>
	</tr>
<?php
}
elseif(substr($ref2,0,5)=="click" AND (substr($ref2,0,17)=="clickpaytotalpaye")){
	?>
	<tr>
		<td style="color:blue">Commande payée intégralement</td>
	</tr>
<?php } elseif(substr($ref2,0,8)!="totalvel"){
	?><tr>
		<td><a id="grey_color" href="valid-command.php?ref=<?php echo $ref;?>&mail=<?php echo $acheteur;?>&paytotal=totalvel">Valider cette commande</a> (!!! Vérifiez si crédité !!! )</td>
	</tr>
<?php } else {?>
	<tr>
		<td>Commande validée et encaissée</td>
	</tr>
<?php } ?>
</table>
<?php
	$req2= $bdd->prepare('SELECT * FROM compte WHERE mail=?');
    $req2->execute(array($acheteur));
    $donnees=$req2->fetch();
    ?>
    <table style="margin:auto;">
    <tr><td colspan="2"><h3 style="text-align:center">CLIENT</h3></td></tr>
	<tr><td colspan="2">Nom Acheteur: <?php echo htmlspecialchars($donnees['nom']).'   Prénom: '.htmlspecialchars($donnees['prenom']);?></td></tr></br>
	<tr><td colspan="2">Société: <?php echo htmlspecialchars($donnees['societe']);?></td></tr>
	<tr><td colspan="2">Adresse: <?php echo htmlspecialchars($donnees['adresse1']);?></td></tr>
	<tr><td colspan="2"><?php echo htmlspecialchars($donnees['adresse2']);?></td></tr>
	<tr><td colspan="2"><?php echo htmlspecialchars($donnees['code_postal']).'   '.htmlspecialchars($donnees['ville']);?></td></tr>
  <?php if(isset($donnees['stateOrProvince'])AND !empty($donnees['stateOrProvince'])){echo'<tr>'.'<td>'.$donnees['stateOrProvince'].'</td>'.'</tr>';}?>
  <tr><td colspan="2"><?php echo htmlspecialchars($donnees['pays_string']);?></td></tr>
	</br>
	<tr><td colspan="2"><h3 style="text-align:center">Adresse de Livraison </h3></td></tr>
	<tr><td colspan="2">Nom Client à livrer: <?php echo htmlspecialchars($donnees['nom_livr']).'   Prénom: '.htmlspecialchars($donnees['prenom_livr']);?></td></tr>
	<tr><td colspan="2">Société: <?php echo htmlspecialchars($donnees['societe_livr']);?></td></tr>
	<tr><td colspan="2">Adresse: <?php echo htmlspecialchars($donnees['adresse1_livr']);?></td></tr>
	<tr><td colspan="2"><?php echo htmlspecialchars($donnees['adresse2_livr']);?></td></tr>
	<tr><td colspan="2"><?php echo htmlspecialchars($donnees['code_postal_livr']).'   '.htmlspecialchars($donnees['ville_livr']);?></td></tr>
  <?php if(isset($donnees['stateOrProvince_livr'])AND !empty($donnees['stateOrProvince_livr'])){echo'<tr>'.'<td colspan="2">'.$donnees['stateOrProvince_livr'].'</td>'.'</tr>';}?>
  <tr><td colspan="2"><?php echo htmlspecialchars($donnees['pays_livr_string']);?></td></tr>
<?php
if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
if(isset($req2)){$req2->closeCursor();}
?><tr><td><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="facture-vendeur.php?mail=<?php echo urlencode($acheteur);?>&ref=<?php echo urlencode($ref);?>" alt="user" target="_blank">Editer une facture</a></td>
<td><a id="grey_color" style="border:1px solid black;color:black;text-decoration:none" href="bon-livraison.php?mail=<?php echo urlencode($acheteur);?>&ref=<?php echo urlencode($ref);?>" alt="user" target="_blank">Editer un bon de Livraison</a></td></tr>
</table>
<?php
} else {echo "Un problème est survenu, contacter un développeur.";}
?>
  <br><br><br><br><br>
			</tbody>
      	</article>
   	</section>
   	</div>

      
   </body>
</html>