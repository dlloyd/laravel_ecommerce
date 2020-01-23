<?php

namespace Beone\Listeners;

use Beone\Events\OrderPurshased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Beone\Repositories\ProductRepository;
use Beone\Repositories\ProductSizeRepository;

class UpdateStockProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     protected $products;

     protected $productSizes;


    public function __construct(ProductRepository $products,ProductSizeRepository $productSizes)
    {
      $this->products = $products;
      $this->productSizes = $productSizes;
    }

    /**
     * Handle the event.
     *
     * @param  OrderPurshased  $event
     * @return void
     */
    public function handle(OrderPurshased $event)
    {
      foreach ($event->cart as $item) {
        $product=$this->products->find($item['product_id']);
        $quantityBuyed = $item['quantity'];

        if(!isset($item['size'])){
          $stock = $product->quantity;
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
