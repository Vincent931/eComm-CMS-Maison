<?php session_start();

require 'boutique0.php';

?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
  <body>
    <div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
         <h2 style="text-align:center">Incident de Paiement</h2>
         <div id="boutons_connect">
            <tr>
               <td>
                  <a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html">Aller sur le site</a>
               </td>
            </tr>
         </div></br>
   <section>
      <article>
         <?php $i=0;

   $req = $bdd->query('SELECT id, montant, DATE_FORMAT(date_incident, \'%d/%m/%Y\') AS date_incident FROM incident_paiement');
      while($donnees = $req->fetch()){ $i++;
echo '<div style="margin:auto">'.'<h3 style="text-align:center">'.'WARNING !!!'.'</h3>'.'<p>'.' Incident de Paiement - Paiement en plusieurs fois le : '.htmlspecialchars($donnees['date_incident']).'</p>'.'</div>'.'</br>';
echo '<div style="margin:auto;text-align:center" >'.'<a id="grey_color" href="incident-paiement-effacer.php?id='.$donnees['id'].'">'.'Effacer cet incident'.'</a>'.'</div>';
}
if($i=0){echo '<h2>'.'Pas d\'incident de Paiement à ce jour !'.'</h2>';}
?>
      </article>
   </section>
     <br><br><br><br><br>
   </body>
</html>