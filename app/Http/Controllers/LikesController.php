<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Like;
use Auth;
use App\Post;


class LikesController extends Controller
{
    public function store(Request $request, $postId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'post_id' => $postId
          )
        );
        // 変更

        $post = Post::findOrFail($postId);

        return redirect()->route('posts.show', $post->id);
    }

    
}
