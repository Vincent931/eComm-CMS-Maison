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
<?php $req123=$bdd1->query('SELECT * FROM societe');
$donnees123=$req123->fetch();
?>
<script>
$(document).ready(function(){ 
$( "#imgsbank" ).css( 'display', 'none' );
$("#voir").click(function() {
   $( "#imgsbank" ).css( 'display', 'block' );
   });
$("#cacher").click(function() {
   $( "#imgsbank" ).css( 'display', 'none' );}
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
var url_debut="<?php echo $donnees123['url']?>"
function initElement()
{

  ok2();
  ok3();
  ok4();

  b="<img src=\"";
  c=url_debut;
  d="/publicimgs/";
  e=image_name;
  f="\"";
  g=" style=";
  h="\"";
  k="text-align:";
  l=align_name;
  o=";width:"
  p=largeur_name; 
  q="\"";
  r="/>";
VALEUR=b+c+d+e+f+g+h+k+l+o+p+q+r;
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

function AddText(startTag1,defaultText1,endTag1)
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
            message.caretPos.text = startTag1 + sel + endTag1 + fin;
         }
         else
            message.caretPos.text = startTag1+defaultText1+endTag1;
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
            if (defaultText1=="")
            {
                //startPos==endPos
                message.value = startChaine + startTag1 + middleChaine + endTag1 + endChaine;
            }
            else
            {
                message.value = startChaine + defaultText1 + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message.focus();
      }
      else message.value += startTag1+defaultText1+endTag1;
   }
}
</script>
  <form name="LARGEUR" id="LARGEUR" method="post" >
    <p><label for="large">300px</label><input type="radio" name="large" id="large3" value="300px" checked/><label for="large">400px</label><input type="radio" name="large" id="large4" value="400px"/><label for="large">500px</label><input type="radio" name="large" id="large5" value="500px" checked/><label for="large">600px</label><input type="radio" name="large" id="large6" value="600px"/><label for="large">700px</label><input type="radio" name="large" id="large7" value="700px"/><label for="large">800px</label><input type="radio" name="large" id="large8" value="800px"/><label for="large">900px</label><input type="radio" name="large" id="large9" value="900px"/><label for="large">1000px</label><input type="radio" name="large" id="large10" value="1000px"/><label for="large">1100px</label><input type="radio" name="large" id="large11" value="1100px"/><label for="large">1200px</label><input type="radio" name="large" id="large12" value="1200px"/></p>
  </form>
<form name="ALIGN" id="ALIGN">
     <p><label for="align">left</label><input type="radio" name="align" id="align1" value="left"/><label for="align">center</label><input type="radio" name="align" id="align2" value="center" checked/><label for="align">right</label><input type="radio" name="align" id="align3" value="right"/></p>
     <input type="button" onclick="initElement()" name="yes" id="yes" value="Valider"/>
</form>
</div>


