<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107526011-2"></script>
	<script>
  	window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
  	gtag('js', new Date());

  	gtag('config', 'UA-107526011-2');
	</script>
	<meta charset="utf-8"/>
	<link href="css/style.css" rel="stylesheet"/>
	<?php $icone="icone";
    $req55=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
      $req55->execute(array($icone));
	$donnees55=$req55->fetch();?>
	<link rel="shortcut icon" href="publicimgs/<?php echo $donnees55['nom'];?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>window.twttr = (function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  	if (d.getElementById(id)) return t;
  	js = d.createElement(s);
  	js.id = id;
  	js.src = "https://platform.twitter.com/widgets.js";
  	fjs.parentNode.insertBefore(js, fjs);
	t._e = [];
  	t.ready = function(f) {
    t._e.push(f);
  	};
	return t;
	}(document, "script", "twitter-wjs"));
	</script>
	<link rel="canonical" href="<?php echo $name['url'];?>"/>
	<?php $req50=$bdd->query('SELECT css FROM css');
	$donnees50=$req50->fetch();
	$css=$donnees50['css'];?>
	<style type="text/css"><?php echo $css;?></style>
	<?php $req45=$bdd->query('SELECT * FROM police');
	$donnees45=$req45->fetch();
	if(isset($donnees45['existson']) AND $donnees45['existson']=='oui'){
	echo "<style>@font-face {
	  font-family: '".$donnees45['name']."'
	  font-style: normal;
	  font-weight: 400;
	  src: local('".$donnees45['name']."'),
	  url(".$donnees45['url'].") format('".$donnees45['format']."');
		}
	p,h1,h2,h3,h4,h5,h6,a,input,ol,ul,li,tr,td,th,label,nav,textarea,body,section,article,ul li a, ol li a, ul li ul li a, ol li ol li a{
	font-family : \"".$donnees45['name']."\", sans-serif;}
	</style>";
	}
	?>
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/moinsplus.js"></script>
