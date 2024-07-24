<?php

namespace App\Traits\Notification;

use App\Models\Notification;
use App\Repositories\NotificationsRepository;
use App\Models\Recipient;
use App\Models\User;

trait Senderable
{
    public  $message;
    public  $subject_id;
    // target is the route to redirect to after clicking the notification
    public  $target; // student, department, level, group, subject
    public  $sender_id;
    public  $sender_type;
    public  $ay_id;

    protected $RNotifi;

    public function initializeSenderable()
    {
        $this->RNotifi = new NotificationsRepository();
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            $this->sender_type = 'admin';
        } else {
            $this->sender_type = 'teacher';
        }
        $this->sender_id = $user->id;
        $this->ay_id = $this->RNotifi->getAYear()->id;
    }

    // public function sendNotification($message, $subject, $target, $sender, $recipients)
    // {
    //     $notification = new Notification();
    //     $notification->message = $message;
    //     $notification->subject_id = $subject->id;
    //     $notification->ay_id = $subject->ay_id;
    //     $notification->sender_id = $sender->id;
    //     $notification->sender_type = get_class($sender);
    //     $notification->target = $target;
    //     $notification->save();
    //     foreach ($recipients as $recipient) {
    //         $recipient = new Recipient();
    //         $recipient->notification_id = $notification->id;
    //         $recipient->user_id = $recipient->id;
    //         $recipient->save();
    //     }
    // }

    public function sendNotificationToAll($department_id = null, $level_id = null, $group_id = null, $role_id = null, $subject_id = null)
    {
        $ids = null;
        switch ($this->target) {
            case 'student':
                if ($this->subject_id) {
                    $ids = $this->RNotifi->getUsersByDepartmentAndGroupAndSubject(null, $group_id, $this->subject_id);
                } else {
                    $ids = $this->RNotifi->getUsersIsStudentByDepartmentAndLevelAndGroup($department_id, $level_id, $group_id);
                }
                break;
            case 'teacher':
                $ids = $this->RNotifi->getUsersIsTeacherByDepartment($department_id);
                break;
            case 'headOfDepartment':
                $ids = $this->RNotifi->getUsersIsHeadOfDepartmentByDepartment($department_id);
                break;
            case 'employee':
                $ids = $this->RNotifi->getUsersByRole($role_id);
                break;
        }
        if (
            $ids && $this->message
            && $this->sender_id
            && $this->sender_type
            && $this->ay_id
            && $this->target
        ) {
            $this->sendNotification($ids);
        }
    }

    public function sendNotification($data)
    {
        if (!$this->message) {
            return null;
        }
        if ($this->sender_type == 'teacher' && !$this->subject_id) {
            return null;
            dd($this->subject_id);
        }
        $notification = Notification::create([
            'message' => $this->message,
            'sender_id' => $this->sender_id,
            'subject_id' => $this->subject_id,
            'ay_id' => $this->ay_id,
            'sender_type' => $this->sender_type,
            'target' => $this->target,
        ]);
        $users = $data;
        $users = is_array($users) ? $users : [$users];
        $users = array_unique($users);
        $users = array_filter($users);
        $users = array_values($users);
        $users = User::whereIn('id', $users)
            ->whereNot('id', $this->sender_id)->get();
        $users->each(function ($user) use ($notification) {
            Recipient::create([
                'notification_id' => $notification->id,
                'user_id' => $user->id,
            ]);
        });
        return $notification;
    }
}
