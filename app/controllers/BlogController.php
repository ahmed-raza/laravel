<?php

class BlogController extends BaseController {

  public function index() {
    return View::make('blog.index')
    ->with('title', 'Laravel | Blog Index')
    ->with('blogs', Blogs::orderBy('title')->get());
  }

  public function bnew() {
    if (Auth::user()) {
      return View::make('blog.new')
      ->with('title', 'Laravel | New Blog Post');
    }
    else{
      return Redirect::to('login')->withErrors('You need to login first.');
    }
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
          'content'=>Input::get('body'),
          'submitted_by'=>$user_name,
          'user_email'=>$user_email,
          'created'=>$timestamp
        ));
      return Redirect::to('blog')->with('message', 'Blog post was created successfully!');
    }
  }

  public function bpage($id) {
    $comments = DB::select('select * from comments where blog_id ='.$id);
    $data = array(
        'title'=>'Blog Post',
        'blogs'=>Blogs::find($id),
        'comments'=>Comments::all()
      );
    return View::make('blog.post')
    ->with($data);
  }

  public function bedit($id) {
    return View::make('blog.edit')
    ->with('title', 'Edit Post')
    ->with('blogs', Blogs::find($id));
  }

  public function bupdate() {
    $id = Input::get('id');
    $user_name = Auth::user()->username;
    $user_email = Auth::user()->email;
    $rules = array(
        'title'=>'required|min:3',
        'body'=>'required|min:10'
      );
    $valid = Validator::make(Input::all(), $rules);
    if ($valid->fails()) {
      return Redirect::to('blog/'.$id.'/edit')->withErrors($valid)->withInput();
    }
    else{
      date_default_timezone_set('Asia/Karachi');
      $timestamp = date('D-m-Y h:i:s A');
      Blogs::where('id','=',$id)->update(array(
          'title'=>Input::get('title'),
          'body'=>Input::get('body'),
          'user_name'=>$user_name,
          'user_email'=>$user_email,
          'updated'=>$timestamp
        ));
      return Redirect::to('blog/'.$id)->with('message', 'Blog post was updated successfully!');
    }
  }

  public function bdelete($id) {
    return View::make('blog.delete')
    ->with('title', 'Delete Blog Post')
    ->with('blogs', Blogs::find($id));
  }

  public function bdeleted() {
    $id = Input::get('id');
    Blogs::where('id','=',$id)->delete();
    return Redirect::to('blog')->with('message', 'Blog post was deleted successfully.');
  }

}
