@extends('layouts.event')

@section('content')
  <div class="col-md-6">
  </div>
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
          <a href="http://maps.apple.com/?q={{$ue->lat}},{{$ue->lng}}"><i class="fa fa-map-marker fa-2x"
                                                                          aria-hidden="true"></i></a>
        </div>
        <div class="panel-body">
          <div>
          </div>
          <div>
            <div class="media">
              <div class="media-body">
                <strong>Start date: </strong>{{$ue->start_date}} <br>
                <strong>End date: </strong>{{$ue->end_date}}<br>
                <strong>Participants: </strong><span
                    class="badge badge-default">{{count($ue->participantUsers) + 1}}</span><br>
                <strong>Created by: </strong>{{$ue->creator->name}}
                <small class="text-muted">{{$ue->created_at}}</small>
                @if(Auth::id() == $ue->user_id)
                  <span class="badge badge-warning">I'm Creator!</span>
                @endif

                <br><br>
                {!! limit_words($ue->description, 30) !!}<br>
                @if($ue->user === null && Auth::id() != $ue->user_id)
                  <event-register text="Register" mode="btn btn-success m-t-15" event-id="{{$ue->id}}"></event-register>
                @elseif(Auth::id() != $ue->user_id)
                  <event-register text="De-Register" mode="btn btn-danger m-t-15" event-id="{{$ue->id}}"></event-register>
                @endif
              </div>
            </div>


          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{--past events--}}
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
          <a href="http://maps.apple.com/?q={{$pe->lat}},{{$pe->lng}}"><i class="fa fa-map-marker fa-2x"
                                                                          aria-hidden="true"></i></a>
        </div>
        <div class="panel-body">
          <div>
            <div class="media">
              <div class="media-body">
                <strong>Start date: </strong>{{$pe->start_date}} <br>
                <strong>End date: </strong>{{$pe->end_date}}<br>
                <strong>Participants: </strong><span
                    class="badge badge-default">{{count($pe->participantUsers) + 1}}</span><br>

                <strong>Created by: </strong>{{$pe->creator->name}}
                <small class="text-muted">{{$pe->created_at}}</small>
                @if(Auth::id() == $pe->user_id)
                  <span class="badge badge-warning">I'm Creator!</span>
                @endif
                <br><br>
                {!! limit_words($pe->description, 30) !!}
              </div>
            </div>


          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

@section('scripts')
  <script src="{{mix('/js/eventRegister.js')}}"></script>
  <script>
      var app = new Vue({
          el: '#app',
          data :{
              lat: '34.0501695',
              lng:'-118.1663621',
          }
      });
  </script>
@endsection

