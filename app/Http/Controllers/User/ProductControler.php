<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductControler extends Controller
{
    public function showProductDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view("user.products.product-detail", compact('product'));
    }

}
