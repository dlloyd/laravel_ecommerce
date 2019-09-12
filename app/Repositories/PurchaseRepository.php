<?php

namespace Beone\Repositories;

use Beone\Purchase;

class PurchaseRepository {

  public function find($id){
    return Purchase::find($id);
  }

  public function getAll(){
    return Purchase::all();
  }

  public function getRunning(){
    return Purchase::where('delivered',false)->get();
  }

  public function getDelivered(){
    return Purchase::where('delivered',true)->get();
  }

  public function countRunning(){
    return Purchase::where('delivered',false)->count();
  }

  public function countDelivered(){
    return Purchase::where('delivered',true)->count();
  }

  public function validateDelivery($request){
    $purchase = Purchase::find($request['id']);
    $purchase->delivery_code = $request['delivery_code'];
    $purchase->delivered = true;
    $purchase->save();
  }

  public function save($cart,$request){
    $purchase = new Purchase;
    $purchase->delivered = false;
    $purchase->customer_name = $request['name'];
    $purchase->customer_email = $request['email'];
    $purchase->customer_country = $request['country'];
    $purchase->customer_city = $request['city'];
    $purchase->customer_address = $request['address_line1'];
    $purchase->customer_address_complement = $request['address_line2'];
    $purchase->customer_postal_code = $request['postal_code'];
    $purchase->setPurchaseListAttribute($cart);
    $purchase->save();
  }


}
