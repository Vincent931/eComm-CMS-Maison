<?php session_start();

//////////////////////////////////////////////////
//////////////////////////////////////// mail achat
require 'texte1.php';

require 'boutique0.php';


$req21=$bdd1->query('SELECT vente FROM mails');
$mails=$req21->fetch();
$mail_vente=$mails['vente'];

$req22=$bdd1->query('SELECT * FROM societe');
$ste=$req22->fetch();
$nom_ste=$ste['nom'];

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();

$mail_ste=$ste['mail'];

$url_ste=$ste['url'];

$serveur_mail=$ste['serveur_mail'];

$mdp=$ste['mdp'];

$reference=$_SESSION['reference'];

$int='bandeau-mail';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];

require '../customer/mail-achat.php';
////////////////////////////////////////
///////////////////////////////////////////////////




$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}

if(isset($_POST['coupon']) AND !empty($_POST['coupon'])){
  
  
        
  $req4=$bdd->query('SELECT * FROM reduction');
  $donnees4=$req4->fetch();
  if(isset($donnees4['coupon']) AND !empty($donnees4['coupon'])){
    if($_POST['coupon']==$donnees4['coupon']){
      $req8=$bdd->prepare('SELECT* FROM nbre_reduction WHERE reference=?');
      $req8->execute(array($_SESSION['reference']));
      $donnees7=$req8->fetch();
      if($donnees7['nbre']==1){
      $reduction=$donnees4['valeur'];
      $req6=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
      $req6->execute(array($_SESSION['reference']));
        while($donnees6=$req6->fetch()){
          $plancher=$donnees6['grand_total'];
        }
        if($donnees4['minimum']<=$plancher){
        $req6=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
        $req6->execute(array($_SESSION['reference']));
          while($donnees6=$req6->fetch()){
          
          $grand_total=$donnees6['grand_total']-$reduction;

          $req5=$bdd->prepare('UPDATE commande SET reduction=:reduction, grand_total=:grand_total WHERE reference=:reference');
          $req5->execute(array('reduction'=>$reduction,'grand_total'=>$grand_total, 'reference'=>$_SESSION['reference']));

          $req9=$bdd->prepare('UPDATE nbre_reduction SET nbre=:nbre WHERE reference=:reference');
          $req9->execute(array('nbre'=>0, 'reference'=>$_SESSION['reference']));

          } 
        } else{ $_SESSION['message_spe']="Vous n'avez pas atteint le minimum d'achat pour bénéficier de cette réduction";}
      } else{$_SESSION['message_spe']="Votre réduction est déjà prise en compte";}
    } else{$_SESSION['message_spe']="Votre Bon de réduction n'est pas valable, Vérifier la mise en forme";}
  }
}


$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req3=$bdd->prepare('SELECT * FROM commande WHERE reference=?');
$req3->execute(array($_SESSION['reference']));
$donnees3=$req3->fetch();

///
$paypal="paypal";
$non='non';
$req2=$bdd->prepare('UPDATE commande SET mac=:mac WHERE reference=:reference AND etat=:etat');
$req2->execute(array('mac'=>$paypal, 'reference'=>$_SESSION['reference'], 'etat'=>$non));
?>

<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div id="recap">

  <div id="containair">
     <div id="banniere1"><span id="span_ban1">Coordonnées</span></div>
     <div id="banniere2"><span id="span_ban2">Livraison</span></div>
     <div id="banniere_select"><span id="span_select">Récapitulatif</span></div>
     <div id="banniere4"><span id="span_ban4" style="">Paiement</span></div>
</div>
<br><br>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
<div id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div id="paiement_cb"><img id="paiement_image" src="../publicimgs/bouton_paiement.png"/><h3 style="text-decoration:underline">Validation de commande</h3></div>
<br><?php $req7=$bdd->query('SELECT * FROM reduction');
  $donnees7=$req7->fetch();
  if(isset($donnees7['coupon'])AND !empty($donnees7['coupon'])){
    if(isset($_SESSION['message_spe']) AND !empty($_SESSION['message_spe'])){
      echo '<h4 style="color:red;text-align:center; margin:auto">'.$_SESSION['message_spe'].'</h4>'; $_SESSION['message_spe']="";
    }
  ?><form method="post" action="">
<p><label for="coupon">COUPON REDUCTION </label><input class="inp_99" type="text" name="coupon" id="coupon"/></p>
<p><input class="inp_99_subm" style="margin:auto;text-align:center" type="submit" value="Réduire"/>
</form>
<br>
<?php } ?>
<div id="bloc_div">
<?php 

$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=? AND etat=? AND acheteur=?');
$req1->execute(array($_SESSION['reference'], $non, htmlspecialchars($_SESSION['mail'])));
while($donnees2=$req1->fetch()){
?>
  <img id="image_recap" src="../publicimgs/<?php echo htmlspecialchars($donnees2['cle_image']); ?>">        
  <p><?php echo $donnees2['titre']; ?></p>
  <p>TTC : <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?> --- Qté : <?php echo htmlspecialchars($donnees2['quantite']); ?></p>
  <p>Sous-Total : <?php echo number_format(htmlspecialchars($donnees2['sous_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>  
  <?php 
  $_SESSION['livraison']=htmlspecialchars($donnees2['livraison']);
  $_SESSION['grand_total']=htmlspecialchars($donnees2['grand_total']);
}
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();
?>
<br style="line-height:4px">
<p>Total : <span style="color:green"><?php echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>
<p>dont Livraison : <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
<?php if(isset($reduction) AND !empty($reduction)){echo '<p>'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';}echo '</p>';} ?>
</div>
<p style="height:15px">&nbsp;</p>
<!-- Le conteneur des boutons PayPal -->
<div id="paypal-boutons"></div>

<!-- 1. Importation de la SDK JavaScript PayPal -->

<p style="height:15px">&nbsp;</p>
<div id="adresses"><div id="adr_fact"><h4 style="text-decoration:underline">Facturation</h4>
  <p style="height:15px">&nbsp;</p>
      <p><?php if(isset($donnees3['acheteur'])){echo htmlspecialchars($donnees3['acheteur']);} ?></p>
      <p><?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);}if(isset($donnees['nom'])){echo ' '.htmlspecialchars($donnees['nom']);}?></p>
      <p><?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']);}?></p>
      <p><?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']);}?></p>
      <p><?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']);}if(isset($donnees['ville'])){echo ' --- '.htmlspecialchars($donnees['ville']);}?></p>
      <?php if(isset($donnees['stateOrProvince'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince']).'</p>';}?>
      <p><?php if(isset($donnees['pays_string'])){echo htmlspecialchars($donnees['pays_string']);}?></p></div>
  <div id="adr_livr"><h4 style="text-decoration:underline">Livraison</h4>
    <p style="height:15px">&nbsp;</p>
      <p><?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);}if(isset($donnees['nom_livr'])){echo ' '.htmlspecialchars($donnees['nom_livr']);}?></p>
      <p><?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);}?></p>
      <p><?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);}?></p>
      <p><?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);}if(isset($donnees['ville_livr'])){echo ' --- '.htmlspecialchars($donnees['ville_livr']);}?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';}?>
      <p><?php if(isset($donnees['pays_livr_string'])){echo htmlspecialchars($donnees['pays_livr_string']);}?></p>
      <p><a id="lien_paiement_b1" href="../customer/index.php" onclick="change();">Facturation</a></p>
      <p><a id="lien_paiement_b2" href="../customer/adresse-livraison.php" onclick="change();">Livraison</a></p>
      <p><a id="lien_paiement_b3" href="../panier.php"  onclick="change();">Recalculer</a></p>
      <p><a id="lien_paiement_b4" href="../customer/index.php" onclick="change();">Email</a></p>
    </div>
</div>  
<br>
<br><br><br><br><br>
      <?php require 'footer.php'; ?>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AVgRwQ8e3IYWHgmXpfTbIAEdpWhNlxWIzapd_H6rZK39FSiY8nUxpDnWh6f2Fnj3r9mIk5ealmdAdimr"></script>
<script>
  // 2. Afficher le bouton PayPal
  paypal.Buttons({

    // 3. Configurer la transaction
    createOrder : function (data, actions) {

      // Les produits à payer avec leurs details
      var produits = [
        {
          name : "Produit 1",
          description : "Description du produit 1",
          quantity : 1,
          unit_amount : { value : 9.9, currency_code : "USD" }
        },
        {
          name : "Produit 2",
          description : "Description du produit 2",
          quantity : 1,
          unit_amount : { value : 8.0, currency_code : "USD" }
        }
      ];

      // Le total des produits
      var total_amount = produits.reduce(function (total, product) {
        return total + product.unit_amount.value * product.quantity;
      }, 0);

      // La transaction
      return actions.order.create({
        purchase_units : [{
          items : produits,
          amount : {
            value : total_amount,
            currency_code : "USD",
            breakdown : {
              item_total : { value : total_amount, currency_code : "USD" }
            }
          }
        }]
      });
    },

    // 4. Capturer la transaction après l'approbation de l'utilisateur
    onApprove : function (data, actions) {
      return actions.order.capture().then(function(details) {

        // Afficher Les details de la transaction dans la console
        console.log(details);

        // On affiche un message de succès
        alert(details.payer.name.given_name + ' ' + details.payer.name.surname + ', votre transaction est effectuée. Vous allez recevoir une notification très bientôt lorsque nous validons votre paiement.');

      });
    },

    // 5. Annuler la transaction
    onCancel : function (data) {
      alert("Transaction annulée !");
    }

  }).render("#paypal-boutons");
</script>
</body>
</html>
<?php $_SESSION['grand_total']=$donnees3['grand_total'];