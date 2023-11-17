<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
$req50=$bdd1->query('SELECT * FROM societe');
$donnees50=$req50->fetch();
$nbre=strlen($donnees50['url']);
$nbre1=$nbre+26;

require 'boutique0.php';

if(isset($_POST['mail'])AND !empty($_POST['mail'])AND isset($_POST['key'])AND !empty($_POST['key'])) {
	if(isset($_POST['mdp']) AND !empty($_POST['mdp']) AND isset($_POST['mdp2']) AND !empty($_POST['mdp2'])){
		if(isset($_POST['pseudo'])AND !empty($_POST['pseudo'])){
			if($_POST['mdp']==$_POST['mdp2']) {

			$motdepasse=htmlspecialchars($_POST['mdp2']);
			$nv_motdepasse=sha1($motdepasse);
			$nv_confirme = 1;
			$nv_pseudo=htmlspecialchars($_POST['pseudo']);
			$mail=htmlspecialchars($_POST['mail']);
			$key=htmlspecialchars($_POST['key']);

			//Vérification du pseudo
			$req1=$bdd->prepare('SELECT pseudo FROM compte WHERE pseudo=?');
			$req1->execute(array($nv_pseudo));
			if(isset($donnees['pseudo']) AND !empty($donnees['pseudo'])){
				$_SESSION['message']="<span style=\"background-color:red;color:black\">Pseudo non disponible, veuillez en choisir un autre.</span>";
				header("Location:reinitialisation-etape-1-".urlencode($mail)."-".urlencode($key));
			}



		$req=$bdd->prepare('UPDATE compte SET pseudo=:nv_pseudo, motdepasse=:nv_motdepasse, confirme=:nv_confirme WHERE mail=:mail AND confirmkey=:key');
		$req->execute(array('nv_pseudo'=>$nv_pseudo, 'nv_motdepasse'=>$nv_motdepasse, 'nv_confirme'=>$nv_confirme, 'mail'=>$mail, 'key'=>$key));
		$req->closeCursor();

		setcookie('email',$mail, time()+ 365*24*3600,'/',null, false, true); 

		$_SESSION['message']="<span style=\"background-color:red;color:black\">Vous venez de rénitialiser votre compte, ne perdez pas votre pseudo et mot de passe.</span>";

		header("Location: accueil.html");
			} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Les mots de passe ne correspondent pas</span>";header('Location: accueil.html');}
		} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Le Pseudo est absent</span>";header('Location: accueil.html');}
	} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Il manque les motdepasse</span>";header('Location: accueil.html');}
} else {$_SESSION['message']="<span style=\"background-color:red;color:black\">Un ou deux champs sont absent</span>";header('Location: accueil.html');}
header('Location: accueil.html');