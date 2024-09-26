<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['common.variable'])->group(function() {
    Route::get('/map', 'App\Http\Controllers\MapController@mapShow')->name('map');
});