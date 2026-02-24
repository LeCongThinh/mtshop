<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ngăn role 'customer' đã đăng nhập, tiếp tục đăng nhập vào trang admin
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
            return redirect()->route("admin.login")->with("error", "Thông tin đăng nhập không hợp lệ");
        }
        return $next($request);
    }
}
