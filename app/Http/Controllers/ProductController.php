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
        return view('products.single',['product'=>$product]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \Beone\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function quickview(Product $product)
    {
        return view('products.quick_view',['product'=>$product]);
    }


}
