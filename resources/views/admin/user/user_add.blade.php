<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ url('public/admin/css/bootstrap.min.css') }}">
    <script src="{{ url('public/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/admin/js/popper.min.js') }}"></script>
    <style>
        body{
            background-color: #F5FAFC;
        }
        .btn{
            border-radius: 20px;
        }
        form{
            background-color:#fff;
            padding:40px 20px;
            border-radius:15px;
            padding-top:70px!important;
        }
        #container{
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        img{
            position: relative;
            width: 15px;
            top:70px;
            z-index: 100;
        }
        a{
            color:#7bfff7;
        }
        button[type="submit"]{
            border-radius:50px;
        }
        input{
            border-radius:none;
        }
    </style>
</head>
<body>

<div id="container">
    <img style="width: 10%;text-align: center" src="public/source/user/dhnhatrang.gif">
<div class="col-md-6 " style="padding:20px">
<form action="{{route('register')}}" method="POST">

        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger d-md-block">{{$error}}</div>
            @endforeach
        @endif
            @if(Session::has('success'))
                <div class="alert alert-success d-block">{{Session::get('success')}}</div>
            @endif

    <div class="row">
        <div class="col-md-6">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <input type="text" class="form-control"placeholder="Họ" name="txtlastname" value="{{old('txtlastname')}}">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên" name="txtfirstname" value="{{old('txtfirstname')}}">
        </div>
        </div>
    </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Địa chỉ email" name="txtemail" value="{{old('txtemail')}}">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="txtpswd" value="{{old('txtpswd')}}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Nhập lại mật khẩu" name="txtre-pswd">
        </div>
        <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-block" style="background-color: #388FF4;color:#fff">Đăng kí</button>
        </div>
        <div class="col-md-12">

            <span>Bạn đã có tài khoản  </span><a href="{{route('login')}}">Đăng nhập</a>
        </div>
</form>
</div>
</div>
</body>
</html>