<template>
    <div class="mapbox__component-container">
        <div class="waypoint__controls" v-if="controls === 'true'">
            <button v-if="userrole === 'admin:1'" class="button is-danger" @click="askDelete">Delete Route</button>
            <button class="button is-primary" @click="deleteAll">Delete All Waypoints</button>
            <button class="button is-primary" @click="deleteLast">Delete Last Waypoint</button>
            <button class="button is-primary" @click="saveRoute">Save</button>
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

        <textarea 
        name="waypoints_input"
        id="waypoints-input"
        v-model="waypointsString"
        style="display: none;"
        form="waypoints-form"
        ></textarea>
    </div>
</template>

<script>
    export default {
        props: [
            'controls',
            'waypointslist',
            'routes',
            'routeid',
            'userrole',
        ],
        data() {
            return {
                waypoints: [],
                directionsObj: null,
                citySelect: null,
            }            
        },
        computed: {
            waypointsString() {
                //this is the input that will get saved to DB
                return this.waypoints.join(';');
            },
            waypointsLength() {
                return this.waypoints.length - 1;
            }
        },
        created() {
            //process waypoints string from database, turn to array
            this.parseRoute();
        },      
        mounted() {                     
            this.init();             
        },
        methods: {
            init() {
                L.mapbox.accessToken = 'pk.eyJ1Ijoiam9uYXNicm9zIiwiYSI6ImNqdnRldjMzYTNmejAzeXVpaHg5YzNzNGEifQ.4GyCI7XIdAkZ-sFTsfhjpA';
                this.map = L.mapbox.map('mapbox__inner', null, {
                    zoomControl: true,
                })
                .setView([10.6840, 122.9563], 13)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

                // move the attribution control out of the way
                this.map.attributionControl.setPosition('bottomleft');

                // create the initial directions object, from which the layer
                // and inputs will pull data.
                this.directionsObj = L.mapbox.directions();

                var directionsLayer = L.mapbox.directions.layer(this.directionsObj)
                    .addTo(this.map);

                var directionsInputControl = L.mapbox.directions.inputControl('inputs', this.directionsObj)
                    .addTo(this.map);

                var directionsErrorsControl = L.mapbox.directions.errorsControl('errors', this.directionsObj)
                    .addTo(this.map);

                var directionsRoutesControl = L.mapbox.directions.routesControl('routes', this.directionsObj)
                    .addTo(this.map);

                var directionsInstructionsControl = L.mapbox.directions.instructionsControl('instructions', this.directionsObj)
                    .addTo(this.map);

                 if( this.waypoints.length ) {
                    //loop through waypoints array then assign to waypoint
                    for(var i = 0; i <= this.waypointsLength; i++){
                        let latLng = L.latLng(this.waypoints[i][0], this.waypoints[i][1]);
                        if( i === 0 ) {
                            //first waypoint is origin
                            this.directionsObj.setOrigin(latLng);
                        }
                        if( i === this.waypointsLength ) {
                            //last element is destination
                            this.directionsObj.setDestination(latLng);
                        }
                        //elements in middle are waypoints
                        this.directionsObj.addWaypoint(i, latLng);
                    }                
                    //repaint      
                    this.directionsObj.query();
                }
                // cclick event listener
                this.map.on('click', (e) => {
                    console.log(this.waypoints);
                    //if reached max waypoints
                    if( this.waypoints.length >= 25 ) { return; }
                
                    this.waypoints.push([e.latlng.lat, e.latlng.lng]);    
                    
                    let waypointIndex = this.waypointsLength;
                    let latLng = L.latLng(this.waypoints[waypointIndex]);

                    if( waypointIndex == 0 ) {
                        //set first index to origin
                        this.directionsObj.setOrigin(latLng);
                    } else {
                        //add waypoints
                        this.directionsObj.addWaypoint(waypointIndex, latLng);   
                        //newest waypoint becomes destination
                        this.directionsObj.setDestination(latLng);                
                    }
                    //repaint
                    this.directionsObj.query();
                });

                //city select on change
                this.citySelect = document.querySelector('#route-city');
                this.citySelect.addEventListener('change', () => {
                    this.citySelect.onchange = this.changeCityUpdateMap();
                });
                
            }, // init
            parseRoute() {                            
                this.waypoints = this.routes.split(';');
                this.waypoints.join();

                this.waypoints = this.waypoints.map( (item) => {
                    item = item.split(',');      
                    return item;
                } );
                
                if( !this.waypoints.length || this.waypoints[0] == '' || this.waypoints.length <= 1 ) {
                    this.waypoints = [];     
                    return;
                }    
            }, // parseRoute
            deleteAll() {
                this.waypoints.forEach((el, i, arr) => {
                    if( i == 0 ) {
                        this.directionsObj.setOrigin(null);
                    }else if( i == arr.length - 1 ) {
                        this.directionsObj.setDestination(null);
                    }else {
                        this.directionsObj.removeWaypoint(i);
                    }               
                });
                
                this.waypoints = [];
            },// deleteAll
            deleteLast() {
                if( this.waypointsLength > 1 ) {
                    //remove last waypoint
                    this.directionsObj.removeWaypoint(this.waypointsLength);
                    //set destination to lastwaypoint - 1
                    this.directionsObj.setDestination(L.latLng(this.waypoints[this.waypointsLength - 1]));
                }else if( this.waypointsLength == 0 ) {
                    //if no elements, remove origin
                    this.directionsObj.setOrigin(null);
                }else {
                    //if waypoints remaining = 1, remove destination.
                    this.directionsObj.setDestination(null);
                }
                //remove last element from waypoints 
                this.waypoints.pop();     
                //repaint           
                this.directionsObj.query();
            }, // deleteLast
            saveRoute() {
                let form = document.querySelector('#waypoints-form');
                form.submit();
            }, // saveRoute
            askDelete() {
                let del = confirm('Are you sure you want to delete this route?');

                if( del ) {
                    this.deleteRoute();
                }
                return;
            }, // askDelete
            deleteRoute() {     
                let form = document.querySelector('#waypoints-form');
                form.setAttribute('action', '/routes/delete/' + this.routeid);
                form.submit();
            }, // deleteRoute
            changeCityUpdateMap() {
                let coordinates = this.citySelect.value.split(';')[1];                
                coordinates = coordinates.split(', ');
                
                let lat = parseFloat(coordinates[0]);
                let lng = parseFloat(coordinates[1]);

                console.log(lat, lng);

                this.map.flyTo([lat, lng]);
            }
        }
    }
</script>

<style>
    @import 'https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.css';
    @import 'https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.css';
</style>
