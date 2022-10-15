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

    public function author($id)
    {
        $author = User::find($id);
        $posts = $author->posts()->paginate(4);
        return view('author')->with('posts', $posts)->with('author', $author);
    }
}
