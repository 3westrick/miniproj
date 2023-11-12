<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=> ['required', 'min:3'],
            'email'=> ['required', 'email','unique:users,email'],
            'phone'=> ['required', 'digits:11', 'regex:/^0/','unique:users,phone'],
            'password'=> ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم خود را وارد کنید',
            'name.min' => 'حداقل تعداد حروف برای اسم باید ۳ باشد',

            'email.required' => 'ایمیل باید وارد شود',
            'email.email' => 'فرمت ایمیل اشتباه است',
            'email.unique' => 'ایمیل قبلا استفاده شده است',

            'phone.required' => 'شماره تماس باید وارد شود',
            'phone.digits' => 'شماره تماس باید ۱۱ رقم باشد',
            'phone.regex' => 'شماره تماس باید با ۰ شروع شود',
            'phone.unique' => 'شماره تماس قبلا استفاده شده است',

            'password.required' => 'رمز عبور باید وارد شود',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
        ];
    }
}
