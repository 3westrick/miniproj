<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone'=> ['required', 'digits:11', 'regex:/^0/', 'exists:users,phone'],
            'password'=> ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'شماره تماس باید وارد شود',
            'phone.digits' => 'شماره تماس باید ۱۱ رقم باشد',
            'phone.regex' => 'شماره تماس باید با ۰ شروع شود',
            'phone.exists' => 'شماره تماس وجود ندارد',

            'password.required' => 'رمز عبور باید وارد شود',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
        ];
    }
}
