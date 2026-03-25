<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cho phếp tất cả người dùng đã đăng nhập thực hiện request này
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => "tên người nhận",
            'phone' => 'số điện thoại người nhận',
            'address' => 'địa chỉ nhận hàng',
            'note' => 'ghi chú',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
        ];
    }
}
