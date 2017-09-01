<template>
    <div class="clock wrapper">
        <div>
            {{yearMonthString}} {{dateTimeString}}
        </div>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        data() {
            return {
                yearMonthString: '',
                dateTimeString: ''
            }
        },
        created() {
            setInterval(()=>{
                this.dateTimeString = moment().format('ddd h:mm:ss A');
            }, 1000);
            this.dateTimeString = moment().format('ddd h:mm:ss A')
            this.yearMonthString = moment().format('MMMM YYYY')
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>