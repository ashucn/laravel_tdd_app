@extends('layouts.user')

@section('page_title')
  User Profile
@endsection

@section('content')

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Profile</div>
          <div class="panel-body">
            @include('includes.message.error')
            @include('includes.message.success')
            <div class="text-center">
                <avatar-upload img-url="{{Auth::user()->avatar}}"></avatar-upload>
            </div>
            <hr>
            <form action="{{route('profile-save')}}" method="POST">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{Auth::user()->email}}" disabled="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nickname</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{Auth::user()->name}}" name="name">
              </div>
              <google-maps :lat="{{ Auth::user()->lat == null ? 34.0501695 : Auth::user()->lat }}" :lng="{{ Auth::user()->lng==null ? -118.1663621 : Auth::user()->lng }}"></google-maps>

              <hr>
              <button type="submit" class="btn btn-success btn-block btn-lg m-b-30">Submit</button>
            </form>
          </div>
      </div>
  </div>

@endsection

@section('scripts')
<script src="{{mix('/js/vue2googlemaps.js')}}"></script>
<script src="{{mix('/js/userProfile.js')}}"></script>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{mix('/css/croppie.css')}}">
<style>
    hr{
        margin-top: 38px;
        margin-bottom: 32px;
    }
</style>
@endsection
