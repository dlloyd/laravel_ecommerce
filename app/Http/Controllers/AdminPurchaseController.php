<?php

namespace Beone\Http\Controllers;

use Illuminate\Http\Request;
use Beone\Repositories\PurchaseRepository;

class AdminPurchaseController extends Controller
{
    protected $purchases;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PurchaseRepository $purchases)
    {
        $this->middleware('auth');
        $this->purchases = $purchases;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchases = $this->purchases->getRunning();
        return view('admin.purchases.index',['purchases'=>$purchases]);
    }

    public function deliveredPurchases(){
        $purchases = $this->purchases->getDelivered();
        return view('admin.purchases.delivered',['purchases'=>$purchases]);
    }

    public function validatePurchaseDelivery(Request $request){
        $this->purchases->validateDelivery($request->all());
        return response()->json(['status'=>'purchase delivered']);
    }
}
