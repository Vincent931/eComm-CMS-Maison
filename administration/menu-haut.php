<style>
  body nav{
    margin-left: -380px;
  }
nav *{
margin:0;
padding:0;
}
nav{
  width:1800px;
  margin:0 auto;
  background:#452B2B;
  padding:0;
  position:sticky;
  top:0;
}
.deroulant{
  margin-left: 25px;
  margin-right: 25px;
  color: white;
}
nav ul{
  list-style-type:none;
}
nav ul li{
  float:left;
  width:250px;
  text-align:center;
  position:relative;
}
nav ul::after{
  content:"";
  display:table;
  clear:both
}
nav a{
  display:block;
  text-decoration:none;
  color: white;
  border-bottom:2px solid transparent;
  padding:10px 0px;
}
nav a:hover{
  background:#289AFE;
  border-bottom:2px solid green;
  color: white;
}
.sous{
  display:none;
  box-shadow: 0px 1px 2px #fff;
  background:#452B2B;
  color:white;
  position:absolute;
  width:250px;
  z-index:1000;
}
nav > ul li:hover .sous{
  display:block;
}
.sous li{
  float:none;
  width:250px;
  text-align:left;
}
.sous a {
  padding:10px;
  border-bottom:none;
}
.sous a:hover{
  border-bottom:none;
  background:#289AFE;
}
</style>
<nav id="nav_admin_sample">
  <ul>
    <li class="deroulant"><a href="">Administration</a>
      <ul class="sous">
        <li><a style="text-decoration:none" href="index">Administration</a></li>
        <li><a style="text-decoration:none" href="indexto.php">Redirection index-></a></li>
        <li><a style="text-decoration:none" href="societe-ch.php">Entrer Informations Société</a></li>
        <li><a style="text-decoration:none" href="conversion-ch.php">Conversion USD/EUR</a></li>
        <li><a style="text-decoration:none" href="monetico-ch.php">Monético</a></li>
        <li><a style="text-decoration:none" href="paypal-ch.php">Paypal braintree</a></li>
        <!--<li><a style="text-decoration:none" href="opennode-ch.php">Opennode (cryptos)</a></li>-->
        <li><a style="text-decoration:none" href="paypal-SDK-ch.php">Paypal SDK</a></li>
        <li><a style="text-decoration:none" href="cheque-ch.php">Par Chèque</a></li>
        <li><a style="text-decoration:none" href="click&collect-ch.php">Click & Collect</a></li>
        <li><a style="text-decoration:none" href="line(1)-ch.php">Changer Ligne(1) - Panier</a></li>
        <li><a style="text-decoration:none" href="google-ch.php">Google Maps</a></li>
        <li><a style="text-decoration:none" href="facebook-ch.php">Facebook</a></li>
        <li><a style="text-decoration:none" href="comptes.php">Afficher Comptes</a></li>
        <li><a style="text-decoration:none" href="ajouter-compte.php">Ajouter Compte</a></li>
        <li><a style="text-decoration:none" href="vendre-direct.php">VENTE Directe</a></li>
        <li><a style="text-decoration:none" href="stock-factures.php">VENTES/VALIDATION/FACTURES</a></li>
        <li><a style="text-decoration:none" href="operations-perdues.php">Opérations Perdues</a></li>
        <li><a style="text-decoration:none" href="incident-paiement.php">Incident de Paiement</a></li>
        <li><a style="text-decoration:none" href="blacklist.php">Blacklist par IP</a></li>
        <li><a style="text-decoration:none" href="charger-listing-email.php">Charger listing email</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="">Images/PDF/Mails</a>
       <ul class="sous">
      	<li><a style="text-decoration:none" href="icones-bandeau.php">Icônes internes du site</a></li>
      	<li><a style="text-decoration:none" href="charger-pdf.php">Uploader PDF société</a></li>
        <li><a style="text-decoration:none" href="effacer-pdf.php">Afficher PDF Société</a></li>
        <li><a style="text-decoration:none" href="charger-image.php">Uploader image</a></li>
        <li><a style="text-decoration:none" href="lister-image.php">Lister image</a></li>
        <li><a style="text-decoration:none" href="videos-upload.php">Vidéos</a></li>
        <li><a style="text-decoration:none" href="lister-videos.php">Lister vidéos</a></li>
        <li><a style="text-decoration:none" href="music-upload.php">Musiques</a></li>
        <li><a style="text-decoration:none" href="lister-musique.php">Lister Musiques</a></li>
        <li><a style="text-decoration:none" href="mail-init-ch.php">Mail création Compte</a></li>
        <li><a style="text-decoration:none" href="mail-reinit-ch.php">Mail réinitialisation Compte</a></li>
        <li><a style="text-decoration:none" href="mail-achat-ch.php">Mail Achat</a></li>
        <li><a style="text-decoration:none" href="mail-validation-achat-ch.php">Mail Validation Achat</a></li>
        <li><a style="text-decoration:none" href="mailing-all.php">Campagne eMailing (listing)</a></li> 
        <li><a style="text-decoration:none" href="mailing.php">Campagne eMailing (comptes)</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="">Pages/css Add</a>
      <ul class="sous">
        <li><a style="text-decoration:none" href="html-basic.php" target="_blank">A Savoir</a></li>
        <li><a style="text-decoration:none" href="police.php">Police Add</a></li>
        <li><a style="text-decoration:none" href="color-ch.php">Couleurs</a></li>
        <li><a style="text-decoration:none" href="accueil-ch.php">Accueil</a></li>
        <li><a style="text-decoration:none" href="back-image.php">Image Background Accueil</a></li>
        <li><a style="text-decoration:none" href="policy-ch.php">Politique de Confidentialité</a></li>
        <li><a style="text-decoration:none" href="contact-ch.php">Contact</a></li>
        <li><a style="text-decoration:none" href="cgv-ch.php">CGV</a></li>
        <li><a style="text-decoration:none" href="paiement-ok-ch.php">Paiement-OK</a></li>
        <li><a style="text-decoration:none" href="paiement-error-ch.php">Paiement-ERROR</a></li>
        <li><a style="text-decoration:none" href="landingP.php">Landing Page</a></li>
        <!--<li><a style="text-decoration:none" href="product-plus-ch.php">Produit Solo</a></li>-->
        <li><a style="text-decoration:none" href="pre-pages.php">Pages supplémentaires</a></li>
        <li><a style="text-decoration:none" href="menus.php">Menu Haut/Bas</a></li>
        <li><a style="text-decoration:none" href="publicite-ch.php">Publicité Zone 1 & 2</a></li> 
        <li><a style="text-decoration:none" href="faketocss.php">Add css</a></li>
        <li><a style="text-decoration:none" href="JavaS.php">Add JavaScript</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="">Sujet/Commmentaires</a>
       <ul class="sous">
        <li><a style="text-decoration:none" href="deposer.un.topic.php">Déposer un sujet</a></li>
        <li><a style="text-decoration:none" href="effacer-sujet.php">Effacer sujet</a></li>
        <li><a style="text-decoration:none" href="modification-sujet.php">Modifier sujet</a></li>
        <li><a style="text-decoration:none" href="background-sujet.php">Couleur Background Sujets/Commentaires</a></li>
        <li><a style="text-decoration:none" href="changer-ordre-sujet.php">Modifier ordre sujet</a></li>
        <li><a style="text-decoration:none" href="jeux-concours-ch.php">Config Jeux Concours</a></li>
        <li><a style="text-decoration:none" href="effacer-commentaire.php">Effacer commentaire</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="">Produit</a>
       <ul class="sous">
        <li><a style="text-decoration:none" href="livraison-internationale.php">Configuration Livraison Internationale</a></li>
        <li><a style="text-decoration:none" href="categories.php">Catégories des produits</a></li>
        <li><a style="text-decoration:none" href="ajouter-produit-libre.php">Produit à prix variable</a></li>
        <li><a style="text-decoration:none" href="ajouter-produit.php">Ajouter produit</a></li>
        <li><a style="text-decoration:none" href="modification-produit.php">Modifier produit</a></li>
        <li><a style="text-decoration:none" href="effacer-produit.php">Effacer produit</a></li>
        <li><a style="text-decoration:none" href="upload-telechargement.php">Uploader Fichier Téléchargement</a></li>
        <li><a style="text-decoration:none" href="ajouter-telechargement.php">Ajouter téléchargement</a></li>
        <li><a style="text-decoration:none" href="modification-telechargement.php">Modifier téléchargement/explication</a></li>
        <li><a style="text-decoration:none" href="effacer-telechargement.php">Effacer téléchargement</a></li>
        <li><a style="text-decoration:none" href="changer-ordre.php">Changer ordre produits</a></li>
        <li><a style="text-decoration:none" href="coupon-reduction.php">Ajouter Coupon Réduction</a></li>
      </ul>
    </li>
  </ul>  
</nav>
