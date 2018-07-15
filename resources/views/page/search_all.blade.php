@include('header')
<div class="container-fluid"style="margin-top: 100px">
    <div class="col-sm-6 offset-sm-3" style="margin-top: 20px">
        @if(count($users)==0)
            <h2 style='font-weight: bold;margin-top:100px'>Không tìm thấy người dùng</h2>
        @else
            <h5>Có {{count($users)}} kết quả được tìm thấy</h5>
        @endif
        @foreach($users as $user)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$user->username}}</h4>
                        <img class="card-img-bottom" style="width: 80px;float:left" src="public/source/user/img_avatar1.png" style="width:50%">
                        <a style="float:right" href="profile/{{$user->id}}" class="btn btn-primary btn-sm">Xem trang cá nhân</a>

                    </div>

                </div>
        @endforeach
    </div>
</div>