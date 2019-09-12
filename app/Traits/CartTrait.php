<?php

namespace Beone\Traits;
use Stripe\Stripe;
use Stripe\PaymentIntent;

  trait CartTrait
  {

      public function addItemToCart($product,$request,$cart)
      {
          //define id according to the size exist or not
          $id = isset($request['size_code'])? $product->id."".$request['size_code'] :$product->id;

          $cart[$id] = [
            "id" => $id,
            "product_id"  => $product->id,
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->priceUnit,
            "thumb" =>  env('APP_URL',null).$product->getFirstMediaUrl('images', 'thumb'),
            "delete_route" => route('remove_from_cart',['product'=>$id])
          ];

          if(isset($request['size_code'])){
            $cart[$id]["size"]= $request['size_code'];
          }

          return ['cart'=>$cart,'newId'=>$id];

        }

        public function removeItemFromCart($cart,$id){
            if(isset($cart[$id])) {
                unset($cart[$id]);
            }
            return $cart;

        }



        public function totalCartAmount($cart){
          $total = 0;
          foreach ($cart as $item) {
            $total += $item['quantity']*$item['price'];
          }
          return $total;
        }

        public function createPaymentIntent($cart){
          Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
          $amount = $this->totalCartAmount($cart);
          $intent = PaymentIntent::create([
            'amount' => $amount*100,
            'currency' => 'eur',
            'allowed_source_types' => ['card'],
            'capture_method'=>'manual',
            ]);
            return $intent;
        }

        public function updateIntentAmount($intentId,$cartAmount){
          Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
          PaymentIntent::update($intentId,['amount'=>$cartAmount*100]);
        }

        public function captureIntent($intentId){
          Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
          $intent = PaymentIntent::retrieve($intentId);
          $intent->capture();
        }



  }
