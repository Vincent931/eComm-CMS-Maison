<?php session_start();

if(isset($_POST['existon']) AND !empty($_POST['existon'])){
	$existon=$_POST['existon'];
} else {
	$existon="";
}
if(isset($_POST['remplace']) AND !empty($_POST['remplace'])){
	$remplace=$_POST['remplace'];
} else {
	$remplace="";
}
if(isset($_POST['optionB']) AND !empty($_POST['optionB'])){
	$optionB=$_POST['optionB'];
} else {
	$optionB="";
}

require '../boutique0.php';

$req=$bdd->query('SELECT * FROM click_c');
$exists=$req->rowCount();

if ($exists>0){
	$req1=$bdd->prepare('UPDATE click_c SET existon=:existon, remplace=:remplace, optionB=:optionB');
	$req1->execute(array('existon'=>$existon, 'remplace'=>$remplace, 'optionB'=>$optionB));

} else {
	$req1=$bdd->prepare('INSERT INTO click_c (existon, remplace, optionB) VALUES(:existon, :remplace, :optionB)');
	$req1->execute(array('existon'=>$existon, 'remplace'=>$remplace, 'optionB'=>$optionB));
	echo '+++++';
}

if (isset($req)){$req->closeCursor();}
if (isset($req1)){$req1->closeCursor();echo '------------';}

$_SESSION['message']="Config du Click&Collect enregistrée";

echo $existon,'-',$optionB;
header('Location:click&collect-ch.php');