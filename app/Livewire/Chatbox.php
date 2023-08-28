<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chatbox extends Component
{
    public $message = '';
    public $userMessage = '';
    public $responses = [
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
        [
            'user' => 'This is a question',
            'assistant' => 'This is a response'
        ],
    ];

    public function submit()
    {
        sleep(2);
        $this->responses[] = [
            'user' => 'This is new a question',
            'assistant' => 'This is new a response'
        ];
        $this->dispatch('message-added');
        /*  $key = env('OPENAI_KEY');
        $response = Http::withToken($key)
            ->withHeaders([
                'OpenAI-Organization' => 'org-JZmY9Fg4m9xH3JW5SIZ6vVDX'
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [["role" => "user", "content" => $this->userMessage]],
                'temperature' => 0.7
            ]);

        if ($response->successful()) {
            $this->responses[] = [
                'user' => $this->userMessage,
                'assistant' => $response->object()->choices[0]->message->content
            ];
            $this->userMessage = '';
        } else {
            dd($response->body());
        } */
    }

    public function render()
    {
        return view('livewire.chatbox');
    }
}