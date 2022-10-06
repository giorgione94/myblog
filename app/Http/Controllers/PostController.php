<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.list')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'subtitle' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'publication_date' => 'required'
        ]);
        if ($request->image) {
            $name = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $name);
        }
        Post::create([
            'title' => $request->title,
            'image' => $name,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'publication_date' => $request->publication_date
        ]);
        return redirect()->route('dashboard')->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();
        if ($user->id != $post->user_id) {
            abort(403);
        }
        
        $categories = Category::all();
        return view('posts.edit')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'subtitle' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'publication_date' => 'required'
        ]);
        $name = $post->image;
        if ($request->image) {
            $name = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $name);
        }
        $post->update([
            'title' => $request->title,
            'image' => $name,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'publication_date' => $request->publication_date
        ]);
        return redirect()->route('dashboard')->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Post deleted!');
    }
}