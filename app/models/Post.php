<?php

class Post extends Eloquent {
  protected $gaurded = array();

  public static $rules = array(
      'title'=>'required|unique:posts',
      'body'=>'required'
    );

  public function user(){
    return $this->belongsTo('Users', 'id');
  }
}
