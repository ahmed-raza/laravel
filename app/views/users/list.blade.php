@extends('master')

@section('content')

  <h2>Users List</h2>

  <table class="table table-hover">
    <tr>
      <th>Username</th>
      <th>Rank</th>
      <th>Actions</th>
    </tr>
    @foreach($users as $user)
      <tr>
        <td>{{ HTML::link('user/'.$user->id, $user->username) }}</td>
        <td>
          @if($user->user_rank == 'sadmin')
          Super Admin
          @elseif($user->user_rank == 'user')
          User
          @endif
        </td>
        <td>
          {{ HTML::link('user/'.$user->id.'/edit', '', array('class'=>'icon-pencil', 'title'=>'Edit User')) }}
          {{ HTML::link('user/'.$user->id.'/delete', '', array('class'=>'icon-trash', 'title'=>'Delete User')) }}
        </td>
      </tr>
    @endforeach
  </table>

@endsection
