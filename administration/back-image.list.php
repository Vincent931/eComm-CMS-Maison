<?php session_start();

require '../texte1.php';
require '../boutique0.php';
//accueil
if(isset($_POST['background']) AND $_POST['background']=='back1'){
	
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/back1.jpg";
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){  $_SESSION['message']="Chargement OK.";  }

		$req301=$bdd1->query('SELECT * FROM background');
		$donnees301=$req301->fetch();

		$count=$req301->rowCount();

		$back1=$_POST['background'];
		if(isset($donnees301['back2']) AND !empty($donnees301['back2'])){ $back2=$donnees301['back2'];}else{$back2="";}
		if(isset($donnees301['back3']) AND !empty($donnees301['back3'])){ $back3=$donnees301['back3'];}else{$back3="";}

		$intitule='back1';
		$nom1='back1.jpg';
		$description='Image de Background1';

		if($count==0){
		$req302=$bdd1->prepare('INSERT INTO background(back1, back2, back3) VALUES(:back1, :back2, :back3)');
		$req302->execute(array('back1'=>$nom1, 'back2'=>$back2, 'back3'=>$back3));

		$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req304->execute(array($intitule));
		$count1=$req304->rowCount();
		if ($count1==0){

		$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
		$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));
		}else {
			$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

		}

		$_SESSION['message']="Image1 sauvegardée";

		} else{

			$req302=$bdd1->prepare('UPDATE background SET back1=:back1, back2=:back2, back3=:back3');
			$req302->execute(array('back1'=>$nom1, 'back2'=>$back2, 'back3'=>$back3));
			
			$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
			$req304->execute(array($intitule));
			$count1=$req304->rowCount();
			if ($count1==0){

			$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));

			}else {
				$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
				$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

			}
			$_SESSION['message']="Image1 sauvegardée";
		}
$req301->closeCursor();
$req302->closeCursor();

	header("Location: back-image.php");
}
//back2
if(isset($_POST['background']) AND $_POST['background']=='back2'){
	
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/back2.jpg";
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){  $_SESSION['message']="Chargement OK.";  }

		$req301=$bdd1->query('SELECT * FROM background');
		$donnees301=$req301->fetch();

		$count=$req301->rowCount();

		$back2=$_POST['background'];
		if(isset($donnees301['back1']) AND !empty($donnees301['back1'])){ $back1=$donnees301['back1'];}else{$back1="";}
		if(isset($donnees301['back3']) AND !empty($donnees301['back3'])){ $back3=$donnees301['back3'];}else{$back3="";}

		$intitule='back2';
		$nom1='back2.jpg';
		$description='Image de Background2';

		if($count==0){
		$req302=$bdd1->prepare('INSERT INTO background(back1, back2, back3) VALUES(:back1, :back2, :back3)');
		$req302->execute(array('back1'=>$back1, 'back2'=>$nom1, 'back3'=>$back3));

		$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req304->execute(array($intitule));
		$count1=$req304->rowCount();
		if ($count1==0){

		$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
		$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));
		}else {
			$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

		}

		$_SESSION['message']="Image1 sauvegardée";

		} else{

			$req302=$bdd1->prepare('UPDATE background SET back1=:back1, back2=:back2, back3=:back3');
			$req302->execute(array('back1'=>$back1, 'back2'=>$nom1, 'back3'=>$back3));
			
			$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
			$req304->execute(array($intitule));
			$count1=$req304->rowCount();
			if ($count1==0){

			$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));
			
			}else {
				$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
				$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

			}
			$_SESSION['message']="Image2 sauvegardée";
		}
$req301->closeCursor();
$req302->closeCursor();

	header("Location: back-image.php");
}
//back3
if(isset($_POST['background']) AND $_POST['background']=='back3'){
	
	//transfert du fichier temporaire vers repertoire du serveur
	//dossier publicimgs
	$nom="../publicimgs/back3.jpg";
	$resultat=move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	if($resultat){  $_SESSION['message']="Chargement OK.";  }

		$req301=$bdd1->query('SELECT * FROM background');
		$donnees301=$req301->fetch();

		$count=$req301->rowCount();

		$back3=$_POST['background'];
		if(isset($donnees301['back1']) AND !empty($donnees301['back1'])){ $back1=$donnees301['back1'];}else{$back1="";}
		if(isset($donnees301['back2']) AND !empty($donnees301['back2'])){ $back2=$donnees301['back2'];}else{$back2="";}

		$intitule='back3';
		$nom1='back3.jpg';
		$description='Image de Background3';

		if($count==0){
		$req302=$bdd1->prepare('INSERT INTO background(back1, back2, back3) VALUES(:back1, :back2, :back3)');
		$req302->execute(array('back1'=>$back1, 'back2'=>$back2, 'back3'=>$nom1));

		$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
		$req304->execute(array($intitule));
		$count1=$req304->rowCount();
		if ($count1==0){

		$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
		$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));
		}else {
			$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

		}

		$_SESSION['message']="Image1 sauvegardée";

		} else{

			$req302=$bdd1->prepare('UPDATE background SET back1=:back1, back2=:back2, back3=:back3');
			$req302->execute(array('back1'=>$back1, 'back2'=>$back2, 'back3'=>$nom1));
			
			$req304=$bdd->prepare('SELECT * FROM image WHERE intitule=?');
			$req304->execute(array($intitule));
			$count1=$req304->rowCount();
			if ($count1==0){

			$req303=$bdd->prepare('INSERT INTO image(intitule, nom, description) VALUES(:intitule, :nom, :description)');
			$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description));
			
			}else {
				$req303=$bdd->prepare('UPDATE image SET intitule=:intitule, nom=:nom, description=:description WHERE intitule=:intule)');
				$req303->execute(array('intitule'=>$intitule, 'nom'=>$nom1, 'description'=>$description, 'intitule'=>$nom1));

			}
			$_SESSION['message']="Image3 sauvegardée";
		}
$req301->closeCursor();
$req302->closeCursor();

	header("Location: back-image.php");
}
