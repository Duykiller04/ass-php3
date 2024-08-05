<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $data = Post::query()->latest('id')->get();
        // dd($data->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        // dd($tags->toArray());

        return view(self::PATH_VIEW . __FUNCTION__, compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        $data = $request->except('image', 'tags');
        $data['is_show_home'] ??= 0;
        $data['is_hot'] ??= 0;
        $data['is_new'] ??= 0;
        $data['user_id'] = Auth::user()->id;


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            if ($imageFile->isValid()) {
                $data['image'] = $imageFile->store(self::PATH_UPLOAD, 'public');
            } else {
                return back()->with('error', 'Tệp tải lên không hợp lệ');
            }
        }
        try {
            DB::beginTransaction();
            $post = Post::query()->create($data);

            $post->tags()->attach($request->tags);
            DB::commit();

            return redirect()->route('posts.index')->with('success', 'Thêm thành công bài viết');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi thêm bài viết ' . $e->getMessage());
            return back()->with('error', 'Lỗi thêm bài viết');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $tags = Tag::query()->pluck('name', 'id');
        $categories = Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('post', 'tags', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::query()->pluck('name', 'id');
        $categories = Category::all();
        // dd($postTags->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request->tags);
        $data = $request->except('image');
        $data['is_show_home'] ??= 0;
        $data['is_hot'] ??= 0;
        $data['is_new'] ??= 0;

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store(self::PATH_UPLOAD, 'public');
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
            $data['image'] = $newImagePath;
        }

        try {
            DB::beginTransaction();
            $post->update($data);
            $post->tags()->sync($request->tags);
            DB::commit();
            return back()->with('success', 'Cập nhật thành công bài viết');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi cập nhật bài viết: ' . $e->getMessage());
            return back()->with('error', 'Lỗi cập nhật bài viết');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->tags()->detach();
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
            $post->delete();
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Xóa thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi xóa bài viết: ' . $e->getMessage());
            return back()->with('error', 'Lỗi xóa danh mục sản phẩm');
        }

    }
}
