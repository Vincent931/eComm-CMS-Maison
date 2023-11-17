<?php        
//initialisation variable post

if(isset($_POST['societe']) AND !empty($_POST['societe'])) {
$societe= htmlspecialchars($_POST['societe']);
} else {
$societe="";
}

if(isset($_POST['adresse2']) AND !empty($_POST['adresse2'])){
$adresse2 = htmlspecialchars($_POST['adresse2']);
} else {
$adresse2="";
}

if(isset($_POST['societe_livr']) AND !empty($_POST['societe_livr'])) {
$societe_livr= htmlspecialchars($_POST['societe_livr']);
} else {
$societe_livr="";
}

if(isset($_POST['adresse2_livr']) AND !empty($_POST['adresse2_livr'])){
$adresse2_livr = htmlspecialchars($_POST['adresse2_livr']);
} else {
$adresse2_livr="";
}

if(isset($_POST['click']) AND $_POST['click']=="click"){
$ref2="click";
$req77=$bdd->prepare('UPDATE commande SET ref2=:ref2 WHERE reference=:reference');
$req77->execute(array('ref2'=>$ref2, 'reference'=>$_SESSION['reference']));
}
//
require 'pays-change.php';
require 'pays-change2.php';

//autre variable
//si international
if(isset($intern) AND $intern=="OK")
{
    $oui='oui';
    $pays=$_POST['pays'];
    $pays_livr=$_POST['pays_livr'];
        //variable post province et province_libre
        if(isset($_POST['province']) AND !empty($_POST['province'])){
        $province=htmlspecialchars($_POST['province']);
        } else {
        $province="";
        }
        if(isset($_POST['province_livr']) AND !empty($_POST['province_livr'])){
        $province_livr=htmlspecialchars($_POST['province_livr']);
        } else {
        $province_livr="";
        }

} elseif (isset($intern) AND $intern=="KO"){
    $pays='FR';
    $pays_livr='FR';
    $pays1='France';
    $pays2="France";
    $province='';
    $province_livr='';
}
$mail1=htmlspecialchars(strtolower($_POST['mail']));
//                    
$req=$bdd->prepare('UPDATE compte SET 
    mail=:nmail,
     confirmkey=:nconfirmkey,
      nom=:nnom, prenom=:nprenom,
       societe=:nsociete,
        adresse1=:nadresse1,
         adresse2=:nadresse2,
          code_postal=:ncode_postal,
           ville=:nville,
            stateOrProvince=:nstateOrProvince,
             pays=:npays,
              pays_string=:npays_string,
               nom_livr=:nom_livr,
                prenom_livr=:prenom_livr,
                 societe_livr=:societe_livr,
                  adresse1_livr=:adresse1_livr,
                   adresse2_livr=:adresse2_livr,
                    code_postal_livr=:code_postal_livr,
                     ville_livr=:ville_livr,
                      stateOrProvince_livr=:stateOrProvince_livr,
                       pays_livr=:pays_livr,
                        pays_livr_string=:pays_livr_string
                         WHERE mail=:nmail2');

$req->execute(array(
    'nmail'=>htmlspecialchars($mail1),
    'nconfirmkey'=>$key,
    'nnom'=>htmlspecialchars($_POST['nom']),
     'nprenom'=>htmlspecialchars($_POST['prenom']),
      'nsociete'=>$societe,
       'nadresse1'=>htmlspecialchars($_POST['adresse1']),
        'nadresse2'=>$adresse2,
        'ncode_postal'=>htmlspecialchars($_POST['code_postal']),
         'nville'=>htmlspecialchars($_POST['ville']),
          'nstateOrProvince'=>$province,
           'npays'=>$pays,
            'npays_string'=>$pays1,
             'nom_livr'=>htmlspecialchars($_POST['nom_livr']),
              'prenom_livr'=>htmlspecialchars($_POST['prenom_livr']),
               'societe_livr'=>$societe_livr,
                'adresse1_livr'=>htmlspecialchars($_POST['adresse1_livr']),
                 'adresse2_livr'=>$adresse2_livr,
                  'code_postal_livr'=>htmlspecialchars($_POST['code_postal_livr']),
                   'ville_livr'=>htmlspecialchars($_POST['ville_livr']),
                    'stateOrProvince_livr'=>$province_livr,
                     'pays_livr'=>$pays_livr,
                      'pays_livr_string'=>$pays2,
                      'nmail2'=>htmlspecialchars($_SESSION['mail'])));
$req->closeCursor();

if(isset($_POST['international']) AND $_POST['international']=='international_oui'){
    $oui='oui';
    //cas des livraisons internationales
    require '../boutique0.php';
    $i=0;
    $total=0;
    $nv_grand_total=0;
    $nv_poids=0;
    $req2=$bdd->prepare('SELECT titre, quantite, sous_total FROM commande WHERE reference=?');
    $req2->execute(array($_SESSION['reference']));
    while($com=$req2->fetch())
    {
        $livraison[0]=0;
        $poids_tot[0]=0;
        $i++;
        $titre=htmlspecialchars($com['titre']);
        $quantite=htmlspecialchars($com['quantite']);
        //recuperer le prix au kg
        $req151=$bdd->query('SELECT * FROM pays1');
        $donnees151=$req151->fetch();
        $req152=$bdd->query('SELECT * FROM pays2');
        $donnees152=$req152->fetch();
        $req153=$bdd->query('SELECT * FROM pays3');
        $donnees153=$req153->fetch();
        $req154=$bdd->query('SELECT * FROM pays4');
        $donnees154=$req154->fetch();
        $req155=$bdd->query('SELECT * FROM pays5');
        $donnees155=$req155->fetch();
        $req156=$bdd->query('SELECT * FROM pays6');
        $donnees156=$req156->fetch();
        $req157=$bdd->query('SELECT * FROM pays7');
        $donnees157=$req157->fetch();
        $req158=$bdd->query('SELECT * FROM pays8');
        $donnees158=$req158->fetch();
        $req159=$bdd->query('SELECT * FROM pays9');
        $donnees159=$req159->fetch();
        $req160=$bdd->query('SELECT * FROM pays10');
        $donnees160=$req160->fetch();
        if(isset($donnees151[$pays]) AND !empty($donnees151[$pays])){
            $prix_kg=$donnees151[$pays];
        } elseif(isset($donnees152[$pays]) AND !empty($donnees152[$pays])){
            $prix_kg=$donnees152[$pays];
        } elseif(isset($donnees153[$pays]) AND !empty($donnees153[$pays])){
            $prix_kg=$donnees153[$pays];
        } elseif(isset($donnees154[$pays]) AND !empty($donnees154[$pays])){
            $prix_kg=$donnees154[$pays];
        } elseif(isset($donnees155[$pays]) AND !empty($donnees155[$pays])){
            $prix_kg=$donnees155[$pays];
        } elseif(isset($donnees156[$pays]) AND !empty($donnees156[$pays])){
            $prix_kg=$donnees156[$pays];
        } elseif(isset($donnees157[$pays]) AND !empty($donnees157[$pays])){
            $prix_kg=$donnees157[$pays];
        } elseif(isset($donnees158[$pays]) AND !empty($donnees158[$pays])){
            $prix_kg=$donnees158[$pays];
        } elseif(isset($donnees159[$pays]) AND !empty($donnees159[$pays])){
            $prix_kg=$donnees159[$pays];
        } elseif(isset($donnees160[$pays]) AND !empty($donnees160[$pays])){
            $prix_kg=$donnees160[$pays];
        }

        $req1=$bdd->prepare('SELECT poids FROM produits WHERE titre=?');
        $req1->execute(array($titre));
        $donnees=$req1->fetch();
        $poids=$donnees['poids'];
        $poids_tot[$i]=$poids*$quantite;
        $livraison[$i]=$prix_kg*$poids_tot[$i]/1000;
        $total+=$livraison[$i];
            
        //totaux
        $sous_total[$i]=$com['sous_total'];
        $nv_grand_total+=$sous_total[$i];
        $nv_poids+=$poids_tot[$i];
    //fin du while quantite etc... Where Reference
    }

    //somme des livraisons + somme des sous_totaux
    $nv_grand_total+=$total;
    $nv_total_forme=number_format($nv_grand_total,2,'.','');
    $livraison_forme=number_format($total,2,'.','');
    //update commande grand_total et livraison
    $req4=$bdd->prepare('UPDATE commande SET livr_inter=:livr_inter, livraison=:livraison, grand_total=:grand_total, poids=:poids WHERE reference=:reference');
    $req4->execute(array('livr_inter'=>$oui,'livraison'=>$livraison_forme, 'grand_total'=>$nv_total_forme, 'poids'=>$nv_poids, 'reference'=>$_SESSION['reference']));
    $_SESSION['livraison']=$total;

    //fin si international
} else { $oui='non';}

//Effacement commande avec quantite=0
$zero="0";
$req22=$bdd->prepare('DELETE FROM commande WHERE quantite=?');
$req22->execute(array($zero));

//update commande avec new email (mail1)
$etat="non";
$req2=$bdd->prepare('UPDATE commande SET acheteur=:acheteur WHERE reference=:reference AND etat=:etat');
$req2->execute(array('acheteur'=>$mail1, 'reference'=>$_SESSION['reference'], 'etat'=>$etat));
$_SESSION['mail']=$mail1;
//determination interface de paiement
$bank="";

require '../boutique0.php';
require '../texte1.php';

$req19=$bdd1->query('SELECT * FROM monetico');
$donnees19=$req19->fetch();
if($donnees19['exist']=="oui"){
  $bank="monetico";
}
$req18=$bdd1->query('SELECT * FROM paypal');
$donnees18=$req18->fetch();
if($donnees18['exist']=="oui"){
  $bank="paypal";
}
$req17=$bdd->query('SELECT * FROM paypal_checkout');
$donnees17=$req17->fetch();
if($donnees17['exist']=="oui"){
  $bank="paypal-SDK";
}
$req16=$bdd1->query('SELECT * FROM cheque');
$donnees16=$req16->fetch();
if($donnees16['exist']=="oui"){
  if(isset($_POST['cheque']) AND $_POST['cheque']=='cheque'){
    $bank="cheque";
  }
}
//fin determination interface de paiement
//fermeture des requetes
if (isset($req)){$req->closeCursor();}
if (isset($req1)){$req1->closeCursor();}
if (isset($req2)){$req2->closeCursor();}
if (isset($req3)){$req3->closeCursor();}
if (isset($req4)){$req4->closeCursor();}
if (isset($req5)){$req5->closeCursor();}
if (isset($req6)){$req6->closeCursor();}
if (isset($req77)){$req77->closeCursor();}
    //redirection
    if($bank=="monetico"){
    header("Location:../paiement/RECAPITULATIF");
    } else if ($bank=="paypal"){
    header("Location:../paypal/RECAPITULATIF");
    } else if($bank=="paypal-SDK"){
    header("Location:../paypal-SDK/RECAPITULATIF");
    } else if($bank=="cheque"){
    header("Location:../cheque/RECAPITULATIF");
    } else { $_SESSION['message']='UNE ERREUR EST SURVENUE, VERIFIEZ LES CHAMPS REQUIS';
    header("Location:../panier.php");
    }


