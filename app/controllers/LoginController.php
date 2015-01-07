<?php

class LoginController extends BaseController {

  public function index() {
    return View::make('home.index')
    ->with('title', 'Laravel Test Model')
    ->with('authors', Authors::orderBy('name')->get());
  }

  public function login() {
      return View::make('user.index')
      ->with('title', 'Login');
  }

  public function register() {
    if (Auth::user()) {
      return Redirect::to('profile')->with('message', 'You are already a member.');
    }
    else{
      return View::make('user.register')
      ->with('title', 'Register');
    }
  }

  public function registerUser() {
    $rules = array(
        'username'=>'required|unique:users|min:3',
        'email'=>'required|unique:users|email',
        'password'=>'required'
      );
    $v = Validator::make(Input::all(), $rules);
    if ($v->fails()) {
      return Redirect::to('register')->withErrors($v)->withInput();
    }
    else{
      if (Users::count() == 0) {
        $user_rank = 'sadmin';
      }
      else{
        $user_rank = 'user';
      }
      Users::insert(array(
          'username'=>Input::get('username'),
          'email'=>Input::get('email'),
          'user_rank'=>$user_rank,
          'password'=>Hash::make(Input::get('password'))
        ));
      return Redirect::to('login')->with('message', 'You have been registered successfully!');
    }
  }

  public function loginUser() {
    $rules = array(
        'email'=>'required|email',
        'password'=>'required'
      );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('login')->withErrors($validator)->withInput();
    }
    else{
      $credentials = array(
          'email'=>Input::get('email'),
          'password'=>Input::get('password')
        );
      if (Auth::attempt($credentials)) {
        return Redirect::to('profile');
      }
      else{
        return Redirect::to('login')->withErrors('Incorrect email/password.');
      }
    }
  }

  public function profile() {
    if (Auth::user()) {
      $title = ucwords("Laravel | ".Auth::user()->username."'s Profile");
      return View::make('user.profile')
      ->with('title', $title);
    }
    else{
      return Redirect::to('login')->withErrors('You need to login first.');
    }
  }

  public function editProfile() {
    if (Auth::user()) {
      return View::make('user.edit')
      ->with('title', 'Laravel | Edit Profile')
      ->with('user', Auth::user());
    }
    else{
      return Redirect::to('login')->withErrors('You need to login first.');
    }
  }

  public function confProfile() {
    if (Input::get('phone') !== Auth::user()->phone) {
      $rules = array(
        'password'=>'required',
        'newpass'=>'min:5',
        'conpass'=>'min:5',
        'bio'=>'required|min:10',
        'phone'=>'numeric|unique:users|min:7',
        'city'=>'min:3'
        );
    }
    else{
      $rules = array(
        'password'=>'required',
        'newpass'=>'min:5',
        'conpass'=>'min:5',
        'bio'=>'required|min:10',
        'phone'=>'numeric|min:7',
        'city'=>'min:3'
        );
    }
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('profile/edit')->withErrors($validator)->withInput();
    }
    else{
      $cpassword = Input::get('password');
      if (Hash::check($cpassword, Auth::user()->password)) {
        if (!empty(Input::get('newpass')) && !empty(Input::get('conpass')) && Input::get('newpass') == Input::get('conpass')) {
          $npass = Hash::make(Input::get('newpass'));
        }
        elseif (Input::get('newpass') !== Input::get('conpass')) {
          return Redirect::to('profile/edit')->withErrors('Password error, please confirm new password again.')->withInput();
        }
        else{
          $npass = Auth::user()->password;
        }
        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update(array(
            'password'=>$npass,
            'bio'=>Input::get('bio'),
            'phone'=>Input::get('phone'),
            'city'=>Input::get('city'),
            'country'=>Input::get('country')
          ));
        return Redirect::to('profile')->with('message', 'Profile updated successfully.');
      }
      else{
        return Redirect::to('profile/edit')->withErrors('Current password is wrong.')->withInput();
      }
    }
  }

  public function logout() {
    Auth::logout();
    return Redirect::to('/');
  }
}
