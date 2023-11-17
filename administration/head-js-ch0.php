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


function AddText(startTag,defaultText,endTag)
{
   with(document.ch_form1)
   {
      if (message1.createTextRange)
      {
         var text;
         message1.focus(message1.caretPos);
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
   with(document.ch_form2)
   {
      if (message2.createTextRange)
      {
         var text;
         message2.focus(message2.caretPos);
         message2.caretPos = document.selection.createRange().duplicate();
         if(message2.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message2.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message2.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message2.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message2.selectionStart || message2.selectionStart == "0")
      {
            var startPos = message2.selectionStart; //position du curseur au début de la sélection
            var endPos = message2.selectionEnd; //position du curseur en fin de sélection
            var chaine = message2.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message2.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message2.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message2.focus();
      }
      else message2.value += startTag+defaultText+endTag;
   }
   with(document.ch_form3)
   {
      if (message3.createTextRange)
      {
         var text;
         message3.focus(message3.caretPos);
         message3.caretPos = document.selection.createRange().duplicate();
         if(message3.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message3.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message3.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message3.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message3.selectionStart || message3.selectionStart == "0")
      {
            var startPos = message3.selectionStart; //position du curseur au début de la sélection
            var endPos = message3.selectionEnd; //position du curseur en fin de sélection
            var chaine = message3.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message3.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message3.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message3.focus();
      }
      else message3.value += startTag+defaultText+endTag;
   }
   with(document.ch_form4)
   {
      if (message.createTextRange)
      {
         var text;
         message4.focus(message4.caretPos);
         message4.caretPos = document.selection.createRange().duplicate();
         if(message4.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message4.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message4.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message4.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message4.selectionStart || message4.selectionStart == "0")
      {
            var startPos = message4.selectionStart; //position du curseur au début de la sélection
            var endPos = message4.selectionEnd; //position du curseur en fin de sélection
            var chaine = message4.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message4.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message4.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message4.focus();
      }
      else message4.value += startTag+defaultText+endTag;
   }
   with(document.ch_form5)
   {
      if (message.createTextRange)
      {
         var text;
         message5.focus(message5.caretPos);
         message5.caretPos = document.selection.createRange().duplicate();
         if(message5.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message5.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message5.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message5.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message5.selectionStart || message5.selectionStart == "0")
      {
            var startPos = message5.selectionStart; //position du curseur au début de la sélection
            var endPos = message5.selectionEnd; //position du curseur en fin de sélection
            var chaine = message5.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message5.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message5.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message5.focus();
      }
      else message5.value += startTag+defaultText+endTag;
   }
   with(document.ch_form6)
   {
      if (message6.createTextRange)
      {
         var text;
         message6.focus(message6.caretPos);
         message6.caretPos = document.selection.createRange().duplicate();
         if(message6.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message6.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message6.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message6.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message6.selectionStart || message6.selectionStart == "0")
      {
            var startPos = message6.selectionStart; //position du curseur au début de la sélection
            var endPos = message6.selectionEnd; //position du curseur en fin de sélection
            var chaine = message6.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message6.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message6.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message6.focus();
      }
      else message6.value += startTag+defaultText+endTag;
   }
   with(document.ch_form7)
   {
      if (message7.createTextRange)
      {
         var text;
         message7.focus(message7.caretPos);
         message7.caretPos = document.selection.createRange().duplicate();
         if(message7.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message7.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message7.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message7.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message7.selectionStart || message7.selectionStart == "0")
      {
            var startPos = message7.selectionStart; //position du curseur au début de la sélection
            var endPos = message7.selectionEnd; //position du curseur en fin de sélection
            var chaine = message7.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message7.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message7.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message7.focus();
      }
      else message7.value += startTag+defaultText+endTag;
   }
   with(document.ch_form8)
   {
      if (message8.createTextRange)
      {
         var text;
         message8.focus(message8.caretPos);
         message8.caretPos = document.selection.createRange().duplicate();
         if(message8.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message8.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message8.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message8.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message8.selectionStart || message8.selectionStart == "0")
      {
            var startPos = message8.selectionStart; //position du curseur au début de la sélection
            var endPos = message8.selectionEnd; //position du curseur en fin de sélection
            var chaine = message8.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message8.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message8.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message8.focus();
      }
      else message8.value += startTag+defaultText+endTag;
   }
   with(document.ch_form9)
   {
      if (message9.createTextRange)
      {
         var text;
         message9.focus(message9.caretPos);
         message9.caretPos = document.selection.createRange().duplicate();
         if(message9.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message9.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message9.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message9.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message9.selectionStart || message9.selectionStart == "0")
      {
            var startPos = message9.selectionStart; //position du curseur au début de la sélection
            var endPos = message9.selectionEnd; //position du curseur en fin de sélection
            var chaine = message9.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message9.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message9.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message9.focus();
      }
      else message9.value += startTag+defaultText+endTag;
   }
   with(document.ch_form10)
   {
      if (message10.createTextRange)
      {
         var text;
         message10.focus(message10.caretPos);
         message10.caretPos = document.selection.createRange().duplicate();
         if(message10.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message10.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message10.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message10.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message10.selectionStart || message10.selectionStart == "0")
      {
            var startPos = message10.selectionStart; //position du curseur au début de la sélection
            var endPos = message10.selectionEnd; //position du curseur en fin de sélection
            var chaine = message10.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message10.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message10.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message10.focus();
      }
      else message10.value += startTag+defaultText+endTag;
   }
   with(document.ch_form11)
   {
      if (message11.createTextRange)
      {
         var text;
         message11.focus(message11.caretPos);
         message11.caretPos = document.selection.createRange().duplicate();
         if(message11.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message11.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message11.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message11.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message11.selectionStart || message11.selectionStart == "0")
      {
            var startPos = message11.selectionStart; //position du curseur au début de la sélection
            var endPos = message11.selectionEnd; //position du curseur en fin de sélection
            var chaine = message11.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message11.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message11.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message11.focus();
      }
      else message11.value += startTag+defaultText+endTag;
   }
   with(document.ch_form12)
   {
      if (message12.createTextRange)
      {
         var text;
         message12.focus(message12.caretPos);
         message12.caretPos = document.selection.createRange().duplicate();
         if(message12.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message12.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message12.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message12.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message12.selectionStart || message12.selectionStart == "0")
      {
            var startPos = message12.selectionStart; //position du curseur au début de la sélection
            var endPos = message12.selectionEnd; //position du curseur en fin de sélection
            var chaine = message12.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message12.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message12.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message12.focus();
      }
      else message12.value += startTag+defaultText+endTag;
   }
   with(document.ch_form13)
   {
      if (message13.createTextRange)
      {
         var text;
         message13.focus(message13.caretPos);
         message13.caretPos = document.selection.createRange().duplicate();
         if(message13.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message13.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message13.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message13.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message13.selectionStart || message13.selectionStart == "0")
      {
            var startPos = message13.selectionStart; //position du curseur au début de la sélection
            var endPos = message13.selectionEnd; //position du curseur en fin de sélection
            var chaine = message13.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message13.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message13.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message13.focus();
      }
      else message13.value += startTag+defaultText+endTag;
   }
   with(document.ch_form14)
   {
      if (message14.createTextRange)
      {
         var text;
         message14.focus(message14.caretPos);
         message14.caretPos = document.selection.createRange().duplicate();
         if(message14.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message14.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message14.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message14.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message14.selectionStart || message14.selectionStart == "0")
      {
            var startPos = message14.selectionStart; //position du curseur au début de la sélection
            var endPos = message14.selectionEnd; //position du curseur en fin de sélection
            var chaine = message14.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message14.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message14.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message14.focus();
      }
      else message14.value += startTag+defaultText+endTag;
   }
   with(document.ch_form15)
   {
      if (message15.createTextRange)
      {
         var text;
         message15.focus(message15.caretPos);
         message15.caretPos = document.selection.createRange().duplicate();
         if(message15.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message15.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message15.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message15.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message15.selectionStart || message15.selectionStart == "0")
      {
            var startPos = message15.selectionStart; //position du curseur au début de la sélection
            var endPos = message15.selectionEnd; //position du curseur en fin de sélection
            var chaine = message15.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message15.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message15.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message15.focus();
      }
      else message15.value += startTag+defaultText+endTag;
   }
   with(document.ch_form16)
   {
      if (message16.createTextRange)
      {
         var text;
         message16.focus(message16.caretPos);
         message16.caretPos = document.selection.createRange().duplicate();
         if(message16.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message16.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message16.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message16.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message16.selectionStart || message16.selectionStart == "0")
      {
            var startPos = message16.selectionStart; //position du curseur au début de la sélection
            var endPos = message16.selectionEnd; //position du curseur en fin de sélection
            var chaine = message16.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message16.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message16.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message16.focus();
      }
      else message16.value += startTag+defaultText+endTag;
   }
   with(document.ch_form17)
   {
      if (message17.createTextRange)
      {
         var text;
         message17.focus(message17.caretPos);
         message17.caretPos = document.selection.createRange().duplicate();
         if(message17.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message17.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message17.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message17.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message17.selectionStart || message17.selectionStart == "0")
      {
            var startPos = message17.selectionStart; //position du curseur au début de la sélection
            var endPos = message17.selectionEnd; //position du curseur en fin de sélection
            var chaine = message17.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message17.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message17.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message17.focus();
      }
      else message17.value += startTag+defaultText+endTag;
   }
   with(document.ch_form18)
   {
      if (message18.createTextRange)
      {
         var text;
         message18.focus(message18.caretPos);
         message18.caretPos = document.selection.createRange().duplicate();
         if(message18.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message18.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message18.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message18.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message18.selectionStart || message18.selectionStart == "0")
      {
            var startPos = message18.selectionStart; //position du curseur au début de la sélection
            var endPos = message18.selectionEnd; //position du curseur en fin de sélection
            var chaine = message18.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message18.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message18.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message18.focus();
      }
      else message18.value += startTag+defaultText+endTag;
   }
   with(document.ch_form19)
   {
      if (message19.createTextRange)
      {
         var text;
         message19.focus(message19.caretPos);
         message19.caretPos = document.selection.createRange().duplicate();
         if(message19.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message19.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message19.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message19.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message19.selectionStart || message19.selectionStart == "0")
      {
            var startPos = message19.selectionStart; //position du curseur au début de la sélection
            var endPos = message19.selectionEnd; //position du curseur en fin de sélection
            var chaine = message19.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message19.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message19.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message19.focus();
      }
      else message19.value += startTag+defaultText+endTag;
   }
   with(document.ch_form20)
   {
      if (message20.createTextRange)
      {
         var text;
         message20.focus(message20.caretPos);
         message20.caretPos = document.selection.createRange().duplicate();
         if(message20.caretPos.text.length>0)
         {
            //gère les espaces de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
            var sel = message20.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            message20.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            message20.caretPos.text = startTag+defaultText+endTag;
      }
      //MOZILLA/NETSCAPE support
      else if (message20.selectionStart || message20.selectionStart == "0")
      {
            var startPos = message20.selectionStart; //position du curseur au début de la sélection
            var endPos = message20.selectionEnd; //position du curseur en fin de sélection
            var chaine = message20.value;
            var startChaine = chaine.substring(0, startPos);
            var middleChaine = chaine.substring(startPos, endPos);
            var endChaine =  chaine.substring(endPos, chaine.length);
            if (defaultText=="")
            {
                //startPos==endPos
                message20.value = startChaine + startTag + middleChaine + endTag + endChaine;
            }
            else
            {
                message20.value = startChaine + defaultText + " " + endChaine;
            }
            //message.selectionStart = startPos + defaultText.length;
            //message.selectionEnd = endPos + defaultText.length;
            message20.focus();
      }
      else message20.value += startTag+defaultText+endTag;
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