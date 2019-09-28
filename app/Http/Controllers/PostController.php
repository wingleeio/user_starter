<?php

namespace App\Http\Controllers;

use Helper;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

	protected $redirectTo = '/home';

	function check_like_repost($posts, $user)
	{
		foreach ($posts as $post) {
			$post->liked_by_user = Helper::check_like($user->id, $post->id);
			$post->reposted_by_user = Helper::check_repost($user->id, $post->id);
			if ($post->replies) {
				$this->check_like_repost($post->replies, $user);
			}
		}
	}

	function get_all_posts()
	{
		$user = auth('api')->user();
		$posts = Post::paginate(15);

		if ($user) {
			$this->check_like_repost($posts, $user);
		}

		return $posts;
	}

	function get_one_post($id)
	{
		$user = auth('api')->user();
		$post = Post::find($id);

		if ($user) {
			$post->liked_by_user = Helper::check_like($user->id, $post->id);
			$post->reposted_by_user = Helper::check_repost($user->id, $post->id);

			if ($post->replies) {
				$this->check_like_repost($post->replies, $user);
			}
		}

		return $post;
	}

	function create_post(Request $request)
	{
		$post = new Post;
		$user = $request->user();

		$post->content = $request->content;
		$post->user_id = $user->id;

		if ($request->parent_id) {
			$post->parent_id = $request->parent_id;
		}

		$post->save();

		return Post::find($post->id);
	}
}
