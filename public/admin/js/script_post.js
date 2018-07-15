
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

$(document).on('click','.edit',function () {
    var edit_post=$('.edit').attr('id');
    var post_body=$('.card-text').html();
    $('#edit-text').html(post_body);
    $('#editModal').modal('show');
});



$(document).on('click','.confirm',function () {
    return confirm("Bạn có chắc muốn thực hiện hành động này?");
})