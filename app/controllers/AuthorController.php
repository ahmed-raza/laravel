<?php

class AuthorController extends BaseController {

  public function authorsList(){
    if (Auth::user()->user_rank == 'sadmin') {
      return View::make('author.list')
      ->with('title', 'Laravel | Authors List')
      ->with('authors', Authors::get());
    }
    else{
      return Redirect::to('profile')->withErrors('Access Denied! You are not authorized to access that page.');
    }
  }

  public function add() {
    if (Auth::user()) {
      return View::make('author.index')
      ->with('title', 'Add new author');
    }
    else{
      return Redirect::to('login')->with('message', 'You need to login first.');
    }
  }

  public function added() {
    $rules = array(
        'name'=>'required|min:3',
        'bio'=>'required|min:10',
      );
    $valid = Validator::make(Input::all(), $rules);
    if ($valid->fails()) {
      return Redirect::to('author/new')->withErrors($valid)->withInput();
    }
    else{
      date_default_timezone_set('Asia/Karachi');
      $timestamp = date('D-m-Y h:i:s A');
      Authors::insert(array(
          'name'=>Input::get('name'),
          'bio'=>Input::get('bio'),
          'created'=>$timestamp
        ));
      return Redirect::to('/')->with('message', 'Author was added successfully!');
    }
  }

  public function profile($id) {
    if (Authors::find($id)) {
      return View::make('author.profile')
      ->with('title', "Laravel | Author ".Authors::find($id)->name)
      ->with('authors', Authors::find($id));
    }
    else {
      return View::make('plugins.missing')
      ->with('title', 'Laravel | Error 404');
    }
  }

  public function update($id) {
    if (Auth::user()) {
      if (Authors::find($id)) {
        return View::make('author.update')
        ->with('title', 'Laravel | Edit Author')
        ->with('authors', Authors::find($id));
      }
      else{
        return View::make('plugins.missing')
        ->with('title', 'Laravel | Error 404');
      }
    }
    else{
      return Redirect::to('login')->withErrors('You need to login first.');
    }
  }

  public function updated() {
    $id = Input::get('id');
    $rules = array(
        'name'=>'required|min:3',
        'bio'=>'required|min:10',
      );
    $valid = Validator::make(Input::all(), $rules);
    if ($valid->fails()) {
      return Redirect::to('author/new')->withErrors($valid)->withInput();
    }
    else{
      date_default_timezone_set('Asia/Karachi');
      $timestamp = date('D-m-Y h:i:s A');
      Authors::where('id','=',$id)->update(array(
          'name'=>Input::get('name'),
          'bio'=>Input::get('bio'),
          'updated'=>$timestamp,
        ));
      return Redirect::to('author/'.$id)->with('message', 'Author was editted successfully!');
    }
  }

  public function delete($id) {
    if (Auth::user()) {
      if (!empty($id)) {
        if (Authors::find($id)) {
          return View::make('author.delete')
          ->with('title','Laravel | Delete Author')
          ->with('authors', Authors::find($id));
        }
        else{
          return View::make('plugins.missing')
          ->with('title', 'Laravel | Error 404');
        }
      }
      else{
        return Redirect::to('/')->withErrors('Unknown error!');
      }
    }
    else{
      return Redirect::to('login')->withErrors('You need to login first.');
    }
  }

  public function deleted() {
    $id = Input::get('id');
    Authors::where('id','=', $id)->delete();
    return Redirect::to('/')->with('message', 'Author was deleted successfully.');
  }
}
