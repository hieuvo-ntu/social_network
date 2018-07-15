<?php

namespace App\Http\Controllers;

use App\Like;
use App\Notification;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LikeController extends Controller
{
    private function upDateNumLike($id,$operator)
    {
        //Nếu operator ==1 thì nút like tăng thêm 1 đơn vị
        //Ngược lại giảm 1 đơn vị
        $post_numlike = Post::where('id', $id)->value('likes');
        if($operator==1) {
            $post_numlike++;
        }else{
            $post_numlike--;
        }
        DB::table('posts')->where('id', $id)->update(['likes' => $post_numlike]);
    }

    private function getNumLike($id)
    {
        $count=Post::where('id',$id)->value('likes');
        if($count==0){
            return "0";
        }else
            return $count;
    }

    public function sendLike(Request $req)
    {

        DB::table('likes')->insert(
            ['user_id' => Auth::user()->id, 'post_id' => $req->post_id]
        );
        $var=$req->post_id;
        $this->upDateNumLike($var,'1');
        $count_like=$this->getNumLike($var);
        $user_id=Post::where('id',$var)->value('added_by_user');
        $notifi=new Notification();
        $notifi->user_id=$user_id;
        $notifi->from_user=Auth::user()->id;
        $notifi->post_id=$var;
        $notifi->content=" đã thích trạng thái của bạn";
        $notifi->viewed=0;
        if($notifi->from_user!=$notifi->user_id) {

            $notifi->save();
        }

        return response(['count_like'=>$count_like]);

    }

    public function sendUnLike(Request $req)
    {
        DB::table('likes')->where('user_id',Auth::user()->id)
            ->where('post_id',$req->post_id)->delete();
        $var=$req->post_id;
        $this->upDateNumLike($var,'0');
        $count_like=$this->getNumLike($var);
        return response(['count_like'=>$count_like]);
    }
}
