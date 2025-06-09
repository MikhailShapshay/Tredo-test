<?php

// app/Jobs/SendPushNotification.php

namespace App\Jobs;

use App\Models\Device;
use App\Models\Notification;
use App\Models\NotificationLog;
use App\Services\FirebaseService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function handle(FirebaseService $firebase): void
    {
        $devices = Device::all();

        foreach ($devices as $device) {
            try {
                $sent = $firebase->sendNotification(
                    $device->device_token,
                    $this->notification->title,
                    $this->notification->body
                );

                NotificationLog::create([
                    'notification_id' => $this->notification->id,
                    'device_id' => $device->id,
                    'status' => $sent ? 'sent' : 'error',
                ]);
            } catch (Throwable $e) {
                NotificationLog::create([
                    'notification_id' => $this->notification->id,
                    'device_id' => $device->id,
                    'status' => 'error',
                    'error_message' => $e->getMessage(),
                ]);
                Log::error('Push send error: ' . $e->getMessage());
            }
        }
    }
}
