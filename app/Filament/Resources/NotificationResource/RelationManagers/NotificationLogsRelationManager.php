<?php

namespace App\Filament\Resources\NotificationResource\RelationManagers;

use App\Models\NotificationLog;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class NotificationLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'logs';  // имя отношения в модели Notification (notificationLogs или logs)

    protected static ?string $recordTitleAttribute = 'id'; // или другое поле для заголовка записи

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('device.device_token')->label('Устройство')->limit(30),
                Tables\Columns\TextColumn::make('status')->label('Статус')
                    ->badge()
                    ->color(fn($state) => ($state === 'sent') || ($state === 'delivered') ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('error_message')->label('Ошибка')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Дата')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'sent' => 'Отправлено',
                        'error' => 'Ошибка',
                        'delivered' => 'Доставлено',
                    ]),
            ])
            ->actions([])           // Отключаем действия (редактирование, удаление)
            ->bulkActions([]);      // Отключаем групповые действия
    }
}
