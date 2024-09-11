<?php

use Illuminate\Support\Facades\Route;

Route::get('/paginate/user', 'App\Http\Controllers\Paginate\UserPaginateController@paginate');