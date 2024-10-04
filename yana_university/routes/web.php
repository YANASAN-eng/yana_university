<?php
include base_path('routes/endpoints.php');
include base_path('routes/credit.php');
include base_path('routes/chatgpt.php');
include base_path('routes/map.php');
include base_path('routes/select.php');

use Illuminate\Support\Facades\Route;

use App\Models\Lecture;
use App\Models\Field;
use App\Models\Chapte;
use App\Models\Section;

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
            // 講義管理画面
            Route::get('/lecture', 'App\Http\Controllers\AddminController@lectureManagement')->name('lecture');
            // 分野管理画面
            Route::get('/field', 'App\Http\Controllers\AddminController@fieldManagement')->name('field');
            // 章管理画面
            Route::get('/chapter', 'App\Http\Controllers\AddminController@chapterManagement')->name('chapter');
            // 節管理画面
            Route::get('/section', 'App\Http\Controllers\AddminController@sectionManagement')->name('section');
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
                // 講義登録画面
                Route::get('/lecture', 'App\Http\Controllers\AddminController@lectureRegistrationShow')->name('lecture');
                // 講義登録実行
                Route::post('/lecture/execution', 'App\Http\Controllers\AddminController@lectureExecution')->name('lecture.execution');
                // 分野登録画面
                Route::get('/field', 'App\Http\Controllers\AddminController@fieldRegistrationShow')->name('field');
                // 分野登録実行
                Route::post('/field/execution', 'App\Http\Controllers\AddminController@fieldExecution')->name('field.execution');
                // 章登録画面
                Route::get('/chapter', 'App\Http\Controllers\AddminController@chapterRegistrationShow')->name('chapter');
                // 章登録実行
                Route::post('/chapter/execution', 'App\Http\Controllers\AddminController@chapterExecution')->name('chapter.execution');
                // 節登録画面
                Route::get('/section', 'App\Http\Controllers\AddminController@sectionRegistrationShow')->name('section');
                // 節登録実行
                Route::post('/section/execution', 'App\Http\Controllers\AddminController@sectionExecution')->name('section.execution');
            });
            //　一覧
            Route::group(['prefix' => '/inspection', 'as' => 'inspection.'], function() {
                // ユーザー一覧
                Route::get('/user', 'App\Http\Controllers\AddminController@userInspection')->name('user');
                // 商品一覧
                Route::get('/product', 'App\Http\Controllers\AddminController@productInspection')->name('product');
                // 講義一覧
                Route::get('/lecture', 'App\Http\Controllers\AddminController@lectureInspection')->name('lecture');
                // 分野一覧
                Route::get('/field', 'App\Http\Controllers\AddminController@fieldInspection')->name('field');
                // 章一覧
                Route::get('/chapter', 'App\Http\Controllers\AddminController@chapterInspection')->name('chapter');
                // 節一覧
                Route::get('/section', 'App\Http\Controllers\AddminController@sectionInspection')->name('section');
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
                // 講義編集画面
                Route::get('/lecture/{id}', 'App\Http\Controllers\AddminController@lectureEditShow')->name('lecture');
                // 講義編集実行
                Route::post('/lecture/execution', 'App\Http\Controllers\AddminController@lectureEditExecution')->name('lecture.execution');
                // 分野編集画面
                Route::get('/field/{id}', 'App\Http\Controllers\AddminController@fieldEditShow')->name('field');
                // 分野編集実行
                Route::post('/field/execution', 'App\Http\Controllers\AddminController@fieldEditExecution')->name('field.execution');
                // 章編集画面
                Route::get('/chapter/{id}', 'App\Http\Controllers\AddminController@chapterEditShow')->name('chapter');
                // 章編集実行
                Route::post('/chapter/execution', 'App\Http\Controllers\AddminController@chapterEditExecution')->name('chapter.execution'); 
                // 節集画面
                Route::get('/section/{id}', 'App\Http\Controllers\AddminController@sectionEditShow')->name('section');
                // 節集実行
                Route::post('/section/execution', 'App\Http\Controllers\AddminController@sectionEditExecution')->name('section.execution'); 
            });
            // 削除系
            Route::group(['prefix' => '/delete', 'as' => 'delete.'], function() {
                Route::post('/user/{id}', 'App\Http\Controllers\AddminController@userDelete')->name('user');
                Route::post('/product/{id}', 'App\Http\Controllers\AddminController@productDelete')->name('product');
                Route::post('/lecture/{id}', 'App\Http\Controllers\AddminController@lectureDelete')->name('lecture');
                Route::post('/field/{id}', 'App\Http\Controllers\AddminController@fieldDelete')->name('field');
                Route::post('/chapter/{id}', 'App\Http\Controllers\AddminController@chapterDelete')->name('chapter');
                Route::post('/section/{id}', 'App\Http\Controllers\AddminController@chapterDelete')->name('chapter');
            });
        });
    });
  
    // 講義に関するルート
    $lectures = Lecture::all();
    foreach ($lectures as $lecture) {
        Route::get($lecture->url, function() use ($lecture) {
            return view('lecture.' . $lecture->url);
        })->name($lecture->url);
        // 分野に関するルート
        $fields = Field::where('lecture_id', $lecture->id);
        foreach ($fields as $filed) {
            Route::get($lecture->url . '/' . $field->url, function() use ($field) {
                return view('field.' . $field->url);
            })->name($field->url);
            // 章に関するルート
            $chapters = Chapter::where('field_id', $field->id);
            foreach ($chapters as $chapter) {
                Route::get($lecture->url . '/' . $field->url . '/' . $chapter->url, function() use ($chapter) {
                    return view('chapter.' . $chapter->url);
                })->name($chapter->url);
                // 節に関するルート
                $sections = Section::where('chapter_id', $chapter->id);
                foreach ($sections as $section) {
                    Route::get($lecture->url . '/' . $field->url . '/' . $chapter->url . '/' . $section->url, function() use ($section) {
                        return view('section.' . $section->url);
                    })->name($section->url);
                }
            }
        }
    }
    // 会話チャット
    Route::get('/chatAI', 'App\Http\Controllers\ChatGptController@chataiShow')->name('chatAI');
})
?>