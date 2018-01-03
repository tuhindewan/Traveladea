<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Relationship;

class UserRelationshipController extends Controller
{
    public static function send_user_request(Request $request)
    {
    	$input  = $request->all();
    	$user_id = Auth::user()->_id;
    	$all_user = User::getAllUser($user_id);
    	$sender = $user_id;
    	try {

    	    $id = Relationship::request_send($input,$sender);
    	    $bug = 0;

    	} catch (Exception $e) {

    	    $bug = $e->errorInfo[1];
    	    $bug1 = $e->errorInfo[2];
    	    
    	}

    	if($bug == 0){
    	    
    	    return view('frontend.profile_settings.all_search_list',compact('input','all_user'));
    	}
    	
    }
}
