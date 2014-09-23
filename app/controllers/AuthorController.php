<?php

class AuthorController extends BaseController {

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
    return View::make('author.profile')
    ->with('title', 'Authors Profile')
    ->with('authors', Authors::find($id));
  }

  public function update() {
    if (Auth::user()) {
      $id = Input::get('id');
      return View::make('author.update')
      ->with('title', 'Edit Author')
      ->with('authors', Authors::find($id));
    }
    else{
      return Redirect::to('login')->with('message', 'You need to login first.');
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
          'updated_at'=>""
        ));
      return Redirect::to('author/'.$id)->with('message', 'Author was editted successfully!');
    }
  }

  public function delete() {
    $id = Input::get('id');
    if (Auth::user()) {
      if (!empty($id)) {
        return View::make('author.delete')
        ->with('title','Delete Author')
        ->with('authors', Authors::find($id));
      }
      else{
        return Redirect::to('/')->with('message', 'Unknown error!');
      }
    }
    else{
      return Redirect::to('login')->with('message', 'You need to login first.');
    }
  }

  public function deleted() {
    $id = Input::get('id');
    Authors::where('id','=', $id)->delete();
    return Redirect::to('/')->with('message', 'Author was deleted successfully.');
  }
}
