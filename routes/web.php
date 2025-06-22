<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\FrontendController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Auth::routes(['register' => false]);

Route::get('user/login', [FrontendController::class,'login'])->name('login.form');
Route::post('user/login', [FrontendController::class,'loginSubmit'])->name('login.submit');
Route::get('user/logout', [FrontendController::class,"logout"])->name('user.logout');
Route::get('user/register', [FrontendController::class,'register'])->name('register.form');

Route::get('/checkout', function () {
        return view('frontend.pages.checkout');
    })->name('checkout');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/product/search', [FrontendController::class,"productSearch"])->name('product.search');
Route::get('/cart', function () { return view('frontend.pages.cart');})->name('cart');
Route::get('product-detail/{slug}', [FrontendController::class,'productDetail'])->name('product-detail');
Route::get('/product-grids', [FrontendController::class,'productGrids'])->name('product-grids');
Route::get('/product-lists', [FrontendController::class,"productLists"])->name('product-lists');
Route::get('/product-cat/{slug}', [FrontendController::class,'productCat'])->name('product-cat');
Route::get('/product-brand/{slug}', 'FrontendController@productBrand')->name('product-brand');
Route::match(['get', 'post'], '/filter', [FrontendController::class,'productFilter'])->name('shop.filter');

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth', 'admin']
    
], function() {
     Route::get('/', [AdminController::class,'index'])->name('admin');
     Route::get('/file-manager', function () {
        return view('backend.layouts.file-manager');
     })->name('file-manager');
     Route::resource('banner', BannerController::class);
     Route::resource('brand', BrandController::class);
     Route::resource('/category', CategoryController::class);
     Route::resource('/product', ProductController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
