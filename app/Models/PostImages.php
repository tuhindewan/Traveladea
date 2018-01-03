<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
use App\Models\PostImages;
class PostImages extends Eloquent
{
    protected $collection = 'post_image';
    protected $fillable = ['fk_post_id', 'images'];

    public static function insertPostImages($postId,$image){
        
        return DB::collection('post_image')
        ->insert([
            'fk_post_id' => $postId,
            'images' => $image,
            'created_at' => date('Y-m-d h:i:s')
            ]); 
    }

    public static function posts() {

        return PostImages::hasMany('App\Models\UserPosts','fk_post_id');
    }

    public static function getImageByPostId($id){
        return  DB::collection('post_image')->where('fk_post_id', new \MongoDB\BSON\ObjectID($id))->get();
    }
}
