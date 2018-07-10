<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //Lấy số thông báo chưa đọc
    /*public function getNumberUnRead()
    {

    }*/

    public function getNotification(Request $req){

        Notification::where('user_id',Auth::user()->id)->update(['viewed'=>1]);

        $notifications=Notification::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        $text="";
        foreach($notifications as $notification)
        {
            $date=convert_date_time($notification->created_at);
            $from_user=User::where('id',$notification->from_user)->value('username');
            $text.="<div style='border-bottom:solid 1px rgba(100, 100, 100, .30);background-color: #E4E7F1;line-height: 30px'>
                    <a href='status/$notification->post_id' style='text-decoration: none'>
                    <div style='color:#1d2129;font-size:14px'><span style='font-weight: bold'>$from_user</span><img class='card-img-top card-img' style='width: 60px;float:left' src='public/source/user/img_avatar1.png' alt='Card image cap'>$notification->content</div>
                    <div class='card-time'>$date</div></a></div>";
        }
        return $text;
        /**/
    }
}
