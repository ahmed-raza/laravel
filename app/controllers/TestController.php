<?php

  class TestController extends BaseController{
    public function test(){
      return View::make('test.test')
      ->with('title', 'Test');
    }
    public function save(){
      if (Request::ajax()) {
        return Response::json(Input::get('name'));
      }
    }
  }
