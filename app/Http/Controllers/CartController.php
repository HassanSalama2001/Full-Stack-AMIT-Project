<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart $cart
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        Cart::instance($request->instance)->add($product, 1, ['image' => $product->image]);
        Cart::instance($request->instance)->store(Auth::user()->email);
        session()->flash('success_message', 'Item added in cart!');
        return redirect()->route('cart.show', $request->instance);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cart = Cart::instance($request->instance);
        return(view('layouts.inc.carts.cart', ['cart' => $cart, 'instance' => $request->instance]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        Cart::instance('cart')->update($request->rowId, $request->qty);
        Cart::instance('cart')->store(Auth::user()->email);
        session()->flash('status', 'Quantity updated Successfully!');
        return redirect()->route('cart.show', 'cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartRequest  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Cart::instance($request->instance)->remove($request->rowId);
        Cart::instance($request->instance)->store(Auth::user()->email);
        session()->flash('status', 'Item removed Successfully');
        return redirect()->route('cart.show', $request->instance);
    }
}
