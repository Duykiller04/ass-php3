<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    public function index(){
        $data = Post::query()->paginate(4);
        $categories = $this->listPost();
        $data1 = Post::query()->orderByDesc('view')->paginate(6);
        $tags = Tag::query()->get();
        return view("client.home", compact('data', 'categories','data1', 'tags'));
    }
    public function search(Request $request){
        $categories = $this->listPost();
        $keyWord = $request->input('name');
        $data = Post::where('name','LIKE', "%$keyWord%")->paginate(6);
        return view('client.home',compact('data','categories'));
    }

    public function chiTiet(string $post){
        $author = User::query()->with('posts')->where('id', $post)->firstOrFail();
        $data = Post::query()->findOrFail($post);
        $comments = Comment::query()->where('post_id', $post)->get();
        $categories = $this->listPost();
        return view("client.chi-tiet", compact('data', 'categories', 'comments', 'author'));
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

    private function listPost(){
        return Category::query()->limit(5)->get();
    }
}