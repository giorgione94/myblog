<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->with('category')->get();
        $categories = Category::all();
        return view('admin.dashboard')->with('posts', $posts)->with('categories', $categories);
    }

    public function profile() {
        $user = Auth::user();
        return $user;
    }

    public function post (Post $post)
    {
        $user = Auth::user();
        if($user->id != $post->user_id) {
            abort(403);
        }
        return $post;
    }

    public function category (Category $category) {
        return $category;
    }
    public function createPost() {}
    public function createCategory() {}
    public function newPost() {}

    public function newCategory() {}

    public function updateProfile() {}
    public function updatePost() {}
    public function updateCategory() {}
}