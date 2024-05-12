<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OneProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\deliveryPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/create', [CartController::class, 'create'])->name('cart.create');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/{id}', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/{id}/edit', [CartController::class, 'edit'])->name('cart.edit');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/search', [CartController::class, 'search'])->name('cart.search');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/oneProduct', [OneProductController::class, 'index'])->name('oneProduct');
Route::get('/oneProduct/create', [OneProductController::class, 'create'])->name('oneProduct.create');
Route::post('/oneProduct', [OneProductController::class, 'store'])->name('oneProduct.store');
Route::get('/oneProduct/{id}', [OneProductController::class, 'show'])->name('oneProduct.show');
Route::get('/oneProduct/{id}/edit', [OneProductController::class, 'edit'])->name('oneProduct.edit');
Route::put('/oneProduct/{id}', [OneProductController::class, 'update'])->name('oneProduct.update');
Route::delete('/oneProduct/{id}', [OneProductController::class, 'destroy'])->name('oneProduct.destroy');

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::get('/deliveryPayment', [deliveryPaymentController::class, 'index'])->name('deliveryPayment');
Route::get('/deliveryPayment/create', [deliveryPaymentController::class, 'create'])->name('deliveryPayment.create');
Route::post('/deliveryPayment', [deliveryPaymentController::class, 'store'])->name('deliveryPayment.store');
Route::get('/deliveryPayment/{id}', [deliveryPaymentController::class, 'show'])->name('deliveryPayment.show');
Route::get('/deliveryPayment/{id}/edit', [deliveryPaymentController::class, 'edit'])->name('deliveryPayment.edit');
Route::put('/deliveryPayment/{id}', [deliveryPaymentController::class, 'update'])->name('deliveryPayment.update');
Route::delete('/deliveryPayment/{id}', [deliveryPaymentController::class, 'destroy'])->name('deliveryPayment.destroy');