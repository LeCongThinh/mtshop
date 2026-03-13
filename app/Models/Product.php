<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price',
        'sale_price',
        'thumbnail',
        'description',
        'stock',
        'status'
    ];

    public function getStatusLabelAttribute()
    {
        //Trạng thái danh mục bị soft delete
        if ($this->trashed()) {
            return ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Hết hàng'];
        }
        return match ($this->status) {
            default => ['class' => 'badge bg-soft-success text-success', 'text' => 'Còn hàng'],
        };
    }

    // Bảng product có khóa ngoại category_id thuộc về bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    // Bảng Product có khóa ngoại brand_id thuộc về bảng Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id");
    }

    // Một sp có nhiều hình ảnh
    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id");
    }

    // Một sp có nhiều thông số kỹ thuật
    public function specs()
    {
        return $this->hasMany(ProductSpec::class, "product_id");
    }


}
