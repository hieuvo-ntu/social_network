<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(url('public/js/ajax_like.js')); ?>"></script>
<script src="<?php echo e(url('public/js/ajax_unlike.js')); ?>"></script>
<script src="<?php echo e(url('public/admin/js/processOnClick.js')); ?>"></script>
<div class="container-fluid" style="margin-top: 100px">
    <div class="col-sm-4 offset-sm-4">
        <form action="<?php echo e(route('postpost')); ?>" method="POST" style="margin-top:20px" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group">
            <input class="form-control"style="line-height: 70px" name="text_post" required placeholder="Bạn đang nghĩ gì?">
            </input>
            <input type="file" class="form-control-file" name="myImage" id="exampleFormControlFile1">
            <button type="submit" class="btn btn-outline-primary" style="float:right">Đăng</button>
            </div>
        </form>
    </div>
</div>
<div class="container-fluid" style="padding-top:25px">
    <div class="col-md-4">asas</div>
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
                    //console.log(data[i].isLike);
                    var text = '<div class="col-sm-6 offset-sm-3" style="padding-top:5px">';
                    text += '<div class="card"> <div class="card-header">';
                    text += '<img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">';
                    text += '<div class="card-author d-inline-block"><a href="profile/'+data[i].user_id+'">' + data[i].username + '</a></div>';
                    text +='<div class="dropdown float-right">'+
                    '<button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">'+
                    '</button>'+
                    '<div class="dropdown-menu dropdown-menu-right">'+
                    '<a class="dropdown-item" href="">Báo cáo</a>'+
                    '<a class="dropdown-item" href="status/'+data[i].id+'">Xem trong tab</a></div> </div>';
                    text += '<div class="card-time">' + data[i].date + '</div> </div> <div class="card-body post" name="'+data[i].id+'"> <p class="card-text">' + data[i].body + '</p>' ;
                    if(data[i].image !=='')text+= '<img style="width: 100%" src="admin/img/image_post/'+data[i].image+'"></div>';
                    else text+='</div>';
                    text += '<div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="'+data[i].id+'" class="col-6 btn button'+data[i].id+'"><i class="'+data[i].isLike+' fa-lg">' + data[i].like+'</i></button>'
                    text += '<button type="button" id="'+data[i].id+'" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg">'+data[i].numComments+'</i></button></div> </div> </div> </div>';
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
                        //console.log(data);
                        //$('#loading').hide();
                        //$.each(data,function(key,index){

                        //}),
                        for(i=0;i<data.length;i++) {

                            var text = '<div class="col-sm-6 offset-sm-3" style="padding-top:5px">';
                            text += '<div class="card"> <div class="card-header">';
                            text += '<img class="card-img-top card-img" style="width: 60px;float:left" src="public/source/user/img_avatar1.png" alt="Card image cap">';
                            text += '<div class="card-author d-inline-block"><a href="profile/'+data[i].user_id+'">' + data[i].username + '</a></div>';
                            text +='<div class="dropdown float-right">'+
                                '<button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">'+
                                '</button>'+
                                '<div class="dropdown-menu dropdown-menu-right">'+
                                '<a class="dropdown-item" href="">Báo cáo</a>'+
                                '<a class="dropdown-item" href="status/'+data[i].id+'">Xem trong tab</a></div> </div>';
                            text += '<div class="card-time">' + data[i].date + '</div> </div> <div class="card-body post" name="'+data[i].id+'"> <p class="card-text">' + data[i].body + '</p>' ;
                            if(data[i].image !=='')text+= '<img style="width: 100%" src="admin/img/image_post/'+data[i].image+'"></div>';
                            else text+='</div>';
                            text += '<div class="card-footer comment"> <div class="btn-group btn-group-justified d-block"><button type="button" title="'+data[i].id+'" class="col-6 btn button'+data[i].id+'"><i class="'+data[i].isLike+' fa-lg">' + data[i].like+'</i></button>'
                            text += '<button type="button" id="'+data[i].id+'" class="btn col-6 comments"><i class="fa fa-comment-o fa-lg">'+data[i].numComments+'</i></button></div> </div> </div> </div>';
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


    });



</script>
<!-- The Modal -->
<?php echo $__env->make('modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>