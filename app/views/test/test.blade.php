@extends('master')

@section('content')

  <h2>Hello</h2>
  <div class="row">
    <div class="span4 offset4">
      <div class="well">
        <legend>Test</legend>
        {{ Form::open(array('', 'id'=>'form')) }}
        {{ Form::text('name', '', array('id'=>'name', 'placeholder'=>'Name')) }}
        {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>

@endsection
