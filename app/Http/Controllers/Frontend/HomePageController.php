<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CurrentCity;
use App\Models\CountryPlace;
use App\User;
use App\Models\UserProfileImage;

use App\Models\Posts;
use App\Models\PostLike;
use App\Models\PostComment;
use App\Models\PostSubComment;
use App\Models\PostImages;
use Auth;
use DB;
class HomePageController extends Controller
{
    public function index(){
        $id = Auth::user()->_id;
        $currentCity = CurrentCity::where('status','1')->get();
        $getUser = User::findOrFail($id);
        $userProfile = UserProfileImage::get();
        
        $userProfile = UserProfileImage::singleUserWiseProfile($id);

        $getPostWisePlaceId = Posts::getPostWisePlaceId(); 
    	$getPlace = CountryPlace::all(); 
        //$getPlacewisePost = Posts::with('places')->get();
        //$getPlacewisePost = Posts::with('users')->get();
        //return $getPost;
    	return view('frontend.newsfeed.welcome', compact('currentCity','userProfile','getPlacewisePost','getPost','getPlace','getPostWisePlaceId','getUser'));
    }

    public function checkPlace($latitude,$longitude){
    	$input = [
    		'lat' => $latitude,
    		'lon' => $longitude
    	];

    	$getPlace = CountryPlace::checkExistPlace($input);
    	if(count($getPlace)>0){

    		return redirect('place/'.$getPlace['_id']);
    	}else{
    		return "you are not access";
    	}

    	
    }

    public function placeWisePostShow($placeId){
        
    	$getSinglePlace = CountryPlace::findOrFail($placeId);
    	//return $getSinglePlace['lat'];
        $getPostWisePlaceId = Posts::getPostWisePlaceId(); 
        $getPlace = CountryPlace::all();
        $getUserInfo = User::getUserBasicInfo();
        $getUserProfile = UserProfileImage::all();
        $getPosts = Posts::getPlaceWisePost($placeId);
        $getPostWiseImage = PostImages::all();
        $myId = \Auth::user()->_id;
        $getPostLike = PostLike::checkMyLikeOnPost($myId);
        $getPostComment = PostComment::orderBy('_id','desc')->get();
        $getSubComment = PostSubComment::orderBy('_id','asc')->get();
        $myProfile = UserProfileImage::singleUserWiseProfile($myId);
        $getUserName = User::select('_id','username')->get();
        
    	return view('frontend.show-page',compact('getSinglePlace','getPlace','getPostWisePlaceId','getPosts','getUserInfo','getUserProfile','getPostWiseImage','getPostLike','getPostComment','myProfile','getUserName','getSubComment'));
    }
}
