<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Lecture;
use App\Models\Field;
use App\Models\Chapter;
use App\Models\Section;

class LectureController extends Controller
{
    /**
     * 講義資料取得
     * 
     * @param Request $request
     * @return void
     */
    public function lectureindex(Request $request)
    {
        $lectures = null;
        if ($request->has('addmin')) {
            if ($request->has('keywords') && !empty($request->keywords)) {
                $keywords = $request->input('keywords');
                $lectures = Lecture::where('name', 'like', '%' . $keywords . '%')->paginate(3);
            } else {
                $lectures = Lecture::paginate(3);
            }
        } else {
            $lectures = Lecture::all();
        }
        return response()->json($lectures);
    }
    /**
     * 分野に関するデータ
     * 
     * @param Request $request
     * @return void
     */
    public function fieldIndex(Request $request)
    {
        $fields = null;
        if ($request->has('addmin')) {
            if ($request->has('keywords') && !empty($request->keywords)) {
                $keywords = $request->input('keywords');
                $fields = Field::where('name', 'like', '%' . $keywords . '%')->paginate(3);
            } else {
                $fields = Field::paginate(3);
            }
        } else {
            $fields = Field::all();
        }
        return response()->json($fields);
    }
    /**
     * 章に関するデータ
     * 
     * @param Request $request
     * @return void
     */
    public function chapterIndex(Request $request)
    {
        $chapters = null;
        if ($request->has('addmin')) {
            if ($request->has('keywords') && !empty($request->keywords)) {
                $keywords = $request->input('keywords');
                $chapters = Chapter::where('name', 'like', '%' . $keywords . '%')->paginate(3);
            } else {
                $chapters = Chapter::paginate(3);
            }
        } else {
            $chapters = Chapter::all();
        }
        return response()->json($chapters);
    }
    /**
     * 節に関するデータ
     * 
     * @param Request $request
     * @return void
     */
    public function sectionIndex(Request $request)
    {
        $sections = null;
        if ($request->has('addmin')) {
            if ($request->has('keywords') && !empty($request->keywords)) {
                $keywords = $request->input('keywords');
                $sections = Section::where('name', 'like', '%' . $keywords . '%')->paginate(3);
            } else {
                $sections = Section::paginate(3);
            }
        } else {
            $sections = Section::all();
        }
        return response()->json($sections);
    }
}
