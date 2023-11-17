<?php session_start();
require 'texte1.php';

if(isset($_POST['contactez']) AND !empty($_POST['contactez'])){
	if(isset($_POST['infos']) AND !empty($_POST['infos'])){
		if(isset($_POST['politique']) AND !empty($_POST['politique'])){
			if(isset($_POST['a_savoir']) AND !empty($_POST['a_savoir'])){
				if(isset($_POST['reinitialisation']) AND !empty($_POST['reinitialisation'])){

$contactez=htmlspecialchars($_POST['contactez']);
$infos=htmlspecialchars($_POST['infos']);
$politique=htmlspecialchars($_POST['politique']);
$a_savoir=htmlspecialchars($_POST['a_savoir']);
$reinitialisation=htmlspecialchars($_POST['reinitialisation']);

$req1=$bdd1->query('SELECT * FROM nav_bas');
$donnees1=$req1->fetch();

if(isset($donnees1['contactez']) AND !empty($donnees1['contactez'])){

$req=$bdd1->prepare('UPDATE nav_bas SET contactez=:contactez, infos=:infos, politique=:politique, a_savoir=:a_savoir, reinitialisation=:reinitialisation');
$req->execute(array('contactez'=>$contactez, 'infos'=>$infos, 'politique'=>$politique, 'a_savoir'=>$a_savoir, 'reinitialisation'=>$reinitialisation));

} else{
$req=$bdd1->prepare('INSERT INTO nav_bas(contactez, infos, politique, a_savoir, reinitialisation) VALUES(:contactez, :infos, :politique, :a_savoir, :reinitialisation)');
$req->execute(array('contactez'=>$contactez, 'infos'=>$infos, 'politique'=>$politique, 'a_savoir'=>$a_savoir, 'reinitialisation'=>$reinitialisation));

}


$_SESSION['message']="Valeurs du menu Bas enregistré";
header("Location:menu-bas-ch.php");

				}else{$_SESSION['message']="Remplissez le champ Titre Menu Réinitialisation de compte"; header("Location:menu-bas-ch.php");}
			}else{$_SESSION['message']="Remplissez le champ Titre Menu Condition Générale de Vente"; header("Location:menu-bas-ch.php");}
		}else{$_SESSION['message']="Remplissez le champ Titre Menu Politique de confidentialité"; header("Location:menu-bas-ch.php");}
	}else{$_SESSION['message']="Remplissez le champ Titre Menu pdf(infos société)"; header("Location:menu-bas-ch.php");}
}else{$_SESSION['message']="Remplissez le champ Titre Menu Page Contact"; header("Location:menu-bas-ch.php");}			