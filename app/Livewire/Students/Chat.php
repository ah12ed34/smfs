<?php

namespace App\Livewire\Students;

use Livewire\Component;
use Carbon\Carbon;


class Chat extends Component
{
    public $messages = [];
    public $message = '';

    public function sendMessage()
    {
        if ($this->message === '') {
            return;
        }

        $this->messages[] = [
            'sender' => 'You',
            'profile_pic' => 'path_to_user_image', // قم بتعديل هذا المسار
            'message' => $this->message,
            'time' => Carbon::now()->format('h:i A')
        ];

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.students.chat');
    }
}
