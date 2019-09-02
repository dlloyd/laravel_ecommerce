<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Beone\Http\Requests\AddToCartRequest;

class ShoppingCartController extends Controller
{


    /**
     *  product repo instance
     */
     protected $products;

     public function __construct(ProductRepository $products){
       $this->products = $products;

     }

    /**
     * Display the specified resource.
     *
     * @param  \Beone\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Product $product,AddToCartRequest $request)
    {
        $cart = session()->get('cart');

        //define id according to the size exist or not
        $id = isset($request->size_code)? $product->id."".$request->size_code :$product->id;

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "id"=> $id,
                        "product_id"  => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->quantity,
                        "price" => $product->priceUnit,
                        "thumb" => env('APP_URL',null).$product->getFirstMediaUrl('images', 'thumb')
                    ]
            ];

        }
        else{
            $cart[$id] = [
              "id" => $id,
              "product_id"  => $product->id,
              "name" => $product->name,
              "quantity" => $request->quantity,
              "price" => $product->priceUnit,
              "thumb" =>  env('APP_URL',null).$product->getFirstMediaUrl('images', 'thumb')
            ];
        }

        if(isset($request->size_code)){
          $cart[$id]["size"]= $request->size_code;
        }

        session()->put('cart', $cart);
        return response()->json($cart[$id]);

      }




    public function removeFromCart(Request $request){
      if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


}
