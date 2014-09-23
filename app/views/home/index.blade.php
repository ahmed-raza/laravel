@extends('master')

@section('content')

  <h1>Authors Home Page</h1>

  <ul>
  @foreach ($authors as $author)
  <li>{{ HTML::link('author/'.$author->id, $author->name) }}</li>
  @endforeach
  </ul>

@endsection
