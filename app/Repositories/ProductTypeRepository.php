<?php

namespace Beone\Repositories;

use Beone\ProductType;

class ProductTypeRepository {

  public function find($type_id){
    return ProductType::find($type_id);
  }

  public function getAll(){
    return ProductType::all();
  }

  public function getTypeByCode($code){
    return ProductType::where('code','=',$code)->firstOrFail();
  }


}
