<?php

class CommentController extends BaseController {

  public function pcomment() {
    $user_name = Auth::user()->username;
    $blog_id = Input::get('id');
    $comment = Input::get('comment');
    $time = date('Y-m-d H:i:s');
    Comments::insert(array(
        'user_name'=>$user_name,
        'blog_id'=>$blog_id,
        'comment'=>$comment,
        'created_at'=>$time
      ));
    return Redirect::to('blog/'.$blog_id);
  }

  public function scomment() {
    return View::make('blog.post')
    ->with('comments', Comments::all());
  }
}
