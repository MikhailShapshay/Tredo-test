<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationDeliveredRequest extends FormRequest
{
    public function authorize()
    {
        return true; // не стал делать проверку на авторизацию, чтоб не раздувать задачу
    }

    public function rules()
    {
        return [
            'notification_id' => 'required|exists:notifications,id',
            'device_id' => 'required|exists:devices,id',
        ];
    }
}
