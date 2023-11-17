<?php session_start();


require 'texte1.php';
if(isset($_POST['IP']) AND !empty($_POST['IP'])){
	if(isset($_POST['dossier']) AND !empty($_POST['dossier'])){
		if(isset($_POST['nom']) AND !empty($_POST['nom'])){
			if(isset($_POST['sigle']) AND !empty($_POST['sigle'])){
				if(isset($_POST['mail']) AND !empty($_POST['mail'])){
					if(isset($_POST['urls']) AND !empty($_POST['urls'])){
						if(isset($_POST['url']) AND !empty($_POST['url'])){
							if(isset($_POST['serveur_mail']) AND !empty($_POST['serveur_mail'])){
								if(isset($_POST['mdp']) AND !empty($_POST['mdp'])){
									if(isset($_POST['adresse1']) AND !empty($_POST['adresse1'])){
										if(isset($_POST['CP']) AND !empty($_POST['CP'])){
											if(isset($_POST['ville']) AND !empty($_POST['ville'])){
												if(isset($_POST['pays']) AND !empty($_POST['pays'])){
													if(isset($_POST['RCS']) AND !empty($_POST['RCS'])){
													if(isset($_POST['ville_RCS']) AND !empty($_POST['ville_RCS'])){
$IP=$_POST['IP'];
$dossier=$_POST['dossier'];
$nom=$_POST['nom'];
$sigle=$_POST['sigle'];
$mail=$_POST['mail'];
$urls=$_POST['urls'];
$url=$_POST['url'];
$serveur_mail=$_POST['serveur_mail'];
$mdp=$_POST['mdp'];
$adresse1=$_POST['adresse1'];
if(isset($_POST['adresse2']) AND !empty($_POST['adresse2'])){$adresse2=$_POST['adresse2'];} else {$adresse2="";}
$CP=$_POST['CP'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$RCS=$_POST['RCS'];
$ville_RCS=$_POST['ville_RCS'];
$req1=$bdd1->query('SELECT * FROM societe');
$donnees1=$req1->fetch();
if(isset($donnees1['nom']) AND !empty($donnees1['nom'])){

$req=$bdd1->prepare('UPDATE societe SET IP=:IP, nom=:nom, sigle=:sigle, mail=:mail, urls=:urls, url=:url, serveur_mail=:serveur_mail, mdp=:mdp, adresse1=:adresse1, adresse2=:adresse2, CP=:CP, ville=:ville, pays=:pays, RCS=:RCS, ville_RCS=:ville_RCS');
$req->execute(array('IP'=>$IP, 'nom'=>$nom, 'sigle'=>$sigle, 'mail'=>$mail, 'urls'=>$urls, 'url'=>$url, 'serveur_mail'=>$serveur_mail, 'mdp'=>$mdp, 'adresse1'=>$adresse1, 'adresse2'=>$adresse2, 'CP'=>$CP, 'ville'=>$ville, 'pays'=>$pays, 'RCS'=>$RCS, 'ville_RCS'=>$ville_RCS ));


} else {
	$req=$bdd1->prepare('INSERT INTO societe(IP, dossier, nom, sigle, mail, urls, url, serveur_mail, mdp, adresse1, adresse2, CP, ville, pays, RCS, ville_RCS) VALUES(:IP, :dossier, :nom, :sigle, :mail, :url, :serveur_mail, :mdp, :adresse1, :adresse2, :CP, :ville, :pays, :RCS, :ville_RCS)');
	$req->execute(array('IP'=>$IP, 'dossier'=>$dossier, 'nom'=>$nom, 'sigle'=>$sigle,'mail'=>$mail, 'urls'=>$urls, 'url'=>$url, 'serveur_mail'=>$serveur_mail, 'mdp'=>$mdp, 'adresse1'=>$adresse1, 'adresse2'=>$adresse2, 'CP'=>$CP, 'ville'=>$ville, 'pays'=>$pays, 'RCS'=>$RCS, 'ville_RCS'=>$ville_RCS ));

	
	chmod('../download', 0775);
	mkdir('../download/'.$dossier);
	chmod('../download/'.$dossier, 0775);
	// création du fichier
    $f = fopen('../download/'.$dossier.'/index.php', "x+");
    // écriture
    $index='<?php header("Location:../../index.php");';
    fputs($f, $index);
    // fermeture
    fclose($f);
}
$_SESSION['message']="Vous avez modifié les Champs de la société dans la BDD";

	header("Location:societe-ch.php");
														} else {$_SESSION['message']="Remplissez le champ Ville d'enregistrement";header("Location:societe-ch.php");}
													} else {$_SESSION['message']="Remplissez le champ RCS";header("Location:societe-ch.php");}
												} else {$_SESSION['message']="Remplissez le champ pays";header("Location:societe-ch.php");}
											} else {$_SESSION['message']="Remplissez le champ ville";header("Location:societe-ch.php");}
										} else {$_SESSION['message']="Remplissez le champ Code Postal";header("Location:societe-ch.php");}
									} else {$_SESSION['message']="Remplissez le champ Adresse 1";header("Location:societe-ch.php");}
								} else {$_SESSION['message']="Remplissez le champ mot de passe de mail";header("Location:societe-ch.php");}
							} else {$_SESSION['message']="Remplissez le champ serveur de mail";header("Location:societe-ch.php");}
						} else {$_SESSION['message']="Remplissez le champ url de société";header("Location:societe-ch.php");}
					} else {$_SESSION['message']="Remplissez le champ url simplifiée";header("Location:societe-ch.php");}
				} else {$_SESSION['message']="Remplissez le champ mail professionnel";header("Location:societe-ch.php");}
			} else {$_SESSION['message']="Remplissez le champ sigle";header("Location:societe-ch.php");}
		} else {$_SESSION['message']="Remplissez le champ nom de site";header("Location:societe-ch.php");}
	} else {$_SESSION['message']="Remplissez le champ nom de dossier";header("Location:societe-ch.php");}
} else {$_SESSION['message']="Remplissez le champ IP";header("Location:societe-ch.php");}