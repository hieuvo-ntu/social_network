<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Like;
use App\Post;
use App\Post_Comment;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class PostController extends Controller
{


    public function postPost(Request $req)
    {
        $body = strip_tags($req->text_post);
        $check_empty = preg_replace('/\s+/', '', $body);
        $post = new Post();

        $user_to = 0;
        $post->added_by_user = Auth::user()->id;
        if($req->hasFile('myImage')){
            $file=$req->file('myImage');
            $file_name=date('Y-m-d-H-i-s').'.jpg';//
            $file->move('admin/img/image_post',$file_name);
            $post->image=$file_name;
        }else{
            $post->image="";
        }
        $post->status = 1;
        $post->likes = 0;

        if($check_empty !="") {
            $body_youtube=preg_split("/\s+/",$body);
            foreach ($body_youtube as $k => $v) {
                if(strpos($v, "www.youtube.com/watch?v=") !== false) {
                    $link = preg_split("!&!", $v);
                    $v = preg_replace("!watch\?v=!", "embed/", $link[0]);
                    $v = "<br><iframe width='500'  height='300' src='" . $v."'></iframe><br>";
                    $body_youtube[$k] = $v;
                }
            }
        }
        $body=implode(" ",$body_youtube);
        $post->body = $body;
        if ($post->save()) {
            $this->upDateNumPost(Auth::user()->id);
            return redirect()->back();
        }
    }

    private function upDateNumPost($id)
    {
        $user_numpost = User::where('id', $id)->value('num_post');
        $user_numpost++;
        DB::table('users')->where('id', $id)->update(['num_post' => $user_numpost]);
    }

    public function loadPost()
    {
        $user_id=Auth::user()->id;
        $user_first=Friend::select('user_1_id')->where('user_1_id',$user_id)->orWhere('user_2_id',$user_id);
        $user_second=Friend::select('user_2_id')->where('user_1_id',$user_id)->orWhere('user_2_id',$user_id)->union($user_first)->get()->toArray();

        $posts = Post::whereIn('added_by_user',$user_second )->orderBy('id','desc')->paginate(10);

        return view('page.index',compact('posts'));
    }

    protected $posts_per_page = 3;

    public function postPostAjax(Request $req)
    {
        $str = "";
        $user_id=Auth::user()->id;
        $user_first=Friend::select('user_1_id')->where('user_1_id',$user_id)->orWhere('user_2_id',$user_id);
        $user_second=Friend::select('user_2_id')->where('user_1_id',$user_id)->orWhere('user_2_id',$user_id)->union($user_first)->get()->toArray();
        $start=$req->offset;
        $post_ajax = Post::whereIn('added_by_user', $user_second)->orderBy('id','desc')->skip($start)->take($this->posts_per_page)->get();

        $count=$post_ajax->count();
        $json=array();
        if ($count > 0){

            foreach ($post_ajax as $post) {
                $data=array();
                $id = $post->id;
                settype($id,'string');
                //$url=route('getComment',$id);
                $body = $post->body;
                $image=  $post->image;
                $added_by_user = $post->added_by_user;
                $date_time = convert_date_time($post->created_at);
                $username = DB::table('users')->where('id', $added_by_user)->value('username');
                $isLike=DB::table('likes')->where('user_id',Auth::user()->id)
                    ->where('post_id',$id)->count();

                if($isLike!=0) $data['isLike']="fa fa-heart";
                else $data['isLike']="fa fa-heart-o";

                $getNumComments= new CommentController();
                $numComments=$getNumComments->getNumComment($id);

                $data['id']=$id;
                $data['like']=$post->likes;
                $data['body']=$body;
                $data['image']=$image;
                $data['user_id']=$added_by_user;
                $data['username']=$username;
                $data['date']=$date_time;
                $data['numComments']=$numComments;
                array_push($json,$data);
                //Mỗi lần load dc 3 post
            }
    }
        //echo $str;
        return response()->json($json);

    //return response()->json($json);
    }

    public function getSinglePost($id)
    {
        $getNumComments= new CommentController();
        $numComments=$getNumComments->getNumComment($id);
        $singlePost=Post::where('id',$id)->first();
        $Comments_Post=Post_Comment::where('post_id',$id)->get();
        $isLike=DB::table('likes')->where('user_id',Auth::user()->id)
            ->where('post_id',$id)->count();

        if($isLike!=0) $Liked="fa fa-heart";
        else $Liked="fa fa-heart-o";
        return view('page.post',compact('singlePost','Liked','numComments','Comments_Post'));
    }

    public function deletePost($id){
        Post::where('id',$id)->delete();
        return redirect()->route('index');
    }

    public function updatePost(Request $req){
        Post::where('id',$req->post_id)->update(['body'=>$req->update]);
        return "success";
    }

}
