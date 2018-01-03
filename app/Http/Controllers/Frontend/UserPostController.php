<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserProfileImage;
use App\Models\Posts;
use App\Models\PostVideos;
use App\Models\PostImages;
use App\Models\CountryPlace;
use App\Models\PostLike;
use App\Models\PostComment;
use Auth;
use Validator;
use DB;
use Image;
class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*validator all field*/
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'post_type' => 'required',
            'place' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        
        //$str = preg_replace('/#([a-zA-Z0-9!_%]+)([^;\w]{1}|$)/', '<a href="hashtag/$1">#$1</a>$2',$input['description']);
        //nl2br()
        /*echo "<pre>";
        print_r($input);exit;*/
        
        //DB::beginTransaction();
            
        try {
            /*check exist country place in db*/
            $checkPlace = CountryPlace::checkExistPlace($input);
            if(count($checkPlace)>0){
                $input['fk_place_id'] = $checkPlace['_id'];
            }else{
                $placeId = CountryPlace::createCountryPlace($input);
                $input['fk_place_id'] = $placeId;
            }
            
            $postId = Posts::createPost($input);

            /*image upload section*/
            if(!empty($input['image'])){
                for ($i=0; $i < count($input['image']); $i++) { 
                    $imageData = $input['image'][$i];
                    if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $imageData, $matches)) {
                        $imageType = $matches[1];
                        $imageData = base64_decode($matches[2]);

                        $image = imagecreatefromstring($imageData);
                        $filename = md5($imageData) . '.png';

                        $img = Image::make($imageData);
                        
                        $imageName = rand(1,1000).date('dmyhis').".png";
                        /*243*auto size image */
                        $directory = 'images/post/photo/s243/'.date("Y").'/'.date("m").'/'.date("d").'/';
         
                        //If the directory doesn't already exists.
                        if(!is_dir($directory)){
                            //Create our directory.
                            mkdir($directory, 755, true);
                        }
                        
                        //$img->resize(243, null);
                        $img->resize(243, null, function ($constraint) {
                            $constraint->aspectRatio();
                            //$constraint->upsize();
                        });
                        $save_path = date("Y").'/'.date("m").'/'.date("d").'/'.$imageName;
                        $img->save('images/post/photo/s243/'.$save_path);

                        /*487*auto size image */
                        $directory = 'images/post/photo/s487/'.date("Y").'/'.date("m").'/'.date("d").'/';
         
                        //If the directory doesn't already exists.
                        if(!is_dir($directory)){
                            //Create our directory.
                            mkdir($directory, 755, true);
                        }
                        
                        //$img->resize(487, null);
                        $img->resize(487, null, function ($constraint) {
                            $constraint->aspectRatio();
                            //$constraint->upsize();
                        });
                        $save_path = date("Y").'/'.date("m").'/'.date("d").'/'.$imageName;
                        $img->save('images/post/photo/s487/'.$save_path);

                        /*660*auto size image */
                        $directory = 'images/post/photo/s660/'.date("Y").'/'.date("m").'/'.date("d").'/';
         
                        //If the directory doesn't already exists.
                        if(!is_dir($directory)){
                            //Create our directory.
                            mkdir($directory, 755, true);
                        }
                        
                        //$img->resize(660, null);
                        $img->resize(660, null, function ($constraint) {
                            $constraint->aspectRatio();
                            //$constraint->upsize();
                        });
                        $save_path = date("Y").'/'.date("m").'/'.date("d").'/'.$imageName;
                        $img->save('images/post/photo/s660/'.$save_path);

                        PostImages::insertPostImages($postId,$save_path);

                      
                    }    
                }
            }
            
            /*video upload section*/
            if(!empty($input['video'])){
                for ($i=0; $i < count($input['video']); $i++) { 
                    $videoLink = $input['video'][$i]; 

                    PostVideos::insertPostVideos($postId,$videoLink);  
                }
            }
            $bug = 0;
            //DB::commit();
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }
        
        if($bug == 0){
            return redirect()->back()->with('success','Post Upload Successfully.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $postId  = $input['postId'];

        //comment delete
        $postData = Posts::findOrFail($postId);
        $postData->update($input);
        $getPost = Posts::findOrFail($postId);
        $getUserProfile = UserProfileImage::where('fk_user_id',new \MongoDB\BSON\ObjectID($getPost['fk_user_id']))->first();
        $getUserName = User::where('_id',$getPost['fk_user_id'])->select('_id','username')->first();

        return view('frontend.newsfeed.post.post-edit',compact('getUserProfile','getUserName','getPost'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * post like section .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postLike(Request $request)
    {
        $input = $request->all();
        $status = $input['status'];
        $postId  = $input['postId'];
        //$getLike = Posts::checkPostLike($postId);
        $getPost = Posts::findOrFail($postId);
        if($status==0){
            PostLike::insertUserPostWiseLike($input);
            $input['like'] = $getPost['like']+1;
        }else{
            $getExists = PostLike::existsUserPostWiseLike($input); 
            PostLike::deleteUserPostWiseLike($getExists['_id']); 
            $input['like'] = $getPost['like']-1;  
        }
        
        $getPost->update($input);
        return $input['like'];
        

    }

    
    //comment edit
    public function postCommentEdit(Request $request)
    {
        $input = $request->all();
        $commentId  = $input['commentId'];

        //comment delete
        $getComment = PostComment::findOrFail($commentId);
        $getComment->update($input);
        $comments = PostComment::findOrFail($commentId);
        $getUserProfile = UserProfileImage::where('fk_user_id',new \MongoDB\BSON\ObjectID($comments['fk_user_id']))->first();
        $getUserName = User::where('_id',$comments['fk_user_id'])->select('_id','username')->first();

        return view('frontend.newsfeed.post.post-comment-edit',compact('getUserProfile','getUserName','getComment','comments'));
        // $data = $comments->created_at->diffForHumans();
        // $html = '<div class="post_comment_top"><b>'.$getUserName->username.' </b><small>dslfjdsflkds sfdsf</small></div><div class="post_comment_bottom"> Like . Reply . '.$data.'</div>';
        // return $html;

    }
    //comment delete
    public function postCommentDelete(Request $request)
    {
        /*$input = $request->all();
        $commentId  = $input['commentId'];
        //comment delete
        $getComment = PostComment::findOrFail($commentId);
        $getComment->delete();

        //post table update comment count
        $getPost = Posts::findOrFail($getComment['fk_post_id']);
        $commentData = $getPost['comment'] - 1;
        $updatePost = [
            'comment' => $commentData
        ];
        $getPost->update($updatePost);

        return $getComment['fk_post_id'].'_'.$commentData;*/
        

    }

    public function allComment($id){
        $getComment = PostComment::postIdWiseComment($id);
        $getUserProfile = UserProfileImage::all();
        $getUserName = User::select('_id','username')->get();
        return view('frontend.newsfeed.post.load-all-comment',compact('getComment','getUserProfile','getUserName'));
    }
}
