<?php
include base_path('routes/endpoints.php');
include base_path('routes/credit.php');
include base_path('routes/chatgpt.php');
include base_path('routes/map.php');
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

// 共通変数を送るミドルウェア
Route::middleware(['common.variable'])->group(function() {
    // ホームページ
    Route::get('/home', 'App\Http\Controllers\DisplayController@homeShow')->name('home');
    // ログイン関連
    Route::group(['prefix' => 'login', 'as' => 'login.'], function() {
        // ログインページ表示
        Route::get('/', 'App\Http\Controllers\AuthController@loginShow')->name('form');
        // ログイン実行
        Route::post('/execution', 'App\Http\Controllers\AuthController@loginExecution')->name('execution');
    });
    // アカウント登録関連
    Route::group(['prefix' => 'signup', 'as' => 'signup.'], function() {
        //　登録画面表示
        Route::get('/', 'App\Http\Controllers\AuthController@signUpShow')->name('show');
        // 登録確認
        Route::post('/confirm', 'App\Http\Controllers\AuthController@signUpConfig')->name('config');
        // 戻る際画像を消す
        Route::post('/delete', 'App\Http\Controllers\AuthController@deleteImage')->name('return');
        // 登録実行
        Route::post('/execution', 'App\Http\Controllers\AuthController@signUpExecution')->name('execution');
    });
    // ログアウト機能
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

    // 管理者関連
    Route::middleware(['addmin.role'])->group(function() {
        Route::group(['prefix' => 'addmin', 'as' => 'addmin.'], function() {
            // ポータル画面
            Route::get('/', 'App\Http\Controllers\AddminController@portalManagement')->name('portal');
            //　ユーザー管理画面
            Route::get('/user', 'App\Http\Controllers\AddminController@userManagement')->name('user');
            // 商品管理画面
            Route::get('/product', 'App\Http\Controllers\AddminController@productManagement')->name('product');
            // 登録系
            Route::group(['prefix' => '/registration', 'as' => 'registration.'], function() {
                // ユーザー登録画面
                Route::get('/user', 'App\Http\Controllers\AddminController@userRegistrationShow')->name('user');
                // ユーザー登録実行
                Route::post('/user/execution', 'App\Http\Controllers\AddminController@userRegistrationExecution')->name('user.execution');
                // 商品登録画面
                Route::get('/product', 'App\Http\Controllers\AddminController@productRegistrationShow')->name('product');
                // 商品登録実行
                Route::post('/product/execution', 'App\Http\Controllers\AddminController@ProductExecution')->name('product.execution');
            });
            //　一覧
            Route::group(['prefix' => '/inspection', 'as' => 'inspection.'], function() {
                // ユーザー一覧
                Route::get('/user', 'App\Http\Controllers\AddminController@userInspection')->name('user');
                // 商品一覧
                Route::get('/product', 'App\Http\Controllers\AddminController@productInspection')->name('product');
            });
            // 編集画面
            Route::group(['prefix' => '/edit', 'as' => 'edit.'], function() {
                // ユーザー編集画面
                Route::get('/user/{id}', 'App\Http\Controllers\AddminController@userEditShow')->name('user');
                // ユーザー編集実行
                Route::post('/user/execution', 'App\Http\Controllers\AddminController@userEditExecution')->name('user.execution');
                // 商品編集画面
                Route::get('/product/{id}', 'App\Http\Controllers\AddminController@productEditShow')->name('product');
                // 商品編集実行
                Route::post('/product/execution', 'App\Http\Controllers\AddminController@ProductExecution')->name('product.execution');
            });
            // 削除系
            Route::group(['prefix' => '/delete', 'as' => 'delete.'], function() {
                Route::post('/user/{id}', 'App\Http\Controllers\AddminController@userDelete')->name('user');
                route::post('/product/{id}', 'App\Http\Controllers\AddminController@productDelete')->name('product');
            });
        });
    });
    // プログラミング関連
    Route::group(['prefix' => '/programming', 'as' => 'programming.'], function() {
        // 項目表示
        Route::get('/', 'App\Http\Controllers\ProgrammingController@contentsShow')->name('contents');
        //作品集
        Route::group(['prefix' => 'works', 'as' => 'works.'], function() {
            Route::get('/', 'App\Http\Controllers\ProgrammingController@workContentsShow')->name('contents');
            //模擬的ECサイト
            Route::get('/EC', 'App\Http\Controllers\ProgrammingController@ECShow')->name('EC');
        }); 
    });
    // 会話チャット
    Route::get('/chatAI', 'App\Http\Controllers\ChatGptController@chataiShow')->name('chatAI');
})
?>