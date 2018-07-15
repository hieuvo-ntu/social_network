@include('header')
<script src="{{url('public/js/ajax_like.js')}}"></script>
<script src="{{url('public/js/ajax_unlike.js')}}"></script>
<script src="{{url('public/admin/js/script_post.js')}}"></script>
<?php $username = DB::table('users')->where('id', $singlePost->added_by_user)->value('username');?>
<div class="container-fluid" style="padding-top:25px">
    <div class="post-area">
        <div class="col-sm-6 offset-sm-3" style="margin-top:20px" >
            <div class="card">
                <div class="card-header"><img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">
                <div class="card-author d-inline-block"><a href="profile/{{$singlePost->added_by_user}}">{{$username}}</a></div>
                    <div class="dropdown float-right"><button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown"></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if($singlePost->added_by_user==Auth::user()->id)
                                <a class="dropdown-item edit" id="{{$singlePost->id}}" >Chỉnh sửa bài viết</a>
                                <a class="dropdown-item confirm" href="deletePost/{{$singlePost->id}}">Xóa bài viết</a>
                            @else
                                <a class="dropdown-item" href="">Báo cáo bài viết</a>
                            @endif
                        </div>
                    </div>
                <div class="card-time">{{convert_date_time($singlePost->created_at)}}</div> </div> <div class="card-body post" name="{{$singlePost->id}}"> <p class="card-text">{!!$singlePost->body!!}</p></div>
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
    $(document).on('click','#update_post',function () {
        var update=$('#edit-text').val();
        var post_id='{{$singlePost->id}}';
        $.ajax({
            url: 'updatePost',
            type: "post",
            data: {update:update,post_id:post_id},
            success: function (response) {
                $('#myModal').modal('hide');
                window.location.reload(true);
            }
        });
    });
</script>
<!-- The Modal -->
@include('modal')
<div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="edit-modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"></label>
                            <textarea class="form-control required" id="edit-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="update_post">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>