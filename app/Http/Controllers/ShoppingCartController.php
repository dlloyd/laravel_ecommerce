<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Purchase;
use Beone\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Beone\Http\Requests\AddToCartRequest;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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
                        "thumb" => env('APP_URL',null).$product->getFirstMediaUrl('images', 'thumb'),
                        "delete_route" => route('remove_from_cart',['product'=>$id])
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
              "thumb" =>  env('APP_URL',null).$product->getFirstMediaUrl('images', 'thumb'),
              "delete_route" => route('remove_from_cart',['product'=>$id])
            ];
        }

        if(isset($request->size_code)){
          $cart[$id]["size"]= $request->size_code;
        }

        session()->put('cart', $cart);
        return response()->json($cart[$id]);

      }




    public function removeFromCart($id){
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $total = $cart[$id]['price'] * $cart[$id]['quantity'];
            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return response()->json(['id'=>$id,'totalPrice'=>$total,'status'=>'removed successfully']);

    }


    public function showPaymentPage(){
      if(!session()->get('cart')){
        return redirect()->route('welcome');
      }

      if(session()->get('client_stripe_intent')){
        $intent = session('client_stripe_intent');
      }
      else{
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $amount = $this->totalCartAmount(session('cart'));
        $intent = PaymentIntent::create([
          'amount' => $amount*100,
          'currency' => 'eur',
          'allowed_source_types' => ['card'],
          'capture_method'=>'manual',
          ]);
          session()->put('client_stripe_intent',$intent);
      }

      return view('payment',['intentSecret'=>$intent->client_secret]);
    }


    public function paymentConfirmation(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $intentId = session('client_stripe_intent')->id;
        $intent = PaymentIntent::retrieve($intentId);
        $payment = $intent->capture();

        $this->generatePurchase(session('cart'),$request);

        session()->forget('cart');
        session()->forget('client_stripe_intent');
        return response()->json(['status'=>'purchase created']);


    }

    public function deleteCart(){
      session()->forget('cart');
      session()->forget('client_stripe_intent');
      return response()->json(['status'=>'cart deleted']);
    }

    private function totalCartAmount($cart){
      $total = 0;
      foreach ($cart as $item) {
        $total += $item['quantity']*$item['price'];
      }
      return $total;
    }

    private function generatePurchase($cart,$request){
      $purchase = new Purchase;
      $purchase->delivered = false;
      $purchase->customer_name = $request->name;
      $purchase->customer_email = $request->email;
      $purchase->customer_country = $request->country;
      $purchase->customer_city = $request->city;
      $purchase->customer_address = $request->address_line1;
      $purchase->customer_address_complement = $request->address_line2;
      $purchase->customer_postal_code = $request->postal_code;
      $purchase->setPurchaseListAttribute($cart);
      $purchase->save();
    }


}
