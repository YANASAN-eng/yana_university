<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| please write to be used endpoint url in the file.
|
*/

// ユーザー全情報
Route::post('/ajax/users', 'App\Http\Controllers\Ajax\UserController@index');
// ログインユーザーのみ取得
Route::post('/ajax/profile', 'App\Http\Controllers\Ajax\ProfileController@getProfileImages');
// 商品情報
Route::post('/ajax/product', 'App\Http\Controllers\Ajax\ProductController@productData');