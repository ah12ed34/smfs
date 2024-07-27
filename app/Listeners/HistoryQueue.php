<?php

namespace App\Listeners;

use App\Models\HistoryQueue as HistoryQueueModel;
use App\Events\ProgressData;

class HistoryQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProgressData $event): void
    {
        $hQ = HistoryQueueModel::where('user_id', $event->user_id)->where('file', $event->file)->first();

        if ($hQ) {
            $hQ->Progress = $event->Progress;
            if ($hQ->status != 'warning') {
                $hQ->status = $event->status;
            }
            if (!empty($event->log)) {
                // $hQ->log += ' \n ' . $event->log;
                if (empty($hQ->log)) {
                    $hQ->log = $event->log;
                } else
                    $hQ->log .= PHP_EOL . $event->log;
            }

            $hQ->save();
        } else {
            HistoryQueueModel::create([
                'user_id' => $event->user_id,
                'file' => $event->file,
                'Progress' => $event->Progress,
                'status' => $event->status,
                'log' => $event->log ?? null,
            ]);
        }
    }
}
