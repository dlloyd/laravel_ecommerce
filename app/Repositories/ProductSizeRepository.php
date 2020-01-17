<?php

namespace Beone\Repositories;

use Beone\ProductSize;

class ProductSizeRepository {

  public function find($size_id){
    return ProductSize::find($size_id);
  }

  public function getIdByCode($code){
    return ProductSize::whereCode($code)->firstOrFail();
  }

  public function getAll(){
    return ProductSize::all();
  }


}
