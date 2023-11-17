<footer>
<nav id="nav_side_resp">
  <?php $req30=$bdd1->query("SELECT * FROM colors");
  $col=$req30->fetch();
  //backgrounds menu H
  $bacColMH=$col['bacColMH'];
  //background menu B
  $bacColMB=$col['bacColMB'];
  //color menu H
  $colMH=$col['colMH']; 
  //color menu B
  $colMB=$col['colMB'];
  //background page
  $bacColP=$col['bacColP'];
  //color page
  $colP=$col['colP']; 
  //background side
  $bacColS=$col['bacColS'];
  //color side
  $colS=$col['colS'];
////////////////////////////////////
  //background bouton add
  $bacColAdd=$col['bacColAdd'];
  //police
  $colAdd=$col['colAdd']
  //background bouton voir et retour
  $bacColVoir=$col['bacColVoir'];
  //police
  $colVoir=$col['colVoir']
  ?>
  <ul>
    <li><a id="lien_menuB1n" href="publicimgs/<?php echo $pdf['nom'];?>"><?php echo $nav_bas['infos'];?></a></li>
    <li><a id="lien_menuB2n" href="politique-confidentialite.php"><?php echo $nav_bas['politique'];?></a></li>
    <li><a id="lien_menuB3n" href="mise-en-garde.php"><?php echo $nav_bas['a_savoir'];?></a></li>
    <li><a id="lien_menuB4n" href="reinitialisation.php"><?php echo $nav_bas['reinitialisation'];?></a></li>

    <li><a id="lien_menuB6n" href="/pronos-strike/">Pronostic PMU 1 Course</a></li>
    <li><a id="lien_menuB7n" href="/blog-ste/">Blog</a></li>
    <li><a id="lien_menuB8n" href="/1-bouquin/">Lire Vincent Nguyen</a></li>
    <li><a id="lien_menuB9n" href="/cv-vincent-informatique/">CV du développeur</a></li>
    <li><a id="lien_menuB10n" href="/chatt/">Chatt</a></li>
    <li><a id="lien_menuB11n" href="https://foss-nature-8.com">Mécanique sur ANGERS</a></li>



    <?php $req40=$bdd1->query('SELECT * FROM facebook');
    $donnees60=$req40->fetch();
    if(isset($donnees60['etat']) AND !empty($donnees60['etat'])){
      if($donnees60['etat']=='oui'){
        ?><li id="lien_menuB5n"><?php require("bouton_partage_personnalise.php"); ?></li>
     <?php }
    } ?>
    <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Je%20tweet%20depuis" data-size="large">Tweet</a></li>
  <ul>
  <script>  
  //page
      //recup 
    var pageCol=document.getElementById('bloc_page');
      //background
    pageCol.style.backgroundColor="<?php echo $bacColP;?>";
      //color
    pageCol.style.color="<?php echo $colP;?>";
  //menu H
    //recup
    var menuH=document.getElementById('en_ligne_haut');

    var menuHL0=document.getElementById('lien_menuH0');
    var menuHL1=document.getElementById('lien_menuH1');
    var menuHL2=document.getElementById('lien_menuH2');
    var menuHL3=document.getElementById('lien_menuH3');
      ///background menu H
    menuH.style.backgroundColor="<?php echo $bacColMH; ?>";
        //color menu H
    menuHL0.style.color="<?php echo $colMH;?>";
    menuHL1.style.color="<?php echo $colMH;?>";
    menuHL2.style.color="<?php echo $colMH;?>";
    menuHL3.style.color="<?php echo $colMH;?>";
  //menu B attaché au side
    //background nav_side_resp de bacColMB (bdd)
    var menuB=document.getElementById('nav_side_resp');
    menuB.style.backgroundColor="<?php echo $bacColMB;?>";
    //color nav_side_resp
    //var menuBL0=document.getElementById('lien_menuB0n');
    //menuBL0.style.color="<?php echo $colMB;?>";
    var menuBL1=document.getElementById('lien_menuB1n');
    menuBL1.style.color="<?php echo $colMB;?>";
    var menuBL2=document.getElementById('lien_menuB2n');
    menuBL2.style.color="<?php echo $colMB;?>";
    var menuBL3=document.getElementById('lien_menuB3n');
    menuBL3.style.color="<?php echo $colMB;?>";
    var menuBL4=document.getElementById('lien_menuB4n');
    menuBL4.style.color="<?php echo $colMB;?>";
    var menuBL6=document.getElementById('lien_menuB6n');
    menuBL6.style.color="<?php echo $colMB;?>";
    var menuBL7=document.getElementById('lien_menuB7n');
    menuBL7.style.color="<?php echo $colMB;?>";
    var menuBL8=document.getElementById('lien_menuB8n');
    menuBL8.style.color="<?php echo $colMB;?>";
    var menuBL9=document.getElementById('lien_menuB9n');
    menuBL9.style.color="<?php echo $colMB;?>";
    var menuBL10=document.getElementById('lien_menuB10n');
    menuBL10.style.color="<?php echo $colMB;?>";
    var menuBL11=document.getElementById('lien_menuB11n');
    menuBL11.style.color="<?php echo $colMB;?>";
        //1erbutton
    var buttonAddCol=document.getElementsByClassName('addPanier');
    buttonAddCol.style.backgroundColor="<?php echo $bacColAdd; ?>";
    //coleur de police
    buttonAddCol.style.color="<?php echo $colAdd;?>";
    //2eme bouton
    var buttonVoirCol=document.getElementsByClassName('a_pro_lien');
    buttonVoirCol.style.backgroundColor="<?php echo $bacColVoir; ?>";
    //couleur de police
    buttonVoirCol.style.color="<?php echo $colVoir;?>";
  </script>
</nav>
<?php
if(isset($_COOKIE['accept_cookie'])) {
   $showcookie = false;
} else {
   $showcookie = true;
}
require_once('view.php');
?>
<footer>