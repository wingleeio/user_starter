<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	protected $redirectTo = '/home';

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

		$user->followers()->attach($request->user()->id);

		$user->save();

		return $user;
	}
}
