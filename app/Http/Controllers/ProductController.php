<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Session;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allProducts = Product::where('status','1')->paginate(9);
        $taxRate = Tax::first()->rate;
        
        return view('products.index', compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
       
        $validated = request()->validate([
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'special_price' => '',
            'status' => 'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);
       $product->addProduct($validated)->saveImage($product,$request);
       Session::flash('message', "Product created");
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    
          $validated = request()->validate([
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'special_price' => '',
            'status' => 'boolean',
            
        ]);

         $product->updateProduct($validated);

        if ($request->hasFile('image')) {
            if ($product->image != NULL) {
              Storage::delete('public/'.$product->image);
            }
            
            $product->saveImage($product,$request);
        }
            Session::flash('message', "Product updated");
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$id){

        $product = Product::find($id);

        $product->delete();

        return back()->with('success','Product deleted successfully');

    }   



    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Product::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Product deleted successfully."]);   

    }


}
