L.mapbox.accessToken = 'pk.eyJ1Ijoiam9uYXNicm9zIiwiYSI6ImNqdnRldjMzYTNmejAzeXVpaHg5YzNzNGEifQ.4GyCI7XIdAkZ-sFTsfhjpA';
var map = L.mapbox.map('mapbox__inner', null, {
    zoomControl: true,
})
  .setView([10.6840, 122.9563], 13)
  .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

// move the attribution control out of the way
map.attributionControl.setPosition('bottomleft');

// create the initial directions object, from which the layer
// and inputs will pull data.
var directions = L.mapbox.directions();

var directionsLayer = L.mapbox.directions.layer(directions)
    .addTo(map);

var directionsInputControl = L.mapbox.directions.inputControl('inputs', directions)
    .addTo(map);

var directionsErrorsControl = L.mapbox.directions.errorsControl('errors', directions)
    .addTo(map);

var directionsRoutesControl = L.mapbox.directions.routesControl('routes', directions)
    .addTo(map);

var directionsInstructionsControl = L.mapbox.directions.instructionsControl('instructions', directions)
    .addTo(map);

let waypoints = [];

if( waypoints.length ) {
    for(var i = 0; i < waypoints.length; i++) {
        directions.addWaypoint(i, L.latLng(waypoints[i]));
    }  
    
    directions.query();
}
// cclick event listener
map.on('click', function(e) {
    waypoints.push([e.latlng.lat, e.latlng.lng]);    
    let waypointIndex = waypoints.length - 1;
    let latLng = L.latLng(waypoints[waypointIndex]);

    if( waypointIndex == 0 ) {
        directions.setOrigin(latLng);
    } else {
        directions.addWaypoint(waypointIndex, latLng);   
        directions.setDestination(latLng);                
    }
    directions.query();
});

console.log(directions);