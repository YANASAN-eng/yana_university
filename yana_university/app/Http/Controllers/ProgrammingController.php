<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProgrammingController extends Controller
{
    /**
     * コンテンツ表示
     * 
     * @param void
     * @return void
     */
    public function contentsShow()
    {
        return view('programming.contents');
    }
    /**
     * 作品集を表示する
     * 
     * @param void
     * @return void
     */
    public function workContentsShow()
    {
        return view('programming.works.contents');
    }
    /**
     * 模擬的ECサイト紹介
     * 
     * @param void
     * @return void
     */
    public function ECShow()
    {
        $product_model = new Product();
        $products = $product_model->allProduct();
        return view('programming.works.EC', ['products' => $products]);
    }
}
