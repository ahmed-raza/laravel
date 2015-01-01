@extends('master')

@section('content')

  @if(Auth::check() && $blogs->user_email == Auth::user()->email)
    <h2>Delete '{{ $blogs->title }}'</h2>
    <p>Are you sure you want to delete '{{ $blogs->title }}'? This action cannot be undone.</p>
    {{ Form::open(array('url'=>'blog/deleted', 'method'=>'post')) }}
      {{ Form::hidden('id', $blogs->id) }}
      {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
      {{ HTML::link('blog/'.$blogs->id, 'Go back', array('class'=>'btn btn-warning')) }}
    {{ Form::close() }}
  @endif

@endsection
