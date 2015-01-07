@extends('master')

@section('content')

  <h2>Authors List</h2>

  <table class="table table-hover">
    <tr>
      <th>Author Name</th>
      <th>Added on</th>
      <th>Actions</th>
    </tr>
    @foreach($authors as $author)
      <tr>
        <td>{{ HTML::link('author/'.$author->id, $author->name) }}</td>
        <td>{{ $author->created }}</td>
        <td>
          {{ HTML::link('author/'.$author->id.'/update', '', array('class'=>'icon-pencil', 'title'=>'Edit Author')) }}
          {{ HTML::link('author/'.$author->id.'/delete', '', array('class'=>'icon-trash', 'title'=>'Delete Author')) }}
        </td>
      </tr>
    @endforeach
  </table>

@endsection
