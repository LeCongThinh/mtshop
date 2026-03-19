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
        $products = Product::get();
        // Lấy danh sách tin tức công nghệ
        $posts = Post::latest()->get();
        return view("user.home-page", compact("categories", "products", "posts"));
    }
}
