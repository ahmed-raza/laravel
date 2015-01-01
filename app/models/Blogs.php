<?php

class Blogs extends Eloquent {
  protected $tables = 'blogs';

  public function comments() {
    return $this->hasMany('Comments');
  }
}
