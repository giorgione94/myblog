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
        $posts = Post::where('user_id', $user_id)->with('category')->paginate(6);
        return view('admin.dashboard')->with('posts', $posts);
    }

    public function profile() {
        $author = Auth::user();
        return view('admin.profile')->with('author', $author);
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
        
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $name = $user->profile_image;
        if ($request->profile_image) {
            $name = uniqid() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images/authors'), $name);
        }
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->profile_image = $name;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User Updated!');
    }
    
   
}