<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'username' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'password' => ['nullable', 'min:6', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
            'phone' => ['nullable', 'digits:10'],
            'role' => ['nullable', 'in:admin,staff,customer'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }
    public function attributes(): array
    {
        return [
            'avatar' => "Ảnh đại diện",
            'username' => "Tên tài khoản",
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'role' => 'Chức vụ',
            'address' => 'Địa chỉ'
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.image' => ':attribute phải là một tệp hình ảnh.',
            'avatar.mimes' => ':attribute chỉ chấp nhận định dạng: jpeg, png, jpg.',
            'avatar.max' => ':attribute không được vượt quá 2MB.',

            'username.string' => ':attribute phải là chuỗi ký tự.',
            'username.max' => ':attribute không được vượt quá 255 ký tự.',

            'email.email' => ':attribute không hợp lệ.',
            'email.unique' => ':attribute đã tồn tại trong hệ thống.',

            'password.min' => ':attribute phải có ít nhất 6 ký tự.',
            'password.regex' => ':attribute phải chứa ít nhất 1 ký tự đặc biệt.',

            'phone.digits' => ':attribute không hợp lệ.',

            'role.in' => ':attribute không hợp lệ.',

        ];
    }
}
