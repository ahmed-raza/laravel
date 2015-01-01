@extends('master')

@section('content')

  <h3 class="pull-left">{{ $blogs->title }}</h3>
  <div class="pull-right">
    {{ HTML::link('blog', 'Go back') }}
    @if(!Auth::guest() && $blogs->user_email == Auth::user()->email)
    {{ HTML::link('blog/'.$blogs->id.'/edit', 'Edit') }}
    {{ HTML::link('blog/'.$blogs->id.'/delete', 'Delete') }}
    @endif
  </div>
  <div class="clearfix"></div>
  <strong><i>{{ $blogs->user_name }}</i></strong>
  <small style="float:right;">{{ $blogs->created }}</small>
  <p>{{ $blogs->body }}</p>
  @if(Auth::user())
  <div id="comment-field">
    {{ Form::open(array('url'=>'blog/comment', 'method'=>'post')) }}
      {{ Form::hidden('id', $blogs->id) }}
      {{ Form::label('comment', 'Comment') }}
      {{ Form::textarea('comment','',array('class'=>'span7', 'rows'=>'2')) }}
      {{ Form::submit('Comment', array('class'=>'btn btn-success')) }}
    {{ Form::close() }}
  </div>
  @else
    <div class="alert alert-warning">{{ HTML::link('login', 'Login') }} to comment.</div>
  @endif
@endsection
