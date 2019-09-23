<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
	protected $redirectTo = '/home';

	function get_current_user(Request $request)
	{
		return $request->user();
	}

	function get_all_users()
	{

		$users =  User::paginate(15);

		return $users;
	}
}
