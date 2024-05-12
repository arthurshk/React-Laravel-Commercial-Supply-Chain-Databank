<?php

use Illuminate\Http\Request;
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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/{id}', [CartController::class, 'show']);
Route::post('/cart', [CartController::class, 'store']);
Route::patch('/cart/{id}', [CartController::class, 'update']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category', [CategoryController::class, 'store']);
Route::patch('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/oneProduct', [OneProductController::class, 'index']);
Route::get('/oneProduct/{id}', [OneProductController::class, 'show']);
Route::post('/oneProduct', [OneProductController::class, 'store']);
Route::patch('/oneProduct/{id}', [OneProductController::class, 'update']);
Route::delete('/oneProduct/{id}', [OneProductController::class, 'destroy']);

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{id}', [ProductsController::class, 'show']);
Route::post('/products', [ProductsController::class, 'store']);
Route::patch('/products/{id}', [ProductsController::class, 'update']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy']);

Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact/{id}', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);
Route::patch('/contact/{id}', [ContactController::class, 'update']);
Route::delete('/contact/{id}', [ContactController::class, 'destroy']);

Route::get('/deliveryPayment', [deliveryPaymentController::class, 'index']);
Route::get('/deliveryPayment/{id}', [deliveryPaymentController::class, 'show']);
Route::post('/deliveryPayment', [deliveryPaymentController::class, 'store']);
Route::patch('/deliveryPayment/{id}', [deliveryPaymentController::class, 'update']);
Route::delete('/deliveryPayment/{id}', [deliveryPaymentController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
