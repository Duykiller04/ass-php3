<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.integer' => 'Danh mục phải là một số nguyên.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'name.required' => 'Tên bài viết là bắt buộc.',
            'name.string' => 'Tên bài viết phải là chuỗi ký tự.',
            'name.max' => 'Tên bài viết không được vượt quá 255 ký tự.',
            'description.max' => 'Mô tả bài viết không được vượt quá 2000 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'tags.array' => 'Tags phải là một mảng.',
            'tags.*.integer' => 'Mỗi tag phải là một số nguyên.',
            'tags.*.exists' => 'Tag không tồn tại.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'Tệp tải lên phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
