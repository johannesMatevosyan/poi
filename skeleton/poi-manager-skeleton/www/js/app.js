

var map = null;

$(document).ready(function(){		
	
	/**
	 * Load the Google map
	 */
	map = new google.maps.Map(document.getElementById("map"), {center: new google.maps.LatLng(53, -7.5), zoom: 8});
});	
	

