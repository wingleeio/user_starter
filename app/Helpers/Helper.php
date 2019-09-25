<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Repost;
use App\Like;

class Helper
{
	public static function check_like($user_id, $post_id)
	{
		if (Like::where([['user_id', '=', $user_id], ['post_id', '=', $post_id]])->first()) {
			return true;
		}
		return false;
	}

	public static function check_repost($user_id, $post_id)
	{
		if (Repost::where([['user_id', '=', $user_id], ['post_id', '=', $post_id]])->first()) {
			return true;
		}
		return false;
	}
}
