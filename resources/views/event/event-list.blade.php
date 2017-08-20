@extends('layouts.event')

@section('content')

<div class="col-sm-6">
<h1>Upcoming Events</h1>
  @foreach($upcomingEvents as $ue)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>{{$ue->title}}</h3>
        <small><strong>Address:</strong> {{$ue->address}}</small>
      </div>
      <div class="panel-body">
        <div>
        </div>
        <div>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="..." alt="..." width="80" height="80">
              </a>
            </div>
            <div class="media-body">
              <strong>Start date: </strong>{{$ue->start_date}} <br>
              <strong>End date: </strong>{{$ue->end_date}}<br>
              <strong>Created by: </strong>{{$ue->creator->name}}<br><br>
                {{$ue->description}}
            </div>
          </div>


        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="col-sm-6">

  <h1>Past Events</h1>
  @if(count($pastEvents) == 0)
    <h3>no past event!</h3>
  @endif

  @foreach($pastEvents as $pe)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>{{$pe->title}}</h3>
        <small><strong>Address:</strong> {{$pe->address}}</small>
      </div>
      <div class="panel-body">
        <div class="meta-data">
          abc
        </div>
        <div>
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="..." alt="..." width="80" height="80">
              </a>
            </div>
            <div class="media-body">
              <strong>Start date: </strong>{{$pe->start_date}} <br>
              <strong>End date: </strong>{{$pe->end_date}}<br>
              <strong>Created by: </strong>{{$pe->creator->name}}<br><br>
              {{$ue->description}}
            </div>
          </div>


        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection