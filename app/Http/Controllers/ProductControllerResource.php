<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    public function index()
    {
//        $items = Product::query()->first();
//       $items->delete();
//        $products = Product::query()->get();
//        return $products;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.save');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        DB::beginTransaction();
       event(new SaveProductEvent(request()->except('images'),request()->file('images')));
       DB::commit();
       return redirect()->back()->with('message', 'Product has been saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::query()->with('images')->find($id);
        //return auth()->user();
        if($product==null || $product->user_id != auth()->id() ){
            return redirect()->to('/products');
        }
        return view('products.save')->with('data',$product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
       DB::beginTransaction();
       $product = Product::query()->with('images')->find($id);
       if(sizeof($product->images)==0 && request()->hasFile('images')==false){
           return redirect()->back()->withErrors(['error'=>'No images uploaded yet']);
       }
       $basic_data = request()->except('images');
       $basic_data['id']=$id;
       $basic_data['user_id']= $product->user_id;
        event(new SaveProductEvent($basic_data,request()->file('images')?? [],false));
       DB::commit();
       return redirect()->back()->with('message', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
