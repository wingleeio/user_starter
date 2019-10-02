<?php

namespace App\Http\Controllers;

use App\Repost;
use App\Post;
use Illuminate\Http\Request;

class RepostController extends Controller
{
    private $user_id;
    private $post_id;

    function get_all_reposts()
    {
        $reposts = Repost::with(['user', 'post', 'post.user'])->paginate(15);

        return $reposts;
    }

    function repost(Request $request)
    {
        $this->user_id = $request->user()->id;
        $this->post_id = $request->post_id;

        $reposts = Repost::where('user_id', '=', $this->user_id)->where('post_id', '=', $this->post_id)->get();

        if (count($reposts) < 1) {
            $repost = new Repost;

            $repost->post_id = $this->post_id;
            $repost->user_id = $this->user_id;

            if ($request->content) {
                $repost->content = $request->content;
            }

            $repost->save();

            $post = Post::find($this->post_id);

            return $post;
        } else {
            foreach ($reposts as $repost) {
                $repost->delete();
            }

            $post = Post::find($this->post_id);

            return $post;
        }
    }
}
