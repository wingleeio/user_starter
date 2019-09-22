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

    private function set_user_id($id)
    {
        $this->user_id = $id;
    }

    private function set_post_id($id)
    {
        $this->post_id = $id;
    }

    function repost(Request $request)
    {
        $repost = new Repost;

        $this->set_user_id($request->user()->id);
        $this->set_post_id($request->post_id);

        $validated = $request->validate([
            "post_id" => [
                "required",
                Rule::unique('reposts')->where(function ($query) {
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
