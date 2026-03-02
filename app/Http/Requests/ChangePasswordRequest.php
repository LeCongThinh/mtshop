<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required'],
            'new_password' => ['required', 'min:6', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
            'new_password_confirm' => ['required', 'same:new_password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'current_password' => 'Mật khẩu hiện tại',
            'new_password' => 'Mật khẩu mới',
            'new_password_confirm' => 'Mật khẩu mới'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',

            'new_password.min' => ':attribute phải có ít nhất 6 ký tự.',
            'new_password.regex' => ':attribute phải chứa ít nhất 1 ký tự đặc biệt.',

            'new_password_confirm.same' => ':attribute không khớp',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
