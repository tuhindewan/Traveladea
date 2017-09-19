<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use DB;
class User extends Eloquent  implements Authenticatable
{
    use AuthenticableTrait;
    protected $collection = 'users';
    protected $fillable = ['username', 'email', 'password','phone','gender','firstname','middlename','lastname','verifiedstatus','status','fk_city_id'];

    public static function userSignUp($input){
    	return DB::table('users')
        ->insertGetId([
            'username'      => $input['username'],
            'email'  => $input['email'],
            'password'     => $input['password'],
            'phone'      => $input['phone'],
            'gender'     => $input['gender'],
            'firstname'     => $input['firstname'],
            'middlename'     => $input['middlename'],
            'lastname'     => $input['lastname'],
            'verifiedstatus'     => 0,
            'status'     => 1,
            'fk_city_id'     => 1,
            'created_at'   => date('Y-m-d h:i:s')
            ]);
    }

    public static function userUpdateVerifiedStatus($id){
        return DB::table('users')
        ->where('_id', $id)  // find your user verifi by their id
        ->update([
            'verifiedstatus' => 1
            ]);
    }
}
