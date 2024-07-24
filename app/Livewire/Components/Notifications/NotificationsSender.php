<?php

namespace App\Livewire\Components\Notifications;

use App\Models\Notification;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\Notification\Senderable;
use App\Traits\ToolsNav;
use Illuminate\Http\Request;
use Hamcrest\Type\IsNumeric;

class NotificationsSender extends Component
{
    use ToolsNav, Senderable;
    public $NotificationActive = '';
    public $selectActive = [];
    public $group_subject = null;
    protected $listeners = ['na' => 'getNA'];

    public function getNA($value)
    {
        $this->NotificationActive = $value;
        switch ($value) {
            case 'student_a':
                if ($this->sender_type == 'admin') {
                    $this->selectActive = ['department', 'level', 'group'];
                } else {
                    $this->selectActive = ['group'];
                }
                $this->target = 'student';
                break;
            case 'teacher_a':
                $this->selectActive = ['department'];
                $this->target = 'teacher';
                break;
            case 'HOD':
                $this->selectActive = ['department'];
                $this->target = 'headOfDepartment';
                break;
            case 'employee':
                $this->selectActive = ['role'];
                $this->target = 'employee';
                break;
            default:
                $this->selectActive = [];
                $this->target = null;
                break;
        }
        $this->initializeToolsNav(selectActive: $this->selectActive, isRequest: false);
        if ('employee' == $value) {
            $this->roles = $this->roles->whereNotIn('name', ['admin', 'HeadOfDepartment']);
        }
    }
    public function mount()
    {
        $this->initializeToolsNav(selectActive: $this->selectActive, isRequest: false);
        $this->initializeSenderable();
        if ($this->group_subject) {
            $this->groups = $this->group_subject->getGroups();
            $this->subject_id = $this->group_subject->id;
            $this->target = 'student';
        }
    }
    // public $nameRoute;
    // public $parameters;
    // public $query;


    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string'
        ]);
        $this->sendNotificationToAll($this->active['department'], $this->active['level'], $this->active['group'], $this->active['role']);
        $this->resetMassage();
    }

    public function resetMassage()
    {
        $this->reset('message');
    }


    public function getNotificationsProperty()
    {
        return Notification::orderBy('created_at', 'desc')
            ->where('sender_id', auth()->user()->id)
            ->where('sender_type', $this->sender_type)
            ->where('target', $this?->target ?? null)
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.components.notifications.notifications-sender', [
            'notifications' => $this->notifications
        ]);
    }
}
