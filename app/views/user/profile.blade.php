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
  <div class="span5">
    @if($authors->count() != 0)
    <strong>Authors: {{ $tauthors }}</strong>
    <table class="table table-hover span5">
      <tr>
        <th>Author ID</th>
        <th>Author Name</th>
        <th>Actions</th>
      </tr>
      @foreach ($authors as $author)
        <tr>
          <td>{{ $author->id }}</td>
          <td>{{ HTML::link('author/'.$author->id, $author->name) }}</td>
          <td>
            {{ HTML::link('author/'.$author->id.'/update','',array('class'=>'icon icon-pencil','title'=>'Edit User')) }}
            {{ HTML::link('author/'.$author->id.'/delete','',array('class'=>'icon icon-remove','title'=>'Delete User')) }}
          </td>
        </tr>
      @endforeach
    </table>
    @endif
    @if(Auth::user()->user_rank == 'sadmin')
    <strong>Users: {{ $tusers }}</strong>
    <table class="table table-hover span12">
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ HTML::link('user/'.$user->id, $user->username) }}</td>
          <td>
            {{ HTML::link('user/'.$user->id.'/edit', '', array('class'=>'icon icon-pencil', 'title'=>'Edit User')) }}
            {{ HTML::link('user/'.$user->id.'/delete', '', array('class'=>'icon icon-remove', 'title'=>'Delete User')) }}
          </td>
        </tr>
      @endforeach
    </table>
    @endif
  </div>

@endsection
