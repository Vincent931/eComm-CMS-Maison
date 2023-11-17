<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req25=$bdd1->query('SELECT * FROM publicite1');
$image=$req25->fetch();
$req26=$bdd1->query('SELECT * FROM publicite2');
$image1=$req26->fetch();
require 'boutique0.php';
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
require 'compteur.php';
$req3=$bdd->query('SELECT * FROM redirect');
$donnees3=$req3->fetch();
$req=$bdd1->query('SELECT contenu FROM landingP');
$landing=$req->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php'; ?>
	<meta name="robots" content="noindex">
</head>
<script><?php echo $donnees41['Contenu'];?></script>
<body>
	<?php require 'menu-haut.php'; 
		require 'menu-haut-no-burger.php'; ?>
<?php echo html_entity_decode($landing['contenu']);?>
</body>
</html>