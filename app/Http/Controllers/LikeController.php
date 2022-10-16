<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $post = Post::find($request->post_id);
        $like = Like::where('user_id', $user->id)->where('post_id', $post->id);
        if (count($like->get())) {
            $like->delete();
        }
        else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id
            ]);
        }
        return redirect()->route('posts.show', [$post]);
    }
}