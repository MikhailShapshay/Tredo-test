<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationDeliveredRequest;
use App\Models\NotificationLog;

class NotificationController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/notification-delivered",
     *     summary="Confirm notification delivery",
     *     tags={"Notification"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"notification_id", "device_id"},
     *             @OA\Property(property="notification_id", type="integer", example=1),
     *             @OA\Property(property="device_id", type="integer", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Delivery confirmed",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Доставка подтверждена")
     *         )
     *     ),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function markDelivered(NotificationDeliveredRequest $request)
    {
        $validated = $request->validated();

        $log = NotificationLog::where('notification_id', $validated['notification_id'])
            ->where('device_id', $validated['device_id'])
            ->first();

        if ($log) {
            $log->update(['status' => 'delivered']);
            return response()->json(['message' => 'Статус обновлен на доставлено']);
        }

        return response()->json(['message' => 'Лог уведомления не найден'], 404);
    }
}

