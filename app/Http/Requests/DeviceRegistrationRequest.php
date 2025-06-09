<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // не стал делать проверку на авторизацию, чтоб не раздувать задачу
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'device_token' => 'required|string',
        ];
    }
}

