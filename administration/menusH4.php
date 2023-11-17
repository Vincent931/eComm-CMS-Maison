<?php session_start();

$NH41=$_POST['NH41'];
$UH41=$_POST['UH41'];
$NH42=$_POST['NH42'];
$UH42=$_POST['UH42'];
$NH43=$_POST['NH43'];
$UH43=$_POST['UH43'];
$NH44=$_POST['NH44'];
$UH44=$_POST['UH44'];
$NH45=$_POST['NH45'];
$UH45=$_POST['UH45'];
$NH46=$_POST['NH46'];
$UH46=$_POST['UH46'];
$NH47=$_POST['NH47'];
$UH47=$_POST['UH47'];
$NH48=$_POST['NH48'];
$UH48=$_POST['UH48'];
require 'texte1.php';

$req=$bdd1->query('SELECT * FROM menuH4');
$nbre_req=$req->rowcount();

if($nbre_req==0){
	$req1=$bdd1->prepare('INSERT INTO menuH4(NH41, UH41, NH42, UH42, NH43, UH43, NH44, UH44, NH45, UH45, NH46, UH46, NH47, UH47, NH48, UH48) VALUES(:NH41, :UH41, :NH42, :UH42, :NH43, :UH43, :NH44, :UH44, :NH45, :UH45, :NH46, :UH46, :NH47, :UH47, :NH48, :UH48)');
	$req1->execute(array('NH41'=>$NH41, 'UH41'=>$UH41, 'NH42'=>$NH42, 'UH42'=>$UH42, 'NH43'=>$NH43, 'UH43'=>$UH43, 'NH44'=>$NH44, 'UH44'=>$UH44, 'NH45'=>$NH45, 'UH45'=>$UH45, 'NH46'=>$NH46, 'UH46'=>$UH46, 'NH47'=>$NH47, 'UH47'=>$UH47, 'NH48'=>$NH48, 'UH48'=>$UH48));
} else {

	$req1=$bdd1->prepare('UPDATE menuH4 SET NH41=:NH41, UH41=:UH41, NH42=:NH42, UH42=:UH42, NH43=:NH43, UH43=:UH43, NH44=:NH44, UH44=:UH44, NH45=:NH45, UH45=:UH45, NH46=:NH46, UH46=:UH46, NH47=:NH47, UH47=:UH47, NH48=:NH48, UH48=:UH48');
	$req1->execute(array('NH41'=>$NH41, 'UH41'=>$UH41, 'NH42'=>$NH42, 'UH42'=>$UH42, 'NH43'=>$NH43, 'UH43'=>$UH43, 'NH44'=>$NH44, 'UH44'=>$UH44, 'NH45'=>$NH45, 'UH45'=>$UH45, 'NH46'=>$NH46, 'UH46'=>$UH46, 'NH47'=>$NH47, 'UH47'=>$UH47, 'NH48'=>$NH48, 'UH48'=>$UH48));
}

$_SESSION['message']="Quatrième colonne sauvegardée";
header("Location:menus.php");