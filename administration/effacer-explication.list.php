<?php session_start();

require 'boutique0.php';


	$id_produit=htmlspecialchars($_POST['id_produit']);

	$req2=$bdd->prepare('DELETE FROM explications WHERE id_produit=?');
	$req2->execute(array($id_produit));
	$req2->closeCursor();
					
	$_SESSION['message']='Explications Effacées de la base de données';

header("Location: effacer-explication.php");
