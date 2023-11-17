<div class="imgsbank">
  <form name="IMG" id="IMG">
<?php 
$i=0; $req67=$bdd->query('SELECT * FROM image');
while($donnees67=$req67->fetch()){
  $i++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="<?php echo '../publicimgs/'.$donnees67['nom'];?>"/><span><?php echo $donnees67['nom'];?></span>
   <input type="radio" name="img" class="img<?php echo $i;?>" value="<?php echo $donnees67['nom'];?>"/>
  </div>
<?php
}
?>
</form>
<script>
$(document).ready(function(){ 
$( ".imgsbank" ).css( 'display', 'none' );
$( ".imgseule" ).css( 'display', 'none' );
$( ".videosbank" ).css( 'display', 'none' );
$( ".musicbank" ).css( 'display', 'none' );
$(".voir").click(function() {
   $( ".imgsbank" ).css( 'display', 'block' );
   $( ".ALIGN" ).css( 'display', 'block' );
   $( ".flot" ).css( 'display', 'none' );});
$(".voir1").click(function() {
   $( ".imgsbank" ).css( 'display', 'block' );
   $( ".ALIGN" ).css( 'display', 'none' );
   $( ".flot" ).css( 'display', 'block' );});
$(".voir2").click(function() {
   $( ".videosbank" ).css( 'display', 'block' );
   });
$(".voir3").click(function() {
   $( ".musicbank" ).css( 'display', 'block' );
   });
$(".cacher").click(function() {
   $( ".imgsbank" ).css( 'display', 'none' );}
   );
$(".cacher1").click(function() {
   $( ".imgsbank" ).css( 'display', 'none' );
   });
$(".cacher2").click(function() {
   $( ".videosbank" ).css( 'display', 'none' );}
   );
$(".cacher3").click(function() {
   $( ".musicbank" ).css( 'display', 'none' );}
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
alert($('.img1').value);
  ok2();
  ok3();
  ok4();

  b="<img src=\"";
  c="../publicimgs/";
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
    if (document.getElementByClassName('img'+j).checked==1) {
    image_name = document.getElementByClassName('img'+j).value;
    }
  }
}
function ok3(){
  for (var m=3; m<=12; m++){
    if (document.getElementByClassName('large'+m).checked==1) {
    largeur_name = document.getElementByClassName('large'+m).value;
    }
  }
}
function ok4(){
  for (var n=1; n<=3; n++){
    if (document.getElementByClassName('align'+n).checked==1) {
    align_name = document.getElementByClassName('align'+n).value;
    }
  }
}
function initElement1()
{
 
  ok21();
  ok31();
  ok41();

  b="<img src=\"";
  c="../publicimgs/";
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
    if (document.getElementByClassName('img'+j).checked==1) {
    image_name = document.getElementByClassName('img'+j).value;
    }
  }
}
function ok31(){
  for (var m=3; m<=12; m++){
    if (document.getElementByClassName('large'+m).checked==1) {
    largeur_name = document.getElementByClassName('large'+m).value;
    }
  }
}
function ok41(){
  for (var n=1; n<=2; n++){
    if (document.getElementByClassName('flot'+n).checked==1) {
    float_name = document.getElementByClassName('flot'+n).value;
    }
  }
}

</script>
  <form name="LARGEUR" class="LARGEUR" method="post" >
    <p><label for="large">300px</label><input type="radio" name="large" class="large3" value="trois" checked/><label for="large">400px</label><input type="radio" name="large" class="large4" value="quatre"/><label for="large">500px</label><input type="radio" name="large" class="large5" value="cinq" checked/><label for="large">600px</label><input type="radio" name="large" class="large6" value="six"/><label for="large">700px</label><input type="radio" name="large" class="large7" value="sept"/><label for="large">800px</label><input type="radio" name="large" class="large8" value="huit"/><label for="large">900px</label><input type="radio" name="large" class="large9" value="neuf"/><label for="large">1000px</label><input type="radio" name="large" class="large10" value="dix"/><label for="large">1100px</label><input type="radio" name="large" class="large11" value="onze"/><label for="large">1200px</label><input type="radio" name="large" class="large12" value="douze"/></p>
  </form>
<form name="ALIGN" class="ALIGN">
     <p><label for="align">left</label><input type="radio" name="align" class="align1" value="left"/><label for="align">center</label><input type="radio" name="align" class="align2" value="center" checked/><label for="align">right</label><input type="radio" name="align" class="align3" value="right"/></p>
     <input type="button" onclick="initElement()" name="yes" id="yes" value="Valider"/>
</form>
<form name="flot" class="flot">
     <p><label for="flot">float left</label><input type="radio" name="flot" class="flot1" value="float:left" checked/><label for="align">float right</label><input type="radio" name="flot" class="flot2" value="float:right"/></p>
     <input type="button" onclick="initElement1()" name="yes" id="yes" value="Valider"/>
</form>
</div>

<div class="videosbank">
<form class="VID">
  <h3 style="margin:auto;text-align:center">Vidéos</h3>
  <?php 
  $z=0;
  $req66=$bdd->query('SELECT * FROM video');
  while($donnees66=$req66->fetch()){
    $z++;
?>
<div style="display:inline-block">
  <img style="width:100px;margin:auto;display:inline-block" src="../publicimgs/<?php echo $donnees66['image0'];?>"/>
  <input type="radio" name="vid" class="vid<?php echo $z;?>" value="<?php echo $donnees66['nom'];?>"/>
</div>
<?php
  }
  ?>
</form>
<p style="width:100%; border:solid 0.5px red;height:1px">&nbsp;</p>
<br><br>
<form class="IMGV">
  <h3 style="margin:auto;text-align:center">Image de présentation</h3>
<?php 
$zz=0; $req69=$bdd->query('SELECT * FROM image');
while($donnees69=$req69->fetch()){
  $zz++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="<?php echo '../publicimgs/'.$donnees69['nom'];?>"/>
   <input type="radio" name="imgv" class="imgv<?php echo $zz;?>" value="<?php echo $donnees69['nom'];?>"/>
  </div>
<?php
}
?>
</form>
<form name="LARGEURV" class="LARGEURV" method="post" >
    <p><label for="large">300px</label><input type="radio" name="large" class="largev3" value="trois" checked/><label for="large">400px</label><input type="radio" name="large" class="largev4" value="quatre"/><label for="large">500px</label><input type="radio" name="large" class="largev5" value="cinq" checked/><label for="large">600px</label><input type="radio" name="large" class="largev6" value="six"/><label for="large">700px</label><input type="radio" name="large" class="largev7" value="sept"/><label for="large">800px</label><input type="radio" name="large" class="largev8" value="huit"/><label for="large">900px</label><input type="radio" name="large" class="largev9" value="neuf"/><label for="large">1000px</label><input type="radio" name="large" class="largev10" value="dix"/><label for="large">1100px</label><input type="radio" name="large" class="largev11" value="onze"/><label for="large">1200px</label><input type="radio" name="large" class="largev12" value="douze"/></p>

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
  c="../publicimgs/";
  e=video_name;
  f="\"";
  g=" controls poster=";
  h="\"";
  k="../publicimgs/";
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
    if (document.getElementByClassName('vid'+m).checked==1) {
    video_name = document.getElementByClassName('vid'+m).value;
    }
  }
}
function ok32(){
  for (var m=3; m<=12; m++){
    if (document.getElementByClassName('largev'+m).checked==1) {
    largeur_name = document.getElementByClassName('largev'+m).value;
    }
  }
}
function ok42(){
  for (var n=1; n<=zz; n++){
    if (document.getElementByClassName('imgv'+n).checked==1) {
    img_name = document.getElementByClassName('imgv'+n).value;
    }
  }
}
</script>
</div>
<div class="musicbank">
  <h3 style="margin:auto;text-align:center">Musiques MP3</h3>
<form class="music">
<?php 
$za=0; $req71=$bdd->query('SELECT * FROM music');
while($donnees71=$req71->fetch()){
  $za++;
?>
  <div style="display:inline-block"><img style="width:100px;margin:auto;display:inline-block" src="../publicimgs/music.png"/>
    <span style="display:block; color:green"><?php echo $donnees71['nom'];?></span>
   <input type="radio" name="mp3" Class="mp3<?php echo $za;?>" value="<?php echo $donnees71['nom'];?>"/>
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
  c="../publicimgs/";
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
    if (document.getElementByClassName('mp3'+mm).checked==1) {
    music_name = document.getElementByClassName('mp3'+mm).value;
    }
  }
}
// ('','<audio src=&quot;publicimgs/musique.mp3&quot; style="margin:auto;text-align:center" controls width=&quot;300&quot;></audio>','')
</script>
</div>