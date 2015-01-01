@extends('master')

@section('content')

  @if(Auth::check() && $blogs->user_email == Auth::user()->email)

  <h2>Edit '{{ $blogs->title }}'</h2>

  {{ Form::open(array('url'=>'blog/edit', 'method'=>'post')) }}
    {{ Form::hidden('id',$blogs->id) }}
  <p>
    {{ Form::label('title','Title') }}
    {{ Form::text('title', $blogs->title) }}
  </p>
  <p>
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', $blogs->body, array('class'=>'span6')) }}
  </p>
  <p>
    {{ Form::submit('Edit', array('class'=>'btn btn-warning')) }}
  </p>
  {{ Form::close() }}

  @else
  <div class="alert alert-danger">
    <h2 class="alert-heading">Access Denied!</h2>
    <p>You are not authorized to edit this blog post.</p>
  </div>
  @endif

@endsection
