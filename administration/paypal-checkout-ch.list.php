<?php session_start();

require 'boutique0.php';
require 'texte1.php';
$exist=$_POST['exist'];
$env=$_POST['env'];
$client_id=$_POST['client_id'];
$secret=$_POST['secret'];

$req=$bdd->query('SELECT * FROM paypal_checkout');
$ok=$req->rowCount();
if(isset($ok) AND $ok>0){

	$req1=$bdd->prepare('UPDATE paypal_checkout SET exist=:exist, env=:env, client_id=:client_id, secret=:secret');
	$req1->execute(array('exist'=>$exist, 'env'=>$env, 'client_id'=>$client_id, 'secret'=>$secret));

	if($exist=='oui'){

		$req2=$bdd1->query('SELECT * FROM monetico');
		$existM=$req2->rowCount();
		if($existM>0){

			$req3=$bdd1->prepare('UPDATE monetico SET exist=:exist');
			$req3->execute(array('exist'=>'oui'));

		}
		$req4=$bdd1->query('SELECT * FROM monetico');
		$existPB=$req2->rowCount();
		if($existPB>0){

			$req5=$bdd1->prepare('UPDATE paypal SET exist=:exist');
			$req5->execute(array('exist'=>'non'));
		}
	}
	$_SESSION['message']="Valeurs changées, Braintree ne peut plus être utilisé, Monetico oui";
} else {
	$req1=$bdd->prepare('INSERT INTO paypal_checkout(exist, env, client_id, secret) VALUES(:exist, :env, :client_id, :secret)');
	$req1->execute(array('exist'=>$exist, 'env'=>$env, 'client_id'=>$client_id, 'secret'=>$secret));
	
	if($exist=='oui'){

		$req2=$bdd1->query('SELECT * FROM monetico');
		$existM=$req2->rowCount();
		if($existM>0){

			$req3=$bdd1->prepare('UPDATE monetico SET exist=:exist');
			$req3->execute(array('exist'=>'oui'));

		}
		$req4=$bdd1->query('SELECT * FROM monetico');
		$existPB=$req2->rowCount();
		if($existPB>0){

			$req5=$bdd1->prepare('UPDATE paypal SET exist=:exist');
			$req5->execute(array('exist'=>'non'));
		}
	}
	$_SESSION['message']="Valeurs insérées";
}

if (isset($req)){$req->closeCursor();}
if (isset($req1)){$req1->closeCursor();}
if (isset($req2)){$req2->closeCursor();}
if (isset($req3)){$req3->closeCursor();}
if (isset($req4)){$req4->closeCursor();}
if (isset($req5)){$req5->closeCursor();}

header('Location:paypal-checkout-ch.php');