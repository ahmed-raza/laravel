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

    public function editUser($id){
      if (Users::find($id) && Auth::user()->user_rank == 'sadmin') {
        return View::make('users.edit')
        ->with('user', Users::find($id))
        ->with('title', "Laravel | Edit ".Users::find($id)->username."'s profile");
      }
      elseif (Auth::user()->user_rank !== 'sadmin') {
        return Redirect::to(URL::previous())->withErrors('Access Denied! You are not authorized to access that page.');
      }
      else{
        return View::make('plugins.missing')
        ->with('title', 'Laravel | Error 404');
      }
    }

    public function userEditted(){
      if (!empty(Input::get('id'))) {
        $rules = array(
          'newpass'=>'min:5',
          'conpass'=>'min:5',
          'bio'=>'min:10',
          'phone'=>'numeric|min:7',
          'city'=>'min:3'
          );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return Redirect::to(URL::previous())->withErrors($validator)->withInput();
        }
        else{
          $id = Input::get('id');
          if (!empty(Input::get('newpass')) && !empty(Input::get('conpass')) && Input::get('newpass') == Input::get('conpass')) {
            $newpass = Hash::make(Input::get('newpass'));
          }
          elseif(Input::get('newpass') !== Input::get('conpass')){
            return Redirect::to(URL::previous())->withErrors('Password error! Please confirm new password again.');
          }
          else{
            $newpass = Users::find($id)->password;
          }
          $update = Users::where('id', $id)
          ->update(array(
              'password'=>$newpass,
              'bio'=>Input::get('bio'),
              'phone'=>Input::get('phone'),
              'city'=>Input::get('city'),
              'country'=>Input::get('country')
            ));
          if ($update) {
            return Redirect::to('profile')->with('message','User <strong><i>'.Input::get('username').'</i></strong> has been updated.');
          }
          else{
            return Redirect::to('profile')->withErrors('Failed to update profile. Internal server error. Please contact site developer.');
          }
        }
      }
    }

    public function deleteUser($id){
      if (Auth::user() && Auth::user()->user_rank == 'sadmin') {
        return View::make('users.delete')
        ->with('title', 'Laravel | Confirm delete user')
        ->with('user', Users::find($id));
      }
      else{
        return Redirect::to(URL::previous())->withErrors('Access Denied! You are not authorized to access that page.');
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
