window.Vue = require('vue');
var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mapbox', require('./components/MapboxComponent.vue').default);

require('./new-route.js');

const app = new Vue({
    el: '#app',
});

