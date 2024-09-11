<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Models\Lecture;

class LectureController extends Controller
{
    /**
     * 講義資料取得
     * 
     * @param void
     * @return void
     */
    public function lectureShow()
    {
        return Lecture::all();
    }
}
