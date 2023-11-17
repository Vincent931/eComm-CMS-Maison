<?php  $req40=$bdd1->query('SELECT * FROM facebook');
    $donnees60=$req40->fetch();
?>
<html lang="fr">
    <head>
        <title>bouton de partage customisé</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- balises servant à décrire le contenu partagé sur les réseaux sociaux -->
        <meta property="og:title" content="<?php echo $donnees60['titre'];?>" /> 
        <meta property="og:image" content="https://www-1-zero.fr/publicimgs/<?php echo $donnees60['image'];?>" /> 
        <meta property="og:description" content="<?php echo $donnees60['decription'];?>" /> 
        <meta property="og:url" content="<?php echo $donnees60['url'];?>"/>

        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rum+Raisin" rel="stylesheet"> 
    </head>
    <body>
        <a href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u='.$donnees60['nom_site'];?>" class="partage">
            <p><span class="fb_icon"><img style="width:30px" src="../publicimgs/facebook.png"/></span></p>
        </a>
    </body>
</html>
<?php  ?>