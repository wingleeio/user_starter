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

	function get_all_posts()
	{
		$user = auth('api')->user();
		$posts = Post::with('author')->withCount(['reposts', 'likes'])->paginate(15);

		if ($user) {
			foreach ($posts as $post) {
				$post->liked_by_user = Helper::check_like($user->id, $post->id);
				$post->reposted_by_user = Helper::check_repost($user->id, $post->id);
			}
		}

		return $posts;
	}

	function get_one_post($id)
	{
		$user = auth('api')->user();
		$post = Post::with('author')->withCount(['reposts', 'likes'])->get()->find($id);

		if ($user) {
			$post->liked_by_user = Helper::check_like($user->id, $post->id);
			$post->reposted_by_user = Helper::check_repost($user->id, $post->id);
		}

		return $post;
	}

	function create_post(Request $request)
	{
		$post = new Post;
		$user = $request->user();

		$post->content = $request->content;
		$post->user_id = $user->id;

		$post->save();

		return $post;
	}
}
