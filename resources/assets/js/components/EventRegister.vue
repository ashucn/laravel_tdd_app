<template>
    <div class="EventRegister__wrapper">
        <button class="btn" :class="mode" @click="handleRegister">{{text}}</button>
    </div>
</template>

<script>
    import {registerUrl} from './../config'
    export default {
        props: ['text', 'mode', 'eventId'],
        data() {
            return {}
        },
        methods: {
            handleRegister(){
                console.log(this.eventId)
                let postDate = {
                    eventId: this.eventId
                }
                axios.post(registerUrl, postDate)
                    .then(response => {
                        console.log(response)
                    })
            }
        },
        mounted() {
            console.log('Event Register Form mounted.')
        }
    }
</script>
<style lang="css">
</style>
