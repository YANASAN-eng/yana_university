<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Bgm;
use App\Models\Subject;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Section;
use App\Http\Requests\BgmRequest;

class YanaUniversityController extends Controller
{
    //YANA CAFFE画面表示
    public function bgmShow(){
        $bgms = Bgm::all();
        $bgm_views = Bgm::orderBy('id')->paginate(4);
        $categories = DB::table('categories')->get();
        return view('bgm.index',[
            'bgms' => $bgms,
            'categories' => $categories,
            'bgm_views' => $bgm_views,
        ]);
    }
    //YANA CAFFE曲登録
    public function bgmSignUp(BgmRequest $request){
        $id = Bgm::max('id') + 1;
        DB::table('bgms')
        ->insert([
            'id' => $id,
            'bgm_name' => $request->bgm_name,
            'category_id' => Category::where('category_name','=',$request->bgm_category)->first()->id,
            'bgm_url' => explode("?v=",$request->bgm_url)[1],
        ]);
        return redirect('bgm');
    }
    //YANA大学ホームページ
    public function indexShow(){
        return view('index');
    }
    //mathページ表示
    public function mathIndexShow(){
        $books = Book::select('book_name','book_url')->where('subject_id','=',1)->get();
        return view('math.index',[
            'books' => $books,
        ]);
    }
    //physicsページ表示
    public function physicsIndexShow(){
        $books = Book::select('book_name','book_url')->where('subject_id','=',2)->get();
        return view('physics.index',[
            'books' => $books,
        ]);
    }
    //programmingページ表示
    public function programmingIndexShow(){
        $books = Book::select('book_name','book_url')->where('subject_id','=',3)->get();
        return view('programming.index',[
            'books' => $books,
        ]);
    }
    //illusページ表示
    public function illustIndexShow(){
        $books = Book::select('book_name','book_url')->where('subject_id','=',4)->get();
        return view('illust.index',[
            'books' => $books,
        ]);
    }
    //集合・位相表示
    public function setTopologyShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','集合・位相')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.set_topology',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //線形代数学表示
    public function LinearShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','線形代数学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.set_topology',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //複素解析学表示
    public function complexAnalysisShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','複素解析学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.set_topology',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }

}
