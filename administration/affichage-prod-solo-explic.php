<table>
	<tr><?php echo $donnees2['precisiona'];?>
	</tr>
	<tr><?php if(isset($donnees2['image1']) AND !empty($donnees2['image1'])) {
					echo '<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image1']).'"/>'.'</td>';}
	if(isset($donnees2['image2']) AND !empty($donnees2['image2'])) {
	echo '<td class="espace_image1">'.' '.'</td>'.'<td>'.'<img id="largeur_image" src="../publicimgs/'.htmlspecialchars($donnees2['image2']).'"/>'.'</td>'.
	'<td class="espace_image2">'.' '.'</td>';}?>
	</tr>
</table>