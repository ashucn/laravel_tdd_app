@extends('layouts.event')

@section('content')
<div class="col-md-6"></div>
<div class="col-md-6"><a href="{{route('event-add')}}" class="btn btn-primary pull-right m-r-10">Add Events</a></div>

<div class="col-sm-6 ">
  @include('includes.message.error')
  @include('includes.message.success')
  <h1>Upcoming Events</h1>
  @foreach($upcomingEvents as $ue)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3><a href="{{route('event-view', $ue->slug)}}">#{{$ue->id}} {{$ue->title}}</a></h3>
        <small><strong>Address:</strong> {{$ue->address}}</small>
        <a href="http://maps.apple.com/?q={{$ue->lat}},{{$ue->lng}}"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></a>
      </div>
      <div class="panel-body">
        <div>
        </div>
        <div>
          <div class="media">
{{--            <div class="media-left">
              <a href="#">
                <img class="media-object" src="..." alt="..." width="80" height="80">
              </a>
            </div>--}}
            <div class="media-body">
              <strong>Start date: </strong>{{$ue->start_date}} <br>
              <strong>End date: </strong>{{$ue->end_date}}<br>
              <strong>Created by: </strong>{{$ue->creator->name}}<br><br>
            {!! limit_words($ue->description, 30) !!}
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
        <h3><a href="{{route('event-view', $pe->slug)}}">#{{$pe->id}} {{$pe->title}}</a></h3>
        <small><strong>Address:</strong> {{$pe->address}}</small>
        <a href="http://maps.apple.com/?q={{$pe->lat}},{{$pe->lng}}"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></a>
      </div>
      <div class="panel-body">
        <div>
          <div class="media">
{{--            <div class="media-left">
              <a href="#">
                <img class="media-object" src="..." alt="..." width="80" height="80">
              </a>
            </div>--}}
            <div class="media-body">
              <strong>Start date: </strong>{{$pe->start_date}} <br>
              <strong>End date: </strong>{{$pe->end_date}}<br>
              <strong>Created by: </strong>{{$pe->creator->name}}<br><br>
            {!! limit_words($pe->description, 30) !!}
            </div>
          </div>


        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
