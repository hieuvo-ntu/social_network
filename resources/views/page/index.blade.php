@include('header')

<div class="container-fluid">
    <div class="col-sm-4 offset-sm-4">
        <form action="{{route('postpost')}}" method="POST" style="margin-top:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
            <textarea class="form-control" name="text_post" placeholder="Bạn đang nghĩ gì?" autofocus>
            </textarea>
            <button type="submit" class="btn btn-outline-primary" style="float:right">Đăng</button>
            </div>
        </form>
    </div>
</div>
<div class="container-fluid" style="padding-top:25px">
    @foreach($post_data as $post)
    <div class="col-sm-6 offset-sm-3" style="margin-top:20px">
        <div class="card">
            <div class="card-header">
                <img class="card-img-top card-img" style="width: 60px;float:left" src="{{url('public/source/user/img_avatar1.png')}}" alt="Card image cap">
                <div class="card-author d-inline-block"><a href="">
                        <?php $username=DB::table('users')->where('id',$post->added_by_user)->value('username');
                        echo $username;
                        ?></a></div>
                <div class="card-option">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Link 1</a>
                            <a class="dropdown-item" href="#">Link 2</a>
                            <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                    </div>
                </div>
                <div class="card-time">{{convert_date_time($post->created_at)}}</div>

            </div>
            <div class="card-body">

                <p class="card-text">{{$post->body}}</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn col-sm-5"><i class="fa fa-heart-o"></i></button>
                <button type="button" class="btn col-sm-5"><i class="fa fa-comment-o"></i></button>

            </div>
        </div>
    </div>
    @endforeach
</div>

</body>
</html>