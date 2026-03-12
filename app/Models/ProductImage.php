<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillabled = [
        'product_id',
        'image'
    ];

    // Sp có nhiều ảnh
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
