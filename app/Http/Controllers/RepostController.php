<?php

namespace App\Http\Controllers;

use App\Repost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
        $repost = new Repost;

        $this->user_id = $request->user()->id;
        $this->post_id = $request->post_id;

        $validated = $request->validate([
            "post_id" => [
                "required",
                Rule::unique('reposts')->where(function ($query) {

                    // Check if there is already a repost of this post by the user
                    $post_match = $query->where('post_id', $this->post_id);
                    $user_match = $query->where('user_id', $this->user_id);

                    if ($post_match && $user_match) {
                        return true;
                    } else {
                        return false;
                    }
                })
            ]
        ]);

        if ($validated) {
            $repost->post_id = $this->post_id;
            $repost->user_id = $this->user_id;

            $repost->save();

            return $repost;
        } else {
            throw ValidationException::withMessages($validated);
        }
    }
}
