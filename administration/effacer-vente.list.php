<?php session_start();
require 'boutique0.php';

if(isset($_POST['reference']) AND !empty($_POST['reference']) AND isset($_POST['acheteur']) AND !empty($_POST['acheteur'])){
					$acheteur=$_POST['acheteur'];
					$ref=$_POST['reference'];
					
					//écriture du billet avec prepare
					$req = $bdd->prepare('DELETE FROM commande WHERE reference=? AND acheteur=?');
					$req->execute(array($ref, $acheteur));
					$req->closeCursor();
					$_SESSION['message']="Commande effacée";
					header("Location:stock-factures.php");
					
					
			} else { $_SESSION['message']='ERRREUR de données GET sur stock-factures.php';header("Location:stock-factures.php");}

