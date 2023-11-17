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
    <link href="../css/style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../publicimgs/icone.png">
    <title><?php echo $name['nom'];?></title>
    <?php $req50=$bdd->query('SELECT css FROM css');
    $donnees50=$req50->fetch();
    $css=$donnees50['css'];?>
    <style type="text/css"><? echo $css;?></style>
	<script src="../js/wait.js"></script>
</head>