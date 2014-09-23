@extends('master')

@section('content')

  <div class="row">
    <div class="span4 offset4">
      <div class="well">
        <legend>Please Sign In</legend>
        {{ Form::open(array('url'=>'login/user', 'method'=>'POST')) }}
        {{ Form::text('email', '', array('class'=>'span3', 'placeholder'=>'Email')) }}
        {{ Form::password('password', array('class'=>'span3', 'placeholder'=>'Password')) }}
        {{ Form::submit('Sign In', array('class'=>'btn btn-success')) }}
        {{ HTML::link('register', 'Register', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>

@endsection
