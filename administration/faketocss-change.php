<?php session_start();

$css=$_POST['css'];

require 'boutique0.php';

$req1=$bdd->query('SELECT css FROM css');
$donnees1=$req1->fetch();
if(isset($donnees1['css']) AND !empty($donnees1['css'])){

	$req=$bdd->prepare('UPDATE css SET css=:css');
	$req->execute(array('css'=>$css));

} else {

$req=$bdd->prepare('INSERT INTO css(css) VALUES(:css)');
$req->execute(array('css'=>$css));

}
$_SESSION['message']='css changé';

 header("Location:faketocss.php");