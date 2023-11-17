<?php session_start(); 
require 'texte1.php';
require 'boutique0.php';
require 'blog2.php';
?>
<!DOCTYPE html>
<html id="bloc_page">
<?php require 'head-js2-ch.php'; ?>
	<body>
		<div>
      <h1>Espace d'administration</h1>
  <?php require 'menu-haut.php';?>
</br></br></br></br>
			<h2 style="text-align:center">Publicité 1 et 2</h2>
			<div id="boutons_connect">
				<img src="../publicimgs/personne_icone.png" style="width:45px">
				<tr>
					<td>
						<a style="border:1px solid black;color:white;text-decoration:none;background-color:#B058CE" href="../accueil.html" target="_blank">Aller sur le site</a>
					</td>
				</tr>
<?php if(isset($_SESSION['message'])){echo '<h3 style="text-align:center">'.$_SESSION['message'].'</h3>';$_SESSION['message']="";} ?>
			</div>
			<p>Les publicités sont situés sur la page https://monsite.com/index.php, en début de page (publicité 1) et fin de page (publicité 2).</p>
			<p>Uploader des images en gardant la proportion 900px(large) x 280px(hauteur): 3.214</p>
		</br>
<div style="display:inline-block">

</div>
	<h3 style="text-align:center; margin:auto; color:green">Publicité 1</h3><br>
	<?php $req1=$bdd1->query('SELECT * FROM publicite1');
	$donnees1=$req1->fetch();?>
	<p><a style="display:block;margin:auto;text-align:center;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;color:black;text-decoration:none;width:120px" href="window-file.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Fichiers Bank</a></p>
	<form style="text-align:right;width:750px;margin:auto" action="publicite1-ch.list.php" name="ch_form" id="ch_form" method="post">
		<?php if (isset($donnees1['image']) AND !empty($donnees1['image'])){ echo '<P style="width:150px;text-align:center;margin:auto">'.'<img style="width:150px;text-align:center;margin:auto" src="../publicimgs/'.$donnees1['image'].'"/>'.'</p>';}?>
		<input style="text-align:center;margin:auto;display:block" type="submit" value="Envoyer"/><br>
<div style="display:inline-block">
	<div style="display:inline:block">
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<h1>','','</h1>');">h1</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<h2>','','</h2>');">h2</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<h3>','','</h3>');">h3</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<p>','','</p>');">Paragraphe</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<span style=&quot;text-decoration:underline&quot;>','','</span>');">Souligné</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<span style=&quot;font-style:bold&quot;>','','</span>');">Gras</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<em>','','</em>');">Italique</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<a href=&quot;https://urlainserer.com&quot;>','','</a>');">Lien</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<a id=&quot;grey_color&quot; href=&quot;https://urlainserer.com&quot;>','','</a>');">Lien bouton</a>
	    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('<a style=&quot;text-decoration:underline;color:#3792E1&quot; href=&quot;email.php&quot;>','','</a>');">MailTo</a>
		<a style="display:inline-block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="javascript:AddText1('','<br>','');">br</a>
	   	<a style="display:inline-block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="image-bank.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Image Bank</a> 
	</div>
</div>
		<p><label for="image">Image </label><input type="text" name="image" id="image" value="<?php if(isset($donnees1['image'])){echo $donnees1['image'];}?>"/></p>
		<p><label for="message">Texte Avant Image (non obligatoire)</label></p>
		<p><textarea style="width:600px;height:80px" name="message" id="message"><?php if(isset($donnees1['texte'])){echo $donnees1['texte'];}?></textarea></p>
		<p><label for="bouton">Bouton Achat (oui/non) </label><input type="text" name="bouton" id="bouton" value="<?php if(isset($donnees1['bouton'])){echo $donnees1['bouton'];}?>"/></p>
		<p><label for="id_prod">ID du produit concerné </label><input type="text" name="id_prod" id="id_prod" value="<?php if(isset($donnees1['id_prod'])){echo $donnees1['id_prod'];}?>"/></p>
		<p style="text-align:center;margin:auto;display:block"><a style="text-align:center;margin:auto;display:block" id="grey_color" href="pub1-erase.php?publicite=publicite1">Effacer</a></p>
	</form>
	<br>
	<p style="width:650px;height:1px;background-color:blue;text-align:center;margin:auto"></p>
	<br>
	<h3 style="text-align:center; margin:auto; color:green">Publicité 2</h3><br>
	<?php $req2=$bdd1->query('SELECT * FROM publicite2');
	$donnees2=$req2->fetch();?>
	<form style="text-align:right;width:750px;margin:auto" action="publicite2-ch.list.php" name="ch_form_un" id="ch_form_un" method="post">
		<?php if (isset($donnees2['image']) AND !empty($donnees2['image'])){ echo '<P style="width:150px;text-align:center;margin:auto">'.'<img style="width:150px;text-align:center;margin:auto" src="../publicimgs/'.$donnees2['image'].'"/>'.'</p>';}?>
		<input style="text-align:center;margin:auto;display:block" type="submit" value="Envoyer"/><br>
<div style="display:inline-block">
	<div style="display:inline:block">
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<h1>','','</h1>');">h1</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<h2>','','</h2>');">h2</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<h3>','','</h3>');">h3</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<p>','','</p>');">Paragraphe</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<span style=&quot;text-decoration:underline&quot;>','','</span>');">Souligné</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<span style=&quot;font-style:bold&quot;>','','</span>');">Gras</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<em>','','</em>');">Italique</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<a href=&quot;https://urlainserer.com&quot;>','','</a>');">Lien</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<a id=&quot;grey_color&quot; href=&quot;https://urlainserer.com&quot;>','','</a>');">Lien bouton</a>
    <a style="border:1px solid black;background-color:#DDE3E3;padding:5px;text-decoration:none;color:black" href="javascript:AddText('<a style=&quot;text-decoration:underline;color:#3792E1&quot; href=&quot;email.php&quot;>','','</a>');">MailTo</a>
	<a style="display:inline-block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="javascript:AddText('','<br>','');">br</a>
	<a style="display:inline-block;border:1px solid black;background-color:#DDE3E3;margin-top:5px;margin-bottom:5px;padding:5px;text-decoration:none;color:black" href="image-bank.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=250px,height=360'); return false;">Image Bank</a> 
	</div>
</div>
		<p><label for="image1">Image </label><input type="text" name="image1" id="image1" value="<?php if(isset($donnees2['image'])){echo $donnees2['image'];}?>"/></p>
		<p><label for="message1">Texte Avant Image (non obligatoire)</label></p>
		<p><textarea style="width:600px;height:80px" name="message1" id="message1"><?php if(isset($donnees2['texte'])){echo $donnees2['texte'];}?></textarea></p>
		<p><label for="bouton1">Bouton Achat (oui/non) </label><input type="text" name="bouton1" id="bouton1" value="<?php if(isset($donnees2['bouton'])){echo $donnees2['bouton'];}?>"/></p>
		<p><label for="id_prod1">ID du produit concerné </label><input type="text" name="id_prod1" id="id_prod1" value="<?php if(isset($donnees2['id_prod'])){echo $donnees2['id_prod'];}?>"/></p>
		<p style="text-align:center;margin:auto;display:block"><a id="grey_color" style="text-align:center;margin:auto;display:block" href="pub2-erase.php?publicite=publicite2">Effacer</a></p>
	</form>
	<br>
	<p style="width:650px;height:1px;background-color:blue;text-align:center;margin:auto"></p>
	<br>
	<h4 style="text-align:center; margin:auto">Listing des produits</h4>
	<br>
	<?php $req = $bdd->query('SELECT * FROM produits ORDER BY id');
while ($donnees = $req->fetch())
{
	$img_type=$donnees['img_type'];
	if($donnees['promotion']=='oui'){
		$ifpromo="oui";
	} else {$ifpromo="non";}

	$req2=$bdd->prepare('SELECT * FROM explications WHERE id_produit=?');
	$req2->execute(array(htmlspecialchars($donnees['id'])));
	$donnees2=$req2->fetch();
?>
	<table id="largeur_table">
		<tr>
			<td><?php if(isset($img_type) AND $img_type=="image"){ ?>		
				<img style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php if($ifpromo=='oui'){echo 'promo-'.htmlspecialchars($donnees['cle_image']);}else{echo htmlspecialchars($donnees['cle_image']);} ?>"/>
			<?php }
			 	if(isset($img_type) AND $img_type=="youtube"){ ?><iframe style="width: 400px; height: 280px" <?php if(substr($donnees['cle_image'],0,3)=="src"){echo $donnees['cle_image'];} else { ?>src="https://www.youtube.com/embed/4Yy_x7nHBhI"<?php } ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			 	<?php
				} 
				if(isset($img_type) AND $img_type=="video"){ ?>
				<video style="text-align:center;width:450px;border-radius:25px/25px;border:1px solid black;margin-left:auto;margin-right:auto" src="../publicimgs/<?php echo $donnees['cle_image'];$req4=$bdd->prepare('SELECT * FROM video WHERE nom=?'); $req4->execute(array($donnees['cle_image'])); $donnees4=$req4->fetch();?>" controls poster="../publicimgs/<?php echo $donnees4['image0'];?>" class="quatre" style="text-align:center"></video>
			<?php }?>
			</td>
			<td>
			<p style="color:blue"><?php echo 'ID : '.htmlspecialchars($donnees['id']); ?></p>
			<p><?php echo 'Nom-image produit : '.htmlspecialchars($donnees['cle_image']); ?></p>
			<p><?php echo htmlspecialchars($donnees['titre']); ?></p>
			<p><?php echo htmlspecialchars($donnees['description']); ?></p>
			</td>
		</tr>
	</table>
	<table>
		<tr><?php if(isset($donnees2['image1']) AND !empty($donnees2['image1'])) {
					echo '<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image1']).'"/>'.'</td>';}
			if(isset($donnees2['image2']) AND !empty($donnees2['image2'])) {
						echo '<td class="espace_image1">'.' '.'</td>'.'<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image2']).'"/>'.'</td>'.
			'<td class="espace_image2">'.' '.'</td>';}
			if(isset($donnees2['image3']) AND !empty($donnees2['image3'])) {
						echo '<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image3']).'"/>'.'</td>';} ?>
		</tr>
</table>
<?php 
} 
$req->closeCursor();
?>
		</div>
      <br><br><br><br><br>
	</body>
</html>