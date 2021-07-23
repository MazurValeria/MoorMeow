<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Person\OrderController;
use App\Http\Controllers\ResetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::get('currency/{currencyCode}', [MainController::class, 'changeCurrency'])->name('currency');
Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware(['set_locale'])->group(function () {
    Route::get('reset', [ResetController::class, 'reset'])->name('reset');

    Route::middleware(['auth'])->group(function () {
        Route::group([
            'prefix' => 'person',
            'namespace' => 'Person',
            'as' => 'person.',
        ], function () {
            Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
            Route::get('/orders/{order}', [OrderController::class,'show'])->name('orders.show');
        });

        Route::group([
            'namespace' => 'Admin',
            'prefix' => 'admin',
        ], function () {
            Route::group(['middleware' => 'is_admin'], function () {
                Route::get('/orders', [OrderController::class,'index'])->name('home');
                Route::get('/orders/{order}', [OrderController::class,'show'])->name('orders.show');
            });
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
            Route::resource('products/{product}/skus', 'SkuController');
            Route::resource('properties', 'PropertyController');
            Route::resource('merchants', 'MerchantController');
            Route::get('merchant/{merchant}/update_token', 'MerchantController@updateToken')->name('merchants.update_token');
            Route::resource('coupons', 'CouponController');
            Route::resource('properties/{property}/property-options', 'PropertyOptionController');
        });
    });

    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::post('subscription/{skus}', [MainController::class, 'subscribe'])->name('subscription');

    Route::group(['prefix' => 'basket'], function () {
        Route::post('/add/{skus}', [BasketController::class, 'basketAdd'])->name('basket-add');

        Route::group([
            'middleware' => 'basket_not_empty',
        ], function () {
            Route::get('/', [BasketController::class, 'basket'])->name('basket');
            Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
            Route::post('/remove/{skus}', [BasketController::class, 'basketRemove'])->name('basket-remove');
            Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
            Route::post('coupon', [BasketController::class, 'setCoupon'])->name('set-coupon');
        });
    });

    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}/{skus}', [MainController::class, 'sku'])->name('sku');
});
