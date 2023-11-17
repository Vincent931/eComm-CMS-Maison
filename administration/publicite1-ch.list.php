<?php session_start();
require 'texte1.php';

$image=$_POST['image'];
$bouton=$_POST['bouton'];
$id_prod=$_POST['id_prod'];

if(isset($_POST['image']) AND !empty($_POST['image'])){
	if(isset($_POST['bouton']) AND !empty($_POST['bouton'])){
		if(isset($_POST['id_prod']) AND !empty($_POST['id_prod'])){


		if(isset($_POST['message']) AND !empty($_POST['message'])){
			$texte=$_POST['message'];
		} else { $texte="";}

		$req1=$bdd1->query('SELECT * FROM publicite1');
		$donnees=$req1->fetch();

		if(isset($donnees['image']) AND !empty($donnees['image'])){

		$req=$bdd1->prepare('UPDATE publicite1 SET image=:image, texte=:texte, bouton=:bouton, id_prod=:id_prod');
		$req->execute(array('image'=>$image, 'texte'=>$texte, 'bouton'=>$bouton, 'id_prod'=>$id_prod));

		} else {
			$req=$bdd1->prepare('INSERT INTO publicite1(image, texte, bouton, id_prod) VALUES(:image, :texte, :bouton, :id_prod)');
			$req->execute(array('image'=>$image, 'texte'=>$texte, 'bouton'=>$bouton, 'id_prod'=>$id_prod));
		}

		} else{$_SESSION['message']="Le champs ID est obligatoire"; header("Location:publicite-ch.php");}
	} else{$_SESSION['message']="Le champs bouton est obligatoire"; header("Location:publicite-ch.php");}
} else{$_SESSION['message']="Le champs image est obligatoire"; header("Location:publicite-ch.php");}
$_SESSION['message']="Publicité prête.";
header("Location:publicite-ch.php");