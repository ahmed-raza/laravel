@extends('master')

@section('content')
  <h4>Create a blog post</h4>
  {{ Form::open(array('route'=>'posts.store')) }}
  <p>
    {{ Form::label('title','Title') }}
    {{ Form::text('title') }}
  </p>
  <p>
    {{ Form::label('body','Body') }}
    {{ Form::textarea('body','', array('class'=>'ckeditor')) }}
  </p>
  <p>
    {{ Form::label('m_desc','Description of your post') }}
    {{ Form::text('m_desc') }}
  </p>
  <p>
    {{ Form::label('m_keyw','Please insert keywords separated by commas.') }}
    {{ Form::text('m_keyw') }}
  </p>
  <p>
    {{ Form::submit('Create Post', array('class'=>'btn btn-success')) }}
    {{ link_to_route('posts.index', 'Cancel', null, array('class'=>'btn btn-warning')) }}
  </p>
  {{ Form::close() }}
@endsection
