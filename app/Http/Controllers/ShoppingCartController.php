<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\PurchaseRepository;
use Beone\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Beone\Http\Requests\AddToCartRequest;
use Beone\Traits\CartTrait;
use Beone\Traits\StripeIntentTrait;
use Beone\Events\OrderPurshased;

class ShoppingCartController extends Controller
{
    use CartTrait;
    use StripeIntentTrait;
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
        $item=$this->addItemToSessionCart($product,$request);
        $this->updateSessionCartAmount();

        return response()->json($item);

    }


    public function getCart(){
        $cart = !session()->get('cart') ? null: session()->get('cart');
        return response()->json($cart);
    }



    public function removeFromCart($id){
        $newCart = $this->removeItemFromCart(session('cart'),$id);
        if(empty($newCart)){
          $this->deleteCart();
        }
        else{
          $cartAmount = $this->totalCartAmount(session('cart'),$this->getShippingPrice());
          $this->updateIntentAmount(session('client_stripe_intent')->id,$cartAmount);
          session()->put('cart', $newCart);
        }

        return response()->json(['id'=>$id,'status'=>'removed successfully']);

    }


    public function showPaymentPage(){
      $intent = $this->getPaymentIntent();
      return view('payment',['intentSecret'=>$intent->client_secret]);

    }

    public function setShippingPrice(Request $request){

      $price= $this->getShippingPriceByCountryCode($request->country_code);
      $total = $this->totalCartAmount(session('cart'),$price);
      $this->updateIntentAmount(session('client_stripe_intent')->id,$total);
      session()->put('shipping',$price);
      return response()->json(['shipping_price'=>$price, 'total'=>$total]);
    }


    public function paymentConfirmation(Request $request){
        $this->captureIntent(session('client_stripe_intent')->id);
        $this->purchases->save(session('cart'),$request->all());
        event(new OrderPurshased(session('cart')));

        $this->deleteCart();
        return response()->json(['status'=>'purchase created']);


    }






    private function deleteCart(){
      session()->forget(['cart','client_stripe_intent','shipping']);
    }


    private function addItemToSessionCart($product,$request){
      $cart = (!session()->get('cart') ? null : session('cart'));
      $cartAndNewItem = $this->addItemToCart($product,$request,$cart);
      session()->put('cart', $cartAndNewItem['cart']);
      return $cartAndNewItem['item']; // return the last item added
    }

    private function updateSessionCartAmount(){
      if(session()->get('client_stripe_intent')){
        $cartAmount = $this->totalCartAmount(session('cart'),$this->getShippingPrice());
        $this->updateIntentAmount(session('client_stripe_intent')->id,$cartAmount);
      }
    }

    private function getShippingPrice(){
      if(session()->get('shipping')){
        return session('shipping');
      }
      return 0;
    }

    private function getShippingPriceByCountryCode($code){
      $amount = ($code=="FR" ? 2.99 : 5.00);
      return $amount;
    }

    private function getPaymentIntent(){
      if(session()->get('client_stripe_intent')){
        return session('client_stripe_intent');
      }
      else{
          $amount = $this->totalCartAmount(session('cart'),$this->getShippingPrice());
          $intent = $this->createPaymentIntent($amount);
          session()->put('client_stripe_intent',$intent);
          return $intent;
      }
    }





}
