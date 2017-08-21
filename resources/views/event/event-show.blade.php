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