<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //View danh sách sp
    public function index()
    {
        $posts = Post::withTrashed()->with('user')->get();
        return view("admin.posts.view-post", compact('posts'));
    }

    //View thêm mới sp
    public function create()
    {
        return view("admin.posts.create-post");
    }

    //Lưu bài viết
    public function store(StorePostRequest $request)
    {
        try {
            if ($request->hasFile('thumbnail')) {
                $path = $request->file('thumbnail')->store('post-thumbnails', 'public');
            }
            Post::create([
                'user_id' => auth()->id(),
                'thumbnail' => $path,
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->input('content'),
            ]);

            return redirect()->route("admin.posts")->with("success", "Thêm bài viết thành công!");
        } catch (\Exception $e) {
            Log::error("Lỗi: " . $e->getMessage());
            return redirect()->back()->with("error", "Thêm bài viết không thành công, vui lòng thử lại!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
