@extends('layouts.event')

@section('content')

<form action="{{route('event-store')}}" method="POST">
  {{csrf_field()}}
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Add New Event</div>

      <div class="panel-body">
        @include('includes.message.error')
        @include('includes.message.success')
          <div class="form-group">
            <label for="event_title">Event Title</label>
            <input type="text" class="form-control" name="title" id="event_title" placeholder="Event Title">
          </div>
          <div class="form-group">
            <label for="event_address">Address</label>
            <input type="address" class="form-control" name="address" id="event_address" placeholder="Select Address From Map" disabled>
          </div>
          <div class="form-group">
            <label for="event_s_date">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="event_s_date" placeholder="Start Date">
          </div>
          <div class="form-group">
            <label for="event_e_date">End Date</label>
            <input type="date" class="form-control" name="end_date" id="event_e_date" placeholder="End Date">
          </div>
          <div class="form-group">
            <label for="event_description">Description</label>
            <textarea name="description" class="form-control" id="event_description" cols="30" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>
    </div>
  </div>
{{--Google maps--}}
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Select City</div>

      <div class="panel-body">
        <google-maps></google-maps>
      </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
  <script src="{{mix('/js/vue2googlemaps.js')}}"></script>
  <script>
      const app = new Vue({
          el: '#app',
          data :{
              lat: '34.0501695',
              lng:'-118.1663621'
          }
      });
  </script>
@endsection

@section('styles')
  <style>
  </style>
@endsection
