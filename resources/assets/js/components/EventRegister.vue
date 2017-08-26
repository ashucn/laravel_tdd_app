<template>
    <div class="EventRegister__wrapper">
        <button class="btn m-t-15" :class="mode" @click="handleRegister" :disabled="is_submitting">{{text}}</button>
        <span class="badge badge-default m-t-20" style="float: right !important;">{{count}}</span><br>
    </div>
</template>

<script>
    import {registerUrl} from './../config'

    export default {
        props: ['text', 'mode', 'eventId', 'count'],
        data() {
            return {
                origin_text:'',
                is_submitting: false
            }
        },
        methods: {
            handleRegister() {
                console.log(this.eventId)
                this.is_submitting = true
                this.origin_text = this.text
                this.text = 'Submitting'
                let postDate = {
                    eventId: this.eventId
                }
                axios.post(registerUrl, postDate)
                    .then(response => {
                        toastr.options.positionClass = "toast-bottom-right";
                        this.is_submitting = false
                        if (response.status == 200) {
                            this.count = response.data.type == 1 ? Number(this.count) - 1 : Number(this.count) + 1;
                            toastr.success(this.origin_text + ' the event successfully!!')
                            this.mode = this.mode == 'btn-danger' ? 'btn-success' : 'btn-danger'
                            this.text = this.origin_text == 'Register' ? 'De-Register' : 'Register'
                        }
                        else {
                            this.text = this.origin_text
                            toastr.error(this.origin_text + ' the event failed...')
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
