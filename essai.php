<?php session_start();

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
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
#deroulant{
    width:100%;
    height:80px;
    margin:auto;
    display: flex;
    flex-direction: row; 
    text-align:left;
    padding-left:25px;
    padding-right:230px;
    padding-top:25px;
    padding-bottom:25px;
    text-decoration: none;
    z-index:999;
    background-color: gray;
    list-style-type: none;
}
#deroulant img{
    width:42px;
    text-decoration: none;
    background-color: gray;
    list-style-type: none;
    position:relative;
    top: -25px;
}
#img_caddieM{
    background-color: gray;
    list-style-type: none;
}
.niveau1M{
    display: flex;
    flex-direction: row; 
    text-decoration: none;
    width:100%;
    margin:auto;
    text-align:left;
    padding:15px;
    margin:15px;
    background-color: gray;
    list-style-type: none;
}
li.Mab123{
    width:200px;
    text-decoration:none;
    margin:auto;
    text-align:left;
    display: flex;
    flex-direction: column;
    position:relative;
    top: -15px;
    background-color: gray;
    list-style-type: none;
}
a#MH11 .Ma_panier1,  a#MH21 .Ma_panier1,  a#MH31 .Ma_panier1, a#MH41 .Ma_panier1, {
    font-size:18px;
    margin:auto;
    padding-top:15px;
    padding-bottom:15px;
    display: flex;
    flex-direction: row;
    background-color: gray;
    list-style-type: none;
}
ul.niveauM2{
   mmargin:auto;
   padding-left:0px;
   border-left:0px;
   text-align:left;
   display: flex;
   flex-direction: column;
   background-color: gray;
   list-style-type: none;
}
li {
    text-decoration:none;
}
a {
    text-decoration: none;
}
#MH12,#MH13,#MH14,#MH15,#MH16,#MH17,#MH18,#MH22,#MH23,#MH24,#MH25,#MH26,#MH27,#MH28,#MH32,#MH33,#MH34,#MH35,#MH36,#MH37,#MH38,#MH42,#MH43,#MH44,#MH45,#MH46,#MH47,#MH48{
display: none;
flex-direction: column;
font-size:15px;
background-color: gray;
}
#MH50 {
    position: relative;
    top: -20px;
}
#MH50 #img_caddieM{
    position: relative;
    top: 18px;
}
@media screen and (max-width: 1024px)
/*@media all and (min-width: 120px) and (max-width: 1080px)*/
{
    #aff_block{
        display: none;
    }
}
</style>
<script>
/* webpack.production.config.js
module.exports = {
  mode: 'production',
};*/

$(document).ready(function(){

var aff=$('#aff').val();
alert(aff);


            $( "body" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
            /*$( "#aff_block" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});*/
            $( "#deroulant" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( ".niveau1M" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "li.Mab123" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "a#MH11 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "a#MH21 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "a#MH31 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "a#MH41 .Ma_panier1" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "#ul.niveauM2" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "#MH00" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "#MH50" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});
            $( "#img_caddieM" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});

           /* $( "footer" ).css({ 'background': '<?php echo $bacColMB;?>', 'color':'<?php echo $colMB;?>'});
            $( "#nav_side_resp" ).css({ 'background': '<?php echo $bacColMB;?>', 'color':'<?php echo $colMB;?>'});
            $( ".li" ).css({ 'background': '<?php echo $bacColMB;?>', 'color':'<?php echo $colMB;?>'});
            $( ".ul" ).css({ 'background': '<?php echo $bacColMB;?>', 'color':'<?php echo $colMB;?>'});
            $( "#menu" ).css({ 'background': '<?php echo $bacColMB;?>', 'color':'<?php echo $colMB;?>'});*/

            if($("#MH11")){$( "#MH11" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH12")){$( "#MH12" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH13")){$( "#MH13" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH14")){$( "#MH14" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH15")){$( "#MH15" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH16")){$( "#MH16" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH17")){$( "#MH17" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH18")){$( "#MH18" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}

            if($("#MH21")){$( "#MH21" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH22")){$( "#MH22" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH23")){$( "#MH23" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH24")){$( "#MH24" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH25")){$( "#MH25" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH26")){$( "#MH26" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH27")){$( "#MH27" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH28")){$( "#MH28" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}

            if($("#MH31")){$( "#MH31" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH32")){$( "#MH32" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH33")){$( "#MH33" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH34")){$( "#MH34" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH35")){$( "#MH35" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH36")){$( "#MH36" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH37")){$( "#MH37" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH38")){$( "#MH38" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}


            if($("#MH41")){$( "#MH41" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>'});}
            if($("#MH42")){$( "#MH42" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH43")){$( "#MH43" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH44")){$( "#MH44" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH45")){$( "#MH45" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH46")){$( "#MH46" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH47")){$( "#MH47" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}
            if($("#MH48")){$( "#MH48" ).css({ 'background': '<?php echo $bacColMH;?>', 'color':'<?php echo $colMH;?>', 'display':'none'});}

            if($("#NB11")){$( "#MB11" ).css({ 'background': '<?php echo $bacColMB;?>'});}
            if($("#NB21")){$( "#MB21" ).css({ 'background': '<?php echo $bacColMB;?>'});}

            affiche_toutM();        

function affiche_toutM() {
    if(aff=="oui"){
       $( "#deroulant" ).css( 'display', 'block');
    } else{ $( "#deroulant" ).css( 'display', 'none');}
}
});
function afficheM1(){
    if($("#MH12")){
        if($( "#MH12" ).css('display') == 'none'){$( "#MH12" ).css( 'display', 'block');} 
        else{ $( "#MH12" ).css( 'display', 'none');}
    }
    if($("#MH13")){
        if($( "#MH13" ).css('display') == 'none'){$( "#MH13" ).css( 'display','block');}
        else{ $( "#MH13" ).css( 'display', 'none');}
    }
    if($("#MH14")){
        if($( "#MH14" ).css('display') == 'none'){$( "#MH14" ).css( 'display', 'block');}
        else{ $( "#MH14" ).css( 'display', 'none');}
    }
    if($("#MH15")){
        if($( "#MH15" ).css('display') == 'none'){$( "#MH15" ).css( 'display', 'block');}
        else{ $( "#MH15" ).css( 'display', 'none');}
    }
    if($("#MH16")){
        if($( "#MH16" ).css('display') == 'none'){$( "#MH16" ).css( 'display', 'block');}
        else{ $( "#MH16" ).css( 'display', 'none');}
    }
    if($("#MH17")){
        if($( "#MH17" ).css('display') == 'none'){$( "#MH17" ).css( 'display', 'block');}
        else{ $( "#MH17" ).css( 'display', 'none');}
    }
    if($("#MH18")){
        if($( "#MH18" ).css('display') == 'none'){$( "#MH18" ).css( 'display', 'block');}
        else{ $( "#MH18" ).css( 'display', 'none');}
    }
}

function afficheM2(){
    if($("#MH22")){
        if($( "#MH22" ).css('display') == 'none'){$( "#MH22" ).css( 'display', 'block');} 
        else{ $( "#MH22" ).css( 'display', 'none');}
    }
    if($("#MH23")){
        if($( "#MH23" ).css('display') == 'none'){$( "#MH23" ).css( 'display','block');}
        else{ $( "#MH23" ).css( 'display', 'none');}
    }
    if($("#MH24")){
        if($( "#MH24" ).css('display') == 'none'){$( "#MH24" ).css( 'display', 'block');}
        else{ $( "#MH24" ).css( 'display', 'none');}
    }
    if($("#MH25")){
        if($( "#MH25" ).css('display') == 'none'){$( "#MH25" ).css( 'display', 'block');}
        else{ $( "#MH25" ).css( 'display', 'none');}
    }
    if($("#MH26")){
        if($( "#MH26" ).css('display') == 'none'){$( "#MH26" ).css( 'display', 'block');}
        else{ $( "#MH26" ).css( 'display', 'none');}
    }
    if($("#MH27")){
        if($( "#MH27" ).css('display') == 'none'){$( "#MH27" ).css( 'display', 'block');}
        else{ $( "#MH27" ).css( 'display', 'none');}
    }
    if($("#MH28")){
        if($( "#MH28" ).css('display') == 'none'){$( "#MH28" ).css( 'display', 'block');}
        else{ $( "#MH28" ).css( 'display', 'none');}
    }
}

function afficheM3(){
    if($("#MH32")){
        if($( "#MH32" ).css('display') == 'none'){$( "#MH32" ).css( 'display', 'block');} 
        else{ $( "#MH32" ).css( 'display', 'none');}
    }
    if($("#MH33")){
        if($( "#MH33" ).css('display') == 'none'){$( "#MH33" ).css( 'display','block');}
        else{ $( "#MH33" ).css( 'display', 'none');}
    }
    if($("#MH34")){
        if($( "#MH34" ).css('display') == 'none'){$( "#MH34" ).css( 'display', 'block');}
        else{ $( "#MH34" ).css( 'display', 'none');}
    }
    if($("#MH35")){
        if($( "#NM35" ).css('display') == 'none'){$( "#MH35" ).css( 'display', 'block');}
        else{ $( "#MH35" ).css( 'display', 'none');}
    }
    if($("#MH36")){
        if($( "#MH36" ).css('display') == 'none'){$( "#MH36" ).css( 'display', 'block');}
        else{ $( "#MH36" ).css( 'display', 'none');}
    }
    if($("#MH37")){
        if($( "#MH37" ).css('display') == 'none'){$( "#MH37" ).css( 'display', 'block');}
        else{ $( "#MH37" ).css( 'display', 'none');}
    }
    if($("#MH38")){
        if($( "#MH38" ).css('display') == 'none'){$( "#MH38" ).css( 'display', 'block');}
        else{ $( "#MH38" ).css( 'display', 'none');}
    }
}

function afficheM4(){
    if($("#MH42")){
        if($( "#MH42" ).css('display') == 'none'){$( "#MH42" ).css( 'display', 'block');} 
        else{ $( "#MH42" ).css( 'display', 'none');}
    }
    if($("#MH43")){
        if($( "#MH43" ).css('display') == 'none'){$( "#MH43" ).css( 'display','block');}
        else{ $( "#MH43" ).css( 'display', 'none');}
    }
    if($("#MH44")){
        if($( "#MH44" ).css('display') == 'none'){$( "#MH44" ).css( 'display', 'block');}
        else{ $( "#MH44" ).css( 'display', 'none');}
    }
    if($("#MH45")){
        if($( "#MH45" ).css('display') == 'none'){$( "#MH45" ).css( 'display', 'block');}
        else{ $( "#MH45" ).css( 'display', 'none');}
    }
    if($("#MH46")){
        if($( "#MH46" ).css('display') == 'none'){$( "#MH46" ).css( 'display', 'block');}
        else{ $( "#MH46" ).css( 'display', 'none');}
    }
    if($("#MH47")){
        if($( "#MH47" ).css('display') == 'none'){$( "#MH47" ).css( 'display', 'block');}
        else{ $( "#MH47" ).css( 'display', 'none');}
    }
    if($("#MH48")){
        if($( "#MH48" ).css('display') == 'none'){$( "#MH48" ).css( 'display', 'block');}
        else{ $( "#MH48" ).css( 'display', 'none');}
    }
}

</script>

    </head>
    <body>
<div id="aff_block">
    <div id="deroulant">
    <input type="hidden" id="aff" name="aff" value="oui"/>
        <div class="niveau1M">
             <li id="Mab123">
                <a id="MH00" href="accueil.html"><img id="img_nav_admin_sample" src="publicimgs/accueil.png"/></a>
            </li>
            <?php  
  //bdd 1ère colonne
        $req255=$bdd1->query('SELECT * FROM menuH1');
        $donnees255=$req255->fetch();
        //1ère colonne
        if(isset($donnees255['NH11']) AND !empty($donnees255['NH11'])) {
            if(isset($donnees255['UH12']) AND !empty($donnees255['UH12'])){
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH11" onclick="afficheM1();"href="'.$donnees255['UH11'].'">'.$donnees255['NH11'].'</a>'.'<ul class="niveauM2">';
            }
        else {
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH11" href="'.$donnees255['UH11'].'">'.$donnees255['NH11'].'</a>';
        }}
        if (isset($donnees255['NH12']) AND !empty($donnees255['NH12'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH12" href="'.$donnees255['UH12'].'">'.$donnees255['NH12'].'</a>'.'</li>';}
         if (isset($donnees255['NH13']) AND !empty($donnees255['NH13'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH13" href="'.$donnees255['UH13'].'">'.$donnees255['NH13'].'</a>'.'</li>';}
        if (isset($donnees255['NH14']) AND !empty($donnees255['NH14'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH14" href="'.$donnees255['UH14'].'">'.$donnees255['NH14'].'</a>'.'</li>';}
        if (isset($donnees255['NH15']) AND !empty($donnees255['NH15'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH15" href="'.$donnees255['UH15'].'">'.$donnees255['NH15'].'</a>'.'</li>';}
        if (isset($donnees255['NH16']) AND !empty($donnees255['NH16'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH16" href="'.$donnees255['UH16'].'">'.$donnees255['NH16'].'</a>'.'</li>';}
        if (isset($donnees255['NH17']) AND !empty($donnees255['NH17'])){echo     
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH17" href="'.$donnees255['UH17'].'">'.$donnees255['NH17'].'</a>'.'</li>';}
        if (isset($donnees255['NH18']) AND !empty($donnees255['NH18'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH18" href="'.$donnees255['UH18'].'">'.$donnees255['NH18'].'</a>'.'</li>';}
        if (isset($donnees255['NH12']) AND !empty($donnees255['NH12'])){echo
      '</ul>';}
      if(!isset($donnees255['NH11']) AND empty($donnees255['NH11'])) { echo
    '</li>';}
    //bdd 2ème colonne
        $req255=$bdd1->query('SELECT * FROM menuH2');
        $donnees255=$req255->fetch();
        //2ème colonne
        if(isset($donnees255['NH21']) AND !empty($donnees255['NH21'])) {
            if(isset($donnees255['UH22']) AND !empty($donnees255['UH22'])){
            echo '<li class="Mab123"">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH21" onclick="afficheM2();"href="'.$donnees255['UH21'].'">'.$donnees255['NH21'].'</a>'.'<ul class="niveauM2">';
            }
        else {
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH21" href="'.$donnees255['UH21'].'">'.$donnees255['NH21'].'</a>';
        }}
        if (isset($donnees255['NH22']) AND !empty($donnees255['NH22'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH22" href="'.$donnees255['UH22'].'">'.$donnees255['NH22'].'</a>'.'</li>';}
         if (isset($donnees255['NH23']) AND !empty($donnees255['NH23'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH23" href="'.$donnees255['UH23'].'">'.$donnees255['NH23'].'</a>'.'</li>';}
        if (isset($donnees255['NH24']) AND !empty($donnees255['NH24'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH24" href="'.$donnees255['UH24'].'">'.$donnees255['NH24'].'</a>'.'</li>';}
        if (isset($donnees255['NH25']) AND !empty($donnees255['NH25'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH25" href="'.$donnees255['UH25'].'">'.$donnees255['NH25'].'</a>'.'</li>';}
        if (isset($donnees255['NH26']) AND !empty($donnees255['NH26'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH26" href="'.$donnees255['UH26'].'">'.$donnees255['NH26'].'</a>'.'</li>';}
        if (isset($donnees255['NH27']) AND !empty($donnees255['NH27'])){echo     
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH27" href="'.$donnees255['UH27'].'">'.$donnees255['NH27'].'</a>'.'</li>';}
        if (isset($donnees255['NH28']) AND !empty($donnees255['NH28'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH28" href="'.$donnees255['UH28'].'">'.$donnees255['NH28'].'</a>'.'</li>';}
        if (isset($donnees255['NH22']) AND !empty($donnees255['NH22'])){echo
      '</ul>';}
      if(!isset($donnees255['UH21']) AND empty($donnees255['UH21'])) { echo
    '</li>';}
    //bdd 3ème colonne
        $req255=$bdd1->query('SELECT * FROM menuH3');
        $donnees255=$req255->fetch();
    //3ème colonne
    if(isset($donnees255['NH31']) AND !empty($donnees255['NH31'])) {
            if(isset($donnees255['UH32']) AND !empty($donnees255['UH32'])){
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH31" onclick="afficheM3();" href="'.$donnees255['UH31'].'">'.$donnees255['NH31'].'</a>'.'<ul class="niveauM2">';
            }
        else {
            echo '<li class="M1ab23">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH31" href="'.$donnees255['UH31'].'">'.$donnees255['NH31'].'</a>';
        }}
        if (isset($donnees255['NH32']) AND !empty($donnees255['NH32'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH32" href="'.$donnees255['UH32'].'">'.$donnees255['NH32'].'</a>'.'</li>';}
         if (isset($donnees255['NH33']) AND !empty($donnees255['NH33'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH33" href="'.$donnees255['UH33'].'">'.$donnees255['NH33'].'</a>'.'</li>';}
        if (isset($donnees255['NH34']) AND !empty($donnees255['NH34'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH34" href="'.$donnees255['UH34'].'">'.$donnees255['NH34'].'</a>'.'</li>';}
        if (isset($donnees255['NH35']) AND !empty($donnees255['NH35'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH35" href="'.$donnees255['UH35'].'">'.$donnees255['NH35'].'</a>'.'</li>';}
        if (isset($donnees255['NH36']) AND !empty($donnees255['NH36'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH36" href="'.$donnees255['UH36'].'">'.$donnees255['NH36'].'</a>'.'</li>';}
        if (isset($donnees255['NH37']) AND !empty($donnees255['NH37'])){echo     
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH37" href="'.$donnees255['UH37'].'">'.$donnees255['NH37'].'</a>'.'</li>';}
        if (isset($donnees255['NH38']) AND !empty($donnees255['NH38'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH38" href="'.$donnees255['UH38'].'">'.$donnees255['NH38'].'</a>'.'</li>';}
        if (isset($donnees255['NH32']) AND !empty($donnees255['NH32'])){echo
      '</ul>';}
      if(!isset($donnees255['UH31']) AND empty($donnees255['UH31'])) { echo
    '</li>';}
    //bdd 4ème colonne
        $req255=$bdd1->query('SELECT * FROM menuH4');
        $donnees255=$req255->fetch();
    //4ème colonne
    if(isset($donnees255['NH41']) AND !empty($donnees255['NH41'])) {
            if(isset($donnees255['UH42']) AND !empty($donnees255['UH42'])){
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH41" onclick="afficheM4();" href="'.$donnees255['UH41'].'">'.$donnees255['NH41'].'</a>'.'<ul class="niveauM2">';
            }
        else {
            echo '<li class="Mab123">'.'<a class="Ma_panier1" style="text-decoration:none;text-align:center;margin:auto" id="MH41" href="'.$donnees255['UH41'].'">'.$donnees255['NH41'].'</a>';
        }}
        if (isset($donnees255['NH42']) AND !empty($donnees255['NH42'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH42" href="'.$donnees255['UH42'].'">'.$donnees255['NH42'].'</a>'.'</li>';}
         if (isset($donnees255['NH43']) AND !empty($donnees255['NH43'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH43" href="'.$donnees255['UH43'].'">'.$donnees255['NH43'].'</a>'.'</li>';}
        if (isset($donnees255['NH44']) AND !empty($donnees255['NH44'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH44" href="'.$donnees255['UH44'].'">'.$donnees255['NH44'].'</a>'.'</li>';}
        if (isset($donnees255['NH45']) AND !empty($donnees255['NH45'])){echo
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH45" href="'.$donnees255['UH45'].'">'.$donnees255['NH45'].'</a>'.'</li>';}
        if (isset($donnees255['NH46']) AND !empty($donnees255['NH46'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH46" href="'.$donnees255['UH46'].'">'.$donnees255['NH46'].'</a>'.'</li>';}
        if (isset($donnees255['NH47']) AND !empty($donnees255['NH47'])){echo     
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH47"href="'.$donnees255['UH47'].'">'.$donnees255['NH47'].'</a>'.'</li>';}
        if (isset($donnees255['NH48']) AND !empty($donnees255['NH48'])){echo 
        '<li class="M123">'.'<a class="Ma_panier" style="text-decoration:none" id="MH48" href="'.$donnees255['UH48'].'">'.$donnees255['NH48'].'</a>'.'</li>';}
        if (isset($donnees255['NH42']) AND !empty($donnees255['NH42'])){echo
      '</ul>';}
      if(!isset($donnees255['UH41']) AND empty($donnees255['UH41'])) { echo
    '</li>';}?>  
            
            </li>
            <li class="Mab123">
                  <a id="MH50" href="panier.php"><img id="img_caddieM" src="publicimgs/caddie.png"/> Panier</a>
            </li>
        </div>
    </div>
</div>
<footer></footer>
</body>
</html>
<br><br>


