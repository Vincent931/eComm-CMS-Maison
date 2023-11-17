<?php session_start();
$url=$_SERVER['HTTP_REFERER'];
require 'boutique0.php';

if(isset($_POST['id_effacer']) AND !empty($_POST['id_effacer'])) {
$id_effacer=htmlspecialchars($_POST['id_effacer']);
$req = $bdd->prepare('DELETE FROM produits WHERE id = ?');
$req->execute(array($id_effacer));
$req2 =$bdd->prepare('DELETE FROM explications WHERE id_produit=?');
$req2->execute(array($id_effacer));
$req->closeCursor();
$req2->closeCursor();
$_SESSION['message']='Produit effacé';
}
else {$_SESSION['message']='Vous devez stipuler un N° avant de valider';}
header("Location:".$url);