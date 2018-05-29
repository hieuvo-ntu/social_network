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
</head>
<body>


<div class="col-md-6 offset-md-3" style="padding:20px">

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
        <button type="submit" class="btn btn-primary btn-block">Đăng kí</button>
        </div>
</form>
</div>
</body>
</html>