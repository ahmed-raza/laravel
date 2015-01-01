@extends('master')

@section('content')

  <h2>Add New Author</h2>

  {{ Form::open(array('url'=>'author/add', 'method'=>'POST')) }}
  <p>
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', '', array('placeholder'=>'Author name')) }}
  </p>
  <p>
    {{ Form::label('bio', 'Biography:') }}
    {{ Form::textarea('bio', '', array('placeholder'=>'Author biography')) }}
  </p>
  <p>
    {{ Form::submit('Add Author', array('class'=>'btn btn-success')) }}
    {{ HTML::link(URL::previous(), 'Go back', array('class'=>'btn btn-warning')) }}
  </p>
  {{ Form::close() }}

@endsection
