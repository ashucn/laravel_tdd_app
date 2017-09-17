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
            <label for="event_title">* Event Title</label>
            <input type="text" class="form-control" name="title" id="event_title" placeholder="Event Title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="event_s_date">* Start Date</label>
            <input type="date" class="form-control" name="start_date" id="event_s_date" placeholder="Start Date" >
          </div>
          <div class="form-group">
            <label for="event_e_date">* End Date</label>
            <input type="date" class="form-control" name="end_date" id="event_e_date" placeholder="End Date" >
          </div>
          <div class="form-group">
            <label for="event_description">* Description</label>
            <textarea name="description" class="form-control" id="event_description" cols="30" rows="10">{{old('description')}}</textarea>
          </div>
      </div>
    </div>
  </div>
{{--Google maps--}}
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">* Event Address</div>
      <div class="panel-body">
        <google-maps :lat='lat' :lng='lng'></google-maps>
      </div>
    </div>
    <button type="submit" class="btn btn-success btn-block btn-lg m-b-30">Submit</button>
  </div>
</form>
@endsection

@section('scripts')
  <script src="{{mix('/js/vue2googlemaps.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
  <script>
      var app = new Vue({
          el: '#app',
          data :{
              lat: 34.0501695,
              lng: -118.1663621,
          },
          created: function(){
            // console.log(this.lat);
          }
      });
      CKEDITOR.replace( 'event_description' , {
          toolbarGroups :[
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
            { name: 'links' },
            { name: 'insert' },
            '/',
            { name: 'styles' },
            { name: 'colors' },
            { name: 'tools' },
            { name: 'others' }
          ]
      } );

  </script>

@endsection

@section('styles')
  <style>
  </style>
@endsection
