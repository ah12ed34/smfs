<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class Logger
{
    public $Log;
    public function __construct($fileName = 'custom', $days = 30)
    {
        //
        $this->Log = Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$fileName}.log"),
            'days' => $days,
        ]);
    }
    /**
     * Log a message to the log file
     *
     * @param string $message The message to log
     * @param string $level (info, warning, error, critical, alert, emergency) default is info
     * @param string $fileName The file name to log to default is custom.log
     * @return void
     */
    public static function log($message, $level = 'info', $fileName = 'custom')
    {
        (new Logger($fileName))->Log->$level($message);
    }

    /**
     * Log a message to the log file
     *
     * @param string $channel The channel to log
     * @param string $message The message to log
     * @param string $level (info, warning, error, critical, alert, emergency) default is info
     * @param string $fileName The file name to log to default is custom.log
     * @return void
     */
    public static function logger($channel = 'custom', $message = 'Log message', $level = 'info', $fileName = 'custom')
    {
        (new Logger($fileName))->Log->$level($message);
    }
}
