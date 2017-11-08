<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Home :: EVENT APP Demo</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{mix('/css/app.css')}}">
  <!-- Styles -->
  <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 64px;
    }

    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 16px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    .subtitle {
      font-size: 22px;
      color: #d0d0d0;
      margin-bottom: 50px;
    }
  </style>
</head>
<body>
<div class="flex-center position-ref full-height">
  <div class="top-right links">
    <a href="{{ url('/events') }}">All Events</a>
    @auth
      <a href="{{ url('/home') }}">Home</a>
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
        Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
      @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        @endauth
  </div>

  <div class="content">
    <div class="title m-b-md">
      Ashu Event App (Demo)
    </div>
    <div class="subtitle">Create your own group and meet people near you who share your interests.</div>

    <div class="links">
      <a href="https://github.com/ashucn/laravel_tdd_app" target="_blank"> <i class="fa fa-github"></i> Github</a> <a
          href=""><i class="fa fa-wechat"></i> ashucn</a>
    </div>
  </div>
</div>
</body>
</html>
