<?php require 'texte1.php';
$req40=$bdd1->query('SELECT * FROM google_mp');
$donnees10=$req40->fetch();
?>
<script src="https://maps.google.com/maps/api/js?key=<?php echo $donnees10['api']; ?>" type="text/javascript"></script>

		<script async type="text/javascript">
			// On initialise la latitude et la longitude de entp (centre de la carte)
			var lat = <?php echo $donnees10['lat']; ?>;
			var lon = <?php echo $donnees10['lon']; ?>;
			var map = null;
			// Fonction d'initialisation de la carte
			function initMap() {
				// Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
				map = new google.maps.Map(document.getElementById("map"), {
					// Nous plaçons le centre de la carte avec les coordonnées ci-dessus
					center: new google.maps.LatLng(lat, lon), 
					// Nous définissons le zoom par défaut
					zoom: 12, 
					// Nous définissons le type de carte (ici carte routière)
					mapTypeId: google.maps.MapTypeId.ROADMAP, 
					// Nous activons les options de contrôle de la carte (plan, satellite...)
					mapTypeControl: true,
					// Nous désactivons la roulette de souris
					scrollwheel: false, 
					mapTypeControlOptions: {
						// Cette option sert à définir comment les options se placent
						style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 
					},
					// Activation des options de navigation dans la carte (zoom...)
					navigationControl: true, 
					navigationControlOptions: {
						// Comment ces options doivent-elles s'afficher
						style: google.maps.NavigationControlStyle.ZOOM_PAN 
					}
				});
				// Nous ajoutons un marqueur
				var marker = new google.maps.Marker({
				// Nous définissons sa position (syntaxe json)
				position: {lat: lat, lng: lon},
				// Nous définissons à quelle carte il est ajouté
				map: map
			});
			}
			window.onload = function(){
				// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
				initMap(); 
			};
</script>