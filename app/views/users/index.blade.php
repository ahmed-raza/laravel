@extends('master')

@section('content')
  <h2>{{ $user->username }}</h2>
  @if($user->user_rank == 'sadmin')
  <p>Rank: Super Admin</p>
  @elseif($user->user_rank == 'user')
  <p>Rank: User</p>
  @endif
  @if($user->bio)
  <p>{{ $user->bio }}</p>
  @endif
@endsection
