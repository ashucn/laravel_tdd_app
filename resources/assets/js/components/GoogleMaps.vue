<template>
<div class="EventLocation_Wrapper">
<label for="location">Please Input Address</label>
<div id="location">
<gmap-autocomplete @place_changed="setPlace($event)"></gmap-autocomplete>
  <gmap-map
    :center="location"
    :zoom="12"
    style="width: 100%; height: 400px;"
  >
    <gmap-marker
      :position="location"
      :clickable="true"
      :draggable="true"
      @click="center=location"
      @place_changed="setPlace($event)"
      @position_changed="markerDrag($event)"
    ></gmap-marker>
  </gmap-map>
</div>

<input type="hidden" name="lat" v-model="location.lat">
<input type="hidden" name="lng" v-model="location.lng">
<input type="hidden" name="address" v-model="location.event_address">

</div>

</template>

<script>
export default {
    data () {
      return {
        location: {  lat: 34.05, lng: -118.22, event_address: ""},
        markers: [{lat: 34.05, lng: -118.22}]
      }
    },
    methods:{
        setPlace(place){
          console.log("setPlace: ", place.formatted_address);
          this.location = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng(),
            event_address: place.formatted_address
          }

          $("#event_address").val(place.formatted_address);
          console.log(this.location);
        },
        markerDrag (position){
          this.location = {
            lat: position.lat(),
            lng: position.lng()
          }
        }
    },
    mounted() {
        console.log('Google Maps Component mounted.')
    }
}
</script>
<style lang="css">
#location input {
  margin-top: 10px;
  margin-bottom: 20px;
  width: 100%;
  padding: 10px;
  border: #dddddd 1px solid;
}
</style>
