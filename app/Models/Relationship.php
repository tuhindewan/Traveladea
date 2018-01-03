<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
use App\Models\Relationship;
class Relationship extends Eloquent
{
    protected $collection = 'relationships';
    protected $fillable = ['user_id_one', 'user_id_two','status','user_action_id'];

    public static function request_send($input,$sender)
    {
    	return DB::collection('relationships')
	    	->insertGetId([
	    		'user_id_one' => $sender,
	    		'user_id_two' => $input['user_id_two'],
	    		'status' => $input['status'],
	    		'user_action_id' => $sender,
	    		'created_at' => date('Y-m-d h:i:s'),
	    		]);
    }

    public static function getAllFriendRequest($user_id)
    {
    	return Relationship::where('user_id_two','=',$user_id)->get();
    }

    public function users()
    {
        return Relationship::belongsTo('App\User','user_id_one');
    }


    public static function updatestatus($id, $user_id)
    {
    	return DB::collection('relationships')
            ->where('user_id_one', $id)
            ->where('user_id_two', $user_id)
            ->update(['status' => 1]);
    }
}
