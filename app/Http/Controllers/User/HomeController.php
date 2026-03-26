<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

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
        $products = Product::where('status', 'active')->latest()->get();

        // Lấy danh sách tin tức công nghệ
        $posts = Post::latest()->get();

        // Gọi sản phẩm bán chạy theo 3 danh mục chính: PC, Laptop, Màn hình
        $bestSellingPCs = $this->getTopSellingByCategory('pc');
        $bestSellingLaptops = $this->getTopSellingByCategory('laptop');
        $bestSellingMonitors = $this->getTopSellingByCategory('man-hinh');

        return view("user.home-page", compact("categories", "products", "posts", 'bestSellingPCs', 'bestSellingLaptops', 'bestSellingMonitors'));
    }

    public function getProductByCategory($slug)
    {
        // Tìm danh mục cha kèm theo các danh mục con (chỉ lấy cột ID của con để nhẹ máy)
        $category = Category::with('children')->where('slug', $slug)->where('status', 'active')->whereNull('parent_id')->firstOrFail();

        // Gom ID của các danh mục con và danh mục cha vào 1 mảng. Vì sản phẩm được lấy theo id danh mục con
        $categoryIds = $category->children->pluck('id')->prepend($category->id);

        // Lấy danh sách các Brand có sản phẩm thuộc danh mục này
        $brands = Brand::whereHas('products', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })->get();

        $products = Product::whereIn('category_id', $categoryIds)->where('status', 'active')->latest()->paginate(10);
        return view("user.products.product-by-category", compact('category', 'products', 'brands'));
    }

    public function getProductBySubcategory($slug)
    {
        $subcategory = Category::with('parent')->where('slug', $slug)->where('status', 'active')->whereNotNull('parent_id')->firstOrFail();
        $products = Product::where('category_id', $subcategory->id)->where('status', 'active')->latest()->paginate(10);
        return view("user.products.product-by-subcategory", compact('subcategory', 'products'));
    }

    public function getProductByCategoryAndBrand($category_slug, $brand_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', 'active')->firstOrFail();
        $brand = Brand::where('slug', $brand_slug)->where('status', 'active')->firstOrFail();
        $categoryIds = $category->children()->pluck('id')->prepend($category->id);

        // Lấy danh sách các Brand trong cùng danh mục này để hiển thị
        $brands = Brand::whereHas('products', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })->get();

        // Truy vấn sản phẩm thuộc các danh mục và thuộc brand
        $products = Product::whereIn('category_id', $categoryIds)->where('brand_id', $brand->id)
            ->where('status', 'active')->latest()->paginate(10);

        return view("user.products.product-by-category", compact('category', 'products', 'brands', 'brand'));
    }

    // Lấy sản phẩm bán chạy
    private function getTopSellingByCategory($slug, $limit = 20)
    {
        // Sản phẩm bán chạy: nhóm product_id trong bảng order_datils sau đó cộng dồn quantity có cùng product_id, để lọc sản phẩm có số lượng bán ra nhiều nhất
        // Sắp xếp sản phẩm giảm dần theo số lượng bán ra
        return Product::query()->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug)->orWhereHas('parent', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        })->withCount([
                    'orderDetails as total_sold' => function ($query) {
                        $query->select(DB::raw('sum(quantity)'))->whereHas('order', function ($q) {
                            $q->where('payment_status', 'paid');
                        });
                    }
                ])->orderByDesc('total_sold')->take($limit)->get();
    }

}
