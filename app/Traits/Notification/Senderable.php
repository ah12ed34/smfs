<?php

namespace App\Traits\Notification;

use App\Models\Notification;
use App\Repositories\NotificationsRepository;
use App\Models\Recipient;

trait Senderable
{
    public string $message;
    public string $subject_id;
    // target is the route to redirect to after clicking the notification
    public string $target; // student, department, level, group, subject
    public string $sender_id;
    public string $sender_type;
    public string $ay_id;

    protected $RepositoryNotifications;

    public function initializeSenderable()
    {
        $this->RepositoryNotifications = new NotificationsRepository();

        $target = null;
        $sender_id = null;
        $sender_type = null;
        $ay_id = $this->RepositoryNotifications->getAYear()->id;
        $subject_id = null;
    }

    public function sendNotification($message, $subject, $target, $sender, $recipients)
    {
        $notification = new Notification();
        $notification->message = $message;
        $notification->subject_id = $subject->id;
        $notification->ay_id = $subject->ay_id;
        $notification->sender_id = $sender->id;
        $notification->sender_type = get_class($sender);
        $notification->target = $target;
        $notification->save();
        foreach ($recipients as $recipient) {
            $recipient = new Recipient();
            $recipient->notification_id = $notification->id;
            $recipient->user_id = $recipient->id;
            $recipient->save();
        }
    }
}
