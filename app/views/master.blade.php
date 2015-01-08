<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="_token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/bootstrap.min.css') }}
  {{ HTML::style('css/bootstrap-responsive.css') }}
  {{ HTML::style('css/bootstrap-responsive.min.css') }}
  {{ HTML::style('css/style.css') }}
  {{ HTML::script('js/jquery-1.10.1.js') }}
  {{ HTML::script('js/bootstrap.js') }}
  {{ HTML::script('js/jquery-2.1.1.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/test.jquery.js') }}
  {{ HTML::script('ckeditor/ckeditor.js') }}
  {{ HTML::script('yoxview/yoxview-init.js') }}
  <script>CKEDITOR.replace('content');</script>
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
        <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-th-list"></span></a>
        {{ HTML::link('/', 'Laravel', array('class'=>'brand')) }}
        <div class="nav-collapse collapse">
          <ul class="nav pull-right">
            <li>{{ HTML::link('/', 'Home') }}</li>
            <li>{{ link_to_route('posts.index', 'Blog') }}</li>
            <li>{{ link_to_route('gallery.index', 'Gallery') }}</li>
            @if(Auth::user())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-user"></i> {{ Auth::user()->username }}
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('profile') }}"><i class="icon-user"></i> Profile</a></li>
                @if(Auth::user()->user_rank == 'sadmin')
                <li class="divider"></li>
                <li><a href="{{ url('authors') }}"><i class="icon-pencil"></i> Authors</a></li>
                <li><a href="{{ url('users') }}"><i class="icon-user"></i> Users</a></li>
                <li class="divider"></li>
                @endif
                <li><a href="{{ url('logout') }}"><i class="icon-off"></i> Logout</a></li>
              </ul>
            </li>
            @else
            <li>{{ HTML::link('login', 'Login') }}</li>
            @endif
          </ul>
            </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row-fluid">
      @include('plugins.plugin')
      @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
      @endif
      @yield('content')
      @section('Modals')
        @if(Auth::user())
          @include('plugins.upload_modal')
        @endif
      @endsection
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#show').click(function(){
        $('#comment-field').fadeToggle('slow');
      });
    });
  </script>
</body>
</html>
<script>
  $('.dropdown-toggle').dropdown();
</script>
