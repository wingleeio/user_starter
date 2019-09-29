<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;

class LikeController extends Controller
{

    private $user_id;
    private $post_id;

    function like(Request $request)
    {
        $this->user_id = $request->user()->id;
        $this->post_id = $request->post_id;

        $likes = Like::where('user_id', '=', $this->user_id)->where('post_id', '=', $this->post_id)->get();

        if (count($likes) < 1) {
            $like = new Like;

            $like->post_id = $this->post_id;
            $like->user_id = $this->user_id;

            $like->save();

            $post = Post::find($this->post_id);

            return $post;
        } else {
            foreach ($likes as $like) {
                $like->delete();
            }

            $post = Post::find($this->post_id);

            return $post;
        }
    }
}
