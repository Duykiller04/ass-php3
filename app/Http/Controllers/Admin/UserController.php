<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';
    const PATH_UPLOAD = 'users';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->latest('id')->get();
        //   dd($data); 
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        dd($request->all());
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            if ($imageFile->isValid()) {
                $data['image'] = $imageFile->store(self::PATH_UPLOAD, 'public');
            } else {
                return back()->with('error', 'Tệp tải lên không hợp lệ');
            }
        }
        try {
            User::query()->create($data);
        } catch (\Exception $e) {
            Log::error('Lỗi thêm user' . $e->getMessage());
            return back()->with('error', 'Lỗi thêm user ');
            ;
        }
        return redirect()->route('users.index')->with('success', 'Thêm thành công user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store(self::PATH_UPLOAD, 'public');
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $data['image'] = $newImagePath;
        }

        try {
            $user->update($data);
            return back()->with('success', 'Cập nhật thành công user');
        } catch (\Exception $e) {
            Log::error('Lỗi cập nhật user: ' . $e->getMessage());
            return back()->with('error', 'Lỗi cập nhật user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Xóa thành công user');
        } catch (\Exception $e) {
            Log::error('Lỗi xóa user: ' . $e->getMessage());
            return back()->with('error', 'Lỗi xóa user');
        }
    }
}
