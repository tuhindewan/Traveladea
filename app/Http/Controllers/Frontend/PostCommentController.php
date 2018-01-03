<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserProfileImage;
use App\Models\Posts;

use App\Models\PostComment;
use Auth;
use Validator;
use DB;
use Image;
class PostCommentController extends Controller
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
        $input = $request->all();
        //comment insert
        $commentData = PostComment::insertUserPostWiseComment($input);
        //check comment count
        $postId  = $input['postId'];
        $getPost = Posts::findOrFail($postId);
        $input['comment'] = $getPost->comment + 1;
        $getPost->update($input);
        $getPost = Posts::findOrFail($postId);
        $getUserProfile = UserProfileImage::where('fk_user_id',new \MongoDB\BSON\ObjectID($input['userId']))->first();
        $getUserName = User::where('_id',$input['userId'])->select('_id','username')->first();
        $comment = PostComment::findOrFail($commentData);
        return view('frontend.newsfeed.post.post-comment-add',compact('getUserProfile','getUserName','comment','getPost'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = $request->all();
        //$commentId  = $input['commentId'];
        //comment delete
        $getComment = PostComment::findOrFail($id);
        $getComment->delete();

        //post table update comment count
        $getPost = Posts::findOrFail($getComment['fk_post_id']);
        $commentData = $getPost['comment'] - 1;
        $updatePost = [
            'comment' => $commentData
        ];
        $getPost->update($updatePost);

        return $getComment['fk_post_id'].'_'.$commentData;
    }
}
