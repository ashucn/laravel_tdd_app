<template>
    <div class="EventRegister__wrapper">
        <button class="btn m-t-15" :class="btn_mode" @click="handleRegister" :disabled="is_submitting">{{btn_text}}</button>
        <span class="badge badge-default m-t-20" style="float: right !important;">{{btn_count}}</span><br>
    </div>
</template>

<script>
    import {registerUrl} from './../config'

    export default {
        props: ['text', 'mode', 'eventId', 'count'],
        data() {
            return {
                origin_text:'',
                is_submitting: false,
                btn_text: '',
                btn_mode: '',
                btn_count: 1
            }
        },
        created(){
            this.btn_text = this.text
            this.btn_mode = this.mode
            this.btn_count = this.count
        },
        methods: {
            handleRegister() {
                console.log(this.eventId)
                this.is_submitting = true
                this.origin_text = this.btn_text
                this.btn_text = 'Submitting'
                let postDate = {
                    eventId: this.eventId
                }
                axios.post(registerUrl, postDate)
                    .then(response => {
                        toastr.options.positionClass = "toast-bottom-right";
                        this.is_submitting = false
                        if (response.status == 200) {
                            this.btn_count = response.data.type == 1 ? Number(this.btn_count) - 1 : Number(this.btn_count) + 1;
                            toastr.success(this.origin_text + ' the event successfully!!')
                            this.btn_mode = this.btn_mode == 'btn-danger' ? 'btn-success' : 'btn-danger'
                            this.btn_text = this.origin_text == 'Register' ? 'De-Register' : 'Register'
                        }
                        else {
                            this.btn_text = this.origin_text
                            toastr.error(this.origin_text + ' the event failed...')
                        }
                    })
                  .catch(function (error) {
                    console.log(error);
                            toastr.error(this.origin_text + ' refresh the page...')
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
