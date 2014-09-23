@extends('master')

@section('content')

  <h1>{{ $authors->name }}</h1>
  <p>{{ $authors->bio }}</p>
  <strong>{{ $authors->created }}</strong>

  <p>
    {{ Form::open(array('url'=>'author/update', 'method'=>'post', 'style'=>'display:inline;')) }}
      {{ Form::hidden('id', $authors->id) }}
      {{ Form::submit('Edit', array('class'=>'btn btn-primary')) }}
    {{ Form::close() }}

    {{ Form::open(array('url'=>'author/delete', 'method'=>'post', 'style'=>'display:inline;')) }}
      {{ Form::hidden('id', $authors->id) }}
      {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
      {{ HTML::link('/', 'Go back', array('class'=>'btn btn-warning')) }}
    {{ Form::close() }}
  </p>

@endsection
