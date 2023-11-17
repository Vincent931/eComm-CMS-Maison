<head>
    <meta charset="utf-8"/>
    <link href="style.css" rel="stylesheet"/>
   <?php $icone="icone";
    $req55=$bdd->prepare('SELECT nom FROM image WHERE intitule=?');
      $req55->execute(array($icone));
      $donnees55=$req55->fetch();?>
      <link rel="shortcut icon" href="../publicimgs/<?php echo $donnees55['nom'];?>"/>
      <title>Boutique-Administration</title>
    <?php $req50=$bdd->query('SELECT css FROM css');
    $donnees50=$req50->fetch();
    $css=$donnees50['css'];?>
    <style type="text/css"><? echo $css;?></style>
   <?php $req45=$bdd->query('SELECT * FROM police');
  $donnees45=$req45->fetch();
  if(isset($donnees45['existson']) AND $donnees45['existson']=='oui'){
  echo "<style>@font-face {
    font-family: '".$donnees45['name']."'
    font-style: normal;
    font-weight: 400;
    src: local('".$donnees45['name']."'),
    url(".$donnees45['url'].") format('".$donnees45['format']."');
    }
  p,h1,h2,h3,h4,h5,h6,a,input,ol,ul,li,tr,td,th,label,nav,textarea,body,section,article,ul li a, ol li a, ul li ul li a, ol li ol li a{
  font-family : \"".$donnees45['name']."\", sans-serif;}
  </style>";
  }
  ?>
    <script language="JavaScript" type="text/javascript">

function AddText1(startTag1,defaultText1,endTag1)
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
<script language="JavaScript" type="text/javascript">

function AddText(startTag,defaultText,endTag)
{
   with(document.ch_form_un)
   {
      if (message1.createTextRange)
      {
         var text;
         message1.focus(message.caretPos);
         message1.caretPos = document.selection.createRange().duplicate();
         if(message1.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message1.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message1.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message1.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message1.selectionStart || message1.selectionStart == "0")
      {
            var startPos = message1.selectionStart; //position du curseur au début de la sélection
            var endPos = message1.selectionEnd; //position du curseur en fin de sélection
            var chaine = message1.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message1.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message1.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message1.focus();
      }
      else message1.value += startTag+defaultText+endTag;
   }
}
</script>
<?php if (isset($_GET['position'])){
echo '<script type="text/javascript">
      function Scroller() {
      var phpScroll2 = '.$_GET['position'].'; 
        window.scrollTo(0,phpScroll2);
 }
</script>';
}
?>

<script type="text/javascript">
function pos(){
var trs = document.documentElement.scrollTop;
// Stockage de la variable trs dans le champs caché portant le même nom
document.getElementById('position').value = trs;
}

</script>
</head>