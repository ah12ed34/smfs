<?php

namespace App\Traits\Notification;

use App\Models\User;
use App\Models\Recipient;
use App\Models\Notification;
use App\Jobs\SendNotificationJob;
use App\Repositories\NotificationsRepository;

trait Senderable
{
    public  $message;
    public  $subject_id;
    public  $target;
    public  $sender_id;
    public  $sender_type;
    public  $ay_id;

    protected $RNotifi;

    public function initializeSenderable()
    {
        $this->RNotifi = new NotificationsRepository();
        $user = auth()->user();
        if (optional($user)->hasRole('admin')) {
            $this->sender_type = 'admin';
        } else {
            $this->sender_type = 'teacher';
        }
        $this->sender_id = $user->id;
        $this->ay_id = $this->RNotifi->getAYear()->id;
    }
    public function sendNotificationToAll($department_id = null, $level_id = null, $group_id = null, $role_id = null, $subject_id = null)
    {
        $ids = match ($this->target) {
            'student' => $this->subject_id
                ? $this->RNotifi->getUsersByDepartmentAndGroupAndSubject(null, $group_id, $this->subject_id)
                : $this->RNotifi->getUsersIsStudentByDepartmentAndLevelAndGroup($department_id, $level_id, $group_id),
            'teacher' => $this->RNotifi->getUsersIsTeacherByDepartment($department_id),
            'headOfDepartment' => $this->RNotifi->getUsersIsHeadOfDepartmentByDepartment($department_id),
            'employee' => $this->RNotifi->getUsersByRole($role_id),
            default => null
        };

        if ($ids && $this->message && $this->sender_id && $this->sender_type && $this->ay_id && $this->target) {
            if (!$this->message || ($this->sender_type == 'teacher' && !$this->subject_id)) {
                return null;
            }
            // إرسال الوظيفة إلى الطابور
            SendNotificationJob::dispatch($ids, $this->message, $this->sender_id, $this->subject_id, $this->ay_id, $this->sender_type, $this->target);
        }
    }

    // public function sendNotification($data)
    // {
    //     if (!$this->message) {
    //         return null;
    //     }
    //     if ($this->sender_type == 'teacher' && !$this->subject_id) {
    //         return null;
    //         // dd($this->subject_id);
    //     }
    //     $notification = Notification::create([
    //         'message' => $this->message,
    //         'sender_id' => $this->sender_id,
    //         'subject_id' => $this->subject_id,
    //         'ay_id' => $this->ay_id,
    //         'sender_type' => $this->sender_type,
    //         'target' => $this->target,
    //     ]);
    //     $users = $data;
    //     $users = is_array($users) ? $users : [$users];
    //     $users = array_unique($users);
    //     $users = array_filter($users);
    //     $users = array_values($users);
    //     $users = User::whereIn('id', $users)
    //         ->whereNot('id', $this->sender_id)->get();
    //     $users->each(function ($user) use ($notification) {
    //         Recipient::create([
    //             'notification_id' => $notification->id,
    //             'user_id' => $user->id,
    //         ]);
    //     });
    //     return $notification;
    // }
}
