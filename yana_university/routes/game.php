<?php

use Illuminate\Support\Facades\Route;

// ゲーム集
Route::group(['prefix' => '/game', 'as' => 'game.'], function() {
    // シューティングゲーム作成
    Route::get('/shooting', 'App\Http\Controllers\GameController@shootShow')->name('shoot');
});
