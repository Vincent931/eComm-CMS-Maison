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
?><br>
<input type="button" onclick="initElement()" name="yes" id="yes" value="Valider"/>
</form><br>
<script>
$(document).ready(function(){ 
$( "#imgsbank" ).css( 'display', 'none' );

  $("#voir").click(function() {
      $( "#imgsbank" ).css( 'display', 'block' );
  });

  $("#cacher").click(function() {
      $( "#imgsbank" ).css( 'display', 'none' );
  });
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
  
VALEUR=image_name;

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
function AddText(startTag,defaultText,endTag)
  {
   with(document.ch_form)
   {
      if (image.createTextRange)
      {
         var text;
         image.focus(image.caretPos);
         image.caretPos = document.selection.createRange().duplicate();
         if(image.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = image.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               //fin += ' ';
            }
            image.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            image.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (image.selectionStart || image.selectionStart == "0")
      {
            var startPos = image.selectionStart; //position du curseur au début de la sélection
            var endPos = image.selectionEnd; //position du curseur en fin de sélection
            var chaine = image.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                image.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                image.value = startChaine + defaultText + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            image.focus();
      }
      else image.value += startTag+defaultText+endTag;
    }
  }
</script>
</div>
