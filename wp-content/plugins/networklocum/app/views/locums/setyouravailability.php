<!--middle start here-->
 	<div class="midcol">
		<div class="container">
			<div class="row">

		
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>

// First, create an object containing LatLng and population for each city.
var citymap = {};
citymap['chicago'] = {
  center: new google.maps.LatLng(41.878113, -87.629798),
  population: 2714856
};

var myLatlng = new google.maps.LatLng(41.878113, -87.629798);
function initialize() {
  var mapProp = {
    center:myLatlng,
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });

var oneKm = 0.621371; 
var oneMile = 1;
var populationOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#AA0000',
      fillOpacity: 0.35,
      map: map,
      center: myLatlng,
      radius: 1.60934*100999			// miles
    };
  
  // Add the circle for this city to the map.
 var  cityCircle = new google.maps.Circle(populationOptions);
 
}
google.maps.event.addDomListener(window, 'load', initialize);
 
</script>

 	 
<h1> Set your avaiability </h1>
  
			

<br />
<div id="googleMap" style="width: 600px; height: 400px;"></div>


</div>
</div>
</div>
<!--middle end	 here-->


