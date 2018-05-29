<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function postPost(Request $req){
        $body=($req->text_post);

        $post=new Post();
        $post->body=$body;
        $user_to=0;
        $post->added_by_user=Auth::user()->id;
        if($user_to==$post->added_by_user){
            $user_to=0;
        }
        $post->user_to=$user_to;
        $post->deleted="no";
        $post->user_closed="no";
        $post->likes=0;
        if($post->save()){
            $this->upDateNumPost(Auth::user()->id);
            return redirect()->back();
        }
    }

    private function upDateNumPost($id){
        $user_numpost=User::where('id',$id)->value('num_post');
        $user_numpost++;
        DB::table('users')->where('id',$id)->update(['num_post'=>$user_numpost]);
    }

    public function loadPost(){
        $post_data=Post::where('deleted','no')->orderBy('id','desc')->get();
        return view('page.index',compact('post_data'));
    }
}
