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

Route::get('/', function () {
    return view('customer.home');
});

Route::prefix('/')->group(function () {
    Route::prefix('/products')->group(function () {
        Route::get('/', 'App\Http\Controllers\Customer\ProductController@index')->name('customer.product.index');
    });
    Route::prefix('/carts')->middleware(['auth'])->group(function () {
        Route::get('/', 'App\Http\Controllers\Customer\CartController@index')->name('customer.cart.index');
        Route::post('/{id}', 'App\Http\Controllers\Customer\CartController@store')->name('customer.cart.store');
        Route::delete('/{id}', 'App\Http\Controllers\Customer\CartController@delete')->name('customer.cart.delete');
        Route::delete('/', 'App\Http\Controllers\Customer\CartController@empty')->name('customer.cart.empty');
    });
});

Route::prefix('dashboard')->middleware(['isAdmin'])->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->middleware(['isAdmin'])->name('dashboard');
    Route::prefix('/products')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.product.index');
        Route::get('/create', 'App\Http\Controllers\Admin\ProductController@create')->name('admin.product.create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/create', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.product.store');
        Route::put('/{id}/edit', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.product.update');
        Route::delete('/delete/{id}', 'App\Http\Controllers\Admin\ProductController@delete')->name('admin.product.delete');
    });
});
require __DIR__.'/auth.php';
