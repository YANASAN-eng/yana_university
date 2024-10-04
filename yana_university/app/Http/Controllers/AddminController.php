<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Product;
use App\Models\Lecture;
use App\Models\Field;
use App\Models\Chapter;
use App\Models\Section;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProductRequest;

class AddminController extends Controller
{
    /**
     * ポータル画面
     * 
     * @param void
     * @return void
     */
    public function portalManagement(){
        return view('addmin.portal');
    }

    /**
     * ユーザー管理画面
     * 
     * @param void
     * @return void
     */
    public function userManagement(){
        $users = User::get();

        return view('addmin.management.user', ["users" => $users]);
    }
    /**
     * 商品管理画面
     * 
     * @param void
     * @return void
     */
    public function productManagement()
    {
        return view('addmin.management.product');
    }
    /**
     * 講義管理画面
     * 
     * @param void
     * @return void
     */
    public function lectureManagement()
    {
        return view('addmin.management.lecture');
    }
    /**
     * 分野一覧画面
     * 
     * @param void
     * @return void
     */
    public function fieldManagement()
    {
        return view('addmin.management.field');
    }
    /**
     * 章一覧画面
     * 
     * @param void
     * @return void
     */
    public function chapterManagement()
    {
        return view('addmin.management.chapter');
    }
    /**
     * 節一覧画面
     * 
     * @param void
     * @return void 
     */
    public function sectionManagement()
    {
        return view('addmin.management.section');
    }
    /**
     * ユーザー登録画面
     * 
     * @param void
     * @return void
     */
    public function userRegistrationShow()
    {
        return view('addmin.registration.user');
    }
    /**
     * 商品登録画面
     * 
     * @param void
     * @return void
     */
    public function productRegistrationShow()
    {
        return view('addmin.registration.product');
    }
    /**
     * 講義登録画面
     * 
     * @param void
     * 
     * @return void
     */
    public function lectureRegistrationShow()
    {
        return view('addmin.registration.lecture');
    }
    /**
     * 分野登録
     * 
     * @param void
     * @return void
     */
    public function fieldRegistrationShow()
    {
        $lectures = Lecture::all();
        return view('addmin.registration.field', ['lectures' => $lectures]);
    }
    /**
     * 章登録
     * 
     * @param void
     * @return void
     */
    public function chapterRegistrationShow()
    {
        $fields = Field::all();
        return view('addmin.registration.chapter', ['fields' => $fields]);
    }
    /**
     * 節登録
     * 
     * @param void
     * @return void
     */
    public function sectionRegistrationShow()
    {
        $chapters = chapter::all();
        return view('addmin.registration.section', ['chapters' => $chapters]);
    }
    /**
     * ユーザー登録実行
     * 
     * @param AuthRequest $request
     * @return void
     */
    public function userRegistrationExecution(AuthRequest $request){
        $user_model = new User;
        $user_model->InsertUser($request);
        return redirect()->route('addmin.registration.user');
    }
    /**
     * 商品登録実行
     * 
     * @param ProductRequest $request
     * @return void
     */
    public function ProductExecution(ProductRequest $request)
    {
        $product_model = new Product;
        $product_model->insertProduct($request);
        return redirect()->route('addmin.registration.product');
    }
    /**
     * 講義登録
     * 
     * @param LectureRequest $request
     * @return void
     */
    public function LectureExecution(Request $request)
    {
        $lecture_model = new Lecture();
        $lecture_model->lectureRegistration($request);
        $file_path = base_path('views/lecture/' . $request->url . '.blade.php'); 
        $directory = dirname($file_path);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        $content = '';
        $content .= "@extends('layouts.frame')\n";
        $content .= "@section('title', '" . $request->name . "')\n";
        file_put_contents($file_path, $content);
        return redirect()->route('addmin.registration.lecture');
    }
    /**
     * 分野登録
     * 
     * @param FieldRequest
     * @return void
     */
    public function fieldExecution(Request $request)
    {
        $field_model = new Field();
        $field_model->fieldRegistration($request);
        return redirect()->route('addmin.registration.field');
    }
    /**
     * 章登録
     * 
     * @param ChapterRequest
     * @return void
     */
    public function chapterExecution(Request $request)
    {
        $chapter_model = new Chapter();
        $chapter_model->chapterRegistration($request);
        return redirect()->route('addmin.registration.chapter');
    }
    /**
     * 節登録
     * 
     * @param SectionRequest
     * @return void
     */
    public function sectionExecution(Request $request)
    {
        $section_model = new Section();
        $section_model->sectionRegistration($request);
        return redirect()->route('addmin.registration.section');
    }
    /**
     * ユーザー一覧表示
     * 
     * @param void
     * @return void
     */
    public function userInspection(){
        return view('addmin.inspection.user');
    }
    /**
     * 商品一覧画面
     * 
     * @param void
     * @return void
     */
    public function productInspection()
    {
        return view('addmin.inspection.product');
    }
    /**
     * 講義一覧画面
     * 
     * @param void
     * @return void
     */
    public function lectureInspection()
    {
        return view('addmin.inspection.lecture');
    }
    /**
     * 分野一覧画面
     * 
     * @param void
     * @return void
     */
    public function fieldInspection()
    {
        $lectures = Lecture::all();
        return view('addmin.inspection.field', ['lectures' => $lectures]);
    }
    /**
     * 章一覧画面
     * 
     * @param void
     * @return void
     */
    public function chapterInspection()
    {
        $fields = Field::all();
        return view('addmin.inspection.chapter', ['fields' => $fields]);
    }
    /**
     * 節一覧画面
     * 
     * @param void
     * @return void
     */
    public function sectionInspection()
    {
        $chapters = Chapter::all();
        return view('addmin.inspection.section', ['chapters' => $chapters]);
    }
    /**
     * ユーザー編集画面表示
     * 
     * @param $id
     * @return void
     */
    public function userEditShow($id)
    {
        $user = User::where('id',$id)->first();
        return view('addmin.edit.user', ['id' => $id, 'user' => $user]);
    }
    /**
     * 商品編集画面表示
     * 
     * @param int $id
     * @return void
     */
    public function productEditShow($id)
    {
        $product = Product::where('id', $id)->first();
        return view('addmin.edit.product',['product' => $product]);
    }
    /**
     * 講義編集画面表示
     * 
     * @param int $id
     * @return void
     */
    public function lectureEditShow($id)
    {
        $lecture = Lecture::where('id', $id)->first();
        return view('addmin.edit.lecture', ['lecture' => $lecture]);
    }
    /**
     * 分野編集画面
     * 
     * @param int $id
     * @return void
     */
    public function fieldEditShow($id)
    {
        $lectures = Lecture::all();
        $field = Field::where('id', $id)->first();
        return view('addmin.edit.field', ['field' => $field, 'lectures' => $lectures],
    );
    }
    /**
     * 章編集画面
     * 
     * @param int $id
     * @return void
     */
    public function chapterEditShow($id)
    {
        $lectures = Lecture::all();
        $fields = Field::all();
        $chapter = Chapter::where('id', $id)->first();
        return view('addmin.edit.chapter', ['lectures' => $lectures, 'fields' => $fields, 'chapter' => $chapter]);
    }
    /**
     * 節編集画面
     * 
     * @param int $id
     * @return void
     */
    public function sectionEditShow($id)
    {
        $lectures = Lecture::all();
        $fields = Field::all();
        $chapters = Chapter::all();
        $section = Section::where('id', $id)->first();
        return view('addmin.edit.section', ['lectures' => $lectures, 'fields' => $fields, 'chapters' => $chapters, 'section' => $section]);
    }
    /**
     * ユーザー編集実行部分
     * 
     * @param UserRequest $userrequest
     * @return $void
     */
    public function userEditExecution(UserRequest $request)
    {
        $profileImagePath = Auth::user()->profile_image;
        Storage::disk('public')->delete($profileImagePath);
        User::where('id', $request->id)
            ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'profile_image' => basename($request->file('profile_image')->store('profiles', 'public'))
            ]);
        return redirect('/addmin/inspection/user');
    }
    /**
     * 講義編集実行
     * 
     * @param Request $request
     * @return void
     */
    public function lectureEditExecution(Request $request)
    {
        $lectureImagePath = Lecture::where('id', $request->id)->first('lecture_image');
        Storage::disk('public')->delete($lectureImagePath);
        Lecture::where('id', $request->id)
            ->update([
                    'name' => $request->name,
                    'url' => $request->url,
                    'lecture_image' => basename($request->file('lecture_image')->store('lectures', 'public')),
            ]);
        return redirect('/addmin/inspection/lecture');
    }
    /**
     * 分野編集実行
     * 
     * @param Request $request
     * @return void
     */
    public function fieldEditExecution(Request $request)
    {
        Field::where('id', $request->id)
            ->update([
                'lecture_id' => $request->lecture_id,
                'name' => $request->name,
                'url' => $request->url
            ]);
        return redirect('/addmin/inspection/field');
    }
    /**
     * 章編集実行
     * 
     * @param Request $request
     * @return void
     */
    public function chapterEditExecution(Request $request)
    {
        Chapter::where('id', $request->id)
            ->update([
                'field_id' => $request->field_id,
                'name' => $request->name,
                'url' => $request->url
            ]);
        return redirect('/addmin/inspection/chapter');
    }
        /**
     * 章編集実行
     * 
     * @param Request $request
     * @return void
     */
    public function sectionEditExecution(Request $request)
    {
        Section::where('id', $request->id)
            ->update([
                'chapter_id' => $request->field_id,
                'name' => $request->name,
                'url' => $request->url
            ]);
        return redirect('/addmin/inspection/section');
    }
    /**
     * ユーザー削除機能
     * 
     * @param User $user.id
     * @return void
     */
    public function UserDelete($id)
    {
        $user_model = new User();
        $user_model->UserDelete($id);
        return redirect()->route('addmin.inspection.user');
    }
    /**
     * 商品削除
     * 
     * @param Production $product.id
     * @return void
     */
    public function productDelete($id)
    {
        $product_model = new Product();
        $product_model->deleteProduct($id);
        return redirect()->route('addmin.inspection.product');
    }
    /**
     * 講義削除機能
     * 
     * @param int $id
     * 
     * @return void
     */
    public function lectureDelete($id)
    {
        Lecture::where('id', $id)->delete();
        return redirect()->route('addmin.inspection.lecture');
    }
}
