<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
use App\Models\PostSubComment;
class PostSubComment extends Eloquent
{
    protected $collection = 'post_sub_comment';
    protected $fillable = ['fk_post_comment_id','sub_comment_type','comment','fk_user_id'];

    public static function insertPostSubComment($input){
        
        return DB::collection('post_sub_comment')
        ->insertGetId([
            'fk_post_comment_id' => $input['commentId'],
            'fk_user_id' => $input['userId'],
            'comment' => $input['text'],
            'sub_comment_type' => 0,
            'created_at' => date('Y-m-d h:i:s')
            ]); 
    }

    

    public static function commentIdWiseSubComment($id){
        
        return PostComment::where('fk_post_comment_id', $id)
        ->orderBy('_id','asc')
        ->get(); 
    }

    
}
