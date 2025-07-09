<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as UserProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('user/login', [AuthController::class, 'login'])->name('login.form');
Route::post('user/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('user/register', [AuthController::class, 'register'])->name('register.form');
Route::post('user/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::post('password-reset', [AuthController::class, 'showResetForm'])->name('password.reset');

Route::get('/checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/product/search', [UserProductController::class, 'productSearch'])->name('product.search');
Route::get('/cart', function () {
    return view('frontend.pages.cart');
})->name('cart');
Route::get('product-detail/{slug}', [UserProductController::class, 'productDetail'])->name('product-detail');
Route::get('/product-grids', [UserProductController::class, 'productGrids'])->name('product-grids');
Route::get('/product-lists', [UserProductController::class, 'productLists'])->name('product-lists');
Route::get('/product-cat/{slug}', [UserProductController::class, 'productCat'])->name('product-cat');
Route::get('/product-brand/{slug}', [UserProductController::class, 'productBrand'])->name('product-brand');
Route::match(['get', 'post'], '/filter', [UserProductController::class, 'productFilter'])->name('shop.filter');

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth', 'admin'],

], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
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
