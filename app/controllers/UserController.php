<?php
  class UserController extends BaseController{
    public function userProfile($id){
      if (Auth::user()) {
        return View::make('users.index')
        ->with('title', 'Hello')
        ->with('user', Users::find($id));
      }
      else{
        return Redirect::to('login')->withErrors('You need to login first.');
      }
    }
  }
