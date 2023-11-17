<?php session_start();

require 'texte1.php';
if(isset($_POST['exist']) AND !empty($_POST['exist'])){
	if(isset($_POST['prenom']) AND !empty($_POST['prenom'])){
		if(isset($_POST['nom']) AND !empty($_POST['nom'])){
			if(isset($_POST['societe']) AND !empty($_POST['societe'])){
				if(isset($_POST['adresse1']) AND !empty($_POST['adresse1'])){
					if(isset($_POST['CP']) AND !empty($_POST['CP'])){
						if(isset($_POST['ville']) AND !empty($_POST['ville'])){
							if(isset($_POST['pays']) AND !empty($_POST['pays'])){
								if(isset($_POST['RCS']) AND !empty($_POST['RCS'])){
									if(isset($_POST['ville_RCS']) AND !empty($_POST['ville_RCS'])){
$exist_check=$_POST['exist'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$societe=$_POST['societe'];
$adresse1=$_POST['adresse1'];
if(isset($_POST['adresse2']) AND !empty($_POST['adresse2'])){$adresse2=$_POST['adresse2'];} else {$adresse2="";}
$CP=$_POST['CP'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$RCS=$_POST['RCS'];
$ville_RCS=$_POST['ville_RCS'];

$req1=$bdd1->query('SELECT * FROM cheque');
$exist=$req1->rowCount();
if($exist>0){

$req=$bdd1->prepare('UPDATE cheque SET exist=:exist, prenom=:prenom, nom=:nom, societe=:societe, adresse1=:adresse1, adresse2=:adresse2, CP=:CP, ville=:ville, pays=:pays, RCS=:RCS, ville_RCS=:ville_RCS');
$req->execute(array('exist'=>$exist_check, 'prenom'=>$prenom, 'nom'=>$nom, 'societe'=>$societe, 'adresse1'=>$adresse1, 'adresse2'=>$adresse2, 'CP'=>$CP, 'ville'=>$ville, 'pays'=>$pays, 'RCS'=>$RCS, 'ville_RCS'=>$ville_RCS ));


} else {
	$req=$bdd1->prepare('INSERT INTO cheque SET exist=:exist, prenom=:prenom, nom=:nom, societe=:societe, adresse1=:adresse1, adresse2=:adresse2, CP=:CP, ville=:ville, pays=:pays, RCS=:RCS, ville_RCS=:ville_RCS');
	$req->execute(array('exist'=>$exist_check, 'prenom'=>$prenom, 'nom'=>$nom, 'societe'=>$societe, 'adresse1'=>$adresse1, 'adresse2'=>$adresse2, 'CP'=>$CP, 'ville'=>$ville, 'pays'=>$pays, 'RCS'=>$RCS, 'ville_RCS'=>$ville_RCS ));
}
$_SESSION['message']="Vous avez modifié les Champs d'encaissements par chèque";

	header("Location:cheque-ch.php");

									} else {$_SESSION['message']="Remplissez le champ Ville RCS";header("Location:cheque-ch.php");}
								} else {$_SESSION['message']="Remplissez le RCS";header("Location:cheque-ch.php");}
							} else {$_SESSION['message']="Remplissez le champ pays";header("Location:cheque-ch.php");}
						} else {$_SESSION['message']="Remplissez le champ ville";header("Location:cheque-ch.php");}
					} else {$_SESSION['message']="Remplissez le champ Code Postal";header("Location:cheque-ch.php");}
				} else {$_SESSION['message']="Remplissez le champ adresse1";header("Location:cheque-ch.php");}
			} else {$_SESSION['message']="Remplissez le champ societe";header("Location:cheque-ch.php");}
		} else {$_SESSION['message']="Remplissez le champ prenom";header("Location:cheque-ch.php");}
	} else {$_SESSION['message']="Remplissez le champ nom de site";header("Location:cheque-ch.php");}
} else {$_SESSION['message']="Cochez si oui ou non vous utilisez le paiement par chèque";header("Location:cheque-ch.php");}						