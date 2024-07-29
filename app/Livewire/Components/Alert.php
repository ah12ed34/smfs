<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Events\AlertEvent;
use Illuminate\Support\Facades\Event;

class Alert extends Component
{
    public $message;
    public $type;
    public $darkMode = false;
    protected $listeners = ['alert' => 'handleAlert'];

    public function handleAlert($message, $type = 'success', $darkMode = false)
    {
        if (is_array($message)) {
            $this->message = $message['message'] ?? '';
            $this->type = $message['type'] ?? 'success';
            $this->darkMode = $message['darkMode'] ?? false;
        } else {
            $this->message = $message;
            $this->type = $type;
            $this->darkMode = $darkMode;
        }
        if ($this->type == 'error') {
            $this->type = 'danger';
        }
    }
    public function render()
    {
        return view('livewire.components.alert');
    }

    public function boot()
    {
        Event::listen(AlertEvent::class, function ($event) {
            $this->handleAlert($event->type, $event->message, $event->darkMode);
        });
    }
}
