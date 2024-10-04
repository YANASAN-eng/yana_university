<?php

namespace App\Http\Controllers\Select;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Field;
use App\Models\Chapter;

class SelectController extends Controller
{
    /**
     * 講義に属する分野のみを取得する
     * 
     * @param integer $lecture_id
     * @return JSON 
     */
    public function getFields($lecture_id)
    {
        $fields = Field::where('lecture_id', $lecture_id)->get();
        return response()->json($fields);
    }
    /**
     * 分野に属する章のみを取得する
     * 
     * @param integer $field_id
     * @return JSON 
     */
    public function getChapters($field_id)
    {
        $chapters = Chapter::where('field_id', $field_id)->get();
        return response()->json($chapters);
    }
}
