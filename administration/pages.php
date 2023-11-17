<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';
$_SESSION['count']=0;
$_SESSION['count1']=0;
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$nom=$_GET['nom'];
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head-js-ch.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Accueil</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;margin:auto;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div>
<br><br>
<p>Votre Page</p>
<p><a style="text-align:center;margin:auto" id="grey_color" href="pre-pages.php">Retournez à la Liste des Pages</a></p>
<div>
<?php
	$req150=$bdd->prepare('SELECT * FROM page WHERE nom=:nom');
	$req150->execute(array('nom'=>$nom));
	$donnees150=$req150->fetch();
	if(isset($donnees150['nom']) AND !empty($donnees150['nom'])){
		?>
		<p><input style="color:blue" type="button" id="inp1" value="<?php echo $donnees150['nom'];?>"/>
		<input type="button"	id="einp1" value="rabattre"/><p>
		<div id="A1">
			<?php require 'bank-img-vid-mp3-9.php';?>
			<form action="contenu-page-add.php" name="ch_form" id="ch_form" method="post">
				<p style="color:red">Veuillez rafraichir avant de changer le contenu</p>
				<p><input type="submit" value="Changer Contenu"/></p>
				<p><a style="border:1px solid gray;color:red" href="erase-page.php?id=<?php echo $donnees150['id'];?>">Effacer</a></p>
				<fieldset style="width:950px;background:#8DC8FC;margin:auto">
				<p>
				<?php require 'editeur-racine2.php'; ?>
				</p>
				<p><textarea rows="50" cols="120" name="message" id="message"><?php echo $donnees150['contenu'];?></textarea></p>
				</fieldset>
				<input type="hidden" id="cache" name="cache" value="<?php echo $donnees150['id'];?>"/>
			</form>
		</div>
<script>
$(document).ready(function(){
    $("#inp1").click(function() {
        $( "#A1" ).css( 'display', 'block' )
    });
    $("#einp1").click(function() {
     	$( "#A1" ).css( 'display', 'none' )
    })
});
</script>
<?php }
?></div>
   <body>
      <br><br><br><br><br>
	</body>
</html>
