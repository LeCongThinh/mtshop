<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
        return view("admin.accounts.view-account", compact("users"));
    }
    public function create()
    {
        return view("admin.accounts.create-account");
    }

    public function store(StoreUserRequest $request)
    {
        try {
            //Upload avatar: nếu ko upload ảnh thì lấy ảnh mặc định
            $avatarPath = $request->hasFile("avatar") ? $request->file("avatar")->store("avatars", "public") : "avatars/blank_user.png";

            User::create([
                'avatar' => $avatarPath,
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
                'status' => 'active',
            ]);

            return redirect()->route("admin.accounts")->with('success', 'Tạo tài khoản thành công');

        } catch (\Exception $e) {
            Log::error("Lỗi: " . $e->getMessage());

            return redirect()->back()->with("error", "Đã có lỗi xảy ra khi tạo tài khoản");
        }
    }

    //View update tài khoản
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("admin.accounts.update-account", compact("user"));
    }
    //Update thông tin tài khoản
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->fill([
                'name' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
            ]);
            if ($request->hasFile("avatar")) {
                $user->avatar = $request->file("avatar")->store("avatars", "public");
            }
            if ($request->filled("password")) {
                $user->password = Hash::make($request->password);
            }
            //Chỉ update nếu có thay đổi
            if ($user->isDirty()) {
                $user->save();
            }
            return redirect()->route("admin.accounts")->with('success', 'Cập nhật tài khoản thành công');

        } catch (\Exception $e) {
            Log::error("Lỗi: " . $e->getMessage());
            return redirect()->back()->with("error", "Đã có lỗi xảy ra khi cập nhật tài khoản");
        }
    }

    //Dùng soft delete để xóa tài khoản
    public function destroy(User $user)
    {
        $user->update(['status' => 'inactive']);
        $user->delete();
        return redirect()->back()->with('success', 'Xóa tài khoản thành công');
    }

    //Khôi phục tài khoản đã xóa
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        $user->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Khôi phục tài khoản thành công');
    }
}
