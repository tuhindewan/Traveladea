<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Posts;
use App\Models\PostImages;
use App\Models\SuperAdmin;
use App\Models\UserProfileImage;
use App\Models\CurrentCity;
use DB;
use Illuminate\Support\Facades\Input;



class UserPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Posts::orderBy('_id', 'DESC')->get();

        $getSuperId = SuperAdmin::all();

        return view('backend.userpost.all_user_post', compact('posts','getSuperId'));

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $getPost = Posts::findOrFail($id);
        $userId = $getPost->fk_user_id;
        $getUser = User::getUserById($userId);
        $getImg = PostImages::getImageByPostId($id);
        
        return view('backend.userpost.show',compact('getPost','getUser','getImg'));
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
        try {

            $getData = Posts::findOrFail($id);
            //return $getData;

            $getData->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }

        if($bug == 0){
            return redirect()->back()->with('success','Post Deleted Successfully ');
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Post Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }

    public function status($id)
    {
        $getPost = Posts::findOrFail($id);
        if($getPost->status=='0'){
            $status = 1;
        }else{
            $status = 0; 
        }
        try {
            // update admin collection
            $getPost->update([
                'status'=>$status
                ]);
            $bug = 0;
            //DB::commit();
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }
        
        if($bug == 0){
            
            return redirect()->back()->with('success','Status Change Successfully.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }
}
