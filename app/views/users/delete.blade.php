@extends('master')

@section('content')
  <div class="alert alert-danger">
    <h2>Confirm Delete?</h2>
    <p>Are you sure you wan't to delete user '{{ $user->username }}'? This action cannot be undone.</p>
  </div>
  {{ Form::open(array('url'=>'user/'.$user->id.'/deleted', 'method'=>'post')) }}
    {{ Form::hidden('id', $user->id) }}
    {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
    {{ HTML::link(URL::previous(), 'Go back', array('class'=>'btn btn-warning')) }}
  {{ Form::close() }}
@endsection
