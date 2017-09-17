@extends('layouts.user')

@section('page_title')
  User Profile
@endsection

@section('content')
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Profile</div>
          <div class="panel-body">
            <div class="text-center">
                <avatar-upload img-url="{{Auth::user()->avatar}}"></avatar-upload>
            </div>
<hr>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
          </div>
      </div>
  </div>
{{--Google maps--}}
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">* Location</div>
      <div class="panel-body">
        <google-maps :lat='lat' :lng='lng'></google-maps>
      </div>
    </div>
  </div>

    <button type="submit" class="btn btn-success btn-block btn-lg m-b-30">Submit</button>
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
