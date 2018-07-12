@include('header')
<script src="{{url('public/js/ajax_like.js')}}"></script>
<script src="{{url('public/js/ajax_unlike.js')}}"></script>
<?php $username = DB::table('users')->where('id', $singlePost->added_by_user)->value('username');?>
<div class="container-fluid" style="padding-top:25px">
    <div class="post-area">
        <div class="col-sm-6 offset-sm-3" style="margin-top:20px" >
            <div class="card">
                <div class="card-header"><img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">
                <div class="card-author d-inline-block"><a href="profile/{{$singlePost->added_by_user}}">{{$username}}</a></div>
                <div class="card-time">{{convert_date_time($singlePost->created_at)}}</div> </div> <div class="card-body post" name="{{$singlePost->id}}"> <p class="card-text">{{$singlePost->body}}</p></div>
                <div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="{{$singlePost->id}}" class="col-5 btn button{{$singlePost->id}}"><i class="{{$Liked}} fa-lg">{{$singlePost->likes}}</i></button>
                    <button type="button" id="{{$singlePost->id}}" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg">{{$numComments}}</i></button></div>
                </div>
            </div>
            {{--Phần bình luận--}}
            <div id="Comments">

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".button{{$singlePost->id}}", function () {

        //var css=$(this.title);
        var css=$('>i',this);

        if(css.hasClass("fa-heart-o")) {
            css.removeClass("fa-heart-o").addClass("fa-heart");
            var id=this.title;
            ajax_like(id,css);

        }else if(css.hasClass("fa-heart"))
        {

            css.removeClass("fa-heart").addClass("fa-heart-o");
            var id=this.title;
            ajax_unlike(id,css);
        }
    });
    $(document).ready(function () {
        /*var div = document.getElementById("Commentscontainer-fluid");
        div.scrollTop = div.scrollHeight;*/
        var id='{{$singlePost->id}}';
        $.ajax({
            url:"getCommentPost",
            type:"post",
            cache:false,
            data:{post_id: id},
            success:function (data) {
                $('#Comments').html(data);

            }
        })
    });
    $(document).on('click','.comments',function () {
        var post_id=$(this).attr("id");

        $.ajax({
            url:"getUserPost",
            type:"post",
            data:{post_id:post_id},
            success:function (data) {
                $('#exampleModalTitle').html('Trả lời bài viết của '+data);
                $('textarea').attr('name',post_id);
                $('#myModal').modal('show');

            }
        })
    });
    $(document).on('click','.Reply',function () {
        var reply=$("#comment-text").val();
        var post_id = $('textarea').attr('name');
        $.ajax({
            url: 'postComment',
            type: "post",
            data: {reply: reply, post_id: post_id},
            success: function (response) {
                $('#myModal').modal('hide');
                window.location.reload(true);

            }
        });
    });

    $(document).on('click','.Reply-Comment',function () {
        var reply=$("#reply-comment-text").val();
        var user_id = $('textarea').attr('name');
        var post_id='{{$singlePost->id}}';
        $.ajax({
            url: 'postComment',
            type: "post",
            data: {reply: reply, post_id: post_id,user_id:user_id},
            success: function (response) {
                $('#myModal').modal('hide');
                window.location.reload(true);

            }
        });
    });

    $(document).on('click','#reply-comment',function () {
        var reply_comment_user=$('#reply-comment').parent().attr('name');
        var user_id=$('#reply-comment').parent().attr('id');
        $('#commentModalTitle').html('Trả lời bình luận của '+reply_comment_user);
        $('textarea').attr('name',user_id);
                $('#myReplyModal').modal('show');
    });
    $(document).on('click','.confirm',function () {
        return confirm("Bạn có chắc muốn thực hiện hành động này?");
    })

</script>
<!-- The Modal -->
@include('modal')