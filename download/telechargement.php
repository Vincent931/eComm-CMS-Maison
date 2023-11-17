<?php

require '../boutique0.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
	
	<body>			
			</br></br></br></br></br>
			<div>
			<h1 style="text-align:center">Téléchargement</h1>
			<h2 style="text-align:center;margin:auto">2 essais</h2>
			<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} 



$file=$_GET['file'];
$cle=$_GET['cle'];

$req=$bdd->prepare('SELECT * FROM telechargement WHERE cle=? AND file=?');
$req->execute(array($cle, $file));

$donnees=$req->fetch();
if(isset($donnees['facteur']) AND $donnees['facteur']>0){

	echo '<h2 style="text-align:center">'.'<a href="download.php?file='.$file.'&cle='.$cle.'">TELECHARGER FICHIER'.'</a>'.'</h2>';
	

} else {
	echo '<h2 style="text-align:center;color:red">'.'TELECHARGEMENT ERRONE OU EPUISE !'.'</h2>';
}
?>		
		<br><br>
<h4 style="text-align:center;color:green"><a href="../index.php">Aller sur le site</a></h4>
		<br><br><br><br><br>
	</body>
</html>
