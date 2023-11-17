<?php session_start();
require 'boutique0.php';


if(isset($_POST['exist']) AND !empty($_POST['exist'])){$exist=$_POST['exist'];}else{$exist="";}
if(isset($_POST['passW']) AND !empty($_POST['passW'])){$passW=$_POST['passW'];}else{$passW="";}
if(isset($_POST['pairing_code']) AND !empty($_POST['pairing_code'])){$pairing_code=$_POST['pairing_code'];}else{$pairing_code="";}
if(isset($_POST['label']) AND !empty($_POST['label'])){$label=$_POST['label'];}else{$label="";}
if(isset($_POST['nom_doss']) AND !empty($_POST['nom_doss'])){$nom_doss=$_POST['nom_doss'];}else{$nom_doss="";}



$req2=$bdd->query('SELECT * FROM bitpay');
$yes=$req2->rowcount();


if($yes>=1){

$donnees2=$req2->fetch();
$nom_doss=$_POST['nom_doss'];
$dossier='../'.$donnees2['nom_doss'];
//effacement ancien dossier si changement
	if ($dossier!=$_POST['nom_doss']){
		
		function rrmdir($dir) {
		 	if (is_dir($dir)) { // si le paramètre est un dossier
			    $objects = scandir($dir); // on scan le dossier pour récupérer ses objets
			    foreach ($objects as $object) { // pour chaque objet
				    if ($object != "." && $object != "..") { // si l'objet n'est pas . ou ..
				        if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object);else unlink($dir."/".$object); // on supprime l'objet
			        }
		    	}
	     		reset($objects); // on remet à 0 les objets
	     		rmdir($dir); // on supprime le dossier
	    	}
	    }

	rrmdir($dossier);
	}
	$req=$bdd->prepare('UPDATE bitpay SET exist=:exist, passW=:passW, pairing_code=:pairing_code, label=:label, nom_doss=:nom_doss');
	$req->execute(array('exist'=>$exist, 'passW'=>$passW, 'pairing_code'=>$pairing_code, 'label'=>$label, 'nom_doss'=>$nom_doss));
//creation nouveau dossier si changement
if (!is_dir('../'.$nom_doss)) {
    mkdir('../'.$nom_doss);
}
chmod ('../'.$nom_doss,0775);

} else {

$req=$bdd->prepare('INSERT INTO bitpay(exist, pairing_code, label, nom_doss) VALUES(:exist, :pairing_code, :label, :nom_doss)');
$req->execute(array('exist'=>$exist, 'passW'=>$passW, 'pairing_code'=>$pairing_code, 'label'=>$label, 'nom_doss'=>$nom_doss));
//creation du dossier
if (!is_dir('../'.$nom_doss)) {
    mkdir('../'.$nom_doss);
}
chmod ('../'.$nom_doss,0775);

}
$_SESSION['message']="Valeur sauvegardée";
header("Location:bitpay-ch.php");