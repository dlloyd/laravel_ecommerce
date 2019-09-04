<?php

namespace Beone\Repositories;

use Illuminate\Support\Facades\DB;
use Beone\Product;

class ProductRepository {

  public function create($product_data){
    $product = Product::create($product_data);
    return $product;
  }

  public function update($product,$product_data){
    $product->update($product_data);
    return $product;
  }

  public function delete($product){
    return $product->destroy();
  }

  public function find($product_id){
    return Product::find($product_id);
  }

  public function getAll(){
    return Product::all();
  }

  public function getSimilars($product){
    return Product::where([['product_type_id','=',$product->type->id],['id','<>',$product->id]])->get();
  }

  public function getAllByType($typeId){
    return Product::where('product_type_id',$typeId)->get();
  }


}
