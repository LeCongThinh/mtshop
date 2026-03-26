<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class SearchController extends Controller
{
    // Live search sản phẩm
    public function liveSearch(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return response()->json([]);
        }
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
            ->where('status', 'active')->select('id', 'name', 'slug', 'thumbnail', 'price')
            ->take(10)->get();
        return response()->json($products);
    }

    // Tìm kiếm theo keyword
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // Nếu người dùng không nhập gì hoặc chỉ nhập khoảng trắng
        if (empty(trim($keyword))) {
            $products = collect(); 
            return view('user.search-result', [
                'products' => $products,
                'keyword' => '',
                'message' => 'Vui lòng nhập từ khóa để tìm kiếm sản phẩm.'
            ]);
        }
        // Tìm sản phẩm có tên giống từ khóa
        $products = Product::query()->where('status', 'active')->where('name', 'LIKE', "%{$keyword}%")->latest()->paginate(10);

        return view('user.search-result', compact('products', 'keyword'));
    }
}
