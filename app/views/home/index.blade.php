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
    <video id="video" width="400">
      <source src="videos/Bodybuilding.mp4" type="video/mp4">
      <source src="videos/Bodybuilding.webm" type="video/webm">
    </video>
    @foreach($audios as $audio)
      <p>{{ $audio->orig_name; }}</p>
      <audio id="audio" width="400" controls>
        <source src="audios/{{ $audio->file_name }}" type="audio/mpeg">
      </audio>
    @endforeach
  </div>

@endsection
