<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function chiTiet(string $post){
        $data = Post::query()->findOrFail($post);
        $comments = Comment::query()->where('post_id', $post)->get();
        $categories = Category::query()->limit(5)->get();
        return response()->json([
            'post' => $data,
            'comments' => $comments,
            'categories' => $categories,
        ]);
    }
    public function postsInCategory(string $id){
        $nameLT = Category::query()->findOrFail($id);
        $data = Post::query()->where('category_id', $id)->paginate(6);
        $categories = Category::query()->limit(5)->get();
        return response()->json([
            'post' => $data,
            'nameLT' => $nameLT,
            'categories' => $categories,
        ]);
    }
}
