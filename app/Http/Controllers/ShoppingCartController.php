<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\PurchaseRepository;
use Beone\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Beone\Http\Requests\AddToCartRequest;
use Beone\Traits\CartTrait;

class ShoppingCartController extends Controller
{
    use CartTrait;
    /**
     *  product repo instance
     */
     protected $products;

     protected $purchases;

     public function __construct(ProductRepository $products,PurchaseRepository $purchases){
       $this->products = $products;
       $this->purchases = $purchases;

     }

    /**
     * Display the specified resource.
     *
     * @param  \Beone\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Product $product,AddToCartRequest $request)
    {
        if(!session()->get('cart')){
          $cartAndNewItem = $this->addItemToCart($product,$request,null);
        }
        else{
          $cartAndNewItem = $this->addItemToCart($product,$request,session('cart'));
        }

        session()->put('cart', $cartAndNewItem['cart']);

        if(session()->get('client_stripe_intent')){
          $cartAmount = $this->totalCartAmount(session('cart'));
          $this->updateIntentAmount(session('client_stripe_intent')->id,$cartAmount);
        }

        return response()->json($cartAndNewItem['item']);

      }

      public function getCart(){
        $cart = !session()->get('cart') ? null: session()->get('cart');
        return response()->json($cart);
      }




    public function removeFromCart($id){
        $cart = session()->get('cart');
        $newCart = $this->removeItemFromCart($cart,$id);
        session()->put('cart', $newCart);

        if(session()->get('client_stripe_intent')){
          $cartAmount = $this->totalCartAmount(session('cart'));
          if($cartAmount<=0){
            session()->forget('client_stripe_intent');
          }
          else{
            $this->updateIntentAmount(session('client_stripe_intent')->id,$cartAmount);
          }

        }
        return response()->json(['id'=>$id,'status'=>'removed successfully']);

    }


    public function showPaymentPage(){
      if(!session()->get('cart')){
        return redirect()->route('welcome');
      }

      if(session()->get('client_stripe_intent')){
        $intent = session('client_stripe_intent');
      }
      else{
          $intent = $this->createPaymentIntent(session('cart'));
          session()->put('client_stripe_intent',$intent);
      }

      return view('payment',['intentSecret'=>$intent->client_secret]);
    }


    public function paymentConfirmation(Request $request){
        $this->captureIntent(session('client_stripe_intent')->id);
        $this->purchases->save(session('cart'),$request->all());

        session()->forget('cart');
        session()->forget('client_stripe_intent');
        return response()->json(['status'=>'purchase created']);


    }

    public function deleteCart(){
      session()->forget('cart');
      session()->forget('client_stripe_intent');
      return response()->json(['status'=>'cart deleted']);
    }






}
