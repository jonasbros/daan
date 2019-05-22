<template>
    <div class="mapbox__component-container">
        <div class="waypoint__controls" v-if="controls === 'true'">
            <button class="button is-primary" @click="deleteAll">Delete All Waypoints</button>
            <button class="button is-primary" @click="deleteLast">Delete Last Waypoint</button>
            <button class="button is-primary">Save</button>
        </div>

        <div class="columns">
            <div class="column is-two-thirds">           
                <div class="mapbox__container">
                    <div id="mapbox__inner"></div>
                </div>    
            </div>        
            
            <div class="waypoint__list-container column" v-if="waypointslist === 'true'">
                <ul class="waypoint__list">
                    <li v-for="(waypoint, i) in waypoints" :key="i">
                        <span class="is-size-7">
                            ( {{ waypoint[0] + ', ' + waypoint[1] }} )
                        </span>                    
                    </li>                
                </ul>
            </div>
        </div> <!-- .columns -->
        
    </div>
</template>

<script>
    export default {
        props: [
            'controls',
            'waypointslist',
            'routes'
        ],
        data() {
            return {
                waypoints: [],
            }            
        },
        created() {
            this.parseRoute();
        },      
        mounted() {                     
            this.init(); 
        },
        methods: {
            init() {
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

                 if( this.waypoints.length ) {
                    for(var i = 0; i < this.waypoints.length; i++){
                        console.log(this.waypoints[i]);
                        let latLng = L.latLng(this.waypoints[i][0], this.waypoints[i][1]);
                        if( i === 0 ) {
                            directions.setOrigin(latLng);
                        }

                        if( i === this.waypoints.length - 1 ) {
                            directions.setDestination(latLng);
                        }
                        directions.addWaypoint(i, latLng);
                    }                      
                    directions.query();
                }

                console.log(directions);
                // cclick event listener
                map.on('click', (e) => {
                    this.waypoints.push([e.latlng.lat, e.latlng.lng]);    
                    let waypointIndex = this.waypoints.length - 1;
                    let latLng = L.latLng(this.waypoints[waypointIndex]);

                    if( waypointIndex == 0 ) {
                        directions.setOrigin(latLng);
                    } else {
                        directions.addWaypoint(waypointIndex, latLng);   
                        directions.setDestination(latLng);                
                    }
                    directions.query();
                });
            }, // init
            parseRoute() {
                this.waypoints = this.routes.split(';');
                this.waypoints.join();

                this.waypoints = this.waypoints.map( (item) => {
                    item = item.split(',');      
                    return item;
                } );
            }, // parseRoute
            deleteAll() {
                alert('1');
            },// deleteAll
            deleteLast() {
                alert(2);
            }, //deleteLast
        }
    }
</script>

<style>
    @import 'https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.css';
    @import 'https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.css';
</style>
