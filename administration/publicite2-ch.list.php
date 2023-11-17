<?php session_start();
require 'texte1.php';

$image=$_POST['image1'];
$bouton=$_POST['bouton1'];
$id_prod=$_POST['id_prod1'];

if(isset($_POST['image1']) AND !empty($_POST['image1'])){
	if(isset($_POST['bouton1']) AND !empty($_POST['bouton1'])){
		if(isset($_POST['id_prod1']) AND !empty($_POST['id_prod1'])){


		if(isset($_POST['message1']) AND !empty($_POST['message1'])){
			$texte=$_POST['message1'];
		} else { $texte="";}

		$req1=$bdd1->query('SELECT * FROM publicite2');
		$donnees=$req1->fetch();

		if(isset($donnees['image']) AND !empty($donnees['image'])){

		$req=$bdd1->prepare('UPDATE publicite2 SET image=:image, texte=:texte, bouton=:bouton, id_prod=:id_prod');
		$req->execute(array('image'=>$image, 'texte'=>$texte, 'bouton'=>$bouton, 'id_prod'=>$id_prod));

		} else {
			$req=$bdd1->prepare('INSERT INTO publicite2(image, texte, bouton, id_prod) VALUES(:image, :texte, :bouton, :id_prod)');
			$req->execute(array('image'=>$image, 'texte'=>$texte, 'bouton'=>$bouton, 'id_prod'=>$id_prod));
		}

		} else{$_SESSION['message']="Le champs ID est obligatoire"; header("Location:publicite-ch.php");}
	} else{$_SESSION['message']="Le champs bouton est obligatoire"; header("Location:publicite-ch.php");}
} else{$_SESSION['message']="Le champs image est obligatoire"; header("Location:publicite-ch.php");}
$_SESSION['message']="Publicité prête.";
header("Location:publicite-ch.php");