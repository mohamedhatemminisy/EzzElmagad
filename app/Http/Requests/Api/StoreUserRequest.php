<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to access this request
    }

    public function rules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email',
            'device_token'       => 'required|string|unique:users,device_token',
            'phone'              => 'required|string|max:20|unique:users,phone',
            'app_id'             => 'required|string|max:20|unique:users,app_id',
            'adress'             => 'required|string|max:255',
            'company_category'   => 'required|string|max:255',
            'commercial_number'  => 'required|string|max:50',
            'representer'        => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'              => 'الاسم مطلوب.',
            'email.required'             => 'البريد الإلكتروني مطلوب.',
            'email.email'                => 'صيغة البريد الإلكتروني غير صحيحة.',
            'email.unique'               => 'البريد الإلكتروني مستخدم بالفعل.',
            'device_token.required'      => ' رقم الجهاز مطلوب.',
            'device_token.unique'        => ' رقم الجهاز مستخدم بالفعل.',
            'phone.required'             => 'رقم الهاتف مطلوب.',
            'phone.unique'               => ' رقم الهاتف مستخدم بالفعل.',
            'adress.required'           => 'العنوان مطلوب.',
            'company_category.required'  => 'تصنيف الشركة مطلوب.',
            'commercial_number.required' => 'الرقم التجاري مطلوب.',
            'representer.required'       => 'اسم الممثل مطلوب.',
        ];
    }
}

