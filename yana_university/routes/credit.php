<?php

use Illuminate\Support\Facades\Route;

// 共通変数を送るミドルウェア
Route::middleware(['common.variable'])->group(function() {
    // クレジッド決済画面
    Route::get('/charge', 'App\Http\Controllers\StripeController@chargeShow')->name('stripe');
    // クレジッド決済実行
    Route::post('/charge', 'App\Http\Controllers\StripeController@charge')->name('stripe.charge');
});