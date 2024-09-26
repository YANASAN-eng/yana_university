<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * 地図表示
     * 
     * @param void
     * @return View map
     */
    public function mapShow() {
        return view('map.map');
    }   
}
