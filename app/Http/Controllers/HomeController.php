<?php

namespace Beone\Http\Controllers;

use Illuminate\Http\Request;
use Beone\Repositories\ProductRepository;
use Beone\Repositories\PurchaseRepository;

class HomeController extends Controller
{

     protected $products;
     protected $purchases;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PurchaseRepository $purchases,ProductRepository $products)
    {
        $this->middleware('auth');
        $this->products = $products;
        $this->purchases = $purchases;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productsCount = $this->products->countAll();
        $purchasesRunningCount = $this->purchases->countRunning();
        $purchasesDeliveredCount = $this->purchases->countDelivered();
        return view('home',['productsCount'=>$productsCount,'purchasesRunningCount'=>$purchasesRunningCount,'purchasesDeliveredCount'=>$purchasesDeliveredCount]);
    }
}
