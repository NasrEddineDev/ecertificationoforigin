<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Enterprise;
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
        try {
            $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();
            return view('products.index', compact('products'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            $enterprises =  Enterprise::all();
            $categories =  Category::all();
            return view('products.create', compact('categories', 'enterprises'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $product = new Product([
                'name' => $request->input('name'),
                'brand' => $request->input('brand') ? $request->input('brand') : '',
                'type' => $request->input('type'),
                'sub_category_id' => $request->input('sub_category_id') ? $request->input('sub_category_id') : '',
                'hs_code' => $request->input('hs_code'),
                'description' => $request->input('description') ? $request->input('description') : '',
                'package_type' => '',
                'package_count' => '',
                'measure_unit' => $request->input('measure_unit'),
                'customs_tariff_id' => null,
                'enterprise_id' => (Auth::User()->role->name == 'user') ? (Auth::User()->Enterprise ? Auth::User()->Enterprise->id : null) 
                                    : $request->input('enterprise_id')
            ]);
            $product->save();

            return redirect()->route('products.index')
                ->with('success', 'Product created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $product = Product::find($id);
            return view('products.show', compact('product'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $product = Product::find($id);
            if ($product) {
                $enterprises =  Enterprise::all();
                $categories =  Category::all();
                $sub_categories = SubCategory::all()->where('category_id', '=', $product->subCategory->category_id);
                return view('products.edit', compact('product', 'categories', 'sub_categories', 'enterprises'));
            }
            return redirect()->route('products.index')
                ->with('error', 'Product can\'t eddited.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->brand = $request->input('brand');
            $product->hs_code = $request->input('hs_code');
            $product->measure_unit = $request->input('measure_unit');
            $product->sub_category_id = $request->input('sub_category_id');
            if (Auth::User()->role->name != 'user'){
                $product->enterprise_id = $request->input('enterprise_id');
            }
            $product->save();
            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $product = Product::find($id);
            if ($product) {
                $product->delete();
                return response()->json([
                    'message' => 'Product deleted successfully'
                ], 200);
            }
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }


    public function getProducts()
    {
        //        
        try {

            $data = [];
            $products = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->products : Product::all();

            return response()->json(['products' => $products]); //->select('id AS value', 'name AS text')]);//->pluck('id' as 'value', 'name' . ' '. 'brand' as 'text')], 404);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
