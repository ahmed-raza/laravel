@extends('master')

@section('content')

  <h3 class="pull-left">{{ $blogs->title }}</h3>
  <div class="pull-right">
    {{ HTML::link('blog', 'Go back') }}
    @if(!Auth::guest() && $blogs->user_email == Auth::user()->email)
    {{ HTML::link('blog/post/'.$blogs->id.'/edit', 'Edit') }}
    @endif
  </div>
  <div class="clearfix"></div>
  <strong><i>{{ $blogs->user_name }}</i></strong>
  <small style="float:right;">{{ $blogs->created }}</small>
  <p>{{ $blogs->body }}</p>

@endsection
