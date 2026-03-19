<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showAllPosts()
    {
        $posts = Post::where('status', 'active')->latest()->paginate(9);
        return view("user.news.all-news", compact('posts'));
    }
    public function showPostDetail($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'active')->firstOrFail();

        // Mảng tên các thứ trong tuần
        $days = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
        // Lấy tên thứ dựa trên ngày tạo bài viết
        $dayName = $days[$post->created_at->dayOfWeek];

        return view("user.news.news-detail", compact('post', 'dayName'));
    }


}
