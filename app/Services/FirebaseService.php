<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\Log;
use Throwable;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory())
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));

        $this->messaging = $factory->createMessaging();
    }

    public function sendNotification(string $token, string $title, string $body): bool
    {
        try {
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification(Notification::create($title, $body));

            $this->messaging->send($message);

            return true;
        } catch (Throwable $e) {
            Log::error('Push send error: ' . $e->getMessage());
            return false;
        }
    }
}

