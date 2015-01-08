@extends('master')

@section('content')
  <h4>{{ $post->title }}</h4>
  <p>By {{ Users::find($post->user_id)->username }}</p>
  <p>Body</p>
  <p>{{ $post->body }}</p>

@endsection
