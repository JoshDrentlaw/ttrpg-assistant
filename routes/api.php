<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chat_response', function (Request $request) {
    $key = env('OPENAI_KEY');
    $response = Http::withToken($key)
        ->withHeaders([
            'OpenAI-Organization' => 'org-JZmY9Fg4m9xH3JW5SIZ6vVDX'
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [["role" => "user", "content" => "Roll 10d8 and give me the total"]],
            'temperature' => 0.7
        ]);

    if ($response->successful()) {
        dd($response->collect());
    } else {
        dd($response->body());
    }
});