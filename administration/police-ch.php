<?php session_start();
if(isset($_POST['exists']) AND !empty($_POST['exists'])){ $existson=$_POST['exists'];} else{$existson="";}
if(isset($_POST['url']) AND !empty($_POST['url'])){ $url=$_POST['url'];} else{$url="";}
if(isset($_POST['name']) AND !empty($_POST['name'])){ $name=$_POST['name'];} else{$name="";}
if(isset($_POST['format']) AND !empty($_POST['format'])){ $format=$_POST['format'];} else{$format="";}


require '../boutique0.php';

$req=$bdd->query('SELECT * FROM police');
$exists=$req->rowCount();

if(isset($exists) AND $exists>0){
	$req2=$bdd->prepare('UPDATE police SET existson=:existson, url=:url, name=:name, format=:format');
	$req2->execute(array('existson'=>$existson, 'url'=>$url, 'name'=>$name, 'format'=>$format));
	$_SESSION['message']="Police ajouté";
} else{
	$req2=$bdd->prepare('INSERT INTO police(existson, url, name, format) VALUES(:existson, :url, :name, :format)');
	$req2->execute(array('existson'=>$existson, 'url'=>$url, 'name'=>$name, 'format'=>$format));
	$_SESSION['message']="Police ajouté";
}
header("Location:police.php");