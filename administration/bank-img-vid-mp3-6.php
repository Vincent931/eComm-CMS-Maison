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
$("#voir").click(function() {
   $( "#imgsbank" ).css( 'display', 'block' );});
$("#cacher").click(function() {
   $( "#imgsbank" ).css( 'display', 'none' );});

});

var i=<?php echo $i;?>;
  image_name="";
  VALEUR1=""
  VALEUR3="";

function initElement()
{

ok2();


VALEUR1="''";
VALEUR3="";

AddText(VALEUR1,image_name,VALEUR3);
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
      if (cle_image.createTextRange)
      {
         var text;
         cle_image.focus(cle_image.caretPos);
         cle_image.caretPos = document.selection.createRange().duplicate();
         if(cle_image.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = cle_image.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
            }
            cle_image.caretPos.text = startTag + sel;// + endTag;
         }
         else
            cle_image.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (cle_image.selectionStart || cle_image.selectionStart == "0")
      {
            var startPos = cle_image.selectionStart; //position du curseur au début de la sélection
            var endPos = cle_image.selectionEnd; //position du curseur en fin de sélection
            var chaine = cle_image.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                cle_image.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                cle_image.value = startChaine + defaultText + endChaine;
            }
            //cle_image.selectionStart = startPos + defaultText.length;
            //cle_image.selectionEnd = endPos + defaultText.length;
            cle_image.focus();
      }
      else cle_image.value += startTag+defaultText+endTag;
    }
  }
</script>
<input type="button" onclick="initElement()" name="yes" id="yes" value="Valider"/>
</div>