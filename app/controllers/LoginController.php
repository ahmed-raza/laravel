<?php

class LoginController extends BaseController {

  public function index() {
    return View::make('home.index')
    ->with('title', 'Laravel Test Model')
    ->with('authors', Authors::orderBy('name')->get());
  }

  public function login() {
    if (Auth::user()) {
      return Redirect::to('profile')->with('message', 'You are already signed in.');
    }
    else{
      return View::make('user.index')
      ->with('title', 'Login');
    }
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
      Users::insert(array(
          'username'=>Input::get('username'),
          'email'=>Input::get('email'),
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
        return Redirect::to('login')->withErrors();
      }
    }
  }

  public function profile() {
    if (Auth::user()) {
      $title = ucwords(Auth::user()->username."'s Page");
      return View::make('user.profile')
      ->with('title', $title);
    }
    else{
      return Redirect::to('login')->with('Message', 'You need to login first.');
    }
  }

  public function logout() {
    Auth::logout();
    return Redirect::to('/');
  }
}
