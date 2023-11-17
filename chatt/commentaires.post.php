<?php session_start(); 
require 'blacklist.php';

$ip_exist=TRUE;
if (in_array($_SERVER['REMOTE_ADDR'], $ip_blacklist)) {
	$ip_exist=FALSE;
}
// Connexion à la base de données
require 'blog2.php';
if($ip_exist){
	if (isset($_POST['id_sujet']) AND !empty($_POST['id_sujet']) AND isset($_POST['pseudo']) AND !empty($_POST['pseudo']))  {
		$id_sujet = htmlspecialchars($_POST['id_sujet']);
		$mdp1=htmlspecialchars($_POST['mdp']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$message_envoi = htmlspecialchars($_POST['message_envoi']);
		$mdp=sha1($mdp1);
		
		$req=$bdd2->prepare('SELECT * FROM compte WHERE pseudo=?');
		$req->execute(array($pseudo));
		$userexist = $req->rowCount();
		$donnees=$req->fetch();
		if($userexist > 0) {
			if($mdp==$donnees['mot_de_passe']){

				//on fait une requête d'ajout de commentaire
				$req2 = $bdd2->prepare('INSERT INTO commentaires(id_sujet, pseudo, message, ip, date_creation_message) VALUES(:id_sujet, :pseudo_envoi, :message_envoi, :ip, NOW())');
				$req2->execute(array(
				'id_sujet' => $id_sujet,
				'pseudo_envoi' => $pseudo,
				'message_envoi' => $message_envoi,
				'ip'=>$_SERVER['REMOTE_ADDR']));
				$req->closeCursor();
				$req2->closeCursor();

				require 'mail-commentaires.php';

				$_SESSION['message']="Ajouté";
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['id_sujet'] = $id_sujet;
				//on redirige vers commentaires.php
				header("Location:commentaires.php?sujet=".$id_sujet."");
			} else{$_SESSION['message']="Mauvais mot de passe, si vous ne vous en souvenez pas, créez un nouveau Pseudo";header("Location:commentaires.php?sujet=".$id_sujet."");}
		} else {
				//on fait une requête d'ajout de commentaire
			$req2 = $bdd2->prepare('INSERT INTO commentaires(id_sujet, pseudo, message, ip, date_creation_message) VALUES(:id_sujet, :pseudo_envoi, :message_envoi, :ip, NOW())');
			$req2->execute(array(
			'id_sujet' => $id_sujet,
			'pseudo_envoi' => $pseudo,
			'message_envoi' => $message_envoi,
			'ip'=>$_SERVER['REMOTE_ADDR']));
			$req->closeCursor();
			$req2->closeCursor();
			$_SESSION['message']="Ajouté";
			
			$req3=$bdd2->prepare('INSERT INTO compte(pseudo,mot_de_passe,ip) VALUES(:pseudo, :mot_de_passe,:ip)');
			$req3->execute(array('pseudo'=>$pseudo,'mot_de_passe'=>$mdp,'ip'=>$_SERVER['REMOTE_ADDR']));
			$req3->closeCursor();

			$_SESSION['pseudo']=$pseudo;

			require 'mail-commentaires.php';

			$_SESSION['message']="Ajouté";
			$_SESSION['pseudo']=$pseudo;
			$_SESSION['id_sujet'] = $id_sujet;

			header("Location:commentaires.php?sujet=".$id_sujet."");
		}
	} else { $_SESSION['message']="Veuillez remplir tous les champs.";header("Location:commentaires.php?sujet=".$id_sujet."");}
} else {$_SESSION['message']="Désolé, Blacklisté";header("Location:commentaires.php?sujet=".$id_sujet."");}