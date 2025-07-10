<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CouponController as UserCouponController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaypalController;
use App\Http\Controllers\Frontend\ProductController as UserProductController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('user/login', [AuthController::class, 'login'])->name('login.form');
Route::post('user/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('user/register', [AuthController::class, 'register'])->name('register.form');
Route::post('user/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::post('password-reset', [AuthController::class, 'showResetForm'])->name('password.reset');

Route::get('/checkout', [OrderController::class, 'checkout'])->middleware('user')->name('checkout');

Route::get('/', [HomeController::class, 'home'])->name('homepage');
Route::get('/home', [HomeController::class, 'index']);

Route::match(['get', 'post'], '/product/search', [UserProductController::class, 'productSearch'])->name('product.search');
Route::get('product-detail/{slug}', [UserProductController::class, 'productDetail'])->name('product-detail');
Route::get('/product-grids', [UserProductController::class, 'productGrids'])->name('product-grids');
Route::get('/product-lists', [UserProductController::class, 'productLists'])->name('product-lists');
Route::get('/product-cat/{slug}', [UserProductController::class, 'productCat'])->name('product-cat');
Route::get('/product-brand/{slug}', [UserProductController::class, 'productBrand'])->name('product-brand');
Route::match(['get', 'post'], '/filter', [UserProductController::class, 'productFilter'])->name('shop.filter');

Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');

Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('user');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/income', [CartController::class, 'incomeChart'])->name('product.order.income');
Route::get('order/pdf/{id}', [AdminOrderController::class, 'pdf'])->name('order.pdf');

Route::post('/coupon-store', [UserCouponController::class, 'couponStore'])->name('coupon-store');

Route::get('payment', [PaypalController::class, 'payment'])->name('payment');
Route::get('cancel', [PaypalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PaypalController::class, 'success'])->name('payment.success');

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
    Route::resource('/order', AdminOrderController::class);
    Route::resource('/shipping', ShippingController::class);
    Route::resource('/coupon', AdminCouponController::class);
    Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
    Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
});

Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    Route::get('/', [UserController::class, 'index'])->name('user');

    Route::get('/order', [UserController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [UserController::class, 'orderShow'])->name('user.order.show');
    Route::delete('/order/delete/{id}', [UserController::class, 'userOrderDelete'])->name('user.order.delete');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
