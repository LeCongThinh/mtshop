<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // phân trang dùng Bootstrap 5
        Paginator::useBootstrapFive();
        // Chia sẻ biến $categories cho tất cả các file blade nằm trong thư mục 'user'
        View::composer('user.*', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->where('status', 'active')
                ->with([
                    'children' => function ($query) {
                        $query->where('status', 'active');
                    }
                ])->get();
            $view->with('categories', $categories);
        });
    }
}
