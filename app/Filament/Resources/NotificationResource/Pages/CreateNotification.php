<?php

namespace App\Filament\Resources\NotificationResource\Pages;

use App\Filament\Resources\NotificationResource;
use App\Jobs\SendPushNotification;
use Filament\Resources\Pages\CreateRecord;

class CreateNotification extends CreateRecord
{
    protected static string $resource = NotificationResource::class;

    protected function afterCreate(): void
    {
        $notification = $this->record;

        // Отправка отложенной задачи на нужную дату и время
        SendPushNotification::dispatch($notification)->delay($notification->scheduled_at);
    }
}
