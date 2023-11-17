<?php require 'texte1.php'; 
$req256=$bdd1->query('SELECT * FROM colors');
$donnees256=$req256->fetch();

//background menu burger
$bacColMHB=$donnees256['bacColMHB'];
// color menu haut burger
$colMHB=$donnees256['colMHB'];
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
  #burger{
    width:330px;
    margin-left:25%;
    text-align:left;
    padding-left:25px;
    text-decoration: none;
    position:relative;
    z-index:99;
}
#burger_img{
  width:50px;
}
#nav_admin{
    width:330px;
    height:auto;
    margin:auto;
    text-align:left;
    padding-left:25px;
    padding-right:230px;
    padding-top:25px;
    padding-bottom:25px;
    text-decoration: none;
    z-index:99;
}
#nav_admin img{
    width:42px;
    text-decoration: none;
}
#img_caddie{
    position:relative;
    bottom:-12px;
    z-index: 999;
}
ul{
    text-decoration:none;
    list-style: none;
}
ul .niveau1{
    display: flex;
    flex-direction: column; /* => A utiliser quand le burger est affiché */
    /*flex-direction: row; /*=> A utiliser quand le burger n'est pas affiché */
    text-decoration: none;
    width:330px;
    margin:auto;
    text-align:left;
    padding:15px;
    margin:15px;
}
ul.niveau2{
   margin-left:0px;
   padding-left:0px;
   border-left:0px;
   text-align:left;
   display: flex;
   flex-direction: column;
}
li.a123 a#NH11 .a_panier1, li.a123 a#NH21 .a_panier1, li.a123 a#NH31 .a_panier1, li.a123 a#NH41 .a_panier1, {
    font-size:18px;
    padding-top:15px;
    padding-bottom:15px;
}
li {
    text-decoration:none;
}
li#ab123{
    width:330px;
    text-decoration:none;
    margin:10px;
    text-align:left;
}
li.a123{
    width:280px;
    text-decoration:none;
    margin-left:10px;
    text-align:left;
    padding-top:15px;
    padding-bottom:15px;
}
li.b123{
    text-decoration: none;
    width:310px;
    float:left;
    display: flex;
   flex-direction: column;
}
a {
    text-decoration: none;
}
#NH12,#NH13,#NH14,#NH15,#NH16,#NH17,#NH18,#NH22,#NH23,#NH24,#NH25,#NH26,#NH27,#NH28,#NH32,#NH33,#NH34,#NH35,#NH36,#NH37,#NH38,#NH42,#NH43,#NH44,#NH45,#NH46,#NH47,#NH48{
    float:left;
    margin-left:25px;
    font-size:15px;
}
@media only screen and (min-width: 200px) and (max-width: 1024px)  {
 /* menu burger */
    #burger{
    width:330px;
    margin:auto;
    }
    #burger_img{
    position:relative;
    left:-30px;
    }
    #nav_admin{
    width:350px;
    position:relative;
    left:-30px;
    padding-left:5px;
    padding-right:0px;
    padding-top:5px;
    padding-bottom:5px;
    z-index:99;
    overflow: hidden;
    }
    #nav_admin img{
    width:42px;
    text-decoration: none;
    position: relative;
    left: -105px;
    }
    ul .niveau1{
    width:330px;
    display: flex;
    flex-direction: column; /* => A utiliser quand le burger est affiché */
    /*flex-direction: row; /*=> A utiliser quand le burger n'est pas affiché */
    text-decoration: none;
    margin:auto;
    padding:2px;
    overflow: hidden;
    }
    ul.niveau2{
    }
    li.a123 a#NH11 .a_panier1, li.a123 a#NH21 .a_panier1, li.a123 a#NH31 .a_panier1, li.a123 a#NH41 .a_panier1, li.a123 a#NH51 .a_panier1 {
    font-size:16px;
    padding-top:5px;
    padding-bottom:5px;
    width: 330px;
    }
    li#ab123{
    width:100px;
    text-decoration:none;
    margin:auto;
    text-align:left;
    }
     #NH00{
    min-width:270px;
    width:270px;
    }
    li.a123{
    text-decoration:none;
    margin-left:5px;
    text-align:left;
    padding-top:15px;
    padding-bottom:15px;
    }
    li.b123{
    text-align:left;
    }
    #NH12,#NH13,#NH14,#NH15,#NH16,#NH17,#NH18,#NH22,#NH23,#NH24,#NH25,#NH26,#NH27,#NH28,#NH32,#NH33,#NH34,#NH35,#NH36,#NH37,#NH38,#NH42,#NH43,#NH44,#NH45,#NH46,#NH47,#NH48{
        float:left;
        margin-left:20px;
        font-size:12px;
        text-align:left;
    }
    a#NH50{
        display: block;
        z-index: 99;
        position: relative;
        left: -10px;
    }
}
</style>
<div id="burger">
  <a id="burger_a" href="#" onclick="affiche_tout();"><img id="burger_img" src="../publicimgs/menu-icone.svg"/> <span style="position:relative;top:-15px">Menu</span></a>
    <div id="nav_admin">
      <br>
      <ul class="niveau1">
        <li id="ab123"><a id="NH00" href="../accueil.html"><img id="img_nav_admin_sample" src="../publicimgs/accueil.png"/></a></li>
        <li class="a123"><a id="NH11" class="a_panier1" style="text-decoration:none" href="Questions-reponses">Sujets/Accueil</a></li>
        <li class="a123"><a id="NH21" class="a_panier1" style="text-decoration:none" href="se-connecter">Se Connecter</a></li>
        <li class="a123"><a id="NH31" class="a_panier1" style="text-decoration:none" href="se-deconnecter">Déconnexion</a></li>
        <li class="a123"><a id="NH41" class="a_panier1" style="text-decoration:none" href="creer-un-compte">Créer un Compte</a></li>
        <li class="a123"><a id="NH51" class="a_panier1" style="text-decoration:none" href="../factures">Factures</a></li>
        <!--<li class="a123">
            <div style="text-shadow:none;min-width:1000px;text-align:left;display:block" id="google_translate_element"></div>
            <script>
            function googleTranslateElementInit(){
             new google.translate.TranslateElement({
              pageLanguage: 'fr',
              layout: google.translate.TranslateElement.InlineLayout.SIMPLE
             }, 'google_translate_element');
            }
            </script>
            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </li> bug affichage-->
      </ul>
    </div>
</div>
<script>
  $(document).ready(function(){
  $( "body" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
  $( "#burger_a" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
  $( "#burger_img" ).css({ 'background': '<?php echo $bacColP;?>', 'color':'<?php echo $colP;?>'});
  $( "#nav_admin" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>','display':'none'});
  $( ".niveau1" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( "ul.niveau1" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( ".a123" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( "#ab123" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( "#niveau2" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( "#NH00" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
  $( "#NH50" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});
if($("#NH11")){$( "#NH11" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
if($("#NH21")){$( "#NH21" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
if($("#NH31")){$( "#NH31" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
if($("#NH41")){$( "#NH41" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
if($("#NH41")){$( "#NH41" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
if($("#NH51")){$( "#NH51" ).css({ 'background': '<?php echo $bacColMHB;?>', 'color':'<?php echo $colMHB;?>'});}
});
  function affiche_tout(){
    if($("#nav_admin")){
        if($( "#nav_admin" ).css('display') == 'none'){$( "#nav_admin" ).css( 'display', 'block');} 
        else{ $( "#nav_admin" ).css( 'display', 'none');}
    }
}
</script>