<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserProfileImage;
use App\Models\PostComment;

use App\Models\PostSubComment;
use Auth;
use Validator;
use DB;
class PostSubCommentController extends Controller
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

        $subCommentData = PostSubComment::insertPostSubComment($input);
        //check comment count
        $commentId  = $input['commentId'];
        $postComment = PostComment::findOrFail($commentId);
        $input['sub_comment'] = $postComment->sub_comment + 1;
        $postComment->update($input);
        $postComment = PostComment::findOrFail($commentId);
        $getUserProfile = UserProfileImage::where('fk_user_id',new \MongoDB\BSON\ObjectID($input['userId']))->first();
        $getUserName = User::where('_id',$input['userId'])->select('_id','username')->first();
        $comment = PostSubComment::findOrFail($subCommentData);
        return view('frontend.newsfeed.post.sub_comment.sub-comment-add',compact('getUserProfile','getUserName','comment','postComment'));
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
        //
    }
}
