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
          'video'=>'required|mimes:mpga,video/mp4|max:50000'
        );
      $v = Validator::make($input, $rules);
      if ($v->fails()) {
        return Redirect::to('uploads')->withErrors($v)->withInput();
      }
      else{
        $video = Input::file('video');
        $name = str_replace(" ", "_", Input::file('video')->getClientOriginalName());
        $destination = public_path().'/audios/';
        $video_name = Auth::user()->id."_".$name;
        if (File::exists("audios/".$video_name)) {
          return Redirect::to('uploads')->withErrors('File with the same name already exists.');
        }
        else{
          $uploadSuccess = $video->move($destination, $video_name);
          $org_name = Input::file('video')->getClientOriginalName();
          Audio::insert(array(
            'user_id'=>Auth::user()->id,
            'file_name'=>$video_name,
            'orig_name'=>$org_name
            ));
          if ($uploadSuccess) {
            return Redirect::to('/')->with('message', 'Video uploaded successfully');
          }
          else{
            return Redirect::to('uploads')->withErrors('Failed to upload video');
          }
        }
      }
    }
  }
