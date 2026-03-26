<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProductControler extends Controller
{
    // View xem tất cả sản phẩm mới nhất
    public function showAllProducts()
    {
        $products = Product::where('status', 'active')->latest()->paginate(10);
        return view('user.products.all-product', compact('products'));
    }

    // View xem tất cả sản phẩm PC bán chạy
    public function showAllBestSellingPCs()
    {
        $slug = 'pc';
        // lấy ra sp có trạng thái hoạt động là active và thuộc danh mục cha và con
        $products = Product::query()->where('status', 'active')
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug)->orWhereHas('parent', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })->withCount([
                    'orderDetails as total_sold' => function ($query) {
                        $query->select(DB::raw('sum(quantity)'))->whereHas('order', function ($q) {
                            $q->where('payment_status', 'paid');
                        });
                    }
                ])->orderByDesc('total_sold')->paginate(10);

        return view('user.products.best-selling-pc', compact('products'));
    }

    // View xem tất cả sản phẩm Laptop bán chạy
    public function showAllBestSellingLaptops()
    {
        $slug = 'laptop';
        // lấy ra sp có trạng thái hoạt động là active và thuộc danh mục cha và con
        $products = Product::query()->where('status', 'active')
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug)->orWhereHas('parent', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })->withCount([
                    'orderDetails as total_sold' => function ($query) {
                        $query->select(DB::raw('sum(quantity)'))->whereHas('order', function ($q) {
                            $q->where('payment_status', 'paid');
                        });
                    }
                ])->orderByDesc('total_sold')->paginate(10);

        return view('user.products.best-selling-laptop', compact('products'));
    }

    // View xem tất cả sản phẩm Màn Hình bán chạy


    // View xem chi tiết sản phẩm
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
