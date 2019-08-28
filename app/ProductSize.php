<?php

namespace Beone;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{

  public function products(){
    return $this->belongsToMany('Beone\Product');
  }
}
