Vue.component('event-register', require('./components/EventRegister.vue'));
Vue.component('clock', require('./components/Clock.vue'));

var app = new Vue({
  el: '#app',
  data: {
      lat: '34.0501695',
      lng: '-118.1663621',
  }
});
