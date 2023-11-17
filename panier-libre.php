<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';
require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();

if($donnees210['ok']=='oui'){
	$devise="USD";
} else {
	$devise="EUR";
}
$chif=strlen($ste['url']);
$chif2=$chif+11;
if((substr($_SERVER['HTTP_REFERER'],0,$chif2)!='http://'.$ste['nom'].'.fr/panier.php') OR (substr($_SERVER['HTTP_REFERER'],0,$chif2)!='https://'.$ste['nom'].'.fr/panier.php')){
	$_SESSION['REFERER']=$_SERVER['HTTP_REFERER'];
}
if(isset($_POST['totalP']) AND !empty($_POST['totalP'])){ $totalP=$_POST['totalP'];} else {$totalP=0;}
?>

<div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</div>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php'; ?>
<style>
	#bloc_page{
		margin-left:0;
		margin-right:0;
		width: 100%;
	}
	body{
		margin-left:auto;
		margin-right:auto;
		width: 1800px;
	}
/*panier*/
.panier_page{
	margin-left:auto;
	margin-right:auto;
	width: 1300px;
}
#h2_pan{
	text-align:center;
	margin:auto;
	width: 200px;
	height: 30px;
	border-radius: 4px/4px;
	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	position: relative;
	top: 0;
	left: 65px;
}
form.form1{
	width: 330px;
	margin-left: auto;
	margin-right: auto;
}
.descr_prod1_img {
  display:block;
  width:300px;
  margin:auto;
}
.p_panier1
{
    width:300px;
    margin:auto;
    text-align:left;
}
.p_prix{
	font-size:15px;
	display: inline-block;
	width: 100px;
}
.p_panier
{
    width:300px;
    margin:auto;
    text-align:left;
    display: inline-block;
}
.inp_panier1
{
    width:100px;
    margin:auto;
    text-align:left;
    display: inline-block;
    border-radius:1px/1px;
	  background-color: #D4DBE1;
	  padding:4px;
	  text-align: center;
}
a.del:hover{
	background: white;
	text-decoration: none;
	color: white;
}
.TTC{
 	font-size:15px;
 	display: inline-block;
	width: 150px;
}
.inp_99_subm3{
	width: 250px;
}
.bouton_paiem{
	display: inline-block;
	width: 300px;
}
#bitc{
  width:22px;
  text-align:left;
}
#paypalC{
  width:22px;
  text-align:left;
}
.rowtotal{
	width: 300px;
	margin-left: auto;
	margin-right: auto;
}
.contenair_prod{
	width: 330px;
	margin-left: auto;
	margin-right: auto;
}
/*adresses*/
form.form2{
	width: 800px;
	margin-left: auto;
	margin-right: auto;
}
	.inp_CGV_subm{
		width: 300px;
		margin-left: auto;
		margin-right: auto;
		text-align: right;
	}
	.CGV{
		width: 300px;
		margin-left: auto;
		margin-right: 10px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	input[type=checkbox] {
		margin-top: 5px;
		position: relative;
		top: 7px;
	}
	#contenair_adr{
		width: 800px;
		margin-left: auto;
		margin-right: auto;
	}
	#contenair_fact{
		width: 800px;
		margin-left: auto;
		margin-right: auto;
	}
	#bloc_title_facturation{
		background: #D4DBE1;
		width: 800px;
		height: 55px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		padding-top: 40px;
	}
	#title_adr_fact{
		text-align: center;
		font-size: 1.2em;
	}
	.bloc_email{
		margin-top: 10px;
		margin-bottom: 10px;
		width: 320px;
		margin-left: 40px;
	}
	.email{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 0;
		font-size: 1.2em;
	}
	#cont_nompren_fact{
		display: flex;
		flex-direction: row;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_prenom_fact{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		margin-right: 10px;
		font-size: 1.2em;
	}
	.inp_nom_fact{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 10px;
		font-size: 1.2em;
	}
	.inp_adresse_facturation{
		display: flex;
		flex-direction: column;
		
	}
	.inp_societe_fact{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_adresse1_fact{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_adresse2_fact{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#cont_villecp_fact{
		display: flex;
		flex-direction: row;
	}
	.inp_cp_fact{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		margin-right: 10px;
		font-size: 1.2em;
	}
	.inp_ville_fact{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 10px;
		font-size: 1.2em;
	}
	.inp_statepays_facturation{
		display: flex;
		flex-direction: column;
	}
	.inp_state_fact{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	select{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#contenair_livr{
		width: 800px;
		margin-left: auto;
		margin-right: auto;
	}
	#bloc_title_livraison{
		background: #D4DBE1;
		width: 800px;
		height: 55px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		padding-top: 40px;
	}
	#title_adr_livr{
		text-align: center;
		font-size: 1.2em;
	}
	#cont_nompren_livr{
		display: flex;
		flex-direction: row;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_prenom_livr{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		margin-right: 10px;
		font-size: 1.2em;
	}
	.inp_nom_livr{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 10px;
		font-size: 1.2em;
	}
	.inp_adresse_livr{
		display: flex;
		flex-direction: column;
	}
	.inp_societe_livr{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_adresse1_livr{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.inp_adresse2_livr{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	#cont_villecp_livr{
		display: flex;
		flex-direction: row;
	}
	.inp_cp_livr{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		margin-right: 10px;
		font-size: 1.2em;
	}
	.inp_ville_livr{
		width: 150px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 10px;
		font-size: 1.2em;
	}
	.inp_statepays_livr{
		display: flex;
		flex-direction: column;
	}
	.inp_state_livr{
		width: 320px;
		border-radius: 4px/4px;
		border: 0.5px solid gray;
		margin-left: 40px;
		font-size: 1.2em;
		margin-top: 10px;
		margin-bottom: 10px;
	}
		.inp_subm_form_adresses{
		width: 300px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
		margin-bottom: 15px;
	}
	a.a_retour{
		width: 300px;
		margin-left: 0;
		margin-right: 0;
		margin-top: 15px;
		background-color: #5B6975;
		color: white;
		font-size: 1.3em;
		border-radius: 4px/4px;
		padding-left: 123px;
		padding-right: 123px;
		paddin-top: 4px;
		padding-bottom: 4px;
	}
	.inp_subm_form_adresses_submit{
		width: 300px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
		background-color: #5B6975;
		color: white;
		font-size: 1.3em;
		border-radius: 4px/4px;
	}
@-moz-document url-prefix(){
	.tot_art
{
  top: -15px;
}
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
#blocpage{
	width: 330px;
	margin: 0;
}
body{
	width: 330px;
	margin: 0;
}
.panier_page{
	width: 330px;
	margin-left: 15px;
	margin-right: 0;
}
#h2_pan{
	position: relative;
	top: -50px;
	left: 15px;
}
.descr_prod1_img {
  margin:auto;
}
.p_panier1
{
    margin:auto;
}
.p_prix{
	font-size:15px;
	width: 100px;
}
.p_panier
{
    margin:auto;
}
.inp_panier1
{
    width:100px;
    margin:auto;
}
.TTC{
 	font-size:15px;
	width: 150px;
}
.bouton_paiem{
	width: 300px;

}
#bitc{
  width:22px;
}
#paypalC{
  width:22px;
}
.rowtotal{
	width: 300px;
	margin-left: 0;
	margin-right: 0;
}
/*adresses*/
form.form2{
	width: 330px;
}
	.inp_CGV_subm{
		width: 330px;
		padding-right: 15px;
	}
	.CGV{
		width: 270px;
		margin-right: 60px;
	}
	input[type=checkbox] {
		margin-top: 5px;
		position: relative;
		top: 7px;
	}
	#contenair_adr{
		width: 330px;
	}
	#contenair_fact{
		width: 330px;
		margin-top: 15px;
	}
	#bloc_title_facturation{
		background: #D4DBE1;
		width: 330px;
		height: 55px;
		text-align: center;
		padding-top: 40px;
	}
	#title_adr_fact{
		text-align: center;
		font-size: 1.2em;
	}
	.bloc_email{
		margin-top: 10px;
		margin-bottom: 10px;
		width: 270px;
		margin-left: 40px;
	}
	.email{
		width: 270px;
		margin-left: 0;
	}
	.inp_prenom_fact{
		width: 120px;
	}
	.inp_nom_fact{
		width: 120px;
	}
	.inp_societe_fact{
		width: 270px;
	}
	.inp_adresse1_fact{
		width: 270px;
	}
	.inp_adresse2_fact{
		width: 270px;
	}
	.inp_cp_fact{
		width: 120px;
	}
	.inp_ville_fact{
		width: 120px;
	}
	.inp_state_fact{
		width: 270px;
	}
	#contenair_livr{
		width: 330px;
		margin-left: auto;
		margin-right: auto;
	}
	#bloc_title_livraison{
		background: #D4DBE1;
		width: 330px;
	}
	.inp_prenom_livr{
		width: 120px;
	}
	.inp_nom_livr{
		width: 120px;
	}
	.inp_societe_livr{
		width: 270px;
	}
	.inp_adresse1_livr{
		width: 270px;
	}
	.inp_adresse2_livr{
		width: 270px;
	}
	.inp_cp_livr{
		width: 120px;
	}
	.inp_ville_livr{
		width: 120px;
	}

	.inp_state_livr{
		width: 270px;
	}
	.inp_subm_form_adresses{
		width: 300px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
		margin-bottom: 15px;
	}
	a.a_retour{
		width: 300px;
		margin-left: 0;
		margin-right: 0;
		margin-top: 15px;
		background-color: #5B6975;
		color: white;
		font-size: 1.3em;
		border-radius: 4px/4px;
		padding-left: 123px;
		padding-right: 123px;
		paddin-top: 4px;
		padding-bottom: 4px;
	}
	.inp_subm_form_adresses_submit{
		width: 300px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
		background-color: #5B6975;
		color: white;
		font-size: 1.3em;
		border-radius: 4px/4px;
	}
/*footer*/
		#menu{
			position:relative;
			top: -70px;
		}
@-moz-document url-prefix(){
}
}
</style>
	<title>Page de validation paiement variable</title>
	<meta name="description" content="Vous pouvez choisir le montant à payer à votre prestataire, vincent-dev-web."/>
</head>
<body>
<?php require 'header.php'; ?><br><br><br><br><br>
<div class="panier_page">
<h2 id="h2_pan">Montant Libre</h2><br>
				<br><?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h3 style="margin:auto;text-align:center;color:red">'.$_SESSION['message'].'</h3>'; $_SESSION['message']="";} ?>
			<form method="post" action="" class="form_99_400" style="margin:auto;text-align:center"/>
				<p><label style="color:#289AFE" for="totalP">Montant libre </label></p><br>
				<p><input class="inp_99" style="width:80px" type="text" name="totalP" id="totalP" value="<?php if(isset($totalP) AND !empty($totalP)){echo $totalP;}?>"/><?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p><br>
				<p><input class="inp_99_subm" type="submit" value="Déterminer"/></p>
			</form>
				<?php
	$req2=$bdd->prepare('SELECT * FROM produits WHERE obs_url LIKE ?');
	$req2->execute(array('libreP'));
	$donnees2=$req2->fetch();
			
			//$ids = array_keys($_SESSION['panier']);
	$ids=$donnees2['nom'];
			
		$mop=$panier->count();
		$etat='non';
		if(isset($_SESSION['mail'])AND !empty($_SESSION['mail'])){
			$bb=1;
		} else {$_SESSION['mail']='user@mail.com';}
		
		if(isset($_SESSION['mail']) AND !empty($_SESSION['mail'])){
			$req=$bdd->prepare('DELETE FROM commande WHERE acheteur=:acheteur AND  etat=:etat');
			$req->execute(array('acheteur'=>htmlspecialchars($_SESSION['mail']),'etat'=>$etat));

			if(isset($_SESSION['reference']) AND !empty($_SESSION['reference'])){
				$req11=$bdd->prepare('DELETE FROM nbre_reduction WHERE reference=?');
				$req11->execute(array($_SESSION['reference']));
			}
		} else
		{
		$req=$bdd->prepare('DELETE FROM commande WHERE reference=:reference AND  etat=:etat');
		$req->execute(array('reference'=>$_SESSION['reference'],
			'etat'=>$etat));

		$req11=$bdd->prepare('DELETE FROM nbre_reduction WHERE reference=?');
		$req11->execute(array($_SESSION['reference']));
		}
		
		if(isset($_SESSION['reference']) AND !empty($_SESSION['reference'])){

			$referenceold=$_SESSION['reference'];

			$req6=$bdd->prepare('DELETE FROM operande2 WHERE reference=:reference');
			$req6->execute(array('reference'=>$_SESSION['reference']));

			$req10=$bdd->prepare('DELETE FROM operande WHERE reference=:reference');
			$req10->execute(array('reference'=>$_SESSION['reference']));
		}

		$_SESSION['reference']="";
		$reference="";
		$monfichier = fopen('reference.txt', 'r+');
		$reference_before1=intval(fgets($monfichier));
		$reference_before=$reference_before1+1;
		fseek($monfichier, 0);
		fputs($monfichier, $reference_before);
		fclose($monfichier);
		$reference.='ref';
		$reference.=$reference_before;
		$_SESSION['reference']=$reference;
		if(isset($ref2) AND !empty($ref2)){
			$q=1;
		} else { $ref2="";}

		$livraison2=0;
		$livraison=0;
		$livraison3=0;
		$livraison4=0;
		$livraison5=0;


		$req7=$bdd->prepare('INSERT INTO operande2(reference, ref2, livraison, etat, acheteur) VALUES (:reference, :ref2, :livraison, :etat, :acheteur)');
		$req7->execute(array('reference'=>$_SESSION['reference'],'ref2'=>$ref2, 'livraison'=>$livraison, 'etat'=>$etat, 'acheteur'=>$_SESSION['mail']));
		
		$req12=$bdd->prepare('INSERT INTO nbre_reduction(reference, nbre) VALUES(:reference, :nbre)');
		$req12->execute(array('reference'=>$_SESSION['reference'], 'nbre'=>1));

		$nbrart=$panier->count();
	
		$livr4=$bdd->prepare('SELECT * FROM produits WHERE titre=?');
		$livr4->execute(array($donnees2['titre']));
		$livr33=$livr4->fetch();

		$livr=$bdd->prepare('SELECT livraison FROM operande2 WHERE reference=? AND etat=?');
		$livr->execute(array($_SESSION['reference'], $etat));
		$livr21=$livr->fetch();

		
		$livraison3=number_format(0,2,'.',' ');
		
		$grand_total=$livraison3+$panier->total();
		
		$req4=$bdd->prepare('UPDATE operande2 SET livraison=:livraison WHERE reference=:reference AND etat=:etat');
		$req4->execute(array('livraison'=>$livraison3, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));

		$nbr_produit=1;
		
		$nul='aaaaaaaa00000000';
		$non='non';
		$poids=0;
		if($nbrart=0){
			$grand_total1=0;
		} else {
		$grand_total1=$panier->total()+$livraison3;
		}
		$grand_total=number_format($grand_total1,2,'.','');

		$reduction=number_format('0',2,'.','');
		
		$req9=$bdd->prepare('INSERT INTO commande(devise, ref_obj, obs_url, reduction, livr_inter, reference, ref2, img_type,cle_image, titre, quantite, prix, TVA, sous_total, total, livraison, grand_total, poids, etat, acheteur, mac, telechar, date_com) VALUES(:devise, :ref_obj, :obs_url, :reduction, :livr_inter, :reference, :ref2, :img_type,:cle_image, :titre, :quantite, :prix, :TVA, :sous_total, :total, :livraison, :grand_total, :poids, :etat, :acheteur, :mac, :telechar, NOW())');
		$req9->execute(array(
							'devise'=>$devise,
							'ref_obj'=>$donnees2['ref_obj'],
							'obs_url'=>$donnees2['obs_url'],
							'reduction'=>$reduction,
							'livr_inter'=>$non,
							'reference'=>$_SESSION['reference'],
							'ref2'=>$ref2,
							'img_type'=>$donnees2['img_type'],
							'cle_image'=>$donnees2['cle_image'],
							'titre'=>$donnees2['titre'],
							'quantite'=>'1',
							'prix'=>number_format($totalP,2,'.',''),
							'TVA'=>number_format($donnees2['TVA'],2,'.',''),
							'sous_total'=>number_format($totalP * 1 ,2,'.',''),
							'total'=>number_format($totalP,2,'.',''),
							'livraison'=>$livraison3,
							'grand_total'=>number_format($totalP * 1 ,2,'.',''),
							'poids'=>$poids,
							'etat'=>$etat,
							'acheteur'=>htmlspecialchars($_SESSION['mail']),
							'mac'=>$nul,
							'telechar'=>$donnees2['nom']));
		//depart ajouté
		$titre=$donnees2['titre'];
		$req2=$bdd->prepare('SELECT quantite FROM produits WHERE titre=?');
		$req2->execute(array($titre));
		$donnees=$req2->fetch();

		$prods=$donnees['quantite'];
		$pan=1;
		$quant=$prods-$pan;

		if($quant<0){echo '<h2 style="background-color:red;text-align:center;margin:auto">'.'Vous devez prendre un nombre inférieur de  ---->  '.$titre.'</h2>'.'</br>';

		}
		$req3=$bdd->prepare('INSERT INTO operande(titre, quantite, reference, acheteur, date_com) VALUES (:ntitre, :nquantite, :nreference, :nacheteur, NOW())');
		$req3->execute(array('ntitre'=>$titre,
							'nquantite'=>$quant,
							'nreference'=>$_SESSION['reference'],
							'nacheteur'=>$_SESSION['mail']));


		$req->closeCursor();
		
		if(isset($req2) AND !empty($req2)){
			$req2->closeCursor();
		}
		if(isset($req3) AND !empty($req3)){
			$req3->closeCursor();
		}
		if(isset($req4) AND !empty($req4)){
			$req4->closeCursor();
		}
		if(isset($req5) AND !empty($req5)){
			$req5->closeCursor();
		}
		if(isset($req6) AND !empty($req6)){
			$req6->closeCursor();
		}
		if(isset($req7) AND !empty($req7)){
			$req7->closeCursor();
		}
		if(isset($req8) AND !empty($req8)){
			$req8->closeCursor();
		}
		if(isset($req9) AND !empty($req9)){
			$req9->closeCursor();
		}
		if(isset($req10) AND !empty($req10)){
			$req10->closeCursor();
		}
		if(isset($livr4) AND !empty($livr4)){
			$livr4->closeCursor();
		}
		if(isset($livr) AND !empty($livr)){
			$livr->closeCursor();
		}

			if(isset($donnees2['promotion']) AND $donnees2['promotion'] == "oui"){
			$ifpromo="oui";
			} else {
				$ifpromo="non";
			} 
			?>
<div class="contenair_prod">	
			<form class="form1" method="post" action="panier-libre.php">
				<a href="#"><img class="descr_prod1_img" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees2['cle_image'];}else{echo $donnees2['cle_image'];} ?>"/></a>
				<p id="p_panier1"><?= $donnees2['titre']; ?></p>
				<p style="font-size:15px">Prix : <?= number_format($totalP,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
				<p id="p_panier">Quantité : 1</p>
				<p style="font-size:15px">Prix TTC : <?= number_format($totalP * 1.000,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?><span style="font-size:8px">(1)</span></p>
				<div style="margin:auto;display:block"><a href="panier-libre-reset.php"><img id="action_l1" src="publicimgs/del.png"/></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</div>
				<br>
				<p id="line"> </p>
			<?php 
			$req21=$bdd->prepare('UPDATE commande SET livraison=:livraison, grand_total=:grand_total WHERE reference=:reference');
			$req21->execute(array('livraison'=>$livraison3,
					'grand_total'=>number_format($totalP,2,'.',''),
					'reference'=>$_SESSION['reference']));
?>

				<div class="rowtotal">
					<p>Total : <?= number_format($totalP * 1.000,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
					<p>Livraison : <?php echo number_format($livraison3,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
					<p>Grand Total<span style="font-size:8px">(1)</span>: <?php echo number_format($totalP,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p></br>
				</div>
		</div>
	</form>
	<?php $req510=$bdd1->query('SELECT * FROM lignep');
$donnees510=$req510->fetch();?>
<p style="font-size: 8px">(1)<?php echo $donnees510['contenu'];?></p>
</br></br>
<!--ajout adresses-->
<?php $req70=$bdd->prepare('SELECT * FROM compte WHERE mail=?');
$req70->execute(array($_SESSION['mail']));
$donnees70=$req70->fetch();?>
<form class="form2" method="post" action="customer/Adresse-Facturation">
<div id="contenair_adr">
	<div class="inp_CGV_subm">
		<p class="CGV"><label for="cgv" >J'accepte les CGV </label>&nbsp;&nbsp;<input type="checkbox" name="cgv" value="oui"/>&nbsp;&nbsp;<a class="inp_cgv_subm" href="mise-en-garde.php">Voir</a></p>
		<p class="CGV"><label for="international">Vente internationale</label>
		<input type="checkbox" name="international" id="international" value="international_oui"/></p>
		<p class="CGV"><label for="click">Click 'n Collect</label>
		<input id="click" type="checkbox" name="click" value="click"/></p>
		<?php $req16=$bdd1->query('SELECT * FROM cheque');
		$donnees16=$req16->fetch();
		$answer3=$donnees16['exist'];
		if($answer3=="oui"){ ?>
 		<p class="CGV"><label for="cheque">Chèque</label>
		<input id="cheque" type="checkbox" name="cheque" value="cheque"/></p>
	<?php } ?>
	</div>
	<div class="inp_subm_form_adresses">
		<a class="a_retour" href="erase-panier.php">Retour</a>
		<input class="inp_subm_form_adresses_submit" type="submit" value="Suivant"/>
	</div>
	<div id="contenair_fact">
		<div id="bloc_title_facturation"><span id="title_adr_fact">Facturation</span></div>
		<div class="bloc_email">
			<input type="text" name="mail" id="mail" class="email" placeholder="email" value="<?php if (isset($donnees70['mail']) AND !empty($donnees70['mail'])){echo htmlspecialchars($donnees70['mail']);}?>"/>
		</div>
		<div id="cont_nompren_fact">
			<input type="text" name="prenom" id="prenom" class="inp_prenom_fact" placeholder="Prénom" value="<?php if (isset($donnees70['prenom']) AND !empty($donnees70['prenom'])){echo htmlspecialchars($donnees70['prenom']);}?>"/>
			<input type="text" name="nom" id="nom" class="inp_nom_fact" placeholder="Nom" value="<?php if (isset($donnees70['nom']) AND !empty($donnees70['nom'])){echo htmlspecialchars($donnees70['nom']);}?>"/>
		</div>
		<div class="inp_adresse_facturation">
			<input type="text" name="societe" id="societe" class="inp_societe_fact" placeholder="Société" value="<?php if (isset($donnees70['societe']) AND !empty($donnees70['societe'])){echo htmlspecialchars($donnees70['societe']);}?>"/>
			<input type="text" name="adresse1" id="adresse1" class="inp_adresse1_fact" placeholder="Adresse" value="<?php if (isset($donnees70['adresse1']) AND !empty($donnees70['adresse1'])){echo htmlspecialchars($donnees70['adresse1']);}?>"/>
			<input type="text" name="adresse2" id="adresse2" class="inp_adresse2_fact" placeholder="Complément d'adresse" value="<?php if (isset($donnees70['adresse2']) AND !empty($donnees70['adresse2'])){echo htmlspecialchars($donnees70['adresse2']);}?>"/>
		</div>
		<div id="cont_villecp_fact">
			<input type="text" name="code_postal" id="code_postal" class="inp_cp_fact" placeholder="Code Postal" value="<?php if (isset($donnees70['code_postal']) AND !empty($donnees70['code_postal'])){echo htmlspecialchars($donnees70['code_postal']);}?>"/>
			<input type="text" name="ville" id="ville" class="inp_ville_fact" placeholder="Ville" value="<?php if (isset($donnees70['ville']) AND !empty($donnees70['ville'])){echo htmlspecialchars($donnees70['ville']);}?>"/>
		</div>
		<div class="inp_statepays_facturation">
			<input type="text" name="province" id="province" class="inp_state_fact" placeholder="Région ou Province (vide si Fr)" value="<?php if (isset($donnees70['stateOrProvince']) AND !empty($donnees70['stateOrProvince'])){echo htmlspecialchars($donnees70['stateOrProvince']);}?>"/>
			<select name="pays" id="pays">
				<optgroup label="France-Dom-Tom">
				<option value = "FR"> France </option>
				<option value = "GP"> Guadeloupe </option>
				<option value = "GF"> Guyane française </option>
				<option value = "MQ"> Martinique </option>
				<option value = "YT"> Mayotte </option>
				<option value = "PF"> Polynésie française </option>
				<option value = "RE"> Réunion </option>
				<option value = "MF"> Saint Martin (partie française) </option>
				<option value = "PM"> Saint-Pierre-et-Miquelon </option>
				<option value = "TF"> Terres Australes Françaises </option>
				</optgroup>
				<optgroup label="International"><!--//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga-->
				<option value = "AF"> Afghanistan </option> 
				<option value = "AXE"> Îles d'Åland </option> 
				<option value = "AL"> Albanie </option> 
				<option value = "DZ"> Algérie </option>
				<option value = "ASS"> Samoa américaines </option>
				<option value = "AD"> Andorre </option>
				<option value = "AO"> Angola </option>
				<option value = "AI"> Anguilla </option>
				<option value = "AQ"> Antarctique </option>
				<option value = "AG"> Antigua-et-Barbuda </option>
				<option value = "AR"> Argentine </option>
				<option value = "AW"> Aruba </option>
				<option value = "AU"> Australie </option>
				<option value = "AT"> Autriche </option>
				<option value = "AZ"> Azerbaïdjan </option>
				<option value = "BS"> Bahamas </option>
				<option value = "BH"> Bahreïn </option>
				<option value = "BD"> Bangladesh </option>
				<option value = "BB"> Barbade </option><
				<option value = "BYY"> Biélorussie </option>
				<option value = "BE"> Belgique </option>
				<option value = "BZ"> Belize </option>
				<option value = "BJ"> Bénin </option>
				<option value = "BM"> Bermudes </option>
				<option value = "BT"> Bhoutan </option>
				<option value = "BO"> Bolivie, État plurinational de </option><
				<option value = "BQ"> Bonaire, Saint-Eustache et Saba </option>
				<option value = "BA"> Bosnie-Herzégovine </option>
				<option value = "BW"> Botswana </option>
				<option value = "BV"> Île Bouvet </option>
				<option value = "BR"> Brésil </option>
				<option value = "IO"> Territoire britannique de l'océan Indien </option>
				<option value = "BN"> Brunéi Darussalam </option>
				<option value = "BG"> Bulgarie </option>
				<option value = "BF"> Burkina Faso </option> 
				<option value = "BI"> Burundi </option>
				<option value = "KH"> Cambodge </option>
				<option value = "CM"> Cameroun </option> 
				<option value = "CA"> Canada </option>
				<option value = "CV"> Cap Vert </option>
				<option value = "KY"> Iles Caïman </option>
				<option value = "CF"> République centrafricaine </option>
				<option value = "TD"> Tchad </option>
				<option value = "CL"> Chili </option>
				<option value = "CN"> Chine </option>
				<option value = "CX"> Île Christmas </option>
				<option value = "CC"> Îles Cocos (Keeling) </option>
				<option value = "CO"> Colombie </option> 
				<option value = "KM"> Comores </option>
				<option value = "CG"> Congo </option>
				<option value = "CD"> Congo, République démocratique du </option>
				<option value = "CK"> Iles Cook </option>
				<option value = "CR"> Costa Rica </option>
				<option value = "CI"> Côte d'Ivoire </option> 
				<option value = "HR"> Croatie </option>
				<option value = "CU"> Cuba </option>
				<option value = "CW"> Curaçao </option>
				<option value = "CY"> Chypre </option>
				<option value = "CZ"> République tchèque </option>
				<option value = "NSP"> Danemark </option>
				<option value = "DJ"> Djibouti </option>
				<option value = "DM"> Dominique </option>
				<option value = "DO"> République dominicaine </option>
				<option value = "CE"> Équateur </option>
				<option value = "EG"> Égypte </option>
				<option value = "SV"> Salvador </option>
				<option value = "GQ"> Guinée équatoriale </option>
				<option value = "ER"> Erythrée </option> 
				<option value = "EE"> Estonie </option>
				<option value = "ET"> Ethiopie </option>
				<option value = "FK"> Îles Falkland (Malvinas) </option>
				<option value = "FO"> Îles Féroé </option>
				<option value = "FJ"> Fidji </option>
				<option value = "FI"> Finlande </option>
				<option value = "GM"> Gambie </option>
				<option value = "GE"> Géorgie </option>
				<option value = "DE"> Allemagne </option>
				<option value = "GH"> Ghana </option>
				<option value = "GI"> Gibraltar </option>
				<option value = "GR"> Grèce </option>
				<option value = "GL"> Groenland </option>
				<option value = "GD"> Grenade </option>
				<option value = "GU"> Guam </option>
				<option value = "GT"> Guatemala </option>
				<option value = "GG"> Guernesey </option>
				<option value = "GN"> Guinée </option>
				<option value = "GW"> Guinée Bissau </option>
				<option value = "GY"> Guyane </option>
				<option value = "HT"> Haïti </option> 
				<option value = "HM"> Îles Heard et McDonald </option>
				<option value = "VA"> Saint-Siège (État du Vatican) </option>
				<option value = "HN"> Honduras </option>
				<option value = "HK"> Hong Kong </option> 
				<option value = "HU"> Hongrie </option>
				<option value = "ISS"> Islande </option>
				<option value = "INN"> Inde </option>
				<option value = "IDD"> Indonésie </option>
				<option value = "IR"> Iran, République islamique d '</option>
				<option value = "IQ"> Iraq </option>
				<option value = "IE"> Irlande </option>
				<option value = "IM"> Ile de Man </option>
				<option value = "IL"> Israël </option>
				<option value = "IT"> Italie </option>
				<option value = "JM"> Jamaïque </option>
				<option value = "JP"> Japon </option>
				<option value = "JE"> Jersey </option>
				<option value = "JO"> Jordanie </option>
				<option value = "KZ"> Kazakhstan </option>
				<option value = "KE"> Kenya </option>
				<option value = "KI"> Kiribati </option>
				<option value = "KP"> Corée, République populaire démocratique de </option>
				<option value = "KR"> Corée, République de </option>
				<option value = "KW"> Koweït </option>
				<option value = "KG"> Kirghizistan </option>
				<option value = "LA"> République démocratique populaire lao </option>
				<option value = "LV"> Lettonie </option>
				<option value = "LB"> Liban </option>
				<option value = "LS"> Lesotho </option>
				<option value = "LR"> Libéria </option>
				<option value = "LY"> Libye </option>
				<option value = "LI"> Liechtenstein </option>
				<option value = "LT"> Lituanie </option>
				<option value = "LU"> Luxembourg </option>
				<option value = "MO"> Macao </option>
				<option value = "MK"> Macédoine, ancienne République yougoslave de </option>
				<option value = "MG"> Madagascar </option>
				<option value = "MW"> Malawi </option>
				<option value = "MY"> Malaisie </option>
				<option value = "MV"> Maldives </option>
				<option value = "ML"> Mali </option>
				<option value = "MT"> Malte </option>
				<option value = "MH"> Îles Marshall </option>
				<option value = "MR"> Mauritanie </option>
				<option value = "MU"> Maurice </option>
				<option value = "MX"> Mexique </option>
				<option value = "FM"> Micronésie, États fédérés de </option>
				<option value = "MD"> Moldova, République de </option>
				<option value = "MC"> Monaco </option>
				<option value = "MN"> Mongolie </option>
				<option value = "ME"> Monténégro </option>
				<option value = "MS"> Montserrat </option>
				<option value = "MA"> Maroc </option>
				<option value = "MZ"> Mozambique </option>
				<option value = "MM"> Myanmar </option>
				<option value = "NA"> Namibie </option>
				<option value = "NR"> Nauru </option>
				<option value = "NP"> Népal </option>
				<option value = "NL"> Pays-Bas </option>
				<option value = "NC"> Nouvelle-Calédonie </option>
				<option value = "NZ"> Nouvelle-Zélande </option>
				<option value = "NI"> Nicaragua </option>
				<option value = "NE"> Niger </option>
				<option value = "NG"> Nigéria </option>
				<option value = "NU"> Nioué </option>
				<option value = "NF"> Île Norfolk </option>
				<option value = "MP"> Îles Mariannes du Nord </option>
				<option value = "NO"> Norvège </option>
				<option value = "OM"> Oman </option>
				<option value = "PK"> Pakistan </option>
				<option value = "PW"> Palaos </option>
				<option value = "PS"> Territoire palestinien occupé </option>
				<option value = "PA"> Panama </option>
				<option value = "PG"> Papouasie-Nouvelle-Guinée </option>
				<option value = "PY"> Paraguay </option>
				<option value = "PE"> Pérou </option>
				<option value = "PH"> Philippines </option>
				<option value = "PN"> Pitcairn </option>
				<option value = "PL"> Pologne </option>
				<option value = "PT"> Portugal </option>
				<option value = "PR"> Porto Rico </option>
				<option value = "QA"> Qatar </option>
				<option value = "RO"> Roumanie </option>
				<option value = "RU"> Fédération de Russie </option>
				<option value = "RW"> Rwanda </option>
				<option value = "BL"> Saint Barthélemy </option>
				<option value = "SH"> Sainte-Hélène, Ascension et Tristan da Cunha </option>
				<option value = "KN"> Saint-Kitts-et-Nevis </option>
				<option value = "LC"> Sainte-Lucie </option>
				<option value = "VC"> Saint-Vincent-et-les Grenadines </option>
				<option value = "WS"> Samoa </option>
				<option value = "SM"> Saint-Marin </option> 
				<option value = "ST"> Sao Tomé et Principe </option>
				<option value = "SA"> Arabie saoudite </option>
				<option value = "SN"> Sénégal </option>
				<option value = "RS"> Serbie </option>
				<option value = "SC"> Seychelles </option>
				<option value = "SL"> Sierra Leone </option>
				<option value = "SG"> Singapour </option>
				<option value = "SX"> Sint Maarten (partie néerlandaise) </option>
				<option value = "SK"> Slovaquie </option>
				<option value = "SI"> Slovénie </option>
				<option value = "SB"> Iles Salomon </option>
				<option value = "SO"> Somalie </option>
				<option value = "ZA"> Afrique du Sud </option>
				<option value = "GS"> Îles Géorgie du Sud et Sandwich du Sud </option>
				<option value = "SS"> Soudan du Sud </option>
				<option value = "ES"> Espagne </option>
				<option value = "LK"> Sri Lanka </option>
				<option value = "SD"> Soudan </option>
				<option value = "SR"> Suriname </option>
				<option value = "SJ"> Svalbard et Jan Mayen </option>
				<option value = "SZ"> Swaziland </option>
				<option value = "SE"> Suède </option>
				<option value = "CH"> Suisse </option>
				<option value = "SY"> République arabe syrienne </option>
				<option value = "TW"> Taiwan, province de Chine </option>
				<option value = "TJ"> Tadjikistan </option>
				<option value = "TZ"> Tanzanie, République-Unie de </option>
				<option value = "TH"> Thaïlande </option>
				<option value = "TL"> Timor-Leste </option>
				<option value = "TG"> Togo </option>
				<option value = "TK"> Tokélaou </option>
				<option value = "TOO"> Tonga </option>
				<option value = "TT"> Trinité-et-Tobago </option>
				<option value = "TN"> Tunisie </option>
				<option value = "TR"> Turquie </option>
				<option value = "TM"> Turkménistan </option>
				<option value = "TC"> Îles Turques et Caïques </option>
				<option value = "TV"> Tuvalu </option>
				<option value = "UG"> Ouganda </option>
				<option value = "UA"> Ukraine </option>
				<option value = "AE"> Emirats Arabes Unis </option>
				<option value = "GB"> Royaume-Uni </option>
				<option value = "US"> États-Unis </option>
				<option value = "UM"> Îles mineures éloignées des États-Unis </option>
				<option value = "UY"> Uruguay </option>
				<option value = "UZ"> Ouzbékistan </option>
				<option value = "VU"> Vanuatu </option>
				<option value = "VE"> Venezuela, République bolivarienne de </option>
				<option value = "VN"> Viet Nam </option>
				<option value = "VG"> Îles Vierges britanniques </option>
				<option value = "VI"> Îles Vierges américaines </option>
				<option value = "WF"> Wallis et Futuna </option>
				<option value = "EH"> Sahara occidental </option>
				<option value = "YE"> Yémen </option>
				<option value = "ZM"> Zambie </option>
				<option value = "ZW"> Zimbabwe </option>
				</optgroup>
			</select>
		</div>
	</div>
	<div id="contenair_livr">
		<div id="bloc_title_livraison"><span id="title_adr_livr">Livraison</span></div>
		<div id="cont_nompren_livr">
			<input type="text" name="prenom_livr" id="prenom_livr" class="inp_prenom_livr" placeholder="Prénom" value="<?php if (isset($donnees70['prenom_livr']) AND !empty($donnees70['prenom_livr'])){echo htmlspecialchars($donnees70['prenom_livr']);}?>"/>
			<input type="text" name="nom_livr" id="nom_livr" class="inp_nom_livr" placeholder="Nom" value="<?php if (isset($donnees70['nom_livr']) AND !empty($donnees70['nom_livr'])){echo htmlspecialchars($donnees70['nom_livr']);}?>"/>
		</div>
		<div class="inp_adresse_livr">
			<input type="text" name="societe_livr" id="societe_livr" class="inp_societe_livr" placeholder="Société" value="<?php if (isset($donnees70['societe_livr']) AND !empty($donnees70['societe_livr'])){echo htmlspecialchars($donnees70['societe_livr']);}?>"/>
			<input type="text" name="adresse1_livr" id="adresse1_livr" class="inp_adresse1_livr" placeholder="Adresse" value="<?php if (isset($donnees70['adresse1_livr']) AND !empty($donnees70['adresse1_livr'])){echo htmlspecialchars($donnees70['adresse1_livr']);}?>"/>
			<input type="text" name="adresse2_livr" id="adresse2_livr" class="inp_adresse2_livr" placeholder="Complément d'adresse" value="<?php if (isset($donnees70['adresse2_livr']) AND !empty($donnees70['adresse2_livr'])){echo htmlspecialchars($donnees70['adresse2_livr']);}?>"/>
		</div>
		<div id="cont_villecp_livr">
			<input type="text" name="code_postal_livr" id="code_postal_livr" class="inp_cp_livr" placeholder="Code Postal" value="<?php if (isset($donnees70['code_postal_livr']) AND !empty($donnees70['code_postal_livr'])){echo htmlspecialchars($donnees70['code_postal_livr']);}?>"/>
			<input type="text" name="ville_livr" id="ville_livr" class="inp_ville_livr" placeholder="Ville" value="<?php if (isset($donnees70['ville_livr']) AND !empty($donnees70['ville_livr'])){echo htmlspecialchars($donnees70['ville_livr']);}?>"/>
		</div>
		<div class="inp_statepays_facturation">
			<input type="text" name="province_livr" id="province_livr" class="inp_state_livr" placeholder="Région ou Province (vide si Fr)" value="<?php if (isset($donnees70['stateOrProvince_livr']) AND !empty($donnees70['stateOrProvince_livr'])){echo htmlspecialchars($donnees70['stateOrProvince_livr']);}?>"/>
			<select name="pays_livr" id="pays_livr"></p>
	          <optgroup label="France-Dom-Tom">
				  <option value = "FR"> France </option>
				  <option value = "GP"> Guadeloupe </option>
				  <option value = "GF"> Guyane française </option>
				  <option value = "MQ"> Martinique </option>
				  <option value = "YT"> Mayotte </option>
				  <option value = "PF"> Polynésie française </option>
				  <option value = "RE"> Réunion </option>
				  <option value = "MF"> Saint Martin (partie française) </option>
				  <option value = "PM"> Saint-Pierre-et-Miquelon </option>
				  <option value = "TF"> Terres Australes Françaises </option>
				          </optgroup>
				          <optgroup label="International"><!--//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga-->
				  <option value = "AF"> Afghanistan </option> 
				  <option value = "AXE"> Îles d'Åland </option> 
				  <option value = "AL"> Albanie </option> 
				  <option value = "DZ"> Algérie </option>
				  <option value = "ASS"> Samoa américaines </option>
				  <option value = "AD"> Andorre </option>
				  <option value = "AO"> Angola </option>
				  <option value = "AI"> Anguilla </option>
				  <option value = "AQ"> Antarctique </option>
				  <option value = "AG"> Antigua-et-Barbuda </option>
				  <option value = "AR"> Argentine </option>
				  <option value = "AW"> Aruba </option>
				  <option value = "AU"> Australie </option>
				  <option value = "AT"> Autriche </option>
				  <option value = "AZ"> Azerbaïdjan </option>
				  <option value = "BS"> Bahamas </option>
				  <option value = "BH"> Bahreïn </option>
				  <option value = "BD"> Bangladesh </option>
				  <option value = "BB"> Barbade </option><
				  <option value = "BYY"> Biélorussie </option>
				  <option value = "BE"> Belgique </option>
				  <option value = "BZ"> Belize </option>
				  <option value = "BJ"> Bénin </option>
				  <option value = "BM"> Bermudes </option>
				  <option value = "BT"> Bhoutan </option>
				  <option value = "BO"> Bolivie, État plurinational de </option><
				  <option value = "BQ"> Bonaire, Saint-Eustache et Saba </option>
				  <option value = "BA"> Bosnie-Herzégovine </option>
				  <option value = "BW"> Botswana </option>
				  <option value = "BV"> Île Bouvet </option>
				  <option value = "BR"> Brésil </option>
				  <option value = "IO"> Territoire britannique de l'océan Indien </option>
				  <option value = "BN"> Brunéi Darussalam </option>
				  <option value = "BG"> Bulgarie </option>
				  <option value = "BF"> Burkina Faso </option> 
				  <option value = "BI"> Burundi </option>
				  <option value = "KH"> Cambodge </option>
				  <option value = "CM"> Cameroun </option> 
				  <option value = "CA"> Canada </option>
				  <option value = "CV"> Cap Vert </option>
				  <option value = "KY"> Iles Caïman </option>
				  <option value = "CF"> République centrafricaine </option>
				  <option value = "TD"> Tchad </option>
				  <option value = "CL"> Chili </option>
				  <option value = "CN"> Chine </option>
				  <option value = "CX"> Île Christmas </option>
				  <option value = "CC"> Îles Cocos (Keeling) </option>
				  <option value = "CO"> Colombie </option> 
				  <option value = "KM"> Comores </option>
				  <option value = "CG"> Congo </option>
				  <option value = "CD"> Congo, République démocratique du </option>
				  <option value = "CK"> Iles Cook </option>
				  <option value = "CR"> Costa Rica </option>
				  <option value = "CI"> Côte d'Ivoire </option> 
				  <option value = "HR"> Croatie </option>
				  <option value = "CU"> Cuba </option>
				  <option value = "CW"> Curaçao </option>
				  <option value = "CY"> Chypre </option>
				  <option value = "CZ"> République tchèque </option>
				  <option value = "NSP"> Danemark </option>
				  <option value = "DJ"> Djibouti </option>
				  <option value = "DM"> Dominique </option>
				  <option value = "DO"> République dominicaine </option>
				  <option value = "CE"> Équateur </option>
				  <option value = "EG"> Égypte </option>
				  <option value = "SV"> Salvador </option>
				  <option value = "GQ"> Guinée équatoriale </option>
				  <option value = "ER"> Erythrée </option> 
				  <option value = "EE"> Estonie </option>
				  <option value = "ET"> Ethiopie </option>
				  <option value = "FK"> Îles Falkland (Malvinas) </option>
				  <option value = "FO"> Îles Féroé </option>
				  <option value = "FJ"> Fidji </option>
				  <option value = "FI"> Finlande </option>
				  <option value = "GM"> Gambie </option>
				  <option value = "GE"> Géorgie </option>
				  <option value = "DE"> Allemagne </option>
				  <option value = "GH"> Ghana </option>
				  <option value = "GI"> Gibraltar </option>
				  <option value = "GR"> Grèce </option>
				  <option value = "GL"> Groenland </option>
				  <option value = "GD"> Grenade </option>
				  <option value = "GU"> Guam </option>
				  <option value = "GT"> Guatemala </option>
				  <option value = "GG"> Guernesey </option>
				  <option value = "GN"> Guinée </option>
				  <option value = "GW"> Guinée Bissau </option>
				  <option value = "GY"> Guyane </option>
				  <option value = "HT"> Haïti </option> 
				  <option value = "HM"> Îles Heard et McDonald </option>
				  <option value = "VA"> Saint-Siège (État du Vatican) </option>
				  <option value = "HN"> Honduras </option>
				  <option value = "HK"> Hong Kong </option> 
				  <option value = "HU"> Hongrie </option>
				  <option value = "ISS"> Islande </option>
				  <option value = "INN"> Inde </option>
				  <option value = "IDD"> Indonésie </option>
				  <option value = "IR"> Iran, République islamique d '</option>
				  <option value = "IQ"> Iraq </option>
				  <option value = "IE"> Irlande </option>
				  <option value = "IM"> Ile de Man </option>
				  <option value = "IL"> Israël </option>
				  <option value = "IT"> Italie </option>
				  <option value = "JM"> Jamaïque </option>
				  <option value = "JP"> Japon </option>
				  <option value = "JE"> Jersey </option>
				  <option value = "JO"> Jordanie </option>
				  <option value = "KZ"> Kazakhstan </option>
				  <option value = "KE"> Kenya </option>
				  <option value = "KI"> Kiribati </option>
				  <option value = "KP"> Corée, République populaire démocratique de </option>
				  <option value = "KR"> Corée, République de </option>
				  <option value = "KW"> Koweït </option>
				  <option value = "KG"> Kirghizistan </option>
				  <option value = "LA"> République démocratique populaire lao </option>
				  <option value = "LV"> Lettonie </option>
				  <option value = "LB"> Liban </option>
				  <option value = "LS"> Lesotho </option>
				  <option value = "LR"> Libéria </option>
				  <option value = "LY"> Libye </option>
				  <option value = "LI"> Liechtenstein </option>
				  <option value = "LT"> Lituanie </option>
				  <option value = "LU"> Luxembourg </option>
				  <option value = "MO"> Macao </option>
				  <option value = "MK"> Macédoine, ancienne République yougoslave de </option>
				  <option value = "MG"> Madagascar </option>
				  <option value = "MW"> Malawi </option>
				  <option value = "MY"> Malaisie </option>
				  <option value = "MV"> Maldives </option>
				  <option value = "ML"> Mali </option>
				  <option value = "MT"> Malte </option>
				  <option value = "MH"> Îles Marshall </option>
				  <option value = "MR"> Mauritanie </option>
				  <option value = "MU"> Maurice </option>
				  <option value = "MX"> Mexique </option>
				  <option value = "FM"> Micronésie, États fédérés de </option>
				  <option value = "MD"> Moldova, République de </option>
				  <option value = "MC"> Monaco </option>
				  <option value = "MN"> Mongolie </option>
				  <option value = "ME"> Monténégro </option>
				  <option value = "MS"> Montserrat </option>
				  <option value = "MA"> Maroc </option>
				  <option value = "MZ"> Mozambique </option>
				  <option value = "MM"> Myanmar </option>
				  <option value = "NA"> Namibie </option>
				  <option value = "NR"> Nauru </option>
				  <option value = "NP"> Népal </option>
				  <option value = "NL"> Pays-Bas </option>
				  <option value = "NC"> Nouvelle-Calédonie </option>
				  <option value = "NZ"> Nouvelle-Zélande </option>
				  <option value = "NI"> Nicaragua </option>
				  <option value = "NE"> Niger </option>
				  <option value = "NG"> Nigéria </option>
				  <option value = "NU"> Nioué </option>
				  <option value = "NF"> Île Norfolk </option>
				  <option value = "MP"> Îles Mariannes du Nord </option>
				  <option value = "NO"> Norvège </option>
				  <option value = "OM"> Oman </option>
				  <option value = "PK"> Pakistan </option>
				  <option value = "PW"> Palaos </option>
				  <option value = "PS"> Territoire palestinien occupé </option>
				  <option value = "PA"> Panama </option>
				  <option value = "PG"> Papouasie-Nouvelle-Guinée </option>
				  <option value = "PY"> Paraguay </option>
				  <option value = "PE"> Pérou </option>
				  <option value = "PH"> Philippines </option>
				  <option value = "PN"> Pitcairn </option>
				  <option value = "PL"> Pologne </option>
				  <option value = "PT"> Portugal </option>
				  <option value = "PR"> Porto Rico </option>
				  <option value = "QA"> Qatar </option>
				  <option value = "RO"> Roumanie </option>
				  <option value = "RU"> Fédération de Russie </option>
				  <option value = "RW"> Rwanda </option>
				  <option value = "BL"> Saint Barthélemy </option>
				  <option value = "SH"> Sainte-Hélène, Ascension et Tristan da Cunha </option>
				  <option value = "KN"> Saint-Kitts-et-Nevis </option>
				  <option value = "LC"> Sainte-Lucie </option>
				  <option value = "VC"> Saint-Vincent-et-les Grenadines </option>
				  <option value = "WS"> Samoa </option>
				  <option value = "SM"> Saint-Marin </option> 
				  <option value = "ST"> Sao Tomé et Principe </option>
				  <option value = "SA"> Arabie saoudite </option>
				  <option value = "SN"> Sénégal </option>
				  <option value = "RS"> Serbie </option>
				  <option value = "SC"> Seychelles </option>
				  <option value = "SL"> Sierra Leone </option>
				  <option value = "SG"> Singapour </option>
				  <option value = "SX"> Sint Maarten (partie néerlandaise) </option>
				  <option value = "SK"> Slovaquie </option>
				  <option value = "SI"> Slovénie </option>
				  <option value = "SB"> Iles Salomon </option>
				  <option value = "SO"> Somalie </option>
				  <option value = "ZA"> Afrique du Sud </option>
				  <option value = "GS"> Îles Géorgie du Sud et Sandwich du Sud </option>
				  <option value = "SS"> Soudan du Sud </option>
				  <option value = "ES"> Espagne </option>
				  <option value = "LK"> Sri Lanka </option>
				  <option value = "SD"> Soudan </option>
				  <option value = "SR"> Suriname </option>
				  <option value = "SJ"> Svalbard et Jan Mayen </option>
				  <option value = "SZ"> Swaziland </option>
				  <option value = "SE"> Suède </option>
				  <option value = "CH"> Suisse </option>
				  <option value = "SY"> République arabe syrienne </option>
				  <option value = "TW"> Taiwan, province de Chine </option>
				  <option value = "TJ"> Tadjikistan </option>
				  <option value = "TZ"> Tanzanie, République-Unie de </option>
				  <option value = "TH"> Thaïlande </option>
				  <option value = "TL"> Timor-Leste </option>
				  <option value = "TG"> Togo </option>
				  <option value = "TK"> Tokélaou </option>
				  <option value = "TOO"> Tonga </option>
				  <option value = "TT"> Trinité-et-Tobago </option>
				  <option value = "TN"> Tunisie </option>
				  <option value = "TR"> Turquie </option>
				  <option value = "TM"> Turkménistan </option>
				  <option value = "TC"> Îles Turques et Caïques </option>
				  <option value = "TV"> Tuvalu </option>
				  <option value = "UG"> Ouganda </option>
				  <option value = "UA"> Ukraine </option>
				  <option value = "AE"> Emirats Arabes Unis </option>
				  <option value = "GB"> Royaume-Uni </option>
				  <option value = "US"> États-Unis </option>
				  <option value = "UM"> Îles mineures éloignées des États-Unis </option>
				  <option value = "UY"> Uruguay </option>
				  <option value = "UZ"> Ouzbékistan </option>
				  <option value = "VU"> Vanuatu </option>
				  <option value = "VE"> Venezuela, République bolivarienne de </option>
				  <option value = "VN"> Viet Nam </option>
				  <option value = "VG"> Îles Vierges britanniques </option>
				  <option value = "VI"> Îles Vierges américaines </option>
				  <option value = "WF"> Wallis et Futuna </option>
				  <option value = "EH"> Sahara occidental </option>
				  <option value = "YE"> Yémen </option>
				  <option value = "ZM"> Zambie </option>
				  <option value = "ZW"> Zimbabwe </option>
			  </optgroup>
			</select>
		</div>
	</div>
</div>
<br><br><br><br><br>
</form>
<!--fin ajout adresses-->
			</div>
		<?php $non_aff_compt=true; require 'footer.php';?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/moinsplus.js"></script>

        <!-- Javascript -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="assets/js/custom.js"></script>
  </body>
</html>
<br><br><br><br><br>
<!--input style="border:1px solid grey;background-color:#DDE3E3;box-shadow:2px 2px 4x #DDE3E3;font-family:Arial,sans-serif" <p id='descr_prod1'>