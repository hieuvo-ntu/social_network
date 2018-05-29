<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ url('public/admin/css/bootstrap.min.css') }}">
    <script src="{{ url('public/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/admin/js/popper.min.js') }}"></script>
</head>
<body>


<div class="col-md-6 offset-md-3" style="padding:20px">

    <form action="{{route('login')}}" method="POST">

        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger d-md-block">{{$error}}</div>
            @endforeach
        @endif
        @if(Session::has('flag'))
            <div class="alert alert-success d-block">{{Session::get('message')}}</div>
        @endif


        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="email" class="form-control" placeholder="Địa chỉ email" name="txtemail" value="{{old('txtemail')}}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="txtpswd">
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </div>
    </form>
</div>
</body>
</html>