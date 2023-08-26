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
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
            'bgm_url' => explode("v=",$request->bgm_url)[1],
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
        return view('math.linear',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //解析学
    public function analysisShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','解析学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.analysis',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //ベクトル解析
    public function vectorShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','ベクトル解析学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.vector',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //テンソル解析
    public function tensorShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','テンソル解析学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.tensor',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //位相幾何学
    public function topologyShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','位相幾何学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.topology',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //微分幾何学
    public function differentialGeometryShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','微分幾何学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.differential_geometry',[
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
        return view('math.complex_anlysis',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //整数論
    public function numberTheoryShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','整数論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.number_theory',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //グラフ理論
    public function graphShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','グラフ理論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.graph',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //組み合わせ論
    public function comibinatoricsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','組み合わせ論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.combinatorics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //コーヒーブレイク
    public function mathCoffeeBreakShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','コーヒーブレイク')
            ->first()->id)->get();
        $sections = Section::get();
        return view('math.coffee_break',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }

    //力学
    public function mechanicsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //電磁気学
    public function electromagnetismShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','電磁気学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.electromagnetism',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //解析力学
    public function analyticMechanicsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','解析力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.analytic_mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //熱・統計力学
    public function thermalStatisticalMechanicShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','熱・統計力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.thermal_statical_mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //相対性理論
     public function relativityShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','相対性理論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.relativity',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //量子力学
     public function quantumMechanicsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','量子力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.quantum_mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //場の理論
     public function fieldTheoryShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','場の理論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.field_theory',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //流体力学
    public function fulidMechanicsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','流体力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.fulid_mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //素粒子物理学
    public function particleShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','素粒子物理学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.particle',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //固体物理学
    public function solidShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','固体物理学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.solid',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //塑性力学
    public function plasticMechanicsShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','塑性力学')
            ->first()->id)->get();
        $sections = Section::get();
        return view('physics.plastic_mechanics',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }



    //C言語
    public function cShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','C言語')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.c',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //Java
    public function javaShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','java')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.java',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //python
    public function pythonShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','python')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.python',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //python_linear
    public function pythonLinearShow(Request $request){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','python')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.python_linear',[
            'chapters' => $chapters,
            'sections' => $sections,
            'row' => $request->row,
            'column' => $request->column,
        ]);
    }
    //python_linear_output/
    public function pythonLinearOutput(Request $request){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','python')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.python_linear_output',[
            'chapters' => $chapters,
            'sections' => $sections,
            'row' => $request->row,
            'column' => $request->column,
        ]);
    }
    //HTML&CSS
    public function htmlCssShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','HTML&CSS')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.html_css',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //PHP
    public function phpShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','PHP')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.php',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //javascript
    public function javascriptShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','JavaScript')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.javascript',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //laravel
    public function laravelShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','laravel')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.laravel',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //コンパイラ設計技法
    public function CompilerShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','コンパイラ設計技法')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.compiler',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //docker
    public function dockerShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','docker')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.docker',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //language
    public function makingLanguageShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','プログラミング言語を自作しよう')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.making_language',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //情報基礎論
    public function informationShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','情報基礎論')
            ->first()->id)->get();
        $sections = Section::get();
        return view('programming.information',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }

    //物語の生み出し方
    public function createStoryMethodShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','物語の生み出し方')
            ->first()->id)->get();
        $sections = Section::get();
        return view('illust.create_story_method',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
    //作画法
    public function drawingMethodShow(){
        $chapters = Chapter::where('book_id','=',
            Book::where('book_name','=','作画法')
            ->first()->id)->get();
        $sections = Section::get();
        return view('illust.drawing_method',[
            'chapters' => $chapters,
            'sections' => $sections,
        ]);
    }
}
