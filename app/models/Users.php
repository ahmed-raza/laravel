<?php

class Users extends Eloquent {
  protected $table = 'users';

  public function post(){
    return $this->hasMany('Post');
  }
}
