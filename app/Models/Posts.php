<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
use App\Models\Posts;

class Posts extends Eloquent
{
    
    protected $collection = 'post';
    protected $fillable = ['post_type', 'posted_by', 'fk_user_id','fk_place_id','description','location','hits_count','like','comment','status'];

    public static function createPost($input){
        
        return DB::collection('post')
        ->insertGetId([
            'post_type' => $input['post_type'],
            'fk_user_id' => $input['fk_user_id'],
            'fk_place_id' => $input['fk_place_id'],
            'description' => $input['description'],
            'posted_by' => $input['posted_by'],
            'location' => "",
            'hits_count' => 0,
            'status' => 1,
            'like' => 0,
            'comment' => 0,
            'created_at' => date('Y-m-d h:i:s')
            ]); 
    }

    public function users() {

        return Posts::belongsTo('App\User','fk_user_id');
    }
    public function places() {

        return Posts::belongsTo('App\Models\CountryPlace','fk_place_id');
    }

    public static function images(){
        return Posts::hasMany('App\Models\PostImages','fk_post_id');
    }

    public static function getPostWisePlaceid() {

        return DB::table('post')
        ->distinct('fk_place_id')
        ->select('fk_place_id')
        ->get();
    }

    public static function getPlaceWisePost($placeId) {

        return Posts::where('fk_place_id',new \MongoDB\BSON\ObjectID($placeId))
        ->orderBy('_id','desc')
        ->get();
    }

    
}
