<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Relationship;
use App\Models\UserProfileImage;


class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allRequests()
    {
        $user_id = Auth::user()->_id;

        $requesters = Relationship::getAllFriendRequest($user_id);
        //return $friendRequest[0]->users;
        /*foreach ($requesters as $value) {
            return $value->users->user_image;
        }*/
        return view('frontend.profile_settings.friend_request',compact('requesters'));
    }

    public static function accepterequest($id)
    {
        $user_id = Auth::user()->_id;

        $checkRequest = Relationship::where('user_id_one',$id)
                           ->where('user_id_two',$user_id)
                           ->first();

        if ($checkRequest)
        {
            $conreq = Relationship::updatestatus($id, $user_id);
              return back();
        }
        else
        {
            echo "wrong";
        }                    
    }

    

}
