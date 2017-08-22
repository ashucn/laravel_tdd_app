@extends('layouts.event')

@section('content')

  <div class="col-sm-8 col-sm-offset-2">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>{{$event->title}}</h2>
        </div>
        <div class="panel-body">
          <div>
            <strong>Description</strong> <br>
            {{$event->description}}
          </div>
          <div id="map"></div>
          <table class="table table-striped m-t-20">
            <tr><td>Start date</td><td>{{$event->start_date}}</td></tr>
            <tr><td>End date</td><td>{{$event->end_date}}</td></tr>
            <tr><td>Address</td><td>{{$event->address}}</td></tr>
            <tr><td>Created by</td><td>{{$event->creator->name}}</td></tr>
          </table>
        </div>
      </div>
  </div>
@endsection

@section('scripts')

<script>
  function initMap() {
    var uluru = {
      lat: {{$event->lat}},
      lng: {{$event->long}}
    };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var maker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"></script>
@endsection

@section('styles')
<style>
  #map {
    margin-top: 30px;
    height: 300px;
    width:100%;
  }
</style>
@endsection
