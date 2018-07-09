<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Friend_Request;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{


    public function getRegister(){
        return view('admin.user.user_add');
    }

    public function postRegister(UserRequest $req){
        $user=new User();
        $user->lastname=$req->txtlastname;
        $user->firstname=$req->txtfirstname;
        $user->username=$req->txtfirstname." ".$req->txtlastname;
        $user->email=$req->txtemail;
        $user->num_post=0;
        $user->num_likes=0;
        $user->profile_img="asa";
        $user->user_closed="no";
        $user->friend_array="332";
        $user->remember_token=$req->_token;
        $user->password=Hash::make($req->txtpswd);
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
    }

    public function getLogin(){
        return view('admin.user.user_login');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function postLogin(Request $req){
        $data=['email'=>$req->txtemail,'password'=>$req->txtpswd];
        if(Auth::attempt($data)){
            return redirect()->route('index');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }

    public function getProfile($id){
        $user_info=User::where('id',$id)->first();
        $friend=$this->isFriend($id);
        $sentRequest=$this->getSentRequest($id);
        $receiveRequest=$this->getReceiveRequest($id);
        return view('admin.user.profile',compact('user_info','friend','sentRequest','receiveRequest'));
    }

    public function isFriend($id){
        $result=Friend::where([
            ['user_1_id',Auth::user()->id],
            ['user_2_id',$id]
        ])->orWhere([
            ['user_1_id',$id],
            ['user_2_id',Auth::user()->id]
        ])->first();
        if(count($result)>0)
            return true;
        else return false;
    }
    //Xóa bạn be
    public function deleteFriend($id)
    {
        Friend::where([
            ['user_1_id',Auth::user()->id],
            ['user_2_id',$id]
        ])->orWhere([
            ['user_1_id',$id],
            ['user_2_id',Auth::user()->id]
        ])->delete();
        return redirect()->back();
    }
    //Gửi lời mời kết bạn
    public function getSendRequest($id)
    {
        Friend_Request::create(['user_from'=>Auth::user()->id,'user_to'=>$id]);
        return redirect()->back();
    }
    //Đã gửi lời mời kết bạn
    public function getSentRequest($id)
    {
        $sentRequest=Friend_Request::where([
            ['user_from',Auth::user()->id],
            ['user_to',$id]
        ])->count();
        if($sentRequest>0) return true; else false;
    }
    //Hủy bỏ lời mời kết bạn đã gửi
    public function getReMoveRequest($id)
    {
        Friend_Request::where([
            ['user_from',Auth::user()->id],
            ['user_to',$id]
        ])->delete();
        return redirect()->back();
    }
    //Nhận lời mời kết bạn từ người khác
    public function getReceiveRequest($id)
    {
        $receiveRequest=Friend_Request::where([
            ['user_from',$id],
            ['user_to',Auth::user()->id]
        ])->count();
        if($receiveRequest>0) return true; else false;
    }
    //Chấp nhận lời mời kết bạn
    public function getAcceptRequest($id)
    {
        Friend::create(['user_1_id'=>Auth::user()->id,'user_2_id'=>$id,'status'=>'yes']);
        Friend_Request::where([
            ['user_from',$id],
            ['user_to',Auth::user()->id]
        ])->delete();
        return redirect()->back();
    }
    //Không chấp nhận
    public function getDeleteRequest($id)
    {
        Friend_Request::where([
            ['user_from',$id],
            ['user_to',Auth::user()->id]
        ])->delete();
        return redirect()->back();
    }
}
