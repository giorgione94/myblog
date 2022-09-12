<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function posts()
    {
        $posts = Post::all();
        return $posts;
    }

    public function author($author)
    {
        $posts = User::find($author)->posts()->get();
        return $posts;
    }
}
