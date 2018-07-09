<?php

namespace App\Http\Controllers;

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

    /*public function postComment(Request $req){
        $id=$req->id;


        $comment = new Post_Comment();
        $comment->post_body=$req->body;
        $comment->posted_by=Auth::user()->id;
        $comment->posted_to=$id;
        //$comment->posted_to=
        $comment->removed="no";
        $comment->post_id=$id;
        $comment->save();
    }*/

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
            $text.="<div><span style='font-weight: bold'>$username</span></br>
                    $comment->post_body</div>";
        }
        return $text;
    }

}