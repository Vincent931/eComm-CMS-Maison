<?php session_start();

require 'boutique0.php';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>$(document).ready(function(){      
$("#voir").click(function() {
   $( "#vu_stock" ).css( 'display', 'block' )});
$("#cacher").click(function() {
   $( "#vu_stock" ).css( 'display', 'none' )})
});
</script> 
</br></br></br></br>
         <h2 style="text-align:center">Stock - Factures - </h2>
         <div id="boutons_connect">
            <tr>
               <td>
                  <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
               </td>
            </tr>
         </div></br>
   <section>
      <article>
         <h2 style="color:red;text-align:center;margin:auto"><?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo $_SESSION['message'];$_SESSION['message']="";} ?></h2>
         <h4 style="text-align:center">Produits en stock</h4>
<p><input id="voir" type="button" name="voir" id="voir" value="VOIR STOCK"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="cacher" type="button" name="cacher" value="CACHER"/></p>
<div id="vu_stock">
<?php

$req = $bdd->query('SELECT id, montant, DATE_FORMAT(date_incident, \'%d/%m/%Y\') AS date_incident FROM incident_paiement');
      while($donnees = $req->fetch()){
echo '<div style="margin:auto">'.'<h3 style="color:red;text-align:center">'.'WARNING !!!'.'</h3>'.'<p>'.' Incident de Paiement - Paiement en plusieurs fois le : '.htmlspecialchars($donnees['date_incident']).'</p>'.'</div>';
}

   $req1 = $bdd->query('SELECT id, cle_image, titre, prix, quantite FROM produits');
      while($donnees1 = $req1->fetch()){
?></br> 

         <table>
            <tr>
               <td>ID : <?php echo $donnees1['id'];?></td>
               <td><img style="width:100px" src="../publicimgs/<?php echo $donnees1['cle_image'];?>"/></td>
               <td>produit: <?php echo htmlspecialchars($donnees1['titre']);?></td> 
               <td>Prix: <?php echo htmlspecialchars($donnees1['prix']);if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></td>
            </tr>
            <tr>
               <td> </td>
               <td>Quantite : <?php echo htmlspecialchars($donnees1['quantite']); ?></td><form method="post" action="change-stock.php"><input type="hidden" name="titre" id="titre" value="<?php echo $donnees1['titre'];?>"/><td><input style="width:45px" type="number" name="augmenter" id="augmenter"/><input type="submit" value="Ajouter"/></td><td><input  style="width:45px" type="number" name="reduire" id="reduire"/><input type="submit" value="Réduire"/></td></form>
            </tr></br>
         </table>
         <p style="height:1px;background-color:blue;width:85%;margin:auto;text-align:center">&nbsp;</p>
<?php      } ?>
</div>
         <h4>Ventes totales</h4>
<?php 
$ref="1";
   $req2 = $bdd->prepare('SELECT reference, etat, acheteur, DATE_FORMAT(date_com, \'%d/%m/%Y\') AS date_com FROM commande WHERE reference =?');
   $req2->execute(array($_SESSION['reference']));
      while($donnees2 = $req2->fetch()){
if(isset($ref)AND !empty($ref)){
   if($ref!=$donnees2['reference']){
      $ref=$donnees2['reference'];?>
         <table>
            <tr>
               <td><?php if($donnees2['etat']=='oui'){echo '<span style="border:1px solid gray">'.'Vente Validée'.'</span>';}else{echo '<span style="border:1px solid gray">'.'vente Non Validée'.'</span>';}?> du <?php echo $donnees2['date_com'];?> <a style="text-decoration:underline" href="vente-directe-reussie.php?mail=<?php echo htmlspecialchars(urlencode($donnees2['acheteur']));?>&ref=<?php echo htmlspecialchars(urlencode($donnees2['reference'])) ?>" target="_blank">N° Référence : <?php echo htmlspecialchars($donnees2['reference']); ?></a></td>
            </tr>
            <tr>
               <td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a id="grey_color" style="text-decoration:none;border:1px solid black" href="effacer-vente.php?mail=<?php echo htmlspecialchars(urlencode($donnees2['acheteur']));?>&ref=<?php echo htmlspecialchars(urlencode($donnees2['reference'])) ?>">Effacer cette commande</a></td></tr>
         </table>
      </br>
  <?php  
}
}
} 
 
$req->closeCursor();
$req1->closeCursor();
$req2->closeCursor();
?>   
  <br><br><br><br><br>
      </article>
   </section>
   
   </body>
</html>
