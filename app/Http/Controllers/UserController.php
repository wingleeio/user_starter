<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	protected $redirectTo = '/home';

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'unique:users|string|max:255|alpha_dash',
			'avatar' => 'mimes:jpeg,jpg,png,gif|max:25000',
			'cover' => 'mimes:jpeg,jpg,png,gif|max:25000',
		]);
	}

	protected function upload_image($id, $file)
	{
		$image = new Image();
		$path = Storage::disk('s3')->put('images/', $file);

		$image->path = $path;
		$image->user_id = $id;

		$image->save();

		return $image->id;
	}

	function update_user(Request $request)
	{
		$this->validator($request->all())->validate();

		$user = User::find($request->user()->id);

		if ($request->name) {
			$user->name = $request->name;
		}

		if ($request->avatar) {
			$user->avatar_id = $this->upload_image($user->id, $request->avatar);
		} else if ($request->avatar_id) {
			$user->avatar_id = $request->avatar_id;
		}

		if ($request->cover) {
			$user->cover_id = $this->upload_image($user->id, $request->cover);
		} else if ($request->cover_id) {
			$user->cover_id = $request->cover_id;
		}

		$user->save();

		return User::find($user->id);
	}

	function get_current_user(Request $request)
	{
		return $request->user();
	}

	function get_all_users()
	{

		$users =  User::withCount("followers")->paginate(15);

		return $users;
	}

	function follow_user(Request $request)
	{
		$user = User::find($request->user_id);

		if ($user->following_user) {
			$user->followers()->detach($request->user()->id);
		} else {
			$user->followers()->attach($request->user()->id);
		}

		$user->save();

		return $user;
	}
}
