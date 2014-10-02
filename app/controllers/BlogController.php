<?php

class BlogController extends BaseController {

  public function index() {
    return View::make('blog.index')
    ->with('title', 'Blog Index')
    ->with('blogs', Blogs::orderBy('title')->get());
  }

  public function bnew() {
    return View::make('blog.new')
    ->with('title', 'New Post');
  }

  public function badd() {
    $user_name = Auth::user()->username;
    $user_email = Auth::user()->email;
    $rules = array(
        'title'=>'required|min:3',
        'body'=>'required|min:10'
      );
    $valid = Validator::make(Input::all(), $rules);
    if ($valid->fails()) {
      return Redirect::to('blog/new')->withErrors($valid)->withInput();
    }
    else{
      date_default_timezone_set('Asia/Karachi');
      $timestamp = date('D-m-Y h:i:s A');
      Blogs::insert(array(
          'title'=>Input::get('title'),
          'body'=>Input::get('body'),
          'user_name'=>$user_name,
          'user_email'=>$user_email,
          'created'=>$timestamp
        ));
      return Redirect::to('blog')->with('message', 'Blog post was created successfully!');
    }
  }

  public function bpage($id) {
    return View::make('blog.post')
    ->with('title', 'Blog Post')
    ->with('blogs', Blogs::find($id));
  }

}
