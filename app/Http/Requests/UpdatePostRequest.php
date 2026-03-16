<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        // Lấy ID bài viết từ route
        $postId = $this->route('id');
        return [
            'title' => [Rule::unique('products', 'slug')->ignore($postId)],
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Tiêu đề đã tồn tại trong hệ thống, vui lòng nhập tên khác',
        ];
    }


}
