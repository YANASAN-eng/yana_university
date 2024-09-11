<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;

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
     * ユーザー編集画面表示
     * 
     * @param $id
     * @return void
     */
    public function userEditShow($id)
    {
        $user = User::where('id',$id)->first();
        return view('addmin.edit.user', ['user' => $user]);
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
     * ユーザー編集実行部分
     * 
     * @param UserRequest $userrequest
     * @return $void
     */
    public function userEditExecution(UserRequest $request)
    {
        User::upsertUser($request);
        return redirect('/addmin/inspection/user');
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
}
