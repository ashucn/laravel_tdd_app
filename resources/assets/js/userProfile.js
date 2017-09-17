Vue.component('avatar-upload', require('./components/AvatarUpload.vue'));
var app = new Vue({
    el: '#app',
    data: {
      lat: 34.0501695,
      lng: -118.1663621
    },
    methods: {
        updateUserAvatar(){
            console.log("updateUserAvatar");
        }
    }
});
