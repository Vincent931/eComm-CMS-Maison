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
//ne pas afficher bloc image au chargement
$( "#imgsbank" ).css( 'display', 'none' );
//ne pas afficher bloc video au chargement
$( "#vidsbank" ).css( 'display', 'none' );
//cacher bloc image
$("#cacher").click(function() {
   $( "#imgsbank" ).css( 'display', 'none' );
});
//cacher bloc video
$("#cacher1").click(function() {
   $( "#vidsbank" ).css( 'display', 'none' );
});
//ne rien afficher
//3 blocs (image-video youtube-video)
//1
$("#vue_image").css( 'display', 'none' );
//2
$( "#vue_video_you" ).css( 'display', 'none' );
//3
$("#vue_video").css( 'display', 'none' );

//clic sur image
$("#imgsrc").click(function() {       
//1
$("#vue_image").css( 'display', 'block' );
//2
$( "#vue_video_you" ).css( 'display', 'none' );
//3
$("#vue_video").css( 'display', 'none' );
//checked
$("#imgsrc1").prop("checked",true);
//voir bibliotheque appear
$( "#imgsbank" ).css( 'display', 'block' );
//bloc video disappear
$( "#vidsbank" ).css( 'display', 'none' );
})

//clic sur video youtube
$("#video_you").click(function() {
//1
$("#vue_image").css( 'display', 'none' );
//2
$( "#vue_video_you" ).css( 'display', 'block' );
//3
$("#vue_video").css( 'display', 'none' );
//checked
$("#video_you1").prop("checked",true);
//bloc image disappear
$( "#imgsbank" ).css( 'display', 'none' );
//bloc video disappear
$( "#vidsbank" ).css( 'display', 'none' );
})

//clic sur video
$("#videosrc").click(function() {      
//1
$("#vue_image").css( 'display', 'none' );
//2
$( "#vue_video_you" ).css( 'display', 'none' );
//3
$("#vue_video").css( 'display', 'block' );
//checked
$("#video_on1").prop("checked",true);
//bloc image disappear
$( "#imgsbank" ).css( 'display', 'none' );
//bloc video appear
$( "#vidsbank" ).css( 'display', 'block' );
})
//if p>0;
if(p>0){
    $("#imgsrc1").prop("checked",true);
}
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
            var endPos = cle_image.selectionEnd-1; //position du curseur en fin de sélection
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
<br>
<input type="button" onclick="initElement()" name="yes" id="yes" value="Ajouter Image"/>
</div>
<div id="vidsbank">
  <form name="VID" id="VID">
<?php 
$j=0; $req77=$bdd->query('SELECT * FROM video');
while($donnees77=$req77->fetch()){
  $j++;
?>
<p>Nom de la vidéo : <?php echo $donnees77['nom'];?>
<video src="../publicimgs/<?php echo $donnees77['nom'];?>" controls poster="<?php echo '../publicimgs/'.$donnees77['image0'];?>" width="300"></video>&nbsp;&nbsp;<input type="radio" name="vid" id="vid<?php echo $j;?>" value="<?php echo $donnees77['nom'];?>"/></p>
<br>
<?php
}
?>
<script>
//video ajout
var j=<?php echo $j;?>;
  image_name1="";
  VALEUR11=""
  VALEUR31="";

function initElement1()
{

ok21();


VALEUR11="''";
VALEUR31="";

AddText1(VALEUR11,image_name1,VALEUR31);
}

function ok21()
{ for (var z=1; z<=j; z++){
    if (document.getElementById('vid'+z).checked==1) {
    image_name1 = document.getElementById('vid'+z).value;
    }
  }
}

function AddText1(startTag,defaultText,endTag)
  {
    with(document.ch_form)
   {
      if (cle_vid.createTextRange)
      {
         var text;
         cle_vid.focus(cle_vid.caretPos);
         cle_vid.caretPos = document.selection.createRange().duplicate();
         if(cle_vid.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = cle_vid.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
            }
            cle_vid.caretPos.text = startTag + sel;// + endTag;
         }
         else
            cle_vid.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (cle_vid.selectionStart || cle_vid.selectionStart == "0")
      {
            var startPos = cle_vid.selectionStart; //position du curseur au début de la sélection
            var endPos = cle_vid.selectionEnd-1; //position du curseur en fin de sélection
            var chaine = cle_vid.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                cle_vid.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                cle_vid.value = startChaine + defaultText + endChaine;
            }
            //cle_vid.selectionStart = startPos + defaultText.length;
            //cle_vid.selectionEnd = endPos + defaultText.length;
            cle_vid.focus();
      }
      else cle_vid.value += startTag+defaultText+endTag;
    }
  }
</script>
</form>
<input type="button" onclick="initElement1()" name="yes" id="yes" value="Ajouter Vidéo"/>
</div>