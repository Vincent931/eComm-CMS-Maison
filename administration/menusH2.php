<?php session_start();

$NH21=$_POST['NH21'];
$UH21=$_POST['UH21'];
$NH22=$_POST['NH22'];
$UH22=$_POST['UH22'];
$NH23=$_POST['NH23'];
$UH23=$_POST['UH23'];
$NH24=$_POST['NH24'];
$UH24=$_POST['UH24'];
$NH25=$_POST['NH25'];
$UH25=$_POST['UH25'];
$NH26=$_POST['NH26'];
$UH26=$_POST['UH26'];
$NH27=$_POST['NH27'];
$UH27=$_POST['UH27'];
$NH28=$_POST['NH28'];
$UH28=$_POST['UH28'];

require 'texte1.php';

$req=$bdd1->query('SELECT * FROM menuH2');
$nbre_req=$req->rowcount();

if($nbre_req==0){
	$req1=$bdd1->prepare('INSERT INTO menuH2(NH21, UH21, NH22, UH22, NH23, UH23, NH24, UH24, NH25, UH25, NH26, UH26, NH27, UH27, NH28, UH28) VALUES(:NH21, :UH21, :NH22, :UH22, :NH23, :UH23, :NH24, :UH24, :NH25, :UH25, :NH26, :UH26, :NH27, :UH27, :NH28, :UH28)');
	$req1->execute(array('NH21'=>$NH21, 'UH21'=>$UH21, 'NH22'=>$NH22, 'UH22'=>$UH22, 'NH23'=>$NH23, 'UH23'=>$UH23, 'NH24'=>$NH24, 'UH24'=>$UH24, 'NH25'=>$NH25, 'UH25'=>$UH25, 'NH26'=>$NH26, 'UH26'=>$UH26, 'NH27'=>$NH27, 'UH27'=>$UH27, 'NH28'=>$NH28, 'UH28'=>$UH28));
} else {

	$req1=$bdd1->prepare('UPDATE menuH2 SET NH21=:NH21, UH21=:UH21, NH22=:NH22, UH22=:UH22, NH23=:NH23, UH23=:UH23, NH24=:NH24, UH24=:UH24, NH25=:NH25, UH25=:UH25, NH26=:NH26, UH26=:UH26, NH27=:NH27, UH27=:UH27, NH28=:NH28, UH28=:UH28');
	$req1->execute(array('NH21'=>$NH21, 'UH21'=>$UH21, 'NH22'=>$NH22, 'UH22'=>$UH22, 'NH23'=>$NH23, 'UH23'=>$UH23, 'NH24'=>$NH24, 'UH24'=>$UH24, 'NH25'=>$NH25, 'UH25'=>$UH25, 'NH26'=>$NH26, 'UH26'=>$UH26, 'NH27'=>$NH27, 'UH27'=>$UH27, 'NH28'=>$NH28, 'UH28'=>$UH28));
}

$_SESSION['message']="Deuxième colonne sauvegardée";
header("Location:menus.php");