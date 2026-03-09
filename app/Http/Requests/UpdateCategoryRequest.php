<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Category;

class UpdateCategoryRequest extends FormRequest
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
    //Tạo slug trước khi validate
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->categoryName)
        ]);
    }

    public function rules(): array
    {
        // id từ route
        $categoryId = $this->route('id');

        return [
            'categoryName' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')
                    ->where(fn($q) => $q->where('parent_id', $this->parent_id))
            ],
            //slug duy nhất trong cùng parent_id
            'slug' => [
                'required',
                Rule::unique('categories', 'slug')
                    ->where(function ($query) {
                        return $query->where('parent_id', $this->parent_id);
                    })->ignore($categoryId)
            ],
            // không cho chọn chính nó làm danh mục cha
            'parent_id' => [
                'nullable',
                'exists:categories,id',
                Rule::notIn([$categoryId])
            ]
        ];
    }

    //Validate thêm để tránh vòng lặp category tree
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $parentId = $this->parent_id;
            $categoryId = $this->route('id');

            if (!$parentId) {
                return;
            }

            $parent = Category::find($parentId);

            while ($parent) {

                if ($parent->id == $categoryId) {
                    $validator->errors()->add(
                        'parent_id',
                        'Không thể chọn danh mục con làm danh mục cha (vòng lặp danh mục).'
                    );
                    break;
                }

                $parent = $parent->parent;
            }
        });
    }

    public function messages(): array
    {
        return [
            'categoryName.required' => 'Vui lòng nhập tên danh mục',
            'categoryName.max' => 'Tên danh mục tối đa 255 ký tự',
            'categoryName.unique' => 'Tên danh mục này đã tồn tại trong danh mục đã chọn',
            'slug.unique' => 'Tên danh mục này đã tồn tại trong danh mục đã chọ',
            'parent_id.exists' => 'Danh mục cha không tồn tại',
            'parent_id.not_in' => 'Không thể chọn chính danh mục này làm danh mục cha',
        ];
    }
}
