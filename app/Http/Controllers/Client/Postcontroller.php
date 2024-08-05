<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Postcontroller extends Controller
{
    public function index(){
        $data = Post::query()->latest('id')->paginate(4);
        $categories = $this->listPost();
        $data1 = Post::query()->orderByDesc('view')->paginate(6);
        $data2 = Post::query()->where('is_hot', 1)->latest()->paginate(6);
        $tags = Tag::query()->get();
        return view("client.home", compact('data', 'categories','data1', 'data2', 'tags'));
    }
    public function search(Request $request){
        $tags = Tag::query()->get();
        $categories = $this->listPost();
        $keyWord = $request->input('name');
        $data1 = Post::query()->orderByDesc('view')->paginate(6);
        $data = Post::where('name','LIKE', "%$keyWord%")->paginate(6);
        return view('client.home',compact('data','categories', 'tags', 'data1'));
    }

    public function chiTiet(string $post){
        // $author = User::query()->with('posts')->where('id', $post)->firstOrFail();
        $data = Post::query()->findOrFail($post);
        $comments = Comment::query()->where('post_id', $post)->get();
        $categories = $this->listPost();
        $data->increment('view');
        return view("client.chi-tiet", compact('data', 'categories', 'comments'));
    }
    public function postsInCategory(string $id){
        $nameLT = Category::query()->findOrFail($id);
        $data = Post::query()->where('category_id', $id)->paginate(6);
        $categories = $this->listPost();
        return view("client.tin-trong-loai", compact('data', 'categories', 'nameLT'));
    }

    public function gioiThieu(){
        $categories = $this->listPost();
        return view('client.gioi-thieu', compact('categories'));
    }
    public function lienHe(){
        $categories = $this->listPost();
        return view('client.lien-he', compact('categories'));
    }

    public function comment(Request $request){
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            Comment::create($data);
            return back()->with('success', 'Bình luận bài viết thành công');
        } catch (\Exception $e) {
            Log::error('Lỗi bình luận bài viết: ' . $e->getMessage());
            return back()->with('error', 'Lỗi bình luận bài viết');
        }
    }

    private function listPost(){
        return Category::query()->limit(5)->get();
    }
}
