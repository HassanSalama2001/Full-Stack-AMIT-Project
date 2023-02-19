<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('products')
                ->selectRaw('COUNT(products.id) as product_Quantity, categories_id as category_id, categories.Category as category_name')
                ->join('categories','products.categories_id', '=', 'categories.id')
                ->groupBy('categories_id')
                ->get();
        return view('layouts.inc.admin.panels.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.inc.admin.add.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoriesRequest $request)
    {
        $validated = $request->validate([
			'Category' => 'required|unique:categories,Category',
        ]);
        categories::create($validated);
        return redirect()->route('category.all')->with('status',"Inserted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        return view('layouts.inc.admin.edit.category', ['category' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoriesRequest  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        $validated = $request->validate([
            'Category' => 'required|unique:categories,Category',
        ]);
        $categories->update($validated);
        return redirect()->back()->with('status',"Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        categories::destroy($category->id);
        return redirect()->route('category.all')->with('status',"Deleted successfully");
    }
}
