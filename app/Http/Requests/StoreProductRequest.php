<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class StoreProductRequest extends FormRequest
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
            'slug' => Str::slug($this->name)
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => ['nullable', Rule::unique('products', 'slug')],
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'tên sản phẩm',
            'category_id' => 'danh mục',
            'brand_id' => 'hãng sản xuất',
            'price' => 'giá bán',
            'sale_price' => 'giá khuyến mãi',
            'thumbnail' => 'ảnh sản phẩm',
            'stock' => 'số lượng tồn kho',
            'description' => 'mô tả sản phẩm',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Vui lòng nhập :attribute.',
            'exists' => ':attribute đã chọn không hợp lệ.',
            'numeric' => ':attribute phải là con số.',
            'integer' => ':attribute phải là số nguyên.',

            'slug.unique' => 'Tên sản phẩm này đã tồn tại, vui lòng chọn tên khác.',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá bán gốc.',
            'thumbnail.image' => 'File tải lên phải là định dạng ảnh.',
            'thumbnail.mimes' => 'Ảnh sản phẩm chỉ chấp nhận định dạng: jpeg, png, jpg.',
            'thumbnail.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
        ];
    }
}
