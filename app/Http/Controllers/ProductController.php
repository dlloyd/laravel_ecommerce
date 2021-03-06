<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\ProductRepository;
use Beone\Repositories\ProductTypeRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    /**
     *  product repo instance
     */
     protected $products;

     /**
      *  product type repo instance
      */
      protected $productTypes;

     public function __construct(ProductRepository $products,ProductTypeRepository $productTypes){
       $this->products = $products;
       $this->productTypes = $productTypes;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = $this->products->getAll();
        $prodTypes = $this->productTypes->getAll();
        return view('welcome',['products'=>$prods,'categories'=>$prodTypes]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \Beone\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $similars = $this->products->getSimilars($product);
        return view('products.single',['product'=>$product,'similars'=>$similars]);
    }

    public function showByType($code){
      $type = $this->productTypes->getTypeByCode($code);
      $products = $this->products->getAllByType($type->id);
      return view('products.products_by_type',['products'=>$products,'type'=>$type]);
    }



}
