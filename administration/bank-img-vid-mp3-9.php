<div id="imgsbank">
  <form name="IMG" id="IMG">
<?php 
$i=0; $req67=$bdd->query('SELECT * FROM image');
while($donnees67=$req67->fetch()){
  $i++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="<?php echo '../publicimgs/'.$donnees67['nom'];?>"/><span><?php echo $donnees67['nom'];?></span>
   <input type="radio" name="img" id="img<?php echo $i;?>" value="<?php echo $donnees67['nom'];?>"/>
  </div>
<?php
}
?>
</form>
<script>
$(document).ready(function(){ 
$( "#imgsbank" ).css( 'display', 'none' );
$( "#imgseule" ).css( 'display', 'none' );
$( "#videosbank" ).css( 'display', 'none' );
$( "#musicbank" ).css( 'display', 'none' );
$("#voir").click(function() {
   $( "#imgsbank" ).css( 'display', 'block' );
   $( "#ALIGN" ).css( 'display', 'block' );
   $( "#flot" ).css( 'display', 'none' );});
$("#voir1").click(function() {
   $( "#imgsbank" ).css( 'display', 'block' );
   $( "#ALIGN" ).css( 'display', 'none' );
   $( "#flot" ).css( 'display', 'block' );});
$("#voir2").click(function() {
   $( "#videosbank" ).css( 'display', 'block' );
   });
$("#voir3").click(function() {
   $( "#musicbank" ).css( 'display', 'block' );
   });
$("#cacher").click(function() {
   $( "#imgsbank" ).css( 'display', 'none' )}
   );
$("#cacher1").click(function() {
   $( "#imgsbank" ).css( 'display', 'none' );
   });
$("#cacher2").click(function() {
   $( "#videosbank" ).css( 'display', 'none' )}
   );
$("#cacher3").click(function() {
   $( "#musicbank" ).css( 'display', 'none' )}
   );
});

var i=<?php echo $i;?>;
  image_name="";
  largeur_name="";
  align_name="";
  float_name="";
  VALEUR="";
  VALEUR1=""
  VALEUR3="";

function initElement()
{

  ok2();
  ok3();
  ok4();

  b="<img src=\"";
  c="publicimgs/";
  e=image_name;
  f="\"";
  g=" style=";
  h="\"";
  k="text-align:";
  l=align_name;
  o="\"";
  p=" class=";
  q="\"";
  r=largeur_name;
  s="\"";
  t="/>";
VALEUR=b+c+e+f+g+h+k+l+o+p+q+r+s+t;
VALEUR1="''";
VALEUR3="''";


  AddText(VALEUR1,VALEUR,VALEUR3);
}

function ok2()
{ for (var j=1; j<=i; j++){
    if (document.getElementById('img'+j).checked==1) {
    image_name = document.getElementById('img'+j).value;
    }
  }
}
function ok3(){
  for (var m=3; m<=12; m++){
    if (document.getElementById('large'+m).checked==1) {
    largeur_name = document.getElementById('large'+m).value;
    }
  }
}
function ok4(){
  for (var n=1; n<=3; n++){
    if (document.getElementById('align'+n).checked==1) {
    align_name = document.getElementById('align'+n).value;
    }
  }
}
function initElement1()
{
 
  ok21();
  ok31();
  ok41();

  b="<img src=\"";
  c="publicimgs/";
  e=image_name;
  f="\"";
  g=" style=";
  h="\"";
  l=float_name;
  o="\"";
  p=" class=";
  q="\"";
  r=largeur_name;
  s="\"";
  t="/>";
VALEUR=b+c+e+f+g+h+l+o+p+q+r+s+t;
VALEUR1="''";
VALEUR3="''";
  AddText(VALEUR1,VALEUR,VALEUR3);
}

function ok21()
{ for (var j=1; j<=i; j++){
    if (document.getElementById('img'+j).checked==1) {
    image_name = document.getElementById('img'+j).value;
    }
  }
}
function ok31(){
  for (var m=3; m<=12; m++){
    if (document.getElementById('large'+m).checked==1) {
    largeur_name = document.getElementById('large'+m).value;
    }
  }
}
function ok41(){
  for (var n=1; n<=2; n++){
    if (document.getElementById('flot'+n).checked==1) {
    float_name = document.getElementById('flot'+n).value;
    }
  }
}
function AddText(startTag,defaultText,endTag)
  {
   with(document.ch_form)
   {
      if (message.createTextRange)
      {
         var text;
         message.focus(message.caretPos);
         message.caretPos = document.selection.createRange().duplicate();
         if(message.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message.selectionStart || message.selectionStart == "0")
      {
            var startPos = message.selectionStart; //position du curseur au début de la sélection
            var endPos = message.selectionEnd; //position du curseur en fin de sélection
            var chaine = message.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message.focus();
      }
      else message.value += startTag+defaultText+endTag;
    }
  }
</script>
  <form name="LARGEUR" id="LARGEUR" method="post" >
    <p><label for="large">300px</label><input type="radio" name="large" id="large3" value="trois" checked/><label for="large">400px</label><input type="radio" name="large" id="large4" value="quatre"/><label for="large">500px</label><input type="radio" name="large" id="large5" value="cinq" checked/><label for="large">600px</label><input type="radio" name="large" id="large6" value="six"/><label for="large">700px</label><input type="radio" name="large" id="large7" value="sept"/><label for="large">800px</label><input type="radio" name="large" id="large8" value="huit"/><label for="large">900px</label><input type="radio" name="large" id="large9" value="neuf"/><label for="large">1000px</label><input type="radio" name="large" id="large10" value="dix"/><label for="large">1100px</label><input type="radio" name="large" id="large11" value="onze"/><label for="large">1200px</label><input type="radio" name="large" id="large12" value="douze"/></p>
  </form>
<form name="ALIGN" id="ALIGN">
     <p><label for="align">left</label><input type="radio" name="align" id="align1" value="left"/><label for="align">center</label><input type="radio" name="align" id="align2" value="center" checked/><label for="align">right</label><input type="radio" name="align" id="align3" value="right"/></p>
     <input type="button" onclick="initElement()" name="yes" id="yes" value="Valider"/>
</form>
<form name="flot" id="flot">
     <p><label for="flot">float left</label><input type="radio" name="flot" id="flot1" value="float:left" checked/><label for="align">float right</label><input type="radio" name="flot" id="flot2" value="float:right"/></p>
     <input type="button" onclick="initElement1()" name="yes" id="yes" value="Valider"/>
</form>
</div>

<div id="videosbank">
<form id="VID">
  <h3 style="margin:auto;text-align:center">Vidéos</h3>
  <?php 
  $z=0;
  $req66=$bdd->query('SELECT * FROM video');
  while($donnees66=$req66->fetch()){
    $z++;
?>
<div style="display:inline-block">
  <img style="width:100px;margin:auto;display:inline-block" src="../publicimgs/<?php echo $donnees66['image0'];?>"/>
  <input type="radio" name="vid" id="vid<?php echo $z;?>" value="<?php echo $donnees66['nom'];?>"/>
</div>
<?php
  }
  ?>
</form>
<p style="width:100%; border:solid 0.5px red;height:1px">&nbsp;</p>
<br><br>
<form id="IMGV">
  <h3 style="margin:auto;text-align:center">Image de présentation</h3>
<?php 
$zz=0; $req69=$bdd->query('SELECT * FROM image');
while($donnees69=$req69->fetch()){
  $zz++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="<?php echo '../publicimgs/'.$donnees69['nom'];?>"/>
   <input type="radio" name="imgv" id="imgv<?php echo $zz;?>" value="<?php echo $donnees69['nom'];?>"/>
  </div>
<?php
}
?>
</form>
<form name="LARGEURV" id="LARGEURV" method="post" >
    <p><label for="large">300px</label><input type="radio" name="large" id="largev3" value="trois" checked/><label for="large">400px</label><input type="radio" name="large" id="largev4" value="quatre"/><label for="large">500px</label><input type="radio" name="large" id="largev5" value="cinq" checked/><label for="large">600px</label><input type="radio" name="large" id="largev6" value="six"/><label for="large">700px</label><input type="radio" name="large" id="largev7" value="sept"/><label for="large">800px</label><input type="radio" name="large" id="largev8" value="huit"/><label for="large">900px</label><input type="radio" name="large" id="largev9" value="neuf"/><label for="large">1000px</label><input type="radio" name="large" id="largev10" value="dix"/><label for="large">1100px</label><input type="radio" name="large" id="largev11" value="onze"/><label for="large">1200px</label><input type="radio" name="large" id="largev12" value="douze"/></p>

    <p><input type="button" onclick="initElement3()" name="yes" id="yes" value="Valider"/></p>
</form>
<script>
  var z=<?php echo $z;?>;
  video_name="";
  largeur_name="";
  align_name="";
  float_name="";
  img_name="";
  VALEUR="";
  VALEUR1=""
  VALEUR3="";
var zz=<?php echo $zz;?>;
function initElement3()
{

  ok22();
  ok32();
  ok42();

  b="<video src=\"";
  c="publicimgs/";
  e=video_name;
  f="\"";
  g=" controls poster=";
  h="\"";
  k="publicimgs/";
  l=img_name;
  o="\"";
  p=" class=";
  q="\"";
  r=largeur_name;
  s="\"";
  t=" style=";
  u="\"text-align:center\""
  v="></video>";

VALEUR=b+c+e+f+g+h+k+l+o+p+q+r+s+t+u+v;
VALEUR1="''";
VALEUR3="''";

//('','<video src=&quot;publicimgs/video.mp4&quot; controls poster=&quot;publicimgs/imageassocie.jpg&quot; width=&quot;300&quot;></video>',''
  AddText(VALEUR1,VALEUR,VALEUR3);
}

function ok22()
{ for (var m=1; m<=z; m++){
    if (document.getElementById('vid'+m).checked==1) {
    video_name = document.getElementById('vid'+m).value;
    }
  }
}
function ok32(){
  for (var m=3; m<=12; m++){
    if (document.getElementById('largev'+m).checked==1) {
    largeur_name = document.getElementById('largev'+m).value;
    }
  }
}
function ok42(){
  for (var n=1; n<=zz; n++){
    if (document.getElementById('imgv'+n).checked==1) {
    img_name = document.getElementById('imgv'+n).value;
    }
  }
}
</script>
</div>
<div id="musicbank">
  <h3 style="margin:auto;text-align:center">Musiques MP3</h3>
<form id="music">
<?php 
$za=0; $req71=$bdd->query('SELECT * FROM music');
while($donnees71=$req71->fetch()){
  $za++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="../publicimgs/music.png"/>
    <span style="display:block; color:green"><?php echo $donnees71['nom'];?></span>
   <input type="radio" name="mp3" id="mp3<?php echo $za;?>" value="<?php echo $donnees71['nom'];?>"/>
  </div>
<?php
}
?><input type="button" onclick="initElement4()" name="yes" id="yes" value="Valider"/>
</form>
<script>
  var za=<?php echo $za;?>;
  music_name="";
  VALEUR="";
  VALEUR1=""
  VALEUR3="";
function initElement4()
{

  ok33();


  b="<audio src=\"";
  c="publicimgs/";
  e=music_name;
  f="\"";
  g=" controls width=\"300\"";
  h=" style="
  k="\"";
  l="margin:auto;text-align:center";
  o="\"";
  p="></audio>";

VALEUR=b+c+e+f+g+h+k+l+o+p;
VALEUR1="''";
VALEUR3="''";

//('','<video src=&quot;publicimgs/video.mp4&quot; controls poster=&quot;publicimgs/imageassocie.jpg&quot; width=&quot;300&quot;></video>',''
  AddText(VALEUR1,VALEUR,VALEUR3);
}

function ok33()
{ for (var mm=1; mm<=za; mm++){
    if (document.getElementById('mp3'+mm).checked==1) {
    music_name = document.getElementById('mp3'+mm).value;
    }
  }
}
// ('','<audio src=&quot;publicimgs/musique.mp3&quot; style="margin:auto;text-align:center" controls width=&quot;300&quot;></audio>','')
</script>
</div>