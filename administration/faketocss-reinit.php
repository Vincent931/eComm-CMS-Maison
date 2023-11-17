<?php session_start();

$res = fopen('../css/faketocss-save.css', 'r');
$css='/******************* css add *************/'.'&#10;';
$css.='&#10;'.'&#10;'.'&#10;'.'&#10;';
$css.='/****************************************/'.'&#10;';
            
            /*origine*/
            while(!feof($res)){
                $ligne = fgets($res);
                //echo $ligne.'<br>';
                $css.=$ligne;
                $css.='&#10;';
            }
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
$_SESSION['message']='css réinitialisé';

header("Location:faketocss.php");
