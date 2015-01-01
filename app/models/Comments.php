<?php

class Comments extends Eloquent {
  protected $table = 'comments';

  public function blogs() {
    return $this->belongsTo('Blogs')
  }
}
