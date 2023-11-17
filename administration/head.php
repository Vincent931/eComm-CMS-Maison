<head>
    <meta charset="utf-8"/>
    <link href="style.css" rel="stylesheet"/>
   <?php $icone="icone";
    $req55=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
      $req55->execute(array($icone));
      $donnees55=$req55->fetch();?>
      <link rel="shortcut icon" href="../publicimgs/<?php echo $donnees55['nom'];?>"/>
    <?php $req50=$bdd->query('SELECT css FROM css');
    $donnees50=$req50->fetch();
    $css=$donnees50['css'];?>
    <style type="text/css"><? echo $css;?></style>
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
    <title>Boutique-Administration</title>
</head>