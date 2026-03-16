<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdatePostRequest;
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

    ///View edit bài viết
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.posts.update-post", compact('post'));
    }

    //Cập nhật bài viết
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $data = [
                'title' => $request->title,
                'slug' => \Str::slug($request->title), // Cập nhật lại slug từ title mới
                'content' => $request->input('content'),
            ];
            if ($request->hasFile("thumbnail")) {
                // Xóa ảnh cũ trong thư mục storage
                if ($post->thumbnail && \Storage::disk('public')->exists($post->thumbnail)) {
                    \Storage::disk('public')->delete($post->thumbnail);
                }
                // Lưu ảnh mới
                $data['thumbnail'] = $request->file("thumbnail")->store("post-thumbnails", "public");
            }
            $post->update($data);

            return redirect()->route("admin.posts")->with("success", "Cập nhật bài viết thành công!");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Lỗi: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
