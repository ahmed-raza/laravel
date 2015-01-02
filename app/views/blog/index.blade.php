@extends('master')

@section('content')

  <h1>Blog Page</h1>
  @if(Auth::user())
  <span>{{ HTML::link('blog/new', 'New post') }}</span>
  @endif
  <ul>
  @foreach ($blogs as $blog)
  <li>{{ HTML::link('blog/'.$blog->id, $blog->title) }}</li>
  @endforeach
  </ul>

@endsection
