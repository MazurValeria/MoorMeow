<?php

use App\Http\Controllers\MainController;
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

Route::group(['middleware' => 'guest'], static function () {
    Route::get('register', fn () => view('auth.register'));
    Route::get('login', [
        'as' => 'login',
        'uses' => fn () => view('auth.login')
    ]);

    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@process');
    Route::post('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@process']);
});

Route::group(['middleware' => 'auth'], static function () {
    Route::get('', fn() => view('index'));
    Route::get('logout', 'App\Http\Controllers\Auth\LogoutController@process');
});

Route::get( '/', [ MainController::class, 'index' ] );
Route::get('/categories', [ MainController::class, 'categories' ] );
Route::get('/category', [ MainController::class, 'category' ] );
Route::get('/product', [ MainController::class, 'product' ] );

