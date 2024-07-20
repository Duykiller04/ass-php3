<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
        try {
            Category::query()->create($request->all());
            return redirect()->route('category.index')->with('success','Thêm thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi thêm danh mục sản phẩm');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Category::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Category::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $model = Category::query()->findOrFail($id);
        try {
            $model->update($request->all());
            return back()->with('success','Cập nhật thành công danh mục sản phẩm');
        } catch (\Exception $e) {
            return back()->with('error','Lỗi cập nhật danh mục sản phẩm');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Category::query()->findOrFail($id);

        try {
            $model->delete();
            return redirect()->route('category.index')->with('success','Xóa thành công danh mục sản phẩm');
            } catch (\Exception $e) {
            return back()->with('error','Lỗi xóa danh mục sản phẩm');
        }
    
    }
}
