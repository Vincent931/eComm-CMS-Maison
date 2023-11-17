<?php session_start();

require 'texte1.php';

$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();

$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$ste=$req26->fetch();
require 'boutique0.php';
$req25=$bdd->query('SELECT * FROM pdf');
$pdf=$req25->fetch();
require 'blog2.php';

$IP_blacklist='non';

$req2=$bdd2->query('SELECT * FROM blacklist');
while($donnees2=$req2->fetch()){
   if($donnees2['ip']==$_SERVER['REMOTE_ADDR']){$IP_blacklist='oui';}
}
if($IP_blacklist=='oui'){ header("Location:error-comment.php");}
?>
<!DOCTYPE html>
<html>
  <html id="bloc_page">
 <?php require 'head.php';?>
<style>
   #d_e{
      display: flex;
      flex-direction: column;
      width: 800px;
      margin-left:auto;
      margin-right: auto;
      margin-top: 10px;
      margin-bottom: 10px;
   }
   #cont{
      display:flex;
      flex-direction:column;
   }
   #grille{
      width:50%;
      text-align:center;
      margin:auto;
      display:block;
   }
   #ctirage{
      display:inline-block;
   }
   #tirage{
      margin:auto;
      text-align:center;
      height:220px;
      width:50%;
   }
   #bon{
      font:72pt monospace;
      margin:30px auto;
      text-align:center;
      visibility:hidden;
      background-color:#48C;
      color:#FFF;
      width:120px;
      height:120px;
      border-radius:100px;
      line-height:120px;
   }
   .bouton{
      width:26px;
      height:26px;
      text-align:center;
      font:11pt monospace;
      border:solid 1px #48C;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      margin:3px;
      cursor:pointer;
      transition:all 0.3s ease;
   }
   .bouton:hover{
      background-color:#48C;
      color:#FFF;
      transform:scale(1.4);
   }
   .zbouton{
      width:26px;
      height:26px;
      text-align:center;
      font:11pt monospace;
      border:solid 1px #48C;
      background-color:#F8F8F8;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      margin:3px;
      color:#48C;
   }
   .nbouton{
      width:26px;
      height:26px;
      text-align:center;
      font:11pt monospace;
      border:solid 1px #48C;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      margin:3px;
      color:#000;
   }
   button{
      border:none;
      cursor:pointer;
      display:block;
      width:300px;
      background-color:#48C;
      padding:10px;
      font-size:13pt;
      color:#FFF;
      text-decoration:none;
      font-family:arial,sans-serif;
      margin:10px auto;
      margin-bottom:10px;
   }
   button:hover{
      opacity:0.8;
   }
   #rgts{
      width:600px;
   }
   @-moz-document url-prefix(){
}
   @media all and (min-width: 120px) and (max-width: 1024px){
   #rgts{
         width:330px;
      }
   #d_e{
      display: flex;
      flex-direction: column;
      width: 330px;
      margin-left:0;
      margin-right: 0;
      margin-top: 10px;
      margin-bottom: 10px;
      position: relative;
      top: -200px;
   }
   #cont{
      display:flex;
      flex-direction:column;
   }
   #grille{
      width:250px;
      text-align:center;
      margin:auto;
   }
   #ctirage{
      display:inline-block;
   }
   #tirage{
      margin:auto;
      width:330px;
   }
   #bon{
   }
   .bouton{
   }
   .bouton:hover{
   }
   .zbouton{
   }
   .nbouton{
   }
   button{
   }
   @-moz-document url-prefix(){
}
}
</style>
   <title>Jeux concours, gagnez des réductions, vincent-dev-web</title>
   <meta name="description" content="Vous remportez dees réductions supplémentaires sur votre intégration web vincent-dev-web"/>
</head>
      <script>
         function init(btn){
            btn.style.display="none";
            i=1;
            nbr=0;
            choix=new Array();
            creerGrille();
         }
         function creerGrille(){
            t=setTimeout("creerGrille()",50);
            bouton=document.createElement("div");
            bouton.className="bouton";
            bouton.innerHTML=i;
            bouton.setAttribute("id",i);
            bouton.onclick=function(){
               ajouter(this);
            }
            document.getElementById("grille").appendChild(bouton);
            if(i%7==0){
               br=document.createElement("br");
               document.getElementById("grille").appendChild(br);
            }
            i+=1;
            if(i>49)
               clearTimeout(t);
         }
         
         function ajouter(ob){
            if(nbr<6){
               ob.style.visibility="hidden";
               nbouton=document.createElement("div");
               nbouton.className="nbouton";
               nbouton.setAttribute("id","ch"+nbr);
               nbouton.innerHTML=ob.textContent;
               document.getElementById("choix").appendChild(nbouton);
               choix[nbr]=ob.firstChild.nodeValue;
               nbr+=1;
               if(nbr==6)
                  ztirage();
            }
         }
         j=0;
         function ztirage(){
            setTimeout("ztirage()",100);
            if(j<6){
               zbouton=document.createElement("div");
               zbouton.className="zbouton";
               zbouton.innerHTML=0;
               zbouton.setAttribute("id","res"+j);
               document.getElementById("res").appendChild(zbouton);
               j+=1;
               if(j==6){
                  document.getElementById("bon").style.visibility="visible";
                  tirage();
               }
            }
         }
         index=0;
         rep=0;
         tab=new Array();
         itr=50;
         function tirage(){
            tx=setTimeout("tirage()",40);
            rep+=1;
            if(rep<itr){
               for(k=index+1;k<6;k++)
                  document.getElementById("res"+k).innerHTML=Math.ceil(Math.random()*49);

               v=Math.ceil(Math.random()*49);
               document.getElementById("res"+index).innerHTML=v;
               if(rep==itr-1){
                  if(tab.indexOf(v)==-1){
                     tab[index]=v;
                     for(k=0;k<6;k++){
                        if(document.getElementById("ch"+k).firstChild.data==tab[index]){
                           document.getElementById("ch"+k).style.backgroundColor="#48C";

 

                           document.getElementById("res"+index).style.backgroundColor="#48C";

 

                           document.getElementById("ch"+k).style.color="#FFF";
                           document.getElementById("res"+index).style.color="#FFF";
                           document.getElementById("bon").innerHTML=parseInt(document.getElementById("bon").textContent)+1;
                        }
                     }
                  }
                  else
                     rep=itr-2;
               }
            }
            else{
               rep=0;
               index+=1;
               if(index==6){
                  clearTimeout(tx);
                  return false;
               }
            }
         }
      </script>
    <body>
<div>
<?php require 'header.php'; ?>
<br><br><br><br>
<div id="d_e">  
<h1 id="h1_comment1">Jeux-Concours LOTO - <?php echo $ste['nom'];?></h1><br><br>
         <div id="boutons_connect1">
            <img src="../publicimgs/personne_icone.png" style="width:45px" id="bt_img">
         </div>
<?php $dater=date('Y-m-d');
if(isset($_SESSION['DATE']) AND !empty([$_SESSION['DATE']])){
      if($_SESSION['DATE']!=$dater OR (isset($_SESSION['count']) AND $_SESSION['count']<=3)){
         $_SESSION['count']++;
         $_SESSION['DATE']=date('Y-m-d');
      }
     }else{ $_SESSION['DATE']=$dater;
     $_SESSION['count']=1;}
?>
   <?php if($_SESSION['count']<=3){
      ?>
      <button onClick="init(this)">Tentez sa chance</button>
      <div id="cont">
         <div id="grille"></div>
         <div style="height:30px"></div>
         <h2 style="width:300px;color:#50F114;margin:auto;text-align:center">Les 6 numéros ...</h2>
         <div id="tirage">
           
            <div id="ctirage">
               <div id="choix"></div>
               <div id="res"></div>
               <div id="bon">0</div>
            </div>
         </div>
         <div id="rgts" style="margin:auto;text-align:center">Si vous obtenez 4 numéros ou plus, capturer l'écran comprenant l'url et envoyer la accompagné de votre adresse email et votre nom.<span style="color:blue"> Merci.</span></div>
         <p style="height:20px">&nbsp;</p>
         <p style="margin:auto;text-align:center"><a style="margin:auto;text-align:center" href="email.php" class="a_99_subm">Envoyer par mail</a></p>
         <p style="height:20px">&nbsp;</p>
         <p style="margin:auto;text-align:center"><a style="margin:auto;text-align:center" href="" class="a_99_subm">Rejouer</a></p>
         <p style="height:20px">&nbsp;</p>
         <p style="margin:auto;text-align:center"><a style="margin:auto;text-align:center" href="Questions-Reponses" class="a_99_subm">Retour</a></p>
      </div>
   <?php } else {
      ?>
      <div style="height:150px">&nbsp;</div>
         <h3 style="margin:auto;color:red;text-align:center">Epuisé, retentez votre chance demain si vous voulez</h3><br>
         <p style="margin:auto;text-align:center"><a style="margin:auto;text-align:center" href="Questions-Reponses" class="a_99_subm">Retour</a></p>
         <br><br>
   
<?php } ?>
    <br><br><br><br><br>

      </div>
   </div>
   <!-- Javascript -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery.easing.min.js"></script>
        <script src="../assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="../assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="../assets/js/custom.js"></script>
   </body>
</html>