<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('guest')->group(function (){
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('/contact', 'contact')->name('contact');
Route::view('/terms-and-conditions', 'tac')->name('tac');
Route::view('/frequency-and-answer', 'faq')->name('faq');


Route::get('/search/{slug:slug}', function (\App\Models\Slug $slug){
   dd($slug->products()) ;
})->name('products.search');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'get'])->name('cart.index');
Route::get('/cart/add{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove{id}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/', function (){
    $latest_product = \App\Models\Product::latest()->limit(4)->get();
    $men_product = \App\Models\Category::where('slug','men')->first()->products()->limit(6)->get();
    $women_product = \App\Models\Category::where('slug','women')->first()->products()->limit(6)->get();

    return view('home',[
        'latest_product' => $latest_product,
        'men_product'=> $men_product,
        'women_product'=> $women_product,
    ]);
} )->name('home');


