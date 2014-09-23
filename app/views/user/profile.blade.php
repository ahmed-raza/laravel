@extends('master')

@section('content')

  <div class="row">
    <div class="span6 well">
      Welcome to your profile page {{ Auth::user()->username }}.
    </div>
  </div>
    <p>You can:</p>
    <ul>
      <li>{{ HTML::link('author/new', 'Add Author') }}</li>
      <li>Edit Author</li>
      <li>Delete Author</li>
    </ul>

@endsection
