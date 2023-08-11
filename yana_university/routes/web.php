<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//目次管理用ページを公開
Route::get('/list','App\Http\Controllers\DatasController@dataShow');

//本タイトル新規登録ページを公開
Route::get('/book/sign_up','App\Http\Controllers\DatasController@bookSignUpShow');
//本タイトル新規登録実行
Route::post('/book/sign_up','App\Http\Controllers\DatasController@bookSignUp');

//章タイトル新規登録ページ公開
Route::get('/chapter/sign_up','App\Http\Controllers\DatasController@chapterSignUpShow');
//章タイトル新規登録実行
Route::post('/chapter/sign_up','App\Http\Controllers\DatasController@chapterSignUp');

//節タイトル新規登録ページを公開
Route::get('/section/sign_up','App\Http\Controllers\DatasController@sectionSignUpShow');
//節タイトル新規登録実行
Route::post('/section/sign_up','App\Http\Controllers\DatasController@sectionSignUp');

//本タイトル削除
Route::post('/book/destroy','App\Http\Controllers\DatasController@bookDestroy');
//章タイトル削除
Route::post('/chapter/destroy','App\Http\Controllers\DatasController@chapterDestroy');
//節タイトル削除
Route::post('/section/destroy','App\Http\Controllers\DatasController@sectionDestroy');

//本タイトルの編集画面を公開
Route::get('/book/edit','App\Http\Controllers\DatasController@bookEditShow');
//章タイトルの編集画面公開
Route::get('/chapter/edit','App\Http\Controllers\DatasController@chapterEditShow');
//節タイトルの編集画面公開
Route::get('/section/edit','App\Http\Controllers\DatasController@sectionEditShow');

//本タイトルの編集を実行
Route::post('/book/edit','App\Http\Controllers\DatasController@bookEdit');
//章タイトルの編集を実行
Route::post('/chapter/edit','App\Http\Controllers\DatasController@chapterEdit');
//節タイトルの編集を実行
Route::post('/section/edit','App\Http\Controllers\DatasController@sectionEdit');