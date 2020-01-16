<?php

namespace Beone\Http\Controllers;

use Beone\Product;
use Beone\Repositories\ProductRepository;
use Beone\Repositories\ProductTypeRepository;
use Beone\Repositories\ProductSizeRepository;
use Beone\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    /**
     *  product repo instance
     */
     protected $products;

     /**
      *  product type repo instance
      */
      protected $productTypes;

      /**
       *  product size repo instance
       */
       protected $productSizes;

     public function __construct(ProductRepository $products,ProductTypeRepository $productTypes,ProductSizeRepository $productSizes){
       $this->products = $products;
       $this->productTypes = $productTypes;
       $this->productSizes = $productSizes;

     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = $this->products->getAll();
        return view('admin.products.index',['products'=>$prods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodTypes = $this->productTypes->getAll();
        $prodSizes = $this->productSizes->getAll();
        return view('admin.products.create',['productTypes'=>$prodTypes,'productSizes'=>$prodSizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->products->create($request->validated());
        foreach ($request->input('image', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }
        if(isset($request['sizes']) && !empty($request['sizes']))
          $product->sizes()->sync($request['sizes']);
        return redirect()->route('admin_prods.index');
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Beone\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $admin_prod)
    {
        $prodTypes = $this->productTypes->getAll();
        $prodSizes = $this->productSizes->getAll();
        return view('admin.products.edit',['productTypes'=>$prodTypes,'productSizes'=>$prodSizes,'product'=>$admin_prod]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  \Beone\Product  $admin_prod
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $admin_prod)
    {
        $product = $this->products->update($admin_prod,$request->validated());

        if (count($product->getMedia('images')) > 0) {
            foreach ($product->getMedia('images') as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $product->getMedia('images')->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }
        if(isset($request['sizes']) && !empty($request['sizes']))
          $product->sizes()->sync($request['sizes']);
        return redirect()->route('admin_prods.index');
    }



    public function editStock(Product $admin_prod)
    {
        $prodSizes = $admin_prod->sizes;
        return view('admin.products.stock',['productSizes'=>$prodSizes,'product'=>$admin_prod]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  \Beone\Product  $admin_prod
     * @return \Illuminate\Http\Response
     */
    public function updateStock(Request $request, Product $admin_prod)
    {
        $size_id = $request->input('size_id');
        $quantity = $request->quantity;
        $admin_prod->sizes()->updateExistingPivot($size_id,['quantity'=>$quantity]);

        return response()->json(['status'=>'stock updated','request'=>$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Beone\Product  $admin_prod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $admin_prod)
    {
        $this->products->delete($admin_prod);
        return response()->json(['status'=>'product deleted']);
    }
}
