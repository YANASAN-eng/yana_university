<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * アカウント画像取得用エンドポイント
     * 
     * @param void
     * @return json
     */
    public function getProfileImages()
    {
        $user = auth()->user();

        $profileImageUrl = $user->profile_image;

        return response()->json([
            'profileImageUrl' => $profileImageUrl
        ]);
    }
}
