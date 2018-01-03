<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserProfileImage;
use App\Models\UserCoverImage;
use App\Models\UserVerifi;
use App\Mail\UserVerifiMail;
use App\Models\CurrentCity;
use App\Models\PersonalInformation;
use Auth;
use Validator;
use Response;
use DB;
use Hash;

class UserProfileController extends Controller
{
    public static function index(){
        $user_id = Auth::user()->_id;
        $user_info = User::findOrFail($user_id);
        $getCover = UserCoverImage::getCoverImageById($user_id);
    	return view('frontend.user.index',compact('user_info','getCover'));
    }

    public static function about(){
    	$id = Auth::user()->_id;
    	$getUser = User::findOrFail($id);
    	$getInfo = PersonalInformation::getInformationById($id);
    	return view('frontend.user.user_about', compact('getUser','getInfo'));
    }

    public static function getUserProfileInfo(){
    	$id = Auth::user()->_id;
    	$getUser = User::findOrFail($id);
    	$getInfo = PersonalInformation::getInformationById($id);
    	return view('frontend.user.edit_profile', compact('getUser','getInfo'));
    }


}
