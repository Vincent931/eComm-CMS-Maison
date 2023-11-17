<?php ?>	</br></br></br></br>

			<form class="form_99_600" style="text-align:right;margin:auto" method="POST" action="donnees-du-compte<?php if(isset($urlpanier) AND $urlpanier=="?url=panier"){echo $urlpanier;}?>">
				<p><label for="mail">Votre adresse mail&nbsp;</label><input class="inp_99" placeholder="user@mail.fr" type="mail" name="mail" id="mail"/></p>
				<p><label for="mail2">Confirmation mail&nbsp;</label><input class="inp_99" placeholder="user@mail.fr" type="email" id="mail2" name="mail2"/></p>
				<p><label for="pseudo">Choisissez un pseudo&nbsp;</label><input class="inp_99" placeholder="monpseudo" type="text" name="pseudo" id="pseudo"/></p>
				<p><label for="mdp">Mot de passe&nbsp;</label><input type="password" class="inp_99" placeholder="Je crée mon MdP" id="mdp" name="mdp"/></p>
	            <p><label for="mdp2">Mot de passe&nbsp;</label><input type="password" class="inp_99" placeholder="Je confirme mon MdP" id="mdp2" name="mdp2"/></p></br>
				<p style="text-align:center"><input class="inp_99_subm" style="width:200px" type="submit" value="Valider"/></p>
			</form>