<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Traits\FriendableTrait;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use DB;
use App\User;
class User extends Eloquent  implements Authenticatable
{
    use AuthenticableTrait;
    use FriendableTrait;
    protected $collection = 'users';
    protected $fillable = ['username', 'email', 'password','phone','country_code','gender','firstname','middlename','lastname','month','day','year','verifiedstatus','status','fk_city_id','fk_image_id'];

    public static function userSignUp($input,$imageId){
        return DB::collection('users')
        ->insertGetId([
            'username'      => $input['username'],
            'email'  => $input['email'],
            'password'     => $input['password'],
            'phone'      => $input['phone'],
            'country_code'      => $input['country_code'],
            'gender'     => $input['gender'],
            'firstname'     => $input['firstname'],
            'middlename'     => $input['middlename'],
            'lastname'     => $input['lastname'],
            // 'month'        => $input['month'],
            // 'day'          => $input['day'],
            // 'year'         => $input['year'],
            'verifiedstatus'     => 0,
            'status'     => 1,
            'fk_city_id'     => $input['fk_city_id'],
            'fk_image_id'     => $imageId,
            'created_at'   => date('Y-m-d h:i:s')
            ]);
    }

    public static function userUpdateVerifiedStatus($id){
        return DB::collection('users')
        ->where('_id', $id)  // find your user verifi by their id
        ->update([
            'verifiedstatus' => 1
            ]);
    }

    
    public static function posts(){
        return User::hasMany('App\Models\Posts','fk_user_id');
    }

    // public function images(){
    //     return $this->belongsTo('App\Models\UserProfileImage','fk_user_id');
    // }
    public function user_image() {
        return User::belongsTo('App\Models\UserProfileImage','fk_image_id');
    }

    public static function getUserBasicInfo() {
        return DB::collection('users')
        ->select('username','email','phone','status','fk_city_id')
        ->get();
    }

    public static function infomations()
    {
        return User::hasOne('App\Models\PersonalInformation','fk_user_id');
    }


    public static function relationships()
    {
        return User::hasOne('App\Models\Relationship','user_id_one');
    }



    public static function getUserById($userId){
        return  DB::collection('users')->where('_id', new \MongoDB\BSON\ObjectID($userId))->first();
    }

    public static function getAllUser($user_id)
    {
        return  User::where('_id','!=', new \MongoDB\BSON\ObjectID($user_id))->get();
    }


}
