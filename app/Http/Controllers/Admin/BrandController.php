<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateBrandRequest;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            Brand::create([
                'name' => $request->brandName,
                'slug' => Str::slug($request->brandName),
            ]);
            return response()->json(['success' => 'Thêm hãng thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
    public function edit($id)
    {
        $brands = Brand::findOrFail($id);
        return view("admin.categories.update-brand", compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->fill([
                'name' => $request->brandName,
                'slug' => Str::slug($request->brandName)
            ]);
            //Chỉ update nếu có thay đổi
            if ($brand->isDirty()) {
                $brand->save();
            }
            return redirect()->route("admin.categories")->with('success', 'Cập nhật hãng thành công');

        } catch (\Exception $e) {
            Log::error('Lỗi: ' . $e->getMessage());
            return redirect()->back()->with("error", "Cập nhật hãng không thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update(['status' => 'inactive']);
        $brand->delete();
        return redirect()->back()->with("success", "Xóa hãng thành công");
    }

    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();
        $brand->update(['status' => 'active']);
        return redirect()->back()->with("success", "Khôi phục hãng thành công");
    }

}
