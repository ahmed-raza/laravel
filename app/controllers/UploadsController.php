<?php

  class UploadsController extends BaseController{

    public function index(){
      if (Auth::user()) {
        return View::make('uploads.index')
        ->with('title', 'Laravel | Uploads');
      }
    }

    public function store(){
      $input = Input::all();
      $rules = array(
          'video'=>'required'
        );
      $v = Validator::make($input, $rules);
      if ($v->fails()) {
        return Redirect::to('uploads')->withErrors($v)->withInput();
      }
      else{
        $video = Input::file('video');
        $destination = public_path().'/img/';
        $video_name = Auth::user()->id."_".Input::file('photo')->getClientOriginalName();
        $uploadSuccess = $photo->move($destination, $photo_name);
        if ($uploadSuccess) {
          return Redirect::to('/')->with('message', 'Video uploaded successfully');
        }
        else{
          return Redirect::to('uploads')->withErrors('Failed to upload video');
        }
      }
    }
  }
