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

directions.setOrigin(L.latLng(10.702153574060667, 122.97508255034256));

let test = [
    [10.702153574060667, 122.97508255034256],
    [10.704683695515799, 122.96218648939896],
    [10.698498199064593, 122.96218047077997],
    [10.676485828610616, 122.95316569007701],
    [10.67735036225555, 122.9509662786848],
    [10.669509916754725, 122.94745560519357],
    [10.670131973777483, 122.946093043014],
    [10.666747646373937, 122.94360897938316],
    [10.666136125896848, 122.94476769367759],
    [10.661387948727644, 122.94232885810129],
    [10.65861897610613, 122.94834919511607],
    [10.660781587558162, 122.94943307879657],
    [10.661804320144972, 122.94721220973224],
    [10.676260613652854, 122.95316396145017],
    [10.698479142266782, 122.96207151167681],
    [10.704793695696443, 122.9623340017605],
    [10.70222978276871, 122.97515510665687],
]

for(var i = 0; i < test.length; i++) {
    directions.addWaypoint(i, L.latLng(test[i]));
}

directions.setDestination(L.latLng(10.702153574060667, 122.97508255034256));

directions.query();


console.log(directions);