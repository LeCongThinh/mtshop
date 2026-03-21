<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;


class HomeController extends Controller
{
    public function home()
    {
        // Lấy danh mục cha (parent_id = null và active) và đính kèm luôn danh mục con (active)
        $categories = Category::whereNull('parent_id')->where('status', 'active')
            ->with([
                'children' => function ($query) {
                    $query->where('status', 'active');
                }
            ])->get();
        // Lấy danh sách sản phẩm mới
        $products = Product::latest()->get();
        // Lấy danh sách tin tức công nghệ
        $posts = Post::latest()->get();
        return view("user.home-page", compact("categories", "products", "posts"));
    }

    public function getProductByCategory($slug)
    {
        // Tìm danh mục cha kèm theo các danh mục con (chỉ lấy cột ID của con để nhẹ máy)
        $category = Category::with('children:id,parent_id')->where('slug', $slug)->where('status', 'active')->whereNull('parent_id')->firstOrFail();
        // Gom ID của các danh mục con và danh mục cha vòa 1 mảng. Vì sản phẩm được lấy theo id danh mục con
        $categoryIds = $category->children->pluck('id')->prepend($category->id);
        $products = Product::whereIn('category_id', $categoryIds)->latest()->paginate(10);
        return view("user.products.product-by-category", compact('category', 'products'));
    }
}
