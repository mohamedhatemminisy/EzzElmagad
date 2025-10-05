<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContractTermsRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Allow all users (or add your own logic)
        return true;
    }

public function rules(): array
{
    $contractTermId = $this->route('contract_term'); // get ID from route parameter

    return [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'sort' => [
            'required',
            'regex:/^[1-9][0-9]*$/',   // positive integer as string (no leading zeros)
            Rule::unique('contract_terms', 'sort')->ignore($contractTermId),
        ],
        'status' => 'required|in:active,inactive',
    ];
}

    public function messages(): array
    {
        return [
            'name.required' => 'الوصف مطلوب.',
            'sort.required' => 'الترتيب مطلوب.',
            'sort.unique' => 'هذا الترتيب مستخدم بالفعل.',
            'sort.regex' => 'الترتيب يجب أن يكون رقمًا صحيحًا موجبًا اكبر من صفر .',
            'status.required' => 'الحالة مطلوبة.',
            'status.in' => 'قيمة الحالة غير صحيحة.',
        ];
    }
}
