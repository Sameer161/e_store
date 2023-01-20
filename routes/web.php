<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::view('/out','main.home');
Route::get('/',[App\Http\Controllers\ProductController::class,'view']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::view('/index','admin.index');

// Categories
Route::view('/addcategories','admin.categories.addcategories');
Route::post('/postcategories',[App\Http\Controllers\CategoriesController::class, 'create']);
Route::get('/showcategories',[App\Http\Controllers\CategoriesController::class,'show']);
Route::get('/deletecategories/{id}',[App\Http\Controllers\CategoriesController::class,'destroy']);
Route::get('/updatecategories/{id}',[App\Http\Controllers\CategoriesController::class,'edit']);
Route::post('/updatecategories/{id}',[App\Http\Controllers\CategoriesController::class,'update']);

// Products

Route::get('/addproducts',[App\Http\Controllers\CategoriesController::class, 'view']);
Route::post('/postproduct',[App\Http\Controllers\ProductController::class,'create']);
Route::get('/viewproducts',[App\Http\Controllers\ProductController::class,'show']);
Route::get('/delproduct/{id}',[App\Http\Controllers\ProductController::class,'destroy']);
Route::get('/updateproduct/{id}',[App\Http\Controllers\ProductController::class,'edit']);
Route::post('/updateproduct/{id}',[App\Http\Controllers\ProductController::class,'update']);

// Single_Product
Route::get('/singleproduct/{id}',[App\Http\Controllers\ProductController::class,'store']);

// Cart
Route::post('/postcart/{id}',[App\Http\Controllers\CartController::class,'create']);
Route::get('/cartitem',[App\Http\Controllers\CartController::class,'show']);
Route::get('/delal/{id}',[App\Http\Controllers\CartController::class,'destroy']);
Route::post('/updatecart',[App\Http\Controllers\CartController::class,'edit']);
Route::get('/checkout',[App\Http\Controllers\CartController::class,'store']);
//Order
Route::post('/order',[App\Http\Controllers\OrderController::class,'create']);

//Stripe

Route::get('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripe']);
Route::post('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');
//Login
Route::view('/userlogin','admin.user.login');

//Cart Logo
Route::get('/cartquan',[App\Http\Controllers\CartController::class,'update']);