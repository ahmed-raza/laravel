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

    public function deleteUser($id){
      if (Auth::user() && Auth::user()->user_rank == 'sadmin') {
        return View::make('users.delete')
        ->with('title', 'Laravel | Confirm delete user')
        ->with('user', Users::find($id));
      }
    }

    public function userDeleted(){
      if (!empty(Input::get('id'))) {
        $id = Input::get('id');
        Users::where('id', $id)->delete();
        return Redirect::to('profile')->with('message', 'User deleted successfully.');
      }
    }
  }
