@extends('master')

@section('content')

  {{ Form::open(array('url'=>'profile/edit/confirm', 'method'=>'post')) }}
  <div class="span5">
    <p>
      {{ Form::label('username','Username') }}
      {{ Form::text('username', Auth::user()->username, array('class'=>'span5', 'disabled')) }}
    </p>
    <p>
      {{ Form::label('email','Email') }}
      {{ Form::text('email', Auth::user()->email, array('class'=>'span5', 'disabled')) }}
    </p>
    <p>
      {{ Form::label('password','Password') }}
      {{ Form::password('password',array('placeholder'=>'Current Password', 'class'=>'span5')) }}
      {{ Form::password('newpass',array('placeholder'=>'New Password', 'class'=>'span5')) }}
      {{ Form::password('conpass',array('placeholder'=>'Confirm Password', 'class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('bio','Bio') }}
      {{ Form::textarea('bio', Auth::user()->bio, array('class'=>'span5')) }}
    </p>
  </div>
  <div class="span5">
    <p>
      {{ Form::label('phone','Phone') }}
      {{ Form::text('phone', Auth::user()->phone, array('class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('city','City') }}
      {{ Form::text('city', Auth::user()->city, array('class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('country','Country') }}
      {{ Form::select('country', array('-1'=>'Select one','Pakistan'=>'Pakistan')) }}
    </p>
    <p>
      {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
      {{ HTML::link(URL::previous(), 'Go back', array('class'=>'btn btn-warning')) }}
    </p>
    <div class="alert alert-warning">
      <h4>Alert</h4>
      <p>In order to make changes, you need to enter your current password too.</p>
    </div>
  </div>
  {{ Form::close() }}

@endsection
