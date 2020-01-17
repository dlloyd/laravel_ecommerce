<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\PurchaseRepository;
use Beone\Repositories\ProductRepository;
use Beone\Repositories\ProductSizeRepository;
use Illuminate\Http\Request;
use Beone\Http\Requests\AddToCartRequest;
use Beone\Traits\CartTrait;
use Beone\Traits\StripeIntentTrait;

class ShoppingCartController extends Controller
{
    use CartTrait;
    use StripeIntentTrait;
    /**
     *  product repo instance
     */
     protected $products;

     protected $productSizes;

     protected $purchases;

     public function __construct(ProductRepository $products,ProductSizeRepository $productSizes,PurchaseRepository $purchases){
       $this->products = $products;
       $this->productSizes = $productSizes;
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
        $cart = session()->get('cart');
        $newCart = $this->removeItemFromCart($cart,$id);
        session()->put('cart', $newCart);

        if(session()->get('client_stripe_intent')){
          $cartAmount = $this->totalCartAmount(session('cart'),$this->getShippingPrice());
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
          $amount = $this->totalCartAmount(session('cart'),$this->getShippingPrice());
          $intent = $this->createPaymentIntent($amount);
          session()->put('client_stripe_intent',$intent);
      }

      return view('payment',['intentSecret'=>$intent->client_secret]);

    }

    public function setShippingPrice(Request $request){
      if($request->country_code=="FR"){
        $price = 2.99;
      }
      else{
        $price = 5.00;
      }
      $total = $this->totalCartAmount(session('cart'),$price);
      session()->put('shipping',$price);
      return response()->json(['shipping_price'=>$price, 'total'=>$total]);
    }


    public function paymentConfirmation(Request $request){
        $this->captureIntent(session('client_stripe_intent')->id);
        $this->purchases->save(session('cart'),$request->all());
        // event(new PurchaseOrdered(session('cart')));
        $this->updateStock(session('cart'));

        $this->deleteSessionCart();
        return response()->json(['status'=>'purchase created']);


    }

    public function deleteCart(){
      $this->deleteSessionCartBis(session());
      return response()->json(['status'=>'cart deleted']);
    }

    private function deleteSessionCart(){
      session()->forget('cart');
      session()->forget('client_stripe_intent');
      session()->forget('shipping');
    }

    private function deleteSessionCartBis($session){
      $session->forget('cart');
      $session->forget('client_stripe_intent');
      $session->forget('shipping');

    }

    private function addItemToSessionCart($product,$request){
      if(!session()->get('cart')){
        $cartAndNewItem = $this->addItemToCart($product,$request,null);
      }
      else{
        $cartAndNewItem = $this->addItemToCart($product,$request,session('cart'));
      }

      session()->put('cart', $cartAndNewItem['cart']);
      return $cartAndNewItem['item'];
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


    //Should be on event Listener
    private function updateStock($cart){
      foreach ($cart as $item) {
        $product=$this->products->find($item['product_id']);
        $quantityBuyed = $item['quantity'];

        if(!isset($item['size'])){
          $stock = $product->quantity();
          $remainingStock = $stock - $quantityBuyed;
          $product->quantity=$remainingStock;
          $product->save();
        }
        else{
          $size_id = $this->productSizes->getIdByCode($item['size']);
          $stock = $product->sizes->find($size_id)->pivot->quantity;
          $remainingStock = $stock - $quantityBuyed;
          $product->sizes()->updateExistingPivot($size_id,['quantity'=>$remainingStock]);
        }
      }
    }






}
