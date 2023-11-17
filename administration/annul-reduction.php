<?php session_start();
$reduction=$_SESSION['reduction'];
$reference=$_POST['ref'];
$mail=$_POST['mail'];
$_SESSION['total']=0;
require 'boutique0.php';

$req1=$bdd->prepare('SELECT * FROM commande WHERE reference=:reference');
$req1->execute(array('reference'=>$reference));
while($donnees=$req1->fetch()){
	$_SESSION['total']=number_format($donnees['total'],2,'.','');
}
$grand_total=$_SESSION['total'];
$reduction=number_format(0,2,'.','');
$req=$bdd->prepare('UPDATE commande SET reduction=:reduction, grand_total=:grand_total WHERE reference=:reference');
$req->execute(array('reduction'=>$reduction, 'grand_total'=>$grand_total, 'reference'=>$reference));

$_SESSION['reduction']=0.00;
$_SESION['message']="Réductions annulés";
if(isset($req)){$req->closeCursor();}
if(isset($req1)){$req1->closeCursor();}
//echo $_SESSION['total'];
//echo $grand_total;
header('Location:vente-directe-reussie.php?mail='.$mail.'&ref='.$_SESSION['reference']);