@extends('master')

@section('content')

  <h1>New Blog Post</h1>

  {{ Form::open(array('url'=>'blog/add', 'method'=>'post')) }}
  <p>
    {{ Form::label('title','Title') }}
    {{ Form::text('title') }}
  </p>
  <p>
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', '', array('class'=>'span6')) }}
  </p>
  <p>
    {{ Form::submit('Post', array('class'=>'btn btn-success')) }}
  </p>
  {{ Form::close() }}

@endsection
