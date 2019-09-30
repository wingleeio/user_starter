<?php

namespace App\Http\Controllers;

use App\Post;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

	protected $redirectTo = '/home';

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'image' => 'mimes:jpeg,jpg,png,gif|max:25000',
		]);
	}

	protected function upload_image($id, $post_id, $file)
	{
		$image = new Image();
		$path = Storage::disk('s3')->put('images', $file);

		$image->path = $path;
		$image->user_id = $id;
		$image->post_id = $post_id;

		$image->save();

		return $image->id;
	}

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
		$this->validator($request->all())->validate();

		$post = new Post;
		$user = $request->user();

		$post->content = $request->content;
		$post->user_id = $user->id;

		if ($request->parent_id) {
			$post->parent_id = $request->parent_id;
		}

		if ($request->image) {
			$post->image_id = $this->upload_image($user->id, $post->id, $request->image);
		}

		$post->save();

		return Post::find($post->id);
	}
}
