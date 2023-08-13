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
Route::get('/math/differential_geometry','App\Http\Controllers\YanaUniversityController@differentialGeometryShow');
//複素解析学
Route::get('/math/complex_analysis','App\Http\Controllers\YanaUniversityController@complexAnalysisShow');
//整数論
Route::get('/math/number_theory','App\Http\Controllers\YanaUniversityController@numberTheoryShow');
//グラフ理論
Route::get('/math/graph','App\Http\Controllers\YanaUniversityController@graphShow');
//組み合わせ論
Route::get('/math/combinatorics','App\Http\Controllers\YanaUniversityController@comibinatoricsShow');


//力学
Route::get('/physics/mechanics','App\Http\Controllers\YanaUniversityController@mechanicsShow');
//電磁気学
Route::get('/physics/electromagnetism','App\Http\Controllers\YanaUniversityController@electromagnetismShow');
//解析力学
Route::get('/physics/analytic_mechanics','App\Http\Controllers\YanaUniversityController@analyticMechanicsShow');
//熱・統計力学
Route::get('/physics/thermal_statistical_mechanics','App\Http\Controllers\YanaUniversityController@thermalStatisticalMechanicShow');
//相対性理論
Route::get('/physics/relativity','App\Http\Controllers\YanaUniversityController@relativityShow');
//量子力学
Route::get('/physics/quantum_mechanics','App\Http\Controllers\YanaUniversityController@quantumMechanicsShow');
//場の理論
Route::get('/physics/field_theory','App\Http\Controllers\YanaUniversityController@fieldTheoryShow');
//流体力学
Route::get('/physics/fulid_mechanics','App\Http\Controllers\YanaUniversityController@fulidMechanicsShow');
//素粒子物理学
Route::get('/physics/particle','App\Http\Controllers\YanaUniversityController@particleShow');
//固体物理学
Route::get('/physics/solid','App\Http\Controllers\YanaUniversityController@solidShow');
//塑性力学
Route::get('/physics/plastic_mechanics','App\Http\Controllers\YanaUniversityController@plasticMechanicsShow');

//C言語
Route::get('/programming/c','App\Http\Controllers\YanaUniversityController@cShow');
//Java
Route::get('/programming/java','App\Http\Controllers\YanaUniversityController@javaShow');
//python
Route::get('/programming/python','App\Http\Controllers\YanaUniversityController@pythonShow');
//HTML&CSS
Route::get('/programming/html&css','App\Http\Controllers\YanaUniversityController@htmlCssShow');
//PHP
Route::get('/programming/php','App\Http\Controllers\YanaUniversityController@phpShow');
//JavaScript
Route::get('/programming/javascript','App\Http\Controllers\YanaUniversityController@javascriptShow');
//laravel
Route::get('/programming/laravel','App\Http\Controllers\YanaUniversityController@laravelShow');

//物語の生み出し方
Route::get('/illust/story','App\Http\Controllers\YanaUniversityController@createStoryMethodShow');
//イラスト創作
Route::get('/illust/drawing','App\Http\Controllers\YanaUniversityController@drawingMethodShow');









