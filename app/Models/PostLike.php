<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
class PostLike extends Eloquent
{
    protected $collection = 'post_like';
    protected $fillable = ['fk_post_id','fk_user_id','liked_by'];

    public static function insertUserPostWiseLike($input){
        
        return DB::collection('post_like')
        ->insert([
            'fk_post_id' => $input['postId'],
            'fk_user_id' => $input['userId'],
            'liked_by' => 0,
            'created_at' => date('Y-m-d h:i:s')
            ]); 
    }

    public static function checkMyLikeOnPost($id){
        
        return DB::collection('post_like')
        ->where('fk_user_id', $id) 
        ->get(); 
    }

    public static function existsUserPostWiseLike($input){
        
        return DB::collection('post_like')
        ->where('fk_post_id', $input['postId'])
        ->where('fk_user_id', $input['userId']) 
        ->first(); 
    }

    public static function deleteUserPostWiseLike($id){
        
        return DB::collection('post_like')
        ->where('_id',new \MongoDB\BSON\ObjectID($id))
        ->delete();; 
    }
}
