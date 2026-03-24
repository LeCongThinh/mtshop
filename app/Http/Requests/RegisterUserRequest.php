<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'min:6', 'confirmed', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => "tên tài khoản",
            'email' => 'email',
            'password' => 'mật khẩu',
            'phone' => 'số điện thoại',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'email.unique' => 'Email này đã được đăng ký.',
            'email.email' => 'Email không đúng định dạng (ví dụ: abc@gmail.com).',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt.',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',
            'phone.numeric'    => 'Số điện thoại không đúng định dạng',
        ];
    }
}
