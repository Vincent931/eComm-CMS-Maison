<footer>
<br><br><br><br><br><br>
<ul id="menu">
   <li><a id="lien_menuB1" href="publicimgs/<?php echo $pdf['nom'];?>"><?php echo $nav_bas['infos'];?></a></li>
   <li><a id="lien_menuB2" href="politique-confidentialite.php"><?php echo $nav_bas['politique'];?></a></li> 
   <li><a id="lien_menuB3" href="mise-en-garde.php"><?php echo $nav_bas['a_savoir'];?></a></li>
   <li><a id="lien_menuB4" href="reinitialisation.php"><?php echo $nav_bas['reinitialisation'];?></a></li>
    <li><a id="lien_menuB5" href="#">Et bien d'autres !</a>
      <ul>
         <li><a id="lien_menuB6" href="/pronos-strike/">Pronostic PMU 1 Course</a></li>
         <li><a id="lien_menuB7" href="/blog-ste/">Blog</a></li>
         <li><a id="lien_menuB8" href="/1-bouquin/">Lire Vincent Nguyen</a></li>
         <li><a id="lien_menuB9" href="/cv-vincent-informatique/">CV du développeur</a></li>
         <li><a id="lien_menuB10" href="/chatt/">Chatt</a></li>
         <li><a id="lien_menuB11" href="https://foss-nature-8.com">Mécanique sur ANGERS</a></li>
      </ul>
   </li>

<?php $req40=$bdd1->query('SELECT * FROM facebook');
    $donnees60=$req40->fetch();
    if(isset($donnees60['etat']) AND !empty($donnees60['etat'])){
      if($donnees60['etat']=='oui'){
        ?><li><?php require_once("bouton_partage_personnalise.php"); ?></li>
     <?php }
    } ?><li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Je%20tweet%20depuis" data-size="large">Tweet</a></li></ul>
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
            ////////////////////////////////////
            //background bouton add
            $bacColAdd=$col['bacColAdd'];
            echo $bacColAdd;
            //police
            $colAdd=$col['colAdd'];
            //background bouton voir et retour
            $bacColVoir=$col['bacColVoir'];
            //police
            $colVoir=$col['colVoir'];
            ?>
            <script>    //recup 
                        var pageCol=document.getElementById('bloc_page');
                        //background
                        pageCol.style.backgroundColor="<?php echo $bacColP;?>";
                        pageCol.style.color="<?php echo $colP;?>";
                        //recup
                        var menuH=document.getElementById('en_ligne_haut');
                        //background menu H
                        menuH.style.backgroundColor="<?php echo $bacColMH; ?>";

                        var menuHL0=document.getElementById('lien_menuH0');
                        var menuHL1=document.getElementById('lien_menuH1');
                        var menuHL2=document.getElementById('lien_menuH2');
                        var menuHL3=document.getElementById('lien_menuH3'); 
                        //color menu H
                        menuHL0.style.color="<?php echo $colMH;?>";
                        menuHL1.style.color="<?php echo $colMH;?>";
                        menuHL2.style.color="<?php echo $colMH;?>";
                        menuHL3.style.color="<?php echo $colMH;?>";                     
                        //recup
                        var buttonAddCol=document.getElementsByClassName('addPanier').item(0).style;
                        //var buttonVoirCol=document.getElementsByClassName('a_pro_lien');
                        //var buttonAddCol=document.querySelectorAll('a.add addPanier');
                        buttonAddCol.backgroundColor="<?php echo $bacColAdd; ?>";
                        alert(buttonAddCol);
                        //coleur de police
                        buttonAddCol.style.color="<?php echo $colAdd;?>";
                        //2eme bouton
                        
                        buttonVoirCol.style.backgroundColor="<?php echo $bacColVoir; ?>";
                        //couleur de police
                        buttonVoirCol.style.color="<?php echo $colVoir;?>";
                        
                        //menu b
                        var menuB=document.getElementById('menu');
                        //background
                        menuB.style.backgroundColor="<?php echo $bacColMB;?>";
                        //var menuBL0=document.getElementById('lien_menuB0');
                        var menuBL1=document.getElementById('lien_menuB1');
                        var menuBL2=document.getElementById('lien_menuB2');
                        var menuBL3=document.getElementById('lien_menuB3');
                        var menuBL4=document.getElementById('lien_menuB4');
                        var menuBL5=document.getElementById('lien_menuB5');
                        var menuBL6=document.getElementById('lien_menuB6');
                        var menuBL7=document.getElementById('lien_menuB7');
                        var menuBL8=document.getElementById('lien_menuB8');
                        var menuBL9=document.getElementById('lien_menuB9');
                        var menuBL10=document.getElementById('lien_menuB10');
                        var menuBL11=document.getElementById('lien_menuB11');
                        //menuBL0.style.color="<?php echo $colMB;?>";
                        menuBL1.style.color="<?php echo $colMB;?>";
                        menuBL2.style.color="<?php echo $colMB;?>";
                        menuBL3.style.color="<?php echo $colMB;?>";
                        menuBL4.style.color="<?php echo $colMB;?>";
                        menuBL5.style.color="<?php echo $colMB;?>";
                        menuBL6.style.color="<?php echo $colMB;?>";
                        menuBL7.style.color="<?php echo $colMB;?>";
                        menuBL8.style.color="<?php echo $colMB;?>";
                        menuBL9.style.color="<?php echo $colMB;?>";
                        menuBL10.style.color="<?php echo $colMB;?>";
                        menuBL11.style.color="<?php echo $colMB;?>";
                            //1erbutton
                        
                        
                </script>
                <?php
                
if(isset($_COOKIE['accept_cookie'])) {
   $showcookie = false;
} else {
   $showcookie = true;
}
require_once('view.php');
?>
</footer>

