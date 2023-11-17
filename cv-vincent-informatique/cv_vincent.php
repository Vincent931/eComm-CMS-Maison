<?php
$monfichier = fopen('compteur.txt', 'r+');
$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
fclose($monfichier);
//echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width"/>
		<link rel="stylesheet" href="cv.css"/>
		<title>CV développeur PHP de Vincent Nguyen, pour les recruteurs</title>
		<meta name="description" content="Vincent NGUYEN vous propose ses services via ce Curriculum Vitae"/>
	</head>

	<body>
		<div id="page">
			<header><nav><ul><li><a href="index">Lettre</a></li>
					<li><a href="#IntWeb">Solution d'emploi Web</a></li>
					<li><a href="#Connaissances et engagements personnel">Engagements</a></li>
				    <li><a href="../1-bouquin/">Livre</a></li>
				    <li><a href="../chatt/">Sujets/Commentaires</a></li>
				    <li><a href="https://foss-nature-8.com">Mécanique</a></li>
				    <li><a href="../accueil.html">i-Commerce</a></li></nav></header>

			<section>
			
					<div id="titrea">
						<h1 id="#IntWeb">Intégrer une solution d'emploi en Développement Web (PHP Symfony)</h1>
							<blockquote>C'est en marchant que l'on fait sa route...</blockquote>
					</div>
				<article id="articlea">
					
					
					<div id="sous_bloca1">
						<h3>Compétences</h3>
							<p>Développer 1 site ecommerce en HTML5, CSS3, MySQL, Javascript, JQuery & Native PHP</br>
							-<a href="https://vincent-dev-web.fr">Des sites développés comme https://vincent-dev-web.fr</a></br>
							-Apprendre les bases du langage PHP en Programmation Orientée Objet <a href="https://openclassrooms.com/fr/course-certificates/2182047415">(certifié)</a></br>
							-Utiliser un CMS comme WordPress ou Prestashop</br><br>
							-Configurer, installer, utiliser WampServer (serveur Local) sous Win7/8/10</br><br>
							-Configurer, installer, utiliser Mamp (serveur Local) sous Mac Os X (el capitan 10.11.6 et +)<br><br>
							-Configurer, installer, utiliser LAMPP (serveur Local) sous Ubuntu 20.04.01 (Linux)<br><br>
							-Sécuriser les échanges sur Internet <a href="https://openclassrooms.com/fr/course-certificates/8595663454">(certifié)</a><br>
							-Utiliser le réseau Tor pour contourner la censure <a href="https://openclassrooms.com/fr/course-certificates/7859520246">(certifié)</a><br>
							</p>
					</div>
					
					
					<div id="sous_bloca2">
						<h3>Mes Certificats</h3>
						    <p>
						    -Git & GitHub <a href="https://openclassrooms.com/fr/course-certificates/4779774140">(Certifié)</a><br>
						    -Symfony 5 web <a href="https://openclassrooms.com/fr/course-certificates/9042405172">(certifié)</a><br>
						    -Growth Hacking (Les bases) <a href="ude.my/UC-a6136f8d-5e3e-4682-b94b-050074613bfa">(certifié)</a><br>
						    -MySQL (Toutes les commandes, jointures, transactions, vues etc...) <a href="https://openclassrooms.com/fr/course-certificates/1513798116">(certifié)</a><br>
							-PHP Programmation Orientée Objet <a href="https://openclassrooms.com/fr/course-certificates/2182047415">(certifié)</a><br>
							-PHP - Les bases et les conceptions de Sites avec MySQL <a href="https://openclassrooms.com/fr/course-certificates/4704692931">(certifié)</a></br>
							-Javascript-POO-Les Bases <a href="https://openclassrooms.com/fr/course-certificates/7399454650">(certifié)</a></br>
							-HTML5 & CSS3 <a href="https://openclassrooms.com/fr/course-certificates/4907283994">(certifié)</a><br>
						<h3>Autres</h3>
							-Failles XSS-Injections SQL</br>
							-MySQL(PDO) et PHPMyAdmin</br>
							-C++ <a href="https://openclassrooms.com/fr/course-certificates/7575336770">(certifié)</a><br>
							-L'ensemble de <a href="https://www.linkedin.com/in/vincent-dev-web-nguyen/">mes certificats sur Linkedin</a></p>
					</div>
					
					<div id="photo"><br><img src="contact.jpg"/>
					</div>
				</Article>
					
				<article id="articleb">
							<h1 id="#formations">Formations</h1>
							<p>
							2021: <span style="color:green">Git & GitHub</span> en Ligne sur https://Openclassrooms.com<br>
							2021: <span style="color:green">Symfony 5 (web)</span> en Ligne sur https://Openclassrooms.com<br>
							2021: Namespaces sur https://Openclassrooms.com <br>
							2021: Cours udemy de Growth Hacking sur les hacks d'expansion Start Up sur https://www.udemy.com<br>
							2020-2021: Formation Autodidacticielle sur "MySQL - Administrez vos BDDs" en Ligne sur https://Openclassrooms.com<br>
							2020: Formation Autodidacticielle sur "PHP - Programmation Orientée Objet" en Ligne sur https://Openclassrooms.com<br>
							2019-20: Formation Autodidacticielle sur "Appendre à programmer en C++" en Ligne sur https://Openclassrooms.com</br>
							2018-19: Formations Autodidacticielle sur "PHP", "HTML5/CSS3", "Javascript" en Ligne sur https://Openclassrooms.com</br>
							2017-18: Formation Autodidacticielle sur "Bases de l'Informatique" en Ligne sur https://Openclassrooms.com</br>
							1998-00: Formation Professionnelle d'Electronicien Grand Public/Diplômé Niv IV</br>
							1996   : DUT génie Electrique et Informatique Industrielle</br>
							</p>
					<article>

					<article id="articlec">
							<h1 id="#expériences professionnelles">Expériences Professionnelles</h1>
							<p>2019-2021 : Création de l'enseigne ventesurinternetfacile renommé Vincent-Dev-Web<br>
							Développement du code Frontend et Backend (Administration complète du Ecommerce avec ERP)</p>
							<p>2002   : Agent de Production Machine</br>
							2000-01 : Technicien Magasin dans une Ecole d'ingenieur</br></p>
							<span id="souligne">4 Pôles:</span>
							<ol><li>-Réseaux et traitements des signaux</li>
							<li>-Informatique</li>
							<li>-Electrotechnique</li>
							<li>-Robotique et Domotique</li></ol>
							1999   : Technicien Audiovisuel</p>
					</article>
			
					<article id="articled">
							<div id="blocd1">
								<h3 id="#1">Mes Coordonnées</h3>
								<p>Vincent Nguyen</br>
								49000 Angers</br>
								Portable: 06......37</br>
								<a href="redirect-mailto.php">q........@.....................fr</a></br>
								Permis B, Véhicule</br></p>
							</div>

							<div id="blocd2">
								<h3 id="Connaissances et engagements personnel">Connaissances et engagements personnel</h3>
								<p>-WordPress et Blogs</br>
								-Réseaux Sociaux et comptes publicitaires</br>
								-Linux & administration</br>
								-Le Hacking éthique</br></p>
					</article><br><br>
					<div id="titrea2">
							<blockquote>C'est en marchant que l'on fait sa route...</blockquote>
					</div>
			</section>
			
			<footer>
			<?php echo '<h2>Cette page a été vue ' . $pages_vues . ' fois.</h2>'; ?>
			<nav>
				<ul>
				   	<li><a href="index">Lettre</a></li>
				    <li><a href="../1-bouquin/">Livre</a></li>
				    <li><a href="../chatt/">Sujets/Commentaires</a></li>
				    <li><a href="https://foss-nature-8.com">Mécanique</a></li>
				    <li><a href="../accueil.html">i-Commerce</a></li>
				    <li><a href="../pronos-strike/">Pronostiqueur PMU</a></li>
				</ul>
			</nav>
			</footer>
		</div>
	</body>
</html>
