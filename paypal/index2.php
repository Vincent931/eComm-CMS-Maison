<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
require 'boutique0.php';

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<?php require 'head.php';?>
<!-- jquery -->             
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Braintree -->
  <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
	<style>
    label.heading {
    font-weight: 600;
    }
    #dropin-container {
    width:300px;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    border: 1px #333 solid;
    }
  </style>
  <meta name="robots" content="noindex">
</head>
	<body style="text-align:center;margin-top:100px">
		<div id="bloc_page">
<?php $req77=$bdd->prepare('SELECT * FROM commande WHERE reference=:reference');
$req77->execute(array('reference'=>$_SESSION['reference']));
  $donnees77=$req77->fetch(); 
  if($donnees77['ref2']!="click"){ ?>
<div id="containair">
     <div id="banniere1"><span id="span_ban1">Coordonnées</span></div>
     <!--<p id="barre"></p>-->
     <div id="banniere2"><span id="span_ban2">Livraison</span></div>
     <!--<p id="barre"></p>-->
     <div id="banniere3"><span id="span_ban3">Récapitulatif</span></div>
      <!--<p id="barre"></p>-->
     <div id="banniere_select"><span id="span_select">Paiement</span></div>
</div>
<?php } ?>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
			<h1>Paiement avec Paypal Bank</h1>
      <?php require "boot.php"; ?>
      <form action="payment.php" method="post" class="payment-form">
        <div id="dropin-container"> </div></br>
        <?php 
          
              $req=$bdd->prepare('SELECT * FROM commande WHERE etat=:etat AND acheteur=:acheteur');
              $req->execute(array('etat'=>'non','acheteur'=>htmlspecialchars($_SESSION['mail'])));
              while($donnees=$req->fetch())
              {$_SESSION['montant']=$donnees['grand_total'];}

          ?>
        <input type="submit" value="Payer" onclick="change();"/></br></br>
    </form>
		<footer>
    </footer>
      <!-- setting up braintree -->
      <script>
       // $.ajax({
        //url: "token.php",
        //type: "get",
        //dataType: "json",
        //success: function (data) {-->
          braintree.setup(<?php echo json_encode($clientToken = $gateway->clientToken()->generate()); ?>,'dropin', { 
            container: 'dropin-container',
      paypal: {
    singleUse: true,
    amount: <?php if($donnees77['ref2']!="click"){ echo json_encode($donnees['grand_total']); }
          else {echo json_encode("5.00");}?>,
    currency: <?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo json_encode('EUR');} else{echo json_encode('USD');}?>
  }
});
      </script>
<?php $req->closeCursor(); ?>
		</div>
	</body>
</html>
