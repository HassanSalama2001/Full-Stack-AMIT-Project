<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name('home');

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product/all', [ProductController::class, 'index'])->name('product.all');
Route::get('/category/{categories}', [ProductController::class, 'productsFromCat'])->name('category');
Route::get('/product/show/{products}', [ProductController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{products}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{products}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/show/{instance}', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart/edit/{rowId}', [CartController::class, 'edit'])->name('cart.edit');
    Route::get('/cart/delete/{instance}/{rowId}', [CartController::class, 'delete'])->name('cart.delete');
});

Route::get('/categories/create', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/categories/all', [CategoriesController::class, 'index'])->name('category.all');
Route::get('/categories/edit/{categories}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::post('/categories/update', [CategoriesController::class, 'update'])->name('category.update');
Route::get('/categories/delete/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');

Route::get('/order/all', [OrdersController::class, 'index'])->name('order.all');
Route::get('/order/store', [OrdersController::class, 'store'])->name('order.store');
Route::get('/order/update/{order}/{state}', [OrdersController::class, 'update'])->name('order.update');
Route::get('/order/history', [OrdersController::class, 'history'])->name('order.history');

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
require __DIR__.'/auth.php';
