<?php

namespace Beone\Repositories;

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

  public function delete($product_id){
    return Product::destroy($product_id);
  }

  public function find($product_id){
    return Product::find($product_id);
  }

  public function getAll(){
    return Product::all();
  }


}
