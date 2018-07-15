<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="<?php echo e(url('public/admin/css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(url('public/admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/popper.min.js')); ?>"></script>
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
<form action="<?php echo e(route('register')); ?>" method="POST">

        <?php if(count($errors)>0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger d-md-block"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success d-block"><?php echo e(Session::get('success')); ?></div>
            <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-group">
            <input type="text" class="form-control"placeholder="Họ" required name="txtlastname" value="<?php echo e(old('txtlastname')); ?>">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên" required name="txtfirstname" value="<?php echo e(old('txtfirstname')); ?>">
        </div>
        </div>
    </div>
            <div class="form-group">
                <input type="date" class="form-control" placeholder="Ngày sinh" required name="txtemail" value="<?php echo e(old('txtemail')); ?>">
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Nam
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Nữ
                </label>
            </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Địa chỉ email" required name="txtemail" value="<?php echo e(old('txtemail')); ?>">
        </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Điện thoại" required name="txtemail" value="<?php echo e(old('txtemail')); ?>">
            </div>

        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" required name="txtpswd" value="<?php echo e(old('txtpswd')); ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Nhập lại mật khẩu" required name="txtre-pswd">
        </div>
        <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-block" style="background-color: #388FF4;color:#fff">Đăng kí</button>
        </div>
        <div class="col-md-12">

            <span>Bạn đã có tài khoản  </span><a href="<?php echo e(route('login')); ?>">Đăng nhập</a>
        </div>
</form>
</div>
</div>
</body>
</html>