<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
            'phone' => ['required', 'digits:10'],
            'role' => ['required', 'in:admin,staff,customer'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }
    public function attributes(): array
    {
        return [
            'avatar' => "ảnh đại diện",
            'username' => "tên tài khoản",
            'email' => 'email',
            'password' => 'mật khẩu',
            'phone' => 'số điện thoại',
            'role' => 'chức vụ',
            'address' => 'địa chỉ'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Bắt buộc phải nhập :attribute',

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
