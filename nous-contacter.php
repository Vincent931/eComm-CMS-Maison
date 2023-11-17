<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';
require 'boutique0.php';
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req25=$bdd1->query('SELECT * FROM google_mp');
$map_google=$req25->fetch();

if(isset($map_google['exist']) AND $map_google['exist']=='oui'){
	$oui='oui';
} else {$oui='non';}

$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();
$req=$bdd1->query('SELECT contenu FROM contactez');
$contactez=$req->fetch();
?>
<!DOCTYPE html>
<html>
<?php require 'head.php';
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();

$societe=$name['nom'];
?>
<style>
.h_ab{
		display: block;
		text-align: center;
  	margin-top: 5px;
  	margin-bottom: 5px;
  	font-size: 16px;
	  list-style-type: none;
    text-decoration:none;
    background-color: white;
    vertical-align: middle;
    border-radius: 4px/4px;
    color: #5B6975;
    box-shadow: rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.bb1{
	height: 40px;
	width: 300px;
	padding: 10px;
	margin-left: auto;
  margin-right: auto;
}
.bb2{
	width: 300px;
	height: 40px;
	padding: 10px;
	margin-left: auto;
  margin-right:auto;
  margin-bottom: 30px;
  margin-top: 60px;
}
h1 #nch1{
  width:auto;
  padding:15px;
}
div.bloc_page_contact
{
  text-align:left;
  margin-top:0;
}
div#esp_contact1
{
  width:175px;
  height:200px;
  display:inline-block;
  vertical-align:top;
}
div.centre_contact
{
  width:650px;
  font-size:16px;
  font-weight:normal;
  margin: 15px 28% auto 28%;
}
#esp_contact2
{
  width:175px;
  height:20px;
  display:inline-block;
  vertical-align:top;
}
#lat, #long{
	display: none;
	margin: 0;
	padding: 0;
	border: 0;
}
/*Google Maps*/
div#map_cont
{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
  height:250px;
  width:650px;
  display:block;
  margin-left:auto;
  margin-right:auto;
  box-sizing: content-box;
  overflow: visible;
}
#map{
	height:250px;
  width:650px;
  margin-left:auto;
  margin-right:auto;
	text-align:center;
	box-sizing: content-box;
	overflow: visible;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
	body{
		width: 100%;
	}
	.bloc_page_contact{
		width: 330px;
		margin: 0;
	}
	div.centre_contact{
		width: 330px;
		margin: -30px 0 0 15px;
	}
	.h_ab{
		width: 330px;
	}
	.bb1{
		width: 330px;
		margin-left: 15px;
	  margin-right: 0;
	  margin-top: -45px;
	}
	.bb2{
		width: 330px;
		height: 40px;
		padding: 10px;
		margin-left: 0;
	  margin-right:0;
	  margin-bottom: 30px;
	  margin-top: 60px;
	}
	p{
		width: 330px;
		margin: 0;
	}
 	/*Google Maps*/
	div#map_cont{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
	  height:250px;
	  width:330px;
	  display:block;
	  margin-left:15px;
	  margin-right:0;
	}
	#map{
		height:250px;
	  width:330px;
	  margin-left:0;
	  margin-right:0;
		text-align:center;
	}
 	@-moz-document url-prefix(){
}
}
</style>
	<title>Vincent-dev-web, à Angers(49) Contact du développeur et références</title>
	<meta name="description" content="Vincent-dev-web(49): Vous pouvez contacter le développeur et vous renseigner sur une intégration web"/>
	<!--Google Map-->
		<?php require 'texte1.php';
		$req40=$bdd1->query('SELECT * FROM google_mp');
		$donnees10=$req40->fetch();
		?>
		<div id="lat"><?php echo $donnees10['lat']; ?></div>
		<div id="long"><?php echo $donnees10['lon']; ?></div>
		<div id="apikey"><?php echo $donnees10['api']; ?></div>
	<!--<script src="https://maps.google.com/maps/api/js?key=<?php echo $donnees10['api']; ?>" type="text/javascript"></script>-->
		<script type="module" src="js/map.js"></script>
</head>
	<body id="bloc_page">
<?php require 'header.php'; ?>
<br><div class="vis1"><br><br><br><br><p style="height:50px">&nbsp;</p></div>
<div class="bloc_page_contact">
	<h2 class="h_ab bb1"><span>NOUS-CONNAITRE</span></h2>
		</br></br>			
	<div class="centre_contact"><?php echo html_entity_decode($contactez['contenu']);?></div>
</div>
<?php if (isset($oui) AND $oui=='oui')
	{?>
	<div id="map_cont">
		<h2 class="h_ab bb2">Trouver <?php echo $societe;?></h2>
	<div id="map">
			<!-- Ici s'affichera la carte google map-->
	</div>
	</div>
<?php } ?>
	<br><br><br><br><br><br>

		<!-- End Contact -->
		<!--google map-->

		<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
		<!--<script type="module" async src="https://maps.googleapis.com/maps/api/js?v=weekly&key=<?php echo $donnees10['api']; ?>&callback=initMap"></script>
		<script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>-->
		<!--fin google Map-->
        <?php $non_aff_compt=true; require 'footer.php';?>
        <!-- Javascript -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="assets/js/custom.js"></script>
	</body>
</html>
		
		
