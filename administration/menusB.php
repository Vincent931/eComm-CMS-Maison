<?php session_start();
//$_POST
$B11=$_POST['MB11'];
$B12=$_POST['MB12'];
$B21=$_POST['MB21'];
$B22=$_POST['MB22'];
$B31=$_POST['MB31'];
$B32=$_POST['MB32'];
$B41=$_POST['MB41'];
$B42=$_POST['MB42'];
$B51=$_POST['MB51'];
$B52=$_POST['MB52'];
$B61=$_POST['MB61'];
$B62=$_POST['MB62'];
$B71=$_POST['MB71'];
$B72=$_POST['MB72'];
$B81=$_POST['MB81'];
$B82=$_POST['MB82'];
$B91=$_POST['MB91'];
$B92=$_POST['MB92'];
$B101=$_POST['MB101'];
$B102=$_POST['MB102'];
$B111=$_POST['MB111'];
$B112=$_POST['MB112'];
$B121=$_POST['MB121'];
$B122=$_POST['MB122'];
$B131=$_POST['MB131'];
$B132=$_POST['MB132'];
$B141=$_POST['MB141'];
$B142=$_POST['MB142'];
$B151=$_POST['MB151'];
$B152=$_POST['MB152'];


require 'texte1.php';

$req=$bdd1->query('SELECT * FROM menuB');
$nbre_req=$req->rowcount();

if($nbre_req==0){
	$req1=$bdd1->prepare('INSERT INTO menuB(B11, B12, B21, B22, B31, B32, B41, B42, B51, B52, B61, B62, B71, B72, B81, B82, B91, B92, B101, B102, B111, B112, B121, B122, B131, B132, B141, B142, B151, B152) VALUES(:B11, :B12, :B21, :B22, :B31, :B32, :B41, :B42, :B51, :B52, :B61, :B62, :B71, :B72, :B81, :B82, :B91, :B92, :B101, :B102, :B111, :B112, :B121, :B122, :B131, :B132, :B141, :B142, :B151, :B152)');
	$req1->execute(array('B11'=>$B11, 'B12'=>$B12, 'B21'=>$B21, 'B22'=>$B22, 'B31'=>$B31, 'B32'=>$B32, 'B41'=>$B41, 'B42'=>$B42, 'B51'=>$B51, 'B52'=>$B52, 'B61'=>$B61, 'B62'=>$B62, 'B71'=>$B71, 'B72'=>$B72, 'B81'=>$B81, 'B82'=>$B82, 'B91'=>$B91, 'B92'=>$B92, 'B101'=>$B101, 'B102'=>$B102, 'B111'=>$B111, 'B112'=>$B112, 'B121'=>$B121, 'B122'=>$B122, 'B131'=>$B131, 'B132'=>$B132, 'B141'=>$B141, 'B142'=>$B142, 'B151'=>$B151, 'B152'=>$B152 ));
} else {

	$req1=$bdd1->prepare('UPDATE menuB SET B11=:B11, B12=:B12, B21=:B21, B22=:B22, B31=:B31, B32=:B32, B41=:B41, B42=:B42, B51=:B51, B52=:B52, B61=:B61, B62=:B62, B71=:B71, B72=:B72, B81=:B81, B82=:B82, B91=:B91, B92=:B92, B101=:B101, B102=:B102, B111=:B111, B112=:B112, B121=:B121, B122=:B122, B131=:B131, B132=:B132, B141=:B141, B142=:B142, B151=:B151, B152=:B152');

	$req1->execute(array('B11'=>$B11, 'B12'=>$B12, 'B21'=>$B21, 'B22'=>$B22, 'B31'=>$B31, 'B32'=>$B32, 'B41'=>$B41, 'B42'=>$B42, 'B51'=>$B51, 'B52'=>$B52, 'B61'=>$B61, 'B62'=>$B62, 'B71'=>$B71, 'B72'=>$B72, 'B81'=>$B81, 'B82'=>$B82, 'B91'=>$B91, 'B92'=>$B92, 'B101'=>$B101, 'B102'=>$B102, 'B111'=>$B111, 'B112'=>$B112, 'B121'=>$B121, 'B122'=>$B122, 'B131'=>$B131, 'B132'=>$B132, 'B141'=>$B141, 'B142'=>$B142, 'B151'=>$B151, 'B152'=>$B152 ));
}
if(isset($req)){
	$req->closeCursor();
}
if(isset($req1)){
	$req1->closeCursor();
}
$_SESSION['message']="Menu Bas sauvegardé";
header("Location:menus.php");