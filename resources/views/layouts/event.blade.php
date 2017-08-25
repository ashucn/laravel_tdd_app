<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page_title')Ashu Events</title>

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
 {{-- toastr --}}
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{mix('css/event.css')}}">
  @yield('styles')
</head>
<body class="body_event">
<div id="app">
  @include('includes.topnav')
  <div class="container">
    @yield('content')
  </div>
</div>
<script src="/js/event.js"></script>
@yield('scripts')
</body>
</html>
