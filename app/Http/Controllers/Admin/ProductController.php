<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\ProductSpec;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    //View danh sách sp
    public function index()
    {
        // Eager Loading: nạp dữ liệu lên đối tượng thông qua quan hệ trong model Product
        $products = Product::withTrashed()->with(['images', 'specs', 'category', 'brand'])->latest()->get();
        return view("admin.products.view-product", compact('products'));
    }

    //View thêm mới sp
    public function create()
    {
        $categories = Category::where('status', 'active')->whereNotNull('parent_id')->get();
        $brands = Brand::where('status', 'active')->get();
        return view("admin.products.create-product", compact('categories', 'brands'));
    }

    //Lưu sp
    public function store(StoreProductRequest $request)
    {
        //Validate các field trong form
        $data = $request->validated();

        DB::beginTransaction();

        try {
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
            }

            $data['status'] = 'active';
            $product = Product::create($data);

            // Lưu Thông số kỹ thuật. Dùng quan hệ trong model specs()
            if ($request->has('spec_name')) {
                foreach ($request->spec_name as $index => $name) {
                    if (!empty($name) && !empty($request->spec_value[$index])) {
                        $product->specs()->create([
                            'spec_key' => $name,
                            'spec_value' => $request->spec_value[$index],
                        ]);
                    }
                }
            }

            // Lưu danh sách ảnh. Dùng quan hệ trong model images()
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $path = $file->store('products/gallery', 'public');
                    $product->images()->create([
                        'image' => $path
                    ]);
                }
            }

            // Nếu không có lỗi, thực thi lưu vào DB
            DB::commit();

            return redirect()->route('admin.products')->with('success', 'Thêm sản phẩm thành công!');

        } catch (\Exception $e) {
            // Có lỗi xảy ra, rollback toàn bộ dữ liệu trong DB
            DB::rollBack();

            // Xóa các file ảnh đã upload lên storage để tránh rác server
            if (isset($data['thumbnail'])) {
                Storage::disk('public')->delete($data['thumbnail']);
            }

            // Xem lỗi trong storage/logs/laravel.log
            Log::error("Lỗi Store Product: " . $e->getMessage());
            return redirect()->back()->with('error', 'Thêm sản phẩm không thành công, vui lòng thử lại! ')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //View edit sản phẩm
    public function edit($id)
    {
        $product = Product::with(["images", "specs"])->findOrFail($id);
        $categories = Category::where("status", "active")->whereNotNull("parent_id")->get();
        $brands = Brand::where("status", "active")->get();
        return view("admin.products.update-product", compact("product", "categories", "brands"));
    }

    //Cập nhật sản phẩm
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        try {

            DB::beginTransaction();
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                // Xóa ảnh cũ trong storage và lưu ảnh mới
                if ($product->thumbnail) {
                    Storage::disk('public')->delete($product->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
            } else {
                unset($data['thumbnail']);
            }

            $product->update($data);

            // Xóa ảnh cũ nếu người dùng nhấn nút X (nhận ID từ checkbox delete_images)
            if ($request->has('delete_images')) {

                $imagesToDelete = ProductImage::whereIn('id', $request->delete_images)->where('product_id', $id)->get();

                foreach ($imagesToDelete as $oldImg) {
                    Storage::disk('public')->delete($oldImg->image);
                    $oldImg->delete();
                }
            }

            // Thêm ảnh mới vào danh sách
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $path = $file->store('products/gallery', 'public');
                    $product->images()->create(['image' => $path]);
                }
            }

            // Xóa hết specs cũ của sản phẩm
            $product->specs()->delete();

            // Lưu lại mảng specs mới nếu có dữ liệu
            if ($request->has('spec_name')) {
                foreach ($request->spec_name as $key => $name) {
                    if (!empty($name) && !empty($request->spec_value[$key])) {
                        $product->specs()->create([
                            'spec_key' => $name,
                            'spec_value' => $request->spec_value[$key]
                        ]);
                    }
                }

                DB::commit();

                return redirect()->route('admin.products')->with('success', 'Sản phẩm đã được cập nhật thành công!');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", "Lỗi: " . $e->getMessage())->withInput();
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
