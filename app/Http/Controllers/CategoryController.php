<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //
            $categories = Category::all();
            return view('categories.index', compact('categories'));
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
        try {
            //
            return view('categories.create');
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
        try {
            //
            $category = new Category([
                'number' => Category::all()->sortByDesc('created_at')->first()->number + 1,
                'name' => $request->name,
                'name_ar' => $request->name_ar,
                'name_fr' => $request->name_fr,
                'description' => $request->description ? $request->description : ''
            ]);
            $category->save();
            return redirect()->route('categories.index')
                ->with('success', 'Category created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            //
            $category = Category::find($id);
            return view('categories.edit', compact('category'));
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->name_ar = $request->name_ar;
            $category->name_fr = $request->name_fr;
            $category->description = $request->description ? $request->description : '';
            $category->update();
            return redirect()->route('categories.index')
                ->with('success', 'Category created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return response()->json([
                    'message' => 'Category deleted successfully'
                ], 200);
            }

            return response()->json([
                'message' => 'Category not found'
            ], 200);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
