<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';
    const PATH_UPLOAD = 'category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::query()->with(['parent', 'children'])->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::query()->with(['children'])->whereNull('parent_id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try {
            Category::query()->create($request->all());
            return redirect()->route('categories.index')->with('success', 'Thêm thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            Log::error('Lỗi thêm danh mục sản phẩm ' . $e->getMessage());
            return back()->with('error', 'Lỗi thêm danh mục sản phẩm');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::query()->with(['children'])->whereNull('parent_id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return back()->with('success', 'Cập nhật thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            Log::error('Lỗi cập nhật danh mục sản phẩm ' . $e->getMessage());
            return back()->with('error', 'Lỗi cập nhật danh mục sản phẩm');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Xóa thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            Log::error('Lỗi xóa danh mục sản phẩm ' . $e->getMessage());
            return back()->with('error', 'Lỗi xóa danh mục sản phẩm');
        }

    }
}
