<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * ログイン画面を表示
     * 
     * @param void
     * @return void
     */
    public function loginShow(){
        if (empty(Auth::user())) {
            return view('login');
        } else {
            return redirect()->route('home');
        }
    }
    /**
     * ログイン実行
     * 
     * @param AuthRequest $request
     * @return void
     */
    public function loginExecution(AuthRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }
    /**
     * ログアウト実行
     * 
     * @param void
     * @return void
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
    /**
     * アカウント登録画面表示
     * 
     * @param void
     * @return void
     */
    public function signUpShow()
    {
        return view('signup.signup');
    }
    /**
     * アカウント登録確認画面
     * 
     * @param void
     * @return void
     */
    public function signUpConfig(SignUpRequest $request) 
    {
        // 画像ファイルがアップロードされているかチェック
        if ($request->hasFile('profile_image')) {
            // ファイルを保存し、保存先のパスを取得する
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            // パスをフルURLに変換
            $profileImageUrl = asset('storage/' . $profileImagePath);
        } else {
            $profileImageUrl = null; // ファイルがない場合はnull
        }
        return view('signup.confirm',[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'profile_image' => $profileImageUrl
        ]);
    }
    /**
     * 確認画面から戻る
     * 
     * @param void
     * @return void
     */
    public function deleteImage(Request $request)
    {
        $profileImagePath = session('profile_image_path');

        if ($profileImagePath) {
            Storage::disk('public')->delete($profileImagePath);
            $request->session()->forget('profile_image_path');
        }
    
        return response()->json(['message' => '画像が削除されました'], 200);
    }
    /**
     * アカウント登録実行
     * 
     * @SignUpRequest $request
     * return void
     */
    public function signUpExecution(SignUpRequest $request)
    {
        $user_model = new User();
        $user_model->InsertUserSignup($request, session("profile_image_path"));
        return view('signup.complete');
    }
}
