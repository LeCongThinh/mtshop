<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        return view("user.home", compact("categories"));
    }
}
