<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Or add auth logic if needed
    }

    public function rules(): array
    {
        return [
            'email'              => 'required|email',
            'device_token'       => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'        => 'البريد الإلكتروني مطلوب.',
            'device_token.required' => 'رمز الجهاز مطلوب.',
            'device_token.string'   => 'رمز الجهاز يجب أن يكون نصًا.',
        ];
    }
}
