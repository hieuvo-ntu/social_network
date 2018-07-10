@include('header')
<?php $username = DB::table('users')->where('id', $singlePost->added_by_user)->value('username');?>
<div class="container-fluid" style="padding-top:25px">
    <div class="post-area">
        <div class="col-sm-6 offset-sm-3" style="margin-top:20px" >
            <div class="card">
                <div class="card-header"><img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">
                <div class="card-author d-inline-block"><a href="profile/{{$singlePost->added_by_user}}">{{$username}}</a></div>
                <div class="card-time">{{convert_date_time($singlePost->created_at)}}</div> </div> <div class="card-body post" name="{{$singlePost->id}}"> <p class="card-text">{{$singlePost->body}}</p></div>
                <div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="{{$singlePost->id}}" class="col-5 btn button{{$singlePost->id}}"><i class="{{$Liked}} fa-lg">{{$singlePost->likes}}</i></button>
                    <button type="button" id="{{$singlePost->id}}" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg"></i></button></div>
                </div>
            </div>
        </div>
    </div>
</div>