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

Route::get('/', function (\App\Models\Product $product, \App\Models\Basket $basket) {
    $products=\App\Models\Product::all();
    $types=\App\Models\Type::all();
    $basket_id = request()->cookie('basket_id');
    if (!empty($basket_id)) {
    $basket_products = \App\Models\Basket::find($basket_id)->products;
    return view('welcome', ['products' => $products, 'types' => $types, 'basket_products' => $basket_products]);
    }
    else {
        return view('welcome', ['products' => $products, 'types' => $types]);
    }
});
Route::get('/contact', function () {
    return view('contact');

});

Route::get('/about', function () {
    return view('about');
});
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/product/store', [App\Http\Controllers\AdminController::class, 'store_product'])->name('store_product')->middleware('admin');
Route::post('/message/store', [App\Http\Controllers\MessageController::class, 'store'])->name('store_message');
Route::get('/admin/messages', [App\Http\Controllers\AdminController::class, 'index_messages'])->name('messages')->middleware('admin');
Route::post('/admin/types/store', [App\Http\Controllers\AdminController::class, 'store_type'])->name('store_type')->middleware('admin');
Route::get('/admin',  'App\Http\Controllers\AdminController@index')->name('admin')->middleware('admin');
Route::get('admin/products/{product_id}',  'App\Http\Controllers\AdminController@edit')->name('product_edit')->middleware('admin');
Route::get('/products/{product_id}',  'App\Http\Controllers\ProductController@edit')->name('product');
Route::patch('admin/products/{product_id}/update', 'App\Http\Controllers\AdminController@update_product')->name('update_product')->middleware('admin'); // Редактирование продукта
Route::get('/admin/{product_id}/delete',  'App\Http\Controllers\AdminController@delete_product')->name('delete_product')->middleware('admin');//удаление продукта
Route::get('/admin/{type_id}/delete_type',  'App\Http\Controllers\AdminController@delete_type')->name('delete_type')->middleware('admin');//удаление типа
Route::get('/admin/messages/{message_id}/delete',  'App\Http\Controllers\AdminController@delete_message')->name('delete_message')->middleware('admin');//удаление заявки формы о/с
Route::patch('/admin/{type_id}/update_type', 'App\Http\Controllers\AdminController@update_type')->name('update_type')->middleware('admin'); // Редактирование типа

Route::get('/basket/index', 'App\Http\Controllers\BasketController@index')->name('basket.index');
Route::get('/basket/oformlenie', 'App\Http\Controllers\BasketController@oformlenie')->name('basket.oformlenie');
Route::post('/basket/oformlenie/order', 'App\Http\Controllers\BasketController@oformlenie_store')->name('basket.oformlenie_store');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@add')
    ->where('id', '[0-9]+')
    ->name('basket.add');
Route::post('/basket/plus/{id}', 'App\Http\Controllers\BasketController@plus')
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', 'App\Http\Controllers\BasketController@minus')
    ->where('id', '[0-9]+')
    ->name('basket.minus');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@remove')
    ->where('id', '[0-9]+')
    ->name('basket.remove');
Route::post('/basket/clear', 'App\Http\Controllers\BasketController@clear')->name('basket.clear');
