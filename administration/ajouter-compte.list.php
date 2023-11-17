<?php session_start();

require 'boutique0.php';

$pseudo="pseudo";
$mail=$_POST['mail'];
$mdp="0011";
$key="0011";
$confirme=0;
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$societe="else";
$adresse1="adresse";
$adresse2="adresse";
$code_postal="44444";
$ville="ville";
$province="province";
$pays="France";
$pays1="FR";
$req1=$bdd->prepare('SELECT* FROM compte WHERE mail=?');
$req1->execute(array($mail));
$donnees=$req1->fetch();
if(isset($donnees['mail']) AND !empty($donnees['mail'])){
	$_SESSION['message']="Compte déjà existant";
	header("Location:ajouter-compte.php");
} else {
$oui='oui';
$req = $bdd->prepare('INSERT INTO compte(pseudo, mail, motdepasse, confirmkey, confirme, nom, prenom, societe, adresse1, adresse2, code_postal, ville, stateOrProvince, pays, pays_string, nom_livr, prenom_livr, societe_livr, adresse1_livr, adresse2_livr, code_postal_livr, ville_livr, stateOrProvince_livr, pays_livr, pays_livr_string, journalise) VALUES(:pseudo, :mail, :motdepasse, :confirmkey, :confirme, :nom, :prenom, :societe, :adresse1, :adresse2, :code_postal, :ville, :stateOrProvince, :pays, :pays_string, :nom_livr, :prenom_livr, :societe_livr, :adresse1_livr, :adresse2_livr, :code_postal_livr, :ville_livr, :stateOrProvince_livr,:pays_livr, :pays_livr_string, :journalise)');
                          $req->execute(array(
                            'pseudo'=>$pseudo,
                            'mail'=>$mail,
                            'motdepasse'=>$mdp,
                            'confirmkey'=>$key,
                            'confirme'=>$confirme,
                            'nom'=>$nom,
                            'prenom'=>$prenom, 
                            'societe'=>$societe,
                            'adresse1'=>$adresse1,
                            'adresse2'=>$adresse2,
                            'code_postal'=>$code_postal,
                            'ville'=>$ville,
                            'stateOrProvince'=>$province,
                            'pays'=>$pays,
                            'pays_string'=>$pays1,
                            'nom_livr'=>$nom,
                            'prenom_livr'=>$prenom,
                            'societe_livr'=>$societe,
                            'adresse1_livr'=>$adresse1,
                            'adresse2_livr'=>$adresse2,
                            'code_postal_livr'=>$code_postal,
                            'ville_livr'=>$ville,
                            'stateOrProvince_livr'=>$province,
                            'pays_livr'=>$pays,
                            'pays_livr_string'=>$pays1,
                            'journalise'=>$oui
                          ));
                      }
$req->closeCursor();
$_SESSION['message']="Compte ajouté";
header("Location:ajouter-compte.php");