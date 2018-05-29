<?php

namespace App\Http\Controllers;

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
        $user->username=$req->txtfirstname."_".$req->txtlastname;
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

    public function postLogin(Request $req){
        $data=['email'=>$req->txtemail,'password'=>$req->txtpswd];
        if(Auth::attempt($data)){
            return redirect()->route('index');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }
}
