@extends('master')

@section('content')

  <div class="span7">
    <h1>Authors Home Page</h1>
    <ul>
    @foreach ($authors as $author)
      <li>{{ HTML::link('author/'.$author->id, $author->name) }}</li>
    @endforeach
    </ul>
  </div>
  <div class="span3">
    <video id="video" width="400" controls>
      <source src="videos/Bodybuilding.mp4" type="video/mp4">
    </video>
  </div>

@endsection
