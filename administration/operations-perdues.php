<?php session_start();
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
         <h2 style="text-align:center">Opérations perdues</h2>
         <tbody>
         
            <tr>
               <td>
                  <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
               </td>
            </tr>
            <?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h2 style="text-align:center;margin:auto;color:red">'.$_SESSION['message'].'</h2>'; $_SESSION['message']="";} ?>
            </tbody>
         
   <section>
      <article>
      	<tbody>
      		<table style="margin:auto;">
<?php $non='non';
$ref='ref0';
$t=0;
$z=0;
$s=0;

    $req= $bdd->prepare('SELECT reduction, reference, titre, prix, quantite, sous_total, total, livraison, grand_total, acheteur, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE etat=?');
    $req->execute(array($non));  
while($donnees=$req->fetch()) { 
	
	
	if($donnees['reference'] == $ref){
		$p='faux';
		$z++;
		$s++;
		
	} else {
		$z++;
		$s=1;
		$p='vrai';
		$t++;
		echo '<br>'.'<p>'.'<a href="operation-perdues-erase.php?ref='.urlencode($donnees['reference']).'">'.'EFFACER CETTE OPERATION'.'</a>'.'</p>'.
		'<h2 style="color:blue;margin:auto;text-align:center">'.'Opération perdue N°'.$t.'</h2>'.
		'<p>'.'référence vente: '.htmlspecialchars($donnees['reference']).'</p>'.
		'<p>'.'<h5>'.'Vente à: '.htmlspecialchars($donnees['acheteur']).' du: '.htmlspecialchars($donnees['date_com']).'</h5>'.'</p>';
	}

	?>
		<p><span style="color:green">Produit n° <?php echo $s;?> :</span><?php echo htmlspecialchars($donnees['titre']);?></p>
		<p><?php echo htmlspecialchars($donnees['prix']);?>€</p>
		<p>quantite: <?php echo htmlspecialchars($donnees['quantite']);?></p>
		<p>sous-total: <?php echo htmlspecialchars($donnees['sous_total']);?>€</p>
<?php 
if(isset($donnees['reduction']) AND !empty($donnees['reduction'])){$reduction=htmlspecialchars($donnees['reduction']);}
if($p=='faux'){
	$k=1;
} else{ echo '<p>'.'Total = '.$donnees['total'].'€'.'</p>'.
    '<p>'.'Livraison = '.$donnees['livraison'].'€'.'</p>';
    if(isset($reduction) AND !empty($reduction)){echo '<p>'.'Réduction = '.$reduction.'€'.'</p>';}
    echo '<p>'.'Grand Total = '.$donnees['grand_total'].'€'.'</p>';
    $req2= $bdd->prepare('SELECT * FROM compte WHERE mail=?');
    $req2->execute(array($donnees['acheteur']));
    $donnees2=$req2->fetch();
    echo '<p>'.'Nom Acheteur: '.htmlspecialchars($donnees2['nom']).' ----   Prénom: '.htmlspecialchars($donnees2['prenom']).'</p>'.
  	'<p>'.htmlspecialchars($donnees2['pays_string']).'</p>';
}
$ref=$donnees['reference'];
} 
$req->closeCursor();
if(isset($req2)){$req2->closeCursor();}
?>
<p>
	<form method="post" action="operations-perdues-erase-all.php">
	<input type="hidden" value="all"/>
	<input type="submit" value="EFFACER TOUT"/>
</form>
  <br><br><br><br><br>
				</table>
			</tbody>
      	</article>
   	</section>
   	</div>  
   </body>
</html>