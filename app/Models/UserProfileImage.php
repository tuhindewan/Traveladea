<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//use Illuminate\Database\Eloquent\Model;
use DB;
class UserProfileImage extends Eloquent
{
    protected $collection = 'user_profile_image';
    protected $fillable = ['image', 'fk_user_id'];

    public static function userCreateImage($userId,$input){
    	 
		return DB::collection('user_profile_image')
    	->insert([
    		'fk_user_id' => $userId,
    		'image' => $input['image'],
    		'created_at' => date('Y-m-d h:i:s')
    		]);

    }
}
