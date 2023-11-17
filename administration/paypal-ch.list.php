<?php session_start();
require 'texte1.php';
require 'boutique0.php';

if(isset($_POST['exist']) AND !empty($_POST['exist'])){
	if(isset($_POST['environnement']) AND !empty($_POST['environnement'])){
		if(isset($_POST['marchand_id']) AND !empty($_POST['marchand_id'])){
			if(isset($_POST['cle_publique']) AND !empty($_POST['cle_publique'])){
				if(isset($_POST['cle_prive']) AND !empty($_POST['cle_prive'])){

				$exist=$_POST['exist'];
				$environnement=$_POST['environnement'];
				$marchand_id=$_POST['marchand_id'];
				$cle_publique=$_POST['cle_publique'];
				$cle_prive=$_POST['cle_prive'];

				$req=$bdd1->query('SELECT * FROM paypal');
				$donnees=$req->fetch();
				if(isset($donnees['environnement']) AND !empty($donnees['environnement'])){

					$req1=$bdd1->prepare('UPDATE paypal SET exist=:exist, environnement=:environnement, marchand_id=:marchand_id, cle_publique=:cle_publique, cle_prive=:cle_prive');
					$req1->execute(array('exist'=>$exist, 'environnement'=>$environnement, 'marchand_id'=>$marchand_id, 'cle_publique'=>$cle_publique, 'cle_prive'=>$cle_prive));

				} else {

					$req1=$bdd1->prepare('INSERT INTO paypal(exist, environnement, marchand_id, cle_publique, cle_prive) VALUES(:exist, :environnement, :marchand_id, :cle_publique, :cle_prive)');
					$req1->execute(array('exist'=>$exist, 'environnement'=>$environnement, 'marchand_id'=>$marchand_id, 'cle_publique'=>$cle_publique, 'cle_prive'=>$cle_prive));
				}
				if($exist=='oui'){
				$req5=$bdd1->query('SELECT * FROM monetico');
					$achangem=$req5->fetch();
					if($achangem>0){

				$req2=$bdd1->prepare('UPDATE monetico SET exist=:exist');
				$req2->execute(array('exist'=>'non'));
				}

				$req3=$bdd->query('SELECT * FROM paypal_checkout');
					$achange=$req3->rowCount();
					if($achange>0){
						$req4=$bdd->prepare('UPDATE paypal_checkout SET exist=:exist');
						$req4->execute(array('exist'=>'non'));
					}
				}
				$_SESSION['message']="Données Chargées";
				if(isset($req)){$req->closeCursor();}
				if(isset($req1)){$req1->closeCursor();}
				if(isset($req5)){$req5->closeCursor();}
				if(isset($req2)){$req2->closeCursor();}
				if(isset($req3)){$req3->closeCursor();}
				if(isset($req4)){$req4->closeCursor();}
				} else { $_SESSION['message']="Remplissez le champ clé privé";header("Location:paypal-ch.php");}
			} else { $_SESSION['message']="Remplissez le champ clé publique";header("Location:paypal-ch.php");}
		} else { $_SESSION['message']="Remplissez le champ id marchand";header("Location:paypal-ch.php");}
	} else { $_SESSION['message']="Remplissez le champ environnement";header("Location:paypal-ch.php");}
} else { $_SESSION['message']="Choisissez si vous utilisez Paypal Braintree";header("Location:paypal-ch.php");}
header("Location:paypal-ch.php");