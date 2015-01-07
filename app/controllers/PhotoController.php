<?php

class PhotoController extends BaseController{
  public function post_upload(){
    if (Input::hasFile('photo')) {
        $file            = Input::file('photo');
        $destinationPath = public_path().'/img/';
        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        if ($uploadSuccess) {
          return Redirect::to('profile')->with('message', 'Yolo swag!');
        }
        else{
          return Redirect::to('profile')->with('message', 'Failed to yolo swag');
        }
    }
  }
}
