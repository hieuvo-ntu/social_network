<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(url('public/js/ajax_like.js')); ?>"></script>
<script src="<?php echo e(url('public/js/ajax_unlike.js')); ?>"></script>
<div class="container-fluid">
    <div class="col-sm-4 offset-sm-4">
        <form action="<?php echo e(route('postpost')); ?>" method="POST" style="margin-top:20px">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
            <textarea class="form-control" name="text_post" placeholder="Bạn đang nghĩ gì?">
            </textarea>
            <button type="submit" class="btn btn-outline-primary" style="float:right">Đăng</button>
            </div>
        </form>
    </div>
</div>
<div class="container-fluid" style="padding-top:25px">

    <div class="post-area">

    </div>
    <img id="loading" src="public/source/user/loading.gif">
</div>
<script>



    $(document).ready(function () {


        var flag=0;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#loading').show();
        $.ajax({
            url:"<?php echo e(route('postAjax')); ?>",
            type:"post",
            dataType:"json",
            data:{
                'offset':0,
            },
            cache:false,
            success:function (data) {
                $('#loading').hide();
                $('iframe').click(function () {
                    for(var i=0;i<data.length;i++) {
                        var element = $('toggleComment' + data[i].id);
                    }
                    if(element.style.display=='block')
                        element.style.display='none';
                    else
                        element.style.display='block';
                });
                console.log(data);
                for(var i=0;i<data.length;i++) {
                    console.log(data[i].isLike);
                    var text = '<div class="col-sm-6 offset-sm-3" style="margin-top:20px" >';
                    text += '<div class="card"> <div class="card-header">';
                    text += '<img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">';
                    text += '<div class="card-author d-inline-block"><a href="profile/'+data[i].user_id+'">' + data[i].username + '</a></div>';
                    text += '<div class="card-time">' + data[i].date + '</div> </div> <div class="card-body post" name="'+data[i].id+'"> <p class="card-text">' + data[i].body + '</p> </div>';
                    text += '<div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="'+data[i].id+'" class="col-6 btn button'+data[i].id+'"><i class="'+data[i].isLike+' fa-lg">' + data[i].like+'</i></button>'
                    text += '<button type="button" id="'+data[i].id+'" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg"></i></button></div> </div> </div> </div>';
                    $('.post-area').append(text);
                    $(document).on("click", ".button" + data[i].id, function () {

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
                }

                flag+=3;
            }

        });
        $(window).scroll(function () {
            if(($(window).scrollTop()>=$(document).height()-$(window).height())){

                //$('#loading').show();


                $.ajax({
                    url:"<?php echo e(route('postAjax')); ?>",
                    type:"post",
                    dataType:'json',
                    data:{
                        'offset':flag,

                    },
                    cache:false,
                    success:function (data) {
                        console.log(data);
                        //$('#loading').hide();
                        //$.each(data,function(key,index){

                        //}),
                        for(i=0;i<data.length;i++) {

                            var text = '<div class="col-sm-6 offset-sm-3" style="margin-top:20px" >';
                            text += '<div class="card"> <div class="card-header">';
                            text += '<img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">';
                            text += '<div class="card-author d-inline-block"><a href="profile/'+data[i].user_id+'">' + data[i].username + '</a></div>';
                            text += '<div class="card-time">' + data[i].date + '</div> </div> <div class="card-body post" name="'+data[i].id+'"> <p class="card-text">' + data[i].body + '</p> </div>';
                            text += '<div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="'+data[i].id+'" class="col-6 btn button'+data[i].id+'"><i class="'+data[i].isLike+' fa-lg">' + data[i].like+'</i></button>'
                            text += '<button type="button" id="'+data[i].id+'" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg"></i></button></div> </div> </div> </div>';
                            $('.post-area').append(text);

                                $(document).on("click", ".button" + data[i].id, function () {

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
                                    //.removeClass("fa-heart-o").addClass("fa-heart");
                                });
                        }

                        $('.post-area').append(data);
                        flag+=3;
                    }
                });
             }//ket thuc IF
            return false;
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

        $(document).on('click','.post',function () {
            var id=$(this).attr("name");
            $.ajax({
                url:"getCommentPost",
                type:"post",
                data:{post_id:id},
                success:function (data) {
                    alert(data);
                    $('.modal-body-comment').html(data);
                    $('#exampleModalLong').modal('show');

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

                    }
                });

        });


    });



</script>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalTitle">Bình luận bài viết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Bình luận</label>
                        <textarea class="form-control" id="comment-text" placeholder="Bình luận của bạn"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary Reply" >Trả lời</button>
            </div>
        </div>

    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal Comment-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-comment">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>