<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserProfileImage;
use App\Models\UserVerifi;
use App\Mail\UserVerifiMail;
use Auth;
use Validator;
use Response;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return "hi";
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.user.sign-up');
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
            'username' => 'required',
            'email'         => 'email|required|unique:users',
            'password'      => 'required|min:6|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        /*call user verifi code and time*/
        $result = $this->userVerifiCodeTime();
        $code = $result['code'];
        $request->code = $code;
        $endTime = $result['endTime'];

        if($request->hasFile('image')){
            $photo      = $request->file('image');
            $fileType   = substr($_FILES['image']['type'], 6);
            $fileName   = '/'.date("Y/m/d").'/'.rand(1,1000).date('dmyhis').".".$fileType;
            $upload     = $photo->move('images/users'.'/'.date("Y/m/d").'/',$fileName);
            $input['image'] = $fileName;
        }

        $input['password'] = bcrypt($input['password']);
        
        //DB::beginTransaction();
            
        try {
            $userId = User::userSignUp($input);
            UserProfileImage::userCreateImage($userId, $input);
            UserVerifi::userVerification($userId, $code, $endTime);
            \Mail::send(new UserVerifiMail());
            $bug = 0;
            //DB::commit();
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }
        
        if($bug == 0){
            
            return redirect('users/account-verification/'.$userId)->with('success','New Users Sign Up Successfully.');
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

    public function userVerifiCodeTime(){
        /* get tomorrow date time*/
        $datetime = new \DateTime(date('Y-m-d h:i:s'));
        $datetime->modify('+1 day');
        $endTime = $datetime->format('Y-m-d H:i:s');
        /* get rand dom genarat code in user verification*/
        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $result = [
            'code' => $code,
            'endTime' => $endTime
        ];
        return $result;
    }

    /*re generate code form user email*/
    public function reGenerateCode(Request $request){
        return "hi";
        $input=$request->all();
        $id = $input['id'];
        
        $getUserVerifi = UserVerifi::getUserVerifiInfoInUserId($id);
        $verifiId = $getUserVerifi->_id;
        /*call user verifi code and time*/
        $result = $this->userVerifiCodeTime();
        $code = $result['code'];
        $request->code = $code;
        $endTime = $result['endTime'];

        try {
            UserVerifi::userVerificationCodeUpdate($verifiId, $code, $endTime);
            \Mail::send(new UserVerifiMail());
            $bug = 0;
            //DB::commit();
        } catch (\Exception $e) {
            //DB::rollback();
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }
        
        if($bug == 0){
            return "success";
        }else{
            return 'Something Error Found !, Please try again.'.$bug1;
        }
    }
    
}
