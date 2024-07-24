<?php

namespace App\Livewire\Components\Notifications;

use Livewire\Component;

class ReceiveNotifications extends Component
{
    protected $listeners = ['notification-sent' => 'notify', 'readNotifications', 'unread', 'notification-received' => 'notification'];
    public $unread = 0;
    public $user;

    public function mount()
    {
        // $this->unread = auth()->user()->Recipients()->where('status', 'unread')->count();
        $this->user = auth()->user();
        $this->unread();
    }

    public function unread()
    {
        $this->unread = $this->user->Recipients()->where('status', 'unread')->count();
        $this->dispatch('notification', $this->unread);
        return $this->unread;
    }


    // public function notify($message)
    // {
    //     $this->emit('notification-received', $message);
    // }

    public function notify($message)
    {
        $this->dispatch('notification-received', $message);
    }

    // public function notification($v)
    // {
    //     dd($v);
    // }

    public function readNotifications()
    {
        $this->user->Recipients()->each(function ($recipient) {
            $recipient->markAsRead();
        });
        $this->unread();
    }




    public function getReceiveNotificationsProperty()
    {
        return $this->user->Recipients()->get()->map(function ($recipient) {
            return $recipient->notification;
        })->sortByDesc('created_at');
    }
    public function render()
    {
        return view('livewire.components.notifications.receive-notifications',
            ['notifications' => $this->receiveNotifications]
        );
    }
}
