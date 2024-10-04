<?php

use Illuminate\Support\Facades\Route;

// 講義に属する分野のみを取得する
Route::get('/select/fields/{lecture_id}', 'App\Http\Controllers\Select\SelectController@getfields')->name('getfields');
// 分野に属する章のみを取得する
Route::get('/select/chapters/{field_id}', 'App\Http\Controllers\Select\SelectController@getchapters')->name('getchapters');