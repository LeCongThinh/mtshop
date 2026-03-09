<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            'slug' => Str::slug($this->categoryName)
        ]);
    }

    public function rules(): array
    {
        return [
            'categoryName' => 'required|max:255',
            'slug' => [
                Rule::unique('categories', 'slug')
                    ->where(function ($query) {
                        return $query->where('parent_id', $this->parent_id);
                    })
            ],
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'categoryName.required' => 'Tên danh mục không được bỏ trống',
            'categoryName.unique' => 'Tên danh mục này đã tồn tại trong danh mục đã chọn',
            'slug.unique' => 'Tên danh mục này đã tồn tại trong danh mục đã chọn',
            'parent_id.exists' => 'Danh mục cha không hợp lệ'
        ];
    }
}
