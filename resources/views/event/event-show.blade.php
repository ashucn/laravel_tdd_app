@extends('layouts.event')

@section('content')

  <div class="col-sm-12">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>{{$event->title}}</h2>
      </div>
      <div class="panel-body">
        <div id="map"></div>
        <table class="table table-striped m-t-20">
          <tr>
            <td>Address</td>
            <td><a href="http://maps.apple.com/?q={{$event->lat}},{{$event->lng}}">{{$event->address}} <i
                    class="fa fa-map-marker fa-2x" aria-hidden="true"></i></a></td>
          </tr>
          <tr>
            <td>Start date</td>
            <td>{{$event->start_date}}</td>
          </tr>
          <tr>
            <td>End date</td>
            <td>{{$event->end_date}}</td>
          </tr>
          <tr>
            <td>Created by</td>
            <td>{{$event->creator->name}}</td>
          </tr>
          <tr>
            <td>Participants</td>
            <td>
              <span class="badge badge-default">{{count($event->participantUsers) + 1}}</span>
              <a class="badge badge-success" href="#">{{$event->creator->name}}</a>
              @foreach($event->participantUsers as $p)
                <a class="badge badge-info" href="#">{{$p->name}}</a>
              @endforeach
            </td>
          </tr>
        </table>

        <div>
          <h2><strong>Description</strong></h2>
          {!!$event->description!!}
        </div>

      </div>
    </div>
  </div>
@endsection

@section('scripts')

  <script>
      function initMap() {
          var event_address = {
              lat: {{$event->lat}},
              lng: {{$event->lng}}
          };
          var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: event_address
          });
          var maker = new google.maps.Marker({
              position: event_address,
              map: map
          });
      }
  </script>

  <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"></script>
@endsection

@section('styles')
  <style>
    #map {
      margin-bottom: 30px;
      height: 300px;
      width: 100%;
    }

    img {
      height: auto !important;
    }
  </style>
@endsection
