@extends('master')

@section('content')

  {{ Form::open(array('url'=>'user/editted', 'method'=>'post')) }}
  <div class="span5">
    <p>
      {{ Form::hidden('id', $user->id) }}
      {{ Form::label('username','Username') }}
      {{ Form::text('username', $user->username, array('class'=>'span5', 'disabled')) }}
    </p>
    <p>
      {{ Form::label('email','Email') }}
      {{ Form::text('email', $user->email, array('class'=>'span5', 'disabled')) }}
    </p>
    <p>
      {{ Form::label('password','Password') }}
      {{ Form::password('newpass',array('placeholder'=>'New Password', 'class'=>'span5')) }}
      {{ Form::password('conpass',array('placeholder'=>'Confirm Password', 'class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('bio','Bio') }}
      {{ Form::textarea('bio', $user->bio, array('class'=>'span5')) }}
    </p>
  </div>
  <div class="span5">
    <p>
      {{ Form::label('phone','Phone') }}
      {{ Form::text('phone', $user->phone, array('class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('city','City') }}
      {{ Form::text('city', $user->city, array('class'=>'span5')) }}
    </p>
    <p>
      {{ Form::label('country','Country') }}
      {{ Form::select('country', array('-1'=>'Select one','Pakistan'=>'Pakistan'), $user->country) }}
    </p>
    <p>
      {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
      {{ HTML::link('users', 'Go back', array('class'=>'btn btn-warning')) }}
    </p>
  </div>
  {{ Form::close() }}

@endsection
