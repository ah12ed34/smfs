<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $ids;
    protected $message;
    protected $sender_id;
    protected $subject_id;
    protected $ay_id;
    protected $sender_type;
    protected $target;
    public function __construct($ids, $message, $sender_id, $subject_id, $ay_id, $sender_type, $target)
    {
        $this->ids = $ids;
        $this->message = $message;
        $this->sender_id = $sender_id;
        $this->subject_id = $subject_id;
        $this->ay_id = $ay_id;
        $this->sender_type = $sender_type;
        $this->target = $target;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        try {
            $notification = Notification::create([
                'message' => $this->message,
                'sender_id' => $this->sender_id,
                'subject_id' => $this->subject_id,
                'ay_id' => $this->ay_id,
                'sender_type' => $this->sender_type,
                'target' => $this->target,
            ]);

            $users = User::whereIn('id', $this->ids)->whereNot('id', $this->sender_id)->get();

            foreach ($users as $user) {
                Recipient::create([
                    'notification_id' => $notification->id,
                    'user_id' => $user->id,
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Notification Job Error: ' . $e->getMessage());
        }
    }
}
