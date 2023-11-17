<?php session_start();

$NH11=$_POST['NH11'];
$UH11=$_POST['UH11'];
$NH12=$_POST['NH12'];
$UH12=$_POST['UH12'];
$NH13=$_POST['NH13'];
$UH13=$_POST['UH13'];
$NH14=$_POST['NH14'];
$UH14=$_POST['UH14'];
$NH15=$_POST['NH15'];
$UH15=$_POST['UH15'];
$NH16=$_POST['NH16'];
$UH16=$_POST['UH16'];
$NH17=$_POST['NH17'];
$UH17=$_POST['UH17'];
$NH18=$_POST['NH18'];
$UH18=$_POST['UH18'];

require 'texte1.php';

$req=$bdd1->query('SELECT * FROM menuH1');
$nbre_req=$req->rowcount();

if($nbre_req==0){
	$req1=$bdd1->prepare('INSERT INTO menuH1(NH11, UH11, NH12, UH12, NH13, UH13, NH14, UH14, NH15, UH15, NH16, UH16, NH17, UH17, NH18, UH18) VALUES(:NH11, :UH11, :NH12, :UH12, :NH13, :UH13, :NH14, :UH14, :NH15, :UH15, :NH16, :UH16, :NH17, :UH17, :NH18, :UH18)');
	$req1->execute(array('NH11'=>$NH11, 'UH11'=>$UH11, 'NH12'=>$NH12, 'UH12'=>$UH12, 'NH13'=>$NH13, 'UH13'=>$UH13, 'NH14'=>$NH14, 'UH14'=>$UH14, 'NH15'=>$NH15, 'UH15'=>$UH15, 'NH16'=>$NH16, 'UH16'=>$UH16, 'NH17'=>$NH17, 'UH17'=>$UH17, 'NH18'=>$NH18, 'UH18'=>$UH18));
} else {

	$req1=$bdd1->prepare('UPDATE menuH1 SET NH11=:NH11, UH11=:UH11, NH12=:NH12, UH12=:UH12, NH13=:NH13, UH13=:UH13, NH14=:NH14, UH14=:UH14, NH15=:NH15, UH15=:UH15, NH16=:NH16, UH16=:UH16, NH17=:NH17, UH17=:UH17, NH18=:NH18, UH18=:UH18');
	$req1->execute(array('NH11'=>$NH11, 'UH11'=>$UH11, 'NH12'=>$NH12, 'UH12'=>$UH12, 'NH13'=>$NH13, 'UH13'=>$UH13, 'NH14'=>$NH14, 'UH14'=>$UH14, 'NH15'=>$NH15, 'UH15'=>$UH15, 'NH16'=>$NH16, 'UH16'=>$UH16, 'NH17'=>$NH17, 'UH17'=>$UH17, 'NH18'=>$NH18, 'UH18'=>$UH18));
}
$_SESSION['message']="Première colonne sauvegardée";
header("Location:menus.php");