<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRegistrationRequest;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register-device",
     *     summary="Register device token",
     *     tags={"Device"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id","device_token"},
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="device_token", type="string", example="abc123tokenxyz")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Device registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Устройство зарегистрировано"),
     *             @OA\Property(property="device", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=1),
     *                 @OA\Property(property="device_token", type="string", example="abc123tokenxyz"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function register(DeviceRegistrationRequest $request)
    {
        $validated = $request->validated();

        $device = Device::updateOrCreate(
            ['device_token' => $validated['device_token']],
            ['user_id' => $validated['user_id']]
        );

        return response()->json([
            'message' => 'Устройство зарегистрировано или обновлено',
            'device' => $device,
        ]);
    }
}

