
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <!-- Twitter-->
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
        <link rel="canonical" href="<?php echo $societe['url'];?>"/>
        <!-- fin twitter -->
        <meta name="author" content="Vincent Nguyen" />

        <!-- Site favicon -->
        <?php $icone="icone";
        $req55=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
        $req55->execute(array($icone));
        $donnees55=$req55->fetch();?>
        <link rel="shortcut icon" href="publicimgs/<?php echo $donnees55['nom'];?>"/>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="assets/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="assets/css/materialdesignicons.min.css">

        <!-- MFP Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">

        <!-- Owl Slider -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css" />
        <link rel="stylesheet" href="assets/css/owl.theme.css" />
        <link rel="stylesheet" href="assets/css/owl.transitions.css" />

        <!-- Custom  Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/menu.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <!-- css depuis les tables-->
        <style type="text/css"><?php echo $css;?></style>
        <?php require 'compteur.php';?>