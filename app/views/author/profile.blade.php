@extends('master')

@section('content')

  <h1>{{ $authors->name }}</h1>
  <strong>Created At: {{ $authors->created }}</strong>
  <p>{{ $authors->bio }}</p>

  <p>
    {{ HTML::link('author/'.$authors->id.'/update', 'Edit', array('class'=>'btn btn-primary')) }}
    {{ HTML::link('author/'.$authors->id.'/delete', 'Delete', array('class'=>'btn btn-danger')) }}
    {{ HTML::link(URL::previous(), 'Go back', array('class'=>'btn btn-warning')) }}
  </p>

@endsection
