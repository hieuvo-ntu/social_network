<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Post;
use App\Post_Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getComment($id){
        $post_id=$id;
        $comments=Post_Comment::where('post_id',$post_id)->get();
        return view('page.comment',compact('post_id','comments'));
    }

    public function getUserNameofPost(Request $req)
    {
        $post_id=$req->post_id;
        $user_id=Post::where('id',$post_id)->value('added_by_user');
        $username=User::where('id',$user_id)->value('username');
        return "$username";
    }

    public function postComment(Request $req)
    {
        $id=$req->post_id;
        $comment = new Post_Comment();
        $comment->post_body=$req->reply;
        $comment->posted_by=Auth::user()->id;
        $comment->post_id=$id;
        $comment->removed="no";
        $comment->save();

        $user_id=Post::where('id',$id)->value('added_by_user');
        $notifi=new Notification();
        $notifi->user_id=$user_id;
        $notifi->from_user=Auth::user()->id;
        $notifi->post_id=$id;
        $notifi->content=" đã bình luận bài viết của bạn";
        $notifi->viewed=0;
        if($notifi->from_user!=$notifi->user_id) {

            $notifi->save();
        }
        return "success";
    }

    public function loadComment(Request $req)
    {
        $id=$req->post_id;
        $comment_posts=Post_Comment::where([
            ['post_id',$id],
            ['removed','no']
        ])->get();
        $text="";
        foreach($comment_posts as $comment)
        {
            $username=User::where('id',$comment->posted_by)->value('username');
            $date=date_format($comment->created_at,'d/m/Y');
            $ownPost=Post::where([
                ['id',$comment->post_id],
                ['added_by_user',Auth::user()->id]
            ])->count();
            $userComment=Post_Comment::where([
                ['post_id',$comment->post_id],
                ['posted_by',Auth::user()->id]
            ])->count();
            $text.="<div><span style='font-weight: bold'>$username:</span>";
            if($ownPost>0) {
                $text .= "<a href='hideComment/$comment->id' style='float:right' class='btn btn-danger btn-sm confirm'>ẩn</a>";
            }else if($userComment>0){
                $text.="<a href='removeComment/$comment->id' style='float:right' class='btn btn-danger btn-sm confirm'>xóa</a>";
            }else{
                $text.="";
            }
            $text.="</br>$comment->post_body</br>
                    <span class='card-time'>$date    </span><a href='' style='font-size:14px'>Trả lời</a></div>";
        }

        return $text;
    }

    //Ẩn bình luận
    public function hideComment($id)
    {
        Post_Comment::where('id',$id)->update(['removed'=>'yes']);
        return redirect()->back();
    }
    //Xóa bình luận
    public function removeComment($id)
    {
        Post_Comment::where('id',$id)->delete();
        return redirect()->back();
    }

}