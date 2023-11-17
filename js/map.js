// Create the script tag, set the appropriate attributes
var script = document.createElement('script');
var apikey = document.getElementById('apikey').value;
script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBnUwTpnY7SrdoShD8IYLg3c1nE6VuJgXY&callback=initMap';
script.async = true;

var lat = 0;
var lon = 0;
let map;

// Attach your callback function to the `window` object
window.initMap = function() {
  // JS API is loaded and available
  const myLatLng = { lat: 47.47291946411133, lng: -0.587777018547058 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: myLatLng,
  });
  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Vincent-Dev-Web",
  });
};

// Append the 'script' element to 'head'
document.head.appendChild(script);


initMap();

//import { MarkerClusterer } from "@googlemaps/markerclusterer";

/*function initMap(lat, lon) {
// On initialise la latitude et la longitude de entp (centre de la carte)
	
	let latval = document.getElementById('lat').value;
	let lonval = document.getElementById('long').value;
	//lat = Number(latval);
	//lon = Number(lonval);
	lat = latval;
	lon = lonval;
	console.log(lat);
	console.log(lon);
	var map = null;
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lon},
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        scrollwheel: false,
        mapTypeControlOptions: {
        	style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
        navigationControl: true, 
		navigationControlOptions: {
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
};*/

/*function initMap() {
  const myLatLng = { lat: -25.363, lng: 131.044 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Vincent-Dev-Web",
  });


*/

