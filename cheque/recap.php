<?php session_start();

//////////////////////////////////////////////////
//////////////////////////////////////// mail achat
require '../texte1.php';

require '../boutique0.php';


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

$type_paie="chèque";

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
<style>
/* Banniere select */
#containair{
  display:block;
  margin-left: 0;
  margin-right:0;
  text-align:left;
  background-color:white;
  width:800px;
  color: #5B6975;
  text-decoration: none;
}
#banniere1, #banniere2, #banniere3, #banniere4{
  display:inline-block;
  margin:0;
  border:0;
  padding-top:14px;
  background-color:white;
  color: #5B6975;
  width:22.49%;
  height:40px;
  font-size: 14px;
  vertical-align:middle;
  text-align:center;
  border-bottom:none;
  text-decoration:none;
}
#span_ban1, #span_ban2, #span_ban3, #span_ban4{
  vertical-align:middle;
  text-align:center;
  font-size: 14px;
  font-weight:bold;
  color: #5B6975;
  text_decoration: none;
}
#span_ban1 a, #span_ban2 a, #span_ban3 a, #span_ban4 a{
  display:inline-block;
  font-size: 14px;
  color: #5B6975;
  text-decoration:none;
}
#banniere_select{
  display:inline-block;
  margin:0;
  border:0;
  padding-top:14px;
  background-color:white;
  color: #289AFE;
  width:24.49%;
  height:40px;
  font-size: 14px;
  vertical-align:middle;
  text-align:center;
  border-bottom:3px solid blue;
  text-decoration:none;
}
#span_select{
  display: inline-block;
  vertical-align:middle;
  text-align:center;
  font-weight:bold;
  font-size: 14px;
  color: #289AFE;
  text-decoration:none;
}
#banniere2,#span_ban2,#span_ban2 a{
  text-decoration: none;
  color: #5B6975;
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
  width:500px;
  margin-left: 100%;
  margin-right: 100%;
}
.paiement_cb
{
  margin:auto;
}
form{
  width: 500px;
  position: relative;
  left: 200px;
}
.p_img_paiem{
  text-align:center;
  margin:auto;
}
#paiement_image
{
  width:120px;
  display:inline-block;
  margin:auto;
  text-align:center;
}
#recap h3
{
  display:inline-block;
}
#bloc_div{
  width: 500px;
  margin-left: 60%;
  margin-right: 60%;
}
#image_recap
{
  width:180px;
  display:block;
}
.p_infos{
  width:180px;
  margin: 0;
  padding-left: 0;
}
.paiement_box
{
  margin-bottom:35px;
}
#adresses{
  position: relative;
  left: 450px;
  top: -200px;

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
padding-left: 195px;
}
#inp_sub{
  width: 100px;
  margin: 0;
  padding: 0;
  position: relative;
  left: -150px;
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
  text-align: center;
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
  /*banniere*/
#containair{
  width:100%;
}
#banniere1, #banniere2, #banniere3, #banniere4{
  display:none;
    }
#span_ban1, #span_ban2, #span_ban3, #span_ban4{
  display:none;
}
#banniere_select{
  display:inline-block;
  width:340px;
}
#span_select{
  display:inline-block;
}
/*recap*/
#recap{
  margin-left: 0;
  margin-right: 0;
}
#paiement_cb{
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -140px;
}
form{
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -75px;
  text-align: center;
}
label{
  display: block;
  margin-left: 0;
  margin-right: 0;
}
.inp_99_subm{
  margin-left: 0;
  margin-right: 0;
}
#bloc_div{
  display:block;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: -75px;
}
#image_recap{
  width:200px;
  text-align:center;
  margin:auto;
  display:block;
}
.p_infos{
  width: 200px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 153px;
}
#lien_paiement2{
  display: block;
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  left: 310px;
}
#adresses{
  width: 330px;
  margin-left: 0;
  margin-right: 0;
  position: relative;
  top:-5px;
  left: 40px;
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
#lien_paiement_b1,#lien_paiement_b2,#lien_paiement_b3,#lien_paiement_b4{
position: relative;
left: -180px;
text-align: center;
}
#inp_sub{
  display: block;
  z-index: 99999;
}
@-moz-document url-prefix(){
}
}
</style>
<!--SECTION PAGE HTML -->
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div id="recap">

  <div id="containair">
      <div id="banniere1"><span id="span_ban1"><a href="../customer/Adresse-Facturation-Paiement-<?php echo $bank;?>-">Facturation</a></span></div>
     <div id="banniere2"><span id="span_ban2"><a href="../customer/Adresse-Livraison">Livraison</a></span></div>
     <div id="banniere_select"><span id="span_select"><a href="<?php if ($bank=="monetico"){echo "../paiement/RECAPITULATIF";}elseif ($bank=="paypal"){echo "../paypal/RECAPITULATIF";}elseif ($bank=="paypal-SDK"){echo "../paypal-SDK/RECAPITULATIF";}elseif ($bank=="cheque"){echo "../cheque/RECAPITULATIF";}?>">Récapitulatif</a></span></div>
     <div id="banniere4"><span id="span_ban4">Paiement</span></div>
</div>
<br>
<div class="row cf" id="load_princ"><div class="twelve col"><div class="loader" id="loader-6"><span></span><span></span><span></span><span></span></div></div></div>
 <!--<div style="text-shadow:none;min-width:1000px;text-align:left" id="google_translate_element"></div><script>
function googleTranslateElementInit(){
 new google.translate.TranslateElement({
  pageLanguage: 'fr',
  layout: google.translate.TranslateElement.InlineLayout.SIMPLE
 }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<br>
<div id="paiement_cb"><img id="paiement_image" src="../publicimgs/cheque.png"/><h3 style="text-decoration:underline">Validation de commande</h3></div>-->
<br><?php $req7=$bdd->query('SELECT * FROM reduction');
  $donnees7=$req7->fetch();
  if(isset($donnees7['coupon'])AND !empty($donnees7['coupon'])){
    if(isset($_SESSION['message_spe']) AND !empty($_SESSION['message_spe'])){
      echo '<h4 style="color:red;text-align:center; margin:auto">'.$_SESSION['message_spe'].'</h4>'; $_SESSION['message_spe']="";
    }
  ?><form method="post" action="">
<p><label for="coupon">COUPON REDUCTION </label><br><br><input class="inp_99" type="text" name="coupon" id="coupon"/></p>
<p>&nbsp;</p>
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
  <?php if(isset($donnees2['img_type']) AND $donnees2['img_type']=="image"){ ?>   
  <img id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image']; ?>"/>
<?php }
 if(isset($donnees2['img_type']) AND $donnees2['img_type']=="youtube"){ ?><iframe id="image_recap" <?php echo $donnees2['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php
  } 
  if(isset($donnees2['img_type']) AND $donnees2['img_type']=="video"){ ?>
  <video id="image_recap" src="../publicimgs/<?php echo $donnees2['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees2['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
  <?php } ?><br>
  <p class="p_infos"><?php echo $donnees2['titre']; ?></p><br>
  <p class="p_infos">TTC : <?php echo number_format(htmlspecialchars($donnees2['prix']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?> --- Qté : <?php echo htmlspecialchars($donnees2['quantite']); ?></p><br>
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
<p class="p_infos">Total : <span style="color:green"><?php echo number_format(htmlspecialchars($_SESSION['grand_total']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></span></p>
<p class="p_infos">dont Livraison : <?php echo number_format(htmlspecialchars($_SESSION['livraison']),2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};?></p>
<?php if(isset($reduction) AND !empty($reduction)){echo '<p>'.'Réduction : '.$reduction;if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';}echo '</p>';} ?>
<p style="height:15px">&nbsp;</p>
<div style="margin:auto;text-align:center;display:block"><a style="display:inline-block" href="Bon-de-Commande" class="a_99_subm">Editer un bon de commande</a>&nbsp;&nbsp;&nbsp;&nbsp;<a style="display:inline-block"href="../tarifs.php" class="a_99_subm"> retour </a></div>
<p style="height:15px">&nbsp;</p>
<div style="display:block;margin:auto;text-align:center;width:330px;color:black">
  <?php $req5=$bdd1->query('SELECT * FROM cheque');
  $donnees5=$req5->fetch();?>
<p style="margin:auto;text-align:left;font-size:14pt;color:blue;text-decoration:underline;line-height:22px">Envoyez votre Paiement et Bon de Commande à: </p><p style="height:15px">&nbsp;</p>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['prenom'])){echo $donnees5['prenom'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['nom'])){echo $donnees5['nom'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['societe'])){echo $donnees5['societe'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['adresse1'])){echo $donnees5['adresse1'];}?></p><br>
<?php if(isset($donnes5['adresse2'])){echo '<p style="margin:auto;text-align:left">'.$donnees5['adresse2'].'</p><br>';}?>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['CP'])){echo $donnees5['CP'];}?> - <?php if(isset($donnees5['ville'])){echo $donnees5['ville'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['pays'])){echo $donnees5['pays'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['RCS'])){echo 'RCS : '.$donnees5['RCS'];}?></p><br>
<p style="margin:auto;text-align:left"><?php if(isset($donnees5['ville_RCS'])){echo $donnees5['ville_RCS'];}?></p><br>
</div>
</div>
  <div id="adr_livr" style="text-align:right;margin-right:15px">
      <p style="text-align:right;position:relative;right:-90%"><a id="lien_paiement_b1" href="../customer/Adresse-Facturation-Paiement-cheque-" onclick="change();">Facturation</a></p>
      <p style="text-align:right;position:relative;right:-90%" ><a id="lien_paiement_b3" href="../panier.php"  onclick="change();">Recalculer</a></p>
      <p style="text-align:right;position:relative;right:-90%"><a id="lien_paiement_b4" href="../customer/Adresse-Facturation-Paiement-cheque-" onclick="change();">Email</a></p>
  </div>
</div>
<input type="hidden" name="ste" id="ste" value="<?php echo $nom_ste;?>"/>
<input type="hidden" name="ref" id="ref" value="<?php echo $_SESSION['reference'];?>"/>
<input type="hidden" name="tot" id="tot" value="<?php echo number_format(htmlspecialchars($_SESSION['grand_total']),2,'.','');?>"/>
<input type="hidden" name="cur" id="cur" value="<?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo "EUR";} else{echo "USD";}?>"/>
<br>
<br><br><br><br><br>
      <?php require 'footer.php'; ?>
</div>

</body>
</html>
<?php $_SESSION['grand_total']=$donnees3['grand_total'];