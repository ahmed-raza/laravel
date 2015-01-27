@extends('master')

@section('content')

  <h2>Uploads</h2>

  {{ Form::open(array('route'=>'gallery.store','enctype' => 'multipart/form-data','files'=>true)) }}
  {{ Form::label('photo', 'Photo') }}
  {{ Form::file('photo') }}
  {{ Form::submit('Upload') }}
  {{ Form::close() }}

  {{ Form::open(array('route'=>'uploads.store','enctype' => 'multipart/form-data','files'=>true)) }}
  {{ Form::label('video', 'Video') }}
  {{ Form::file('video') }}
  {{ Form::submit('Upload') }}
  {{ Form::close() }}

@endsection
