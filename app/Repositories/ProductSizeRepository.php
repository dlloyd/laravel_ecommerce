<?php

namespace Beone\Repositories;

use Beone\ProductSize;

class ProductSizeRepository {

  public function find($size_id){
    return ProductSize::find($size_id);
  }

  public function getAll(){
    return ProductSize::all();
  }


}
