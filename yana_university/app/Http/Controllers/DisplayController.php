<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ホームページを表示
class DisplayController extends Controller
{
    public function homeShow(){
        return view('home');
    }
}
