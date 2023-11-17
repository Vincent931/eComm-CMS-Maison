<?php ?>	</br></br></br></br></br></br></br></br></br></br>

			<form method="POST" action="tarifs.list.php">
				<table>
					<tr>
						<td align="right"><label for="mail">Votre adresse mail </label></td>
						<td><input style="background-color:white;border:1px solid black" type="mail" name="mail" id="mail"/></td>
						<td align="right"><label for="mail2">Confirmation mail </label></td>
		                <td><input style="background-color:white;border:1px solid black" type="email" id="mail2" name="mail2"/></td>
						<td align="right "><label for="pseudo">Choisissez un pseudo </label></td>
						<td><input style="background-color:white;border:1px solid black" type="text" name="pseudo" id="pseudo"/></td>
					</tr>
				</table>
				<table>
					<tr>
						<td align="right"><label for="mdp">Mot de passe </label></td>
	                  	<td><input style="background-color:white;border:1px solid black" type="password" placeholder="Je crée mon MdP" id="mdp" name="mdp"/>
	                  	<td align="right"><label for="mdp2">Confirmation du mot de passe :</label></td>
	                  	<td><input style="background-color:white;border:1px solid black" type="password" placeholder="Je confirme mon MdP" id="mdp2" name="mdp2"/></td>	
						<td><input style="background-color:white;border:1px solid black" type="submit" value="Valider"/></td>
					</tr>
				</table>
			</form>