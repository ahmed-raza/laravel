@extends('master')

@section('content')

  <h2>Gallery</h2>
  <div class="yoxview">
  @foreach($photos as $photo)
    <div class="span4 img-space">
      <a href="img/{{ $photo->img_name }}">
        <img src="img/{{ $photo->img_name }}" alt="{{ $photo->img_name }}" title="{{ $photo->img_name }}" class="img img-polaroid" width="370" height="265">
      </a>
    </div>
  @endforeach
  </div>

@endsection
