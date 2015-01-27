<?php

class GalleryController extends BaseController{

  public function index(){
    if (Auth::user()) {
      $photos = Gallery::get();
      return View::make('gallery.index')
      ->with('title', 'Laravel | Gallery')
      ->with('photos', $photos);
    }
  }

  public function store(){
    $input = Input::all();
    $rules = array(
      'photo'=>'required|mimes:jpeg,bmp,png,jpg|max:500'
    );
    $v = Validator::make($input, $rules);
    if ($v->passes()) {
      $photo = new Gallery;
      $photo->user_id = Auth::user()->id;
      $photo->img_name = Auth::user()->id."_".Input::file('photo')->getClientOriginalName();
      $photo->save();

      if (Input::hasFile('photo')) {
        $photo = Input::file('photo');
        $destination = public_path().'/img/';
        $photo_name = Auth::user()->id."_".Input::file('photo')->getClientOriginalName();
        $uploadSuccess = $photo->move($destination, $photo_name);
        if ($uploadSuccess) {
          return Redirect::route('gallery.index')->with('message','Image Uploaded successfully.');
        }
        else{
          return Redirect::to('profile')->withErrors('Failed to upload image.');
        }
      }
      else{
        return Redirect::to('profile')->withErrors('YOLO.');
      }
    }

    return Redirect::back()->withErrors($v)->withInput();
  }
}
