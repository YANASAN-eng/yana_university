<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('login');
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
        return view('signup');
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
        $user_model->InsertUser($request);
        return redirect('/login');
    }
}
