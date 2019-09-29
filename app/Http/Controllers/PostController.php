<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

	protected $redirectTo = '/home';

	function get_all_posts()
	{
		$posts = Post::paginate(15);

		return $posts;
	}

	function get_one_post($id)
	{
		$post = Post::find($id);

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
