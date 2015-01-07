<?php

class PostController extends BaseController{
  public function index(){
    $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
    return View::make('posts.index')->with('posts', $posts)->with('title', 'Laravel | Blog Page');
  }

  public function create(){
    return View::make('posts.create')->with('title', 'Laravel | Create a Post');
  }

  public function store(){
    $input = Input::all();
    $rules = Post::$rules;
    $v = Validator::make($input, $rules);
    if($v->passes()){
      $post = new Post;
      $post->title =  Input::get('title');
      $post->body = Input::get('body');
      $post->m_keyw = Input::get('m_keyw');
      $post->m_desc = Input::get('m_desc');
      $post->slug = Str::slug(Input::get('title'));
      $post->user_id = Auth::user()->id;
      $post->save();

      return Redirect::route('posts.index');
    }

    return Redirect::back()->withErrors($v)->withInput();
  }

  public function show($id){
    $post = Post::find($id);
    $date = $post->created_at;
    setlocale(LC_TIME, 'Asia/Karachi');
    $date = $date->formatlocalized('%A %d %B %Y');

    return View::make('posts.show')->with('post', $post)->with('date', $date)->with('title', $post->title);
  }

  public function edit($id){
    $post = Post::find($id);
    if (is_null($post)) {
      return Redirect::route('posts.index');
    }
    return View::make('posts.edit')->with('post', $post)->with('title','Laravel | Edit '.$post->title);
  }

  public function update($id){
    $input = array_except(Input::all(), '_method');
    $v = Validator::make($input, Post::$rules);
    if ($v->passes()) {
      Post::find($id)->update($input);
      return Redirect::route('posts.index');
    }
    return Redirect::back()->withErrors($v)->withInput();
  }

  public function destroy($id){
    Post::find($id)->delete();

    return Redirect::route('posts.index');
  }
}
