<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductControler extends Controller
{
    public function showAllProducts()
    {
        $products = Product::where('status', 'active')->latest()->paginate(10);
        return view('user.products.all-product', compact('products'));
    }
    public function showProductDetail($slug)
    {
        // Eager loading: load data theo relation được định nghĩa trong model
        // Nạp toàn bộ specs và images để dùng cho Modal hiển thị thông tin chi tiết cấu hình
        $product = Product::with(['specs', 'images'])->where('slug', $slug)->firstOrFail();
        // Biến tạm, chỉ hiển thị 9 dòng thông tin
        $specs = $product->specs()->take(9)->get();
        return view("user.products.product-detail", compact('product', 'specs'));
    }

}
