<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LikeController extends Controller
{

    private $user_id;
    private $post_id;

    function like(Request $request)
    {
        $like = new Like;

        $this->user_id = $request->user()->id;
        $this->post_id = $request->post_id;

        $validated = $request->validate([
            "post_id" => [
                "required",
                Rule::unique('likes')->where(function ($query) {

                    // Check if there is already a like of this post by the user
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
            $like->post_id = $this->post_id;
            $like->user_id = $this->user_id;

            $like->save();

            return $like;
        } else {
            throw ValidationException::withMessages($validated);
        }
    }
}
