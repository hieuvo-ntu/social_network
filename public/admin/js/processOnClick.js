$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

    $(document).on('click','.confirm',function () {
        return confirm("Bạn có chắc muốn thực hiện hành động này?");
    })

})