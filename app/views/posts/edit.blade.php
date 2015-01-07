@extends('master')

@section('content')

  <h4>Edit blog {{$post->title}}</h4>
  {{ Form::model($post, array('method'=>'PATCH', 'route'=>array('posts.update', $post->id))) }}
  <p>
    {{ Form::label('title','Title') }}
    {{ Form::text('title', Input::old('title')) }}
  </p>
  <p>
    {{ Form::label('body','Body') }}
    {{ Form::textarea('body', Input::old('body'), array('class'=>'ckeditor')) }}
  </p>
  <p>
    {{ Form::label('m_desc','Description of your post') }}
    {{ Form::text('m_desc', Input::old('m_desc')) }}
  </p>
  <p>
    {{ Form::label('m_keyw','Please insert keywords separated by commas.') }}
    {{ Form::text('m_keyw', Input::old('m_keyw')) }}
  </p>
  <p>
    {{ Form::submit('Update', array('class'=>'btn btn-success')) }}
    {{ link_to_route('posts.index', 'Cancel', null, array('class'=>'btn btn-warning')) }}
  </p>
  {{ Form::close() }}

@endsection
