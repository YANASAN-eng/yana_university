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

//YanaCaffeを表示
Route::get('/bgm','App\Http\Controllers\YanaUniversityController@bgmShow');
//YanaCaffe曲を新規登録
Route::post('/bgm','App\Http\Controllers\YanaUniversityController@bgmSignUp');

//YANA大学ホームページ表示
Route::get('/home','App\Http\Controllers\YanaUniversityController@indexShow');

//数学科
Route::get('/math','App\Http\Controllers\YanaUniversityController@mathIndexShow');
//物理学科
Route::get('/physics','App\Http\Controllers\YanaUniversityController@physicsIndexShow');
//情報工学科
Route::get('/programming','App\Http\Controllers\YanaUniversityController@programmingIndexShow');
//イラスト創科
Route::get('/illust','App\Http\Controllers\YanaUniversityController@illustIndexShow');

//集合・位相表示
Route::get('/math/set_topology','App\Http\Controllers\YanaUniversityController@setTopologyShow');
//線形代数学表示
Route::get('/math/linear','App\Http\Controllers\YanaUniversityController@linearShow');
//解析学表示
Route::get('/math/analysis','App\Http\Controllers\YanaUniversityController@analysisShow');
//ベクトル解析
Route::get('/math/vector','App\Http\Controllers\YanaUniversityController@vectorShow');
//テンソル解析
Route::get('/math/tensor','App\Http\Controllers\YanaUniversityController@tensorShow');
//位相幾何学
Route::get('/math/topology','App\Http\Controllers\YanaUniversityController@topologyShow');
//微分幾何学
Route::get('/math/differental_geometry','App\Http\Controllers\YanaUniversityController@differentalGeometryShow');
//複素解析学
Route::get('/math/complex_analysis','App\Http\Controllers\YanaUniversityController@complexAnalysisShow');
//グラフ理論
Route::get('/math/graph','App\Http\Controllers\YanaUniversityController@graphShow');








