<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
class CurrentCity extends Eloquent
{
    protected $collection = 'current_city';
    protected $fillable = ['city_name','description','status'];

    public static function createCurrentCity($input){
    	 
		return DB::collection('current_city')
    	->insert([
    		'city_name' => $input['city_name'],
    		'description' => $input['description'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    		]);
    }
}
