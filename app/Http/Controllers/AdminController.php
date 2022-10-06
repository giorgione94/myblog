<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Auth\User;

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
        return view('admin.dashboard')->with('posts', $posts);
    }

    public function profile() {
        $user = Auth::user();
        return view('admin.profile')->with('user', $user);
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
    
    public function updateProfile(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->profile_image = $request->profile_image;
        $user->save();
        return redirect(route('editProfile'));
    }
   
}