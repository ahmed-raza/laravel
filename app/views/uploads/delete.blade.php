@extends('master')

@section('content')
  <h2>Delete Song</h2>
  <p>Are you sure you want to delete the songs "{{ $song->orig_name }}". This action cannot be undone.</p>
  {{ Form::open(array('method'=>'DELETE', 'route'=>array('uploads.destroy', $song->id))) }}
  {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
  {{ HTML::link('uploads', 'Go back', array('class'=>'btn btn-warning')) }}
  {{ Form::close() }}
@endsection
