<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class ChatGptController extends Controller
{
    /**
     * チャットAI画面表示
     * 
     * @param void
     * @return void
     */
    public function chatAIShow()
    {
        $user = Auth::user();
        return view('chat.chatai', ['user' => $user]);
    }
    /**
     * チャットGPTからデータを取得
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChatGptAnswer(Request $request)
    {
        $api_key = config('services.openai.api_key');
        $url = 'https://api.openai.com/v1/chat/completions';

        $personality_path = base_path('personality.txt');

        if (!file_exists($personality_path)) {
            Log::error('personality.txtが見つかりません');
            return redirect()->json(['error' => '性格設定ファイルが見つかりません'], 500);
        }

        $personality = file_get_contents($personality_path);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $personality,
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->input('text'),
                    ],
                ],
                'max_tokens' => 1000,
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                Log::error('API Error: ' . $response->body());
                return response()->json(['error' => 'APIからの応答が失敗しました。'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return response()->json(['error' => '内部エラーが発生しました。'], 500);
        }
    }
}
