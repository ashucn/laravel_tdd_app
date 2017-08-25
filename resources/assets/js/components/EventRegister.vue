<template>
    <div class="EventRegister__wrapper">
        <button class="btn m-t-15" :class="mode" @click="handleRegister">{{text}}</button>
        <span class="badge badge-default m-t-20" style="float: right !important;">{{count}}</span><br>
    </div>
</template>

<script>
    import {registerUrl} from './../config'
    export default {
        props: ['text', 'mode', 'eventId', 'count'],
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
                        toastr.options.positionClass = "toast-bottom-right";
                        if(response.status == 200){
                            console.log(response.data)
                            toastr.success(this.text + ' the event successfully!!')
                            this.mode = this.mode=='btn-danger'? 'btn-success':'btn-danger'
                            this.text = this.text=='Register'? 'De-Register':'Register'
                            if(response.data[1]==2){
                                this.count++;
                            } else {
                                this.count--;
                            }
                        }
                        else{
                            toastr.error(this.text + ' the event failed...')
                        }
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
