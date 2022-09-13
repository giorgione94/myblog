<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller
{
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