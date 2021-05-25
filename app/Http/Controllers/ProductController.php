<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = (Auth::User()->role->name == 'user' ) ? Auth::User()->Enterprise->products : Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =  Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product([
            'name' => $request->input('name'),
            // 'order_number' => '',
            'brand' => $request->input('brand') ? $request->input('brand') : '',
            'type' => $request->input('type'),
            'sub_category_id' => $request->input('sub_category_id') ? $request->input('sub_category_id') : '',
            'hs_code' => $request->input('hs_code'),
            // 'net_weight' => '',
            // 'real_weight' => '',
            'description' => $request->input('description') ? $request->input('description') : '',
            'package_type' => '',
            'package_count' => '',
            'measure_unit' => $request->input('measure_unit'),
            'customs_tariff_id' => null,
            'enterprise_id' => Auth::User()->Enterprise->id
        ]);
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        $product = Product::find($id);
        // dd($product);
        $categories =  Category::all();
        $sub_categories = SubCategory::all()->where('category_id', '==', $product->subCategory->category_id);
        return view('products.edit',compact('product', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->order_number = $request->input('order_number');
        $product->brand = $request->input('brand');
        $product->type = $request->input('type');
        $product->category = $request->input('category');
        $product->hs_code = $request->input('hs_code');
        $product->net_weight = $request->input('net_weight');
        $product->real_weight = $request->input('real_weight');
        $product->description = $request->input('description');
        $product->package_type = $request->input('package_type');
        $product->package_count = $request->input('package_count');
        $product->measure_unit = 'Kg';
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        
        $product = Product::find($id);
        if ($product){
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'Product not found'
        ], 404);
        // return redirect()->route('products.index')->with('success','Product deleted successfully');
    }


    public function getProducts()
    {
        //        

        $data = [];
        $products = (Auth::User()->role->name == 'user' ) ? Auth::User()->Enterprise->products : Product::all();
        // $query = users::where('id', 1)->get();// Let's Map the results from [$query]
        // $products = $products->map(function($items){
        // $data['value'] = $items->id;
        // $data['text'] = $items->name.' '.$items->brand;
        // return $data;
        // });

        return response()->json([ 'products' => $products]);//->select('id AS value', 'name AS text')]);//->pluck('id' as 'value', 'name' . ' '. 'brand' as 'text')], 404);
        // return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
