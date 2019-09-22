<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

	protected $redirectTo = '/home';

	function get_all_posts()
	{
		$posts = Post::with('user')->get();

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

		$post->save();

		return $post;
	}
}
