<?php

namespace Beone\Traits;

  trait CartTrait
  {

      public function addItemToCart($product,$request,$cart)
      {
          if($cart==null){  $cart = array();  }

          //define id according to the size exist or not
          $id = isset($request['size_code'])? $product->id."".$request['size_code'] :$product->id;

          $cart[$id] = [
            "id" => $id,
            "product_id"  => $product->id,
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->priceUnit,
            "thumb" => $product->getFirstMediaUrl('images', 'thumb'),
            "delete_route" => route('remove_from_cart',['product'=>$id])
          ];

          if(isset($request['size_code'])){
            $cart[$id]["size"]= $request['size_code'];
          }

          return ['cart'=>$cart,'item'=>$cart[$id]];

        }

        public function removeItemFromCart($cart,$id){
            if(isset($cart[$id])) {
                unset($cart[$id]);
            }
            return $cart;

        }



        public function totalCartAmount($cart,$shipping){
          $total = 0;
          foreach ($cart as $item) {
            $total += $item['quantity']*$item['price'];
          }

          $total += $shipping;
          return $total;
        }


  }
