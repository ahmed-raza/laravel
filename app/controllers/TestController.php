<?php

  class TestController extends BaseController{
    public function test(){
      return View::make('test.test')
      ->with('title', 'Test');
    }
    public function save(){
      $name = Input::get('name');
      return json_encode($name);
    }
  }
