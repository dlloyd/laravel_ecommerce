<?php

namespace Beone\Traits;
use Stripe\Stripe;
use Stripe\PaymentIntent;

  trait StripeIntentTrait
  {

        public function createPaymentIntent($cartAmount){
          Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

          $intent = PaymentIntent::create([
            'amount' => $cartAmount*100,
            'currency' => 'eur',
            'payment_method_types' => ['card'],
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
