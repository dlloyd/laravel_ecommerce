<?php

namespace Beone\Http\Controllers;

use Illuminate\Http\Request;
use Beone\Purchase;

class AdminPurchaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $purchases = Purchase::where('delivered',false)->get();
        return view('admin.purchases.index',['purchases'=>$purchases]);
    }

    public function deliveredPurchases(){
        $purchases = Purchase::where('delivered',true)->get();
        return view('admin.purchases.delivered',['purchases'=>$purchases]);
    }

    public function validatePurchaseDelivery(Request $request){
        $purchase = Purchase::find($request->id);
        $purchase->delivery_code = $request->delivery_code;
        $purchase->delivered = true;
        $purchase->save();
        return response()->json(['status'=>'purchase delivered']);
    }
}
