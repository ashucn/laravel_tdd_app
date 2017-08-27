Vue.component('avatar-upload', require('./components/AvatarUpload.vue'));

var app = new Vue({
    el: '#app',
    data: {
    },
    methods: {
        updateUserAvatar(){
            console.log("updateUserAvatar");
        }
    }
});
