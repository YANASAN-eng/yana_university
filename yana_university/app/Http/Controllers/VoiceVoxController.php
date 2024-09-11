<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoiceVoxController extends Controller
{
    /**
     * 会話チャット表示
     * 
     * @param void
     * @return void
     */
    public function voicevoxShow()
    {
        return view('voicevox.voicevox');
    }
}
