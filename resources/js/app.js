window.Vue = require('vue');
var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');
require('./new-route.js');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mapbox', require('./components/MapboxComponent.vue').default);

const app = new Vue({
    el: '#app',
});
