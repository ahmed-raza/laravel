@extends('master')

@section('content')

  <h2>Delete Author</h2>
  <p>Are you sure you want to delete <i><strong>{{ $authors->name }}</strong></i>. This action cannot be undone.</p>

  {{ Form::open(array('url'=>'author/deleted', 'method'=>'post')) }}
    {{ Form::hidden('id', $authors->id) }}
    {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
    {{ HTML::link('author/'.$authors->id, 'Go back', array('class'=>'btn btn-warning')) }}
  {{ Form::close() }}

@endsection
