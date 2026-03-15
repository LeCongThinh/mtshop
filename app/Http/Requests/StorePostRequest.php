<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => ['nullable', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'tiêu đề bài viết',
            'thumbnail' => 'ảnh bài viết',
            'content' => 'nội dung bài viết',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Vui lòng nhập :attribute.',
            'slug.unique' => 'Tiêu đề bài viết này đã tồn tại, vui lòng chọn tên khác.',
            'thumbnail.image' => 'File tải lên phải là định dạng ảnh.',
            'thumbnail.mimes' => 'Ảnh sản phẩm chỉ chấp nhận định dạng: jpeg, png, jpg.',
            'thumbnail.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
        ];
    }
}
