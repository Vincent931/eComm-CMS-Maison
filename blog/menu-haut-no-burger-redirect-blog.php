<?php

require 'texte1.php';

$req256=$bdd1->query('SELECT * FROM colors');
$donnees256=$req256->fetch();
//Background Menu H
$bacColMH=$donnees256['bacColMH'];
//Color Menu H
$colMH=$donnees256['colMH'];
//background menu B
$bacColMB=$donnees256['bacColMB'];
//color menu B
$colMB=$donnees256['colMB'];
//background page
$bacColP=$donnees256['bacColP'];
//color page
$colP=$donnees256['colP']; 
//background side
$bacColS=$donnees256['bacColS'];
//color side
$colS=$donnees256['colS'];
?>
<style>
#aff_block{
    display: flex;
    flex-direction: row;
    min-width: 100.4%;
    max-width: 100.4%;
    height:120px;
    margin: 0;
    border: 0;
    padding: 0;
    position: relative;
    left: -5px;
}
#deroulant{
    position: relative;
    left: -5px;
    min-width: 1800px;
    max-width:1800px;
    height:120px;
    margin:0;
    border: 0;
    display: flex;
    flex-direction: row; 
    text-align:left;
    padding-top:25px;
    padding-bottom:25px;
    text-decoration: none;
    z-index:1001;
    background-color: white;
    list-style-type: none;
}
#deroulant img{
    width:42px;
    text-decoration: none;
    background-color: white;
    list-style-type: none;
    position:relative;
    top: -5px;
    left: 20px;
}
#img_caddieM{
    background-color: white;
    list-style-type: none;
}
.niveau1M{
    display: flex;
    flex-direction: row; 
    text-decoration: none;
    width:100%;
    margin:auto;
    text-align:left;
    background-color: white;
}
li.Mab123{
    list-style-type: none;
    width:200px;
    text-decoration:none;
    margin:auto;
    text-align:left;
    display: flex;
    flex-direction: column;
    position:relative;
    top: -5px;
    background-color: white;
    list-style-type: none;
    z-index:1001;
    height: 50px;
    vertical-align: middle;
    border-radius: 4px/4px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
li.M123{
    position: relative;
    z-index:999;
}
a#MH11 .Ma_panier1,  a#MH21 .Ma_panier1,  a#MH31 .Ma_panier1, a#MH41 .Ma_panier1, {
    font-size:18px;
    margin:auto;
    padding-top:15px;
    padding-bottom:15px;
    display: flex;
    flex-direction: row;
    background: blue;
    list-style-type: none;
}
.Ma_panier1{
    position: relative;
    top: -1px;
}
ul.niveauM2{
   position: relative;
   top: 20px;
   margin:auto;
   padding-left:0px;
   border-left:0px;
   text-align:left;
   display: flex;
   flex-direction: column;
   background-color: white;
   list-style-type: none;
   z-index:1001;
}
li {
    text-decoration:none;
}
a {
    text-decoration: none;
}
a#MH12.Ma_panier,a#MH13.Ma_panier,a#MH14.Ma_panier,a#MH15.Ma_panier,a#MH16.Ma_panier,a#MH17.Ma_panier,a#MH18.Ma_panier,a#MH22.Ma_panier,a#MH23.Ma_panier,a#MH24.Ma_panier,a#MH25.Ma_panier,a#MH26.Ma_panier,a#MH27.Ma_panier,a#MH28.Ma_panier,a#MH32.Ma_panier,a#MH33.Ma_panier,a#MH34.Ma_panier,a#MH35.Ma_panier,a#MH36.Ma_panier,a#MH37.Ma_panier,a#MH38.Ma_panier,a#MH42.Ma_panier,a#MH43.Ma_panier,a#MH44.Ma_panier,a#MH45.Ma_panier,a#MH46.Ma_panier,a#MH47.Ma_panier,a#MH48.Ma_panier{
    overflow-x: hidden;
    overflow-y: clip;
display: none;
position: relative;
flex-direction: column;
font-size:15px;
/*background-color: white;*/
 z-index:1001;
}
a:hover{
    text-decoration:underline;
}
#MH50 {
    position: relative;
    top: -10px;
}
#MH50 #img_caddieM{
    position: relative;
    top: 18px;
    left: -15px;
}
</style>
<script>
/* webpack.production.config.js
module.exports = {
  mode: 'production',
};*/

$(document).ready(function(){

var aff=$('#aff').val();
            $( "body" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
            /*$( "#aff_block" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});*/
            //$( "#deroulant" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( ".niveau1M" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "li.Mab123" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "a#MH11 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "a#MH21 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "a#MH31 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "a#MH41 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            //$( "a#MH51 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});

            //$( "#MH00" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});

            if($("#MH11")){$( "#MH11" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH21")){$( "#MH21" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH31")){$( "#MH31" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH41")){$( "#MH41" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH51")){$( "#MH51" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}

            if($("#NB11")){$( "#MB11" ).css({ 'background': '<?php echo $bacColMB;?>'});}
            if($("#NB21")){$( "#MB21" ).css({ 'background': '<?php echo $bacColMB;?>'});}

            affiche_toutM();        

function affiche_toutM() {
    if(aff=="oui"){
       $( "#deroulant" ).css( 'display', 'block');
       $( "#burger").css('display','none');
    } else {
    $( "#deroulant" ).css( 'display', 'none');
    $( "#burger").css('display','block');
    }
    if (window.matchMedia('(max-width: 1024px)').matches){
    $( "#deroulant" ).css( 'display', 'none');
    $( "#burger").css('display','block');
    /*$("#cont_e").width(300);
    $("#titl_e").width(300);
    $("h3#com_e").width(300);*/     
    }
}
});
</script>
<div id="aff_block">
    <?php $req33=$bdd1->query('SELECT * FROM menu_burger');
    $donnees33=$req33->fetch();
    $aff_oui_non = $donnees33['afficher']; ?>
    <input type="hidden" id="aff" name="aff" value="<?php echo $aff_oui_non;?>"/>
    <div id="deroulant">
        <div class="niveau1M">
            <li id="Mab123">
                <a id="MH00" href="Questions-reponses"><img id="img_nav_admin_sample" src="../publicimgs/accueil.png"/></a>
            </li>
            <li class="Mab123"><a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH11" href="Questions-reponses">Sujets/Accueil</a></li>
            <li class="Mab123"><a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH21" href="se-connecter">Se Connecter</a></li>
            <li class="Mab123"><a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH31" href="se-deconnecter">Déconnexion</a></li>
            <li class="Mab123"><a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH41" href="creer-un-compte">Créer un Compte</a></li>
            <li class="Mab123"><a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH51" href="../factures">Factures</a></li>
        </div>
    </div>
</div>
<br><br><br>



