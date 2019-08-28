<?php

namespace Beone;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{

  public function products(){
    return $this->hasMany('Beone\Product');
  }
}
