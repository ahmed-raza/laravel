@extends('master')

@section('content')

  <h2>Edit {{ $authors->name }}'s Profile</h2>

  {{ Form::open(array('url'=>'author/updated', 'method'=>'POST')) }}
  <p>
    {{ Form::hidden('id', $authors->id) }}
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', $authors->name, array('placeholder'=>'Author name')) }}
  </p>
  <p>
    {{ Form::label('bio', 'Biography:') }}
    {{ Form::textarea('bio', $authors->bio, array('placeholder'=>'Author biography')) }}
  </p>
  <p>
    {{ Form::submit('Edit Author', array('class'=>'btn btn-success')) }}
    {{ HTML::link('author/'.$authors->id, 'Go back', array('class'=>'btn btn-warning')) }}
  </p>
  {{ Form::close() }}

@endsection
