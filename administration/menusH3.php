<?php session_start();

$NH31=$_POST['NH31'];
$UH31=$_POST['UH31'];
$NH32=$_POST['NH32'];
$UH32=$_POST['UH32'];
$NH33=$_POST['NH33'];
$UH33=$_POST['UH33'];
$NH34=$_POST['NH34'];
$UH34=$_POST['UH34'];
$NH35=$_POST['NH35'];
$UH35=$_POST['UH35'];
$NH36=$_POST['NH36'];
$UH36=$_POST['UH36'];
$NH37=$_POST['NH37'];
$UH37=$_POST['UH37'];
$NH38=$_POST['NH38'];
$UH38=$_POST['UH38'];


require 'texte1.php';

$req=$bdd1->query('SELECT * FROM menuH3');
$nbre_req=$req->rowcount();

if($nbre_req==0){
	$req1=$bdd1->prepare('INSERT INTO menuH3(NH31, UH31, NH32, UH32, NH33, UH33, NH34, UH34, NH35, UH35, NH36, UH36, NH37, UH37, NH38, UH38) VALUES(:NH31, :UH31, :NH32, :UH32, :NH33, :UH33, :NH34, :UH34, :NH35, :UH35, :NH36, :UH36, :NH37, :UH37, :NH38, :UH38)');
	$req1->execute(array('NH31'=>$NH31, 'UH31'=>$UH31, 'NH32'=>$NH32, 'UH32'=>$UH32, 'NH33'=>$NH33, 'UH33'=>$UH33, 'NH34'=>$NH34, 'UH34'=>$UH34, 'NH35'=>$NH35, 'UH35'=>$UH35, 'NH36'=>$NH36, 'UH36'=>$UH36, 'NH37'=>$NH37, 'UH37'=>$UH37, 'NH38'=>$NH38, 'UH38'=>$UH38));
} else {

	$req1=$bdd1->prepare('UPDATE menuH3 SET NH31=:NH31, UH31=:UH31, NH32=:NH32, UH32=:UH32, NH33=:NH33, UH33=:UH33, NH34=:NH34, UH34=:UH34, NH35=:NH35, UH35=:UH35, NH36=:NH36, UH36=:UH36, NH37=:NH37, UH37=:UH37, NH38=:NH38, UH38=:UH38');
	$req1->execute(array('NH31'=>$NH31, 'UH31'=>$UH31, 'NH32'=>$NH32, 'UH32'=>$UH32, 'NH33'=>$NH33, 'UH33'=>$UH33, 'NH34'=>$NH34, 'UH34'=>$UH34, 'NH35'=>$NH35, 'UH35'=>$UH35, 'NH36'=>$NH36, 'UH36'=>$UH36,'NH37'=>$NH37, 'UH37'=>$UH37, 'NH38'=>$NH38, 'UH38'=>$UH38));
}

$_SESSION['message']="Troisième colonne sauvegardée";
header("Location:menus.php");