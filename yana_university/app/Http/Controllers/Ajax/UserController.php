<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー情報
     * 
     * @param void
     * @return json
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('keywords') && !empty($request->keywords)) {
            $keywords = $request->input('keywords');
            $query->where('name', 'like', '%' . $keywords . '%');
        }
        $users = $query->paginate(3);
        return response()->json($users);
    }
    /**
     * ログインユーザーのみの情報を取得する
     * 
     * @param int $id
     * @return json
     */
    public function getUser($id)
    {
        $user = User::where('id', $id)->first('id');
        return response()->json($user);
    }
}
