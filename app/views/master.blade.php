<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::script('js/bootstrap.js') }}
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
      {{ HTML::link('/', 'Laravel Login Model', array('class'=>'brand')) }}
      <ul class="nav pull-right">
          <li>{{ HTML::link('/', 'Home') }}</li>
        @if(Auth::user())
          <li>{{ HTML::link('profile', 'Profile') }}</li>
          <li>{{ HTML::link('logout', 'Logout') }}</li>
        @else
          <li>{{ HTML::link('login', 'Login') }}</li>
        @endif
      </ul>
    </div>
  </div>
  <div class="container">
    @include('plugins.plugin')
    @if(Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @yield('content')
  </div>
</body>
</html>
