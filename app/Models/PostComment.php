<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
use App\Models\PostComment;
class PostComment extends Eloquent
{
    protected $collection = 'post_comment';
    protected $fillable = ['fk_post_id','fk_user_id','comment_by','comment','sub_comment'];

    public static function insertUserPostWiseComment($input){
        
        return DB::collection('post_comment')
        ->insertGetId([
            'fk_post_id' => $input['postId'],
            'fk_user_id' => $input['userId'],
            'comment' => $input['text'],
            'comment_by' => 0,
            'sub_comment' => 0,
            'created_at' => date('Y-m-d h:i:s')
            ]); 
    }

    public static function postIdWiseComment($id){
        
        return PostComment::where('fk_post_id', $id)
        ->orderBy('_id','asc')
        ->get(); 
    }

    // public static function deleteUserPostWiseComment($id){
        
    //     return DB::collection('post_comment')
    //     ->where('_id',new \MongoDB\BSON\ObjectID($id))
    //     ->delete();; 
    // }
}
