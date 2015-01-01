@extends('master')

@section('content')

  <div class="alert alert-danger">
    <h4 class="alert-heading">Error 404</h4>
    <p>Requested page '{{ Request::url() }}' not found on this server. {{ HTML::link(URL::previous(), 'Go back') }}</p>
  </div>

@endsection
