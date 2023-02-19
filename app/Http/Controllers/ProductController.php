<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Products $products)
    {
        $search = Products::query();
        $role = Auth::user()->role;
        if($role == '1'){
            if(request('search')){
                $search->where('name', 'LIKE', '%'.request('search').'%')->paginate(10);
                return view('layouts.inc.admin.panels.products', ['products' => $search->orderBy('id', 'DESC')->paginate(20)]);
            }
            else{
                return view('layouts.inc.admin.panels.products', ['products' => Products::all()->sortBy('categories_id')]);
            }
        }
        else{
            if(request('search')){
                $search->where('name', 'LIKE', '%'.request('search').'%')->paginate(10);
                return view('layouts.inc.products.products', ['products' => $search->orderBy('id', 'DESC')->paginate(20), 'category' => 0]);
            }
            else{
                return view('layouts.inc.products.products', ['products' => Products::all(), 'category' => 0]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Categories $categories)
    {
        return view('layouts.inc.admin.add.product', ['categories' => $categories->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Trying to validate the data*/
        $validated = $request->validate([
            'categories_id' => 'required|exists:categories,id',
			'name' => 'required',
            'price' => 'required|numeric|min:50|max:1000',
            'quantity' => 'required|numeric|min:10|max:200',
            'image' => 'required|image|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');
        Products::create([
            'categories_id' => $validated['categories_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'image' => $image_path,
        ]);
        return redirect()->back()->with('status',"Inserted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return view('layouts.inc.products.show-product', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        return view('layouts.inc.admin.edit.product', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $validated = $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric|min:50|max:1000',
            'quantity' => 'required|numeric|min:10|max:200',
        ]);
        $products->update($validated);
        return redirect()->back()->with('status',"Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $id)
    {
        Products::destroy($id->id);
        return redirect()->route('category', $id->categories_id)->with('status',"Deleted successfully");
    }

    public function productsFromCat(Categories $categories){
        return view('layouts.inc.products.products', ['categories' => $categories]);
    }

}
