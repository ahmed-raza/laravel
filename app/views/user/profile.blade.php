@extends('master')

@section('content')

  <div class="span5 well">
    {{ HTML::link('profile/edit', '', array('class'=>'close icon icon-pencil', 'id'=>'opener')) }}
    <p>Welcome to your profile page '<i>{{ Auth::user()->username }}</i>'.</p>
    @if(Auth::user()->user_rank == 'sadmin')
      <p>Rank: Super Admin</p>
    @elseif(Auth::user()->user_rank == 'user')
      <p>Rank: User</p>
    @endif
    @if(Auth::user()->phone)
      <p>Phone: {{ Auth::user()->phone }}</p>
    @endif
    @if(Auth::user()->city)
      <p>City: {{ Auth::user()->city }}</p>
    @endif
    @if(Auth::user()->country && Auth::user()->country !== '-1')
      <p>Country: {{ Auth::user()->country }}</p>
    @endif
    @if(Auth::user()->bio)
      <p>{{ Auth::user()->bio }}</p>
    @endif
  </div>

@endsection
