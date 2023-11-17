<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';
require '../texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require '../boutique0.php';
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
?>
<div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
</div>
<!DOCTYPE html>
<html id="bloc_page">

<?php require 'head.php'; ?>
<body>
<div class="panier_page">
<?php require 'menu-haut.php';?>

<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
<br><div class="vis1"><p style="height:100px"></div>
<div class="tot_art">
	<ul class="items">Nb.Art <span id="count"><?= $panier->count();?></span></ul>
	<ul class="total">TOTAL <span><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span><?php if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></span></ul>
</div>

</br></br>
	

	<h1><?php echo $ste['nom'].' - '.$ste['sigle'];?></h1>
				<h2 style="text-align:center;margin:auto">Panier</h2>
				<br><?php if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){echo '<h3 style="margin:auto;text-align:center;color:red">'.$_SESSION['message'].'</h3>'; $_SESSION['message']="";} ?>

	<!--form-->
			<?php
			$ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
				$produits = array();
			}else{
				$produits = $DB->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
			}

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
		$monfichier = fopen('../reference.txt', 'r+');
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
	
		foreach($produits as $produit):
		$livr4=$bdd->prepare('SELECT * FROM produits WHERE titre=?');
		$livr4->execute(array($produit->titre));
		$livr33=$livr4->fetch();

		$livr=$bdd->prepare('SELECT livraison FROM operande2 WHERE reference=? AND etat=?');
		$livr->execute(array($_SESSION['reference'], $etat));
		$livr21=$livr->fetch();

		if(isset($livr21['livraison']) AND $livr21['livraison']!=0){
		$livraison2=htmlspecialchars($livr21['livraison']);
		}

			$nbrart=$panier->count();
		
		$livraison3=number_format('0',2,'.',' ');
		
		$grand_total=$livraison3+$panier->total();
		
		$req4=$bdd->prepare('UPDATE operande2 SET livraison=:livraison WHERE reference=:reference AND etat=:etat');
		$req4->execute(array('livraison'=>$livraison3, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));

		$nbr_produit=$_SESSION['panier'][$produit->id];
		
		$nul='aaaaaaaa00000000';
		$non='non';
		$poids=0;
		if($nbrart=0){
			$grand_total1=0;
		} else {
		$grand_total1=$panier->total();
		}
		$grand_total=number_format($grand_total1,2,'.','');

		$reduction=number_format('0',2,'.','');
		
		$req9=$bdd->prepare('INSERT INTO commande(devise, ref_obj, obs_url, reduction, livr_inter, reference, ref2, img_type, cle_image, titre, quantite, prix, TVA, sous_total, total, livraison, grand_total, poids, etat, acheteur, mac, telechar, date_com) VALUES(:devise, :ref_obj, :obs_url, :reduction, :livr_inter, :reference, :ref2, :img_type, :cle_image, :titre, :quantite, :prix, :TVA, :sous_total, :total, :livraison, :grand_total, :poids, :etat, :acheteur, :mac, :telechar, NOW())');
		$req9->execute(array(
							'devise'=>$devise,
							'ref_obj'=>$produit->ref_obj,
							'obs_url'=>$produit->obs_url,
							'reduction'=>$reduction,
							'livr_inter'=>$non,
							'reference'=>$_SESSION['reference'],
							'ref2'=>$ref2,
							'img_type'=>$produit->img_type,
							'cle_image'=>$produit->cle_image,
							'titre'=>$produit->titre,
							'quantite'=>$_SESSION['panier'][$produit->id],
							'prix'=>number_format($produit->prix,2,'.',''),
							'TVA'=>number_format($produit->TVA,2,'.',''),
							'sous_total'=>number_format($produit->prix * 1 * $_SESSION['panier'][$produit->id],2,'.',''),
							'total'=>number_format($panier->total()*1,2,'.',''),
							'livraison'=>$livraison3,
							'grand_total'=>$grand_total,
							'poids'=>$poids,
							'etat'=>$etat,
							'acheteur'=>htmlspecialchars($_SESSION['mail']),
							'mac'=>$nul,
							'telechar'=>$produit->nom));
		//depart ajouté
		$titre=$produit->titre;
		$req2=$bdd->prepare('SELECT quantite FROM produits WHERE titre=?');
		$req2->execute(array($titre));
		$donnees=$req2->fetch();

		$prods=$donnees['quantite'];
		$pan=$_SESSION['panier'][$produit->id];
		$quant=$prods-$pan;

		if($quant<0){echo '<h2 style="background-color:red;text-align:center;margin:auto">'.'Vous devez prendre un nombre inférieur de  ---->  '.$titre.'</h2>'.'</br>';

		}
		$req3=$bdd->prepare('INSERT INTO operande(titre, quantite, reference, acheteur, date_com) VALUES (:ntitre, :nquantite, :nreference, :nacheteur, NOW())');
		$req3->execute(array('ntitre'=>$titre,
							'nquantite'=>$quant,
							'nreference'=>$_SESSION['reference'],
							'nacheteur'=>$_SESSION['mail']));
		//fin ajouté
		endforeach;

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
			foreach($produits as $produit):
			if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
			$ifpromo="oui";
			} else {$ifpromo="non";} ?>
			<form method="post" action="panier.php">
				<a href="#"><?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	<img id="descr_prod1_img" src="../publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>">

<?php }
 if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><iframe id="descr_prod1_img" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 	<?php
	} 
	if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	<video id="descr_prod1_img" src="../publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
<?php }?></a>
				<p id="p_panier1"><?= $produit->titre; ?></p>
				<p style="font-size:15px">Prix : <?= number_format($produit->prix,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
				<p id="p_panier">Quantité : <input type="text" id="inp_panier" name="panier[quantite][<?= $produit->id; ?>]" value="<?= $_SESSION['panier'][$produit->id]; ?>"/></p>
				<p style="font-size:15px">Prix TTC : <?= number_format($produit->prix * 1.000 * $_SESSION['panier'][$produit->id],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?><span style="font-size:8px">(1)</span></p>
				<p><a href="panier.php?delPanier=<?= $produit->id; ?>" class="del"><img id="action_l1" src="../publicimgs/del.png"/></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a class="a_99_subm" href="encaissement.php">Encaissement de tout</a>
				</p>
				<br>
				<p id="line"> </p>

			<?php endforeach;
$req21=$bdd->prepare('UPDATE commande SET livraison=:livraison, grand_total=:grand_total WHERE reference=:reference');
$req21->execute(array('livraison'=>$livraison3,
					'grand_total'=>$grand_total,
					'reference'=>$_SESSION['reference']));
?>

				<div class="rowtotal">
					<p>Total : <?= number_format($panier->total() * 1.000,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
					<p>Livraison : <?php echo number_format($livraison3,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p>
					<p>Grand Total<span style="font-size:8px">(1)</span>: <?php echo number_format($grand_total,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></p></br>
				</div>

				<p class="inp_a_fire">
					<input id="inp_panier1" style="margin:auto" type="submit" value="Calculer"/><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<a id="grey_color" class="inp_ret" style="margin:auto" href="vendre-direct.php">Retour</a>
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</p>
		</div>
	</form>
</br></br></br></br></br>
<?php $req510=$bdd1->query('SELECT * FROM lignep');
$donnees510=$req510->fetch();?>
<p style="font-size: 8px">(1)<?php echo $donnees510['contenu'];?></p>
			</div>
		</body>
</html>
<br><br><br><br><br>
<!--input style="border:1px solid grey;background-color:#DDE3E3;box-shadow:2px 2px 4x #DDE3E3;font-family:Arial,sans-serif" <p id='descr_prod1'>