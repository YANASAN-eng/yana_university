<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    /**
     * クレジットカード登録画面表示
     * 
     * @param void
     * @return void
     */
    public function creditShow()
    {
        return view('credit.form');
    }
}
