<?php 

use Illuminate\Support\Facades\Route;

Route::post('/chatgpt', 'App\Http\Controllers\ChatGptController@getChatGptAnswer')->name('chatgpt');