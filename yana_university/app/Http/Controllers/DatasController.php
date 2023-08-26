<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Section;
use App\Http\Requests\BookRequest;
use App\Http\Requests\ChapterRequest;
use App\Http\Requests\SectionRequest;

class DatasController extends Controller
{
    //データを出力
    public function dataShow(Request $request){
        $subjects = Subject::all();
        $books = Book::paginate(10,["*"],'book-page');
        $chapters = Chapter::paginate(10,["*"],'chapter-page');
        $sections = Section::paginate(10,["*"],'section-page');
        $book_titles = Book::pluck('book_name');
        $chapter_titles = Chapter::pluck('chapter_name');
        $section_titles = Section::pluck('section_name');
        return view('edit.index',[
            'subjects' => $subjects,
            'books' => $books,
            'chapters' => $chapters,
            'sections' => $sections,
            'book_titles' => $book_titles,
            'chapter_titles' => $chapter_titles,
            'section_titles' => $section_titles,
        ]);
    }
    //本タイトル新規登録画面表示
    public function bookSignUpShow(){
        $subjects = Subject::all();
        return view('edit.sign_up.book_sign_up',[
            'subjects' => $subjects,
        ]);
    }
    //章タイトル新規登録画面表示
    public function chapterSignUpShow(){
        $books = Book::all();
        return view('edit.sign_up.chapter_sign_up',[
            'books' => $books,
        ]);
    }
    //節タイトル新規登録画面表示
    public function sectionSignUpShow(){
        $chapters = Chapter::all();
        return view('edit.sign_up.section_sign_up',[
            'chapters' => $chapters,
        ]);
    }
    //本タイトル新規登録実行
    public function bookSignUp(BookRequest $request){
        $id = Book::max('id') + 1;
        DB::table('books')
        ->insert([
            'id' => $id,
            'subject_id' => DB::table('subjects')->where('subject_name','=',$request->subject_name)->first()->id,
            'book_name' => $request->book_name,
            'book_url' => $request->book_url,
        ]);
        return redirect('/book/sign_up');
    }
    //章タイトル新規登録実行
    public function chapterSignUp(ChapterRequest $request){
        $id = Chapter::max('id') + 1;
        DB::table('chapters')
        ->insert([
            'id' => $id,
            'book_id' => DB::table('books')->where('book_name','=',$request->book_name)->first()->id,
            'chapter_name' => $request->chapter_name,
        ]);
        return redirect('/chapter/sign_up');
    }
    //節タイトル新規登録実行
    public function sectionSignUp(SectionRequest $request){
        $id = Section::max('id') + 1;
        DB::table('sections')
        ->insert([
            'id' => $id,
            'chapter_id' => DB::table('chapters')->where('chapter_name','=',$request->chapter_name)->first()->id,
            'section_name' => $request->section_name,
        ]);
        return redirect('/section/sign_up');
    }
    //本タイトル削除
    public function bookDestroy(Request $request){
        $id = $request->book_id;
        $length = Book::max('id');
        DB::table('books')
        ->where('id',$id)
        ->delete();
        for($i = 1;$i <= $length;$i++){
            if($i <= $id){
                continue;
            }else{
                DB::table("books")
                ->where('id',$i)
                ->update([
                    'id' => $i - 1,
                ]);
            }
        }
        return redirect('/list');
    }
    //章タイトル削除
    public function chapterDestroy(Request $request){
        $id = $request->chapter_id;
        $length = Book::max('id');
        DB::table('chapters')
        ->where('id',$id)
        ->delete();
        for($i = 1;$i <= $length;$i++){
            if($i <= $id){
                continue;
            }else{
                DB::table("chapters")
                ->where('id',$i)
                ->update([
                    'id' => $i - 1,
                ]);
            }
        }
        return redirect('/list');
    }
    //節タイトル削除
    public function sectionDestroy(Request $request){
        $id = $request->section_id;
        $length = Book::max('id');
        DB::table('sections')
        ->where('id',$id)
        ->delete();
        DB::table('sections')
        ->where('id',$id)
        ->delete();
        for($i = 1;$i <= $length;$i++){
            if($i <= $id){
                continue;
            }else{
                DB::table("sections")
                ->where('id',$i)
                ->update([
                    'id' => $i - 1,
                ]);
            }
        }
        return redirect('/list');
    }
    //本タイトルの編集画面
    public function bookEditShow(Request $request){
        $subjects = Subject::all();
        return view('edit.edit.book_edit',[
            'id' => $request->book_id,
            'subjects' => $subjects,
        ]);
    }
    //章タイトルの編集画面
    public function chapterEditShow(Request $request){
        $books = Book::all();
        return view('edit.edit.chapter_edit',[
            'id' => $request->chapter_id,
            'books' => $books,
        ]);
    }
    //節タイトルの編集画面
    public function sectionEditShow(Request $request){
        $chapters = Chapter::all();
        return view('edit.edit.section_edit',[
            'id' => $request->section_id,
            'chapters' => $chapters,
        ]);
    }
    //本のタイトルの編集
    public function bookEdit(BookRequest $request){
        DB::table('books')
        ->where('id',$request->book_id)
        ->update([
            'subject_id' => Subject::where('subject_name','=',$request->subject_name)->first()->id,
            'book_name' => $request->book_name,
            'book_url' => $request->book_url,
        ]);
        return redirect('/list');
    }
    //章のタイトルの編集
    public function chapterEdit(ChapterRequest $request){
        DB::table('chapters')
        ->where('id',$request->chapter_id)
        ->update([
            'book_id' => Book::where('book_name','=',$request->book_name)->first()->id,
            'chapter_name' => $request->chapter_name,
        ]);
        return redirect('/list');
    }
    //節のタイトルの編集
    public function sectionEdit(SectionRequest $request){
        DB::table('sections')
        ->where('id',$request->section_id)
        ->update([
            'chapter_id' => Chapter::where('chapter_name','=',$request->chapter_name)->first()->id,
            'section_name' => $request->section_name,
        ]);
        return redirect('/list');
    }
}
