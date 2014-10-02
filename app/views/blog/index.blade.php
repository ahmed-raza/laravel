@extends('master')

@section('content')

  <h1>Authors Blog Page</h1><span>{{ HTML::link('blog/new', 'New post') }}</span>

  <ul>
  @foreach ($blogs as $blog)
  <li>{{ HTML::link('blog/post/'.$blog->id, $blog->title) }}</li>
  @endforeach
  </ul>

@endsection
