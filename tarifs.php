<?php session_start();

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require '_header.php';

require 'texte1.php';
$req21=$bdd1->query('SELECT * FROM accueil');
$accueil=$req21->fetch();
$req24=$bdd1->query('SELECT * FROM societe');
$name=$req24->fetch();
$req26=$bdd1->query('SELECT * FROM societe');
$societe=$req26->fetch();
require 'boutique0.php';
$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
$_SESSION['prod_solo']="";
if(isset($_GET['page']) AND !empty($_GET['page'])){
	$g=intval(urldecode($_GET['page']));
$d=$g-29;
} else{
		$d=1;
		$g=30;
}
if(isset($_GET['cat']) AND !empty($_GET['cat'])){
	$typeP=htmlspecialchars($_GET['cat']);
} else{
	$typeP="";
}
$urlA='tarifs.php?cat='.urlencode($typeP);
 
$req256=$bdd1->query('SELECT * FROM colors');
$donnees256=$req256->fetch();
////////////////////////////////////
//background bouton add
$bacColAdd=$donnees256['bacColAdd'];
//police
$colAdd=$donnees256['colAdd'];
//background bouton voir et retour
$bacColVoir=$donnees256['bacColVoir'];
//police
$colVoir=$donnees256['colVoir'];
?>
<!DOCTYPE html>
<html id="bloc_page">
  <?php require 'head.php';?> 
<style>
/**********Tarifs************/
/*  >1400px  */
body{
  width:100%;
}
.bloc_page{
  display: flex;
  flex-direction:column;
  width: 1400px;
  margin: auto;
  overflow:hidden;
}
#cont_cat_rech{
  display: flex;
  flex-direction:column;
  width: 550px;
}
.h3_telech{
  width: 250px;
  display: flex;
  flex-direction: column;
  position: relative;
  left: 400px;
  text-align:center;
  margin:auto;
  background-color:white;
  text-decoration:none;
  color: #5B6975;
  border: 0px solid #5B6975;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.a_telech{
  width: 250px;
  display: flex;
  flex-direction: column;
  background-color:white;
  text-decoration:none;
  color: #5B6975;
}
#categories{
  display: flex;
  flex-direction: column;
  width: 300px;
  height: 230px;
  margin: auto;
  margin-left: 83%;
}
.categories_p{
  display: flex;
  flex-direction: column;
  width: 400px;
  margin: auto;
  text-align: left;
  color: #5B6975;
}
.categories_p a{
  display: flex;
  flex-direction: row;
  color: #5B6975;
}
.img_cat{
  width: 45px;
  position: relative;
  top:-12px ;
}
#form_cat{
  width:500px;
  display: flex;
  flex-direction: row;
  margin: auto;
  margin-left: 153%;
  margin-top: 9%;
}
#img_caddie_panier{
  width:22px;
}
#contenant{
  width:100%;
  display: flex;
  flex-direction:row;
  justify-content: space-around;
  flex-wrap: wrap;
  margin:auto;
}
.conteneur_produit{
  background:#fcfcfc !important;
  width: 321px;
  height: 670px;
  text-align: left;
  margin: 30px;
  margin-bottom: 7%;
  display: flex;
  flex-direction: column;
  padding: 0.7em;
  z-index: 1;
}
.image_pro_tarif{
  width:298px;
  height:298px;
  display:block;
}
.image_pro_tarif2{
  min-width:298px;
  max-width: 298px;
  min-height:298px;
  max-height:298px;
  display:block;
}
.yout_cl{
margin-top: 49%;
  width: 298px;
  height: 298px;
}
.title{
  font-size: 1.3rem;
  max-width:100%;
  min-height: 24%;
  height:50%;
  display:block;
  overflow-wrap: break-word;
  text-align:left;
}
.price{
  text-align:left;
  text-decoration:none;
  width:150px;
  display:block;
  font-weight:bold;
  color:#11DE48;
  font-size:25px;
}
.p_pro_lien{
  max-width:100%;
  text-align:left;
  vertical-align:baseline;
}
.addPanier{
  width:160px;
  border-radius:5px/5px;
  color:white;
  padding:15px;
  float:left;
  background-color:black;
  text-decoration:none;
  font-size: 9pt;
}
.a_pro_lien{
  font-size: 9pt;
  width:74px;
  border-radius:5px/5px;
  text-align:center;
  float:right;
  padding:15px;
  background-color:black;/*#8BC0F4;*/
  color:white;
  text-decoration:none;
  margin-right: 1em;
}
.a_pro_lien_2{
  text-decoration:none;
}
#col{
  background-color:black;
  color:white;
}
#cola{
  background-color:black;
  color:white;
}
#bas_page{
  text-align:center;
  margin:auto;
  width:1400px;
}
@-moz-document url-prefix(){
}
@media only screen and (min-width: 1024px) and (max-width: 1399px){
/**********Tarifs************/
/*  1024px  */
body{
  width:100%;
}
.bloc_page{
  display: flex;
  flex-direction:column;
  width: 1024px;
  margin: auto;
  overflow: hidden;
}
#categories{
  display: flex;
  flex-direction: column;
  width: 300px;
  height: 230px;
  margin: auto;
  margin-left: 14%;
}
#form_cat{
  width:500px;
  display: flex;
  flex-direction: row;
  margin: auto;
  margin-left: 100%;
  margin-top: 9%;
}
#bas_page{
  text-align:center;
  margin:auto;
  width:1024px;
}

@-moz-document url-prefix(){
}
}
@media only screen and (min-width: 768px) and (max-width: 1023px){
/**********Tarifs************/
/*  >1600px  */
body{
  width:100%;
}
.bloc_page{
  display: flex;
  flex-direction:column;
  width: 768px;
  margin: auto;
  overflow: auto;
}
#categories{
  display: flex;
  flex-direction: column;
  width: 300px;
  height: 230px;
  margin: auto;
  margin-left: 14%;
}
#form_cat{
  width:500px;
  display: flex;
  flex-direction: row;
  margin: auto;
  margin-left: 72%;
  margin-top: 9%;
}
#bas_page{
  text-align:center;
  margin:auto;
  width:768px;
}
@-moz-document url-prefix(){
}
}
@media all and (max-width: 767px){
body{
  width:100%;
}
.bloc_page{
  display: flex;
  flex-direction:column;
  width: 330px;
  margin: auto;
  overflow: hidden;
}
#categories{
  display: flex;
  flex-direction: column;
  width: 300px;
  height: 230px;
  margin: auto;
  margin-left: 14%;
}
#form_cat{
  width:500px;
  display: flex;
  flex-direction: row;
  margin: auto;
  margin-left: 4%;
  margin-top: 31%;
}
#contenant{
  margin-top: -50px;
}
#bas_page{
  text-align:center;
  margin:auto;
  width:330px;
}
@-moz-document url-prefix(){
}
}
    </style>
    <title>Le Panel des objets de développement que nous proposons</title>
    <meta name="description" content="Une estampe des produits web de l'enseigne et leurs tarifs"/>
  </head> 
	<body>			
  <?php require 'header.php' ?>
  <div class="bloc_page">
    <?php 
    $i=0;
    ?><br><br><br><br><br>
    <div id="cont_cat_rech">
    <?php $req30=$bdd->query('SELECT * FROM download');
    $donnees30=$req30->fetch();
    	if(isset($donnees30['exist']) AND !empty($donnees30['exist'])){
    		if($donnees30['exist']=='oui'){
    					echo '<h3 class="h3_telech">'.'<a class="a_telech" href="telechargements.php">'.'Accèder aux Téléchargements'.'</a>'.'</h3>';
    	  }
      }
    if(isset($_SESSION['message'])){echo '<h3 class="h3_telech" style="color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";}

    	$req150=$bdd->query('SELECT * FROM cat_ok');
    	$donnees150=$req150->fetch();
    	if($donnees150['oui_non']=='oui')
    	{ 
    		echo '<div id="categories"><br><br><br><br>';
    		$req151=$bdd->query('SELECT * FROM categories');

    		while($donnees151=$req151->fetch())
    		{
    		echo '<p class="categories_p">'.'<a href="tarifs.php?cat='.$donnees151['prefixe'].'">'.'<img class="img_cat" src="publicimgs/'.$donnees151['icone'].'"/>'.'&nbsp;&nbsp;'.$donnees151['nom'].'</a>'.'</p>';
    		}
    		echo '<p class="categories_p">'.'<a href="tarifs.php?cat=">'.'<img class="img_cat" src="publicimgs/plus.png"/>'.'&nbsp;&nbsp;'.'Tous/Toutes'.'</a>'.'</div>';
    	}
    ?>
    	<form id="form_cat" action="resultat-recherche" method="POST">
    			<p><input class="cat_inp" type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/><input class="cat_inp" type="submit" value="Valider"/></p>
    	</form>
    </div>
    <br><br>
    <div id="contenant">
    <!----><?php 
    if($typeP =="")
    {
    	$produits = $DB->query('SELECT * FROM produits WHERE afficher=\'oui\'');
    foreach ( $produits as $produit ): 
    if(isset($produit->promotion) AND ($produit->promotion == 'oui')){
    	$ifpromo="oui";
    	} else {$ifpromo="non";} 
    	$mot=substr($produit->nom,0,14);
    	if ($mot!='telechargement'){
    		$i++;
    			if ($i>=$d AND $i<=$g) {?>
      <div class="conteneur_produit">
			<div class="espace_av">&nbsp;</div>
			<?php if(isset($produit->img_type) AND $produit->img_type=="image"){ ?>		
	       <a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$produit->cle_image;}else{echo $produit->cle_image;} ?>"></a>
      <?php }
       if(isset($produit->img_type) AND $produit->img_type=="youtube"){ ?><iframe class="yout_cl" <?php echo $produit->cle_image;?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       	<?php
	     }
	       if(isset($produit->img_type) AND $produit->img_type=="video"){ ?>
	       <a href="#"><video class="image_pro_tarif" src="publicimgs/<?php echo $produit->cle_image;$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($produit->cle_image)); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video></a>
        <?php }?>
			<div class="espace_ap">&nbsp;</div>
			<h2 class="title"><?= $produit->titre; ?></h2>
			</br>
			  <div>
          <a class="price" style="display:inline-block" href="#"><?php echo number_format($produit->prix,2,',',' '); if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a><?php if(isset($produit->barre) AND !empty($produit->barre)){echo '<span style="display:inline-block;position:relative;right:-60px"><s>'.number_format($produit->barre,2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';};echo '</s></span>';}?></div>
			    <p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?= $produit->id; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="achat-<?php echo urlencode($produit->id);?>">VOIR</a></p>
        </div>
      	<?php }
      	$pp=$i;
      	}
      endforeach;
      $g+=30;
      $h=$g-60;
      } else { $oui="oui";
      	$req180 = $bdd->prepare('SELECT * FROM produits WHERE nom=:nom AND afficher=:afficher');
      	$req180->execute(array('nom'=>htmlspecialchars($typeP), 'afficher'=>$oui));
      	while($donnees180=$req180->fetch()){ 
      if(isset($donnees180['promotion']) AND ($donnees180['promotion'] == 'oui')){
      	$ifpromo="oui";
      	} else {$ifpromo="non";} 
      	$mot=substr($donnees180['nom'],0,14);
      	if ($mot!='telechargement'){
      		$i++;
      		$img_type=$donnees180['img_type'];
      			if ($i>=$d AND $i<=$g) {?>
          <div class="conteneur_produit">
			       <div class="espace_av">&nbsp;</div>
              <?php if(isset($img_type) AND $img_type=="image"){ ?>		
              	<a href="#"><img class="image_pro_tarif" src="publicimgs/<?php if($ifpromo=="oui"){echo 'promo-'.$donnees180['cle_image'];}else{echo $donnees180['cle_image'];} ?>"></a>

              <?php }
               if(isset($img_type) AND $img_type=="youtube"){ ?><a href="#" class="image_pro_tarif2"><iframe style="width: 298px; height: 298px" <?php echo $donnees180['cle_image'];?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
               	<?php
              	} 
              	if(isset($img_type) AND $img_type=="video"){ ?>
                	<video class="image_pro_tarif" src="publicimgs/<?php echo $donnees180['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees180['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
                <?php }?>
			       <div class="espace_ap">&nbsp;</div>
        			<h2 class="title"><?= $donnees180['titre']; ?></h2>
        			</br>
        			<a class="price" href="#"><?php echo number_format($donnees180['prix'],2,',',' ');if(isset($donnees210['ok']) AND $donnees210['ok']!='oui'){echo ' €';} else{echo ' $';} ?></a>
        			<p class="p_pro_lien"><a id="col<?php echo $i;?>" class="add addPanier" href="addpanier.php?id=<?php echo $donnees180['id']; ?>">AJOUTER AU PANIER</a><a id="cola<?php echo $i;?>" class="a_pro_lien" href="achat-<?php echo urlencode($donnees180['id']);?>">VOIR</a></p>
          </div>
          <?php }
          $pp=$i;
          }

          }
          $g+=30;
          $h=$g-60;

          }?>
        </div>		<!---->
        </br></br><br><br>

        <div id="bas_page">
        	<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="tarifs.php"> Page 1</a>
        	<?php if ($d>=30){echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="'.$urlA.'&page='.urlencode($h).'">'.' <<< '.'</a>';}
        	 echo ' '.'<a style="color:#3C6180;text-decoration:none;border:1px solid black;background-color:#DDE3E3; margin:12px;padding:5px" href="'.$urlA.'&page='.urlencode($g).'">'.' >>>'.'</a>';
        	$_SESSION['telechar']="";?>
          <p>&nbsp;</p>
          <form action="resultat-recherche" method="POST">
          		<input type="search" name="searching" placeholder="Recherche-1/2 Mots clés ..."/>
          		<input type="submit" value="Valider"/>
          		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
          		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
          		<div class="br_ff" style="margin:10px 0px 10px 0px">&nbsp;</div>
          </form>
        </div>
        </br></br></br>
      </div>
<?php $non_aff_compt=true; require 'footer.php';?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<!--add for modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      </div>
    </div>
        <!-- Javascript -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="assets/js/custom.js"></script>
<script>
//boutons add panier et voir
//recup des boutons
for(var i=1;i <= <?php echo $pp;?>;i++){
//
var buttonAddCol=document.getElementById('col'+i);
var buttonVoirCol=document.getElementById('cola'+i);
//
if(buttonAddCol){
buttonAddCol.style.backgroundColor="<?php echo $bacColAdd; ?>";
//couleur de police
buttonAddCol.style.color="<?php echo $colAdd;?>";
//2eme bouton
buttonVoirCol.style.backgroundColor="<?php echo $bacColVoir; ?>";
//couleur de police
buttonVoirCol.style.color="<?php echo $colVoir;?>";
}
}
</script>
  </body>
</html>
