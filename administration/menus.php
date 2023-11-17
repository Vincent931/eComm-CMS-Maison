<?php session_start(); 
require '../texte1.php';
require '../boutique0.php';
require '../blog2.php';

$req210=$bdd->query('SELECT * FROM taux_USD');
$donnees210=$req210->fetch();
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
         	
    $("#inp_mh").click(function() {
        $( "#contenair_menu_haut" ).css( 'display', 'block' )
    });
    $("#inp_mh2").click(function() {
        $( "#contenair_menu_haut" ).css( 'display', 'none' )
    });
    $("#inp_mb").click(function() {
        $( "#contenair_menu_bas" ).css( 'display', 'block' )
    });
    $("#inp_mb2").click(function() {
        $( "#contenair_menu_bas" ).css( 'display', 'none' )
    });
});
</script>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Menu Haut et Bas</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center;margin:auto;color:red">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div></br>
		<div style="width:600px; text-align:left;margin:auto">
			<p>Le fichier blog/Questions-Reponses indique la questions-réponses addresse en url serveur, utilisez plutôt https://monsite.com/blog/Questions-Reponses en url web</p>
			<p>Le fichier publicimgs/nomdupdf.pdf indique le pdf-société addresse en url serveur, https://monsite.com/publicimgs/nomdupdf.pdf en url web</p>
			<p>Le fichier politique-confidentialite.php indique la Politique de Confidentialié addresse en url serveur, https://monsite.com/Politique-de-Confidentialite en url web</p>
			<p>Le fichier Conditions-Generale-de-Ventes indique la CGV addresse en url serveur, https://monsite.com/Conditions-Generale-de-Ventes en url web</p>
			<p>Le fichier reinitialisation.php indique la réinitialisation de compte addresse en url serveur, https://monsite.com/reinitialisation.php en url web</p>
			<p>Les url sont de types (nomdefichier.php ou nomdefichier ou publicimgs/nomdepdf.pdf pour https://monsite.com/nomdefichier.php ou https://monsite.com/nomdefichier ou https://monsite.com/blog/nomdefichier.php)</p>
		</div><br>
		<?php $req33=$bdd1->query('SELECT * FROM menu_burger');
		$donnees33=$req33->fetch(); ?>
			<form method="POST" action="menu-burger.php">
			<input type="submit" value="Envoyer caractéristique"/><br><br>
			<div style="margin:auto;width:400px;text-align:right">
					<p style="text-align:center;width:300px;margin:auto">Menu Burger (sur Grand Ecran)   </p>
					<p style="text-align:right;width:300px;margin:auto">non <input style="width:25px;display:inline-block;text-align:right" type="radio"id="burger" name="burger" value="oui" <?php if($donnees33['afficher']=="oui") echo 'checked';?>/></p><br>
					<p style="text-align:right;width:300px;margin:auto">oui  <input style="width:25px;display:inline-block;text-align:right" type="radio" id="burger" name="burger" value="non" <?php if($donnees33['afficher']=="non") echo 'checked';?>/></p>
				</div>
			</form><br><br>
			<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>

			<p style="text-align:center;margin:auto"><input style="width:120px;color:blue" type="button" name="inp_mh" id="inp_mh" value="MENU HAUT"/><span style="width:100px">&nbsp;</span><input style="width:120px;color:black" type="button" name="inp_mh2" id="inp_mh2" value="Cacher"/><p>
		<?php $req210=$bdd1->query('SELECT * FROM menuH1');
		$donnees210=$req210->fetch();
		?>
		<div id="contenair_menu_haut">
			<div class="menu_admin">
				<form method="post" action="menusH1.php" method="post"/>
					<p class="p_men_admin">Menu Haut 1ère Colonne</p>
					<input type="submit" value="Envoyer Colonne1"/>
					<p class="p_men_admin">Titre du lien 1</p>
					<p class="p_men_admin">url1<span style="color:red">(ici pas d'url si plusieurs liens)</p>
					<input class="inp_men_admin" type="text" name="NH11" id="NH11" value="<?php echo $donnees210['NH11'];?>"/>
					<input class="inp_men_admin" type="text" name="UH11" id="UH11" value="<?php echo $donnees210['UH11'];?>"/>

					<p class="p_men_admin">Titre du lien 2</p>
					<p class="p_men_admin">url 2</p>
					<input class="inp_men_admin" type="text" name="NH12" id="NH12" value="<?php echo $donnees210['NH12'];?>"/>
					<input class="inp_men_admin" type="text" name="UH12" id="UH12" value="<?php echo $donnees210['UH12'];?>"/>

					<p class="p_men_admin">Titre du lien 3</p>
					<p class="p_men_admin">url 3</p>
					<input class="inp_men_admin" type="text" name="NH13" id="NH13" value="<?php echo $donnees210['NH13'];?>"/>
					<input class="inp_men_admin" type="text" name="UH13" id="UH13" value="<?php echo $donnees210['UH13'];?>"/>

					<p class="p_men_admin">Titre du lien 4</p>
					<p class="p_men_admin">url 4</p>
					<input class="inp_men_admin" type="text" name="NH14" id="NH14" value="<?php echo $donnees210['NH14'];?>"/>
					<input class="inp_men_admin" type="text" name="UH14" id="UH14" value="<?php echo $donnees210['UH14'];?>"/>

					<p class="p_men_admin">Titre du lien 5</p>
					<p class="p_men_admin">url 5</p>
					<input class="inp_men_admin" type="text" name="NH15" id="NH15" value="<?php echo $donnees210['NH15'];?>"/>
					<input class="inp_men_admin" type="text" name="UH15" id="UH15" value="<?php echo $donnees210['UH15'];?>"/>

					<p class="p_men_admin">Titre du lien 6</p>
					<p class="p_men_admin">url 6</p>
					<input class="inp_men_admin" type="text" name="NH16" id="NH16" value="<?php echo $donnees210['NH16'];?>"/>
					<input class="inp_men_admin" type="text" name="UH16" id="UH16" value="<?php echo $donnees210['UH16'];?>"/>

					<p class="p_men_admin">Titre du lien 7</p>
					<p class="p_men_admin">url 7</p>
					<input class="inp_men_admin" type="text" name="NH17" id="NH17" value="<?php echo $donnees210['NH17'];?>"/>
					<input class="inp_men_admin" type="text" name="UH17" id="UH17" value="<?php echo $donnees210['UH17'];?>"/>

					<p class="p_men_admin">Titre du lien 8</p>
					<p class="p_men_admin">url 8</p>
					<input class="inp_men_admin" type="text" name="NH18" id="NH18" value="<?php echo $donnees210['NH18'];?>"/>
					<input class="inp_men_admin" type="text" name="UH18" id="UH18" value="<?php echo $donnees210['UH18'];?>"/>
				</form>
			</div>
			<?php $req210=$bdd1->query('SELECT * FROM menuH2');
			$donnees210=$req210->fetch();
			?>
			<div class="menu_admin">
				<form method="post" action="menusH2.php" method="post"/>
					<p class="p_men_admin">Menu Haut 2ème Colonne</p>
					<input type="submit" value="Envoyer Colonne2"/>
					<p class="p_men_admin">Titre du lien 1</p>
					<p class="p_men_admin">url1<span style="color:red">(ici pas d'url si plusieurs liens)</p>
					<input class="inp_men_admin" type="text" name="NH21" id="NH21" value="<?php echo $donnees210['NH21'];?>"/>
					<input class="inp_men_admin" type="text" name="UH21" id="UH21" value="<?php echo $donnees210['UH21'];?>"/>

					<p class="p_men_admin">Titre du lien 2</p>
					<p class="p_men_admin">url 2</p>
					<input class="inp_men_admin" type="text" name="NH22" id="NH22" value="<?php echo $donnees210['NH22'];?>"/>
					<input class="inp_men_admin" type="text" name="UH22" id="UH22" value="<?php echo $donnees210['UH22'];?>"/>

					<p class="p_men_admin">Titre du lien 3</p>
					<p class="p_men_admin">url 3</p>
					<input class="inp_men_admin" type="text" name="NH23" id="NH23" value="<?php echo $donnees210['NH23'];?>"/>
					<input class="inp_men_admin" type="text" name="UH23" id="UH23" value="<?php echo $donnees210['UH23'];?>"/>

					<p class="p_men_admin">Titre du lien 4</p>
					<p class="p_men_admin">url 4</p>
					<input class="inp_men_admin" type="text" name="NH24" id="NH24" value="<?php echo $donnees210['NH24'];?>"/>
					<input class="inp_men_admin" type="text" name="UH24" id="UH24" value="<?php echo $donnees210['UH24'];?>"/>

					<p class="p_men_admin">Titre du lien 5</p>
					<p class="p_men_admin">url 5</p>
					<input class="inp_men_admin" type="text" name="NH25" id="NH25" value="<?php echo $donnees210['NH25'];?>"/>
					<input class="inp_men_admin" type="text" name="UH25" id="UH25" value="<?php echo $donnees210['UH25'];?>"/>

					<p class="p_men_admin">Titre du lien 6</p>
					<p class="p_men_admin">url 6</p>
					<input class="inp_men_admin" type="text" name="NH26" id="NH26" value="<?php echo $donnees210['NH26'];?>"/>
					<input class="inp_men_admin" type="text" name="UH26" id="UH26" value="<?php echo $donnees210['UH26'];?>"/>

					<p class="p_men_admin">Titre du lien 7</p>
					<p class="p_men_admin">url 7</p>
					<input class="inp_men_admin" type="text" name="NH27" id="NH27" value="<?php echo $donnees210['NH27'];?>"/>
					<input class="inp_men_admin" type="text" name="UH27" id="UH27" value="<?php echo $donnees210['UH27'];?>"/>

					<p class="p_men_admin">Titre du lien 8</p>
					<p class="p_men_admin">url 8</p>
					<input class="inp_men_admin" type="text" name="NH28" id="NH28" value="<?php echo $donnees210['NH28'];?>"/>
					<input class="inp_men_admin" type="text" name="UH28" id="UH28" value="<?php echo $donnees210['UH28'];?>"/>
				</form>
			</div>
			<?php $req210=$bdd1->query('SELECT * FROM menuH3');
			$donnees210=$req210->fetch();
			?>
			<div class="menu_admin">
				<form method="post" action="menusH3.php" method="post"/>
					<p class="p_men_admin">Menu Haut 3ème Colonne</p>
					<input type="submit" value="Envoyer Colonne3"/>
					<p class="p_men_admin">Titre du lien 1</p>
					<p class="p_men_admin">url1<span style="color:red">(ici pas d'url si plusieurs liens)</p>
					<input class="inp_men_admin" type="text" name="NH31" id="NH31" value="<?php echo $donnees210['NH31'];?>"/>
					<input class="inp_men_admin" type="text" name="UH31" id="UH31" value="<?php echo $donnees210['UH31'];?>"/>

					<p class="p_men_admin">Titre du lien 2</p>
					<p class="p_men_admin">url 2</p>
					<input class="inp_men_admin" type="text" name="NH32" id="NH32" value="<?php echo $donnees210['NH32'];?>"/>
					<input class="inp_men_admin" type="text" name="UH32" id="UH32" value="<?php echo $donnees210['UH32'];?>"/>

					<p class="p_men_admin">Titre du lien 3</p>
					<p class="p_men_admin">url 3</p>
					<input class="inp_men_admin" type="text" name="NH33" id="NH33" value="<?php echo $donnees210['NH33'];?>"/>
					<input class="inp_men_admin" type="text" name="UH33" id="UH33" value="<?php echo $donnees210['UH33'];?>"/>

					<p class="p_men_admin">Titre du lien 4</p>
					<p class="p_men_admin">url 4</p>
					<input class="inp_men_admin" type="text" name="NH34" id="NH34" value="<?php echo $donnees210['NH34'];?>"/>
					<input class="inp_men_admin" type="text" name="UH34" id="UH34" value="<?php echo $donnees210['UH34'];?>"/>

					<p class="p_men_admin">Titre du lien 5</p>
					<p class="p_men_admin">url 5</p>
					<input class="inp_men_admin" type="text" name="NH35" id="NH35" value="<?php echo $donnees210['NH35'];?>"/>
					<input class="inp_men_admin" type="text" name="UH35" id="UH35" value="<?php echo $donnees210['UH35'];?>"/>

					<p class="p_men_admin">Titre du lien 6</p>
					<p class="p_men_admin">url 6</p>
					<input class="inp_men_admin" type="text" name="NH36" id="NH36" value="<?php echo $donnees210['NH36'];?>"/>
					<input class="inp_men_admin" type="text" name="UH36" id="UH36" value="<?php echo $donnees210['UH36'];?>"/>

					<p class="p_men_admin">Titre du lien 7</p>
					<p class="p_men_admin">url 7</p>
					<input class="inp_men_admin" type="text" name="NH37" id="NH37" value="<?php echo $donnees210['NH37'];?>"/>
					<input class="inp_men_admin" type="text" name="UH37" id="UH37" value="<?php echo $donnees210['UH37'];?>"/>

					<p class="p_men_admin">Titre du lien 8</p>
					<p class="p_men_admin">url 8</p>
					<input class="inp_men_admin" type="text" name="NH38" id="NH38" value="<?php echo $donnees210['NH38'];?>"/>
					<input class="inp_men_admin" type="text" name="UH38" id="UH38" value="<?php echo $donnees210['UH38'];?>"/>
				</form>
			</div>
			<?php $req210=$bdd1->query('SELECT * FROM menuH4');
			$donnees210=$req210->fetch();
			?>
			<div class="menu_admin">
				<form method="post" action="menusH4.php" method="post"/>
					<p class="p_men_admin">Menu Haut 4ème Colonne</p>
					<input type="submit" value="Envoyer Colonne4"/>
					<p class="p_men_admin">Titre du lien 1</p>
					<p class="p_men_admin">url1<span style="color:red">(ici pas d'url si plusieurs liens)</span></p>
					<input class="inp_men_admin" type="text" name="NH41" id="NH41" value="<?php echo $donnees210['NH41'];?>"/>
					<input class="inp_men_admin" type="text" name="UH41" id="UH41" value="<?php echo $donnees210['UH41'];?>"/>

					<p class="p_men_admin">Titre du lien 2</p>
					<p class="p_men_admin">url 2</p>
					<input class="inp_men_admin" type="text" name="NH42" id="NH42" value="<?php echo $donnees210['NH42'];?>"/>
					<input class="inp_men_admin" type="text" name="UH42" id="UH42" value="<?php echo $donnees210['UH42'];?>"/>

					<p class="p_men_admin">Titre du lien 3</p>
					<p class="p_men_admin">url 3</p>
					<input class="inp_men_admin" type="text" name="NH43" id="NH43" value="<?php echo $donnees210['NH43'];?>"/>
					<input class="inp_men_admin" type="text" name="UH43" id="UH43" value="<?php echo $donnees210['UH43'];?>"/>

					<p class="p_men_admin">Titre du lien 4</p>
					<p class="p_men_admin">url 4</p>
					<input class="inp_men_admin" type="text" name="NH44" id="NH44" value="<?php echo $donnees210['NH44'];?>"/>
					<input class="inp_men_admin" type="text" name="UH44" id="UH44" value="<?php echo $donnees210['UH44'];?>"/>

					<p class="p_men_admin">Titre du lien 5</p>
					<p class="p_men_admin">url 5</p>
					<input class="inp_men_admin" type="text" name="NH45" id="NH45" value="<?php echo $donnees210['NH45'];?>"/>
					<input class="inp_men_admin" type="text" name="UH45" id="UH45" value="<?php echo $donnees210['UH45'];?>"/>

					<p class="p_men_admin">Titre du lien 6</p>
					<p class="p_men_admin">url 6</p>
					<input class="inp_men_admin" type="text" name="NH46" id="NH46" value="<?php echo $donnees210['NH46'];?>"/>
					<input class="inp_men_admin" type="text" name="UH46" id="UH46" value="<?php echo $donnees210['UH46'];?>"/>

					<p class="p_men_admin">Titre du lien 7</p>
					<p class="p_men_admin">url 7</p>
					<input class="inp_men_admin" type="text" name="NH47" id="NH47" value="<?php echo $donnees210['NH47'];?>"/>
					<input class="inp_men_admin" type="text" name="UH47" id="UH47" value="<?php echo $donnees210['UH47'];?>"/>

					<p class="p_men_admin">Titre du lien 8</p>
					<p class="p_men_admin">url 8</p>
					<input class="inp_men_admin" type="text" name="NH48" id="NH48" value="<?php echo $donnees210['NH48'];?>"/>
					<input class="inp_men_admin" type="text" name="UH48" id="UH48" value="<?php echo $donnees210['UH48'];?>"/>
				</form>
			</div>
		</div><br><br>
		<?php $req250=$bdd1->query('SELECT * FROM menuB');
			$donnees250=$req250->fetch();
			?>
	<p style="text-align:center;margin:auto"><input style="width:120px;color:blue" type="button" name="inp_mb" id="inp_mb" value="MENU BAS"/><span style="width:100px">&nbsp;</span><input style="width:120px;color:black" type="button" name="inp_mb2" id="inp_mb2" value="Cacher"/><p>
			<div id="contenair_menu_bas">
				<form method="post" action="menusB.php" method="post"/>
					<p class="p_men_admin">Menu BAS (15 Liens)</p>
					<p><input type="submit" value="Envoyer Liens Menu BAS"/></p>
					<div class="cont_menuB">
						<!--1-->
						<div class="p_men_adminB">Titre du lien 1 <input class="inp_men_adminB" type="text" name="MB12" id="MB12" value="<?php if(isset($donnees250['B12'])){echo $donnees250['B12'];}?>"/>
						</div>
						<div class="p_men_adminB">url1 <input class="inp_men_adminB" type="text" name="MB11" id="MB11" value="<?php if(isset($donnees250['B11'])){echo $donnees250['B11'];}?>"/>
						</div>
						<!--2-->
						<div class="p_men_adminB">Titre du lien 2 <input class="inp_men_adminB" type="text" name="MB22" id="MB22" value="<?php if(isset($donnees250['B22'])){echo $donnees250['B22'];}?>"/>
						</div>	
						<div class="p_men_adminB">url2 <input class="inp_men_adminB" type="text" name="MB21" id="MB21" value="<?php if(isset($donnees250['B21'])){echo $donnees250['B21'];}?>"/>
						</div>
						<!--3-->
						<div class="p_men_adminB">Titre du lien 3 <input class="inp_men_adminB" type="text" name="MB32" id="MB32" value="<?php if(isset($donnees250['B32'])){echo $donnees250['B32'];}?>"/>
						</div>
						<div class="p_men_adminB">url3 <input class="inp_men_adminB" type="text" name="MB31" id="MB31" value="<?php if(isset($donnees250['B31'])){echo $donnees250['B31'];}?>"/>
						</div>
						<!--4-->
						<div class="p_men_adminB">Titre du lien 4 <input class="inp_men_adminB" type="text" name="MB42" id="MB42" value="<?php if(isset($donnees250['B42'])){echo $donnees250['B42'];}?>"/>
						</div>
						<div class="p_men_adminB">url4 <input class="inp_men_adminB" type="text" name="MB41" id="MB41" value="<?php if(isset($donnees250['B41'])){echo $donnees250['B41'];}?>"/>
						</div>
						<!--5-->
						<div class="p_men_adminB">Titre du lien 5 <input class="inp_men_adminB" type="text" name="MB52" id="MB52" value="<?php if(isset($donnees250['B52'])){echo $donnees250['B52'];}?>"/>
						</div>
						<div class="p_men_adminB">url5 <input class="inp_men_adminB" type="text" name="MB51" id="MB51" value="<?php if(isset($donnees250['B51'])){echo $donnees250['B51'];}?>"/>
						</div>
						<!--6-->
						<div class="p_men_adminB">Titre du lien 6 <input class="inp_men_adminB" type="text" name="MB62" id="MB62" value="<?php if(isset($donnees250['B62'])){echo $donnees250['B62'];}?>"/>
						</div>
						<div class="p_men_adminB">url6 <input class="inp_men_adminB" type="text" name="MB61" id="MB61" value="<?php if(isset($donnees250['B61'])){echo $donnees250['B61'];}?>"/>
						</div>
						<!--7-->
						<div class="p_men_adminB">Titre du lien 7 <input class="inp_men_adminB" type="text" name="MB72" id="MB72" value="<?php if(isset($donnees250['B72'])){echo $donnees250['B72'];}?>"/>
						</div>
						<div class="p_men_adminB">url7 <input class="inp_men_adminB" type="text" name="MB71" id="MB71" value="<?php if(isset($donnees250['B71'])){echo $donnees250['B71'];}?>"/>
						</div>
						<!--8-->
						<div class="p_men_adminB">Titre du lien 8 <input class="inp_men_adminB" type="text" name="MB82" id="MB82" value="<?php if(isset($donnees250['B82'])){echo $donnees250['B82'];}?>"/>
						</div>
						<div class="p_men_adminB">url8 <input class="inp_men_adminB" type="text" name="MB81" id="MB81" value="<?php if(isset($donnees250['B81'])){echo $donnees250['B81'];}?>"/>
						</div>
						<!--9-->
						<div class="p_men_adminB">Titre du lien 9 <input class="inp_men_adminB" type="text" name="MB92" id="MB92" value="<?php if(isset($donnees250['B92'])){echo $donnees250['B92'];}?>"/>
						</div>
						<div class="p_men_adminB">url9 <input class="inp_men_adminB" type="text" name="MB91" id="MB91" value="<?php if(isset($donnees250['B91'])){echo $donnees250['B91'];}?>"/>
						</div>
						<!--10-->
						<div class="p_men_adminB">Titre du lien 10 <input class="inp_men_adminB" type="text" name="MB102" id="MB102" value="<?php if(isset($donnees250['B102'])){echo $donnees250['B102'];}?>"/>
						</div>
						<div class="p_men_adminB">url10 <input class="inp_men_adminB" type="text" name="MB101" id="MB101" value="<?php if(isset($donnees250['B101'])){echo $donnees250['B101'];}?>"/>
						</div>
						<!--11-->
						<div class="p_men_adminB">Titre du lien 11 <input class="inp_men_adminB" type="text" name="MB112" id="MB112" value="<?php if(isset($donnees250['B112'])){echo $donnees250['B112'];}?>"/>
						</div>
						<div class="p_men_adminB">url11 <input class="inp_men_adminB" type="text" name="MB111" id="MB111" value="<?php if(isset($donnees250['B111'])){echo $donnees250['B111'];}?>"/>
						</div>
						<!--12-->
						<div class="p_men_adminB">Titre du lien 12 <input class="inp_men_adminB" type="text" name="MB122" id="MB122" value="<?php if(isset($donnees250['B122'])){echo $donnees250['B122'];}?>"/>
						</div>
						<div class="p_men_adminB">url12 <input class="inp_men_adminB" type="text" name="MB121" id="MB121" value="<?php if(isset($donnees250['B121'])){echo $donnees250['B121'];}?>"/>
						</div>
						<!--13-->
						<div class="p_men_adminB">Titre du lien 13 <input class="inp_men_adminB" type="text" name="MB132" id="MB132" value="<?php if(isset($donnees250['B132'])){echo $donnees250['B132'];}?>"/>
						</div>
						<div class="p_men_adminB">url13 <input class="inp_men_adminB" type="text" name="MB131" id="MB131" value="<?php if(isset($donnees250['B131'])){echo $donnees250['B131'];}?>"/>
						</div>
						<!--14-->
						<div class="p_men_adminB">Titre du lien 14 <input class="inp_men_adminB" type="text" name="MB142" id="MB142" value="<?php if(isset($donnees250['B142'])){echo $donnees250['B142'];}?>"/>
						</div>
						<div class="p_men_adminB">url14 <input class="inp_men_adminB" type="text" name="MB141" id="MB141" value="<?php if(isset($donnees250['B141'])){echo $donnees250['B141'];}?>"/>
						</div>
						<!--15-->
						<div class="p_men_adminB">Titre du lien 15 <input class="inp_men_adminB" type="text" name="MB152" id="MB152" value="<?php if(isset($donnees250['B152'])){echo $donnees250['B152'];}?>"/>
						</div>
						<div class="p_men_adminB">url15 <input class="inp_men_adminB" type="text" name="MB151" id="MB151" value="<?php if(isset($donnees250['B151'])){echo $donnees250['B151'];}?>"/>
						</div>
					</div>
			</form>
			</div>
<!--div page-->
		</div>
      <br><br><br><br><br>
	</body>
</html>