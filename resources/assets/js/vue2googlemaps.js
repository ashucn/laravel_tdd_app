import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBNQaIjvsoKuOyhDjx_OnOWV7fHxhO9C4U',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
        // (as you require)
    }
})

Vue.component('google-maps', require('./components/GoogleMaps.vue'));