<?php session_start();
require 'boutique0.php';
require 'texte1.php';
if(isset($_POST['exist']) AND !empty($_POST['exist'])){
	if(isset($_POST['hash'])AND !empty($_POST['hash'])){
		if(isset($_POST['TPE'])AND !empty($_POST['TPE'])){
			if(isset($_POST['version'])AND !empty($_POST['version'])){
				if(isset($_POST['url'])AND !empty($_POST['url'])){
					if(isset($_POST['code'])AND !empty($_POST['code'])){
						if(isset($_POST['url_web'])AND !empty($_POST['url_web'])){
$exist=$_POST['exist'];
$hash=$_POST['hash'];
$TPE=$_POST['TPE'];
$version=$_POST['version'];
$url=$_POST['url'];
$code=$_POST['code'];
$url_web=$_POST['url_web'];

$req=$bdd1->query('SELECT * FROM monetico');
$donnees=$req->fetch();

if(isset($donnees['hash']) AND !empty($donnees['hash'])){
	$req1=$bdd1->prepare('UPDATE monetico SET exist=:exist, hash=:hash, TPE=:TPE, version=:version, url=:url, code=:code, url_web=:url_web');
	$req1->execute(array('exist'=>$exist, 'hash'=>$hash, 'TPE'=>$TPE, 'version'=>$version, 'url'=>$url, 'code'=>$code, 'url_web'=>$url_web));
	
} else {
	$req1=$bdd1->prepare('INSERT INTO monetico(exist, hash, TPE, version, url, code, url_web) VALUES(?, ?, ?, ?, ?, ? ,?)');
	$req1->execute(array($exist, $hash, $TPE, $version, $url, $code, $url_web));
}
if($exist=='oui'){
	$req2=$bdd1->prepare('UPDATE paypal SET exist=:exist');
	$req2->execute(array('exist'=>'non'));
	$req3=$bdd->prepare('UPDATE paypal_checkout SET exist=:exist');
	$req3->execute(array('exist'=>'non'));
}

$_SESSION['message']="Valeurs ajoutées.";
$req->closeCursor();
if(isset($req1)){$req1->closeCursor();}
if(isset($req2)){$req2->closeCursor();}
if(isset($req3)){$req3->closeCursor();}

header("Location: monetico-ch.php");
						} else{$_SESSION['message']="Remplissez le champs clé de hashage";header("Location:monetico-ch.php");}
					} else{$_SESSION['message']="Remplissez le champs TPE";header("Location:monetico-ch.php");}
				} else{$_SESSION['message']="Remplissez le champs version";header("Location:monetico-ch.php");}
			} else{$_SESSION['message']="Remplissez le champs url monético";header("Location:monetico-ch.php");}
		} else{$_SESSION['message']="Remplissez le champs code société";header("Location:monetico-ch.php");}
	} else{$_SESSION['message']="Remplissez le champs url site";header("Location:monetico-ch.php");}
} else{ $_SESSION['message']="Choisissez Oui/Non pur l'utilisation de Monético";header("Location:monetico-ch.php");}