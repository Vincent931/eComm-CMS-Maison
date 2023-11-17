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

$int='bandeau';
$req22=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
$req22->execute(array($int));
$donnees10=$req22->fetch();
$image=$donnees10['nom'];
$type_paie="Paypal Braintree";
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
$ref2="";

?>

<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<style>
  *{
    box-sizing: border-box;
  }
  body{
    width: 150rem;
    margin-left:0;
    margin-right:0;
  }
/*Marge sur recap.php, retour KO.php et retour-OK.php*/
#grey_color_marge
{
  border:1px solid grey;
  background-color:#DDE3E3;
  box-shadow:2px 2px 4px #DDE3E3;
  padding: 3px;
  margin-left:12px;
  margin-right:12px;
}
/* recap*/
#recap{
  width:140rem;
  margin-left: auto;
  margin-right: auto;
}
label{
  margin-left: auto;
  margin-right: auto;
}
#paiement_cb
{
  width: 25rem;
  margin-left:auto;
  margin-right: auto;
  padding-left: auto;
}
#paiement_image
{
  width:120px;
  display:inline-block;
  margin:auto;
  text-align:center;
}
form{
  width: 50rem;
  margin-left: auto;
  margin-right: auto;
}
#coupon{
  width: 25rem;
  margin-left: auto;
  margin-right: auto;
}
.contenair_all{
  display: flex;
  flex-direction: row;
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  justify-content: space-around;
}
#bloc_div{
  display: flex;
  flex-direction: column;
  width:500px;
  margin-left: 40%;
  margin-right: 0;
}
#adresses{
  width: 330px;
  display: flex;
  flex-direction: column;
  margin-left: 100px;
}
#image_recap
{
  width:180px;
  display:block;
}
.infos{
  text-align: center;
  margin-left: auto;
  margin-right: auto;
}
.p_infos{
  width:180px;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}
.paiement_box
{
  margin-bottom:35px;
}
.titl_liens{
  color: #5B6975;
}
.description_ach{
   display:inline:block; 
}
#a_gauche, #au_milieu, #droite
{
  display:inline-block;
  margin:auto;
}
#recap p{
  display:block;
  line-height:13px;
}
#recap a{
  display:inline:block;
}
#recap a #grey_color{
  display:inline:block;
}
.infos{
padding-left: 95px;
}
.paiem2_image
{
  text-align:right;
  float:right;
  margin-right:0px;
}
.paiem3_marge
{
  margin-left:140px;
}
#lien_paiement_b1,#lien_paiement_b2,#lien_paiement_b3,#lien_paiement_b4{
  padding:5px;
  background-color:#DDE3E3;
  color: #5B6975;
  text-decoration:none;
  padding:4px;
  border:2px solid gray;
  display:block;
  font-size:10px;
  width:100px;
}
.lien_paiement3
{
  border:1px solid gray;
  background-color:#DDE3E3;
  box-shadow:2px 2px 4px #DDE3E3;
  font-size:12px;
  padding: 5px;
  margin:20px;
}
.info_paiement
{
  border:1px solid blue;
  background-color:#F4F2DA;
  border-radius:25px/25px;
  margin:auto;
  padding-top:0px;
  padding-bottom:10px;
  padding-left:15px;
  padding-right:15px;
  width:750px;
  text-align:left;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px){
/*recap*/
#recap{
  margin-left: 0;
  margin-right: 0;
}
#paiement_cb{
  margin-left: 0;
  margin-right: 0;
}

form{
  margin-left: -140px;
  margin-right: 0;
  text-align: center;
}
label{
  display: block;
  margin-left: 0;
  margin-right: 0;
}
#paiement_image
{
  width:120px;
  margin-left: 60px;
}
.inp_99_subm{
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 0;
}
.contenair_all{
  display: flex;
  flex-direction: column;
  width: 330px;
  margin-left: 0;
  margin-right: 0;
}
#bloc_div{
  display: flex;
  flex-direction: column;
  width:300px;
  margin-left: -80px;
  margin-right: 0;
}
#adresses{
  width: 330px;
  display: flex;
  flex-direction: column;
  margin-left: 50px;
}
.p_img_paiem{
  text-align:center;
  margin:auto;
}
#image_recap{
  width:200px;
  text-align:center;
  margin-left: 150px;
}
.p_infos{
  width: 200px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 153px;
}
#adr_fact, #adr_livr,.infos{
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  text-align: left;
}
.infos{
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -120px;
}
.inp_99_subm.a_subm{
  display: block;
  width: 300px;
  margin-left: -190px;
  margin-right: 0;
  position: relative;
  left: 295px;
}
#lien_paiement_b1,#lien_paiement_b2,#lien_paiement_b3,#lien_paiement_b4{
  margin-top:15px;
  margin-left:-90px;
  margin-right:0;
  margin-bottom:5px;
  padding:2px;
  position: relative;
  left: 40px;
  text-align: center;
}
@-moz-document url-prefix(){
}
}
</style>
<meta name="robots" content="noindex">
</head>
  <body>
    <div id="recap">
<br><br>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
 <!--<div style="text-shadow:none;min-width:1000px;text-align:left" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<br>
<div id="paiement_cb"><img id="paiement_image" src="../publicimgs/braintree.png"/><h3 style="text-decoration:underline">Vérifiez votre commande</h3></div>
<br><?php $req7=$bdd->query('SELECT * FROM reduction');
  $donnees7=$req7->fetch();
  if(isset($donnees7['coupon'])AND !empty($donnees7['coupon'])){
    if($donnees3['ref2']!="click"){
      if(isset($_SESSION['message_spe']) AND !empty($_SESSION['message_spe'])){
        echo '<h4 style="color:red;text-align:center; margin:auto">'.$_SESSION['message_spe'].'</h4>'; $_SESSION['message_spe']="";
      }
  ?><form method="post" action="">
<p><label for="coupon">COUPON REDUCTION </label><input class="inp_99" type="text" name="coupon" id="coupon"/></p>
<p>&nbsp;</p>
<p><input class="inp_99_subm" style="margin:auto;text-align:center" type="submit" value="Réduire"/>
</form>
<br>
<?php } 
}?>
<div class="contenair_all">
<div id="bloc_div">
<?php 

$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=? AND etat=? AND acheteur=?');
$req1->execute(array($_SESSION['reference'], $non, htmlspecialchars($_SESSION['mail'])));
while($donnees2=$req1->fetch()){
?>
  <?php if(isset($donnees2['img_type']) AND $donnees2['img_type']=="image"){ ?>   
  <img id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image']; ?>"/>
<?php }
 if(isset($donnees2['img_type']) AND $donnees2['img_type']=="youtube"){ ?><iframe id="image_recap" <?php echo $donnees2['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php
  } 
  if(isset($donnees2['img_type']) AND $donnees2['img_type']=="video"){ ?>
  <video id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees2['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
  <?php } ?>
  <br>
  <p class="p_infos"><?php echo $donnees2['titre']; ?></p>
  <br>
  <p class="p_infos">TTC : 
    <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?> --- Qté : <?php echo htmlspecialchars($donnees2['quantite']); ?></p>
    <br>
  <p class="p_infos">Sous-Total : <?php echo number_format(htmlspecialchars($donnees2['sous_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p><br>
  <?php 
  $_SESSION['livraison']=htmlspecialchars($donnees2['livraison']);
  $_SESSION['grand_total']=htmlspecialchars($donnees2['grand_total']);
}
$req=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req->execute(array($_SESSION['mail']));
$donnees=$req->fetch();
?>
<br style="line-height:4px">
<p  class="p_infos">Total :<span style="color:green"> 

<?php 
if($donnees3['ref2']!="click"){
      echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>
      <br>
    <p class="p_infos">dont Livraison : <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
    <?php if(isset($reduction) AND !empty($reduction)){echo '<br><p class="p_infos">'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else {echo ' $';} 
    echo '</p>';} 
} else {
      echo number_format("5",2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>
    <p class="p_infos">dont Livraison : <?php echo number_format("0",2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
    <?php if(isset($reduction) AND !empty($reduction)){echo '<br><p class="p_infos">'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} 
    echo '</p>';}
} ?>
<p style="height:15px">&nbsp;</p>
<p id="inp_sub"><a href="derniere-etape" class="inp_99_subm a_subm" style="width:330px;text-align:center">Valider la Commande</a></p>
<p style="height:15px">&nbsp;</p>
</div>
<div id="adresses">
  <div id="adr_fact"><h4 class="titl_liens" style="text-decoration:underline">Facturation</h4>
      <p><?php if(isset($donnees3['acheteur'])){echo htmlspecialchars($donnees3['acheteur']);} ?></p>
      <p><?php if(isset($donnees['prenom'])){echo htmlspecialchars($donnees['prenom']);}if(isset($donnees['nom'])){echo ' '.htmlspecialchars($donnees['nom']);}?></p>
      <?php if(isset($donnees['societe'])){echo '<p>'.htmlspecialchars($donnees['societe']).'</p>';}?>
      <p><?php if(isset($donnees['adresse1'])){echo htmlspecialchars($donnees['adresse1']);}?></p>
      <p><?php if(isset($donnees['adresse2'])){echo htmlspecialchars($donnees['adresse2']);}?></p>
      <p><?php if(isset($donnees['code_postal'])){echo htmlspecialchars($donnees['code_postal']);}if(isset($donnees['ville'])){echo ' --- '.htmlspecialchars($donnees['ville']);}?></p>
      <?php if(isset($donnees['stateOrProvince'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince']).'</p>';}?>
      <p><?php if(isset($donnees['pays_string'])){echo htmlspecialchars($donnees['pays_string']);}?></p></div>
  <div id="adr_livr"><h4 class="titl_liens" style="text-decoration:underline">Livraison</h4>
      <p><?php if(isset($donnees['prenom_livr'])){echo htmlspecialchars($donnees['prenom_livr']);}if(isset($donnees['nom_livr'])){echo ' '.htmlspecialchars($donnees['nom_livr']);}?></p>
      <?php if(isset($donnees['societe_livr'])){echo '<p>'.htmlspecialchars($donnees['societe_livr']).'</p>';}?>
      <p><?php if(isset($donnees['adresse1_livr'])){echo htmlspecialchars($donnees['adresse1_livr']);}?></p>
      <p><?php if(isset($donnees['adresse2_livr'])){echo htmlspecialchars($donnees['adresse2_livr']);}?></p>
      <p><?php if(isset($donnees['code_postal_livr'])){echo htmlspecialchars($donnees['code_postal_livr']);}if(isset($donnees['ville_livr'])){echo ' --- '.htmlspecialchars($donnees['ville_livr']);}?></p>
      <?php if(isset($donnees['stateOrProvince_livr'])){echo '<p>'.htmlspecialchars($donnees['stateOrProvince_livr']).'</p>';}?>
      <p><?php if(isset($donnees['pays_livr_string'])){echo htmlspecialchars($donnees['pays_livr_string']);}?></p>
      </div>
      <div class="infos">
      <p class="p_infos"><a id="lien_paiement_b1" href="../panier.php" onclick="change();">Facturation</a></p>
      <p class="p_infos"><a id="lien_paiement_b3" href="../panier.php"  onclick="change();">Recalculer</a></p>
      <p class="p_infos"><a id="lien_paiement_b4" href="../panier.php" onclick="change();">Email</a></p>
      </div>
</div>
</div>  
<br>
<br><br><br><br><br>
      <?php require 'footer.php'; ?>
</div>
</body>
</html>
<?php $_SESSION['grand_total']=$donnees3['grand_total'];