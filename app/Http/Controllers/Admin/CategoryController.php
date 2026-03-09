<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $cate = Category::withTrashed()->get();
        $br = Brand::withTrashed()->get();
        return view("admin.categories.view-category", compact('cate', 'br'));

    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view("admin.categories.create-category", compact("categories"));
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create([
                'name' => $request->categoryName,
                'slug' => Str::slug($request->categoryName),
                'parent_id' => $request->parent_id ?: null
            ]);

            return response()->json(['success' => 'Thêm danh mục thành công', 'category' => $category]);

        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        $parent_cate = Category::whereNull('parent_id')->get();
        return view("admin.categories.update-category", compact('categories', 'parent_cate'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->fill([
                'name' => $request->categoryName,
                'slug' => Str::slug($request->categoryName),
                'parent_id' => $request->parent_id
            ]);
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'Cập nhật danh mục thành công');

        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return redirect()->back()->with("error", "Cập nhật danh mục không thành công");
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Kiểm tra danh mục con chưa bị xóa (parent_id có tồn tại cột delete_at bằng null)
        if ($category->children()->whereNull('deleted_at')->exists()) {
            return redirect()->back()->with('error', 'Danh mục cha không thể xóa khi còn danh mục con');
        }
        // Update status
        $category->update(['status' => 'inactive']);
        $category->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        $category->update(['status' => 'active']);
        return redirect()->back()->with("success", "Khôi phục danh mục thành công");
    }
}
