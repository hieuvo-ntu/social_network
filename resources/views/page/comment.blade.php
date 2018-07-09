<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('script_css')
</head>
<body>
<script>
    function toggle() {
        var element=document.getElementById("comment_section");
        if(element.style.display=="block")
            element.style.display="none";
        else
            element.style.display="block";
    }
</script>
<form action="{{route('postComment',$post_id)}}" id="comment_form" name="postComent<?php echo $post_id?>" method="POST">

    <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
    <div class="col-12">
    <textarea name="body" style="width: 85%"></textarea>
    <input type="submit" class="btn" style="position: absolute" name="postComment{{$post_id}}" value="Trả lời">
    </div>

</form>
@foreach($comments as $comment)
<div class="comment_section">
    <a href="" style="float:left;margin-right:5px" height="30" >{{Auth::user()->username}}</a>
    <p style="margin-bottom: 0px!important;">{{$comment->post_body}}</p>
    <p style="font-size: 13px">{{convert_date_time($comment->created_at)}}</p>
</div>
@endforeach
</body>
</html>