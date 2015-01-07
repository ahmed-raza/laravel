@extends('master')

@section('content')
<div class="span12">
  {{ link_to_route('posts.create', 'Create  a new post', null, array('class'=>'btn btn-primary')) }}
</div>
@if($posts->count())
  <div class="span12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Preview</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ HTML::link('blog/'.$post->slug, $post->title) }}</td>
            <td>{{ substr($post->body, 0, 120).'[...]' }}</td>
            <td>{{ Carbon::createFromTimeStamp(strtotime($post->created_at))->formatLocalized('%A %d %B %Y') }}</td>
            <td>{{ link_to_route('posts.show', 'Preview', array($post->id), array('class'=>'btn btn-info')) }}</td>
            <td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-warning')) }}</td>
            <td>
                {{ Form::open(array('method'=>'DELETE', 'route'=>array('posts.destroy', $post->id))) }}
                {{ Form::submit('Delete', array('class'=>'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  </div>
  @else
  <div class="span4 alert alert-info">You currently have no posts.</div>
@endif
@endsection
