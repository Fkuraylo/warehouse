<?php

use App\Http\Controllers\Product;
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
    return view('welcome');
});

//master branch

Route::group(['namespace' => 'App\HTTP\Controllers\Product'], function () {
    Route::get('/products', 'IndexController')->name('product.index');
    Route::get('/products/create', 'CreateController')->name('product.create');
    Route::post('/products', 'StoreController')->name('product.store');
    Route::get('/products/{product}', 'ShowController')->name('product.show');
    Route::get('/products/{product}/edit', 'EditController')->name('product.edit');
    Route::patch('/products/{product}', 'UpdateController')->name('product.update');
    Route::delete('/products/{product}', 'DestroyController')->name('product.destroy');
});





//Route::get('/products', [ProductController::class, 'index'])->name('product.index');
//Route::get('/about', [AboutController::class, 'index'])->name('about.index');
//Route::get('/taxes', [TaxesController::class, 'index'])->name('taxes.index');
//Route::resource('products', ProductController::class);

