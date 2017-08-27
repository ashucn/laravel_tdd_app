@extends('layouts.user')

@section('page_title')
  User Profile
@endsection

@section('content')
  <div class="col-md-6">
    User Profile
    <br>
    <avatar-upload img-url="{{Auth::user()->avatar}}"></avatar-upload>
  </div>

@endsection

@section('scripts')
<script src="{{mix('/js/userProfile.js')}}"></script>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{mix('/css/croppie.css')}}">
@endsection
